<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Metode_evaluasi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Metode_evaluasi/Metode_evaluasi_model');
	}

	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('template/navlogin');
		$this->load->view('metode_evaluasi/index');
		$this->load->view('template/footer');
		$this->load->view('metode_evaluasi/ajax');
	}

	public function getdata()
	{
		$result = $this->Metode_evaluasi_model->getdatatable();
		$data = [];
		$no = $_POST['start'];
		foreach ($result as $rows) {
			$row = array();
			$row[] = ++$no;
			$row[] = $rows->nama_metode_evaluasi;
			$row[] = '<a href="#" class="btn btn-success btn-sm" onClick="byid(' . "'" . $rows->id_metode_evaluasi . "','edit'" . ')"><i class="fas fa-edit"></i> Edit</a> <a href="#" class="btn btn-danger btn-sm" onClick="byid(' . "'" . $rows->id_metode_evaluasi . "','hapus'" . ')">  <i class="fas fa-trash"></i> Hapus</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Metode_evaluasi_model->count_all_data(),
			"recordsFiltered" => $this->Metode_evaluasi_model->count_filtered_data(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function add()
	{
		$this->form_validation->set_rules('nama_metode_evaluasi', 'Nama Metode Evaluasi', 'required|trim', ['required' => 'Nama Metode Evaluasi Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$data = [
				'nama_metode_evaluasi' => form_error('nama_metode_evaluasi')
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} else {
			$data = [
				'nama_metode_evaluasi' => htmlspecialchars($this->input->post('nama_metode_evaluasi'))
			];
			$this->Metode_evaluasi_model->create($data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}

	public function byid($id_metode_dokumen)
	{
		$data = $this->Metode_evaluasi_model->getByid($id_metode_dokumen);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function update()
	{
		$this->form_validation->set_rules('nama_metode_evaluasi', 'Nama Metode Evaluasi', 'required|trim', ['required' => 'Nama Metode EvaluasiWajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$data = [
				'nama_metode_evaluasi' => form_error('nama_metode_evaluasi')
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} else {
			$data = [
				'nama_metode_evaluasi' => htmlspecialchars($this->input->post('nama_metode_evaluasi'))
			];
			$this->Metode_evaluasi_model->update(array('id_metode_evaluasi' => $this->input->post('id_metode_evaluasi')), $data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}

	public function delete($id_metode_evaluasi)
	{
		$this->Metode_evaluasi_model->delete($id_metode_evaluasi);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}
}
