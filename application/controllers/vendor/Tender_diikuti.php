


<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tender_diikuti extends CI_Controller
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
        $this->load->model('Evaluasi/Evaluasi_model');
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
        $this->load->view('vendor/tender_diikuti/index', $data);
        $this->load->view('template/footer');
        $this->load->view('vendor/tender_diikuti/ajax');
    }

    public function informasi_tender($id_paket)
    {
        $data['total_rincian_hps']  = $this->Paket_model->totalRincianHps($id_paket);
        $data['angga'] = $this->Paket_model->row_paket($id_paket);
        $data['angga2'] = $this->Paket_model->row_paket2($id_paket);
        $data['penyeleksi'] = $this->Paket_model->pegawai_penyeleksi();
        $data['cek_pemenang'] = $this->Paket_model->cek_pemenang($id_paket);
        $data['cek_undangan'] = $this->Evaluasi_model->cek_pembuktian($id_paket);
        $data['title'] = 'Paket Baru';
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar_vendor');
        $this->load->view('template/sidebar_vendor', $data);
        $this->load->view('vendor/informasi_tender/index', $data);
        $this->load->view('template/footer');
        $this->load->view('vendor/informasi_tender/ajax');
    }

    public function getdata_tender_diikuti()
    {
        $resultss = $this->Paket_baru_model->getdata_tender_diikuti();
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

            $row[] = '<a href="' . base_url('vendor/tender_diikuti/informasi_tender/') . $angga->id_paket . '" class="btn btn-warning btn-sm btn-block"><i class="fas fa-eye"></i> Informasi Tender</a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => intval($_POST['draw']),
            "recordsTotal" => $this->Paket_baru_model->count_all_data_diikuti(),
            "recordsFiltered" => $this->Paket_baru_model->count_filtered_data_diikuti(),
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

    public function upload_dokumen_persyaratan($id_paket)
    {
        $nama_dokumen = $this->input->post('nama_dokumen');
        $config['upload_path'] = './file_dokumen_persyaratan_vendor/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_dokumen')) {

            $fileData = $this->upload->data();

            $upload = [
                'id_paket' => $id_paket,
                'id_vendor' => $this->session->userdata('id_vendor'),
                'nama_dokumen' => $nama_dokumen,
                'file_dokumen' => $fileData['file_name'],
            ];
            $this->Paket_baru_model->tambah_dokumen_syarat_vendor($upload);
            $this->output->set_content_type('application/json')->set_output(json_encode($upload));
        } else {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect(base_url('upload'));
        }
    }

    public function delete_dokumen_pengadaan($id_dokumen_pengadaan)
    {
        $this->Paket_baru_model->delete_dokumen_syarat_vendor($id_dokumen_pengadaan);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }


    public function getdatatable_persyaratan_vendor($id_paket)
    {
        $resultss = $this->Paket_baru_model->getdata_tender_persyaratan($id_paket);
        $data = [];
        $no = $_POST['start'];
        foreach ($resultss as $angga) {
            $row = array();
            $row[] = ++$no;
            $row[] =  $angga->nama_dokumen;
            if ($angga->status_persyaratan == 1) {
                $row[] = '<label for="" class="badge badge-success badge-sm">Sudah Diperikasa</label>';
            } else {
                $row[] = '<label for="" class="badge badge-danger badge-sm">Belum Diperikasa</label>';
            }
            $row[] = '<a href=' . base_url('/file_dokumen_persyaratan_vendor' . '/' . $angga->file_dokumen) . '>' . '<img width="40px" src=' . base_url('assets/pdf.png') . ' >' . '</a>';

            if ($angga->status_persyaratan == 1) {
                $row[] = '<a href="javascript:;"  class="btn btn-sm btn-danger disabled"><i class="fas fa fa-trash"></i> </a>';
            } else {
                $row[] = '<a href="javascript:;"  class="btn btn-sm btn-danger" id="prosess" onClick="by_id_persyartaan_vendor(' . "'" . $angga->id_dokumen_syarat_vendor  . "','hapus_pengadaan'" . ')"><i class="fas fa fa-trash"></i> </a>';
            }

            $data[] = $row;
        }
        $output = array(
            "draw" => intval($_POST['draw']),
            "recordsTotal" => $this->Paket_baru_model->count_all_data_persyaratan($id_paket),
            "recordsFiltered" => $this->Paket_baru_model->count_filtered_data_persyaratan($id_paket),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }




    public function by_id_persyartaan_vendor($id_dokumen_syarat_vendor)
    {
        $get_dokumen = $this->Paket_baru_model->get_row_vendor_persyaratn($id_dokumen_syarat_vendor);
        $output = [
            "get_dokumen" => $get_dokumen,

        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    // INI UNTUK YG PROMOSI
    public function getdatatable_promosi_vendor($id_paket)
    {
        $resultss = $this->Paket_baru_model->getdata_tender_promosi($id_paket);
        $data = [];
        $no = $_POST['start'];
        foreach ($resultss as $angga) {
            $row = array();
            $row[] = ++$no;
            $row[] =  $angga->nama_dokumen_promosi;
            if ($angga->status_promosi == 1) {
                $row[] = '<label for="" class="badge badge-success badge-sm">Sudah Diperikasa</label>';
            } else {
                $row[] = '<label for="" class="badge badge-danger badge-sm">Belum Diperikasa</label>';
            }
            $row[] = '<a href=' . base_url('/file_dokumen_promosi_vendor' . '/' . $angga->file_dokumen_promosi) . '>' . '<img width="40px" src=' . base_url('assets/vidpdf.png') . ' >' . '</a>';

            if ($angga->status_promosi == 1) {
                $row[] = '<a href="javascript:;"  class="btn btn-sm btn-danger disabled"><i class="fas fa fa-trash"></i> </a>';
            } else {
                $row[] = '<a href="javascript:;"  class="btn btn-sm btn-danger" id="prosess" onClick="by_id_vendor_promosi(' . "'" . $angga->id_promosi  . "','hapus_promosi'" . ')"><i class="fas fa fa-trash"></i> </a>';
            }

            $data[] = $row;
        }
        $output = array(
            "draw" => intval($_POST['draw']),
            "recordsTotal" => $this->Paket_baru_model->count_all_data_promosi($id_paket),
            "recordsFiltered" => $this->Paket_baru_model->count_filtered_data_promosi($id_paket),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }


    public function upload_dokumen_promosi($id_paket)
    {
        $nama_dokumen_promosi = $this->input->post('nama_dokumen_promosi');
        $config['upload_path'] = './file_dokumen_promosi_vendor/';
        $config['allowed_types'] = 'pdf|mp4';
        $config['max_size'] = 0;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_dokumen_promosi')) {

            $fileData = $this->upload->data();

            $upload = [
                'id_paket' => $id_paket,
                'id_vendor' => $this->session->userdata('id_vendor'),
                'nama_dokumen_promosi' => $nama_dokumen_promosi,
                'file_dokumen_promosi' => $fileData['file_name'],
            ];
            $this->Paket_baru_model->tambah_dokumen_promosi_vendor($upload);
            $this->output->set_content_type('application/json')->set_output(json_encode($upload));
        } else {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect(base_url('upload'));
        }
    }




    public function delete_dokumen_promosi($id_promosi)
    {
        $this->Paket_baru_model->delete_dokumen_promosi_vendor($id_promosi);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function by_id_vendor_promosi($id_promosi)
    {
        $get_dokumen = $this->Paket_baru_model->get_row_vendor_promosi($id_promosi);
        $output = [
            "get_dokumen" => $get_dokumen,

        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    // INI UNTUK UPLOAD DOLKKUMEN PENAWARAN


    public function upload_penawaran($id_paket)
    {
        $data['total_rincian_hps']  = $this->Paket_model->totalRincianHps($id_paket);
        $data['total_rincian_hps_vendor']  = $this->Paket_model->totalRincianHps_vendor($id_paket);
        $data['angga'] = $this->Paket_model->row_paket($id_paket);
        $data['angga2'] = $this->Paket_model->row_paket2($id_paket);
        $data['penyeleksi'] = $this->Paket_model->pegawai_penyeleksi();
        $data['title'] = 'Paket Baru';
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar_vendor');
        $this->load->view('template/sidebar_vendor', $data);
        $this->load->view('vendor/upload_penawaran/index', $data);
        $this->load->view('template/footer');
        $this->load->view('vendor/upload_penawaran/ajax');
    }

    // INI UNTUK RINCINA HPS

    public function data_get_rincian_hps_vendor($id_paket)
    {
        $resultss = $this->Paket_model->getdatatableRincianHps_vendor($id_paket);
        $no = $_POST['start'];
        // $total = 0;
        $data = [];
        foreach ($resultss as $angga) {
            $row = array();
            $row[] = ++$no;
            $row[] = $angga->deskripsi_vendor;
            $row[] = $angga->jumlah_vendor;
            $row[] = $angga->ppn_vendor . ' %';
            $row[] = "Rp " . number_format($angga->harga_rincian_hps_vendor, 2, ',', '.');
            $row[] = "Rp " . number_format($angga->jumlah_vendor * $angga->harga_rincian_hps_vendor, 2, ',', '.');
            $row[] = '<a href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byidRincianHps_vendor(' . "'" . $angga->id_rincian_hps_vendor . "','editRincianHps'" . ')"><i class="fas fa-edit"></i> Edit</a> <a href="javascript:;" class="btn btn-danger  btn-block btn-sm" onClick="byidRincianHps_vendor(' . "'" . $angga->id_rincian_hps_vendor . "','hapusRincianHps'" . ')">  <i class="fas fa-trash"></i> Hapus</a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Paket_model->count_all_dataRincianHps_vendor($id_paket),
            "recordsFiltered" => $this->Paket_model->count_filtered_RincianHps_vendor($id_paket),
            "data" => $data,
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function add_rincian_hps()
    {
        $this->form_validation->set_rules('deskripsi_vendor', 'Deskripsi_vendor', 'required|trim', ['required' => 'Deskripsi_vendor Wajib Diisi!']);
        $this->form_validation->set_rules('jumlah_vendor', 'Jumlah_vendor', 'required|trim', ['required' => 'Jumlah_vendor Wajib Diisi!']);
        $this->form_validation->set_rules('ppn_vendor', 'Pajak %', 'required|trim|numeric', ['required' => 'Pajak % Wajib Diisi!']);
        $this->form_validation->set_rules('harga_rincian_hps_vendor', 'Harga', 'required|trim|numeric', ['required' => 'Harga Wajib Diisi!']);
        if ($this->form_validation->run() == false) {
            $data = [
                'deskripsi_vendor' => form_error('deskripsi_vendor'),
                'jumlah_vendor' => form_error('jumlah_vendor'),
                'ppn_vendor' => form_error('ppn_vendor'),
                'harga_rincian_hps_vendor' => form_error('harga_rincian_hps_vendor'),
            ];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        } else {
            $data = [
                'id_vendor' => $this->session->userdata('id_vendor'),
                'id_paket' => htmlspecialchars($this->input->post('id_paket')),
                'deskripsi_vendor' => htmlspecialchars($this->input->post('deskripsi_vendor')),
                'jumlah_vendor' => htmlspecialchars($this->input->post('jumlah_vendor')),
                'ppn_vendor' => htmlspecialchars($this->input->post('ppn_vendor')),
                'harga_rincian_hps_vendor' => htmlspecialchars($this->input->post('harga_rincian_hps_vendor')),
                'status_hps_vendor' => 1,
            ];

            $this->Paket_model->create_rincian_hps_vendor($data);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        }
    }

    public function delete_rincian_hps_vendor($id_rincian_hps_vendor)
    {
        $data = $this->Paket_model->deletedata_rincian_hps_vendor($id_rincian_hps_vendor);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    // EDIT RINCIAN HPS
    public function edit_rincian_hps()
    {
        $this->form_validation->set_rules('deskripsi_vendor', 'Deskripsi_vendor', 'required|trim', ['required' => 'Deskripsi_vendor Wajib Diisi!']);
        $this->form_validation->set_rules('jumlah_vendor', 'Jumlah_vendor', 'required|trim', ['required' => 'Jumlah_vendor Wajib Diisi!']);
        $this->form_validation->set_rules('ppn_vendor', 'Pajak %', 'required|trim|numeric', ['required' => 'Pajak % Wajib Diisi!']);
        $this->form_validation->set_rules('harga_rincian_hps_vendor', 'Harga', 'required|trim|numeric', ['required' => 'Harga Wajib Diisi!']);
        if ($this->form_validation->run() == false) {
            $data = [
                'deskripsi_vendor' => form_error('deskripsi_vendor'),
                'jumlah_vendor' => form_error('jumlah_vendor'),
                'ppn_vendor' => form_error('ppn_vendor'),
                'harga_rincian_hps_vendor' => form_error('harga_rincian_hps_vendor'),
            ];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        } else {
            $data = [
                'deskripsi_vendor' => htmlspecialchars($this->input->post('deskripsi_vendor')),
                'jumlah_vendor' => htmlspecialchars($this->input->post('jumlah_vendor')),
                'ppn_vendor' => htmlspecialchars($this->input->post('ppn_vendor')),
                'harga_rincian_hps_vendor' => htmlspecialchars($this->input->post('harga_rincian_hps_vendor')),
                'status_hps_vendor' => 1,
            ];
            $this->Paket_model->update_rincian_hps_vendor(array('id_rincian_hps_vendor' => $this->input->post('id_rincian_hps_vendor')), $data);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        }
    }

    public function byRincianHps_vendor($id_rincian_hps_vendor)
    {

        $get_rincian_paket = $this->Paket_model->getRincianHpsByid_vendor($id_rincian_hps_vendor);
        $output = [
            "get_rincian_paket" => $get_rincian_paket,
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }
}
