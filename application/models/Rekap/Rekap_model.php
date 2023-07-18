<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit_kerja_model extends CI_Model
{
   var $table = 'tbl_paket';
   var $colum_order = array('id_paket', 'nama_paket');
   var $order = array('id_paket', 'nama_paket');

   private function _get_data_query()
   {
      $this->db->select('*');
      $this->db->from($this->table);
      $this->db->where('id_unit_kerja');
      if (isset($_POST['search']['value'])) {
         $this->db->like('nama_paket', $_POST['search']['value']);
      }
      if (isset($_POST['order'])) {
         $this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
      } else {
         $this->db->order_by('id_paket', 'DESC');
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
      return $this->db->count_all_results();
   }
   public function create($data)
   {
      $this->db->insert('tbl_unit_kerja', $data);
      return $this->db->affected_rows();
   }
   public function getByid($id_paket)
   {
      return $this->db->get_where($this->table, ['id_paket' => $id_paket])->row();
   }
   public function update($where, $data)
   {
      $this->db->update($this->table, $data, $where);
      return $this->db->affected_rows();
   }
   public function delete($id_paket)
   {
      $this->db->delete($this->table, ['id_paket' => $id_paket]);
      return $this->db->affected_rows();
   }
}
