<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Chat_model extends CI_Model
{
   var $table = 'tbl_chat';
   var $colum_order = array('id_chat', 'pesan');
   var $order = array('id_chat', 'pesan');

   private function _get_data_query($id_role)
   {
      $this->db->select('*');
      $this->db->from($this->table);
      $this->db->where('id_penerima', $id_role);
      if (isset($_POST['search']['value'])) {
         $this->db->like('pesan', $_POST['search']['value']);
         // $this->db->or_like('data_kerja', $_POST['search']['value']);
         // $this->db->or_like('jabatan', $_POST['search']['value']);
         // $this->db->or_like('status', $_POST['search']['value']);
      }
      if (isset($_POST['order'])) {
         $this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
      } else {
         $this->db->order_by('id_chat', 'DESC');
      }
   }

   public function getdatatable_chat_penerima($id_role) //nam[ilin data pake ini
   {
      $this->_get_data_query($id_role); //ambil data dari get yg di atas
      if ($_POST['length'] != -1) {
         $this->db->limit($_POST['length'], $_POST['start']);
      }
      $query = $this->db->get();
      return $query->result();
   }
   public function count_filtered_data($id_role)
   {
      $this->_get_data_query($id_role); //ambil data dari get yg di atas
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
      $this->db->insert('tbl_chat', $data);
      return $this->db->affected_rows();
   }
   public function getByid($id_chat)
   {
      return $this->db->get_where($this->table, ['id_chat' => $id_chat])->row();
   }
   public function update($where, $data)
   {
      $this->db->update($this->table, $data, $where);
      return $this->db->affected_rows();
   }
   public function delete($id_chat)
   {
      $this->db->delete($this->table, ['id_chat' => $id_chat]);
      return $this->db->affected_rows();
   }

   // get Data Pegawai Test Doang
   public function get_pegawai()
   {
      $this->db->select('*');
      $this->db->from('tbl_pegawai');
      $query = $this->db->get();
      return $query->result_array();
   }

   // Query Chat By One To One Nya
   public function getChatPengirim($id_role)
   {
      $this->db->select('*');
      $this->db->from('tbl_chat');
      $this->db->order_by('id_chat', 'ASC');
      $this->db->where('id_penerima', $id_role);
      $query = $this->db->get();
      return $query->result_array();
   }

   public function getChatPenerima($id_role)
   {
      $this->db->select('*');
      $this->db->from('tbl_chat');
      $this->db->order_by('id_chat', 'ASC');
      $this->db->where('id_penerima', $id_role);
      $query = $this->db->get();
      return $query->result_array();
   }
   public function getChatPenerima2()
   {
      $this->db->select('*');
      $this->db->from('tbl_chat');
      $this->db->order_by('id_chat', 'ASC');
      $query = $this->db->get();
      return $query->result_array();
   }
   public function get_by_id_new_chat_from_pegawai($id_pegawai)
   {
      $this->db->select('*');
      $this->db->from('tbl_pegawai');
      $this->db->where('id_pegawai', $id_pegawai);
      $query = $this->db->get();
      return $query->row_array();
   }

   public function insert_data_chat_by_pemilih($data)
   {
      $this->db->insert('tbl_chat', $data);
      return $this->db->affected_rows();
   }
}
