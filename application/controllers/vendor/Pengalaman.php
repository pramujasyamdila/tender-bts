<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengalaman extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->library(array('form_validation', 'recaptcha'));
        $this->load->model('Vendor/Vendor_model');
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
        $data['title'] = 'Pengalaman Kerja';
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar_vendor');
        $this->load->view('template/sidebar_vendor', $data);
        $this->load->view('vendor/pengalaman/index', $data);
        $this->load->view('template/footer');
        $this->load->view('vendor/pengalaman/ajax');
    }


    public function tambah_pengalaman()
    {
        $id_vendor = $this->input->post('id_vendor');
        $nama_pekerjaan = $this->input->post('nama_pekerjaan');
        $pemberi_kerja = $this->input->post('pemberi_kerja');
        $nomor_kontrak = $this->input->post('nomor_kontrak');
        $tanggal_kontrak = $this->input->post('tanggal_kontrak');
        $nilai_kontrak = $this->input->post('nilai_kontrak');
        $alamat_pekerjaan = $this->input->post('alamat_pekerjaan');
        $tanggal_mulai_pengalaman = $this->input->post('tanggal_mulai_pengalaman');
        $tanggal_selesai_pengalaman = $this->input->post('tanggal_selesai_pengalaman');
        $config['upload_path'] = './bukti_pengalaman/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('bukti_pengalaman')) {

            $fileData = $this->upload->data();

            $upload = [
                'id_vendor' => $id_vendor,
                'nama_pekerjaan' => $nama_pekerjaan,
                'pemberi_kerja' => $pemberi_kerja,
                'nomor_kontrak' => $nomor_kontrak,
                'tanggal_kontrak' => $tanggal_kontrak,
                'nilai_kontrak' => $nilai_kontrak,
                'alamat_pekerjaan' => $alamat_pekerjaan,
                'tanggal_mulai_pengalaman' => $tanggal_mulai_pengalaman,
                'tanggal_selesai_pengalaman' => $tanggal_selesai_pengalaman,
                'bukti_pengalaman' => $fileData['file_name'],
            ];
            $this->Vendor_model->tambah_pengalaman($upload);
            $this->output->set_content_type('application/json')->set_output(json_encode($upload));
        } else {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect(base_url('upload'));
        }
    }
    public function data_get_pengalaman()
    {
        $resultss = $this->Vendor_model->getdatatable_pengalaman();
        $no = $_POST['start'];
        // $total = 0;
        $data = [];
        foreach ($resultss as $angga) {
            $row = array();
            $row[] = ++$no;
            $row[] = $angga->nama_pekerjaan;
            $row[] = $angga->pemberi_kerja;
            $row[] = "Rp " . number_format($angga->nilai_kontrak, 2, ',', '.');
            $row[] = $angga->tanggal_mulai_pengalaman;
            $row[] = $angga->tanggal_selesai_pengalaman;
            $row[] = '<a href=' . base_url('/bukti_pengalaman' . '/' . $angga->bukti_pengalaman) . '>' . '<img width="40px" src=' . base_url('assets/pdf.png') . ' >' . '</a>';
            $row[] = '<a href="javascript:;" class="btn btn-danger btn-block  btn-sm" onClick="by_id(' . "'" . $angga->id_pengalaman . "','hapus'" . ')">  <i class="fas fa-times"></i> Hapus</a><a href="javascript:;" class="btn btn-info btn-block  btn-sm" onClick="by_id(' . "'" . $angga->id_pengalaman . "','edit'" . ')">  <i class="fas fa-edit"></i> Edit</a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Vendor_model->count_all_data_pengalaman(),
            "recordsFiltered" => $this->Vendor_model->count_filtered_data_pengalaman(),
            "data" => $data,
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }
}
