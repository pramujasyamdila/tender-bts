<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
	public function login($username)
	{
		$this->db->select('*');
		$this->db->from('tbl_pegawai');
		$this->db->where(array(
			'tbl_pegawai.username' => $username
		));
		$this->db->group_by('tbl_pegawai.id_pegawai');
		return $this->db->get()->row();
	}

	public function update($where, $data)
	{
		$this->db->update('tbl_pegawai', $data, $where);
		return $this->db->affected_rows();
	}
	public function insert_log($data)
	{
		$this->db->insert('tbl_log_akses', $data);
		$this->db->affected_rows();
	}
}
