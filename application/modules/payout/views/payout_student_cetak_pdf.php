<!DOCTYPE html>
<html>

<head>
	<title><?php foreach ($siswa as $row) : ?> <?php echo ($f['r'] == $row['student_nis']) ? $row['student_full_name'] : '' ?><?php endforeach; ?></title>
</head>

<style type="text/css">
	@page {
		margin-top: 0.5cm;
		/*margin-bottom: 0.1em;*/
		margin-left: 1cm;
		margin-right: 1cm;
		margin-bottom: 0.1cm;
	}

	.name-school {
		font-size: 15pt;
		font-weight: bold;
		padding-bottom: -15px;
		padding-top: -10px;
		text-transform: uppercase;
	}

	.alamat {
		font-size: 9pt;
		margin-bottom: -10px;
	}

	.detail {
		font-size: 10pt;
		font-weight: bold;
		padding-top: -15px;
		padding-bottom: -12px;
	}

	body {
		font-family: sans-serif;
	}

	table {
		font-family: verdana, arial, sans-serif;
		font-size: 11px;
		color: #333333;
		border-width: none;
		/*border-color: #666666;*/
		border-collapse: collapse;
		width: 100%;
	}

	th {
		padding-bottom: 8px;
		padding-top: 8px;
		border-color: #666666;
		background-color: #dedede;
		/*border-bottom: solid;*/
		text-align: left;
	}

	td {
		text-align: left;
		border-color: #666666;
		background-color: #ffffff;
	}

	hr {
		border: none;
		height: 1px;
		/* Set the hr color */
		color: #333;
		/* old IE */
		background-color: #333;
		/* Modern Browsers */
	}

	.container {
		position: relative;
		height: 20px;
	}

	.topright {
		position: absolute;
		top: 0;
		right: 0;
		font-size: 14px;
		border-width: thin;
		padding: 5px;
	}

	.topright2 {
		position: absolute;
		top: 30px;
		right: 50px;
		font-size: 18px;
		border: 1px solid;
		padding: 5px;
		color: red;
	}
</style>

<body>

	<div class="container">
		<?php if (!empty($row['student_img'])) { ?>
            <img src="<?php echo upload_url('student/' . $row['student_img']) ?>" style="height: 60px; width: 50px; border:1px solid;">
          <?php } else { ?>
            <img src="<?php echo media_url('img/missing.png') ?>" style="height: 60px; width: 50px; border:1px solid;">
          <?php } ?>

		<div class="topright"><u>Salinan Bukti Pembayaran</u></div>
	</div>
<center><img src="<?php echo media_url('img/mipabaru.png') ?>" style="height: 70px; width: px; border:0px"></center>
<p class="name-school" align="center">FAKULTAS MIPA</p>
	<p class="name-school" align="center"><?php echo $setting_school['setting_value'] ?></p>
	<p class="alamat" align="center"><?php echo $setting_address['setting_value'] ?><br>
		Telp. <?php echo $setting_phone['setting_value'] ?></p>
	<hr>
	<table style="padding-top: -5px; padding-bottom: 5px">
		<tbody>
			<tr>
				<td style="width: 100px;">NPM</td>
				<td style="width: 5px;">:</td>
				<?php foreach ($siswa as $row) : ?>
					<td style="width: 150px;"><?php echo $row['student_nis'] ?></td>
				<?php endforeach ?>
				<td style="width: 130px;" align="right">Tanggal Pembayaran</td>
				<td style="width: 5px;">:</td>
				<td style="width: 131px;" align="right"><?php echo pretty_date($f['d'], 'd F Y', false) ?></td>
			</tr>
			<tr>
				<td style="width: 100px;">Nama</td>
				<td style="width: 5px;">:</td>
				<?php foreach ($siswa as $row) : ?>
					<td style="width: 150px;"><strong><?php echo $row['student_full_name'] ?></td>
				<?php endforeach ?>
				<td style="width: 100px;" align="right">Semester</td>
				<td style="width: 5px;">:</td>
				<?php foreach ($siswa as $row) : ?>
					<td style="width: 150px;" align="right"><?php echo $row['class_name'] ?>&nbsp;<?php echo $row['majors_name'] ?></td>
				<?php endforeach ?>
			</tr>
		</tbody>
	</table>
	<hr>
	<p class="detail">Rincian Pembayaran:</p>

	<table style="border-style: solid;">
		<tr>
			<th style="border-top: 1px solid; border-bottom: 1px solid; text-align:center;">No.</th>
			<th style="border-top: 1px solid; border-bottom: 1px solid;">Pembayaran</th>
			<th style="border-top: 1px solid; border-bottom: 1px solid;">Total Tagihan</th>
			<th colspan="2" style="border-top: 1px solid; border-bottom: 1px solid; text-align: center">Jumlah Pembayaran</th>
		</tr>
		<?php
		$i = 1;
		foreach ($bulan as $row) :
			$namePay = $row['pos_name'] . ' - T.A ' . $row['period_start'] . '/' . $row['period_end'];
			$mont = ($row['month_month_id'] <= 6) ? $row['period_start'] : $row['period_end'];
			$desc = $row['bulan_pay_desc'];
		?>
			<tr>
				<td style="border-bottom: 1px solid;padding-top: 10px; padding-bottom: 10px; text-align:center;"><?php echo $i ?></td>
				<td style="border-bottom: 1px solid;"><?php echo $namePay . ' - (' . $row['month_name'] . ' ' . $mont . ')' ?>
					<?php if ($desc == NULL) { ?>
					<?php } else { ?>
						<br>
						<b style="font-size: 9px;">Keterangan: <?php echo $desc ?>
						</b>
					<?php } ?>
				</td>
				<td style="border-bottom: 1px solid"><?php echo 'Rp. ' . number_format($row['bulan_bill'], 0, ',', '.') ?></td>
				<td style="border-bottom: 1px solid;">Rp. </td>
				<td style="border-bottom: 1px solid; text-align: right;"><?php echo number_format($row['bulan_bill'], 0, ',', '.') ?></td>
			</tr>
		<?php
			$i++;
		endforeach ?>

		<?php
		$j = $i;
		foreach ($free as $row) :
			$namePayFree = $row['pos_name'] ;
		?>
			<tr>
				<td style="border-bottom: 1px solid;padding-top: 10px; padding-bottom: 10px; text-align:center;"><?php echo $j ?></td>
				<td style="border-bottom: 1px solid;"><?php echo $namePayFree ?>
					<?php if ($row['bebas_pay_desc'] == NULL) { ?>
					<?php	} else { ?>
						<br>
						<b style="font-size: 9px;">Ket: <?php echo $row['bebas_pay_desc'] ?></b>
					<?php } ?>
				</td>
				<td style="border-bottom: 1px solid;"><?php echo 'Rp. ' . number_format($row['bebas_bill'], 0, ',', '.') ?><br>
					
				</td>
				<td style="border-bottom: 1px solid;">Rp. </td>
				<td style="border-bottom: 1px solid; text-align: right;"><?php echo number_format($row['bebas_pay_bill'], 0, ',', '.') ?><br>
					
				</td>
			</tr>
		<?php
			$j++;
		endforeach ?>

		<tr>
			<td colspan="2" style="text-align: center;padding-top: 5px; padding-bottom: 5px;"></td>
			<td style="background-color: #dedede; font-weight:bold; border-bottom: 1px solid;">Total Pembayaran</td>
			<td style="background-color: #dedede;font-weight:bold;border-bottom: 1px solid;">Rp. </td>
			<td style="background-color: #dedede; font-weight:bold;border-bottom: 1px solid; text-align: right;"><?php echo number_format($summonth + $sumbeb, 0, ',', '.') ?></td>
		</tr>

		<tr>
			<td colspan="2" style="text-align: center;padding-top: 5px; padding-bottom: 5px;"></td>
			<td style="background-color: #dedede; font-weight:bold; border-bottom: 1px solid;">Sisa Tagihan</td>
			<td style="background-color: #dedede;font-weight:bold;border-bottom: 1px solid;">Rp. </td>
			<td style="background-color: #dedede; font-weight:bold;border-bottom: 1px solid; text-align: right;"><?php echo  number_format($row['bebas_bill'] - $row['bebas_total_pay'], 0, ',', '.') ?></td>
		</tr>
		<tr>
			<td colspan="2" style="text-align: center;padding-top: 5px; padding-bottom: 5px;"></td>
			<td style="background-color: #dedede; font-weight:bold; border-bottom: 1px solid;">Kelebihan Bayar</td>
			<td style="background-color: #dedede;font-weight:bold;border-bottom: 1px solid;">Rp. </td>
			<td style="background-color: #dedede; font-weight:bold;border-bottom: 1px solid; text-align: right;"> &nbsp; + &nbsp; <?php echo  number_format($row['bebas_total_pay'] - $row['bebas_bill'], 0, ',', '.') ?></td>
		</tr>
		<tr>
			<td colspan="2" style="border-bottom: 0px solid; text-align: left; padding-top: 5px; padding-bottom: 5px;">&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $setting_city['setting_value'] ?>, <?php echo pretty_date(date('Y-m-d'), 'd F Y', false) ?></td>
			<td style="background-color: #dedede; font-weight:bold; border-bottom: 1px solid; font-size: 15px;">KETERANGAN</td>
			<td style="background-color: #dedede;font-weight:bold;border-bottom: 1px solid ; font-size: 15px;"> =  </td>
			<td style="background-color: #dedede; font-weight:bold;border-bottom: 1px solid; text-align: right; font-size: 15px;"><?php echo ($row['bebas_bill'] <= $row['bebas_total_pay']) ? '<u>LUNAS' : '<u>BELUM LUNAS' ?></td>
		</tr>

		<tr>
			<td colspan="2" style="text-align: center;"></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2" style="border-bottom: 0px solid; text-align: left; padding-top: 5px; padding-bottom: 5px;">&nbsp;&nbsp;&nbsp;&nbsp;  <u><strong>(<?php echo ucfirst($this->session->userdata('ufullname')); ?>)</td>

		</tr>

	</table>
	<br>
</body>
