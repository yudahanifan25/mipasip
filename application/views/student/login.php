  <!DOCTYPE html>
  <html>

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <title><?php echo $this->config->item('app_name') ?> | Login Mahasiswa</title>
    <link rel="icon" type="image/png" href="<?php echo media_url('img/mipa_logo.png') ?>">
    <link href="<?php echo media_url() ?>css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo media_url() ?>css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?php echo media_url() ?>css/login.css" rel="stylesheet" />
  </head>

  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">

      <div class="col-md-12">
        <div class="navbar-header">
          <?php if (isset($setting_school) and $setting_school['setting_value'] == '-') { ?>
            <a class="navbar-brand" href="<?php echo site_url(); ?>"><span class='fa fa-google-wallet' aria-hidden='true'></span>&nbsp;<b> <?php echo $this->config->item('app_name') ?></b></a>
            <a class="navbar-brand" href="<?php echo site_url('./home'); ?>"><span class='fa fa-shopping-cart' aria-hidden='true'></span>&nbsp;<b></b></a>
          <?php } else { ?>
            <a class="navbar-brand" href="<?php echo site_url(); ?>"><span class='fa fa-google-wallet' aria-hidden='true'></span>&nbsp;<b> <?php echo $this->config->item('app_name') ?></b></a>
            <a class="navbar-brand" href="<?php echo site_url('./home'); ?>"><span class='fa fa-shopping-cart' aria-hidden='true'></span>&nbsp;<b></b>Cek Pembayaran Mahasiswa</a>
          <?php } ?>
        </div>
      </div>
    </nav>
    <div class="kontainer">
      <div class="kotak">
        <div class="wrapper">
          <br>
          <p style="padding: 8px 0px; text-align-last: center;">
            <img src="<?php echo media_url('img/mipa_logo.png') ?>" align="center" height="80">
          </p>
          <div class="title text-left"><span> <b><?php echo $this->config->item('app_name') ?></b></span></i></div>
          <?php echo form_open('student/auth/login', array('class' => 'login100-form validate-form')); ?>
          <div class="row">
            <i class="fa fa-user"></i>
            <input type="text" required="" autofocus="" name="nis" placeholder="Nomor Pokok Mahasiswa" class="form-control flat">
          </div>
          <div class="row">
            <i class="fa fa-lock"></i>
            <input type="password" required="" name="password" placeholder="Password" class="form-control flat">
          </div>

          <div class="row" style="margin-bottom: -12px;">
            <button class="btn btn-login"><span class="fa fa-random"></span> &nbsp;<b>LOGIN MAHASISWA</b></button>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
    <div class="navbar navbar-inverse navbar-fixed-bottom">
      <p class="navbar-text text-center"><strong>Copyright © <?php echo $this->config->item('created') ?> | <?php echo $this->config->item('app_name') ?>.</strong>
        All rights reserved.</p>
    </div>
    </div>
  </body>

  </html>