<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Chat_model extends CI_Model
{

   public function getPesan($id_paket)
   {
      $this->db->from('tbl_pesan');
      $this->db->join('tbl_vendor', 'tbl_pesan.id_pengirim = tbl_vendor.id_vendor', 'left');
      $this->db->join('tbl_pegawai', 'tbl_pesan.id_pengirim = tbl_pegawai.id_pegawai', 'left');
      $this->db->where('id_paket', $id_paket);
      $r = $this->db->get();
      return $r->result();
   }
   public function tambah_chat($in)
   {
      $this->db->insert('tbl_pesan', $in);
   }

   public function getDataById($id_paket)
   {
      $this->db->select('*');
      $this->db->from('tbl_vendor_mengikuti_paket');
      $this->db->join('tbl_vendor', 'tbl_vendor.id_vendor = tbl_vendor_mengikuti_paket.id_mengikuti_vendor', 'left');
      $this->db->join('tbl_paket', 'tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', 'left');
      $this->db->where('tbl_paket.status_tahap_tender', 2);
      $this->db->where('status_mengikuti_paket', 1);
      $this->db->where('tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', $id_paket);
      $query = $this->db->get();
      return $query->row_array();
   }

   public function getDataById_transaksi_langsung_chat($id_paket)
   {
      $this->db->select('*');
      $this->db->from('tbl_vendor_mengikuti_paket');
      $this->db->join('tbl_vendor', 'tbl_vendor.id_vendor = tbl_vendor_mengikuti_paket.id_mengikuti_vendor', 'left');
      $this->db->join('tbl_paket', 'tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', 'left');
      $this->db->where('tbl_paket.status_tahap_tender', 1);
      $this->db->where('status_mengikuti_paket', 1);
      $this->db->where('tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', $id_paket);
      $query = $this->db->get();
      return $query->row_array();
   }

   public function GetAllVendor($id_paket)
   {
      $this->db->select('*');
      $this->db->from('tbl_vendor_mengikuti_paket');
      $this->db->join('tbl_vendor', 'tbl_vendor.id_vendor = tbl_vendor_mengikuti_paket.id_mengikuti_vendor', 'left');
      $this->db->join('tbl_paket', 'tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', 'left');
      $this->db->where('tbl_paket.status_tahap_tender', 2);
      $this->db->where('status_mengikuti_paket', 1);
      $this->db->where('id_mengikuti_paket_vendor', $id_paket);
      return $this->db->get()->result_array();
   }

   public function GetAllVendor_pesan_baru($id_paket)
   {
      $this->db->select('*');
      $this->db->from('tbl_vendor_mengikuti_paket');
      $this->db->join('tbl_vendor', 'tbl_vendor.id_vendor = tbl_vendor_mengikuti_paket.id_mengikuti_vendor', 'left');
      $this->db->join('tbl_paket', 'tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', 'left');
      $this->db->join('tbl_pesan', 'tbl_pesan.id_pengirim = tbl_vendor_mengikuti_paket.id_mengikuti_vendor', 'left');
      $this->db->where('tbl_paket.status_tahap_tender', 2);
      $this->db->where('is_read', 2);
      $this->db->where('status_mengikuti_paket', 1);
      $this->db->where('tbl_pesan.id_paket', $id_paket);
      $this->db->order_by('id_pesan', 'DESC');
      return $this->db->get()->result_array();
   }

   public function get_byid_panitia($id_paket, $role)
   {
      $this->db->select('*');
      $this->db->from('tbl_paket');
      $this->db->join('tbl_unit_kerja', 'id_unit_kerja', 'left');
      $this->db->join('tbl_panitia', 'id_panitia', 'left');
      $this->db->join('tbl_detail_panitia', 'id_panitia', 'left');
      $this->db->join('tbl_jenis_pengadaan', 'id_jenis_pengadaan', 'left');
      $this->db->join('tbl_metode_pemilihan', 'tbl_paket.id_metode_pemilihan = tbl_metode_pemilihan.id_metode_pemilihan', 'left');
      $this->db->join('tbl_pegawai', 'tbl_paket.id_pegawai = tbl_detail_panitia.id_pegawai2', 'left');
      $this->db->where('tbl_paket.id_paket', $id_paket);
      $this->db->where('tbl_detail_panitia.id_pegawai2', $role);
      $query = $this->db->get();
      return $query->row_array();
   }
   // notofication
   public function total_notif($id_paket)
   {
      $this->db->select('*');
      $this->db->from('tbl_pesan');
      $this->db->where('is_read', 1);
      $this->db->where('id_paket', $id_paket);
      return $this->db->count_all_results();
   }

   // public function belum_dibaca($id_pengirim, $id_penerima, $id_paket)
   // {
   //    $this->db->from('tbl_pesan');
   //    $this->db->where(
   //       'id_pengirim= ' . $id_pengirim . ' 
   //    and id_penerima=' . $id_penerima . ' 
   //    and id_paket=' . $id_paket
   //    );
   //    return $this->db->get()->result_array();
   // }

   // public function update_sudah_dibaca($where, $data)
   // {
   //    $this->db->update('tbl_pesan', $data, $where);
   //    return $this->db->affected_rows();
   // }

   public function update_sudah_dibaca2($where, $data)
   {
      $this->db->update('tbl_pesan', $data, $where);
      return $this->db->affected_rows();
   }


   // INI UNTUK BAGIAN NEGOSIASI HARGANYA
   public function getPesan_negosiasi_tender($id_paket)
   {
      $this->db->from('tbl_negosiasi_tender');
      $this->db->join('tbl_vendor', 'tbl_negosiasi_tender.id_pengirim = tbl_vendor.id_vendor', 'left');
      $this->db->join('tbl_pegawai', 'tbl_negosiasi_tender.id_pengirim = tbl_pegawai.id_pegawai', 'left');
      $this->db->where('id_paket', $id_paket);
      $r = $this->db->get();
      return $r->result();
   }
   public function tambah_chat_negosiasi_tender($in)
   {
      $this->db->insert('tbl_negosiasi_tender', $in);
   }


   public function getDataById_negosiasi_tender($id_paket)
   {
      $this->db->select('*');
      $this->db->from('tbl_vendor_mengikuti_paket');
      $this->db->join('tbl_vendor', 'tbl_vendor.id_vendor = tbl_vendor_mengikuti_paket.id_mengikuti_vendor', 'left');
      $this->db->join('tbl_paket', 'tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', 'left');
      $this->db->where('status_mengikuti_paket', 1);
      $this->db->where('tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', $id_paket);
      $query = $this->db->get();
      return $query->row_array();
   }

   public function GetAllVendor_negosiasi_tender($id_paket)
   {
      $this->db->select('*');
      $this->db->from('tbl_vendor_mengikuti_paket');
      $this->db->join('tbl_vendor', 'tbl_vendor.id_vendor = tbl_vendor_mengikuti_paket.id_mengikuti_vendor', 'left');
      $this->db->join('tbl_paket', 'tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', 'left');
      $this->db->where('tbl_paket.status_tahap_tender', 2);
      $this->db->where('status_mengikuti_paket', 1);
      $this->db->where('id_mengikuti_paket_vendor', $id_paket);
      return $this->db->get()->result_array();
   }

   public function GetAllVendor_pesan_baru_negosiasi_tender($id_paket)
   {
      $this->db->select('*');
      $this->db->from('tbl_vendor_mengikuti_paket');
      $this->db->join('tbl_vendor', 'tbl_vendor.id_vendor = tbl_vendor_mengikuti_paket.id_mengikuti_vendor', 'left');
      $this->db->join('tbl_paket', 'tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', 'left');
      $this->db->join('tbl_negosiasi_tender', 'tbl_negosiasi_tender.id_pengirim = tbl_vendor_mengikuti_paket.id_mengikuti_vendor', 'left');
      $this->db->where('tbl_paket.status_tahap_tender', 2);
      $this->db->where('is_read', 2);
      $this->db->where('status_mengikuti_paket', 1);
      $this->db->where('tbl_negosiasi_tender.id_paket', $id_paket);
      $this->db->order_by('id_pesan', 'DESC');
      return $this->db->get()->result_array();
   }

   public function get_byid_panitia_negosiasi_tender($id_paket, $role)
   {
      $this->db->select('*');
      $this->db->from('tbl_paket');
      $this->db->join('tbl_unit_kerja', 'id_unit_kerja', 'left');
      $this->db->join('tbl_panitia', 'id_panitia', 'left');
      $this->db->join('tbl_detail_panitia', 'id_panitia', 'left');
      $this->db->join('tbl_jenis_pengadaan', 'id_jenis_pengadaan', 'left');
      $this->db->join('tbl_metode_pemilihan', 'tbl_paket.id_metode_pemilihan = tbl_metode_pemilihan.id_metode_pemilihan', 'left');
      $this->db->join('tbl_pegawai', 'tbl_paket.id_pegawai = tbl_detail_panitia.id_pegawai2', 'left');
      $this->db->where('tbl_paket.id_paket', $id_paket);
      $this->db->where('tbl_detail_panitia.id_pegawai2', $role);
      $query = $this->db->get();
      return $query->row_array();
   }

   // notofication negosiasi
   public function total_notif_negosiasi_tender($id_paket)
   {
      $this->db->select('*');
      $this->db->from('tbl_negosiasi_tender');
      $this->db->where('is_read', 1);
      $this->db->where('id_paket', $id_paket);
      return $this->db->count_all_results();
   }

   public function update_sudah_dibaca2_negosiasi_tender($where, $data)
   {
      $this->db->update('tbl_negosiasi_tender', $data, $where);
      return $this->db->affected_rows();
   }

   // notofication Snggahan Prakualifikasi
   public function total_notif_sanggahan_prakualifikasi($id_paket)
   {
      $this->db->select('*');
      $this->db->from('tbl_dokumen_sanggahan_prakualifikasi');
      $this->db->where('is_read', 1);
      $this->db->where('id_paket', $id_paket);
      return $this->db->count_all_results();
   }
   public function update_sudah_dibaca_sanggahan_prakuaifikasi($where, $data)
   {
      $this->db->update('tbl_dokumen_sanggahan_prakualifikasi', $data, $where);
      return $this->db->affected_rows();
   }

   // notofication Snggahan Akhir
   public function total_notif_sanggahan_akhir($id_paket)
   {
      $this->db->select('*');
      $this->db->from('tbl_dokumen_sanggahan_akhir');
      $this->db->where('is_read', 1);
      $this->db->where('id_paket', $id_paket);
      return $this->db->count_all_results();
   }
   public function update_sudah_dibaca_sanggahan_akhir($where, $data)
   {
      $this->db->update('tbl_dokumen_sanggahan_akhir', $data, $where);
      return $this->db->affected_rows();
   }

   // INI UNTUK AUCTION
   public function GetAllVendorAuction($id_paket)
   {
      $this->db->select('*');
      $this->db->from('tbl_vendor_mengikuti_paket');
      $this->db->join('tbl_vendor', 'tbl_vendor.id_vendor = tbl_vendor_mengikuti_paket.id_mengikuti_vendor', 'left');
      $this->db->join('tbl_paket', 'tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', 'left');
      $this->db->where('tbl_paket.status_tahap_tender', 2);
      $this->db->where('status_mengikuti_paket', 1);
      $this->db->where('id_mengikuti_paket_vendor', $id_paket);
      return $this->db->get()->result_array();
   }

   public function GetRowVendorAuction($id_vendor, $id_paket)
   {
      $this->db->select('*');
      $this->db->from('tbl_vendor_mengikuti_paket');
      $this->db->join('tbl_vendor', 'tbl_vendor.id_vendor = tbl_vendor_mengikuti_paket.id_mengikuti_vendor', 'left');
      $this->db->join('tbl_paket', 'tbl_paket.id_paket = tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', 'left');
      $this->db->where('tbl_paket.status_tahap_tender', 2);
      $this->db->where('status_mengikuti_paket', 1);
      $this->db->where('id_mengikuti_vendor', $id_vendor);
      $this->db->where('id_mengikuti_paket_vendor', $id_paket);
      return $this->db->get()->row_array();
   }
   public function tambah_chat_auction($data)
   {
      $this->db->insert('tbl_chat_auction', $data);
   }
   public function getPesanAuction($id_user, $id_lawan, $id_paket, $tahap_binding)
   {
      $this->db->from('tbl_chat_auction');
      $this->db->join('tbl_vendor', 'tbl_chat_auction.id_pengirim = tbl_vendor.id_vendor', 'left');
      $this->db->join('tbl_pegawai', 'tbl_chat_auction.id_pengirim = tbl_pegawai.id_pegawai', 'left');
      $this->db->where('tbl_chat_auction.id_paket', $id_paket);
      $this->db->where('id_pengirim= ' . $id_user . ' 
      and id_penerima=' . $id_lawan . ' and tahap_binding=' . $tahap_binding . ' 
      or id_pengirim= ' . $id_lawan . ' 
      and id_penerima=' . $id_user . ' and tahap_binding=' . $tahap_binding);
      $r = $this->db->get();
      return $r->result();
   }
   function update_binding_vendor($where, $data)
   {
      $this->db->update('tbl_vendor_mengikuti_paket', $data, $where);
      return $this->db->affected_rows();
   }

   function update_paket($where, $data)
   {
      $this->db->update('tbl_paket', $data, $where);
      return $this->db->affected_rows();
   }

   public function row_paket($id_paket)
   {
      $this->db->select('*');
      $this->db->from('tbl_paket');
      $this->db->where('id_paket', $id_paket);
      return $this->db->get()->row_array();
   }

   
   public function ambil_vendor1($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor_mengikuti_paket');
		$this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_mengikuti_vendor = tbl_vendor.id_vendor', 'left');
		$this->db->join('tbl_vendor_identitas_prusahaan', 'tbl_vendor.id_vendor = tbl_vendor_identitas_prusahaan.id_vendor', 'left');
		$this->db->join('tbl_provinsi', 'tbl_vendor_identitas_prusahaan.id_provinsi = tbl_provinsi.id_provinsi', 'left');
		$this->db->join('tbl_kabupaten', 'tbl_vendor_identitas_prusahaan.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
		$this->db->where('tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', $id_paket);
		$this->db->group_by('tbl_vendor_mengikuti_paket.id_mengikuti_vendor');
      $this->db->order_by('harga_penawaran_binding_1','ASC');
		$query = $this->db->get();
		return $query->result();
	}

   public function ambil_vendor2($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor_mengikuti_paket');
		$this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_mengikuti_vendor = tbl_vendor.id_vendor', 'left');
		$this->db->join('tbl_vendor_identitas_prusahaan', 'tbl_vendor.id_vendor = tbl_vendor_identitas_prusahaan.id_vendor', 'left');
		$this->db->join('tbl_provinsi', 'tbl_vendor_identitas_prusahaan.id_provinsi = tbl_provinsi.id_provinsi', 'left');
		$this->db->join('tbl_kabupaten', 'tbl_vendor_identitas_prusahaan.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
		$this->db->where('tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', $id_paket);
		$this->db->group_by('tbl_vendor_mengikuti_paket.id_mengikuti_vendor');
      $this->db->order_by('harga_penawaran_binding_2','ASC');
		$query = $this->db->get();
		return $query->result();
	}

   public function ambil_vendor3($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor_mengikuti_paket');
		$this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_mengikuti_vendor = tbl_vendor.id_vendor', 'left');
		$this->db->join('tbl_vendor_identitas_prusahaan', 'tbl_vendor.id_vendor = tbl_vendor_identitas_prusahaan.id_vendor', 'left');
		$this->db->join('tbl_provinsi', 'tbl_vendor_identitas_prusahaan.id_provinsi = tbl_provinsi.id_provinsi', 'left');
		$this->db->join('tbl_kabupaten', 'tbl_vendor_identitas_prusahaan.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
		$this->db->where('tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', $id_paket);
		$this->db->group_by('tbl_vendor_mengikuti_paket.id_mengikuti_vendor');
      $this->db->order_by('harga_penawaran_binding_3','ASC');
		$query = $this->db->get();
		return $query->result();
	}
}
