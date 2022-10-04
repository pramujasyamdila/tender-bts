<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perusahaan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->library(array('form_validation', 'recaptcha'));
        $this->load->model('Vendor/Vendor_model');
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
        $id_vendor = $this->session->userdata('id_vendor');
        $data['row_vendor'] = $this->Vendor_model->row_vendor($id_vendor);
        $data['cek_vendor'] = $this->Vendor_model->jika_ada($id_vendor);
        $data['vendor'] = $this->Vendor_model->ada_pereusahaan($id_vendor);
        $data['title'] = 'Perusahaan';
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar_vendor');
        $this->load->view('template/sidebar_vendor', $data);
        $this->load->view('vendor/perusahaan/index', $data);
        $this->load->view('template/footer');
        $this->load->view('vendor/perusahaan/ajax');
    }
    public function tambah()
    {
        $id_vendor = $this->input->post('id_vendor');
        $nama_bentuk_usaha = $this->input->post('nama_bentuk_usaha');
        $nama_usaha = $this->input->post('nama_usaha');
        $alamat_usaha = $this->input->post('alamat_usaha');
        $telepon_usaha = $this->input->post('telepon_usaha');
        $kode_pos = $this->input->post('kode_pos');
        $npwp = $this->input->post('npwp');
        $cek_vendor = $this->Vendor_model->result_vendor($id_vendor);
        if ($cek_vendor) {
            $data = [
                'nama_bentuk_usaha' => $nama_bentuk_usaha,
                'nama_usaha' => $nama_usaha,
                'alamat_usaha' => $alamat_usaha,
                'telepon_usaha' => $telepon_usaha,
                'kode_pos' => $kode_pos,
                'npwp' => $npwp
            ];
            $this->Vendor_model->update($data, $id_vendor);
        } else {
            $data = [
                'id_vendor' => $id_vendor,
                'nama_bentuk_usaha' => $nama_bentuk_usaha,
                'nama_usaha' => $nama_usaha,
                'alamat_usaha' => $alamat_usaha,
                'telepon_usaha' => $telepon_usaha,
                'kode_pos' => $kode_pos,
                'npwp' => $npwp
            ];
            $this->Vendor_model->insert($data);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }
}
