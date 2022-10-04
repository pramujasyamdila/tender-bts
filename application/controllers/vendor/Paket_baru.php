


<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paket_baru extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // $this->load->helper(array('url', 'form'));
        // $this->load->library(array('form_validation', 'recaptcha'));
        // $this->load->model('Unit_kerja/Unit_kerja_model');
        $this->load->model('Vendor/Paket_baru_model');
        $this->load->model('Pegawai/Pegawai_model');
        $this->load->model('Paket/Paket_model');
        $this->load->model('Vendor/Vendor_model');
        // if ($this->session->userdata('nama_pegawai')) {
        // } else {
        //     redirect('landing');
        // }
    }
    public function index()
    {
        $data['title'] = 'Paket Baru';
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar_vendor');
        $this->load->view('template/sidebar_vendor', $data);
        $this->load->view('vendor/paket_baru/index', $data);
        $this->load->view('template/footer');
        $this->load->view('vendor/paket_baru/ajax');
    }

    public function getdata_tender()
    {
        $resultss = $this->Paket_baru_model->getdatatable();
        $data = [];
        $no = $_POST['start'];
        foreach ($resultss as $angga) {
            $row = array();
            $row[] = ++$no;
            $row[] = $angga->kode_tender_random;
            $row[] = '<a href="javascript:;" onClick="byid(' . "'" . $angga->id_paket . "' ,'detail'" . ')">' . $angga->nama_paket . '</a>';
            $row[] = $angga->kualifikasi_usaha;
            if ($angga->status_selesai_tender == 1) {
                $row[] = '<label class="badge badge-success">Tender Telah Selesai</label>';
            } else {
                $row[] = '<label class="badge badge-warning">Tender Sedang Berlangsung</label>';
            }
            if ($angga->status_selesai_tender == 1) {
                $row[] = '<a href="javascript:;" class="disabled btn btn-warning btn-sm btn-block"><i class="fas fa-file"></i> Tender Telah Selesai</a>';
            } else {
                $row[] = '<a href="javascript:;" class="btn btn-info btn-sm btn-block " onClick="byid(' . "'" . $angga->id_paket . "','ikuti_tender'" . ')"><i class="fas fa-file"></i> Ikut tender</a>';
            }

            $data[] = $row;
        }
        $output = array(
            "draw" => intval($_POST['draw']),
            "recordsTotal" => $this->Paket_baru_model->count_all_data(),
            "recordsFiltered" => $this->Paket_baru_model->count_filtered_data(),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
        $output = array(
            "draw" => intval($_POST['draw']),
            "recordsTotal" => $this->Paket_baru_model->count_all_data(),
            "recordsFiltered" => $this->Paket_baru_model->count_filtered_data(),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }


    public function by_id_paket($id_paket)
    {
        $cek_sudah_mengikuti = $this->Paket_model->get_vendor_mengikuti_paket($id_paket);
        $paket = $this->Paket_model->row_paket($id_paket);
        $output = [
            "paket" => $paket,
            "cek_mengikuti" => $cek_sudah_mengikuti,

        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }



    public function ikuti_paket()
    {
        $id_paket = $this->input->post('id_paket');
        $id_vendor = $this->session->userdata('id_vendor');
        $data = [
            "id_paket_mengikuti" => $id_paket,
            "id_vendor_mengikuti" => $id_vendor,
            "status_mengikuti_paket" => 1
        ];
        $this->Vendor_model->insert_ke_tbl_mengikuti_paket($data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }
}
