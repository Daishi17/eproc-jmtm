<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Pegawai/Pegawai_model');
	}

	public function index()
	{
		$this->load->view('template_panitia/header');
		$this->load->view('template/navlogin');
		$this->load->view('pegawai/index');
		$this->load->view('template_panitia/footer');
		$this->load->view('pegawai/ajax');
	}

	//get data PEGAWAI serverside
	public function get_pegawai()
	{
		$result = $this->Pegawai_model->getdatatable();
		$data = [];
		$no = $_POST['start'];
		foreach ($result as $pegawai) {
			$row = array();
			$row[] = ++$no;
			$row[] = $pegawai->nama_pegawai;
			$row[] = $pegawai->nip;
			$row[] = $pegawai->username;
			$row[] = $pegawai->nama_role;
			if ($pegawai->status_login == 1) {
				$row[] = '<label for="" class="badge badge-success">Sedang Aktif</label>';
			} else {
				$row[] = '<label for="" class="badge badge-danger">Sedang Offline</label>';
			}
			if ($pegawai->waktu_login) {
				$row[] = date('d-m-Y', strtotime($pegawai->waktu_login));
			} else {
				$row[] = 'Tidak ada';
			}



			$row[] = '<a href="javascript:;" class="btn btn-success btn-sm" onClick="byid(' . "'" . $pegawai->id_pegawai . "','edit'" . ')"><i class="fas fa-edit"></i> Edit</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Pegawai_model->count_all_data(),
			"recordsFiltered" => $this->Pegawai_model->count_filtered_data(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function get_by_id($id_pegawai)
	{
		$get_pegawai = $this->Pegawai_model->getById($id_pegawai);
		$output = [
			"get_pegawai" => $get_pegawai
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function tambahpegawai()
	{
		$this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required|trim', ['required' => 'Nama Pegawai Wajib Diisi!']);
		$this->form_validation->set_rules('nip', 'NIP', 'required|trim|is_unique[tbl_pegawai.nip]', ['required' => 'NIP Wajib Diisi!']);
		$this->form_validation->set_rules('username', 'User ID', 'trim|required|is_unique[tbl_pegawai.username]', ['required' => 'User ID Wajib Diisi!', 'is_unique' => 'Username Sudah Terdaftar']);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|matches[password2]', ['required' => 'Password Wajib Diisi!', 'matches' => 'Password Tidak Sama']);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]', ['required' => 'Password Verifikasi harus diisi!', 'matches' => 'Password Tidak Sama']);
		$this->form_validation->set_rules('telepon', 'No Telpon', 'required|trim', ['required' => 'No Telpon Wajib Diisi!']);
		$this->form_validation->set_rules('email', 'Email Pegawai', 'required|trim|valid_email|is_unique[tbl_pegawai.email]', ['required' => 'Email Email Pegawai Wajib Diisi!', 'valid_email' => 'Email Tidak Valid',  'is_unique' => 'Email Sudah Terdaftar']);
		$this->form_validation->set_rules('id_role', 'Role', 'required|trim', ['required' => 'Role Wajib Diisi!']);
		$this->form_validation->set_rules('no_sk', 'No. SK', 'required|trim', ['required' => 'No. SK Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$data['role'] = $this->Pegawai_model->getRole();
			$data['unit'] = $this->Pegawai_model->ambil_unit_kerja();
			$this->load->view('template_panitia/header');
			$this->load->view('template/navlogin');
			$this->load->view('pegawai/tambahpegawai', $data);
			$this->load->view('template_panitia/footer');
			$this->load->view('pegawai/ajax');
		} else {
			$nama_pegawai  = $this->input->post('nama_pegawai');
			$nip  = $this->input->post('nip');
			$username  = $this->input->post('username');
			$password  = $this->input->post('password');
			$alamat = $this->input->post('alamat');
			$telepon = $this->input->post('telepon');
			$email = $this->input->post('email');
			$jabatan = $this->input->post('jabatan');
			$status = $this->input->post('status');
			$id_role = $this->input->post('id_role');
			$no_sk = $this->input->post('no_sk');
			$masa_berlaku_sk = $this->input->post('masa_berlaku_sk');
			$data = [
				'nama_pegawai' => $nama_pegawai,
				'nip' => $nip,
				'username' => $username,
				'password' => password_hash($password, PASSWORD_DEFAULT),
				'alamat' => $alamat,
				'telepon' => $telepon,
				'email' => $email,
				'jabatan' => $jabatan,
				'status' => $status,
				'id_role' => $id_role,
				'no_sk' => $no_sk,
				'masa_berlaku_sk' => $masa_berlaku_sk
			];
			$this->Pegawai_model->insert($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhasil Ditambah!</div>');
			redirect('pegawai');
		}
	}

	public function editpegawai($id_pegawai)
	{
		$data['pegawai'] = $this->Pegawai_model->getById($id_pegawai);
		$data['role'] = $this->Pegawai_model->getRole();
		$data['unit'] = $this->Pegawai_model->ambil_unit_kerja();
		$this->load->view('template_panitia/header');
		$this->load->view('template/navlogin');
		$this->load->view('pegawai/edit', $data);
		$this->load->view('template_panitia/footer');
		$this->load->view('pegawai/ajax', $data);
	}


	public function savepegawai()
	{
		$id_pegawai = $this->input->post('id_pegawai');
		$data['pegawai'] = $this->Pegawai_model->getById($id_pegawai);
		$nip_asli = $data['pegawai']['nip'];
		$email_asli = $data['pegawai']['email'];
		$username_asli = $data['pegawai']['username'];
		$username_  = $this->input->post('username');
		$nip_  = $this->input->post('nip');
		$email_  = $this->input->post('email');

		if ($nip_ != $nip_asli) {
			$is_unique_nip =  '|is_unique[tbl_pegawai.nip]';
		} else {
			$is_unique_nip =  '';
		}
		if ($email_ != $email_asli) {
			$is_unique_email =  '|is_unique[tbl_pegawai.email]';
		} else {
			$is_unique_email =  '';
		}
		if ($username_ != $username_asli) {
			$is_unique_username =  '|is_unique[tbl_pegawai.username]';
		} else {
			$is_unique_username =  '';
		}
		$this->form_validation->set_rules('nip', 'NIP', 'required|trim|xss_clean' . $is_unique_nip, ['required' => 'NIP Wajib Diisi!', 'is_unique' => 'Nip Pegawai Sudah Terdaftar']);
		$this->form_validation->set_rules('email', 'Email Pegawai', 'required|trim|xss_clean' . $is_unique_email, ['required' => 'Email Wajib Diisi!', 'is_unique' => 'Email Pegawai Sudah Terdaftar']);
		$this->form_validation->set_rules('username', 'Username Pegawai', 'required|trim|xss_clean' . $is_unique_username, ['required' => 'Username Wajib Diisi!', 'is_unique' => 'Username Pegawai Sudah Terdaftar']);
		// $this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required|trim|unique', ['required' => 'Nama Pegawai Wajib Diisi!', 'unique' => 'Nama Pegawai Sudah Terdaftar']);
		$this->form_validation->set_rules('telepon', 'No Telpon', 'required|trim', ['required' => 'No Telpon Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$data = [
				// 'nama_pegawai' => form_error('nama_pegawai'),
				'username' => form_error('username'),
				'email' => form_error('email'),
				'nip' => form_error('nip'),
				'telepon' => form_error('telepon'),
				'no_sk' => form_error('no_sk'),
				'id_role' => form_error('id_role'),
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} else {
			$data = [
				'nama_pegawai' => $this->input->post('nama_pegawai'),
				'nip' => $this->input->post('nip'),
				'username' => $this->input->post('username'),
				'alamat' => $this->input->post('alamat'),
				'telepon' =>  $this->input->post('telepon'),
				'email' => $this->input->post('email'),
				'id_unit_kerja2' => $this->input->post('jabatan'),
				'jabatan' => $this->input->post('jabatan'),
				'status' => $this->input->post('status'),
				'id_role' => $this->input->post('id_role'),
				'no_sk' => $this->input->post('no_sk'),
				'masa_berlaku_sk' => $this->input->post('masa_berlaku_sk')
			];
			// var_dump($data);
			// die;
			$this->Pegawai_model->update($data, $id_pegawai);
			$this->output->set_content_type('application/json')->set_output(json_encode('berhasil'));
		}
	}

	public function gantipassword($id_pegawai)
	{
		$this->form_validation->set_rules('password', 'Password', 'required|trim|matches[password2]', ['required' => 'Password Wajib Diisi!', 'matches' => 'Password Tidak Sama']);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]', ['required' => 'Password Wajib Diisi!', 'matches' => 'Password Tidak Sama']);

		if ($this->form_validation->run() == false) {
			$data['pegawai'] = $this->Pegawai_model->getById($id_pegawai);
			$data['role'] = $this->Pegawai_model->getRole();
			$this->load->view('template_panitia/header');
			$this->load->view('template/navlogin');
			$this->load->view('pegawai/gantipassword', $data);
			$this->load->view('template_panitia/footer');
			$this->load->view('pegawai/ajax', $data);
		} else {

			$id_pegawai = $this->input->post('id_pegawai');
			$password  = $this->input->post('password');
			$data = [
				'password' => password_hash($password, PASSWORD_DEFAULT)
			];
			// var_dump($data);
			// die;
			$this->Pegawai_model->updatepassword($data, $id_pegawai);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Password Berhasil Diganti!</div>');
			redirect('pegawai/editpegawai/' . $id_pegawai);
		}
	}

	public function hapuspegawai($id_pegawai)
	{
		$this->Pegawai_model->delete($id_pegawai);
		$this->output->set_content_type('application/json')->set_output(json_encode('berhasil'));
	}

	public function detailpegawai()
	{
		$this->load->view('template_panitia/header');
		$this->load->view('template/navlogin');
		$this->load->view('pegawai/detailpegawai');
		$this->load->view('template_panitia/footer');
		$this->load->view('pegawai/ajax');
	}
}
