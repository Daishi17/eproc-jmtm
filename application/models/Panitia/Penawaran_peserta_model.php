<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penawaran_peserta_model extends CI_Model
{
	var $table = 'tbl_vendor_mengikuti_paket';
	var $colum_order = array('id_mengikuti_vendor', 'nama_paket');
	var $order = array('id_mengikuti_vendor', 'nama_paket');

	private function _get_data_query_vendor_mengikuti_paket($id_paket)
	{
		$this->db->select('*');
		$this->db->from($this->table);
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
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function get_byid_paket_diikuti_vendor($id_mengikuti_paket)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('tbl_vendor', 'tbl_vendor.id_vendor = tbl_vendor_mengikuti_paket.id_mengikuti_vendor', 'left');
		$this->db->where('status_mengikuti_paket', 1);
		$this->db->where('id_mengikuti_paket', $id_mengikuti_paket);
		$query = $this->db->get();
		return $query->row_array();
	}


	public function get_kualifikasi_peserta($id_vendor, $id_paket)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('tbl_vendor_dokumen_kualifikasi', 'tbl_vendor_dokumen_kualifikasi.id_vendor_izin_usaha = tbl_vendor_mengikuti_paket.id_mengikuti_vendor', 'left');
		$this->db->join('tbl_vendor_izin_usaha', 'tbl_vendor_izin_usaha.id_izin_usaha = tbl_vendor_dokumen_kualifikasi.id_izin_usaha_jumping', 'left');
		$this->db->join('tbl_vendor', 'tbl_vendor.id_vendor = tbl_vendor_izin_usaha.id_vendor', 'left');
		$this->db->where('tbl_vendor_dokumen_kualifikasi.id_vendor_izin_usaha', $id_vendor);
		$this->db->where('tbl_vendor_dokumen_kualifikasi.id_paket_izin_usaha', $id_paket);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_kualifikasi_peserta_tenaga_ahli($id_vendor, $id_paket)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('tbl_vendor_dokumen_kualifikasi_tenaga_ahli', 'tbl_vendor_dokumen_kualifikasi_tenaga_ahli.id_vendor = tbl_vendor_mengikuti_paket.id_mengikuti_vendor', 'left');
		$this->db->join('tbl_vendor_tenaga_ahli', 'tbl_vendor_tenaga_ahli.id_tenaga_ahli = tbl_vendor_dokumen_kualifikasi_tenaga_ahli.id_tenaga_ahli_jumping', 'left');
		$this->db->join('tbl_vendor', 'tbl_vendor.id_vendor = tbl_vendor_tenaga_ahli.id_vendor', 'left');
		$this->db->where('tbl_vendor_dokumen_kualifikasi_tenaga_ahli.id_vendor', $id_vendor);
		$this->db->where('tbl_vendor_dokumen_kualifikasi_tenaga_ahli.id_paket', $id_paket);
		$query = $this->db->get();
		return $query->result_array();
	}

	// IDENTITAS PERUSAHAAN
	public function get_identitas_perusahaan($id_vendor)
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor_identitas_prusahaan');
		$this->db->where('id_vendor', $id_vendor);
		$query = $this->db->get();
		return $query->result_array();
	}
	// AKTA PENDIRIAN
	public function get_akta_pendirian($id_vendor)
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor_akta_pendirian');
		$this->db->where('id_vendor', $id_vendor);
		$query = $this->db->get();
		return $query->result_array();
	}

	// PAJAK
	public function get_kualifikasi_peserta_pajak($id_vendor, $id_paket)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('tbl_vendor_dokumen_kualifikasi_pajak', 'tbl_vendor_dokumen_kualifikasi_pajak.id_vendor = tbl_vendor_mengikuti_paket.id_mengikuti_vendor', 'left');
		$this->db->join('tbl_vendor_pajak', 'tbl_vendor_pajak.id_pajak = tbl_vendor_dokumen_kualifikasi_pajak.id_pajak_jumping', 'left');
		$this->db->join('tbl_vendor', 'tbl_vendor.id_vendor = tbl_vendor_pajak.id_vendor', 'left');
		$this->db->where('tbl_vendor_dokumen_kualifikasi_pajak.id_vendor', $id_vendor);
		$this->db->where('tbl_vendor_dokumen_kualifikasi_pajak.id_paket', $id_paket);
		$query = $this->db->get();
		return $query->result_array();
	}
	// PEMILIK
	public function get_kualifikasi_peserta_pemilik($id_vendor, $id_paket)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('tbl_vendor_dokumen_kualifikasi_pemilik', 'tbl_vendor_dokumen_kualifikasi_pemilik.id_vendor = tbl_vendor_mengikuti_paket.id_mengikuti_vendor', 'left');
		$this->db->join('tbl_vendor_pemilik', 'tbl_vendor_pemilik.id_pemilik = tbl_vendor_dokumen_kualifikasi_pemilik.id_pemilik_jumping', 'left');
		$this->db->join('tbl_vendor', 'tbl_vendor.id_vendor = tbl_vendor_pemilik.id_vendor', 'left');
		$this->db->where('tbl_vendor_dokumen_kualifikasi_pemilik.id_vendor', $id_vendor);
		$this->db->where('tbl_vendor_dokumen_kualifikasi_pemilik.id_paket', $id_paket);
		$query = $this->db->get();
		return $query->result_array();
	}
	// PENGURUS
	public function get_kualifikasi_peserta_pengurus($id_vendor, $id_paket)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('tbl_vendor_dokumen_kualifikasi_pengurus', 'tbl_vendor_dokumen_kualifikasi_pengurus.id_vendor = tbl_vendor_mengikuti_paket.id_mengikuti_vendor', 'left');
		$this->db->join('tbl_vendor_pengurus', 'tbl_vendor_pengurus.id_pengurus = tbl_vendor_dokumen_kualifikasi_pengurus.id_pengurus_jumping', 'left');
		$this->db->join('tbl_vendor', 'tbl_vendor.id_vendor = tbl_vendor_pengurus.id_vendor', 'left');
		$this->db->where('tbl_vendor_dokumen_kualifikasi_pengurus.id_vendor', $id_vendor);
		$this->db->where('tbl_vendor_dokumen_kualifikasi_pengurus.id_paket', $id_paket);
		$query = $this->db->get();
		return $query->result_array();
	}
	// PENGALAMAN
	public function get_kualifikasi_peserta_pengalaman($id_vendor, $id_paket)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('tbl_vendor_dokumen_kualifikasi_pengalaman', 'tbl_vendor_dokumen_kualifikasi_pengalaman.id_vendor = tbl_vendor_mengikuti_paket.id_mengikuti_vendor', 'left');
		$this->db->join('tbl_vendor_pengalaman', 'tbl_vendor_pengalaman.id_pengalaman = tbl_vendor_dokumen_kualifikasi_pengalaman.id_pengalaman_jumping', 'left');
		$this->db->join('tbl_vendor', 'tbl_vendor.id_vendor = tbl_vendor_pengalaman.id_vendor', 'left');
		$this->db->where('tbl_vendor_dokumen_kualifikasi_pengalaman.id_vendor', $id_vendor);
		$this->db->where('tbl_vendor_dokumen_kualifikasi_pengalaman.id_paket', $id_paket);
		$query = $this->db->get();
		return $query->result_array();
	}

	// PERALATAN
	public function get_kualifikasi_peserta_peralatan($id_vendor, $id_paket)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('tbl_vendor_dokumen_kualifikasi_peralatan', 'tbl_vendor_dokumen_kualifikasi_peralatan.id_vendor = tbl_vendor_mengikuti_paket.id_mengikuti_vendor', 'left');
		$this->db->join('tbl_vendor_peralatan', 'tbl_vendor_peralatan.id_peralatan = tbl_vendor_dokumen_kualifikasi_peralatan.id_peralatan_jumping', 'left');
		$this->db->join('tbl_vendor', 'tbl_vendor.id_vendor = tbl_vendor_peralatan.id_vendor', 'left');
		$this->db->where('tbl_vendor_dokumen_kualifikasi_peralatan.id_vendor', $id_vendor);
		$this->db->where('tbl_vendor_dokumen_kualifikasi_peralatan.id_paket', $id_paket);
		$query = $this->db->get();
		return $query->result_array();
	}

	// DUKUNGAN BANK
	public function get_kualifikasi_dukungan_bank($id_vendor, $id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor_dokumen_kualifikasi_dukungan_bank');
		$this->db->where('tbl_vendor_dokumen_kualifikasi_dukungan_bank.id_vendor', $id_vendor);
		$this->db->where('tbl_vendor_dokumen_kualifikasi_dukungan_bank.id_paket', $id_paket);
		$query = $this->db->get();
		return $query->result_array();
	}
	// PERSYARATAN LAINYA
	public function get_kualifikasi_persyaratan_lainya($id_vendor, $id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor_dokumen_kualifikasi_persyaratan_lainya');
		$this->db->where('tbl_vendor_dokumen_kualifikasi_persyaratan_lainya.id_vendor', $id_vendor);
		$this->db->where('tbl_vendor_dokumen_kualifikasi_persyaratan_lainya.id_paket', $id_paket);
		$query = $this->db->get();
		return $query->result_array();
	}


	// ini untuk tenaga ahli detail
	public function get_by_id_tenaga_ahli_cv($id_tenaga_ahli)
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor_cv');
		$this->db->where('id_tenaga_ahli', $id_tenaga_ahli);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_by_id_tenaga_ahli_pendidikan($id_tenaga_ahli)
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor_pendidikan');
		$this->db->where('id_tenaga_ahli', $id_tenaga_ahli);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_by_id_tenaga_ahli_sertifikat($id_tenaga_ahli)
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor_sertifikat');
		$this->db->where('id_tenaga_ahli', $id_tenaga_ahli);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_by_id_tenaga_ahli_bahasa($id_tenaga_ahli)
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor_bahasa');
		$this->db->where('id_tenaga_ahli', $id_tenaga_ahli);
		$query = $this->db->get();
		return $query->result_array();
	}
}
