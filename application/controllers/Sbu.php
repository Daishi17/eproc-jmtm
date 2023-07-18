<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sbu extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Sbu/Sbu_model');
	}

	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('template/navlogin');
		$this->load->view('sbu/index');
		$this->load->view('template/footer');
		$this->load->view('sbu/ajax');
	}

	public function getdata()
	{
		$resultss = $this->Sbu_model->getdatatable();
		$data = [];
		$no = $_POST['start'];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] = $angga->kode_sbu;
			$row[] = $angga->nama_sbu;
			$row[] = '<a href="#" class="btn btn-success btn-sm btn-block" onClick="byid(' . "'" . $angga->id_sbu . "','edit'" . ')"><i class="fas fa-edit"></i> Edit</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Sbu_model->count_all_data(),
			"recordsFiltered" => $this->Sbu_model->count_filtered_data(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function add()
	{
		$this->form_validation->set_rules('kode_sbu', 'Nama SBU', 'required|trim', ['required' => 'Kode Wajib Diisi!']);
		$this->form_validation->set_rules('nama_sbu', 'Kode SBU', 'required|trim', ['required' => 'Nama SBU Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$data = [
				'kode_sbu' => form_error('kode_sbu'),
				'nama_sbu' => form_error('nama_sbu'),
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} else {
			$data = [
				'nama_sbu' => htmlspecialchars($this->input->post('nama_sbu')),
				'kode_sbu' => htmlspecialchars($this->input->post('kode_sbu')),
			];
			$this->Sbu_model->create($data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}

	public function byid($id_sbu)
	{
		$data = $this->Sbu_model->getByid($id_sbu);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function update()
	{
		$this->form_validation->set_rules('kode_sbu', 'Kode SBU', 'required|trim', ['required' => 'Kode SBU Wajib Diisi!']);
		$this->form_validation->set_rules('nama_sbu', 'Nama SBU', 'required|trim', ['required' => 'Nama SBU Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$data = [
				'kode_sbu' => form_error('kode_sbu'),
				'nama_sbu' => form_error('nama_sbu'),
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} else {
			$data = [
				'kode_sbu' => htmlspecialchars($this->input->post('kode_sbu')),
				'nama_sbu' => htmlspecialchars($this->input->post('nama_sbu')),
			];
			$this->Sbu_model->update(array('id_sbu' => $this->input->post('id_sbu')), $data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}
	public function delete($id_sbu)
	{
		$this->Sbu_model->delete($id_sbu);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}
}
