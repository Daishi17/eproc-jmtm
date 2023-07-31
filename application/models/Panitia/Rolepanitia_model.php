<?php

use phpDocumentor\Reflection\Types\Null_;

defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Rolepanitia_model extends CI_Model
{
	var $table = 'tbl_paket';
	var $colum_order = array('id_paket', 'nama_paket', 'kode_tender', 'nama_jenis_pengadaan', 'nama_metode_pemilihan', 'status_tahap_tender', 'id_paket', 'id_paket');
	var $order = array('id_paket', 'nama_paket', 'kode_tender', 'nama_jenis_pengadaan', 'nama_metode_pemilihan', 'status_tahap_tender', 'id_paket', 'id_paket');
	private function _get_data_query($role)
	{
		$i = 0;
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->join('tbl_unit_kerja', 'id_unit_kerja', 'left');
		$this->db->join('tbl_panitia', 'id_panitia', 'left');
		$this->db->join('tbl_detail_panitia', 'id_panitia', 'left');
		$this->db->join('tbl_jenis_pengadaan', 'id_jenis_pengadaan', 'left');
		$this->db->join('tbl_metode_pemilihan', 'tbl_paket.id_metode_pemilihan = tbl_metode_pemilihan.id_metode_pemilihan', 'left');
		$this->db->join('tbl_pegawai', 'tbl_paket.id_pegawai = tbl_detail_panitia.id_pegawai2', 'left');
		$this->db->where('tbl_detail_panitia.id_pegawai2', $role);
		$this->db->where('tbl_paket.kode_tender_random !=', NULL);
		$this->db->where('tbl_paket.id_metode_pemilihan !=', 9);
		$this->db->where('tbl_paket.id_metode_pemilihan !=', 8);
		$this->db->where('tbl_paket.id_metode_pemilihan !=', 10);
		$this->db->where('tbl_paket.id_metode_pemilihan !=', 4);
		$this->db->where('tbl_paket.id_metode_pemilihan !=', 6);
		if (isset($_POST['id_unit_kerja'], $_POST['id_jenis_pengadaan']) && $_POST['id_unit_kerja'] != '' && $_POST['id_jenis_pengadaan'] != '') {
			$this->db->like('tbl_paket.id_unit_kerja', $_POST['id_unit_kerja']);
			$this->db->like('tbl_paket.id_jenis_pengadaan', $_POST['id_jenis_pengadaan']);
		}
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
			$this->db->order_by('id_paket', 'DESC');
		}
	}

	public function getdatatable($role) //nam[ilin data pake ini
	{
		$this->_get_data_query($role); //ambil data dari get yg di atas
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_data($role)
	{
		$this->_get_data_query($role); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	private function _get_data_query2($role)
	{
		$i = 0;
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->join('tbl_unit_kerja', 'id_unit_kerja', 'left');
		$this->db->join('tbl_panitia', 'id_panitia', 'left');
		$this->db->join('tbl_detail_panitia', 'id_panitia', 'left');
		$this->db->join('tbl_jenis_pengadaan', 'id_jenis_pengadaan', 'left');
		$this->db->join('tbl_metode_pemilihan', 'tbl_paket.id_metode_pemilihan = tbl_metode_pemilihan.id_metode_pemilihan', 'left');
		$this->db->join('tbl_pegawai', 'tbl_paket.id_pegawai = tbl_detail_panitia.id_pegawai2', 'left');
		$this->db->where('tbl_detail_panitia.id_pegawai2', $role);
		$this->db->where('tbl_paket.kode_tender_random !=', NULL);
		$this->db->where('tbl_paket.id_metode_pemilihan', 8);
		$this->db->where('tbl_panitia.status_penunjukan_langsung_panitia', 1);
		$this->db->group_by('tbl_paket.id_paket');
		$this->db->where_not_in('tbl_paket.kode_tender_random', '');
		if (isset($_POST['id_unit_kerja'], $_POST['id_jenis_pengadaan']) && $_POST['id_unit_kerja'] != '' && $_POST['id_jenis_pengadaan'] != '') {
			$this->db->like('tbl_paket.id_unit_kerja', $_POST['id_unit_kerja']);
			$this->db->like('tbl_paket.id_jenis_pengadaan', $_POST['id_jenis_pengadaan']);
		}
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
			$this->db->order_by('id_paket', 'DESC');
		}
	}

	public function getdatatable2($role) //nam[ilin data pake ini
	{
		$this->_get_data_query2($role); //ambil data dari get yg di atas
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_data2($role)
	{
		$this->_get_data_query($role); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data2()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	private function _get_data_query3($role)
	{
		$i = 0;
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->join('tbl_unit_kerja', 'id_unit_kerja', 'left');
		$this->db->join('tbl_panitia', 'id_panitia', 'left');
		$this->db->join('tbl_detail_panitia', 'id_panitia', 'left');
		$this->db->join('tbl_jenis_pengadaan', 'id_jenis_pengadaan', 'left');
		$this->db->join('tbl_metode_pemilihan', 'tbl_paket.id_metode_pemilihan = tbl_metode_pemilihan.id_metode_pemilihan', 'left');
		$this->db->join('tbl_pegawai', 'tbl_paket.id_pegawai = tbl_detail_panitia.id_pegawai2', 'left');
		$this->db->where('tbl_detail_panitia.id_pegawai2', $role);
		$this->db->where('tbl_paket.kode_tender_random !=', NULL);
		$metopem = [4, 6];
		$this->db->where_in('tbl_paket.id_metode_pemilihan', $metopem);
		// $this->db->where('tbl_panitia.status_penunjukan_langsung_panitia', 1);
		$this->db->where('status_finalisasi_draft', 1);
		$this->db->where('status_soft_delete', 0);
		$this->db->group_by('tbl_paket.id_paket');
		$this->db->where_not_in('tbl_paket.kode_tender_random', '');
		if (isset($_POST['id_unit_kerja'], $_POST['id_jenis_pengadaan']) && $_POST['id_unit_kerja'] != '' && $_POST['id_jenis_pengadaan'] != '') {
			$this->db->like('tbl_paket.id_unit_kerja', $_POST['id_unit_kerja']);
			$this->db->like('tbl_paket.id_jenis_pengadaan', $_POST['id_jenis_pengadaan']);
		}
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
			$this->db->order_by('id_paket', 'DESC');
		}
	}

	public function getdatatable3($role) //nam[ilin data pake ini
	{
		$this->_get_data_query3($role); //ambil data dari get yg di atas
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_data3($role)
	{
		$this->_get_data_query3($role); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data3()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function getById_GET()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->join('tbl_unit_kerja', 'id_unit_kerja', 'left');
		$this->db->join('tbl_panitia', 'id_panitia', 'left');
		$this->db->join('tbl_detail_panitia', 'id_panitia', 'left');
		$this->db->join('tbl_pegawai', 'tbl_pegawai.id_pegawai = tbl_detail_panitia.id_pegawai2', 'left');
		$this->db->join('tbl_jenis_pengadaan', 'id_jenis_pengadaan', 'left');
		$this->db->join('tbl_metode_pemilihan', 'id_metode_pemilihan', 'left');
		$this->db->join('tbl_jadwal_kualifikasi', 'id_kualifikasi', 'left');
		$this->db->join('tbl_metode_dokumen', 'id_metode_dokumen', 'left');
		$this->db->join('tbl_metode_evaluasi', 'id_metode_evaluasi', 'left');
		$query = $this->db->get();
		return $query->row_array();
	}
	public function getById_GET_role_panitia($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_detail_panitia');
		$this->db->join('tbl_pegawai', 'tbl_detail_panitia.id_pegawai2 = tbl_pegawai.id_pegawai', 'left');
		$this->db->join('tbl_paket', 'id_panitia', 'left');
		$this->db->where('id_role_panitia', 1);
		$this->db->where('id_paket', $id_paket);
		$this->db->where('tbl_detail_panitia.id_pegawai2', $this->session->userdata('id_pegawai'));
		$query = $this->db->get();
		return $query->row_array();
	}

	public function getById_GET_role_panitia2($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_detail_panitia');
		$this->db->join('tbl_pegawai', 'tbl_detail_panitia.id_pegawai2 = tbl_pegawai.id_pegawai', 'left');
		$this->db->join('tbl_paket', 'id_panitia', 'left');
		$this->db->where('id_paket', $id_paket);
		$this->db->where('tbl_detail_panitia.id_pegawai2', $this->session->userdata('id_pegawai'));
		$query = $this->db->get();
		return $query->row_array();
	}
	public function getById($id_pegawai)
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->join('tbl_unit_kerja', 'id_unit_kerja', 'left');
		$this->db->join('tbl_panitia', 'id_panitia', 'left');
		$this->db->join('tbl_detail_panitia', 'id_panitia', 'left');
		$this->db->join('tbl_pegawai', 'tbl_detail_panitia.id_pegawai2 = tbl_pegawai.id_pegawai', 'left');
		$this->db->join('tbl_jenis_pengadaan', 'tbl_paket.id_jenis_pengadaan = tbl_jenis_pengadaan.id_jenis_pengadaan', 'left');
		$this->db->join('tbl_metode_pemilihan', 'tbl_paket.id_metode_pemilihan = tbl_metode_pemilihan.id_metode_pemilihan', 'left');
		$this->db->join('tbl_jenis_anggaran', 'tbl_jenis_anggaran.id_jenis_anggaran = tbl_paket.id_jenis_anggaran', 'left');
		$this->db->join('tbl_tahun_anggaran', 'tbl_tahun_anggaran.id_tahun_anggaran = tbl_paket.id_tahun_anggaran', 'left');
		$this->db->join('tbl_produk_dalam_luar_negri', 'tbl_produk_dalam_luar_negri.id_produk_dl_negri = tbl_paket.id_produk_dl_negri', 'left');
		$this->db->join('tbl_jadwal_kualifikasi', 'id_kualifikasi', 'left');
		$this->db->join('tbl_metode_dokumen', 'tbl_paket.id_metode_dokumen = tbl_metode_dokumen.id_metode_dokumen', 'left');
		$this->db->join('tbl_metode_evaluasi', 'id_metode_evaluasi', 'left');
		$this->db->where('tbl_paket.id_paket', $id_pegawai);
		$query = $this->db->get();
		return $query->row_array();
	}


	// public function result_paket($id_pegawai)
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('tbl_paket');
	// 	$this->db->join('tbl_unit_kerja', 'id_unit_kerja', 'left');
	// 	$this->db->join('tbl_panitia', 'id_panitia', 'left');
	// 	$this->db->join('tbl_detail_panitia', 'id_panitia', 'left');
	// 	$this->db->join('tbl_pegawai', 'tbl_detail_panitia.id_pegawai2 = tbl_pegawai.id_pegawai', 'left');
	// 	$this->db->join('tbl_jenis_pengadaan', 'tbl_paket.id_jenis_pengadaan = tbl_jenis_pengadaan.id_jenis_pengadaan', 'left');
	// 	$this->db->join('tbl_metode_pemilihan', 'tbl_paket.id_metode_pemilihan = tbl_metode_pemilihan.id_metode_pemilihan', 'left');
	// 	$this->db->join('tbl_jadwal_kualifikasi', 'id_kualifikasi', 'left');
	// 	$this->db->join('tbl_metode_dokumen', 'tbl_paket.id_metode_dokumen = tbl_metode_dokumen.id_metode_dokumen', 'left');
	// 	$this->db->join('tbl_metode_evaluasi', 'id_metode_evaluasi', 'left');
	// 	$this->db->where('tbl_paket.id_paket', $id_pegawai);
	// 	$query = $this->db->get();
	// 	return $query->result_array();
	// }
	// public function metode_pemilihan()
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('tbl_metode_pemilihan');
	// 	$this->db->where('id_metode_pemilihan', 8);
	// 	$query = $this->db->get();
	// 	return $query->row_array();
	// }
	// get pengadaan
	public function get_jenis_pengadaan()
	{
		$query = $this->db->query("SELECT * FROM tbl_jenis_pengadaan");
		return $query->result_array();
	}
	//  get_metode_pemilihan
	public function get_metode_pemilihan()
	{
		$query = $this->db->query("SELECT * FROM tbl_metode_pemilihan");
		return $query->result_array();
	}

	//  get_metode_pemilihan
	public function get_kualifikasi()
	{
		$query = $this->db->query("SELECT * FROM tbl_jadwal_kualifikasi");
		return $query->result_array();
	}

	//get metode dokumen
	public function get_metode_dokumen()
	{
		$query = $this->db->query("SELECT * FROM tbl_metode_dokumen");
		return $query->result_array();
	}

	public function get_metode_evaluasi()
	{
		$query = $this->db->query("SELECT * FROM tbl_metode_evaluasi");
		return $query->result_array();
	}

	//ini kepake banget
	//pindahin ini pas insert paket, kesulitannya id_kualifikasinya
	public function updatejenis_pengadaan($where, $data, $id_kualifikasi, $tanggal_sekarang)
	{
		$this->db->query("DELETE FROM tbl_jadwal_tender_detail WHERE id_paket = $where");
		$this->db->query("INSERT INTO tbl_jadwal_tender_detail (nama_jadwal_tender, id_kualifikasi, id_paket) SELECT nama_jadwal_tender,id_kualifikasi,$where FROM tbl_jadwal_tender WHERE id_kualifikasi = $id_kualifikasi ORDER BY id_jadwal_tender ASC");
		return $this->db->affected_rows();
	}

	public function count_jadwal($id_kualifikasi)
	{
		$query = $this->db->query("SELECT COUNT(*) AS total_jadwal FROM tbl_jadwal_tender_detail WHERE id_kualifikasi = $id_kualifikasi");
		return $query->row_array();
	}

	//ini kepake banget
	public function updatejenis_pengadaan2($where, $data, $id_kualifikasi)
	{
		$this->db->where($where)->update('tbl_paket', $data);
		return $this->db->affected_rows();
	}

	public function get_jadwal_prakualifikasi($id_paket, $id_kualifikasi)
	{
		$query = $this->db->query("SELECT * FROM tbl_jadwal_tender_detail WHERE id_paket = $id_paket AND id_kualifikasi = $id_kualifikasi");
		return $query->result_array();
	}

	public function get_jadwal_pascakualifikasi($id_paket, $id_kualifikasi)
	{
		$query = $this->db->query("SELECT * FROM tbl_jadwal_tender_detail WHERE id_paket = $id_paket AND id_kualifikasi = $id_kualifikasi");
		return $query->result_array();
	}

	public function createjadwalprakualifikasi($data)
	{
		$this->db->insert('tbl_jadwal_prakualifikasi_fix', $data);
		return $this->db->affected_rows();
	}

	public function createjadwalpascakualifikasi($data)
	{
		$this->db->insert('tbl_jadwal_pascakualifikasi', $data);
		return $this->db->affected_rows();
	}

	public function get_jadwal_tender_prakualifikasi($id_kualifikasi)
	{
		$data = $this->db->query("SELECT * FROM tbl_jadwal_tender WHERE id_kualifikasi = $id_kualifikasi");
		return $data->result_array();
	}

	public function get_row_jadwal_tender_prakualifikasi($id_kualifikasi)
	{
		$data = $this->db->query("SELECT * FROM tbl_jadwal_tender WHERE id_kualifikasi = $id_kualifikasi");
		return $data->row_array();
	}

	//ini yang fix
	public function get_prakualifikasi($id_paket, $id_kualifikasi)
	{
		$query = $this->db->query("SELECT * FROM tbl_jadwal_tender_detail WHERE id_paket = $id_paket AND id_kualifikasi = $id_kualifikasi ORDER BY id_jadwal_tender ASC");
		return $query->result_array();
	}

	//ini yang fix
	public function get_pascakualifikasi($id_paket, $id_kualifikasi)
	{
		$query = $this->db->query("SELECT * FROM tbl_jadwal_tender_detail WHERE id_paket = $id_paket AND id_kualifikasi = $id_kualifikasi ORDER BY id_jadwal_tender ASC");
		return $query->result_array();
	}

	//ini kepake banget
	public function update_jadwal($data, $where)
	{
		$this->db->where($where)->update('tbl_jadwal_tender_detail', $data);
		return TRUE;
	}
	//cek jadwal udah diisi apa belom
	public function cek_jadwal($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_jadwal_tender_detail');
		$this->db->where('tanggal_mulai_jadwal', $id_paket);
		$query = $this->db->get();
		return $query->row_array();
	}

	//update perubahan jadwal
	public function update_perubahan_jadwal($where, $data)
	{
		$this->db->where('id_jadwal_tender', $where);
		$this->db->update('tbl_jadwal_tender_detail', $data);
		return $this->db->affected_rows();
	}

	//cek jadwal udah disi apo belom
	public function cek_jadwal2()
	{
		$this->db->select('*');
		$this->db->from('tbl_jadwal_tender_detail');
		$this->db->where('tanggal_selesai_jadwal', '');
		$query = $this->db->get();
		return $query->row_array();
	}


	// GET RANCANGAN KONTRAK
	public function rancangan_kontrak($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_syarat_khusus_kontrak');
		$this->db->where('id_paket', $id_paket);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getstatus_persetujuan($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_status_persetujuan_tender');
		$this->db->where('id_paket', $id_paket);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function cek_status()
	{
		$this->db->select('*');
		$this->db->from('tbl_status_persetujuan_tender');
		$this->db->where('id_paket', null);
		$query = $this->db->get();
		return $query->row_array();
	}
	public function cek_status_ada($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_status_persetujuan_tender');
		$this->db->where('nama_penyetuju', $this->session->userdata('nama_pegawai'));
		$this->db->where('id_paket', $id_paket);
		$query = $this->db->get();
		return $query->row_array();
	}
	public function insertpersetujuan($data)
	{
		$this->db->insert('tbl_status_persetujuan_tender', $data);
		return $this->db->affected_rows();
	}
	// INI SAVE / UPDATE PAKET TENDER
	public function update_save_tender($where, $data)
	{
		$this->db->where($where)->update('tbl_paket', $data);
		return $this->db->affected_rows();
	}

	// INI UNTUK BAGIAN INFORMASI TENDER
	public function update_tahap_tender($where, $data)
	{
		$this->db->where($where)->update('tbl_paket', $data);
		return $this->db->affected_rows();
	}

	// END BAGIAN INFORMASI TENDER

	//insert persyaratan kualifikasi
	public function insert_persyaratan($data)
	{
		$this->db->insert('tbl_persyaratan_kualifikasi', $data);
	}

	//get persyaratan_kualifikasi by id paket
	public function get_persyaratan_kualifikasi($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_persyaratan_kualifikasi WHERE id_paket = $id_paket");
		return $query->row_array();
	}

	public function get_persyaratan_kualifikasi2($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_persyaratan_kualifikasi WHERE id_paket = $id_paket");
		return $query->result_array();
	}

	public function get_persyaratan_npwp($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_persyaratan_kualifikasi WHERE id_paket = $id_paket AND nama_status = 'Memiliki NPWP'");
		return $query->row_array();
	}

	public function get_persyaratan_pajak($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_persyaratan_kualifikasi WHERE id_paket = $id_paket AND nama_status = 'Telah Melunasi Kewajiban Pajak Tahun Tender'");
		return $query->row_array();
	}

	public function get_persyaratan_pengadilan($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_persyaratan_kualifikasi WHERE id_paket = $id_paket AND nama_status = 'Yang bersangkutan dan manajemen tidak dalam pengawasan pengadilan,tidak pailit ,dan kegiatan usahanya'");
		return $query->row_array();
	}

	public function get_persyaratan_daftarhitam($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_persyaratan_kualifikasi WHERE id_paket = $id_paket AND nama_status = 'Tidak masuk dalam daftar hitam'");
		return $query->row_array();
	}

	public function get_persyaratan_pengalaman($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_persyaratan_kualifikasi WHERE id_paket = $id_paket AND nama_status = 'Pengalaman Pekerjaan'");
		return $query->row_array();
	}

	public function get_persyaratan_tenaga_ahli($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_persyaratan_kualifikasi WHERE id_paket = $id_paket AND nama_status = 'Tenaga Ahli'");
		return $query->row_array();
	}

	public function get_persyaratan_tenaga_teknis($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_persyaratan_kualifikasi WHERE id_paket = $id_paket AND nama_status = 'Tenaga Teknis'");
		return $query->row_array();
	}

	public function get_persyaratan_fasilitas($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_persyaratan_kualifikasi WHERE id_paket = $id_paket AND nama_status = 'Kemampuan Untuk Menyediakan Fasilitas atau Peralatan atau Perlengkapan'");
		return $query->row_array();
	}

	public function update_persyaratan($id_persyaratan_npwp, $data)
	{
		$this->db->where('id_persyaratan_kualifikasi', $id_persyaratan_npwp);
		$this->db->update('tbl_persyaratan_kualifikasi', $data);
		return $this->db->affected_rows();
	}


	// INSERT PENAWARAN TEKNIS
	public function insert_penawaran_teknis($data)
	{
		$this->db->insert('tbl_penawaran_teknis', $data);
	}

	public function get_masa_berlaku($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_penawaran_teknis WHERE id_paket = $id_paket AND nama_penawaran_teknis = 'Masa Berlaku Penawaran'");
		return $query->row_array();
	}

	public function get_penawaran_teknis($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_penawaran_teknis WHERE id_paket = $id_paket");
		return $query->result_array();
	}

	public function get_penawaran($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_penawaran_teknis WHERE id_paket = $id_paket AND nama_penawaran_teknis = 'Penawaran'");
		return $query->row_array();
	}

	public function get_spesifikasi($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_penawaran_teknis WHERE id_paket = $id_paket AND nama_penawaran_teknis = 'Sepesifikasi Teknis Dan Identitas'");
		return $query->row_array();
	}

	public function get_penyerahan($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_penawaran_teknis WHERE id_paket = $id_paket AND nama_penawaran_teknis = 'Jadwal Penyerahan Atau Pengiriman Barang'");
		return $query->row_array();
	}

	public function get_bagian_pekerjaan($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_penawaran_teknis WHERE id_paket = $id_paket AND nama_penawaran_teknis = 'Bagian Pekerjaan Yang Disubkontrakan an Isian LDK'");
		return $query->row_array();
	}

	public function get_browsur($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_penawaran_teknis WHERE id_paket = $id_paket AND nama_penawaran_teknis = 'Browsur Atau Gambar-Gambar'");
		return $query->row_array();
	}

	public function get_jaminan($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_penawaran_teknis WHERE id_paket = $id_paket AND nama_penawaran_teknis = 'Jaminan Purna Jual'");
		return $query->row_array();
	}

	public function get_asuransi($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_penawaran_teknis WHERE id_paket = $id_paket AND nama_penawaran_teknis = 'Asuransi'");
		return $query->row_array();
	}

	public function get_tenaga_teknis($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_penawaran_teknis WHERE id_paket = $id_paket AND nama_penawaran_teknis = 'Tenaga Teknis'");
		return $query->row_array();
	}

	public function get_rekapitulasi($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_penawaran_teknis WHERE id_paket = $id_paket AND nama_penawaran_teknis = 'Rekapitulasi Perhitungan TKDN'");
		return $query->row_array();
	}

	//update penawaran teknis
	public function update_penawaran_teknis($where, $data)
	{
		$this->db->where('id_penawaran_teknis', $where);
		$this->db->update('tbl_penawaran_teknis', $data);
	}



	public function save_masa_berlaku($where, $data)
	{
		$this->db->where('id_paket', $where);
		$this->db->update('tbl_paket', $data);
		return $this->db->affected_rows();
	}

	//beranda -> evaluasi detail
	public function get_evaluasi_administrasi($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_penawaran_teknis WHERE kategori = 'Administrasi' AND status_checked = 1 AND id_paket = $id_paket");
		return $query->result_array();
	}

	public function get_evaluasi_teknis($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_penawaran_teknis WHERE kategori = 'Teknis' AND status_checked = 1 AND id_paket = $id_paket");
		return $query->result_array();
	}

	public function get_persyaratan_kualifikasi_beranda($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_persyaratan_kualifikasi WHERE status_checked_persyaratan = 1 AND id_paket = $id_paket");
		return $query->result_array();
	}

	public function update_status_tender($id_paket, $data)
	{
		$this->db->where('id_paket', $id_paket);
		$this->db->update('tbl_paket', $data);
		return $this->db->affected_rows();
	}

	public function insert_izin_usaha($dataizin)
	{
		$this->db->insert('tbl_izin_klasifikasi', $dataizin);
	}

	public function get_all_klasifikasi($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_izin_klasifikasi WHERE id_paket = $id_paket");
		return $query->result_array();
	}

	public function update_jenis_izin($where, $dataizin)
	{
		$this->db->where('id_izin_usaha', $where);
		$this->db->update('tbl_izin_klasifikasi', $dataizin);
		return $this->db->affected_rows();
	}

	public function get_vendor($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_vendor_mengikuti_paket LEFT JOIN tbl_vendor ON tbl_vendor.id_vendor = tbl_vendor_mengikuti_paket.id_mengikuti_vendor WHERE id_mengikuti_paket_vendor = $id_paket");
		return $query->result_array();
	}

	public function get_vendor_by_id($id_vendor, $id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_vendor_mengikuti_paket LEFT JOIN tbl_vendor ON tbl_vendor.id_vendor = tbl_vendor_mengikuti_paket.id_mengikuti_vendor WHERE tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor = $id_paket AND tbl_vendor_mengikuti_paket.id_mengikuti_vendor = $id_vendor");
		return $query->row_array();
	}

	public function get_paket_by_id_vendor($id_vendor)
	{
		$query = $this->db->query("SELECT * FROM tbl_vendor_mengikuti_paket WHERE id_mengikuti_vendor = $id_vendor");
		return $query->row_array();
	}

	public function get_vendor_by_id_dapet_id($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor_mengikuti_paket');
		$this->db->where('id_mengikuti_paket_vendor', $id_paket);
		$query = $this->db->get();
		return $query->row_array();
	}
	public function getDokumenRencana($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_persiapan_dokumen_pengadaan');
		$this->db->where('id_paket', $id_paket);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function cek_status_jadwal($id_paket, $id_kualifikasi)
	{
		$query = $this->db->query("SELECT * FROM tbl_jadwal_tender_detail 
										   LEFT JOIN tbl_paket ON tbl_jadwal_tender_detail.id_paket = tbl_paket.id_paket WHERE tbl_jadwal_tender_detail.id_kualifikasi = '$id_kualifikasi' AND tbl_paket.id_paket = '$id_paket' ORDER BY id_jadwal_tender ASC");
		return $query->result_array();
	}

	public function cek_status_jadwal2($id_paket, $id_kualifikasi)
	{
		$query = $this->db->query("SELECT * FROM tbl_jadwal_tender_detail 
										   LEFT JOIN tbl_paket ON tbl_jadwal_tender_detail.id_paket = tbl_paket.id_paket WHERE tbl_jadwal_tender_detail.id_kualifikasi = '$id_kualifikasi' AND tbl_paket.id_paket = '$id_paket' ORDER BY id_jadwal_tender DESC");
		return $query->row_array();
	}

	public function cek_status_jadwal3($id_paket, $id_kualifikasi)
	{
		$query = $this->db->query("SELECT * FROM tbl_jadwal_tender_detail 
										   LEFT JOIN tbl_paket ON tbl_jadwal_tender_detail.id_paket = tbl_paket.id_paket WHERE tbl_jadwal_tender_detail.id_kualifikasi = '$id_kualifikasi' AND tbl_paket.id_paket = '$id_paket' ORDER BY id_jadwal_tender ASC");
		return $query->row_array();
	}

	public function by_id_result_persyaratan_izin_usaha($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_izin_klasifikasi');
		$this->db->where('id_paket', $id_paket);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function by_id_result_persyaratan_izin_usaha_row($id_izin_usaha)
	{
		$this->db->select('*');
		$this->db->from('tbl_izin_klasifikasi');
		$this->db->where('id_izin_usaha', $id_izin_usaha);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function getById_persyaratan_kualifikasi($id_persyaratan_kualifikasi)
	{
		$this->db->select('*');
		$this->db->from('tbl_persyaratan_kualifikasi');
		$this->db->where('id_persyaratan_kualifikasi', $id_persyaratan_kualifikasi);
		$query = $this->db->get();
		return $query->row_array();
	}


	public function by_id_persyaratan($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_persyaratan_kualifikasi');
		$this->db->where('id_paket', $id_paket);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function update_izin_usaha($where, $data)
	{
		$this->db->where('id_izin_usaha', $where);
		$this->db->update('tbl_izin_klasifikasi', $data);
		return $this->db->affected_rows();
	}

	public function update_persyaratan2($where, $data)
	{
		$this->db->where('id_persyaratan_kualifikasi', $where);
		$this->db->update('tbl_persyaratan_kualifikasi', $data);
		return $this->db->affected_rows();
	}
	public function delete_pesyaratan2($id_persyaratan_kualifikasi)
	{
		$this->db->delete('tbl_persyaratan_kualifikasi', ['id_persyaratan_kualifikasi' => $id_persyaratan_kualifikasi]);
		return $this->db->affected_rows();
	}

	public function Update_persyartan($where, $data)
	{
		$this->db->where('id_persyaratan_kualifikasi', $where);
		$this->db->update('tbl_persyaratan_kualifikasi', $data);
		return $this->db->affected_rows();
	}
	public function delete_persyaratan_izin($id_izin_usaha)
	{
		$this->db->delete('tbl_izin_klasifikasi', ['id_izin_usaha' => $id_izin_usaha]);
		return $this->db->affected_rows();
	}

	public function get_jenis_kontrak($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_jenis_kontrak');
		$this->db->where('id_paket', $id_paket);
		$query = $this->db->get();
		return $query->row_array();
	}
	// UNTUK PDF ADD


	public function create_pdf_dokumen_kualifikasi($data)
	{
		$this->db->insert('tbl_dokumen_kualifikasi_pdf', $data);
		return $this->db->affected_rows();
	}
	// UNTUK PDF DELETE
	public function deletedata_dokumen_kualifikasi_pdf($id_dokumen_kualifikasi_pdf)
	{
		$this->db->delete('tbl_dokumen_kualifikasi_pdf', ['id_dokumen_kualifikasi_pdf' => $id_dokumen_kualifikasi_pdf]);
	}
	// by id

	public function get_by_dokumen_kualifikasi_pdf($id_dokumen_kualifikasi_pdf)
	{
		$this->db->select('*');
		$this->db->from('tbl_dokumen_kualifikasi_pdf');
		$this->db->where('id_dokumen_kualifikasi_pdf', $id_dokumen_kualifikasi_pdf);
		$query = $this->db->get();
		return $query->row_array();
	}
	public function get_pdf_dokumen_kualifikasi($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_dokumen_kualifikasi_pdf');
		$this->db->where('id_paket', $id_paket);
		$query = $this->db->get();
		return $query->result_array();
	}


	public function create_pdf_dokumen_kualifikasi_lelang($data)
	{
		$this->db->insert('tbl_dokumen_lelang_pdf', $data);
		return $this->db->affected_rows();
	}
	// UNTUK PDF DELETE
	public function deletedata_dokumen_kualifikasi_pdf_lelang($id_dokumen_lelang_pdf)
	{
		$this->db->delete('tbl_dokumen_lelang_pdf', ['id_dokumen_lelang_pdf' => $id_dokumen_lelang_pdf]);
	}
	// by id

	public function get_by_dokumen_kualifikasi_pdf_lelang($id_dokumen_lelang_pdf)
	{
		$this->db->select('*');
		$this->db->from('tbl_dokumen_lelang_pdf');
		$this->db->where('id_dokumen_lelang_pdf', $id_dokumen_lelang_pdf);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function get_pdf_dokumen_kualifikasi_lelang($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_dokumen_lelang_pdf');
		$this->db->where('id_paket', $id_paket);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_by_rincian_hps_pdf($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_rincian_hps_pdf');
		$this->db->where('id_paket', $id_paket);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function hitung_peserta($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor_mengikuti_paket');
		$this->db->where('id_mengikuti_paket_vendor', $id_paket);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_id_kualifikasi($id_paket)
	{
		$query = $this->db->query("SELECT id_kualifikasi FROM tbl_paket WHERE id_paket = $id_paket");
		return $query->row_array();
	}

	public function get_jadwal_kualifikasi($id_kualifikasi)
	{
		$query = $this->db->query("SELECT * FROM tbl_jadwal_tender_detail WHERE id_kualifikasi = $id_kualifikasi AND nama_jadwal_tender = 'Penandatanganan Kontrak'");
		return $query->row_array();
	}

	public function cek_waktu($id_paket, $id_kualifikasi)
	{
		$query = $this->db->query("SELECT * FROM tbl_jadwal_tender_detail WHERE id_paket = $id_paket AND id_kualifikasi = $id_kualifikasi AND nama_jadwal_tender = 'Pengumuman Prakualifikasi'");
		return $query->row_array();
	}

	public function cek_waktu2($id_paket, $id_kualifikasi)
	{
		$query = $this->db->query("SELECT * FROM tbl_jadwal_tender_detail WHERE id_paket = $id_paket AND id_kualifikasi = $id_kualifikasi AND nama_jadwal_tender = 'Download Dokumen Pemilihan'");
		return $query->row_array();
	}

	public function getjadwal_pra($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_rincian_hps_pdf');
		$this->db->where('id_paket', $id_paket);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getbyidpaket_vendor($id_pegawai)
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->join('tbl_unit_kerja', 'id_unit_kerja', 'left');
		$this->db->join('tbl_panitia', 'id_panitia', 'left');
		$this->db->join('tbl_detail_panitia', 'id_panitia', 'left');
		$this->db->join('tbl_pegawai', ' tbl_detail_panitia.id_pegawai2 = tbl_pegawai.id_pegawai', 'left');
		$this->db->join('tbl_jenis_pengadaan', 'id_jenis_pengadaan', 'left');
		$this->db->join('tbl_metode_pemilihan', 'id_metode_pemilihan', 'left');
		$this->db->join('tbl_jadwal_kualifikasi', 'id_kualifikasi', 'left');
		$this->db->join('tbl_metode_dokumen', 'id_metode_dokumen', 'left');
		$this->db->join('tbl_metode_evaluasi', 'id_metode_evaluasi', 'left');
		$this->db->where('tbl_paket.id_paket', $id_pegawai);
		$query = $this->db->get();
		return $query->row_array();
	}


	public function get_all_detail_jadwal($id_kualifikasi, $id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_jadwal_tender_detail');
		$this->db->where('id_paket', $id_paket);
		$this->db->where('id_kualifikasi', $id_kualifikasi);
		$this->db->order_by('id_jadwal_tender', 'ASC');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_all_detail_jadwal_row($id_kualifikasi, $id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_jadwal_tender_detail');
		$this->db->where('id_paket', $id_paket);
		$this->db->where('id_kualifikasi', $id_kualifikasi);
		$this->db->order_by('id_jadwal_tender', 'ASC');
		$query = $this->db->get();
		return $query->result_array();
	}

	private function _get_data_query_lihat_tahap_tender($id_paket, $id_kualifikasi)
	{
		$this->db->select('*');
		$this->db->from('tbl_jadwal_tender_detail');
		$this->db->where('id_paket', $id_paket);
		$this->db->where('id_kualifikasi', $id_kualifikasi);
		$this->db->order_by('id_jadwal_tender', 'ASC');
		if (isset($_POST['search']['value'])) {
			$this->db->like('id_paket', $_POST['search']['value']);
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_paket', 'DESC');
		}
	}

	public function getdatatable_lihat_tahap_tender($id_paket, $id_kualifikasi) //nam[ilin data pake ini
	{
		$this->_get_data_query_lihat_tahap_tender($id_paket, $id_kualifikasi); //ambil data dari get yg di atas
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_data_lihat_tahap_tender($id_paket, $id_kualifikasi)
	{
		$this->_get_data_query_lihat_tahap_tender($id_paket, $id_kualifikasi); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data_lihat_tahap_tender()
	{
		$this->db->from('tbl_jadwal_tender_detail');
		return $this->db->count_all_results();
	}

	public function insert_evaluasi_administrasi($data)
	{
		$this->db->insert('trx_penilaian_evaluasi_adminstrasi', $data);
		return $this->db->affected_rows();
	}

	public function notif_perubahan_ketua($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->join('tbl_panitia', 'tbl_panitia.id_panitia = tbl_paket.id_panitia', 'left');
		$this->db->join('tbl_detail_panitia', 'tbl_detail_panitia.id_panitia = tbl_panitia.id_panitia', 'left');
		$this->db->join('tbl_pegawai', 'tbl_pegawai.id_pegawai = tbl_detail_panitia.id_pegawai2', 'left');
		$this->db->where('tbl_paket.id_paket', $id_paket);
		$this->db->where('tbl_detail_panitia.id_role_panitia', 1);
		$query = $this->db->get();
		return $query->row();
	}


	//berita acara penawaran
	public function upload_berita_acara_penawaran($data)
	{
		$this->db->insert('tbl_berita_acara_penawaran', $data);
		return $this->db->affected_rows();
	}

	public function get_berita_acara_penawaran($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_berita_acara_penawaran WHERE id_paket = $id_paket");
		return $query->result_array();
	}

	public function delete_berita_acara_penawaran($id_berita_acara_penawaran)
	{
		$this->db->delete('tbl_berita_acara_penawaran', ['id_berita_acara_penawaran' => $id_berita_acara_penawaran]);
	}

	public function get_id_berita_acara_penawaran($id_berita_acara_penawaran)
	{
		$query = $this->db->query("SELECT * FROM tbl_berita_acara_penawaran WHERE id_berita_acara_penawaran = $id_berita_acara_penawaran");
		return $query->row_array();
	}
	//end berita acara penawaran

	//berita acara tender
	public function upload_berita_acara_tender($data)
	{
		$this->db->insert('tbl_berita_acara_tender', $data);
		return $this->db->affected_rows();
	}

	public function get_berita_acara_tender($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_berita_acara_tender WHERE id_paket = $id_paket");
		return $query->result_array();
	}

	public function delete_berita_acara_tender($id_berita_acara_tender)
	{
		$this->db->delete('tbl_berita_acara_tender', ['id_berita_acara_tender' => $id_berita_acara_tender]);
	}

	public function get_id_berita_acara_tender($id_berita_acara_tender)
	{
		$query = $this->db->query("SELECT * FROM tbl_berita_acara_tender WHERE id_berita_acara_tender = $id_berita_acara_tender");
		return $query->row_array();
	}
	//end berita acara tender


	//berita acara peringkat teknis
	public function upload_berita_acara_peringkat($data)
	{
		$this->db->insert('tbl_berita_acara_peringkat', $data);
		return $this->db->affected_rows();
	}

	public function get_berita_acara_peringkat($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_berita_acara_peringkat WHERE id_paket = $id_paket");
		return $query->result_array();
	}

	public function delete_berita_acara_peringkat($id_berita_acara_peringkat)
	{
		$this->db->delete('tbl_berita_acara_peringkat', ['id_berita_acara_peringkat' => $id_berita_acara_peringkat]);
	}

	public function get_id_berita_acara_peringkat($id_berita_acara_peringkat)
	{
		$query = $this->db->query("SELECT * FROM tbl_berita_acara_peringkat WHERE id_berita_acara_peringkat = $id_berita_acara_peringkat");
		return $query->row_array();
	}
	//end berita acara peringkat teknis


	//berita acara LAINNYA
	public function upload_berita_acara_lainnya($data)
	{
		$this->db->insert('tbl_berita_acara_lainnya', $data);
		return $this->db->affected_rows();
	}

	public function get_berita_acara_lainnya($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_berita_acara_lainnya WHERE id_paket = $id_paket");
		return $query->result_array();
	}

	public function delete_berita_acara_lainnya($id_berita_acara_lainnya)
	{
		$this->db->delete('tbl_berita_acara_lainnya', ['id_berita_acara_lainnya' => $id_berita_acara_lainnya]);
	}

	public function get_id_berita_acara_lainnya($id_berita_acara_lainnya)
	{
		$query = $this->db->query("SELECT * FROM tbl_berita_acara_lainnya WHERE id_berita_acara_lainnya = $id_berita_acara_lainnya");
		return $query->row_array();
	}
	//end berita acara LAINNYA

	public function get_nib()
	{
		$query = $this->db->query("SELECT * FROM tbl_nib_sub_kategori4");
		return $query->result_array();
	}

	public function insert_persyaratan_nib($data)
	{
		$this->db->insert('tbl_persyaratan_tender', $data);
		return $this->db->affected_rows();
	}

	public function insert_persyaratan_dokumen($data2)
	{
		$this->db->insert('tbl_persyaratan_tender', $data2);
		return $this->db->affected_rows();
	}

	public function insert_persyaratan_audit($data3)
	{
		$this->db->insert('tbl_persyaratan_tender', $data3);
		return $this->db->affected_rows();
	}

	public function insert_persyaratan_tambahan($data4)
	{
		$this->db->insert('tbl_persyaratan_tender', $data4);
		return $this->db->affected_rows();
	}

	public function get_perysaratan_tender($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_persyaratan_tender WHERE id_paket = $id_paket");
		return $query->result_array();
	}

	public function get_persyaratan_tambahan($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_persyaratan_tender WHERE id_paket = $id_paket AND status_persyaratan_tambahan = 1");
		return $query->result_array();
	}

	public function update_persyaratan_tambahan($id_persyaratan_tender, $data)
	{
		$this->db->where('id_persyaratan_tender', $id_persyaratan_tender);
		$this->db->update('tbl_persyaratan_tender', $data);
		$this->db->affected_rows();
	}

	public function cek_dokumen_tambahan($no, $id_paket_segment)
	{
		$query = $this->db->query("SELECT * FROM tbl_vendor_persyaratan_tambahan WHERE id_paket = $id_paket_segment AND id_vendor = $no");
		return $query->result_array();
	}

	public function ambil_id_paket($id_persyaratan_tender)
	{
		$query = $this->db->query("SELECT * FROM tbl_persyaratan_tender WHERE id_persyaratan_tender = $id_persyaratan_tender");
		return $query->row_array();
	}

	public function delete_persyartan_tambahan($id_persyaratan_tender)
	{
		$this->db->delete('tbl_persyaratan_tender', ['id_persyaratan_tender' => $id_persyaratan_tender]);
		return $this->db->affected_rows();
	}

	public function get_persyaratan_nib($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_persyaratan_tender WHERE id_paket = $id_paket");
		return $query->row_array();
	}

	public function get_persyartan_dokumen($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_persyaratan_tender WHERE nama_persyaratan = 'Dokumen Lengkap' AND id_paket = $id_paket");
		return $query->row_array();
	}

	public function get_persyaratan_audit($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_persyaratan_tender WHERE nama_persyaratan = 'Audit' AND id_paket = $id_paket");
		return $query->row_array();
	}

	public function update_persyaratan_nib($nib, $paket, $data)
	{
		$this->db->where('id_paket', $paket);
		$this->db->where('nama_persyaratan', $nib);
		$this->db->update('tbl_persyaratan_tender', $data);
		$this->db->affected_rows();
	}

	public function update_persyaratan_tambah($id_persyaratan_tender, $data)
	{
		$this->db->where('id_persyaratan_tender', $id_persyaratan_tender);
		$this->db->update('tbl_persyaratan_tender', $data);
		$this->db->affected_rows();
	}

	public function delete_persyaratan_dokumen($dokumen_lengkap, $data2)
	{
		$this->db->where('id_persyaratan_tender', $dokumen_lengkap);
		$this->db->delete('tbl_persyaratan_tender', $data2);
		$this->db->affected_rows();
	}

	public function get_perysaratan_untuk_vendor($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_persyaratan_tender WHERE id_paket = 317  AND nama_persyaratan = 'Audit' OR nama_persyaratan = 'NIB'");
		return $query->result_array();
	}

	public function get_tahap($id_paket, $id_kualifikasi)
	{
		if ($id_kualifikasi == 13) {
			$query = $this->db->query("SELECT * FROM tbl_jadwal_tender_detail WHERE id_paket = $id_paket AND id_kualifikasi = $id_kualifikasi AND nama_jadwal_tender = 'Pembukaan Dokumen Penawaran'");
		} else {
			$query = $this->db->query("SELECT * FROM tbl_jadwal_tender_detail WHERE id_paket = $id_paket AND id_kualifikasi = $id_kualifikasi AND nama_jadwal_tender = 'Pembukaan dan Evaluasi Penawaran File II : Harga'");
		}
		return $query->row();
	}

	public function get_tahap_dokumen1($id_paket, $id_kualifikasi)
	{
		if ($id_kualifikasi == 13) {
			$query = $this->db->query("SELECT * FROM tbl_jadwal_tender_detail WHERE id_paket = $id_paket AND id_kualifikasi = $id_kualifikasi AND nama_jadwal_tender = 'Pembukaan Dokumen Penawaran'");
		} else if ($id_kualifikasi == 15) {
			$query = $this->db->query("SELECT * FROM tbl_jadwal_tender_detail WHERE id_paket = $id_paket AND id_kualifikasi = $id_kualifikasi AND nama_jadwal_tender = 'Pembukaan Dokumen Penawaran'");
		} else {
			$query = $this->db->query("SELECT * FROM tbl_jadwal_tender_detail WHERE id_paket = $id_paket AND id_kualifikasi = $id_kualifikasi AND nama_jadwal_tender = 'Pembukaan dan Evaluasi Penawaran File I : Administrasi dan Teknis'");
		}
		return $query->row_array();
	}

	public function get_tahap_dokumen30($id_paket, $id_kualifikasi)
	{
		$query = $this->db->query("SELECT * FROM tbl_jadwal_tender_detail WHERE id_paket = $id_paket AND id_kualifikasi = $id_kualifikasi AND nama_jadwal_tender = 'Pembukaan dan Evaluasi Penawaran File I : Administrasi dan Teknis'");
		return $query->row_array();
	}
	public function get_tahap_dokumen10($id_paket, $id_kualifikasi)
	{
		$query = $this->db->query("SELECT * FROM tbl_jadwal_tender_detail WHERE id_paket = $id_paket AND id_kualifikasi = $id_kualifikasi AND nama_jadwal_tender = 'Pembukaan Dokumen Penawaran'");
		return $query->row_array();
	}


	public function evaluasi_penawaran_satu_file_prakualfikasi($id_paket, $id_kualifikasi)
	{
		$query = $this->db->query("SELECT * FROM tbl_jadwal_tender_detail WHERE id_paket = $id_paket AND id_kualifikasi = $id_kualifikasi AND nama_jadwal_tender = 'Evaluasi Penawaran'");
		return $query->row_array();
	}

	public function pembukaan_dokumen_penawaran_satu_file_prakualfikasi($id_paket, $id_kualifikasi)
	{
		$query = $this->db->query("SELECT * FROM tbl_jadwal_tender_detail WHERE id_paket = $id_paket AND id_kualifikasi = $id_kualifikasi AND nama_jadwal_tender = 'Pembukaan Dokumen Penawaran'");
		return $query->row_array();
	}

	public function get_tahap_berita($id_paket, $id_kualifikasi)
	{
		$query = $this->db->query("SELECT * FROM tbl_jadwal_tender_detail WHERE id_paket = $id_paket AND id_kualifikasi = $id_kualifikasi AND nama_jadwal_tender = 'Upload Berita Acara Hasil Pelelangan'");
		return $query->row_array();
	}

	public function get_dokumen_persyaratan_vendor($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_vendor_mengikuti_paket
											LEFT JOIN tbl_vendor ON tbl_vendor_mengikuti_paket.id_mengikuti_vendor = tbl_vendor.id_vendor 
											LEFT JOIN tbl_vendor_persyaratan_tambahan ON tbl_vendor_mengikuti_paket.id_mengikuti_vendor = tbl_vendor_persyaratan_tambahan.id_vendor 
											WHERE tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor = $id_paket");
		return $query->result_array();
	}
	// get by id_persaratan tambahan

	public function get_by_id_dokumen_persyaratan_vendor($id_vendor, $id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor_persyaratan_tambahan');
		$this->db->where('id_vendor', $id_vendor);
		$this->db->where('id_paket', $id_paket);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_by_id_dokumen_persyaratan_vendor_row($id_vendor, $id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor_persyaratan_tambahan');
		$this->db->join('tbl_vendor', 'tbl_vendor_persyaratan_tambahan.id_vendor = tbl_vendor.id_vendor', 'left');
		$this->db->where('tbl_vendor_persyaratan_tambahan.id_vendor', $id_vendor);
		$this->db->where('tbl_vendor_persyaratan_tambahan.id_paket', $id_paket);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function get_by_id_dokumen_persyaratan_vendor_row_ajah($id_persyaratan_tambahan)
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor_persyaratan_tambahan');
		$this->db->where('id_persyaratan_tambahan', $id_persyaratan_tambahan);
		$query = $this->db->get();
		return $query->row_array();
	}
	public function update_dokumen_persyaratan_tambahan($where, $data)
	{
		$this->db->where($where)->update('tbl_vendor_persyaratan_tambahan', $data);
		return $this->db->affected_rows();
	}

	public function get_vendor_mengikuti_paket($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor_mengikuti_paket');
		$this->db->join('tbl_vendor', 'tbl_vendor.id_vendor = tbl_vendor_mengikuti_paket.id_mengikuti_vendor', 'left');
		$this->db->join('tbl_vendor_persyaratan_tambahan', 'tbl_vendor_persyaratan_tambahan.id_vendor = tbl_vendor_mengikuti_paket.id_mengikuti_vendor', 'left');
		$this->db->where('tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', $id_paket);
		$this->db->where('tbl_vendor_persyaratan_tambahan.id_paket', $id_paket);
		$this->db->group_by('id_mengikuti_vendor');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getVendorByPaket($id_paket)
	{
		// $this->db->join('tbl_vendor_identitas_prusahaan', 'tbl_vendor.id_vendor = tbl_vendor_identitas_prusahaan.id_vendor', 'left');
		$query = $this->db->query("SELECT * FROM tbl_vendor_mengikuti_paket
											 LEFT JOIN tbl_vendor_identitas_prusahaan ON tbl_vendor_identitas_prusahaan.id_vendor = tbl_vendor_mengikuti_paket.id_mengikuti_vendor
											 LEFT JOIN tbl_vendor ON tbl_vendor_mengikuti_paket.id_mengikuti_vendor = tbl_vendor.id_vendor
											 WHERE tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor = $id_paket GROUP BY tbl_vendor.id_vendor");
		return $query->result_array();
	}

	public function kirim_email_pemenang($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_vendor_mengikuti_paket
											 LEFT JOIN tbl_vendor_identitas_prusahaan ON tbl_vendor_identitas_prusahaan.id_vendor = tbl_vendor_mengikuti_paket.id_mengikuti_vendor
											 LEFT JOIN tbl_vendor ON tbl_vendor_mengikuti_paket.id_mengikuti_vendor = tbl_vendor.id_vendor
											 WHERE tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor = $id_paket");
		return $query->result_array();
	}

	public function name_paket($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_paket', $id_paket);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function update_kategori_penyedia($data, $where)
	{
		$this->db->where($where)->update('tbl_paket', $data);
		return $this->db->affected_rows();
	}
	public function update_persyaratan_tender_audit($data, $where)
	{
		$this->db->where($where)->update('tbl_persyaratan_tender', $data);
		return $this->db->affected_rows();
	}

	public function save_undangan($data)
	{
		$this->db->insert('tbl_undangan_pembuktian_kualifikasi', $data);
		return $this->db->affected_rows();
	}
	public function get_all_data_undangan_by_id_paket($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_undangan_pembuktian_kualifikasi');
		$this->db->where('id_paket', $id_paket);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function upload_undangan_pembuktian2($upload, $id_paket)
	{
		$this->db->where('id_paket', $id_paket);
		$this->db->update('tbl_paket', $upload);
		$this->db->affected_rows();
	}

	public function upload_pengumuman_prakualifikasi($upload, $id_paket)
	{
		$this->db->where('id_paket', $id_paket);
		$this->db->update('tbl_paket', $upload);
		$this->db->affected_rows();
	}

	public function peserta_tender($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor_mengikuti_paket');
		$this->db->join('tbl_vendor', 'tbl_vendor.id_vendor = tbl_vendor_mengikuti_paket.id_mengikuti_vendor', 'left');
		$this->db->where('tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', $id_paket);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function ambil_panitia_tender($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_paket LEFT JOIN tbl_panitia ON tbl_paket.id_panitia = tbl_panitia.id_panitia
		LEFT JOIN tbl_detail_panitia ON tbl_panitia.id_panitia = tbl_detail_panitia.id_panitia
		LEFT JOIN tbl_pegawai ON tbl_detail_panitia.id_pegawai2 = tbl_pegawai.id_pegawai
		LEFT JOIN tbl_role_panitia ON tbl_detail_panitia.id_role_panitia = tbl_role_panitia.id_role_panitia
		WHERE tbl_paket.id_paket = $id_paket ORDER BY tbl_detail_panitia.id_role_panitia ASC");
		return $query->result_array();
	}

	public function ambil_panitia_tender_row($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_paket LEFT JOIN tbl_panitia ON tbl_paket.id_panitia = tbl_panitia.id_panitia
		LEFT JOIN tbl_detail_panitia ON tbl_panitia.id_panitia = tbl_detail_panitia.id_panitia
		LEFT JOIN tbl_pegawai ON tbl_detail_panitia.id_pegawai2 = tbl_pegawai.id_pegawai
		LEFT JOIN tbl_role_panitia ON tbl_detail_panitia.id_role_panitia = tbl_role_panitia.id_role_panitia
		WHERE tbl_paket.id_paket = $id_paket");
		return $query->row_array();
	}

	// PILIH PENYEDIA
	// list data penyedia
	var $list_vendor_lama = array('username_vendor', 'username_vendor', 'username_vendor', 'email_usaha', 'alamat_usaha', 'telpon_usaha');
	private function _get_data_query_list_all_vendor()
	{
		$i = 0;
		$this->db->select('*');
		$this->db->from('tbl_vendor');
		$this->db->join('tbl_vendor_identitas_prusahaan', 'tbl_vendor.id_vendor = tbl_vendor_identitas_prusahaan.id_vendor', 'left');
		$this->db->join('tbl_provinsi', 'tbl_vendor_identitas_prusahaan.id_provinsi = tbl_provinsi.id_provinsi', 'left');
		$this->db->join('tbl_kabupaten', 'tbl_vendor_identitas_prusahaan.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
		$this->db->where('tbl_vendor.status_aktive_vendor', 1);
		$this->db->where('tbl_vendor.status_daftar_hitam_vendor', 0);
		$this->db->where('tbl_vendor.status_vendor_baru', null);
		$this->db->where('tbl_vendor.status_validasi_dokumen', 1);
		$this->db->group_by('tbl_vendor.id_vendor');
		foreach ($this->list_vendor_lama as $item) // looping awal
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

				if (count($this->list_vendor_lama) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}

		if (isset($_POST['order'])) {
			$this->db->order_by($this->list_vendor_lama[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('tbl_vendor.id_vendor', 'DESC');
		}
	}

	public function getdatatable_list_all_vendor_penunjukan_langsung()
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
	var $list_vendor_terpilih = array('id_mengikuti_vendor', 'id_mengikuti_vendor', 'id_mengikuti_vendor', 'username_vendor', 'email_usaha', 'alamat_usaha', 'telpon_usaha', 'id_mengikuti_vendor');
	private function _get_data_query_list_all_vendor_terpilih($id_paket)
	{
		$i = 0;
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
		foreach ($this->list_vendor_terpilih as $item) // looping awal
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

				if (count($this->list_vendor_terpilih) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->list_vendor_terpilih[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('tbl_vendor_mengikuti_paket.id_mengikuti_vendor', 'DESC');
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
	public function status_vendor($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor_mengikuti_paket');
		$this->db->where('tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', $id_paket);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function delete_vendor_baru_terbatas($id_mengikuti_paket)
	{
		$this->db->delete('tbl_vendor_mengikuti_paket', ['id_mengikuti_paket' => $id_mengikuti_paket]);
		return $this->db->affected_rows();
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
	public function getFileSanggahan($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_dokumen_sanggahan_prakualifikasi');
		$this->db->join('tbl_paket', 'tbl_dokumen_sanggahan_prakualifikasi.id_paket = tbl_paket.id_paket', 'left');
		$this->db->join('tbl_vendor', 'tbl_dokumen_sanggahan_prakualifikasi.id_vendor = tbl_vendor.id_vendor', 'left');
		$this->db->where('tbl_dokumen_sanggahan_prakualifikasi.id_paket', $id_paket);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getFileSanggahan_evaluasi($id_paket, $id_vendor)
	{
		$this->db->select('*');
		$this->db->from('tbl_dokumen_sanggahan_prakualifikasi');
		$this->db->join('tbl_paket', 'tbl_dokumen_sanggahan_prakualifikasi.id_paket = tbl_paket.id_paket', 'left');
		$this->db->join('tbl_vendor', 'tbl_dokumen_sanggahan_prakualifikasi.id_vendor = tbl_vendor.id_vendor', 'left');
		$this->db->where('tbl_dokumen_sanggahan_prakualifikasi.id_paket', $id_paket);
		$this->db->where('tbl_dokumen_sanggahan_prakualifikasi.id_vendor', $id_vendor);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getFileSanggahan_akhir_evaluasi($id_paket, $id_vendor)
	{
		$this->db->select('*');
		$this->db->from('tbl_dokumen_sanggahan_akhir');
		$this->db->join('tbl_paket', 'tbl_dokumen_sanggahan_akhir.id_paket = tbl_paket.id_paket', 'left');
		$this->db->join('tbl_vendor', 'tbl_dokumen_sanggahan_akhir.id_vendor = tbl_vendor.id_vendor', 'left');
		$this->db->where('tbl_dokumen_sanggahan_akhir.id_paket', $id_paket);
		$this->db->where('tbl_dokumen_sanggahan_akhir.id_vendor', $id_vendor);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getFileSanggahan2($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_dokumen_sanggahan_akhir');
		$this->db->join('tbl_paket', 'tbl_dokumen_sanggahan_akhir.id_paket = tbl_paket.id_paket', 'left');
		$this->db->join('tbl_vendor', 'tbl_dokumen_sanggahan_akhir.id_vendor = tbl_vendor.id_vendor', 'left');
		$this->db->where('tbl_dokumen_sanggahan_akhir.id_paket', $id_paket);
		$query = $this->db->get();
		return $query->result_array();
	}

	// FUNCTION INI UNTUK MENGAMBIL NO TELPON DAN EMAIL BAIK VENDOR LAMA DAN VENDOR BARU
	public function ambil_telpon_email($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor_mengikuti_paket');
		$this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_mengikuti_vendor = tbl_vendor.id_vendor', 'left');
		$this->db->join('tbl_vendor_identitas_prusahaan', 'tbl_vendor.id_vendor = tbl_vendor_identitas_prusahaan.id_vendor', 'left');
		$this->db->join('tbl_provinsi', 'tbl_vendor_identitas_prusahaan.id_provinsi = tbl_provinsi.id_provinsi', 'left');
		$this->db->join('tbl_kabupaten', 'tbl_vendor_identitas_prusahaan.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
		$this->db->where('tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', $id_paket);
		$query = $this->db->get();
		return $query->row_array();
	}
	public function ambil_vendor($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor_mengikuti_paket');
		$this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_mengikuti_vendor = tbl_vendor.id_vendor', 'left');
		$this->db->join('tbl_vendor_identitas_prusahaan', 'tbl_vendor.id_vendor = tbl_vendor_identitas_prusahaan.id_vendor', 'left');
		$this->db->join('tbl_provinsi', 'tbl_vendor_identitas_prusahaan.id_provinsi = tbl_provinsi.id_provinsi', 'left');
		$this->db->join('tbl_kabupaten', 'tbl_vendor_identitas_prusahaan.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
		$this->db->where('tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', $id_paket);
		$this->db->group_by('tbl_vendor_mengikuti_paket.id_mengikuti_vendor');
		$query = $this->db->get();
		return $query->result();
	}
	// public function panitia_batal_mengikuti_pakat($id_paket)
	// {
	// 	$this->db->delete('tbl_panitia_mengikuti_paket', ['status_panitia_id_paket' => $id_paket]);
	// }
	public function cek_role_penetapan($id_pegawai)
	{
		$query = $this->db->query("SELECT status_penetapan_langsung FROM tbl_panitia 
		LEFT JOIN tbl_detail_panitia ON tbl_panitia.id_panitia = tbl_detail_panitia.id_panitia WHERE id_pegawai2 = $id_pegawai
		AND status_penetapan_langsung = 1");
		return $query->row_array();
	}
	public function cek_role_penunjukan_langsung($id_pegawai)
	{
		$query = $this->db->query("SELECT status_penunjukan_langsung_panitia FROM tbl_panitia 
		LEFT JOIN tbl_detail_panitia ON tbl_panitia.id_panitia = tbl_detail_panitia.id_panitia WHERE id_pegawai2 = $id_pegawai
		AND status_penunjukan_langsung_panitia = 1");
		return $query->row_array();
	}

	// INI UNTUK DOKUMEN PENUNJANG
	public function tambah_dokumen_penunjang($data)
	{
		$this->db->insert('table_dokumen_penunjang', $data);
		return $this->db->affected_rows();
	}

	// table dokumen pengadaan trankasi langsung
	private function _get_data_query_dokumen_penunjang($id_paket)
	{
		$this->db->select('*');
		$this->db->from('table_dokumen_penunjang');
		$this->db->where('table_dokumen_penunjang.id_paket', $id_paket);
		if (isset($_POST['search']['value'])) {
			$this->db->like('table_dokumen_penunjang.nama_dokumen_penunjang', $_POST['search']['value']);
		}

		if (isset($_POST['order'])) {
			$this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('table_dokumen_penunjang.id_dokumen_penunjang', 'DESC');
		}
	}

	public function getdatatable_dokumen_penunjang($id_paket)
	{
		$this->_get_data_query_dokumen_penunjang($id_paket);
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function count_filtered_data_dokumen_penunjang($id_paket)
	{
		$this->_get_data_query_dokumen_penunjang($id_paket);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data_dokumen_penunjang()
	{
		$this->db->from('table_dokumen_penunjang');
		return $this->db->count_all_results();
	}

	public function by_id_dokumen_penunjang($id_dokumen_penunjang)
	{
		$this->db->select('*');
		$this->db->from('table_dokumen_penunjang');
		$this->db->where('table_dokumen_penunjang.id_dokumen_penunjang', $id_dokumen_penunjang);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function delete_dokumen_penunjang($id_dokumen_penunjang)
	{
		$this->db->delete('table_dokumen_penunjang', ['id_dokumen_penunjang' => $id_dokumen_penunjang]);
	}


	public function update_batas_pendaftaran($data, $where)
	{
		$this->db->where('id_paket', $where);
		$this->db->update('tbl_paket', $data);
		return $this->db->affected_rows();
	}

	// INI BAGIAN CHECKED UNTUK FILTERING UNDANGAN KE VENDOR TERTENTU
	public function get_data_persyaratan_vms()
	{
		$this->db->select('*');
		$this->db->from('tbl_persyaratan_vms');
		$this->db->where_not_in('nama_persyaratan_vms', 'nib');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_data_persyaratan_vms_auction()
	{
		$this->db->select('*');
		$this->db->from('tbl_persyaratan_vms');
		$this->db->where_not_in('nama_persyaratan_vms', 'nib');
		$this->db->limit(10);
		$query = $this->db->get();
		return $query->result_array();
	}
	

	//cek perysaratan vms di paket
	public function get_persyaratanvms_byPaket($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_persyaratan_vms_detail WHERE id_paket = $id_paket");
		return $query->result_array();
	}

	public function get_undangan_nib($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_nib_undangan WHERE id_paket = $id_paket");
		return $query->result_array();
	}

	public function get_nib_vendor($data)
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor_nib');
		$this->db->where('nomor_nib', array($data));
		$query = $this->db->get();
		return $query->result_array();
	}

	//cek persyaratan vms di paket row
	public function get_persyaratanvms_byPaket_row($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_persyaratan_vms_detail WHERE id_paket = $id_paket");
		return $query->row_array();
	}

	public function get_persyaratanvms_byPaket_row_ambil_nib($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_persyaratan_vms_detail WHERE id_paket = $id_paket");
		return $query->row_array();
	}


	public function get_syarat_kehidupan($id_persyaratan_vms_detail)
	{
		$query = $this->db->query("SELECT * FROM tbl_persyaratan_vms_detail WHERE id_persyaratan_vms_detail = $id_persyaratan_vms_detail");
		return $query->row_array();
	}


	public function update_seumur_hidupnya_syarat($where, $data)
	{
		$this->db->where($where);
		$this->db->update('tbl_persyaratan_vms_detail', $data);
		return $this->db->affected_rows();
	}

	// INI DATA VENDOR TER UNDANG
	private function _get_data_query_list_all_vendor_terundang()
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor');
		$this->db->join('tbl_vendor_tdp', 'tbl_vendor.id_vendor = tbl_vendor_tdp.id_vendor', 'left');
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

	public function get_data_penyedia_terundang()
	{
		$this->_get_data_query_list_all_vendor_terundang();
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function count_filtered_data_all_vendor_list_all_vendor_terundang()
	{
		$this->_get_data_query_list_all_vendor_terundang();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data_all_vendor_list_all_vendor_terundang()
	{
		$this->db->from('tbl_vendor');
		return $this->db->count_all_results();
	}
	public function get_data_persyaratan_vms_detail_TDP($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_persyaratan_vms_detail');
		$this->db->where('nama_persyaratan_detail', 'TDP');
		$this->db->where('id_paket', $id_paket);
		$query = $this->db->get();
		return $query->row_array();
	}
	public function get_data_persyaratan_vms_detail_SIUP($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_persyaratan_vms_detail');
		$this->db->where('nama_persyaratan_detail', 'SIUP');
		$this->db->where('id_paket', $id_paket);
		$query = $this->db->get();
		return $query->row_array();
	}
	public function get_data_persyaratan_vms_detail_NPWP($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_persyaratan_vms_detail');
		$this->db->where('nama_persyaratan_detail', 'NPWP');
		$this->db->where('id_paket', $id_paket);
		$query = $this->db->get();
		return $query->row_array();
	}
	public function get_data_persyaratan_vms_detail_SKPKP($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_persyaratan_vms_detail');
		$this->db->where('nama_persyaratan_detail', 'SKPKP');
		$this->db->where('id_paket', $id_paket);
		$query = $this->db->get();
		return $query->row_array();
	}
	public function get_data_persyaratan_vms_detail_SIUJK($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_persyaratan_vms_detail');
		$this->db->where('nama_persyaratan_detail', 'SIUJK');
		$this->db->where('id_paket', $id_paket);
		$query = $this->db->get();
		return $query->row_array();
	}
	public function get_data_persyaratan_vms_detail_KTP($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_persyaratan_vms_detail');
		$this->db->where('nama_persyaratan_detail', 'KTP');
		$this->db->where('id_paket', $id_paket);
		$query = $this->db->get();
		return $query->row_array();
	}
	public function get_data_persyaratan_vms_detail_SBU($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_persyaratan_vms_detail');
		$this->db->where('nama_persyaratan_detail', 'SBU');
		$this->db->where('id_paket', $id_paket);
		$query = $this->db->get();
		return $query->row_array();
	}
	public function get_data_persyaratan_vms_detail_SURAT_KETERANGAN_DOMISILI($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_persyaratan_vms_detail');
		$this->db->where('nama_persyaratan_detail', 'SURAT KETERANGAN DOMISILI');
		$this->db->where('id_paket', $id_paket);
		$query = $this->db->get();
		return $query->row_array();
	}
	public function get_data_persyaratan_vms_detail_BAGAN_STRUKTUR_ORGANISASI($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_persyaratan_vms_detail');
		$this->db->where('nama_persyaratan_detail', 'BAGAN STRUKTUR ORGANISASI');
		$this->db->where('id_paket', $id_paket);
		$query = $this->db->get();
		return $query->row_array();
	}
	public function get_data_persyaratan_vms_detail_BPJS_KETENAGA_KERJAAN($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_persyaratan_vms_detail');
		$this->db->where('nama_persyaratan_detail', 'BPJS KETENAGA KERJAAN');
		$this->db->where('id_paket', $id_paket);
		$query = $this->db->get();
		return $query->row_array();
	}
	public function get_data_persyaratan_vms_detail_BPJS_KESEHATAN($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_persyaratan_vms_detail');
		$this->db->where('nama_persyaratan_detail', 'BPJS KESEHATAN');
		$this->db->where('id_paket', $id_paket);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function all_vendor_terundang(
		$seumur_hidup_tdp,
		$tanggal_berlaku_awal_tdp,
		$tanggal_berlaku_selesai_tdp,
		// NPWP
		$seumur_hidup_npwp,
		$tanggal_berlaku_awal_npwp,
		$tanggal_berlaku_selesai_npwp,
		// NIB
		$nib
	) {
		$this->db->select('*');
		$this->db->from('tbl_vendor');
		$this->db->join('tbl_vendor_tdp', 'tbl_vendor.id_vendor = tbl_vendor_tdp.id_vendor', 'left');
		$this->db->join('tbl_vendor_npwp', 'tbl_vendor.id_vendor = tbl_vendor_npwp.id_vendor', 'left');
		$this->db->join('tbl_vendor_identitas_prusahaan', 'tbl_vendor.id_vendor = tbl_vendor_identitas_prusahaan.id_vendor', 'left');
		$this->db->join('tbl_provinsi', 'tbl_vendor_identitas_prusahaan.id_provinsi = tbl_provinsi.id_provinsi', 'left');
		$this->db->join('tbl_kabupaten', 'tbl_vendor_identitas_prusahaan.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
		$this->db->where('tbl_vendor.status_aktive_vendor', 1);
		$this->db->where('tbl_vendor.status_daftar_hitam_vendor', 0);
		$this->db->where('tbl_vendor.status_vendor_baru', null);
		$this->db->where('tbl_vendor_tdp.masa_berlaku_seumur_hidup', $seumur_hidup_tdp);
		$this->db->where('tbl_vendor_tdp.masa_berlaku_awal', $tanggal_berlaku_awal_tdp);
		$this->db->where('tbl_vendor_tdp.masa_berlaku_akhir', $tanggal_berlaku_selesai_tdp);
		$this->db->where('tbl_vendor_npwp.masa_berlaku_seumur_hidup', $seumur_hidup_npwp);
		$this->db->where('tbl_vendor_npwp.masa_berlaku_awal', $tanggal_berlaku_awal_npwp);
		$this->db->where('tbl_vendor_npwp.masa_berlaku_akhir', $tanggal_berlaku_selesai_npwp);
		$this->db->where('tbl_vendor_identitas_prusahaan.nib', $nib);
		$this->db->group_by('tbl_vendor.id_vendor');
		$query = $this->db->get();
		return $query->result_array();
	}


	// VENDOR TERUNDANG SESUAI PERSYARATAN
	private function _get_data_query_list_all_persyaratan_terundang(
		$nib_di_vendor,
		$nib_where,
		$seumur_hidup_tdp,
		$tanggal_berlaku_awal_tdp,
		$tanggal_berlaku_selesai_tdp,
		// NPWP
		$seumur_hidup_npwp,
		$tanggal_berlaku_awal_npwp,
		$tanggal_berlaku_selesai_npwp
		// NIB
	) {
		$this->db->select('*');
		$this->db->from('tbl_vendor');
		$this->db->join('tbl_vendor_nib', 'tbl_vendor.id_vendor = tbl_vendor_nib.id_vendor', 'left');
		$this->db->join('tbl_vendor_tdp', 'tbl_vendor.id_vendor = tbl_vendor_tdp.id_vendor', 'left');
		$this->db->join('tbl_vendor_npwp', 'tbl_vendor.id_vendor = tbl_vendor_npwp.id_vendor', 'left');
		$this->db->join('tbl_vendor_identitas_prusahaan', 'tbl_vendor.id_vendor = tbl_vendor_identitas_prusahaan.id_vendor', 'left');
		$this->db->join('tbl_provinsi', 'tbl_vendor_identitas_prusahaan.id_provinsi = tbl_provinsi.id_provinsi', 'left');
		$this->db->join('tbl_kabupaten', 'tbl_vendor_identitas_prusahaan.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
		$this->db->where('tbl_vendor.status_aktive_vendor', 1);
		$this->db->where('tbl_vendor.status_daftar_hitam_vendor', 0);
		$this->db->where('tbl_vendor.status_vendor_baru', null);
		$this->db->where('tbl_vendor_nib.nomor_nib', $nib_where);
		$this->db->where('tbl_vendor_tdp.masa_berlaku_seumur_hidup', $seumur_hidup_tdp);
		$this->db->where('tbl_vendor_tdp.masa_berlaku_awal', $tanggal_berlaku_awal_tdp);
		$this->db->where('tbl_vendor_tdp.masa_berlaku_akhir', $tanggal_berlaku_selesai_tdp);
		$this->db->where('tbl_vendor_npwp.masa_berlaku_seumur_hidup', $seumur_hidup_npwp);
		$this->db->where('tbl_vendor_npwp.masa_berlaku_awal', $tanggal_berlaku_awal_npwp);
		$this->db->where('tbl_vendor_npwp.masa_berlaku_akhir', $tanggal_berlaku_selesai_npwp);
		foreach ($nib_di_vendor as $key => $value) {
			$this->db->or_where('tbl_vendor_nib.nomor_nib', $value['nomor_nib_undangan']);
		}

		if (isset($_POST['search']['value'])) {
			$this->db->like('tbl_vendor.username_vendor', $_POST['search']['value']);
		}

		if (isset($_POST['order'])) {
			$this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('tbl_vendor.id_vendor', 'DESC');
		}
	}

	public function datatable_vendor_persyaratan_terundang(
		$nib_di_vendor,
		$nib_where,
		$seumur_hidup_tdp,
		$tanggal_berlaku_awal_tdp,
		$tanggal_berlaku_selesai_tdp,
		// NPWP
		$seumur_hidup_npwp,
		$tanggal_berlaku_awal_npwp,
		$tanggal_berlaku_selesai_npwp
		// NIB
		// $nib
	) {
		$this->_get_data_query_list_all_persyaratan_terundang(
			$nib_di_vendor,
			$nib_where,
			$seumur_hidup_tdp,
			$tanggal_berlaku_awal_tdp,
			$tanggal_berlaku_selesai_tdp,
			// NPWP
			$seumur_hidup_npwp,
			$tanggal_berlaku_awal_npwp,
			$tanggal_berlaku_selesai_npwp
		);
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function count_filtered_data_all_vendor_list_all_persyaratan_terundang(
		$nib_di_vendor,
		$nib_where,
		$seumur_hidup_tdp,
		$tanggal_berlaku_awal_tdp,
		$tanggal_berlaku_selesai_tdp,
		// NPWP
		$seumur_hidup_npwp,
		$tanggal_berlaku_awal_npwp,
		$tanggal_berlaku_selesai_npwp
		// NIB
		// $nib
	) {
		$this->_get_data_query_list_all_persyaratan_terundang(
			$nib_di_vendor,
			$nib_where,
			$seumur_hidup_tdp,
			$tanggal_berlaku_awal_tdp,
			$tanggal_berlaku_selesai_tdp,
			// NPWP
			$seumur_hidup_npwp,
			$tanggal_berlaku_awal_npwp,
			$tanggal_berlaku_selesai_npwp
			// NIB
			// $nib
		);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data_all_vendor_list_all_persyaratan_terundang()
	{
		$this->db->from('tbl_vendor');
		return $this->db->count_all_results();
	}

	public function ambil_semua_chat($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_pesan 
			LEFT JOIN tbl_pegawai ON tbl_pesan.id_pengirim = tbl_pegawai.id_pegawai 
			LEFT JOIN tbl_vendor ON tbl_pesan.id_penerima = tbl_vendor.id_vendor
			WHERE id_paket = $id_paket");
		return $query->result_array();
	}

	public function ambil_semua_evaluasi($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_vendor_mengikuti_paket
		LEFT JOIN tbl_vendor ON tbl_vendor.id_vendor = tbl_vendor_mengikuti_paket.id_mengikuti_vendor
		LEFT JOIN tbl_rincian_hps_vendor ON tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor = tbl_rincian_hps_vendor.id_vendor
		WHERE id_mengikuti_paket_vendor = $id_paket");
		return $query->result_array();
	}

	public function ambil_sanggahan($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_dokumen_sanggahan_akhir LEFT JOIN tbl_vendor ON tbl_dokumen_sanggahan_akhir.id_vendor = tbl_vendor.id_vendor WHERE tbl_dokumen_sanggahan_akhir.id_paket = $id_paket");
		return $query->result_array();
	}

	public function ambil_jenis_kontrak($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_jenis_kontrak WHERE id_paket = $id_paket");
		return $query->result_array();
	}

	public function ambil_lokasi_kerja($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_lokasi_pekerjaan 
									LEFT JOIN tbl_provinsi ON tbl_lokasi_pekerjaan.id_provinsi = tbl_provinsi.id_provinsi
									LEFT JOIN tbl_kabupaten ON tbl_lokasi_pekerjaan.id_kabupaten = tbl_kabupaten.id_kabupaten
									WHERE id_paket = $id_paket");
		return $query->result_array();
	}

	public function ambil_sumber_dana($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_sumber_dana WHERE id_paket = $id_paket");
		return $query->result_array();
	}


	public function get_tahap_penjelasan($id_paket, $id_kualifikasi)
	{

		$query = $this->db->query("SELECT * FROM tbl_jadwal_tender_detail WHERE id_paket = $id_paket AND id_kualifikasi = $id_kualifikasi AND nama_jadwal_tender = 'Pemberian Penjelasan'");
		return $query->row_array();
	}

	public function get_tahap_dokumen_pemilihan($id_paket, $id_kualifikasi)
	{
		if ($id_kualifikasi == 9 || 12 || 14 || 18) {
			$query = $this->db->query("SELECT * FROM tbl_jadwal_tender_detail WHERE id_paket = $id_paket AND id_kualifikasi = $id_kualifikasi AND nama_jadwal_tender = 'Download Dokumen Kualifikasi'OR nama_jadwal_tender = 'Download Dokumen Pengadaan'");
			return $query->row_array();
		} else {
			$query = $this->db->query("SELECT * FROM tbl_jadwal_tender_detail WHERE id_paket = $id_paket AND id_kualifikasi = $id_kualifikasi AND nama_jadwal_tender = 'Download Dokumen Kualifikasi'");
			return $query->row_array();
		}
	}
	public function get_tahap_dokumen_syarat_tambahan($id_paket, $id_kualifikasi)
	{
		if ($id_kualifikasi == 9 || 12 || 14 || 18) {
			$query = $this->db->query("SELECT * FROM tbl_jadwal_tender_detail WHERE id_paket = $id_paket AND id_kualifikasi = $id_kualifikasi AND nama_jadwal_tender = 'Upload Dokumen Penawaran'");
			return $query->row_array();
		} else {
			$query = $this->db->query("SELECT * FROM tbl_jadwal_tender_detail WHERE id_paket = $id_paket AND id_kualifikasi = $id_kualifikasi AND nama_jadwal_tender = 'Upload Dokumen Prakualifikasi'");
			return $query->row_array();
		}
	}
	public function get_tahap_dokumen_pembuktian_kualifikasi($id_paket, $id_kualifikasi)
	{
		$query = $this->db->query("SELECT * FROM tbl_jadwal_tender_detail WHERE id_paket = $id_paket AND id_kualifikasi = $id_kualifikasi AND nama_jadwal_tender = 'Pembuktian Kualifikasi'");
		return $query->row_array();
	}
	public function get_tahap_dokumen_penetapan_kualifikasi($id_paket, $id_kualifikasi)
	{
		if ($id_kualifikasi == 9 || 12 || 14 || 18) {
			$query = $this->db->query("SELECT * FROM tbl_jadwal_tender_detail WHERE id_paket = $id_paket AND id_kualifikasi = $id_kualifikasi AND nama_jadwal_tender = 'Evaluasi Dokumen Kualifikasi'");
			return $query->row_array();
		} else {
			$query = $this->db->query("SELECT * FROM tbl_jadwal_tender_detail WHERE id_paket = $id_paket AND id_kualifikasi = $id_kualifikasi AND nama_jadwal_tender = 'Penetapan Hasil Kualifikasi'");
			return $query->row_array();
		}
	}


	public function get_penetapan_hasil_prakualifkasi($id_paket, $id_kualifikasi)
	{
		$query = $this->db->query("SELECT * FROM tbl_jadwal_tender_detail WHERE id_paket = $id_paket AND id_kualifikasi = $id_kualifikasi AND nama_jadwal_tender = 'Penetapan Hasil Kualifikasi'");
		return $query->row_array();
	}



	public function pengumuman_hasil_prakualifikasi($id_paket, $id_kualifikasi)
	{
		$query = $this->db->query("SELECT * FROM tbl_jadwal_tender_detail WHERE id_paket = $id_paket AND id_kualifikasi = $id_kualifikasi AND nama_jadwal_tender = 'Pengumuman Hasil Prakualifikasi'");
		return $query->row_array();
	}

	public function get_tahap_pengumuman_hasil_prakualifikasi($id_paket, $id_kualifikasi)
	{
		if ($id_kualifikasi == 9 || 12 || 14 || 18) {
			$query = $this->db->query("SELECT * FROM tbl_jadwal_tender_detail WHERE id_paket = $id_paket AND id_kualifikasi = $id_kualifikasi AND nama_jadwal_tender = 'Pengumuman Pemenang'");
			return $query->row_array();
		} else {
			$query = $this->db->query("SELECT * FROM tbl_jadwal_tender_detail WHERE id_paket = $id_paket AND id_kualifikasi = $id_kualifikasi AND nama_jadwal_tender = 'Pengumuman Hasil Prakualifikasi'");
			return $query->row_array();
		}
	}
	public function get_tahap_dokumen_sangahan_prakualifikasi($id_paket, $id_kualifikasi)
	{
		$query = $this->db->query("SELECT * FROM tbl_jadwal_tender_detail WHERE id_paket = $id_paket AND id_kualifikasi = $id_kualifikasi AND nama_jadwal_tender = 'Masa Sanggah Prakualifikasi'");
		return $query->row_array();
	}

	public function get_tahap_dokumen_peringkat_teknis($id_paket, $id_kualifikasi)
	{
		if ($id_kualifikasi == 13 && 15) {
			$query = $this->db->query("SELECT * FROM tbl_jadwal_tender_detail WHERE id_paket = $id_paket AND id_kualifikasi = $id_kualifikasi AND nama_jadwal_tender = 'Upload Berita Acara Hasil Pelelangan'");
		} else {
			$query = $this->db->query("SELECT * FROM tbl_jadwal_tender_detail WHERE id_paket = $id_paket AND id_kualifikasi = $id_kualifikasi AND nama_jadwal_tender = 'Pemberitahuan/Pengumuman Peringkat Teknis'");
		}

		return $query->row_array();
	}


	public function get_untuk_tahap_peringkat_teknisku($id_paket, $id_kualifikasi)
	{
		$query = $this->db->query("SELECT * FROM tbl_jadwal_tender_detail WHERE id_paket = $id_paket AND id_kualifikasi = $id_kualifikasi AND nama_jadwal_tender = 'Pemberitahuan/Pengumuman Peringkat Teknis'");

		return $query->row_array();
	}

	public function get_untuk_tahap_penetapan_peringkat_teknisku_seleksi($id_paket, $id_kualifikasi)
	{
		$query = $this->db->query("SELECT * FROM tbl_jadwal_tender_detail WHERE id_paket = $id_paket AND id_kualifikasi = $id_kualifikasi AND nama_jadwal_tender = 'Penetapan Peringkat Teknis'");

		return $query->row_array();
	}

	public function get_tahap_dokumen_negosiasi($id_paket, $id_kualifikasi)
	{
		if ($id_kualifikasi == 13 && 15) {
			$query = $this->db->query("SELECT * FROM tbl_jadwal_tender_detail WHERE id_paket = $id_paket AND id_kualifikasi = $id_kualifikasi AND nama_jadwal_tender = 'Penetapan Pemenang'");
		} else {
			$query = $this->db->query("SELECT * FROM tbl_jadwal_tender_detail WHERE id_paket = $id_paket AND id_kualifikasi = $id_kualifikasi AND nama_jadwal_tender = 'Pembukaan dan Evaluasi Penawaran File II : Harga'");
		}

		return $query->row_array();
	}

	public function get_tahap_prakualfiikasi_satu_file_penetapan($id_paket, $id_kualifikasi)
	{
		if ($id_kualifikasi == 13 || 15) {
			$query = $this->db->query("SELECT * FROM tbl_jadwal_tender_detail WHERE id_paket = $id_paket AND id_kualifikasi = $id_kualifikasi AND nama_jadwal_tender = 'Penetapan Pemenang'");
		} else {
			$query = $this->db->query("SELECT * FROM tbl_jadwal_tender_detail WHERE id_paket = $id_paket AND id_kualifikasi = $id_kualifikasi AND nama_jadwal_tender = 'Pembukaan dan Evaluasi Penawaran File II : Harga'");
		}

		return $query->row_array();
	}



	public function get_tahap_penetapan_pemenang($id_paket, $id_kualifikasi)
	{
		$query = $this->db->query("SELECT * FROM tbl_jadwal_tender_detail WHERE id_paket = $id_paket AND id_kualifikasi = $id_kualifikasi AND nama_jadwal_tender = 'Penetapan Pemenang'");
		return $query->row_array();
	}

	public function get_tahap_keluar_dokumen_kualifikasi($id_paket, $id_kualifikasi)
	{
		$query = $this->db->query("SELECT * FROM tbl_jadwal_tender_detail WHERE id_paket = $id_paket AND id_kualifikasi = $id_kualifikasi AND nama_jadwal_tender = 'Evaluasi Dokumen Kualifikasi'");
		return $query->row_array();
	}

	public function get_tahap_dokumen_sangahan_akhir($id_paket, $id_kualifikasi)
	{
		$query = $this->db->query("SELECT * FROM tbl_jadwal_tender_detail WHERE id_paket = $id_paket AND id_kualifikasi = $id_kualifikasi AND nama_jadwal_tender = 'Masa Sanggah Hasil Lelang'");
		return $query->row_array();
	}

	public function getid_transaksi_langsung($id_paket)
	{
		$query = $this->db->query("SELECT id_metode_pemilihan FROM tbl_paket WHERE id_paket = $id_paket");
		return $query->row_array();
	}


	public function get_id_kualifikasi_nilai($id_paket)
	{
		$query = $this->db->query("SELECT id_kualifikasi FROM tbl_paket WHERE id_paket = $id_paket");
		return $query->row_array();
	}

	// ININ UTNTUK ATUR TAHAP PRAKUALIFIKASI 2 FILE

	public function evaluasi_dokumen_prakualifiaksi_2_file($id_paket, $id_kualifikasi)
	{
		$query = $this->db->query("SELECT * FROM tbl_jadwal_tender_detail WHERE id_paket = $id_paket AND id_kualifikasi = $id_kualifikasi AND nama_jadwal_tender = 'Evaluasi Dokumen Kualifikasi'");
		return $query->row_array();
	}


	// TAMBAHAN UNTUK YANG SELEKSI
	public function get_tahap_penjelasan_prakualifikasi($id_paket, $id_kualifikasi)
	{
		$query = $this->db->query("SELECT * FROM tbl_jadwal_tender_detail WHERE id_paket = $id_paket AND id_kualifikasi = $id_kualifikasi AND nama_jadwal_tender = 'Penjelasan Dokumen Prakualifikasi'");
		return $query->row_array();
	}

	public function get_tahap_negosiasi_seleksi($id_paket, $id_kualifikasi)
	{
		$query = $this->db->query("SELECT * FROM tbl_jadwal_tender_detail WHERE id_paket = $id_paket AND id_kualifikasi = $id_kualifikasi AND nama_jadwal_tender = 'Klarifikasi dan Negosiasi Teknis dan Biaya'");
		return $query->row_array();
	}

	public function get_vendor_by_id_dapet_id_result($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor_mengikuti_paket');
		$this->db->where('id_mengikuti_paket_vendor', $id_paket);
		$this->db->where('pemenang_tender', 1);
		$query = $this->db->get();
		return $query->result_array();
	}


	public function ketika_kosong_vendor_dievaluasi($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor_mengikuti_paket');
		$this->db->where('id_mengikuti_paket_vendor', $id_paket);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function status_pakta_integritas($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_status_persetujuan_tender WHERE id_paket = $id_paket");
		return $query->row_array();
	}

	//tenaga ahli untuk panitia
	public function vendor_tenaga_ahli_row($id_vendor)
	{
		$query = $this->db->query("SELECT * FROM tbl_vendor_tenaga_ahli LEFT JOIN tbl_vendor ON tbl_vendor_tenaga_ahli.id_vendor = tbl_vendor.id_vendor WHERE tbl_vendor.id_vendor = $id_vendor");
		return $query->row_array();
	}

	var $table_tenaga_ahli = 'tbl_vendor_tenaga_ahli';
	var $order_tenaga_ahliii = array('id_tenaga_ahli', 'nama_tenaga_ahli', 'tanggal_lahir_tenaga_ahli', 'prodi_tenaga_ahli', 'pendidikan_trakhir_tenaga_ahli', 'tahun_lulus_tenaga_ahli', 'sertifikasi_tenaga_ahli', 'kualifikasi_keahlian_tenaga_ahli', 'tanggal_masa_berlaku_sertifikasi', 'pengalaman_tenaga_ahli', 'jabatan_tenaga_ahli', 'rencana_jabatan_tenaga_ahli');

	private function _get_data_query_tenaga_ahli($id_vendor)
	{
		$this->db->from($this->table_tenaga_ahli);
		$this->db->where('id_vendor', $id_vendor);
		$i = 0;
		foreach ($this->order_tenaga_ahliii as $item) // looping awal
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

				if (count($this->order_tenaga_ahliii) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->order_tenaga_ahliii[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_tenaga_ahli', 'DESC');
		}
	}

	public function datatable_tenaga_ahli($id_vendor) //nam[ilin data pake ini
	{
		$this->_get_data_query_tenaga_ahli($id_vendor); //ambil data dari get yg di atas
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_data_tenaga_ahli($id_vendor)
	{
		$this->_get_data_query_tenaga_ahli($id_vendor); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data_tenaga_ahli($id_vendor)
	{
		$this->db->from($this->table_tenaga_ahli);
		$this->db->where('id_vendor', $id_vendor);
		return $this->db->count_all_results();
	}

	// pengalaman vendor
	public function vendor_pengalaman_row($id_vendor)
	{
		$query = $this->db->query("SELECT * FROM tbl_vendor_pengalaman LEFT JOIN tbl_vendor ON tbl_vendor_pengalaman.id_vendor = tbl_vendor.id_vendor WHERE tbl_vendor.id_vendor = $id_vendor AND tbl_vendor_pengalaman.status_sesuai = 1");
		return $query->row_array();
	}

	var $table_pengalaman_vendor = 'tbl_vendor_pengalaman';
	var $order_pengalaman_vendor = array('id_pengalaman', 'nama_pekerjaan_pengalaman', 'instansi_pengalaman', 'nomor_dan_tanggal_kontrak', 'nilai_kontrak', 'nilai_sharing', 'tanggal_kontrak', 'selesai_kontrak', 'referensi_kontrak');

	private function _get_data_query_pengalaman_vendor($id_vendor)
	{
		$this->db->from($this->table_pengalaman_vendor);
		$this->db->where('id_vendor', $id_vendor);
		$this->db->where('status_sesuai', 1);
		$i = 0;
		foreach ($this->order_pengalaman_vendor as $item) // looping awal
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

				if (count($this->order_pengalaman_vendor) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->order_pengalaman_vendor[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_pengalaman', 'DESC');
		}
	}

	public function datatable_pengalaman_vendor($id_vendor) //nam[ilin data pake ini
	{
		$this->_get_data_query_pengalaman_vendor($id_vendor); //ambil data dari get yg di atas
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_data_pengalaman($id_vendor)
	{
		$this->_get_data_query_pengalaman_vendor($id_vendor); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data_pengalaman($id_vendor)
	{
		$this->db->from($this->table_pengalaman_vendor);
		$this->db->where('id_vendor', $id_vendor);
		return $this->db->count_all_results();
	}

	public function vendor_neraca_keuangan($id_vendor)
	{
		$query = $this->db->query("SELECT * FROM tbl_vendor_keuangan LEFT JOIN tbl_vendor ON tbl_vendor_keuangan.id_vendor = tbl_vendor.id_vendor WHERE tbl_vendor.id_vendor = $id_vendor AND tbl_vendor_keuangan.status_sesuai = 1");
		return $query->row_array();
	}

	var $table_neraca_keuangan_vendor = 'tbl_vendor_keuangan';
	var $order_neraca_keuangan = array('id_keuangan', 'status_audit', 'bukti');

	private function _get_data_query_neraca_keuangan_vendor($id_vendor)
	{
		$this->db->from($this->table_neraca_keuangan_vendor);
		$this->db->where('id_vendor', $id_vendor);
		$this->db->where('status_sesuai', 1);
		$i = 0;
		foreach ($this->order_neraca_keuangan as $item) // looping awal
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

				if (count($this->order_neraca_keuangan) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->order_neraca_keuangan[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_keuangan', 'DESC');
		}
	}

	public function datatable_neraca_keuangan_vendor($id_vendor) //nam[ilin data pake ini
	{
		$this->_get_data_query_neraca_keuangan_vendor($id_vendor); //ambil data dari get yg di atas
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_data_neraca_keuangan($id_vendor)
	{
		$this->_get_data_query_neraca_keuangan_vendor($id_vendor); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data_neraca_keuangan($id_vendor)
	{
		$this->db->from($this->table_neraca_keuangan_vendor);
		$this->db->where('id_vendor', $id_vendor);
		return $this->db->count_all_results();
	}


	public function update_dokumen_sanggahan_akhir($upload, $id_dokumen_sanggahan_akhir)
	{
		$this->db->where('id_dokumen_sanggahan_akhir', $id_dokumen_sanggahan_akhir);
		$this->db->update('tbl_dokumen_sanggahan_akhir', $upload);
		return $this->db->affected_rows();
	}

	public function update_dokumen_sanggahan_prakualifikasi($upload, $id_dokumen_sanggahan_prakualifikasi)
	{
		$this->db->where('id_dokumen_sanggahan_prakualifikasi', $id_dokumen_sanggahan_prakualifikasi);
		$this->db->update('tbl_dokumen_sanggahan_prakualifikasi', $upload);
		return $this->db->affected_rows();
	}

	public function insert_sbu_paket($data)
	{
		$this->db->insert('tbl_paket_sbu_detail', $data);
		return $this->db->affected_rows();
	}

	public function get_sbu_paket($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_paket_sbu_detail LEFT JOIN tbl_sbu ON tbl_paket_sbu_detail.id_sbu = tbl_sbu.id_sbu WHERE id_paket = $id_paket");
		return $query->result();
	}


	public function delete_sbu($id_sbu)
	{
		$this->db->delete('tbl_paket_sbu_detail', ['id_paket_sbu_detail' => $id_sbu]);
		return $this->db->affected_rows();
	}

	private function _get_data_query_list_all_vendor_tender_terbatas()
	{
		$i = 0;
		$this->db->select('*');
		$this->db->from('tbl_vendor');
		$this->db->join('tbl_vendor_identitas_prusahaan', 'tbl_vendor.id_vendor = tbl_vendor_identitas_prusahaan.id_vendor', 'left');
		$this->db->join('tbl_provinsi', 'tbl_vendor_identitas_prusahaan.id_provinsi = tbl_provinsi.id_provinsi', 'left');
		$this->db->join('tbl_kabupaten', 'tbl_vendor_identitas_prusahaan.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
		$this->db->where('tbl_vendor.status_aktive_vendor', 1);
		$this->db->where('tbl_vendor.status_daftar_hitam_vendor', 0);
		$this->db->where('tbl_vendor.status_vendor_baru', null);
		$this->db->where('tbl_vendor.status_validasi_dokumen', 1);
		$this->db->group_by('tbl_vendor.id_vendor');
		foreach ($this->list_vendor_lama as $item) // looping awal
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

				if (count($this->list_vendor_lama) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}

		if (isset($_POST['order'])) {
			$this->db->order_by($this->list_vendor_lama[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('tbl_vendor.id_vendor', 'DESC');
		}
	}

	public function getdatatable_list_all_vendor_tender_terbatas()
	{
		$this->_get_data_query_list_all_vendor_tender_terbatas();
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function count_filtered_data_all_vendor_list_all_vendor_tender_terbatas()
	{
		$this->_get_data_query_list_all_vendor();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data_all_vendor_list_all_vendor_tender_terbatas()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function get_mengikuti_paket_vendor($id_paket, $id_vendor)
	{
		$query = $this->db->query("SELECT * FROM tbl_vendor_mengikuti_paket WHERE id_mengikuti_paket_vendor = $id_paket AND id_mengikuti_vendor = $id_vendor");
		return $query->row();
	}

	public function update_status_persyaratan_vms($data, $id_persyartan_vms_detail)
	{
		$this->db->where('id_persyaratan_vms_detail', $id_persyartan_vms_detail);
		$this->db->update('tbl_persyaratan_vms_detail', $data);
		return $this->db->affected_rows();
	}

	// 30 juni 2022
	public function vendor_peralatan_tender_row($id_vendor)
	{
		$query = $this->db->query("SELECT * FROM tbl_vendor LEFT JOIN tbl_peralatan_tender ON tbl_vendor.id_vendor = tbl_peralatan_tender.id_vendor WHERE tbl_vendor.id_vendor = $id_vendor");
		return $query->row_array();
	}

	var $field4 = ['id_peralatan_tender', 'merk_dan_tipe', 'jumlah_peralatan', 'kapasitas_produksi', 'satuan_volume', 'tahun_pembuatan', 'kepemilikan', 'data_dukung_kepemilikan', 'lokasi_saat_ini', 'jarak_lokasi', 'bukti_kepemilikan', 'bukti_kepemilikan'];
	private function _get_data_query_peralatan($id_vendor, $id_paket)
	{
		$i = 0;
		$this->db->select('*');
		$this->db->from('tbl_peralatan_tender');
		$this->db->where('id_vendor', $id_vendor);
		$this->db->where('id_paket', $id_paket);

		foreach ($this->field4 as $item) // looping awal
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

				if (count($this->field4) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->field4[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_peralatan_tender', 'DESC');
		}
	}

	public function get_peralatan_tender($id_vendor, $id_paket) //nam[ilin data pake ini
	{
		$this->_get_data_query_peralatan($id_vendor, $id_paket); //ambil data dari get yg di atas
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_all_data_peralatan_tender($id_vendor, $id_paket)
	{
		$this->_get_data_query_peralatan($id_vendor, $id_paket); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_filtered_peralatan_tender($id_vendor, $id_paket)
	{
		$this->db->from('tbl_peralatan_tender');
		$this->db->where('id_vendor', $id_vendor);
		$this->db->where('id_paket', $id_paket);
		return $this->db->count_all_results();
	}

	public function vendor_tenaga_ahli_tender_row($id_vendor)
	{
		$query = $this->db->query("SELECT * FROM tbl_vendor LEFT JOIN tbl_tenaga_ahli_tender ON tbl_vendor.id_vendor = tbl_tenaga_ahli_tender.id_vendor WHERE tbl_vendor.id_vendor = $id_vendor");
		return $query->row_array();
	}

	var $field5 = ['id_tenaga_ahli_tender', 'jabatan', 'nama_tenaga_ahli', 'tanggal_lahir', 'umur', 'umur', 'alamat_tempat_tinggal', 'pendidikan'];
	private function _get_data_query_tenaga_ahli_tender($id_vendor, $id_paket)
	{
		$i = 0;
		$this->db->select('*');
		$this->db->from('tbl_tenaga_ahli_tender');
		$this->db->where('id_vendor', $id_vendor);
		$this->db->where('id_paket', $id_paket);

		foreach ($this->field5 as $item) // looping awal
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

				if (count($this->field5) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->field5[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_tenaga_ahli_tender', 'DESC');
		}
	}

	public function get_tenaga_ahli_tender($id_vendor, $id_paket) //nam[ilin data pake ini
	{
		$this->_get_data_query_tenaga_ahli_tender($id_vendor, $id_paket); //ambil data dari get yg di atas
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_all_data_tenaga_ahli_tender($id_vendor, $id_paket)
	{
		$this->_get_data_query_tenaga_ahli_tender($id_vendor, $id_paket); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_filtered_tenaga_ahli_tender($id_vendor, $id_paket)
	{
		$this->db->from('tbl_tenaga_ahli_tender');
		$this->db->where('id_vendor', $id_vendor);
		$this->db->where('id_paket', $id_paket);
		return $this->db->count_all_results();
	}
	public function get_by_id_tenaga_ahli($id_tenaga_ahli_tender)
	{
		$this->db->select('*');
		$this->db->from('tbl_tenaga_ahli_tender');
		$this->db->where('id_tenaga_ahli_tender', $id_tenaga_ahli_tender);
		$query = $this->db->get();
		return $query->row_array();
	}

	var $field6 = ['id_tenaga_ahli_tender'];
	private function _get_data_query_riwayat_tenaga_ahli($id_tenaga_ahli_tender)
	{
		$i = 0;
		$this->db->select('*');
		$this->db->from('tbl_detail_tenaga_ahli_tender');
		$this->db->where('id_tenaga_ahli_tender', $id_tenaga_ahli_tender);

		foreach ($this->field6 as $item) // looping awal
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

				if (count($this->field6) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->field6[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_tenaga_ahli_tender', 'DESC');
		}
	}

	public function get_riwayat_tenaga_ahli_tender($id_tenaga_ahli_tender) //nam[ilin data pake ini
	{
		$this->_get_data_query_riwayat_tenaga_ahli($id_tenaga_ahli_tender); //ambil data dari get yg di atas
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_all_data__riwayat_tenaga_ahli_tender($id_tenaga_ahli_tender)
	{
		$this->_get_data_query_riwayat_tenaga_ahli($id_tenaga_ahli_tender); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function count_filtered__riwayat_tenaga_ahli_tender($id_tenaga_ahli_tender)
	{
		$this->db->from('tbl_detail_tenaga_ahli_tender');
		$this->db->where('id_tenaga_ahli_tender', $id_tenaga_ahli_tender);
		return $this->db->count_all_results();
	}

	// 30 juni 2022
	public function update_sts_peralatan($where, $data)
	{
		$this->db->where($where)->update('tbl_paket', $data);
		return $this->db->affected_rows();
	}

	// 6 juli 2022
	public function get_username($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor_mengikuti_paket');
		$this->db->join('tbl_vendor', 'tbl_vendor.id_vendor = tbl_vendor_mengikuti_paket.id_mengikuti_vendor', 'left');
		$this->db->where('tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', $id_paket);
		$this->db->group_by('id_mengikuti_vendor');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_seleksi_terbatas()
	{
		$this->db->select('*');
		$this->db->from('tbl_jadwal_kualifikasi');
		$this->db->where('id_metode_pemilihan', 6);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_tender_terbatas()
	{
		$this->db->select('*');
		$this->db->from('tbl_jadwal_kualifikasi');
		$this->db->where('id_metode_pemilihan', 4);
		$query = $this->db->get();
		return $query->result_array();
	}

	// 9 september 
	public function upload_undangan_penawaran($upload, $id_paket)
	{
		$this->db->where('id_paket', $id_paket);
		$this->db->update('tbl_paket', $upload);
		$this->db->affected_rows();
	}

	// 2023 update ba upload prakualifikasi dan pascakualifikasi 1-5
	public function upload_ba_prakualifikasi($upload, $id_paket)
	{
		$this->db->where('id_paket', $id_paket);
		$this->db->update('tbl_paket', $upload);
		return $this->db->affected_rows();
	}
	// end 2023 update ba upload prakualifikasi dan pascakualifikasi 1-5


	// INI UNTUK TAHAPAN JADWAL EAUCTION 
	public function get_tahap_download_dokumen_pengadaan_eauction($id_paket, $id_kualifikasi)
	{
		$query = $this->db->query("SELECT * FROM tbl_jadwal_tender_detail WHERE id_paket = $id_paket AND id_kualifikasi = $id_kualifikasi AND nama_jadwal_tender = 'Download Dokumen Pengadaan'");
		return $query->row_array();
	}

	public function penjelasan_tender_eauction($id_paket, $id_kualifikasi)
	{
		$query = $this->db->query("SELECT * FROM tbl_jadwal_tender_detail WHERE id_paket = $id_paket AND id_kualifikasi = $id_kualifikasi AND nama_jadwal_tender = 'Penjelasan Tender'");
		return $query->row_array();
	}

	public function upload_dokumen_eauction($id_paket, $id_kualifikasi)
	{
		$query = $this->db->query("SELECT * FROM tbl_jadwal_tender_detail WHERE id_paket = $id_paket AND id_kualifikasi = $id_kualifikasi AND nama_jadwal_tender = 'Upload Dokumen'");
		return $query->row_array();
	}
	public function tahap_evaluasi_eauction($id_paket, $id_kualifikasi)
	{
		$query = $this->db->query("SELECT * FROM tbl_jadwal_tender_detail WHERE id_paket = $id_paket AND id_kualifikasi = $id_kualifikasi AND nama_jadwal_tender = 'Evaluasi Persyaratan Tambahan'");
		return $query->row_array();
	}

	public function tahap_jadwal_binding($id_paket, $id_kualifikasi)
	{
		$query = $this->db->query("SELECT * FROM tbl_jadwal_tender_detail WHERE id_paket = $id_paket AND id_kualifikasi = $id_kualifikasi AND nama_jadwal_tender = 'Jadwal Binding'");
		return $query->row_array();
	}

	public function tahap_penetapan_pemenang_eauction($id_paket, $id_kualifikasi)
	{
		$query = $this->db->query("SELECT * FROM tbl_jadwal_tender_detail WHERE id_paket = $id_paket AND id_kualifikasi = $id_kualifikasi AND nama_jadwal_tender = 'Penetapan Pemenang'");
		return $query->row_array();
	}

	public function tahap_pengumuman_pemenang_eauction($id_paket, $id_kualifikasi)
	{
		$query = $this->db->query("SELECT * FROM tbl_jadwal_tender_detail WHERE id_paket = $id_paket AND id_kualifikasi = $id_kualifikasi AND nama_jadwal_tender = 'Pengumuman Pemenang'");
		return $query->row_array();
	}
}
