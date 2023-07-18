<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Evaluasi_administrasi_model extends CI_Model
{

   // INI UNTUK EVALUASI TENDER

   private function _get_data_query_evaluasi_administrasi($id_paket)
   {
      $this->db->select('*');
      $this->db->from('tbl_persyaratan_tender');
      $this->db->where('tbl_persyaratan_tender.nama_persyaratan', 'Dokumen Lengkap');
      $this->db->where('tbl_persyaratan_tender.id_paket', $id_paket);
      if (isset($_POST['search']['value'])) {
         $this->db->like('nama_persyaratan', $_POST['search']['value']);
      }
      if (isset($_POST['order'])) {
         $this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
      } else {
         $this->db->order_by('id_persyaratan_tender', 'DESC');
      }
   }

   public function getdatatable_evaluasi_administrasi($id_paket) //nam[ilin data pake ini
   {
      $this->_get_data_query_evaluasi_administrasi($id_paket); //ambil data dari get yg di atas
      if ($_POST['length'] != -1) {
         $this->db->limit($_POST['length'], $_POST['start']);
      }
      $query = $this->db->get();
      return $query->result();
   }
   public function count_filtered_data_evaluasi_tender($id_paket)
   {
      $this->_get_data_query_evaluasi_administrasi($id_paket); //ambil data dari get yg di atas
      $query = $this->db->get();
      return $query->num_rows();
   }

   public function count_all_data_evaluasi_tender()
   {
      $this->db->from('tbl_persyaratan_tender');
      return $this->db->count_all_results();
   }

   // tampil dokumen revisi dari vendor
   private function _get_data_query_evaluasi_klarifikasi_administrasi($id_penawaran_teknis, $id_vendor, $id_paket)
   {
      $this->db->select('*');
      $this->db->from('trx_klarifikasi_dokumen_administrasi');
      $this->db->join('tbl_penawaran_teknis', 'tbl_penawaran_teknis.id_penawaran_teknis = trx_klarifikasi_dokumen_administrasi.id_penawaran_teknis_administrasi', 'left');
      $this->db->where('trx_klarifikasi_dokumen_administrasi.id_paket_klarifikasi', $id_paket);
      $this->db->where('trx_klarifikasi_dokumen_administrasi.id_penawaran_teknis_administrasi', $id_penawaran_teknis);
      $this->db->where('trx_klarifikasi_dokumen_administrasi.id_vendor_klarifikasi', $id_vendor);
      $this->db->where('trx_klarifikasi_dokumen_administrasi.status_klarifikasi', 1);
      if (isset($_POST['search']['value'])) {
         $this->db->like('jenis_klarifikasi', $_POST['search']['value']);
      }
      if (isset($_POST['order'])) {
         $this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
      } else {
         $this->db->order_by('id_penawaran_teknis_administrasi', 'DESC');
      }
   }

   public function getdatatable_evaluasi_klarifikasi_administrasi($id_penawaran_teknis, $id_vendor, $id_paket) //nam[ilin data pake ini
   {
      $this->_get_data_query_evaluasi_klarifikasi_administrasi($id_penawaran_teknis, $id_vendor, $id_paket); //ambil data dari get yg di atas
      if ($_POST['length'] != -1) {
         $this->db->limit($_POST['length'], $_POST['start']);
      }
      $query = $this->db->get();
      return $query->result();
   }
   public function count_filtered__klarifikasi_administrasi_vendor($id_penawaran_teknis, $id_vendor, $id_paket)
   {
      $this->_get_data_query_evaluasi_klarifikasi_administrasi($id_penawaran_teknis, $id_vendor, $id_paket); //ambil data dari get yg di atas
      $query = $this->db->get();
      return $query->num_rows();
   }

   public function count_all_data_klarifikasi_administrasi_vendor()
   {
      $this->db->from('trx_klarifikasi_dokumen_administrasi');
      return $this->db->count_all_results();
   }


   public function get_penawaran_administrasi_by_id($id_penawaran_teknis, $id_paket)
   {
      $this->db->select('*');
      $this->db->from('tbl_penawaran_teknis');
      $this->db->where('kategori', 'Administrasi');
      $this->db->where('status_checked', 1);
      $this->db->where('tbl_penawaran_teknis.id_paket', $id_paket);
      $this->db->where('id_penawaran_teknis', $id_penawaran_teknis);
      $data = $this->db->get();
      return $data->row_array();
   }
   public function get_penawaran_administrasi_klarifikasi_by_id($id_penawaran_teknis, $id_vendor, $id_paket)
   {
      $this->db->select('*');
      $this->db->from('trx_klarifikasi_dokumen_administrasi');
      $this->db->join('tbl_penawaran_teknis', 'tbl_penawaran_teknis.id_penawaran_teknis = trx_klarifikasi_dokumen_administrasi.id_penawaran_teknis_administrasi', 'left');
      $this->db->where('trx_klarifikasi_dokumen_administrasi.id_paket_klarifikasi', $id_paket);
      $this->db->where('trx_klarifikasi_dokumen_administrasi.id_penawaran_teknis_administrasi', $id_penawaran_teknis);
      $this->db->where('trx_klarifikasi_dokumen_administrasi.id_vendor_klarifikasi', $id_vendor);
      $data = $this->db->get();
      return $data->row_array();
   }
   public function get_penawaran_administrasi_klarifikasi_table_kosong($id_penawaran_teknis, $id_vendor, $id_paket)
   {
      $this->db->select('*');
      $this->db->from('trx_klarifikasi_dokumen_administrasi');
      $this->db->join('tbl_penawaran_teknis', 'tbl_penawaran_teknis.id_penawaran_teknis = trx_klarifikasi_dokumen_administrasi.id_penawaran_teknis_administrasi', 'left');
      $this->db->where('trx_klarifikasi_dokumen_administrasi.id_paket_klarifikasi', $id_paket);
      $this->db->where('trx_klarifikasi_dokumen_administrasi.id_penawaran_teknis_administrasi', $id_penawaran_teknis);
      $this->db->where('trx_klarifikasi_dokumen_administrasi.id_vendor_klarifikasi', $id_vendor);
      $data = $this->db->get();
      return $data->result_array();
   }


   // SETUJUI PERSYARTAAN ADMINISTARSI

   public function setujui_persyaratan_administrasi($data)
   {
      $this->db->insert('trx_klarifikasi_dokumen_administrasi', $data);
      return $this->db->affected_rows();
   }
   public function update_setujui_persyaratan_administrasi($where, $data)
   {
      $this->db->update('trx_klarifikasi_dokumen_administrasi', $data, $where);
      return $this->db->affected_rows();
   }

   public function hitung_seluruh_persyaratan_administrasi($id_paket)
   {
      $this->db->select('*');
      $this->db->from('tbl_penawaran_teknis');
      $this->db->where('kategori', 'Administrasi');
      $this->db->where('status_checked', 1);
      $this->db->where('tbl_penawaran_teknis.id_paket', $id_paket);
      return $this->db->count_all_results();
   }
   public function hitung_seluruh_nilai_administrasi($id_vendor, $id_paket)
   {
      $this->db->select('*');
      $this->db->from('trx_klarifikasi_dokumen_administrasi');
      $this->db->where('trx_klarifikasi_dokumen_administrasi.id_paket_klarifikasi', $id_paket);
      $this->db->where('trx_klarifikasi_dokumen_administrasi.id_vendor_klarifikasi', $id_vendor);
      $this->db->where('trx_klarifikasi_dokumen_administrasi.status_kelulusan', 1);
      return $this->db->count_all_results();
   }
   public function update_vendor_mengikuti_paket($where, $data)
   {
      $this->db->update('tbl_vendor_mengikuti_paket', $data, $where);
      return $this->db->affected_rows();
   }
   public function lihat_nilai_administarsi($id_vendor, $id_paket)
   {
      $this->db->select('*');
      $this->db->from('trx_klarifikasi_dokumen_administrasi');
      $this->db->where('trx_klarifikasi_dokumen_administrasi.id_paket_klarifikasi', $id_paket);
      $this->db->where('trx_klarifikasi_dokumen_administrasi.id_vendor_klarifikasi', $id_vendor);
      $data = $this->db->get();
      return $data->row_array();
   }

   // table Lihat Administarsi
   private function _get_data_query_table_lihat_nilai_administrasi($id_vendor, $id_paket)
   {
      $this->db->select('*');
      $this->db->from('trx_klarifikasi_dokumen_administrasi');
      $this->db->join('tbl_penawaran_teknis', 'tbl_penawaran_teknis.id_penawaran_teknis = trx_klarifikasi_dokumen_administrasi.id_penawaran_teknis_administrasi', 'left');
      $this->db->where('trx_klarifikasi_dokumen_administrasi.id_paket_klarifikasi', $id_paket);
      $this->db->where('trx_klarifikasi_dokumen_administrasi.id_vendor_klarifikasi', $id_vendor);
      $this->db->where('trx_klarifikasi_dokumen_administrasi.status_klarifikasi', 1);
      if (isset($_POST['search']['value'])) {
         $this->db->like('jenis_klarifikasi', $_POST['search']['value']);
      }
      if (isset($_POST['order'])) {
         $this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
      } else {
         $this->db->order_by('id_penawaran_teknis_administrasi', 'DESC');
      }
   }

   public function getdatatable_table_lihat_nilai_administrasi($id_vendor, $id_paket) //nam[ilin data pake ini
   {
      $this->_get_data_query_table_lihat_nilai_administrasi($id_vendor, $id_paket); //ambil data dari get yg di atas
      if ($_POST['length'] != -1) {
         $this->db->limit($_POST['length'], $_POST['start']);
      }
      $query = $this->db->get();
      return $query->result();
   }
   public function count_filtered_table_lihat_nilai_administrasi($id_vendor, $id_paket)
   {
      $this->_get_data_query_table_lihat_nilai_administrasi($id_vendor, $id_paket); //ambil data dari get yg di atas
      $query = $this->db->get();
      return $query->num_rows();
   }

   public function count_all_data_table_lihat_nilai_administrasi()
   {
      $this->db->from('trx_klarifikasi_dokumen_administrasi');
      return $this->db->count_all_results();
   }
}
	// END EVALUASI TENDER
