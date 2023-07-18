<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Non_tender_model extends CI_Model
{
   var $table = 'tbl_vendor';
   var $column_order = array('id_vendor', 'username_vendor');
   var $order = array('id_vendor', 'username_vendor');
   var $column_order2 = array('id_vendor', 'username_vendor');
   var $order2 = array('id_vendor', 'username_vendor');

   private function _get_data_query($id_paket)
   {
      $this->db->select('*');
      $this->db->from('tbl_vendor_mengikuti_paket');
      $this->db->join('tbl_vendor', 'tbl_vendor.id_vendor = tbl_vendor_mengikuti_paket.id_mengikuti_vendor', 'left');
      $this->db->join('tbl_vendor_identitas_prusahaan', 'tbl_vendor.id_vendor = tbl_vendor_identitas_prusahaan.id_vendor', 'left');
      $this->db->join('tbl_provinsi', 'tbl_vendor_identitas_prusahaan.id_provinsi = tbl_provinsi.id_provinsi', 'left');
      $this->db->join('tbl_kabupaten', 'tbl_vendor_identitas_prusahaan.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
      $this->db->where('tbl_vendor.status_aktive_vendor', 1);
      $this->db->where('tbl_vendor.status_daftar_hitam_vendor', 0);
      $this->db->where('tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', $id_paket);
      $this->db->group_by('tbl_vendor_mengikuti_paket.id_mengikuti_vendor');
      if (isset($_POST['search']['value'])) {
         $this->db->like('tbl_vendor.username_vendor', $_POST['search']['value']);
      }

      if (isset($_POST['order'])) {
         $this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
      } else {
         $this->db->order_by('tbl_vendor_mengikuti_paket.id_mengikuti_vendor', 'DESC');
      }
   }

   public function getdatatable_all_vendor($id_paket)
   {
      $this->_get_data_query($id_paket);
      if ($_POST['length'] != -1) {
         $this->db->limit($_POST['length'], $_POST['start']);
      }
      $query = $this->db->get();
      return $query->result();
   }

   public function count_filtered_data_all_vendor($id_paket)
   {
      $this->_get_data_query($id_paket);
      $query = $this->db->get();
      return $query->num_rows();
   }

   public function count_all_data_all_vendor()
   {
      $this->db->from('tbl_vendor_mengikuti_paket');
      return $this->db->count_all_results();
   }


   // list data penyedia
   private function _get_data_query_list_all_vendor()
   {
      $this->db->select('*');
      $this->db->from('tbl_vendor');
      $this->db->join('tbl_vendor_identitas_prusahaan', 'tbl_vendor.id_vendor = tbl_vendor_identitas_prusahaan.id_vendor', 'left');
      $this->db->join('tbl_provinsi', 'tbl_vendor_identitas_prusahaan.id_provinsi = tbl_provinsi.id_provinsi', 'left');
      $this->db->join('tbl_kabupaten', 'tbl_vendor_identitas_prusahaan.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
      $this->db->where('tbl_vendor.status_aktive_vendor', 1);
      $this->db->where('tbl_vendor.status_daftar_hitam_vendor', 0);
      $this->db->group_by('tbl_vendor.id_vendor');
      if (isset($_POST['search']['value'])) {
         $this->db->like('tbl_vendor.username_vendor', $_POST['search']['value']);
      }

      if (isset($_POST['order'])) {
         $this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
      } else {
         $this->db->order_by('tbl_vendor.id_vendor', 'DESC');
      }
   }

   public function getdatatable_list_all_vendor()
   {
      $this->_get_data_query_list_all_vendor();
      if ($_POST['length'] != -1) {
         $this->db->limit($_POST['length'], $_POST['start']);
      }
      $query = $this->db->get();
      return $query->result();
   }

   public function count_filtered_data_all_vendor_list_all_vendor()
   {
      $this->_get_data_query_list_all_vendor();
      $query = $this->db->get();
      return $query->num_rows();
   }

   public function count_all_data_all_vendor_list_all_vendor()
   {
      $this->db->from($this->table);
      return $this->db->count_all_results();
   }


   public function get_row_vendor_mengikuti_paket_list($id_paket)
   {
      $this->db->select('*');
      $this->db->from('tbl_vendor_mengikuti_paket');
      $this->db->where('id_mengikuti_paket_vendor', $id_paket);
      $data = $this->db->get();
      return $data->row_array();
   }
   // public function chat_all_whastaap()
   // {
   //    $this->db->select('*');
   //    $this->db->from('tbl_vendor_mengikuti_paket');
   //    $this->db->where('tbl_vendor.status_aktive_vendor', 1);
   //    $this->db->where('tbl_vendor.status_daftar_hitam_vendor', 0);
   //    $data = $this->db->get();
   //    return $data->result_array();
   // }
   public function get_row_vendor_mengikuti_paket()
   {
      $this->db->select('*');
      $this->db->from('tbl_vendor_mengikuti_paket');
      $data = $this->db->get();
      return $data->result_array();
   }
   public function get_row_vendor($id_vendor)
   {
      $this->db->select('*');
      $this->db->from('tbl_vendor');
      $this->db->where('id_vendor', $id_vendor);
      $data = $this->db->get();
      return $data->row_array();
   }

   // tambah /Tunjuk Penyedia
   public function tunjuk_penyedia($where, $data)
   {
      $this->db->where($where)->update('tbl_vendor_mengikuti_paket', $data);
      return $this->db->affected_rows();
   }
}
