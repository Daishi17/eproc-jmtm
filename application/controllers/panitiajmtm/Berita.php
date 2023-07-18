<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
class Berita extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Berita/Berita_model');
		$this->load->model('Panitia/Rolepanitia_model', 'Rolepanitia_model');
		$role = $this->session->userdata('id_role');
		if (!$role) {
			redirect('auth');
		} else {
		}

	}

	public function index()
	{
		$id_pegawai = $this->session->userdata('id_pegawai');
		$data['status_penetapan_langsung'] = $this->Rolepanitia_model->cek_role_penetapan($id_pegawai);
		$this->load->view('template_panitia/header');
		$this->load->view('template/navlogin', $data);
		$this->load->view('panitia_view/berita/index');
		$this->load->view('template_panitia/footer');
		$this->load->view('panitia_view/berita/ajax');
	}

	public function getdata7()
	{
		$result = $this->Berita_model->getdatatable7();
		$data = [];
		$no = $_POST['start'];
		foreach ($result as $rows) {
			$row = array();
			$row[] = ++$no;
			$row[] = $rows->nama_berita;
			$row[] = $rows->created_at;
			$row[] = $rows->nama_pembuat;
			$row[] = '<a href="#" class="btn btn-success btn-sm" onClick="byid(' . "'" . $rows->id_berita . "','edit'" . ')"><i class="fas fa-edit"></i> Edit</a> <a href="#" class="btn btn-danger btn-sm" onClick="byid(' . "'" . $rows->id_berita . "','hapus'" . ')">  <i class="fas fa-trash"></i> Hapus</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Berita_model->count_all_data7(),
			"recordsFiltered" => $this->Berita_model->count_filtered_data7(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function add7()
	{
		$this->form_validation->set_rules('nama_berita', 'Nama Berita', 'required|trim', ['required' => 'Nama Berita Harus Diisi!']);
		if ($this->form_validation->run() == false) {
			$data = [
				'nama_berita' => form_error('nama_berita')
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} else {
			$config['upload_path'] = './file_berita/';
			$config['allowed_types'] = 'pdf';
			$config['max_size'] = 0;
			$this->load->library('upload', $config);

			if ($this->upload->do_upload('file_berita')) {

				$fileData = $this->upload->data();

				$upload = [
					'nama_berita' => htmlspecialchars($this->input->post('nama_berita')),
					'created_at' => date('Y-m-d H:i'),
					'nama_pembuat' => $this->session->userdata('nama_pegawai'),
					'file_berita' => $fileData['file_name'],
				];
				$this->Berita_model->create7($upload);
				$this->output->set_content_type('application/json')->set_output(json_encode('success'));
			} else {
				$this->session->set_flashdata('error', $this->upload->display_errors());
				redirect(base_url('upload'));
			}
		}
	}

	//prakualifikasi satu file
	public function byid7($id_jadwal_tender)
	{
		$data = $this->Berita_model->getByid7($id_jadwal_tender);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function update7()
	{
		$this->form_validation->set_rules('nama_berita', 'Nama Berita', 'required|trim', ['required' => 'Nama Berita Harus Diisi!']);
		if ($this->form_validation->run() == false) {
			$data = [
				'nama_berita' => form_error('nama_berita')
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} else {

			$config['upload_path'] = './file_berita/';
			$config['allowed_types'] = 'pdf';
			$config['max_size'] = 0;
			$this->load->library('upload', $config);

			if ($this->upload->do_upload('file_berita')) {


				$fileData = $this->upload->data();

				$upload = [
					'nama_berita' => htmlspecialchars($this->input->post('nama_berita')),
					'created_at' => date('Y-m-d H:i'),
					'nama_pembuat' => $this->session->userdata('nama_pegawai'),
					'file_berita' => $fileData['file_name'],
				];
				$this->Berita_model->update7(array('id_berita' => $this->input->post('id_berita')), $upload);
				$this->output->set_content_type('application/json')->set_output(json_encode('success'));
			} else {
				$this->session->set_flashdata('error', $this->upload->display_errors());
				redirect(base_url('upload'));
			}
		}
	}

	public function delete7($id_jadwal_tender)
	{
		$this->Berita_model->delete7($id_jadwal_tender);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}
}
