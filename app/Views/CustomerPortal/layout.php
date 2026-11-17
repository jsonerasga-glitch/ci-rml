<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= esc($this->renderSection('title') ?: 'Customer Portal') ?> · RML Customer Portal</title>
  <link href="<?= base_url('/dashboardAsset/lib/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
  <style>
    :root { --brand: #14274E; --brand-2: #2a78d6; --surface: #ffffff; --bg: #f4f6fb; --border: #e3e7ef; --muted: #6b7280; }
    body { background: var(--bg); color: #111827; }
    .portal-nav { background: var(--brand); }
    .portal-nav .navbar-brand, .portal-nav .nav-link, .portal-nav .navbar-text { color: #f7f9fc !important; }
    .portal-nav .nav-link.active { text-decoration: underline; text-underline-offset: 6px; }
    .portal-nav img { height: 34px; background: #fff; border-radius: 6px; padding: 2px 4px; }
    .card-portal { background: var(--surface); border: 1px solid var(--border); border-radius: 12px; }
    .tile { background: var(--surface); border: 1px solid var(--border); border-radius: 12px; padding: 14px 16px; }
    .tile .t-label { font-size: .75rem; color: var(--muted); text-transform: uppercase; letter-spacing: .04em; }
    .tile .t-value { font-size: 1.7rem; font-weight: 700; line-height: 1.2; }
    .table-portal th { font-size: .78rem; text-transform: uppercase; letter-spacing: .03em; color: var(--muted); background: #f8fafc; }
    .table-portal td, .table-portal th { vertical-align: middle; }
    .stepper { display: flex; gap: 0; margin: 6px 0 2px; }
    .stepper .step { flex: 1; text-align: center; font-size: .7rem; color: var(--muted); position: relative; padding-top: 18px; }
    .stepper .step::before { content: ''; position: absolute; top: 5px; left: 50%; width: 12px; height: 12px; margin-left: -6px; border-radius: 50%; background: #d1d5db; z-index: 1; }
    .stepper .step::after { content: ''; position: absolute; top: 10px; left: -50%; width: 100%; height: 2px; background: #d1d5db; }
    .stepper .step:first-child::after { display: none; }
    .stepper .step.done { color: #065f46; }
    .stepper .step.done::before, .stepper .step.done::after { background: #10b981; }
    .stepper .step.current { color: var(--brand); font-weight: 700; }
    .stepper .step.current::before { background: var(--brand-2); box-shadow: 0 0 0 4px rgba(42,120,214,.2); }
    .stepper .step.current::after { background: #10b981; }
    .sample-flag { font-size: .7rem; }
    @media (max-width: 576px) { .stepper .step { font-size: .6rem; } }
  </style>
</head>
<body>
<?php $logged = (bool) session()->get('customerAccountId'); $uri = uri_string(); ?>
<nav class="navbar navbar-expand-md portal-nav mb-4">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center gap-2" href="<?= site_url($logged ? 'customer' : 'customer/login') ?>">
      <img src="<?= base_url('image/dost.png') ?>" alt="DOST">
      <span><strong>RML</strong> Customer Portal</span>
    </a>
    <?php if ($logged): ?>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav" aria-label="Menu"><span class="navbar-toggler-icon" style="filter:invert(1)"></span></button>
    <div class="collapse navbar-collapse" id="nav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link <?= $uri === 'customer' ? 'active' : '' ?>" href="<?= site_url('customer') ?>">My requests</a></li>
        <li class="nav-item"><a class="nav-link <?= $uri === 'customer/requests/new' ? 'active' : '' ?>" href="<?= site_url('customer/requests/new') ?>">New request</a></li>
      </ul>
      <span class="navbar-text me-3 small"><?= esc(session()->get('customerName')) ?> · <?= esc(session()->get('customerCompany')) ?></span>
      <a class="btn btn-sm btn-outline-light" href="<?= site_url('customer/logout') ?>">Log out</a>
    </div>
    <?php endif; ?>
  </div>
</nav>

<main class="container pb-5">
  <?php if ($n = session()->getFlashdata('notice')): ?>
    <div class="alert alert-info"><?= esc($n) ?></div>
  <?php endif; ?>
  <?= $this->renderSection('content') ?>
</main>

<footer class="container pb-4 small text-muted">
  DOST CALABARZON · Regional Metrology Laboratory · <a href="<?= site_url('/') ?>">Staff login</a>
</footer>
<script src="<?= base_url('/dashboardAsset/lib/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<?= $this->renderSection('scripts') ?>
</body>
</html>
