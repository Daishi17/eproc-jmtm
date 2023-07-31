<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paket_model extends CI_Model
{
	var $table = 'tbl_paket';
	var $order = array('id_paket', 'nama_paket');
	var $column_search = array('id_paket', 'nama_paket', 'nama_unit_kerja', 'program_paket', 'nama_jenis_pengadaan', 'nama_metode_pemilihan', 'nama_jenis_anggaran');

	var $colum_order_tender3 = array('id_paket', 'nama_paket', 'nama_unit_kerja', 'program_paket', 'nama_jenis_pengadaan', 'nama_metode_pemilihan', 'nama_jenis_anggaran', 'id_paket');
	private function _get_data_query()
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
		$this->db->where('status_finalisasi_draft', 1);
		$this->db->where_not_in('status_soft_delete', 1);
		$this->db->where_not_in('tbl_paket.id_metode_pemilihan', 8);
		$this->db->where_not_in('tbl_paket.id_metode_pemilihan', 10);
		$this->db->where_not_in('tbl_paket.id_metode_pemilihan', 9);
		if (isset($_POST['id_unit_kerja'], $_POST['id_jenis_pengadaan']) && $_POST['id_unit_kerja'] != '' && $_POST['id_jenis_pengadaan'] != '') {
			$this->db->like('tbl_paket.id_unit_kerja', $_POST['id_unit_kerja']);
			$this->db->like('tbl_paket.id_jenis_pengadaan', $_POST['id_jenis_pengadaan']);
		}
		$i = 0;
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
			$this->db->order_by($this->colum_order_tender3[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_paket', 'DESC');
		}
	}

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

	private function _get_data_query2($role_agency,  $area_agency)
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
		$this->db->where('tbl_paket.id_pegawai', $role_agency);
		$this->db->or_where('tbl_unit_kerja.id_unit_kerja', $area_agency);
		$this->db->where('status_finalisasi_draft', 1);
		$this->db->where('status_soft_delete', 0);
		if (isset($_POST['id_unit_kerja'], $_POST['id_jenis_pengadaan']) && $_POST['id_unit_kerja'] != '' && $_POST['id_jenis_pengadaan'] != '') {
			$this->db->like('tbl_paket.id_unit_kerja', $_POST['id_unit_kerja']);
			$this->db->like('tbl_paket.id_jenis_pengadaan', $_POST['id_jenis_pengadaan']);
		}
		if (isset($_POST['search']['value'])) {
			$this->db->like('nama_paket', $_POST['search']['value']);
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_paket', 'DESC');
		}
	}

	public function getdatatable2($role_agency,  $area_agency) //nam[ilin data pake ini
	{
		$this->_get_data_query2($role_agency,  $area_agency); //ambil data dari get yg di atas
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_data2($role_agency,  $area_agency)
	{
		$this->_get_data_query2($role_agency,  $area_agency); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data2()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	// INI UNTUK TAMBAH PAKET PADA TRANSAKSI LANGSUNG
	var $trans_order = array('id_paket', 'nama_paket', 'nama_unit_kerja', 'program_paket', 'nama_jenis_pengadaan', 'nama_metode_pemilihan', 'nama_jenis_anggaran', 'id_paket');
	private function _get_data_query_tambah_transaksi_langsung()
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
		$this->db->where('tbl_paket.id_metode_pemilihan', 10);
		$this->db->where('status_finalisasi_draft', 1);
		if (isset($_POST['id_unit_kerja'], $_POST['id_jenis_pengadaan']) && $_POST['id_unit_kerja'] != '' && $_POST['id_jenis_pengadaan'] != '') {
			$this->db->like('tbl_paket.id_unit_kerja', $_POST['id_unit_kerja']);
			$this->db->like('tbl_paket.id_jenis_pengadaan', $_POST['id_jenis_pengadaan']);
		}
		$i = 0;
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
			$this->db->order_by($this->trans_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_paket', 'DESC');
		}
	}

	public function getdatatable_tambah_transaksi_langsung()
	{
		$this->_get_data_query_tambah_transaksi_langsung();
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_data_tambah_transaksi_langsung()
	{
		$this->_get_data_query_tambah_transaksi_langsung();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data_tambah_transaksi_langsung()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	// UNTUK TAMBAH PAKET TRANSAKSI LANGSUNG
	var $trans_order_langsung = array('id_paket', 'nama_paket', 'nama_unit_kerja', 'program_paket', 'nama_jenis_pengadaan', 'nama_metode_pemilihan', 'nama_jenis_anggaran', 'id_paket');
	private function _get_data_query2_tambah_transaksi_langsung($role_agency,  $area_agency)
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
		$this->db->where('tbl_paket.id_pegawai', $role_agency);
		$this->db->or_where('tbl_unit_kerja.id_unit_kerja', $area_agency);
		$this->db->where('tbl_paket.id_metode_pemilihan', 10);
		$this->db->where('status_finalisasi_draft', 1);
		$this->db->where_not_in('status_soft_delete', 1);
		if (isset($_POST['id_unit_kerja'], $_POST['id_jenis_pengadaan']) && $_POST['id_unit_kerja'] != '' && $_POST['id_jenis_pengadaan'] != '') {
			$this->db->like('tbl_paket.id_unit_kerja', $_POST['id_unit_kerja']);
			$this->db->like('tbl_paket.id_jenis_pengadaan', $_POST['id_jenis_pengadaan']);
		}
		$i = 0;
		foreach ($this->trans_order_langsung as $item) // looping awal
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

				if (count($this->trans_order_langsung) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->trans_order_langsung[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_paket', 'DESC');
		}
	}

	public function getdatatable2_tambah_transaksi_langsung($role_agency,  $area_agency) //nam[ilin data pake ini
	{
		$this->_get_data_query2_tambah_transaksi_langsung($role_agency,  $area_agency); //ambil data dari get yg di atas
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_data2_tambah_transaksi_langsung($role_agency,  $area_agency)
	{
		$this->_get_data_query2_tambah_transaksi_langsung($role_agency,  $area_agency); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data2_tambah_transaksi_langsung()
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
		$this->db->join('tbl_panitia', 'tbl_panitia.id_panitia = tbl_paket.id_panitia', 'left');
		$this->db->join('tbl_pegawai', 'tbl_pegawai.id_pegawai = tbl_paket.id_pegawai', 'left');
		$this->db->where('id_paket', $id_paket);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}
	public function update_batal_tender($where, $data)
	{
		$this->db->update('tbl_paket', $data, $where);
		return $this->db->affected_rows();
	}

	public function deletedata($id_paket)
	{
		$this->db->delete($this->table, ['id_paket' => $id_paket]);
		$this->db->delete('tbl_lokasi_pekerjaan', ['id_paket' => $id_paket]);
		$this->db->delete('tbl_sumber_dana', ['id_paket' => $id_paket]);
		$this->db->delete('tbl_jadwal_pemilihan', ['id_paket' => $id_paket]);
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
		$query = $this->db->query("SELECT * FROM tbl_unit_kerja");
		return $query->result_array();
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
	var $order_lokasi = array('id_lokasi_pekerjaan', 'nama_provinsi', 'nama_kabupaten', 'detail_lokasi');
	private function _getLokasiPekerjaan($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_lokasi_pekerjaan');
		$this->db->join('tbl_provinsi', 'tbl_provinsi.id_provinsi = tbl_lokasi_pekerjaan.id_provinsi', 'left');
		$this->db->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten = tbl_lokasi_pekerjaan.id_kabupaten', 'left');
		$this->db->where('id_paket', $id_paket);
		$i = 0;
		foreach ($this->order_lokasi as $item) // looping awal
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

				if (count($this->order_lokasi) - 1 == $i)
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

	public function update_status_dipilih_panitia($data)
	{
		$this->db->insert('tbl_panitia_mengikuti_paket', $data);
		return $this->db->affected_rows();
	}
	var $order_sumberdana = array('id_sumber_dana', 'asal_dana', 'hps', 'tahun_anggaran', 'id_sumber_dana');
	private function _getSumberdana($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_sumber_dana');
		$this->db->where('id_paket', $id_paket);
		$i = 0;
		foreach ($this->order_sumberdana as $item) // looping awal
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

				if (count($this->order_sumberdana) - 1 == $i)
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
	public function insert_via_excel_lokasi($lokasi)
	{
		$jumlah = count($lokasi);
		if ($jumlah > 0) {
			$this->db->replace('tbl_lokasi_pekerjaan', $lokasi);
		}
	}


	// =====================================BATASS BUAT PAKET TENDER==========================================
	// ========

	// UNTUK ADMIN

	var $order_admin_get_rup = array(
		'id_paket', 'kode_tender', 'nama_metode_pemilihan', 'status_paket_tender', 'tanggal_buat_rup',
		'tanggal_buat_paket_tender', 'nama_unit_kerja', 'id_paket'
	);
	var $search_tender_rup = array(
		'id_paket', 'kode_tender', 'nama_paket', 'nama_metode_pemilihan', 'status_paket_tender',
		'tanggal_buat_paket_tender', 'nama_unit_kerja', 'id_paket'
	);
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
		$this->db->where('tbl_paket.id_metode_pemilihan != ', 10);
		$this->db->where('tbl_paket.id_metode_pemilihan != ', 9);
		$this->db->where('tbl_paket.id_metode_pemilihan != ', 8);
		$this->db->where('tbl_paket.id_metode_pemilihan != ', 6);
		$this->db->where('tbl_paket.id_metode_pemilihan != ', 4);
		$this->db->where('status_finalisasi_draft', 1);
		if (isset($_POST['id_unit_kerja'], $_POST['id_jenis_pengadaan']) && $_POST['id_unit_kerja'] != '' && $_POST['id_jenis_pengadaan'] != '') {
			$this->db->like('tbl_paket.id_unit_kerja', $_POST['id_unit_kerja']);
			$this->db->like('tbl_paket.id_jenis_pengadaan', $_POST['id_jenis_pengadaan']);
		}
		$i = 0;
		foreach ($this->search_tender_rup as $item) // looping awal
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

				if (count($this->search_tender_rup) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->order_admin_get_rup[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
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


	// BUAT AGENCY
	var $order_agency_get_rup = array(
		'id_paket', 'kode_tender', 'nama_metode_pemilihan', 'status_paket_tender', 'tanggal_buat_rup',
		'tanggal_buat_paket_tender', 'nama_unit_kerja', 'id_paket'
	);
	private function _get_data_query_paket_tender2($role_agency, $area_agency)
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
		$this->db->where('tbl_paket.id_pegawai', $role_agency);
		$this->db->or_where('tbl_unit_kerja.id_unit_kerja', $area_agency);
		$this->db->where('tbl_paket.id_metode_pemilihan != ', 10);
		$this->db->where('tbl_paket.id_metode_pemilihan != ', 9);
		$this->db->where('tbl_paket.id_metode_pemilihan != ', 8);
		$this->db->where('tbl_paket.id_metode_pemilihan != ', 6);
		$this->db->where('tbl_paket.id_metode_pemilihan != ', 4);
		$this->db->where('status_finalisasi_draft', 1);
		if (isset($_POST['id_unit_kerja'], $_POST['id_jenis_pengadaan']) && $_POST['id_unit_kerja'] != '' && $_POST['id_jenis_pengadaan'] != '') {
			$this->db->like('tbl_paket.id_unit_kerja', $_POST['id_unit_kerja']);
			$this->db->like('tbl_paket.id_jenis_pengadaan', $_POST['id_jenis_pengadaan']);
		}
		$i = 0;
		foreach ($this->order_agency_get_rup as $item) // looping awal
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

				if (count($this->order_agency_get_rup) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->order_agency_get_rup[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_paket', 'DESC');
		}
	}

	public function getdatatable_paket_tender_agency($role_agency, $area_agency) //nam[ilin data pake ini
	{
		$this->_get_data_query_paket_tender2($role_agency, $area_agency); //ambil data dari get yg di atas
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_data_paket_agency($role_agency, $area_agency)
	{
		$this->_get_data_query_paket_tender2($role_agency, $area_agency); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data_paket_agency()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}


	// INI UNTUK TRANSAKSI LANGSUNG

	// UNTUK ADMIN
	var $order_admin_transaksi_rup = array(
		'id_paket', 'kode_tender', 'nama_metode_pemilihan', 'status_paket_tender', 'tanggal_buat_rup',
		'tanggal_buat_paket_tender', 'nama_unit_kerja', 'id_paket'
	);
	private function _get_data_query_paket_tender_transaksi_langsung()
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
		$this->db->where('tbl_paket.id_metode_pemilihan', 10);
		$this->db->where('status_finalisasi_draft', 1);
		if (isset($_POST['id_unit_kerja'], $_POST['id_jenis_pengadaan']) && $_POST['id_unit_kerja'] != '' && $_POST['id_jenis_pengadaan'] != '') {
			$this->db->like('tbl_paket.id_unit_kerja', $_POST['id_unit_kerja']);
			$this->db->like('tbl_paket.id_jenis_pengadaan', $_POST['id_jenis_pengadaan']);
		}
		$i = 0;
		foreach ($this->order_admin_transaksi_rup as $item) // looping awal
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

				if (count($this->order_admin_transaksi_rup) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->order_admin_transaksi_rup[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_paket', 'DESC');
		}
	}

	public function getdatatable_paket_tender_transaksi_langsung() //nam[ilin data pake ini
	{
		$this->_get_data_query_paket_tender_transaksi_langsung(); //ambil data dari get yg di atas
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_data_paket_tender_transaksi_langsung()
	{
		$this->_get_data_query_paket_tender_transaksi_langsung(); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data_paket_tender_transaksi_langsung()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}





	var $order_agency_transaksi_rup = array(
		'id_paket', 'kode_tender', 'nama_metode_pemilihan', 'status_paket_tender', 'tanggal_buat_rup',
		'tanggal_buat_paket_tender', 'nama_unit_kerja', 'id_paket'
	);
	// BUAT AGENCY
	private function _get_data_query_paket_tender2_transaksi_langsung($role_agency, $area_agency)
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
		$this->db->where('tbl_paket.id_pegawai', $role_agency);
		$this->db->or_where('tbl_unit_kerja.id_unit_kerja', $area_agency);
		$this->db->where('tbl_paket.id_metode_pemilihan', 10);
		$this->db->where('status_finalisasi_draft', 1);
		if (isset($_POST['id_unit_kerja'], $_POST['id_jenis_pengadaan']) && $_POST['id_unit_kerja'] != '' && $_POST['id_jenis_pengadaan'] != '') {
			$this->db->like('tbl_paket.id_unit_kerja', $_POST['id_unit_kerja']);
			$this->db->like('tbl_paket.id_jenis_pengadaan', $_POST['id_jenis_pengadaan']);
		}
		$i = 0;
		foreach ($this->order_agency_transaksi_rup as $item) // looping awal
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

				if (count($this->order_agency_transaksi_rup) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->order_agency_transaksi_rup[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_paket', 'DESC');
		}
	}

	public function getdatatable_paket_tender_agency_transaksi_langsung($role_agency, $area_agency) //nam[ilin data pake ini
	{
		$this->_get_data_query_paket_tender2_transaksi_langsung($role_agency, $area_agency); //ambil data dari get yg di atas
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_data_paket_agency_transaksi_langsung($role_agency, $area_agency)
	{
		$this->_get_data_query_paket_tender2_transaksi_langsung($role_agency, $area_agency); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data_paket_agency_transaksi_langsung()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}


	// ini untuk manager ketika ada paket transaksi baru
	private function _get_data_query_paket_tender2_transaksi_langsung_manager($role_agency, $area_agency)
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
		$this->db->where('tbl_paket.id_pegawai', $role_agency);
		$this->db->or_where('tbl_unit_kerja.id_unit_kerja', $area_agency);
		$this->db->where('tbl_paket.id_metode_pemilihan', 10);
		$this->db->where('tbl_paket.status_persetujuan_manager !=', 0);
		$this->db->where('status_finalisasi_draft', 1);
		if (isset($_POST['id_unit_kerja'], $_POST['id_jenis_pengadaan']) && $_POST['id_unit_kerja'] != '' && $_POST['id_jenis_pengadaan'] != '') {
			$this->db->like('tbl_paket.id_unit_kerja', $_POST['id_unit_kerja']);
			$this->db->like('tbl_paket.id_jenis_pengadaan', $_POST['id_jenis_pengadaan']);
		}
		if (isset($_POST['search']['value'])) {
			$this->db->like('nama_paket', $_POST['search']['value']);
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_paket', 'DESC');
		}
	}

	public function getdatatable_paket_tender_agency_transaksi_langsung_manager($role_agency, $area_agency)
	{
		$this->_get_data_query_paket_tender2_transaksi_langsung_manager($role_agency, $area_agency);
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_data_paket_agency_transaksi_langsung_manager($role_agency, $area_agency)
	{
		$this->_get_data_query_paket_tender2_transaksi_langsung_manager($role_agency, $area_agency);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data_paket_agency_transaksi_langsung_manager()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}


	// INI UNTUK PENUNJUKAN LANGSUNG

	// UNTUK ADMIN
	private function _get_data_query_paket_tender_penunjukan_langsung()
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
		$this->db->where('tbl_paket.id_metode_pemilihan', 8);
		$this->db->where('status_finalisasi_draft', 1);
		if (isset($_POST['id_unit_kerja'], $_POST['id_jenis_pengadaan']) && $_POST['id_unit_kerja'] != '' && $_POST['id_jenis_pengadaan'] != '') {
			$this->db->like('tbl_paket.id_unit_kerja', $_POST['id_unit_kerja']);
			$this->db->like('tbl_paket.id_jenis_pengadaan', $_POST['id_jenis_pengadaan']);
		}
		if (isset($_POST['search']['value'])) {
			$this->db->like('nama_paket', $_POST['search']['value']);
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_paket', 'DESC');
		}
	}

	public function getdatatable_paket_tender_penunjukan_langsung() //nam[ilin data pake ini
	{
		$this->_get_data_query_paket_tender_penunjukan_langsung(); //ambil data dari get yg di atas
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_data_paket_tender_penunjukan_langsung()
	{
		$this->_get_data_query_paket_tender_penunjukan_langsung(); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data_paket_tender_penunjukan_langsung()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}


	// BUAT AGENCY
	private function _get_data_query_paket_tender2_penunjukan_langsung($role_agency, $area_agency)
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
		$this->db->where('tbl_paket.id_pegawai', $role_agency);
		$this->db->or_where('tbl_unit_kerja.id_unit_kerja', $area_agency);
		$this->db->where('tbl_paket.id_metode_pemilihan', 8);
		$this->db->where('status_finalisasi_draft', 1);
		if (isset($_POST['id_unit_kerja'], $_POST['id_jenis_pengadaan']) && $_POST['id_unit_kerja'] != '' && $_POST['id_jenis_pengadaan'] != '') {
			$this->db->like('tbl_paket.id_unit_kerja', $_POST['id_unit_kerja']);
			$this->db->like('tbl_paket.id_jenis_pengadaan', $_POST['id_jenis_pengadaan']);
		}
		if (isset($_POST['search']['value'])) {
			$this->db->like('nama_paket', $_POST['search']['value']);
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_paket', 'DESC');
		}
	}

	public function getdatatable_paket_tender_agency_penunjukan_langsung($role_agency, $area_agency) //nam[ilin data pake ini
	{
		$this->_get_data_query_paket_tender2_penunjukan_langsung($role_agency, $area_agency); //ambil data dari get yg di atas
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_data_paket_agency_penunjukan_langsung($role_agency, $area_agency)
	{
		$this->_get_data_query_paket_tender2_penunjukan_langsung($role_agency, $area_agency); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data_paket_agency_penunjukan_langsung()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}


	// ini untuk manager ketika ada paket penunjukan baru
	private function _get_data_query_paket_tender2_penunjukan_langsung_manager($role_agency, $area_agency)
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
		$this->db->where('tbl_paket.id_pegawai', $role_agency);
		$this->db->or_where('tbl_unit_kerja.id_unit_kerja', $area_agency);
		$this->db->where('tbl_paket.id_metode_pemilihan', 8);
		$this->db->where('tbl_paket.status_persetujuan_manager !=', 0);
		$this->db->where('status_finalisasi_draft', 1);
		if (isset($_POST['id_unit_kerja'], $_POST['id_jenis_pengadaan']) && $_POST['id_unit_kerja'] != '' && $_POST['id_jenis_pengadaan'] != '') {
			$this->db->like('tbl_paket.id_unit_kerja', $_POST['id_unit_kerja']);
			$this->db->like('tbl_paket.id_jenis_pengadaan', $_POST['id_jenis_pengadaan']);
		}
		if (isset($_POST['search']['value'])) {
			$this->db->like('nama_paket', $_POST['search']['value']);
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_paket', 'DESC');
		}
	}

	public function getdatatable_paket_tender_agency_penunjukan_langsung_manager($role_agency, $area_agency)
	{
		$this->_get_data_query_paket_tender2_penunjukan_langsung_manager($role_agency, $area_agency);
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_data_paket_agency_penunjukan_langsung_manager($role_agency, $area_agency)
	{
		$this->_get_data_query_paket_tender2_penunjukan_langsung_manager($role_agency, $area_agency);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data_paket_agency_penunjukan_langsung_manager()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}


	// ==================================Rincian HPS =======================================
	// ========

	var $pdf_hps_manual = array(
		'id_rincian_hps', 'jenis_barang_jasa_rincian_hps', 'satuan_rincian_hps', 'keterangan_rincian_hps', 'persen_rincian_hps', 'harga_rincian_hps', 'id_rincian_hps'
	);
	private function _getRincianHps($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_rincian_hps');
		$this->db->where('id_paket', $id_paket);
		$i = 0;
		foreach ($this->pdf_hps_manual as $item) // looping awal
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

				if (count($this->pdf_hps_manual) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->pdf_hps_manual[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
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

	public function count_all_dataRincianHps($id_paket)
	{
		$this->db->from('tbl_rincian_hps');
		$this->db->where('id_paket', $id_paket);
		return $this->db->count_all_results();
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


	// RINCIAN HPS PDF
	var $pdf_hps_order = array('id_rincian_hps_pdf', 'nama_rincian_hps_pdf', 'file_rincian_hps_pdf', 'total_rincian_hps_pdf', 'id_rincian_hps_pdf');
	private function _getRincianHps_pdf($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_rincian_hps_pdf');
		$this->db->where('id_paket', $id_paket);
		$i = 0;
		foreach ($this->pdf_hps_order as $item) // looping awal
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

				if (count($this->pdf_hps_order) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->pdf_hps_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_rincian_hps_pdf', 'DESC');
		}
	}


	public function getdatatableRincianHps_pdf($id_paket) //nam[ilin data pake ini
	{
		$this->_getRincianHps_pdf($id_paket); //ambil data dari get yg di atas
		if ($_POST['length'] != -3) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_RincianHps_pdf($id_paket)
	{
		$this->_getRincianHps_pdf($id_paket); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function count_all_dataRincianHps_pdf($id_paket)
	{
		$this->db->from('tbl_rincian_hps_pdf');
		$this->db->where('id_paket', $id_paket);
		return $this->db->count_all_results();
	}
	public function create_pdf_rincian_hps($data)
	{
		$this->db->insert('tbl_rincian_hps_pdf', $data);
		return $this->db->affected_rows();
	}
	public function deletedata_rincian_hps_pdf($id_rincian_hps_pdf)
	{
		$this->db->delete('tbl_rincian_hps_pdf', ['id_rincian_hps_pdf' => $id_rincian_hps_pdf]);
	}

	// public function get_by_rincian_hps_pdf($id_paket)
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('tbl_rincian_hps_pdf');
	// 	$this->db->where('id_paket', $id_paket);
	// 	$query = $this->db->get();
	// 	return $query->result_array();
	// }
	public function get_by_rincian_hps_pdf2($id_rincian_hps_pdf)
	{
		$this->db->select('*');
		$this->db->from('tbl_rincian_hps_pdf');
		$this->db->where('id_rincian_hps_pdf', $id_rincian_hps_pdf);
		$query = $this->db->get();
		return $query->row_array();
	}
	public function get_by_rincian_hps_pdf_result($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_rincian_hps_pdf');
		$this->db->where('id_paket', $id_paket);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_by_rincian_hps_pdf_result_vendor($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_rincian_hps_pdf_vendor');
		$this->db->where('id_paket', $id_paket);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_by_rincian_hps_pdf_sudah_dibuat_vendor($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_rincian_hps_pdf_vendor');
		$this->db->where('id_paket', $id_paket);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function getdata_skidawww($id_paket, $id_vendor)
	{
		$this->db->select('*');
		$this->db->from('tbl_rincian_hps_pdf_vendor');
		$this->db->where('id_paket', $id_paket);
		$this->db->where('id_vendor', $id_vendor);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_by_rincian_hps_pdf_sudah_dibuat_vendor_tus($id_paket, $id_vendor)
	{
		$this->db->select('*');
		$this->db->from('tbl_rincian_hps_pdf_vendor');
		$this->db->where('id_paket', $id_paket);
		$this->db->where('id_vendor', $id_vendor);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function get_by_rincian_hps_pdf_sudah_dibuat($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_rincian_hps_pdf');
		$this->db->where('id_paket', $id_paket);
		$query = $this->db->get();
		return $query->row_array();
	}



	public function get_by_rincian_hps_sudah_dibuat($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_rincian_hps');
		$this->db->where('id_paket', $id_paket);
		$query = $this->db->get();
		return $query->result_array();
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

	public function get_ketua_panitia($id_panitia)
	{
		$this->db->select('*');
		$this->db->from('tbl_detail_panitia');
		$this->db->join('tbl_panitia', 'id_panitia', 'left');
		$this->db->join('tbl_role_panitia', 'id_role_panitia', 'left');
		$this->db->join('tbl_pegawai', 'tbl_detail_panitia.id_pegawai2 = tbl_pegawai.id_pegawai', 'left');
		$this->db->join('tbl_unit_kerja', 'tbl_unit_kerja.id_unit_kerja = tbl_pegawai.id_unit_kerja2', 'left');
		$this->db->join('tbl_panitia_mengikuti_paket', 'tbl_panitia_mengikuti_paket.status_panitia_id_detail_panitia = tbl_panitia.id_panitia', 'left');
		$this->db->where('id_panitia', $id_panitia);
		$this->db->where('id_role_panitia', 1);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function get_panitia_Byid($id_panitia)
	{
		$this->db->select('*');
		$this->db->from('tbl_detail_panitia');
		$this->db->join('tbl_panitia', 'id_panitia', 'left');
		$this->db->join('tbl_role_panitia', 'id_role_panitia', 'left');
		$this->db->join('tbl_pegawai', 'tbl_detail_panitia.id_pegawai2 = tbl_pegawai.id_pegawai', 'left');
		$this->db->join('tbl_unit_kerja', 'tbl_unit_kerja.id_unit_kerja = tbl_pegawai.jabatan', 'left');
		$this->db->join('tbl_panitia_mengikuti_paket', 'tbl_panitia_mengikuti_paket.status_panitia_id_detail_panitia = tbl_panitia.id_panitia', 'left');
		$this->db->where('id_panitia', $id_panitia);
		$query = $this->db->get();
		return $query->row_array();
	}
	public function get_panitia_Byid2($id_panitia)
	{
		$this->db->select('*');
		$this->db->from('tbl_detail_panitia');
		$this->db->join('tbl_panitia', 'id_panitia', 'left');
		$this->db->join('tbl_role_panitia', 'id_role_panitia', 'left');
		$this->db->join('tbl_pegawai', 'tbl_detail_panitia.id_pegawai2 = tbl_pegawai.id_pegawai', 'left');
		$this->db->join('tbl_unit_kerja', 'tbl_unit_kerja.id_unit_kerja = tbl_pegawai.jabatan', 'left');
		$this->db->where('id_panitia', $id_panitia);
		$query = $this->db->get();
		return $query->result_array();
	}



	public function update_pilih_panitia($where, $data)
	{
		$this->db->update('tbl_paket', $data, $where);
		return $this->db->affected_rows();
	}
	public function update_panitia_sudah_dipillih($where, $data)
	{
		$this->db->update('tbl_panitia_mengikuti_paket', $data, $where);
		return $this->db->affected_rows();
	}

	public function update_email_pegawai($where)
	{

		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->join('tbl_panitia', 'tbl_panitia.id_panitia = tbl_paket.id_panitia', 'left');
		$this->db->join('tbl_detail_panitia', 'tbl_detail_panitia.id_panitia = tbl_panitia.id_panitia', 'left');
		$this->db->join('tbl_pegawai', 'tbl_pegawai.id_pegawai = tbl_detail_panitia.id_pegawai2', 'left');
		$this->db->where('tbl_paket.id_paket', $where);
		$query = $this->db->get();
		return $query->result();
	}

	// INI UNTUK MENDAPATKAN KODE TENDER 
	public function get_kode_tender($text = null, $table = null, $field = null)
	{
		$this->db->select('kode_tender_random');
		$this->db->like($field, $text, 'after');
		$this->db->order_by($field, 'desc');
		$this->db->limit(1);
		return $this->db->get($table)->row_array()[$field];
	}

	public function cek_kak($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_kerangka_acuan_kerja');
		$this->db->where('id_paket', $id_paket);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function cek_sskk($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_syarat_khusus_kontrak');
		$this->db->where('id_paket', $id_paket);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function cek_informasi($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_informasi_lainya');
		$this->db->where('id_paket', $id_paket);
		$query = $this->db->get();
		return $query->row_array();
	}


	// Rencana Dokumen
	private function _getRencanaDokumen($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_persiapan_dokumen_pengadaan');
		$this->db->where('id_paket', $id_paket);
		if (isset($_POST['search']['value'])) {
			$this->db->like('nama_file_dokumen_rencana', $_POST['search']['value']);
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_dokumen_persiapan', 'DESC');
		}
	}
	public function getdatatabledokumen_pemilihan_rencana($id_paket) //nam[ilin data pake ini
	{
		$this->_getRencanaDokumen($id_paket); //ambil data dari get yg di atas
		if ($_POST['length'] != -3) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_Rencana_Dokumen($id_paket)
	{
		$this->_getRencanaDokumen($id_paket); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}


	public function count_all_data_Rencana_Dokumen($id_paket)
	{
		$this->db->from('tbl_persiapan_dokumen_pengadaan');
		$this->db->where('id_paket', $id_paket);
		return $this->db->count_all_results();
	}

	// get Rencana Dokumen by id
	public function getByid_Rencana_Dokumen($id_dokumen_persiapan)
	{
		$this->db->select('*');
		$this->db->from('tbl_persiapan_dokumen_pengadaan');
		$this->db->where('id_dokumen_persiapan', $id_dokumen_persiapan);
		$query = $this->db->get();
		return $query->row_array();
	}

	// get Rencana Dokumen by id
	public function getDokumenRencana($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_persiapan_dokumen_pengadaan');
		$this->db->where('id_paket', $id_paket);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function create_DokumenRencana($data)
	{
		$this->db->insert('tbl_persiapan_dokumen_pengadaan', $data);
		return $this->db->affected_rows();
	}
	// HAPUS Rencana Dokumen
	public function deletedata_DokumenRencana($id_dokumen_persiapan)
	{
		$this->db->delete('tbl_persiapan_dokumen_pengadaan', ['id_dokumen_persiapan' => $id_dokumen_persiapan]);
	}

	public function get_row_panitia($id_paketnya)
	{
		$this->db->select('*');
		$this->db->from('tbl_panitia_mengikuti_paket');
		$this->db->join('tbl_paket', 'tbl_paket.id_paket = tbl_panitia_mengikuti_paket.status_panitia_id_paket', 'left');
		$this->db->join('tbl_detail_panitia', 'tbl_detail_panitia.id_panitia = tbl_panitia_mengikuti_paket.status_panitia_id_detail_panitia', 'left');
		$this->db->join('tbl_panitia', 'tbl_panitia.id_panitia = tbl_detail_panitia.id_panitia', 'left');
		$this->db->join('tbl_pegawai', 'tbl_pegawai.id_pegawai = tbl_detail_panitia.id_pegawai2', 'left');
		$this->db->where('tbl_panitia_mengikuti_paket.status_panitia_id_paket', $id_paketnya);
		$data = $this->db->get();
		return $data->row_array();
	}
	public function get_row_paket_panitia($id_paketnya)
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_paket', $id_paketnya);
		$data = $this->db->get();
		return $data->row_array();
	}
	public function get_res_panitia()
	{
		$this->db->select('*');
		$this->db->from('tbl_panitia_mengikuti_paket');
		$data = $this->db->get();
		return $data->result_array();
	}

	var $table4 = 'tbl_panitia';
	var $column_order4 = array('id_panitia', 'nama_panitia');
	var $column_order5 = array('id_pegawai', 'nama_pegawai');
	var $order4 = array('id_panitia', 'nama_panitia');
	var $order5 = array('id_pegawai', 'nama_pegawai', 'username', 'nip');


	private function _get_data_query4()
	{
		$this->db->select('*');
		$this->db->from('tbl_panitia');
		$this->db->join('tbl_provinsi', 'id_provinsi', 'left');
		$this->db->join('tbl_kabupaten', 'id_kabupaten', 'left');
		$this->db->join('tbl_detail_panitia', 'id_panitia', 'left');
		$this->db->join('tbl_pegawai', 'tbl_detail_panitia.id_pegawai2 = tbl_pegawai.id_pegawai', 'left');
		$this->db->join('tbl_unit_kerja', 'tbl_panitia.id_unit_kerja = tbl_unit_kerja.id_unit_kerja', 'left');
		$this->db->join('tbl_panitia_mengikuti_paket', 'tbl_panitia_mengikuti_paket.status_panitia_id_detail_panitia = tbl_panitia.id_panitia', 'left');
		$this->db->group_by('id_panitia');

		if (isset($_POST['search']['value'])) {
			$this->db->like('nama_panitia', $_POST['search']['value']);
		}

		if (isset($_POST['order'])) {
			$this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_panitia', 'DESC');
		}
	}
	// get datanya panitia
	public function getdatatable4()
	{
		$this->_get_data_query4();
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function count_filtered_data4()
	{
		$this->_get_data_query4();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data4()
	{
		$this->db->from('tbl_panitia');
		return $this->db->count_all_results();
	}

	// versi admin
	private function _get_data_query44()
	{
		$this->db->select('*');
		$this->db->from('tbl_panitia');
		$this->db->join('tbl_provinsi', 'id_provinsi', 'left');
		$this->db->join('tbl_kabupaten', 'id_kabupaten', 'left');
		$this->db->join('tbl_detail_panitia', 'id_panitia', 'left');
		$this->db->join('tbl_pegawai', 'tbl_detail_panitia.id_pegawai2 = tbl_pegawai.id_pegawai', 'left');
		$this->db->join('tbl_unit_kerja', 'tbl_panitia.id_unit_kerja = tbl_unit_kerja.id_unit_kerja', 'left');
		$this->db->join('tbl_panitia_mengikuti_paket', 'tbl_panitia_mengikuti_paket.status_panitia_id_detail_panitia = tbl_panitia.id_panitia', 'left');
		$this->db->where('status_penunjukan_langsung_panitia', 1);
		$this->db->group_by('id_panitia');
		if (isset($_POST['search']['value'])) {
			$this->db->like('nama_panitia', $_POST['search']['value']);
		}

		if (isset($_POST['order'])) {
			$this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_panitia', 'DESC');
		}
	}
	// get datanya panitia
	public function getdatatable4_4()
	{
		$this->_get_data_query44();
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}


	public function count_filtered_data44()
	{
		$this->_get_data_query44();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data44()
	{
		$this->db->from('tbl_panitia');
		return $this->db->count_all_results();
	}


	//get panitia buat agency

	// versi agency
	private function _get_data_query55($agency)
	{

		$this->db->select('*');
		$this->db->from('tbl_panitia');
		$this->db->join('tbl_provinsi', 'id_provinsi', 'left');
		$this->db->join('tbl_kabupaten', 'id_kabupaten', 'left');
		$this->db->join('tbl_detail_panitia', 'id_panitia', 'left');
		$this->db->join('tbl_pegawai', 'tbl_detail_panitia.id_pegawai2 = tbl_pegawai.id_pegawai', 'left');
		$this->db->join('tbl_unit_kerja', 'tbl_panitia.id_unit_kerja = tbl_unit_kerja.id_unit_kerja', 'left');
		$this->db->join('tbl_panitia_mengikuti_paket', 'tbl_panitia_mengikuti_paket.status_panitia_id_detail_panitia = tbl_panitia.id_panitia', 'left');
		$this->db->where('tbl_panitia.id_unit_kerja', $agency);
		$this->db->where('status_penunjukan_langsung_panitia', 1);
		$this->db->group_by('id_panitia');

		if (isset($_POST['search']['value'])) {
			$this->db->like('nama_panitia', $_POST['search']['value']);
		}

		if (isset($_POST['order'])) {
			$this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_panitia', 'DESC');
		}
	}
	// get datanya panitia
	public function getdatatable5_5($agency)
	{
		$this->_get_data_query55($agency);
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}


	public function count_filtered_data55($agency)
	{
		$this->db->from('tbl_panitia');
		$this->db->where('id_unit_kerja', $agency);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data55($agency)
	{
		$this->db->from('tbl_panitia');
		$this->db->where('tbl_panitia.id_unit_kerja', $agency);
		return $this->db->count_all_results();
	}


	private function _get_data_query5($agency)
	{

		$this->db->select('*');
		$this->db->from('tbl_panitia');
		$this->db->join('tbl_provinsi', 'id_provinsi', 'left');
		$this->db->join('tbl_kabupaten', 'id_kabupaten', 'left');
		$this->db->join('tbl_detail_panitia', 'id_panitia', 'left');
		$this->db->join('tbl_pegawai', 'tbl_detail_panitia.id_pegawai2 = tbl_pegawai.id_pegawai', 'left');
		$this->db->join('tbl_unit_kerja', 'tbl_panitia.id_unit_kerja = tbl_unit_kerja.id_unit_kerja', 'left');
		$this->db->join('tbl_panitia_mengikuti_paket', 'tbl_panitia_mengikuti_paket.status_panitia_id_detail_panitia = tbl_panitia.id_panitia', 'left');
		$this->db->where('tbl_panitia.id_unit_kerja', $agency);
		$this->db->group_by('id_panitia');

		if (isset($_POST['search']['value'])) {
			$this->db->like('nama_panitia', $_POST['search']['value']);
		}

		if (isset($_POST['order'])) {
			$this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_panitia', 'DESC');
		}
	}
	// get datanya panitia
	public function getdatatable5($agency)
	{
		$this->_get_data_query5($agency);
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function count_filtered_data5($agency)
	{
		$this->db->from('tbl_panitia');
		$this->db->where('id_unit_kerja', $agency);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data5($agency)
	{
		$this->db->from('tbl_panitia');
		$this->db->where('tbl_panitia.id_unit_kerja', $agency);
		return $this->db->count_all_results();
	}

	// PILIH PENYEDIA
	// list data penyedia
	private function _get_data_query_list_all_vendor()
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor');
		$this->db->join('tbl_vendor_identitas_prusahaan', 'tbl_vendor.id_vendor = tbl_vendor_identitas_prusahaan.id_vendor', 'left');
		$this->db->join('tbl_provinsi', 'tbl_vendor_identitas_prusahaan.id_provinsi = tbl_provinsi.id_provinsi', 'left');
		$this->db->join('tbl_kabupaten', 'tbl_vendor_identitas_prusahaan.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
		$this->db->where('tbl_vendor.status_aktive_vendor', 1);
		$this->db->where('tbl_vendor.status_daftar_hitam_vendor', 0);
		$this->db->where('tbl_vendor.status_vendor_baru', null);
		$this->db->group_by('tbl_vendor.id_vendor');
		if (isset($_POST['search']['value'])) {
			$this->db->like('tbl_vendor.username_vendor', $_POST['search']['value']);
		}

		if (isset($_POST['order'])) {
			$this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('tbl_vendor.id_vendor', 'DESC');
		}
	}

	public function getdatatable_list_all_vendor()
	{
		$this->_get_data_query_list_all_vendor();
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function count_filtered_data_all_vendor_list_all_vendor()
	{
		$this->_get_data_query_list_all_vendor();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data_all_vendor_list_all_vendor()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
	// table vendor lama terpilih
	private function _get_data_query_list_all_vendor_terpilih($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor_mengikuti_paket');
		$this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_mengikuti_vendor = tbl_vendor.id_vendor', 'left');
		$this->db->join('tbl_vendor_identitas_prusahaan', 'tbl_vendor.id_vendor = tbl_vendor_identitas_prusahaan.id_vendor', 'left');
		$this->db->join('tbl_provinsi', 'tbl_vendor_identitas_prusahaan.id_provinsi = tbl_provinsi.id_provinsi', 'left');
		$this->db->join('tbl_kabupaten', 'tbl_vendor_identitas_prusahaan.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
		$this->db->where('tbl_vendor.status_aktive_vendor', 1);
		$this->db->where('tbl_vendor.status_daftar_hitam_vendor', 0);
		$this->db->where('tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', $id_paket);
		if (isset($_POST['search']['value'])) {
			$this->db->like('tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', $_POST['search']['value']);
		}

		if (isset($_POST['order'])) {
			$this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', 'DESC');
		}
	}

	public function getdatatable_list_all_vendor_terpilih($id_paket)
	{
		$this->_get_data_query_list_all_vendor_terpilih($id_paket);
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function count_filtered_data_all_vendor_list_all_vendor_terpilih($id_paket)
	{
		$this->_get_data_query_list_all_vendor_terpilih($id_paket);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data_all_vendor_list_all_vendor_terpilih()
	{
		$this->db->from('tbl_vendor_mengikuti_paket');
		return $this->db->count_all_results();
	}


	// table vendor baru
	private function _get_data_query_list_all_vendor_baru($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor_mengikuti_paket');
		$this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_mengikuti_vendor = tbl_vendor.id_vendor', 'left');
		$this->db->join('tbl_vendor_identitas_prusahaan', 'tbl_vendor.id_vendor = tbl_vendor_identitas_prusahaan.id_vendor', 'left');
		$this->db->join('tbl_provinsi', 'tbl_vendor_identitas_prusahaan.id_provinsi = tbl_provinsi.id_provinsi', 'left');
		$this->db->join('tbl_kabupaten', 'tbl_vendor_identitas_prusahaan.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
		$this->db->where('tbl_vendor.status_aktive_vendor', 1);
		$this->db->where('tbl_vendor.status_daftar_hitam_vendor', 0);
		$this->db->where('tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', $id_paket);
		if (isset($_POST['search']['value'])) {
			$this->db->like('tbl_vendor_mengikuti_paket.id_mengikuti_vendor', $_POST['search']['value']);
		}

		if (isset($_POST['order'])) {
			$this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('tbl_vendor_mengikuti_paket.id_mengikuti_vendor', 'DESC');
		}
	}

	public function getdatatable_list_all_vendor_baru($id_paket)
	{
		$this->_get_data_query_list_all_vendor_baru($id_paket);
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function count_filtered_data_all_vendor_list_all_vendor_baru($id_paket)
	{
		$this->_get_data_query_list_all_vendor_baru($id_paket);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data_all_vendor_list_all_vendor_baru()
	{
		$this->db->from('tbl_vendor_mengikuti_paket');
		return $this->db->count_all_results();
	}

	// vbyid_vendor lama terpilih
	public function get_by_id_vendor_lama($id_mengikuti_vendor)
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor');
		$this->db->join('tbl_vendor_identitas_prusahaan', 'tbl_vendor.id_vendor = tbl_vendor_identitas_prusahaan.id_vendor', 'left');
		$this->db->join('tbl_provinsi', 'tbl_vendor_identitas_prusahaan.id_provinsi = tbl_provinsi.id_provinsi', 'left');
		$this->db->join('tbl_kabupaten', 'tbl_vendor_identitas_prusahaan.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
		$this->db->where('tbl_vendor.status_aktive_vendor', 1);
		$this->db->where('tbl_vendor.status_daftar_hitam_vendor', 0);
		$this->db->where('tbl_vendor.id_vendor', $id_mengikuti_vendor);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function get_by_id_vendor_baru($id_mengikuti_vendor)
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor_mengikuti_paket');
		$this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_mengikuti_vendor = tbl_vendor.id_vendor', 'left');
		$this->db->join('tbl_vendor_identitas_prusahaan', 'tbl_vendor.id_vendor = tbl_vendor_identitas_prusahaan.id_vendor', 'left');
		$this->db->join('tbl_provinsi', 'tbl_vendor_identitas_prusahaan.id_provinsi = tbl_provinsi.id_provinsi', 'left');
		$this->db->join('tbl_kabupaten', 'tbl_vendor_identitas_prusahaan.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
		$this->db->where('tbl_vendor.status_aktive_vendor', 1);
		$this->db->where('tbl_vendor.status_daftar_hitam_vendor', 0);
		$this->db->where('tbl_vendor_mengikuti_paket.id_mengikuti_vendor', $id_mengikuti_vendor);
		$query = $this->db->get();
		return $query->row_array();
	}
	// edit transaksi langsung vendor baru
	public function update_vendor_baru($where, $data)
	{
		$this->db->update('tbl_vendor', $data, $where);
		return $this->db->affected_rows();
	}

	public function update_berhasil_di_tunjuk_transaksi_langsung($data, $where)
	{
		$this->db->update('tbl_vendor_mengikuti_paket', $data, $where);
		return $this->db->affected_rows();
	}

	public function buat_alasan_paket_batal($data, $where)
	{
		$this->db->update('tbl_paket', $data, $where);
		return $this->db->affected_rows();
	}
	public function status_vendor($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor_mengikuti_paket');
		$this->db->where('tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', $id_paket);
		$query = $this->db->get();
		return $query->row_array();
	}


	public function delete_vendor_baru3($id_mengikuti_paket_vendor)
	{
		$this->db->delete('tbl_vendor_mengikuti_paket', ['id_mengikuti_paket_vendor' => $id_mengikuti_paket_vendor]);
		return $this->db->affected_rows();
	}
	public function delete_vendor_baru2($id_mengikuti_vendor)
	{
		$this->db->delete('tbl_vendor_mengikuti_paket', ['id_mengikuti_vendor' => $id_mengikuti_vendor]);
		return $this->db->affected_rows();
	}
	public function delete_vendor_baru1($id_mengikuti_vendor)
	{
		$this->db->delete('tbl_vendor', ['id_vendor' => $id_mengikuti_vendor]);
		return $this->db->affected_rows();
	}

	// Transaksi Langsung Upload Dokumen Pengadaaan
	public function tambah_dokumen_pengadaan_transaksi_lansung($data)
	{
		$this->db->insert('tbl_transaksi_langsung_dokumen_pengadaan', $data);
		return $this->db->affected_rows();
	}

	// table dokumen pengadaan trankasi langsung
	var $dokumen_pengadaan = array('id_dokumen_pengadaan_transaksi_langsung', 'nama_file_dokumen_pengadaan',  'id_dokumen_pengadaan_transaksi_langsung', 'id_dokumen_pengadaan_transaksi_langsung');
	private function _get_data_query_dokumen_pengadaan_transaksi_langsung($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_transaksi_langsung_dokumen_pengadaan');
		$this->db->where('tbl_transaksi_langsung_dokumen_pengadaan.id_paket', $id_paket);
		$i = 0;
		foreach ($this->dokumen_pengadaan as $item) // looping awal
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

				if (count($this->dokumen_pengadaan) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}

		if (isset($_POST['order'])) {
			$this->db->order_by($this->dokumen_pengadaan[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('tbl_transaksi_langsung_dokumen_pengadaan.id_dokumen_pengadaan_transaksi_langsung', 'DESC');
		}
	}

	public function getdatatable_dokumen_pengadaan_transaksi_langsung($id_paket)
	{
		$this->_get_data_query_dokumen_pengadaan_transaksi_langsung($id_paket);
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function count_filtered_data_dokumen_pengadaan_transaksi_langsung($id_paket)
	{
		$this->_get_data_query_dokumen_pengadaan_transaksi_langsung($id_paket);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data_dokumen_pengadaan_transaksi_langsung()
	{
		$this->db->from('tbl_vendor_mengikuti_paket');
		return $this->db->count_all_results();
	}

	public function by_id_dokumen_pengadaan_transaksi_langsung($id_dokumen_pengadaan_transaksi_langsung)
	{
		$this->db->select('*');
		$this->db->from('tbl_transaksi_langsung_dokumen_pengadaan');
		$this->db->where('tbl_transaksi_langsung_dokumen_pengadaan.id_dokumen_pengadaan_transaksi_langsung', $id_dokumen_pengadaan_transaksi_langsung);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function delete_dokumen_pengadaan_transaksi_langsung($id_dokumen_pengadaan_transaksi_langsung)
	{
		$this->db->delete('tbl_transaksi_langsung_dokumen_pengadaan', ['id_dokumen_pengadaan_transaksi_langsung' => $id_dokumen_pengadaan_transaksi_langsung]);
	}

	// JADWAL TRANSAKSI LANGSUNG
	private function _get_data_query_jadwal_transaksi_langsung()
	{
		$this->db->from('tbl_trankasi_langsung_jadwal');
		if (isset($_POST['search']['value'])) {
			$this->db->like('nama_jadwal_transaksi_langsung', $_POST['search']['value']);
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_jadwal_transaksi_langsung', 'ASC');
		}
	}

	public function getdatatable_jadwal_transaksi_langsung()
	{
		$this->_get_data_query_jadwal_transaksi_langsung();
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_data_jadwal_transaksi_langsung()
	{
		$this->_get_data_query_jadwal_transaksi_langsung();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data_jadwal_transaksi_langsung()
	{
		$this->db->from('tbl_trankasi_langsung_jadwal');
		return $this->db->count_all_results();
	}
	public function result_data_jadwal()
	{
		$this->db->select('*');
		$this->db->from('tbl_trankasi_langsung_jadwal');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function result_data_jadwal_detail($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_trankasi_langsung_jadwal_detail');
		$this->db->where('id_paket', $id_paket);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function result_data_jadwal_detail_penunjukan_langsung($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_jadwal_tender_detail');
		$this->db->where('id_paket', $id_paket);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function result_data_jadwal_detail2($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_penetapan_langsung_jadwal_detail');
		$this->db->where('id_paket', $id_paket);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function update_jadwal_transaksi_langsung($data, $where)
	{
		$this->db->where($where)
			->update('tbl_trankasi_langsung_jadwal_detail', $data);
		return $this->db->affected_rows();
	}

	public function update_kategori_penyedia($data, $where)
	{
		$this->db->where($where)->update('tbl_paket', $data);
		return $this->db->affected_rows();
	}
	public function update_vendr($data, $where)
	{
		$this->db->where($where)->update('tbl_vendor', $data);
		return $this->db->affected_rows();
	}
	public function vendor_terpilih($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor_mengikuti_paket');
		$this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_mengikuti_vendor = tbl_vendor.id_vendor', 'left');
		$this->db->join('tbl_vendor_identitas_prusahaan', 'tbl_vendor.id_vendor = tbl_vendor_identitas_prusahaan.id_vendor', 'left');
		$this->db->join('tbl_provinsi', 'tbl_vendor_identitas_prusahaan.id_provinsi = tbl_provinsi.id_provinsi', 'left');
		$this->db->join('tbl_kabupaten', 'tbl_vendor_identitas_prusahaan.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
		$this->db->where('tbl_vendor.status_aktive_vendor', 1);
		$this->db->where('tbl_vendor.status_daftar_hitam_vendor', 0);
		$this->db->where('tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', $id_paket);
		$this->db->group_by('tbl_vendor_mengikuti_paket.id_mengikuti_vendor');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function vendor_terpilih_detail($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor_mengikuti_paket');
		$this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_mengikuti_vendor = tbl_vendor.id_vendor', 'left');
		$this->db->join('tbl_vendor_identitas_prusahaan', 'tbl_vendor.id_vendor = tbl_vendor_identitas_prusahaan.id_vendor', 'left');
		$this->db->join('tbl_provinsi', 'tbl_vendor_identitas_prusahaan.id_provinsi = tbl_provinsi.id_provinsi', 'left');
		$this->db->join('tbl_kabupaten', 'tbl_vendor_identitas_prusahaan.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
		$this->db->where('tbl_vendor.status_aktive_vendor', 1);
		$this->db->where('tbl_vendor.status_daftar_hitam_vendor', 0);
		$this->db->where('tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', $id_paket);
		$query = $this->db->get();
		return $query->row_array();
	}

	// notifikasi manager
	public function total_notif_manager()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', $this->session->userdata('id_unit_kerja2'));
		$this->db->where('notifikasi_manager', 1);
		return $this->db->count_all_results();
	}
	public function update_sudah_dibaca_manager($where, $data)
	{
		$this->db->update('tbl_paket', $data, $where);
		return $this->db->affected_rows();
	}

	public function get_jadwal_transaksi_langsung($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_trankasi_langsung_jadwal_detail WHERE id_paket = $id_paket ORDER BY id_jadwal_transaksi_langsung_detail ASC");
		return $query->result_array();
	}
	// INI UNTUK TUTUP TAHAP TRANSAKSI LANGSUNG
	public function get_tahap_download_dokumen_transaksi_langsung($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_trankasi_langsung_jadwal_detail WHERE id_paket = $id_paket AND nama_jadwal_transaksi_langsung_detail = 'Download Dokumen'");
		return $query->row_array();
	}
	public function get_tahap_upload_penawaran_transaksi_langsung($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_trankasi_langsung_jadwal_detail WHERE id_paket = $id_paket AND nama_jadwal_transaksi_langsung_detail = 'Upload Dokumen Penawaran'");
		return $query->row_array();
	}
	public function get_tahap_negosiasi_transaksi_langsung($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_trankasi_langsung_jadwal_detail WHERE id_paket = $id_paket AND nama_jadwal_transaksi_langsung_detail = 'Negosiasi'");
		return $query->row_array();
	}
	public function get_tahap_upload_ba_nego($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_trankasi_langsung_jadwal_detail WHERE id_paket = $id_paket AND nama_jadwal_transaksi_langsung_detail = 'Upload Berita Acara Negosiasi'");
		return $query->row_array();
	}

	public function get_tahap_penetapan_pemenang($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_trankasi_langsung_jadwal_detail WHERE id_paket = $id_paket AND nama_jadwal_transaksi_langsung_detail = 'Penetapan Pemenang'");
		return $query->row_array();
	}
	public function get_tahap_pengumuman_pemenang($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_trankasi_langsung_jadwal_detail WHERE id_paket = $id_paket AND nama_jadwal_transaksi_langsung_detail = 'Pengumuman Pemenang'");
		return $query->row_array();
	}


	// INI TAHAP UNTUK PENETAPAN LANGSUNG
	public function get_tahap_download_dokumen_penetapan_langsung($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_penetapan_langsung_jadwal_detail WHERE id_paket = $id_paket AND nama_jadwal_penetapan_langsung_detail = 'Download Dokumen'");
		return $query->row_array();
	}
	public function get_tahap_negosiasi_penetapan_langsung($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_penetapan_langsung_jadwal_detail WHERE id_paket = $id_paket AND nama_jadwal_penetapan_langsung_detail = 'Negosiasi'");
		return $query->row_array();
	}
	public function get_tahap_penetapan_pemenang_penetapan_langsung($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_penetapan_langsung_jadwal_detail WHERE id_paket = $id_paket AND nama_jadwal_penetapan_langsung_detail = 'Penetapan Pemenang'");
		return $query->row_array();
	}


	public function get_jadwal_penetapan_langsung($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_penetapan_langsung_jadwal_detail WHERE id_paket = $id_paket ORDER BY id_jadwal_penetapan_langsung ASC");
		return $query->result_array();
	}
	// INI UNTUK UPLOAD BUKTI NEGOSIASI VENDOR


	var $nego_ba_transaksi = array('id_negosisasi_vendor', 'username_vendor', 'nama_file_negosiasi',  'file_negosisasi', 'waktu_kirim');

	private function _get_data_query_bukti_negosiasi_transaksi_langsung_vendor($id_paket)
	{
		$this->db->from('tbl_vendor_mengikuti_paket');
		$this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_mengikuti_vendor = tbl_vendor.id_vendor', 'left');
		$this->db->join('tbl_vendor_identitas_prusahaan', 'tbl_vendor.id_vendor = tbl_vendor_identitas_prusahaan.id_vendor', 'left');
		$this->db->join('tbl_transaksi_langsung_bukti_negosiasi', 'tbl_vendor.id_vendor = tbl_transaksi_langsung_bukti_negosiasi.id_vendor', 'left');
		$this->db->where('tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', $id_paket);
		$this->db->where('tbl_transaksi_langsung_bukti_negosiasi.id_paket', $id_paket);
		$this->db->group_by('tbl_transaksi_langsung_bukti_negosiasi.id_negosisasi_vendor');
		$i = 0;
		foreach ($this->nego_ba_transaksi as $item) // looping awal
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

				if (count($this->nego_ba_transaksi) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->nego_ba_transaksi[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('tbl_transaksi_langsung_bukti_negosiasi.id_negosisasi_vendor', 'DESC');
		}
	}

	public function getdatatbl_bukti_negosiasi_transaksi_langsung_vendor($id_paket)
	{
		$this->_get_data_query_bukti_negosiasi_transaksi_langsung_vendor($id_paket);
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function count_filtered_data_bukti_negosiasi_transaksi_langsung_vendor($id_paket)
	{
		$this->_get_data_query_bukti_negosiasi_transaksi_langsung_vendor($id_paket);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data_bukti_negosiasi_transaksi_langsung_vendor($id_paket)
	{
		$this->db->from('tbl_transaksi_langsung_bukti_negosiasi');
		$this->db->where('tbl_transaksi_langsung_bukti_negosiasi.id_paket', $id_paket);
		return $this->db->count_all_results();
	}

	// get all vendor pemenang 
	public function penetapan_pemenang($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor_mengikuti_paket');
		$this->db->join('tbl_vendor', 'tbl_vendor.id_vendor = tbl_vendor_mengikuti_paket.id_mengikuti_vendor', 'left');
		$this->db->join('tbl_vendor_identitas_prusahaan', 'tbl_vendor.id_vendor = tbl_vendor_identitas_prusahaan.id_vendor', 'left');
		$this->db->join('tbl_provinsi', 'tbl_vendor_identitas_prusahaan.id_provinsi = tbl_provinsi.id_provinsi', 'left');
		$this->db->join('tbl_kabupaten', 'tbl_vendor_identitas_prusahaan.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
		$this->db->join('tbl_paket', 'tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor = tbl_paket.id_paket', 'left');
		$this->db->join('tbl_unit_kerja', 'tbl_paket.id_unit_kerja = tbl_unit_kerja.id_unit_kerja', 'left');
		$this->db->join('tbl_metode_pemilihan', 'tbl_paket.id_metode_pemilihan = tbl_metode_pemilihan.id_metode_pemilihan', 'left');
		$this->db->where('tbl_vendor.status_aktive_vendor', 1);
		$this->db->where('tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', $id_paket);
		$query = $this->db->get();
		return $query->row_array();
	}

	// INI UNTUK PENETAPAN PEMENANG
	private function _get_data_query_penetapan_pemenang($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_penetapan_pemenang');
		$this->db->where('tbl_penetapan_pemenang.id_paket', $id_paket);
		if (isset($_POST['search']['value'])) {
			$this->db->like('tbl_penetapan_pemenang.nama_surat_penetapan_pemenang', $_POST['search']['value']);
		}

		if (isset($_POST['order'])) {
			$this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('tbl_penetapan_pemenang.id_penetapan_pemenanag', 'DESC');
		}
	}

	public function get_datatable_penetapan_pemenang($id_paket)
	{
		$this->_get_data_query_penetapan_pemenang($id_paket);
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function count_filtered_data_penetapan_pemenang($id_paket)
	{
		$this->_get_data_query_penetapan_pemenang($id_paket);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data_penetapan_pemenang($id_paket)
	{
		$this->db->from('tbl_penetapan_pemenang');
		$this->db->where('tbl_penetapan_pemenang.id_paket', $id_paket);
		return $this->db->count_all_results();
	}

	public function by_id_penetapan_pemenang($id_penetapan_pemenanag)
	{
		$this->db->select('*');
		$this->db->from('tbl_penetapan_pemenang');
		$this->db->where('tbl_penetapan_pemenang.id_penetapan_pemenanag', $id_penetapan_pemenanag);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function delete_penetapan_pemenang($id_penetapan_pemenanag)
	{
		$this->db->delete('tbl_penetapan_pemenang', ['id_penetapan_pemenanag' => $id_penetapan_pemenanag]);
	}
	public function tambah_penetapan_langsung($data)
	{
		$this->db->insert('tbl_penetapan_pemenang', $data);
		return $this->db->affected_rows();
	}

	public function ambil_vendor($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor_mengikuti_paket');
		$this->db->join('tbl_vendor', 'tbl_vendor.id_vendor = tbl_vendor_mengikuti_paket.id_mengikuti_vendor', 'left');
		$this->db->where('tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', $id_paket);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function ambil_paket($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->join('tbl_metode_pemilihan', 'tbl_metode_pemilihan.id_metode_pemilihan = tbl_paket.id_metode_pemilihan', 'left');
		$this->db->where('tbl_paket.id_paket', $id_paket);
		$query = $this->db->get();
		return $query->row_array();
	}
	public function get_pegawai($divisi)
	{
		$this->db->select('*');
		$this->db->from('tbl_pegawai');
		$this->db->where('tbl_pegawai.id_unit_kerja2', $divisi);
		$this->db->where('id_role', 6);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function get_pegawai_agency($divisi)
	{
		$this->db->select('*');
		$this->db->from('tbl_pegawai');
		$this->db->where('tbl_pegawai.id_unit_kerja2', $divisi);
		$this->db->where('id_role', 2);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function dokumen_pengadaan($id_paket)
	{
		$this->db->from('tbl_transaksi_langsung_dokumen_pengadaan');
		$this->db->where('tbl_transaksi_langsung_dokumen_pengadaan.id_paket', $id_paket);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function ba_negosiasi($id_paket)
	{
		$this->db->from('tbl_vendor_mengikuti_paket');
		$this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_mengikuti_vendor = tbl_vendor.id_vendor', 'left');
		$this->db->join('tbl_vendor_identitas_prusahaan', 'tbl_vendor.id_vendor = tbl_vendor_identitas_prusahaan.id_vendor', 'left');
		$this->db->join('tbl_transaksi_langsung_bukti_negosiasi', 'tbl_vendor.id_vendor = tbl_transaksi_langsung_bukti_negosiasi.id_vendor', 'left');
		$this->db->where('tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', $id_paket);
		$this->db->where('tbl_transaksi_langsung_bukti_negosiasi.id_paket', $id_paket);
		$this->db->group_by('tbl_transaksi_langsung_bukti_negosiasi.id_negosisasi_vendor');
		$query = $this->db->get();
		return $query->result_array();
	}




	// INI UNTUK PENETAPAN LANGSUNG BUAT ADMIN
	var $order_admin_penetapan_rup = array(
		'id_paket', 'kode_tender', 'nama_metode_pemilihan', 'status_paket_tender', 'tanggal_buat_rup',
		'tanggal_buat_paket_tender', 'nama_unit_kerja', 'id_paket'
	);
	private function _get_data_query_paket_tender_penetapan_langsung()
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
		$this->db->where('tbl_paket.id_metode_pemilihan', 9);
		if (isset($_POST['id_unit_kerja'], $_POST['id_jenis_pengadaan']) && $_POST['id_unit_kerja'] != '' && $_POST['id_jenis_pengadaan'] != '') {
			$this->db->like('tbl_paket.id_unit_kerja', $_POST['id_unit_kerja']);
			$this->db->like('tbl_paket.id_jenis_pengadaan', $_POST['id_jenis_pengadaan']);
		}
		$i = 0;
		foreach ($this->order_admin_penetapan_rup as $item) // looping awal
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

				if (count($this->order_admin_penetapan_rup) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->order_admin_penetapan_rup[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_paket', 'DESC');
		}
	}

	public function getdatatable_paket_tender_penetapan_langsung() //nam[ilin data pake ini
	{
		$this->_get_data_query_paket_tender_penetapan_langsung(); //ambil data dari get yg di atas
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_data_paket_tender_penetapan_langsung()
	{
		$this->_get_data_query_paket_tender_penetapan_langsung(); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data_paket_tender_penetapan_langsung()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}


	// BUAT AGENCY
	private function _get_data_query_paket_tender2_penetapan_langsung($role_agency, $area_agency)
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
		$this->db->where('tbl_paket.id_pegawai', $role_agency);
		$this->db->or_where('tbl_unit_kerja.id_unit_kerja', $area_agency);
		$this->db->where('tbl_paket.id_metode_pemilihan', 9);
		if (isset($_POST['id_unit_kerja'], $_POST['id_jenis_pengadaan']) && $_POST['id_unit_kerja'] != '' && $_POST['id_jenis_pengadaan'] != '') {
			$this->db->like('tbl_paket.id_unit_kerja', $_POST['id_unit_kerja']);
			$this->db->like('tbl_paket.id_jenis_pengadaan', $_POST['id_jenis_pengadaan']);
		}
		if (isset($_POST['search']['value'])) {
			$this->db->like('nama_paket', $_POST['search']['value']);
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_paket', 'DESC');
		}
	}

	public function getdatatable_paket_tender_agency_penetapan_langsung($role_agency, $area_agency) //nam[ilin data pake ini
	{
		$this->_get_data_query_paket_tender2_penetapan_langsung($role_agency, $area_agency); //ambil data dari get yg di atas
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_data_paket_agency_penetapan_langsung($role_agency, $area_agency)
	{
		$this->_get_data_query_paket_tender2_penetapan_langsung($role_agency, $area_agency); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data_paket_agency_penetapan_langsung()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	// ini untuk manager ketika ada paket penetapan baru
	private function _get_data_query_paket_tender2_penetapan_langsung_manager($role_agency, $area_agency)
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
		$this->db->where('tbl_paket.id_pegawai', $role_agency);
		$this->db->or_where('tbl_unit_kerja.id_unit_kerja', $area_agency);
		$this->db->where('tbl_paket.id_metode_pemilihan', 9);
		$this->db->where('tbl_paket.status_persetujuan_manager !=', 0);
		if (isset($_POST['id_unit_kerja'], $_POST['id_jenis_pengadaan']) && $_POST['id_unit_kerja'] != '' && $_POST['id_jenis_pengadaan'] != '') {
			$this->db->like('tbl_paket.id_unit_kerja', $_POST['id_unit_kerja']);
			$this->db->like('tbl_paket.id_jenis_pengadaan', $_POST['id_jenis_pengadaan']);
		}
		if (isset($_POST['search']['value'])) {
			$this->db->like('nama_paket', $_POST['search']['value']);
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_paket', 'DESC');
		}
	}
	public function getdatatable_paket_tender_agency_penetapan_langsung_manager($role_agency, $area_agency)
	{
		$this->_get_data_query_paket_tender2_penetapan_langsung_manager($role_agency, $area_agency);
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_data_paket_agency_penetapan_langsung_manager($role_agency, $area_agency)
	{
		$this->_get_data_query_paket_tender2_penetapan_langsung_manager($role_agency, $area_agency);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data_paket_agency_penetapan_langsung_manager()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
	public function total_nilai_hps_paket()
	{
		$this->db->select_sum('hps');
		$this->db->from('tbl_paket');
		$this->db->join('tbl_jenis_pengadaan', 'tbl_paket.id_jenis_pengadaan = tbl_jenis_pengadaan.id_jenis_pengadaan', 'left');
		$this->db->join('tbl_metode_pemilihan', 'tbl_paket.id_metode_pemilihan = tbl_metode_pemilihan.id_metode_pemilihan', 'left');
		$this->db->join('tbl_jadwal_tender_detail', 'tbl_paket.id_paket = tbl_jadwal_tender_detail.id_paket', 'left');
		$this->db->join('tbl_unit_kerja', 'tbl_paket.id_unit_kerja = tbl_unit_kerja.id_unit_kerja', 'left');
		$this->db->join('tbl_vendor_mengikuti_paket', 'tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', 'left');
		$this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_mengikuti_vendor = tbl_vendor.id_vendor', 'left');
		$this->db->join('tbl_sumber_dana', 'tbl_paket.id_paket = tbl_sumber_dana.id_paket');
		$query = $this->db->get();
		return $query->row_array();
	}

	public function total_nilai_hps_paket2()
	{
		$this->db->select_sum('hps');
		$this->db->from('tbl_paket');
		// 		$this->db->join('tbl_jenis_pengadaan', 'tbl_paket.id_jenis_pengadaan = tbl_jenis_pengadaan.id_jenis_pengadaan', 'left');
		// 		$this->db->join('tbl_metode_pemilihan', 'tbl_paket.id_metode_pemilihan = tbl_metode_pemilihan.id_metode_pemilihan', 'left');
		// 		$this->db->join('tbl_jadwal_tender_detail', 'tbl_paket.id_paket = tbl_jadwal_tender_detail.id_paket', 'left');
		// 		$this->db->join('tbl_unit_kerja', 'tbl_paket.id_unit_kerja = tbl_unit_kerja.id_unit_kerja', 'left');
		// $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', 'left');
		// $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_mengikuti_vendor = tbl_vendor.id_vendor', 'left');
		$this->db->join('tbl_sumber_dana', 'tbl_paket.id_paket = tbl_sumber_dana.id_paket');
		// $this->db->where('tbl_vendor_mengikuti_paket.pemenang_tender', 1);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		$query = $this->db->get();
		return $query->row_array();
	}
	public function total_nilai_negosiasi_paket()
	{
		$this->db->select_sum('negosiasi');
		$this->db->from('tbl_paket');
		$this->db->join('tbl_jenis_pengadaan', 'tbl_paket.id_jenis_pengadaan = tbl_jenis_pengadaan.id_jenis_pengadaan', 'left');
		$this->db->join('tbl_metode_pemilihan', 'tbl_paket.id_metode_pemilihan = tbl_metode_pemilihan.id_metode_pemilihan', 'left');
		$this->db->join('tbl_jadwal_tender_detail', 'tbl_paket.id_paket = tbl_jadwal_tender_detail.id_paket', 'left');
		$this->db->join('tbl_unit_kerja', 'tbl_paket.id_unit_kerja = tbl_unit_kerja.id_unit_kerja', 'left');
		$this->db->join('tbl_vendor_mengikuti_paket', 'tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', 'left');
		$this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_mengikuti_vendor = tbl_vendor.id_vendor', 'left');
		$this->db->join('tbl_sumber_dana', 'tbl_paket.id_paket = tbl_sumber_dana.id_paket');
		$this->db->where('tbl_vendor_mengikuti_paket.pemenang_tender =', 1);
		$query = $this->db->get();
		return $query->row_array();
	}
	public function total_nilai_negosiasi_paket2()
	{
		$this->db->select_sum('negosiasi');
		$this->db->from('tbl_paket');
		// 		$this->db->join('tbl_jenis_pengadaan', 'tbl_paket.id_jenis_pengadaan = tbl_jenis_pengadaan.id_jenis_pengadaan', 'left');
		// 		$this->db->join('tbl_metode_pemilihan', 'tbl_paket.id_metode_pemilihan = tbl_metode_pemilihan.id_metode_pemilihan', 'left');
		// 		$this->db->join('tbl_jadwal_tender_detail', 'tbl_paket.id_paket = tbl_jadwal_tender_detail.id_paket', 'left');
		// 		$this->db->join('tbl_unit_kerja', 'tbl_paket.id_unit_kerja = tbl_unit_kerja.id_unit_kerja', 'left');
		$this->db->join('tbl_vendor_mengikuti_paket', 'tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', 'left');
		$this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_mengikuti_vendor = tbl_vendor.id_vendor', 'left');
		$this->db->join('tbl_sumber_dana', 'tbl_paket.id_paket = tbl_sumber_dana.id_paket');
		$this->db->where('tbl_vendor_mengikuti_paket.pemenang_tender =', 1);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function get_sbu()
	{
		$query = $this->db->query("SELECT * FROM tbl_sbu");
		return $query->result_array();
	}


	// tender terbatas / pemilihan langsung
	private function _get_data_query_paket_tender_terbatas()
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
		$this->db->where_in('tbl_paket.id_metode_pemilihan', [4, 6]);
		$this->db->where('status_finalisasi_draft', 1);
		if (isset($_POST['id_unit_kerja'], $_POST['id_jenis_pengadaan']) && $_POST['id_unit_kerja'] != '' && $_POST['id_jenis_pengadaan'] != '') {
			$this->db->like('tbl_paket.id_unit_kerja', $_POST['id_unit_kerja']);
			$this->db->like('tbl_paket.id_jenis_pengadaan', $_POST['id_jenis_pengadaan']);
		}
		$i = 0;
		foreach ($this->search_tender_rup as $item) // looping awal
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

				if (count($this->search_tender_rup) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->order_admin_get_rup[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_paket', 'DESC');
		}
	}

	public function getdatatable_paket_tender_terbatas() //nam[ilin data pake ini
	{
		$this->_get_data_query_paket_tender_terbatas(); //ambil data dari get yg di atas
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_data_paket_tender_terbatas()
	{
		$this->_get_data_query_paket_tender(); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data_paket_tender_terbatas()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	private function _get_data_query_paket_tender2_terbatas($role_agency, $area_agency)
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
		$this->db->where('tbl_paket.id_pegawai', $role_agency);
		$this->db->or_where('tbl_unit_kerja.id_unit_kerja', $area_agency);
		$this->db->where_in('tbl_paket.id_metode_pemilihan', [4, 6]);
		$this->db->where('status_finalisasi_draft', 1);
		if (isset($_POST['id_unit_kerja'], $_POST['id_jenis_pengadaan']) && $_POST['id_unit_kerja'] != '' && $_POST['id_jenis_pengadaan'] != '') {
			$this->db->like('tbl_paket.id_unit_kerja', $_POST['id_unit_kerja']);
			$this->db->like('tbl_paket.id_jenis_pengadaan', $_POST['id_jenis_pengadaan']);
		}
		$i = 0;
		foreach ($this->order_agency_get_rup as $item) // looping awal
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

				if (count($this->order_agency_get_rup) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->order_agency_get_rup[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_paket', 'DESC');
		}
	}

	public function getdatatable_paket_tender_agency_terbatas($role_agency, $area_agency) //nam[ilin data pake ini
	{
		$this->_get_data_query_paket_tender2_terbatas($role_agency, $area_agency); //ambil data dari get yg di atas
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_data_paket_agency_terbatas($role_agency, $area_agency)
	{
		$this->_get_data_query_paket_tender2($role_agency, $area_agency); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data_paket_agency_terbatas()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
	public function update_perubahan_jadwal($where, $data)
	{
		$this->db->where('id_jadwal_transaksi_langsung_detail', $where);
		$this->db->update('tbl_trankasi_langsung_jadwal_detail', $data);
		return $this->db->affected_rows();
	}
	// update baru desember 2022
	public function sum_rincian_hps($id_paket)
	{
		$this->db->select_sum('total_rincian_hps_pdf');
		$this->db->where('id_paket', $id_paket);
		$this->db->from('tbl_rincian_hps_pdf');
		$query = $this->db->get();
		return $query->row_array();
	}



	// update upload_kontrak

	// RINCIAN HPS PDF
	var $pdf_dokumen_kontrak = array('id_dokumen_kontrak', 'nama_pengadaaan_kontrak', 'nama_file_dokumen_kontrak', 'file_dokumen_kontrak', 'id_dokumen_kontrak');
	private function _getDokumen_kontrak()
	{
		$this->db->select('*');
		$this->db->from('tbl_dokumen_kontrak');
		$this->db->join('tbl_unit_kerja', 'tbl_unit_kerja.id_unit_kerja = tbl_dokumen_kontrak.id_unit_kerja', 'left');
		if ($this->session->userdata('id_role') == 1) {
			if (isset($_POST['id_unit_kerja']) && $_POST['id_unit_kerja'] != '') {
				$this->db->like('tbl_dokumen_kontrak.id_unit_kerja', $_POST['id_unit_kerja']);
			}
		} else if ($this->session->userdata('id_role') == 2) {
			$this->db->where('tbl_dokumen_kontrak.id_unit_kerja', $this->session->userdata('id_unit_kerja2'));
		}
		$i = 0;
		foreach ($this->pdf_dokumen_kontrak as $item) // looping awal
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

				if (count($this->pdf_dokumen_kontrak) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->pdf_dokumen_kontrak[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_dokumen_kontrak', 'DESC');
		}
	}


	public function getdatatableDokumen_kontrak() //nam[ilin data pake ini
	{
		$this->_getDokumen_kontrak(); //ambil data dari get yg di atas
		if ($_POST['length'] != -3) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_Dokumen_kontrak()
	{
		$this->_getDokumen_kontrak(); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function count_all_dataDokumen_kontrak()
	{
		$this->db->from('tbl_dokumen_kontrak');
		if ($this->session->userdata('id_role') == 1) {
		} else if ($this->session->userdata('id_role') == 2) {
			$this->db->where('id_unit_kerja', $this->session->userdata('id_unit_kerja2'));
		}
		return $this->db->count_all_results();
	}
	public function create_dokumen_kontrak($data)
	{
		$this->db->insert('tbl_dokumen_kontrak', $data);
		return $this->db->affected_rows();
	}
	public function deletedata_dokumen_kontrak($id_dokumen_kontrak)
	{
		$this->db->delete('tbl_dokumen_kontrak', ['id_dokumen_kontrak' => $id_dokumen_kontrak]);
	}


	public function get_by_id_dokumen_kontrak($id_dokumen_kontrak)
	{
		$this->db->select('*');
		$this->db->from('tbl_dokumen_kontrak');
		$this->db->where('tbl_dokumen_kontrak.id_dokumen_kontrak', $id_dokumen_kontrak);
		$query = $this->db->get();
		return $query->row_array();
	}
}
