<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penawaran_peserta extends CI_Controller
{
   public function __construct()
   {

      parent::__construct();
      $this->load->library('form_validation');
      $this->load->model('Wilayah/Wilayah_model');
      $this->load->model('Panitia/Penawaran_peserta_model', 'Penawaran_peserta_model');
   }
   public function get_data_peserta($id_mengikuti_paket)
   {
      // INI RESULT UNTUK DAPETIN DATA KUALIFIKASINNYA test
      $result_row = $this->Penawaran_peserta_model->get_byid_paket_diikuti_vendor($id_mengikuti_paket);
      $id_vendor = $result_row['id_mengikuti_vendor'];
      $id_paket = $result_row['id_mengikuti_paket_vendor'];
      $data['penawaran_kualifikasi_izin_usaha'] = $this->Penawaran_peserta_model->get_kualifikasi_peserta($id_vendor, $id_paket);
      $data['penawaran_kualifikasi_tenaga_ahli'] = $this->Penawaran_peserta_model->get_kualifikasi_peserta_tenaga_ahli($id_vendor, $id_paket);
      $data['identitas_perusahaan'] = $this->Penawaran_peserta_model->get_identitas_perusahaan($id_vendor);
      $data['akta_pendirian'] = $this->Penawaran_peserta_model->get_akta_pendirian($id_vendor);
      $data['penawaran_kualifikasi_pajak'] = $this->Penawaran_peserta_model->get_kualifikasi_peserta_pajak($id_vendor, $id_paket);
      $data['penawaran_kualifikasi_pemilik'] = $this->Penawaran_peserta_model->get_kualifikasi_peserta_pemilik($id_vendor, $id_paket);
      $data['penawaran_kualifikasi_pengalaman'] = $this->Penawaran_peserta_model->get_kualifikasi_peserta_pengalaman($id_vendor, $id_paket);
      $data['penawaran_kualifikasi_peralatan'] = $this->Penawaran_peserta_model->get_kualifikasi_peserta_peralatan($id_vendor, $id_paket);
      $data['penawaran_kualifikasi_pengurus'] = $this->Penawaran_peserta_model->get_kualifikasi_peserta_pengurus($id_vendor, $id_paket);
      $data['penawaran_kualifikasi_dukungan_bank'] = $this->Penawaran_peserta_model->get_kualifikasi_dukungan_bank($id_vendor, $id_paket);
      $data['penawaran_kualifikasi_persyaratan_lainya'] = $this->Penawaran_peserta_model->get_kualifikasi_persyaratan_lainya($id_vendor, $id_paket);
      //END  INI UNTUK DAPETIN PER VENDOR DAN DATA KUALIFIKASINNYA
      // INI UNTUK ROW VENDOR
      $data['vendor_user'] = $this->Penawaran_peserta_model->get_byid_paket_diikuti_vendor($id_mengikuti_paket);
      //END INI UNTUK ROW VENDOR
      $this->load->view('template/header');
      $this->load->view('panitia_view/dokumen_penawaran_peserta/index', $data);
      $this->load->view('template/footer');
      $this->load->view('panitia_view/beranda/ajax_penawaran_peserta');
   }
   public function get_detail_tenaga_ahli($id_tenaga_ahli)
   {
      $get_detail_tenaga_ahli = $this->Penawaran_peserta_model->get_by_id_tenaga_ahli_cv($id_tenaga_ahli);
      $get_detail_tenaga_ahli_pendidikan = $this->Penawaran_peserta_model->get_by_id_tenaga_ahli_pendidikan($id_tenaga_ahli);
      $get_detail_tenaga_ahli_sertifikat = $this->Penawaran_peserta_model->get_by_id_tenaga_ahli_sertifikat($id_tenaga_ahli);
      $get_detail_tenaga_ahli_bahasa = $this->Penawaran_peserta_model->get_by_id_tenaga_ahli_bahasa($id_tenaga_ahli);
      $output = [
         "get_detail_tenaga_ahli" => $get_detail_tenaga_ahli,
         "get_detail_tenaga_ahli_pendidikan" => $get_detail_tenaga_ahli_pendidikan,
         "get_detail_tenaga_ahli_sertifikat" => $get_detail_tenaga_ahli_sertifikat,
         "get_detail_tenaga_ahli_bahasa" => $get_detail_tenaga_ahli_bahasa,
      ];
      $this->output->set_content_type('application/json')->set_output(json_encode($output));
   }
}
