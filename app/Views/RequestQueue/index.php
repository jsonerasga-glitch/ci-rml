<!DOCTYPE html>
<html lang="en">
<?= view('layouts/head-essential'); ?>
<?php use App\Libraries\CalibrationRequests as CR; ?>
<style>
  .rq-tile { background:#fff; border:1px solid #e3e7ef; border-radius:10px; padding:10px 14px; text-decoration:none; color:inherit; display:block; }
  .rq-tile.on { border-color:#2a78d6; box-shadow:0 0 0 2px rgba(42,120,214,.15); }
  .rq-tile .t-label { font-size:.72rem; color:#52514e; text-transform:uppercase; letter-spacing:.03em; }
  .rq-tile .t-value { font-size:1.5rem; font-weight:700; }
  .rq-table th { font-size:.75rem; text-transform:uppercase; color:#52514e; background:#f7f9fd; }
</style>
<body class="skin-dark animate">
<?= view('layouts/sidebarAdmin', ['active' => 'requestQueue', 'show' => 'requestQueue']) ?>
<div class="content">
  <div class="content-header">
    <a id="contentMenu" href="#" class="content-menu d-none d-lg-flex"><i data-feather="menu"></i></a>
    <a id="mobileMenu" href="#" class="content-menu d-lg-none"><i data-feather="menu"></i></a>
  </div>
  <div class="content-body">
    <label class="content-label"><b>Customer Requests</b> <span class="text-muted small">— staff queue of requests submitted through the customer portal</span></label>
    <hr>
    <div class="row g-2 mb-3">
      <?php $tiles = ['' => 'All', 'Submitted' => 'New (to receive)', 'Received' => 'Received', 'In progress' => 'In progress', 'Completed' => 'Completed', 'Cancelled' => 'Cancelled'];
      foreach ($tiles as $key => $label): $n = $key === '' ? array_sum($counts) : $counts[$key]; ?>
        <div class="col-6 col-md-2"><a class="rq-tile <?= $filter === $key ? 'on' : '' ?>" href="<?= site_url('requests' . ($key !== '' ? '?status=' . urlencode($key) : '')) ?>">
          <div class="t-label"><?= esc($label) ?></div><div class="t-value <?= $key === 'Submitted' && $n ? 'text-danger' : '' ?>"><?= $n ?></div></a></div>
      <?php endforeach; ?>
    </div>

    <div class="card">
      <div class="table-responsive">
        <table class="table rq-table mb-0">
          <thead><tr><th>Request no.</th><th>Customer</th><th>Submitted</th><th>Place</th><th>Instruments</th><th>Worksheets</th><th>Status</th><th></th></tr></thead>
          <tbody>
          <?php if (! $requests): ?>
            <tr><td colspan="8" class="text-center text-muted py-4">No requests<?= $filter ? ' with status “' . esc($filter) . '”' : '' ?>.</td></tr>
          <?php endif; ?>
          <?php foreach ($requests as $r):
              $made = count(array_filter($r['items'], static fn ($i) => $i['worksheet_id'])); ?>
            <tr>
              <td><a href="<?= site_url('requests/' . $r['id']) ?>"><strong><?= esc($r['request_no']) ?></strong></a></td>
              <td><?= esc($r['company']) ?><div class="small text-muted"><?= esc($r['address']) ?></div></td>
              <td class="small"><?= esc(date('d M Y g:i A', strtotime($r['created_at']))) ?></td>
              <td class="small"><?= esc($r['place_of_calibration']) ?></td>
              <td class="small"><?php foreach (array_count_values(array_column($r['items'], 'processLabel')) as $label => $n): ?><?= esc($label) ?> × <?= $n ?><br><?php endforeach; ?></td>
              <td class="small"><?= $made ?> / <?= count($r['items']) ?></td>
              <td><?= CR::statusBadge($r['displayStatus']) ?></td>
              <td><a class="btn btn-sm <?= $r['displayStatus'] === 'Submitted' ? 'btn-primary' : 'btn-outline-primary' ?>" href="<?= site_url('requests/' . $r['id']) ?>"><?= $r['displayStatus'] === 'Submitted' ? 'Review' : 'Open' ?></a></td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</body>
</html>
<?= view('layouts/footer-essential'); ?>
