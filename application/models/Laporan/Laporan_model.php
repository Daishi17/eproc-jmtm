<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model extends CI_Model
{
	public function get_all()
	{
		$sekarang = date('d-m-Y H:i');
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->join('tbl_jenis_pengadaan', 'tbl_paket.id_jenis_pengadaan = tbl_jenis_pengadaan.id_jenis_pengadaan', 'left');
		$this->db->join('tbl_metode_pemilihan', 'tbl_paket.id_metode_pemilihan = tbl_metode_pemilihan.id_metode_pemilihan', 'left');
		$this->db->join('tbl_jadwal_tender_detail', 'tbl_paket.id_paket = tbl_jadwal_tender_detail.id_paket', 'left');
		$this->db->join('tbl_unit_kerja', 'tbl_paket.id_unit_kerja = tbl_unit_kerja.id_unit_kerja', 'left');
		$this->db->join('tbl_vendor_mengikuti_paket', 'tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', 'left');
		$this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_mengikuti_vendor = tbl_vendor.id_vendor', 'left');
		$this->db->join('tbl_sumber_dana', 'tbl_paket.id_paket = tbl_sumber_dana.id_paket');
		// $this->db->where('nama_jadwal_tender', 'Penandatanganan Kontrak');
		// $this->db->where('tanggal_selesai_jadwal <', $sekarang);
		$this->db->where('pemenang_tender', 1);
		$this->db->group_by('tbl_paket.id_paket');
		// $this->db->where('pemenang_tender', 1);
		$query = $this->db->get();
		return $query->result_array();
	}

	//PROCUREMENT
	public function total_penunjukkan_langsung_pcr()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan', 8);
		$this->db->where('id_unit_kerja', 85);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_transaksi_langsung_pcr()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan', 10);
		$this->db->where('id_unit_kerja', 85);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_penetapan_langsung_pcr()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan', 9);
		$this->db->where('id_unit_kerja', 85);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_tender_pcr()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_unit_kerja', 85);
		$this->db->where('id_metode_pemilihan !=', 8);
		$this->db->where('id_metode_pemilihan !=', 9);
		$this->db->where('id_metode_pemilihan !=', 10);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_kontrak_penunjukkan_langsung_pcr()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan = 8
		AND id_unit_kerja = 85 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_transaksi_langsung_pcr()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan = 10
		AND id_unit_kerja = 85 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_penetapan_langsung_pcr()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan = 9
		AND id_unit_kerja = 85 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_tender_pcr()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan != 9
		AND id_metode_pemilihan != 10
		AND id_metode_pemilihan != 8
		AND id_unit_kerja = 85 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_pcr()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		AND id_unit_kerja = 85 AND status_paket_tender IN (1,2) ");
		return $query->row_array();
	}

	public function total_efisiensi_penunjukkan_langsung_pcr()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_metode_pemilihan = 8
		AND id_unit_kerja = 85 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efisiensi_transaksi_langsung_pcr()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_metode_pemilihan = 10
		AND id_unit_kerja = 85
		AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efisiensi_penetapan_langsung_pcr()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_metode_pemilihan = 9
		AND id_unit_kerja = 85
		AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efisiensi_tender_pcr()
	{
		$sekarang = date('d-m-Y H:i');
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		LEFT JOIN tbl_jadwal_tender_detail ON tbl_paket.id_paket = tbl_jadwal_tender_detail.id_paket
		WHERE nama_jadwal_tender = 'Penandatanganan Kontrak'
		AND tanggal_selesai_jadwal < '$sekarang'
		AND id_metode_pemilihan != 9
		AND id_metode_pemilihan != 10
		AND id_metode_pemilihan != 8
		AND id_unit_kerja = 85 AND status_paket_tender IN (1,2) ");
		return $query->row_array();
	}

	public function total_efesiensi_pcr()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_unit_kerja = 85 AND status_paket_tender IN (1,2) ");
		return $query->row_array();
	}
	//END PROCUREMENT

	//HCGA
	public function total_penunjukkan_langsung_hcga()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan', 8);
		$this->db->where('id_unit_kerja', 69);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_transaksi_langsung_hcga()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan', 10);
		$this->db->where('id_unit_kerja', 69);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_penetapan_langsung_hcga()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan', 9);
		$this->db->where('id_unit_kerja', 69);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_tender_hcga()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan !=', 8);
		$this->db->where('id_metode_pemilihan !=', 9);
		$this->db->where('id_metode_pemilihan !=', 10);
		$this->db->where('id_unit_kerja', 69);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_kontrak_penunjukkan_langsung_hcga()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE status_paket_tender IN (1,2) AND id_metode_pemilihan = 8 AND id_unit_kerja = 69");
		return $query->row_array();
	}

	public function total_kontrak_transaksi_langsung_hcga()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE status_paket_tender IN (1,2) AND id_metode_pemilihan = 10 AND id_unit_kerja = 69");
		return $query->row_array();
	}

	public function total_kontrak_penetapan_langsung_hcga()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE status_paket_tender IN (1,2) AND id_metode_pemilihan = 9 AND id_unit_kerja = 69");
		return $query->row_array();
	}

	public function total_kontrak_tender_hcga()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE status_paket_tender IN (1,2)
		AND id_metode_pemilihan != 9
		AND id_metode_pemilihan != 10
		AND id_metode_pemilihan != 8
		AND id_unit_kerja = 69");
		return $query->row_array();
	}

	public function total_kontrak_hcga()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		AND id_unit_kerja = 69 AND status_paket_tender IN (1,2)
		");
		return $query->row_array();
	}

	public function total_efisiensi_penunjukkan_langsung_hcga()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_metode_pemilihan = 8
		AND id_unit_kerja = 69 AND status_paket_tender IN (1,2) ");
		return $query->row_array();
	}

	public function total_efisiensi_transaksi_langsung_hcga()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_metode_pemilihan = 10
		AND id_unit_kerja = 69 AND status_paket_tender IN (1,2) ");
		return $query->row_array();
	}

	public function total_efisiensi_penetapan_langsung_hcga()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_metode_pemilihan = 9
		AND id_unit_kerja = 69 AND status_paket_tender IN (1,2) ");
		return $query->row_array();
	}

	public function total_efisiensi_tender_hcga()
	{
		$sekarang = date('d-m-Y H:i');
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		LEFT JOIN tbl_jadwal_tender_detail ON tbl_paket.id_paket = tbl_jadwal_tender_detail.id_paket
		WHERE nama_jadwal_tender = 'Penandatanganan Kontrak'
		AND tanggal_selesai_jadwal < '$sekarang'
		AND id_metode_pemilihan != 9
		AND id_metode_pemilihan != 10
		AND id_metode_pemilihan != 8
		AND id_unit_kerja = 69 AND status_paket_tender IN (1,2) ");
		return $query->row_array();
	}

	public function total_efesiensi_hcga()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_unit_kerja = 69 AND status_paket_tender IN (1,2) ");
		return $query->row_array();
	}
	//END HCGA

	// CFTA
	public function total_penunjukkan_langsung_fta()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan', 8);
		$this->db->where('id_unit_kerja', 70);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_transaksi_langsung_fta()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan', 10);
		$this->db->where('id_unit_kerja', 70);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_penetapan_langsung_fta()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan', 9);
		$this->db->where('id_unit_kerja', 70);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_tender_fta()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan !=', 8);
		$this->db->where('id_metode_pemilihan !=', 9);
		$this->db->where('id_metode_pemilihan !=', 10);
		$this->db->where('id_unit_kerja', 70);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_kontrak_penunjukkan_langsung_fta()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan = 8
		AND id_unit_kerja = 70 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_transaksi_langsung_fta()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan = 10
		AND id_unit_kerja = 70 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_penetapan_langsung_fta()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan = 9
		AND id_unit_kerja = 70 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_tender_fta()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan != 9
		AND id_metode_pemilihan != 10
		AND id_metode_pemilihan != 8
		AND id_unit_kerja = 70 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_fta()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		AND id_unit_kerja = 70 AND status_paket_tender IN (1,2)
		");
		return $query->row_array();
	}

	public function total_efisiensi_penunjukkan_langsung_fta()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_metode_pemilihan = 8
		AND id_unit_kerja = 70 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efisiensi_transaksi_langsung_fta()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_metode_pemilihan = 10
		AND id_unit_kerja = 70 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efisiensi_penetapan_langsung_fta()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_metode_pemilihan = 9
		AND id_unit_kerja = 70 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efisiensi_tender_fta()
	{
		$sekarang = date('d-m-Y H:i');
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		LEFT JOIN tbl_jadwal_tender_detail ON tbl_paket.id_paket = tbl_jadwal_tender_detail.id_paket
		WHERE nama_jadwal_tender = 'Penandatanganan Kontrak'
		AND tanggal_selesai_jadwal < '$sekarang'
		AND id_metode_pemilihan != 9
		AND id_metode_pemilihan != 10
		AND id_metode_pemilihan != 8
		AND id_unit_kerja = 70 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efesiensi_fta()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_unit_kerja = 70 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}
	//END CFTA


	// RMMS
	public function total_penunjukkan_langsung_rmms()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan', 8);
		$this->db->where('id_unit_kerja', 71);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_transaksi_langsung_rmms()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan', 10);
		$this->db->where('id_unit_kerja', 71);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_penetapan_langsung_rmms()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan', 9);
		$this->db->where('id_unit_kerja', 71);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_tender_rmms()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan !=', 8);
		$this->db->where('id_metode_pemilihan !=', 9);
		$this->db->where('id_metode_pemilihan !=', 10);
		$this->db->where('id_unit_kerja', 71);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_kontrak_penunjukkan_langsung_rmms()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan = 8
		AND id_unit_kerja = 71 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_transaksi_langsung_rmms()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan = 10
		AND id_unit_kerja = 71 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_penetapan_langsung_rmms()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan = 9
		AND id_unit_kerja = 71 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_tender_rmms()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan != 9
		AND id_metode_pemilihan != 10
		AND id_metode_pemilihan != 8
		AND id_unit_kerja = 71 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_rmms()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		AND id_unit_kerja = 71 AND status_paket_tender IN (1,2)
		");
		return $query->row_array();
	}

	public function total_efisiensi_penunjukkan_langsung_rmms()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_metode_pemilihan = 8
		AND id_unit_kerja = 71 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efisiensi_transaksi_langsung_rmms()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_metode_pemilihan = 10
		AND id_unit_kerja = 71 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efisiensi_penetapan_langsung_rmms()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_metode_pemilihan = 9
		AND id_unit_kerja = 71 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efisiensi_tender_rmms()
	{
		$sekarang = date('d-m-Y H:i');
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		LEFT JOIN tbl_jadwal_tender_detail ON tbl_paket.id_paket = tbl_jadwal_tender_detail.id_paket
		WHERE nama_jadwal_tender = 'Penandatanganan Kontrak'
		AND tanggal_selesai_jadwal < '$sekarang'
		AND id_metode_pemilihan != 9
		AND id_metode_pemilihan != 10
		AND id_metode_pemilihan != 8
		AND id_unit_kerja = 71 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efesiensi_rmms()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_unit_kerja = 71 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}
	//END RMMS

	//AMP
	public function total_penunjukkan_langsung_amp()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan', 8);
		$this->db->where('id_unit_kerja', 72);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_transaksi_langsung_amp()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan', 10);
		$this->db->where('id_unit_kerja', 72);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_penetapan_langsung_amp()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan', 9);
		$this->db->where('id_unit_kerja', 72);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_tender_amp()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan !=', 8);
		$this->db->where('id_metode_pemilihan !=', 9);
		$this->db->where('id_metode_pemilihan !=', 10);
		$this->db->where('id_unit_kerja', 72);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_kontrak_penunjukkan_langsung_amp()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan = 8
		AND id_unit_kerja = 72 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_transaksi_langsung_amp()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan = 10
		AND id_unit_kerja = 72 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_penetapan_langsung_amp()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan = 9
		AND id_unit_kerja = 72 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_tender_amp()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan != 9
		AND id_metode_pemilihan != 10
		AND id_metode_pemilihan != 8
		AND id_unit_kerja = 72 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_amp()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		AND id_unit_kerja = 72 AND status_paket_tender IN (1,2)
		");
		return $query->row_array();
	}

	public function total_efisiensi_penunjukkan_langsung_amp()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_metode_pemilihan = 8
		AND id_unit_kerja = 72 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efisiensi_transaksi_langsung_amp()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_metode_pemilihan = 10
		AND id_unit_kerja = 72 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efisiensi_penetapan_langsung_amp()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_metode_pemilihan = 9
		AND id_unit_kerja = 72 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efisiensi_tender_amp()
	{
		$sekarang = date('d-m-Y H:i');
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		LEFT JOIN tbl_jadwal_tender_detail ON tbl_paket.id_paket = tbl_jadwal_tender_detail.id_paket
		WHERE nama_jadwal_tender = 'Penandatanganan Kontrak'
		AND tanggal_selesai_jadwal < '$sekarang'
		AND id_metode_pemilihan != 9
		AND id_metode_pemilihan != 10
		AND id_metode_pemilihan != 8
		AND id_unit_kerja = 72 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efesiensi_amp()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_unit_kerja = 72");
		return $query->row_array();
	}
	//END AMP

	// PCHE
	public function total_penunjukkan_langsung_pche()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan', 8);
		$this->db->where('id_unit_kerja', 73);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_transaksi_langsung_pche()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan', 10);
		$this->db->where('id_unit_kerja', 73);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_penetapan_langsung_pche()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan', 9);
		$this->db->where('id_unit_kerja', 73);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_tender_pche()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan !=', 8);
		$this->db->where('id_metode_pemilihan !=', 9);
		$this->db->where('id_metode_pemilihan !=', 10);
		$this->db->where('id_unit_kerja', 73);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_kontrak_penunjukkan_langsung_pche()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan = 8
		AND id_unit_kerja = 73 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_transaksi_langsung_pche()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan = 10
		AND id_unit_kerja = 73 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_penetapan_langsung_pche()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan = 9
		AND id_unit_kerja = 73 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_tender_pche()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan != 9
		AND id_metode_pemilihan != 10
		AND id_metode_pemilihan != 8
		AND id_unit_kerja = 73 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_pche()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		AND id_unit_kerja = 73 AND status_paket_tender IN (1,2)
		");
		return $query->row_array();
	}

	public function total_efisiensi_penunjukkan_langsung_pche()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_metode_pemilihan = 8
		AND id_unit_kerja = 73 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efisiensi_transaksi_langsung_pche()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_metode_pemilihan = 10
		AND id_unit_kerja = 73 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efisiensi_penetapan_langsung_pche()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_metode_pemilihan = 9
		AND id_unit_kerja = 73 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efisiensi_tender_pche()
	{
		$sekarang = date('d-m-Y H:i');
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		LEFT JOIN tbl_jadwal_tender_detail ON tbl_paket.id_paket = tbl_jadwal_tender_detail.id_paket
		WHERE nama_jadwal_tender = 'Penandatanganan Kontrak'
		AND tanggal_selesai_jadwal < '$sekarang'
		AND id_metode_pemilihan != 9
		AND id_metode_pemilihan != 10
		AND id_metode_pemilihan != 8
		AND id_unit_kerja = 73 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efesiensi_pche()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_unit_kerja = 73");
		return $query->row_array();
	}
	// END PCHE

	// amtd
	public function total_penunjukkan_langsung_amtd()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan', 8);
		$this->db->where('id_unit_kerja', 74);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_transaksi_langsung_amtd()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan', 10);
		$this->db->where('id_unit_kerja', 74);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_penetapan_langsung_amtd()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan', 9);
		$this->db->where('id_unit_kerja', 74);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_tender_amtd()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan !=', 8);
		$this->db->where('id_metode_pemilihan !=', 9);
		$this->db->where('id_metode_pemilihan !=', 10);
		$this->db->where('id_unit_kerja', 74);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_kontrak_penunjukkan_langsung_amtd()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan = 8
		AND id_unit_kerja = 74 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_transaksi_langsung_amtd()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan = 10
		AND id_unit_kerja = 74 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_penetapan_langsung_amtd()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan = 9
		AND id_unit_kerja = 74 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_tender_amtd()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan != 9
		AND id_metode_pemilihan != 10
		AND id_metode_pemilihan != 8
		AND id_unit_kerja = 74 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_amtd()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		AND id_unit_kerja = 74 AND status_paket_tender IN (1,2)
		");
		return $query->row_array();
	}

	public function total_efisiensi_penunjukkan_langsung_amtd()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_metode_pemilihan = 8
		AND id_unit_kerja = 74 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efisiensi_transaksi_langsung_amtd()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_metode_pemilihan = 10
		AND id_unit_kerja = 74 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efisiensi_penetapan_langsung_amtd()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_metode_pemilihan = 9
		AND id_unit_kerja = 74 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efisiensi_tender_amtd()
	{
		$sekarang = date('d-m-Y H:i');
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		LEFT JOIN tbl_jadwal_tender_detail ON tbl_paket.id_paket = tbl_jadwal_tender_detail.id_paket
		WHERE nama_jadwal_tender = 'Penandatanganan Kontrak'
		AND tanggal_selesai_jadwal < '$sekarang'
		AND id_metode_pemilihan != 9
		AND id_metode_pemilihan != 10
		AND id_metode_pemilihan != 8
		AND id_unit_kerja = 74 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efesiensi_amtd()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_unit_kerja = 74");
		return $query->row_array();
	}
	// END AMTD

	// OP1
	public function total_penunjukkan_langsung_op1()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan', 8);
		$this->db->where('id_unit_kerja', 76);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_transaksi_langsung_op1()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan', 10);
		$this->db->where('id_unit_kerja', 76);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_penetapan_langsung_op1()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan', 9);
		$this->db->where('id_unit_kerja', 76);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_tender_op1()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan !=', 8);
		$this->db->where('id_metode_pemilihan !=', 9);
		$this->db->where('id_metode_pemilihan !=', 10);
		$this->db->where('id_unit_kerja', 76);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_kontrak_penunjukkan_langsung_op1()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan = 8
		AND id_unit_kerja = 76 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_transaksi_langsung_op1()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan = 10
		AND id_unit_kerja = 76 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_penetapan_langsung_op1()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan = 9
		AND id_unit_kerja = 76 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_tender_op1()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan != 9
		AND id_metode_pemilihan != 10
		AND id_metode_pemilihan != 8
		AND id_unit_kerja = 76 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_op1()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		AND id_unit_kerja = 76 AND status_paket_tender IN (1,2)
		");
		return $query->row_array();
	}

	public function total_efisiensi_penunjukkan_langsung_op1()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_metode_pemilihan = 8
		AND id_unit_kerja = 76 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efisiensi_transaksi_langsung_op1()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_metode_pemilihan = 10
		AND id_unit_kerja = 76 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efisiensi_penetapan_langsung_op1()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_metode_pemilihan = 9
		AND id_unit_kerja = 76 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efisiensi_tender_op1()
	{
		$sekarang = date('d-m-Y H:i');
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		LEFT JOIN tbl_jadwal_tender_detail ON tbl_paket.id_paket = tbl_jadwal_tender_detail.id_paket
		WHERE nama_jadwal_tender = 'Penandatanganan Kontrak'
		AND tanggal_selesai_jadwal < '$sekarang'
		AND id_metode_pemilihan != 9
		AND id_metode_pemilihan != 10
		AND id_metode_pemilihan != 8
		AND id_unit_kerja = 76 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efesiensi_op1()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_unit_kerja = 76");
		return $query->row_array();
	}
	// END OP1

	// OP2
	public function total_penunjukkan_langsung_op2()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan', 8);
		$this->db->where('id_unit_kerja', 78);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_transaksi_langsung_op2()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan', 10);
		$this->db->where('id_unit_kerja', 78);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_penetapan_langsung_op2()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan', 9);
		$this->db->where('id_unit_kerja', 78);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_tender_op2()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan !=', 8);
		$this->db->where('id_metode_pemilihan !=', 9);
		$this->db->where('id_metode_pemilihan !=', 10);
		$this->db->where('id_unit_kerja', 78);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_kontrak_penunjukkan_langsung_op2()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan = 8
		AND id_unit_kerja = 78 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_transaksi_langsung_op2()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan = 10
		AND id_unit_kerja = 78 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_penetapan_langsung_op2()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan = 9
		AND id_unit_kerja = 78 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_tender_op2()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan != 9
		AND id_metode_pemilihan != 10
		AND id_metode_pemilihan != 8
		AND id_unit_kerja = 78 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_op2()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		AND id_unit_kerja = 78 AND status_paket_tender IN (1,2)
		");
		return $query->row_array();
	}

	public function total_efisiensi_penunjukkan_langsung_op2()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_metode_pemilihan = 8
		AND id_unit_kerja = 78 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efisiensi_transaksi_langsung_op2()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_metode_pemilihan = 10
		AND id_unit_kerja = 78 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efisiensi_penetapan_langsung_op2()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_metode_pemilihan = 9
		AND id_unit_kerja = 78 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efisiensi_tender_op2()
	{
		$sekarang = date('d-m-Y H:i');
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		LEFT JOIN tbl_jadwal_tender_detail ON tbl_paket.id_paket = tbl_jadwal_tender_detail.id_paket
		WHERE nama_jadwal_tender = 'Penandatanganan Kontrak'
		AND tanggal_selesai_jadwal < '$sekarang'
		AND id_metode_pemilihan != 9
		AND id_metode_pemilihan != 10
		AND id_metode_pemilihan != 8
		AND id_unit_kerja = 78 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efesiensi_op2()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_unit_kerja = 78");
		return $query->row_array();
	}
	// END OP2

	// OP3
	public function total_penunjukkan_langsung_op3()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan', 8);
		$this->db->where('id_unit_kerja', 80);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_transaksi_langsung_op3()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan', 10);
		$this->db->where('id_unit_kerja', 80);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_penetapan_langsung_op3()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan', 9);
		$this->db->where('id_unit_kerja', 80);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_tender_op3()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan !=', 8);
		$this->db->where('id_metode_pemilihan !=', 9);
		$this->db->where('id_metode_pemilihan !=', 10);
		$this->db->where('id_unit_kerja', 80);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_kontrak_penunjukkan_langsung_op3()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan = 8
		AND id_unit_kerja = 80 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_transaksi_langsung_op3()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan = 10
		AND id_unit_kerja = 80 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_penetapan_langsung_op3()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan = 9
		AND id_unit_kerja = 80 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_tender_op3()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan != 9
		AND id_metode_pemilihan != 10
		AND id_metode_pemilihan != 8
		AND id_unit_kerja = 80 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_op3()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		AND id_unit_kerja = 80 AND status_paket_tender IN (1,2)
		");
		return $query->row_array();
	}

	public function total_efisiensi_penunjukkan_langsung_op3()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_metode_pemilihan = 8
		AND id_unit_kerja = 80 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efisiensi_transaksi_langsung_op3()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_metode_pemilihan = 10
		AND id_unit_kerja = 80 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efisiensi_penetapan_langsung_op3()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_metode_pemilihan = 9
		AND id_unit_kerja = 80 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efisiensi_tender_op3()
	{
		$sekarang = date('d-m-Y H:i');
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		LEFT JOIN tbl_jadwal_tender_detail ON tbl_paket.id_paket = tbl_jadwal_tender_detail.id_paket
		WHERE nama_jadwal_tender = 'Penandatanganan Kontrak'
		AND tanggal_selesai_jadwal < '$sekarang'
		AND id_metode_pemilihan != 9
		AND id_metode_pemilihan != 10
		AND id_metode_pemilihan != 8
		AND id_unit_kerja = 80 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efesiensi_op3()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_unit_kerja = 80");
		return $query->row_array();
	}
	// END OP3

	// MSA1
	public function total_penunjukkan_langsung_msa1()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan', 8);
		$this->db->where('id_unit_kerja', 77);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_transaksi_langsung_msa1()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan', 10);
		$this->db->where('id_unit_kerja', 77);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_penetapan_langsung_msa1()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan', 9);
		$this->db->where('id_unit_kerja', 77);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_tender_msa1()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan !=', 8);
		$this->db->where('id_metode_pemilihan !=', 9);
		$this->db->where('id_metode_pemilihan !=', 10);
		$this->db->where('id_unit_kerja', 77);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_kontrak_penunjukkan_langsung_msa1()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan = 8
		AND id_unit_kerja = 77 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_transaksi_langsung_msa1()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan = 10
		AND id_unit_kerja = 77 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_penetapan_langsung_msa1()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan = 9
		AND id_unit_kerja = 77 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_tender_msa1()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan != 9
		AND id_metode_pemilihan != 10
		AND id_metode_pemilihan != 8
		AND id_unit_kerja = 77 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_msa1()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		AND id_unit_kerja = 77 AND status_paket_tender IN (1,2)
		");
		return $query->row_array();
	}

	public function total_efisiensi_penunjukkan_langsung_msa1()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_metode_pemilihan = 8
		AND id_unit_kerja = 77 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efisiensi_transaksi_langsung_msa1()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_metode_pemilihan = 10
		AND id_unit_kerja = 77 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efisiensi_penetapan_langsung_msa1()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_metode_pemilihan = 9
		AND id_unit_kerja = 77 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efisiensi_tender_msa1()
	{
		$sekarang = date('d-m-Y H:i');
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		LEFT JOIN tbl_jadwal_tender_detail ON tbl_paket.id_paket = tbl_jadwal_tender_detail.id_paket
		WHERE nama_jadwal_tender = 'Penandatanganan Kontrak'
		AND tanggal_selesai_jadwal < '$sekarang'
		AND id_metode_pemilihan != 9
		AND id_metode_pemilihan != 10
		AND id_metode_pemilihan != 8
		AND id_unit_kerja = 77 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efesiensi_msa1()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_unit_kerja = 77");
		return $query->row_array();
	}
	// END MSA1

	// MSA2
	public function total_penunjukkan_langsung_msa2()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan', 8);
		$this->db->where('id_unit_kerja', 79);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_transaksi_langsung_msa2()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan', 10);
		$this->db->where('id_unit_kerja', 79);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_penetapan_langsung_msa2()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan', 9);
		$this->db->where('id_unit_kerja', 79);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_tender_msa2()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan !=', 8);
		$this->db->where('id_metode_pemilihan !=', 9);
		$this->db->where('id_metode_pemilihan !=', 10);
		$this->db->where('id_unit_kerja', 79);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_kontrak_penunjukkan_langsung_msa2()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan = 8
		AND id_unit_kerja = 79 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_transaksi_langsung_msa2()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan = 10
		AND id_unit_kerja = 79 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_penetapan_langsung_msa2()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan = 9
		AND id_unit_kerja = 79 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_tender_msa2()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan != 9
		AND id_metode_pemilihan != 10
		AND id_metode_pemilihan != 8
		AND id_unit_kerja = 79 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_msa2()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		AND id_unit_kerja = 79 AND status_paket_tender IN (1,2)
		");
		return $query->row_array();
	}

	public function total_efisiensi_penunjukkan_langsung_msa2()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_metode_pemilihan = 8
		AND id_unit_kerja = 79 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efisiensi_transaksi_langsung_msa2()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_metode_pemilihan = 10
		AND id_unit_kerja = 79 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efisiensi_penetapan_langsung_msa2()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_metode_pemilihan = 9
		AND id_unit_kerja = 79 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efisiensi_tender_msa2()
	{
		$sekarang = date('d-m-Y H:i');
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		LEFT JOIN tbl_jadwal_tender_detail ON tbl_paket.id_paket = tbl_jadwal_tender_detail.id_paket
		WHERE nama_jadwal_tender = 'Penandatanganan Kontrak'
		AND tanggal_selesai_jadwal < '$sekarang'
		AND id_metode_pemilihan != 9
		AND id_metode_pemilihan != 10
		AND id_metode_pemilihan != 8
		AND id_unit_kerja = 79 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efesiensi_msa2()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_unit_kerja = 79");
		return $query->row_array();
	}
	//END MSA2

	// MSA 3
	public function total_penunjukkan_langsung_msa3()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan', 8);
		$this->db->where('id_unit_kerja', 81);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_transaksi_langsung_msa3()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan', 10);
		$this->db->where('id_unit_kerja', 81);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_penetapan_langsung_msa3()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan', 9);
		$this->db->where('id_unit_kerja', 81);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_tender_msa3()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan !=', 8);
		$this->db->where('id_metode_pemilihan !=', 9);
		$this->db->where('id_metode_pemilihan !=', 10);
		$this->db->where('id_unit_kerja', 81);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_kontrak_penunjukkan_langsung_msa3()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan = 8
		AND id_unit_kerja = 81 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_transaksi_langsung_msa3()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan = 10
		AND id_unit_kerja = 81 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_penetapan_langsung_msa3()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan = 9
		AND id_unit_kerja = 81 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_tender_msa3()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan != 9
		AND id_metode_pemilihan != 10
		AND id_metode_pemilihan != 8
		AND id_unit_kerja = 81 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_msa3()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		AND id_unit_kerja = 81 AND status_paket_tender IN (1,2)
		");
		return $query->row_array();
	}

	public function total_efisiensi_penunjukkan_langsung_msa3()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_metode_pemilihan = 8
		AND id_unit_kerja = 81 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efisiensi_transaksi_langsung_msa3()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_metode_pemilihan = 10
		AND id_unit_kerja = 81 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efisiensi_penetapan_langsung_msa3()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_metode_pemilihan = 9
		AND id_unit_kerja = 81 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efisiensi_tender_msa3()
	{
		$sekarang = date('d-m-Y H:i');
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		LEFT JOIN tbl_jadwal_tender_detail ON tbl_paket.id_paket = tbl_jadwal_tender_detail.id_paket
		WHERE nama_jadwal_tender = 'Penandatanganan Kontrak'
		AND tanggal_selesai_jadwal < '$sekarang'
		AND id_metode_pemilihan != 9
		AND id_metode_pemilihan != 10
		AND id_metode_pemilihan != 8
		AND id_unit_kerja = 81 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efesiensi_msa3()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_unit_kerja = 81");
		return $query->row_array();
	}
	//END MSA 3

	// PM
	public function total_penunjukkan_langsung_pm()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan', 8);
		$this->db->where('id_unit_kerja', 82);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_transaksi_langsung_pm()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan', 10);
		$this->db->where('id_unit_kerja', 82);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_penetapan_langsung_pm()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan', 9);
		$this->db->where('id_unit_kerja', 82);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_tender_pm()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan !=', 8);
		$this->db->where('id_metode_pemilihan !=', 9);
		$this->db->where('id_metode_pemilihan !=', 10);
		$this->db->where('id_unit_kerja', 82);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_kontrak_penunjukkan_langsung_pm()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan = 8
		AND id_unit_kerja = 82 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_transaksi_langsung_pm()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan = 10
		AND id_unit_kerja = 82 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_penetapan_langsung_pm()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan = 9
		AND id_unit_kerja = 82 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_tender_pm()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan != 9
		AND id_metode_pemilihan != 10
		AND id_metode_pemilihan != 8
		AND id_unit_kerja = 82 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_pm()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		AND id_unit_kerja = 82 AND status_paket_tender IN (1,2)
		");
		return $query->row_array();
	}

	public function total_efisiensi_penunjukkan_langsung_pm()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_metode_pemilihan = 8
		AND id_unit_kerja = 82 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efisiensi_transaksi_langsung_pm()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_metode_pemilihan = 10
		AND id_unit_kerja = 82 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efisiensi_penetapan_langsung_pm()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_metode_pemilihan = 9
		AND id_unit_kerja = 82 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efisiensi_tender_pm()
	{
		$sekarang = date('d-m-Y H:i');
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		LEFT JOIN tbl_jadwal_tender_detail ON tbl_paket.id_paket = tbl_jadwal_tender_detail.id_paket
		WHERE nama_jadwal_tender = 'Penandatanganan Kontrak'
		AND tanggal_selesai_jadwal < '$sekarang'
		AND id_metode_pemilihan != 9
		AND id_metode_pemilihan != 10
		AND id_metode_pemilihan != 8
		AND id_unit_kerja = 82 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efesiensi_pm()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_unit_kerja = 82");
		return $query->row_array();
	}
	// END PM

	// CPFTA
	public function total_penunjukkan_langsung_cpfta()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan', 8);
		$this->db->where('id_unit_kerja', 83);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_transaksi_langsung_cpfta()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan', 10);
		$this->db->where('id_unit_kerja', 83);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_penetapan_langsung_cpfta()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan', 9);
		$this->db->where('id_unit_kerja', 83);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_tender_cpfta()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan !=', 8);
		$this->db->where('id_metode_pemilihan !=', 9);
		$this->db->where('id_metode_pemilihan !=', 10);
		$this->db->where('id_unit_kerja', 83);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_kontrak_penunjukkan_langsung_cpfta()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan = 8
		AND id_unit_kerja = 83 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_transaksi_langsung_cpfta()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan = 10
		AND id_unit_kerja = 83 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_penetapan_langsung_cpfta()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan = 9
		AND id_unit_kerja = 83 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_tender_cpfta()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan != 9
		AND id_metode_pemilihan != 10
		AND id_metode_pemilihan != 8
		AND id_unit_kerja = 83 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_cpfta()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		AND id_unit_kerja = 83 AND status_paket_tender IN (1,2)
		");
		return $query->row_array();
	}

	public function total_efisiensi_penunjukkan_langsung_cpfta()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_metode_pemilihan = 8
		AND id_unit_kerja = 83 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efisiensi_transaksi_langsung_cpfta()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_metode_pemilihan = 10
		AND id_unit_kerja = 83 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efisiensi_penetapan_langsung_cpfta()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_metode_pemilihan = 9
		AND id_unit_kerja = 83 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efisiensi_tender_cpfta()
	{
		$sekarang = date('d-m-Y H:i');
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		LEFT JOIN tbl_jadwal_tender_detail ON tbl_paket.id_paket = tbl_jadwal_tender_detail.id_paket
		WHERE nama_jadwal_tender = 'Penandatanganan Kontrak'
		AND tanggal_selesai_jadwal < '$sekarang'
		AND id_metode_pemilihan != 9
		AND id_metode_pemilihan != 10
		AND id_metode_pemilihan != 8
		AND id_unit_kerja = 83 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efesiensi_cpfta()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_unit_kerja = 83");
		return $query->row_array();
	}
	// END CPFTA

	// RMQ
	public function total_penunjukkan_langsung_rmq()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan', 8);
		$this->db->where('id_unit_kerja', 84);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_transaksi_langsung_rmq()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan', 10);
		$this->db->where('id_unit_kerja', 84);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_penetapan_langsung_rmq()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan', 9);
		$this->db->where('id_unit_kerja', 84);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_tender_rmq()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan !=', 8);
		$this->db->where('id_metode_pemilihan !=', 9);
		$this->db->where('id_metode_pemilihan !=', 10);
		$this->db->where('id_unit_kerja', 84);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_kontrak_penunjukkan_langsung_rmq()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan = 8
		AND id_unit_kerja = 84 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_transaksi_langsung_rmq()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan = 10
		AND id_unit_kerja = 84 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_penetapan_langsung_rmq()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan = 9
		AND id_unit_kerja = 84 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_tender_rmq()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan != 9
		AND id_metode_pemilihan != 10
		AND id_metode_pemilihan != 8
		AND id_unit_kerja = 84 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_rmq()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		AND id_unit_kerja = 84 AND status_paket_tender IN (1,2)
		");
		return $query->row_array();
	}

	public function total_efisiensi_penunjukkan_langsung_rmq()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_metode_pemilihan = 8
		AND id_unit_kerja = 84 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efisiensi_transaksi_langsung_rmq()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_metode_pemilihan = 10
		AND id_unit_kerja = 84 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efisiensi_penetapan_langsung_rmq()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_metode_pemilihan = 9
		AND id_unit_kerja = 84 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efisiensi_tender_rmq()
	{
		$sekarang = date('d-m-Y H:i');
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		LEFT JOIN tbl_jadwal_tender_detail ON tbl_paket.id_paket = tbl_jadwal_tender_detail.id_paket
		WHERE nama_jadwal_tender = 'Penandatanganan Kontrak'
		AND tanggal_selesai_jadwal < '$sekarang'
		AND id_metode_pemilihan != 9
		AND id_metode_pemilihan != 10
		AND id_metode_pemilihan != 8
		AND id_unit_kerja = 84 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efesiensi_rmq()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_unit_kerja = 84");
		return $query->row_array();
	}
	// END RMQ

	// BD
	public function total_penunjukkan_langsung_bd()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan', 8);
		$this->db->where('id_unit_kerja', 75);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_transaksi_langsung_bd()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan', 10);
		$this->db->where('id_unit_kerja', 75);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_penetapan_langsung_bd()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan', 9);
		$this->db->where('id_unit_kerja', 75);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_tender_bd()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_metode_pemilihan !=', 8);
		$this->db->where('id_metode_pemilihan !=', 9);
		$this->db->where('id_metode_pemilihan !=', 10);
		$this->db->where('id_unit_kerja', 75);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_kontrak_penunjukkan_langsung_bd()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan = 8
		AND id_unit_kerja = 75 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_transaksi_langsung_bd()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan = 10
		AND id_unit_kerja = 75 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_penetapan_langsung_bd()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan = 9
		AND id_unit_kerja = 75 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_tender_bd()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE id_metode_pemilihan != 9
		AND id_metode_pemilihan != 10
		AND id_metode_pemilihan != 8
		AND id_unit_kerja = 75 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_kontrak_bd()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		AND id_unit_kerja = 75 AND status_paket_tender IN (1,2)
		");
		return $query->row_array();
	}

	public function total_efisiensi_penunjukkan_langsung_bd()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_metode_pemilihan = 8
		AND id_unit_kerja = 75 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efisiensi_transaksi_langsung_bd()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_metode_pemilihan = 10
		AND id_unit_kerja = 75 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efisiensi_penetapan_langsung_bd()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_metode_pemilihan = 9
		AND id_unit_kerja = 75 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efisiensi_tender_bd()
	{
		$sekarang = date('d-m-Y H:i');
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		LEFT JOIN tbl_jadwal_tender_detail ON tbl_paket.id_paket = tbl_jadwal_tender_detail.id_paket
		WHERE nama_jadwal_tender = 'Penandatanganan Kontrak'
		AND tanggal_selesai_jadwal < '$sekarang'
		AND id_metode_pemilihan != 9
		AND id_metode_pemilihan != 10
		AND id_metode_pemilihan != 8
		AND id_unit_kerja = 75 AND status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_efesiensi_bd()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_sumber_dana
		LEFT JOIN tbl_paket ON tbl_sumber_dana.id_paket = tbl_paket.id_paket
		WHERE id_unit_kerja = 75");
		return $query->row_array();
	}
	//END BD

	// count metode
	public function total_barang()
	{
		$query = $this->db->query("SELECT COUNT(*) AS total_paket FROM tbl_paket
		WHERE status_paket_tender IN (1,2) AND id_jenis_pengadaan = 1");
		return $query->row_array();
	}

	public function total_jasa_pemborongan()
	{
		$query = $this->db->query("SELECT COUNT(*) AS total_paket FROM tbl_paket
		WHERE status_paket_tender IN (1,2) AND id_jenis_pengadaan = 2");
		return $query->row_array();
	}

	public function total_jasa_konsultansi()
	{
		$query = $this->db->query("SELECT COUNT(*) AS total_paket FROM tbl_paket
		WHERE status_paket_tender IN (1,2) AND id_jenis_pengadaan = 3");
		return $query->row_array();
	}

	public function total_jasa_lain()
	{
		$query = $this->db->query("SELECT COUNT(*) AS total_paket FROM tbl_paket
		WHERE status_paket_tender IN (1,2) AND id_jenis_pengadaan = 4");
		return $query->row_array();
	}


	public function total_penunjukkan_langsung()
	{
		$query = $this->db->query("SELECT COUNT(*) AS total_paket FROM tbl_paket
		WHERE status_paket_tender IN (1,2) AND id_metode_pemilihan = 8");
		return $query->row_array();
	}

	public function total_transaksi_langsung()
	{
		$query = $this->db->query("SELECT COUNT(*) AS total_paket FROM tbl_paket
		WHERE status_paket_tender IN (1,2) AND id_metode_pemilihan = 10");
		return $query->row_array();
	}

	public function total_penetapan_langsung()
	{
		$query = $this->db->query("SELECT COUNT(*) AS total_paket FROM tbl_paket
		WHERE status_paket_tender IN (1,2) AND id_metode_pemilihan = 9");
		return $query->row_array();
	}
	public function total_tender()
	{
		$query = $this->db->query("SELECT COUNT(*) AS total_paket FROM tbl_paket
		WHERE status_paket_tender IN (1,2)
		AND id_metode_pemilihan != 9
		AND id_metode_pemilihan != 8
		AND id_metode_pemilihan != 10");
		return $query->row_array();
	}

	public function total_kontrak_penunjukkan_langsung()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE status_paket_tender IN (1,2) AND id_metode_pemilihan = 8");
		return $query->row_array();
	}

	public function total_kontrak_penetapan_langsung()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE status_paket_tender IN (1,2) AND id_metode_pemilihan = 9");
		return $query->row_array();
	}

	public function total_kontrak_transaksi_langsung()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE status_paket_tender IN (1,2) AND id_metode_pemilihan = 10");
		return $query->row_array();
	}

	public function total_kontrak_tender()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE status_paket_tender IN (1,2)
		AND id_metode_pemilihan != 9
		AND id_metode_pemilihan != 8
		AND id_metode_pemilihan != 10");
		return $query->row_array();
	}

	public function total_hps_penunjukkan_langsung()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_paket
		LEFT JOIN tbl_sumber_dana ON tbl_paket.id_paket = tbl_sumber_dana.id_paket
		WHERE status_paket_tender IN (1,2) AND id_metode_pemilihan = 8");
		return $query->row_array();
	}

	public function total_hps_transaksi_langsung()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_paket
		LEFT JOIN tbl_sumber_dana ON tbl_paket.id_paket = tbl_sumber_dana.id_paket
		WHERE status_paket_tender IN (1,2) AND id_metode_pemilihan = 10");
		return $query->row_array();
	}

	public function total_hps_penetapan_langsung()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_paket
		LEFT JOIN tbl_sumber_dana ON tbl_paket.id_paket = tbl_sumber_dana.id_paket
		WHERE status_paket_tender IN (1,2) AND id_metode_pemilihan = 9");
		return $query->row_array();
	}

	public function total_hps_tender()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps FROM tbl_paket
		LEFT JOIN tbl_sumber_dana ON tbl_paket.id_paket = tbl_sumber_dana.id_paket
		WHERE status_paket_tender IN (1,2)
		AND id_metode_pemilihan != 9
		AND id_metode_pemilihan != 8
		AND id_metode_pemilihan != 10");
		return $query->row_array();
	}

	public function total_seluruh_kontrak()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor WHERE status_paket_tender IN (1,2)");
		return $query->row_array();
	}

	public function total_barang_semua_paket()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 1);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_pemborongan_semua_paket()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 2);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_konsultansi_semua_paket()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 3);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function total_lain_semua_paket()
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->where('id_jenis_pengadaan', 4);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function anggaran_barang()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_anggaran FROM tbl_paket
		LEFT JOIN tbl_sumber_dana USING(id_paket)
		WHERE status_paket_tender IN (1,2) AND  id_jenis_pengadaan = 1");
		return $query->row_array();
	}

	public function anggaran_pemborongan()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_anggaran FROM tbl_paket
		LEFT JOIN tbl_sumber_dana USING(id_paket)
		WHERE status_paket_tender IN (1,2) AND  id_jenis_pengadaan = 2");
		return $query->row_array();
	}

	public function anggaran_konsultansi()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_anggaran FROM tbl_paket
		LEFT JOIN tbl_sumber_dana USING(id_paket)
		WHERE status_paket_tender IN (1,2) AND  id_jenis_pengadaan = 3");
		return $query->row_array();
	}

	public function anggaran_lain()
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_anggaran FROM tbl_paket
		LEFT JOIN tbl_sumber_dana USING(id_paket)
		WHERE status_paket_tender IN (1,2) AND  id_jenis_pengadaan = 4");
		return $query->row_array();
	}

	public function kontrak_barang()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE status_paket_tender IN (1,2) AND  id_jenis_pengadaan = 1");
		return $query->row_array();
	}

	public function kontrak_pemborongan()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE status_paket_tender IN (1,2) AND  id_jenis_pengadaan = 2");
		return $query->row_array();
	}

	public function kontrak_konsultansi()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE status_paket_tender IN (1,2) AND  id_jenis_pengadaan = 3");
		return $query->row_array();
	}

	public function kontrak_lain()
	{
		$query = $this->db->query("SELECT SUM(negosiasi) AS total_kontrak FROM tbl_paket
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor
		WHERE status_paket_tender IN (1,2) AND  id_jenis_pengadaan = 4");
		return $query->row_array();
	}

	public function laporan_kinerja()
	{
		$query = $this->db->query("SELECT * FROM tbl_vendor_mengikuti_paket
		LEFT JOIN tbl_paket ON tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor = tbl_paket.id_paket
		LEFT JOIN tbl_unit_kerja ON tbl_unit_kerja.id_unit_kerja = tbl_paket.id_unit_kerja
		LEFT JOIN tbl_panitia ON tbl_panitia.id_panitia = tbl_paket.id_panitia
		LEFT JOIN tbl_jenis_anggaran ON tbl_jenis_anggaran.id_jenis_anggaran = tbl_paket.id_jenis_anggaran
		LEFT JOIN tbl_jenis_pengadaan ON tbl_jenis_pengadaan.id_jenis_pengadaan = tbl_paket.id_jenis_pengadaan
		LEFT JOIN tbl_metode_pemilihan ON tbl_metode_pemilihan.id_metode_pemilihan = tbl_paket.id_metode_pemilihan
		LEFT JOIN tbl_vendor ON tbl_vendor_mengikuti_paket.id_mengikuti_vendor = tbl_vendor.id_vendor
		LEFT JOIN tbl_vendor_identitas_prusahaan ON tbl_vendor.id_vendor = tbl_vendor_identitas_prusahaan.id_vendor
		LEFT JOIN tbl_provinsi ON tbl_vendor_identitas_prusahaan.id_provinsi = tbl_provinsi.id_provinsi
		LEFT JOIN tbl_kabupaten ON tbl_vendor_identitas_prusahaan.id_kabupaten = tbl_kabupaten.id_kabupaten
		WHERE tbl_vendor_mengikuti_paket.pemenang_tender = 1
		ORDER BY rating_nilai_akhir DESC");
		return $query->result_array();
	}

	public function laporan_daftarhitam()
	{
		$query = $this->db->query("SELECT * FROM tbl_vendor WHERE status_daftar_hitam_vendor = 1");
		return $query->result_array();
	}


	var $table = 'tbl_paket';
	var $order = array('id_paket', 'kode_tender', 'nama_jenis_pengadaan', 'nama_metode_pemilihan', 'tanggal_buat_rup', 'tanggal_buat_rup', 'nama_paket', 'nama_unit_kerja', 'hps', 'username_vendor', 'negosiasi', 'pembuat_paket');
	var $column_search = array('id_paket', 'kode_tender', 'nama_jenis_pengadaan', 'nama_metode_pemilihan', 'tanggal_buat_rup', 'tanggal_buat_rup', 'nama_paket', 'nama_unit_kerja', 'hps', 'username_vendor', 'negosiasi', 'pembuat_paket');

	private function _get_data_query()
	{
		$i = 0;
		// $sekarang = date('d-m-Y H:i');
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->join('tbl_jenis_pengadaan', 'tbl_paket.id_jenis_pengadaan = tbl_jenis_pengadaan.id_jenis_pengadaan', 'left');
		$this->db->join('tbl_metode_pemilihan', 'tbl_paket.id_metode_pemilihan = tbl_metode_pemilihan.id_metode_pemilihan', 'left');
		$this->db->join('tbl_jadwal_tender_detail', 'tbl_paket.id_paket = tbl_jadwal_tender_detail.id_paket', 'left');
		$this->db->join('tbl_unit_kerja', 'tbl_paket.id_unit_kerja = tbl_unit_kerja.id_unit_kerja', 'left');
		$this->db->join('tbl_vendor_mengikuti_paket', 'tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', 'left');
		$this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_mengikuti_vendor = tbl_vendor.id_vendor', 'left');
		$this->db->join('tbl_sumber_dana', 'tbl_paket.id_paket = tbl_sumber_dana.id_paket');
		$this->db->join('tbl_pegawai', 'tbl_paket.pembuat_paket = tbl_pegawai.username', 'left');
		$this->db->join('tbl_jenis_anggaran', 'tbl_paket.id_jenis_anggaran = tbl_jenis_anggaran.id_jenis_anggaran', 'left');
		$this->db->where('(tbl_vendor_mengikuti_paket.pemenang_tender = 1 OR tbl_paket.status_paket_tender = 2)');
		$this->db->group_by('tbl_paket.id_paket');
		$this->db->order_by('tbl_vendor.username_vendor', 'DESC');
		if (isset($_POST['id_unit_kerja'], $_POST['id_jenis_pengadaan'], $_POST['tanggal_buat_rup']) && $_POST['id_unit_kerja'] != '' && $_POST['id_jenis_pengadaan'] != '' && $_POST['tanggal_buat_rup'] != '') {
			$this->db->like('tbl_paket.id_unit_kerja', $_POST['id_unit_kerja']);
			$this->db->like('tbl_paket.id_jenis_pengadaan', $_POST['id_jenis_pengadaan']);
			$this->db->like('tanggal_buat_rup', $_POST['tanggal_buat_rup']);
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
			$this->db->order_by($this->column_search[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('tbl_paket.id_paket', 'DESC');
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
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}

	public function get_pemenang($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_vendor_mengikuti_paket
		LEFT JOIN tbl_vendor ON tbl_vendor_mengikuti_paket.id_mengikuti_vendor = tbl_vendor.id_vendor
		WHERE pemenang_tender = 1 AND id_mengikuti_paket_vendor = $id_paket");
		return $query->row();
	}

	public function get_pemenang_tkdn($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_vendor_mengikuti_paket
		LEFT JOIN tbl_vendor ON tbl_vendor_mengikuti_paket.id_mengikuti_vendor = tbl_vendor.id_vendor LEFT JOIN tbl_vendor_identitas_prusahaan ON tbl_vendor.id_vendor = tbl_vendor_identitas_prusahaan.id_vendor
		WHERE pemenang_tender = 1 AND id_mengikuti_paket_vendor = $id_paket");
		return $query->row();
	}

	//tkdn sumberdana

	function get_sumber_dana($id_paket)
	{
		$query = $this->db->query("SELECT SUM(hps) AS total_hps
		FROM tbl_sumber_dana WHERE id_paket = $id_paket");
		return $query->row();
	}



	// TKDN

	var $table_tkdn = 'tbl_paket';
	var $order_tkdn = array('tbl_paket.id_paket', 'kode_tender', 'nama_jenis_pengadaan', 'nama_metode_pemilihan', 'tanggal_buat_rup', 'tanggal_buat_rup', 'nama_paket', 'nama_unit_kerja', 'hps', 'username_vendor', 'negosiasi', 'pembuat_paket');
	var $column_search_tkdn = array('tbl_paket.id_paket', 'kode_tender', 'nama_jenis_pengadaan', 'nama_metode_pemilihan', 'tanggal_buat_rup', 'tanggal_buat_rup', 'nama_paket', 'nama_unit_kerja', 'hps', 'username_vendor', 'negosiasi', 'pembuat_paket');

	private function _get_data_query_tkdn()
	{
		// $sekarang = date('d-m-Y H:i');
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->join('tbl_jenis_pengadaan', 'tbl_paket.id_jenis_pengadaan = tbl_jenis_pengadaan.id_jenis_pengadaan', 'left');
		$this->db->join('tbl_metode_pemilihan', 'tbl_paket.id_metode_pemilihan = tbl_metode_pemilihan.id_metode_pemilihan', 'left');
		$this->db->join('tbl_jadwal_tender_detail', 'tbl_paket.id_paket = tbl_jadwal_tender_detail.id_paket', 'left');
		$this->db->join('tbl_unit_kerja', 'tbl_paket.id_unit_kerja = tbl_unit_kerja.id_unit_kerja', 'left');
		$this->db->join('tbl_vendor_mengikuti_paket', 'tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', 'left');
		$this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_mengikuti_vendor = tbl_vendor.id_vendor', 'left');
		$this->db->join('tbl_sumber_dana', 'tbl_paket.id_paket = tbl_sumber_dana.id_paket');
		$this->db->join('tbl_pegawai', 'tbl_paket.pembuat_paket = tbl_pegawai.username', 'left');
		$this->db->join('tbl_jenis_anggaran', 'tbl_paket.id_jenis_anggaran = tbl_jenis_anggaran.id_jenis_anggaran', 'left');
		$this->db->where('tbl_vendor_mengikuti_paket.pemenang_tender =', 1);
		$this->db->where('tbl_paket.status_paket_tender', 2);
		$this->db->where('tbl_paket.pencatatan !=', NULL);
		$this->db->group_by('tbl_paket.id_paket');
		$this->db->order_by('tbl_vendor.username_vendor', 'DESC');
		if (isset($_POST['id_unit_kerja'], $_POST['id_jenis_pengadaan'], $_POST['tanggal_buat_rup']) && $_POST['id_unit_kerja'] != '' && $_POST['id_jenis_pengadaan'] != '' && $_POST['tanggal_buat_rup'] != '') {
			$this->db->like('tbl_paket.id_unit_kerja', $_POST['id_unit_kerja']);
			$this->db->like('tbl_paket.id_jenis_pengadaan', $_POST['id_jenis_pengadaan']);
			$this->db->like('tanggal_buat_rup', $_POST['tanggal_buat_rup']);
		}
		$i = 0;
		foreach ($this->order_tkdn as $item) // looping awal
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

				if (count($this->order_tkdn) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->column_search_tkdn[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('tbl_paket.id_paket', 'DESC');
		}
	}

	public function getdatatable_tkdn()
	{
		$this->_get_data_query_tkdn();
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_data_tkdn()
	{
		$this->_get_data_query_tkdn();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data_tkdn()
	{
		$this->db->from($this->table);
		$this->db->where_in('tbl_paket.status_paket_tender', [1, 2]);
		return $this->db->count_all_results();
	}
	// END TKDN

}
