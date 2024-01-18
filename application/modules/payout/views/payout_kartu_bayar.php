<html>

<head>
	<?php foreach ($siswa as $row) : ?>
		<title>Kartu Pembayaran - <?php echo $row['student_nis'] . ' - ' . $row['student_full_name'] ?></title>
	<?php endforeach ?>
	<style type="text/css">
		.upper {
			text-transform: uppercase;
		}

		.lower {
			text-transform: lowercase;
		}

		.cap {
			text-transform: capitalize;
		}

		.small {
			font-variant: small-caps;
		}
	</style>
	<style type="text/css">
		@page {
			margin-top: 0.1cm;
			/*margin-bottom: 0.1em;*/
			margin-left: 1cm;
			margin-right: 1cm;
			margin-bottom: 0.1cm;
		}

		.style12 {
			font-size: 12px
		}

		.name-school {
			font-size: 15pt;
			font-weight: bold;
			padding-bottom: -15px;
			text-transform: uppercase;
		}

		.alamat {
			font-size: 9pt;
		}

		.style13 {
			font-size: 14pt;
			font-weight: bold;
		}

		.title {
			font-size: 11pt;
			text-align: center;
			font-weight: bold;
			padding-bottom: -15px;
		}

		.tp {
			font-size: 11pt;
			text-align: center;
			font-weight: bold;
		}

		hr {
			border: none;
			height: 2px;
			/* Set the hr color */
			color: #000;
			/* old IE */
			background-color: #000;
			/* Modern Browsers */
		}

		body {
			font-family: sans-serif;
		}

		table {
			border-collapse: collapse;
			font-size: 10pt;
			width: 100%;
			padding-left: 5px;
		}

		th,
		tr,
		td {
			border: 1px solid black;
		}

		.ket {
			word-wrap: break-word
		}
	</style>
</head>

<body>
	<p class="title">KARTU PEMBAYARAN SUMBANGAN SUKARELA</p>
	<p class="title"><?php echo $setting_school['setting_value'] ?></p>
	<p class="tp"> TAHUN PELAJARAN <?php foreach ($period as $row) : ?> <?php echo ($f['n'] == $row['period_id']) ? $row['period_start'] . '/' . $row['period_end'] : '' ?><?php endforeach; ?></p>
	<table width="100%" style="font-size: 12px; margin-top: -10px" border="0">
		<tr>
			<td width="150">Nomor Induk Mahasiswa</td>
			<td width="5">:</td>
			<?php foreach ($siswa as $row) : ?>
				<td width="200"><?php echo $row['student_nis'] ?></td>
			<?php endforeach; ?>

			<td width="50">Semester</td>
			<td width="5">:</td>
			<?php foreach ($siswa as $row) : ?>
				<td><?php echo $row['class_name'] ?></td>
			<?php endforeach; ?>
		</tr>
		<tr>
			<td width="150">Nama Lengkap</td>
			<td width="5">:</td>
			<?php foreach ($siswa as $row) : ?>
				<td><?php echo $row['student_full_name'] ?></td>
			<?php endforeach; ?>

			<?php if (majors() == 'senior') { ?>
				<td width="50">Program Studi</td>
				<td width="5">:</td>
				<?php foreach ($siswa as $row) : ?>
					<td><?php echo $row['majors_name'] ?></td>
				<?php endforeach; ?>
			<?php } ?>
		</tr>
	</table>
	<br>
	<?php if ($f['n'] and $f['r'] != NULL) { ?>
		<table width="100%" style="font-size: 12px; margin-top: -10px">
			<tr>
				<th width="5%" style="height: 21px;">NO</th>
				<th width="40%" style="text-align: left; padding-left:10px;"> NAMA PEMBAYARAN</th>
				<th width="30%">JUMLAH</th>
				<th width="25%">TTD</th>
			</tr>
			<?php
			$i = 1;
			foreach ($bulan as $row) :
				$namePay = $row['pos_name'];
				$mont = ($row['month_month_id'] <= 6) ? $row['period_start'] : $row['period_end'];
			?>
				<tr>
					<td style="height: 20px; text-align: center;"><?php echo $i ?></td>
					<td style="white-space: nowrap; padding:0 10px;"><?php echo ($row['bulan_status'] == 0) ? $namePay . ' - ' . '......................' : $namePay . ' - ' . $row['month_name'] . ' ' . $mont ?></td>
					<td style="padding:0 10px; white-space: nowrap;"><?php echo ($row['bulan_status'] == 0) ? 'Rp. ......................' : 'Rp. ' . number_format($row['bulan_bill'], 0, ',', '.') ?></td>
					<td style="padding:0 10px;">
						<?php
						$sisa = $i % 2;
						if ($sisa == 1) {
							echo "<center>$i.</center>";
						} else {
							echo $i . ".";
						}
						?>
					</td>
				</tr>
			<?php
				$i++;
			endforeach
			?>
		</table>
	<?php } else redirect('manage/payout?n=' . $f['n'] . '&r=' . $f['r'])  ?>
	<table style="width:100%; margin-top: 10px; font-size: 9pt;" border="0">
		<tr>
			<td width="5%"></td>
			<td width="60%"></td>
			<td><span class="cap"><?php echo $setting_city['setting_value'] ?></span>, <?php echo pretty_date(date('Y-m-d'), 'd F Y', false) ?></td>
		</tr>
		<tr>
			<td width="5%"></td>
			<td>Bendahara,</td>
			<td>Petugas,</td>
		</tr>

	</table>
	<br>
	<br>
	<br>
	<table width="100%" style="font-size: 8pt;" border="0">
		<tr>
			<td width="5%"></td>
			<td width="60%"><strong><span class="upper">( ................................ )</span></strong></td>
			<td><strong><span class="upper">( <?php echo $this->session->userdata('ufullname'); ?> )</span></strong></td>
		</tr>
	</table>
</body>

</html>