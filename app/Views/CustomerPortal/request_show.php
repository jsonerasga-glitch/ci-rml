<?= $this->extend('CustomerPortal/layout') ?>
<?= $this->section('title') ?><?= esc($request['request_no']) ?><?= $this->endSection() ?>
<?= $this->section('content') ?>
<?php use App\Libraries\CalibrationRequests as CR; ?>
<a class="small" href="<?= site_url('customer') ?>">&larr; My requests</a>
<div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mt-2 mb-3">
  <h1 class="h4 mb-0">Request <?= esc($request['request_no']) ?> <?= CR::statusBadge($displayStatus) ?></h1>
  <?php if ($request['status'] === 'Submitted'): ?>
  <form method="post" action="<?= site_url('customer/requests/' . $request['id'] . '/cancel') ?>" onsubmit="return confirm('Cancel this request?')">
    <button class="btn btn-sm btn-outline-danger" type="submit">Cancel request</button>
  </form>
  <?php endif; ?>
</div>

<div class="card-portal p-3 mb-3">
  <div class="row small g-2">
    <div class="col-md-3"><div class="text-muted">Submitted</div><?= esc(date('d M Y, g:i A', strtotime($request['created_at']))) ?></div>
    <div class="col-md-3"><div class="text-muted">Received by the laboratory</div><?= $request['received_at'] ? esc(date('d M Y, g:i A', strtotime($request['received_at']))) : '—' ?></div>
    <div class="col-md-3"><div class="text-muted">Place of calibration</div><?= esc($request['place_of_calibration']) ?></div>
    <div class="col-md-3"><div class="text-muted">Preferred date</div><?= $request['preferred_date'] ? esc(date('d M Y', strtotime($request['preferred_date']))) : '—' ?></div>
    <?php if ($request['remarks']): ?><div class="col-md-6"><div class="text-muted">Your remarks</div><?= esc($request['remarks']) ?></div><?php endif; ?>
    <?php if ($request['staff_remarks']): ?><div class="col-md-6"><div class="text-muted">Laboratory remarks</div><?= esc($request['staff_remarks']) ?></div><?php endif; ?>
  </div>
</div>

<?php foreach ($items as $i => $item): ?>
<div class="card-portal p-3 mb-3">
  <div class="d-flex flex-wrap justify-content-between gap-2">
    <div>
      <div class="small text-muted"><?= esc($item['processLabel']) ?></div>
      <strong><?= esc($item['equipment_description']) ?></strong>
      <div class="small text-muted">
        <?= esc(implode(' · ', array_filter([
            $item['manufacturer'] ? 'Make: ' . $item['manufacturer'] : '',
            $item['model'] ? 'Model: ' . $item['model'] : '',
            $item['serial_number'] ? 'S/N: ' . $item['serial_number'] : '',
            $item['equipment_id'] ? 'ID: ' . $item['equipment_id'] : '',
            $item['capacity_range'] ? 'Range: ' . $item['capacity_range'] : '',
        ]))) ?>
      </div>
    </div>
    <div class="text-end">
      <?= CR::statusBadge($item['stageLabel']) ?>
      <?php if (! empty($item['worksheet']['certificateNumber'])): ?>
        <div class="small text-muted mt-1">Certificate no. <?= esc($item['worksheet']['certificateNumber']) ?></div>
      <?php endif; ?>
    </div>
  </div>
  <?= view('CustomerPortal/_stepper', ['stage' => $item['stage']]) ?>
  <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mt-2">
    <span class="small <?= ($item['worksheet']['completion'] ?? '') === 'For Correction' ? 'text-warning' : 'text-muted' ?>"><?= esc($item['note']) ?></span>
    <?php if ($item['certificateReady']): ?>
      <a class="btn btn-sm btn-success" href="<?= site_url('customer/certificate/' . $item['id']) ?>" target="_blank" rel="noopener">View / download certificate (PDF)</a>
    <?php endif; ?>
  </div>
</div>
<?php endforeach; ?>

<p class="small text-muted">Every certificate carries a QR code. Scanning it opens a public page that confirms the certificate is authentic.</p>
<?= $this->endSection() ?>
