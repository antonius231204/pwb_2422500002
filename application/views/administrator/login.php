<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title; ?> | Log in</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css'); ?>">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?= base_url('admin'); ?>"><b>Admin</b>LTE</a>
  </div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <?php if ($this->session->flashdata('message')) : ?>
        <?= $this->session->flashdata('message') ?>
      <?php endif ?>

      <form action="" method="post">
        <div class="mb-3">
          <div class="input-group">
            <input class="form-control" id="inputUsername" name="inputUsername" type="text"
                   placeholder="Username" value="<?= set_value('inputUsername'); ?>" required>
            <div class="input-group-append">
              <div class="input-group-text"><span class="fas fa-envelope"></span></div>
            </div>
          </div>
          <small class="text-danger"><em><?= form_error('inputUsername') ?></em></small>
        </div>
        <div class="mb-3">
          <div class="input-group">
            <input class="form-control" id="inputPassword" name="inputPassword" type="password"
                   placeholder="Password" required>
            <div class="input-group-append">
              <div class="input-group-text"><span class="fas fa-lock"></span></div>
            </div>
          </div>
          <small class="text-danger"><em><?= form_error('inputPassword') ?></em></small>
        </div>
        <div class="row">
          <div class="col-4">
            <input type="submit" class="btn btn-primary btn-block" value="Login">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="<?= base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?= base_url('assets/dist/js/adminlte.min.js'); ?>"></script>
</body>
</html>
