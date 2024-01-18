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
		<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-md-8">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title"> Detail Identitas Mahasiswa</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="col-md-12 col-sm-12 col-xs-12 pull-left">
							<div class="row">
								<div class="col-md-12">
									<table class="table table-xs table-striped table-hover">
										<tbody>
											<tr>
												<td>NPM</td>
												<td>:</td>
												<td><?php echo $student['student_nis'] ?></td>
											</tr>
											<tr>
												<td>NISN</td>
												<td>:</td>
												<td><?php echo $student['student_nisn'] ?></td>
											</tr>
											<tr>
												<td>Nama lengkap</td>
												<td>:</td>
												<td><?php echo $student['student_full_name'] ?></td>
											</tr>
											<tr>
												<td>Jenis Kelamin</td>
												<td>:</td>
												<td><?php echo ($student['student_gender'] == 'L') ? 'Laki-laki' : 'Perempuan' ?></td>
											</tr>
											<tr>
												<td>Tempat, Tanggal Lahir</td>
												<td>:</td>
												<td><?php echo $student['student_born_place'] . ', ' . pretty_date($student['student_born_date'], 'd F Y', false) ?></td>
											</tr>
											<tr>
												<td>Hobi</td>
												<td>:</td>
												<td><?php echo $student['student_hobby'] ?></td>
											</tr>
											<tr>
												<td>No. Handphone</td>
												<td>:</td>
												<td><?php echo $student['student_phone'] ?></td>
											</tr>
											<tr>
												<td>Alamat</td>
												<td>:</td>
												<td><?php echo $student['student_address'] ?></td>
											</tr>
											<tr>
												<td>Nama Ibu Kandung</td>
												<td>:</td>
												<td><?php echo $student['student_name_of_mother'] ?></td>
											</tr>
											<tr>
												<td>Nama Ayah Kandung</td>
												<td>:</td>
												<td><?php echo $student['student_name_of_father'] ?></td>
											</tr>
											<tr>
												<td>No. Handphone Orang Tua</td>
												<td>:</td>
												<td><?php echo $student['student_parent_phone'] ?></td>
											</tr>
											<tr>
												<td>Semester</td>
												<td>:</td>
												<td><?php echo $student['class_name'] ?></td>
											</tr>
											<?php if (majors() == 'senior') { ?>
												<tr>
													<td>Program Studi</td>
													<td>:</td>
													<td><?php echo $student['majors_name'] ?></td>
												</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
							<!-- /.box-body -->
						</div>
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
								<b>Prodi</b> <a class="pull-right"><?php echo $student['majors_name']?></a>
							</li>
							<li class="list-group-item">
								<b>Semester</b> <a class="pull-right">
									<?php echo $student['class_name'] ?>
									
								</a>
							</li>
							<li class="list-group-item">
								<b>Jenis Kelamin</b> <a class="pull-right"><?php echo ($student['student_gender'] == 'L') ? 'Laki-laki' : 'Perempuan' ?></a>
							</li>
						</ul>
						<a href="<?php echo site_url('student') ?>" class="btn btn-sm bg-gray pull-right"><b><i class="fa fa-arrow-circle-o-left"></i> &nbsp;Kembali</b></a>
						<a href="<?php echo site_url('student/profile/edit') ?>" class="btn btn-sm bg-primary"><b><i class="fa fa-pencil-square"></i> &nbsp;Edit</b></a>
						<a href="<?php echo site_url('student/profile/cpw'); ?>" class="btn btn-sm bg-maroon"><b><i class="fa fa-refresh"></i> &nbsp;Reset Password</b></a>
					</div>
				</div>
			</div>
	</section>
</div>