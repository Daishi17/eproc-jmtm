<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Metode_dokumen_model extends CI_Model
{
	var $table = 'tbl_metode_dokumen';
	var $order = array('id_metode_dokumen', 'nama_metode_dokumen', 'id_metode_dokumen');

	private function _get_data_query()
	{
		$this->db->from($this->table);
		$i = 0;
		foreach ($this->order as $item) // looping awal
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

				if (count($this->order) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_metode_dokumen', 'DESC');
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
		$this->db->insert('tbl_metode_dokumen', $data);
		return $this->db->affected_rows();
	}

	public function getByid($id_metode_dokumen)
	{
		return $this->db->get_where($this->table, ['id_metode_dokumen' => $id_metode_dokumen])->row();
	}

	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete($id_metode_dokumen)
	{
		$this->db->delete($this->table, ['id_metode_dokumen' => $id_metode_dokumen]);
		return $this->db->affected_rows();
	}
}
