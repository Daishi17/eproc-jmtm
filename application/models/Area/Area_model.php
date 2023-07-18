<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Area_model extends CI_Model
{
   var $table = 'tbl_area';
   var $colum_order = array('id_area', 'nama_area');
   var $order = array('id_area', 'kode_area', 'nama_area','id_area');

   private function _get_data_query()
   {
      $this->db->from($this->table);
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
      if (isset($_POST['order'])) {
         $this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
      } else {
         $this->db->order_by('id_area', 'DESC');
      }
   }

   // get area
   public function getArea()
   {
      $this->db->select('*');
      $this->db->from('tbl_area');
      $query = $this->db->get();
      return $query->result_array();
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
   public function create($data)
   {
      $this->db->insert('tbl_area', $data);
      return $this->db->affected_rows();
   }
   public function getByid($id_area)
   {
      return $this->db->get_where($this->table, ['id_area' => $id_area])->row();
   }
   public function update($where, $data)
   {
      $this->db->update($this->table, $data, $where);
      return $this->db->affected_rows();
   }
   public function delete($id_area)
   {
      $this->db->delete($this->table, ['id_area' => $id_area]);
      return $this->db->affected_rows();
   }
}
