<?= $this->extend('CustomerPortal/layout') ?>
<?= $this->section('title') ?>My requests<?= $this->endSection() ?>
<?= $this->section('content') ?>
<?php use App\Libraries\CalibrationRequests as CR; ?>
<div class="d-flex flex-wrap justify-content-between align-items-end gap-2 mb-3">
  <div>
    <h1 class="h4 mb-0">Welcome, <?= esc($account['contact_person'] ?? '') ?></h1>
    <div class="text-muted small"><?= esc($account['company'] ?? '') ?></div>
  </div>
  <a class="btn btn-primary" href="<?= site_url('customer/requests/new') ?>">+ New calibration request</a>
</div>

<div class="row g-3 mb-4">
  <div class="col-6 col-md-3"><div class="tile"><div class="t-label">Waiting to be received</div><div class="t-value"><?= $counts['Submitted'] ?></div></div></div>
  <div class="col-6 col-md-3"><div class="tile"><div class="t-label">In progress</div><div class="t-value"><?= $counts['Received'] + $counts['In progress'] ?></div></div></div>
  <div class="col-6 col-md-3"><div class="tile"><div class="t-label">Completed</div><div class="t-value"><?= $counts['Completed'] ?></div></div></div>
  <div class="col-6 col-md-3"><div class="tile"><div class="t-label">Certificates ready</div><div class="t-value text-success"><?= $certs ?></div></div></div>
</div>

<div class="card-portal">
  <div class="p-3 border-bottom"><strong>My calibration requests</strong></div>
  <?php if (! $requests): ?>
    <div class="p-5 text-center text-muted">
      You have no requests yet.<br>
      <a class="btn btn-outline-primary mt-3" href="<?= site_url('customer/requests/new') ?>">Submit your first request</a>
    </div>
  <?php else: ?>
  <div class="table-responsive">
    <table class="table table-portal mb-0">
      <thead><tr><th>Request no.</th><th>Submitted</th><th>Instruments</th><th>Progress</th><th>Status</th><th></th></tr></thead>
      <tbody>
      <?php foreach ($requests as $r):
          $total = count($r['items']);
          $done  = count(array_filter($r['items'], static fn ($i) => $i['stage'] >= 4));
          $pct   = $total ? round(100 * $done / $total) : 0; ?>
        <tr>
          <td class="text-nowrap"><a href="<?= site_url('customer/requests/' . $r['id']) ?>"><strong><?= esc($r['request_no']) ?></strong></a></td>
          <td class="small"><?= esc(date('d M Y', strtotime($r['created_at']))) ?></td>
          <td class="small"><?php foreach (array_count_values(array_column($r['items'], 'processLabel')) as $label => $n): ?><?= esc($label) ?> × <?= $n ?><br><?php endforeach; ?></td>
          <td style="min-width:150px">
            <div class="progress" style="height:8px" role="progressbar" aria-valuenow="<?= $pct ?>" aria-valuemin="0" aria-valuemax="100"><div class="progress-bar bg-success" style="width:<?= $pct ?>%"></div></div>
            <div class="small text-muted mt-1"><?= $done ?> of <?= $total ?> approved</div>
          </td>
          <td><?= CR::statusBadge($r['displayStatus']) ?></td>
          <td class="text-end"><a class="btn btn-sm btn-outline-primary" href="<?= site_url('customer/requests/' . $r['id']) ?>">Track</a></td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <?php endif; ?>
</div>
<?= $this->endSection() ?>
