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
				<div class="box box-warning">
					<div class="box-header with-border">
						<div class="row">
							<div class="col-sm-6">
								<a href="<?php echo site_url('manage/payment/add') ?>" class="btn btn-sm bg-blue"><i class="fa fa-plus"></i> Tambah</a>
							</div>
							<div class="col-sm-6">
								<div class="box-tools">
									<?php echo form_open(current_url(), array('class' => 'form-horizontal', 'method' => 'get')) ?>
									<div class="input-group input-group-sm">
										<input type="text" id="field" autofocus name="n" <?php echo (isset($f['n'])) ? 'placeholder="' . $f['n'] . '"' : 'placeholder="Cari Nama Jenis Pembayaran"' ?> class="form-control">
										<div class="input-group-btn">
											<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>&nbsp; Cari Data</button>
										</div>
									</div>
									<?php echo form_close(); ?>
								</div>
							</div>
						</div>

					</div>
					<!-- /.box-header -->
					<div class="box-body table-responsive">
						<table class="table table-hover table-striped table-bordered">
							<tr class="bg-green">
								<th class="text-center">No</th>
								<th>Nama Pembayaran</th>
								<th>Jenis Pembayaran</th>
								<th class="text-center">Tarif Pembayaran</th>
								<th>Tipe</th>
								<th>Tahun</th>
								<th class="text-center">Aksi</th>
							</tr>
							<tbody>
								<?php
								if (!empty($payment)) {
									$i = 1;
									foreach ($payment as $row) :
								?>
										<tr>
											<td class="text-center"><?php echo $i; ?></td>
											<td><?php echo $row['pos_name']; ?></td>
											<td><?php echo $row['pos_name'] . ' - T.A ' . $row['period_start'] . '/' . $row['period_end']; ?></td>
											<td class="text-center">
												<?php if ($row['payment_type'] == 'BULAN') { ?>
													<a data-toggle="tooltip" data-placement="top" title="Setting Pembayaran" class="btn bg-maroon btn-sm" href="<?php echo site_url('manage/payment/view_bulan/' . $row['payment_id']) ?>">
														<i class="fa fa-shopping-cart"></i>&nbsp; Setting
													</a>
												<?php } else { ?>
													<a data-toggle="tooltip" data-placement="top" title="Setting Pembayaran" class="btn bg-purple btn-sm" href="<?php echo site_url('manage/payment/view_bebas/' . $row['payment_id']) ?>">
														<i class="fa fa-shopping-cart"></i>&nbsp; Setting
													</a>
												<?php } ?>
											</td>
											<td><?php echo ($row['payment_type'] == 'BULAN') ? 'Bulanan' : 'Bebas' ?></td>
											<td><?php echo $row['period_start'] . '/' . $row['period_end']; ?></td>
											<td class="text-center">
												<a href="<?php echo site_url('manage/payment/edit/' . $row['payment_id']) ?>" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil-square"></i></a>

											</td>
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
						</table>
					</div>
					<!-- /.box-body -->
				</div>
				<div>
					<?php echo $this->pagination->create_links(); ?>
				</div>
				<!-- /.box -->
			</div>
		</div>
	</section>
	<!-- /.content -->
</div>