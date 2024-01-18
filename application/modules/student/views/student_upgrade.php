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
					Jika ada Mahasiswa yang telah dibuatkan tagihan dan dipindah Semesternya melalui halaman ini, maka tagihan tetap ada di Semester sebelumnya!
				</div>
			</div>
		</div>
		<!-- /.box-header -->
		<div class="row">
			<div class="col-md-9">
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
								<div class="input-group-addon bg-maroon">Pilih Semester</div>
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
							<form action="<?php echo site_url('manage/student/multiple'); ?>" method="post">
								<input type="hidden" name="action" value="upgrade">
								<tr class="bg-blue">
									<th class="text-center"><input type="checkbox" id="selectall" value="checkbox" name="checkbox"></th>
									<th class="text-center">No</th>
									<th>NPM</th>
									<th>NISN</th>
									<th>Nama</th>
									<th class="text-center">Semester</th>
								</tr>
								<tbody>
									<?php if ($this->input->get(NULL)) { ?>
										<?php
										if (!empty($student)) {
											$i = 1;
											foreach ($student as $row) :
										?>
												<tr style="<?php echo ($row['student_status'] == 0) ? 'color:#00E640' : '' ?>">
													<td>
														<center><input type="checkbox" class="<?php echo ($row['student_status'] == 0) ? NULL : 'checkbox' ?>" <?php echo ($row['student_status'] == 0) ? 'disabled' : NULL ?> name="msg[]" value="<?php echo $row['student_id']; ?>">
														</center>
													</td>
													<td class="text-center"><?php echo $i; ?></td>
													<td><?php echo $row['student_nis']; ?></td>
													<td><?php echo $row['student_nisn']; ?></td>
													<td><?php echo $row['student_full_name']; ?></td>
													<td class="text-center"><?php echo $row['class_name']; ?></td>

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
											<td colspan="6" align="center">Data Kosong</td>
										</tr>
									<?php } ?>
								</tbody>

						</table>
					</div>
				</div>
			</div>
			<div class="col-md-3">
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
						<select class="form-control" name="class_id" required="">
							<option value="">-- Ke Semester --</option>
							<?php foreach ($upgrade as $row) : ?>
								<option value="<?php echo $row['class_id'] ?>"><?php echo $row['class_name'] ?></option>
							<?php endforeach; ?>
						</select>
						<br>
						<button class="btn bg-maroon btn-block" type="submit"><span class="fa fa-check"></span> <b>Proses Kenaikan Semester</b></button>
						</form>
					</div>
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