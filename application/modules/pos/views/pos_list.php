<script type="text/javascript" src="<?php echo media_url('js/jquery-migrate-3.0.0.min.js') ?>"></script>
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
				<div class="box box-info">
					<div class="box-header with-border">
						<div class="row">
							<div class="col-sm-6">
								<button type="button" class="btn bg-blue btn-sm" data-toggle="modal" data-target="#addPos"><i class="fa fa-plus"></i> Tambah</button>
							</div>
							<div class="col-sm-6">
								<div class="box-tools pull-right">
									<?php echo form_open(current_url(), array('class' => 'form-horizontal', 'method' => 'get')) ?>
									<div class="input-group input-group-sm">
										<input type="text" id="field" autofocus name="n" <?php echo (isset($f['n'])) ? 'placeholder="' . $f['n'] . '"' : 'placeholder="Cari Nama Pembayaran"' ?> class="form-control" required>
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
							<tr class="bg-blue">
								<th class="text-center">No</th>
								<th>Nama Pembayaran</th>
								<th>Keterangan</th>
								<th class="text-center">Aksi</th>
							</tr>
							<tbody>
								<?php
								if (!empty($pos)) {
									$i = 1;
									foreach ($pos as $row) :
								?>
										<tr>
											<td class="text-center"><?php echo $i; ?></td>
											<td><?php echo $row['pos_name']; ?></td>
											<td><?php echo $row['pos_description']; ?></td>
											<td class="text-center">
												<a href="<?php echo site_url('manage/pos/edit/' . $row['pos_id']) ?>" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil-square"></i></a>
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

<!-- Modal -->
<div class="modal fade" id="addPos" role="dialog">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Tambah Nama Pembayaran</h4>
			</div>
			<?php echo form_open('manage/pos/add_glob', array('method' => 'post')); ?>
			<div class="modal-body">
				<div id="p_scents_pos">
					<div class="row">
						<div class="col-md-6">
							<label>Nama Pembayaran</label>
							<input type="text" required="" name="pos_name[]" class="form-control" placeholder="Contoh: UANG SUHP">
						</div>
						<div class="col-md-6">
							<label>Keterangan</label>
							<input type="text" required="" name="pos_description[]" class="form-control" placeholder="Contoh: SEMINAR USULAN HASIL PENELITIAN">
						</div>
					</div>
				</div>
				<h6><a href="#" class="btn btn-xs btn-success" id="addScnt_pos"><i class="fa fa-plus"></i><b> Tambah Baris</b></a></h6>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
				<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>


<script>
	$(function() {
		var scntDiv = $('#p_scents_pos');
		var i = $('#p_scents_pos .row').size() + 1;

		$("#addScnt_pos").click(function() {
			$('<div class="row"><br><div class="col-md-6"><label>Nama Pembayaran</label><input type="text" required name="pos_name[]" class="form-control" placeholder="Contoh: TA-1"><br><a href="#" class="btn btn-xs btn-danger remScnt_pos"><i class="fa fa-close"></i> <b>Hapus Baris</b></a></div><div class="col-md-6"><label>Keterangan</label><input type="text" required name="pos_description[]" class="form-control" placeholder="Contoh: TUGAS AKHIR-1"></div></div>').appendTo(scntDiv);
			i++;
			return false;
		});

		$(document).on("click", ".remScnt_pos", function() {
			if (i > 2) {
				$(this).parents('.row').remove();
				i--;
			}
			return false;
		});
	});
</script>