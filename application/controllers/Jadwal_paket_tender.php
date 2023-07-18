<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_paket_tender extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('Jadwal_paket_tender/Jadwal_paket_tender_model');
   }
   public function index()
   {
      $this->load->view('template/header');
      $this->load->view('template/navlogin');
      $this->load->view('jadwal_paket_tender/index');
      $this->load->view('template/footer');
      $this->load->view('jadwal_paket_tender/ajax');
   }

   public function setting_jadwal($id_jadwal_paket_tender)
   {
      $data['get_row_jadwal'] = $this->Jadwal_paket_tender_model->get_by_row_jadwal($id_jadwal_paket_tender);
      $this->load->view('template/header');
      $this->load->view('template/navlogin');
      $this->load->view('jadwal_paket_tender/setting_jadwal', $data);
      $this->load->view('template/footer');
      $this->load->view('jadwal_paket_tender/ajax');
   }
   // public function  alter_table_jadwal()
   // {
   //    $i = 1;
   //    $i++;
   //    $table = "tbl_jadwal_paket_tender";
   //    $field = "nama_jadwal_tender$i";
   //    $today = date('ymd');
   //    $text = '.JMTM.' . $today;
   //    $kode_terakhirnya = $this->Rup_model->get_kode_tender($text, $table, $field);
   //    $no_urut = (int) substr($kode_terakhirnya, -4, 4);
   //    $no_urut++;
   //    $hasilnya = $text . sprintf('%04s', $no_urut);


   // }

   public function getdata()
   {
      $resultss = $this->Jadwal_paket_tender_model->getdatatable();
      $data = [];
      $no = $_POST['start'];
      foreach ($resultss as $jadwal_tender) {
         $row = array();
         $row[] = ++$no;

         $row[] = $jadwal_tender->jenis_jadwal;
         $row[] = '<a href="#" class="btn btn-success btn-sm" onClick="byid(' . "'" . $jadwal_tender->id_jadwal_paket_tender . "','edit'" . ')"><i class="fas fa-edit"></i> Edit</a> <a href="#" class="btn btn-danger btn-sm" onClick="byid(' . "'" . $jadwal_tender->id_jadwal_paket_tender . "','hapus'" . ')">  <i class="fas fa-trash"></i> Hapus</a> <a href="#" class="btn btn-info btn-sm" onClick="byid(' . "'" . $jadwal_tender->id_jadwal_paket_tender . "','setting'" . ')">  <i class="fas fa-cogs"></i> Setting Jadwal</a>';
         $data[] = $row;
      }
      $output = array(
         "draw" => $_POST['draw'],
         "recordsTotal" => $this->Jadwal_paket_tender_model->count_all_data(),
         "recordsFiltered" => $this->Jadwal_paket_tender_model->count_filtered_data(),
         "data" => $data
      );
      $this->output->set_content_type('application/json')->set_output(json_encode($output));
   }

   public function add()
   {
      $this->form_validation->set_rules('jenis_jadwal', 'Jenis Jadwal', 'required|trim', ['required' => 'Jenis Jadwal Wajib Diisi!']);
      if ($this->form_validation->run() == false) {
         $data = [
            'jenis_jadwal' => form_error('jenis_jadwal'),
         ];
         $this->output->set_content_type('application/json')->set_output(json_encode($data));
      } else {
         $data = [
            'jenis_jadwal' => htmlspecialchars($this->input->post('jenis_jadwal')),
         ];
         $this->Jadwal_paket_tender_model->create($data);
         $this->output->set_content_type('application/json')->set_output(json_encode('success'));
      }
   }

   public function byid($id_jadwal_paket_tender)
   {
      $data = $this->Jadwal_paket_tender_model->getByid($id_jadwal_paket_tender);
      $this->output->set_content_type('application/json')->set_output(json_encode($data));
   }

   public function update()
   {
      $this->form_validation->set_rules('jenis_jadwal', 'Jenis Jadwal', 'required|trim', ['required' => 'Jenis Jadwal Wajib Diisi!']);
      if ($this->form_validation->run() == false) {
         $data = [
            'jenis_jadwal' => form_error('jenis_jadwal'),
         ];
         $this->output->set_content_type('application/json')->set_output(json_encode($data));
      } else {
         $data = [
            'jenis_jadwal' => htmlspecialchars($this->input->post('jenis_jadwal')),

         ];
         $this->Jadwal_paket_tender_model->update(array('id_jadwal_paket_tender' => $this->input->post('id_jadwal_paket_tender')), $data);
         $this->output->set_content_type('application/json')->set_output(json_encode('success'));
      }
   }
   public function delete($id_jadwal_paket_tender)
   {
      $this->Jadwal_paket_tender_model->delete($id_jadwal_paket_tender);
      $this->output->set_content_type('application/json')->set_output(json_encode('success'));
   }
}
