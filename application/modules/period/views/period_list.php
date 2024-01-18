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
			<div class="col-xs-12">
				<div class="box box-solid">
					<div class="box-header with-border">
						<div class="row">
							<div class="col-sm-6">
								<a href="<?php echo site_url('manage/period/add') ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
							</div>
							<div class="col-sm-6">
								<div class="box-tools">
									<?php echo form_open(current_url(), array('class' => 'form-horizontal', 'method' => 'get')) ?>
									<div class="input-group input-group-sm">
										<input type="text" id="field" autofocus name="n" <?php echo (isset($f['n'])) ? 'placeholder="' . $f['n'] . '"' : 'placeholder="Cari Tahun Akademik"' ?> class="form-control" required>
										<div class="input-group-btn">
											<button type="submit" class="btn bg-blue"><i class="fa fa-search"></i> Cari Data</button>
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
							<tr class="bg-blue">
								<th class="text-center" width="5%">No</th>
								<th>Tahun Akademik</th>
								<th>ID Tahun Akademik</th>
								<th>Status</th>
								<th class="text-center">Aksi</th>
							</tr>
							<tbody>
								<?php
								if (!empty($period)) {
									$i = 1;
									foreach ($period as $row) :
								?>
										<tr>
											<td class="text-center"><?php echo $i; ?></td>
											<td><?php echo $row['period_start'] . '/' . $row['period_end'] ?></td>
											<td><?php echo $row['period_id'] ?></td>
											<td><?php echo ($row['period_status'] == 1) ? '<strong><center>AKTIF' : 'TIDAK AKTIF' ?></td>
											<td>
												<center><a href="<?php echo site_url('manage/period/edit/' . $row['period_id']) ?>" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil-square"></i> Edit</a>
												<button type="button" onclick="getId(<?php echo $row['period_id'] ?>)" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deletePeriod">
													<i class="fa fa-trash"></i> Hapus
												</button>
											</center>
												<?php if ($row['period_status'] != 1) { ?>
													<a href="<?php echo site_url('manage/period/period_active/' . $row['period_id']) ?>" class="btn btn-sm btn-success" data-toggle="tooltip" title="Aktifkan"><i class="fa fa-check"></i> Aktifkan</a>
												<?php } ?>
											</td>
										</tr>
									<?php
										$i++;
									endforeach;
								} else {
									?>
									<tr id="row">
										<td colspan="4" align="center">Data Kosong</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
						<?php echo $this->pagination->create_links(); ?>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
		</div>
	</section>
	<!-- /.content -->
</div>

<div class="modal fade" id="deletePeriod">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Konfirmasi Hapus</h4>
			</div>
			<form action="<?php echo site_url('manage/period/delete') ?>" method="POST">
				<div class="modal-body">
					<p>Apakah anda akan menghapus data ini?</p>
					<input type="hidden" name="period_id" id="periodID">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-danger">Hapus</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
	function getId(id) {
		$('#periodID').val(id)
	}
</script>