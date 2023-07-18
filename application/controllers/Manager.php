<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manager extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('Manager/Manager_model');
      $this->load->helper('form');
      $this->load->model('Area/Area_model');
      $this->load->model('Rup/Rup_model');
      $this->load->model('Pegawai/Pegawai_model');
      $this->load->library(['form_validation']);
      $this->load->model('Wilayah/Wilayah_model');
   }
   public function index()
   {
      $this->load->view('template_panitia/header');
      $this->load->view('template/navlogin');
      $this->load->view('manager/index');
      $this->load->view('template_panitia/footer');
      $this->load->view('manager/ajax');
   }

   public function tambah_manager()
   {
      $data['getdivisi'] = $this->Rup_model->get_devisi();
      $data['pegawai'] = $this->Manager_model->getPegawai();
      $data['area'] = $this->Area_model->getArea();
      $data['kabupaten'] = $this->Wilayah_model->getAllKabupaten();
      $data['provinsi'] = $this->Wilayah_model->getProvinsi();
      $this->load->view('template_panitia/header');
      $this->load->view('template/navlogin');
      $this->load->view('manager/tambah_manager', $data);
      $this->load->view('template_panitia/footer');
      $this->load->view('manager/ajax');
   }
   public function edit_manager($id_pegawai)
   {
      $data['getdivisi'] = $this->Rup_model->get_devisi();
      $data['pegawai'] = $this->Manager_model->getPegawai();
      $data['area'] = $this->Area_model->getArea();
      $data['kabupaten'] = $this->Wilayah_model->getAllKabupaten();
      $data['provinsi'] = $this->Wilayah_model->getProvinsi();
      $data['agency'] = $this->Manager_model->getAllByIdAgency($id_pegawai);
      $this->load->view('template_panitia/header');
      $this->load->view('template/navlogin');
      $this->load->view('manager/edit_manager', $data);
      $this->load->view('template_panitia/footer');
      $this->load->view('manager/ajax');
   }
   public function getdata()
   {
      $resultss = $this->Manager_model->getdatatable();
      $data = [];
      $no = $_POST['start'];
      foreach ($resultss as $angga) {
         $row = array();
         $row[] = ++$no;
         $row[] = $angga->nama_pegawai;
         $row[] = $angga->nip;
         $row[] = $angga->nama_unit_kerja;
         $row[] = $angga->alamat;
         $row[] = $angga->telepon;
         $row[] = $angga->tanggal_pendaftaran;
         $row[] = $angga->no_sk;
         $row[] = '<a href="#" class="btn btn-success btn-sm btn-block" onClick="byid(' . "'" . $angga->id_pegawai . "','edit'" . ')"><i class="fas fa-edit"></i> Edit</a>';
         $data[] = $row;
      }
      $output = array(
         "draw" => $_POST['draw'],
         "recordsTotal" => $this->Manager_model->count_all_data(),
         "recordsFiltered" => $this->Manager_model->count_filtered_data(),
         "data" => $data
      );
      $this->output->set_content_type('application/json')->set_output(json_encode($output));
   }
   public function add()
   {
      $this->form_validation->set_rules('nama_pegawai', 'Nama Agency', 'required|trim', ['required' => 'Nama Agency Wajib Diisi!']);
      $this->form_validation->set_rules('username', 'Username Agency', 'required|trim', ['required' => 'Username Agency Wajib Diisi!']);
      $this->form_validation->set_rules('password', 'Password Agency', 'required|trim', ['required' => 'Password Agency Wajib Diisi!']);
      $this->form_validation->set_rules('email', 'Email Pegawai', 'required|trim|valid_email|is_unique[tbl_pegawai.email]', ['required' => 'Email Email Pegawai Wajib Diisi!', 'valid_email' => 'Email Tidak Valid',  'is_unique' => 'Email Sudah Terdaftar']);
      $this->form_validation->set_rules('nip', 'Nip Pegawai', 'required|trim|is_unique[tbl_pegawai.nip]', ['required' => 'NIP NIP Pegawai Wajib Diisi!', 'is_unique' => 'NIP Sudah Terdaftar']);
      $this->form_validation->set_rules('alamat', 'Alamat Agency', 'required|trim', ['required' => 'Alamat Agency Wajib Diisi!']);
      $this->form_validation->set_rules('id_provinsi', 'Provinsi', 'required|trim', ['required' => 'Provinsi Wajib Diisi!']);
      $this->form_validation->set_rules('id_kabupaten', 'Kabupaten', 'required|trim', ['required' => 'Kabupaten Wajib Diisi!']);
      $this->form_validation->set_rules('telepon', 'telepon', 'required|trim', ['required' => 'telepon Wajib Diisi!']);
      $this->form_validation->set_rules('no_sk', 'Nomor Sk Agency', 'required|trim', ['required' => 'Nomor Sk Agency Wajib Diisi!']);
      $this->form_validation->set_rules('id_unit_kerja', 'Divisi', 'required|trim', ['required' => 'Divisi Wajib Diisi!']);
      if ($this->form_validation->run() == false) {
         $data = [
            'nama_pegawai' => form_error('nama_pegawai'),
            'username' => form_error('username'),
            'password' => form_error('password'),
            'email' => form_error('email'),
            'nip' => form_error('nip'),
            'alamat' => form_error('alamat'),
            'id_provinsi' => form_error('id_provinsi'),
            'id_kabupaten' => form_error('id_kabupaten'),
            'telepon' => form_error('telepon'),
            'no_sk' => form_error('no_sk'),
            'id_unit_kerja2' => form_error('id_unit_kerja'),
         ];
         $this->output->set_content_type('application/json')->set_output(json_encode($data));
      } else {
         $password = $this->input->post('password');
         $data = [
            'nama_pegawai' => htmlspecialchars($this->input->post('nama_pegawai')),
            'username' => htmlspecialchars($this->input->post('username')),
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'email' => htmlspecialchars($this->input->post('email')),
            'nip' => htmlspecialchars($this->input->post('nip')),
            'alamat' => htmlspecialchars($this->input->post('alamat')),
            'id_provinsi' => htmlspecialchars($this->input->post('id_provinsi')),
            'id_kabupaten' => htmlspecialchars($this->input->post('id_kabupaten')),
            'telepon' => htmlspecialchars($this->input->post('telepon')),
            'jabatan' => 'Manager',
            'no_sk' => htmlspecialchars($this->input->post('no_sk')),
            'id_unit_kerja2' => htmlspecialchars($this->input->post('id_unit_kerja')),
            'id_role' => 6,
         ];
         $this->Manager_model->create($data);
         $this->output->set_content_type('application/json')->set_output(json_encode('berhasil'));
      }
   }

   public function update()
   {
      $id_pegawai = $this->input->post('id_pegawai');
      $data['pegawai'] = $this->Pegawai_model->getById($id_pegawai);
      $nip_asli = $data['pegawai']['nip'];
      $email_asli = $data['pegawai']['email'];
      $username_asli = $data['pegawai']['username'];
      $username  = $this->input->post('username');
      $nip  = $this->input->post('nip');
      $email  = $this->input->post('email');

      if ($nip != $nip_asli) {
         $is_unique_nip =  '|is_unique[tbl_pegawai.nip]';
      } else {
         $is_unique_nip =  '';
      }
      if ($email != $email_asli) {
         $is_unique_email =  '|is_unique[tbl_pegawai.email]';
      } else {
         $is_unique_email =  '';
      }
      if ($username != $username_asli) {
         $is_unique_username =  '|is_unique[tbl_pegawai.username]';
      } else {
         $is_unique_username =  '';
      }
      $this->form_validation->set_rules('nip', 'NIP', 'required|trim|xss_clean' . $is_unique_nip, ['required' => 'NIP Wajib Diisi!', 'is_unique' => 'Nip Pegawai Sudah Terdaftar']);
      $this->form_validation->set_rules('email', 'Email Pegawai', 'required|trim|xss_clean' . $is_unique_email, ['required' => 'Email Wajib Diisi!', 'is_unique' => 'Email Pegawai Sudah Terdaftar']);
      $this->form_validation->set_rules('username', 'Username Pegawai', 'required|trim|xss_clean' . $is_unique_username, ['required' => 'Username Wajib Diisi!', 'is_unique' => 'Username Pegawai Sudah Terdaftar']);

      $this->form_validation->set_rules('nama_pegawai', 'Nama Agency', 'required|trim', ['required' => 'Nama Agency Wajib Diisi!']);
      $this->form_validation->set_rules('alamat', 'Alamat Agency', 'required|trim', ['required' => 'Alamat Agency Wajib Diisi!']);
      $this->form_validation->set_rules('id_provinsi', 'Provinsi', 'required|trim', ['required' => 'Provinsi Wajib Diisi!']);
      $this->form_validation->set_rules('id_kabupaten', 'Kabupaten', 'required|trim', ['required' => 'Kabupaten Wajib Diisi!']);
      $this->form_validation->set_rules('telepon', 'telepon', 'required|trim', ['required' => 'telepon Wajib Diisi!']);
      $this->form_validation->set_rules('id_pegawai', 'Nama Penanggung Jawab', 'required|trim', ['required' => 'Nama Penanggung Jawab Wajib Diisi!']);
      $this->form_validation->set_rules('no_sk', 'Nomor Sk Agency', 'required|trim', ['required' => 'Nomor Sk Agency Wajib Diisi!']);
      $this->form_validation->set_rules('id_unit_kerja', 'Divisi', 'required|trim', ['required' => 'Divisi Wajib Diisi!']);
      if ($this->form_validation->run() == false) {
         $data = [
            'nama_pegawai' => form_error('nama_pegawai'),
            'username' => form_error('username'),
            'email' => form_error('email'),
            'nip' => form_error('nip'),
            'alamat' => form_error('alamat'),
            'id_provinsi' => form_error('id_provinsi'),
            'id_kabupaten' => form_error('id_kabupaten'),
            'telepon' => form_error('telepon'),
            'no_sk' => form_error('no_sk'),
            'id_unit_kerja2' => form_error('id_unit_kerja'),
         ];
         $this->output->set_content_type('application/json')->set_output(json_encode($data));
      } else {
         $data = [
            'nama_pegawai' => htmlspecialchars($this->input->post('nama_pegawai')),
            'username' => htmlspecialchars($this->input->post('username')),
            'email' => htmlspecialchars($this->input->post('email')),
            'nip' => htmlspecialchars($this->input->post('nip')),
            'alamat' => htmlspecialchars($this->input->post('alamat')),
            'id_provinsi' => htmlspecialchars($this->input->post('id_provinsi')),
            'id_kabupaten' => htmlspecialchars($this->input->post('id_kabupaten')),
            'telepon' => htmlspecialchars($this->input->post('telepon')),
            'telepon' => htmlspecialchars($this->input->post('telepon')),
            'no_sk' => htmlspecialchars($this->input->post('no_sk')),
            'jabatan' => 'Manager',
            'id_unit_kerja2' => htmlspecialchars($this->input->post('id_unit_kerja')),
            'id_role' => 6,
         ];
         $this->Manager_model->update(array('id_pegawai' => $this->input->post('id_pegawai')), $data);
         $this->output->set_content_type('application/json')->set_output(json_encode('berhasil'));
      }
   }

   public function byid($id_pegawai)
   {
      $data = $this->Manager_model->getByid($id_pegawai);
      $output = [
         'get_manager' => $data
      ];
      $this->output->set_content_type('application/json')->set_output(json_encode($output));
   }

   public function delete($id_pegawai)
   {
      $this->Manager_model->delete($id_pegawai);
      $this->output->set_content_type('application/json')->set_output(json_encode('success'));
   }

   public function gantipassword($id_pegawai)
   {
      $this->form_validation->set_rules('password', 'Password', 'required|trim|matches[password2]', ['required' => 'Password Wajib Diisi!', 'matches' => 'Password Tidak Sama']);
      $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]', ['required' => 'Password Wajib Diisi!', 'matches' => 'Password Tidak Sama']);

      if ($this->form_validation->run() == false) {
         $data['pegawai'] = $this->Manager_model->getById2($id_pegawai);
         $this->load->view('template_panitia/header');
         $this->load->view('template/navlogin');
         $this->load->view('manager/gantipassword', $data);
         $this->load->view('template_panitia/footer');
         $this->load->view('manager/ajax', $data);
      } else {

         $id_pegawai = $this->input->post('id_pegawai');
         $password  = $this->input->post('password');
         $data = [
            'password' => password_hash($password, PASSWORD_DEFAULT)
         ];
         $this->Manager_model->updatepassword($data, $id_pegawai);
         $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Password Berhasil Diganti!</div>');
         redirect('manager/edit_manager/' . $id_pegawai);
      }
   }
}
