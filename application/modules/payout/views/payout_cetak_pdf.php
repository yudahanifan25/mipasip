<!DOCTYPE html>
<html>

<head>
	<title><?php foreach ($siswa as $row) : ?> <?php echo ($f['r'] == $row['student_nis']) ? $row['student_full_name'] : '' ?><?php endforeach; ?></title>
</head>

<style type="text/css">
	@page {
		margin-top: 0.1cm;
		/*margin-bottom: 0.1em;*/
		margin-left: 1cm;
		margin-right: 1cm;
		margin-bottom: cm;
	}

	.name-school {
		font-size: 15pt;
		font-weight: bold;
		padding-bottom: -15px;
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
		font-family: sans-serif
		padding-top: 0px;
		padding-bottom: 0px;
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
	}

	.topright {
		position: absolute;
		top: 0;
		right: 0;
		font-size: 18px;
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
	.title {
      font-size: 14pt;
      text-align: center;
      font-weight: bold;
      padding-bottom: -15px;
    }

    .tp {
      font-size: 10pt;
      text-align: center;
      font-weight: bold;
    }
</style>

<body>
	<center><img src="<?php echo media_url('img/mipabaru.png') ?>" style="height: 70px; width: 70px; padding-top :9px; margin-bottom: -20px;">
  <p class="title" style="padding-top: 0px; margin-top: 0px;"><br>UNIVERSITAS GARUT<br>FAKULTAS MATEMATIKA DAN IPA</p>
  <P class="alamat">Jalan Jati No. 42 Telp. (0262) 540181 Tarogong - Garut 44151</P>
   <hr>
  <p class="title"><u>BUKTI PEMBAYARAN MAHASISWA</u></p>
  <p class="tp"> TAHUN AKADEMIK <?php foreach ($period as $row) : ?> <?php echo ($f['n'] == $row['period_id']) ? $row['period_start'] . '/' . $row['period_end'] : '' ?><?php endforeach; ?></p>
	<table style="padding-top: 2px; padding-bottom: 5px ">
		<br>
		<tbody>
			<tr>
				<td style="width: 1px;">NPM</td>
				<?php foreach ($siswa as $row) : ?>
					<td style="width: 20px; text-align: left;">: <?php echo $row['student_nis'] ?></td>
				<?php endforeach ?>
				
			</tr>
			<tr>
				<td style="width: 1px;">Nama</td>
				<?php foreach ($siswa as $row) : ?>
					<td style="width: 150px;"><strong>: <?php echo $row['student_full_name'] ?></td>
				<?php endforeach ?>
			</tr>
				
			<tr>
				<td style="width: 1px;">Semester</td>
				<?php foreach ($siswa as $row) : ?>
					<td style="width: 2px;">: <?php echo $row['class_name'] ?></td>
				<?php endforeach ?>
			</tr>
			<tr>
				<td style="width: 1px;">Program Studi</td>
				<?php foreach ($siswa as $row) : ?>
					<td style="width: 150px;">: <?php echo $row['majors_name'] ?></td>
				<?php endforeach ?>
			</tr>
		</tbody>
	</table>
	<b>
		<b>
	<table style="border-style: solid;">
<b>
	<h>
		<tr>
			<th colspan="3" style="border: 1px solid black; border-top: 1px solid; border-bottom: 1px solid; text-align: center">Kewajiban Pembayaran</th>
			
			<th colspan="3" style="border: 1px solid black; border-top: 1px solid; border-bottom: 1px solid; text-align: center">Status Pembayaran</th>
		</tr>
		<tr>
			<th style=" border: 1px solid black; border-top: 1px solid; border-bottom: 1px solid; text-align:center;">No.</th>
			<th style=" border: 1px solid black; border-top: 1px solid; border-bottom: 1px solid; text-align: center;">Pembayaran</th>
			<th style=" border: 1px solid black; border-top: 1px solid; border-bottom: 1px solid; text-align: center;">Tagihan <br> (Rp.)</br></th>
			<th style=" border: 1px solid black; border-top: 1px solid; border-bottom: 1px solid; text-align:center;">No.</th>
			<th style=" border: 1px solid black; border-top: 1px solid; border-bottom: 1px solid; text-align: center;">Tanggal pembayaran</th>
			<th colspan="1" style="border: 1px solid black; border-top: 1px solid; border-bottom: 1px solid; text-align: center">Jumlah Pembayaran <br>(Rp.)</br></th>
		</tr>
		<?php
		$i = 1;
		foreach ($bulan as $row) :
			$namePay = $row['pos_name'] . ' - T.A ' . $row['period_start'] . '/' . $row['period_end'];
			$mont = ($row['month_month_id'] <= 6) ? $row['period_start'] : $row['period_end'];
			$desc = $row['bulan_pay_desc'];
		?>
			<tr>
				<td style=" border: 1px solid black; border-bottom: 1px solid;padding-top: 1px; padding-bottom: 1px; text-align:center;"><?php echo $i ?></td>
				<td style=" border: 1px solid black; border-bottom: 1px solid;"><?php echo $namePay . ' - (' . $row['month_name'] . ' ' . $mont . ')' ?>
					<?php if ($desc == NULL) { ?>
					<?php } else { ?>
						<br>
						<b style="font-size: 9px;">Keterangan: <?php echo $desc ?>
						</b>
					<?php } ?>
				</td>
				<td style=" border: 1px solid black; border-bottom: 1px solid"><?php echo 'Rp. ' . number_format($row['bulan_bill'], 0, ',', '.') ?></td>
				<td style=" border: 1px solid black; border-bottom: 1px solid;">Rp. </td>
				<td style=" border: 1px solid black; border-bottom: 1px solid;">Rp. </td>
				<td style=" border: 1px solid black; border-bottom: 1px solid; text-align: right;"><?php echo number_format($row['bulan_bill'], 0, ',', '.') ?></td>
			</tr>
		<?php
			$i++;
		endforeach ?>

		<?php
		$j = 1;
		foreach ($free as $row) :
			$namePayFree = $row['pos_name'];
		?>
			<tr>
				<td style="border: 1px solid black; border-bottom: 1px solid;padding-top: 2px; padding-bottom: 2px; text-align:center;"><?php echo $j; ?></td>
				<td style="border: 1px solid black; border-bottom: 1px solid;"><?php echo $namePayFree ?>
					<?php if ($row['bebas_pay_desc'] == NULL) { ?>
					<?php	} else { ?>
						<br>
						
					<?php } ?>
				</td>
				<td style= "border: 1px solid black; border-bottom: 1px solid;text-align: right;"><?php echo number_format($row['bebas_bill'], 0, ',', '.') ?><br>
					
				</td>
				<td style="border: 1px solid black; border-bottom: 1px solid;padding-top: 2px; padding-bottom:2px; text-align:center;"><?php echo $j ?></td>
				<td style="border: 1px solid black; border-bottom: 1px solid;text-align: center;"><?php echo pretty_date($row['bebas_date'], 'd-m-Y', false); ?></td>
				<td style="border: 1px solid black; border-bottom: 1px solid; text-align: right;"><?php echo number_format($row['bebas_pay_bill'], 0, ',', '.') ?><br>
					
				</td>
			</tr>
		<?php
			$j++;
		endforeach ?>

<!-- -->
		<tr>
			<th style= "background-color: #ffffff; font-weight:bold; border-bottom: 0px solid;"></th>
			<th style=" background-color: #dedede; font-weight:bold; border-bottom: 0px solid; font-size: 9px;"><strong>TOTAL TAGIHAN</th>
			<th style="background-color: #dedede; font-weight:bold;border-bottom: 0px solid; text-align: right;  font-size: 13px;"><u><?php echo 'Rp. ' .number_format($sumbeb, 0, ',', '.') ?></th>
			<th style= "background-color: #ffffff; font-weight:bold; border-bottom: 0px solid;"></th>
			<th style=" background-color: #dedede; font-weight:bold; border-bottom: 0px solid; font-size: 9px"><strong>TOTAL PEMBAYARAN</th>
			<th style="background-color: #dedede; font-weight:bold;border-bottom: 0px solid; text-align: right;  font-size: 13px;"><u><?php echo 'Rp. ' .number_format($summonth + $sumbeb, 0, ',', '.') ?></u></th>
		</tr>
		<tr>
			<!-- --colspan---
			<td colspan="2" style="text-align: center;padding-top: 3px; padding-bottom: 3px;">
				<?php echo $setting_city['setting_value'] ?>, <?php echo pretty_date(date('Y-m-d'), 'd F Y', false) ?><br>Bagian Keuangan
			-->
			<th colspan="1" style="background-color: #FFFFFF;"></th>
			<td style= "background-color: #dedede; font-weight:bold; border-bottom: 0px solid; font-size: 9px"><strong>TOTAL SISA TAGIHAN</td>
			<td style= "background-color: #dedede; font-weight:bold;border-bottom: 0px solid; text-align: right; font-size: 13px;"><u><?php echo 'Rp. ' .number_format($row['bebas_bill'] - $row['bebas_total_pay'], 0, ',', '.') ?></u></td>
		</tr>
		<tr>
			<th colspan="1" style="background-color: #FFFFFF;"></th>
			<td  style= " background-color: #dedede; font-weight:bold; border-bottom: 0px solid; font-size: 9px"><strong>KELEBIHAN BAYAR </td>
			<td style=" background-color: #dedede; font-weight:bold;border-bottom: 0px solid; text-align: right; font-size: 13px;"><!--Rp. &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; <u>230.000</u>--><?php echo '+Rp. ' .number_format($row['bebas_total_pay'] - $row['bebas_bill'], 0, ',', '.') ?></td>

			<!--SCRIPT KELEBIHAN BAYAR  dengan menyebut nama allah yang maha pengasih lagi maha penyayang , aku berlindung kepada allah dari godaan setan yang terkutuk , dengan menyebut nama allah yang maha pengasih lagi maha penyayan g, aku berlindung kepada allah dari godaan setan yang terkutuk-->
			<!--<?php echo  number_format($row['bebas_total_pay'] - $row['bebas_bill'], 0, ',', '.') ?>-->
		</tr>
		<tr>
			<th colspan="1" style="background-color: #FFFFFF;"></th>
			<td style=" background-color: #dedede; font-weight:bold; border-bottom: 0px solid; font-size: 9px"><strong>KETERANGAN</td>
			<td style=" background-color: #dedede; font-weight:bold;border-bottom: 0px solid; text-align: right; font-size: 15px;"><?php echo ($row['bebas_bill'] <= $row['bebas_total_pay']) ? '<u>LUNAS' : '<u>BELUM LUNAS' ?></td>
		</tr>
		<tr>
			<td>
				
			</td>
			<td colspan="5" style="border-bottom: 0px solid; text-align: right; padding-top: 5px; padding-bottom: 5px;"><?php echo $setting_city['setting_value'] ?>, <?php echo pretty_date(date('Y-m-d'), 'd F Y', false) ?></td><br>
			<tr>
			<td colspan="6" style="border-bottom: 0px solid; text-align: right; padding-top: 5px; padding-bottom: 5px;">Bagian Keuangan</td>
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
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td colspan="6" style="border-bottom: 0px solid; text-align: right; padding-top: 5px; padding-bottom: 5px;">(<?php echo ucfirst($this->session->userdata('ufullname')); ?>)</td>
		</tr>
	</table>

	<table>
		
		<tr>
			<td colspan="20px; sumbeb">
				
			</td>
		</tr>
	</table>


	<br>
</body>


</html>
