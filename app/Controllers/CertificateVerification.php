<?php

namespace App\Controllers;

use App\Libraries\CertificateQr;
use App\Models\About;
use App\Models\CertificateVerificationModel;

/**
 * Public (no login) page opened by scanning the QR code on a certificate.
 */
class CertificateVerification extends BaseController
{
	public function verify($token = null)
	{
		$token  = strtolower(trim((string) $token));
		$result = [
			'status'       => 'invalid',
			'verification' => null,
			'snapshot'     => [],
			'moduleName'   => null,
			'previousScans' => 0,
			'firstScannedAt' => null,
		];

		if (preg_match('/^[a-f0-9]{32,64}$/', $token)) {
			$model        = new CertificateVerificationModel();
			$verification = $model->where('token', $token)->first();

			if ($verification) {
				$result['verification']   = $verification;
				$result['snapshot']       = json_decode($verification['snapshot'] ?? '', true) ?: [];
				$result['moduleName']     = CertificateQr::MODULES[$verification['module']][0] ?? $verification['module'];
				$result['previousScans']  = (int) $verification['scan_count'];
				$result['firstScannedAt'] = $verification['first_scanned_at'];
				$result['status']         = $this->determineStatus($verification);

				$now = CertificateQr::now();
				$model->update($verification['id'], [
					'scan_count'       => $verification['scan_count'] + 1,
					'first_scanned_at' => $verification['first_scanned_at'] ?: $now,
					'last_scanned_at'  => $now,
				]);
			}
		}

		$about = (new About())->first();

		return $this->response
			->setHeader('X-Robots-Tag', 'noindex, nofollow')
			->setHeader('Cache-Control', 'no-store')
			->setBody(view('CertificateVerification/verify', $result + ['about' => $about]));
	}

	/**
	 * valid    - official certificate, record unchanged since it was printed
	 * draft    - QR came from a draft copy
	 * modified - the record was edited after this copy was printed
	 * revoked  - the record is back under correction / no longer approved for printing
	 * missing  - the record no longer exists
	 */
	private function determineStatus(array $verification): string
	{
		if ((int) $verification['is_draft'] === 1) {
			return 'draft';
		}

		$modelClass = CertificateQr::MODULES[$verification['module']][1] ?? null;
		if (! $modelClass) {
			return 'missing';
		}

		$record = (new $modelClass())->where('id', $verification['record_id'])->first();
		if (! $record) {
			return 'missing';
		}
		if (($record['completion'] ?? '') !== 'For printing') {
			return 'revoked';
		}
		if (! hash_equals($verification['data_hash'], CertificateQr::hashRecord($record))) {
			return 'modified';
		}

		return 'valid';
	}
}
