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
          <p><?php echo ucfirst($this->session->userdata('ufullname')); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> <?php echo ucfirst($this->session->userdata('urolename')); ?></a>
        </div>
      </div>
      <!--
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Pencarian...">
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
          <a href="<?php echo site_url('manage'); ?>">
            <i class="fa fa-tachometer"></i> <span>Dashboard</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
        <?php if ($this->session->userdata('uroleid') <> BENDAHARA) { ?>
          <li class="<?php echo ($this->uri->segment(2) == 'payout') ? 'active' : '' ?>">
            <a href="<?php echo site_url('manage/payout'); ?>">
              <i class="fa fa-google-wallet"></i> <span>Transaksi Mahasiswa</span>
              <span class="pull-right-container"></span>
            </a>
          </li>
        <?php } ?>
        <?php if ($this->session->userdata('uroleid') <> SUPERUSER) { ?>
          <li class="<?php echo ($this->uri->segment(2) == 'report' or $this->uri->segment(3) == 'report_bill') ? 'active' : '' ?> treeview">
            <a href="#">
              <i class="fa fa-file-text text-stock"></i> <span>Laporan</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php echo ($this->uri->segment(2) == 'report' and $this->uri->segment(3) != 'report_bill') ? 'active' : '' ?> ">
                <a href="<?php echo site_url('manage/report') ?>"><i class="fa  <?php echo ($this->uri->segment(2) == 'report' and $this->uri->segment(3) != 'report_bill') ? 'fa-dot-circle-o' : 'fa-circle-o' ?>"></i> Laporan Total Keuangan</a>
              </li>
              <li class="<?php echo ($this->uri->segment(3) == 'report_bill') ? 'active' : '' ?> ">
                <a href="<?php echo site_url('manage/report/report_bill') ?>"><i class="fa  <?php echo ($this->uri->segment(3) == 'report_bill') ? 'fa-dot-circle-o' : 'fa-circle-o' ?>"></i> Laporan Rekap PerSemester</a>
              </li>
            </ul>
          </li>
        <?php } ?>
        <?php if ($this->session->userdata('uroleid') <> BENDAHARA) { ?>
          <li class="<?php echo ($this->uri->segment(2) == 'kredit' or $this->uri->segment(2) == 'debit') ? 'active' : '' ?> treeview">
            <a href="#">
              <i class="fa fa-shopping-cart text-stock"></i> <span>Transaksi Umum</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php echo ($this->uri->segment(2) == 'kredit') ? 'active' : '' ?> ">
                <a href="<?php echo site_url('manage/kredit') ?>"><i class="fa  <?php echo ($this->uri->segment(2) == 'kredit') ? 'fa-dot-circle-o' : 'fa-circle-o' ?>"></i> Pengeluaran</a>
              </li>
              <li class="<?php echo ($this->uri->segment(2) == 'debit') ? 'active' : '' ?> ">
                <a href="<?php echo site_url('manage/debit') ?>"><i class="fa  <?php echo ($this->uri->segment(2) == 'debit') ? 'fa-dot-circle-o' : 'fa-circle-o' ?>"></i> Pemasukan</a>
              </li>
            </ul>
          </li>
        <?php } ?>
        <?php if ($this->session->userdata('uroleid') == SUPERUSER) { ?>
          <li class="<?php echo ($this->uri->segment(2) == 'pos' or $this->uri->segment(2) == 'payment') ? 'active' : '' ?> treeview">
            <a href="#">
              <i class="fa fa-cog text-stock"></i> <span>Setting Pembayaran</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php echo ($this->uri->segment(2) == 'pos') ? 'active' : '' ?> ">
                <a href="<?php echo site_url('manage/pos') ?>"><i class="fa  <?php echo ($this->uri->segment(2) == 'pos') ? 'fa-dot-circle-o' : 'fa-circle-o' ?>"></i> Nama Pembayaran</a>
              </li>
              <li class="<?php echo ($this->uri->segment(2) == 'payment') ? 'active' : '' ?> ">
                <a href="<?php echo site_url('manage/payment') ?>"><i class="fa  <?php echo ($this->uri->segment(2) == 'payment') ? 'fa-dot-circle-o' : 'fa-circle-o' ?>"></i> Jenis Pembayaran</a>
              </li>
            </ul>
          </li>
        <?php } ?>
        <?php if ($this->session->userdata('uroleid') == SUPERUSER) { ?>
          <li class="<?php echo ($this->uri->segment(2) == 'student' or $this->uri->segment(2) == 'class' or $this->uri->segment(2) == 'majors' or $this->uri->segment(2) == 'period' or $this->uri->segment(2) == 'setting' or $this->uri->segment(2) == 'month') ? 'active' : '' ?> treeview">
            <a href="#">
              <i class="fa fa-wrench text-stock"></i> <span> Pengaturan</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php echo ($this->uri->segment(2) == 'setting') ? 'active' : '' ?> ">
                <a href="<?php echo site_url('manage/setting') ?>"><i class="fa  <?php echo ($this->uri->segment(2) == 'setting') ? 'fa-dot-circle-o' : 'fa-circle-o' ?>"></i> Profil</a>
              </li>

              <li class="<?php echo ($this->uri->segment(2) == 'month') ? 'active' : '' ?> ">
                <a href="<?php echo site_url('manage/month') ?>"><i class="fa  <?php echo ($this->uri->segment(2) == 'month') ? 'fa-dot-circle-o' : 'fa-circle-o' ?>"></i> Bulan</a>
              </li>

              <li class="<?php echo ($this->uri->segment(2) == 'period') ? 'active' : '' ?> ">
                <a href="<?php echo site_url('manage/period') ?>"><i class="fa  <?php echo ($this->uri->segment(2) == 'period') ? 'fa-dot-circle-o' : 'fa-circle-o' ?>"></i> Tahun Akademik</a>
              </li>

              <li class="<?php echo ($this->uri->segment(2) == 'class') ? 'active' : '' ?> ">
                <a href="<?php echo site_url('manage/class') ?>"><i class="fa  <?php echo ($this->uri->segment(2) == 'class') ? 'fa-dot-circle-o' : 'fa-circle-o' ?>"></i> Semester</a>
              </li>

              <?php if (majors() == 'senior') { ?>
                <li class="<?php echo ($this->uri->segment(2) == 'majors') ? 'active' : '' ?> ">
                  <a href="<?php echo site_url('manage/majors') ?>"><i class="fa  <?php echo ($this->uri->segment(2) == 'majors') ? 'fa-dot-circle-o' : 'fa-circle-o' ?>"></i> Program Studi</a>
                </li>
              <?php } ?>
              <li class="<?php echo ($this->uri->segment(2) == 'student' and $this->uri->segment(3) != 'pass' and $this->uri->segment(3) != 'upgrade') ? 'active' : '' ?> ">
                <a href="<?php echo site_url('manage/student') ?>"><i class="fa  <?php echo ($this->uri->segment(2) == 'student' and $this->uri->segment(3) != 'pass' and $this->uri->segment(3) != 'upgrade') ? 'fa-dot-circle-o' : 'fa-circle-o' ?>"></i> Master Mahasiswa</a>
              </li>

              <li class="<?php echo ($this->uri->segment(3) == 'upgrade') ? 'active' : '' ?> ">
                <a href="<?php echo site_url('manage/student/upgrade') ?>"><i class="fa  <?php echo ($this->uri->segment(3) == 'upgrade') ? 'fa-dot-circle-o' : 'fa-circle-o' ?>"></i> Kenaikan Semester</a>
              </li>

              <li class="<?php echo ($this->uri->segment(3) == 'pass') ? 'active' : '' ?> ">
                <a href="<?php echo site_url('manage/student/pass') ?>"><i class="fa  <?php echo ($this->uri->segment(3) == 'pass') ? 'fa-dot-circle-o' : 'fa-circle-o' ?>"></i> Kelulusan</a>
              </li>
            </ul>
          </li>


          <li class="<?php echo ($this->uri->segment(2) == 'report' or $this->uri->segment(3) == 'report_bill') ? 'active' : '' ?> treeview">
            <a href="#">
              <i class="fa fa-file-text text-stock"></i> <span>Laporan</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php echo ($this->uri->segment(2) == 'report' and $this->uri->segment(3) != 'report_bill') ? 'active' : '' ?> ">
                <a href="<?php echo site_url('manage/report') ?>"><i class="fa  <?php echo ($this->uri->segment(2) == 'report' and $this->uri->segment(3) != 'report_bill') ? 'fa-dot-circle-o' : 'fa-circle-o' ?>"></i> Laporan Total Keuangan</a>
              </li>

              <li class="<?php echo ($this->uri->segment(3) == 'report_bill') ? 'active' : '' ?> ">
                <a href="<?php echo site_url('manage/report/report_bill') ?>"><i class="fa  <?php echo ($this->uri->segment(3) == 'report_bill') ? 'fa-dot-circle-o' : 'fa-circle-o' ?>"></i> Laporan Per Semester</a>
              </li>
            </ul>
          </li>
          <li class="header">SERVICE</li>
          <li class="<?php echo ($this->uri->segment(2) == 'users') ? 'active' : '' ?>">
            <a href="<?php echo site_url('manage/users'); ?>">
              <i class="fa fa-user"></i> <span>Pengguna Aplikasi</span>
              <span class="pull-right-container"></span>
            </a>
          </li>

          <li class="<?php echo ($this->uri->segment(2) == 'maintenance') ? 'active' : '' ?>">
            <a href="<?php echo site_url('manage/maintenance'); ?>">
              <i class="fa fa-database"></i> <span>Backup Database</span>
              <span class="pull-right-container"></span>
            </a>
          </li>
        <?php } ?>
        <li class="header">USER</li>
        <li>
          <a href="<?php echo site_url('manage/auth/logout?location=' . htmlspecialchars($_SERVER['REQUEST_URI'])) ?>">
            <i class="fa fa-sign-out"></i> <span>Keluar</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>