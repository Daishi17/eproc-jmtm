<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rup_model extends CI_Model
{
	var $table = 'tbl_paket';
	var $order = array('id_paket', 'kode_rup_paket', 'nama_paket', 'nama_unit_kerja', 'program_paket', 'nama_jenis_pengadaan', 'nama_metode_pemilihan', 'keterangan', 'nama_jenis_anggaran', 'id_paket', 'id_paket');
	var $searcrh_paket = array('id_paket', 'kode_rup_paket', 'nama_paket', 'nama_unit_kerja', 'program_paket', 'nama_jenis_pengadaan', 'nama_metode_pemilihan', 'keterangan', 'nama_jenis_anggaran', 'id_paket', 'id_paket');

	// ini untuk admin
	private function _get_data_query()
	{
		$i = 0;
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('tbl_tahun_anggaran', 'tbl_tahun_anggaran.id_tahun_anggaran = tbl_paket.id_tahun_anggaran', 'left');
		$this->db->join('tbl_unit_kerja', 'tbl_unit_kerja.id_unit_kerja = tbl_paket.id_unit_kerja', 'left');
		$this->db->join('tbl_sub_agency', 'tbl_sub_agency.id_sub_agency = tbl_paket.id_sub_agency', 'left');
		$this->db->join('tbl_panitia', 'tbl_panitia.id_panitia = tbl_paket.id_panitia', 'left');
		$this->db->join('tbl_jenis_anggaran', 'tbl_jenis_anggaran.id_jenis_anggaran = tbl_paket.id_jenis_anggaran', 'left');
		$this->db->join('tbl_jenis_pengadaan', 'tbl_jenis_pengadaan.id_jenis_pengadaan = tbl_paket.id_jenis_pengadaan', 'left');
		$this->db->join('tbl_metode_pemilihan', 'tbl_metode_pemilihan.id_metode_pemilihan = tbl_paket.id_metode_pemilihan', 'left');
		$this->db->join('tbl_produk_dalam_luar_negri', 'tbl_produk_dalam_luar_negri.id_produk_dl_negri = tbl_paket.id_produk_dl_negri', 'left');
		$this->db->where('tbl_paket.status_soft_delete =', NULL);
		$this->db->or_where('tbl_paket.status_soft_delete =', 0);
		if (isset($_POST['id_unit_kerja'], $_POST['id_jenis_pengadaan']) && $_POST['id_unit_kerja'] != '' && $_POST['id_jenis_pengadaan'] != '') {
			$this->db->like('tbl_paket.id_unit_kerja', $_POST['id_unit_kerja']);
			$this->db->like('tbl_paket.id_jenis_pengadaan', $_POST['id_jenis_pengadaan']);
		}
		foreach ($this->searcrh_paket as $item) // looping awal
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

				if (count($this->searcrh_paket) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_paket', 'DESC');
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

	// ini untuk agency
	private function _get_data_query2($role_agency, $area_agency)
	{
		$i = 0;
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('tbl_tahun_anggaran', 'tbl_tahun_anggaran.id_tahun_anggaran = tbl_paket.id_tahun_anggaran', 'left');
		$this->db->join('tbl_unit_kerja', 'tbl_unit_kerja.id_unit_kerja = tbl_paket.id_unit_kerja', 'left');
		$this->db->join('tbl_sub_agency', 'tbl_sub_agency.id_sub_agency = tbl_paket.id_sub_agency', 'left');
		$this->db->join('tbl_panitia', 'tbl_panitia.id_panitia = tbl_paket.id_panitia', 'left');
		$this->db->join('tbl_jenis_anggaran', 'tbl_jenis_anggaran.id_jenis_anggaran = tbl_paket.id_jenis_anggaran', 'left');
		$this->db->join('tbl_jenis_pengadaan', 'tbl_jenis_pengadaan.id_jenis_pengadaan = tbl_paket.id_jenis_pengadaan', 'left');
		$this->db->join('tbl_metode_pemilihan', 'tbl_metode_pemilihan.id_metode_pemilihan = tbl_paket.id_metode_pemilihan', 'left');
		$this->db->join('tbl_produk_dalam_luar_negri', 'tbl_produk_dalam_luar_negri.id_produk_dl_negri = tbl_paket.id_produk_dl_negri', 'left');
		$this->db->where('tbl_paket.id_pegawai', $role_agency);
		$this->db->where('tbl_unit_kerja.id_unit_kerja', $area_agency);
		if (isset($_POST['id_unit_kerja'], $_POST['id_jenis_pengadaan']) && $_POST['id_unit_kerja'] != '' && $_POST['id_jenis_pengadaan'] != '') {
			$this->db->like('tbl_paket.id_unit_kerja', $_POST['id_unit_kerja']);
			$this->db->like('tbl_paket.id_jenis_pengadaan', $_POST['id_jenis_pengadaan']);
		}
		foreach ($this->searcrh_paket as $item) // looping awal
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

				if (count($this->searcrh_paket) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_paket', 'DESC');
		}
	}

	public function getdatatable2($role_agency, $area_agency) //nam[ilin data pake ini
	{
		$this->_get_data_query2($role_agency, $area_agency); //ambil data dari get yg di atas
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_data2($role_agency, $area_agency)
	{
		$this->_get_data_query2($role_agency, $area_agency); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data2()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}


	public function create($data)
	{
		$this->db->insert('tbl_paket', $data);
		return $this->db->affected_rows();
	}

	public function getByid($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->join('tbl_tahun_anggaran', 'tbl_tahun_anggaran.id_tahun_anggaran = tbl_paket.id_tahun_anggaran', 'left');
		$this->db->join('tbl_jenis_anggaran', 'tbl_jenis_anggaran.id_jenis_anggaran = tbl_paket.id_jenis_anggaran', 'left');
		$this->db->join('tbl_unit_kerja', 'tbl_unit_kerja.id_unit_kerja = tbl_paket.id_unit_kerja', 'left');
		$this->db->join('tbl_jenis_pengadaan', 'tbl_jenis_pengadaan.id_jenis_pengadaan = tbl_paket.id_jenis_pengadaan', 'left');
		$this->db->join('tbl_metode_pemilihan', 'tbl_metode_pemilihan.id_metode_pemilihan = tbl_paket.id_metode_pemilihan', 'left');
		$this->db->join('tbl_produk_dalam_luar_negri', 'tbl_produk_dalam_luar_negri.id_produk_dl_negri = tbl_paket.id_produk_dl_negri', 'left');
		$this->db->join('tbl_sub_agency', 'tbl_sub_agency.id_sub_agency = tbl_paket.id_sub_agency', 'left');
		$this->db->join('tbl_panitia', 'tbl_panitia.id_panitia = tbl_paket.id_panitia', 'left');
		$this->db->where('id_paket', $id_paket);
		$query = $this->db->get();
		return $query->row_array();
	}
	public function paksa_unit_kerja($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_paket', $id_paket);
		$query = $this->db->get();
		return $query->row_array();
	}
	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function softdeletedata($id_paket, $data)
	{
		$this->db->where('id_paket', $id_paket);
		$this->db->update('tbl_paket', $data);
		$this->db->affected_rows();


		// $this->db->delete($this->table, ['id_paket' => $id_paket]);
		// $this->db->delete('tbl_lokasi_pekerjaan', ['id_paket' => $id_paket]);
		// $this->db->delete('tbl_sumber_dana', ['id_paket' => $id_paket]);
		// $this->db->delete('tbl_jadwal_pemilihan', ['id_paket' => $id_paket]);
	}

	public function getAllPaket()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->join('tbl_tahun_anggaran', 'tbl_tahun_anggaran.id_tahun_anggaran = tbl_paket.id_tahun_anggaran', 'left');
		$this->db->join('tbl_jenis_anggaran', 'tbl_jenis_anggaran.id_jenis_anggaran = tbl_paket.id_jenis_anggaran', 'left');
		$this->db->join('tbl_unit_kerja', 'tbl_unit_kerja.id_unit_kerja = tbl_paket.id_unit_kerja', 'left');
		$this->db->join('tbl_jenis_pengadaan', 'tbl_jenis_pengadaan.id_jenis_pengadaan = tbl_paket.id_jenis_pengadaan', 'left');
		$this->db->join('tbl_metode_pemilihan', 'tbl_metode_pemilihan.id_metode_pemilihan = tbl_paket.id_metode_pemilihan', 'left');
		$this->db->join('tbl_produk_dalam_luar_negri', 'tbl_produk_dalam_luar_negri.id_produk_dl_negri = tbl_paket.id_produk_dl_negri', 'left');
		$data = $this->db->get();
		return $data->result_array();
	}


	// get_devisi
	public function get_devisi()
	{

		$this->db->select('*');
		$this->db->from('tbl_unit_kerja');
		$this->db->where('id_unit_kerja !=',70);
		$data = $this->db->get();
		return $data->result_array();

	}

	//  get_metode_pemilihan
	public function get_metode_pemilihan()
	{
		$query = $this->db->query("SELECT * FROM tbl_metode_pemilihan");
		return $query->result_array();
	}

	//  get_jenis_pengadaan
	public function get_jenis_pengadaan()
	{
		$query = $this->db->query("SELECT * FROM tbl_jenis_pengadaan");
		return $query->result_array();
	}

	// get_produk_dalam_negri
	public function get_produk_dalam_negri()
	{
		$query = $this->db->query("SELECT * FROM tbl_produk_dalam_luar_negri");
		return $query->result_array();
	}
	// get jenis anggaran
	public function get_jenis_anggaran()
	{
		$query = $this->db->query("SELECT * FROM tbl_jenis_anggaran");
		return $query->result_array();
	}
	// ===================untuk detail========

	// gey byid sumber dana
	public function getSumberDana($id_paket)
	{
		$this->db->select('*');
		$this->db->where('id_paket', $id_paket);
		$query = $this->db->get('tbl_sumber_dana');
		return $query->result();
	}
	// end get byid sumber dana

	//get jadwal pemilihan 
	public function getJadwalPemilihan($id_paket)
	{
		$this->db->select('*');
		$this->db->where('id_paket', $id_paket);
		$query = $this->db->get('tbl_jadwal_pemilihan');
		return $query->result_array();
	}
	// end get byid jadwal pemilihan

	// gey byid lokasi Pekerjaan
	public function getLokasiPekerjaan($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_lokasi_pekerjaan');
		$this->db->join('tbl_provinsi', 'tbl_provinsi.id_provinsi = tbl_lokasi_pekerjaan.id_provinsi', 'left');
		$this->db->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten = tbl_lokasi_pekerjaan.id_kabupaten', 'left');
		$this->db->where('id_paket', $id_paket);
		$query = $this->db->get();
		return $query->result();
	}

	// ===================================BATASS========================================
	// ========
	// =============================LOKASI PEKERJAAN ===================================
	// ========

	var $order_lokasi = array('id_lokasi_pekerjaan', 'nama_provinsi', 'nama_kabupaten', 'detail_lokasi', 'id_lokasi_pekerjaan');
	var $search_lokasi = array('id_lokasi_pekerjaan', 'nama_provinsi', 'nama_kabupaten', 'detail_lokasi', 'id_lokasi_pekerjaan');
	private function _getLokasiPekerjaan($id_paket)
	{

		$this->db->select('*');
		$this->db->from('tbl_lokasi_pekerjaan');
		$this->db->join('tbl_provinsi', 'tbl_provinsi.id_provinsi = tbl_lokasi_pekerjaan.id_provinsi', 'left');
		$this->db->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten = tbl_lokasi_pekerjaan.id_kabupaten', 'left');
		$this->db->where('id_paket', $id_paket);
		$i = 0;
		foreach ($this->search_lokasi as $item) // looping awal
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

				if (count($this->search_lokasi) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->order_lokasi[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_lokasi_pekerjaan', 'DESC');
		}
	}
	public function getdatatablelokasi($id_paket) //nam[ilin data pake ini
	{
		$this->_getLokasiPekerjaan($id_paket); //ambil data dari get yg di atas
		if ($_POST['length'] != -3) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_datalokasi($id_paket)
	{
		$this->_getLokasiPekerjaan($id_paket); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_datalokasi($id_paket)
	{
		$this->db->from('tbl_lokasi_pekerjaan');
		$this->db->where('id_paket', $id_paket);
		return $this->db->count_all_results();
	}

	// get lokasi by id
	public function getLokasiPekerjaanbyid($id_lokasi_pekerjaan)
	{
		$this->db->select('*');
		$this->db->from('tbl_lokasi_pekerjaan');
		$this->db->join('tbl_provinsi', 'tbl_provinsi.id_provinsi = tbl_lokasi_pekerjaan.id_provinsi', 'left');
		$this->db->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten = tbl_lokasi_pekerjaan.id_kabupaten', 'left');
		$this->db->where('id_lokasi_pekerjaan', $id_lokasi_pekerjaan);
		$query = $this->db->get();
		return $query->row_array();
	}
	// TAMBAH LOKASI
	public function create_lokasi_kerja($data)
	{
		$this->db->insert('tbl_lokasi_pekerjaan', $data);
	}
	// EDIT LOKASI
	public function updatelokasi_pekerjaan($where, $data)
	{
		$this->db->update('tbl_lokasi_pekerjaan', $data, $where);
		return $this->db->affected_rows();
	}
	// HAPUS LOKASI PEKERJAAN
	public function deletedata_lokasi_pekerjaan($id_lokasi_pekerjaan)
	{
		$this->db->delete('tbl_lokasi_pekerjaan', ['id_lokasi_pekerjaan' => $id_lokasi_pekerjaan]);
	}


	// ========
	// =============================END LOKASI PEKERJAAN ===================================
	// ========

	// =====================================BATASS==========================================
	// ========
	// ==================================SUMBER DANA =======================================
	// ========

	var $order_sumberdana = array('id_sumber_dana', 'asal_dana', 'hps', 'tahun_anggaran', 'id_sumber_dana');
	var $search_sumber = array('id_sumber_dana', 'asal_dana', 'hps', 'tahun_anggaran', 'id_sumber_dana');
	private function _getSumberdana($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_sumber_dana');
		$this->db->where('id_paket', $id_paket);
		$i = 0;
		foreach ($this->search_sumber as $item) // looping awal
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

				if (count($this->search_sumber) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->order_sumberdana[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_sumber_dana', 'DESC');
		}
	}
	public function getdatatablesumberdana($id_paket) //nam[ilin data pake ini
	{
		$this->_getSumberdana($id_paket); //ambil data dari get yg di atas
		if ($_POST['length'] != -3) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_sumberdana($id_paket)
	{
		$this->_getSumberdana($id_paket); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function totalhps($id_paket)
	{
		$this->db->select_sum('hps');
		$this->db->where('id_paket', $id_paket);
		$this->db->from('tbl_sumber_dana');
		$query = $this->db->get();
		return $query->row_array();
	}

	public function count_all_datasumberdana($id_paket)
	{
		$this->db->from('tbl_sumber_dana');
		$this->db->where('id_paket', $id_paket);
		return $this->db->count_all_results();
	}
	// get Sumberdana by id
	public function getSumberDanabyid($id_sumber_dana)
	{
		$this->db->select('*');
		$this->db->from('tbl_sumber_dana');
		$this->db->where('id_sumber_dana', $id_sumber_dana);
		$query = $this->db->get();
		return $query->row_array();
	}

	// tambah SUMBERDANA
	public function create_sumberdana($data)
	{
		$this->db->insert('tbl_sumber_dana', $data);
	}
	// EDIT SUMBERDANA
	public function updatesumberdana($where, $data)
	{
		$this->db->update('tbl_sumber_dana', $data, $where);
		return $this->db->affected_rows();
	}
	// HAPUS SUMBERDANA
	public function deletedatasumberdana($id_sumber_dana)
	{
		$this->db->delete('tbl_sumber_dana', ['id_sumber_dana' => $id_sumber_dana]);
	}
	// ========
	// ==================================END SUMBER DANA ========================================
	// ========

	// =====================================BATASS===============================================
	// ========
	// ==================================JADWAL PEMILIHAN =======================================
	// ========

	private function _getjadwal_pemilihan($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_jadwal_pemilihan');
		$this->db->where('id_paket', $id_paket);
		if (isset($_POST['search']['value'])) {
			$this->db->like('tahap', $_POST['search']['value']);
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_jadwal_pemilihan', 'DESC');
		}
	}
	public function getdatatablejadwal_pemilihan($id_paket) //nam[ilin data pake ini
	{
		$this->_getjadwal_pemilihan($id_paket); //ambil data dari get yg di atas
		if ($_POST['length'] != -3) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_jadwal_pemilihan($id_paket)
	{
		$this->_getjadwal_pemilihan($id_paket); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_datajadwal_pemilihan($id_paket)
	{
		$this->db->from('tbl_jadwal_pemilihan');
		$this->db->where('id_paket', $id_paket);
		return $this->db->count_all_results();
	}
	// get jadwal_pemilihan by id
	public function getjadwal_pemilihanbyid($id_jadwal_pemilihan)
	{
		$this->db->select('*');
		$this->db->from('tbl_jadwal_pemilihan');
		$this->db->where('id_jadwal_pemilihan', $id_jadwal_pemilihan);
		$query = $this->db->get();
		return $query->row_array();
	}

	// tambah jadwal_pemilihan
	public function create_jadwal_pemilihan($data)
	{
		$this->db->insert('tbl_jadwal_pemilihan', $data);
	}
	// EDIT jadwal_pemilihan
	public function updatejadwal_pemilihan($where, $data)
	{
		$this->db->update('tbl_jadwal_pemilihan', $data, $where);
		return $this->db->affected_rows();
	}
	// HAPUS jadwal_pemilihan
	public function deletedatajadwal_pemilihan($id_jadwal_pemilihan)
	{
		$this->db->delete('tbl_jadwal_pemilihan', ['id_jadwal_pemilihan' => $id_jadwal_pemilihan]);
	}
	// ========
	// ==================================END JADWAL PEMILIHAN =======================================
	// ========

	// ========
	// ==================================IMPORT EXCEL =======================================
	// ========
	public function insert_via_excel($paketrup)
	{
		$jumlah = count($paketrup);
		if ($jumlah > 0) {
			$this->db->replace('tbl_paket', $paketrup);
		}
	}
	public function insert_via_excel_rincian_hps($rincian_hps)
	{
		$jumlah = count($rincian_hps);
		if ($jumlah > 0) {
			$this->db->replace('tbl_rincian_hps', $rincian_hps);
		}
	}

	public function insert_via_excel_sumber_dana($sumber_dana)
	{
		$jumlah = count($sumber_dana);
		if ($jumlah > 0) {
			$this->db->replace('tbl_sumber_dana', $sumber_dana);
		}
	}
	public function insert_via_excel_lokasi($lokasi)
	{
		$jumlah = count($lokasi);
		if ($jumlah > 0) {
			$this->db->replace('tbl_lokasi_pekerjaan', $lokasi);
		}
	}


	// =====================================BATASS BUAT PAKET TENDER==========================================
	// ========

	private function _get_data_query_paket_tender()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('tbl_tahun_anggaran', 'tbl_tahun_anggaran.id_tahun_anggaran = tbl_paket.id_tahun_anggaran', 'left');
		$this->db->join('tbl_unit_kerja', 'tbl_unit_kerja.id_unit_kerja = tbl_paket.id_unit_kerja', 'left');
		$this->db->join('tbl_sub_agency', 'tbl_sub_agency.id_sub_agency = tbl_paket.id_sub_agency', 'left');
		$this->db->join('tbl_panitia', 'tbl_panitia.id_panitia = tbl_paket.id_panitia', 'left');
		$this->db->join('tbl_jenis_anggaran', 'tbl_jenis_anggaran.id_jenis_anggaran = tbl_paket.id_jenis_anggaran', 'left');
		$this->db->join('tbl_jenis_pengadaan', 'tbl_jenis_pengadaan.id_jenis_pengadaan = tbl_paket.id_jenis_pengadaan', 'left');
		$this->db->join('tbl_metode_pemilihan', 'tbl_metode_pemilihan.id_metode_pemilihan = tbl_paket.id_metode_pemilihan', 'left');
		$this->db->join('tbl_produk_dalam_luar_negri', 'tbl_produk_dalam_luar_negri.id_produk_dl_negri = tbl_paket.id_produk_dl_negri', 'left');
		$this->db->where('tbl_paket.status_paket_tender', 1);
		if (isset($_POST['id_unit_kerja'], $_POST['id_jenis_pengadaan']) && $_POST['id_unit_kerja'] != '' && $_POST['id_jenis_pengadaan'] != '') {
			$this->db->like('tbl_paket.id_unit_kerja', $_POST['id_unit_kerja']);
			$this->db->like('tbl_paket.id_jenis_pengadaan', $_POST['id_jenis_pengadaan']);
		}
		if (isset($_POST['search']['value'])) {
			$this->db->like('nama_paket', $_POST['search']['value']);
			// $this->db->or_like('data_kerja', $_POST['search']['value']);
			// $this->db->or_like('jabatan', $_POST['search']['value']);
			// $this->db->or_like('status', $_POST['search']['value']);
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_paket', 'DESC');
		}
	}

	public function getdatatable_paket_tender() //nam[ilin data pake ini
	{
		$this->_get_data_query_paket_tender(); //ambil data dari get yg di atas
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_data_paket_tender()
	{
		$this->_get_data_query_paket_tender(); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data_paket_tender()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}


	// ==================================Rincian HPS =======================================
	// ========

	private function _getRincianHps($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_rincian_hps');
		$this->db->where('id_paket', $id_paket);
		if (isset($_POST['search']['value'])) {
			$this->db->like('jenis_barang_jasa_rincian_hps', $_POST['search']['value']);
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_rincian_hps', 'DESC');
		}
	}
	public function getdatatableRincianHps($id_paket) //nam[ilin data pake ini
	{
		$this->_getRincianHps($id_paket); //ambil data dari get yg di atas
		if ($_POST['length'] != -3) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_RincianHps($id_paket)
	{
		$this->_getRincianHps($id_paket); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function totalRincianHps($id_paket)
	{
		$this->db->select('*');
		$this->db->where('id_paket', $id_paket);
		$this->db->from('tbl_rincian_hps');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function status_rincian_hps($id_paket)
	{
		$this->db->select('status_hps');
		$this->db->where('id_paket', $id_paket);
		$this->db->from('tbl_rincian_hps');
		$query = $this->db->get();
		return $query->row();
	}


	public function count_all_dataRincianHps($id_paket)
	{
		$this->db->from('tbl_rincian_hps');
		$this->db->where('id_paket', $id_paket);
		return $this->db->count_all_results();
	}
	// get RincianHps by id
	public function getRincianHpsByid($id_rincian_hps)
	{
		$this->db->select('*');
		$this->db->from('tbl_rincian_hps');
		$this->db->where('id_rincian_hps', $id_rincian_hps);
		$query = $this->db->get();
		return $query->row_array();
	}



	// tambah RincianHps
	public function create_rincian_hps($data)
	{
		$this->db->insert('tbl_rincian_hps', $data);
	}
	// EDIT _rincian_hps
	public function update_rincian_hps($where, $data)
	{
		$this->db->update('tbl_rincian_hps', $data, $where);
		return $this->db->affected_rows();
	}
	// HAPUS _rincian_hps
	public function deletedata_rincian_hps($id_rincian_hps)
	{
		$this->db->delete('tbl_rincian_hps', ['id_rincian_hps' => $id_rincian_hps]);
	}
	// ========
	// ==================================END SUMBER DANA ========================================
	// ========


	// Kerangka acuan kerja==================================
	private function _getKak($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_kerangka_acuan_kerja');
		$this->db->where('id_paket', $id_paket);
		if (isset($_POST['search']['value'])) {
			$this->db->like('nama_file_kak', $_POST['search']['value']);
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_kerangka_acuan_kerja', 'DESC');
		}
	}
	public function getdatatableKak($id_paket) //nam[ilin data pake ini
	{
		$this->_getKak($id_paket); //ambil data dari get yg di atas
		if ($_POST['length'] != -3) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_Kak($id_paket)
	{
		$this->_getKak($id_paket); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}


	public function count_all_dataKak($id_paket)
	{
		$this->db->from('tbl_kerangka_acuan_kerja');
		$this->db->where('id_paket', $id_paket);
		return $this->db->count_all_results();
	}
	// get Kerangka acuan kerja by id
	public function getKakByid($id_rincian_hps)
	{
		$this->db->select('*');
		$this->db->from('tbl_kerangka_acuan_kerja');
		$this->db->where('id_kerangka_acuan_kerja', $id_rincian_hps);
		$query = $this->db->get();
		return $query->row_array();
	}


	// get Kerangka acuan kerja by id
	public function getKerangkaKerjaByid($id_kerangka_acuan_kerja)
	{
		$this->db->select('*');
		$this->db->from('tbl_kerangka_acuan_kerja');
		$this->db->where('id_kerangka_acuan_kerja', $id_kerangka_acuan_kerja);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function create_kak($data)
	{
		$this->db->insert('tbl_kerangka_acuan_kerja', $data);
		return $this->db->affected_rows();
	}
	public function update_kak($where, $data)
	{
		$this->db->update('tbl_kerangka_acuan_kerja', $data, $where);
		return $this->db->affected_rows();
	}
	// HAPUS Kerangka acuan kerja
	public function deletedata_kak($id_kerangka_acuan_kerja)
	{
		$this->db->delete('tbl_kerangka_acuan_kerja', ['id_kerangka_acuan_kerja' => $id_kerangka_acuan_kerja]);
	}


	// Syarat Khusus KOntrak==================================
	private function _getSyarat_Khusus_kontrak($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_syarat_khusus_kontrak');
		$this->db->where('id_paket', $id_paket);
		if (isset($_POST['search']['value'])) {
			$this->db->like('nama_file_syarat_khusus_kontrak', $_POST['search']['value']);
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_syarat_khusus_kontrak', 'DESC');
		}
	}
	public function getdatatablesyarat_khusus_kontrak($id_paket) //nam[ilin data pake ini
	{
		$this->_getSyarat_Khusus_kontrak($id_paket); //ambil data dari get yg di atas
		if ($_POST['length'] != -3) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_syarat_khusus_kontrak($id_paket)
	{
		$this->_getSyarat_Khusus_kontrak($id_paket); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}


	public function count_all_datasyarat_khusus_kontrak($id_paket)
	{
		$this->db->from('tbl_syarat_khusus_kontrak');
		$this->db->where('id_paket', $id_paket);
		return $this->db->count_all_results();
	}



	// get Syarat Khusus KOntrak by id
	public function getsyarat_khusus_kontrakByid($id_syarat_khusus_kontrak)
	{
		$this->db->select('*');
		$this->db->from('tbl_syarat_khusus_kontrak');
		$this->db->where('id_syarat_khusus_kontrak', $id_syarat_khusus_kontrak);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function create_syarat_khusus_kontrak($data)
	{
		$this->db->insert('tbl_syarat_khusus_kontrak', $data);
		return $this->db->affected_rows();
	}
	public function update_syarat_khusus_kontrak($where, $data)
	{
		$this->db->update('tbl_syarat_khusus_kontrak', $data, $where);
		return $this->db->affected_rows();
	}
	// HAPUS Syarat Khusus KOntrak
	public function deletedata_syarat_khusus_kontrak($id_syarat_khusus_kontrak)
	{
		$this->db->delete('tbl_syarat_khusus_kontrak', ['id_syarat_khusus_kontrak' => $id_syarat_khusus_kontrak]);
	}

	// INI UNTUK INFORMASI LAINYA

	// INFORMASI LAINYA ==================================
	private function _get_informasi_lainya($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_informasi_lainya');
		$this->db->where('id_paket', $id_paket);
		if (isset($_POST['search']['value'])) {
			$this->db->like('nama_file_informasi_lainya', $_POST['search']['value']);
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_informasi_lainya', 'DESC');
		}
	}
	public function getdatatable_informasi_lainya($id_paket) //nam[ilin data pake ini
	{
		$this->_get_informasi_lainya($id_paket); //ambil data dari get yg di atas
		if ($_POST['length'] != -3) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_informasi_lainya($id_paket)
	{
		$this->_get_informasi_lainya($id_paket); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}


	public function count_all_data_informasi_lainya($id_paket)
	{
		$this->db->from('tbl_informasi_lainya');
		$this->db->where('id_paket', $id_paket);
		return $this->db->count_all_results();
	}


	// get KINFORMASI LAINYA by id
	public function get_informasi_lainya_Byid($id_informasi_lainya)
	{
		$this->db->select('*');
		$this->db->from('tbl_informasi_lainya');
		$this->db->where('id_informasi_lainya', $id_informasi_lainya);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function create_informasi_lainya($data)
	{
		$this->db->insert('tbl_informasi_lainya', $data);
		return $this->db->affected_rows();
	}
	public function update_informasi_lainya($where, $data)
	{
		$this->db->update('tbl_informasi_lainya', $data, $where);
		return $this->db->affected_rows();
	}
	// HAPUS INFORMASI LAINYA kerja
	public function deletedata_informasi_lainya($id_informasi_lainya)
	{
		$this->db->delete('tbl_informasi_lainya', ['id_informasi_lainya' => $id_informasi_lainya]);
	}

	// hanya get by id panitia
	// get KINFORMASI LAINYA by id
	public function get_panitia_Byid($id_panitia)
	{
		$this->db->select('*');
		$this->db->from('tbl_panitia');
		$this->db->where('id_panitia', $id_panitia);
		$query = $this->db->get();
		return $query->row_array();
	}
	public function update_pilih_panitia($where, $data)
	{
		$this->db->update('tbl_paket', $data, $where);
		return $this->db->affected_rows();
	}

	public function update_email_pegawai($where, $data)
	{
		$data = $this->db->query("SELECT id_panitia, id_pegawai,nama_pegawai, nama_panitia, email from tbl_paket left join tbl_panitia using(id_panitia) 
      LEFT JOIN tbl_detail_panitia USING(id_panitia)
      left join tbl_pegawai using(id_pegawai)
      where id_paket = $where");
		return $data->result();
	}


	// INI UNTUK MENDAPATKAN KODE TENDER 
	public function get_kode_tender($text = null, $table = null, $field = null)
	{
		$this->db->select_max('kode_tender_random');
		$this->db->like($field, $text, 'after');
		$this->db->order_by($field, 'desc');
		$this->db->limit(1);
		return $this->db->get($table)->row_array()[$field];
	}
}
