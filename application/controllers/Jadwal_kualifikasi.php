<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_kualifikasi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kualifikasi/Kualifikasi_model');
	}
	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('template/navlogin');
		$this->load->view('jadwal_kualifikasi/index');
		$this->load->view('template/footer');
		$this->load->view('jadwal_kualifikasi/ajax');
	}
	public function getdata()
	{
		$resultss = $this->Kualifikasi_model->getdatatable();
		$data = [];
		$no = $_POST['start'];
		foreach ($resultss as $pasca) {
			$row = array();
			$row[] = ++$no;
			$row[] = $pasca->id_kualifikasi;
			$row[] = $pasca->nama_kualifikasi;
			$row[] = $pasca->id_metode_pemilihan;
			$row[] = '<a href="#" class="btn btn-success btn-sm" onClick="byid(' . "'" . $pasca->id_kualifikasi . "','edit'" . ')"><i class="fas fa-edit"></i> Edit</a> <a href="#" class="btn btn-danger btn-sm" onClick="byid(' . "'" . $pasca->id_kualifikasi . "','hapus'" . ')">  <i class="fas fa-trash"></i> Hapus</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Kualifikasi_model->count_all_data(),
			"recordsFiltered" => $this->Kualifikasi_model->count_filtered_data(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function add()
	{
		$this->form_validation->set_rules('nama_kualifikasi', 'Nama Kualifikasi', 'required|trim', ['required' => 'Nama Kualifikasi Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$data = [
				'nama_kualifikasi' => form_error('nama_kualifikasi'),
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} else {
			$data = [
				'nama_kualifikasi' => htmlspecialchars($this->input->post('nama_kualifikasi')),
			];
			$this->Kualifikasi_model->create($data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}

	public function byid($id_kualifikasi)
	{
		$data = $this->Kualifikasi_model->getByid($id_kualifikasi);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function update()
	{
		$this->form_validation->set_rules('nama_kualifikasi', 'Nama Kualifikasi', 'required|trim', ['required' => 'Nama Kualifikasi Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$data = [
				'nama_kualifikasi' => form_error('nama_kualifikasi'),
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} else {
			$data = [
				'nama_kualifikasi' => htmlspecialchars($this->input->post('nama_kualifikasi')),

			];
			$this->Kualifikasi_model->update(array('id_kualifikasi' => $this->input->post('id_kualifikasi')), $data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}
	public function delete($id_kualifikasi)
	{
		$this->Kualifikasi_model->delete($id_kualifikasi);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}
}
