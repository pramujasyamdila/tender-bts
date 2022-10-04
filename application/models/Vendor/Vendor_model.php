<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vendor_model extends CI_Model
{

    public function row_vendor($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('id_vendor', $id_vendor);
        $data = $this->db->get();
        return $data->row_array();
    }
    public function result_vendor($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_perusahan');
        $this->db->where('id_vendor', $id_vendor);
        $data = $this->db->get();
        return $data->result_array();
    }
    public function jika_ada($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_perusahan');
        $this->db->where('id_vendor', $id_vendor);
        $data = $this->db->get();
        return $data->result_array();
    }
    public function ada_pereusahaan($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_perusahan');
        $this->db->where('id_vendor', $id_vendor);
        $data = $this->db->get();
        return $data->row_array();
    }

    public function insert($data)
    {
        $this->db->insert('tbl_perusahan', $data);
    }


    public function insert_ke_tbl_mengikuti_paket($data)
    {
        $this->db->insert('tbl_vendor_mengikuti_paket', $data);
    }
    public function update($data, $id_vendor)
    {
        $this->db->where('id_vendor', $id_vendor);
        $this->db->update('tbl_perusahan', $data);
    }


    public function tambah_pengalaman($data)
    {
        $this->db->insert('tbl_pengalaman_vendor', $data);
    }

    // INI UNTUK TABLE PENGALAMAN
    var $table = 'tbl_pengalaman_vendor';
    var $order = array('id_pengalaman ', 'nama_pekerjaan', 'pemberi_kerja', 'nomor_kontrak', 'tanggal_kontrak', 'nilai_kontrak', 'alamat_pekerjaan', 'id_pengalaman ');
    var $column_search = array('id_pengalaman ', 'nama_pekerjaan', 'pemberi_kerja', 'nomor_kontrak', 'tanggal_kontrak', 'nilai_kontrak', 'alamat_pekerjaan', 'id_pengalaman ');

    private function _get_data_query_pengalaman()
    {
        $i = 0;
        $this->db->select('*');
        $this->db->from('tbl_pengalaman_vendor');
        $this->db->where('id_vendor', $this->session->userdata('id_vendor'));
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
            $this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('id_pengalaman ', 'DESC');
        }
    }

    public function getdatatable_pengalaman()
    {
        $this->_get_data_query_pengalaman();
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_data_pengalaman()
    {
        $this->_get_data_query_pengalaman();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data_pengalaman()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // INI UNTUK TENAGA AHLI

    public function tambah_tenaga($data)
    {
        $this->db->insert('tbl_tenaga_ahli', $data);
    }

    // INI UNTUK TABLE tenaga
    var $table2 = 'tbl_tenaga_ahli';
    var $order2 = array('id_tenaga_ahli ', 'nama_tenaga_ahli', 'nip', 'pendidikan', 'prodi', 'spesialis', 'id_tenaga_ahli ');
    var $column_search2 = array('id_tenaga_ahli ', 'nama_tenaga_ahli', 'nip', 'pendidikan', 'prodi', 'spesialis', 'id_tenaga_ahli ');

    private function _get_data_query_tenaga()
    {
        $i = 0;
        $this->db->select('*');
        $this->db->from('tbl_tenaga_ahli');
        $this->db->where('id_vendor', $this->session->userdata('id_vendor'));
        foreach ($this->column_search2 as $item) // looping awal
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

                if (count($this->column_search2) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->order2[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('id_tenaga_ahli ', 'DESC');
        }
    }

    public function getdatatable_tenaga()
    {
        $this->_get_data_query_tenaga();
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_data_tenaga()
    {
        $this->_get_data_query_tenaga();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data_tenaga()
    {
        $this->db->from($this->table2);
        return $this->db->count_all_results();
    }
}
