<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tahun_anggaran extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('Tahun_anggaran/Tahun_anggaran_model');
   }
   public function index()
   {
      $this->load->view('template/header');
      $this->load->view('template/navlogin');
      $this->load->view('tahun_anggaran/index');
      $this->load->view('template/footer');
      $this->load->view('tahun_anggaran/ajax');
   }
   public function getdata()
   {
      $resultss = $this->Tahun_anggaran_model->getdatatable();
      $data = [];
      $no = $_POST['start'];
      foreach ($resultss as $angga) {
         $row = array();
         $row[] = ++$no;
         $row[] = $angga->nama_tahun_anggaran;
         if ($angga->status_tahun_anggaran != 1) {
            $row[] = '<a href="#" class="btn btn-danger btn-sm btn-block" onClick="byid(' . "'" . $angga->id_tahun_anggaran . "','active'" . ')"><i class="fas fa-ban"></i> NonAktive</a>';
         } else {
            $row[] = '<a href="#" class="btn btn-success btn-sm btn-block" onClick="byid(' . "'" . $angga->id_tahun_anggaran . "','non_active'" . ')"><i class="fas fa-check"></i> Active</a>';
         }
         $row[] = '<a href="#" class="btn btn-success btn-sm btn-block" onClick="byid(' . "'" . $angga->id_tahun_anggaran . "','edit'" . ')"><i class="fas fa-edit"></i> Edit</a>';
         $data[] = $row;
      }
      $output = array(
         "draw" => $_POST['draw'],
         "recordsTotal" => $this->Tahun_anggaran_model->count_all_data(),
         "recordsFiltered" => $this->Tahun_anggaran_model->count_filtered_data(),
         "data" => $data
      );
      $this->output->set_content_type('application/json')->set_output(json_encode($output));
   }

   public function add()
   {
      $this->form_validation->set_rules('nama_tahun_anggaran', 'Nama Jenis Anggaran', 'required|trim', ['required' => 'Jenis Anggaran Wajib Diisi!']);
      if ($this->form_validation->run() == false) {
         $data = [
            'nama_tahun_anggaran' => form_error('nama_tahun_anggaran'),
         ];
         $this->output->set_content_type('application/json')->set_output(json_encode($data));
      } else {
         $data = [
            'nama_tahun_anggaran' => htmlspecialchars($this->input->post('nama_tahun_anggaran')),
         ];
         $this->Tahun_anggaran_model->create($data);
         $this->output->set_content_type('application/json')->set_output(json_encode('success'));
      }
   }

   public function byid($id_tahun_anggaran)
   {
      $data = $this->Tahun_anggaran_model->getByid($id_tahun_anggaran);
      $this->output->set_content_type('application/json')->set_output(json_encode($data));
   }

   public function update()
   {
      $this->form_validation->set_rules('nama_tahun_anggaran', 'Nama Jenis Anggaran', 'required|trim', ['required' => 'Jenis Anggaran Wajib Diisi!']);
      if ($this->form_validation->run() == false) {
         $data = [
            'nama_tahun_anggaran' => form_error('nama_tahun_anggaran'),
         ];
         $this->output->set_content_type('application/json')->set_output(json_encode($data));
      } else {
         $data = [
            'nama_tahun_anggaran' => htmlspecialchars($this->input->post('nama_tahun_anggaran')),
         ];
         $this->Tahun_anggaran_model->update(array('id_tahun_anggaran' => $this->input->post('id_tahun_anggaran')), $data);
         $this->output->set_content_type('application/json')->set_output(json_encode('success'));
      }
   }

   // status active tahun anggaran
   public function active()
   {
      $data = [
         'status_tahun_anggaran' => 1,
      ];
      $this->Tahun_anggaran_model->update(array('id_tahun_anggaran' => $this->input->post('id_tahun_anggaran')), $data);
      $this->output->set_content_type('application/json')->set_output(json_encode('success'));
   }

   public function non_active()
   {
      $data = [
         'status_tahun_anggaran' => null,
      ];
      $this->Tahun_anggaran_model->update(array('id_tahun_anggaran' => $this->input->post('id_tahun_anggaran')), $data);
      $this->output->set_content_type('application/json')->set_output(json_encode('success'));
   }
   public function delete($id_tahun_anggaran)
   {
      $this->Tahun_anggaran_model->delete($id_tahun_anggaran);
      $this->output->set_content_type('application/json')->set_output(json_encode('success'));
   }
}
