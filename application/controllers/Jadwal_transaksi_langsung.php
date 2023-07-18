<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_transaksi_langsung extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('Jadwal_transaksi_langsung/Jadwal_transaksi_langsung_model');
   }
   public function index()
   {
      $this->load->view('template/header');
      $this->load->view('template/navlogin');
      $this->load->view('jadwal_transaksi_langsung/index');
      $this->load->view('template/footer');
      $this->load->view('jadwal_transaksi_langsung/ajax');
   }
   public function getdata()
   {
      $resultss = $this->Jadwal_transaksi_langsung_model->getdatatable();
      $data = [];
      $no = $_POST['start'];
      foreach ($resultss as $pasca) {
         $row = array();
         $row[] = ++$no;
         $row[] = $pasca->nama_jadwal_transaksi_langsung;
         $row[] = '<a href="#" class="btn btn-success btn-sm" onClick="byid(' . "'" . $pasca->id_jadwal_transaksi_langsung . "','edit'" . ')"><i class="fas fa-edit"></i> Edit</a> <a href="#" class="btn btn-danger btn-sm" onClick="byid(' . "'" . $pasca->id_jadwal_transaksi_langsung . "','hapus'" . ')">  <i class="fas fa-trash"></i> Hapus</a>';
         $data[] = $row;
      }
      $output = array(
         "draw" => $_POST['draw'],
         "recordsTotal" => $this->Jadwal_transaksi_langsung_model->count_all_data(),
         "recordsFiltered" => $this->Jadwal_transaksi_langsung_model->count_filtered_data(),
         "data" => $data
      );
      $this->output->set_content_type('application/json')->set_output(json_encode($output));
   }

   public function add()
   {
      $this->form_validation->set_rules('nama_jadwal_transaksi_langsung', 'Jadwal Transaksi Langsung', 'required|trim', ['required' => 'Jadwal Transaksi Langsung Wajib Diisi!']);
      if ($this->form_validation->run() == false) {
         $data = [
            'nama_jadwal_transaksi_langsung' => form_error('nama_jadwal_transaksi_langsung'),
         ];
         $this->output->set_content_type('application/json')->set_output(json_encode($data));
      } else {
         $data = [
            'nama_jadwal_transaksi_langsung' => htmlspecialchars($this->input->post('nama_jadwal_transaksi_langsung')),
         ];
         $this->Jadwal_transaksi_langsung_model->create($data);
         $this->output->set_content_type('application/json')->set_output(json_encode('success'));
      }
   }

   public function byid($id_jadwal_transaksi_langsung)
   {
      $data = $this->Jadwal_transaksi_langsung_model->getByid($id_jadwal_transaksi_langsung);
      $this->output->set_content_type('application/json')->set_output(json_encode($data));
   }

   public function update()
   {
      $this->form_validation->set_rules('nama_jadwal_transaksi_langsung', 'Jadwal Transaksi Langsung', 'required|trim', ['required' => 'Jadwal Transaksi Langsung Wajib Diisi!']);
      if ($this->form_validation->run() == false) {
         $data = [
            'nama_jadwal_transaksi_langsung' => form_error('nama_jadwal_transaksi_langsung'),
         ];
         $this->output->set_content_type('application/json')->set_output(json_encode($data));
      } else {
         $data = [
            'nama_jadwal_transaksi_langsung' => htmlspecialchars($this->input->post('nama_jadwal_transaksi_langsung')),

         ];
         $this->Jadwal_transaksi_langsung_model->update(array('id_jadwal_transaksi_langsung' => $this->input->post('id_jadwal_transaksi_langsung')), $data);
         $this->output->set_content_type('application/json')->set_output(json_encode('success'));
      }
   }
   public function delete($id_jadwal_transaksi_langsung)
   {
      $this->Jadwal_transaksi_langsung_model->delete($id_jadwal_transaksi_langsung);
      $this->output->set_content_type('application/json')->set_output(json_encode('success'));
   }
}
