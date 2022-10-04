<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Evaluasi_model extends CI_Model
{

    var $vendor = array(
        'id_mengikuti_paket ', 'id_vendor_mengikuti', 'id_paket_mengikuti', 'status_mengikuti_paket', 'status_mengikuti_paket', 'status_mengikuti_paket', 'status_mengikuti_paket'
    );
    private function get_vendor($id_paket)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor_mengikuti = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_paket_mengikuti', $id_paket);
        $i = 0;
        foreach ($this->vendor as $item) // looping awal
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

                if (count($this->vendor) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->vendor[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('id_mengikuti_paket', 'DESC');
        }
    }
    public function get_datatable_vendor($id_paket) //nam[ilin data pake ini
    {
        $this->get_vendor($id_paket); //ambil data dari get yg di atas
        if ($_POST['length'] != -3) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_vendor($id_paket)
    {
        $this->get_vendor($id_paket); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data_vendor($id_paket)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor_mengikuti = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_paket_mengikuti', $id_paket);
        return $this->db->count_all_results();
    }


    public function row_vendor_mengikuti($id_paket, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor_mengikuti = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_paket_mengikuti', $id_paket);
        $this->db->where('tbl_vendor_mengikuti_paket.id_vendor_mengikuti', $id_vendor);
        $data = $this->db->get();
        return $data->row_array();
    }
    public function update_ke_mengikuti_vendor($data, $id_paket, $id_vendor)
    {
        $this->db->where('id_paket_mengikuti', $id_paket);
        $this->db->where('id_vendor_mengikuti', $id_vendor);
        $this->db->update('tbl_vendor_mengikuti_paket', $data);
    }

    public function update_ke_mengikuti_vendor2($data, $id_mengikuti_paket)
    {
        $this->db->where('id_mengikuti_paket ', $id_mengikuti_paket);
        $this->db->update('tbl_vendor_mengikuti_paket', $data);
    }



    public function totalRincianHps_vendor($id_paket, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_rincian_hps_vendor');
        $this->db->where('id_paket', $id_paket);
        $this->db->where('id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function tenaga_ahli($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_tenaga_ahli');
        $this->db->where('id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function pengalaman($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_pengalaman_vendor');
        $this->db->where('id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function by_id_vendor($id_mengikuti_paket)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor_mengikuti = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_mengikuti_paket', $id_mengikuti_paket);
        $data = $this->db->get();
        return $data->row_array();
    }

    public function tambah_dokumen_undangan($data)
    {
        $this->db->insert('tbl_undangan_pembuktian', $data);
        return $this->db->affected_rows();
    }

    public function cek_pembuktian($id_paket)
    {
        $this->db->select('*');
        $this->db->from('tbl_undangan_pembuktian');
        $this->db->where('id_paket', $id_paket);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function update_dokumen_undangan($data, $id_paket)
    {
        $this->db->where('id_paket', $id_paket);
        $this->db->update('tbl_undangan_pembuktian', $data);
    }
}
