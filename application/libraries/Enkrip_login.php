<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Enkrip_login
{
	protected $ci;

	public function __construct()
	{
		$this->ci = &get_instance();
		$this->ci->load->model('Enkrip/Enkrip_model');
	}

	public function login($username, $password)
	{
		$user = $this->ci->Enkrip_model->login($username, $password);
		if ($user) {
			//cek passwordnya
			if (password_verify($password, $user['password'])) {
				$data = [
					'username_enkrip' => $user['username']
				];
				$this->ci->session->set_userdata($data);
				redirect('buka_penawaran/cektoken');
			} else {
				$this->ci->session->set_flashdata('salah', 'Username Atau Password Salah');
				redirect('buka_penawaran');
			}
		} else {
			$this->ci->session->set_flashdata('tidakada', 'Username Tidak ada');
			redirect('buka_penawaran');
		}
	}

	public function cek_login()
	{
		if ($this->ci->session->userdata('username_enkrip') == "") {
			$this->ci->session->set_flashdata('pesan', 'Anda Belom Login !!!');
			redirect('buka_penawaran');
		}
	}
	public function logout()
	{
		$this->ci->session->unset_userdata('username_enkrip');
		redirect('buka_penawaran');
	}

	// $user = $this->ci->Enkrip_model->login($username, $password);
	// 	if ($cek) {
	// 		$username = $cek->username;
	// 		// buat session
	// 		redirect('Rmnb63cu7n34g175he2mpsgqx075ldcxu1epeaz37h4pbt8v1l8ld32pe3cu7n34g175he2mpsgqx05he2mpsgqx0/cektoken');
	// 	} else {
	// 		$this->ci->session->set_flashdata('salah', 'Username Atau Password Salah');
	// 		redirect('Rmnb63cu7n34g175he2mpsgqx075ldcxu1epeaz37h4pbt8v1l8ld32pe3cu7n34g175he2mpsgqx05he2mpsgqx0');
	// 	}
}
