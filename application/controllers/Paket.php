<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paket extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // $this->load->helper(array('url', 'form'));
        // $this->load->library(array('form_validation', 'recaptcha'));
        // $this->load->model('Unit_kerja/Unit_kerja_model');
        $this->load->model('Paket/Paket_model');
        $this->load->model('Evaluasi/Evaluasi_model');
        // $this->load->model('Laporan/Laporan_model');
        // if ($this->session->userdata('nama_pegawai')) {
        // } else {
        //     redirect('landing');
        // }
    }
    public function index()
    {
        $data['role'] = $this->Pegawai_model->ambil_role();
        $data['title'] = 'Rup';
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar', $data);
        $this->load->view('paket/index', $data);
        $this->load->view('template/footer');
        $this->load->view('paket/ajax');
    }
    public function buat_rup()
    {
        $data['role'] = $this->Pegawai_model->ambil_role();
        $data['title'] = 'Buat RUP';
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar', $data);
        $this->load->view('paket/tambah', $data);
        $this->load->view('template/footer');
        $this->load->view('paket/ajax');
    }




    public function save()
    {
        $table = "tbl_paket";
        $field = "kode_tender_random";
        $today = date('dmY');
        $text = 'BTS.' . $today;
        $kode_terakhirnya = $this->Paket_model->get_kode_tender($text, $table, $field);
        $no_urut = (int) substr($kode_terakhirnya, -4, 4);
        $no_urut++;
        $hasilnya = $text . sprintf('%04s', $no_urut);
        $nama_paket = $this->input->post('nama_paket', TRUE);
        $program_paket = $this->input->post('program_paket', TRUE);
        $uraian_pekerjaan_paket = $this->input->post('uraian_pekerjaan_paket', TRUE);
        $kualifikasi_usaha = $this->input->post('kualifikasi_usaha', TRUE);
        $hps_total = $this->input->post('hps_total', TRUE);
        $sumber_dana = $this->input->post('sumber_dana', TRUE);
        $lokasi_pekerjaan = $this->input->post('lokasi_pekerjaan', TRUE);
        $data  = array(
            'kode_tender_random' => $hasilnya,
            'nama_paket' => $nama_paket,
            'program_paket' => $program_paket,
            'uraian_pekerjaan_paket' => $uraian_pekerjaan_paket,
            'kualifikasi_usaha' => $kualifikasi_usaha,
            'id_pegawai' => 1,
            'pembuat_paket' => 1,
            'hps_total' => $hps_total,
            'sumber_dana' => $sumber_dana,
            'status_paket_tender' => 1,
            'lokasi_pekerjaan' => $lokasi_pekerjaan,
        );
        $this->db->insert('tbl_paket', $data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }



    public function paket_tender()
    {
        $data['title'] = 'Paket Tender';
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar', $data);
        $this->load->view('paket/rup_paket', $data);
        $this->load->view('template/footer');
        $this->load->view('paket/ajax');
    }

    public function daftar_paket()
    {
        $data['title'] = 'Paket Tender';
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar', $data);
        $this->load->view('paket/daftar_paket', $data);
        $this->load->view('template/footer');
        $this->load->view('paket/ajax');
    }

    public function informasi_tender()
    {
        $data['title'] = 'Paket Tender';
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar', $data);
        $this->load->view('paket/informasi_tender', $data);
        $this->load->view('template/footer');
        $this->load->view('paket/ajax');
    }
    public function lihat_tender($id_paket)
    {
        $data['cek_undangan'] = $this->Evaluasi_model->cek_pembuktian($id_paket);
        $data['total_rincian_hps']  = $this->Paket_model->totalRincianHps($id_paket);
        $data['angga'] = $this->Paket_model->row_paket($id_paket);
        $data['angga2'] = $this->Paket_model->row_paket2($id_paket);
        $data['peserta'] = $this->Paket_model->count_all_data_peserta_tender($id_paket);
        $data['penyeleksi'] = $this->Paket_model->pegawai_penyeleksi();
        $data['title'] = 'Paket Tender';
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar', $data);
        $this->load->view('paket/lihat_tender', $data);
        $this->load->view('template/footer');
        $this->load->view('paket/ajax');
    }


    public function get_datatable_informasi_tender()
    {
        $resultss = $this->Paket_model->getdatatable_informasi_tender();
        $data = [];
        $no = $_POST['start'];

        foreach ($resultss as $angga) {
            $row = array();
            $row[] = ++$no;
            $row[] = $angga->kode_tender_random;
            $row[] = '<a href="javascript:;" onClick="byid(' . "'" . $angga->id_paket . "','detail'" . ')">' . $angga->nama_paket . '</a>';
            $row[] = $angga->kualifikasi_usaha;
            if ($angga->status_selesai_tender == 1) {
                $row[] = '<label class="badge badge-warning">Tender Telah Selesai</label>';
            } else {
                if ($angga->status_tahap_tender == 1 && $angga->status_paket_tender == 1) {
                    $row[] = '<label for="" class="badge badge-sm badge-success">Tender Sedang Berlangsung</label>';
                } else {
                    if ($angga->status_paket_tender == 1) {
                        $row[] = '<label for="" class="badge badge-sm badge-danger">Belum Buat Tender</label>';
                    } else {
                        $row[] = '<label for="" class="badge badge-sm badge-warning">Tender Sedang Berlangsung</label>';
                    }
                }
            }

            if ($angga->status_selesai_tender == 1) {
                $row[] = '<a href="' . base_url('paket/lihat_tender/') . $angga->id_paket . '" class="disabled btn btn-info btn-sm btn-block "><i class="fas fa-eye"></i> Lihat tender</a>';
            } else {
                $row[] = '<a href="' . base_url('paket/lihat_tender/') . $angga->id_paket . '" class="btn btn-info btn-sm btn-block "><i class="fas fa-eye"></i> Lihat tender</a>';
            }

            $data[] = $row;
        }
        $output = array(
            "draw" => intval($_POST['draw']),
            "recordsTotal" => $this->Paket_model->count_all_data_informasi_tender(),
            "recordsFiltered" => $this->Paket_model->count_filtered_data_informasi_tender(),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }


    public function getdata()
    {
        $resultss = $this->Paket_model->getdatatable();
        $data = [];
        $no = $_POST['start'];
        foreach ($resultss as $angga) {
            $row = array();
            $row[] = ++$no;
            $row[] = $angga->kode_tender_random;
            $row[] = '<a href="javascript:;" onClick="byid(' . "'" . $angga->id_paket . "','detail'" . ')">' . $angga->nama_paket . '</a>';
            $row[] = $angga->kualifikasi_usaha;
            $row[] = $angga->sumber_dana;
            $row[] = "Rp " . number_format($angga->hps_total, 2, ',', '.');
            $row[] = $angga->lokasi_pekerjaan;
            if ($angga->status_selesai_tender == 1) {
                $row[] = '<label class="badge badge-warning">Tender Telah Selesai</label>';
            } else {
                if ($angga->status_tahap_tender == 1 && $angga->status_paket_tender == 1) {
                    $row[] = '<label for="" class="badge badge-sm badge-success">Tender Sedang Berlangsung</label>';
                } else {
                    if ($angga->status_paket_tender == 1) {
                        $row[] = '<a href="javascript:;" class="btn btn-warning btn-sm btn-block " onClick="byid(' . "'" . $angga->id_paket . "','edit'" . ')"><i class="fas fa-edit"></i> Edit</a><a href="javascript:;" class="btn btn-danger btn-sm btn-block " onClick="byid(' . "'" . $angga->id_paket . "','hapus'" . ')"><i class="fas fa-trash"></i> Hapus</a>';
                    } else {
                        $row[] = '<label for="" class="badge badge-sm badge-warning">Tender Sedang Berlangsung</label>';
                    }
                }
            }

            $data[] = $row;
        }
        $output = array(
            "draw" => intval($_POST['draw']),
            "recordsTotal" => $this->Paket_model->count_all_data(),
            "recordsFiltered" => $this->Paket_model->count_filtered_data(),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function getdata_landing()
    {
        $resultss = $this->Paket_model->getdatatable();
        $data = [];
        $no = $_POST['start'];
        foreach ($resultss as $angga) {
            $row = array();
            $row[] = ++$no;
            $row[] = $angga->kode_tender_random;
            $row[] = '<a href="javascript:;" onClick="byid(' . "'" . $angga->id_paket . "','detail'" . ')">' . $angga->nama_paket . '</a>';
            $row[] = $angga->kualifikasi_usaha;
            $row[] = $angga->sumber_dana;
            $row[] = "Rp " . number_format($angga->hps_total, 2, ',', '.');
            $row[] = $angga->lokasi_pekerjaan;
            if ($angga->status_selesai_tender == 1) {
                $row[] = '<label class="btn btn-block btn-danger">Tender Telah Selesai</label>';
            } else {
                $row[] = '<label for="" class="btn btn-sm btn-success">Tender Sedang Berlangsung</label>';
            }

            $data[] = $row;
        }
        $output = array(
            "draw" => intval($_POST['draw']),
            "recordsTotal" => $this->Paket_model->count_all_data(),
            "recordsFiltered" => $this->Paket_model->count_filtered_data(),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }


    public function getdata_rup_tender()
    {
        $resultss = $this->Paket_model->getdatatable();
        $data = [];
        $no = $_POST['start'];
        if ($this->session->userdata('id_role') == 2) {

            foreach ($resultss as $angga) {
                $row = array();
                $row[] = ++$no;
                $row[] = $angga->kode_tender_random;
                $row[] = '<a href="javascript:;" onClick="byid(' . "'" . $angga->id_paket . "','detail'" . ')">' . $angga->nama_paket . '</a>';
                $row[] = $angga->kualifikasi_usaha;
                if ($angga->status_selesai_tender == 1) {
                    $row[] = '<label class="badge badge-warning">Tender Telah Selesai</label>';
                } else {
                    if ($angga->status_tahap_tender == 1 && $angga->status_paket_tender == 1) {
                        $row[] = '<label for="" class="badge badge-sm badge-success">Tender Sedang Berlangsung</label>';
                    } else {
                        if ($angga->status_paket_tender == 1) {
                            $row[] = '<label for="" class="badge badge-sm badge-danger">Belum Buat Tender</label>';
                        } else {
                            $row[] = '<label for="" class="badge badge-sm badge-warning">Tender Sedang Berlangsung</label>';
                        }
                    }
                }
                if ($angga->status_selesai_tender == 1) {
                    $row[] = '<a href="' . base_url('paket/buat_tender/') . $angga->id_paket . '" class="btn btn-info btn-sm btn-block disabled" onClick="byid(' . "'" . $angga->id_paket . "','edit'" . ')"><i class="fas fa-file"></i> Edit tender</a>';
                } else {
                    if ($angga->status_tahap_tender == 1 && $angga->status_paket_tender == 1) {
                        $row[] = '<a href="' . base_url('paket/buat_tender/') . $angga->id_paket . '" class="btn btn-info btn-sm btn-block " onClick="byid(' . "'" . $angga->id_paket . "','edit'" . ')"><i class="fas fa-file"></i> Edit tender</a>';
                    } else {
                        $row[] = '<a href="' . base_url('paket/buat_tender/') . $angga->id_paket . '" class="btn btn-warning btn-sm btn-block " onClick="byid(' . "'" . $angga->id_paket . "','edit'" . ')"><i class="fas fa-file"></i> Buat tender</a>';
                    }
                }

                $data[] = $row;
            }
            $output = array(
                "draw" => intval($_POST['draw']),
                "recordsTotal" => $this->Paket_model->count_all_data(),
                "recordsFiltered" => $this->Paket_model->count_filtered_data(),
                "data" => $data
            );
            $this->output->set_content_type('application/json')->set_output(json_encode($output));
        } else {

            foreach ($resultss as $angga) {
                $row = array();
                $row[] = ++$no;
                $row[] = $angga->kode_tender_random;
                $row[] = '<a href="javascript:;" onClick="byid(' . "'" . $angga->id_paket . "','detail'" . ')">' . $angga->nama_paket . '</a>';
                $row[] = $angga->kualifikasi_usaha;
                if ($angga->status_selesai_tender == 1) {
                    $row[] = '<label class="badge badge-warning">Tender Telah Selesai</label>';
                } else {
                    if ($angga->status_tahap_tender == 1 && $angga->status_paket_tender == 1) {
                        $row[] = '<label for="" class="badge badge-sm badge-success">Tender Sedang Berlangsung</label>';
                    } else {
                        if ($angga->status_paket_tender == 1) {
                            $row[] = '<label for="" class="badge badge-sm badge-danger">Belum Buat Tender</label>';
                        } else {
                            $row[] = '<label for="" class="badge badge-sm badge-warning">Tender Sedang Berlangsung</label>';
                        }
                    }
                }

                // $row[] = "Rp " . number_format($angga->hps_total, 2, ',', '.');
                if ($angga->status_paket_tender == 1) {
                    $row[] = '<a href="' . base_url('paket/buat_paket_tender/') . $angga->id_paket . '" class="btn btn-info btn-sm btn-block " onClick="byid(' . "'" . $angga->id_paket . "','edit'" . ')"><i class="fas fa-file"></i> Ubah Paket</a>';
                } else   if ($angga->status_paket_tender == 2) {
                    $row[] = '<a href="' . base_url('paket/buat_paket_tender/') . $angga->id_paket . '" class="disabled btn btn-warning btn-sm btn-block " onClick="byid(' . "'" . $angga->id_paket . "','edit'" . ')"><i class="fas fa-file"></i> Ubah Paket</a>';
                } else {
                    $row[] = '<a href="' . base_url('paket/buat_paket_tender/') . $angga->id_paket . '" class="btn btn-warning btn-sm btn-block " onClick="byid(' . "'" . $angga->id_paket . "','edit'" . ')"><i class="fas fa-file"></i> Buat Paket</a>';
                }

                $data[] = $row;
            }
            $output = array(
                "draw" => intval($_POST['draw']),
                "recordsTotal" => $this->Paket_model->count_all_data(),
                "recordsFiltered" => $this->Paket_model->count_filtered_data(),
                "data" => $data
            );
            $this->output->set_content_type('application/json')->set_output(json_encode($output));
        }
    }



    public function buat_tender($id_paket)
    {
        $data['total_rincian_hps']  = $this->Paket_model->totalRincianHps($id_paket);
        $data['angga'] = $this->Paket_model->row_paket($id_paket);
        $data['angga2'] = $this->Paket_model->row_paket2($id_paket);
        $data['penyeleksi'] = $this->Paket_model->pegawai_penyeleksi();
        $data['title'] = 'Buat Paket';
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar', $data);
        $this->load->view('paket/buat_tender', $data);
        $this->load->view('template/footer');
        $this->load->view('paket/ajax');
    }



    public function buat_paket_tender($id_paket)
    {
        $data['total_rincian_hps']  = $this->Paket_model->totalRincianHps($id_paket);
        $data['angga'] = $this->Paket_model->row_paket($id_paket);
        $data['angga2'] = $this->Paket_model->row_paket2($id_paket);
        $data['penyeleksi'] = $this->Paket_model->pegawai_penyeleksi();
        $data['title'] = 'Buat Paket';
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar', $data);
        $this->load->view('paket/buat_paket_tender', $data);
        $this->load->view('template/footer');
        $this->load->view('paket/ajax');
    }

    public function buat_rincian_hps($id_paket)
    {
        $data['total_rincian_hps']  = $this->Paket_model->totalRincianHps($id_paket);
        $data['angga'] = $this->Paket_model->row_paket($id_paket);
        $data['angga2'] = $this->Paket_model->row_paket2($id_paket);
        $data['penyeleksi'] = $this->Paket_model->pegawai_penyeleksi();
        $data['title'] = 'Rincian Hps';
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar', $data);
        $this->load->view('rincian_hps/index', $data);
        $this->load->view('template/footer');
        $this->load->view('rincian_hps/ajax');
    }

    public function pilih_panitia($id_paket)
    {
        $data['angga'] = $this->Paket_model->row_paket($id_paket);

        $data['penyeleksi'] = $this->Paket_model->pegawai_penyeleksi();
        $data['title'] = 'Pilih Panitia';
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar', $data);
        $this->load->view('paket/pilih_panitia', $data);
        $this->load->view('template/footer');
        $this->load->view('paket/ajax');
    }

    // pilih penyeleksi
    public function penyeleksi($id_paket)
    {
        $id_penyeleksi = $this->input->post('id_penyeleksi');
        $penyeleksi = $this->Paket_model->row_paket($id_paket);
        $data = [
            'id_penyeleksi' => $id_penyeleksi
        ];
        $this->Paket_model->update_penyeksi($data, $id_paket);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }
    public function umumkan_penyeleksi($id_paket)
    {
        $data = [
            'status_paket_tender' => 1
        ];
        $data = [
            'status_paket_tender' => 1
        ];
        $this->Paket_model->update_penyeksi($data, $id_paket);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }


    public function simpan_tender($id_paket)
    {
        $tangal_selesai_tender = $this->input->post('tangal_selesai_tender');
        // $batas_pendaftaran = $this->input->post('batas_pendaftaran');
        $data = [
            'tangal_selesai_tender' => $tangal_selesai_tender,
            // 'batas_pendaftaran' => $batas_pendaftaran,
            'status_tahap_tender' => 1
        ];
        $this->Paket_model->update_penyeksi($data, $id_paket);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }


    public function data_get_rincian_hps($id_paket)
    {
        $resultss = $this->Paket_model->getdatatableRincianHps($id_paket);
        $no = $_POST['start'];
        // $total = 0;
        $data = [];
        foreach ($resultss as $angga) {
            $row = array();
            $row[] = ++$no;
            $row[] = $angga->deskripsi;
            $row[] = $angga->jumlah;
            $row[] = $angga->ppn . ' %';
            $row[] = "Rp " . number_format($angga->harga_rincian_hps, 2, ',', '.');
            $row[] = "Rp " . number_format($angga->jumlah * $angga->harga_rincian_hps, 2, ',', '.');
            $row[] = '<a href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byidRincianHps(' . "'" . $angga->id_rincian_hps . "','editRincianHps'" . ')"><i class="fas fa-edit"></i> Edit</a> <a href="javascript:;" class="btn btn-danger  btn-block btn-sm" onClick="byidRincianHps(' . "'" . $angga->id_rincian_hps . "','hapusRincianHps'" . ')">  <i class="fas fa-trash"></i> Hapus</a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Paket_model->count_all_dataRincianHps($id_paket),
            "recordsFiltered" => $this->Paket_model->count_filtered_RincianHps($id_paket),
            "data" => $data,
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }
    public function add_rincian_hps()
    {
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim', ['required' => 'Deskripsi Wajib Diisi!']);
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim', ['required' => 'Jumlah Wajib Diisi!']);
        $this->form_validation->set_rules('ppn', 'Pajak %', 'required|trim|numeric', ['required' => 'Pajak % Wajib Diisi!']);
        $this->form_validation->set_rules('harga_rincian_hps', 'Harga', 'required|trim|numeric', ['required' => 'Harga Wajib Diisi!']);
        if ($this->form_validation->run() == false) {
            $data = [
                'deskripsi' => form_error('deskripsi'),
                'jumlah' => form_error('jumlah'),
                'ppn' => form_error('ppn'),
                'harga_rincian_hps' => form_error('harga_rincian_hps'),
            ];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        } else {
            $data = [
                'id_paket' => htmlspecialchars($this->input->post('id_paket')),
                'deskripsi' => htmlspecialchars($this->input->post('deskripsi')),
                'jumlah' => htmlspecialchars($this->input->post('jumlah')),
                'ppn' => htmlspecialchars($this->input->post('ppn')),
                'harga_rincian_hps' => htmlspecialchars($this->input->post('harga_rincian_hps')),
                'status_hps' => 1,
            ];

            $this->Paket_model->create_rincian_hps($data);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        }
    }

    public function delete_rincian_hps($id_rincian_hps)
    {
        $data = $this->Paket_model->deletedata_rincian_hps($id_rincian_hps);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    // EDIT RINCIAN HPS
    public function edit_rincian_hps()
    {
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim', ['required' => 'Deskripsi Wajib Diisi!']);
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim', ['required' => 'Jumlah Wajib Diisi!']);
        $this->form_validation->set_rules('ppn', 'Pajak %', 'required|trim|numeric', ['required' => 'Pajak % Wajib Diisi!']);
        $this->form_validation->set_rules('harga_rincian_hps', 'Harga', 'required|trim|numeric', ['required' => 'Harga Wajib Diisi!']);
        if ($this->form_validation->run() == false) {
            $data = [
                'deskripsi' => form_error('deskripsi'),
                'jumlah' => form_error('jumlah'),
                'ppn' => form_error('ppn'),
                'harga_rincian_hps' => form_error('harga_rincian_hps'),
            ];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        } else {
            $data = [
                'id_paket' => htmlspecialchars($this->input->post('id_paket')),
                'deskripsi' => htmlspecialchars($this->input->post('deskripsi')),
                'jumlah' => htmlspecialchars($this->input->post('jumlah')),
                'ppn' => htmlspecialchars($this->input->post('ppn')),
                'harga_rincian_hps' => htmlspecialchars($this->input->post('harga_rincian_hps')),
                'status_hps' => 1,
            ];
            $this->Paket_model->update_rincian_hps(array('id_rincian_hps' => $this->input->post('id_rincian_hps')), $data);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        }
    }

    public function byRincianHps($id_paket)
    {

        $get_rincian_paket = $this->Paket_model->getRincianHpsByid($id_paket);
        $output = [
            "get_rincian_paket" => $get_rincian_paket,
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }




    public function get_data_dokumen_tender($id_paket)
    {
        $resultss = $this->Paket_model->getdatatbl_dokumen_pengadaan($id_paket);
        $data = [];
        $no = $_POST['start'];
        foreach ($resultss as $angga) {
            $row = array();
            $row[] = ++$no;
            $row[] =  $angga->nama_dokumen;
            $row[] = '<a href=' . base_url('/file_dokumen' . '/' . $angga->file_dokumen) . '>' . '<img width="40px" src=' . base_url('assets/pdf.png') . ' >' . '</a>';
            $row[] = '<a href="javascript:;"  class="btn btn-sm btn-danger" id="prosess" onClick="by_id_dokumen_pengadaan(' . "'" . $angga->id_dokumen_pengadaan . "','hapus_pengadaan'" . ')"><i class="fas fa fa-trash"></i> </a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Paket_model->count_all_data_dokumen_tender(),
            "recordsFiltered" => $this->Paket_model->count_filtered_data_dokumen_tender($id_paket),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }
    public function by_id_dokumen_pengadaan($id_dokumen_pengadaan)
    {

        $get_dokumen = $this->Paket_model->by_id_dokumen_pengadaan($id_dokumen_pengadaan);
        $output = [
            "get_dokumen" => $get_dokumen,

        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }
    public function upload_dokumen_tender($id_paket)
    {
        $nama_dokumen = $this->input->post('nama_dokumen');
        $config['upload_path'] = './file_dokumen/';
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
            $this->Paket_model->tambah_dokumen_tender($upload);
            $this->output->set_content_type('application/json')->set_output(json_encode($upload));
        } else {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect(base_url('upload'));
        }
    }

    public function delete_dokumen_pengadaan($id_dokumen_pengadaan)
    {
        $this->Paket_model->delete_dokumen_tender($id_dokumen_pengadaan);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    // INI UNTUK SYARAT KUALIFIKASI




    public function get_table_kualifikasi_tender($id_paket)
    {
        $resultss = $this->Paket_model->get_table_kualifikasi_tender($id_paket);
        $data = [];
        $no = $_POST['start'];
        foreach ($resultss as $angga) {
            $row = array();
            $row[] = ++$no;
            $row[] =  $angga->nama_syarat_kualifikasi;
            $row[] = '<a href="javascript:;"  class="btn btn-sm btn-danger" id="prosess" onClick="hapus_kualifikasi(' . "'" . $angga->id_kualifikasi_tender  . "','hapus_pengadaan'" . ')"><i class="fas fa fa-trash"></i> </a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Paket_model->count_all_data_kualifikasi_tender(),
            "recordsFiltered" => $this->Paket_model->count_filtered_data_kualifikasi_tender($id_paket),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }
    public function simpan_kualifikasi_tender()
    {
        $nama_syarat_kualifikasi = $this->input->post('nama_syarat_kualifikasi');
        $id_paket = $this->input->post('id_paket');
        $data = [
            'nama_syarat_kualifikasi' => $nama_syarat_kualifikasi,
            'id_pegawai' => $this->session->userdata('id_pegawai'),
            'id_paket' => $id_paket
        ];
        $this->Paket_model->tambah_syarat_kualifikasi($data, $id_paket);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function delete_kualifikasi($id_kualifikasi_tender)
    {
        $this->Paket_model->delete_kualifikasi($id_kualifikasi_tender);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    // GET PESERTA TENDER

    public function get_peserta_tender($id_paket)
    {
        $resultss = $this->Paket_model->getdatatbl_get_peserta_tender($id_paket);
        $data = [];
        $no = $_POST['start'];
        foreach ($resultss as $angga) {
            $row = array();
            $row[] = ++$no;
            $row[] =  $angga->username_vendor;
            $row[] =  $angga->telepon_vendor;
            $row[] =  $angga->email_vendor;
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Paket_model->count_all_data_peserta_tender($id_paket),
            "recordsFiltered" => $this->Paket_model->count_filtered_peserta_tender($id_paket),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function get_datatable_syarat_vendor($id_paket)
    {
        $resultss = $this->Paket_model->getdatatbl_get_peserta_tender($id_paket);
        $data = [];
        $no = $_POST['start'];
        foreach ($resultss as $angga) {
            $row = array();
            $row[] = ++$no;
            $row[] =  $angga->username_vendor;
            $row[] = '<a href="javascript:;"  class="btn btn-sm btn-primary" id="prosess" onClick="by_id_vendor(' . "'" . $angga->id_vendor_mengikuti  . "','lihat_syarat'" . ')"><i class="fas fa fa-eye"></i> Lihat Dokumen Persyaratan</a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Paket_model->count_all_data_peserta_tender($id_paket),
            "recordsFiltered" => $this->Paket_model->count_filtered_peserta_tender($id_paket),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }
    public function by_id_vendor($id_vendor_mengikuti)
    {
        $id_paket = $this->input->post('id_paket');
        $get_vendor = $this->Paket_model->by_id_vendor_mengikuti($id_vendor_mengikuti, $id_paket);
        $output = [
            "get_vendor" => $get_vendor,

        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }



    public function get_dokumen_syarat_vendor()
    {
        $id_paket = $this->input->post('id_paket_syarat');
        $id_vendor = $this->input->post('id_vendor');
        $resultss = $this->Paket_model->getdatatbl_dokumen_syarat($id_paket, $id_vendor);
        $data = [];
        $no = $_POST['start'];
        foreach ($resultss as $angga) {
            $row = array();
            $row[] = ++$no;
            $row[] =  $angga->nama_dokumen;
            $row[] = '<a href=' . base_url('/file_dokumen_persyaratan_vendor' . '/' . $angga->file_dokumen) . '>' . '<img width="40px" src=' . base_url('assets/pdf.png') . ' >' . '</a>';
            if ($angga->status_persyaratan == 1) {
                $row[] = '<a href="javascript:;"  class="btn btn-sm btn-success" id="prosess"><i class="fas fa fa-check"></i> Dokumen Sudah Di Cek</a>';
            } else {
                $row[] = '<a href="javascript:;"  class="btn btn-sm btn-primary" id="prosess" onClick="cek_syarat(' . "'" . $angga->id_dokumen_syarat_vendor   . "','cek_syarat'" . ')"><i class="fas fa fa-eye"></i> Cek Syarat</a>';
            }
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Paket_model->count_all_data_dokumen_syarat($id_paket, $id_vendor),
            "recordsFiltered" => $this->Paket_model->count_filtered_dokumen_syarat($id_paket, $id_vendor),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function cek_syarat_dokumen($id_dokumen_syarat_vendor)
    {
        $data = [
            'status_persyaratan' => 1
        ];
        $this->Paket_model->cek_syarat($data, $id_dokumen_syarat_vendor);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }


    public function get_table_promosi($id_paket)
    {
        $resultss = $this->Paket_model->getdatatbl_get_peserta_tender($id_paket);
        $data = [];
        $no = $_POST['start'];
        foreach ($resultss as $angga) {
            $row = array();
            $row[] = ++$no;
            $row[] =  $angga->username_vendor;
            $row[] = '<a href="javascript:;"  class="btn btn-sm btn-primary" id="prosess" onClick="by_id_vendor(' . "'" . $angga->id_vendor_mengikuti  . "','lihat_promosi'" . ')"><i class="fas fa fa-eye"></i> Lihat Promosi Alat</a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Paket_model->count_all_data_peserta_tender($id_paket),
            "recordsFiltered" => $this->Paket_model->count_filtered_peserta_tender($id_paket),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }


    public function get_dokumen_video_promosi()
    {
        $id_paket = $this->input->post('id_paket_syarat');
        $id_vendor = $this->input->post('id_vendor');
        $resultss = $this->Paket_model->getdatatbl_dokumen_video($id_paket, $id_vendor);
        $data = [];
        $no = $_POST['start'];
        foreach ($resultss as $angga) {
            $row = array();
            $row[] = ++$no;
            $row[] =  $angga->nama_dokumen_promosi;
            $row[] = '<a href=' . base_url('/file_dokumen_promosi_vendor' . '/' . $angga->file_dokumen_promosi) . '>' . '<img width="40px" src=' . base_url('assets/vidpdf.png') . ' >' . '</a>';
            if ($angga->status_promosi == 1) {
                $row[] = '<a href="javascript:;"  class="btn btn-sm btn-success" id="prosess"><i class="fas fa fa-check"></i> Promosi Sudah Di Cek</a>';
            } else {
                $row[] = '<a href="javascript:;"  class="btn btn-sm btn-primary" id="prosess" onClick="cek_promosi(' . "'" . $angga->id_promosi    . "','cek_promosi'" . ')"><i class="fas fa fa-eye"></i> Cek Syarat</a>';
            }
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Paket_model->count_all_data_dokumen_video($id_paket, $id_vendor),
            "recordsFiltered" => $this->Paket_model->count_filtered_dokumen_video($id_paket, $id_vendor),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }
    public function cek_promosi_dokumen($id_promosi)
    {
        $data = [
            'status_promosi	' => 1
        ];
        $this->Paket_model->cek_promosi($data, $id_promosi);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }
    public function tender_selesai($id_paket)
    {
        $data = [
            'status_selesai_tender	' => 1
        ];
        $this->Paket_model->update_penyeksi($data, $id_paket);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }
}
