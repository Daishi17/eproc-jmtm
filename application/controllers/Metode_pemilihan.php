<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Metode_pemilihan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Metode_pemilihan/Metode_pemilihan_model');
	}
	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('template/navlogin');
		$this->load->view('metode_pemilihan/index');
		$this->load->view('template/footer');
		$this->load->view('metode_pemilihan/ajax');
	}
	public function getdata()
	{
		$resultss = $this->Metode_pemilihan_model->getdatatable();
		$data = [];
		$no = $_POST['start'];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] = $angga->id_metode_pemilihan;
			$row[] = $angga->kode_metode_pemilihan;
			$row[] = $angga->nama_metode_pemilihan;
			$row[] = '<a href="#" class="btn btn-success btn-block btn-sm" onClick="byid(' . "'" . $angga->id_metode_pemilihan . "','edit'" . ')"><i class="fas fa-edit"></i> Edit</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Metode_pemilihan_model->count_all_data(),
			"recordsFiltered" => $this->Metode_pemilihan_model->count_filtered_data(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function add()
	{
		$this->form_validation->set_rules('kode_metode_pemilihan', 'Kode', 'required|trim', ['required' => 'Kode Wajib Diisi!']);
		$this->form_validation->set_rules('nama_metode_pemilihan', 'Metode Pemilihan', 'required|trim', ['required' => 'Metode Pemilihan Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$data = [
				'kode_metode_pemilihan' => form_error('kode_metode_pemilihan'),
				'nama_metode_pemilihan' => form_error('nama_metode_pemilihan'),
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} else {
			$data = [
				'kode_metode_pemilihan' => htmlspecialchars($this->input->post('kode_metode_pemilihan')),
				'nama_metode_pemilihan' => htmlspecialchars($this->input->post('nama_metode_pemilihan')),
			];
			$this->Metode_pemilihan_model->create($data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}

	public function byid($id_metode_pemilihan)
	{
		$data = $this->Metode_pemilihan_model->getByid($id_metode_pemilihan);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function update()
	{
		$this->form_validation->set_rules('kode_metode_pemilihan', 'Kode', 'required|trim', ['required' => 'Kode Wajib Diisi!']);
		$this->form_validation->set_rules('nama_metode_pemilihan', 'Nama Metode Pemilihan', 'required|trim', ['required' => 'Metode Pemilihan Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$data = [
				'kode_metode_pemilihan' => form_error('kode_metode_pemilihan'),
				'nama_metode_pemilihan' => form_error('nama_metode_pemilihan'),
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} else {
			$data = [
				'kode_metode_pemilihan' => htmlspecialchars($this->input->post('kode_metode_pemilihan')),
				'nama_metode_pemilihan' => htmlspecialchars($this->input->post('nama_metode_pemilihan')),
			];
			$this->Metode_pemilihan_model->update(array('id_metode_pemilihan' => $this->input->post('id_metode_pemilihan')), $data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}
	public function delete($id_metode_pemilihan)
	{
		$this->Metode_pemilihan_model->delete($id_metode_pemilihan);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}
}
