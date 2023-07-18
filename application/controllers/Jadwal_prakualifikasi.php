<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_prakualifikasi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Jadwal_prakualifikasi/Jadwal_prakualifikasi_model');
	}

	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('template/navlogin');
		$this->load->view('jadwal_prakualifikasi/index');
		$this->load->view('template/footer');
		$this->load->view('jadwal_prakualifikasi/ajax');
	}

	public function getdata()
	{
		$result = $this->Jadwal_prakualifikasi_model->getdatatable();
		$data = [];
		$no = $_POST['start'];
		foreach ($result as $rows) {
			$row = array();
			$row[] = ++$no;
			$row[] = $rows->nama_jadwal_prakualifikasi;
			$row[] = '<a href="#" class="btn btn-success btn-sm" onClick="byid(' . "'" . $rows->id_jadwal_prakualifikasi . "','edit'" . ')"><i class="fas fa-edit"></i> Edit</a> <a href="#" class="btn btn-danger btn-sm" onClick="byid(' . "'" . $rows->id_jadwal_prakualifikasi . "','hapus'" . ')">  <i class="fas fa-trash"></i> Hapus</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Jadwal_prakualifikasi_model->count_all_data(),
			"recordsFiltered" => $this->Jadwal_prakualifikasi_model->count_filtered_data(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function add()
	{
		$this->form_validation->set_rules('nama_jadwal_prakualifikasi', 'Nama Unit Kerja', 'required|trim', ['required' => 'Nama Jadwal Prakualifikasi Harus Diisi!']);
		if ($this->form_validation->run() == false) {
			$data = [
				'nama_jadwal_prakualifikasi' => form_error('nama_jadwal_prakualifikasi')
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} else {
			$data = [
				'nama_jadwal_prakualifikasi' => htmlspecialchars($this->input->post('nama_jadwal_prakualifikasi'))
			];
			$this->Jadwal_prakualifikasi_model->create($data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}

	public function byid($id_jadwal_prakualifikasi)
	{
		$data = $this->Jadwal_prakualifikasi_model->getByid($id_jadwal_prakualifikasi);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function update()
	{
		$this->form_validation->set_rules('nama_jadwal_prakualifikasi', 'Nama Jadwal Prakualifikasi', 'required|trim', ['required' => 'Nama Jadwal Prakualifikasi Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$data = [
				'nama_jadwal_prakualifikasi' => form_error('nama_jadwal_prakualifikasi')
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} else {
			$data = [
				'nama_jadwal_prakualifikasi' => htmlspecialchars($this->input->post('nama_jadwal_prakualifikasi'))
			];
			$this->Jadwal_prakualifikasi_model->update(array('id_jadwal_prakualifikasi' => $this->input->post('id_jadwal_prakualifikasi')), $data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}

	public function delete($id_jadwal_prakualifikasi)
	{
		$this->Jadwal_prakualifikasi_model->delete($id_jadwal_prakualifikasi);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}
}
