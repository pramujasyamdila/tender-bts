<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_vendor_model extends CI_Model
{
    public function login($username_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where(array(
            'tbl_vendor.username_vendor' => $username_vendor
        ));
        $this->db->group_by('tbl_vendor.id_vendor');
        return $this->db->get()->row();
    }

    public function update($where, $data)
    {
        $this->db->update('tbl_vendor', $data, $where);
        return $this->db->affected_rows();
    }

    public function regisdata($data)
    {
        $this->db->insert('tbl_vendor', $data);
    }
}
