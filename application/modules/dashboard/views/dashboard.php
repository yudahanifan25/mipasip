  <div class="content-wrapper">
    <section class="content-header">
      <h1>Dashboard</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-success">
            <div class="box-body bg-success">
              <div class="col-md-3 col-sm-6 col-xs-12" style="margin-top: 10px;">
                <div class="info-box">
                  <span class="info-box-icon bg-blue"><i class="fa fa-random"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text dash-text">Pemasukan Hari Ini</span>
                    <span class="info-box-number"><?php echo 'Rp. ' . number_format($total_bulan + $total_bebas + $total_debit, 0, ',', '.') ?>.,</span>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6 col-xs-12" style="margin-top: 10px;">
                <div class="info-box">
                  <span class="info-box-icon bg-red"><i class="fa fa-bars"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text dash-text">Pengeluaran Hari Ini</span>
                    <span class="info-box-number"><?php echo 'Rp. ' . number_format($total_kredit, 0, ',', '.') ?> .,</span>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6 col-xs-12" style="margin-top: 10px;">
                <div class="info-box">
                  <span class="info-box-icon bg-green"><i class="fa fa-tags"></i></span>

                  <div class="info-box-content">
                    <?php
                    $totalAll = $t_total_bulan + $t_total_bebas + $t_total_debit;
                    ?>
                    <span class="info-box-text dash-text">Saldo Keuangan</span>
                    <span class="info-box-number"><?php echo 'Rp. ' . number_format($totalAll - $t_total_kredit, 0, ',', '.') ?>.,</span>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6 col-xs-12" style="margin-top: 10px;">
                <div class="info-box">
                  <span class="info-box-icon bg-yellow"><i class="fa fa-user"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text dash-text">Mahasiswa Aktif</span>
                    <span class="info-box-number"><?php echo $student ?> Orang</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <?php if ($this->session->userdata('uroleid') == SUPERUSER) { ?>
          <div class="col-md-12">
            <div class="box box-solid">
              <div class="box-header with-border">
                <h3 class="box-title" style="padding-top: 5px;">Log Aktifitas Pengguna</h3>
                <div class="box-tools" style="padding-top: 6px;">
                  <a href="<?php echo site_url('manage/logs') ?>" class="btn btn-xs btn-success"><i class="fa fa-home"></i> Log Data</a>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body table-responsive">
                <table class="table table-hover table-striped table-bordered">
                  <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Modul</th>
                    <th>Aksi</th>
                    <th>Keterangan</th>
                    <th>Pengguna</th>
                  </tr>
                  <tbody>
                    <?php
                    if (!empty($logs)) {
                      $i = 1;
                      foreach ($logs as $row) :
                    ?>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo pretty_date($row['log_date'], 'h:m:s - d M Y', false) ?></td>
                          <td><?php echo $row['log_module']; ?></td>
                          <td><?php echo $row['log_action']; ?></td>
                          <td><?php echo $row['log_info']; ?></td>
                          <td><?php echo $row['user_full_name']; ?></td>
                        </tr>
                      <?php
                        $i++;
                      endforeach;
                    } else {
                      ?>
                      <tr id="row">
                        <td colspan="6" align="center">Data Kosong</td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
          </div>
        <?php } ?>
        <div class="col-md-6">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title" style="padding-top: 5px;">Informasi</h3>
              <?php if ($this->session->userdata('uroleid') == SUPERUSER) { ?>
                <div class="box-tools" style="padding-top: 6px;">
                  <a href="<?php echo site_url('manage/information/index') ?>" class="btn btn-xs btn-success"><i class="fa fa-home"></i> Informasi</a>
                </div>
              <?php } else { ?>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              <?php } ?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php
              foreach ($information as $row) :
              ?>
                <img class="img-responsive pad" src="<?php echo upload_url('information/' . $row['information_img']) ?>" alt="Photo">
                <h4 class="text-bold"><?php echo $row['information_title']; ?></h4>
                <p><?php echo $row['information_desc']; ?></p>
                <p style="font-size: 12px;" class="label bg-maroon"><?php echo pretty_date(date($row['information_input_date']), false) ?></p>
              <?php endforeach; ?>
              <!-- /.box-body -->
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Kalender</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div id="calendar"></div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <div class="modal fade in" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <?php echo form_open(current_url()); ?>
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="addModalLabel">Tambah Agenda</h4>
        </div>
        <div class="modal-body">
          <input type="hidden" name="add" value="1">
          <label>Tanggal*</label>
          <p id="labelDate"></p>
          <input type="hidden" name="date" class="form-control" id="inputDate">
          <label>Keterangan*</label>
          <textarea name="info" id="inputDesc" class="form-control"></textarea><br />
        </div>
        <div class="modal-footer">
          <button type="submit" id="btnSimpan" class="btn btn-success">Simpan</button>
        </div>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
  <div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="delModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <?php echo form_open(current_url()); ?>
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="delModalLabel">Hapus Agenda</h4>
        </div>
        <div class="modal-body">
          <input type="hidden" name="del" value="1">
          <input type="hidden" name="id" id="idDel">
          <label>Tahun</label>
          <p id="showYear"></p>
          <label>Tanggal</label>
          <p id="showDate"></p>
          <label>Keterangan*</label>
          <p id="showDesc"></p>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger">Hapus</button>
        </div>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
  <script type="text/javascript">
    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'prevYear,nextYear',
      },
      events: "<?php echo site_url('manage/dashboard/get'); ?>",
      dayClick: function(date, jsEvent, view) {
        var tanggal = date.getDate();
        var bulan = date.getMonth() + 1;
        var tahun = date.getFullYear();
        var fullDate = tahun + '-' + bulan + '-' + tanggal;
        $('#addModal').modal('toggle');
        $('#addModal').modal('show');
        $("#inputDate").val(fullDate);
        $("#labelDate").text(fullDate);
        $("#inputYear").val(date.getFullYear());
        $("#labelYear").text(date.getFullYear());
      },
      eventClick: function(calEvent, jsEvent, view) {
        $("#delModal").modal('toggle');
        $("#delModal").modal('show');
        $("#idDel").val(calEvent.id);
        $("#showYear").text(calEvent.year);
        var tgl = calEvent.start.getDate();
        var bln = calEvent.start.getMonth() + 1;
        var thn = calEvent.start.getFullYear();
        $("#showDate").text(tgl + '-' + bln + '-' + thn);
        $("#showDesc").text(calEvent.title);
      }
    });

    $("#inputDesc").on('change keyup focus input propertychange', function() {
      var desc = $("#inputDesc").val();
      if (desc.trim().length > 0) {
        $("#btnSimpan").removeClass('disabled');
      } else {
        $("#btnSimpan").addClass('disabled');
      }
    })
    $("#closeModal").click(function() {
      $("#inputDesc").val('');
      $("#btnSimpan").addClass('disabled');
    });
  </script>