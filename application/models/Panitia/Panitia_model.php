<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Panitia_model extends CI_Model
{

	var $table = 'tbl_panitia';
	var $column_order = array('id_panitia', 'nama_panitia');
	var $column_order2 = array('id_pegawai', 'nama_pegawai');
	var $order = array('id_panitia', 'nama_panitia', 'nama_unit_kerja', 'id_panitia', 'id_panitia', 'id_panitia');
	var $order2 = array('id_pegawai', 'nama_pegawai', 'username', 'nip');
	var $column_order3 = array('id_pegawai', 'nama_pegawai');
	var $order3 = array('id_panitia', 'nama_panitia');


	private function _get_data_query()
	{
		$this->db->select('*,COUNT(id_pegawai) as anggota');
		$this->db->from('tbl_panitia');
		$this->db->join('tbl_provinsi', 'id_provinsi', 'left');
		$this->db->join('tbl_kabupaten', 'id_kabupaten', 'left');
		$this->db->join('tbl_detail_panitia', 'id_panitia', 'left');
		$this->db->join('tbl_pegawai', 'tbl_detail_panitia.id_pegawai2 = tbl_pegawai.id_pegawai', 'left');
		$this->db->join('tbl_unit_kerja', 'tbl_panitia.id_unit_kerja = tbl_unit_kerja.id_unit_kerja', 'left');
		$this->db->group_by('id_panitia');
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
			$this->db->order_by('id_panitia', 'DESC');
		}
	}
	// get datanya panitia
	public function getdatatable()
	{
		$this->_get_data_query();
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function count_filtered_data()
	{
		$this->_get_data_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	private function _get_data_query2($id_unit_kerja2)
	{
		$this->db->select('*,COUNT(id_pegawai) as anggota');
		$this->db->from('tbl_panitia');
		$this->db->join('tbl_provinsi', 'id_provinsi', 'left');
		$this->db->join('tbl_kabupaten', 'id_kabupaten', 'left');
		$this->db->join('tbl_detail_panitia', 'id_panitia', 'left');
		$this->db->join('tbl_pegawai', 'tbl_detail_panitia.id_pegawai2 = tbl_pegawai.id_pegawai', 'left');
		$this->db->join('tbl_unit_kerja', 'tbl_panitia.id_unit_kerja = tbl_unit_kerja.id_unit_kerja', 'left');
		$this->db->where('tbl_panitia.id_unit_kerja', $id_unit_kerja2);
		$this->db->group_by('id_panitia');

		if (isset($_POST['search']['value'])) {
			$this->db->like('tbl_panitia.nama_panitia', $_POST['search']['value']);
		}

		if (isset($_POST['order'])) {
			$this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_panitia', 'DESC');
		}
	}
	// get datanya panitia
	public function getdatatable2($id_unit_kerja2)
	{
		$this->_get_data_query2($id_unit_kerja2);
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function count_filtered_data2($id_unit_kerja2)
	{
		$this->_get_data_query2($id_unit_kerja2);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data2($id_unit_kerja2)
	{
		$this->db->from($this->table);
		$this->db->where('id_unit_kerja', $id_unit_kerja2);
		return $this->db->count_all_results();
	}
	var $anggota_panitia = array('id_pegawai', 'nama_pegawai', 'username',  'nip', 'jabatan', 'id_pegawai');

	private function _get_anggota_panitia($id_panitia)
	{
		$this->db->select('*');
		$this->db->from('tbl_detail_panitia');
		$this->db->join('tbl_panitia', 'id_panitia', 'left');
		$this->db->join('tbl_role_panitia', 'id_role_panitia', 'left');
		$this->db->join('tbl_pegawai', 'tbl_detail_panitia.id_pegawai2 = tbl_pegawai.id_pegawai', 'left');
		$this->db->where('id_panitia', $id_panitia);

		$i = 0;
		foreach ($this->anggota_panitia as $item) // looping awal
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

				if (count($this->anggota_panitia) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->anggota_panitia[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_pegawai', 'DESC');
		}
	}

	//get data anggotanya
	public function get_datatable_anggota($id_panitia)
	{
		$this->_get_anggota_panitia($id_panitia);
		if ($_POST['length'] != -3) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function count_filtered_data_anggota($id_panitia)
	{
		$this->_get_anggota_panitia($id_panitia);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_anggota($id_panitia)
	{
		$this->db->from('tbl_detail_panitia');
		$this->db->where('id_panitia', $id_panitia);
		return $this->db->count_all_results();
	}
	//end data anggotanya

	// tambah anggota baru

	var $anggota_pegawai_baru = array('id_pegawai', 'nama_pegawai', 'username',  'nip', 'jabatan', 'id_pegawai');
	private function _get_data_pegawai()
	{
		$this->db->select('*');
		$this->db->from('tbl_pegawai');
		$this->db->where('id_role', 3);
		$this->db->group_by('id_pegawai');
		$i = 0;
		foreach ($this->anggota_pegawai_baru as $item) // looping awal
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

				if (count($this->anggota_pegawai_baru) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}
		if (isset($_POST['order2'])) {
			$this->db->order_by($this->anggota_pegawai_baru[$_POST['order2']['0']['column2']], $_POST['order2']['0']['dir']);
		} else {
			$this->db->order_by('id_pegawai', 'DESC');
		}
	}

	public function get_datatable_pegawai()
	{
		$this->_get_data_pegawai();
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function count_filtered_data_pegawai()
	{
		$this->_get_data_pegawai();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data_pegawai()
	{
		$this->db->from('tbl_pegawai');
		return $this->db->count_all_results();
	}

	// end tambah anggota baru

	public function get_role_panitia()
	{
		$this->db->select('*');
		$this->db->from('tbl_role_panitia');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_detal_panitia($id_panitia, $id_role_panitia)
	{

		$this->db->select('*');
		$this->db->from('tbl_detail_panitia');
		$this->db->where('id_role_panitia', $id_role_panitia);
		$this->db->where('id_panitia', $id_panitia);
		$query = $this->db->get();
		return $query->row_array();
	}


	public function getById($id_panitia)
	{
		$query = $this->db->query("SELECT tbl_panitia.id_panitia,tbl_panitia.nama_panitia,tbl_panitia.nomor_sk,
		tbl_panitia.tahun,tbl_panitia.alamat_kantor,tbl_panitia.id_provinsi,tbl_panitia.id_kabupaten,
		tbl_panitia.id_area,tbl_panitia.id_unit_kerja,tbl_panitia.status_panitia,tbl_panitia.created_at,
		tbl_provinsi.nama_provinsi,tbl_kabupaten.nama_kabupaten,
		tbl_area.nama_area,tbl_unit_kerja.nama_unit_kerja
		FROM tbl_panitia 
		LEFT JOIN tbl_detail_panitia USING(id_panitia) 
		LEFT JOIN tbl_role_panitia USING(id_role_panitia)
		LEFT JOIN tbl_provinsi ON tbl_panitia.id_provinsi = tbl_provinsi.id_provinsi
		LEFT JOIN tbl_kabupaten ON tbl_panitia.id_kabupaten = tbl_kabupaten.id_kabupaten
		LEFT JOIN tbl_pegawai ON tbl_detail_panitia.id_pegawai2 = tbl_pegawai.id_pegawai
		LEFT JOIN tbl_unit_kerja AS tbl_unit_kerja ON tbl_unit_kerja.id_unit_kerja = tbl_panitia.id_unit_kerja
		LEFT JOIN tbl_area USING(id_area)
		WHERE id_panitia = $id_panitia");
		return $query->row_array();
	}

	public function getCekId($id_panitia)
	{
		$query = $this->db->query("SELECT * FROM tbl_detail_panitia
				LEFT JOIN tbl_pegawai ON tbl_detail_panitia.id_pegawai2 = tbl_pegawai.id_pegawai
		    WHERE id_panitia = $id_panitia");
		return $query->row_array();
	}


	public function getAnggota($id_panitia)
	{
		$query = $this->db->query("SELECT * FROM tbl_detail_panitia
											LEFT JOIN tbl_pegawai ON tbl_detail_panitia.id_pegawai2 = tbl_pegawai.id_pegawai WHERE id_panitia = $id_panitia");
		return $query->result_array();
	}

	public function getAnggotaRole($id_panitia)
	{
		$this->db->select('*');
		$this->db->from('tbl_detail_panitia');
		$this->db->where('id_panitia', $id_panitia);
		$query = $this->db->get();
		return $query->row_array();
	}



	public function getAnggotaDetail($id_detail_panitia)
	{
		$query = $this->db->query("SELECT * FROM tbl_detail_panitia
											LEFT JOIN tbl_pegawai ON tbl_detail_panitia.id_pegawai2 = tbl_pegawai.id_pegawai WHERE id_detail_panitia = $id_detail_panitia");
		return $query->row_array();
	}
	// function tambah
	function tambah($nama_panitia, $nomor_sk, $tahun, $alamat_kantor, $id_provinsi, $id_kabupaten, $id_area, $id_unit_kerja,/**/ $id_pegawai, $status_penetapan_langsung, $status_penunjukan_langsung_panitia, $status_tender_terbatas)
	{
		if ($status_penunjukan_langsung_panitia == 1) {
			$data  = array(
				'nama_panitia' => $nama_panitia,
				'nomor_sk' => $nomor_sk,
				'tahun' => $tahun,
				'alamat_kantor' => $alamat_kantor,
				'id_provinsi' => $id_provinsi,
				'id_kabupaten' => $id_kabupaten,
				'id_area' => $id_area,
				'id_unit_kerja' => $id_unit_kerja,
				'status_penunjukan_langsung_panitia' => $status_penunjukan_langsung_panitia
			);
		} else if ($status_penetapan_langsung == 1) {
			$data  = array(
				'nama_panitia' => $nama_panitia,
				'nomor_sk' => $nomor_sk,
				'tahun' => $tahun,
				'alamat_kantor' => $alamat_kantor,
				'id_provinsi' => $id_provinsi,
				'id_kabupaten' => $id_kabupaten,
				'id_area' => $id_area,
				'id_unit_kerja' => $id_unit_kerja,
				'status_penetapan_langsung' => $status_penetapan_langsung
			);
		} else if ($status_tender_terbatas == 1) {
			$data  = array(
				'nama_panitia' => $nama_panitia,
				'nomor_sk' => $nomor_sk,
				'tahun' => $tahun,
				'alamat_kantor' => $alamat_kantor,
				'id_provinsi' => $id_provinsi,
				'id_kabupaten' => $id_kabupaten,
				'id_area' => $id_area,
				'id_unit_kerja' => $id_unit_kerja,
				'status_tender_terbatas' => $status_tender_terbatas
			);
		} else {
			$data  = array(
				'nama_panitia' => $nama_panitia,
				'nomor_sk' => $nomor_sk,
				'tahun' => $tahun,
				'alamat_kantor' => $alamat_kantor,
				'id_provinsi' => $id_provinsi,
				'id_kabupaten' => $id_kabupaten,
				'id_area' => $id_area,
				'id_unit_kerja' => $id_unit_kerja,
			);
		}
		$this->db->insert('tbl_panitia', $data);
		//GET ID PACKAGE
		$package_id = $this->db->insert_id();
		$result = array();
		foreach ($id_pegawai as $key => $val) {
			$result[] = array(
				'id_panitia'   => $package_id,
				'id_pegawai2'   => $_POST['id_pegawai2'][$key],
			);
		}
		//MULTIPLE INSERT TO DETAIL TABLE
		$this->db->insert_batch('tbl_detail_panitia', $result);
	}

	public function update($data, $id_panitia)
	{
		$this->db->where('id_panitia', $id_panitia);
		$this->db->update('tbl_panitia', $data);
		return $this->db->affected_rows();
	}

	public function delete_anggota($id_detail_panitia)
	{
		$this->db->delete('tbl_detail_panitia', ['id_detail_panitia' => $id_detail_panitia]);
	}

	public function delete($id_panitia)
	{
		$this->db->delete('tbl_panitia', ['id_panitia' => $id_panitia]);
		$this->db->delete('tbl_detail_panitia', ['id_panitia' => $id_panitia]);
	}

	public function getArea()
	{
		$this->db->select('*');
		$this->db->from('tbl_area');
		$data = $this->db->get();
		return $data->result_array();
	}

	public function getByPanitia()
	{
		$query = $this->db->query("SELECT * FROM tbl_pegawai WHERE id_role = 3");
		return $query->result_array();
	}
	public function tesgetByPanitia()
	{
		$query = $this->db->query("SELECT * FROM tbl_pegawai WHERE id_role = 3");
		return $query->result_array();
	}

	public function update_role_anggota($where, $data)
	{
		$this->db->update('tbl_detail_panitia', $data, $where);
		return $this->db->affected_rows();
	}

	public function getRole()
	{
		$this->db->from('tbl_role_panitia');
		$data = $this->db->get();
		return $data->result_array();
	}

	public function tambahAnggota($data)
	{
		$this->db->insert('tbl_detail_panitia', $data);
	}

	public function cek_data($id_panitia)
	{
		$query = $this->db->query("SELECT id_pegawai2 FROM tbl_detail_panitia WHERE id_panitia = $id_panitia");
		return $query->result_array();
	}

	public function by_cek_status_panitia($id_panitia)
	{
		$this->db->from('tbl_panitia');
		$this->db->where('id_panitia', $id_panitia);
		$data = $this->db->get();
		return $data->row_array();
	}
}
