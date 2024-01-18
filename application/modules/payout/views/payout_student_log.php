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
			<div class="col-md-8">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title">Transaksi Terakhir</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<table class="table table-responsive table-bordered" style="white-space: nowrap;">
							<tr class="bg-blue">
								<th><i class="fa fa-shopping-cart"></i> Pembayaran</th>
								<th><i class="fa fa-dollar"></i> Sudah Dibayar</th>
								<th><i class="fa fa-calendar"></i> Tanggal</th>
							</tr>
							<?php
							foreach ($log as $key) :
							?>
								<tr>
									<td><?php echo ($key['bulan_bulan_id'] != NULL) ? $key['posmonth_name'] . ' - T.P ' . $key['period_start_month'] . '/' . $key['period_end_month'] . ' (' . $key['month_name'] . ')' : $key['posbebas_name'] . ' - T.A ' . $key['period_start_bebas'] . '/' . $key['period_end_bebas'] ?></td>
									<td><?php echo ($key['bulan_bulan_id'] != NULL) ? 'Rp. ' . number_format($key['bulan_bill'], 0, ',', '.') : 'Rp. ' . number_format($key['bebas_pay_bill'], 0, ',', '.') ?></td>
									<td><?php echo pretty_date($key['log_trx_input_date'], 'd F Y', false)  ?></td>
								</tr>
							<?php endforeach ?>
						</table>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title">Cetak Salinan Bukti Pembayaran</h3>
					</div>
					<div class="box-body">
						<form action="<?php echo site_url('student/payout/cetakBukti') ?>" method="GET" class="view-pdf">
							<?php foreach ($log as $key) : ?>
								<input type="hidden" name="r" value="<?php echo $key['student_nis']; ?>">
							<?php endforeach ?>
							<div class="form-group">
								<label>Tanggal Transaksi</label>
								<div class="input-group date " data-date="<?php echo date('Y-m-d') ?>" data-date-format="yyyy-mm-dd">
									<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
									<input class="form-control" readonly="" required="" type="text" name="d" value="<?php echo date('Y-m-d') ?>">
								</div>
							</div>
							<button class="btn bg-green btn-block" formtarget="_blank" type="submit"><i class="fa fa-print"></i> <b> Cetak Bukti Pembayaran</b></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
