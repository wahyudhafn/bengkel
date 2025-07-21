<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Servis extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('is_logged_in')) {
            redirect('auth');
        }
        $this->load->model('Servis_model');
        $this->load->model('Pelanggan_model');
        $this->load->model('Montir_model');
    }

    private function _rules()
    {
        return [
            ['field' => 'id_pelanggan', 'label' => 'Pelanggan', 'rules' => 'required'],
            ['field' => 'id_montir', 'label' => 'Montir', 'rules' => 'required'],
            ['field' => 'no_polisi', 'label' => 'No Polisi', 'rules' => 'required'],
            ['field' => 'tanggal_masuk', 'label' => 'Tanggal Masuk', 'rules' => 'required'],
            ['field' => 'keluhan', 'label' => 'Keluhan', 'rules' => 'required']
        ];
    }

    public function index()
    {
        $data['title'] = 'Dashboard Bengkel';

        // Data untuk Info Box
        $data['total_pelanggan'] = $this->Pelanggan_model->count_all();
        $data['total_montir'] = $this->Montir_model->count_all();
        $data['servis_selesai'] = $this->Servis_model->count_by_status('Selesai');
        $data['servis_dikerjakan'] = $this->Servis_model->count_by_status('Dikerjakan');

        // Data untuk Tabel Order Terbaru
        $data['servis_terbaru'] = $this->Servis_model->get_all_servis();

        // Data untuk Grafik
        $monthly_data = $this->Servis_model->get_monthly_servis_data();

        // Inisialisasi array untuk 12 bulan
        $chart_labels = [];
        $chart_data = array_fill(0, 12, 0);
        $nama_bulan = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"];

        foreach ($nama_bulan as $bulan) {
            $chart_labels[] = $bulan;
        }

        foreach ($monthly_data as $row) {
            // array index dimulai dari 0, bulan dari 1
            $chart_data[$row['bulan'] - 1] = (int) $row['jumlah'];
        }

        $data['chart_labels'] = json_encode($chart_labels);
        $data['chart_data'] = json_encode($chart_data);

        // Memuat view
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('servis/index', $data); // Ini view dashboard kita
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Order Servis';
        $data['pelanggan'] = $this->Pelanggan_model->get_all();
        $data['montir'] = $this->Montir_model->get_all();
        $validation = $this->form_validation;
        $validation->set_rules($this->_rules());

        if ($validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('servis/tambah', $data);
            $this->load->view('template/footer');
        } else {
            $this->Servis_model->save();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data order berhasil disimpan.</div>');
            redirect('servis');
        }
    }

    public function edit($id = null)
    {
        if (!isset($id))
            redirect('servis');

        $data['title'] = 'Edit Order Servis';
        $data['servis'] = $this->Servis_model->get_by_id($id);
        $data['pelanggan'] = $this->Pelanggan_model->get_all();
        $data['montir'] = $this->Montir_model->get_all();
        $validation = $this->form_validation;
        $validation->set_rules($this->_rules());

        if ($validation->run() == FALSE) {
            if (!$data['servis'])
                show_404();
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('servis/edit', $data);
            $this->load->view('template/footer');
        } else {
            $this->Servis_model->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data order berhasil diupdate.</div>');
            redirect('servis');
        }
    }

    public function hapus($id = null)
    {
        if (!isset($id))
            show_404();
        if ($this->Servis_model->delete($id)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data order berhasil dihapus.</div>');
            redirect('servis');
        }
    }
}