<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sirup extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->helper('form', 'string');
      $this->load->library(['form_validation']);
      $this->load->model('Wilayah/Wilayah_model');
      $this->load->model('Rup/Rup_model');
      $this->load->model('Kualifikasi/Kualifikasi_model');
   }

   public function index()
   {
      $data['all_paket'] = $this->Rup_model->getAllPaket();
      $data['getdivisi'] = $this->Rup_model->get_devisi();
      $data['get_jenis_pengadaan'] = $this->Rup_model->get_jenis_pengadaan();
      $this->load->view('template_sirup/header');
      $this->load->view('template_sirup/navbar');
      $this->load->view('rekap_sirup/index', $data);
      $this->load->view('template_sirup/footer');
      $this->load->view('rekap_sirup/ajax');
   }
}
