<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Metode_evaluasi_model extends CI_Model
{
	var $table = 'tbl_metode_evaluasi';
	var $colum_order = array('id_metode_evaluasi', 'nama_metode_evaluasi');
	var $order = array('id_metode_evaluasi', 'nama_metode_evaluasi');

	private function _get_data_query()
	{
		$this->db->from($this->table);
		if (isset($_POST['search']['value'])) {
			$this->db->like('nama_metode_evaluasi', $_POST['search']['value']);
			// $this->db->or_like('data_kerja', $_POST['search']['value']);
			// $this->db->or_like('jabatan', $_POST['search']['value']);
			// $this->db->or_like('status', $_POST['search']['value']);
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_metode_evaluasi', 'DESC');
			$this->db->order_by('nama_metode_evaluasi', 'DESC');
		}
	}

	public function getdatatable() //nam[ilin data pake ini
	{
		$this->_get_data_query(); //ambil data dari get yg di atas
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_data()
	{
		$this->_get_data_query(); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function create($data)
	{
		$this->db->insert('tbl_metode_evaluasi', $data);
		return $this->db->affected_rows();
	}

	public function getByid($id_metode_evaluasi)
	{
		return $this->db->get_where($this->table, ['id_metode_evaluasi' => $id_metode_evaluasi])->row();
	}

	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete($id_metode_evaluasi)
	{
		$this->db->delete($this->table, ['id_metode_evaluasi' => $id_metode_evaluasi]);
		return $this->db->affected_rows();
	}
}
