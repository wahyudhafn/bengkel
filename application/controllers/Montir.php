<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Montir extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('is_logged_in')) { redirect('auth'); }
        $this->load->model('Montir_model');
    }

    private function _rules() {
        return [
            ['field' => 'nama_montir', 'label' => 'Nama Montir', 'rules' => 'required'],
            ['field' => 'spesialisasi', 'label' => 'Spesialisasi', 'rules' => 'required'],
        ];
    }

    public function index() {
        $data['title'] = "Data Montir";
        $data['montir'] = $this->Montir_model->get_all();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('montir/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah() {
        $data['title'] = "Tambah Data Montir";
        $validation = $this->form_validation;
        $validation->set_rules($this->_rules());

        if ($validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('montir/tambah', $data);
            $this->load->view('template/footer');
        } else {
            $this->Montir_model->save();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan.</div>');
            redirect("montir");
        }
    }

    public function edit($id = null) {
        if (!isset($id)) redirect('montir');

        $data['title'] = "Edit Data Montir";
        $data['montir'] = $this->Montir_model->get_by_id($id);
        
        $validation = $this->form_validation;
        $validation->set_rules($this->_rules());

        if ($validation->run() == FALSE) {
            if (!$data['montir']) show_404();
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('montir/edit', $data);
            $this->load->view('template/footer');
        } else {
            $this->Montir_model->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diupdate.</div>');
            redirect("montir");
        }
    }

    public function hapus($id = null) {
        if (!isset($id)) show_404();
        if ($this->Montir_model->delete($id)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus.</div>');
            redirect("montir");
        }
    }
}