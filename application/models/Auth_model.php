<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{

	public function login($username)
	{

		$this->db->select('*');
		$this->db->from('tbl_pegawai');
		$this->db->join('tbl_unit_kerja', 'tbl_pegawai.jabatan = tbl_unit_kerja.id_unit_kerja', 'left');
		$this->db->join('tbl_detail_panitia', 'tbl_pegawai.id_pegawai = tbl_detail_panitia.id_pegawai2', 'left');
		// $this->db->join('tbl_role_panitia', 'tbl_detail_panitia.id_role_panitia = tbl_role_panitia.id_role_panitia', 'left');
		$this->db->join('tbl_panitia', 'tbl_detail_panitia.id_panitia = tbl_panitia.id_panitia', 'left');
		$this->db->where(array(
			'tbl_pegawai.username' => $username
		));
		$this->db->group_by('tbl_pegawai.id_pegawai');
		return $this->db->get()->row();
	}

	// get Result Role
	public function role()
	{
		$this->db->select('*');
		$this->db->from('tbl_role');
		$data = $this->db->get();
		return $data->result_array();
	}

	public function insert_log($data)
	{
		$this->db->insert('tbl_log_akses', $data);
		$this->db->affected_rows();
	}

	public function status_login($data, $where)
	{
		$this->db->update('tbl_pegawai', $data, $where);
		return $this->db->affected_rows();
	}

	public function get_ip($id_pegawai)
	{
		$query = $this->db->query("SELECT * FROM tbl_log_akses WHERE id_pegawai = $id_pegawai ORDER BY id_log_akses DESC");
		return $query->result_array();
	}
}
