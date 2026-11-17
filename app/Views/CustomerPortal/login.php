<?= $this->extend('CustomerPortal/layout') ?>
<?= $this->section('title') ?>Log in<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="row justify-content-center">
  <div class="col-md-6 col-lg-5">
    <div class="card-portal p-4">
      <h1 class="h4 mb-1">Customer log in</h1>
      <p class="text-muted small mb-4">Submit calibration requests and follow them until your certificate is released.</p>
      <?php if ($error): ?><div class="alert alert-danger py-2"><?= esc($error) ?></div><?php endif; ?>
      <form method="post" action="<?= site_url('customer/login') ?>" autocomplete="off">
        <div class="mb-3">
          <label class="form-label" for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email" value="<?= esc($email) ?>" required autofocus>
        </div>
        <div class="mb-3">
          <label class="form-label" for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button class="btn btn-primary w-100" type="submit">Log in</button>
      </form>
      <hr>
      <p class="small mb-0 text-center">No account yet? <a href="<?= site_url('customer/register') ?>">Create a customer account</a></p>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
