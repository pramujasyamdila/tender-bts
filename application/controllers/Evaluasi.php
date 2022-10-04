<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Evaluasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // $this->load->helper(array('url', 'form'));
        // $this->load->library(array('form_validation', 'recaptcha'));
        // $this->load->model('Unit_kerja/Unit_kerja_model');
        // $this->load->model('Beranda/Beranda_model');
        $this->load->model('Pegawai/Pegawai_model');
        $this->load->model('Paket/Paket_model');
        $this->load->model('Evaluasi/Evaluasi_model');
        // $this->load->model('Laporan/Laporan_model');
        // if ($this->session->userdata('nama_pegawai')) {
        // } else {
        //     redirect('landing');
        // }
    }

    // INI UNTUK EVALUASI 

    public function evaluasi_vendor($id_paket)
    {

        $data['total_rincian_hps']  = $this->Paket_model->totalRincianHps($id_paket);
        $data['angga'] = $this->Paket_model->row_paket($id_paket);
        $data['angga2'] = $this->Paket_model->row_paket2($id_paket);
        $data['peserta'] = $this->Paket_model->count_all_data_peserta_tender($id_paket);
        $data['penyeleksi'] = $this->Paket_model->pegawai_penyeleksi();
        $data['title'] = 'Evaluasi Tender';
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar', $data);
        $this->load->view('paket/evaluasi/index', $data);
        $this->load->view('template/footer');
        $this->load->view('paket/evaluasi/ajax', $data);
    }

    public function get_vendor($id_paket)
    {
        $resultss = $this->Evaluasi_model->get_datatable_vendor($id_paket);
        $data = [];
        $no = $_POST['start'];
        foreach ($resultss as $angga) {
            $row = array();
            $row[] = ++$no;
            $row[] =  $angga->username_vendor;
            if ($angga->nilai_penawaran) {
                $row[] = '<label for="" class="badge badge-success">' . "Rp " . number_format($angga->nilai_penawaran, 2, ',', '.') . '</label>';
            } else {
                $row[] = '<label for="" class="badge badge-warning">Belum Di Nilai</label>';
            }
            if ($angga->nilai_dokumen) {
                $row[] = '<label for="" class="badge badge-success">' . $angga->nilai_dokumen . '</label>';
            } else {
                $row[] = '<label for="" class="badge badge-warning">Belum Di Nilai</label>';
            }
            if ($angga->nilai_promosi) {
                $row[] = '<label for="" class="badge badge-success">' . $angga->nilai_promosi . '</label>';
            } else {
                $row[] = '<label for="" class="badge badge-warning">Belum Di Nilai</label>';
            }
            if ($angga->nilai_tenaga_ahli) {
                $row[] = '<label for="" class="badge badge-success">' . $angga->nilai_tenaga_ahli . '</label>';
            } else {
                $row[] = '<label for="" class="badge badge-warning">Belum Di Nilai</label>';
            }
            if ($angga->nilai_pengalaman) {
                $row[] = '<label for="" class="badge badge-success">' . $angga->nilai_pengalaman . '</label>';
            } else {
                $row[] = '<label for="" class="badge badge-warning">Belum Di Nilai</label>';
            }
            $row[] = '<a href="' . base_url('evaluasi/penilaian/') . $angga->id_paket_mengikuti . '/' . $angga->id_vendor_mengikuti . '" class="btn btn-info btn-sm btn-block ">Penilaian</a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Evaluasi_model->count_all_data_vendor($id_paket),
            "recordsFiltered" => $this->Evaluasi_model->count_filtered_vendor($id_paket),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }


    public function get_vendor_pemenang($id_paket)
    {
        $resultss = $this->Evaluasi_model->get_datatable_vendor($id_paket);
        $data = [];
        $no = $_POST['start'];
        foreach ($resultss as $angga) {
            $row = array();
            $row[] = ++$no;
            $row[] =  $angga->username_vendor;
            $row[] =  $angga->telepon_vendor;
            $row[] =  $angga->email_vendor;
            $row[] =  $angga->alamat_vendor;
            if ($angga->status_pemenang == 1) {
                $row[] = '<a href="javascript:;" class="btn btn-success btn-block  btn-sm" onClick="pemenang(' . "'" . $angga->id_mengikuti_paket  . "','pemenang'" . ')">  <i class="fas fa-check"></i> Pemenang Tender</a>';
            } else {
                $row[] = '<a href="javascript:;" class="btn btn-success btn-block  btn-sm" onClick="pemenang(' . "'" . $angga->id_mengikuti_paket  . "','pemenang'" . ')">  <i class="fas fa-check"></i> Pemenang Tender</a>';
            }
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Evaluasi_model->count_all_data_vendor($id_paket),
            "recordsFiltered" => $this->Evaluasi_model->count_filtered_vendor($id_paket),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function penilaian()
    {
        $id_paket = $this->uri->segment(3);
        $id_vendor = $this->uri->segment(4);
        $data['total_rincian_hps_vendor']  = $this->Evaluasi_model->totalRincianHps_vendor($id_paket, $id_vendor);
        $data['row_vendor_mengikuti'] = $this->Evaluasi_model->row_vendor_mengikuti($id_paket, $id_vendor);
        $data['total_rincian_hps']  = $this->Paket_model->totalRincianHps($id_paket);
        $data['angga'] = $this->Paket_model->row_paket($id_paket);
        $data['angga2'] = $this->Paket_model->row_paket2($id_paket);
        $data['peserta'] = $this->Paket_model->count_all_data_peserta_tender($id_paket);
        $data['penyeleksi'] = $this->Paket_model->pegawai_penyeleksi();
        $data['tenaga_ahli'] = $this->Evaluasi_model->tenaga_ahli($id_vendor);
        $data['pengalaman'] = $this->Evaluasi_model->pengalaman($id_vendor);
        $data['title'] = 'Evaluasi Tender';
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar', $data);
        $this->load->view('paket/evaluasi/penilaian', $data);
        $this->load->view('template/footer');
        $this->load->view('paket/ajax', $data);
    }

    public function pilih_pemenang($id_paket)
    {
        $data['total_rincian_hps']  = $this->Paket_model->totalRincianHps($id_paket);
        $data['angga'] = $this->Paket_model->row_paket($id_paket);
        $data['angga2'] = $this->Paket_model->row_paket2($id_paket);
        $data['peserta'] = $this->Paket_model->count_all_data_peserta_tender($id_paket);
        $data['penyeleksi'] = $this->Paket_model->pegawai_penyeleksi();
        $data['title'] = 'Evaluasi Tender';
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar', $data);
        $this->load->view('paket/evaluasi/pilih_pemenang', $data);
        $this->load->view('template/footer');
        $this->load->view('paket/evaluasi/ajax', $data);
    }



    public function nilai_persyartan()
    {
        $id_paket = $this->input->post('id_paket');
        $id_vendor = $this->input->post('id_vendor');
        $nilai_dokumen = $this->input->post('nilai_dokumen');
        $data = [
            'nilai_dokumen' => $nilai_dokumen
        ];
        $this->Evaluasi_model->update_ke_mengikuti_vendor($data, $id_paket, $id_vendor);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function nilai_promosi()
    {
        $id_paket = $this->input->post('id_paket');
        $id_vendor = $this->input->post('id_vendor');
        $nilai_promosi = $this->input->post('nilai_promosi');
        $data = [
            'nilai_promosi' => $nilai_promosi
        ];
        $this->Evaluasi_model->update_ke_mengikuti_vendor($data, $id_paket, $id_vendor);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function nilai_penawaran()
    {
        $id_paket = $this->input->post('id_paket');
        $id_vendor = $this->input->post('id_vendor');
        $nilai_penawaran = $this->input->post('nilai_penawaran');
        $data = [
            'nilai_penawaran' => $nilai_penawaran
        ];
        $this->Evaluasi_model->update_ke_mengikuti_vendor($data, $id_paket, $id_vendor);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function nilai_tenaga_ahli()
    {
        $id_paket = $this->input->post('id_paket');
        $id_vendor = $this->input->post('id_vendor');
        $nilai_tenaga_ahli = $this->input->post('nilai_tenaga_ahli');
        $data = [
            'nilai_tenaga_ahli' => $nilai_tenaga_ahli
        ];
        $this->Evaluasi_model->update_ke_mengikuti_vendor($data, $id_paket, $id_vendor);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function nilai_pengalaman()
    {
        $id_paket = $this->input->post('id_paket');
        $id_vendor = $this->input->post('id_vendor');
        $nilai_pengalaman = $this->input->post('nilai_pengalaman');
        $data = [
            'nilai_pengalaman' => $nilai_pengalaman
        ];
        $this->Evaluasi_model->update_ke_mengikuti_vendor($data, $id_paket, $id_vendor);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function tunjuk_pemanang($id_mengikuti_paket)
    {
        $data = [
            'status_pemenang' => 1
        ];
        $this->Evaluasi_model->update_ke_mengikuti_vendor2($data, $id_mengikuti_paket);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }
    public function by_id_vendor($id_mengikuti_paket)
    {
        $data_vendor = $this->Evaluasi_model->by_id_vendor($id_mengikuti_paket);
        $output = [
            'data_vendor' => $data_vendor
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function upload_undangan($id_paket)
    {
        $cek_pembuktian = $this->Evaluasi_model->cek_pembuktian($id_paket);
        if ($cek_pembuktian) {
            $nama_dokumen = $this->input->post('nama_dokumen');
            $config['upload_path'] = './file_undangan/';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = 0;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file_dokumen')) {

                $fileData = $this->upload->data();
                $upload = [
                    'nama_dokumen' => $nama_dokumen,
                    'file_dokumen' => $fileData['file_name'],
                ];
                $this->Evaluasi_model->update_dokumen_undangan($upload, $id_paket);
                $this->output->set_content_type('application/json')->set_output(json_encode($upload));
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect(base_url('upload'));
            }
        } else {
            $nama_dokumen = $this->input->post('nama_dokumen');
            $config['upload_path'] = './file_undangan/';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = 0;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file_dokumen')) {

                $fileData = $this->upload->data();

                $upload = [
                    'id_paket' => $id_paket,
                    'nama_dokumen' => $nama_dokumen,
                    'file_dokumen' => $fileData['file_name'],
                ];
                $this->Evaluasi_model->tambah_dokumen_undangan($upload);
                $this->output->set_content_type('application/json')->set_output(json_encode($upload));
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect(base_url('upload'));
            }
        }
    }
}
