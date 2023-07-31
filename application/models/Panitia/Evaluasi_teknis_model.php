<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Evaluasi_teknis_model extends CI_Model
{

   // INI UNTUK EVALUASI TENDER

   private function _get_data_query_evaluasi_teknis($id_paket)
   {
      $this->db->select('*');
      $this->db->from('tbl_penawaran_teknis');
      $this->db->where('tbl_penawaran_teknis.kategori', 'Teknis');
      $this->db->where('tbl_penawaran_teknis.status_checked', 1);
      $this->db->where('tbl_penawaran_teknis.id_paket', $id_paket);
      if (isset($_POST['search']['value'])) {
         $this->db->like('nama_penawaran_teknis', $_POST['search']['value']);
      }
      if (isset($_POST['order'])) {
         $this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
      } else {
         $this->db->order_by('id_penawaran_teknis', 'DESC');
      }
   }

   public function getdatatable_evaluasi_teknis($id_paket) //nam[ilin data pake ini
   {
      $this->_get_data_query_evaluasi_teknis($id_paket); //ambil data dari get yg di atas
      if ($_POST['length'] != -1) {
         $this->db->limit($_POST['length'], $_POST['start']);
      }
      $query = $this->db->get();
      return $query->result();
   }
   public function count_filtered_data_evaluasi_teknis($id_paket)
   {
      $this->_get_data_query_evaluasi_teknis($id_paket); //ambil data dari get yg di atas
      $query = $this->db->get();
      return $query->num_rows();
   }

   public function count_all_data_evaluasi_teknis()
   {
      $this->db->from('tbl_penawaran_teknis');
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


   public function get_penawaran_teknis_by_id($id_penawaran_teknis, $id_paket)
   {
      $this->db->select('*');
      $this->db->from('tbl_penawaran_teknis');
      $this->db->where('kategori', 'Teknis');
      $this->db->where('status_checked', 1);
      $this->db->where('tbl_penawaran_teknis.id_paket', $id_paket);
      $this->db->where('id_penawaran_teknis', $id_penawaran_teknis);
      $data = $this->db->get();
      return $data->row_array();
   }
   public function get_penawaran_teknis_penilaian_by_id($id_penawaran_teknis, $id_vendor, $id_paket)
   {
      $this->db->select('*');
      $this->db->from('trx_penilaian_evaluasi_teknis');
      $this->db->join('tbl_penawaran_teknis', 'tbl_penawaran_teknis.id_penawaran_teknis = trx_penilaian_evaluasi_teknis.id_penawaran_teknis_penilaian', 'left');
      $this->db->where('trx_penilaian_evaluasi_teknis.id_paket_teknis_penilaian', $id_paket);
      $this->db->where('trx_penilaian_evaluasi_teknis.id_penawaran_teknis_penilaian', $id_penawaran_teknis);
      $this->db->where('trx_penilaian_evaluasi_teknis.id_vendor_teknis_penilaian', $id_vendor);
      $data = $this->db->get();
      return $data->row_array();
   }

   // SETUJUI PERSYARTAAN TEKNIS

   public function setujui_persyaratan_teknis($data)
   {
      $this->db->insert('trx_penilaian_evaluasi_teknis', $data);
      return $this->db->affected_rows();
   }
   public function update_setujui_persyaratan_teknis($where, $data)
   {
      $this->db->update('trx_penilaian_evaluasi_teknis', $data, $where);
      return $this->db->affected_rows();
   }

   public function update_setujui_persyaratan_teknis_vendor($where, $data)
   {
      $this->db->update('tbl_vendor_mengikuti_paket', $data, $where);
      return $this->db->affected_rows();
   }
   public function penetapan_pemenang($where, $data)
   {
      $this->db->update('tbl_vendor_mengikuti_paket', $data, $where);
      return $this->db->affected_rows();
   }

   public function penetapan_pemenang_by_paket($where, $data)
   {
      $this->db->update('tbl_paket', $data, $where);
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

   public function update_ke_paket($where, $data)
   {
      $this->db->update('tbl_paket', $data, $where);
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

   // table Lihat Teknis
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

   // INI UNTUK MENGULANG TENDER
   public function ulang_tender_update_vendor_mengikuti_paket($data_mengikuti_vendor, $where)
   {
      $this->db->where($where);
      $this->db->update('tbl_vendor_mengikuti_paket', $data_mengikuti_vendor);
   }
   public function ulang_tender_detele_vendor_mengikuti_paket($where)
   {
      $this->db->delete('tbl_vendor_mengikuti_paket', $where);
   }
   public function ulang_tender_detele_tbl_berita_acara_penawaran($where_paket)
   {
      $this->db->delete('tbl_berita_acara_penawaran', $where_paket);
   }
   public function ulang_tender_detele_tbl_berita_acara_lainnya($where_paket)
   {
      $this->db->delete('tbl_berita_acara_lainnya', $where_paket);
   }
   public function ulang_tender_detele_tbl_berita_acara_peringkat($where_paket)
   {
      $this->db->delete('tbl_berita_acara_peringkat', $where_paket);
   }
   public function ulang_tender_detele_tbl_berita_acara_tender($where_paket)
   {
      $this->db->delete('tbl_berita_acara_tender', $where_paket);
   }

   public function ulang_tender_detele_tbl_dokumen_kualifikasi_pdf($where_paket)
   {
      $this->db->delete('tbl_dokumen_kualifikasi_pdf', $where_paket);
   }

   public function ulang_tender_detele_tbl_dokumen_sanggahan_akhir($where_paket)
   {
      $this->db->delete('tbl_dokumen_sanggahan_akhir', $where_paket);
   }

   public function ulang_tender_detele_tbl_dokumen_sanggahan_prakualfikasi($where_paket)
   {
      $this->db->delete('tbl_dokumen_sanggahan_prakualifikasi', $where_paket);
   }

   public function ulang_tender_detele_tbl_rincian_hps_vendor($where_paket)
   {
      $this->db->delete('tbl_rincian_hps_vendor', $where_paket);
   }
   public function ulang_tender_detele_tbl_rincian_hps_pdf_vendor($where_paket)
   {
      $this->db->delete('tbl_rincian_hps_pdf_vendor', $where_paket);
   }
   public function ulang_tender_detele_tbl_jadwal_tender_detail($where_paket)
   {
      $this->db->delete('tbl_jadwal_tender_detail', $where_paket);
   }

   public function ulang_tender_detele_tbl_vendor_persyaratan_tambahan($where_paket)
   {
      $this->db->delete('tbl_vendor_persyaratan_tambahan', $where_paket);
   }

   public function ulang_tender_detele_tbl_negosiasi_tender($where_paket)
   {
      $this->db->delete('tbl_negosiasi_tender', $where_paket);
   }

   public function ulang_tender_detele_tbl_pesan($where_paket)
   {
      $this->db->delete('tbl_pesan', $where_paket);
   }
}
