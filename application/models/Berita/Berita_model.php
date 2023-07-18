<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita_model extends CI_Model
{
	var $table = 'tbl_berita';
	var $colum_order = array('id_berita', 'nama_berita');
	var $order = array('id_berita', 'nama_berita');

	private function _get_data_query7()
	{
		$this->db->select('*');
		$this->db->from('tbl_berita');
		if (isset($_POST['search']['value'])) {
			$this->db->like('nama_berita', $_POST['search']['value']);
			// $this->db->or_like('data_kerja', $_POST['search']['value']);
			// $this->db->or_like('jabatan', $_POST['search']['value']);
			// $this->db->or_like('status', $_POST['search']['value']);
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_berita', 'DESC');
		}
	}
	public function getdatatable7() //nam[ilin data pake ini
	{
		$this->_get_data_query7(); //ambil data dari get yg di atas
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_data7()
	{
		$this->_get_data_query7(); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data7()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function create7($data)
	{
		$this->db->insert('tbl_berita', $data);
		return $this->db->affected_rows();
	}

	public function getByid7($id_berita)
	{
		return $this->db->get_where($this->table, ['id_berita' => $id_berita])->row();
	}

	public function update7($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete7($id_berita)
	{
		$this->db->delete($this->table, ['id_berita' => $id_berita]);
		return $this->db->affected_rows();
	}
}
