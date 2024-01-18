<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Payout_student extends CI_Controller
{

  public function __construct()
  {
    parent::__construct(TRUE);
    if ($this->session->userdata('logged_student') == NULL) {
      header("Location:" . site_url('student/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
    }
    $this->load->model(array('payment/Payment_model', 'student/Student_model', 'period/Period_model', 'pos/Pos_model', 'bulan/Bulan_model', 'bebas/Bebas_model', 'bebas/Bebas_pay_model', 'setting/Setting_model', 'letter/Letter_model', 'logs/Logs_model', 'ltrx/Log_trx_model'));
  }

  public function index($offset = NULL)
  {
    $id = $this->session->userdata('uid');
    $data['month'] = $this->Bulan_model->get(array('period_status' => 1, 'student_id' => $this->session->userdata('uid_student')));
    $data['bayar_month'] = $this->Bulan_model->get(array('status' => 1, 'student_id' => $this->session->userdata('uid_student')));
    $data['belum_month'] = $this->Bulan_model->get(array('status' => 0, 'student_id' => $this->session->userdata('uid_student')));
    $data['bulan'] = $this->Bulan_model->get(array('paymentt' => TRUE, 'student_id' => $this->session->userdata('uid_student')));
    $data['bebas'] = $this->Bebas_model->get(array('student_id' => $this->session->userdata('uid_student')));

    $data['byr_month'] = 0;
    foreach ($data['bayar_month'] as $row) {
      $data['byr_month'] += $row['bulan_bill'];
    }

    $data['blm_month'] = 0;
    foreach ($data['belum_month'] as $row) {
      $data['blm_month'] += $row['bulan_bill'];
    }

    $data['total_month'] = 0;
    foreach ($data['month'] as $row) {
      $data['total_month'] += $row['bulan_bill'];
    }

    $data['total_bulan'] = 0;
    foreach ($data['bulan'] as $row) {
      $data['total_bulan'] += $row['bulan_bill'];
    }

    $data['total_bebas'] = 0;
    foreach ($data['bebas'] as $row) {
      $data['total_bebas'] += $row['bebas_bill'];
    }

    $data['total_bebas_pay'] = 0;
    foreach ($data['bebas'] as $row) {
      $data['total_bebas_pay'] += $row['bebas_total_pay'];
    }
    $data['title'] = 'Rincian Tagihan Mahasiswa';
    $data['main'] = 'payout/payout_student';
    $this->load->view('student/layout', $data);
  }
  public function payout_bebas($id = NULL, $student_id = NULL, $bebas_id = NULL, $pay_id = NULL)
  {
    if ($_POST == TRUE) {
      $lastletter = $this->Letter_model->get(array('limit' => 1));
      $student = $this->Bebas_model->get(array('id' => $this->input->post('bebas_id')));
      $user = $this->Setting_model->get(array('id' => 8));
      $password = $this->Setting_model->get(array('id' => 9));
      $activated = $this->Setting_model->get(array('id' => 10));

      if ($lastletter['letter_year'] < date('Y') or count($lastletter) == 0) {
        $this->Letter_model->add(array('letter_number' => '00001', 'letter_month' => date('m'), 'letter_year' => date('Y')));
        $nomor = sprintf('%05d', '00001');
        $nofull = date('Y') . date('m') . $nomor;
      } else {
        $nomor = sprintf('%05d', $lastletter['letter_number'] + 00001);
        $this->Letter_model->add(array('letter_number' => $nomor, 'letter_month' => date('m'), 'letter_year' => date('Y')));
        $nofull = date('Y') . date('m') . $nomor;
      }
      if ($this->input->post('bebas_id')) {
        $param['bebas_id'] = $this->input->post('bebas_id');
      } 
      $param['bebas_pay_number'] = $nofull;
      $param['bebas_pay_bill'] = $this->input->post('bebas_pay_bill');
      $param['increase_budget'] = $this->input->post('bebas_pay_bill');
      $param['bebas_pay_desc'] = $this->input->post('bebas_pay_desc');
      $param['bebas_bebas_date'] = $this->input->post('bebas_bebas_date');
      $param['user_user_id'] = $this->session->userdata('uid');
      $param['bebas_date'] = $this->input->post('bebas_date');
      $param['bebas_pay_input_date'] = date('Y-m-d H:i:s');
      $param['bebas_pay_last_update'] = date('Y-m-d H:i:s');
      $data['bill'] = $this->Bebas_pay_model->get(array('bebas_id' => $this->input->post('bebas_id')));
      $data['bebas'] = $this->Bebas_model->get(array('payment_id' => $this->input->post('payment_payment_id'), 'student_nis' => $this->input->post('student_nis')));
      $data['total'] = 0;
      foreach ($data['bebas'] as $key) {
        $data['total'] += $key['bebas_bill'];
      }
      $data['total_pay'] = 0;
      foreach ($data['bill'] as $row) {
        $data['total_pay'] += $row['bebas_pay_bill'];
      }
      $sisa = $data['total'] - $data['total_pay'];

      if ($this->input->post('bebas_pay_bill') > $sisa or $this->input->post('bebas_pay_bill') == 0) {
        $this->session->set_flashdata('failed', ' Pembayaran yang anda masukkan melebihi total tagihan!!!');
        redirect('manage/payout?n=' . $student['period_period_id'] . '&r=' . $student['student_nis']);
      } else {
        $idd = $this->Bebas_pay_model->add($param);
        $this->Bebas_model->add(array('increase_budget' => $this->input->post('bebas_pay_bill'), 'bebas_id' =>  $this->input->post('bebas_id'), 'bebas_bebas_date' => date('Y-m-d H:i:s')));

        $log = array(
          'bulan_bulan_id' => NULL,
          'bebas_pay_bebas_pay_id' => $idd,
          'student_student_id' => $this->input->post('student_student_id'),
          'log_trx_input_date' =>  date('Y-m-d H:i:s'),
          'log_trx_last_update' => date('Y-m-d H:i:s'),
        );
        $this->Log_trx_model->add($log);
      }
      $this->session->set_flashdata('success', ' Pembayaran Tagihan berhasil');
      redirect('manage/payout?n=' . $student['period_period_id'] . '&r=' . $student['student_nis']);
    } else {
      $data['class'] = $this->Student_model->get_class();
      $data['payment'] = $this->Payment_model->get(array('id' => $id));
      $data['bebas'] = $this->Bebas_model->get(array('payment_id' => $id, 'student_id' => $student_id));
      $data['student'] = $this->Student_model->get(array('id' => $student_id));
      $data['bill'] = $this->Bebas_pay_model->get(array('bebas_id' => $bebas_id, 'student_id' => $student_id, 'payment_id' => $id));

      $data['total'] = 0;
      foreach ($data['bebas'] as $key) {
        $data['total'] += $key['bebas_bill'];
      }

      $data['total_pay'] = 0;
      foreach ($data['bill'] as $row) {
        $data['total_pay'] += $row['bebas_pay_bill'];
      }
      $data['total_bebas_pay'] = 0;
        foreach ($data['bebas'] as $row) {
            $data['total_bebas_pay'] += $row['bebas_total_pay'];
      }

      $data['title'] = 'Tagihan Mahasiswa';
      $this->load->view('payout/payout_add_bebas', $data);
    }
  }

  public function payout_detail($id = NULL, $student_id = NULL)
  {
    $data['bulan'] = $this->Bulan_model->get(array('payment_id' => $id, 'student_id' => $student_id));
    $data['student'] = $this->Student_model->get(array('id' => $student_id));
    $data['title'] = 'Transaksi Pembayaran Siswa';
    $data['main'] = 'payout/payout_student_detail';
    $this->load->view('student/layout', $data);
  }
  public function log()
  {
    $params['group'] = TRUE;
    $logs['period'] = $this->Bulan_model->get(array('period_status' => 1, 'student_id' => $this->session->userdata('uid_student')));
    $logs['student_id'] = $this->session->userdata('uid_student');
    $logs['limit'] = 3;
    $data['log'] = $this->Log_trx_model->get($logs);
    $data['title'] = 'Transaksi Terakhir';
    $data['main'] = 'payout/payout_student_log';
    $this->load->view('student/layout', $data);
  }
  public function cetakBukti()
  {
    $this->load->helper(array('dompdf'));
    $f = $this->input->get(NULL, TRUE);
    $data['f'] = $f;
    $siswa['student_id'] = '';
    $params = array();
    $param = array();
    $pay = array();
    $cashback = array();

    // Siswa
    if (isset($f['r']) && !empty($f['r']) && $f['r'] != '') {
      $params['student_nis'] = $f['r'];
      $param['student_nis'] = $f['r'];
      $siswa = $this->Student_model->get(array('student_nis' => $f['r']));
    }

    // tanggal
    if (isset($f['d']) && !empty($f['d']) && $f['d'] != '') {
      $param['date'] = $f['d'];
      $cashback['date'] = $f['d'];
    }

    $params['group'] = TRUE;
    $pay['paymentt'] = TRUE;
    $param['status'] = 1;
    $param['student_id'] = $siswa['student_id'];
    $cashback['status'] = 1;
    $pay['student_id'] = $siswa['student_id'];
    $cashback['student_id'] = $siswa['student_id'];

    $data['period'] = $this->Period_model->get($params);
    $data['siswa'] = $this->Student_model->get(array('student_id' => $siswa['student_id'], 'group' => TRUE));
    $data['student'] = $this->Bulan_model->get($pay);
    $data['bulan'] = $this->Bulan_model->get($param);
    $data['bebas'] = $this->Bebas_model->get($pay);
    $data['free'] = $this->Bebas_pay_model->get($param);
    $data['s_bl'] = $this->Bulan_model->get_total($cashback);
    $data['s_bb'] = $this->Bebas_pay_model->get($cashback);

    //total
    $data['summonth'] = 0;
    foreach ($data['s_bl'] as $row) {
      $data['summonth'] += $row['bulan_bill'];
    }

    $data['sumbeb'] = 0;
    foreach ($data['s_bb'] as $row) {
      $data['sumbeb'] += $row['bebas_pay_bill'];
    }
    // endtotal
    $data['setting_district'] = $this->Setting_model->get(array('id' => SCHOOL_DISTRICT));
    $data['setting_city'] = $this->Setting_model->get(array('id' => SCHOOL_CITY));
    $data['setting_school'] = $this->Setting_model->get(array('id' => SCHOOL_NAME));
    $data['setting_address'] = $this->Setting_model->get(array('id' => SCHOOL_ADRESS));
    $data['setting_phone'] = $this->Setting_model->get(array('id' => SCHOOL_PHONE));

    $html = $this->load->view('payout/payout_student_cetak_pdf', $data, true);
    $data = pdf_create($html, 'Salinan_Struk_Pembayaran' . $siswa['student_full_name'] . '_' . date('Y-m-d'), TRUE, 'A4', TRUE);
  }
}
