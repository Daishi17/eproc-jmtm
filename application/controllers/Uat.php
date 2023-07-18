<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Uat extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Uat_model');
		$this->load->model('Panitia/Rolepanitia_model');
	}

	public function index()
	{
		$id_role =  $this->session->userdata('id_role');
		$id_pegawai = $this->session->userdata('id_pegawai');
		$id_role = $this->session->userdata('id_role');
		// var_dump($id_role);
		// die;
		$data['status_penetapan_langsung'] = $this->Rolepanitia_model->cek_role_penetapan($id_pegawai);
		$this->load->view('template/header');
		$this->load->view('template/navlogin', $data);
		$this->load->view('uat/index');
		$this->load->view('template/footer');
		$this->load->view('uat/ajax');
	}

	public function simpan_data_uat()
	{

		$this->load->library(['form_validation']);
		$this->form_validation->set_rules('nama_penguji', 'Nama Penguji', 'required|trim', ['required' => 'Nama Pegawai Wajib Diisi!']);
		$this->form_validation->set_rules('nama_divisi', 'Nama Divisi', 'required|trim', ['required' => 'Nama Pegawai Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$data['uat'] = $this->db->query("SELECT * FROM tbl_uat")->result_array();
			$this->load->view('template/header');
			$this->load->view('template/navlogin');
			$this->load->view('uat/index', $data);
			$this->load->view('template/footer');
			$this->load->view('uat/ajax');
		} else {
			$nama_penguji =  $this->input->post('nama_penguji');
			$nama_divisi = $this->input->post('nama_divisi');
			$this->session->set_userdata('nama_penguji', $nama_penguji);
			$this->session->set_userdata('nama_divisi', $nama_divisi);
			redirect('uat');
		}
	}

	public function byid($id_uat)
	{
		$data = $this->Uat_model->getByid($id_uat);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function upload()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'xlsx|xls';
		$config['file_name'] = 'doc' . time();
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('importexcel')) {
			$file = $this->upload->data();
			$reader = ReaderEntityFactory::createXLSXReader();
			$reader->open('uploads/' . $file['file_name']);
			foreach ($reader->getSheetIterator() as $sheet) {
				$numRow = 1;
				foreach ($sheet->getRowIterator() as $row) {
					if ($numRow > 1) {
						$paketrup = array(
							'deskripsi' => $row->getCellAtIndex(1),
							'id_role' => 6
						);
						$this->db->insert('tbl_uat', $paketrup);
					}
					$numRow++;
				}
				$reader->close();
				unlink('uploads/' . $file['file_name']);
				$this->session->set_flashdata('pesan', 'Data Berhasil Di Import');
				redirect('uat');
			}
		} else {
			echo "Error : " . $this->upload->display_errors();
		}
	}

	public function getdata()
	{
		$id_role = $this->session->userdata('id_role');
		$resultss = $this->Uat_model->getdatatable($id_role);

		$data = [];
		$no = $_POST['start'];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] = $angga->deskripsi;
			if ($angga->status_uat == 1) {
				$row[] = '<span class="text-success">Berhasil <i class="fa fa-check"></i> </span>';
			} else if ($angga->status_uat == 2) {
				$row[] = '<span class="text-danger">Gagal <i class="fa fa-times"></i> </span>';
			} else {
				$row[] = '';
			}
			$row[] =  $angga->nama_penguji;
			$row[] =  $angga->divisi;
			$row[] = '<a href="javascript:;" class="btn btn-block btn-success btn-sm" onClick="byidberhasil(' . "'" . $angga->id_uat . "','berhasil'" . ')"><i class="fas fa-check"></i> Berhasil</a> <a href="javascript:;" class="btn btn-block btn-danger btn-sm" onClick="byidgagal(' . "'" . $angga->id_uat . "','gagal'" . ')">  <i class="fas fa-times"></i> Gagal</a><a href="javascript:;" class="btn btn-block btn-info btn-sm" onClick="byinoted(' . "'" . $angga->id_uat . "','kirim_note'" . ')">  <i class="fas fa-note"></i>Catatan</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Uat_model->count_all_data($id_role),
			"recordsFiltered" => $this->Uat_model->count_filtered_data($id_role),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function berhasil($id_uat)
	{
		$nama_penguji =  $this->session->userdata('nama_penguji');
		$nama_divisi =  $this->session->userdata('nama_divisi');
		$data = [
			'nama_penguji' => $nama_penguji,
			'divisi' => $nama_divisi,
			'status_uat' => 1
		];
		$this->Uat_model->update(array('id_uat' => $id_uat), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}

	public function gagal($id_uat)
	{
		$nama_penguji =  $this->session->userdata('nama_penguji');
		$nama_divisi =  $this->session->userdata('nama_divisi');
		$data = [
			'nama_penguji' => $nama_penguji,
			'divisi' => $nama_divisi,
			'status_uat' => 2
		];
		$this->Uat_model->update(array('id_uat' => $id_uat), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}
	public function exportpdfuat()
	{
		$data['uat'] = $this->Uat_model->getall_uat();
		$this->load->view('template/header');
		$this->load->view('uat/export_pdf_uat', $data);
	}


	public function save_note()
	{
		$id_uat =  $this->input->post('id_uat');
		$catatan =  $this->input->post('catatan');
		$data = [
			'catatan' => $catatan,
		];
		$this->Uat_model->update(array('id_uat' => $id_uat), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}
}
