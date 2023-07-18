<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk_dalam_negri extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('Produk_negri/Produk_negri_model');
   }
   public function index()
   {
      $this->load->view('template/header');
      $this->load->view('template/navlogin');
      $this->load->view('produk_dalam_negri/index');
      $this->load->view('template/footer');
      $this->load->view('produk_dalam_negri/ajax');
   }
   public function getdata()
   {
      $resultss = $this->Produk_negri_model->getdatatable();
      $data = [];
      $no = $_POST['start'];
      foreach ($resultss as $angga) {
         $row = array();
         $row[] = ++$no;
         $row[] = $angga->kode_produk_dl_negri;
         $row[] = $angga->keterangan;
         $row[] = '<a href="#" class="btn btn-success btn-sm btn-block" onClick="byid(' . "'" . $angga->id_produk_dl_negri . "','edit'" . ')"><i class="fas fa-edit"></i> Edit</a>';
         $data[] = $row;
      }
      $output = array(
         "draw" => $_POST['draw'],
         "recordsTotal" => $this->Produk_negri_model->count_all_data(),
         "recordsFiltered" => $this->Produk_negri_model->count_filtered_data(),
         "data" => $data
      );
      $this->output->set_content_type('application/json')->set_output(json_encode($output));
   }

   public function add()
   {
      $this->form_validation->set_rules('kode_produk_dl_negri', 'Kode', 'required|trim', ['required' => 'Kode Wajib Diisi!']);
      $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim', ['required' => 'Keterangan Wajib Diisi!']);
      if ($this->form_validation->run() == false) {
         $data = [
            'kode_produk_dl_negri' => form_error('kode_produk_dl_negri'),
            'keterangan' => form_error('keterangan'),
         ];
         $this->output->set_content_type('application/json')->set_output(json_encode($data));
      } else {
         $data = [
            'kode_produk_dl_negri' => htmlspecialchars($this->input->post('kode_produk_dl_negri')),
            'keterangan' => htmlspecialchars($this->input->post('keterangan')),
         ];
         $this->Produk_negri_model->create($data);
         $this->output->set_content_type('application/json')->set_output(json_encode('success'));
      }
   }

   public function byid($id_produk_dl_negri)
   {
      $data = $this->Produk_negri_model->getByid($id_produk_dl_negri);
      $this->output->set_content_type('application/json')->set_output(json_encode($data));
   }

   public function update()
   {
      $this->form_validation->set_rules('kode_produk_dl_negri', 'Kode', 'required|trim', ['required' => 'Kode Wajib Diisi!']);
      $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim', ['required' => 'Keterangan Wajib Diisi!']);
      if ($this->form_validation->run() == false) {
         $data = [
            'kode_produk_dl_negri' => form_error('kode_produk_dl_negri'),
            'keterangan' => form_error('keterangan'),
         ];
         $this->output->set_content_type('application/json')->set_output(json_encode($data));
      } else {
         $data = [
            'kode_produk_dl_negri' => htmlspecialchars($this->input->post('kode_produk_dl_negri')),
            'keterangan' => htmlspecialchars($this->input->post('keterangan')),
         ];
         $this->Produk_negri_model->update(array('id_produk_dl_negri' => $this->input->post('id_produk_dl_negri')), $data);
         $this->output->set_content_type('application/json')->set_output(json_encode('success'));
      }
   }
   public function delete($id_produk_dl_negri)
   {
      $this->Produk_negri_model->delete($id_produk_dl_negri);
      $this->output->set_content_type('application/json')->set_output(json_encode('success'));
   }
}
