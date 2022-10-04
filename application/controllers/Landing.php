<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // $this->load->helper(array('url', 'form'));
        // $this->load->library(array('form_validation', 'recaptcha'));
        // $this->load->model('Unit_kerja/Unit_kerja_model');
        // $this->load->model('Beranda/Beranda_model');
        $this->load->model('Pegawai/Pegawai_model');
        // $this->load->model('Laporan/Laporan_model');
        // if ($this->session->userdata('nama_pegawai')) {
        // } else {
        //     redirect('landing');
        // }
    }
    public function index()
    {
        $this->load->view('template/landing');
    }
    public function pengajuan()
    {
        $this->load->view('template/pengajuan');
    }

    public function kirim_pengajuan()
    {
        $kebutuhan = $this->input->post('kebutuhan');
        $lokasi = $this->input->post('lokasi');
        $penanggung_jawab = $this->input->post('penanggung_jawab');
        $id_pegawai = $this->session->userdata('id_pegawai');
        $anggaran = $this->input->post('anggaran');
        $keterangan = $this->input->post('keterangan');
        $data = [
            'kebutuhan' => $kebutuhan,
            'lokasi' => $lokasi,
            'penanggung_jawab' => $penanggung_jawab,
            'id_pegawai' => $id_pegawai,
            'anggaran' => $anggaran,
            'keterangan' => $keterangan,
        ];
        $this->Pegawai_model->kirim_pengajuan($data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }
}
