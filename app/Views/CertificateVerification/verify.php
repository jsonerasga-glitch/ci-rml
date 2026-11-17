<?php
$states = [
	'valid' => [
		'title' => 'Authentic certificate',
		'text'  => 'This calibration certificate was issued by the DOST CALABARZON Regional Metrology Laboratory and its record has not changed since this copy was printed. Check that the details below match the printed certificate.',
		'class' => 'ok',
		'icon'  => '&#10004;',
	],
	'draft' => [
		'title' => 'Draft copy — not an official certificate',
		'text'  => 'This QR code belongs to a DRAFT printout. Drafts are for review only and are not valid as a calibration certificate.',
		'class' => 'warn',
		'icon'  => '!',
	],
	'modified' => [
		'title' => 'Certificate record has changed',
		'text'  => 'This certificate was issued by the laboratory, but its record was updated after this copy was printed. The printed copy may be outdated. Please contact the laboratory for the current certificate.',
		'class' => 'warn',
		'icon'  => '!',
	],
	'revoked' => [
		'title' => 'Certificate under revision',
		'text'  => 'This certificate is currently not approved for printing (for example, it was returned for correction). Please contact the laboratory before relying on this copy.',
		'class' => 'bad',
		'icon'  => '&#10006;',
	],
	'missing' => [
		'title' => 'Certificate record not found',
		'text'  => 'The record this certificate was printed from no longer exists. Please contact the laboratory.',
		'class' => 'bad',
		'icon'  => '&#10006;',
	],
	'invalid' => [
		'title' => 'Invalid verification code',
		'text'  => 'This QR code does not match any certificate issued by the laboratory. The document may not be genuine.',
		'class' => 'bad',
		'icon'  => '&#10006;',
	],
];
$state = $states[$status] ?? $states['invalid'];

$formatDate = static function ($value, $withTime = false) {
	if (empty($value) || ($ts = strtotime($value)) === false) {
		return null;
	}
	return date($withTime ? 'd F Y, g:i A' : 'd F Y', $ts);
};

$rows = [];
if ($verification) {
	$rows = [
		'Certificate No.'     => $snapshot['certificateNumber'] ?? $verification['certificate_number'],
		'Customer'            => $snapshot['customer'] ?? null,
		'Address'             => $snapshot['address'] ?? null,
		'Calibration'         => $moduleName,
		'Equipment'           => $snapshot['equipment'] ?? null,
		'Manufacturer'        => $snapshot['manufacturer'] ?? null,
		'Model No.'           => $snapshot['modelNumber'] ?? null,
		'Serial No.'          => $snapshot['serialNumber'] ?? null,
		'Date Calibrated'     => $formatDate($snapshot['dateCalibrated'] ?? null) ?? ($snapshot['dateCalibrated'] ?? null),
		'Date of Issue'       => $formatDate($snapshot['dateOfIssue'] ?? null),
		'Calibration Officer' => $snapshot['calibrationOfficer'] ?? null,
		'Copy printed on'     => $formatDate($verification['created_at'], true),
		'Copy type'           => (int) $verification['is_draft'] === 1 ? 'DRAFT' : 'Official certificate',
	];
	$rows = array_filter($rows, static fn ($v) => $v !== null && $v !== '');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="robots" content="noindex, nofollow">
	<title>Certificate Verification | DOST CALABARZON RML</title>
	<style>
		:root { --ok: #157347; --ok-bg: #e8f5ee; --warn: #9a6700; --warn-bg: #fff6dd; --bad: #b42318; --bad-bg: #fdecea; --ink: #1f2933; --muted: #5f6b7a; --line: #e3e7ec; }
		* { box-sizing: border-box; }
		body { margin: 0; background: #f3f5f8; color: var(--ink); font: 15px/1.5 -apple-system, "Segoe UI", Roboto, Arial, sans-serif; }
		.wrap { max-width: 640px; margin: 0 auto; padding: 24px 16px 40px; }
		.brand { text-align: center; margin-bottom: 20px; }
		.brand small { display: block; color: var(--muted); font-size: 12px; letter-spacing: .04em; text-transform: uppercase; }
		.brand strong { font-size: 18px; }
		.card { background: #fff; border: 1px solid var(--line); border-radius: 12px; overflow: hidden; }
		.status { display: flex; gap: 14px; align-items: flex-start; padding: 20px; }
		.status .icon { flex: 0 0 40px; height: 40px; border-radius: 50%; color: #fff; font-weight: bold; font-size: 20px; display: flex; align-items: center; justify-content: center; }
		.status h1 { font-size: 19px; margin: 0 0 4px; }
		.status p { margin: 0; color: var(--ink); }
		.ok { background: var(--ok-bg); } .ok .icon { background: var(--ok); } .ok h1 { color: var(--ok); }
		.warn { background: var(--warn-bg); } .warn .icon { background: var(--warn); } .warn h1 { color: var(--warn); }
		.bad { background: var(--bad-bg); } .bad .icon { background: var(--bad); } .bad h1 { color: var(--bad); }
		dl { margin: 0; padding: 8px 20px 16px; }
		dl div { display: flex; gap: 12px; padding: 10px 0; border-bottom: 1px solid var(--line); }
		dl div:last-child { border-bottom: 0; }
		dt { flex: 0 0 38%; color: var(--muted); }
		dd { margin: 0; flex: 1; font-weight: 600; word-break: break-word; }
		.note { margin: 16px 4px 0; color: var(--muted); font-size: 13px; }
		.contact { margin-top: 24px; text-align: center; color: var(--muted); font-size: 13px; }
	</style>
</head>
<body>
	<div class="wrap">
		<div class="brand">
			<small>Department of Science and Technology &middot; CALABARZON</small>
			<strong>Regional Metrology Laboratory</strong>
			<small>Calibration Certificate Verification</small>
		</div>

		<div class="card">
			<div class="status <?= $state['class'] ?>">
				<div class="icon"><?= $state['icon'] ?></div>
				<div>
					<h1><?= esc($state['title']) ?></h1>
					<p><?= esc($state['text']) ?></p>
				</div>
			</div>

			<?php if ($rows) : ?>
				<dl>
					<?php foreach ($rows as $label => $value) : ?>
						<div><dt><?= esc($label) ?></dt><dd><?= esc($value) ?></dd></div>
					<?php endforeach; ?>
				</dl>
			<?php endif; ?>
		</div>

		<?php if ($verification) : ?>
			<p class="note">
				<?php if ($previousScans === 0) : ?>
					This is the first time this QR code has been scanned.
				<?php else : ?>
					This QR code has been scanned <?= $previousScans ?> time<?= $previousScans === 1 ? '' : 's' ?> before<?= $firstScannedAt ? ', first on ' . esc($formatDate($firstScannedAt, true)) : '' ?>.
				<?php endif; ?>
				Each printed copy carries its own code.
			</p>
		<?php endif; ?>

		<p class="note">Are you the customer? <a href="<?= site_url('customer/login') ?>">Log in to the customer portal</a> to download your released certificates.</p>

		<?php if (! empty($about)) : ?>
			<div class="contact">
				Questions about this certificate?<br>
				<?php if (! empty($about['tel'])) : ?>Tel: <?= esc($about['tel']) ?><br><?php endif; ?>
				<?php if (! empty($about['email'])) : ?>Email: <?= esc($about['email']) ?><?php endif; ?>
			</div>
		<?php endif; ?>
	</div>
</body>
</html>
