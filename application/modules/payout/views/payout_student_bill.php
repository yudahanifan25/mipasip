<html>

<head>
  <?php foreach ($siswa as $row) : ?>
    <title>Detail Rincian Tagihan - <?php echo $row['student_full_name'] ?></title>
  <?php endforeach ?>
  <style type="text/css">
    .upper {
      text-transform: uppercase;
      text-align: right;
    }

    .lower {
      text-transform: lowercase;
    }

    .cap {
      text-transform: capitalize;
      text-align: right;
    }
    .alamat {
    font-size: 9pt;
    margin-bottom: -10px;

    .small {
      font-variant: small-caps;
    }
  </style>
  <style type="text/css">
    .style12 {
      font-size: 9px
    }

    .style13 {
      font-size: 14pt;
      font-weight: bold;
    }

    .title {
      font-size: 10pt;
      text-align: center;
      font-weight: bold;
      padding-bottom: -15px;
    }

    .tp {
      font-size: 9pt;
      text-align: center;
      font-weight: bold;
    }

    body {
      font-family: sans-serif;
    padding-top: -30px;
    padding-bottom: 0px;
    padding-right: 0px;
    padding-left: 0px;
    }

    table {
      border-collapse: collapse;
      font-size: 9pt;
      width: 100%;
      padding-left: 0px;
       padding-right: : 0px;
    }

    .ket {
      word-wrap: break-word
    }
  </style>
</head>

<body>
  <center><img src="<?php echo media_url('img/mipabaru.png') ?>" style="height: 70px; width: 70px; border:0px">
  <p class="title" style="padding-top: -15px; margin-top: 0px;"><br>UNIVERSITAS GARUT<br>FAKULTAS MATEMATIKA DAN ILMU PENGETAHUAN ALAM</p>
  <P class="alamat">Jalan Jati No. 42 Telp. (0262) 540181 Tarogong - Garut 44151</P>
   <hr>
  <p class="title"><u>STATUS PEMBAYARAN MAHASISWA</u></p>
  <p class="tp"> TAHUN AKADEMIK <?php foreach ($period as $row) : ?> <?php echo ($f['n'] == $row['period_id']) ? $row['period_start'] . '/' . $row['period_end'] : '' ?><?php endforeach; ?></p>
<br>
  <table width="100%" border="0">
    <tr>
      <td width="100">NPM</td>
      <td width="2">:</td>
      <?php foreach ($siswa as $row) : ?>
        <td width=""><?php echo $row['student_nis'] ?></td>
      <?php endforeach; ?>
    </tr>
    <tr>
      <td>Nama Lengkap</td>
      <td>:</td>
      <?php foreach ($siswa as $row) : ?>
       <td><strong><?php echo $row['student_full_name'] ?></strong></td>
      <?php endforeach; ?>
    </tr>
    <tr>
      <td>Semester</td>
      <td>:</td>
      <?php foreach ($siswa as $row) : ?>
        <td><?php echo $row['class_name'] ?></td>
      <?php endforeach; ?>
    </tr>
    <?php if (majors() == 'senior') { ?>
      <tr>
        <td>Program Studi</td>
        <td>:</td>
        <?php foreach ($siswa as $row) : ?>
          <td><?php echo $row['majors_name'] ?></td>
        <?php endforeach; ?>
      </tr>
    <?php } ?>
  </table><br>
  <?php if ($f['n'] and $f['r'] != NULL) { ?>
    <table style="border-style: solid;" width=104%" height=30%  style="font-size: 10px;" border="1">
       <tr>
        <th colspan="3" style="background-color: #dedede; padding: 10px; font-weight:bold; border-bottom: 0px solid; padding bottom: 0.9px; padding-top: 7px;">KEWAJIBAN PEMBAYARAN</th>
        <th colspan="4" style="background-color: #dedede; padding: 10px; font-weight:bold; border-bottom: 0px solid; padding bottom: 0.9px; padding-top: 7px;">STATUS PEMBAYARAN</th>
      </tr>
      <tr>
        <th style="background-color: #dedede; font-weight:bold; border-bottom: 0px solid;">NO</th>
        <th style="background-color: #dedede; font-weight:bold; border-bottom: 0px solid;" >NAMA PEMBAYARAN</th>
          <th style="background-color: #dedede; font-weight:bold; border-bottom: 0px solid;" >TOTAL TAGIHAN</th>
        <th style="background-color: #dedede; font-weight:bold; border-bottom: 0px solid;" >TANGGAL PEMBAYARAN</th>
        <th style="background-color: #dedede; font-weight:bold; border-bottom: 0px solid;">JUMLAH PEMBAYARAN</th>
         <th style="background-color: #dedede; font-weight:bold; border-bottom: 0px solid;">SISA SEMUA TAGIHAN</th>
        <th style="background-color: #dedede; font-weight:bold; border-bottom: 0px solid;">KETERANGAN</th>
      </tr>
      <!--
      <?php
      $i = 1;
      foreach ($bulan as $row) :
        // $namePay = $row['pos_name'] . ' - T.A ' . $row['period_start'] . '/' . $row['period_end'];
        $namePay = $row['pos_name'];
        $mont = ($row['month_month_id'] <= 6) ? $row['period_start'] : $row['period_end'];
      ?>
        <tr>
          <td style="text-align: center;"><?php echo $i ?></td>
          <td style="white-space: nowrap; padding:0 5px; "><?php echo $namePay . ' - (' . $row['month_name'] . ' ' . $mont . ')' ?></td>
          <td style="padding:0 5px; text-align: <?php echo ($row['bulan_status'] == 1) ? 'left' : ''; ?>;"><?php echo ($row['bulan_status'] == 1) ? pretty_date($row['bulan_date_pay'], 'd F Y', false) : '-' ?></td>
          <td style="padding:0 5px; white-space: nowrap;"><?php echo ($row['bulan_status'] == 0) ? 'Rp. ' . number_format($row['bulan_bill'], 0, ',', '.') : 'Rp. -' ?></td>
          <td style="padding:0 5px;"><?php echo ($row['bulan_status'] == 1) ? 'Lunas' : 'Belum Lunas' ?></td>
        </tr>
      <?php
        $i++;
      endforeach
      ?>
    -->
      <?php
      $j = 1;
      foreach ($bebas as $row) :
        // $namePayFree = $row['pos_name'] . ' - T.A ' . $row['period_start'] . '/' . $row['period_end'];
        $namePayFree = $row['pos_name'];
      ?>
        <tr>
          <td style="text-align: center;"><?php echo $j; ?></td>
          <td style="padding:0 5px; text-align:"><?php echo $namePayFree ?></td>
           <td style="padding:0 5px; text-align: right;"><?php echo  number_format ($row['bebas_bill'] , 0, ',', '.') ?></td>
          <td style="padding:0 5px; text-align: center; <?php echo ($row['bebas_total_pay'] > 0) ? 'left' : '' ?>"><?php echo ($row['bebas_total_pay'] > 0) ? pretty_date($row['bebas_last_update'], 'd F Y', false) : '<strong>Belum Melakukan Pembayaran'  ?></td>
           <td style="padding:0 5px; text-align: right;"><?php echo  number_format ($row['bebas_total_pay'] , 0, ',', '.') ?></td>
          <td style="padding:0 5px; text-align: right;"><?php echo  number_format($row['bebas_bill'] - $row['bebas_total_pay'] , 0, ',', '.') ?></td>
          <td style="word-break:break-all; word-wrap:break-word; padding:0 5px; text-align: center;">
            <?php echo ($row['bebas_bill'] <= $row['bebas_total_pay']) ? ' <center><strong>LUNAS' : '<center><strong>BELUM LUNAS' ?>
            <?php if ($row['bebas_desc'] == NULL) { ?>
            <?php  } else { ?>
              <br>
      
            <?php } ?>
          </td>
        </tr>
      <?php
        $j++;
      endforeach
      ?>




      <tr>
        <td rowspan="1" colspan="2" style="background-color: #dedede; font-weight:bold; border-bottom: 0px ; border-right: 0px; border-left: 0px; padding-bottom: 8px; padding-top: 8px;" align="center"><strong>TOTAL</td>
        <td style="background-color: #dedede; font-weight:bold; border-bottom: 0px ; border-left: 0px; border-right: 0px;" align="right"><strong><?php echo 'Rp. ' .number_format($total_bebas, 0, ',', '.') ?></strong></td>
<td style=" background-color: #dedede; font-weight:bold; border-bottom: 0px ; border-left: 0px; border-right: 0px;"></td>

         <td style="background-color: #dedede; font-weight:bold; border-bottom: 0px solid; border-left: 0px; border-right: 0px;" align="right"><strong>Rp.&nbsp;&nbsp;<?php echo number_format($summonth + $sumbeb, 0, ',', '.') ?></strong></td>
          <td style="background-color: #dedede; font-weight:bold; border-bottom: 0px solid; border-left: 0px; border-right: 0px;" align="right"><strong><?php echo 'Rp.  (' . number_format($total_bebas - $total_bebas_pay, 0, ',', '.') ?>) </strong></td> 
           <td style="background-color: #dedede; font-weight:bold; border-bottom: 0px solid; border-left: 0px; border-right: 0px;" align="center"><?php echo ($row['bebas_bill'] > $row['bebas_total_pay']) ? '<u>TUNTAS' : '<u>BELUM TUNTAS' ?></td>
             <?php if ($row['bebas_desc'] > NULL) { ?>
            <?php  } else { ?>
              <br>
      
            <?php } ?>
      </th>
  </tr>


    </table>
  <?php } else redirect('manage/payout?n=' . $f['n'] . '&r=' . $f['r'])  ?>

  <br><br>
  <table width="100%" style="font-size: 10pt; text-align: right; ">
    <tr>
      <td><span class="cap"><?php echo $setting_city['setting_value'] ?></span>, <?php echo pretty_date(date('Y-m-d'), 'd F Y', false) ?></td>
    </tr>
    <tr>
      <td>Bagian Keuangan</td>
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
      <td><strong><u><span class="upper">( <?php echo $this->session->userdata('ufullname'); ?> )</span></u></strong></td>
    </tr>
  </table>
</body>

</html>
