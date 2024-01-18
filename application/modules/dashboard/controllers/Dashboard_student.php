<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_student extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_student') == NULL) {
            header("Location:" . site_url('student/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
        }
        $this->load->model(array('users/Users_model', 'holiday/Holiday_model'));
        $this->load->model(array('student/Student_model', 'bulan/Bulan_model', 'setting/Setting_model', 'bebas/Bebas_model', 'information/Information_model', 'bebas/Bebas_pay_model'));
        $this->load->model('logs/Logs_model');
        $this->load->library('user_agent');
    }

    public function index()
    {
        $id = $this->session->userdata('uid');
        $data['bulan'] = $this->Bulan_model->get(array('status' => 0, 'period_status' => 1, 'student_id' => $this->session->userdata('uid_student')));
        $data['bebas'] = $this->Bebas_model->get(array('period_status' => 1, 'student_id' => $this->session->userdata('uid_student')));
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

        $this->load->library('form_validation');
        if ($this->input->post('add', TRUE)) {
            $this->form_validation->set_rules('date', 'Tanggal', 'required');
            $this->form_validation->set_rules('info', 'Info', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
            if ($_POST and $this->form_validation->run() == TRUE) {
                list($tahun, $bulan, $tanggal) = explode('-', $this->input->post('date', TRUE));
                $params['year'] = $tahun;
                $params['date'] = $this->input->post('date');
                $params['info'] = $this->input->post('info');
                $ret = $this->Holiday_model->add($params);
                $this->session->set_flashdata('success', 'Tambah Agenda berhasil');
                redirect('student');
            }
        } elseif ($this->input->post('del', TRUE)) {
            $this->form_validation->set_rules('id', 'ID', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

            if ($_POST and $this->form_validation->run() == TRUE) {
                $id = $this->input->post('id', TRUE);
                $this->Holiday_model->delete($id);

                $this->session->set_flashdata('success', 'Hapus Agenda berhasil');
                redirect('student');
            }
        }
        $params['limit'] = 2;
        $params['information_publish'] = 1;
        $data['information'] = $this->Information_model->get($params);
        $data['title'] = 'Dashboard';
        $data['main'] = 'dashboard/dashboard_student';
        $this->load->view('student/layout', $data);
    }
    public function get()
    {
        $events = $this->Holiday_model->get();
        foreach ($events as $i => $row) {
            $data[$i] = array(
                'id' => $row['id'],
                'title' => strip_tags($row['info']),
                'start' => $row['date'],
                'end' => $row['date'],
                'year' => $row['year'],
            );
        }
        echo json_encode($data, TRUE);
    }
}
