<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Chat_negosiasi_model extends CI_Model
{

	public function getPesan($id_paket)
	{
		$this->db->from('tbl_pesan_transaksi_langsung');
		$this->db->join('tbl_vendor', 'tbl_pesan_transaksi_langsung.id_pengirim = tbl_vendor.id_vendor', 'left');
		$this->db->join('tbl_pegawai', 'tbl_pesan_transaksi_langsung.id_pengirim = tbl_pegawai.id_pegawai', 'left');
		$this->db->where('id_paket', $id_paket);
		$r = $this->db->get();
		return $r->result();
	}
	public function tambah_chat($in)
	{
		$this->db->insert('tbl_pesan_transaksi_langsung', $in);
	}

	public function getDataById_transaksi_langsung_chat($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor_mengikuti_paket');
		$this->db->join('tbl_vendor', 'tbl_vendor.id_vendor = tbl_vendor_mengikuti_paket.id_mengikuti_vendor', 'left');
		$this->db->join('tbl_paket', 'tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', 'left');
		$this->db->where('tbl_paket.status_tahap_tender', 1);
		$this->db->where('status_mengikuti_paket', 1);
		$this->db->where('status_penetapan_langsung', 1);
		$this->db->where('tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', $id_paket);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function getDataById_transaksi_langsung_chat_2($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor_mengikuti_paket');
		$this->db->join('tbl_vendor', 'tbl_vendor.id_vendor = tbl_vendor_mengikuti_paket.id_mengikuti_vendor', 'left');
		$this->db->join('tbl_paket', 'tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', 'left');
		$this->db->where('tbl_paket.status_tahap_tender', 1);
		$this->db->where('status_mengikuti_paket', 1);
		$this->db->where('status_transaksi_langsung', 1);
		$this->db->where('tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', $id_paket);
		$query = $this->db->get();
		return $query->row_array();
	}
	public function GetAllVendor_transaksi_langsung($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor_mengikuti_paket');
		$this->db->join('tbl_vendor', 'tbl_vendor.id_vendor = tbl_vendor_mengikuti_paket.id_mengikuti_vendor', 'left');
		$this->db->join('tbl_paket', 'tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', 'left');
		$this->db->where('status_mengikuti_paket', 1);
		$this->db->where('status_transaksi_langsung', 1);
		$this->db->where('id_mengikuti_paket_vendor', $id_paket);
		return $this->db->get()->result_array();
	}

	public function getDataById_penetapan_langsung_chat($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor_mengikuti_paket');
		$this->db->join('tbl_vendor', 'tbl_vendor.id_vendor = tbl_vendor_mengikuti_paket.id_mengikuti_vendor', 'left');
		$this->db->join('tbl_paket', 'tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', 'left');
		$this->db->where('tbl_paket.status_tahap_tender', 1);
		$this->db->where('status_mengikuti_paket', 1);
		$this->db->where('status_penetapan_langsung', 1);
		$this->db->where('tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', $id_paket);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function GetAllVendor_penetapan_langsung($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor_mengikuti_paket');
		$this->db->join('tbl_vendor', 'tbl_vendor.id_vendor = tbl_vendor_mengikuti_paket.id_mengikuti_vendor', 'left');
		$this->db->join('tbl_paket', 'tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', 'left');
		$this->db->where('status_mengikuti_paket', 1);
		$this->db->where('status_penetapan_langsung', 1);
		$this->db->where('id_mengikuti_paket_vendor', $id_paket);
		return $this->db->get()->result_array();
	}

	// public function GetAllVendor_pesan_baru($id_paket)
	// {
	//    $this->db->select('*');
	//    $this->db->from('tbl_vendor_mengikuti_paket');
	//    $this->db->join('tbl_vendor', 'tbl_vendor.id_vendor = tbl_vendor_mengikuti_paket.id_mengikuti_vendor', 'left');
	//    $this->db->join('tbl_paket', 'tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', 'left');
	//    $this->db->join('tbl_pesan_transaksi_langsung', 'tbl_pesan_transaksi_langsung.id_pengirim = tbl_vendor_mengikuti_paket.id_mengikuti_vendor', 'left');
	//    $this->db->where('is_read', 2);
	//    $this->db->where('status_mengikuti_paket', 1);
	//    $this->db->where('tbl_pesan_transaksi_langsung.id_paket', $id_paket);
	//    $this->db->order_by('id_pesan', 'DESC');
	//    return $this->db->get()->result_array();
	// }

	public function get_byid_panitia($id_paket, $role)
	{
		$this->db->select('*');
		$this->db->from('tbl_paket');
		$this->db->join('tbl_unit_kerja', 'id_unit_kerja', 'left');
		$this->db->join('tbl_panitia', 'id_panitia', 'left');
		$this->db->join('tbl_detail_panitia', 'id_panitia', 'left');
		$this->db->join('tbl_jenis_pengadaan', 'id_jenis_pengadaan', 'left');
		$this->db->join('tbl_metode_pemilihan', 'tbl_paket.id_metode_pemilihan = tbl_metode_pemilihan.id_metode_pemilihan', 'left');
		$this->db->join('tbl_pegawai', 'tbl_paket.id_pegawai = tbl_pegawai.id_pegawai', 'left');
		$this->db->where('tbl_paket.id_paket', $id_paket);
		$this->db->where('tbl_pegawai.id_pegawai', $role);
		$query = $this->db->get();
		return $query->row_array();
	}
	// notofication
	public function total_notif($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_pesan_transaksi_langsung');
		$this->db->where('is_read', 1);
		$this->db->where('id_paket', $id_paket);
		return $this->db->count_all_results();
	}

	public function update_sudah_dibaca2($where, $data)
	{
		$this->db->update('tbl_pesan_transaksi_langsung', $data, $where);
		return $this->db->affected_rows();
	}
}
