<?php

namespace App\Controllers;

use App\Libraries\CalibrationRequests;
use App\Libraries\CertificateQr;

/**
 * Customer portal (systemFlow.png, customer lane):
 * log in -> submit a calibration request -> monitor it -> download the certificate.
 * Customers only ever see their own account's requests.
 */
class CustomerPortalController extends BaseController
{
	private $db;

	public function __construct()
	{
		helper(['url', 'form']);
		$this->db = \Config\Database::connect();
	}

	// ------------------------------------------------------------------ auth

	public function login()
	{
		if (session()->get('customerAccountId')) {
			return redirect()->to(site_url('customer'));
		}
		$data = ['error' => null, 'email' => ''];

		if ($this->request->getMethod() === 'post') {
			$email    = trim((string) $this->request->getPost('email'));
			$password = (string) $this->request->getPost('password');
			$account  = $this->db->table('customer_accounts')->where('email', $email)->get()->getRowArray();

			if ($account && password_verify($password, $account['password'])) {
				session()->regenerate();
				session()->set([
					'customerAccountId' => (int) $account['id'],
					'customerName'      => $account['contact_person'],
					'customerCompany'   => $account['company'],
				]);
				$this->db->table('customer_accounts')->where('id', $account['id'])->update(['last_login_at' => date('Y-m-d H:i:s')]);

				return redirect()->to(site_url('customer'));
			}
			$data['error'] = 'Incorrect email or password.';
			$data['email'] = $email;
		}

		return view('CustomerPortal/login', $data);
	}

	public function register()
	{
		$data = ['errors' => [], 'old' => []];

		if ($this->request->getMethod() === 'post') {
			$rules = [
				'company'          => 'required|min_length[2]|max_length[255]',
				'address'          => 'required|min_length[5]|max_length[255]',
				'contact_person'   => 'required|min_length[2]|max_length[150]',
				'email'            => 'required|valid_email|max_length[150]|is_unique[customer_accounts.email]',
				'phone'            => 'permit_empty|max_length[50]',
				'password'         => 'required|min_length[8]|max_length[100]',
				'password_confirm' => 'matches[password]',
			];
			$messages = ['email' => ['is_unique' => 'An account with this email already exists.'],
				'password_confirm' => ['matches' => 'The passwords do not match.']];

			if ($this->validate($rules, $messages)) {
				$p = $this->request->getPost();
				// Every portal customer is also a customer record for staff.
				$this->db->table('customerdetails')->insert(['customer' => trim($p['company']), 'address' => trim($p['address'])]);
				$customerId = $this->db->insertID();

				$this->db->table('customer_accounts')->insert([
					'customer_id'    => $customerId,
					'company'        => trim($p['company']),
					'address'        => trim($p['address']),
					'contact_person' => trim($p['contact_person']),
					'email'          => trim($p['email']),
					'phone'          => trim((string) ($p['phone'] ?? '')),
					'password'       => password_hash($p['password'], PASSWORD_DEFAULT),
					'created_at'     => date('Y-m-d H:i:s'),
				]);

				return redirect()->to(site_url('customer/login'))->with('notice', 'Account created. You can now log in.');
			}
			$data['errors'] = $this->validator->getErrors();
			$data['old']    = $this->request->getPost();
		}

		return view('CustomerPortal/register', $data);
	}

	public function logout()
	{
		session()->remove(['customerAccountId', 'customerName', 'customerCompany']);

		return redirect()->to(site_url('customer/login'));
	}

	// ------------------------------------------------------------- dashboard

	public function dashboard()
	{
		$requests = $this->db->table('calibration_requests')->where('customer_account_id', $this->accountId())
			->orderBy('created_at', 'DESC')->get()->getResultArray();

		$counts = ['Submitted' => 0, 'Received' => 0, 'In progress' => 0, 'Completed' => 0, 'Cancelled' => 0];
		$certs  = 0;
		foreach ($requests as &$r) {
			$items              = CalibrationRequests::itemsWithProgress($r);
			$r['items']         = $items;
			$r['displayStatus'] = CalibrationRequests::displayStatus($r, $items);
			$counts[$r['displayStatus']]++;
			$certs += count(array_filter($items, static fn ($i) => $i['certificateReady']));
		}
		unset($r);

		return view('CustomerPortal/dashboard', [
			'account'  => $this->account(),
			'requests' => $requests,
			'counts'   => $counts,
			'certs'    => $certs,
		]);
	}

	// --------------------------------------------------------------- requests

	public function newRequest()
	{
		return view('CustomerPortal/request_form', [
			'account'   => $this->account(),
			'processes' => CalibrationRequests::processes(),
			'errors'    => session()->getFlashdata('errors') ?? [],
			'old'       => session()->getFlashdata('old') ?? [],
		]);
	}

	public function storeRequest()
	{
		$processes = CalibrationRequests::processes();
		$p         = $this->request->getPost();
		$errors    = [];

		$items = [];
		foreach ((array) ($p['items'] ?? []) as $row) {
			$row = array_map(static fn ($v) => trim((string) $v), (array) $row);
			if (implode('', $row) === '') {
				continue; // empty row
			}
			if (! isset($processes[$row['module'] ?? ''])) {
				$errors[] = 'Choose a calibration process for every instrument.';
				continue;
			}
			if (($row['equipment_description'] ?? '') === '') {
				$errors[] = 'Enter a description for every instrument.';
				continue;
			}
			$items[] = $row;
		}
		if (! $items) {
			$errors[] = 'Add at least one instrument.';
		}
		if (count($items) > 50) {
			$errors[] = 'A request can have at most 50 instruments.';
		}
		$place = ($p['place_of_calibration'] ?? '') === 'On-site' ? 'On-site' : 'In-laboratory';
		$date  = ($p['preferred_date'] ?? '') !== '' && strtotime($p['preferred_date']) ? date('Y-m-d', strtotime($p['preferred_date'])) : null;

		if ($errors) {
			return redirect()->to(site_url('customer/requests/new'))->with('errors', array_values(array_unique($errors)))->with('old', $p);
		}

		$account = $this->account();
		$this->db->transStart();
		$this->db->table('calibration_requests')->insert([
			'request_no'           => CalibrationRequests::nextRequestNo(),
			'customer_account_id'  => $account['id'],
			'customer_id'          => $account['customer_id'],
			'company'              => $account['company'],
			'address'              => $account['address'],
			'contact_person'       => mb_substr(trim((string) ($p['contact_person'] ?? '')) ?: $account['contact_person'], 0, 150),
			'contact_phone'        => mb_substr(trim((string) ($p['contact_phone'] ?? '')) ?: (string) $account['phone'], 0, 50),
			'place_of_calibration' => $place,
			'preferred_date'       => $date,
			'remarks'              => mb_substr(trim((string) ($p['remarks'] ?? '')), 0, 2000),
			'status'               => 'Submitted',
			'created_at'           => date('Y-m-d H:i:s'),
			'updated_at'           => date('Y-m-d H:i:s'),
		]);
		$requestId = $this->db->insertID();
		foreach ($items as $row) {
			$this->db->table('calibration_request_items')->insert([
				'request_id'            => $requestId,
				'module'                => $row['module'],
				'equipment_description' => mb_substr($row['equipment_description'], 0, 255),
				'manufacturer'          => mb_substr($row['manufacturer'] ?? '', 0, 150),
				'model'                 => mb_substr($row['model'] ?? '', 0, 150),
				'serial_number'         => mb_substr($row['serial_number'] ?? '', 0, 150),
				'equipment_id'          => mb_substr($row['equipment_id'] ?? '', 0, 150),
				'capacity_range'        => mb_substr($row['capacity_range'] ?? '', 0, 150),
				'created_at'            => date('Y-m-d H:i:s'),
			]);
		}
		$this->db->transComplete();

		return redirect()->to(site_url('customer/requests/' . $requestId))->with('notice', 'Your request was submitted. The laboratory will receive it shortly.');
	}

	public function showRequest($id)
	{
		$request = $this->ownRequest((int) $id);
		if (! $request) {
			return redirect()->to(site_url('customer'));
		}
		$items = CalibrationRequests::itemsWithProgress($request);

		return view('CustomerPortal/request_show', [
			'account'       => $this->account(),
			'request'       => $request,
			'items'         => $items,
			'displayStatus' => CalibrationRequests::displayStatus($request, $items),
		]);
	}

	public function cancelRequest($id)
	{
		$request = $this->ownRequest((int) $id);
		if ($request && $request['status'] === 'Submitted') {
			$this->db->table('calibration_requests')->where('id', $request['id'])
				->update(['status' => 'Cancelled', 'updated_at' => date('Y-m-d H:i:s')]);

			return redirect()->to(site_url('customer/requests/' . $request['id']))->with('notice', 'Request cancelled.');
		}

		return redirect()->to(site_url('customer'));
	}

	/** Downloads the released certificate of one of the customer's own items. */
	public function certificate($itemId)
	{
		$item = $this->db->table('calibration_request_items')->where('id', (int) $itemId)->get()->getRowArray();
		if (! $item || ! $this->ownRequest((int) $item['request_id']) || ! $item['worksheet_id']) {
			return redirect()->to(site_url('customer'));
		}
		$ws = $this->db->table(CalibrationRequests::WORKSHEETS[$item['module']]['table'])
			->select('completion, certificateNumber')->where('id', $item['worksheet_id'])->get()->getRowArray();
		$file = CertificateQr::issuedFile($item['module'], (int) $item['worksheet_id']);

		if (! $ws || $ws['completion'] !== 'For printing' || ! $file) {
			return redirect()->back()->with('notice', 'This certificate has not been released yet.');
		}
		$name = preg_replace('/[^A-Za-z0-9._-]+/', '_', $ws['certificateNumber'] ?: ('certificate-' . $item['id'])) . '.pdf';

		return $this->response
			->setHeader('Content-Type', 'application/pdf')
			->setHeader('Content-Disposition', 'inline; filename="' . $name . '"')
			->setHeader('X-Content-Type-Options', 'nosniff')
			->setBody(file_get_contents($file));
	}

	// ---------------------------------------------------------------- helpers

	private function accountId(): int
	{
		return (int) session()->get('customerAccountId');
	}

	private function account(): array
	{
		return $this->db->table('customer_accounts')->where('id', $this->accountId())->get()->getRowArray() ?? [];
	}

	private function ownRequest(int $id): ?array
	{
		return $this->db->table('calibration_requests')->where('id', $id)
			->where('customer_account_id', $this->accountId())->get()->getRowArray();
	}
}
