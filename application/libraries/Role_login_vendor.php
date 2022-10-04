<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class role_login_vendor
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('Auth_vendor_model');
        $this->ci->load->helper('string');
    }

    public function login($username_vendor, $password, $qrcode)
    {
        $cek = $this->ci->Auth_vendor_model->login($username_vendor);
        $dataqr = [
            'otp_verifikasi' => $qrcode,
        ];
        $where = [
            'id_vendor' => $cek->id_vendor
        ];
        $this->ci->Auth_vendor_model->update($where, $dataqr);
        if ($cek) {
            if ($cek && password_verify($password, $cek->password)) {
                if ($cek->status == 1) {
                    $username_vendor = $cek->username_vendor;
                    $email_vendor = $cek->email_vendor;
                    $id_vendor = $cek->id_vendor;
                    $telepon_vendor = $cek->telepon_vendor;
                    $otp_verifikasi = $cek->otp_verifikasi;
                    $alamat_vendor = $cek->alamat_vendor;
                    $this->ci->session->set_userdata('alamat_vendor', $alamat_vendor);
                    $this->ci->session->set_userdata('username_vendor', $username_vendor);
                    $this->ci->session->set_userdata('telepon_vendor', $telepon_vendor);
                    $this->ci->session->set_userdata('email_vendor', $email_vendor);
                    $this->ci->session->set_userdata('id_vendor', $id_vendor);
                    $this->ci->session->set_userdata('otp_verifikasi', $otp_verifikasi);
                    // buat session
                    $config = array(
                        'protocol' => 'smtp',
                        'smtp_host' => 'mail.jmtm.co.id',
                        'smtp_port' => 465,
                        'smtp_user' => 'eproc@jmtm.co.id',
                        'smtp_pass' => '@dminJMTM!',
                        'mailtype'  => 'html',
                        'charset'   => 'iso-8859-1'
                    );
                    $this->ci->load->library('email', $config);
                    $this->ci->email->set_newline("\r\n");
                    // Email dan nama pengirim
                    $this->ci->email->from('eproc@jmtm.co.id', 'JMTM MANAJEMEN DOKUMEN');
                    // Email penerima

                    $this->ci->email->to($this->ci->session->userdata('email')); // Ganti dengan email tujuan

                    // Subject email
                    $this->ci->email->subject('JMTM MANAJEMEN DOKUMEN : KODE OTP');

                    // Isi email
                    $this->ci->email->message("Masukan Kode Otp Anda : $qrcode https://doc-proc.jmtm.co.id/vendor/otp_halaman");

                    $this->ci->email->send();
                    redirect('vendor/otp_halaman');
                } else {
                    $this->ci->session->set_flashdata('tidak_aktif', 'Username Tidak Aktif');
                    redirect('vendor/auth');
                }
            } else {
                $this->ci->session->set_flashdata('salah', 'Username Atau Password Salah');
                redirect('vendor/auth');
            }
        } else {
            $this->ci->session->set_flashdata('salah', 'Username Tidak Terdaftar');
            redirect('vendor/auth');
        }
    }
    public function cek_login()
    {
        if ($this->ci->session->userdata('username_vendor') == "") {
            $this->ci->session->set_flashdata('pesan', 'Anda Belom Login !!!');
            redirect('vendor/auth');
        }
    }
    public function logout()
    {
        $this->ci->session->unset_userdata('username_vendor');
        $this->ci->session->unset_userdata('email_vendor');
        $this->ci->session->unset_userdata('id_vendor');
        $this->ci->session->unset_userdata('telepon_vendor');
        $this->ci->session->unset_userdata('otp_verifikasi');
        $this->ci->session->set_flashdata('berhasil', 'Anda Berhasil Logout');
        redirect('vendor/auth');
    }
}
