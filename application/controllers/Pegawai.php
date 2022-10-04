<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
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
        $data['role'] = $this->Pegawai_model->ambil_role();
        $data['title'] = 'Pegawai';
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar', $data);
        $this->load->view('pegawai/index', $data);
        $this->load->view('template/footer');
        $this->load->view('pegawai/ajax');
    }

    public function pengajuan()
    {
        $data['role'] = $this->Pegawai_model->ambil_role();
        $data['title'] = 'Pegawai';
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar', $data);
        $this->load->view('pegawai/pengajuan', $data);
        $this->load->view('template/footer');
        $this->load->view('pegawai/ajax');
    }

    public function data_get_pegawai()
    {
        $resultss = $this->Pegawai_model->getdatatable();
        $no = $_POST['start'];
        // $total = 0;
        $data = [];
        foreach ($resultss as $angga) {
            $row = array();
            $row[] = ++$no;
            $row[] = $angga->nama_pegawai;
            $row[] = $angga->nip;
            $row[] = $angga->jabatan;
            $row[] = $angga->telepon;
            $row[] = $angga->email;
            if ($angga->status == 0) {
                $row[] = '<a href="javascript:;" class="btn btn-danger btn-block  btn-sm" onClick="aktivasi(' . "'" . $angga->id_pegawai . "','non_active_pegawai'" . ')">  <i class="fas fa-times"></i> Non Active</a>';
            } else {
                $row[] = '<a href="javascript:;" class="btn btn-success btn-block  btn-sm" onClick="tidak_aktivasi(' . "'" . $angga->id_pegawai . "','active_pegawai'" . ')">  <i class="fas fa-check"></i> Active</a>';
            }
            $row[] = '<a href="javascript:;" class="btn btn-danger btn-block  btn-sm" onClick="by_id(' . "'" . $angga->id_pegawai . "','hapus'" . ')">  <i class="fas fa-times"></i> Hapus</a><a href="javascript:;" class="btn btn-info btn-block  btn-sm" onClick="by_id(' . "'" . $angga->id_pegawai . "','edit'" . ')">  <i class="fas fa-edit"></i> Edit</a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Pegawai_model->count_all_data(),
            "recordsFiltered" => $this->Pegawai_model->count_filtered_data(),
            "data" => $data,
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function getdata_table_pengajuan()
    {
        $resultss = $this->Pegawai_model->getdatatable_pengajuan();
        $no = $_POST['start'];
        // $total = 0;
        $data = [];
        foreach ($resultss as $angga) {
            $row = array();
            $row[] = ++$no;
            $row[] = $angga->kebutuhan;
            $row[] = $angga->anggaran;
            $row[] = $angga->lokasi;
            $row[] = $angga->penanggung_jawab;
            $row[] = $angga->keterangan;
            if ($this->session->userdata('id_role') == 1) {
                if ($angga->sts_pengajuan == 1) {
                    $row[] = '<a href="javascript:;" class="btn btn-success btn-block  btn-sm">  <i class="fas fa-check"></i> Disetujui</a>';
                } else if ($angga->sts_pengajuan == 2) {
                    $row[] = '<a href="javascript:;" class="btn btn-danger btn-block  btn-sm">  <i class="fas fa-times"></i> Di Tolak</a>';
                } else {
                    $row[] = '<a href="javascript:;" class="btn btn-info btn-block  btn-sm" onClick="setujui(' . "'" . $angga->id_pengajuan . "','setujui'" . ')">  <i class="fas fa-check"></i> Setujui</a><a href="javascript:;" class="btn btn-danger btn-block  btn-sm" onClick="batal_setujui(' . "'" . $angga->id_pengajuan . "','tolak'" . ')">  <i class="fas fa-times"></i> Tolak</a>';
                }
            } else {
                if ($angga->sts_pengajuan == 1) {
                    $row[] = '<a href="javascript:;" class="btn btn-success btn-block  btn-sm">  <i class="fas fa-check"></i> Disetujui</a>';
                } else if ($angga->sts_pengajuan == 2) {
                    $row[] = '<a href="javascript:;" class="btn btn-danger btn-block  btn-sm">  <i class="fas fa-times"></i> Di Tolak</a>';
                } else {
                    $row[] = '<a href="javascript:;" class="btn btn-warning btn-block  btn-sm">  <i class="fas fa-clock"></i> Prosess</a>';
                }
            }
            $row[] = $angga->sts_pengajuan;
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Pegawai_model->count_all_data_pengajuan(),
            "recordsFiltered" => $this->Pegawai_model->count_filtered_data_pengajuan(),
            "data" => $data,
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function tambah_pegawai()
    {
        // $this->form_validation->set_rules('nip', 'NIP', 'required|trim|is_unique[tbl_pegawai.nip]', ['required' => 'NIP Wajib Diisi!']);
        // $this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required|trim', ['required' => 'Nama Pegawai Wajib Diisi!']);
        // $this->form_validation->set_rules('username', 'User ID', 'trim|required|is_unique[tbl_pegawai.username]', ['required' => 'User ID Wajib Diisi!', 'is_unique' => 'Username Sudah Terdaftar']);
        // $this->form_validation->set_rules('password', 'Password', 'required|trim|matches[password2]', ['required' => 'Password Wajib Diisi!', 'matches' => 'Password Tidak Sama']);
        // $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]', ['required' => 'Password Verifikasi harus diisi!', 'matches' => 'Password Tidak Sama']);
        // $this->form_validation->set_rules('email', 'Email Pegawai', 'required|trim|valid_email|is_unique[tbl_pegawai.email]', ['required' => 'Email Email Pegawai Wajib Diisi!', 'valid_email' => 'Email Tidak Valid',  'is_unique' => 'Email Sudah Terdaftar']);
        // if ($this->form_validation->run() == false) {
        //     $data = [
        //         'nama_pegawai' => form_error('nama_pegawai'),
        //         'username' => form_error('username'),
        //         'password' => form_error('password'),
        //         'password2' => form_error('password2'),
        //         'email' => form_error('email'),
        //         'nip' => form_error('nip'),
        //     ];
        //     $this->output->set_content_type('application/json')->set_output(json_encode($data));
        // } else {
        $nama_pegawai  = $this->input->post('nama_pegawai');
        $username  = $this->input->post('username');
        $email  = $this->input->post('email');
        $nip  = $this->input->post('nip');
        $password  = $this->input->post('password');
        $alamat  = $this->input->post('alamat');
        $telepon  = $this->input->post('telepon');
        $jabatan  = $this->input->post('jabatan');
        $tahun_kerja  = $this->input->post('tahun_kerja');
        $bulan_kerja  = $this->input->post('bulan_kerja');
        $id_role  = $this->input->post('id_role');
        $data = [
            'nama_pegawai' => $nama_pegawai,
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'nip' => $nip,
            'alamat' => $alamat,
            'telepon' => $telepon,
            'jabatan' => $jabatan,
            'tahun_kerja' => $tahun_kerja,
            'bulan_kerja' => $bulan_kerja,
            'id_role' => $id_role,
            'status' => 0
        ];
        $this->Pegawai_model->insert($data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function edit()
    {
        // $this->form_validation->set_rules('nip', 'NIP', 'required|trim|is_unique[tbl_pegawai.nip]', ['required' => 'NIP Wajib Diisi!']);
        // $this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required|trim', ['required' => 'Nama Pegawai Wajib Diisi!']);
        // $this->form_validation->set_rules('username', 'User ID', 'trim|required|is_unique[tbl_pegawai.username]', ['required' => 'User ID Wajib Diisi!', 'is_unique' => 'Username Sudah Terdaftar']);
        // $this->form_validation->set_rules('password', 'Password', 'required|trim|matches[password2]', ['required' => 'Password Wajib Diisi!', 'matches' => 'Password Tidak Sama']);
        // $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]', ['required' => 'Password Verifikasi harus diisi!', 'matches' => 'Password Tidak Sama']);
        // $this->form_validation->set_rules('email', 'Email Pegawai', 'required|trim|valid_email|is_unique[tbl_pegawai.email]', ['required' => 'Email Email Pegawai Wajib Diisi!', 'valid_email' => 'Email Tidak Valid',  'is_unique' => 'Email Sudah Terdaftar']);
        // if ($this->form_validation->run() == false) {
        //     $data = [
        //         'nama_pegawai' => form_error('nama_pegawai'),
        //         'username' => form_error('username'),
        //         'password' => form_error('password'),
        //         'password2' => form_error('password2'),
        //         'email' => form_error('email'),
        //         'nip' => form_error('nip'),
        //     ];
        //     $this->output->set_content_type('application/json')->set_output(json_encode($data));
        // } else {
        $id_pegawai  = $this->input->post('id_pegawai');
        $nama_pegawai  = $this->input->post('nama_pegawai');
        $username  = $this->input->post('username');
        $email  = $this->input->post('email');
        $nip  = $this->input->post('nip');
        $password  = $this->input->post('password');
        $alamat  = $this->input->post('alamat');
        $telepon  = $this->input->post('telepon');
        $jabatan  = $this->input->post('jabatan');
        $tahun_kerja  = $this->input->post('tahun_kerja');
        $bulan_kerja  = $this->input->post('bulan_kerja');
        $id_role  = $this->input->post('id_role');
        $data = [
            'nama_pegawai' => $nama_pegawai,
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'nip' => $nip,
            'alamat' => $alamat,
            'telepon' => $telepon,
            'jabatan' => $jabatan,
            'tahun_kerja' => $tahun_kerja,
            'bulan_kerja' => $bulan_kerja,
            'id_role' => $id_role,
        ];
        $this->Pegawai_model->update($data, $id_pegawai);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }


    // }
    public function tidak_aktivasi($id_pegawai)
    {
        $data = [
            'status' => 0
        ];
        $this->Pegawai_model->update($data, $id_pegawai);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function setujui_pengajuan($id_pengajuan)
    {
        $data = [
            'sts_pengajuan' => 1
        ];
        $this->Pegawai_model->update_pengajuan2($data, $id_pengajuan);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function tolak_pengajuan($id_pengajuan)
    {
        $data = [
            'sts_pengajuan' => 2
        ];
        $this->Pegawai_model->update_pengajuan2($data, $id_pengajuan);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }





    public function hapus($id_pegawai)
    {
        $this->Pegawai_model->delete($id_pegawai);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }


    public function aktivasi($id_pegawai)
    {
        $data = [
            'status' => 1
        ];
        $this->Pegawai_model->update($data, $id_pegawai);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }
    public function by_id_pegawai($id_pegawai)
    {
        $data_pegawai = $this->Pegawai_model->GetById($id_pegawai);
        $data = [
            'pegawai' => $data_pegawai
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    // SESSION UNTUK ATSAN DAN KEPALA KANTOR
}
