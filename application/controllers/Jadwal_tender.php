<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_tender extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Jadwal_tender/Jadwal_tender_model');
	}

	public function pascakualifikasi_tender_umum()
	{
		$this->load->view('template/header');
		$this->load->view('template/navlogin');
		$this->load->view('jadwal_tender/index');
		$this->load->view('template/footer');
		$this->load->view('jadwal_tender/ajax');
	}


	public function getdata()
	{
		$result = $this->Jadwal_tender_model->getdatatable();
		$data = [];
		$no = $_POST['start'];
		foreach ($result as $rows) {
			$row = array();
			$row[] = ++$no;
			$row[] = $rows->nama_jadwal_tender;
// 			$row[] = '<a href="#" class="btn btn-success btn-sm" onClick="byid(' . "'" . $rows->id_jadwal_tender . "','edit'" . ')"><i class="fas fa-edit"></i> Edit</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Jadwal_tender_model->count_all_data(),
			"recordsFiltered" => $this->Jadwal_tender_model->count_filtered_data(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function add()
	{
		$this->form_validation->set_rules('nama_jadwal_tender', 'Nama Unit Kerja', 'required|trim', ['required' => 'Nama Jadwal Prakualifikasi Harus Diisi!']);
		if ($this->form_validation->run() == false) {
			$data = [
				'nama_jadwal_tender' => form_error('nama_jadwal_tender')
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} else {
			$data = [
				'nama_jadwal_tender' => htmlspecialchars($this->input->post('nama_jadwal_tender')),
				'id_kualifikasi' => 12
			];
			$this->Jadwal_tender_model->create($data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}

	public function byid($id_jadwal_tender)
	{
		$data = $this->Jadwal_tender_model->getByid($id_jadwal_tender);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function update()
	{
		$this->form_validation->set_rules('nama_jadwal_tender', 'Nama Jadwal Prakualifikasi', 'required|trim', ['required' => 'Nama Jadwal Prakualifikasi Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$data = [
				'nama_jadwal_tender' => form_error('nama_jadwal_tender')
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} else {
			$data = [
				'nama_jadwal_tender' => htmlspecialchars($this->input->post('nama_jadwal_tender'))
			];
			$this->Jadwal_tender_model->update(array('id_jadwal_tender' => $this->input->post('id_jadwal_tender')), $data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}

	public function delete($id_jadwal_tender)
	{
		$this->Jadwal_tender_model->delete($id_jadwal_tender);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}

	// untuk prakuali
	public function prakualifikasi_tender_umum()
	{
		$this->load->view('template/header');
		$this->load->view('template/navlogin');
		$this->load->view('jadwal_tender/prakualifikasi');
		$this->load->view('template/footer');
		$this->load->view('Jadwal_tender/ajax2');
	}

	public function getdata2()
	{
		$result = $this->Jadwal_tender_model->getdatatable2();
		$data = [];
		$no = $_POST['start'];
		foreach ($result as $rows) {
			$row = array();
			$row[] = ++$no;
			$row[] = $rows->nama_jadwal_tender;
// 			$row[] = '<a href="#" class="btn btn-success btn-sm" onClick="byid(' . "'" . $rows->id_jadwal_tender . "','edit'" . ')"><i class="fas fa-edit"></i> Edit</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Jadwal_tender_model->count_all_data2(),
			"recordsFiltered" => $this->Jadwal_tender_model->count_filtered_data2(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function add2()
	{
		$this->form_validation->set_rules('nama_jadwal_tender', 'Nama Unit Kerja', 'required|trim', ['required' => 'Nama Jadwal Prakualifikasi Harus Diisi!']);
		if ($this->form_validation->run() == false) {
			$data = [
				'nama_jadwal_tender' => form_error('nama_jadwal_tender')
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} else {
			$data = [
				'nama_jadwal_tender' => htmlspecialchars($this->input->post('nama_jadwal_tender')),
				'id_kualifikasi' => 10
			];
			$this->Jadwal_tender_model->create($data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}

	public function byid2($id_jadwal_tender)
	{
		$data = $this->Jadwal_tender_model->getByid($id_jadwal_tender);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function update2()
	{
		$this->form_validation->set_rules('nama_jadwal_tender', 'Nama Jadwal Prakualifikasi', 'required|trim', ['required' => 'Nama Jadwal Prakualifikasi Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$data = [
				'nama_jadwal_tender' => form_error('nama_jadwal_tender')
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} else {
			$data = [
				'nama_jadwal_tender' => htmlspecialchars($this->input->post('nama_jadwal_tender'))
			];
			$this->Jadwal_tender_model->update(array('id_jadwal_tender' => $this->input->post('id_jadwal_tender')), $data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}

	public function delete2($id_jadwal_tender)
	{
		$this->Jadwal_tender_model->delete($id_jadwal_tender);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}

	// untuk prakuali
	public function prakualifikasi_satu_file()
	{
		$this->load->view('template/header');
		$this->load->view('template/navlogin');
		$this->load->view('jadwal_prakualifikasi_satufile/index');
		$this->load->view('template/footer');
		$this->load->view('jadwal_prakualifikasi_satufile/ajax');
	}

	public function getdata3()
	{
		$result = $this->Jadwal_tender_model->getdatatable3();
		$data = [];
		$no = $_POST['start'];
		foreach ($result as $rows) {
			$row = array();
			$row[] = ++$no;
			$row[] = $rows->nama_jadwal_tender;
// 			$row[] = '<a href="#" class="btn btn-success btn-sm" onClick="byid(' . "'" . $rows->id_jadwal_tender . "','edit'" . ')"><i class="fas fa-edit"></i> Edit</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Jadwal_tender_model->count_all_data3(),
			"recordsFiltered" => $this->Jadwal_tender_model->count_filtered_data3(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function add3()
	{
		$this->form_validation->set_rules('nama_jadwal_tender', 'Nama Unit Kerja', 'required|trim', ['required' => 'Nama Jadwal Prakualifikasi Harus Diisi!']);
		if ($this->form_validation->run() == false) {
			$data = [
				'nama_jadwal_tender' => form_error('nama_jadwal_tender')
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} else {
			$data = [
				'nama_jadwal_tender' => htmlspecialchars($this->input->post('nama_jadwal_tender')),
				'id_kualifikasi' => 13
			];
			$this->Jadwal_tender_model->create($data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}

	//prakualifikasi satu file
	public function byid3($id_jadwal_tender)
	{
		$data = $this->Jadwal_tender_model->getByid($id_jadwal_tender);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function update3()
	{
		$this->form_validation->set_rules('nama_jadwal_tender', 'Nama Jadwal Prakualifikasi', 'required|trim', ['required' => 'Nama Jadwal Prakualifikasi Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$data = [
				'nama_jadwal_tender' => form_error('nama_jadwal_tender')
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} else {
			$data = [
				'nama_jadwal_tender' => htmlspecialchars($this->input->post('nama_jadwal_tender'))
			];
			$this->Jadwal_tender_model->update(array('id_jadwal_tender' => $this->input->post('id_jadwal_tender')), $data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}

	public function delete3($id_jadwal_tender)
	{
		$this->Jadwal_tender_model->delete($id_jadwal_tender);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}

	public function tender_terbatas_prakualifikasi()
	{
		$this->load->view('template/header');
		$this->load->view('template/navlogin');
		$this->load->view('jadwal_tender_terbatas/index');
		$this->load->view('template/footer');
		$this->load->view('jadwal_tender_terbatas/ajax');
	}

	public function getdata4()
	{
		$result = $this->Jadwal_tender_model->getdatatable4();
		$data = [];
		$no = $_POST['start'];
		foreach ($result as $rows) {
			$row = array();
			$row[] = ++$no;
			$row[] = $rows->nama_jadwal_tender;
// 			$row[] = '<a href="#" class="btn btn-success btn-sm" onClick="byid(' . "'" . $rows->id_jadwal_tender . "','edit'" . ')"><i class="fas fa-edit"></i> Edit</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Jadwal_tender_model->count_all_data4(),
			"recordsFiltered" => $this->Jadwal_tender_model->count_filtered_data4(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function add4()
	{
		$this->form_validation->set_rules('nama_jadwal_tender', 'Nama Unit Kerja', 'required|trim', ['required' => 'Nama Jadwal Prakualifikasi Harus Diisi!']);
		if ($this->form_validation->run() == false) {
			$data = [
				'nama_jadwal_tender' => form_error('nama_jadwal_tender')
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} else {
			$data = [
				'nama_jadwal_tender' => htmlspecialchars($this->input->post('nama_jadwal_tender')),
				'id_kualifikasi' => 4
			];
			$this->Jadwal_tender_model->create($data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}

	//prakualifikasi satu file
	public function byid4($id_jadwal_tender)
	{
		$data = $this->Jadwal_tender_model->getByid($id_jadwal_tender);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function update4()
	{
		$this->form_validation->set_rules('nama_jadwal_tender', 'Nama Jadwal Prakualifikasi', 'required|trim', ['required' => 'Nama Jadwal Prakualifikasi Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$data = [
				'nama_jadwal_tender' => form_error('nama_jadwal_tender')
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} else {
			$data = [
				'nama_jadwal_tender' => htmlspecialchars($this->input->post('nama_jadwal_tender'))
			];
			$this->Jadwal_tender_model->update(array('id_jadwal_tender' => $this->input->post('id_jadwal_tender')), $data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}

	public function delete4($id_jadwal_tender)
	{
		$this->Jadwal_tender_model->delete($id_jadwal_tender);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}

	public function penunjukkan_langsung_prakualifikasi()
	{
		$this->load->view('template/header');
		$this->load->view('template/navlogin');
		$this->load->view('jadwal_penunjukkan_langsung_pra/index');
		$this->load->view('template/footer');
		$this->load->view('jadwal_penunjukkan_langsung_pra/ajax');
	}

	public function getdata5()
	{
		$result = $this->Jadwal_tender_model->getdatatable5();
		$data = [];
		$no = $_POST['start'];
		foreach ($result as $rows) {
			$row = array();
			$row[] = ++$no;
			$row[] = $rows->nama_jadwal_tender;
// 			$row[] = '<a href="#" class="btn btn-success btn-sm" onClick="byid(' . "'" . $rows->id_jadwal_tender . "','edit'" . ')"><i class="fas fa-edit"></i> Edit</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Jadwal_tender_model->count_all_data5(),
			"recordsFiltered" => $this->Jadwal_tender_model->count_filtered_data5(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function add5()
	{
		$this->form_validation->set_rules('nama_jadwal_tender', 'Nama Unit Kerja', 'required|trim', ['required' => 'Nama Jadwal Prakualifikasi Harus Diisi!']);
		if ($this->form_validation->run() == false) {
			$data = [
				'nama_jadwal_tender' => form_error('nama_jadwal_tender')
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} else {
			$data = [
				'nama_jadwal_tender' => htmlspecialchars($this->input->post('nama_jadwal_tender')),
				'id_kualifikasi' => 6
			];
			$this->Jadwal_tender_model->create($data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}

	//prakualifikasi satu file
	public function byid5($id_jadwal_tender)
	{
		$data = $this->Jadwal_tender_model->getByid($id_jadwal_tender);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function update5()
	{
		$this->form_validation->set_rules('nama_jadwal_tender', 'Nama Jadwal Prakualifikasi', 'required|trim', ['required' => 'Nama Jadwal Prakualifikasi Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$data = [
				'nama_jadwal_tender' => form_error('nama_jadwal_tender')
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} else {
			$data = [
				'nama_jadwal_tender' => htmlspecialchars($this->input->post('nama_jadwal_tender'))
			];
			$this->Jadwal_tender_model->update(array('id_jadwal_tender' => $this->input->post('id_jadwal_tender')), $data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}

	public function delete5($id_jadwal_tender)
	{
		$this->Jadwal_tender_model->delete($id_jadwal_tender);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}

	public function seleksiumum()
	{
		$this->load->view('template/header');
		$this->load->view('template/navlogin');
		$this->load->view('jadwal_seleksi_umum/index');
		$this->load->view('template/footer');
		$this->load->view('jadwal_seleksi_umum/ajax');
	}

	public function getdata6()
	{
		$result = $this->Jadwal_tender_model->getdatatable6();
		$data = [];
		$no = $_POST['start'];
		foreach ($result as $rows) {
			$row = array();
			$row[] = ++$no;
			$row[] = $rows->nama_jadwal_tender;
// 			$row[] = '<a href="#" class="btn btn-success btn-sm" onClick="byid(' . "'" . $rows->id_jadwal_tender . "','edit'" . ')"><i class="fas fa-edit"></i> Edit</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Jadwal_tender_model->count_all_data6(),
			"recordsFiltered" => $this->Jadwal_tender_model->count_filtered_data6(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function add6()
	{
		$this->form_validation->set_rules('nama_jadwal_tender', 'Nama Unit Kerja', 'required|trim', ['required' => 'Nama Jadwal Prakualifikasi Harus Diisi!']);
		if ($this->form_validation->run() == false) {
			$data = [
				'nama_jadwal_tender' => form_error('nama_jadwal_tender')
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} else {
			$data = [
				'nama_jadwal_tender' => htmlspecialchars($this->input->post('nama_jadwal_tender')),
				'id_kualifikasi' => 7
			];
			$this->Jadwal_tender_model->create($data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}

	//prakualifikasi satu file
	public function byid6($id_jadwal_tender)
	{
		$data = $this->Jadwal_tender_model->getByid($id_jadwal_tender);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function update6()
	{
		$this->form_validation->set_rules('nama_jadwal_tender', 'Nama Jadwal Prakualifikasi', 'required|trim', ['required' => 'Nama Jadwal Prakualifikasi Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$data = [
				'nama_jadwal_tender' => form_error('nama_jadwal_tender')
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} else {
			$data = [
				'nama_jadwal_tender' => htmlspecialchars($this->input->post('nama_jadwal_tender'))
			];
			$this->Jadwal_tender_model->update(array('id_jadwal_tender' => $this->input->post('id_jadwal_tender')), $data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}

	public function delete6($id_jadwal_tender)
	{
		$this->Jadwal_tender_model->delete($id_jadwal_tender);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}


	public function seleksiterbatas()
	{
		$this->load->view('template/header');
		$this->load->view('template/navlogin');
		$this->load->view('jadwal_seleksi_terbatas/index');
		$this->load->view('template/footer');
		$this->load->view('jadwal_seleksi_terbatas/ajax');
	}

	public function getdata7()
	{
		$result = $this->Jadwal_tender_model->getdatatable7();
		$data = [];
		$no = $_POST['start'];
		foreach ($result as $rows) {
			$row = array();
			$row[] = ++$no;
			$row[] = $rows->nama_jadwal_tender;
// 			$row[] = '<a href="#" class="btn btn-success btn-sm" onClick="byid(' . "'" . $rows->id_jadwal_tender . "','edit'" . ')"><i class="fas fa-edit"></i> Edit</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Jadwal_tender_model->count_all_data7(),
			"recordsFiltered" => $this->Jadwal_tender_model->count_filtered_data7(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function add7()
	{
		$this->form_validation->set_rules('nama_jadwal_tender', 'Nama Unit Kerja', 'required|trim', ['required' => 'Nama Jadwal Prakualifikasi Harus Diisi!']);
		if ($this->form_validation->run() == false) {
			$data = [
				'nama_jadwal_tender' => form_error('nama_jadwal_tender')
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} else {
			$data = [
				'nama_jadwal_tender' => htmlspecialchars($this->input->post('nama_jadwal_tender')),
				'id_kualifikasi' => 11
			];
			$this->Jadwal_tender_model->create($data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}

	//prakualifikasi satu file
	public function byid7($id_jadwal_tender)
	{
		$data = $this->Jadwal_tender_model->getByid($id_jadwal_tender);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function update7()
	{
		$this->form_validation->set_rules('nama_jadwal_tender', 'Nama Jadwal Prakualifikasi', 'required|trim', ['required' => 'Nama Jadwal Prakualifikasi Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$data = [
				'nama_jadwal_tender' => form_error('nama_jadwal_tender')
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} else {
			$data = [
				'nama_jadwal_tender' => htmlspecialchars($this->input->post('nama_jadwal_tender'))
			];
			$this->Jadwal_tender_model->update(array('id_jadwal_tender' => $this->input->post('id_jadwal_tender')), $data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}

	public function delete7($id_jadwal_tender)
	{
		$this->Jadwal_tender_model->delete($id_jadwal_tender);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}

	public function jadwal_pasca_jasalain()
	{
		$this->load->view('template/header');
		$this->load->view('template/navlogin');
		$this->load->view('jadwal_pasca_jasalain/index');
		$this->load->view('template/footer');
		$this->load->view('jadwal_pasca_jasalain/ajax');
	}

	public function getdata8()
	{
		$result = $this->Jadwal_tender_model->getdatatable8();
		$data = [];
		$no = $_POST['start'];
		foreach ($result as $rows) {
			$row = array();
			$row[] = ++$no;
			$row[] = $rows->nama_jadwal_tender;
// 			$row[] = '<a href="#" class="btn btn-success btn-sm" onClick="byid(' . "'" . $rows->id_jadwal_tender . "','edit'" . ')"><i class="fas fa-edit"></i> Edit</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Jadwal_tender_model->count_all_data8(),
			"recordsFiltered" => $this->Jadwal_tender_model->count_filtered_data8(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function add8()
	{
		$this->form_validation->set_rules('nama_jadwal_tender', 'Nama Jadwal Tender', 'required|trim', ['required' => 'Nama Jadwal Prakualifikasi Harus Diisi!']);
		if ($this->form_validation->run() == false) {
			$data = [
				'nama_jadwal_tender' => form_error('nama_jadwal_tender')
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} else {
			$data = [
				'nama_jadwal_tender' => htmlspecialchars($this->input->post('nama_jadwal_tender')),
				'id_kualifikasi' => 14
			];
			$this->Jadwal_tender_model->create($data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}

	//prakualifikasi satu file
	public function byid8($id_jadwal_tender)
	{
		$data = $this->Jadwal_tender_model->getByid($id_jadwal_tender);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function update8()
	{
		$this->form_validation->set_rules('nama_jadwal_tender', 'Nama Jadwal Prakualifikasi', 'required|trim', ['required' => 'Nama Jadwal Prakualifikasi Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$data = [
				'nama_jadwal_tender' => form_error('nama_jadwal_tender')
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} else {
			$data = [
				'nama_jadwal_tender' => htmlspecialchars($this->input->post('nama_jadwal_tender'))
			];
			$this->Jadwal_tender_model->update(array('id_jadwal_tender' => $this->input->post('id_jadwal_tender')), $data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}

	public function delete8($id_jadwal_tender)
	{
		$this->Jadwal_tender_model->delete($id_jadwal_tender);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}


	public function jadwal_pra_jasalain()
	{
		$this->load->view('template/header');
		$this->load->view('template/navlogin');
		$this->load->view('jadwal_pra_jasalain/index');
		$this->load->view('template/footer');
		$this->load->view('jadwal_pra_jasalain/ajax');
	}

	public function getdata9()
	{
		$result = $this->Jadwal_tender_model->getdatatable9();
		$data = [];
		$no = $_POST['start'];
		foreach ($result as $rows) {
			$row = array();
			$row[] = ++$no;
			$row[] = $rows->nama_jadwal_tender;
// 			$row[] = '<a href="#" class="btn btn-success btn-sm" onClick="byid(' . "'" . $rows->id_jadwal_tender . "','edit'" . ')"><i class="fas fa-edit"></i> Edit</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Jadwal_tender_model->count_all_data9(),
			"recordsFiltered" => $this->Jadwal_tender_model->count_filtered_data9(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function add9()
	{
		$this->form_validation->set_rules('nama_jadwal_tender', 'Nama Jadwal Tender', 'required|trim', ['required' => 'Nama Jadwal Prakualifikasi Harus Diisi!']);
		if ($this->form_validation->run() == false) {
			$data = [
				'nama_jadwal_tender' => form_error('nama_jadwal_tender')
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} else {
			$data = [
				'nama_jadwal_tender' => htmlspecialchars($this->input->post('nama_jadwal_tender')),
				'id_kualifikasi' => 15
			];
			$this->Jadwal_tender_model->create($data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}

	//prakualifikasi satu file
	public function byid9($id_jadwal_tender)
	{
		$data = $this->Jadwal_tender_model->getByid($id_jadwal_tender);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function update9()
	{
		$this->form_validation->set_rules('nama_jadwal_tender', 'Nama Jadwal Prakualifikasi', 'required|trim', ['required' => 'Nama Jadwal Prakualifikasi Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$data = [
				'nama_jadwal_tender' => form_error('nama_jadwal_tender')
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} else {
			$data = [
				'nama_jadwal_tender' => htmlspecialchars($this->input->post('nama_jadwal_tender'))
			];
			$this->Jadwal_tender_model->update(array('id_jadwal_tender' => $this->input->post('id_jadwal_tender')), $data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}

	public function delete9($id_jadwal_tender)
	{
		$this->Jadwal_tender_model->delete($id_jadwal_tender);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}
}
