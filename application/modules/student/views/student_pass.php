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
				<div class="callout callout-info">
					<b>PERINGATAN!</b> <br>
					Halaman ini digunakan untuk merubah status Mahasiswa menjadi lulus. Pastikan Mahasiswa yang diproses adalah Mahasiswa tingkat akhir.<br>
					Dan, bisa digunakan untuk membatalkan kelulusan jika terdapat kesalahaan dalam proses kelulusan.
				</div>
			</div>
		</div>
		<!-- /.box-header -->
		<div class="row">
			<div class="col-md-5">
				<div class="box box-solid">
					<div class="box-header with-border">
						<div class="row">
							<div class="col-sm-6">
								<h3 class="box-title" style="padding-top: 5px;">Data Mahasiswa</h3>
							</div>
							<div class="col-sm-6">
								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
									<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
								</div>
							</div>
						</div>
					</div>
					<div class="box-body">
						<?php echo form_open(current_url(), array('method' => 'get')) ?>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon alert-warning">Pilih Semester</div>
								<select class="form-control" name="pr" onchange="this.form.submit()">
									<option value="">-- Pilih Semester --</option>
									<?php foreach ($class as $row) : ?>
										<option <?php echo (isset($f['pr']) and $f['pr'] == $row['class_id']) ? 'selected' : '' ?> value="<?php echo $row['class_id'] ?>"><?php echo $row['class_name'] ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<?php echo form_close() ?>
						<table class="table table-hover table-bordered table-responsive">
							<form action="<?php echo site_url('manage/student/multiple'); ?>" method="post" id="lulus">
								<input type="hidden" name="action" value="pass">
								<tr class="bg-orange">
									<th><input type="checkbox" id="selectall" value="checkbox" name="checkbox"></th>
									<th>No</th>
									<th>NPM</th>
									<th>Nama</th>
									<th>Status</th>
								</tr>
								<tbody>
									<?php if ($this->input->get(NULL)) { ?>
										<?php
										if (!empty($notpass)) {
											$i = 1;
											foreach ($notpass as $row) :
										?>
												<tr style="<?php echo ($row['student_status'] == 0) ? 'color:#00E640' : '' ?>">
													<td><input type="checkbox" class="<?php echo ($row['student_status'] == 0) ? NULL : 'checkbox' ?>" <?php echo ($row['student_status'] == 0) ? 'disabled' : NULL ?> name="msg[]" value="<?php echo $row['student_id']; ?>"></td>
													<td><?php echo $i; ?></td>
													<td><?php echo $row['student_nis']; ?></td>
													<td><?php echo $row['student_full_name']; ?></td>
													<td><label class="label <?php echo ($row['student_status'] == 0) ? 'label-success' : 'label-warning' ?>"><?php echo ($row['student_status'] == 0) ? 'Lulus' : 'Belum Lulus' ?></label></td>
												</tr>
											<?php
												$i++;
											endforeach;
										} else {
											?>
											<tr id="row">
												<td colspan="5" align="center">Data Kosong</td>
											</tr>
										<?php } ?>
									<?php } else {
									?>
										<tr id="row">
											<td colspan="5" align="center">Data Kosong</td>
										</tr>
									<?php } ?>
								</tbody>
							</form>
						</table>
					</div>
				</div>
			</div>

			<div class="col-md-2">
				<div class="box box-solid">
					<div class="box-header with-border">
						<div class="row">
							<div class="col-sm-6">
								<h3 class="box-title" style="padding-top: 5px;">Proses</h3>
							</div>
							<div class="col-sm-6">
								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
									<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
								</div>
							</div>
						</div>
					</div>
					<div class="box-body">
						<button class="btn bg-blue btn-block" type="submit" onclick="$('#lulus').submit()"><span class="fa  fa-check"></span> <b>Proses Lulus</b></button>
						<button class="btn bg-maroon btn-block" onclick="$('#kembali').submit();"><span class="fa  fa-close"></span> <b>Batal Lulus</b></button>
					</div>
				</div>
			</div>
			<div class="col-md-5">
				<div class="box box-solid">
					<div class="box-header with-border">
						<div class="row">
							<div class="col-sm-6">
								<h3 class="box-title" style="padding-top: 5px;">Data Kelulusan</h3>
							</div>
							<div class="col-sm-6">
								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
									<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
								</div>
							</div>
						</div>
					</div>
					<div class="box-body">
						<table class="table table-hover table-bordered table-responsive">
							<form action="<?php echo site_url('manage/student/multiple'); ?>" method="post" id="kembali">
								<input type="hidden" name="action" value="notpass">
								<tr class="bg-blue">
									<th><input type="checkbox" id="selectall2" value="checkbox" name="checkbox"></th>
									<th>No</th>
									<th>NPM</th>
									<th>Nama</th>
									<th>Status</th>
								</tr>
								<tbody>
									<?php
									if (!empty($pass)) {
										$i = 1;
										foreach ($pass as $row) :
									?>
											<tr>
												<td><input type="checkbox" class="checkbox" name="msg[]" value="<?php echo $row['student_id']; ?>"></td>
												<td><?php echo $i; ?></td>
												<td><?php echo $row['student_nis']; ?></td>
												<td><?php echo $row['student_full_name']; ?></td>
												<td><label class="label label-success"><?php echo ($row['student_status'] == 0) ? 'Lulus' : 'Belum Lulus' ?></label></td>
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
							</form>
						</table>
					</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!-- /.content -->
</div>
<script>
	$(document).ready(function() {
		$("#selectall").change(function() {
			$(".checkbox").prop('checked', $(this).prop("checked"));
		});
	});
	$(document).ready(function() {
		$("#selectall2").change(function() {
			$(".checkbox").prop('checked', $(this).prop("checked"));
		});
	});
</script>