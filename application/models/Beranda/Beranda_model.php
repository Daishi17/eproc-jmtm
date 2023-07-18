<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Beranda_model extends CI_Model
{
	public function getAdmin()
	{
		$this->db->select('*');
		$this->db->from('tbl_admin');
		$this->db->join('tbl_provinsi', 'tbl_provinsi.id_provinsi = tbl_admin.id_provinsi', 'left');
		$this->db->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
		$query = $this->db->get();

		return $query;
	}

	public function count_pegawai()
	{
		$query = $this->db->query("SELECT COUNT(id_pegawai) AS jumlah_pegawai FROM tbl_pegawai WHERE NOT id_pegawai = 1");
		return $query->row_array();
	}

	public function count_panitia()
	{
		$query = $this->db->query("SELECT COUNT(id_panitia) AS jumlah_panitia FROM tbl_panitia");
		return $query->row_array();
	}

	public function count_divisi()
	{
		$query = $this->db->query("SELECT COUNT(*) AS jumlah_divisi FROM tbl_unit_kerja");
		return $query->row_array();
	}

	public function count_paket()
	{
		$query = $this->db->query("SELECT COUNT(*) AS jumlah_paket FROM tbl_paket");
		return $query->row_array();
	}

	public function count_rup()
	{
		$query = $this->db->query("SELECT COUNT(*) AS jumlah_rup FROM tbl_paket");
		return $query->row_array();
	}

	public function count_vendor()
	{
		$query = $this->db->query("SELECT COUNT(*) AS jumlah_vendor FROM tbl_vendor WHERE status_aktive_vendor = 1");
		return $query->row_array();
	}

	public function count_agency()
	{
		$query = $this->db->query("SELECT COUNT(*) AS jumlah_agency FROM tbl_pegawai WHERE id_role = 2");
		return $query->row_array();
	}

	public function getAgency()
	{
		$query = $this->db->query("SELECT * FROM tbl_unit_kerja");
		return $query->result_array();
	}

	public function get_metopem()
	{
		$query = $this->db->query("SELECT * FROM tbl_metode_pemilihan");
		return $query->result_array();
	}

	public function get_vendor()
	{
		$query = $this->db->query("SELECT COUNT(*) AS total_vendor FROM tbl_vendor WHERE status_aktive_vendor = 1");
		return $query->row_array();
	}

	public function get_vendor2()
	{
		$query = $this->db->query("SELECT COUNT(*) AS total_vendor FROM tbl_vendor WHERE status_aktive_vendor = 0");
		return $query->row_array();
	}

	public function get_vendor3()
	{
		$query = $this->db->query("SELECT COUNT(*) AS total_vendor FROM tbl_vendor WHERE status_daftar_hitam_vendor = 1");
		return $query->row_array();
	}

	// hcga table info
	public function total_barang_hcga()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 1);
		$this->db->where('id_unit_kerja', 69);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_jasa_pemborongan_hcga()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 2);
		$this->db->where('id_unit_kerja', 69);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_jasa_konsultansi_hcga()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 3);
		$this->db->where('id_unit_kerja', 69);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_jasa_lain_hcga()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 4);
		$this->db->where('id_unit_kerja', 69);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_seluruh_jasa_barang_hcga()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 69);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_pemilihan_langsung_hcga()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 69);
		$this->db->where('id_metode_pemilihan', 8);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_transaksi_langsung_hcga()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 69);
		$this->db->where('id_metode_pemilihan', 10);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_seleksi_langsung_hcga()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 69);
		$this->db->where('id_metode_pemilihan', 7);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_pemilhan_hcga()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 69);
		$this->db->where('id_metode_pemilihan', 10);
		$this->db->where('id_metode_pemilihan', 8);
		$this->db->where('id_metode_pemilihan', 7);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	// hcga table info

	// pcr table info
	public function total_barang_pcr()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 1);
		$this->db->where('id_unit_kerja', 85);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_jasa_pemborongan_pcr()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 2);
		$this->db->where('id_unit_kerja', 85);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_jasa_konsultansi_pcr()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 3);
		$this->db->where('id_unit_kerja', 85);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_jasa_lain_pcr()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 4);
		$this->db->where('id_unit_kerja', 85);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}



	public function total_seluruh_jasa_barang_pcr()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 85);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_pemilihan_langsung_pcr()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 85);
		$this->db->where('id_metode_pemilihan', 8);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_transaksi_langsung_pcr()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 85);
		$this->db->where('id_metode_pemilihan', 10);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_seleksi_langsung_pcr()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 85);
		$this->db->where('id_metode_pemilihan', 7);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_pemilhan_pcr()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 85);
		$this->db->where('id_metode_pemilihan', 10);
		$this->db->where('id_metode_pemilihan', 8);
		$this->db->where('id_metode_pemilihan', 7);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	// pcr table info

	// fta table info
	public function total_barang_fta()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 1);
		$this->db->where('id_unit_kerja', 70);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_jasa_pemborongan_fta()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 2);
		$this->db->where('id_unit_kerja', 70);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_jasa_konsultansi_fta()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 3);
		$this->db->where('id_unit_kerja', 70);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_jasa_lain_fta()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 4);
		$this->db->where('id_unit_kerja', 70);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_seluruh_jasa_barang_fta()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 70);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_pemilihan_langsung_fta()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 70);
		$this->db->where('id_metode_pemilihan', 8);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_transaksi_langsung_fta()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 70);
		$this->db->where('id_metode_pemilihan', 10);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_seleksi_langsung_fta()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 70);
		$this->db->where('id_metode_pemilihan', 7);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_pemilhan_fta()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 70);
		$this->db->where('id_metode_pemilihan', 10);
		$this->db->where('id_metode_pemilihan', 8);
		$this->db->where('id_metode_pemilihan', 7);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	// fta table info

	// rms table info
	public function total_barang_rmms()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 1);
		$this->db->where('id_unit_kerja', 71);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_jasa_pemborongan_rmms()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 2);
		$this->db->where('id_unit_kerja', 71);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_jasa_konsultansi_rmms()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 3);
		$this->db->where('id_unit_kerja', 71);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_jasa_lain_rmms()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 4);
		$this->db->where('id_unit_kerja', 71);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_seluruh_jasa_barang_rms()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 71);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_pemilihan_langsung_rms()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 71);
		$this->db->where('id_metode_pemilihan', 8);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_transaksi_langsung_rms()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 71);
		$this->db->where('id_metode_pemilihan', 10);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_seleksi_langsung_rms()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 71);
		$this->db->where('id_metode_pemilihan', 7);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_pemilhan_rms()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 71);
		$this->db->where('id_metode_pemilihan', 10);
		$this->db->where('id_metode_pemilihan', 8);
		$this->db->where('id_metode_pemilihan', 7);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	// rms table info

	// amp table info
	public function total_barang_amp()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 1);
		$this->db->where('id_unit_kerja', 72);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_jasa_pemborongan_amp()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 2);
		$this->db->where('id_unit_kerja', 72);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_jasa_konsultansi_amp()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 3);
		$this->db->where('id_unit_kerja', 72);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_jasa_lain_amp()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 4);
		$this->db->where('id_unit_kerja', 72);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_seluruh_jasa_barang_amp()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 72);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_pemilihan_langsung_amp()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 72);
		$this->db->where('id_metode_pemilihan', 8);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_transaksi_langsung_amp()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 72);
		$this->db->where('id_metode_pemilihan', 10);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_seleksi_langsung_amp()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 72);
		$this->db->where('id_metode_pemilihan', 7);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_pemilhan_amp()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 72);
		$this->db->where('id_metode_pemilihan', 10);
		$this->db->where('id_metode_pemilihan', 8);
		$this->db->where('id_metode_pemilihan', 7);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	// amp table info

	// pche table info
	public function total_barang_pche()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 1);
		$this->db->where('id_unit_kerja', 73);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_jasa_pemborongan_pche()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 2);
		$this->db->where('id_unit_kerja', 73);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_jasa_konsultansi_pche()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 3);
		$this->db->where('id_unit_kerja', 73);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_jasa_lain_pche()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 4);
		$this->db->where('id_unit_kerja', 73);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_seluruh_jasa_barang_pche()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 73);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_pemilihan_langsung_pche()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 73);
		$this->db->where('id_metode_pemilihan', 8);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_transaksi_langsung_pche()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 73);
		$this->db->where('id_metode_pemilihan', 10);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_seleksi_langsung_pche()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 73);
		$this->db->where('id_metode_pemilihan', 7);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_pemilhan_pche()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 73);
		$this->db->where('id_metode_pemilihan', 10);
		$this->db->where('id_metode_pemilihan', 8);
		$this->db->where('id_metode_pemilihan', 7);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	// amtd table info
	public function total_barang_amtd()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 1);
		$this->db->where('id_unit_kerja', 74);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_jasa_pemborongan_amtd()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 2);
		$this->db->where('id_unit_kerja', 74);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_jasa_konsultansi_amtd()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 3);
		$this->db->where('id_unit_kerja', 74);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_jasa_lain_amtd()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 4);
		$this->db->where('id_unit_kerja', 74);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_seluruh_jasa_barang_amtd()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 74);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_pemilihan_langsung_amtd()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 74);
		$this->db->where('id_metode_pemilihan', 8);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_transaksi_langsung_amtd()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 74);
		$this->db->where('id_metode_pemilihan', 10);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_seleksi_langsung_amtd()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 74);
		$this->db->where('id_metode_pemilihan', 7);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_pemilhan_amtd()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 74);
		$this->db->where('id_metode_pemilihan', 10);
		$this->db->where('id_metode_pemilihan', 8);
		$this->db->where('id_metode_pemilihan', 7);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	// op1 table info
	public function total_barang_op1()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 1);
		$this->db->where('id_unit_kerja', 76);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_jasa_pemborongan_op1()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 2);
		$this->db->where('id_unit_kerja', 76);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_jasa_konsultansi_op1()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 3);
		$this->db->where('id_unit_kerja', 76);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_jasa_lain_op1()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 4);
		$this->db->where('id_unit_kerja', 76);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_seluruh_jasa_barang_op1()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 76);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_pemilihan_langsung_op1()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 76);
		$this->db->where('id_metode_pemilihan', 8);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_transaksi_langsung_op1()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 76);
		$this->db->where('id_metode_pemilihan', 10);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_seleksi_langsung_op1()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 76);
		$this->db->where('id_metode_pemilihan', 7);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_pemilhan_op1()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 76);
		$this->db->where('id_metode_pemilihan', 10);
		$this->db->where('id_metode_pemilihan', 8);
		$this->db->where('id_metode_pemilihan', 7);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	// op2 table info
	public function total_barang_op2()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 1);
		$this->db->where('id_unit_kerja', 78);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_jasa_pemborongan_op2()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 2);
		$this->db->where('id_unit_kerja', 78);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_jasa_konsultansi_op2()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 3);
		$this->db->where('id_unit_kerja', 78);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_jasa_lain_op2()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 4);
		$this->db->where('id_unit_kerja', 78);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_seluruh_jasa_barang_op2()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 778);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_pemilihan_langsung_op2()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 778);
		$this->db->where('id_metode_pemilihan', 8);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_transaksi_langsung_op2()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 778);
		$this->db->where('id_metode_pemilihan', 10);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_seleksi_langsung_op2()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 778);
		$this->db->where('id_metode_pemilihan', 7);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_pemilhan_op2()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 778);
		$this->db->where('id_metode_pemilihan', 10);
		$this->db->where('id_metode_pemilihan', 8);
		$this->db->where('id_metode_pemilihan', 7);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	// op3 table info
	public function total_barang_op3()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 1);
		$this->db->where('id_unit_kerja', 80);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_jasa_pemborongan_op3()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 2);
		$this->db->where('id_unit_kerja', 80);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_jasa_konsultansi_op3()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 3);
		$this->db->where('id_unit_kerja', 80);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_jasa_lain_op3()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 4);
		$this->db->where('id_unit_kerja', 80);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_seluruh_jasa_barang_op3()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 77);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_pemilihan_langsung_op3()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 77);
		$this->db->where('id_metode_pemilihan', 8);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_transaksi_langsung_op3()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 77);
		$this->db->where('id_metode_pemilihan', 10);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_seleksi_langsung_op3()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 77);
		$this->db->where('id_metode_pemilihan', 7);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_pemilhan_op3()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 77);
		$this->db->where('id_metode_pemilihan', 10);
		$this->db->where('id_metode_pemilihan', 8);
		$this->db->where('id_metode_pemilihan', 7);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	// msa1 table info
	public function total_barang_msa1()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 1);
		$this->db->where('id_unit_kerja', 77);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_jasa_pemborongan_msa1()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 2);
		$this->db->where('id_unit_kerja', 77);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_jasa_konsultansi_msa1()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 3);
		$this->db->where('id_unit_kerja', 77);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_jasa_lain_msa1()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 4);
		$this->db->where('id_unit_kerja', 77);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_seluruh_jasa_barang_msa1()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 78);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_pemilihan_langsung_msa1()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 78);
		$this->db->where('id_metode_pemilihan', 8);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_transaksi_langsung_msa1()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 78);
		$this->db->where('id_metode_pemilihan', 10);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_seleksi_langsung_msa1()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 78);
		$this->db->where('id_metode_pemilihan', 7);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_pemilhan_msa1()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 78);
		$this->db->where('id_metode_pemilihan', 10);
		$this->db->where('id_metode_pemilihan', 8);
		$this->db->where('id_metode_pemilihan', 7);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}


	// msa2 table info
	public function total_barang_msa2()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 1);
		$this->db->where('id_unit_kerja', 79);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_jasa_pemborongan_msa2()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 2);
		$this->db->where('id_unit_kerja', 79);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_jasa_konsultansi_msa2()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 3);
		$this->db->where('id_unit_kerja', 79);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_jasa_lain_msa2()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 4);
		$this->db->where('id_unit_kerja', 79);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_seluruh_jasa_barang_msa2()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 79);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_pemilihan_langsung_msa2()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 79);
		$this->db->where('id_metode_pemilihan', 8);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_transaksi_langsung_msa2()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 79);
		$this->db->where('id_metode_pemilihan', 10);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_seleksi_langsung_msa2()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 79);
		$this->db->where('id_metode_pemilihan', 7);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_pemilhan_msa2()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 79);
		$this->db->where('id_metode_pemilihan', 10);
		$this->db->where('id_metode_pemilihan', 8);
		$this->db->where('id_metode_pemilihan', 7);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	// msa3 table info
	public function total_barang_msa3()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 1);
		$this->db->where('id_unit_kerja', 81);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_jasa_pemborongan_msa3()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 2);
		$this->db->where('id_unit_kerja', 81);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_jasa_konsultansi_msa3()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 3);
		$this->db->where('id_unit_kerja', 81);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_jasa_lain_msa3()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 4);
		$this->db->where('id_unit_kerja', 81);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_seluruh_jasa_barang_msa3()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 80);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_pemilihan_langsung_msa3()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 80);
		$this->db->where('id_metode_pemilihan', 8);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_transaksi_langsung_msa3()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 80);
		$this->db->where('id_metode_pemilihan', 10);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_seleksi_langsung_msa3()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 80);
		$this->db->where('id_metode_pemilihan', 7);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_pemilhan_msa3()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 80);
		$this->db->where('id_metode_pemilihan', 10);
		$this->db->where('id_metode_pemilihan', 8);
		$this->db->where('id_metode_pemilihan', 7);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	// pm table info
	public function total_barang_pm()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 1);
		$this->db->where('id_unit_kerja', 82);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_jasa_pemborongan_pm()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 2);
		$this->db->where('id_unit_kerja', 82);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_jasa_konsultansi_pm()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 3);
		$this->db->where('id_unit_kerja', 82);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_jasa_lain_pm()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 4);
		$this->db->where('id_unit_kerja', 82);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_seluruh_jasa_barang_pm()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 81);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_pemilihan_langsung_pm()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 81);
		$this->db->where('id_metode_pemilihan', 8);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_transaksi_langsung_pm()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 81);
		$this->db->where('id_metode_pemilihan', 10);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_seleksi_langsung_pm()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 81);
		$this->db->where('id_metode_pemilihan', 7);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_pemilhan_pm()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 81);
		$this->db->where('id_metode_pemilihan', 10);
		$this->db->where('id_metode_pemilihan', 8);
		$this->db->where('id_metode_pemilihan', 7);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}


	// cpfta table info
	public function total_barang_cpfta()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 1);
		$this->db->where('id_unit_kerja', 83);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_jasa_pemborongan_cpfta()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 2);
		$this->db->where('id_unit_kerja', 83);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_jasa_konsultansi_cpfta()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 3);
		$this->db->where('id_unit_kerja', 83);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_jasa_lain_cpfta()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 4);
		$this->db->where('id_unit_kerja', 83);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_seluruh_jasa_barang_cpfta()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 82);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_pemilihan_langsung_cpfta()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 82);
		$this->db->where('id_metode_pemilihan', 8);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_transaksi_langsung_cpfta()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 82);
		$this->db->where('id_metode_pemilihan', 10);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_seleksi_langsung_cpfta()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 82);
		$this->db->where('id_metode_pemilihan', 7);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_pemilhan_cpfta()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 82);
		$this->db->where('id_metode_pemilihan', 10);
		$this->db->where('id_metode_pemilihan', 8);
		$this->db->where('id_metode_pemilihan', 7);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	// rmq table info
	public function total_barang_rmq()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 1);
		$this->db->where('id_unit_kerja', 84);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_jasa_pemborongan_rmq()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 2);
		$this->db->where('id_unit_kerja', 84);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_jasa_konsultansi_rmq()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 3);
		$this->db->where('id_unit_kerja', 84);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_jasa_lain_rmq()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 4);
		$this->db->where('id_unit_kerja', 84);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_seluruh_jasa_barang_rmq()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 84);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_pemilihan_langsung_rmq()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 84);
		$this->db->where('id_metode_pemilihan', 8);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_transaksi_langsung_rmq()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 84);
		$this->db->where('id_metode_pemilihan', 10);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_seleksi_langsung_rmq()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 84);
		$this->db->where('id_metode_pemilihan', 7);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	public function total_metode_pemilhan_rmq()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 84);
		$this->db->where('id_metode_pemilihan', 10);
		$this->db->where('id_metode_pemilihan', 8);
		$this->db->where('id_metode_pemilihan', 7);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	//tender yang sudah selesai
	public function hitung_tender_selesai()
	{
		$tanggal_sekarang = date('d-m-Y H:i');
		$query = $this->db->query("SELECT COUNT(tbl_paket.id_paket) AS total_tender_selesai FROM tbl_paket 
		LEFT JOIN tbl_jadwal_tender_detail ON tbl_paket.id_paket = tbl_jadwal_tender_detail.id_paket
		WHERE nama_jadwal_tender = 'Penandatanganan Kontrak'
		AND tanggal_selesai_jadwal < '$tanggal_sekarang'");
		return $query->row_array();
	}

	// bd
	public function total_barang_bd()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 1);
		$this->db->where('id_unit_kerja', 75);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_jasa_pemborongan_bd()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 2);
		$this->db->where('id_unit_kerja', 75);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_jasa_konsultansi_bd()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 3);
		$this->db->where('id_unit_kerja', 75);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_jasa_lain_bd()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 4);
		$this->db->where('id_unit_kerja', 75);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function get_count_tender_hcga()
	{
		$query = $this->db->query("SELECT COUNT(*) AS total_paket FROM tbl_paket WHERE id_unit_kerja = 69");
		return $query->row_array();
	}

	public function get_count_tender_fta()
	{
		$query = $this->db->query("SELECT COUNT(*) AS total_paket FROM tbl_paket WHERE id_unit_kerja = 70");
		return $query->row_array();
	}

	public function get_count_tender_rmms()
	{
		$query = $this->db->query("SELECT COUNT(*) AS total_paket FROM tbl_paket WHERE id_unit_kerja = 71");
		return $query->row_array();
	}

	public function get_count_tender_amp()
	{
		$query = $this->db->query("SELECT COUNT(*) AS total_paket FROM tbl_paket WHERE id_unit_kerja = 72");
		return $query->row_array();
	}

	public function get_count_tender_pcahe()
	{
		$query = $this->db->query("SELECT COUNT(*) AS total_paket FROM tbl_paket WHERE id_unit_kerja = 73");
		return $query->row_array();
	}

	public function get_count_tender_amtd()
	{
		$query = $this->db->query("SELECT COUNT(*) AS total_paket FROM tbl_paket WHERE id_unit_kerja = 74");
		return $query->row_array();
	}

	public function get_count_tender_bd()
	{
		$query = $this->db->query("SELECT COUNT(*) AS total_paket FROM tbl_paket WHERE id_unit_kerja = 75");
		return $query->row_array();
	}

	public function get_count_tender_op1()
	{
		$query = $this->db->query("SELECT COUNT(*) AS total_paket FROM tbl_paket WHERE id_unit_kerja = 76");
		return $query->row_array();
	}

	public function get_count_tender_msa1()
	{
		$query = $this->db->query("SELECT COUNT(*) AS total_paket FROM tbl_paket WHERE id_unit_kerja = 77");
		return $query->row_array();
	}

	public function get_count_tender_op2()
	{
		$query = $this->db->query("SELECT COUNT(*) AS total_paket FROM tbl_paket WHERE id_unit_kerja = 78");
		return $query->row_array();
	}

	public function get_count_tender_msa2()
	{
		$query = $this->db->query("SELECT COUNT(*) AS total_paket FROM tbl_paket WHERE id_unit_kerja = 79");
		return $query->row_array();
	}

	public function get_count_tender_op3()
	{
		$query = $this->db->query("SELECT COUNT(*) AS total_paket FROM tbl_paket WHERE id_unit_kerja = 80");
		return $query->row_array();
	}

	public function get_count_tender_msa3()
	{
		$query = $this->db->query("SELECT COUNT(*) AS total_paket FROM tbl_paket WHERE id_unit_kerja = 81");
		return $query->row_array();
	}

	public function get_count_tender_pm()
	{
		$query = $this->db->query("SELECT COUNT(*) AS total_paket FROM tbl_paket WHERE id_unit_kerja = 82");
		return $query->row_array();
	}

	public function get_count_tender_cpfta()
	{
		$query = $this->db->query("SELECT COUNT(*) AS total_paket FROM tbl_paket WHERE id_unit_kerja = 83");
		return $query->row_array();
	}

	public function get_count_tender_rmq()
	{
		$query = $this->db->query("SELECT COUNT(*) AS total_paket FROM tbl_paket WHERE id_unit_kerja = 84");
		return $query->row_array();
	}

	public function get_count_tender_proc()
	{
		$query = $this->db->query("SELECT COUNT(*) AS total_paket FROM tbl_paket WHERE id_unit_kerja = 85");
		return $query->row_array();
	}

	// query count tender selesai
	public function count_selesai_tender()
	{
		$query = $this->db->query("SELECT id_paket,selesai_semua_tender FROM tbl_paket");
		return $query->result_array();
	}

	public function count_transaksi_langsung()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan', 10);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function count_penetapan_langsung()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan', 9);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function count_penunjukkan_langsung()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan', 8);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function count_tender_fix()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan != ', 8);
		$this->db->where('id_metode_pemilihan != ', 9);
		$this->db->where('id_metode_pemilihan != ', 10);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function count_belum_diumumkan()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan != ', 8);
		$this->db->where('id_metode_pemilihan != ', 9);
		$this->db->where('id_metode_pemilihan != ', 10);
		$this->db->where('status_paket_tender != ', 2);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	//count sesuai agency
	public function count_selesai_tender_agency($session)
	{
		$query = $this->db->query("SELECT id_paket,selesai_semua_tender FROM tbl_paket WHERE id_unit_kerja = $session");
		return $query->result_array();
	}

	public function count_transaksi_langsung_agency($session)
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan', 10);
		$this->db->where('id_unit_kerja', $session);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function count_penetapan_langsung_agency($session)
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan', 9);
		$this->db->where('id_unit_kerja', $session);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function count_penunjukkan_langsung_agency($session)
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan', 8);
		$this->db->where('id_unit_kerja', $session);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function count_tender_fix_agency($session)
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan != ', 8);
		$this->db->where('id_metode_pemilihan != ', 9);
		$this->db->where('id_metode_pemilihan != ', 10);
		$this->db->where('id_unit_kerja', $session);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function count_belum_diumumkan_agency($session)
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan != ', 8);
		$this->db->where('id_metode_pemilihan != ', 9);
		$this->db->where('id_metode_pemilihan != ', 10);
		$this->db->where('status_paket_tender != ', 2);
		$this->db->where('id_unit_kerja', $session);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function count_total_panitia_agency($session)
	{
		$this->db->select('*');
		$this->db->from('tbl_panitia');
		$this->db->where('id_unit_kerja', $session);
		return $this->db->count_all_results();
	}

	public function count_paket_agency($session)
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', $session);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function count_vendor_fix()
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor');
		$this->db->where('status_aktive_vendor', 1);
		$this->db->where('status_vendor_baru', NULL);
		return $this->db->count_all_results();
	}
	public function get_tahun_dan_bulan()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 85);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function hitung_tender_ulang()
	{
		$query = $this->db->query("SELECT COUNT(*) AS total_paket FROM tbl_paket WHERE alasan_tender_pengulanagan != NULL AND alasan_tender_batal != NULL OR status_pembatalan_atau_pengulangan = 2");
		return $query->row_array();
	}
}
