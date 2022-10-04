<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registrasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // $this->load->helper(array('url', 'form'));
        // $this->load->library(array('form_validation', 'recaptcha'));
        // $this->load->model('Unit_kerja/Unit_kerja_model');
        // $this->load->model('Beranda/Beranda_model');
        // $this->load->model('Pegawai/Pegawai_model');
        // $this->load->model('Laporan/Laporan_model');
        // if ($this->session->userdata('nama_pegawai')) {
        // } else {
        //     redirect('landing');
        // }
    }
    public function index()
    {
        $data['title'] = 'Registrasi';
        $this->load->view('vendor/registrasi/index');
    }
}
