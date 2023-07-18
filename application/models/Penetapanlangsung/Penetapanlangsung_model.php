<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penetapanlangsung_model extends CI_Model
{
	var $table = 'tbl_paket';
	var $colum_order = array('id_paket', 'nama_paket');
	var $order = array('id_paket', 'nama_paket');

	private function _get_data_query_paket_penetapan_langsung()
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
		$this->db->where('tbl_paket.status_soft_delete !=', 1);
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

	public function get_datatable() //nam[ilin data pake ini
	{
		$this->_get_data_query_paket_penetapan_langsung(); //ambil data dari get yg di atas
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_data_paket_penetapan_langsung()
	{
		$this->_get_data_query_paket_penetapan_langsung(); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data_paket_penetapan_langsung()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function get_kode_tender($text = null, $table = null, $field = null)
	{
		$this->db->select('kode_tender_random');
		$this->db->like($field, $text, 'after');
		$this->db->order_by($field, 'desc');
		$this->db->limit(1);
		return $this->db->get($table)->row_array()[$field];
	}


	private function _get_dokumen_pengadaan($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_penetapan_langsung_dokumen_pengadaan');
		$this->db->where('id_paket', $id_paket);

		if (isset($_POST['search']['value'])) {
			$this->db->like('nama_file_dokumen_pengadaan', $_POST['search']['value']);
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_dokumen_penetapan_langsung', 'DESC');
		}
	}

	public function get_datatable_dokumen_pengadaan($id_paket)
	{
		$this->_get_dokumen_pengadaan($id_paket); //ambil data dari get yg di atas
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function count_filtered_data_dokumen_pengadaan($id_paket)
	{
		$this->_get_dokumen_pengadaan($id_paket); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data_dokumen_pengadaan()
	{
		$this->db->from('tbl_penetapan_langsung_dokumen_pengadaan');
		return $this->db->count_all_results();
	}

	public function create_dokumen_penetapan_langsung($upload)
	{
		$this->db->insert('tbl_penetapan_langsung_dokumen_pengadaan', $upload);
		return $this->db->affected_rows();
	}

	public function by_id_dokumen_pengadaan_penetapan_langsung($id_dokumen_pengadaan_penetapan_langsung)
	{
		$this->db->select('*');
		$this->db->from('tbl_penetapan_langsung_dokumen_pengadaan');
		$this->db->where('id_dokumen_penetapan_langsung', $id_dokumen_pengadaan_penetapan_langsung);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function delete_dokumen_pengadaan($id_dokumen_pengadaan_penetapan_langsung)
	{
		$this->db->delete('tbl_penetapan_langsung_dokumen_pengadaan', ['id_dokumen_penetapan_langsung' => $id_dokumen_pengadaan_penetapan_langsung]);
	}

	public function result_data_jadwal()
	{
		$query = $this->db->query("SELECT * FROM tbl_penetapan_langsung_jadwal");
		return $query->result_array();
	}

	public function result_data_jadwal_detail($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_penetapan_langsung_jadwal_detail WHERE id_paket = $id_paket");
		return $query->result_array();
	}

	public function update_jadwal_penetapan_langsung($data, $where)
	{
		$this->db->where($where)
			->update('tbl_penetapan_langsung_jadwal_detail', $data);
		return $this->db->affected_rows();
	}

	public function get_paket_data_vendor_pemenang($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor_mengikuti_paket');
		$this->db->join('tbl_paket', 'tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor = tbl_paket.id_paket', 'left');
		$this->db->join('tbl_unit_kerja', 'tbl_unit_kerja.id_unit_kerja = tbl_paket.id_unit_kerja', 'left');
		$this->db->join('tbl_panitia', 'tbl_panitia.id_panitia = tbl_paket.id_panitia', 'left');
		$this->db->join('tbl_jenis_anggaran', 'tbl_jenis_anggaran.id_jenis_anggaran = tbl_paket.id_jenis_anggaran', 'left');
		$this->db->join('tbl_jenis_pengadaan', 'tbl_jenis_pengadaan.id_jenis_pengadaan = tbl_paket.id_jenis_pengadaan', 'left');
		$this->db->join('tbl_metode_pemilihan', 'tbl_metode_pemilihan.id_metode_pemilihan = tbl_paket.id_metode_pemilihan', 'left');
		$this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_mengikuti_vendor = tbl_vendor.id_vendor', 'left');
		$this->db->join('tbl_vendor_identitas_prusahaan', 'tbl_vendor.id_vendor = tbl_vendor_identitas_prusahaan.id_vendor', 'left');
		$this->db->join('tbl_provinsi', 'tbl_vendor_identitas_prusahaan.id_provinsi = tbl_provinsi.id_provinsi', 'left');
		$this->db->join('tbl_kabupaten', 'tbl_vendor_identitas_prusahaan.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
		$this->db->where('tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', $id_paket);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function update_negosiasi($data, $where)
	{
		$this->db->where($where)
			->update('tbl_vendor_mengikuti_paket', $data);
		return $this->db->affected_rows();
	}

	public function save_perysaratan_penetapan_langsung($data)
	{
		$this->db->insert('tbl_persyaratan_penetapan_langsung', $data);
		return $this->db->affected_rows();
	}

	private function _get_data_query_persyaratan_penetapan_langsung($id_paket)
	{
		$this->db->from('tbl_persyaratan_penetapan_langsung');
		$this->db->where('id_paket', $id_paket);
		if (isset($_POST['search']['value'])) {
			$this->db->like('nama_persyaratan_penetapan_langsung', $_POST['search']['value']);
			// $this->db->or_like('data_kerja', $_POST['search']['value']);
			// $this->db->or_like('jabatan', $_POST['search']['value']);
			// $this->db->or_like('status', $_POST['search']['value']);
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_persyaratan_penetapan_langsung', 'DESC');
		}
	}

	public function getdatatable_persyaratan_penetapan_langsung($id_paket) //nam[ilin data pake ini
	{
		$this->_get_data_query_persyaratan_penetapan_langsung($id_paket); //ambil data dari get yg di atas
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_all_data_persyaratan_penetapan_langsung($id_paket)
	{
		$this->_get_data_query_persyaratan_penetapan_langsung($id_paket); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_filtered_data_persyaratan_penetapan_langsung()
	{
		$this->db->from('tbl_persyaratan_penetapan_langsung');
		return $this->db->count_all_results();
	}

	public function getByidpersyaratan_penetapan_langsung($id_persyaratan_penetapan_langsung)
	{
		return $this->db->get_where('tbl_persyaratan_penetapan_langsung', ['id_persyaratan_penetapan_langsung' => $id_persyaratan_penetapan_langsung])->row();
	}

	public function edit_persyaratan_penetapan_langsung($data, $id_persyaratan_penetapan_langsung)
	{
		$this->db->where('id_persyaratan_penetapan_langsung', $id_persyaratan_penetapan_langsung);
		$this->db->update('tbl_persyaratan_penetapan_langsung', $data);
		return $this->db->affected_rows();
	}

	public function update_ke_paket($data, $where)
	{
		$this->db->where('id_paket', $where);
		$this->db->update('tbl_paket', $data);
		return $this->db->affected_rows();
	}

	public function deletepersyaratan_penetapan_langsung($id_persyaratan_penetapan_langsung)
	{
		$this->db->delete('tbl_persyaratan_penetapan_langsung', ['id_persyaratan_penetapan_langsung' => $id_persyaratan_penetapan_langsung]);
		return $this->db->affected_rows();
	}

	public function get_persyaratan($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_persyaratan_penetapan_langsung WHERE id_paket = $id_paket");
		return $query->result_array();
	}

	public function vendor_terpilih_row($id_paket)
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

	private function _get_data_Dokumen_persyaratan_penetapan_langsung($id_paket)
	{
		$this->db->from('tbl_vendor_dokumen_persyaratan_penetapan_langsung');
		$this->db->where('id_paket', $id_paket);
		if (isset($_POST['search']['value'])) {
			$this->db->like('nama_persyaratan_penetapan_langsung', $_POST['search']['value']);
			// $this->db->or_like('data_kerja', $_POST['search']['value']);
			// $this->db->or_like('jabatan', $_POST['search']['value']);
			// $this->db->or_like('status', $_POST['search']['value']);
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_vendor_dokumen_persyaratan_penetapan_langsung', 'DESC');
		}
	}

	public function getDokumen_persyaratan_penetapan_langsung($id_paket) //nam[ilin data pake ini
	{
		$this->_get_data_Dokumen_persyaratan_penetapan_langsung($id_paket); //ambil data dari get yg di atas
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_all_data_Dokumen_persyaratan_penetapan_langsung($id_paket)
	{
		$this->_get_data_query_persyaratan_penetapan_langsung($id_paket); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_filtered_data_Dokumen_persyaratan_penetapan_langsung()
	{
		$this->db->from('tbl_vendor_dokumen_persyaratan_penetapan_langsung');
		return $this->db->count_all_results();
	}

	public function get_id_dokumen_uploaded($id_vendor_dokumen_persyaratan_penetapan_langsung)
	{
		return $this->db->get_where('tbl_vendor_dokumen_persyaratan_penetapan_langsung', ['id_vendor_dokumen_persyaratan_penetapan_langsung' => $id_vendor_dokumen_persyaratan_penetapan_langsung])->row();
	}

	public function approve_dokumen_persyaratan($data, $id_vendor_dokumen_persyaratan_penetapan_langsung)
	{
		$this->db->where('id_vendor_dokumen_persyaratan_penetapan_langsung', $id_vendor_dokumen_persyaratan_penetapan_langsung);
		$this->db->update('tbl_vendor_dokumen_persyaratan_penetapan_langsung', $data);
		return $this->db->affected_rows();
	}

	public function dokumen_pengadaan($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_penetapan_langsung_dokumen_pengadaan');
		$this->db->where('id_paket', $id_paket);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function persyaratan_penetapan_langsung($id_paket)
	{
		$this->db->from('tbl_persyaratan_penetapan_langsung');
		$this->db->where('id_paket', $id_paket);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function persyaratan_terpenuhi($id_paket)
	{
		$this->db->from('tbl_vendor_dokumen_persyaratan_penetapan_langsung');
		$this->db->where('id_paket', $id_paket);
		$query = $this->db->get();
		return $query->result_array();
	}
}
