<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Ujijadwal extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->helper('string');
      $this->load->helper('form');
      $this->load->library(['form_validation']);
      $this->load->model('Panitia/Rolepanitia_model', 'Rolepanitia_model');
      $this->load->model('Rup/Rup_model');
      $this->load->model('Paket/Paket_model');
      $this->load->model('Kualifikasi/Kualifikasi_model');
   }

   public function jadwaltender($id_paket)
   {

      $data['paket2'] = $this->Rolepanitia_model->getById($id_paket);
      $ambil_kualifikasi = $this->Rolepanitia_model->getById($id_paket);
      $id_kualifikasi = $ambil_kualifikasi['id_kualifikasi'];
      $data['id_role_panitia'] = $this->Rolepanitia_model->getById_GET_role_panitia2($id_paket);
      $data['jadwal_prakualifikasi'] = $this->Rolepanitia_model->get_prakualifikasi($id_paket, $id_kualifikasi);
      $data['jadwal_pascakualifikasi'] = $this->Rolepanitia_model->get_pascakualifikasi($id_paket, $id_kualifikasi);

      $this->load->view('template/header');
      $this->load->view('template/navlogin');
      $this->load->view('panitia_view/daftarpaket/jadwaltender', $data);
      $this->load->view('template/footer');
      $this->load->view('panitia_view/daftarpaket/ajax');
   }
}
