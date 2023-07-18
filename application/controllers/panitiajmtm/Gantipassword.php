<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gantipassword extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
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
		$this->load->view('template/header');
		$this->load->view('template/navlogin', $data);
		$this->load->view('panitia_view/gantipassword/index');
		$this->load->view('template/footer');
		$this->load->view('panitia_view/gantipassword/ajax');
	}
}
