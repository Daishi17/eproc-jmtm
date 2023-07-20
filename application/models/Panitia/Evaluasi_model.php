<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Evaluasi_model extends CI_Model
{

	// INI UNTUK EVALUASI TENDER
	var $column_search = array('id_mengikuti_paket', 'username_vendor', 'nilai_penawaran', 'nilai_terkoreksi', 'negosiasi', 'id_mengikuti_paket', 'id_mengikuti_paket', 'nilai_teknis', 'nilai_prakualifikasi', 'nilai_pringkat_teknis', 'nilai_akhir', 'id_mengikuti_paket', 'id_mengikuti_paket', 'id_mengikuti_paket', 'id_mengikuti_paket');
	private function _get_data_query_evaluasi_tender($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor_mengikuti_paket');
		$this->db->join('tbl_vendor', 'tbl_vendor.id_vendor = tbl_vendor_mengikuti_paket.id_mengikuti_vendor', 'left');
		$this->db->join('tbl_rincian_hps_vendor', 'tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor = tbl_rincian_hps_vendor.id_vendor', 'left');
		$this->db->join('tbl_paket', 'tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor = tbl_paket.id_paket', 'left');
		$this->db->where('tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', $id_paket);
		$i = 0;
		foreach ($this->column_search as $item) // looping awal
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

				if (count($this->column_search) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->column_search[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_mengikuti_paket', 'DESC');
		}
	}

	public function getdatatable_evaluasi_tender($id_paket) //nam[ilin data pake ini
	{
		$this->_get_data_query_evaluasi_tender($id_paket); //ambil data dari get yg di atas
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_data_evaluasi_tender($id_paket)
	{
		$this->_get_data_query_evaluasi_tender($id_paket); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data_evaluasi_tender()
	{
		$this->db->from('tbl_vendor_mengikuti_paket');
		return $this->db->count_all_results();
	}


	private function _get_data_query_evaluasi_tender_auction($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor_mengikuti_paket');
		$this->db->join('tbl_vendor', 'tbl_vendor.id_vendor = tbl_vendor_mengikuti_paket.id_mengikuti_vendor', 'left');
		$this->db->join('tbl_rincian_hps_vendor', 'tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor = tbl_rincian_hps_vendor.id_vendor', 'left');
		$this->db->join('tbl_paket', 'tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor = tbl_paket.id_paket', 'left');
		$this->db->where('tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', $id_paket);
		$i = 0;
		foreach ($this->column_search as $item) // looping awal
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

				if (count($this->column_search) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->column_search[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('harga_penawaran_binding_3', 'ASC');
		}
	}

	public function getdatatable_evaluasi_tender_auction($id_paket) //nam[ilin data pake ini
	{
		$this->_get_data_query_evaluasi_tender_auction($id_paket); //ambil data dari get yg di atas
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtered_data_evaluasi_tender_auction($id_paket)
	{
		$this->_get_data_query_evaluasi_tender_auction($id_paket); //ambil data dari get yg di atas
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data_evaluasi_tender_auction()
	{
		$this->db->from('tbl_vendor_mengikuti_paket');
		return $this->db->count_all_results();
	}

	// evaluasi teknis harga
	public function totalRincianHps_vendor($id_vendor, $id_paket)
	{
		$this->db->select('*');
		$this->db->where('id_paket', $id_paket);
		$this->db->where('id_vendor', $id_vendor);
		$this->db->from('tbl_rincian_hps_vendor');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function update_vendor_mengikuti_paket($where, $data)
	{
		$this->db->update('tbl_vendor_mengikuti_paket', $data, $where);
		return $this->db->affected_rows();
	}

	public function get_row_data($id_paket)
	{
		$query = $this->db->query("SELECT * FROM tbl_vendor_mengikuti_paket WHERE id_mengikuti_paket_vendor = $id_paket AND pemenang_tender = 1");
		return $query->row_array();
	}


	public function get_vendor_mengikuti_paket($id_mengikuti_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor_mengikuti_paket');
		$this->db->join('tbl_vendor', 'tbl_vendor.id_vendor = tbl_vendor_mengikuti_paket.id_mengikuti_vendor', 'left');
		$this->db->where('tbl_vendor_mengikuti_paket.id_mengikuti_paket', $id_mengikuti_paket);
		$query = $this->db->get();
		return $query->row_array();
	}
	public function ambil_paket_aja($id_paket)
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor_mengikuti_paket');
		$this->db->join('tbl_vendor', 'tbl_vendor.id_vendor = tbl_vendor_mengikuti_paket.id_mengikuti_vendor', 'left');
		$this->db->where('tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', $id_paket);
		$query = $this->db->get();
		return $query->row_array();
	}
}
	// END EVALUASI TENDER
