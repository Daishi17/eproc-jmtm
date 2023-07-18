<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Area extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('Area/Area_model');
   }
   public function index()
   {
      $this->load->view('template/header');
      $this->load->view('template/navlogin');
      $this->load->view('area/index');
      $this->load->view('template/footer');
      $this->load->view('area/ajax');
   }
   public function getdata()
   {
      $resultss = $this->Area_model->getdatatable();
      $data = [];
      $no = $_POST['start'];
      foreach ($resultss as $angga) {
         $row = array();
         $row[] = ++$no;
         $row[] = $angga->kode_area;
         $row[] = $angga->nama_area;
         $row[] = '<a href="#" class="btn btn-success btn-block btn-sm" onClick="byid(' . "'" . $angga->id_area . "','edit'" . ')"><i class="fas fa-edit"></i> Edit</a>';
         $data[] = $row;
      }
      $output = array(
         "draw" => $_POST['draw'],
         "recordsTotal" => $this->Area_model->count_all_data(),
         "recordsFiltered" => $this->Area_model->count_filtered_data(),
         "data" => $data
      );
      $this->output->set_content_type('application/json')->set_output(json_encode($output));
   }

   public function add()
   {
      $this->form_validation->set_rules('nama_area', 'Nama Unit Kerja', 'required|trim', ['required' => 'Nama Unit Kerja Wajib Diisi!']);
      $this->form_validation->set_rules('kode_area', 'Kode Unit Kerja', 'required|trim', ['required' => 'Kode Wajib Diisi!']);
      if ($this->form_validation->run() == false) {
         $data = [
            'nama_area' => form_error('nama_area'),
            'kode_area' => form_error('kode_area'),
         ];
         $this->output->set_content_type('application/json')->set_output(json_encode($data));
      } else {
         $data = [
            'nama_area' => htmlspecialchars($this->input->post('nama_area')),
            'kode_area' => htmlspecialchars($this->input->post('kode_area')),
         ];
         $this->Area_model->create($data);
         $this->output->set_content_type('application/json')->set_output(json_encode('success'));
      }
   }

   public function byid($id_area)
   {
      $data = $this->Area_model->getByid($id_area);
      $this->output->set_content_type('application/json')->set_output(json_encode($data));
   }

   public function update()
   {
      $this->form_validation->set_rules('nama_area', 'Nama Unit Kerja', 'required|trim', ['required' => 'Nama Unit Kerja Wajib Diisi!']);
      $this->form_validation->set_rules('kode_area', 'Kode Unit Kerja', 'required|trim', ['required' => 'Kode Wajib Diisi!']);
      if ($this->form_validation->run() == false) {
         $data = [
            'nama_area' => form_error('nama_area'),
            'kode_area' => form_error('kode_area'),
         ];
         $this->output->set_content_type('application/json')->set_output(json_encode($data));
      } else {
         $data = [
            'nama_area' => htmlspecialchars($this->input->post('nama_area')),
            'kode_area' => htmlspecialchars($this->input->post('kode_area')),
         ];
         $this->Area_model->update(array('id_area' => $this->input->post('id_area')), $data);
         $this->output->set_content_type('application/json')->set_output(json_encode('success'));
      }
   }
   public function delete($id_area)
   {
      $this->Area_model->delete($id_area);
      $this->output->set_content_type('application/json')->set_output(json_encode('success'));
   }
}
