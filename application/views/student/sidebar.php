<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <?php if ($this->session->userdata('student_img') != null) { ?>
          <img src="<?php echo upload_url() . '/student/' . $this->session->userdata('student_img'); ?>" class="img-circle">
        <?php } else { ?>
          <img src="<?php echo media_url() ?>img/user.png" class="img-circle">
        <?php } ?>
      </div>
      <div class="pull-left info">
        <p><?php echo ucfirst($this->session->userdata('ufullname_student')); ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> <?php echo $this->session->userdata('unis_student'); ?></a>
      </div>
    </div>
    <!--
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
          </button>
        </span>
      </div>
    </form>
  -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MENU UTAMA</li>
      <li class="<?php echo ($this->uri->segment(2) == 'dashboard' or $this->uri->segment(2) == NULL) ? 'active' : '' ?>">
        <a href="<?php echo site_url('student'); ?>">
          <i class="fa fa-tachometer"></i> <span>Dashboard</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
      <li class="<?php echo ($this->uri->segment(2) == 'profile') ? 'active' : '' ?>">
        <a href="<?php echo site_url('student/profile'); ?>">
          <i class="fa fa-user"></i> <span>Profil Mahasiswa</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
      <li class="<?php echo ($this->uri->segment(2) == 'payout' and $this->uri->segment(3) == '') ? 'active' : '' ?>">
        <a href="<?php echo site_url('student/payout'); ?>">
          <i class="fa fa-shopping-cart"></i> <span>Rincian Tagihan Mahasiswa</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
      <li class="<?php echo ($this->uri->segment(3) == 'log') ? 'active' : '' ?>">
        <a href="<?php echo site_url('student/payout/log'); ?>">
          <i class="fa fa-google-wallet"></i> <span>Transaksi Terakhir</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
      <li class="header">USER</li>
      <li>
        <a href="<?php echo site_url('student/auth/logout?location=' . htmlspecialchars($_SERVER['REQUEST_URI'])) ?>">
          <i class="fa fa-sign-out"></i> <span>Keluar</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
    </ul>
  </section>
</aside>