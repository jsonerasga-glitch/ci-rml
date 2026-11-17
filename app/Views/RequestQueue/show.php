<!DOCTYPE html>
<html lang="en">
<?= view('layouts/head-essential'); ?>
<?php use App\Libraries\CalibrationRequests as CR; ?>
<style>
  .rq-table th { font-size:.75rem; text-transform:uppercase; color:#52514e; background:#f7f9fd; }
  .rq-meta .text-muted { font-size:.75rem; text-transform:uppercase; letter-spacing:.03em; }
</style>
<body class="skin-dark animate">
<?= view('layouts/sidebarAdmin', ['active' => 'requestQueue', 'show' => 'requestQueue']) ?>
<div class="content">
  <div class="content-header">
    <a id="contentMenu" href="#" class="content-menu d-none d-lg-flex"><i data-feather="menu"></i></a>
    <a id="mobileMenu" href="#" class="content-menu d-lg-none"><i data-feather="menu"></i></a>
  </div>
  <div class="content-body">
    <a href="<?= site_url('requests') ?>" class="small">&larr; Customer Requests</a>
    <label class="content-label d-block mt-2"><b>Request <?= esc($request['request_no']) ?></b> <?= CR::statusBadge($displayStatus) ?></label>
    <hr>
    <?php if ($n = session()->getFlashdata('notice')): ?><div class="alert alert-info py-2"><?= esc($n) ?></div><?php endif; ?>

    <div class="card mb-3"><div class="card-body rq-meta">
      <div class="row g-3 small">
        <div class="col-md-4"><div class="text-muted">Customer</div><strong><?= esc($request['company']) ?></strong><br><?= esc($request['address']) ?></div>
        <div class="col-md-4"><div class="text-muted">Contact</div><?= esc($request['contact_person']) ?><br><?= esc($request['contact_phone']) ?><?= $account ? '<br>' . esc($account['email']) : '' ?></div>
        <div class="col-md-4"><div class="text-muted">Schedule</div><?= esc($request['place_of_calibration']) ?><br>Preferred: <?= $request['preferred_date'] ? esc(date('d M Y', strtotime($request['preferred_date']))) : '—' ?></div>
        <div class="col-md-4"><div class="text-muted">Submitted</div><?= esc(date('d M Y g:i A', strtotime($request['created_at']))) ?></div>
        <div class="col-md-4"><div class="text-muted">Received</div><?= $request['received_at'] ? esc(date('d M Y g:i A', strtotime($request['received_at']))) . ' by ' . esc($request['received_by']) : '—' ?></div>
        <div class="col-md-4"><div class="text-muted">Customer remarks</div><?= esc($request['remarks'] ?: '—') ?></div>
        <?php if ($request['staff_remarks']): ?><div class="col-12"><div class="text-muted">Laboratory remarks</div><?= esc($request['staff_remarks']) ?></div><?php endif; ?>
      </div>
    </div></div>

    <?php if ($request['status'] === 'Submitted'): ?>
    <div class="card mb-3 border-primary"><div class="card-body">
      <form method="post" action="<?= site_url('requests/' . $request['id'] . '/receive') ?>" class="row g-2 align-items-end">
        <div class="col-md-8"><label class="form-label small mb-1" for="staff_remarks">Remarks to the customer (optional)</label>
          <input class="form-control form-control-sm" id="staff_remarks" name="staff_remarks" maxlength="2000"></div>
        <div class="col-md-4 d-flex gap-2">
          <button class="btn btn-primary btn-sm" type="submit">Receive request</button>
          <button class="btn btn-outline-danger btn-sm" type="submit" formaction="<?= site_url('requests/' . $request['id'] . '/reject') ?>" onclick="return confirm('Decline this request?')">Decline</button>
        </div>
      </form>
      <div class="small text-muted mt-2">Receiving confirms the instruments were accepted. Worksheets can be created after that.</div>
    </div></div>
    <?php endif; ?>

    <div class="card">
      <div class="table-responsive">
        <table class="table rq-table mb-0">
          <thead><tr><th>#</th><th>Calibration process</th><th>Instrument</th><th>Stage</th><th>Worksheet</th></tr></thead>
          <tbody>
          <?php foreach ($items as $i => $item): ?>
            <tr>
              <td><?= $i + 1 ?></td>
              <td><?= esc($item['processLabel']) ?></td>
              <td><strong><?= esc($item['equipment_description']) ?></strong>
                <div class="small text-muted"><?= esc(implode(' · ', array_filter([$item['manufacturer'], $item['model'], $item['serial_number'] ? 'S/N ' . $item['serial_number'] : '', $item['equipment_id'] ? 'ID ' . $item['equipment_id'] : '', $item['capacity_range']]))) ?></div></td>
              <td><?= CR::statusBadge($item['stageLabel']) ?><div class="small text-muted"><?= esc($item['note']) ?></div></td>
              <td>
                <?php if ($item['worksheet_id']): ?>
                  <a class="btn btn-sm btn-outline-primary" href="<?= CR::worksheetUrl($item['module'], (int) $item['worksheet_id']) ?>">Open worksheet #<?= (int) $item['worksheet_id'] ?></a>
                  <?php if (! empty($item['worksheet']['certificateNumber'])): ?><div class="small text-muted"><?= esc($item['worksheet']['certificateNumber']) ?></div><?php endif; ?>
                <?php elseif ($request['status'] === 'Received'): ?>
                  <form method="post" action="<?= site_url('requests/item/' . $item['id'] . '/worksheet') ?>">
                    <button class="btn btn-sm btn-success" type="submit">Create worksheet</button>
                  </form>
                <?php else: ?>
                  <span class="small text-muted">—</span>
                <?php endif; ?>
              </td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <p class="small text-muted mt-2">Creating a worksheet fills in the customer, request number (as TSR No.) and instrument details. The customer sees each stage update automatically: calibration → verification → approved → certificate released (after the final certificate is printed).</p>
  </div>
</div>
</body>
</html>
<?= view('layouts/footer-essential'); ?>
