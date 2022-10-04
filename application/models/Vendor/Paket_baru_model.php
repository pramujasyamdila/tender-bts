<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paket_baru_model extends CI_Model
{

    var $table = 'tbl_paket';
    var $order = array('id_paket', 'nama_paket');
    var $column_search = array('id_paket', 'nama_paket', 'nama_paket', 'program_paket', 'nama_paket', 'nama_paket', 'nama_paket');

    var $colum_order_tender3 = array('id_paket', 'nama_paket', 'nama_paket', 'program_paket', 'nama_paket', 'nama_paket', 'nama_paket', 'id_paket');
    private function _get_data_query()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('status_tahap_tender', 1);
        $this->db->or_where('status_tahap_tender', 2);
        $i = 0;
        foreach ($this->column_search as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if (
                    $i === 0
                ) // looping awal
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



    // INI UNTUK PEKET DIIUKUTI
    private function _get_data_query_tender_diikuti()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_paket', 'tbl_vendor_mengikuti_paket.id_paket_mengikuti = tbl_paket.id_paket', 'left');
        $this->db->where('id_vendor_mengikuti', $this->session->userdata('id_vendor'));
        $this->db->where('status_mengikuti_paket', 1);
        $i = 0;
        foreach ($this->column_search as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if (
                    $i === 0
                ) // looping awal
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
            $this->db->order_by('tbl_vendor_mengikuti_paket.id_paket_mengikuti', 'DESC');
        }
    }

    public function getdata_tender_diikuti()
    {
        $this->_get_data_query_tender_diikuti();
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_data_diikuti()
    {
        $this->_get_data_query_tender_diikuti();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data_diikuti()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_paket', 'tbl_vendor_mengikuti_paket.id_paket_mengikuti = tbl_paket.id_paket', 'left');
        $this->db->where('id_vendor_mengikuti', $this->session->userdata('id_vendor'));
        $this->db->where('status_mengikuti_paket', 1);
        return $this->db->count_all_results();
    }


    // INI UNTUK TAMBAH DOKUMEN SYARAT VENDOR

    // INI UNTUK PEKET DIIUKUTI
    private function _get_data_query_tender_persyaratan($id_paket)
    {
        $this->db->select('*');
        $this->db->from('tbl_dokumen_syarat_vendor');
        $this->db->where('id_vendor', $this->session->userdata('id_vendor'));
        $this->db->where('id_paket', $id_paket);
        $i = 0;
        foreach ($this->column_search as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if (
                    $i === 0
                ) // looping awal
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
            $this->db->order_by('tbl_dokumen_syarat_vendor.id_vendor', 'DESC');
        }
    }
    public function getdata_tender_persyaratan($id_paket)
    {
        $this->_get_data_query_tender_persyaratan($id_paket);
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_data_persyaratan($id_paket)
    {
        $this->_get_data_query_tender_persyaratan($id_paket);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data_persyaratan($id_paket)
    {
        $this->db->select('*');
        $this->db->from('tbl_dokumen_syarat_vendor');
        $this->db->where('id_vendor', $this->session->userdata('id_vendor'));
        $this->db->where('id_paket', $id_paket);
        return $this->db->count_all_results();
    }

    public function tambah_dokumen_syarat_vendor($data)
    {
        $this->db->insert('tbl_dokumen_syarat_vendor', $data);
    }
    public function delete_dokumen_syarat_vendor($id_dokumen_syarat_vendor)
    {
        $this->db->delete('tbl_dokumen_syarat_vendor', ['id_dokumen_syarat_vendor ' => $id_dokumen_syarat_vendor]);
    }

    public function get_row_vendor_persyaratn($id_dokumen_syarat_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_dokumen_syarat_vendor');
        $this->db->where('id_dokumen_syarat_vendor', $id_dokumen_syarat_vendor);
        $data = $this->db->get();
        return $data->row_array();
    }

    // ININ UNTUK YG TENEDR PROMOSI

    private function _get_data_query_tender_promosi($id_paket)
    {
        $this->db->select('*');
        $this->db->from('tbl_dokumen_promosi_vendor');
        $this->db->where('id_vendor', $this->session->userdata('id_vendor'));
        $this->db->where('id_paket', $id_paket);
        $i = 0;
        foreach ($this->column_search as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if (
                    $i === 0
                ) // looping awal
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
            $this->db->order_by('tbl_dokumen_promosi_vendor.id_vendor', 'DESC');
        }
    }
    public function getdata_tender_promosi($id_paket)
    {
        $this->_get_data_query_tender_promosi($id_paket);
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_data_promosi($id_paket)
    {
        $this->_get_data_query_tender_promosi($id_paket);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data_promosi($id_paket)
    {
        $this->db->select('*');
        $this->db->from('tbl_dokumen_promosi_vendor');
        $this->db->where('id_vendor', $this->session->userdata('id_vendor'));
        $this->db->where('id_paket', $id_paket);
        return $this->db->count_all_results();
    }

    public function tambah_dokumen_promosi_vendor($data)
    {
        $this->db->insert('tbl_dokumen_promosi_vendor', $data);
    }
    public function delete_dokumen_promosi_vendor($id_promosi)
    {
        $this->db->delete('tbl_dokumen_promosi_vendor', ['id_promosi ' => $id_promosi]);
    }

    public function get_row_vendor_promosi($id_promosi)
    {
        $this->db->select('*');
        $this->db->from('tbl_dokumen_promosi_vendor');
        $this->db->where('id_promosi', $id_promosi);
        $data = $this->db->get();
        return $data->row_array();
    }
}
