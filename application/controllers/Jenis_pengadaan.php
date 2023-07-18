<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis_pengadaan extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('Jenis_pengadaan/Jenis_pengadaan_model');
   }
   public function index()
   {
      $this->load->view('template/header');
      $this->load->view('template/navlogin');
      $this->load->view('jenis_pengadaan/index');
      $this->load->view('template/footer');
      $this->load->view('jenis_pengadaan/ajax');
   }
   public function getdata()
   {
      $resultss = $this->Jenis_pengadaan_model->getdatatable();
      $data = [];
      $no = $_POST['start'];
      foreach ($resultss as $angga) {
         $row = array();
         $row[] = ++$no;
         $row[] = $angga->kode_jenis_pengadaan;
         $row[] = $angga->nama_jenis_pengadaan;
         $row[] = '<a href="#" class="btn btn-success btn-block btn-sm" onClick="byid(' . "'" . $angga->id_jenis_pengadaan . "','edit'" . ')"><i class="fas fa-edit"></i> Edit</a>';
         $data[] = $row;
      }
      $output = array(
         "draw" => $_POST['draw'],
         "recordsTotal" => $this->Jenis_pengadaan_model->count_all_data(),
         "recordsFiltered" => $this->Jenis_pengadaan_model->count_filtered_data(),
         "data" => $data
      );
      $this->output->set_content_type('application/json')->set_output(json_encode($output));
   }

   public function add()
   {
      $this->form_validation->set_rules('kode_jenis_pengadaan', 'Kode', 'required|trim', ['required' => 'Kode Wajib Diisi!']);
      $this->form_validation->set_rules('nama_jenis_pengadaan', 'Nama Jenis Pengadaan', 'required|trim', ['required' => 'Jenis Pengadaan Wajib Diisi!']);
      if ($this->form_validation->run() == false) {
         $data = [
            'kode_jenis_pengadaan' => form_error('kode_jenis_pengadaan'),
            'nama_jenis_pengadaan' => form_error('nama_jenis_pengadaan'),
         ];
         $this->output->set_content_type('application/json')->set_output(json_encode($data));
      } else {
         $data = [
            'kode_jenis_pengadaan' => htmlspecialchars($this->input->post('kode_jenis_pengadaan')),
            'nama_jenis_pengadaan' => htmlspecialchars($this->input->post('nama_jenis_pengadaan')),
         ];
         $this->Jenis_pengadaan_model->create($data);
         $this->output->set_content_type('application/json')->set_output(json_encode('success'));
      }
   }

   public function byid($id_jenis_pengadaan)
   {
      $data = $this->Jenis_pengadaan_model->getByid($id_jenis_pengadaan);
      $this->output->set_content_type('application/json')->set_output(json_encode($data));
   }

   public function update()
   {
      $this->form_validation->set_rules('kode_jenis_pengadaan', 'Kode', 'required|trim', ['required' => 'Kode Wajib Diisi!']);
      $this->form_validation->set_rules('nama_jenis_pengadaan', 'Nama Jenis Pengadaan', 'required|trim', ['required' => 'Jenis Pengadaan Wajib Diisi!']);
      if ($this->form_validation->run() == false) {
         $data = [
            'kode_jenis_pengadaan' => form_error('kode_jenis_pengadaan'),
            'nama_jenis_pengadaan' => form_error('nama_jenis_pengadaan'),
         ];
         $this->output->set_content_type('application/json')->set_output(json_encode($data));
      } else {
         $data = [
            'kode_jenis_pengadaan' => htmlspecialchars($this->input->post('kode_jenis_pengadaan')),
            'nama_jenis_pengadaan' => htmlspecialchars($this->input->post('nama_jenis_pengadaan')),
         ];
         $this->Jenis_pengadaan_model->update(array('id_jenis_pengadaan' => $this->input->post('id_jenis_pengadaan')), $data);
         $this->output->set_content_type('application/json')->set_output(json_encode('success'));
      }
   }
   public function delete($id_jenis_pengadaan)
   {
      $this->Jenis_pengadaan_model->delete($id_jenis_pengadaan);
      $this->output->set_content_type('application/json')->set_output(json_encode('success'));
   }
}
