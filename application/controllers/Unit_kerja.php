<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit_kerja extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Unit_kerja/Unit_kerja_model');
	}
	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('template/navlogin');
		$this->load->view('unit_kerja/index');
		$this->load->view('template/footer');
		$this->load->view('unit_kerja/ajax');
	}
	public function getdata()
	{
		$resultss = $this->Unit_kerja_model->getdatatable();
		$data = [];
		$no = $_POST['start'];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] = $angga->kode_unit_kerja;
			$row[] = $angga->nama_unit_kerja;
			$row[] = '<a href="#" class="btn btn-success btn-sm btn-block" onClick="byid(' . "'" . $angga->id_unit_kerja . "','edit'" . ')"><i class="fas fa-edit"></i> Edit</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Unit_kerja_model->count_all_data(),
			"recordsFiltered" => $this->Unit_kerja_model->count_filtered_data(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function add()
	{
		$this->form_validation->set_rules('nama_unit_kerja', 'Nama Unit Kerja', 'required|trim', ['required' => 'Nama Unit Kerja Wajib Diisi!']);
		$this->form_validation->set_rules('kode_unit_kerja', 'Kode Unit Kerja', 'required|trim', ['required' => 'Kode Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$data = [
				'nama_unit_kerja' => form_error('nama_unit_kerja'),
				'kode_unit_kerja' => form_error('kode_unit_kerja'),
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} else {
			$data = [
				'nama_unit_kerja' => htmlspecialchars($this->input->post('nama_unit_kerja')),
				'kode_unit_kerja' => htmlspecialchars($this->input->post('kode_unit_kerja')),
			];
			$this->Unit_kerja_model->create($data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}

	public function byid($id_unit_kerja)
	{
		$data = $this->Unit_kerja_model->getByid($id_unit_kerja);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function update()
	{
		$this->form_validation->set_rules('nama_unit_kerja', 'Nama Unit Kerja', 'required|trim', ['required' => 'Nama Unit Kerja Wajib Diisi!']);
		$this->form_validation->set_rules('kode_unit_kerja', 'Kode Unit Kerja', 'required|trim', ['required' => 'Kode Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$data = [
				'nama_unit_kerja' => form_error('nama_unit_kerja'),
				'kode_unit_kerja' => form_error('kode_unit_kerja'),
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} else {
			$data = [
				'nama_unit_kerja' => htmlspecialchars($this->input->post('nama_unit_kerja')),
				'kode_unit_kerja' => htmlspecialchars($this->input->post('kode_unit_kerja')),
			];
			$this->Unit_kerja_model->update(array('id_unit_kerja' => $this->input->post('id_unit_kerja')), $data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}
	public function delete($id_unit_kerja)
	{
		$this->Unit_kerja_model->delete($id_unit_kerja);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}
}
