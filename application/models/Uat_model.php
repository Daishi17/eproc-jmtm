<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Uat_model extends CI_Model
{
	var $table = 'tbl_uat';
	var $colum_order = array('id_uat', 'deskripsi', 'status_uat');
	var $order = array('id_uat', 'deskripsi', 'status_uat');

	private function _get_data_query($id_role)
	{
		$this->db->from($this->table);
		$this->db->where('id_role', $id_role);
		$this->db->order_by('id_uat', 'ASC');
		if (isset($_POST['search']['value'])) {
			$this->db->like('deskripsi', $_POST['search']['value']);
			// $this->db->or_like('data_kerja', $_POST['search']['value']);
			// $this->db->or_like('jabatan', $_POST['search']['value']);
			// $this->db->or_like('status', $_POST['search']['value']);
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_uat', 'DESC');
			$this->db->order_by('deskripsi', 'DESC');
			$this->db->order_by('status_uat', 'DESC');
		}
	}

	public function getdatatable($id_role) //nam[ilin data pake ini
	{
		$this->_get_data_query($id_role); //ambil data dari get yg di atas
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_data($id_role)
	{
		$this->_get_data_query($id_role); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data($id_role)
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
	public function getByid($id_uat)
	{
		return $this->db->get_where($this->table, ['id_uat' => $id_uat])->row();
	}
	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}
	public function delete($id_uat)
	{
		$this->db->delete($this->table, ['id_uat' => $id_uat]);
		return $this->db->affected_rows();
	}
	public function getall_uat()
	{
		$this->db->select('*');
		$this->db->from('tbl_uat');
		$query = $this->db->get();
		return $query->result_array();
	}
}
