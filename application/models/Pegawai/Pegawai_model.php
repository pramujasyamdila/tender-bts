<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai_model extends CI_Model
{

    var $table = 'tbl_pegawai';
    var $order = array('id_pegawai', 'nama_pegawai', 'nip', 'jabatan', 'telepon', 'alamat', 'email', 'id_pegawai');
    var $column_search = array('id_pegawai', 'nama_pegawai', 'nip', 'jabatan', 'telepon', 'alamat', 'email', 'id_pegawai');

    private function _get_data_query()
    {
        $i = 0;
        $this->db->select('*');
        $this->db->from('tbl_pegawai');

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
            $this->db->order_by('id_pegawai', 'DESC');
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

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('tbl_pegawai');
        $data = $this->db->get();
        return $data->result_array();
    }
    public function GetById($id_pegawai)
    {
        $this->db->select('*');
        $this->db->from('tbl_pegawai');
        $this->db->where('id_pegawai', $id_pegawai);
        $data = $this->db->get();
        return $data->row_array();
    }

    public function ambil_data_pegawai($id_pegawai)
    {
        $this->db->select('*');
        $this->db->from('tbl_pegawai');
        $this->db->where('otp_verifikasi', $id_pegawai);
        $data = $this->db->get();
        return $data->row_array();
    }

    public function insert($data)
    {
        $this->db->insert('tbl_pegawai', $data);
    }

    public function kirim_pengajuan($data)
    {
        $this->db->insert('tbl_pengajuan', $data);
    }

    public function insert_pengajuan($data)
    {
        $this->db->insert('tbl_pengajuan_cuti', $data);
    }

    public function update($data, $id_pegawai)
    {
        $this->db->where('id_pegawai', $id_pegawai);
        $this->db->update('tbl_pegawai', $data);
    }

    public function update_pengajuan($data, $id_pengajuan_cuti)
    {
        $this->db->where('id_pengajuan_cuti ', $id_pengajuan_cuti);
        $this->db->update('tbl_pengajuan_cuti', $data);
    }

    public function update_pengajuan2($data, $id_pengajuan)
    {
        $this->db->where('id_pengajuan ', $id_pengajuan);
        $this->db->update('tbl_pengajuan', $data);
    }



    public function delete_pengajuan($id_pengajuan_cuti)
    {
        $this->db->delete('tbl_pengajuan_cuti', ['id_pengajuan_cuti' => $id_pengajuan_cuti]);
    }

    public function delete($id_pegawai)
    {
        $this->db->delete('tbl_pegawai', ['id_pegawai' => $id_pegawai]);
    }

    // cari pegawai berdasarkan atasan 
    public function get_pegawai_atasan()
    {
        $this->db->select('*');
        $this->db->from('tbl_pegawai');
        $this->db->where('role', 'ATASAN');
        $data = $this->db->get();
        return $data->result_array();
    }

    public function get_pegawai_kepala_kantor()
    {
        $this->db->select('*');
        $this->db->from('tbl_pegawai');
        $this->db->where('role', 'KEPALA KANTOR');
        $data = $this->db->get();
        return $data->result_array();
    }

    public function get_row_pegawai_atasan($id_pegawai_atasan)
    {
        $this->db->select('*');
        $this->db->from('tbl_pegawai');
        $this->db->where('role', 'ATASAN');
        $this->db->where('id_pegawai', $id_pegawai_atasan);
        $data = $this->db->get();
        return $data->row_array();
    }

    public function get_row_pegawai_kepala_kantor($id_pegawai_kepala_kantor)
    {
        $this->db->select('*');
        $this->db->from('tbl_pegawai');
        $this->db->where('role', 'KEPALA KANTOR');
        $this->db->where('id_pegawai', $id_pegawai_kepala_kantor);
        $data = $this->db->get();
        return $data->row_array();
    }
    // cari pegawai berdasarkan kepala kantor

    // INI UNTUK DATA GET PROSES CUTI


    var $order2 = array('id_pegawai', 'nama_pegawai', 'nip', 'jabatan', 'telepon', 'alamat', 'email', 'id_pegawai');
    var $column_search2 = array('id_pegawai', 'nama_pegawai', 'nip', 'jabatan', 'telepon', 'alamat', 'email', 'id_pegawai');

    private function _get_data_query_proses_cuti()
    {
        $i = 0;
        $this->db->select('*');
        $this->db->from('tbl_pengajuan_cuti');
        $this->db->join('tbl_pegawai', 'tbl_pengajuan_cuti.id_pegawai = tbl_pegawai.id_pegawai', 'left');
        $this->db->where('sts_pengajuan', 1);
        $this->db->where('tbl_pengajuan_cuti.id_pegawai', $this->session->userdata('id_pegawai'));
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
            $this->db->order_by('tbl_pengajuan_cuti.id_pengajuan_cuti', 'DESC');
        }
    }

    public function getdatatable_proses_cuti()
    {
        $this->_get_data_query_proses_cuti();
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_data_proses_cuti()
    {
        $this->_get_data_query_proses_cuti();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data_proses_cuti()
    {
        $this->db->from('tbl_pengajuan_cuti');
        return $this->db->count_all_results();
    }

    public function GetByid_pengajuan_cuti($id_pengajuan_cuti)
    {
        $this->db->select('*');
        $this->db->from('tbl_pengajuan_cuti');
        $this->db->join('tbl_pegawai', 'tbl_pengajuan_cuti.id_pegawai = tbl_pegawai.id_pegawai', 'left');
        $this->db->where('id_pengajuan_cuti ', $id_pengajuan_cuti);
        $data = $this->db->get();
        return $data->row_array();
    }

    // CUTI BY ROLE
    var $order22 = array('id_pegawai', 'nama_pegawai', 'nip', 'jabatan', 'telepon', 'alamat', 'email', 'id_pegawai');
    var $column_search22 = array('id_pegawai', 'nama_pegawai', 'nip', 'jabatan', 'telepon', 'alamat', 'email', 'id_pegawai');

    private function _get_data_query_proses_cuti2()
    {
        $i = 0;
        $this->db->select('*');
        $this->db->from('tbl_pengajuan_cuti');
        $this->db->join('tbl_pegawai', 'tbl_pengajuan_cuti.id_pegawai = tbl_pegawai.id_pegawai', 'left');
        if ($this->session->userdata('role') == 'ATASAN') {
            $this->db->where('id_pegawai_atasan', $this->session->userdata('id_pegawai'));
        } else {
            $this->db->where('id_pegawai_kepala_kantor', $this->session->userdata('id_pegawai'));
        }

        $this->db->where('sts_pengajuan', 1);
        foreach ($this->column_search22 as $item) // looping awal
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

                if (count($this->column_search22) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->order22[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_pengajuan_cuti.id_pengajuan_cuti', 'DESC');
        }
    }

    public function getdatatable_proses_cuti2()
    {
        $this->_get_data_query_proses_cuti2();
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_data_proses_cuti2()
    {
        $this->_get_data_query_proses_cuti2();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data_proses_cuti2()
    {
        $this->db->from('tbl_pengajuan_cuti');
        return $this->db->count_all_results();
    }
    // catatan cuti
    public function catatan_cuti($id_pegawai)
    {
        $this->db->select('*');
        $this->db->from('tbl_pengajuan_cuti');
        $this->db->join('tbl_pegawai', 'tbl_pengajuan_cuti.id_pegawai = tbl_pegawai.id_pegawai', 'left');
        $this->db->where('sts_pertimbangan_atasan', 'DISETUJUI');
        $this->db->where('sts_pertimbnag_kelapa_kator', 'DISETUJUI');
        $this->db->where('tbl_pengajuan_cuti.id_pegawai ', $id_pegawai);
        $this->db->where('sts_pertimbnag_kelapa_kator', 'DISETUJUI');
        $this->db->order_by('tbl_pengajuan_cuti.id_pegawai', 'DESC');
        $this->db->group_by('tbl_pengajuan_cuti.tanggal_pengajua_cuti');
        $data = $this->db->get();
        return $data->result_array();
    }
    public function ceK_catatan($id_pengajuan_cuti)
    {
        $this->db->select('*');
        $this->db->from('tbl_catatan_cuti');
        $this->db->where('id_pengajuan_cuti ', $id_pengajuan_cuti);
        $data = $this->db->get();
        return $data->result_array();
    }
    public function insert_catatan($data)
    {
        $this->db->insert('tbl_catatan_cuti', $data);
    }

    // INI AMBIL ROLE master
    public function ambil_role()
    {
        $this->db->select('*');
        $this->db->from('tbl_role');
        $data = $this->db->get();
        return $data->result_array();
    }



    var $order222 = array('id_pengajuan', 'kebutuhan', 'anggaran', 'lokasi', 'penanggung_jawab', 'keterangan', 'id_pengajuan');
    var $column_search222 = array('id_pengajuan', 'kebutuhan', 'anggaran', 'lokasi', 'penanggung_jawab', 'keterangan', 'id_pengajuan');

    private function _get_data_query_pengajuan()
    {
        $i = 0;
        $this->db->select('*');
        $this->db->from('tbl_pengajuan');
        $this->db->join('tbl_pegawai', 'tbl_pengajuan.id_pegawai = tbl_pegawai.id_pegawai', 'left');
        if ($this->session->userdata('id_role') == 1) {
        } else {
            $this->db->where('tbl_pengajuan.id_pegawai', $this->session->userdata('id_pegawai'));
        }
        foreach ($this->column_search222 as $item) // looping awal
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

                if (count($this->column_search222) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->order222[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_pengajuan.id_pengajuan', 'DESC');
        }
    }

    public function getdatatable_pengajuan()
    {
        $this->_get_data_query_pengajuan();
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }


    public function count_filtered_data_pengajuan()
    {
        $this->_get_data_query_pengajuan();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data_pengajuan()
    {
        $this->db->from('tbl_pengajuan');
        return $this->db->count_all_results();
    }
}
