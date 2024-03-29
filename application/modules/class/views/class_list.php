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
			<div class="col-xs-12">
				<div class="box box-solid">
					<div class="box-header with-border">
						<div class="row">
							<div class="col-sm-6">
								<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addClass"><i class="fa fa-plus"></i> Tambah Data</button>
							</div>
							<div class="col-sm-6">
								<div class="box-tools">
									<?php echo form_open(current_url(), array('class' => 'form-horizontal', 'method' => 'get')) ?>
									<div class="input-group input-group-sm">
										<input type="text" id="field" autofocus name="n" <?php echo (isset($f['n'])) ? 'placeholder="' . $f['n'] . '"' : 'placeholder="Cari Nama Semester"' ?> class="form-control" required>
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
								<th>Semester</th>
								<th>ID Semester</th>
								<th class="text-center">Aksi</th>
							</tr>
							<tbody>
								<?php
								if (!empty($classes)) {
									$i = 1;
									foreach ($classes as $row) :
								?>
										<tr>
											<td class="text-center"><?php echo $i; ?></td>
											<td><?php echo $row['class_name']; ?></td>
											<td><?php echo $row['class_id']; ?></td>
											<td class="text-center">
												<a href="<?php echo site_url('manage/class/edit/' . $row['class_id']) ?>" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil-square" ></i> Edit</a>

												<a href="#delModal<?php echo $row['class_id']; ?>" data-toggle="modal" class="btn btn-sm btn-danger"><i class="fa fa-trash" data-toggle="tooltip" title="Hapus"></i> Hapus</a>
											</td>
										</tr>
										<div class="modal modal-default fade" id="delModal<?php echo $row['class_id']; ?>">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span></button>
														<h3 class="modal-title"><span class="fa fa-warning"></span> Konfirmasi penghapusan</h3>
													</div>
													<div class="modal-body">
														<p>Apakah anda yakin akan menghapus data ini?</p>
													</div>
													<div class="modal-footer">
														<?php echo form_open('manage/class/delete/' . $row['class_id']); ?>
														<input type="hidden" name="delName" value="<?php echo $row['class_name']; ?>">
														<button type="button" class="btn btn-default pull-left" data-dismiss="modal"><span class="fa fa-close"></span> Batal</button>
														<button type="submit" class="btn btn-danger"><span class="fa fa-check"></span> Hapus</button>
														<?php echo form_close(); ?>
													</div>
												</div>
												<!-- /.modal-content -->
											</div>
											<!-- /.modal-dialog List -->
										</div>
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

<!-- Modal -->
<div class="modal fade" id="addClass" role="dialog">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Tambah Semester</h4>
			</div>
			<?php echo form_open('manage/class/add_glob', array('method' => 'post')); ?>
			<div class="modal-body">
				<div id="p_scents_class">
					<p>
						<label>Nama Semester</label>
						<input type="text" required="" name="class_name[]" class="form-control" placeholder="Contoh: I-Ganjil atau II Genap">
					</p>
				</div>
				<h6><a href="#" class="btn btn-xs btn-success" id="addScnt_class"><i class="fa fa-plus"></i><b> Tambah Baris</b></a></h6>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
				<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
</div>

<script>
	$(function() {
		var scntDiv = $('#p_scents_class');
		var i = $('#p_scents_class p').size() + 1;

		$("#addScnt_class").click(function() {
			$('<p><label>Nama Kelas</label><input required type="text" name="class_name[]" class="form-control" placeholder="Contoh: III-Ganjil atau IV-Genap"><br><a href="#" class="btn btn-xs btn-danger remScnt_class"><i class="fa fa-close"></i> <b>Hapus Baris</b></a></p>').appendTo(scntDiv);
			i++;
			return false;
		});

		$(document).on("click", ".remScnt_class", function() {
			if (i > 2) {
				$(this).parents('p').remove();
				i--;
			}
			return false;
		});
	});
</script>