<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_pascakualifikasi extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('Pascakualifikasi/Pascakualifikasi_model');
   }
   public function index()
   {
      $this->load->view('template/header');
      $this->load->view('template/navlogin');
      $this->load->view('jadwal_pascakualifikasi/index');
      $this->load->view('template/footer');
      $this->load->view('jadwal_pascakualifikasi/ajax');
   }
   public function getdata()
   {
      $resultss = $this->Pascakualifikasi_model->getdatatable();
      $data = [];
      $no = $_POST['start'];
      foreach ($resultss as $pasca) {
         $row = array();
         $row[] = ++$no;
         $row[] = $pasca->nama_pascakualifikasi;
         $row[] = '<a href="#" class="btn btn-success btn-sm" onClick="byid(' . "'" . $pasca->id_pascakualifikasi . "','edit'" . ')"><i class="fas fa-edit"></i> Edit</a> <a href="#" class="btn btn-danger btn-sm" onClick="byid(' . "'" . $pasca->id_pascakualifikasi . "','hapus'" . ')">  <i class="fas fa-trash"></i> Hapus</a>';
         $data[] = $row;
      }
      $output = array(
         "draw" => $_POST['draw'],
         "recordsTotal" => $this->Pascakualifikasi_model->count_all_data(),
         "recordsFiltered" => $this->Pascakualifikasi_model->count_filtered_data(),
         "data" => $data
      );
      $this->output->set_content_type('application/json')->set_output(json_encode($output));
   }

   public function add()
   {
      $this->form_validation->set_rules('nama_pascakualifikasi', 'Pascakualifikasi', 'required|trim', ['required' => 'Pascakualifikasi Wajib Diisi!']);
      if ($this->form_validation->run() == false) {
         $data = [
            'nama_pascakualifikasi' => form_error('nama_pascakualifikasi'),
         ];
         $this->output->set_content_type('application/json')->set_output(json_encode($data));
      } else {
         $data = [
            'nama_pascakualifikasi' => htmlspecialchars($this->input->post('nama_pascakualifikasi')),
         ];
         $this->Pascakualifikasi_model->create($data);
         $this->output->set_content_type('application/json')->set_output(json_encode('success'));
      }
   }

   public function byid($id_pascakualifikasi)
   {
      $data = $this->Pascakualifikasi_model->getByid($id_pascakualifikasi);
      $this->output->set_content_type('application/json')->set_output(json_encode($data));
   }

   public function update()
   {
      $this->form_validation->set_rules('nama_pascakualifikasi', 'Pascakualifikasi', 'required|trim', ['required' => 'Pascakualifikasi Wajib Diisi!']);
      if ($this->form_validation->run() == false) {
         $data = [
            'nama_pascakualifikasi' => form_error('nama_pascakualifikasi'),
         ];
         $this->output->set_content_type('application/json')->set_output(json_encode($data));
      } else {
         $data = [
            'nama_pascakualifikasi' => htmlspecialchars($this->input->post('nama_pascakualifikasi')),

         ];
         $this->Pascakualifikasi_model->update(array('id_pascakualifikasi' => $this->input->post('id_pascakualifikasi')), $data);
         $this->output->set_content_type('application/json')->set_output(json_encode('success'));
      }
   }
   public function delete($id_pascakualifikasi)
   {
      $this->Pascakualifikasi_model->delete($id_pascakualifikasi);
      $this->output->set_content_type('application/json')->set_output(json_encode('success'));
   }
}
