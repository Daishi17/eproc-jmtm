<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

error_reporting(0);
class Berita_acara extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Panitia/Rolepanitia_model', 'Rolepanitia_model');
        $this->load->model('Panitia/Evaluasi_model', 'Evaluasi_model');
        $this->load->model('Panitia/Evaluasi_administrasi_model', 'Evaluasi_administrasi_model');
        $this->load->model('Panitia/Evaluasi_teknis_model', 'Evaluasi_teknis_model');
        $this->load->model('Rup/Rup_model');
        $this->load->model('Paket/Paket_model');
        $this->load->model('Beranda/Chat_model');
        $this->load->model('Panitia/Penawaran_peserta_model', 'Penawaran_peserta_model');
        $role = $this->session->userdata('id_role');
        if (!$role) {
            redirect('auth');
        } else {
        }
    }

    public function index()
    {
        $ambil_kualifikasi = $this->Rolepanitia_model->getById($id_paket);
        $id_kualifikasi = $ambil_kualifikasi['id_kualifikasi'];
        $paket['jadwal_tahap1'] = $this->Rolepanitia_model->get_all_detail_jadwal_row($id_kualifikasi, $id_paket);
        $paket['jumlah_peserta'] = $this->Rolepanitia_model->hitung_peserta($id_paket);
        $paket['get_pdf_dokumen_kualifikasi_lelang'] = $this->Rolepanitia_model->get_pdf_dokumen_kualifikasi_lelang($id_paket);
        $paket['get_pdf_dokumen_kualifikasi'] = $this->Rolepanitia_model->get_pdf_dokumen_kualifikasi($id_paket);
        $paket['paket'] = $this->Rolepanitia_model->getById($id_paket);
        $paket2 = $this->Rolepanitia_model->getById($id_paket);
        $id_kualifikasi = $paket2['id_kualifikasi'];
        $paket['total_hps'] = $this->Rup_model->totalhps($id_paket);
        $paket['cek_jadwal'] = $this->Rolepanitia_model->cek_jadwal($id_paket);
        $paket['rancangan_kontrak'] = $this->Rolepanitia_model->rancangan_kontrak($id_paket);
        $paket['status_persetujuan'] = $this->Rolepanitia_model->getstatus_persetujuan($id_paket);
        $paket['cek_status_persetjuan2'] = $this->Rolepanitia_model->cek_status_ada($id_paket);
        $paket['cek_status_persetjuan'] = $this->Rolepanitia_model->cek_status();
        $paket['cek_waktu1'] = $this->Rolepanitia_model->cek_waktu($id_paket, $id_kualifikasi);

        $paket['cek_waktu2'] = $this->Rolepanitia_model->cek_waktu2($id_paket, $id_kualifikasi);

        // dokumen persyaratan tambahan
        $paket['persyaratan_tambahan'] = $this->Rolepanitia_model->get_persyaratan_tambahan($id_paket);


        //berita acara
        $paket['get_berita_acara_penawaran'] = $this->Rolepanitia_model->get_berita_acara_penawaran($id_paket);
        $paket['get_berita_acara_tender'] = $this->Rolepanitia_model->get_berita_acara_tender($id_paket);
        $paket['get_berita_acara_peringkat'] = $this->Rolepanitia_model->get_berita_acara_peringkat($id_paket);
        $paket['get_berita_acara_lainnya'] = $this->Rolepanitia_model->get_berita_acara_lainnya($id_paket);

        //tahap tahap
        $paket['get_tahap'] = $this->Rolepanitia_model->get_tahap_dokumen1($id_paket, $id_kualifikasi);
        $paket['get_tahap_id_11_7_17'] = $this->Rolepanitia_model->get_tahap_dokumen30($id_paket, $id_kualifikasi);
        $paket['get_tahap_dokumen_pemilihan'] = $this->Rolepanitia_model->get_tahap_dokumen_pemilihan($id_paket, $id_kualifikasi);
        $paket['get_tahap_syarat_tambahan'] = $this->Rolepanitia_model->get_tahap_dokumen_syarat_tambahan($id_paket, $id_kualifikasi);
        $paket['get_tahap_pembuktian_kualifikasi'] = $this->Rolepanitia_model->get_tahap_dokumen_pembuktian_kualifikasi($id_paket, $id_kualifikasi);
        $paket['get_tahap_pengumuman_hasil_prakualifikasi'] = $this->Rolepanitia_model->get_tahap_pengumuman_hasil_prakualifikasi($id_paket, $id_kualifikasi);
        $paket['get_tahap_dokumen_sangahan_prakualifikasi'] = $this->Rolepanitia_model->get_tahap_dokumen_sangahan_prakualifikasi($id_paket, $id_kualifikasi);
        $paket['get_tahap_dokumen_peringkat_teknis'] = $this->Rolepanitia_model->get_tahap_dokumen_peringkat_teknis($id_paket, $id_kualifikasi);
        $paket['get_tahap_dokumen_negosiasi'] = $this->Rolepanitia_model->get_tahap_dokumen_negosiasi($id_paket, $id_kualifikasi);
        $paket['get_tahap_dokumen_sangahan_akhir'] = $this->Rolepanitia_model->get_tahap_dokumen_sangahan_akhir($id_paket, $id_kualifikasi);
        // ini untuk pascakualifikasi
        $data['get_tahap_dokumen_penetapan_kualifikasi'] = $this->Rolepanitia_model->get_tahap_dokumen_penetapan_kualifikasi($id_paket, $id_kualifikasi);
        $data['get_tahap_keluar_dokumen_kualifikasi'] = $this->Rolepanitia_model->get_tahap_keluar_dokumen_kualifikasi($id_paket, $id_kualifikasi);
        //berita
        $paket['pengumuman_hasil_prakualifikasi'] = $this->Rolepanitia_model->pengumuman_hasil_prakualifikasi($id_paket, $id_kualifikasi);
        $paket['get_tahap2'] = $this->Rolepanitia_model->get_tahap_berita($id_paket, $id_kualifikasi);
        //ambil dokumen persyaratan tambahan yang dari vendor
        $paket['get_dokumen_vendor_persyaratan_tambahan'] = $this->Rolepanitia_model->get_dokumen_persyaratan_vendor($id_paket);
        $paket['vendor_mengikuti_paket'] = $this->Rolepanitia_model->get_vendor_mengikuti_paket($id_paket);


        // NEW TAHAP UNTUK PRAKUALIFKASI 1 FILE
        $paket['get_tahap_prakualfiikasi_satu_file_penetapan'] = $this->Rolepanitia_model->get_tahap_prakualfiikasi_satu_file_penetapan($id_paket, $id_kualifikasi);
        $paket['Evaluasi_penawaran_satu_file_prakualfikasi'] = $this->Rolepanitia_model->Evaluasi_penawaran_satu_file_prakualfikasi($id_paket, $id_kualifikasi);


        $paket['evaluasi_dokumen_prakualifiaksi_2_file'] = $this->Rolepanitia_model->evaluasi_dokumen_prakualifiaksi_2_file($id_paket, $id_kualifikasi);
        // END PRAKUALIFIKASI 2 FILE
        $id_pegawai = $this->session->userdata('id_pegawai');
        $data['status_penetapan_langsung'] = $this->Rolepanitia_model->cek_role_penetapan($id_pegawai);

        $paket['cek_vendor_mengikuti_tender'] = $this->db->query("SELECT id_mengikuti_paket FROM tbl_vendor_mengikuti_paket WHERE id_mengikuti_paket_vendor = $id_paket")->row_array();

        $paket['vendor_mengikuti'] = $this->db->query("SELECT * FROM tbl_vendor_mengikuti_paket LEFT JOIN tbl_vendor ON tbl_vendor_mengikuti_paket.id_mengikuti_vendor = tbl_vendor.id_vendor WHERE id_mengikuti_paket_vendor = $id_paket")->result_array();
        // 6 juli 2022
        $paket['get_vendor'] = $this->Rolepanitia_model->get_username($id_paket);
        $this->load->view('template_panitia/header');
        $this->load->view('template/navlogin', $data);
        $this->load->view('panitia_view/beranda/berita_acara', $data);
        $this->load->view('template_panitia/footer');
        $this->load->view('panitia_view/beranda/ajax');
    }
}
