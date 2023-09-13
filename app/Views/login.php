<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta19
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Sign in with cover - Tabler - Premium and Open Source dashboard template with responsive and high quality UI.</title>
  <!-- CSS files -->
  <link href="<?= site_url('assets') ?>/css/tabler.min.css?1684106062" rel="stylesheet" />
  <link href="<?= site_url('assets') ?>/css/tabler-flags.min.css?1684106062" rel="stylesheet" />
  <link href="<?= site_url('assets') ?>/css/tabler-payments.min.css?1684106062" rel="stylesheet" />
  <link href="<?= site_url('assets') ?>/css/tabler-vendors.min.css?1684106062" rel="stylesheet" />
  <link href="<?= site_url('assets') ?>/css/demo.min.css?1684106062" rel="stylesheet" />
  <style>
    @import url('https://rsms.me/inter/inter.css');

    :root {
      --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
    }

    body {
      font-feature-settings: "cv03", "cv04", "cv11";
    }
  </style>
</head>

<body class=" d-flex flex-column bg-white">
  <script src="<?= site_url('assets') ?>/js/demo-theme.min.js?1684106062"></script>
  <div class="row g-0 flex-fill">
    <div class="col-12 col-lg-6 col-xl-4 border-top-wide border-primary d-flex flex-column justify-content-center">
      <div class="container container-tight my-5 px-lg-5">
        <div class="text-center mb-4">
          <a href="#" class="navbar-brand navbar-brand-autodark"><img src="<?= site_url('assets') ?>/img/brand.svg" height="36" alt="Apotech"></a>
        </div>
        <?php if (session()->getFlashdata('success')) : ?>
          <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('success') ?>
          </div>
        <?php endif ?>
        <?php if (session()->getFlashdata('login')) : ?>
          <div class="alert alert-danger" role="alert">
            <?= session()->getFlashdata('login') ?>
          </div>
        <?php endif ?>
        <?php
        $errors = session()->getFlashdata('errors');
        if (!empty($errors)) : ?>
          <div class="alert alert-danger" role="alert">
            <ul>
              <?php foreach ($errors as $error) : ?>
                <li><?= esc($error) ?></li>
              <?php endforeach ?>
            </ul>
          </div>
        <?php endif ?>
        <h2 class="h3 text-center mb-3">
          Login to your account
        </h2>
        <form action="<?= site_url() ?>login" method="post" autocomplete="off" novalidate>
          <div class="mb-3">
            <label class="form-label">username</label>
            <input type="text" class="form-control" name="username" placeholder="@username" autocomplete="off">
          </div>
          <div class="mb-2">
            <label class="form-label">
              Password
              <span class="form-label-description">
                <a href="#">I forgot password</a>
              </span>
            </label>
            <div class="input-group input-group-flat">
              <input type="password" class="form-control" name="password" placeholder="Your password" autocomplete="off">
              <span class="input-group-text">
                <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                    <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                  </svg>
                </a>
              </span>
            </div>
          </div>
          <div class="mb-2">
            <label class="form-check">
              <input type="checkbox" class="form-check-input" />
              <span class="form-check-label">Remember me on this device</span>
            </label>
          </div>
          <div class="form-footer">
            <button type="submit" class="btn btn-primary w-100">Sign in</button>
          </div>
        </form>
        <div class="text-center text-muted mt-3">
          Don't have account yet? <a href="<?= site_url() ?>create-account" tabindex="-1">Sign up</a>
        </div>
      </div>
    </div>
    <div class="col-12 col-lg-6 col-xl-8 d-none d-lg-block">
      <!-- Photo -->
      <div class="bg-cover h-100 min-vh-100" style="background-image: url(<?= site_url('assets') ?>/img/campaign-creators.jpg)"></div>
    </div>
  </div>
  <!-- Libs JS -->
  <!-- Tabler Core -->
  <script src="<?= site_url('assets') ?>/js/tabler.min.js?1684106062" defer></script>
  <script src="<?= site_url('assets') ?>/js/demo.min.js?1684106062" defer></script>
</body>

</html>