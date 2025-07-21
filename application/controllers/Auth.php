<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index() {
        // Jika sudah login, redirect ke halaman utama bengkel
        if ($this->session->userdata('is_logged_in')) {
            redirect('servis'); // DIUBAH: Arahkan ke dashboard servis
        }
        $this->load->view('auth/login');
    }

    public function login_process() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->User_model->get_by_username($username);

        if ($user && password_verify($password, $user->password)) {
            // Login berhasil, set session
            $session_data = array(
                'id_user'       => $user->id_user,
                'username'      => $user->username,
                'nama_lengkap'  => $user->nama_lengkap,
                'is_logged_in'  => TRUE
            );
            $this->session->set_userdata($session_data);
            redirect('servis'); // DIUBAH: Arahkan ke dashboard servis
        } else {
            // Login gagal
            $this->session->set_flashdata('error', 'Username atau Password salah!');
            redirect('auth');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth');
    }
}