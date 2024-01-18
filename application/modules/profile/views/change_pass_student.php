<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?php echo isset($title) ? '' . $title : null; ?>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('student') ?>"><i class="fa fa-th"></i> Home</a></li>
			<li class="active"><?php echo isset($title) ? '' . $title : null; ?></li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<?php echo form_open(current_url()); ?>
		<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-md-8">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title"> Reset Password</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<?php echo form_open(current_url()); ?>
						<?php echo validation_errors(); ?>
						<div class="form-group">
							<?php if ($this->uri->segment(3) == 'cpw') { ?>
								<label>Password lama *</label>
								<input type="password" name="student_current_password" class="form-control" placeholder="Password lama">
							<?php } ?>
						</div>
						<div class="form-group">
							<label>Password baru*</label>
							<input type="password" name="student_password" class="form-control" placeholder="Password baru">
							<?php if ($this->uri->segment(3) == 'cpw') { ?>
								<input type="hidden" name="student_id" value="<?php echo $this->session->userdata('uid_student'); ?>">
							<?php } else { ?>
								<input type="hidden" name="student_id" value="<?php echo $student['student_id'] ?>">
							<?php } ?>
						</div>
						<div class="form-group">
							<label> Konfirmasi password baru*</label>
							<input type="password" name="passconf" class="form-control" placeholder="Konfirmasi password baru">
						</div>
						<p class="text-muted">*) Kolom wajib diisi.</p>
					</div>
					<!-- /.box-body -->
					<div class="box-footer">
						<button type="submit" class="btn bg-maroon text-bold"><i class="fa fa-check"></i> Simpan</button>
						<a href="<?php echo site_url('student/profile'); ?>" class="btn bg-gray text-bold"><i class="fa fa-remove "></i> Batal</a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="box box-primary">
					<div class="box-body box-profile">
						<?php if (!empty($student['student_img'])) { ?>
							<img src="<?php echo upload_url('student/' . $student['student_img']) ?>" class="profile-user-img img-responsive img-circle">
						<?php } else { ?>
							<img src="<?php echo media_url('img/user.png') ?>" class="profile-user-img img-responsive img-circle">
						<?php } ?>
						<h3 class="profile-username text-center"><?php echo ucwords(strtolower($student['student_full_name'])) ?></h3>
						<p class="text-muted text-center"><?php echo ucwords(strtolower($student['student_born_place'])) . ', ' . pretty_date($student['student_born_date'], 'd F Y', false) ?></p>
						<ul class="list-group list-group-unbordered">
							<li class="list-group-item">
								<b>NPM</b> <a class="pull-right"><?php echo $student['student_nis'] ?></a>
							</li>
							<li class="list-group-item">
								<b>NISN</b> <a class="pull-right"><?php echo $student['student_nisn'] ?></a>
							</li>
							<li class="list-group-item">
								<b>Semester</b> <a class="pull-right">
									<?php echo $student['class_name'] ?>
								</a>
							</li>
							<li class="list-group-item">
								<b>Program Studi</b> <a class="pull-right">
									<?php if (majors() == 'senior') {
										echo $student['majors_name'];
									} ?>
								</a>
							</li>
							<li class="list-group-item">
								<b>Jenis Kelamin</b> <a class="pull-right"><?php echo ($student['student_gender'] == 'L') ? 'Laki-laki' : 'Perempuan' ?></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<?php echo form_close(); ?>
		<!-- /.row -->
	</section>
</div>