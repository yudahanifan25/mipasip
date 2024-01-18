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
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-success">
					<!-- /.box-header -->
					<div class="box-body table-responsive">
						<table id="example2" class="table table-bordered table-striped dataTable">
							<tr class="bg-success">
								<th class="text-center">No</th>
								<th>Jenis Pembayaran</th>
								<th>Bulan</th>
								<th>Tagihan</th>
								<th class="text-center">Status</th>
								<th>Keterangan</th>
								<th class="text-center">Tanggal Bayar</th>
							</tr>
							<tbody>
								<?php
								$i = 1;
								foreach ($bulan as $row) {
									$namePay = $row['pos_name'] . ' - T.A ' . $row['period_start'] . '/' . $row['period_end'];
									// 
								?>
									<tr data-toggle="collapse" data-target="#demo">
										<td class="text-center"><?php echo $i ?></td>
										<td><?php echo $namePay ?></td>
										<td><?php echo $row['month_name']; ?></td>
										<td><?php echo 'Rp. ' . number_format($row['bulan_bill'], 0, ',', '.') ?></td>
										<td style="color:<?php echo ($row['bulan_status'] == 1) ? 'green' : 'red' ?>" class="text-center">
											<b><?php echo ($row['bulan_status'] == 1) ? 'Lunas' : 'Belum' ?></b>
										</td>
										<td><?php if ($row['bulan_pay_desc'] == '') {
												echo "-";
											} else {
												echo $row['bulan_pay_desc'];
											} ?></td>
										<td class="text-center"><?php if ($row['bulan_date_pay'] == '') {
																	echo "-";
																} else {
																	echo $row['bulan_date_pay'];
																} ?></td>
									</tr>
								<?php $i++;
								} ?>
							</tbody>
							</tbody>
						</table>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
		</div>
	</section>
	<!-- /.content -->
</div>