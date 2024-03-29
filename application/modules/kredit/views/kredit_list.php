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
				<div class="box box-success">
					<?php if ($this->session->userdata('uroleid') <> BENDAHARA) { ?>
						<div class="box-header with-border">
							<div class="row">
								<div class="col-sm-6">
									<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addKredit"><i class="fa fa-plus"></i> Tambah</button>
								</div>
								<div class="col-sm-6">
									<div class="box-tools pull-right">
										<?php echo form_open(current_url(), array('class' => 'form-horizontal', 'method' => 'get')) ?>
										<div class="input-group input-group-sm">
											<input type="text" id="field" autofocus name="n" <?php echo (isset($f['n'])) ? 'placeholder="' . $f['n'] . '"' : 'placeholder="Cari Pengeluaran Umum"' ?> class="form-control" required>
											<div class="input-group-btn">
												<button type="submit" class="btn btn-primary bg-green"><i class="fa fa-search"></i>&nbsp; Cari Data</button>
											</div>
										</div>
										<?php echo form_close(); ?>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>
					<!-- /.box-header -->
					<div class="box-body table-responsive">
						<table class="table table-hover table-striped table-bordered">
							<tr class="bg-green">
								<th class="text-center">No</th>
								<th>Tanggal Pengeluaran</th>
								<th>Keterangan</th>
								<th>Pengeluaran (Rp.)</th>
								<th class="text-center">Aksi</th>
							</tr>
							<tbody>
								<?php
								if (!empty($kredit)) {
									$i = 1;
									foreach ($kredit as $row) :
								?>
										<tr>
											<td class="text-center"><?php echo $i; ?></td>
											<td><?php echo pretty_date($row['kredit_date'], 'd F Y', false); ?></td>
											<td><?php echo $row['kredit_desc']; ?></td>
											<td><?php echo 'Rp. ' . number_format($row['kredit_value'], 0, ',', '.') ?></td>
											<td class=" text-center">
												<?php if ($this->session->userdata('uroleid') <> BENDAHARA) { ?>
													<a href="<?php echo site_url('manage/kredit/edit/' . $row['kredit_id']) ?>" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil-square"></i></a>

													<a href="#delModal<?php echo $row['kredit_id']; ?>" data-toggle="modal" class="btn btn-sm btn-danger"><i class="fa fa-trash" data-toggle="tooltip" title="Hapus"></i></a>
												<?php } ?>
											</td>
										</tr>
										<div class="modal modal-default fade" id="delModal<?php echo $row['kredit_id']; ?>">
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
														<?php echo form_open('manage/kredit/delete/' . $row['kredit_id']); ?>
														<input type="hidden" name="delName" value="<?php echo $row['kredit_desc']; ?>">
														<button type="button" class="btn btn-default pull-left" data-dismiss="modal"><span class="fa fa-close"></span> Batal</button>
														<button type="submit" class="btn btn-danger"><span class="fa fa-check"></span> Hapus</button>
														<?php echo form_close(); ?>
													</div>
												</div>
												<!-- /.modal-content -->
											</div>
											<!-- /.modal-dialog -->
										</div>
									<?php
										$i++;
									endforeach;
								} else {
									?>
									<tr id="row">
										<td colspan="5" align="center">Data Kosong</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
						<?php echo $this->pagination->create_links(); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /.content -->
</div>

<!-- Modal -->
<div class="modal fade" id="addKredit" role="dialog">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Tambah Pengeluaran</h4>
			</div>
			<?php echo form_open('manage/kredit/add_glob', array('method' => 'post')); ?>
			<div class="modal-body">
				<div id="p_scents_kredit">
					<div class="form-group">
						<label>Tanggal Pengeluaran</label>
						<div class="input-group date " data-date="" data-date-format="yyyy-mm-dd">
							<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
							<input class="form-control" required="" type="text" name="kredit_date" placeholder="Tanggal Pengeluaran">
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<label>Keterangan *</label>
							<input type="text" required="" name="kredit_desc[]" class="form-control" placeholder="Keterangan Pengeluaran">
						</div>
						<div class="col-md-6">
							<label>Jumlah Rupiah *</label>
							<!-- <input type="number" id="kredit" required="" name="kredit_value[]" class="form-control" placeholder="Jumlah" onfocus="unformatRupiah(this)" onblur="formatRupiah(this);"> -->
							<input type="text" id="kredit" required="" name="kredit_value[]" class="form-control numeric" placeholder="Jumlah">
						</div>
					</div>
				</div>
				<h6><a href="#" class="btn btn-xs btn-success" id="addScnt_kredit"><i class="fa fa-plus"></i><b> Tambah Baris</b></a></h6>
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
		var scntDiv = $('#p_scents_kredit');
		var i = $('#p_scents_kredit .row').size() + 1;

		$("#addScnt_kredit").click(function() {
			$('<div class="row"><br><div class="col-md-6"><label>Keterangan *</label><input type="text" required name="kredit_desc[]" class="form-control" placeholder="Keterangan Pengeluaran"><br><a href="#" class="btn btn-xs btn-danger remScnt_kredit"><i class="fa fa-close"></i> <b>Hapus Baris</b></a></div><div class="col-md-6"><label>Jumlah Rupiah *</label><input type="number" required name="kredit_value[]" class="form-control" placeholder="Jumlah" onfocus="unformatRupiah(this)" onblur="formatRupiah(this);"></div></div>').appendTo(scntDiv);
			i++;

			return false;
		});

		$(document).on("click", ".remScnt_kredit", function() {
			if (i > 2) {
				$(this).parents('.row').remove();
				i--;
			}
			return false;
		});
	});
</script>
<?php $this->load->view('manage/rupiah'); ?>