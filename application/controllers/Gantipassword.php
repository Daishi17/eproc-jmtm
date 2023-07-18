<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gantipassword extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library(['form_validation']);
		$this->load->model('Pegawai/Pegawai_model');
		$this->load->model('Panitia/Rolepanitia_model', 'Rolepanitia_model');
$role = $this->session->userdata('id_role');
		if (!$role) {
			redirect('auth');
		} else {
		}


	}
	public function index()
	{$id_pegawai = $this->session->userdata('id_pegawai');
$data['status_penetapan_langsung'] = $this->Rolepanitia_model->cek_role_penetapan($id_pegawai);
		$this->load->view('template/header');
		$this->load->view('template/navlogin',$data);
		$this->load->view('gantipassword/index');
		$this->load->view('template/footer');
		$this->load->view('gantipassword/gantipasswordjs');
	}

	public function edit_password()
	{

		$this->form_validation->set_rules('password', 'Password', 'required|trim|matches[password2]', ['required' => 'Password Wajib Diisi!', 'matches' => 'Password Tidak Sama']);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]', ['required' => 'Password Verifikasi harus diisi!', 'matches' => 'Password Tidak Sama']);
		if ($this->form_validation->run() == false) {
			$this->load->view('template/header');
			$this->load->view('template/navlogin');
			$this->load->view('gantipassword/index');
			$this->load->view('template/footer');
			$this->load->view('gantipassword/gantipasswordjs');
		} else {
			$password  = $this->input->post('password');
			$data = [
				'password' => password_hash($password, PASSWORD_DEFAULT),
			];
			$this->Pegawai_model->updatepassword($data, $this->session->userdata('id_pegawai'));
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhasil Ditambah!</div>');
			redirect('gantipassword');
		}
	}
}
