<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?php echo isset($title) ? '' . $title : null; ?> FMIPA UNIGA
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('manage') ?>"><i class="fa fa-th"></i> Home</a></li>
			<li class="active"><?php echo isset($title) ? '' . $title : null; ?></li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box box-success">
					<!-- /.box-header -->
					<div class="box-body table-responsive">
						<h4>Petunjuk Singkat</h4>
						<p>Penginputan data Mahasiswa FMIPA-UNIGA bisa dilakukan secara masal / kolektif dengan mengcopy data dari file Ms. Excel. Format file excel harus sesuai kebutuhan aplikasi. Silahkan download formatnya disini >>> <a href="<?php echo site_url('manage/student/download'); ?>"><span class="label label-success"><b>Dipalih Dieu</b></span> <<<</a>
							<br><br>
							<strong>CATATAN :</strong>
						<ol>
							<li>Pengisian jenis data <strong>TANGGAL</strong> diisi dengan format <strong>YYYY-MM-DD</strong> Contoh <strong>2023-07-25</strong><br> Cara ubah : blok semua tanggal pilih format cell di excel ganti dengan format date pilih yang tahunnya di depan</li>
						</ol>
						</p>
						<hr>

						<?php echo form_open_multipart(current_url()) ?>

						<div class="form-group">
							<textarea placeholder="Copy data yang akan dimasukan dari file excel, dan paste disini" rows="8" class="form-control" name="rows"></textarea>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-success btn-sm btn-flat"><i class="fa fa-upload"></i> Import Data</button>
							<a href="<?php echo site_url('manage/student') ?>" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-repeat"></i> Kembali</a>
						</div>
						<?php echo form_close() ?>

					</div>
					<!-- /.box-body -->
				</div>

				<!-- /.box -->
			</div>
		</div>
	</section>
	<!-- /.content -->
</div>