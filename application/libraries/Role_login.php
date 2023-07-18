<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Role_login
{
	protected $ci;

	public function __construct()
	{
		$this->ci = &get_instance();
		$this->ci->load->model('Auth_model');
	}

	public function login($username, $password)
	{

		$cek = $this->ci->Auth_model->login($username);
		if ($cek) {
			if ($cek && password_verify($password, $cek->password)) {
				if ($cek->status == 1) {

					$sekarang = date('Y-m-d H:i');
					$data = [
						'waktu_login' => $sekarang,
						'alamat_ip' => $this->ci->input->ip_address(),
						'id_pegawai' => $cek->id_pegawai
					];
					$status_login = [
						'status_login' => 1,
						'waktu_login' => $sekarang,
					];
					$pegawai = [
						'id_pegawai' => $cek->id_pegawai
					];
					$this->ci->Auth_model->insert_log($data);
					$this->ci->Auth_model->status_login($status_login, $pegawai);

					$username = $cek->username;
					$nip = $cek->nip;
					$nama_pegawai = $cek->nama_pegawai;
					$id_pegawai = $cek->id_pegawai;
					$id_role = $cek->id_role;
					$id_unit_kerja = $cek->id_unit_kerja;
					$id_unit_kerja2 = $cek->id_unit_kerja2;
					$nama_unit_kerja = $cek->nama_unit_kerja;
					$id_role_panitia = $cek->id_role_panitia;
					$id_panitia = $cek->id_panitia;
					$nama_role_panitia = $cek->nama_role_panitia;
					$jabatan = $cek->jabatan;

					// buat session
					$this->ci->session->set_userdata('username', $username);
					$this->ci->session->set_userdata('nip', $nip);
					$this->ci->session->set_userdata('nama_pegawai', $nama_pegawai);
					$this->ci->session->set_userdata('id_pegawai', $id_pegawai);
					$this->ci->session->set_userdata('id_role', $id_role);
					$this->ci->session->set_userdata('id_unit_kerja2', $id_unit_kerja2);
					$this->ci->session->set_userdata('nama_unit_kerja', $nama_unit_kerja);
					$this->ci->session->set_userdata('id_role_panitia', $id_role_panitia);
					$this->ci->session->set_userdata('id_panitia', $id_panitia);
					$this->ci->session->set_userdata('nama_role_panitia', $nama_role_panitia);
					$this->ci->session->set_userdata('jabatan', $jabatan);
					if ($this->ci->session->userdata('id_role') == 1) {
						redirect('beranda');
					} else if ($this->ci->session->userdata('id_role') == 3) {
						redirect('panitiajmtm/beranda');
					} else if ($this->ci->session->userdata('id_role') == 2) {
						redirect('beranda');
					} else if ($this->ci->session->userdata('id_role') == 4) {
						redirect('index.php/vendor/dashboard');
					} else if ($this->ci->session->userdata('id_role') == 6) {
						redirect('beranda');
					} else if ($this->ci->session->userdata('id_role') == 7) {
						redirect('penetapanlangsung');
					} else if ($this->ci->session->userdata('id_role') == 8) {
						redirect('gm/beranda');
					}
				} else {
					$this->ci->session->set_flashdata('tidak_aktif', 'Username Tidak Aktif');
					redirect('auth');
				}
			} else {
				$this->ci->session->set_flashdata('salah', 'Username Atau Password Salah');
				redirect('auth');
			}
		} else {
			$this->ci->session->set_flashdata('salah', 'Username Tidak Terdaftar');
			redirect('auth');
		}
	}
	public function cek_login()
	{
		if ($this->ci->session->userdata('username') == "") {
			$this->ci->session->set_flashdata('pesan', 'Anda Belom Login !!!');
			redirect('auth');
		}
	}
	public function logout()
	{
		$id_pegawai = $this->ci->session->userdata('id_pegawai');
		$status_login = [
			'status_login' => 0
		];
		$pegawai = [
			'id_pegawai' => $id_pegawai
		];
		$this->ci->Auth_model->status_login($status_login, $pegawai);
		$this->ci->session->unset_userdata('username');
		$this->ci->session->unset_userdata('nip');
		$this->ci->session->unset_userdata('nama_pegawai');
		$this->ci->session->unset_userdata('id_pegawai');
		$this->ci->session->unset_userdata('id_role');
		$this->ci->session->unset_userdata('id_unit_kerja2');
		$this->ci->session->unset_userdata('nama_unit_kerja');
		$this->ci->session->unset_userdata('id_role_panitia');
		$this->ci->session->unset_userdata('id_panitia');
		$this->ci->session->unset_userdata('nama_role_panitia');
		$this->ci->session->unset_userdata('jabatan');
		$this->ci->session->unset_userdata('nama_penguji');
		$this->ci->session->unset_userdata('nama_divisi');
		$this->ci->session->set_flashdata('berhasil', 'Anda Berhasil Logout');

		redirect('home');
	}
}
