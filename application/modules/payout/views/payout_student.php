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
					<div class="box-header with-border">
					</div><!-- /.box-header -->
					<div class="box-body">
						<div class="nav-tabs-custom tab-success">
							<ul class="nav nav-tabs">
								<!--
								<li class="active bg-success"><a href="#tab_1" data-toggle="tab"><b>Bulanan</b> &nbsp;<i class="fa fa-calendar-o"></i></a></li>
							-->
								<li class="bg-gray"><a href="#tab_2" data-toggle="tab"><b> DETAIL PEMBAYARAN</b>&nbsp; <i class="fa fa-shopping-cart"></i></a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane active" id="tab_1">
								<div class="box-body table-responsive">
									<table class="table table-hover table-responsive table-bordered" style="white-space: nowrap;">
										<!--
										<thead>
											<tr class="success">
												<th class="text-center">No.</th>
												<th>Jenis Pembayaran</th>
												<th>Tahun Akademik</th>
												<th>Semester</th>
												<th class="text-center">Bayar</th>
												<th class="text-center">Sisa</th>
												<th class="text-center">Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i = 1;
											foreach ($bulan as $row) {
											?>
												<tr>
													<td width="5%" class="text-center"><?php echo $i ?></td>
													<td><?php echo $row['pos_name'] . ' - T.P ' . $row['period_start'] . '/' . $row['period_end'] ?></td>
													<td class="danger"><?php echo $row['period_start'] . '/' . $row['period_end'] ?></td>	
													<td><?php echo $row['pos_name'] . ' - T.P ' . $row['period_start'] . '/' . $row['period_end'] ?></td></td>
													<td class="danger text-center"><b>
															<?php
															$data['bayar'] = $this->Bulan_model->get(array('payment_id' => $row['payment_payment_id'], 'status' => 1, 'student_id' => $this->session->userdata('uid_student')));
															$data['rb'] = 0;
															foreach ($data['bayar'] as $rb) {
																$data['rb'] += $rb['bulan_bill'];
															}
															echo "Rp. " . number_format($data['rb'], 0, ',', '.');
															?>
														</b></td>
													<td class="danger text-center"><b>
															<?php
															$data['sisa'] = $this->Bulan_model->get(array('payment_id' => $row['payment_payment_id'], 'status' => 0, 'student_id' => $this->session->userdata('uid_student')));
															$data['rs'] = 0;
															foreach ($data['sisa'] as $rs) {
																$data['rs'] += $rs['bulan_bill'];
															}
															echo "Rp. " . number_format($data['rs'], 0, ',', '.');
															?>
														</b></td>
													<td width="10%" class="text-center danger">
														<a href="<?php echo site_url('student/payout/payout_detail/' . $row['payment_payment_id'] . '/' . $row['student_student_id']) ?>" class="btn btn-sm bg-maroon" data-toggle="tooltip" title="Rincian Pembayaran"><i class="fa fa-dollar"></i>&nbsp;<b>Rincian</b></a>
													</td>
												</tr>
											<?php
												$i++;
											}
											?>
										</tbody>
									-->
									</table>
								</div>
							</div>
							<div class="tab-pane active" id="tab_2">
								<!-- End List Tagihan Bulanan -->
								
								<!-- List Tagihan Lainnya (Bebas) -->
								<div class="box-body table-responsive">
									<table class="table table-hover table-responsive table-bordered" style="white-space: nowrap;">
										<thead>
											<tr class="success">
												<th class="text-center bg-blue">No.</th>
												<th class="text-center bg-blue">Jenis Pembayaran</th>
												<th class="text-center bg-blue">Total Tagihan</th>
												<th class="text-center bg-blue">Sudah Dibayar</th>
												<th class="text-center bg-blue">Sisa Tunggakan</th>
												<th class="text-center bg-blue">Status</th>
												<th class="text-center bg-blue">Detail Tagihan</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i = 1;
											foreach ($bebas as $row) {
												$data['total_bebas'] = $this->Bebas_model->get(array('payment_payment_id' => $row['payment_payment_id'], 'student_id' => $this->session->userdata('uid_student')));
											?>
												<tr class="<?php echo ($row['bebas_bill'] == $row['bebas_total_pay']) ? 'success' : 'danger' ?>">
													<td style="background-color: #fff !important;" class="text-center" width="5%"><?php echo $i ?></td>
													<td style="background-color: #fff !important;"><?php echo $row['pos_name'] . ' - T.P ' . $row['period_start'] . '/' . $row['period_end'] ?></td>
													<td class="text-center"><strong><?php echo "Rp. " . number_format($row['bebas_bill'], 0, ',', '.'); ?></td>
														<td class="text-center"><strong><?php echo "Rp. " .  number_format ($row['bebas_total_pay'] , 0, ',', '.') ?></td>
													<td class="text-center"><strong><?php echo "Rp. " .  number_format($row['bebas_bill'] - $row['bebas_total_pay'] , 0, ',', '.') ?></td>

													<td class="text-center">
														<a href="<?php echo site_url('student/payout/payout_bebas/' . $row['payment_payment_id'] . '/' . $row['student_student_id'] . '/' . $row['bebas_id']) ?>" class="view-cicilan label <?php echo ($row['bebas_bill'] <= $row['bebas_total_pay']) ? 'label-success' : 'label-danger' ?>"> <i class="fa fa-safe"></i> <?php echo ($row['bebas_bill'] <= $row['bebas_total_pay']) ? 'LUNAS' : 'Belum Lunas' ?></a>
													</td>
													<td class="text-center">
														<a data-toggle="modal" class="btn bg-primary btn-sm <?php echo ($row['bebas_bill'] == $row['bebas_total_pay']) ? '' : '' ?>" title="Bayar" href="#keterangan<?php echo $row['bebas_id'] ?>"><span class="fa fa-dollar"></span> <b>Rincian</b></a>
													</td>
												</tr>

												<div class="modal fade" id="keterangan<?php echo $row['bebas_id'] ?>" role="dialog">
													<div class="modal-dialog modal-md">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal">&times;</button>
																<h4 class="modal-title"><?php echo $row['student_nis'] ?> - Detail Tagihan</h4>
															</div>
															<div class="modal-body">
																<div class="row">
																	<div class="col-md-12">
																		<label>Keterangan</label>
																		<textarea rows="5" class="form-control" readonly><?php echo $row['bebas_desc'] ?></textarea>
																	</div>
																</div>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
															</div>
														</div>
													</div>
												</div>
											<?php
												$i++;
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<script type="text/javascript">
	(function(a) {
		a.createModal = function(b) {
			defaults = {
				title: "",
				message: "FMIPA UNIGA !",
				closeButton: true,
				scrollable: false
			};
			var b = a.extend({}, defaults, b);
			var c = (b.scrollable === true) ? 'style="max-height: 420px;overflow-y: auto;"' : "";
			html = '<div class="modal fade" id="myModal">';
			html += '<div class="modal-dialog">';
			html += '<div class="modal-content">';
			html += '<div class="modal-header">';
			html += '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">Tutup</button>';
			if (b.title.length > 0) {
				html += '<h1 class="modal-title">' + b.title + "</h4>"
			}
			html += "</div>";
			html += '<div class="modal-body" ' + c + ">";
			html += b.message;
			html += "</div>";
			html += '<div class="modal-footer">';
			if (b.closeButton === true) {
				html += '<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>'
			}
			html += "</div>";
			html += "</div>";
			html += "</div>";
			html += "</div>";
			a("body").prepend(html);
			a("#myModal").modal().on("hidden.bs.modal", function() {
				a(this).remove()
			})
		}
	})(jQuery);
	/*
	 * DISINI YUD ULAH POHO
	 */
	$(function() {
		$('.view-cicilan').on('click', function() {
			var link = $(this).attr('href');
			var iframe = '<object type="text/html" data="' + link + '" width="100%" height="350">No Support</object>'
			$.createModal({
				title: 'Daftar Pembayaran Mahasiswa',
				message: iframe,
				closeButton: true,
				scrollable: false
			});
			return false;
		});
	});
</script>