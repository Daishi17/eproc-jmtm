<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sub_agency_model extends CI_Model
{
	var $table = 'tbl_pegawai';
	var $order = array('id_pegawai', 'nama_pegawai', 'nip', 'nama_unit_kerja', 'alamat', 'telepon', 'tanggal_pendaftaran', 'no_sk', 'id_pegawai');
	var $column_search = array('id_pegawai', 'nama_pegawai', 'nama_unit_kerja', 'alamat', 'tanggal_pendaftaran', 'telepon', 'no_sk');

	private function _get_data_query()
	{
		$i = 0;
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('tbl_role', 'tbl_role.id_role = tbl_pegawai.id_role', 'left');
		$this->db->join('tbl_unit_kerja', 'tbl_unit_kerja.id_unit_kerja = tbl_pegawai.id_unit_kerja2', 'left');
		$this->db->join('tbl_provinsi', 'tbl_provinsi.id_provinsi = tbl_pegawai.id_provinsi', 'left');
		$this->db->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten = tbl_pegawai.id_kabupaten', 'left');
		$this->db->where('tbl_role.id_role', 2);
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
		$this->db->insert('tbl_pegawai', $data);
		return $this->db->affected_rows();
	}
	public function getAllByIdAgency($id_pegawai)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('tbl_role', 'tbl_role.id_role = tbl_pegawai.id_role', 'left');
		$this->db->join('tbl_unit_kerja', 'tbl_unit_kerja.id_unit_kerja = tbl_pegawai.id_unit_kerja2', 'left');
		$this->db->join('tbl_provinsi', 'tbl_provinsi.id_provinsi = tbl_pegawai.id_provinsi', 'left');
		$this->db->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten = tbl_pegawai.id_kabupaten', 'left');
		$this->db->where('tbl_pegawai.id_pegawai', $id_pegawai);
		$query = $this->db->get();
		return $query->row_array();
	}
	public function getByid($id_pegawai)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('tbl_role', 'tbl_role.id_role = tbl_pegawai.id_role', 'left');
		$this->db->join('tbl_unit_kerja', 'tbl_unit_kerja.id_unit_kerja = tbl_pegawai.id_unit_kerja2', 'left');
		$this->db->join('tbl_provinsi', 'tbl_provinsi.id_provinsi = tbl_pegawai.id_provinsi', 'left');
		$this->db->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten = tbl_pegawai.id_kabupaten', 'left');
		$this->db->where('tbl_pegawai.id_pegawai', $id_pegawai);
		$query = $this->db->get();
		return $query->row();
	}
	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}
	public function delete($id_pegawai)
	{
		$this->db->delete($this->table, ['id_pegawai' => $id_pegawai]);
		return $this->db->affected_rows();
	}

	// get pegawai
	public function getPegawai()
	{
		$this->db->select('*');
		$this->db->from('tbl_pegawai');
		$this->db->join('tbl_role', 'tbl_pegawai.id_role = tbl_role.id_role', 'left');
		$this->db->where('tbl_pegawai.id_role', 2);
		$this->db->where('tbl_pegawai.status', 1);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getByid2($id_pegawai)
	{
		return $this->db->get_where($this->table, ['id_pegawai' => $id_pegawai])->row_array();
	}

	public function updatepassword($data, $id_pegawai)
	{
		$this->db->where('id_pegawai', $id_pegawai);
		$this->db->update('tbl_pegawai', $data);
	}
}
