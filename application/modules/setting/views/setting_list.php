<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo isset($title) ? '' . $title : null; ?>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo site_url('manage') ?>"><i class="fa fa-th"></i> Home</a></li>
      <li class="active"><?php echo isset($title) ? '' . $title : null; ?></li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Profil Perguruan Tinggi</h3>
            <div class="box-tools">
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
          </div>
          <?php echo form_open_multipart(current_url()); ?>
          <div class="box-body">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label class="control-label">Status</label>
                  <select name="setting_level" class="form-control">

                  <!--
                    <option value="primary" <?php echo ($setting_level['setting_value'] == 'primary') ? 'selected' : '' ?>>SD/MI</option>
                    <option value="junior" <?php echo ($setting_level['setting_value'] == 'junior') ? 'selected' : '' ?>>SMP/MTS</option>-->
                    <option value="senior" <?php echo ($setting_level['setting_value'] == 'senior') ? 'selected' : '' ?>>PERGURUAN TINGGI</option>
                  </select>
                </div>
                <div class="form-group">
                  <label class="control-label">Nama Universitas</label>
                  <input type="text" name="setting_school" value="<?php echo $setting_school['setting_value'] ?>" class="form-control" required>
                </div>
                <div class="form-group">
                  <label class="control-label">Alamat Universitas</label>
                  <input name="setting_address" type="text" value="<?php echo $setting_address['setting_value'] ?>" class="form-control" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="control-label">Nama Kecamatan</label>
                  <input type="text" name="setting_district" value="<?php echo $setting_district['setting_value'] ?>" class="form-control" required>
                </div>
                <div class="form-group">
                  <label class="control-label">Nama Kota/Kab</label>
                  <input type="text" name="setting_city" value="<?php echo $setting_city['setting_value'] ?>" class="form-control" required>
                </div>
                <div class="form-group">
                  <label class="control-label">Nomor Telepon</label>
                  <input type="text" name="setting_phone" value="<?php echo $setting_phone['setting_value'] ?>" class="form-control" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="col">
                  <label><center>Logo Universitas</center></label>
                  <a href="#" class="thumbnail">
                    <?php if (isset($setting_logo) and $setting_logo['setting_value'] != NULL) { ?>
                      <img src="<?php echo upload_url('school/' . $setting_logo['setting_value']) ?>" style="height: 115px">
                    <?php } else { ?>
                      <img src="<?php echo media_url('img/missing_logo.gif') ?>" id="target" alt="Choose image to upload">
                    <?php } ?>
                  </a>
                  <input type='file' id="setting_logo" name="setting_logo" class="btn bg-maroon btn-block pull-left">
                </div>
              </div>
            </div>
          </div>
          <div class="box-footer">
            <div class="form-group">
              <button type="submit" class="btn bg-maroon text-bold"><i class="fa fa-check"></i> Simpan</button>
              <a href="<?php echo site_url('manage'); ?>" class="btn bg-gray text-bold"><i class="fa fa-close"></i> Batal</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php echo form_close() ?>
  </section>
</div>

<script type="text/javascript">
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#target').attr('src', e.target.result);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
  $("#setting_logo").change(function() {
    readURL(this);
  });
</script>