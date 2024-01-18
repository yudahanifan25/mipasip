<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $this->config->item('app_name') ?> <?php echo isset($title) ? ' | ' . $title : null; ?></title>
  <link rel="icon" type="image/png" href="<?php echo media_url('img/mipa_logo.png') ?>">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo media_url() ?>/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo media_url() ?>/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo media_url() ?>/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo media_url() ?>/css/style.css">
  <link rel="stylesheet" href="<?php echo media_url() ?>/css/load-font-googleapis.css">
  <!-- <link rel="stylesheet" href="<?php echo media_url() ?>css/jquery.notyfy.css"> -->
  <link rel="stylesheet" href="<?php echo media_url() ?>css/jquery.toast.css">
  <link rel="stylesheet" href="<?php echo media_url() ?>/css/skin-purple-light.css">
  <link rel="stylesheet" href="<?php echo media_url() ?>/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="<?php echo media_url() ?>/css/daterangepicker.css">
  <link href="<?php echo base_url('/media/js/fullcalendar/fullcalendar.css'); ?>" rel="stylesheet">
  <script src="<?php echo media_url() ?>/js/jquery.min.js"></script>
  <script src="<?php echo media_url() ?>/js/angular.min.js"></script>
  <script src="<?php echo media_url() ?>/js/jquery-ui.min.js"></script>
  <script src="<?php echo media_url() ?>/js/jquery.inputmask.bundle.js"></script>
  <script src="<?php echo base_url('/media/js/fullcalendar/fullcalendar.js'); ?>"></script>
</head>

<body class="hold-transition skin-purple-light fixed sidebar-mini" <?php echo isset($ngapp) ? $ngapp : null; ?>>
  <div class="wrapper">
    <header class="main-header">
      <a href="<?php site_url('manage') ?>" class="logo">
        <?php if (!empty(logo())) { ?>
          <span class="logo-mini"></span>
        <?php } else { ?>
          <span class="logo-mini"></span>
        <?php } ?>
        <?php if (!empty(logo())) { ?>
          <span class="logo-lg">
           <img src="<?php echo media_url('img/mipa_logo.png') ?>" align="center" height="40">
              <b style="font-family: Abel;">&nbsp;<?php echo $this->config->item('app_name') ?></b>
            </span>
          </span>
        <?php } else { ?>
          <span class="logo-lg"><b>&nbsp;<?php echo $this->config->item('app_name') ?></b></span>
        <?php } ?>
      </a>
      <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php if ($this->session->userdata('student_img') != null) { ?>
                  <img src="<?php echo upload_url() . '/student/' . $this->session->userdata('student_img'); ?>" class="user-image">
                <?php } else { ?>
                  <img src="<?php echo media_url() ?>img/user.png" class="user-image">
                <?php } ?>
                <span class="hidden-xs"><?php echo ucfirst($this->session->userdata('ufullname_student')); ?></span>
              </a>
              <ul class="dropdown-menu">
                <li class="user-header">
                  <?php if ($this->session->userdata('student_img') != null) { ?>
                    <img src="<?php echo upload_url() . '/student/' . $this->session->userdata('student_img'); ?>" class="img-circle">
                  <?php } else { ?>
                    <img src="<?php echo media_url() ?>img/user.png" class="img-circle">
                  <?php } ?>
                  <p>
                    <?php echo ucfirst($this->session->userdata('ufullname_student')); ?>
                    <small><?php echo $this->session->userdata('unis_student'); ?></small>
                  </p>
                </li>
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="<?php echo site_url('student/profile') ?>" class="btn btn-default btn-flat">Profil</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?php echo site_url('student/auth/logout?location=' . htmlspecialchars($_SERVER['REQUEST_URI'])) ?>" class="btn btn-default btn-flat">Keluar</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <?php $files = glob('media/barcode_student/*');
    foreach ($files as $file) { // iterate files
      if (is_file($file))
        unlink($file); // delete file
    } ?>
    <?php $this->load->view('student/sidebar'); ?>
    <?php isset($main) ? $this->load->view($main) : null; ?>
    <footer class="main-footer">
      <div class="pull-right hidden-xs">
         <b><?php echo $this->config->item('app_name') ?></b> | <strong><?php echo $this->config->item('version') ?>
      </div>
      <strong>Copyright © <?php echo $this->config->item('created') ?> </strong>
      All rights reserved.
    </footer>
    <div class="navbar navbar-default navbar-fixed-bottom hidden-lg hidden-md hidden-sm">
      <div class="bott-bar hidden-lg hidden-md hidden-sm">
        <div class="pos-bar">
          <a class="content-bar <?php echo ($this->uri->segment(1) == 'student' && $this->uri->segment(2) == NULL) ? 'active' : '' ?>" href="<?php echo site_url('student') ?>" data-toggle="tooltip" title="Dashboard">
            <div class="group-bot-bar">
              <i class="fa fa-tachometer icon-bot-bar"></i>
            </div>
          </a>
          <a class="content-bar <?php echo ($this->uri->segment(2) == 'payout' and $this->uri->segment(3) == '') ? 'active' : '' ?>" href="<?php echo site_url('student/payout') ?>" data-toggle="tooltip" title="Rincian Pembayaran">
            <div class="group-bot-bar">
              <i class="fa fa-shopping-cart icon-bot-bar"></i>
            </div>
          </a>
          <a class="content-bar <?php echo ($this->uri->segment(3) == 'log') ? 'active' : '' ?>" href="<?php echo site_url('student/payout/log') ?>" data-toggle="tooltip" title="Transaksi Terakhir">
            <div class="group-bot-bar">
              <i class="fa fa-align-center icon-bot-bar"></i>
            </div>
          </a>
          <a class="content-bar <?php echo ($this->uri->segment(2) == 'profile' && $this->uri->segment(3) == NULL) ? 'active' : '' ?>" href="<?php echo site_url('student/profile') ?>" data-toggle="tooltip" title="Profil">
            <div class="group-bot-bar">
              <i class="fa fa-user icon-bot-bar"></i>
            </div>
          </a>
          <a class="content-bar" href="<?php echo site_url('student/auth/logout?location=' . htmlspecialchars($_SERVER['REQUEST_URI'])) ?>" data-toggle="tooltip" title="Keluar">
            <div class="group-bot-bar">
              <i class="fa fa-sign-out icon-bot-bar"></i>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
  <!-- jQuery 3 -->
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 3.3.7 -->
  <!-- <script src="<?php echo media_url() ?>/js/jquery.min.js"></script> -->
  <script src="<?php echo media_url() ?>/js/bootstrap.min.js"></script>
  <script src="<?php echo media_url() ?>/js/moment.min.js"></script>
  <script src="<?php echo media_url() ?>/js/fullcalendar.min.js"></script>
  <!-- daterangepicker -->
  <script src="<?php echo media_url() ?>/js/daterangepicker.js"></script>
  <!-- datepicker -->
  <script src="<?php echo media_url() ?>/js/bootstrap-datepicker.min.js"></script>
  <!-- SlimScroll -->
  <script src="<?php echo media_url() ?>/js/jquery.slimscroll.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo media_url() ?>/js/adminlte.min.js"></script>
  <script src="<?php echo media_url() ?>/js/jquery.toast.js"></script>
  <!-- Notyfy JS -->
  <!-- <script src="<?php echo media_url() ?>js/jquery.notyfy.js"></script> -->
  <script>
    $(".input-group.date").datepicker({
      autoclose: true,
      todayHighlight: true
    });
  </script>
  <?php if ($this->session->flashdata('success')) { ?>
    <script>
      $(function() {
        notyfy({
          layout: 'top',
          type: 'success',
          showEffect: function(bar) {
            bar.animate({
              height: 'toggle'
            }, 500, 'swing');
          },
          hideEffect: function(bar) {
            bar.animate({
              height: 'toggle'
            }, 500, 'swing');
          },
          timeout: 3000,
          text: '<?php echo $this->session->flashdata('success') ?>'
        });
      });
    </script>
  <?php } ?>
  <script>
    $(function separator() {
      $('.numeric').inputmask("numeric", {
        removeMaskOnSubmit: true,
        radixPoint: ".",
        groupSeparator: ",",
        digits: 2,
        autoGroup: true,
        prefix: 'Rp ', //Space after $, this will not truncate the first character.
        rightAlign: false,
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      $('[data-toggle="tooltip"]').tooltip();
    });
  </script>
</body>

</html>