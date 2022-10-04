<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tenaga extends CI_Controller
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
        $data['title'] = 'tenaga Kerja';
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar_vendor');
        $this->load->view('template/sidebar_vendor', $data);
        $this->load->view('vendor/tenaga/index', $data);
        $this->load->view('template/footer');
        $this->load->view('vendor/tenaga/ajax');
    }


    public function tambah_tenaga()
    {
        $id_vendor = $this->input->post('id_vendor');
        $nama_tenaga_ahli = $this->input->post('nama_tenaga_ahli');
        $nip = $this->input->post('nip');
        $pendidikan = $this->input->post('pendidikan');
        $prodi = $this->input->post('prodi');
        $spesialis = $this->input->post('spesialis');
        $config['upload_path'] = './bukti_tenaga_ahli/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('bukti_tenaga_ahli')) {

            $fileData = $this->upload->data();

            $upload = [
                'id_vendor' => $id_vendor,
                'nama_tenaga_ahli' => $nama_tenaga_ahli,
                'nip' => $nip,
                'pendidikan' => $pendidikan,
                'prodi' => $prodi,
                'spesialis' => $spesialis,
                'bukti_tenaga_ahli' => $fileData['file_name'],
            ];
            $this->Vendor_model->tambah_tenaga($upload);
            $this->output->set_content_type('application/json')->set_output(json_encode($upload));
        } else {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect(base_url('upload'));
        }
    }
    public function data_get_tenaga()
    {
        $resultss = $this->Vendor_model->getdatatable_tenaga();
        $no = $_POST['start'];
        // $total = 0;
        $data = [];
        foreach ($resultss as $angga) {
            $row = array();
            $row[] = ++$no;
            $row[] = $angga->nama_tenaga_ahli;
            $row[] = $angga->nip;
            $row[] = $angga->pendidikan;
            $row[] = $angga->prodi;
            $row[] = $angga->spesialis;
            $row[] = '<a href=' . base_url('/bukti_tenaga_ahli' . '/' . $angga->bukti_tenaga_ahli) . '>' . '<img width="40px" src=' . base_url('assets/pdf.png') . ' >' . '</a>';
            $row[] = '<a href="javascript:;" class="btn btn-danger btn-block  btn-sm" onClick="by_id(' . "'" . $angga->id_tenaga_ahli . "','hapus'" . ')">  <i class="fas fa-times"></i> Hapus</a><a href="javascript:;" class="btn btn-info btn-block  btn-sm" onClick="by_id(' . "'" . $angga->id_tenaga_ahli . "','edit'" . ')">  <i class="fas fa-edit"></i> Edit</a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Vendor_model->count_all_data_tenaga(),
            "recordsFiltered" => $this->Vendor_model->count_filtered_data_tenaga(),
            "data" => $data,
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }
}
