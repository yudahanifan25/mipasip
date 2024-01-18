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
						<?php echo form_open(current_url(), array('method' => 'get')) ?> <br>
						<div class="row">
							<div class="col-md-5">
								<div class="form-group">
									<div class="input-group date " data-date="" data-date-format="yyyy-mm-dd">
										<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
										<input class="form-control" type="text" name="ds" readonly="readonly" <?php echo (isset($q['ds'])) ? 'value="' . $q['ds'] . '"' : '' ?> placeholder="Tanggal Awal">
									</div>
								</div>
							</div>
							<div class="col-md-5">
								<div class="form-group">
									<div class="input-group date " data-date="" data-date-format="yyyy-mm-dd">
										<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
										<input class="form-control" type="text" name="de" readonly="readonly" <?php echo (isset($q['de'])) ? 'value="' . $q['de'] . '"' : '' ?> placeholder="Tanggal Akhir">

									</div>
								</div>
							</div>
							<div class="col-md-2">
								<button type="submit" class="btn btn-primary text-bold"><i class="fa fa-filter"></i>&nbsp; Filter</button>
								<?php if ($q) { ?>
									<a class="btn btn-success text-bold" href="<?php echo site_url('manage/report/report' . '/?' . http_build_query($q)) ?>"><i class="fa fa-file-excel-o"></i>&nbsp; Excel</a>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
				<?php if ($q) { ?>
					<div class="box box-success">
						<div class="box-body table-responsive">
							<table class="table table-responsive table-hover table-bordered" style="white-space: nowrap;">
								<tr class="bg-success">
									<th class="text-center">No</th>
									<th>Nama Pembayaran</th>
									<th class="text-center">NPM</th>
									<th>Nama Mahasiswa</th>
									<th class="text-center">Semester</th>
									<th class="text-center">Prodi</th>
									<th class="text-center">Tanggal Pembayaran</th>
									<th>Pemasukan</th>
									<th>Pengeluaran</th>
									<th>Keterangan</th>
								</tr>
								<?php $no = 1; ?>
								<?php foreach ($bulan as $key) : ?>
									<tr>
										<td class="text-center"><?php echo $no++ ?></td>
										<td><?php echo $key['pos_name'] . ' - T.A ' . $key['period_start'] . '/' . $key['period_end']; ?></td>
										<td><strong><?php echo strtoupper($key['student_full_name']) ?></td>
										<td class="text-center"><?php echo $key['class_name']?></td>
										<td class="text-center"><?php echo $key['majors_name']?></td>
										<td><?php echo pretty_date($key['bulan_input_date'], 'd/m/Y')  ?></td>
										<td><?php echo 'Rp. ' . number_format($key['bulan_bill'], 0, ',', '.') ?></td>
										<td>-</td>
										<td><?php echo $key['bulan_pay_desc'] ?></td>
									</tr>
								<?php endforeach ?>
								<?php foreach ($dom as $key) : ?>
									<tr>
										<td class="text-center"><?php echo $no++ ?></td>
										<td><?php echo $key['pos_name'] . ' - T.A ' . $key['period_start'] . '/' . $key['period_end']; ?></td>
										<td><strong><?php echo $key['student_nis'] ?></td>
										<td><strong><?php echo $key['student_full_name'] ?></td>
										<td class="text-center"><?php echo $key['class_name']?></td>
										<td class="text-center"><strong><?php echo $key['majors_name']?></td>
										<td class="text-center"><?php echo pretty_date($key['bebas_pay_input_date'], 'd/m/Y')  ?></td>
										<td><?php echo 'Rp. ' . number_format($key['bebas_pay_bill'], 0, ',', '.') ?></td>
										<td class="text-center">-</td>
										<td><strong><?php echo $key['bebas_pay_desc'] ?></td>
									</tr>
								<?php endforeach ?>
								<?php foreach ($debit as $key) : ?>
									<tr>
										<td class="text-center"><?php echo $no++ ?></td>
										<td><?php echo $key['debit_desc'] ?></td>
										<td>Pemasukan</td>
										<td class="text-center">-</td>
										<td><?php echo pretty_date($key['debit_input_date'], 'd/m/Y') ?></td>
										<td><?php echo 'Rp. ' . number_format($key['debit_value'], 0, ',', '.')  ?></td>
										<td>-</td>
										<td>-</td>
									</tr>
								<?php endforeach ?>
								<?php foreach ($kredit as $key) : ?>
									<tr>
										<td class="text-center"><?php echo $no++ ?></td>
										<td><?php echo $key['kredit_desc'] ?></td>
										<td>Pengeluaran</td>
										<td class="text-center">-</td>
										<td><?php echo pretty_date($key['kredit_input_date'], 'd/m/Y') ?></td>
										<td>-</td>
										<td><?php echo 'Rp. ' . number_format($key['kredit_value'], 0, ',', '.')  ?></td>
										<td>-</td>
									</tr>
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