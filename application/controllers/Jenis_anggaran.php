<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis_anggaran extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('Jenis_anggaran/Jenis_anggaran_model');
   }
   public function index()
   {
      $this->load->view('template/header');
      $this->load->view('template/navlogin');
      $this->load->view('jenis_anggaran/index');
      $this->load->view('template/footer');
      $this->load->view('jenis_anggaran/ajax');
   }
   public function getdata()
   {
      $resultss = $this->Jenis_anggaran_model->getdatatable();
      $data = [];
      $no = $_POST['start'];
      foreach ($resultss as $angga) {
         $row = array();
         $row[] = ++$no;
         $row[] = $angga->kode_jenis_anggaran;
         $row[] = $angga->nama_jenis_anggaran;
         $row[] = '<a href="#" class="btn btn-success btn-block btn-sm" onClick="byid(' . "'" . $angga->id_jenis_anggaran . "','edit'" . ')"><i class="fas fa-edit"></i> Edit</a>';
         $data[] = $row;
      }
      $output = array(
         "draw" => $_POST['draw'],
         "recordsTotal" => $this->Jenis_anggaran_model->count_all_data(),
         "recordsFiltered" => $this->Jenis_anggaran_model->count_filtered_data(),
         "data" => $data
      );
      $this->output->set_content_type('application/json')->set_output(json_encode($output));
   }

   public function add()
   {
      $this->form_validation->set_rules('kode_jenis_anggaran', 'Kode', 'required|trim', ['required' => 'Kode Wajib Diisi!']);
      $this->form_validation->set_rules('nama_jenis_anggaran', 'Nama Jenis Anggaran', 'required|trim', ['required' => 'Jenis Anggaran Wajib Diisi!']);
      if ($this->form_validation->run() == false) {
         $data = [
            'kode_jenis_anggaran' => form_error('kode_jenis_anggaran'),
            'nama_jenis_anggaran' => form_error('nama_jenis_anggaran'),
         ];
         $this->output->set_content_type('application/json')->set_output(json_encode($data));
      } else {
         $data = [
            'kode_jenis_anggaran' => htmlspecialchars($this->input->post('kode_jenis_anggaran')),
            'nama_jenis_anggaran' => htmlspecialchars($this->input->post('nama_jenis_anggaran')),
         ];
         $this->Jenis_anggaran_model->create($data);
         $this->output->set_content_type('application/json')->set_output(json_encode('success'));
      }
   }

   public function byid($id_jenis_anggaran)
   {
      $data = $this->Jenis_anggaran_model->getByid($id_jenis_anggaran);
      $this->output->set_content_type('application/json')->set_output(json_encode($data));
   }

   public function update()
   {
      $this->form_validation->set_rules('kode_jenis_anggaran', 'Kode', 'required|trim', ['required' => 'Kode Wajib Diisi!']);
      $this->form_validation->set_rules('nama_jenis_anggaran', 'Nama Jenis Anggaran', 'required|trim', ['required' => 'Jenis Anggaran Wajib Diisi!']);
      if ($this->form_validation->run() == false) {
         $data = [
            'kode_jenis_anggaran' => form_error('kode_jenis_anggaran'),
            'nama_jenis_anggaran' => form_error('nama_jenis_anggaran'),
         ];
         $this->output->set_content_type('application/json')->set_output(json_encode($data));
      } else {
         $data = [
            'kode_jenis_anggaran' => htmlspecialchars($this->input->post('kode_jenis_anggaran')),
            'nama_jenis_anggaran' => htmlspecialchars($this->input->post('nama_jenis_anggaran')),
         ];
         $this->Jenis_anggaran_model->update(array('id_jenis_anggaran' => $this->input->post('id_jenis_anggaran')), $data);
         $this->output->set_content_type('application/json')->set_output(json_encode('success'));
      }
   }
   public function delete($id_jenis_anggaran)
   {
      $this->Jenis_anggaran_model->delete($id_jenis_anggaran);
      $this->output->set_content_type('application/json')->set_output(json_encode('success'));
   }
}
