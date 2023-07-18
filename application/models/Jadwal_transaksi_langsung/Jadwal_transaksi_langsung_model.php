<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_transaksi_langsung_model extends CI_Model
{
   var $table = 'tbl_trankasi_langsung_jadwal';
   var $colum_order = array('id_jadwal_transaksi_langsung', 'nama_jadwal_transaksi_langsung');
   var $order = array('id_jadwal_transaksi_langsung', 'nama_jadwal_transaksi_langsung');

   private function _get_data_query()
   {
      $this->db->from($this->table);
      if (isset($_POST['search']['value'])) {
         $this->db->like('nama_jadwal_transaksi_langsung', $_POST['search']['value']);
      }
      if (isset($_POST['order'])) {
         $this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
      } else {
         $this->db->order_by('id_jadwal_transaksi_langsung', 'DESC');
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

   public function create($data)
   {
      $this->db->insert('tbl_trankasi_langsung_jadwal', $data);
      return $this->db->affected_rows();
   }

   public function getByid($id_jadwal_transaksi_langsung)
   {
      return $this->db->get_where($this->table, ['id_jadwal_transaksi_langsung' => $id_jadwal_transaksi_langsung])->row();
   }

   public function update($where, $data)
   {
      $this->db->update($this->table, $data, $where);
      return $this->db->affected_rows();
   }

   public function delete($id_jadwal_transaksi_langsung)
   {
      $this->db->delete($this->table, ['id_jadwal_transaksi_langsung' => $id_jadwal_transaksi_langsung]);
      return $this->db->affected_rows();
   }
}
