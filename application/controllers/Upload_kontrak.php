<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Upload_kontrak extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Uat_model');
		$this->load->model('Panitia/Rolepanitia_model');
        $this->load->model('Paket/Paket_model');
		$this->load->model('Rup/Rup_model');
		
	}

	public function index()
	{
		$id_role =  $this->session->userdata('id_role');
		$id_pegawai = $this->session->userdata('id_pegawai');
		$id_role = $this->session->userdata('id_role');
		// var_dump($id_role);
		// die;
		$data['getdivisi'] = $this->Rup_model->get_devisi();
		$data['status_penetapan_langsung'] = $this->Rolepanitia_model->cek_role_penetapan($id_pegawai);
		$this->load->view('template/header');
		$this->load->view('template/navlogin', $data);
		$this->load->view('upload_kontrak/index');
		$this->load->view('template/footer');
		$this->load->view('upload_kontrak/ajax');
	}


    public function data_get_doukumen_kontrak_pdf()
	{
		$resultss = $this->Paket_model->getdatatableDokumen_kontrak();
		$no = $_POST['start'];
		// $total = 0;
		$data = [];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] = $angga->nama_unit_kerja;
			$row[] = $angga->nama_pengadaaan_kontrak;
            $row[] = $angga->nama_file_dokumen_kontrak;
			$row[] = '<a target="_blank" href=' . base_url('/file_dokumen_kontrak' . '/' . $angga->file_dokumen_kontrak) . '>' . '<img width="30px" src=' . base_url('assets/img/pdf.png') . ' >' . '</a>';
			$row[] = '<a href="javascript:;" class="btn btn-danger  btn-block btn-sm" onClick="by_id(' . "'" . $angga->id_dokumen_kontrak . "','hapus_dokumen'" . ')">  <i class="fas fa-trash"></i> Hapus</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Paket_model->count_all_dataDokumen_kontrak(),
			"recordsFiltered" => $this->Paket_model->count_filtered_Dokumen_kontrak(),
			"data" => $data,
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}


	public function by_id($id_dokumen_kontrak)
	{

		$data = $this->Paket_model->get_by_id_dokumen_kontrak($id_dokumen_kontrak);
		$output = [
			"get_dokumen_kontrak" => $data,
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}


	public function add_doukumen_kontrak_pdf()
	{
        $id_unit_kerja = $this->session->userdata('id_unit_kerja2');
		$nama_pengadaaan_kontrak = $this->input->post('nama_pengadaaan_kontrak');
		$nama_file_dokumen_kontrak = $this->input->post('nama_file_dokumen_kontrak');
		$config['upload_path'] = './file_dokumen_kontrak/';
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = 0;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('file_dokumen_kontrak')) {

			$fileData = $this->upload->data();

			$upload = [
				'id_unit_kerja' => $id_unit_kerja,
				'nama_pengadaaan_kontrak' => $nama_pengadaaan_kontrak,
                'nama_file_dokumen_kontrak' => $nama_file_dokumen_kontrak,
				'file_dokumen_kontrak' => $fileData['file_name'],
			];
			$this->Paket_model->create_dokumen_kontrak($upload);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		} else {
			$this->session->set_flashdata('error', $this->upload->display_errors());
			redirect(base_url('upload'));
		}
	}

	public function hapus_dokumen($id_dokumen_kontrak)
	{
		$this->Paket_model->deletedata_dokumen_kontrak($id_dokumen_kontrak);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}
}
