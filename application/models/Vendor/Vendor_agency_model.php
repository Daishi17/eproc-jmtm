<?php

use phpDocumentor\Reflection\Types\This;

defined('BASEPATH') or exit('No direct script access allowed');

class Vendor_agency_model extends CI_Model
{
	var $table = 'tbl_vendor';
	var $column_order = array('id_vendor', 'username_vendor');
	var $order = array('id_vendor', 'username_vendor');
	var $column_order2 = array('id_vendor', 'username_vendor');
	var $order2 = array('id_vendor', 'username_vendor');

	private function _get_data_query()
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor');
		$this->db->join('tbl_vendor_identitas_prusahaan', 'tbl_vendor.id_vendor = tbl_vendor_identitas_prusahaan.id_vendor', 'left');
		$this->db->join('tbl_provinsi', 'tbl_vendor_identitas_prusahaan.id_provinsi = tbl_provinsi.id_provinsi', 'left');
		$this->db->join('tbl_kabupaten', 'tbl_vendor_identitas_prusahaan.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
		$this->db->where('tbl_vendor.status_aktive_vendor', 0);
		$this->db->where('tbl_vendor.status_daftar_hitam_vendor', 0);

		if (isset($_POST['search']['value'])) {
			$this->db->like('tbl_vendor.username_vendor', $_POST['search']['value']);
		}

		if (isset($_POST['order'])) {
			$this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('tbl_vendor.id_vendor', 'DESC');
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

	public function getById($id_vendor)
	{
		$query = $this->db->query("SELECT * FROM tbl_vendor
		LEFT JOIN tbl_vendor_identitas_prusahaan ON tbl_vendor.id_vendor = tbl_vendor_identitas_prusahaan.id_vendor
		LEFT JOIN tbl_provinsi ON tbl_vendor_identitas_prusahaan.id_provinsi = tbl_provinsi.id_provinsi
		LEFT JOIN tbl_kabupaten ON tbl_vendor_identitas_prusahaan.id_kabupaten = tbl_kabupaten.id_kabupaten WHERE tbl_vendor.id_vendor = $id_vendor");
		return $query->row_array();
	}

	public function update_status($id_vendor, $data)
	{
		$this->db->where('id_vendor', $id_vendor);
		$this->db->update('tbl_vendor', $data);
		return $this->db->affected_rows();
	}

	public function notif_email_vendor($id_vendor)
	{
		$query = $this->db->query("SELECT * FROM tbl_vendor WHERE id_vendor = $id_vendor");
		return $query->row();
	}


	private function _get_data_query2()
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor');
		$this->db->join('tbl_vendor_identitas_prusahaan', 'tbl_vendor.id_vendor = tbl_vendor_identitas_prusahaan.id_vendor', 'left');
		$this->db->join('tbl_provinsi', 'tbl_vendor_identitas_prusahaan.id_provinsi = tbl_provinsi.id_provinsi', 'left');
		$this->db->join('tbl_kabupaten', 'tbl_vendor_identitas_prusahaan.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
		$this->db->where('status_vendor_baru', null);
		$this->db->where('tbl_vendor.status_aktive_vendor', 1);


		if (isset($_POST['search']['value'])) {
			$this->db->like('tbl_vendor.username_vendor', $_POST['search']['value']);
		}

		if (isset($_POST['order'])) {
			$this->db->order_by($this->order2[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('tbl_vendor.id_vendor', 'DESC');
		}
	}

	public function getdatatable2()
	{
		$this->_get_data_query2();
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function count_filtered_data2()
	{
		$this->_get_data_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data2()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function masukkan_daftarhitam($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	private function _get_data_query3()
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor');
		$this->db->join('tbl_vendor_identitas_prusahaan', 'tbl_vendor.id_vendor = tbl_vendor_identitas_prusahaan.id_vendor', 'left');
		$this->db->join('tbl_provinsi', 'tbl_vendor_identitas_prusahaan.id_provinsi = tbl_provinsi.id_provinsi', 'left');
		$this->db->join('tbl_kabupaten', 'tbl_vendor_identitas_prusahaan.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
		$this->db->where('tbl_vendor.status_daftar_hitam_vendor', 1);


		if (isset($_POST['search']['value'])) {
			$this->db->like('tbl_vendor.username_vendor', $_POST['search']['value']);
		}

		if (isset($_POST['order'])) {
			$this->db->order_by($this->order2[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('tbl_vendor.id_vendor', 'DESC');
		}
	}

	public function getdatatable3()
	{
		$this->_get_data_query3();
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function count_filtered_data3()
	{
		$this->_get_data_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data3()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
}
