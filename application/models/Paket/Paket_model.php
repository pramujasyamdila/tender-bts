<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paket_model extends CI_Model
{
    public function get_kode_tender($text = null, $table = null, $field = null)
    {
        $this->db->select('kode_tender_random');
        $this->db->like($field, $text, 'after');
        $this->db->order_by($field, 'desc');
        $this->db->limit(1);
        return $this->db->get($table)->row_array()[$field];
    }

    var $table = 'tbl_paket';
    var $order = array('id_paket', 'nama_paket');
    var $column_search = array('id_paket', 'nama_paket', 'nama_paket', 'program_paket', 'nama_paket', 'nama_paket', 'nama_paket');

    var $colum_order_tender3 = array('id_paket', 'nama_paket', 'nama_paket', 'program_paket', 'nama_paket', 'nama_paket', 'nama_paket', 'id_paket');
    private function _get_data_query()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        if ($this->session->userdata('id_role') == 2) {
            $this->db->where('status_paket_tender', 1);
            $this->db->where('id_penyeleksi', $this->session->userdata('id_pegawai'));
        } else {
        }
        $i = 0;
        foreach ($this->column_search as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like(
                        $item,
                        $_POST['search']['value']
                    );
                }

                if (count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->colum_order_tender3[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('id_paket', 'DESC');
        }
    }

    public function getdatatable()
    {
        $this->_get_data_query();
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_data()
    {
        $this->_get_data_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function row_paket($id_paket)
    {
        $this->db->select('*');
        $this->db->from('tbl_paket');
        $this->db->join('tbl_pegawai', 'tbl_paket.id_pegawai = tbl_pegawai.id_pegawai', 'left');
        $this->db->where('id_paket', $id_paket);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function row_paket2($id_paket)
    {
        $this->db->select('*');
        $this->db->from('tbl_paket');
        $this->db->join('tbl_pegawai', 'tbl_paket.id_penyeleksi = tbl_pegawai.id_pegawai', 'left');
        $this->db->where('id_paket', $id_paket);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_vendor_mengikuti_paket($id_paket)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->where('id_paket_mengikuti', $id_paket);
        $this->db->where('id_vendor_mengikuti', $this->session->userdata('id_vendor'));
        $query = $this->db->get();
        return $query->row_array();
    }



    public function pegawai_penyeleksi()
    {
        $this->db->select('*');
        $this->db->from('tbl_pegawai');
        $this->db->where('id_role', 2);
        $query = $this->db->get();
        return $query->result_array();
    }


    public function update_penyeksi($data, $id_paket)
    {
        $this->db->where('id_paket', $id_paket);
        $this->db->update('tbl_paket', $data);
    }

    var $pdf_hps_manual = array(
        'id_rincian_hps', 'deskripsi', 'jumlah', 'harga_rincian_hps', 'id_rincian_hps', 'id_rincian_hps', 'id_rincian_hps'
    );
    private function _getRincianHps($id_paket)
    {
        $this->db->select('*');
        $this->db->from('tbl_rincian_hps');
        $this->db->where('id_paket', $id_paket);
        $i = 0;
        foreach ($this->pdf_hps_manual as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like(
                        $item,
                        $_POST['search']['value']
                    );
                }

                if (count($this->pdf_hps_manual) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->pdf_hps_manual[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('id_rincian_hps', 'DESC');
        }
    }
    public function getdatatableRincianHps($id_paket) //nam[ilin data pake ini
    {
        $this->_getRincianHps($id_paket); //ambil data dari get yg di atas
        if ($_POST['length'] != -3) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_RincianHps($id_paket)
    {
        $this->_getRincianHps($id_paket); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_dataRincianHps($id_paket)
    {
        $this->db->from('tbl_rincian_hps');
        $this->db->where('id_paket', $id_paket);
        return $this->db->count_all_results();
    }

    // tambah RincianHps
    public function create_rincian_hps($data)
    {
        $this->db->insert('tbl_rincian_hps', $data);
    }
    // EDIT _rincian_hps
    public function update_rincian_hps($where, $data)
    {
        $this->db->update('tbl_rincian_hps', $data, $where);
        return $this->db->affected_rows();
    }
    // HAPUS _rincian_hps
    public function deletedata_rincian_hps($id_rincian_hps)
    {
        $this->db->delete('tbl_rincian_hps', ['id_rincian_hps' => $id_rincian_hps]);
    }

    public function totalRincianHps($id_paket)
    {
        $this->db->select('*');
        $this->db->where('id_paket', $id_paket);
        $this->db->from('tbl_rincian_hps');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getRincianHpsByid($id_rincian_hps)
    {
        $this->db->select('*');
        $this->db->from('tbl_rincian_hps');
        $this->db->where('id_rincian_hps', $id_rincian_hps);
        $query = $this->db->get();
        return $query->row_array();
    }

    // ININ UTNUK DOKUMEN
    // INI UNTUK DOKUMEN tender
    public function tambah_dokumen_tender($data)
    {
        $this->db->insert('tbl_dokumen_pengadaan', $data);
        return $this->db->affected_rows();
    }

    // table dokumen pengadaan trankasi langsung
    private function _get_data_query_dokumen_tender($id_paket)
    {
        $this->db->select('*');
        $this->db->from('tbl_dokumen_pengadaan');
        $this->db->where('tbl_dokumen_pengadaan.id_paket', $id_paket);
        if (isset($_POST['search']['value'])) {
            $this->db->like('tbl_dokumen_pengadaan.nama_dokumen', $_POST['search']['value']);
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_dokumen_pengadaan.id_dokumen_pengadaan', 'DESC');
        }
    }

    public function getdatatbl_dokumen_pengadaan($id_paket)
    {
        $this->_get_data_query_dokumen_tender($id_paket);
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_data_dokumen_tender($id_paket)
    {
        $this->_get_data_query_dokumen_tender($id_paket);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data_dokumen_tender()
    {
        $this->db->from('tbl_dokumen_pengadaan');
        return $this->db->count_all_results();
    }

    public function by_id_dokumen_pengadaan($id_dokumen_pengadaan)
    {
        $this->db->select('*');
        $this->db->from('tbl_dokumen_pengadaan');
        $this->db->where('tbl_dokumen_pengadaan.id_dokumen_pengadaan', $id_dokumen_pengadaan);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function delete_dokumen_tender($id_dokumen_pengadaan)
    {
        $this->db->delete('tbl_dokumen_pengadaan', ['id_dokumen_pengadaan' => $id_dokumen_pengadaan]);
    }

    // INI UNTUK SYARAT KUALIFIKASI TENDER


    private function _get_data_query_kualifikasi_tender($id_paket)
    {
        $this->db->select('*');
        $this->db->from('tbl_kualifkasi_tender');
        $this->db->where('id_paket', $id_paket);
        if (isset($_POST['search']['value'])) {
            $this->db->like('nama_syarat_kualifikasi', $_POST['search']['value']);
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('id_kualifikasi_tender ', 'DESC');
        }
    }

    public function get_table_kualifikasi_tender($id_paket)
    {
        $this->_get_data_query_kualifikasi_tender($id_paket);
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_data_kualifikasi_tender($id_paket)
    {
        $this->_get_data_query_kualifikasi_tender($id_paket);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data_kualifikasi_tender()
    {
        $this->db->from('tbl_kualifkasi_tender');
        return $this->db->count_all_results();
    }

    public function tambah_syarat_kualifikasi($data)
    {
        $this->db->insert('tbl_kualifkasi_tender', $data);
        return $this->db->affected_rows();
    }


    public function delete_kualifikasi($id_kualifikasi_tender)
    {
        $this->db->delete('tbl_kualifkasi_tender', ['id_kualifikasi_tender' => $id_kualifikasi_tender]);
    }
    // INI UNTUK INFORMASI TENDER

    private function _get_data_query_informasi_tender()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        if ($this->session->userdata('id_role') == 2) {
            $this->db->where('status_tahap_tender', 1);
            $this->db->where('id_penyeleksi', $this->session->userdata('id_pegawai'));
        } else {
            $this->db->where('status_tahap_tender', 1);
        }
        $i = 0;
        foreach ($this->column_search as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like(
                        $item,
                        $_POST['search']['value']
                    );
                }

                if (count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->colum_order_tender3[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('id_paket', 'DESC');
        }
    }

    public function getdatatable_informasi_tender()
    {
        $this->_get_data_query_informasi_tender();
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_data_informasi_tender()
    {
        $this->_get_data_query_informasi_tender();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data_informasi_tender()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // tambah RincianHps
    public function create_rincian_hps_vendor($data)
    {
        $this->db->insert('tbl_rincian_hps_vendor', $data);
    }
    // EDIT _rincian_hps
    public function update_rincian_hps_vendor($where, $data)
    {
        $this->db->update('tbl_rincian_hps_vendor', $data, $where);
        return $this->db->affected_rows();
    }
    // HAPUS _rincian_hps
    public function deletedata_rincian_hps_vendor($id_rincian_hps_vendor)
    {
        $this->db->delete('tbl_rincian_hps_vendor', ['id_rincian_hps_vendor' => $id_rincian_hps_vendor]);
    }

    var $pdf_hps_manual_vendor = array(
        'id_rincian_hps_vendor', 'deskripsi_vendor', 'jumlah_vendor', 'harga_rincian_hps_vendor', 'id_rincian_hps_vendor', 'id_rincian_hps_vendor', 'id_rincian_hps_vendor'
    );
    private function _getRincianHps_vendor($id_paket)
    {
        $this->db->select('*');
        $this->db->from('tbl_rincian_hps_vendor');
        $this->db->where('id_paket', $id_paket);
        $this->db->where('id_vendor', $this->session->userdata('id_vendor'));
        $i = 0;
        foreach ($this->pdf_hps_manual_vendor as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like(
                        $item,
                        $_POST['search']['value']
                    );
                }

                if (count($this->pdf_hps_manual_vendor) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->pdf_hps_manual_vendor[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('id_rincian_hps_vendor', 'DESC');
        }
    }
    public function getdatatableRincianHps_vendor($id_paket) //nam[ilin data pake ini
    {
        $this->_getRincianHps_vendor($id_paket); //ambil data dari get yg di atas
        if ($_POST['length'] != -3) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_RincianHps_vendor($id_paket)
    {
        $this->_getRincianHps_vendor($id_paket); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_dataRincianHps_vendor($id_paket)
    {
        $this->db->from('tbl_rincian_hps_vendor');
        $this->db->where('id_paket', $id_paket);
        $this->db->where('id_vendor', $this->session->userdata('id_vendor'));
        return $this->db->count_all_results();
    }
    public function getRincianHpsByid_vendor($id_rincian_hps_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_rincian_hps_vendor');
        $this->db->where('id_rincian_hps_vendor', $id_rincian_hps_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function totalRincianHps_vendor($id_paket)
    {
        $this->db->select('*');
        $this->db->from('tbl_rincian_hps_vendor');
        $this->db->where('id_paket', $id_paket);
        $this->db->where('id_vendor', $this->session->userdata('id_vendor'));
        $query = $this->db->get();
        return $query->result_array();
    }

    // GET PESERTA VENDOR

    var $peserta_tender = array(
        'id_mengikuti_paket ', 'id_vendor_mengikuti', 'id_paket_mengikuti', 'status_mengikuti_paket', 'id_mengikuti_paket'
    );
    private function _getPeserta_vendor($id_paket)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor_mengikuti = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_paket_mengikuti', $id_paket);
        $i = 0;
        foreach ($this->peserta_tender as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like(
                        $item,
                        $_POST['search']['value']
                    );
                }

                if (count($this->peserta_tender) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->peserta_tender[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('id_paket_mengikuti', 'DESC');
        }
    }
    public function getdatatbl_get_peserta_tender($id_paket) //nam[ilin data pake ini
    {
        $this->_getPeserta_vendor($id_paket); //ambil data dari get yg di atas
        if ($_POST['length'] != -3) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_peserta_tender($id_paket)
    {
        $this->_getPeserta_vendor($id_paket); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data_peserta_tender($id_paket)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor_mengikuti = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_paket_mengikuti', $id_paket);
        return $this->db->count_all_results();
    }

    // LIHAT DOKUMEN SYARAT VENDOR

    public function by_id_vendor_mengikuti($id_vendor, $id_paket)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor_mengikuti = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_paket_mengikuti', $id_paket);
        $this->db->where('tbl_vendor_mengikuti_paket.id_vendor_mengikuti', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }

    // TABLE PERSYARATAN VENDOR
    var $dokumen_syarat_vendor = array(
        'id_paket ', 'id_vendor', 'nama_dokumen', 'file_dokumen', 'status_persyaratan'
    );
    private function _getSyarat_dokumen_vendor($id_paket, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_dokumen_syarat_vendor');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('id_paket', $id_paket);
        $i = 0;
        foreach ($this->dokumen_syarat_vendor as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like(
                        $item,
                        $_POST['search']['value']
                    );
                }

                if (count($this->dokumen_syarat_vendor) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->dokumen_syarat_vendor[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('id_paket', 'DESC');
        }
    }
    public function getdatatbl_dokumen_syarat($id_paket, $id_vendor) //nam[ilin data pake ini
    {
        $this->_getSyarat_dokumen_vendor($id_paket, $id_vendor); //ambil data dari get yg di atas
        if ($_POST['length'] != -3) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_dokumen_syarat($id_paket, $id_vendor)
    {
        $this->_getSyarat_dokumen_vendor($id_paket, $id_vendor); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data_dokumen_syarat($id_paket, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_dokumen_syarat_vendor');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('id_paket', $id_paket);
        return $this->db->count_all_results();
    }

    public function cek_syarat($data, $id_dokumen_syarat_vendor)
    {
        $this->db->where('id_dokumen_syarat_vendor', $id_dokumen_syarat_vendor);
        $this->db->update('tbl_dokumen_syarat_vendor', $data);
    }

    // TABLE PERSYARATAN VENDOR
    var $dokumen_promosi = array(
        'id_paket ', 'id_vendor', 'nama_dokumen_promosi', 'file_dokumen_promosi', 'status_promosi'
    );
    private function _get_promosi($id_paket, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_dokumen_promosi_vendor');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('id_paket', $id_paket);
        $i = 0;
        foreach ($this->dokumen_promosi as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like(
                        $item,
                        $_POST['search']['value']
                    );
                }

                if (count($this->dokumen_promosi) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->dokumen_promosi[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('id_paket', 'DESC');
        }
    }
    public function getdatatbl_dokumen_video($id_paket, $id_vendor) //nam[ilin data pake ini
    {
        $this->_get_promosi($id_paket, $id_vendor); //ambil data dari get yg di atas
        if ($_POST['length'] != -3) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_dokumen_video($id_paket, $id_vendor)
    {
        $this->_get_promosi($id_paket, $id_vendor); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_all_data_dokumen_video($id_paket, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_dokumen_promosi_vendor');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('id_paket', $id_paket);
        return $this->db->count_all_results();
    }
    public function cek_promosi($data, $id_promosi)
    {
        $this->db->where('id_promosi', $id_promosi);
        $this->db->update('tbl_dokumen_promosi_vendor', $data);
    }

    public function cek_pemenang($id_paket)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor_mengikuti = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.status_pemenang', 1);
        $this->db->where('tbl_vendor_mengikuti_paket.id_paket_mengikuti', $id_paket);
        $this->db->where('tbl_vendor_mengikuti_paket.id_vendor_mengikuti', $this->session->userdata('id_vendor'));
        $data = $this->db->get();
        return $data->row_array();
    }
}
