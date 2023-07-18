<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nib extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Nib/Nib_model');
	}

	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('template/navlogin');
		$this->load->view('nib/index');
		$this->load->view('template/footer');
		$this->load->view('nib/ajax');
	}

	public function getdata()
	{
		$result = $this->Nib_model->getdatatable();
		$data = [];
		$no = $_POST['start'];
		foreach ($result as $rows) {
			$row = array();
			$row[] = ++$no;
			$row[] = $rows->nib;
			$row[] = '<a href="javascript:;" class="btn btn-info btn-sm btn-block" onClick="byid(' . "'" . $rows->id_nib . "','detail'" . ')"><i class="fas fa-search"></i> Detail</a> <a href="javascript:;" class="btn btn-success btn-sm btn-block" onClick="byid(' . "'" . $rows->id_nib . "','edit'" . ')"><i class="fas fa-edit"></i> Edit</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Nib_model->count_all_data(),
			"recordsFiltered" => $this->Nib_model->count_filtered_data(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function add()
	{
		$this->form_validation->set_rules('nib', 'NIB', 'required|trim', ['required' => 'NIB Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$data = [
				'nib' => form_error('nib')
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} else {
			$data = [
				'nib' => htmlspecialchars($this->input->post('nib'))
			];
			$this->Nib_model->create($data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}

	public function byid($id_nib)
	{
		$data = $this->Nib_model->getByid($id_nib);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function update()
	{
		$this->form_validation->set_rules('nib', 'NIB', 'required|trim', ['required' => 'NIB Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$data = [
				'nib' => form_error('nib')
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} else {
			$data = [
				'nib' => htmlspecialchars($this->input->post('nib'))
			];
			$this->Nib_model->update(array('id_nib' => $this->input->post('id_nib')), $data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}

	public function delete($id_nib)
	{
		$this->Nib_model->delete($id_nib);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}

	//subkategori 1
	public function detailkategori($id_nib)
	{
		$data['id_nib'] = $id_nib;
		$data['jenis_kategori'] = $this->Nib_model->get_kategori_id($id_nib);
		// var_dump($data);
		// die;
		$this->load->view('template/header');
		$this->load->view('template/navlogin');
		$this->load->view('nib/subkategori', $data);
		$this->load->view('template/footer');
		$this->load->view('nib/ajax2');
		// $this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function getdata2($id_nib)
	{
		$result = $this->Nib_model->getdatatable2($id_nib);
		$data = [];
		$no = $_POST['start'];
		foreach ($result as $rows) {
			$row = array();
			$row[] = ++$no;
			$row[] = $rows->sub_kategori_nib;
			$row[] = '<a href="javascript:;" class="btn btn-info btn-sm btn-block" onClick="byid(' . "'" . $rows->id_sub_kategori . "','detail'" . ')"><i class="fas fa-search"></i> Detail</a> <a href="javascript:;" class="btn btn-success btn-sm btn-block" onClick="byid(' . "'" . $rows->id_sub_kategori . "','edit'" . ')"><i class="fas fa-edit"></i> Edit</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Nib_model->count_all_data2(),
			"recordsFiltered" => $this->Nib_model->count_filtered_data2(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function add2()
	{
		$this->form_validation->set_rules('sub_kategori_nib', 'NIB', 'required|trim', ['required' => 'NIB Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$data = [
				'sub_kategori_nib' => form_error('nib')
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} else {
			$data = [
				'id_nib' => htmlspecialchars($this->input->post('id_nib')),
				'sub_kategori_nib' => htmlspecialchars($this->input->post('sub_kategori_nib'))
			];
			$this->Nib_model->create2($data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}

	public function byid2($id_nib)
	{
		$data = $this->Nib_model->getByid2($id_nib);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function update2()
	{
		$this->form_validation->set_rules('sub_kategori_nib', 'NIB', 'required|trim', ['required' => 'NIB Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$data = [
				'nib' => form_error('nib')
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} else {
			$data = [
				'id_nib' => htmlspecialchars($this->input->post('id_nib')),
				'sub_kategori_nib' => htmlspecialchars($this->input->post('sub_kategori_nib'))
			];
			// var_dump($this->input->post('id_sub_kategori'));
			// die;
			$this->Nib_model->update2(array('id_sub_kategori' => $this->input->post('id_sub_kategori')), $data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}

	public function delete2($id_nib)
	{
		$this->Nib_model->delete2($id_nib);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}

	//end kategori 1

	//subkategori 2
	public function detailkategori2($id_nib)
	{
		$data['id_sub_kategori'] = $id_nib;
		$data['jenis_kategori'] = $this->Nib_model->get_kategori_id2($id_nib);
		// var_dump($data);
		// die;
		$this->load->view('template/header');
		$this->load->view('template/navlogin');
		$this->load->view('nib/subkategori2', $data);
		$this->load->view('template/footer');
		$this->load->view('nib/ajax3');
		// $this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function getdata3($id_nib)
	{
		$result = $this->Nib_model->getdatatable3($id_nib);
		$data = [];
		$no = $_POST['start'];
		foreach ($result as $rows) {
			$row = array();
			$row[] = ++$no;
			$row[] = $rows->sub_kategori_nib2;
			$row[] = '<a href="javascript:;" class="btn btn-info btn-sm btn-block" onClick="byid(' . "'" . $rows->id_sub_kategori2 . "','detail'" . ')"><i class="fas fa-search"></i> Detail</a> <a href="javascript:;" class="btn btn-success btn-sm btn-block" onClick="byid(' . "'" . $rows->id_sub_kategori2 . "','edit'" . ')"><i class="fas fa-edit"></i> Edit</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Nib_model->count_all_data2(),
			"recordsFiltered" => $this->Nib_model->count_filtered_data2(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function add3()
	{
		$this->form_validation->set_rules('sub_kategori_nib2', 'NIB', 'required|trim', ['required' => 'NIB Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$data = [
				'sub_kategori_nib2' => form_error('nib')
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} else {
			$data = [
				'id_sub_kategori' => htmlspecialchars($this->input->post('id_sub_kategori')),
				'sub_kategori_nib2' => htmlspecialchars($this->input->post('sub_kategori_nib2'))
			];
			$this->Nib_model->create3($data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}

	public function byid3($id_nib)
	{
		$data = $this->Nib_model->getByid3($id_nib);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function update3()
	{
		$this->form_validation->set_rules('sub_kategori_nib2', 'NIB', 'required|trim', ['required' => 'NIB Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$data = [
				'nib' => form_error('nib')
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} else {
			$data = [
				'id_sub_kategori' => htmlspecialchars($this->input->post('id_sub_kategori')),
				'sub_kategori_nib2' => htmlspecialchars($this->input->post('sub_kategori_nib2'))
			];
			// var_dump($this->input->post('id_sub_kategori'));
			// die;
			$this->Nib_model->update3(array('id_sub_kategori2' => $this->input->post('id_sub_kategori2')), $data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}

	public function delete3($id_nib)
	{
		$this->Nib_model->delete3($id_nib);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}
	//end subkategori 2

	//end subkategori 3
	public function detailkategori3($id_nib)
	{
		$data['id_sub_kategori'] = $id_nib;
		// var_dump($data);
		// die;
		$data['jenis_kategori'] = $this->Nib_model->get_kategori_id3($id_nib);
		// var_dump($data);
		// die;
		$this->load->view('template/header');
		$this->load->view('template/navlogin');
		$this->load->view('nib/subkategori3', $data);
		$this->load->view('template/footer');
		$this->load->view('nib/ajax4');
		// $this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function getdata4($id_nib)
	{
		$result = $this->Nib_model->getdatatable4($id_nib);
		$data = [];
		$no = $_POST['start'];
		foreach ($result as $rows) {
			$row = array();
			$row[] = ++$no;
			$row[] = $rows->sub_kategori_nib3;
			$row[] = '<a href="javascript:;" class="btn btn-info btn-sm btn-block" onClick="byid(' . "'" . $rows->id_sub_kategori3 . "','detail'" . ')"><i class="fas fa-search"></i> Detail</a> <a href="javascript:;" class="btn btn-success btn-sm btn-block" onClick="byid(' . "'" . $rows->id_sub_kategori3 . "','edit'" . ')"><i class="fas fa-edit"></i> Edit</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Nib_model->count_all_data2(),
			"recordsFiltered" => $this->Nib_model->count_filtered_data2(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function add4()
	{
		$this->form_validation->set_rules('sub_kategori_nib3', 'NIB', 'required|trim', ['required' => 'NIB Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$data = [
				'sub_kategori_nib3' => form_error('nib')
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} else {
			$data = [
				'id_sub_kategori2' => htmlspecialchars($this->input->post('id_sub_kategori2')),
				'sub_kategori_nib3' => htmlspecialchars($this->input->post('sub_kategori_nib3'))
			];
			$this->Nib_model->create4($data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}

	public function byid4($id_nib)
	{
		$data = $this->Nib_model->getByid4($id_nib);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function update4()
	{
		$this->form_validation->set_rules('sub_kategori_nib3', 'NIB', 'required|trim', ['required' => 'NIB Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$data = [
				'nib' => form_error('nib')
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} else {
			$data = [
				'id_sub_kategori2' => htmlspecialchars($this->input->post('id_sub_kategori2')),
				'sub_kategori_nib3' => htmlspecialchars($this->input->post('sub_kategori_nib3'))
			];
			// var_dump($this->input->post('id_sub_kategori'));
			// die;
			$this->Nib_model->update4(array('id_sub_kategori3' => $this->input->post('id_sub_kategori3')), $data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}

	public function delete4($id_nib)
	{
		$this->Nib_model->delete4($id_nib);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}
	//end subkategori3


	//end subkategori4
	public function detailkategori4($id_nib)
	{
		$data['id_sub_kategori'] = $id_nib;
		// var_dump($data);
		// die;
		$data['jenis_kategori'] = $this->Nib_model->get_kategori_id4($id_nib);
		// var_dump($data);
		// die;
		$this->load->view('template/header');
		$this->load->view('template/navlogin');
		$this->load->view('nib/subkategori4', $data);
		$this->load->view('template/footer');
		$this->load->view('nib/ajax5');
		// $this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function getdata5($id_nib)
	{
		$result = $this->Nib_model->getdatatable5($id_nib);
		$data = [];
		$no = $_POST['start'];
		foreach ($result as $rows) {
			$row = array();
			$row[] = ++$no;
			$row[] = $rows->sub_kategori_nib4;
			$row[] = '<a href="javascript:;" class="btn btn-success btn-sm btn-block" onClick="byid(' . "'" . $rows->id_sub_kategori4 . "','edit'" . ')"><i class="fas fa-edit"></i> Edit</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Nib_model->count_all_data2(),
			"recordsFiltered" => $this->Nib_model->count_filtered_data2(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function add5()
	{
		$this->form_validation->set_rules('sub_kategori_nib4', 'NIB', 'required|trim', ['required' => 'NIB Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$data = [
				'sub_kategori_nib4' => form_error('nib')
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} else {
			$data = [
				'id_sub_kategori3' => htmlspecialchars($this->input->post('id_sub_kategori3')),
				'sub_kategori_nib4' => htmlspecialchars($this->input->post('sub_kategori_nib4'))
			];
			$this->Nib_model->create5($data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}

	public function byid5($id_nib)
	{
		$data = $this->Nib_model->getByid5($id_nib);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function update5()
	{
		$this->form_validation->set_rules('sub_kategori_nib4', 'NIB', 'required|trim', ['required' => 'NIB Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$data = [
				'nib' => form_error('nib')
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} else {
			$data = [
				'id_sub_kategori3' => htmlspecialchars($this->input->post('id_sub_kategori3')),
				'sub_kategori_nib4' => htmlspecialchars($this->input->post('sub_kategori_nib4'))
			];
			// var_dump($this->input->post('id_sub_kategori'));
			// die;
			$this->Nib_model->update5(array('id_sub_kategori4' => $this->input->post('id_sub_kategori4')), $data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}

	public function delete5($id_nib)
	{
		$this->Nib_model->delete5($id_nib);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}
	//end subkategori4
}
