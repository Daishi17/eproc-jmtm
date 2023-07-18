<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Metode_dokumen extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Metode_dokumen/Metode_dokumen_model');
	}

	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('template/navlogin');
		$this->load->view('metode_dokumen/index');
		$this->load->view('template/footer');
		$this->load->view('metode_dokumen/ajax');
	}

	public function getdata()
	{
		$result = $this->Metode_dokumen_model->getdatatable();
		$data = [];
		$no = $_POST['start'];
		foreach ($result as $rows) {
			$row = array();
			$row[] = ++$no;
			$row[] = $rows->nama_metode_dokumen;
			$row[] = '<a href="#" class="btn btn-success btn-block btn-sm" onClick="byid(' . "'" . $rows->id_metode_dokumen . "','edit'" . ')"><i class="fas fa-edit"></i> Edit</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Metode_dokumen_model->count_all_data(),
			"recordsFiltered" => $this->Metode_dokumen_model->count_filtered_data(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function add()
	{
		$this->form_validation->set_rules('nama_metode_dokumen', 'Nama Metode Dokumen', 'required|trim', ['required' => 'Nama Metode Dokumen Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$data = [
				'nama_metode_dokumen' => form_error('nama_metode_dokumen')
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} else {
			$data = [
				'nama_metode_dokumen' => htmlspecialchars($this->input->post('nama_metode_dokumen'))
			];
			$this->Metode_dokumen_model->create($data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}

	public function byid($id_metode_dokumen)
	{
		$data = $this->Metode_dokumen_model->getByid($id_metode_dokumen);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function update()
	{
		$this->form_validation->set_rules('nama_metode_dokumen', 'Nama Metode Dokumen', 'required|trim', ['required' => 'Nama Metode Dokumen Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$data = [
				'nama_metode_dokumen' => form_error('nama_metode_dokumen')
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} else {
			$data = [
				'nama_metode_dokumen' => htmlspecialchars($this->input->post('nama_metode_dokumen'))
			];
			$this->Metode_dokumen_model->update(array('id_metode_dokumen' => $this->input->post('id_metode_dokumen')), $data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}

	public function delete($id_metode_dokumen)
	{
		$this->Metode_dokumen_model->delete($id_metode_dokumen);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}
}
