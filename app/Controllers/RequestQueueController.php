<?php

namespace App\Controllers;

use App\Libraries\CalibrationRequests;

/**
 * Staff side of the customer portal (systemFlow.png, staff lane):
 * the Staff Queue of customer requests, receiving a request, and creating the
 * module worksheet for each requested instrument.
 */
class RequestQueueController extends BaseController
{
	private $db;

	public function __construct()
	{
		helper(['url', 'form']);
		$this->db = \Config\Database::connect();
	}

	public function index()
	{
		$filter   = (string) $this->request->getGet('status');
		$requests = $this->db->table('calibration_requests')->orderBy('created_at', 'DESC')->get()->getResultArray();

		$counts = ['Submitted' => 0, 'Received' => 0, 'In progress' => 0, 'Completed' => 0, 'Cancelled' => 0];
		foreach ($requests as &$r) {
			$r['items']         = CalibrationRequests::itemsWithProgress($r);
			$r['displayStatus'] = CalibrationRequests::displayStatus($r, $r['items']);
			$counts[$r['displayStatus']]++;
		}
		unset($r);
		if ($filter !== '') {
			$requests = array_values(array_filter($requests, static fn ($r) => $r['displayStatus'] === $filter));
		}

		return view('RequestQueue/index', ['requests' => $requests, 'counts' => $counts, 'filter' => $filter]);
	}

	public function show($id)
	{
		$request = $this->db->table('calibration_requests')->where('id', (int) $id)->get()->getRowArray();
		if (! $request) {
			return redirect()->to(site_url('requests'));
		}
		$items   = CalibrationRequests::itemsWithProgress($request);
		$account = $this->db->table('customer_accounts')->select('contact_person, email, phone')
			->where('id', $request['customer_account_id'])->get()->getRowArray();

		return view('RequestQueue/show', [
			'request'       => $request,
			'items'         => $items,
			'account'       => $account,
			'displayStatus' => CalibrationRequests::displayStatus($request, $items),
		]);
	}

	/** "Request appears in Staff Queue" -> staff accepts it (instruments received). */
	public function receive($id)
	{
		$request = $this->db->table('calibration_requests')->where('id', (int) $id)->get()->getRowArray();
		if ($request && $request['status'] === 'Submitted') {
			$this->db->table('calibration_requests')->where('id', $request['id'])->update([
				'status'        => 'Received',
				'received_at'   => date('Y-m-d H:i:s'),
				'received_by'   => trim(session()->get('name') . ' ' . (session()->get('lname') ?? '')) ?: session()->get('email'),
				'staff_remarks' => mb_substr(trim((string) $this->request->getPost('staff_remarks')), 0, 2000) ?: null,
				'updated_at'    => date('Y-m-d H:i:s'),
			]);
		}

		return redirect()->to(site_url('requests/' . (int) $id))->with('notice', 'Request received. You can now create the worksheets.');
	}

	public function reject($id)
	{
		$request = $this->db->table('calibration_requests')->where('id', (int) $id)->get()->getRowArray();
		if ($request && $request['status'] === 'Submitted') {
			$this->db->table('calibration_requests')->where('id', $request['id'])->update([
				'status'        => 'Cancelled',
				'staff_remarks' => mb_substr(trim((string) $this->request->getPost('staff_remarks')), 0, 2000) ?: 'Declined by the laboratory',
				'updated_at'    => date('Y-m-d H:i:s'),
			]);
		}

		return redirect()->to(site_url('requests/' . (int) $id));
	}

	/** "Select Customer + Calibration Process from queued request" -> opens the prefilled worksheet. */
	public function createWorksheet($itemId)
	{
		$item = $this->db->table('calibration_request_items')->where('id', (int) $itemId)->get()->getRowArray();
		if (! $item) {
			return redirect()->to(site_url('requests'));
		}
		$request = $this->db->table('calibration_requests')->where('id', $item['request_id'])->get()->getRowArray();

		if ($item['worksheet_id']) {
			return redirect()->to(CalibrationRequests::worksheetUrl($item['module'], (int) $item['worksheet_id']));
		}
		if (! $request || $request['status'] !== 'Received') {
			return redirect()->to(site_url('requests/' . $item['request_id']))->with('notice', 'Receive the request first.');
		}

		$worksheetId = CalibrationRequests::createWorksheet($request, $item);

		return redirect()->to(CalibrationRequests::worksheetUrl($item['module'], $worksheetId));
	}

	/** Badge count for the sidebar. */
	public static function newCount(): int
	{
		$db = \Config\Database::connect();
		if (! $db->tableExists('calibration_requests')) {
			return 0;
		}

		return $db->table('calibration_requests')->where('status', 'Submitted')->countAllResults();
	}
}
