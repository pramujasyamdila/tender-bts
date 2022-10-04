<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'form', 'string'));
        $this->load->model('Auth_vendor_model');
        $this->load->library(array('form_validation', 'recaptcha'));
    }

    public function index()
    {
        $this->form_validation->set_rules('username_vendor', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $recaptcha = $this->input->post('g-recaptcha-response');
        if (!empty($recaptcha)) {
            $response = $this->recaptcha->verifyResponse($recaptcha);
            if (isset($response['success']) and $response['success'] === true) {
                if ($this->form_validation->run() == false) {
                    $data['title'] = 'LOGIN';
                    $this->load->view('vendor/auth/v_login', $data);
                    $this->load->view('vendor/auth/ajax', $data);
                    $this->session->set_flashdata('salah', 'Username Atau Password Salah');
                    redirect('vendor/auth');
                } else {
                    $username_vendor = $this->input->post('username_vendor');
                    $password = $this->input->post('password');
                    $qrcode = random_string('numeric', 4);
                    $this->role_login_vendor->login($username_vendor, $password, $qrcode);
                }
            }
        }
        $data['widget'] = $this->recaptcha->getWidget();
        $data['script'] = $this->recaptcha->getScriptTag();
        $this->load->view('vendor/auth/v_login', $data);
    }

    public function auth_otp()
    {
        $this->form_validation->set_rules('otp_verifikasi', 'OTP SALAH', 'required|trim|matches[otp_verifikasi2]', ['required' => 'KODE OTP Diisi!', 'matches' => 'KODE OTP SALAH']);
        $this->form_validation->set_rules('otp_verifikasi2', 'OTP', 'required|trim|matches[otp_verifikasi]', ['required' => 'KODE OTP harus diisi!', 'matches' => 'KODE OTP SALAH']);
        if ($this->form_validation->run() == false) {
            $data['title'] = 'OTP VERIFIKASI';
            $this->load->view('vendor/halaman_otp', $data);
            $this->session->set_flashdata('pesan', 'KODE OTP SALAH');
            redirect('vendor/otp_halaman');
        } else {
            redirect('vendor/dashboard');
        }
    }

    public function update_otp($kode_otp)
    {
        $where = [
            'otp_verifikasi'  => $kode_otp
        ];
        $data = [
            'otp_verifikasi' => 0,
        ];
        $this->Auth_vendor_model->update($where, $data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function logout()
    {
        $this->role_login_vendor->logout();
    }

    public function registrasi()
    {
        $this->form_validation->set_rules('username_vendor', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $password = $this->input->post('password');
        $username_vendor = $this->input->post('username_vendor');
        $telepon_vendor = $this->input->post('telepon_vendor');
        if ($this->form_validation->run() == false) {
            $data = ['Rergistasi'];
            $this->load->view('vendor/registrasi', $data);
            $this->session->set_flashdata('salah', 'Username Atau Password Salah');
            redirect('vendor/registrasi');
        } else {

            $data = [
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'username_vendor' => $username_vendor,
                'telepon_vendor' => $telepon_vendor,

            ];
            $this->Auth_vendor_model->regisdata($data);
            $this->session->set_flashdata('pesan', 'Anda Telah Berhasil Registrasi');
            redirect('vendor/registrasi');
        }
    }
}
