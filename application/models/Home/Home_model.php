<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
{
	public function ambil_berita()
	{
		$query = $this->db->query("SELECT * FROM tbl_berita ORDER BY id_berita DESC");
		return $query->result_array();
	}

	public function hitung_paket()
	{
		$query = $this->db->query("SELECT COUNT(id_paket) AS total_paket FROM tbl_paket WHERE id_jenis_pengadaan = 1 
		AND id_metode_pemilihan != 10 
		AND id_metode_pemilihan != 9 
		AND id_metode_pemilihan != 8
		AND id_metode_pemilihan != 4
		AND id_metode_pemilihan != 6
		AND status_soft_delete != 1
		AND status_paket_tender = 2
		ORDER BY tbl_paket.id_paket DESC");
		return $query->row_array();
	}

	public function ambil_paket()
	{
		$query = $this->db->query("SELECT * FROM tbl_paket
		  
		WHERE id_jenis_pengadaan = 1 
		AND id_metode_pemilihan != 10 
		AND id_metode_pemilihan != 9 
		AND id_metode_pemilihan != 8
		AND id_metode_pemilihan != 4
		AND id_metode_pemilihan != 6
		AND status_soft_delete != 1
		AND status_paket_tender = 2
		ORDER BY tbl_paket.id_paket DESC");
		return $query->result_array();
	}

	public function hitung_paket2()
	{
		$query = $this->db->query("SELECT COUNT(id_paket) AS total_paket FROM tbl_paket WHERE id_jenis_pengadaan = 2 AND id_metode_pemilihan != 10 AND id_metode_pemilihan != 9 AND id_metode_pemilihan != 8 AND id_metode_pemilihan != 6 AND id_metode_pemilihan != 4	AND status_paket_tender = 2");
		return $query->row_array();
	}

	public function ambil_paket2()
	{
		$query = $this->db->query("SELECT * FROM tbl_paket  WHERE id_jenis_pengadaan = 2 AND id_metode_pemilihan != 10 AND id_metode_pemilihan != 9 AND id_metode_pemilihan != 8 AND id_metode_pemilihan != 6 AND id_metode_pemilihan != 4 AND status_soft_delete != 1 AND status_paket_tender = 2  ORDER BY tbl_paket.id_paket DESC ");
		return $query->result_array();
	}

	public function hitung_paket3()
	{
		$query = $this->db->query("SELECT COUNT(id_paket) AS total_paket FROM tbl_paket WHERE id_jenis_pengadaan = 3 AND id_metode_pemilihan != 10 AND id_metode_pemilihan != 9 AND id_metode_pemilihan != 8 AND id_metode_pemilihan != 6 AND id_metode_pemilihan != 4 AND status_soft_delete != 1 AND status_paket_tender = 2 ORDER BY id_paket DESC");
		return $query->row_array();
	}

	public function ambil_paket3()
	{
		$query = $this->db->query("SELECT * FROM tbl_paket  WHERE id_jenis_pengadaan = 3 AND id_metode_pemilihan != 10 AND id_metode_pemilihan != 9 AND id_metode_pemilihan != 8 AND id_metode_pemilihan != 6 AND id_metode_pemilihan != 4 AND status_soft_delete != 1 AND status_paket_tender = 2 ORDER BY tbl_paket.id_paket DESC");
		return $query->result_array();
	}

	public function hitung_paket4()
	{
		$query = $this->db->query("SELECT COUNT(id_paket) AS total_paket FROM tbl_paket WHERE id_jenis_pengadaan = 4 AND id_metode_pemilihan != 10 AND id_metode_pemilihan != 9 AND id_metode_pemilihan != 8 AND id_metode_pemilihan != 6 AND id_metode_pemilihan != 4 	AND status_paket_tender = 2 ORDER BY id_paket DESC");
		return $query->row_array();
	}

	public function ambil_paket4()
	{
		$query = $this->db->query("SELECT * FROM tbl_paket  WHERE id_jenis_pengadaan = 4 AND id_metode_pemilihan != 10 AND id_metode_pemilihan != 9 AND id_metode_pemilihan != 8 AND status_soft_delete != 1 AND id_metode_pemilihan != 6 AND id_metode_pemilihan != 4 AND status_paket_tender = 2 ORDER BY tbl_paket.id_paket DESC");
		return $query->result_array();
	}


	// //nontender
	// public function hitung_paket_nontender()
	// {
	// 	$query = $this->db->query("SELECT COUNT(id_paket) AS total_paket FROM tbl_paket WHERE id_jenis_pengadaan = 1 AND id_metode_pemilihan != 3 AND id_metode_pemilihan != 4 AND id_metode_pemilihan != 5 AND id_metode_pemilihan != 6 AND id_metode_pemilihan != 7 AND id_metode_pemilihan != 11 AND id_metode_pemilihan != 12 AND id_metode_pemilihan != 13 AND id_metode_pemilihan != 14 AND id_metode_pemilihan != 15 AND id_metode_pemilihan != 16 ");
	// 	return $query->row_array();
	// }

	// public function ambil_paket_nontender()
	// {
	// 	$query = $this->db->query("SELECT * FROM tbl_paket WHERE id_jenis_pengadaan = 1 AND id_metode_pemilihan != 3 AND id_metode_pemilihan != 4 AND id_metode_pemilihan != 5 AND id_metode_pemilihan != 6 AND id_metode_pemilihan != 7 AND id_metode_pemilihan != 11 AND id_metode_pemilihan != 12 AND id_metode_pemilihan != 13 AND id_metode_pemilihan != 14 AND id_metode_pemilihan != 15 AND id_metode_pemilihan != 16 ORDER BY id_paket DESC");
	// 	return $query->result_array();
	// }

	// public function hitung_paket2_nontender()
	// {
	// 	$query = $this->db->query("SELECT COUNT(id_paket) AS total_paket FROM tbl_paket WHERE id_jenis_pengadaan = 2  AND id_metode_pemilihan != 3 AND id_metode_pemilihan != 4 AND id_metode_pemilihan != 5 AND id_metode_pemilihan != 6 AND id_metode_pemilihan != 7 AND id_metode_pemilihan != 11 AND id_metode_pemilihan != 12 AND id_metode_pemilihan != 13 AND id_metode_pemilihan != 14 AND id_metode_pemilihan != 15 AND id_metode_pemilihan != 16");
	// 	return $query->row_array();
	// }

	// public function ambil_paket2_nontender()
	// {
	// 	$query = $this->db->query("SELECT * FROM tbl_paket WHERE id_jenis_pengadaan = 2  AND id_metode_pemilihan != 3 AND id_metode_pemilihan != 4 AND id_metode_pemilihan != 5 AND id_metode_pemilihan != 6 AND id_metode_pemilihan != 7 AND id_metode_pemilihan != 11 AND id_metode_pemilihan != 12 AND id_metode_pemilihan != 13 AND id_metode_pemilihan != 14 AND id_metode_pemilihan != 15 AND id_metode_pemilihan != 16 ORDER BY id_paket DESC");
	// 	return $query->result_array();
	// }

	// public function hitung_paket3_nontender()
	// {
	// 	$query = $this->db->query("SELECT COUNT(id_paket) AS total_paket FROM tbl_paket WHERE id_jenis_pengadaan = 3  AND id_metode_pemilihan != 3 AND id_metode_pemilihan != 4 AND id_metode_pemilihan != 5 AND id_metode_pemilihan != 6 AND id_metode_pemilihan != 7 AND id_metode_pemilihan != 11 AND id_metode_pemilihan != 12 AND id_metode_pemilihan != 13 AND id_metode_pemilihan != 14 AND id_metode_pemilihan != 15 AND id_metode_pemilihan != 16");
	// 	return $query->row_array();
	// }

	// public function ambil_paket3_nontender()
	// {
	// 	$query = $this->db->query("SELECT * FROM tbl_paket WHERE id_jenis_pengadaan = 3 AND id_metode_pemilihan != 3 AND id_metode_pemilihan != 4 AND id_metode_pemilihan != 5 AND id_metode_pemilihan != 6 AND id_metode_pemilihan != 7 AND id_metode_pemilihan != 11 AND id_metode_pemilihan != 12 AND id_metode_pemilihan != 13 AND id_metode_pemilihan != 14 AND id_metode_pemilihan != 15 AND id_metode_pemilihan != 16 ORDER BY id_paket DESC");
	// 	return $query->result_array();
	// }

	// public function hitung_paket4_nontender()
	// {
	// 	$query = $this->db->query("SELECT COUNT(id_paket) AS total_paket FROM tbl_paket WHERE id_jenis_pengadaan = 4 AND id_metode_pemilihan != 3 AND id_metode_pemilihan != 4 AND id_metode_pemilihan != 5 AND id_metode_pemilihan != 6 AND id_metode_pemilihan != 7 AND id_metode_pemilihan != 11 AND id_metode_pemilihan != 12 AND id_metode_pemilihan != 13 AND id_metode_pemilihan != 14 AND id_metode_pemilihan != 15 AND id_metode_pemilihan != 16 ");
	// 	return $query->row_array();
	// }

	// public function ambil_paket4_nontender()
	// {
	// 	$query = $this->db->query("SELECT * FROM tbl_paket AND id_jenis_pengadaan = 4 AND id_metode_pemilihan != 3 AND id_metode_pemilihan != 4 AND id_metode_pemilihan != 5 AND id_metode_pemilihan != 6 AND id_metode_pemilihan != 7 AND id_metode_pemilihan != 11 AND id_metode_pemilihan != 12 AND id_metode_pemilihan != 13 AND id_metode_pemilihan != 14 AND id_metode_pemilihan != 15 AND id_metode_pemilihan != 16  ORDER BY id_paket DESC");
	// 	return $query->result_array();
	// }

	// public function ambil_semua_paket()
	// {
	// 	$query = $this->db->query("SELECT * FROM tbl_paket LEFT JOIN tbl_jadwal_tender_detail ON tbl_paket.id_paket = tbl_jadwal_tender_detail.id_paket WHERE nama_jadwal_tender LIKE 'Pengumuman Prakualifikasi' OR nama_jadwal_tender LIKE 'Pengumuman Pascakualifikasi'");
	// 	return $query->result_array();
	// }

	// public function ambil_jadwal()
	// {
	// 	$query = $this->db->query("SELECT * FROM tbl_jadwal_tender_detail WHERE nama_jadwal_tender 
	// 								LIKE 'Pengumuman Prakualifikasi' OR nama_jadwal_tender LIKE 'Pengumuman Pascakualifikasi'");
	// 	return $query->result_array();
	// }

	var $table = 'tbl_paket';
	var $colum_order = array('id_paket', 'nama_paket');
	var $order = array('id_paket', 'kode_tender', 'nama_paket', 'nama_jenis_pengadaan', 'nama_metode_pemilihan', 'nama_jenis_anggaran', 'id_paket');

	// ini untuk admin
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
		$this->db->where('tbl_paket.status_soft_delete', 0);
		$this->db->where('tbl_paket.status_tahap_tender >=', 1);
		$this->db->where('tbl_paket.status_paket_tender >=', 1);
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
		if (isset($_POST['search']['value'])) {
			$this->db->like('nama_paket', $_POST['search']['value']);
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
	public function get_persyaratan($id_paket)
	{ {
			$this->db->select('*');
			$this->db->from('tbl_paket_sbu_detail');
			$this->db->join('tbl_sbu', 'tbl_paket_sbu_detail.id_sbu = tbl_sbu.id_sbu', 'left');
			$this->db->where('id_paket', $id_paket);
			$query = $this->db->get();
			return $query->result_array();
		}
	}
}
