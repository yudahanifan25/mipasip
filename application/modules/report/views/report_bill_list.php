	<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?php echo isset($title) ? '' . $title : null; ?>
			<small>List</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('manage') ?>"><i class="fa fa-th"></i> Home</a></li>
			<li class="active"><?php echo isset($title) ? '' . $title : null; ?></li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-success">
					<div class="box-header">
						<?php echo form_open(current_url(), array('method' => 'get')) ?>
						<div class="row">
							<div class="col-sm-2">
								<div class="form-group">
									<label>Tahun Akademik</label>
									<select class="form-control" name="p">
										<?php foreach ($period as $row) : ?>
											<option <?php echo (isset($q['p']) and $q['p'] == $row['period_id']) ? 'selected' : '' ?> value="<?php echo $row['period_id'] ?>"><?php echo $row['period_start'] . '/' . $row['period_end'] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group">
									<label>Semester</label>
									<select class="form-control" name="c">
										<?php foreach ($class as $row) : ?>
											<option <?php echo (isset($q['c']) and $q['c'] == $row['class_id']) ? 'selected' : '' ?> value="<?php echo $row['class_id'] ?>"><?php echo $row['class_name'] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<?php if (majors() == 'senior') { ?>
								<div class="col-sm-2">
									<div class="form-group">
										<label>Prodi</label>
										<select class="form-control" name="k">
											<?php foreach ($majors as $row) : ?>
												<option <?php echo (isset($q['k']) and $q['k'] == $row['majors_id']) ? 'selected' : '' ?> value="<?php echo $row['majors_id'] ?>"><?php echo $row['majors_name'] ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
							<?php } ?>
							<div class="col-sm-3">
								<div class="form-group">
									<label>Tagihan</label>
									<select class="form-control" name="x">
										<?php foreach ($py as $row) : ?>
											<option <?php echo (isset($q['x']) and $q['x'] == $row['payment_id']) ? 'selected' : '' ?> value="<?php echo $row['payment_id'] ?>"><?php echo $row['pos_name'] . ' - T.A ' . $row['period_start'] . '/' . $row['period_end']; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="col-sm-3">
								<div style="margin-top:25px;">
									<button type="submit" class="btn btn-primary text-bold"><i class="fa fa-filter"></i>&nbsp; Filter</button>
									<?php if ($q and !empty($py)) { ?>
										<a class="btn btn-success" href="<?php echo site_url('manage/report/report_bill_detail' . '/?' . http_build_query($q)) ?>"><i class="fa fa-file-excel-o"></i>&nbsp; <b>Export</b></a>
										<a class="btn btn-danger" href="<?php echo site_url('manage/report/report_bill') ?>"><i class="fa fa-random"></i>&nbsp; <b>Reset</b></a>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php if ($q and !empty($py)) { ?>
					<div class="box box-success">
						<div class="box-body table-responsive">
							<table class="table table-responsive table-hover table-bordered" style="white-space: nowrap;">
								<tr>
									<th rowspan="2">No</th>
										<th rowspan="2">NPM</th>
									<th rowspan="2">Nama</th>
									<th rowspan="2"><center>Semester</th>
										<th rowspan="2"><center>Prodi</th>
									<?php foreach ($bebas as $key) : ?>
										<th rowspan="2">
											<center><?php echo $key['pos_name'] . ' - T.A ' . $key['period_start'] . '/' . $key['period_end']; ?></center>
										</th>
									<?php endforeach ?>
								</tr>
								<tr>
									<?php foreach ($month as $key) : ?>
										<th><?php echo $key['month_name'] ?></th>
									<?php endforeach ?>
								</tr>
								<?php $no = 1; ?>
								<?php foreach ($student as $row) : ?>
									<?php if ($row['student_status'] == 1) { ?>
										<tr>
											<td><?php echo $no++ ?></td>
											<td><strong><?php echo $row['student_nis'] ?></td>
											<td><strong><?php echo strtoupper($row['student_full_name']) ?></td>
											<td class="text-center"><?php echo $row['class_name']  ?></td>
											<td class="text-center"><strong><?php echo $row['majors_name'] ?></td>
											<?php foreach ($free as $key) : ?>
												<?php if ($row['student_student_id'] == $key['student_student_id']) { ?>
													<td style="text-align:center; color:<?php echo ($key['bebas_bill'] == $key['bebas_total_pay']) ? '#00E640' : 'red' ?> "><strong>
														<?php echo ($key['bebas_bill'] == $key['bebas_total_pay']) ? 'LUNAS' : number_format($key['bebas_bill'] - $key['bebas_total_pay'], 0, ',', '.') ?>
													</td>
												<?php } ?>
											<?php endforeach ?>
											<?php foreach ($bulan as $key) : ?>
												<?php if ($key['student_student_id'] == $row['student_student_id']) { ?>
													<td style="color:<?php echo ($key['bulan_status'] == 1) ? '#00E640' : 'red' ?>"><strong>
														<?php echo ($key['bulan_status'] == 1) ? 'L.U.NAS' : number_format($key['bulan_bill'], 0, ',', '.') ?>
													</td>
												<?php } ?>
											<?php endforeach ?>
										</tr>
									<?php } ?>
								<?php endforeach ?>
							</table>
						</div>
						<!-- /.box-body -->
					</div>
				<?php } ?>
			</div>
		</div>
	</section>
	<!-- /.content -->
</div>