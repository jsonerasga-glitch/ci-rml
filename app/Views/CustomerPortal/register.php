<?= $this->extend('CustomerPortal/layout') ?>
<?= $this->section('title') ?>Create account<?= $this->endSection() ?>
<?= $this->section('content') ?>
<?php $o = static fn ($k) => esc($old[$k] ?? ''); ?>
<div class="row justify-content-center">
  <div class="col-lg-7">
    <div class="card-portal p-4">
      <h1 class="h4 mb-1">Create a customer account</h1>
      <p class="text-muted small mb-4">Your company details are printed on your calibration certificates, so enter them exactly as they should appear.</p>
      <?php if ($errors): ?>
        <div class="alert alert-danger py-2"><ul class="mb-0"><?php foreach ($errors as $e): ?><li><?= esc($e) ?></li><?php endforeach; ?></ul></div>
      <?php endif; ?>
      <form method="post" action="<?= site_url('customer/register') ?>" autocomplete="off">
        <div class="row g-3">
          <div class="col-12"><label class="form-label" for="company">Company / institution name</label>
            <input class="form-control" id="company" name="company" value="<?= $o('company') ?>" required></div>
          <div class="col-12"><label class="form-label" for="address">Address</label>
            <input class="form-control" id="address" name="address" value="<?= $o('address') ?>" placeholder="Street, barangay, city, province" required></div>
          <div class="col-md-6"><label class="form-label" for="contact_person">Contact person</label>
            <input class="form-control" id="contact_person" name="contact_person" value="<?= $o('contact_person') ?>" required></div>
          <div class="col-md-6"><label class="form-label" for="phone">Phone</label>
            <input class="form-control" id="phone" name="phone" value="<?= $o('phone') ?>"></div>
          <div class="col-12"><label class="form-label" for="email">Email (your login)</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $o('email') ?>" required></div>
          <div class="col-md-6"><label class="form-label" for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" minlength="8" required>
            <div class="form-text">At least 8 characters.</div></div>
          <div class="col-md-6"><label class="form-label" for="password_confirm">Confirm password</label>
            <input type="password" class="form-control" id="password_confirm" name="password_confirm" minlength="8" required></div>
        </div>
        <button class="btn btn-primary mt-4" type="submit">Create account</button>
        <a class="btn btn-link mt-4" href="<?= site_url('customer/login') ?>">I already have an account</a>
      </form>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
