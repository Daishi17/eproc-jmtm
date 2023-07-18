<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_tender_model extends CI_Model
{
	var $table = 'tbl_jadwal_tender';
	var $colum_order = array('id_jadwal_tender', 'nama_jadwal_tender');
	var $order = array('id_jadwal_tender', 'nama_jadwal_tender');

	private function _get_data_query()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('id_kualifikasi', 12);
		if (isset($_POST['search']['value'])) {
			$this->db->like('nama_jadwal_tender', $_POST['search']['value']);
			// $this->db->or_like('data_kerja', $_POST['search']['value']);
			// $this->db->or_like('jabatan', $_POST['search']['value']);
			// $this->db->or_like('status', $_POST['search']['value']);
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_jadwal_tender', 'DESC');
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
		$this->db->insert('tbl_jadwal_tender', $data);
		return $this->db->affected_rows();
	}

	public function getByid($id_jadwal_tender)
	{
		return $this->db->get_where($this->table, ['id_jadwal_tender' => $id_jadwal_tender])->row();
	}

	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete($id_jadwal_tender)
	{
		$this->db->delete($this->table, ['id_jadwal_tender' => $id_jadwal_tender]);
		return $this->db->affected_rows();
	}

	// untuk pascakualifikasi

	private function _get_data_query2()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('id_kualifikasi', 10);
		if (isset($_POST['search']['value'])) {
			$this->db->like('nama_jadwal_tender', $_POST['search']['value']);
			// $this->db->or_like('data_kerja', $_POST['search']['value']);
			// $this->db->or_like('jabatan', $_POST['search']['value']);
			// $this->db->or_like('status', $_POST['search']['value']);
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_jadwal_tender', 'DESC');
		}
	}

	// 2
	public function getdatatable2() //nam[ilin data pake ini
	{
		$this->_get_data_query2(); //ambil data dari get yg di atas
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_data2()
	{
		$this->_get_data_query2(); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data2()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function create2($data)
	{
		$this->db->insert('tbl_jadwal_tender', $data);
		return $this->db->affected_rows();
	}

	public function getByid2($id_jadwal_tender)
	{
		return $this->db->get_where($this->table, ['id_jadwal_tender' => $id_jadwal_tender])->row();
	}

	public function update2($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete2($id_jadwal_tender)
	{
		$this->db->delete($this->table, ['id_jadwal_tender' => $id_jadwal_tender]);
		return $this->db->affected_rows();
	}
	// end 2

	//3
	private function _get_data_query3()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('id_kualifikasi', 13);
		if (isset($_POST['search']['value'])) {
			$this->db->like('nama_jadwal_tender', $_POST['search']['value']);
			// $this->db->or_like('data_kerja', $_POST['search']['value']);
			// $this->db->or_like('jabatan', $_POST['search']['value']);
			// $this->db->or_like('status', $_POST['search']['value']);
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_jadwal_tender', 'DESC');
		}
	}

	public function getdatatable3() //nam[ilin data pake ini
	{
		$this->_get_data_query3(); //ambil data dari get yg di atas
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_data3()
	{
		$this->_get_data_query3(); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data3()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function create3($data)
	{
		$this->db->insert('tbl_jadwal_tender', $data);
		return $this->db->affected_rows();
	}

	public function getByid3($id_jadwal_tender)
	{
		return $this->db->get_where($this->table, ['id_jadwal_tender' => $id_jadwal_tender])->row();
	}

	public function update3($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete3($id_jadwal_tender)
	{
		$this->db->delete($this->table, ['id_jadwal_tender' => $id_jadwal_tender]);
		return $this->db->affected_rows();
	}

	//end 3

	//4
	private function _get_data_query4()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('id_kualifikasi', 4);
		if (isset($_POST['search']['value'])) {
			$this->db->like('nama_jadwal_tender', $_POST['search']['value']);
			// $this->db->or_like('data_kerja', $_POST['search']['value']);
			// $this->db->or_like('jabatan', $_POST['search']['value']);
			// $this->db->or_like('status', $_POST['search']['value']);
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_jadwal_tender', 'DESC');
		}
	}

	public function getdatatable4() //nam[ilin data pake ini
	{
		$this->_get_data_query4(); //ambil data dari get yg di atas
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_data4()
	{
		$this->_get_data_query4(); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data4()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function create4($data)
	{
		$this->db->insert('tbl_jadwal_tender', $data);
		return $this->db->affected_rows();
	}

	public function getByid4($id_jadwal_tender)
	{
		return $this->db->get_where($this->table, ['id_jadwal_tender' => $id_jadwal_tender])->row();
	}

	public function update4($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete4($id_jadwal_tender)
	{
		$this->db->delete($this->table, ['id_jadwal_tender' => $id_jadwal_tender]);
		return $this->db->affected_rows();
	}

	//end 4

	//5
	private function _get_data_query5()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('id_kualifikasi', 6);
		if (isset($_POST['search']['value'])) {
			$this->db->like('nama_jadwal_tender', $_POST['search']['value']);
			// $this->db->or_like('data_kerja', $_POST['search']['value']);
			// $this->db->or_like('jabatan', $_POST['search']['value']);
			// $this->db->or_like('status', $_POST['search']['value']);
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_jadwal_tender', 'DESC');
		}
	}
	public function getdatatable5() //nam[ilin data pake ini
	{
		$this->_get_data_query5(); //ambil data dari get yg di atas
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_data5()
	{
		$this->_get_data_query5(); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data5()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function create5($data)
	{
		$this->db->insert('tbl_jadwal_tender', $data);
		return $this->db->affected_rows();
	}

	public function getByid5($id_jadwal_tender)
	{
		return $this->db->get_where($this->table, ['id_jadwal_tender' => $id_jadwal_tender])->row();
	}

	public function update5($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete5($id_jadwal_tender)
	{
		$this->db->delete($this->table, ['id_jadwal_tender' => $id_jadwal_tender]);
		return $this->db->affected_rows();
	}
	//end 5

	//6
	private function _get_data_query6()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('id_kualifikasi', 7);
		if (isset($_POST['search']['value'])) {
			$this->db->like('nama_jadwal_tender', $_POST['search']['value']);
			// $this->db->or_like('data_kerja', $_POST['search']['value']);
			// $this->db->or_like('jabatan', $_POST['search']['value']);
			// $this->db->or_like('status', $_POST['search']['value']);
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_jadwal_tender', 'DESC');
		}
	}
	public function getdatatable6() //nam[ilin data pake ini
	{
		$this->_get_data_query6(); //ambil data dari get yg di atas
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_data6()
	{
		$this->_get_data_query5(); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data6()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function create6($data)
	{
		$this->db->insert('tbl_jadwal_tender', $data);
		return $this->db->affected_rows();
	}

	public function getByid6($id_jadwal_tender)
	{
		return $this->db->get_where($this->table, ['id_jadwal_tender' => $id_jadwal_tender])->row();
	}

	public function update6($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete6($id_jadwal_tender)
	{
		$this->db->delete($this->table, ['id_jadwal_tender' => $id_jadwal_tender]);
		return $this->db->affected_rows();
	}
	//6

	//7
	private function _get_data_query7()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('id_kualifikasi', 11);
		if (isset($_POST['search']['value'])) {
			$this->db->like('nama_jadwal_tender', $_POST['search']['value']);
			// $this->db->or_like('data_kerja', $_POST['search']['value']);
			// $this->db->or_like('jabatan', $_POST['search']['value']);
			// $this->db->or_like('status', $_POST['search']['value']);
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_jadwal_tender', 'DESC');
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
		$this->db->insert('tbl_jadwal_tender', $data);
		return $this->db->affected_rows();
	}

	public function getByid7($id_jadwal_tender)
	{
		return $this->db->get_where($this->table, ['id_jadwal_tender' => $id_jadwal_tender])->row();
	}

	public function update7($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete7($id_jadwal_tender)
	{
		$this->db->delete($this->table, ['id_jadwal_tender' => $id_jadwal_tender]);
		return $this->db->affected_rows();
	}
	//end7

	//8
	private function _get_data_query8()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('id_kualifikasi', 14);
		if (isset($_POST['search']['value'])) {
			$this->db->like('nama_jadwal_tender', $_POST['search']['value']);
			// $this->db->or_like('data_kerja', $_POST['search']['value']);
			// $this->db->or_like('jabatan', $_POST['search']['value']);
			// $this->db->or_like('status', $_POST['search']['value']);
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_jadwal_tender', 'DESC');
		}
	}
	public function getdatatable8() //nam[ilin data pake ini
	{
		$this->_get_data_query8(); //ambil data dari get yg di atas
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_data8()
	{
		$this->_get_data_query5(); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data8()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function create8($data)
	{
		$this->db->insert('tbl_jadwal_tender', $data);
		return $this->db->affected_rows();
	}

	public function getByid8($id_jadwal_tender)
	{
		return $this->db->get_where($this->table, ['id_jadwal_tender' => $id_jadwal_tender])->row();
	}

	public function update8($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete8($id_jadwal_tender)
	{
		$this->db->delete($this->table, ['id_jadwal_tender' => $id_jadwal_tender]);
		return $this->db->affected_rows();
	}
	//end 8

	//9
	private function _get_data_query9()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('id_kualifikasi', 15);
		if (isset($_POST['search']['value'])) {
			$this->db->like('nama_jadwal_tender', $_POST['search']['value']);
			// $this->db->or_like('data_kerja', $_POST['search']['value']);
			// $this->db->or_like('jabatan', $_POST['search']['value']);
			// $this->db->or_like('status', $_POST['search']['value']);
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_jadwal_tender', 'DESC');
		}
	}
	public function getdatatable9() //nam[ilin data pake ini
	{
		$this->_get_data_query9(); //ambil data dari get yg di atas
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_data9()
	{
		$this->_get_data_query5(); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data9()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function create9($data)
	{
		$this->db->insert('tbl_jadwal_tender', $data);
		return $this->db->affected_rows();
	}

	public function getByid9($id_jadwal_tender)
	{
		return $this->db->get_where($this->table, ['id_jadwal_tender' => $id_jadwal_tender])->row();
	}

	public function update9($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete9($id_jadwal_tender)
	{
		$this->db->delete($this->table, ['id_jadwal_tender' => $id_jadwal_tender]);
		return $this->db->affected_rows();
	}
	//end 9
}
