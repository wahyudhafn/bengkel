<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('is_logged_in')) { redirect('auth'); }
        $this->load->model('Pelanggan_model');
    }

    private function _rules() {
        return [
            ['field' => 'nama_pelanggan', 'label' => 'Nama Pelanggan', 'rules' => 'required'],
            ['field' => 'telepon', 'label' => 'Telepon', 'rules' => 'required|numeric'],
            ['field' => 'alamat', 'label' => 'Alamat', 'rules' => 'required'],
        ];
    }

    public function index() {
        $data['title'] = "Data Pelanggan";
        $data['pelanggan'] = $this->Pelanggan_model->get_all();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('pelanggan/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah() {
        $data['title'] = "Tambah Data Pelanggan";
        $validation = $this->form_validation;
        $validation->set_rules($this->_rules());

        if ($validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('pelanggan/tambah', $data);
            $this->load->view('template/footer');
        } else {
            $this->Pelanggan_model->save();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan.</div>');
            redirect("pelanggan");
        }
    }

    public function edit($id = null) {
        if (!isset($id)) redirect('pelanggan');

        $data['title'] = "Edit Data Pelanggan";
        $data['pelanggan'] = $this->Pelanggan_model->get_by_id($id);
        
        $validation = $this->form_validation;
        $validation->set_rules($this->_rules());

        if ($validation->run() == FALSE) {
            if (!$data['pelanggan']) show_404();
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('pelanggan/edit', $data);
            $this->load->view('template/footer');
        } else {
            $this->Pelanggan_model->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diupdate.</div>');
            redirect("pelanggan");
        }
    }

    public function hapus($id = null) {
        if (!isset($id)) show_404();
        if ($this->Pelanggan_model->delete($id)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus.</div>');
            redirect("pelanggan");
        }
    }
}