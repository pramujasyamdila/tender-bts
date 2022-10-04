<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'form', 'string'));
        $this->load->model('Auth_model');
        $this->load->library(array('form_validation', 'recaptcha'));
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $recaptcha = $this->input->post('g-recaptcha-response');
        if (!empty($recaptcha)) {
            $response = $this->recaptcha->verifyResponse($recaptcha);
            if (isset($response['success']) and $response['success'] === true) {
                if ($this->form_validation->run() == false) {
                    $data['title'] = 'LOGIN';
                    $this->load->view('auth/v_login', $data);
                    $this->load->view('auth/ajax', $data);
                    $this->session->set_flashdata('salah', 'Username Atau Password Salah');
                    redirect('auth');
                } else {
                    $username = $this->input->post('username');
                    $password = $this->input->post('password');
                    $qrcode = random_string('numeric', 4);
                    $this->role_login->login($username, $password, $qrcode);
                }
            }
        }
        $data['widget'] = $this->recaptcha->getWidget();
        $data['script'] = $this->recaptcha->getScriptTag();
        $this->load->view('auth/v_login', $data);
    }

    public function auth_otp()
    {
        $this->form_validation->set_rules('otp_verifikasi', 'OTP SALAH', 'required|trim|matches[otp_verifikasi2]', ['required' => 'KODE OTP Diisi!', 'matches' => 'KODE OTP SALAH']);
        $this->form_validation->set_rules('otp_verifikasi2', 'OTP', 'required|trim|matches[otp_verifikasi]', ['required' => 'KODE OTP harus diisi!', 'matches' => 'KODE OTP SALAH']);
        if ($this->form_validation->run() == false) {
            $data['title'] = 'OTP VERIFIKASI';
            $this->load->view('halaman_otp', $data);
            $this->session->set_flashdata('pesan', 'KODE OTP SALAH');
            redirect('otp_halaman');
        } else {
            redirect('dashboard');
        }
    }
    public function auth_otp_pengajuan()
    {
        $this->form_validation->set_rules('otp_verifikasi', 'OTP SALAH', 'required|trim|matches[otp_verifikasi2]', ['required' => 'KODE OTP Diisi!', 'matches' => 'KODE OTP SALAH']);
        $this->form_validation->set_rules('otp_verifikasi2', 'OTP', 'required|trim|matches[otp_verifikasi]', ['required' => 'KODE OTP harus diisi!', 'matches' => 'KODE OTP SALAH']);
        if ($this->form_validation->run() == false) {
            $data['title'] = 'OTP VERIFIKASI';
            $this->load->view('halaman_otp', $data);
            $this->session->set_flashdata('pesan', 'KODE OTP SALAH');
            redirect('otp_halaman');
        } else {
            redirect('landing');
        }
    }

    public function update_otp($kode_otp)
    {
        $where = [
            'auth_otp'  => $kode_otp
        ];
        $data = [
            'auth_otp' => 0,
        ];
        $this->Auth_model->update($where, $data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function logout()
    {
        $this->role_login->logout();
    }
}
