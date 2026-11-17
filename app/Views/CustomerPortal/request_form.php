<?= $this->extend('CustomerPortal/layout') ?>
<?= $this->section('title') ?>New request<?= $this->endSection() ?>
<?= $this->section('content') ?>
<?php
$oldItems = array_values((array) ($old['items'] ?? [])) ?: [[]];
$v = static fn ($k, $d = '') => esc($old[$k] ?? $d);
?>
<h1 class="h4 mb-3">New calibration request</h1>
<?php if ($errors): ?>
  <div class="alert alert-danger py-2"><ul class="mb-0"><?php foreach ($errors as $e): ?><li><?= esc($e) ?></li><?php endforeach; ?></ul></div>
<?php endif; ?>

<form method="post" action="<?= site_url('customer/requests') ?>" id="requestForm">
  <div class="card-portal p-4 mb-3">
    <h2 class="h6 text-uppercase text-muted mb-3">1. Customer &amp; schedule</h2>
    <div class="row g-3">
      <div class="col-md-6"><label class="form-label">Company</label><input class="form-control" value="<?= esc($account['company']) ?>" disabled></div>
      <div class="col-md-6"><label class="form-label">Address</label><input class="form-control" value="<?= esc($account['address']) ?>" disabled></div>
      <div class="col-md-4"><label class="form-label" for="contact_person">Contact person</label><input class="form-control" id="contact_person" name="contact_person" value="<?= $v('contact_person', $account['contact_person']) ?>"></div>
      <div class="col-md-4"><label class="form-label" for="contact_phone">Contact phone</label><input class="form-control" id="contact_phone" name="contact_phone" value="<?= $v('contact_phone', $account['phone']) ?>"></div>
      <div class="col-md-4"><label class="form-label" for="preferred_date">Preferred date</label><input type="date" class="form-control" id="preferred_date" name="preferred_date" value="<?= $v('preferred_date') ?>" min="<?= date('Y-m-d') ?>"></div>
      <div class="col-md-4"><label class="form-label" for="place">Place of calibration</label>
        <select class="form-select" id="place" name="place_of_calibration">
          <option value="In-laboratory" <?= ($old['place_of_calibration'] ?? '') !== 'On-site' ? 'selected' : '' ?>>In-laboratory (we bring the instruments)</option>
          <option value="On-site" <?= ($old['place_of_calibration'] ?? '') === 'On-site' ? 'selected' : '' ?>>On-site (at our premises)</option>
        </select></div>
      <div class="col-md-8"><label class="form-label" for="remarks">Remarks (optional)</label><input class="form-control" id="remarks" name="remarks" value="<?= $v('remarks') ?>" maxlength="2000"></div>
    </div>
  </div>

  <div class="card-portal p-4 mb-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h2 class="h6 text-uppercase text-muted mb-0">2. Instruments &amp; calibration process</h2>
      <button type="button" class="btn btn-sm btn-outline-primary" id="addRow">+ Add instrument</button>
    </div>
    <div id="rows">
      <?php foreach ($oldItems as $i => $it): $g = static fn ($k) => esc($it[$k] ?? ''); ?>
      <div class="item-row border rounded-3 p-3 mb-3">
        <div class="d-flex justify-content-between mb-2"><strong class="row-title">Instrument <?= $i + 1 ?></strong>
          <button type="button" class="btn btn-sm btn-link text-danger remove-row">Remove</button></div>
        <div class="row g-2">
          <div class="col-md-4"><label class="form-label small">Calibration process *</label>
            <select class="form-select" data-name="module" required>
              <option value="">Choose…</option>
              <?php foreach ($processes as $key => $label): ?>
                <option value="<?= esc($key) ?>" <?= ($it['module'] ?? '') === $key ? 'selected' : '' ?>><?= esc($label) ?></option>
              <?php endforeach; ?>
            </select></div>
          <div class="col-md-8"><label class="form-label small">Equipment description *</label>
            <input class="form-control" data-name="equipment_description" value="<?= $g('equipment_description') ?>" placeholder="e.g. Analytical balance, 220 g" required></div>
          <div class="col-md-3"><label class="form-label small">Manufacturer</label><input class="form-control" data-name="manufacturer" value="<?= $g('manufacturer') ?>"></div>
          <div class="col-md-3"><label class="form-label small">Model</label><input class="form-control" data-name="model" value="<?= $g('model') ?>"></div>
          <div class="col-md-2"><label class="form-label small">Serial no.</label><input class="form-control" data-name="serial_number" value="<?= $g('serial_number') ?>"></div>
          <div class="col-md-2"><label class="form-label small">Equipment ID</label><input class="form-control" data-name="equipment_id" value="<?= $g('equipment_id') ?>"></div>
          <div class="col-md-2"><label class="form-label small">Capacity / range</label><input class="form-control" data-name="capacity_range" value="<?= $g('capacity_range') ?>"></div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>

  <button class="btn btn-primary" type="submit">Submit request</button>
  <a class="btn btn-link" href="<?= site_url('customer') ?>">Cancel</a>
</form>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
(function () {
  var rows = document.getElementById('rows');
  function renumber() {
    rows.querySelectorAll('.item-row').forEach(function (row, i) {
      row.querySelector('.row-title').textContent = 'Instrument ' + (i + 1);
      row.querySelectorAll('[data-name]').forEach(function (el) { el.name = 'items[' + i + '][' + el.getAttribute('data-name') + ']'; });
      row.querySelector('.remove-row').style.visibility = rows.children.length > 1 ? 'visible' : 'hidden';
    });
  }
  document.getElementById('addRow').addEventListener('click', function () {
    var last = rows.querySelector('.item-row:last-child'), copy = last.cloneNode(true);
    copy.querySelectorAll('input').forEach(function (el) { el.value = ''; });
    copy.querySelector('select').value = last.querySelector('select').value; // same process is the common case
    rows.appendChild(copy); renumber(); copy.querySelector('input').focus();
  });
  rows.addEventListener('click', function (e) {
    if (e.target.classList.contains('remove-row') && rows.children.length > 1) { e.target.closest('.item-row').remove(); renumber(); }
  });
  renumber();
})();
</script>
<?= $this->endSection() ?>
