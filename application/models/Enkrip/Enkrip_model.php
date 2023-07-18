<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Enkrip_model extends CI_Model
{
	public function register($data)
	{
		$this->db->insert('tbl_user_enkrip', $data);
	}

	public function get_by_token($token_paket)
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
		$this->db->where('token', $token_paket);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function get_metode_pemilihan($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_paket WHERE id_paket = $id_paket");
		return $query->row_array();
	}

	public function get_informasi_tender($id_paket)
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
		$this->db->where('tbl_paket.id_paket', $id_paket);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function login($username)
	{
		$data = $this->db->get_where('tbl_user_enkrip', ['username' => $username]);
		return $data->row_array();
	}

	public function totalhps($angga)
	{
		$this->db->select('*');
		$this->db->from('tbl_rincian_hps');
		$this->db->where('id_paket', $angga);
		$query = $this->db->get();
		return $query->result_array();
	}


	public function get_vendor_by_id_dapet_id($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor_mengikuti_paket');
		$this->db->where('id_mengikuti_paket_vendor', $id_paket);
		$query = $this->db->get();
		return $query->row_array();
	}
	public function get_vendor($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_vendor_mengikuti_paket LEFT JOIN tbl_vendor ON tbl_vendor.id_vendor = tbl_vendor_mengikuti_paket.id_mengikuti_vendor WHERE id_mengikuti_paket_vendor = $id_paket");
		return $query->result_array();
	}

	private function _get_data_query_vendor_mengikuti_paket($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor_mengikuti_paket');
		$this->db->join('tbl_vendor', 'tbl_vendor.id_vendor = tbl_vendor_mengikuti_paket.id_mengikuti_vendor', 'left');
		$this->db->join('tbl_paket', 'tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', 'left');
		$this->db->where('tbl_paket.status_tahap_tender', 2);
		$this->db->where('status_mengikuti_paket', 1);
		$this->db->where('id_mengikuti_paket_vendor', $id_paket);
		if (isset($_POST['search']['value'])) {
			$this->db->like('username_vendor', $_POST['search']['value']);
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_mengikuti_paket', 'DESC');
		}
	}

	public function getdatatable_vendor_mengikuti_paket($id_paket)
	{
		$this->_get_data_query_vendor_mengikuti_paket($id_paket);
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_data_vendor_mengikuti_paket($id_paket)
	{
		$this->_get_data_query_vendor_mengikuti_paket($id_paket);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data_vendor_mengikuti_paket()
	{
		$this->db->from('tbl_vendor_mengikuti_paket');
		return $this->db->count_all_results();
	}

	public function by_id_vendor_mengikuti_paket($id_mengikuti_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor_mengikuti_paket');
		$this->db->where('id_mengikuti_paket', $id_mengikuti_paket);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function get_vendor_by_id($id_vendor)
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor');
		$this->db->where('id_vendor', $id_vendor);
		$query = $this->db->get();
		return $query->row_array();
	}
	public function totalRincianHps_vendor($id_vendor, $id_paket)
	{
		$this->db->select('*');
		$this->db->where('id_paket', $id_paket);
		$this->db->where('id_vendor', $id_vendor);
		$this->db->from('tbl_rincian_hps_vendor');
		$query = $this->db->get();
		return $query->result_array();
	}
	private function _get_administrasi_teknis_vendor($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_persyaratan_tender');
		$this->db->where('tbl_persyaratan_tender.id_paket', $id_paket);
		$this->db->where('status_persyaratan_tambahan', 1);
		if (isset($_POST['search']['value'])) {
			$this->db->like('nama_persyaratan', $_POST['search']['value']);
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_persyaratan_tender', 'ASC');
		}
	}
	public function getdatatable_administrasi_teknis_vendor($id_paket) //nam[ilin data pake ini
	{
		$this->_get_administrasi_teknis_vendor($id_paket); //ambil data dari get yg di atas
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_administrasi_teknis_vendor($id_paket)
	{
		$this->_get_administrasi_teknis_vendor($id_paket); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}


	public function count_all_data_administrasi_teknis_vendor()
	{
		$this->db->from('tbl_persyaratan_tender');
		$this->db->where('id_persyaratan_tender');
		return $this->db->count_all_results();
	}

	public function get_administrasi_teknis_vendor_Byid($id_persyaratan_tender)
	{
		$this->db->select('*');
		$this->db->from('tbl_persyaratan_tender');
		$this->db->join('tbl_vendor_administrasi_teknis', 'tbl_vendor_administrasi_teknis.id_penawaran_teknis_jumping = tbl_persyaratan_tender.id_persyaratan_tender', 'left');
		$this->db->where('tbl_persyaratan_tender.id_persyaratan_tender', $id_persyaratan_tender);
		$this->db->where('status_persyaratan_tambahan', 1);
		$query = $this->db->get();
		return $query->row_array();
	}
	public function get_dokumen_administrasi_Byid($id_persyaratan_tender, $id_vendor)
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor_administrasi_teknis');
		$this->db->join('tbl_persyaratan_tender', 'tbl_persyaratan_tender.id_persyaratan_tender = tbl_vendor_administrasi_teknis.id_penawaran_teknis_jumping', 'left');
		$this->db->where('tbl_vendor_administrasi_teknis.id_penawaran_teknis_jumping', $id_persyaratan_tender);
		$this->db->where('tbl_vendor_administrasi_teknis.status_dipilih_administrasi_teknis_vendor', 1);
		$this->db->where('tbl_vendor_administrasi_teknis.id_vendor', $id_vendor);
		$query = $this->db->get();
		return $query->result_array();
	}

	// INI UNTUK BAGIAN PEMBUKAAN DOKUMEN PENAWARAN TRANSAKSI LANGSUNG 

	// INI DOKUMEN YANG DIKIRIM DARI VENDOR

	var $pdf_vendor_tran = array('id_rincian_hps_pdf_vendor', 'nama_rincian_hps_pdf', 'file_rincian_hps_pdf_vendor',  'total_rincian_hps_pdf', 'id_rincian_hps_pdf_vendor');
	private function _get_data_query_dokumen_rincian_hps_pdf($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_rincian_hps_pdf_vendor');
		$this->db->where('tbl_rincian_hps_pdf_vendor.id_paket', $id_paket);
		$i = 0;
		foreach ($this->pdf_vendor_tran as $item) // looping awal
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

				if (count($this->pdf_vendor_tran) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}

		if (isset($_POST['order'])) {
			$this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('tbl_rincian_hps_pdf_vendor.id_rincian_hps_pdf_vendor', 'DESC');
		}
	}

	public function getdatatable_tbl_rincian_hps_via_pdf_vendor($id_paket)
	{
		$this->_get_data_query_dokumen_rincian_hps_pdf($id_paket);
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function count_filtered_data_dokumen_rincian_hps_pdf($id_paket)
	{
		$this->_get_data_query_dokumen_rincian_hps_pdf($id_paket);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data_dokumen_rincian_hps_pdf()
	{
		$this->db->from('tbl_rincian_hps_pdf_vendor');
		return $this->db->count_all_results();
	}

	// table dokumen pengadaan trankasi langsung DARI VENDOR
	var $dokumen_tender_cek_order = array('id_dokumen_pengadaan_transaksi_langsung_vendor', 'nama_dokumen_pengadaan_vendor', 'file_dokumen_pengadaan_vendor',  'id_dokumen_pengadaan_transaksi_langsung_vendor', 'id_dokumen_pengadaan_transaksi_langsung_vendor');


	private function _get_data_query_dokumen_pengadaan_transaksi_langsung_vendor($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_transaksi_langsung_dokumen_pengadaan_vendor');
		$this->db->where('tbl_transaksi_langsung_dokumen_pengadaan_vendor.id_paket', $id_paket);
		$i = 0;
		foreach ($this->dokumen_tender_cek_order as $item) // looping awal
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

				if (count($this->dokumen_tender_cek_order) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}

		if (isset($_POST['order'])) {
			$this->db->order_by($this->dokumen_tender_cek_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('tbl_transaksi_langsung_dokumen_pengadaan_vendor.id_dokumen_pengadaan_transaksi_langsung_vendor', 'DESC');
		}
	}


	public function getdatatable_dokumen_pengadaan_transaksi_langsung_vendor($id_paket)
	{
		$this->_get_data_query_dokumen_pengadaan_transaksi_langsung_vendor($id_paket);
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function count_filtered_data_dokumen_pengadaan_transaksi_langsung_vendor($id_paket)
	{
		$this->_get_data_query_dokumen_pengadaan_transaksi_langsung_vendor($id_paket);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data_dokumen_pengadaan_transaksi_langsung_vendor()
	{
		$this->db->from('tbl_transaksi_langsung_dokumen_pengadaan_vendor');
		return $this->db->count_all_results();
	}

	// RINCIAN HPS MANUAL VENDOR
	private function _getRincianHps_vendor_manual($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_rincian_hps_vendor');
		$this->db->where('id_paket', $id_paket);
		if (isset($_POST['search']['value'])) {
			$this->db->like('id_rincian_hps_vendor', $_POST['search']['value']);
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_rincian_hps_vendor', 'DESC');
		}
	}
	public function getdatatableRincianHps_vendor_manual($id_paket) //nam[ilin data pake ini
	{
		$this->_getRincianHps_vendor_manual($id_paket); //ambil data dari get yg di atas
		if ($_POST['length'] != -3) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_RincianHps_vendor_manual($id_paket)
	{
		$this->_getRincianHps_vendor_manual($id_paket); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function count_all_dataRincianHps_vendor_manual($id_paket)
	{
		$this->db->from('tbl_rincian_hps_vendor');
		$this->db->where('id_paket', $id_paket);
		return $this->db->count_all_results();
	}

	public function totalRincianHps_vendor_manual($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_rincian_hps_vendor');
		$this->db->where('id_paket', $id_paket);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function ambil_total_hps_all_vendor($id_paket, $id_vendor)
	{
		$this->db->select('*');
		$this->db->from('tbl_rincian_hps_vendor');
		$this->db->where('id_paket', $id_paket);
		$this->db->where('id_vendor', $id_vendor);
		$query = $this->db->get();
		return $query->result_array();
	}

	// UNTUK NAMPILIN SEMUA PESERTA VENDOR
	private function _get_data_query_peserta_vendor_tender($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor_mengikuti_paket');
		$this->db->join('tbl_vendor', 'tbl_vendor.id_vendor = tbl_vendor_mengikuti_paket.id_mengikuti_vendor', 'left');
		$this->db->where('tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', $id_paket);
		if (isset($_POST['search']['value'])) {
			$this->db->like('username_vendor', $_POST['search']['value']);
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_mengikuti_paket', 'DESC');
		}
	}

	public function getdatatable_peserta_vendor_tender($id_paket) //nam[ilin data pake ini
	{
		$this->_get_data_query_peserta_vendor_tender($id_paket); //ambil data dari get yg di atas
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_data_peserta_vendor_tender($id_paket)
	{
		$this->_get_data_query_peserta_vendor_tender($id_paket); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data_peserta_vendor_tender()
	{
		$this->db->from('tbl_vendor_mengikuti_paket');
		return $this->db->count_all_results();
	}

	// pembukaan dokumen lelang
	private function _get_data_query_dokumen_lelang_vendorr($id_paket, $id_vendor)
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor_dokumen_lelang_baru');
		$this->db->where('tbl_vendor_dokumen_lelang_baru.id_paket', $id_paket);
		$this->db->where('tbl_vendor_dokumen_lelang_baru.id_vendor', $id_vendor);
		if (isset($_POST['search']['value'])) {
			$this->db->like('tbl_vendor_dokumen_lelang_baru.nama_file_dokumen_lelang_vendor', $_POST['search']['value']);
		}

		if (isset($_POST['order'])) {
			$this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('tbl_vendor_dokumen_lelang_baru.id_dokumen_lelang_vendor', 'DESC');
		}
	}

	public function getdatatable_dokumen_lelang_vendor($id_paket, $id_vendor)
	{
		$this->_get_data_query_dokumen_lelang_vendorr($id_paket, $id_vendor);
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function count_filtered_data_dokumen_lelang_vendor($id_paket, $id_vendor)
	{
		$this->_get_data_query_dokumen_lelang_vendorr($id_paket, $id_vendor);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data_dokumen_lelang_vendor()
	{
		$this->db->from('tbl_vendor_dokumen_lelang_baru');
		return $this->db->count_all_results();
	}
	// get harga rincian hps_pdf vendor
	public function get_harga_rincian_hps_pdf_vendor($id_vendor, $id_paket)
	{
		$this->db->from('tbl_rincian_hps_pdf_vendor');
		$this->db->where('tbl_rincian_hps_pdf_vendor.id_paket', $id_paket);
		$this->db->where('id_vendor', $id_vendor);
		$query = $this->db->get();
		return $query->row_array();
	}
	public function get_harga_rincian_hps_pdf_vendor_result($id_vendor, $id_paket)
	{
		$this->db->from('tbl_rincian_hps_pdf_vendor');
		$this->db->where('tbl_rincian_hps_pdf_vendor.id_paket', $id_paket);
		$this->db->where('id_vendor', $id_vendor);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function rincian_hps_pdf_vendor_kosong($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_rincian_hps_pdf_vendor');
		$this->db->where('tbl_rincian_hps_pdf_vendor.id_paket', $id_paket);
		$query = $this->db->get();
		return $query->result_array();
	}


	private function _get_data_query_peserta_vendor_tender_penetapan($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor_mengikuti_paket');
		$this->db->join('tbl_vendor', 'tbl_vendor.id_vendor = tbl_vendor_mengikuti_paket.id_mengikuti_vendor', 'left');
		$this->db->where('tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', $id_paket);
		if (isset($_POST['search']['value'])) {
			$this->db->like('username_vendor', $_POST['search']['value']);
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_mengikuti_paket', 'DESC');
		}
	}

	public function getdatatable_peserta_vendor_tender_penetapan($id_paket) //nam[ilin data pake ini
	{
		$this->_get_data_query_peserta_vendor_tender($id_paket); //ambil data dari get yg di atas
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_data_peserta_vendor_tender_penetapan($id_paket)
	{
		$this->_get_data_query_peserta_vendor_tender($id_paket); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data_peserta_vendor_tender_penetapan()
	{
		$this->db->from('tbl_vendor_mengikuti_paket');
		return $this->db->count_all_results();
	}


	// pembukaan dokumen lelang penetapan
	private function _get_data_query_dokumen_lelang_vendor_penetapan($id_paket, $id_vendor)
	{
		$this->db->select('*');
		$this->db->from('tbl_transaksi_langsung_dokumen_pengadaan_vendor');
		$this->db->where('tbl_transaksi_langsung_dokumen_pengadaan_vendor.id_paket', $id_paket);
		$this->db->where('tbl_transaksi_langsung_dokumen_pengadaan_vendor.id_vendor', $id_vendor);
		if (isset($_POST['search']['value'])) {
			$this->db->like('tbl_transaksi_langsung_dokumen_pengadaan_vendor.nama_dokumen_pengadaan_vendor', $_POST['search']['value']);
		}

		if (isset($_POST['order'])) {
			$this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('tbl_transaksi_langsung_dokumen_pengadaan_vendor.id_dokumen_pengadaan_transaksi_langsung_vendor', 'DESC');
		}
	}

	public function getdatatable_dokumen_lelang_vendor_penetapan($id_paket, $id_vendor)
	{
		$this->_get_data_query_dokumen_lelang_vendor_penetapan($id_paket, $id_vendor);
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function count_filtered_data_dokumen_lelang_vendor_penetapan($id_paket, $id_vendor)
	{
		$this->_get_data_query_dokumen_lelang_vendor_penetapan($id_paket, $id_vendor);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data_dokumen_lelang_vendor_penetapan()
	{
		$this->db->from('tbl_transaksi_langsung_dokumen_pengadaan_vendor');
		return $this->db->count_all_results();
	}

	// RINCIAN HPS MANUAL VENDOR
	private function _getRincianHps_vendor_manual_tender_biasa($id_paket, $id_vendor)
	{
		$this->db->select('*');
		$this->db->from('tbl_rincian_hps_vendor');
		$this->db->where('id_paket', $id_paket);
		$this->db->where('id_vendor', $id_vendor);
		if (isset($_POST['search']['value'])) {
			$this->db->like('id_rincian_hps_vendor', $_POST['search']['value']);
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_rincian_hps_vendor', 'DESC');
		}
	}
	public function getdatatableRincianHps_vendor_manual_tender_biasa($id_paket, $id_vendor) //nam[ilin data pake ini
	{
		$this->_getRincianHps_vendor_manual_tender_biasa($id_paket, $id_vendor); //ambil data dari get yg di atas
		if ($_POST['length'] != -3) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_RincianHps_vendor_manual_tender_biasa($id_paket, $id_vendor)
	{
		$this->_getRincianHps_vendor_manual_tender_biasa($id_paket, $id_vendor); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function count_all_dataRincianHps_vendor_manual_tender_biasa($id_paket, $id_vendor)
	{
		$this->db->from('tbl_rincian_hps_vendor');
		$this->db->where('id_paket', $id_paket);
		return $this->db->count_all_results();
	}
}
