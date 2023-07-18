<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nib_model extends CI_Model
{
	var $table = 'tbl_nib';


	var $order = array('id_nib', 'nib', 'id_nib');
	private function _get_data_query()
	{
		$this->db->from($this->table);
		$this->db->order_by('id_nib', 'ASC');
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
			$this->db->order_by('id_nib', 'DESC');
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
		$this->db->insert('tbl_nib', $data);
		return $this->db->affected_rows();
	}

	public function getByid($id_nib)
	{
		return $this->db->get_where($this->table, ['id_nib' => $id_nib])->row();
	}

	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete($id_nib)
	{
		$this->db->delete($this->table, ['id_nib' => $id_nib]);
		return $this->db->affected_rows();
	}

	// ==== batas subkategori 1 =======

	public function get_kategori_id($id_nib)
	{
		$query = $this->db->query("SELECT * FROM tbl_nib WHERE id_nib = $id_nib");
		return $query->row_array();
	}


	var $order3 = array('id_sub_kategori', 'sub_kategori_nib', 'id_sub_kategori');

	private function _get_data_query2($id_nib)
	{
		$this->db->from('tbl_nib_sub_kategori');
		$this->db->where('id_nib', $id_nib);
		$this->db->order_by('id_sub_kategori', 'ASC');
		$i = 0;
		foreach ($this->order3 as $item) // looping awal
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

				if (count($this->order3) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->order3[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_sub_kategori', 'DESC');
		}
	}

	public function getdatatable2($id_nib) //nam[ilin data pake ini
	{
		$this->_get_data_query2($id_nib); //ambil data dari get yg di atas
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_data2()
	{
		$this->_get_data_query(); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data2()
	{
		$this->db->from('tbl_nib_sub_kategori');
		return $this->db->count_all_results();
	}

	public function create2($data)
	{
		$this->db->insert('tbl_nib_sub_kategori', $data);
		return $this->db->affected_rows();
	}

	public function getByid2($id_nib)
	{
		return $this->db->get_where('tbl_nib_sub_kategori', ['id_sub_kategori' => $id_nib])->row();
	}

	public function update2($where, $data)
	{
		$this->db->update('tbl_nib_sub_kategori', $data, $where);
		return $this->db->affected_rows();
	}

	public function delete2($id_nib)
	{
		$this->db->delete('tbl_nib_sub_kategori', ['id_sub_kategori' => $id_nib]);
		return $this->db->affected_rows();
	}

	// ==== end subkategori 1 =======


	// ==== batas subkategori 2 =======

	public function get_kategori_id2($id_nib)
	{
		$query = $this->db->query("SELECT * FROM tbl_nib_sub_kategori WHERE id_sub_kategori = $id_nib");
		return $query->row_array();
	}

	var $order5 = array('id_sub_kategori2', 'sub_kategori_nib2', 'id_sub_kategori2');

	private function _get_data_query3($id_nib)
	{
		$this->db->from('tbl_nib_sub_kategori2');
		$this->db->where('id_sub_kategori', $id_nib);
		$this->db->order_by('id_sub_kategori2', 'ASC');
		$i = 0;
		foreach ($this->order5 as $item) // looping awal
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

				if (count($this->order5) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->order5[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_sub_kategori2', 'DESC');
		}
	}

	public function getdatatable3($id_nib) //nam[ilin data pake ini
	{
		$this->_get_data_query3($id_nib); //ambil data dari get yg di atas
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_data3()
	{
		$this->_get_data_query(); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data3()
	{
		$this->db->from('tbl_nib_sub_kategori2');
		return $this->db->count_all_results();
	}

	public function create3($data)
	{
		$this->db->insert('tbl_nib_sub_kategori2', $data);
		return $this->db->affected_rows();
	}

	public function getByid3($id_nib)
	{
		return $this->db->get_where('tbl_nib_sub_kategori2', ['id_sub_kategori2' => $id_nib])->row();
	}

	public function update3($where, $data)
	{
		$this->db->update('tbl_nib_sub_kategori2', $data, $where);
		return $this->db->affected_rows();
	}

	public function delete3($id_nib)
	{
		$this->db->delete('tbl_nib_sub_kategori2', ['id_sub_kategori2' => $id_nib]);
		return $this->db->affected_rows();
	}

	// ==== end subkategori 2 =======

	// ==== batas subkategori 3 =======

	public function get_kategori_id3($id_nib)
	{
		$query = $this->db->query("SELECT * FROM tbl_nib_sub_kategori2 WHERE id_sub_kategori2 = $id_nib");
		return $query->row_array();
	}

	var $order6 = array('id_sub_kategori3', 'sub_kategori_nib3', 'id_sub_kategori3');

	private function _get_data_query4($id_nib)
	{
		$this->db->from('tbl_nib_sub_kategori3');
		$this->db->where('id_sub_kategori2', $id_nib);
		$this->db->order_by('id_sub_kategori3', 'ASC');
		$i = 0;
		foreach ($this->order6 as $item) // looping awal
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

				if (count($this->order6) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->order6[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_sub_kategori3', 'DESC');
		}
	}

	public function getdatatable4($id_nib) //nam[ilin data pake ini
	{
		$this->_get_data_query4($id_nib); //ambil data dari get yg di atas
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_data4()
	{
		$this->_get_data_query(); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data4()
	{
		$this->db->from('tbl_nib_sub_kategori3');
		return $this->db->count_all_results();
	}

	public function create4($data)
	{
		$this->db->insert('tbl_nib_sub_kategori3', $data);
		return $this->db->affected_rows();
	}

	public function getByid4($id_nib)
	{
		return $this->db->get_where('tbl_nib_sub_kategori3', ['id_sub_kategori3' => $id_nib])->row();
	}

	public function update4($where, $data)
	{
		$this->db->update('tbl_nib_sub_kategori3', $data, $where);
		return $this->db->affected_rows();
	}

	public function delete4($id_nib)
	{
		$this->db->delete('tbl_nib_sub_kategori3', ['id_sub_kategori3' => $id_nib]);
		return $this->db->affected_rows();
	}

	// ==== end subkategori 3 =======


	// ==== batas subkategori 4 =======

	public function get_kategori_id4($id_nib)
	{
		$query = $this->db->query("SELECT * FROM tbl_nib_sub_kategori3 WHERE id_sub_kategori3 = $id_nib");
		return $query->row_array();
	}

	var $order7 = array('id_sub_kategori4', 'sub_kategori_nib4', 'id_sub_kategori4');

	private function _get_data_query5($id_nib)
	{
		$this->db->from('tbl_nib_sub_kategori4');
		$this->db->where('id_sub_kategori3', $id_nib);
		$this->db->order_by('id_sub_kategori4', 'ASC');
		$i = 0;
		foreach ($this->order7 as $item) // looping awal
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

				if (count($this->order7) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->order7[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_sub_kategori4', 'DESC');
		}
	}

	public function getdatatable5($id_nib) //nam[ilin data pake ini
	{
		$this->_get_data_query5($id_nib); //ambil data dari get yg di atas
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_data5()
	{
		$this->_get_data_query(); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data5()
	{
		$this->db->from('tbl_nib_sub_kategori4');
		return $this->db->count_all_results();
	}

	public function create5($data)
	{
		$this->db->insert('tbl_nib_sub_kategori4', $data);
		return $this->db->affected_rows();
	}

	public function getByid5($id_nib)
	{
		return $this->db->get_where('tbl_nib_sub_kategori4', ['id_sub_kategori4' => $id_nib])->row();
	}

	public function update5($where, $data)
	{
		$this->db->update('tbl_nib_sub_kategori4', $data, $where);
		return $this->db->affected_rows();
	}

	public function delete5($id_nib)
	{
		$this->db->delete('tbl_nib_sub_kategori4', ['id_sub_kategori4' => $id_nib]);
		return $this->db->affected_rows();
	}

	// ==== end subkategori 4 =======

}
