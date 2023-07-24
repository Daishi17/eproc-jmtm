<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Paket extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('string');
		$this->load->helper('form');
		$this->load->library(['form_validation']);
		$this->load->model('Wilayah/Wilayah_model');
		$this->load->model('Paket/Paket_model');
		$this->load->model('Panitia/Panitia_model');
		$this->load->model('Panitia/Rolepanitia_model', 'Rolepanitia_model');
		$this->load->model('Chat_negosiasi/Chat_negosiasi_model');
		$this->load->model('Panitia/Non_tender_model', 'Non_tender_model');
		$this->load->model('Rup/Rup_model');
		$this->load->model('Kualifikasi/Kualifikasi_model');
		$this->load->model('Beranda/Chat_model');
	}
	public function index()
	{
		$this->load->view('template_paket/header');
		$this->load->view('template_paket/navbar');
		$this->load->view('paket/beranda');
		$this->load->view('template_paket/footer');
		$this->load->view('paket/ajax');
	}
	public function daftar_paket()
	{
		$this->load->view('template_paket/header');
		$this->load->view('template_paket/navbar');
		$this->load->view('paket/index');
		$this->load->view('template_paket/footer');
		$this->load->view('paket/ajax');
	}

	public function detail_paket($id_paket)
	{
		$data['total_rincian_hps_pdf'] = $this->Paket_model->get_by_rincian_hps_pdf_result($id_paket);
		$data['total_hps_pdf_ada'] = $this->Paket_model->get_by_rincian_hps_pdf_sudah_dibuat($id_paket);
		$data['vendor_terpilih'] = $this->Paket_model->vendor_terpilih($id_paket);
		$data['result_data_jadwal_detail'] = $this->Paket_model->result_data_jadwal_detail($id_paket);
		$data['cek_kak'] = $this->Paket_model->cek_kak($id_paket);
		$data['cek_sskk'] = $this->Paket_model->cek_kak($id_paket);
		$data['cek_informasi'] = $this->Paket_model->cek_informasi($id_paket);
		$data['total_rincian_hps']  = $this->Paket_model->totalRincianHps($id_paket);
		$data['status_rincian_hps']  = $this->Paket_model->status_rincian_hps($id_paket);
		$data['total_hps']  = $this->Paket_model->totalhps($id_paket);
		$data['sumberdana']  = $this->Paket_model->getSumberDana($id_paket);
		$data['lokasi_kerja']  = $this->Paket_model->getLokasiPekerjaan($id_paket);
		$data['jadwal_pemilihan']  = $this->Paket_model->getJadwalPemilihan($id_paket);
		$data['angga'] = $this->Paket_model->getByid($id_paket);
		$data['getdivisi'] = $this->Paket_model->get_devisi();
		$data['get_jenis_anggaran'] = $this->Paket_model->get_jenis_anggaran();
		$data['get_metode'] = $this->Paket_model->get_metode_pemilihan();
		$data['get_jenis_pengadaan'] = $this->Paket_model->get_jenis_pengadaan();
		$data['get_produk_dl_negri'] = $this->Paket_model->get_produk_dalam_negri();
		$data['kabupaten'] = $this->Wilayah_model->getAllKabupaten();
		$data['provinsi'] = $this->Wilayah_model->getProvinsi();
		$this->load->view('template_paket/header');
		$this->load->view('template_paket/navbar');
		$this->load->view('paket/detail_paket', $data);
		$this->load->view('template_paket/footer');
		$this->load->view('paket/ajax');
	}
	public function detail_paket_penunjukan_langsung($id_paket)
	{
		$id_pegawai = $this->session->userdata('id_pegawai');
		$data['status_penetapan_langsung'] = $this->Rolepanitia_model->cek_role_penetapan($id_pegawai);
		$data['get_pdf_dokumen_kualifikasi_lelang'] = $this->Rolepanitia_model->get_pdf_dokumen_kualifikasi_lelang($id_paket);
		$data['get_pdf_dokumen_kualifikasi'] = $this->Rolepanitia_model->get_pdf_dokumen_kualifikasi($id_paket);
		$data['dokumen_pemilihan'] = $this->Rolepanitia_model->getDokumenRencana($id_paket);
		$data['paket'] = $this->Rolepanitia_model->getById($id_paket);
		$data['id_role_panitia'] = $this->Rolepanitia_model->getById_GET_role_panitia($id_paket);
		$data['total_hps'] = $this->Rup_model->totalhps($id_paket);
		$data['cek_jadwal'] = $this->Rolepanitia_model->cek_jadwal($id_paket);
		$data['cek_jadwal2'] = $this->Rolepanitia_model->cek_jadwal2();
		$data['rancangan_kontrak'] = $this->Rolepanitia_model->rancangan_kontrak($id_paket);
		$data['status_persetujuan'] = $this->Rolepanitia_model->getstatus_persetujuan($id_paket);
		$data['cek_status_persetjuan2'] = $this->Rolepanitia_model->cek_status_ada($id_paket);
		$data['cek_status_persetjuan'] = $this->Rolepanitia_model->cek_status();
		$data['jenis_kontrak'] = $this->Rolepanitia_model->get_jenis_kontrak($id_paket);
		$id_kualifikasi = $this->Rolepanitia_model->get_id_kualifikasi($id_paket);
		$data['id_kualifikasi'] = $this->Rolepanitia_model->get_jadwal_kualifikasi($id_kualifikasi['id_kualifikasi']);
		$data['total_rincian_hps_pdf'] = $this->Paket_model->get_by_rincian_hps_pdf_result($id_paket);
		$data['total_hps_pdf_ada'] = $this->Paket_model->get_by_rincian_hps_pdf_sudah_dibuat($id_paket);
		$data['vendor_terpilih'] = $this->Paket_model->vendor_terpilih($id_paket);
		$data['total_rincian_hps'] = $this->Paket_model->get_by_rincian_hps_sudah_dibuat($id_paket);
		$data['result_data_jadwal_detail'] = $this->Paket_model->result_data_jadwal_detail_penunjukan_langsung($id_paket);
		$this->load->view('template_paket/header');
		$this->load->view('template_paket/navbar');
		$this->load->view('paket/detail_paket_penunjukan_langsung', $data);
		$this->load->view('template_paket/footer');
		$this->load->view('paket/ajax_penunjukan_langsung');
	}

	public function tambah()
	{
		$data['getdivisi'] = $this->Paket_model->get_devisi();
		$data['get_jenis_anggaran'] = $this->Paket_model->get_jenis_anggaran();
		$data['get_metode'] = $this->Paket_model->get_metode_pemilihan();
		$data['get_jenis_pengadaan'] = $this->Paket_model->get_jenis_pengadaan();
		$data['get_produk_dl_negri'] = $this->Paket_model->get_produk_dalam_negri();
		$data['kabupaten'] = $this->Wilayah_model->getAllKabupaten();
		$data['provinsi'] = $this->Wilayah_model->getProvinsi();
		$data['all_paket'] = $this->Paket_model->getAllPaket();
		$this->load->view('template_paket/header');
		$this->load->view('template_paket/navbar');
		$this->load->view('paket/tambah', $data);
		$this->load->view('template_paket/footer');
		$this->load->view('paket/ajax', $data);
	}

	// Transaksi Langsung
	public function tambah_transaksi_langsung()
	{
		$data['getdivisi'] = $this->Paket_model->get_devisi();
		$data['get_jenis_anggaran'] = $this->Paket_model->get_jenis_anggaran();
		$data['get_metode'] = $this->Paket_model->get_metode_pemilihan();
		$data['get_jenis_pengadaan'] = $this->Paket_model->get_jenis_pengadaan();
		$data['get_produk_dl_negri'] = $this->Paket_model->get_produk_dalam_negri();
		$data['kabupaten'] = $this->Wilayah_model->getAllKabupaten();
		$data['provinsi'] = $this->Wilayah_model->getProvinsi();
		$data['all_paket'] = $this->Paket_model->getAllPaket();
		$this->load->view('template_paket/header');
		$this->load->view('template_paket/navbar');
		$this->load->view('paket/tambah_transaksi_langsung', $data);
		$this->load->view('template_paket/footer');
		$this->load->view('paket/ajax', $data);
	}

	public function edit($id_paket)
	{
		$data['total_rincian_hps_pdf'] = $this->Paket_model->get_by_rincian_hps_pdf_result($id_paket);
		$data['total_hps_pdf_ada'] = $this->Paket_model->get_by_rincian_hps_pdf_sudah_dibuat($id_paket);
		$data['cek_kak'] = $this->Paket_model->cek_kak($id_paket);
		$data['cek_sskk'] = $this->Paket_model->cek_kak($id_paket);
		$data['cek_informasi'] = $this->Paket_model->cek_informasi($id_paket);
		$data['total_rincian_hps']  = $this->Paket_model->totalRincianHps($id_paket);
		$data['total_hps']  = $this->Paket_model->totalhps($id_paket);
		$data['status_rincian_hps']  = $this->Paket_model->status_rincian_hps($id_paket);
		$data['sumberdana']  = $this->Paket_model->getSumberDana($id_paket);
		$data['lokasi_kerja']  = $this->Paket_model->getLokasiPekerjaan($id_paket);
		$data['jadwal_pemilihan']  = $this->Paket_model->getJadwalPemilihan($id_paket);
		$data['angga'] = $this->Paket_model->getByid($id_paket);
		$data['getdivisi'] = $this->Paket_model->get_devisi();
		$data['get_jenis_anggaran'] = $this->Paket_model->get_jenis_anggaran();
		$data['get_metode'] = $this->Paket_model->get_metode_pemilihan();
		$data['get_jenis_pengadaan'] = $this->Paket_model->get_jenis_pengadaan();
		$data['get_produk_dl_negri'] = $this->Paket_model->get_produk_dalam_negri();
		$data['kabupaten'] = $this->Wilayah_model->getAllKabupaten();
		$data['provinsi'] = $this->Wilayah_model->getProvinsi();
		$data['cek_panitia'] = $this->db->query("SELECT id_panita_mengikuti_paket FROM tbl_panitia_mengikuti_paket WHERE status_panitia_id_paket = $id_paket")->row_array();

		// update baru desember 2022
		$data['total_hps_edit'] = $this->Paket_model->sum_rincian_hps($id_paket);

		$this->load->view('template_paket/header');
		$this->load->view('template_paket/navbar');
		$this->load->view('paket/edit', $data);
		$this->load->view('template_paket/footer');
		$this->load->view('paket/ajax', $data);
	}

	public function edit_transaksi_langsung($id_paket)
	{
		$data['total_rincian_hps_pdf'] = $this->Paket_model->get_by_rincian_hps_pdf_result($id_paket);
		$data['total_hps_pdf_ada'] = $this->Paket_model->get_by_rincian_hps_pdf_sudah_dibuat($id_paket);
		$data['vendor_terpilih'] = $this->Paket_model->vendor_terpilih($id_paket);
		$data['result_data_jadwal_detail'] = $this->Paket_model->result_data_jadwal_detail($id_paket);
		$data['cek_kak'] = $this->Paket_model->cek_kak($id_paket);
		$data['cek_sskk'] = $this->Paket_model->cek_kak($id_paket);
		$data['cek_informasi'] = $this->Paket_model->cek_informasi($id_paket);
		$data['total_rincian_hps']  = $this->Paket_model->totalRincianHps($id_paket);
		$data['status_rincian_hps']  = $this->Paket_model->status_rincian_hps($id_paket);
		$data['total_hps']  = $this->Paket_model->totalhps($id_paket);
		$data['sumberdana']  = $this->Paket_model->getSumberDana($id_paket);
		$data['lokasi_kerja']  = $this->Paket_model->getLokasiPekerjaan($id_paket);
		$data['jadwal_pemilihan']  = $this->Paket_model->getJadwalPemilihan($id_paket);
		$data['angga'] = $this->Paket_model->getByid($id_paket);
		$data['getdivisi'] = $this->Paket_model->get_devisi();
		$data['get_jenis_anggaran'] = $this->Paket_model->get_jenis_anggaran();
		$data['get_metode'] = $this->Paket_model->get_metode_pemilihan();
		$data['get_jenis_pengadaan'] = $this->Paket_model->get_jenis_pengadaan();
		$data['get_produk_dl_negri'] = $this->Paket_model->get_produk_dalam_negri();
		$data['kabupaten'] = $this->Wilayah_model->getAllKabupaten();
		$data['provinsi'] = $this->Wilayah_model->getProvinsi();
		$this->load->view('template_paket/header');
		$this->load->view('template_paket/navbar');
		$this->load->view('paket/edit_transaksi_langsung', $data);
		$this->load->view('template_paket/footer');
		$this->load->view('paket/ajax', $data);
	}

	public function lihat_transaksi_langsung_berjalan($id_paket)
	{
		$data['jumlah_peserta'] = $this->Rolepanitia_model->hitung_peserta($id_paket);
		$data['total_rincian_hps_pdf'] = $this->Paket_model->get_by_rincian_hps_pdf_result($id_paket);
		$data['total_hps_pdf_ada'] = $this->Paket_model->get_by_rincian_hps_pdf_sudah_dibuat($id_paket);
		$data['vendor_terpilih'] = $this->Paket_model->vendor_terpilih($id_paket);
		$data['result_data_jadwal_detail'] = $this->Paket_model->result_data_jadwal_detail($id_paket);
		$data['cek_kak'] = $this->Paket_model->cek_kak($id_paket);
		$data['cek_sskk'] = $this->Paket_model->cek_kak($id_paket);
		$data['cek_informasi'] = $this->Paket_model->cek_informasi($id_paket);
		$data['total_rincian_hps']  = $this->Paket_model->totalRincianHps($id_paket);
		$data['status_rincian_hps']  = $this->Paket_model->status_rincian_hps($id_paket);
		$data['total_hps']  = $this->Paket_model->totalhps($id_paket);
		$data['sumberdana']  = $this->Paket_model->getSumberDana($id_paket);
		$data['lokasi_kerja']  = $this->Paket_model->getLokasiPekerjaan($id_paket);
		$data['jadwal_pemilihan']  = $this->Paket_model->getJadwalPemilihan($id_paket);
		$data['paket'] = $this->Paket_model->getByid($id_paket);
		$data['getdivisi'] = $this->Paket_model->get_devisi();
		$data['get_jenis_anggaran'] = $this->Paket_model->get_jenis_anggaran();
		$data['get_metode'] = $this->Paket_model->get_metode_pemilihan();
		$data['get_jenis_pengadaan'] = $this->Paket_model->get_jenis_pengadaan();
		$data['get_produk_dl_negri'] = $this->Paket_model->get_produk_dalam_negri();
		$data['kabupaten'] = $this->Wilayah_model->getAllKabupaten();
		$data['provinsi'] = $this->Wilayah_model->getProvinsi();
		$data['jadwal_tahap1'] = $this->Paket_model->get_jadwal_transaksi_langsung($id_paket);
		$data['vendor_terpilih'] = $this->Paket_model->vendor_terpilih($id_paket);
		// ini untuk nutup tahap jadwal to vendor
		$data['get_tahap_download_dokumen'] = $this->Paket_model->get_tahap_download_dokumen_transaksi_langsung($id_paket);
		// to agency
		$data['get_tahap_upload_penawaran'] = $this->Paket_model->get_tahap_upload_penawaran_transaksi_langsung($id_paket);
		$data['get_tahap_negosiasi_transaksi_langsung']  = $this->Paket_model->get_tahap_negosiasi_transaksi_langsung($id_paket);
		$data['get_tahap_upload_ba_nego']  = $this->Paket_model->get_tahap_upload_ba_nego($id_paket);
		$data['get_tahap_penetapan_pemenang']  = $this->Paket_model->get_tahap_penetapan_pemenang($id_paket);
		$data['get_tahap_pengumuman_pemenang']  = $this->Paket_model->get_tahap_pengumuman_pemenang($id_paket);
		$this->load->view('template_paket/header');
		$this->load->view('template_paket/navbar');
		$this->load->view('paket/lihat_transaksi_langsung_berjalan', $data);
		$this->load->view('template_paket/footer');
		$this->load->view('paket/ajax', $data);
	}

	public function tambah_penyedia_baru($id_paket)
	{
		$data['cek_kak'] = $this->Paket_model->cek_kak($id_paket);
		$data['cek_sskk'] = $this->Paket_model->cek_kak($id_paket);
		$data['cek_informasi'] = $this->Paket_model->cek_informasi($id_paket);
		$data['total_rincian_hps']  = $this->Paket_model->totalRincianHps($id_paket);
		$data['status_rincian_hps']  = $this->Paket_model->status_rincian_hps($id_paket);
		$data['total_hps']  = $this->Paket_model->totalhps($id_paket);
		$data['sumberdana']  = $this->Paket_model->getSumberDana($id_paket);
		$data['lokasi_kerja']  = $this->Paket_model->getLokasiPekerjaan($id_paket);
		$data['jadwal_pemilihan']  = $this->Paket_model->getJadwalPemilihan($id_paket);
		$data['angga'] = $this->Paket_model->getByid($id_paket);
		$data['getdivisi'] = $this->Paket_model->get_devisi();
		$data['get_jenis_anggaran'] = $this->Paket_model->get_jenis_anggaran();
		$data['get_metode'] = $this->Paket_model->get_metode_pemilihan();
		$data['get_jenis_pengadaan'] = $this->Paket_model->get_jenis_pengadaan();
		$data['get_produk_dl_negri'] = $this->Paket_model->get_produk_dalam_negri();
		$data['kabupaten'] = $this->Wilayah_model->getAllKabupaten();
		$data['provinsi'] = $this->Wilayah_model->getProvinsi();
		$this->load->view('template_paket/header');
		$this->load->view('template_paket/navbar');
		$this->load->view('paket/tambah_penyedia_baru', $data);
		$this->load->view('template_paket/footer');
		$this->load->view('paket/ajax', $data);
	}

	public function status_vendor($id_paket)
	{
		$status_vendor = $this->Paket_model->status_vendor($id_paket);
		$output = [
			"status_vendor" => $status_vendor,
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}
	// cok
	public function getdata_paket_tertender()
	{
		if ($this->session->userdata('id_role') == 1) {
			$resultss = $this->Paket_model->getdatatable_paket_tender();
			$data = [];
			$no = $_POST['start'];
			foreach ($resultss as $angga) {
				$row = array();
				$row[] = ++$no;
				if ($angga->status_paket_tender == 0) {
					$row[] = $angga->kode_jenis_anggaran . $angga->kode_jenis_pengadaan . $angga->kode_metode_pemilihan . $angga->kode_unit_kerja . $angga->kode_produk_dl_negri;
				} else {
					$row[] = $angga->kode_tender;
				}
				$row[] = $angga->nama_paket;
				$row[] = $angga->nama_metode_pemilihan;
				if ($angga->status_paket_tender == 1) {
					$row[] = '<label class="badge badge-warning"> Draft </label>';
				} else if ($angga->status_paket_tender == 1 && $angga->status_tahap_tender  == 1) {
					if (date('Y-m-d H:i', strtotime($angga->selesai_semua_tender)) > date('Y-m-d H:i')) {
						$row[] = '<label class="badge badge-info">Tender Sedang Berjalan </label>';
					} else {
						$row[] = '<label class="badge badge-success">Tender Sudah Selesai </label>';
					}
				} else if ($angga->status_paket_tender == 1 && $angga->status_tahap_tender  == 1) {
					if (date('Y-m-d H:i', strtotime($angga->selesai_semua_tender)) > date('Y-m-d H:i')) {
						$row[] = '<label class="badge badge-info">Tender Sedang Berjalan </label>';
					} else {
						$row[] = '<label class="badge badge-success">Tender Sudah Selesai </label>';
					}
				} else if ($angga->status_paket_tender == 2 && $angga->status_paket_tender == 2) {
					if (date('Y-m-d H:i', strtotime($angga->selesai_semua_tender)) > date('Y-m-d H:i')) {
						$row[] = '<label class="badge badge-info">Tender Sedang Berjalan </label>';
					} else {
						$row[] = '<label class="badge badge-success">Tender Sudah Selesai </label>';
					}
				} else if ($angga->status_paket_tender == 0) {
					if ($angga->status_pembatalan_atau_pengulangan == 2) {
						$row[] = '<a class="badge badge-warning" href="javascript:;" onClick="byid_paket_tender_biasa_berlangsung(' . "'" . $angga->id_paket . "','lihat_alasan_batal'" . ')"><i class="fas fa fa-eye"></i> Tender Batal / Mengulang</a>';
					} else {
						$row[] = '<label class="badge badge-danger">Belum Buat Tender!! </label>';
					}
				}

				if ($angga->status_paket_tender == 0) {
					$row[] = $angga->tanggal_buat_rup;
				} else {
					$row[] = $angga->tanggal_buat_paket_tender;
				}
				$row[] = $angga->nama_unit_kerja;
				if ($angga->status_tahap_tender == 2 && $angga->status_paket_tender == 2) {
					$row[] = '<a class="btn btn-success btn-sm" href="javascript:;" onClick="byid_paket_tender_biasa_berlangsung(' . "'" . $angga->id_paket . "','lihat_paket_tender_biasa'" . ')"><i class="fas fa fa-eye"></i> Lihat Paket</a>';
				} else {
					$row[] = '<label class="badge badge-danger"><i class="fas fa-sync"></i> Belum Di Umumkan</label>';
				}

				$data[] = $row;
			}
			$output = array(
				"draw" => intval($_POST['draw']),
				"recordsTotal" => $this->Paket_model->count_all_data(),
				"recordsFiltered" => $this->Paket_model->count_filtered_data(),
				"data" => $data
			);
			$this->output->set_content_type('application/json')->set_output(json_encode($output));
		} else if ($this->session->userdata('id_role') == 2 || $this->session->userdata('id_role') == 8) {
			$role_agency = $this->session->userdata('id_pegawai');
			$area_agency = $this->session->userdata('id_unit_kerja2');
			$resultsss = $this->Paket_model->getdatatable_paket_tender_agency($role_agency, $area_agency);
			$data = [];
			$no = $_POST['start'];
			foreach ($resultsss as $angga) {
				$row = array();
				$row[] = ++$no;
				if ($angga->status_paket_tender == 0) {
					$row[] = $angga->kode_jenis_anggaran . $angga->kode_jenis_pengadaan . $angga->kode_metode_pemilihan . $angga->kode_unit_kerja . $angga->kode_produk_dl_negri;
				} else {
					$row[] = $angga->kode_tender;
				}
				$row[] = $angga->nama_paket;
				$row[] = $angga->nama_metode_pemilihan;
				if ($angga->status_paket_tender == 1) {
					$row[] = '<label class="badge badge-warning"> Draft </label>';
				} elseif ($angga->status_paket_tender == 1 && $angga->status_tahap_tender  == 1) {
					if (date('Y-m-d H:i', strtotime($angga->selesai_semua_tender)) > date('Y-m-d H:i')) {
						$row[] = '<label class="badge badge-info">Tender Sedang Berjalan </label>';
					} else {
						$row[] = '<label class="badge badge-success">Tender Sudah Selesai </label>';
					}
				} elseif ($angga->status_paket_tender == 1 && $angga->status_tahap_tender  == 1) {
					if (date('Y-m-d H:i', strtotime($angga->selesai_semua_tender)) > date('Y-m-d H:i')) {
						$row[] = '<label class="badge badge-info">Tender Sedang Berjalan </label>';
					} else {
						$row[] = '<label class="badge badge-success">Tender Sudah Selesai </label>';
					}
				} elseif ($angga->status_paket_tender == 2 && $angga->status_paket_tender == 2) {
					if (date('Y-m-d H:i', strtotime($angga->selesai_semua_tender)) > date('Y-m-d H:i')) {
						$row[] = '<label class="badge badge-info">Tender Sedang Berjalan </label>';
					} else {
						$row[] = '<label class="badge badge-success">Tender Sudah Selesai </label>';
					}
				} else if ($angga->status_paket_tender == 0) {
					if ($angga->status_pembatalan_atau_pengulangan == 2) {
						$row[] = '<a class="badge badge-warning" href="javascript:;" onClick="byid_paket_tender_biasa_berlangsung(' . "'" . $angga->id_paket . "','lihat_alasan_batal'" . ')"><i class="fas fa fa-eye"></i> Tender Batal / Mengulang</a>';
					} else {
						$row[] = '<label class="badge badge-danger">Belum Buat Tender!! </label>';
					}
				}
				if ($angga->status_paket_tender == 0) {
					$row[] = $angga->tanggal_buat_rup;
				} else {
					$row[] = $angga->tanggal_buat_rup;
				}
				$row[] = $angga->nama_unit_kerja;
				// update 18 oktober 2022
				if ($angga->status_tahap_tender == 2 && $angga->status_paket_tender == 2) {
					$row[] = '<a href="javascipt:;" class="btn btn-sm btn-primary" onClick="byid_paket_tender_biasa_berlangsung(' . "'" . $angga->id_paket . "','lihat_tahap_tender'" . ')"><img src="' . base_url('assets/img/icon-jadwal.png') . '" width="25px" alt=""> Detail Jadwal</a> <a target="_blank" href="' . base_url('panitiajmtm/beranda/summary_tender/' . $angga->id_paket) . '" class="btn btn-sm btn-info" >Summary Tender</a>';
				} else {
					$row[] = '<button disabled class="btn btn-primary btn-sm" disabled><img src="' . base_url('assets/img/icon-jadwal.png') . '" width="25px" alt=""> Detail Jadwal</button>';
				}
				$data[] = $row;
			}
			$output = array(
				"draw" => intval($_POST['draw']),
				"recordsTotal" => $this->Paket_model->count_all_data_paket_agency(),
				"recordsFiltered" => $this->Paket_model->count_filtered_data_paket_agency($role_agency, $area_agency),
				"data" => $data
			);
			$this->output->set_content_type('application/json')->set_output(json_encode($output));
		} elseif ($this->session->userdata('id_role') == 6) {
			$role_agency = $this->session->userdata('id_pegawai');
			$area_agency = $this->session->userdata('id_unit_kerja2');
			$resultsss = $this->Paket_model->getdatatable_paket_tender_agency($role_agency, $area_agency);
			$data = [];
			$no = $_POST['start'];
			foreach ($resultsss as $angga) {
				$row = array();
				$row[] = ++$no;
				if ($angga->status_paket_tender == 0) {
					$row[] = $angga->kode_jenis_anggaran . $angga->kode_jenis_pengadaan . $angga->kode_metode_pemilihan . $angga->kode_unit_kerja . $angga->kode_produk_dl_negri;
				} else {
					$row[] = $angga->kode_tender;
				}
				$row[] = $angga->nama_paket;
				$row[] = $angga->nama_metode_pemilihan;

				if (date('Y-m-d H:i', strtotime($angga->selesai_semua_tender)) > date('Y-m-d H:i')) {
					$row[] = '<label class="badge badge-info">Tender Sedang Berjalan </label>';
				} else {
					$row[] = '<label class="badge badge-success">Tender Sudah Selesai </label>';
				}

				if ($angga->status_paket_tender == 0) {
					$row[] = $angga->tanggal_buat_rup;
				} else {
					$row[] = $angga->tanggal_buat_rup;
				}
				$row[] = $angga->nama_unit_kerja;
				$data[] = $row;
			}
			$output = array(
				"draw" => intval($_POST['draw']),
				"recordsTotal" => $this->Paket_model->count_all_data_paket_agency(),
				"recordsFiltered" => $this->Paket_model->count_filtered_data_paket_agency($role_agency, $area_agency),
				"data" => $data
			);
			$this->output->set_content_type('application/json')->set_output(json_encode($output));
		}
	}

	// TRANSAKSI LANGSUNG
	public function getdata_paket_tertender_transaksi_langsung()
	{
		if ($this->session->userdata('id_role') == 1) {
			$resultss = $this->Paket_model->getdatatable_paket_tender_transaksi_langsung();
			$data = [];
			$no = $_POST['start'];
			foreach ($resultss as $angga) {
				$row = array();
				$row[] = ++$no;
				if ($angga->status_paket_tender == 0) {
					$row[] = $angga->kode_jenis_anggaran . $angga->kode_jenis_pengadaan . $angga->kode_metode_pemilihan . $angga->kode_unit_kerja . $angga->kode_produk_dl_negri;
				} else {
					$row[] = $angga->kode_tender;
				}
				$row[] = $angga->nama_paket;
				$row[] = $angga->nama_metode_pemilihan;
				if (date('Y-m-d H:i', strtotime($angga->selesai_semua_tender)) > date('Y-m-d H:i')) {
					if ($angga->status_pembatalan_atau_pengulangan == 2) {
						$row[] = '<a class="badge badge-warning" href="javascript:;" onClick="byid_paket_tender_biasa_berlangsung(' . "'" . $angga->id_paket . "','lihat_alasan_batal'" . ')"><i class="fas fa fa-eye"></i> Tender Batal / Mengulang</a>';
					} else {
						if ($angga->status_tahap_tender == 0) {
							$row[] = '<label class="badge badge-danger">Tender Belum Diumumkan</label>';
						} else {
							$row[] = '<label class="badge badge-info">Tender Sedang Berjalan </label>';
						}
					}
				} else {
					if ($angga->status_paket_tender == 0) {
						$row[] = '<label class="badge badge-danger">Tender Belum Diumumkan</label>';
					} else {
						$row[] = '<label class="badge badge-success">Tender Sudah Selesai </label>';
					}
				}
				// if ($angga->status_paket_tender == 0) {
				// 	$row[] = '<label class="badge badge-warning">Draf</label>';
				// } else {
				// 	if (date('d F Y H:i', strtotime($angga->selesai_semua_tender))  > date('d F Y H:i')) {
				// 		$row[] = '<label class="badge badge-danger">Tender Sedang Berlangsung</label>';
				// 	} else if (date('d F Y H:i', strtotime($angga->selesai_semua_tender)) >= date('d F Y H:i') || date('d F Y H:i', strtotime($angga->selesai_semua_tender))  == date('d F Y H:i')) {
				// 		$row[] = '<label class="badge badge-danger">Tender Sedang Berlangsung</label>';
				// 	} else {
				// 		$row[] = '<label class="badge badge-success">Tender Sudah Selesai</label>';
				// 	}
				// }
				$row[] = $angga->tanggal_buat_rup;
				$row[] = $angga->nama_unit_kerja;
				if ($angga->selesai_semua_tender == null) {
					$row[] = '<label class="badge badge-danger"><i class="fas fa-sync"></i> Belum Di Umumkan / Belum Buat Paket</label>';
				} else {
					if (date('d F Y H:i', strtotime($angga->selesai_semua_tender))  >= date('d F Y H:i')) {
						$row[] = '<a class="btn btn-success btn-sm" href="javascript:;" onClick="byid_paket_transaksi_berlangsung(' . "'" . $angga->id_paket . "','lihat_transaksi_langsung'" . ')"><i class="fas fa fa-eye"></i> Lihat Paket</a>';
					} else if (date('d F Y H:i', strtotime($angga->selesai_semua_tender)) >= date('d F Y H:i') || date('d F Y H:i', strtotime($angga->selesai_semua_tender))  == date('d F Y H:i')) {
						$row[] = '<a class="btn btn-success btn-sm" href="javascript:;" onClick="byid_paket_transaksi_berlangsung(' . "'" . $angga->id_paket . "','lihat_transaksi_langsung'" . ')"><i class="fas fa fa-eye"></i> Lihat Paket</a>';
					} else {
						$row[] = '<a class="btn btn-success btn-sm" href="javascript:;" onClick="byid_paket_transaksi_berlangsung(' . "'" . $angga->id_paket . "','lihat_transaksi_langsung'" . ')"><i class="fas fa fa-eye"></i> Lihat Paket</a>';
					}
				}
				$data[] = $row;
			}
			$output = array(
				"draw" => intval($_POST['draw']),
				"recordsTotal" => $this->Paket_model->count_all_data_paket_tender_transaksi_langsung(),
				"recordsFiltered" => $this->Paket_model->count_filtered_data_paket_tender_transaksi_langsung(),
				"data" => $data
			);
			$this->output->set_content_type('application/json')->set_output(json_encode($output));

			// UNTUK ROLE AGENCY
		} else if ($this->session->userdata('id_role') == 2 || $this->session->userdata('id_role') == 8) {
			$role_agency = $this->session->userdata('id_pegawai');
			$area_agency = $this->session->userdata('id_unit_kerja2');
			$resultsss = $this->Paket_model->getdatatable_paket_tender_agency_transaksi_langsung($role_agency, $area_agency);
			$data = [];
			$no = $_POST['start'];
			foreach ($resultsss as $angga) {
				$row = array();
				$row[] = ++$no;
				if ($angga->status_paket_tender == 0) {
					$row[] = $angga->kode_jenis_anggaran . $angga->kode_jenis_pengadaan . $angga->kode_metode_pemilihan . $angga->kode_unit_kerja . $angga->kode_produk_dl_negri;
				} else {
					$row[] = $angga->kode_tender;
				}
				$row[] = $angga->nama_paket;
				$row[] = $angga->nama_metode_pemilihan;
				if (date('Y-m-d H:i', strtotime($angga->selesai_semua_tender)) > date('Y-m-d H:i')) {
					if ($angga->status_pembatalan_atau_pengulangan == 2) {
						$row[] = '<a class="badge badge-warning" href="javascript:;" onClick="byid_paket_tender_biasa_berlangsung(' . "'" . $angga->id_paket . "','lihat_alasan_batal'" . ')"><i class="fas fa fa-eye"></i> Tender Batal / Mengulang</a>';
					} else {
						if ($angga->status_tahap_tender == 0) {
							$row[] = '<label class="badge badge-danger">Tender Belum Diumumkan</label>';
						} else {
							$row[] = '<label class="badge badge-info">Tender Sedang Berjalan </label>';
						}
					}
				} else {
					if ($angga->status_paket_tender == 0) {
						$row[] = '<label class="badge badge-danger">Tender Belum Diumumkan</label>';
					} else {
						$row[] = '<label class="badge badge-success">Tender Sudah Selesai </label>';
					}
				}
				if ($angga->status_paket_tender == 0) {
					$row[] = $angga->tanggal_buat_rup;
				} else {
					$row[] = $angga->tanggal_buat_rup;
				}
				$row[] = $angga->nama_unit_kerja;
				if ($angga->selesai_semua_tender == null) {
					$row[] = '<label class="badge badge-danger"><i class="fas fa-sync"></i> Belum Di Umumkan / Belum Buat Paket</label>';
				} else {
					if (date('d F Y H:i', strtotime($angga->selesai_semua_tender))  >= date('d F Y H:i')) {
						$row[] = '<a class="btn btn-success btn-sm" href="javascript:;" onClick="byid_paket_transaksi_berlangsung(' . "'" . $angga->id_paket . "','lihat_transaksi_langsung'" . ')"><i class="fas fa fa-eye"></i> Lihat Paket</a>';
					} else if (date('d F Y H:i', strtotime($angga->selesai_semua_tender)) >= date('d F Y H:i') || date('d F Y H:i', strtotime($angga->selesai_semua_tender))  == date('d F Y H:i')) {
						$row[] = '<a class="btn btn-success btn-sm" href="javascript:;" onClick="byid_paket_transaksi_berlangsung(' . "'" . $angga->id_paket . "','lihat_transaksi_langsung'" . ')"><i class="fas fa fa-eye"></i> Lihat Paket</a>';
					} else {
						$row[] = '<a class="btn btn-success btn-sm" href="javascript:;" onClick="byid_paket_transaksi_berlangsung(' . "'" . $angga->id_paket . "','lihat_transaksi_langsung'" . ')"><i class="fas fa fa-eye"></i> Lihat Paket</a>';
					}
				}
				$data[] = $row;
			}
			$output = array(
				"draw" => intval($_POST['draw']),
				"recordsTotal" => $this->Paket_model->count_all_data_paket_agency_transaksi_langsung(),
				"recordsFiltered" => $this->Paket_model->count_filtered_data_paket_agency_transaksi_langsung($role_agency, $area_agency),
				"data" => $data
			);
			$this->output->set_content_type('application/json')->set_output(json_encode($output));
		} else if ($this->session->userdata('id_role') == 6) {
			$role_agency = $this->session->userdata('id_pegawai');
			$area_agency = $this->session->userdata('id_unit_kerja2');
			$resultsss = $this->Paket_model->getdatatable_paket_tender_agency_transaksi_langsung_manager($role_agency, $area_agency);
			$data = [];
			$no = $_POST['start'];
			foreach ($resultsss as $angga) {
				$row = array();
				$row[] = ++$no;
				$row[] = $angga->nama_paket;
				if ($angga->status_paket_tender == 0) {
					$row[] = $angga->kode_jenis_anggaran . $angga->kode_jenis_pengadaan . $angga->kode_metode_pemilihan . $angga->kode_unit_kerja . $angga->kode_produk_dl_negri;
				} else {
					$row[] = $angga->kode_tender;
				}
				$row[] = $angga->nama_metode_pemilihan;

				if ($angga->selesai_semua_tender == null) {
					$row[] = '<label class="badge badge-warning">Draf</label>';
				} else {
					if (date('Y-m-d H:i', strtotime($angga->selesai_semua_tender))  > date('Y-m-d H:i')) {
						$row[] = '<label class="badge badge-danger">Tender Sedang Berlangsung</label>';
					} else if (date('Y-m-d H:i', strtotime($angga->selesai_semua_tender)) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($angga->selesai_semua_tender))  == date('Y-m-d H:i')) {
						$row[] = '<label class="badge badge-danger">Tender Sedang Berlangsung</label>';
					} else {
						$row[] = '<label class="badge badge-success">Tender Selesai</label>';
					}
				}
				if ($angga->status_paket_tender == 0) {
					$row[] = $angga->tanggal_buat_rup;
				} else {
					$row[] = $angga->tanggal_buat_rup;
				}
				$row[] = $angga->nama_unit_kerja;
				if ($angga->status_persetujuan_manager == 3 || $angga->status_persetujuan_manager == 4) {
					$row[] = '<a class="btn btn-success btn-sm" href="javascript:;" onClick="byidTransaksiLangsung(' . "'" . $angga->id_paket . "','detail_transaksi_langsung'" . ')"><i class="fas fa fa-check"></i> Paket Sudah Di Setujui</a>';
				} else {
					$row[] = '<a class="btn btn-primary btn-sm" href="javascript:;" onClick="byidTransaksiLangsung(' . "'" . $angga->id_paket . "','detail_transaksi_langsung'" . ')"><i class="fas fa fa-eye"></i> Lihat Paket Dan Approvel</a>';
				}
				$data[] = $row;
			}
			$output = array(
				"draw" => intval($_POST['draw']),
				"recordsTotal" => $this->Paket_model->count_all_data_paket_agency_transaksi_langsung(),
				"recordsFiltered" => $this->Paket_model->count_filtered_data_paket_agency_transaksi_langsung($role_agency, $area_agency),
				"data" => $data
			);
			$this->output->set_content_type('application/json')->set_output(json_encode($output));
		}
	}
	// PENUNJUKAN LANGSUNG
	public function getdata_paket_tertender_penunjukan_langsung()
	{
		if ($this->session->userdata('id_role') == 1) {
			$resultss = $this->Paket_model->getdatatable_paket_tender_penunjukan_langsung();
			$data = [];
			$no = $_POST['start'];
			foreach ($resultss as $angga) {
				$row = array();
				$row[] = ++$no;
				if ($angga->status_paket_tender == 0) {
					$row[] = $angga->kode_jenis_anggaran . $angga->kode_jenis_pengadaan . $angga->kode_metode_pemilihan . $angga->kode_unit_kerja . $angga->kode_produk_dl_negri;
				} else {
					$row[] = $angga->kode_tender;
				}
				$row[] = $angga->nama_paket;
				$row[] = $angga->nama_metode_pemilihan;
				if ($angga->status_paket_tender == 1) {
					$row[] = '<label class="badge badge-warning"> Draft </label>';
				} else if ($angga->status_paket_tender == 1 && $angga->status_tahap_tender  == 1) {
					if (date('Y-m-d H:i', strtotime($angga->selesai_semua_tender)) > date('Y-m-d H:i')) {
						$row[] = '<label class="badge badge-info">Tender Sedang Berjalan </label>';
					} else {
						$row[] = '<label class="badge badge-success">Tender Sudah Selesai </label>';
					}
				} else if ($angga->status_paket_tender == 1 && $angga->status_tahap_tender  == 1) {
					if (date('Y-m-d H:i', strtotime($angga->selesai_semua_tender)) > date('Y-m-d H:i')) {
						$row[] = '<label class="badge badge-info">Tender Sedang Berjalan </label>';
					} else {
						$row[] = '<label class="badge badge-success">Tender Sudah Selesai </label>';
					}
				} else if ($angga->status_paket_tender == 2 && $angga->status_paket_tender == 2) {
					if (date('Y-m-d H:i', strtotime($angga->selesai_semua_tender)) > date('Y-m-d H:i')) {
						$row[] = '<label class="badge badge-info">Tender Sedang Berjalan </label>';
					} else {
						$row[] = '<label class="badge badge-success">Tender Sudah Selesai </label>';
					}
				} else if ($angga->status_paket_tender == 0) {
					$row[] = '<label class="badge badge-danger">Belum Buat Tender!! </label>';
				}
				if ($angga->status_paket_tender == 0) {
					$row[] = $angga->tanggal_buat_rup;
				} else {
					$row[] = $angga->tanggal_buat_paket_tender;
				}
				$row[] = $angga->nama_unit_kerja;
				if ($angga->status_tahap_tender == 2 && $angga->status_paket_tender == 2) {
					$row[] = '<a class="btn btn-success btn-sm" href="javascript:;" onClick="byid_paket_tender_biasa_berlangsung(' . "'" . $angga->id_paket . "','lihat_paket_tender_biasa'" . ')"><i class="fas fa fa-eye"></i> Lihat Paket</a>';
				} else {
					$row[] = '<label class="badge badge-danger"><i class="fas fa-sync"></i> Belum Di Umumkan / Belum Buat Paket</label>';
				}
				$data[] = $row;
			}
			$output = array(
				"draw" => intval($_POST['draw']),
				"recordsTotal" => $this->Paket_model->count_all_data_paket_tender_penunjukan_langsung(),
				"recordsFiltered" => $this->Paket_model->count_filtered_data_paket_tender_penunjukan_langsung(),
				"data" => $data
			);
			$this->output->set_content_type('application/json')->set_output(json_encode($output));

			// UNTUK ROLE AGENCY
		} else if ($this->session->userdata('id_role') == 2 || $this->session->userdata('id_role') == 8) {
			$role_agency = $this->session->userdata('id_pegawai');
			$area_agency = $this->session->userdata('id_unit_kerja2');
			$resultsss = $this->Paket_model->getdatatable_paket_tender_agency_penunjukan_langsung($role_agency, $area_agency);
			$data = [];
			$no = $_POST['start'];
			foreach ($resultsss as $angga) {
				$row = array();
				$row[] = ++$no;
				if ($angga->status_paket_tender == 0) {
					$row[] = $angga->kode_jenis_anggaran . $angga->kode_jenis_pengadaan . $angga->kode_metode_pemilihan . $angga->kode_unit_kerja . $angga->kode_produk_dl_negri;
				} else {
					$row[] = $angga->kode_tender;
				}
				$row[] = $angga->nama_paket;
				$row[] = $angga->nama_metode_pemilihan;
				if ($angga->status_paket_tender == 1) {
					$row[] = '<label class="badge badge-warning"> Draft </label>';
				} else if ($angga->status_paket_tender == 1 && $angga->status_tahap_tender  == 1) {
					if (date('Y-m-d H:i', strtotime($angga->selesai_semua_tender)) > date('Y-m-d H:i')) {
						$row[] = '<label class="badge badge-info">Tender Sedang Berjalan </label>';
					} else {
						$row[] = '<label class="badge badge-success">Tender Sudah Selesai </label>';
					}
				} else if ($angga->status_paket_tender == 1 && $angga->status_tahap_tender  == 1) {
					if (date('Y-m-d H:i', strtotime($angga->selesai_semua_tender)) > date('Y-m-d H:i')) {
						$row[] = '<label class="badge badge-info">Tender Sedang Berjalan </label>';
					} else {
						$row[] = '<label class="badge badge-success">Tender Sudah Selesai </label>';
					}
				} else if ($angga->status_paket_tender == 2 && $angga->status_paket_tender == 2) {
					if (date('Y-m-d H:i', strtotime($angga->selesai_semua_tender)) > date('Y-m-d H:i')) {
						$row[] = '<label class="badge badge-info">Tender Sedang Berjalan </label>';
					} else {
						$row[] = '<label class="badge badge-success">Tender Sudah Selesai </label>';
					}
				} else if ($angga->status_paket_tender == 0) {
					$row[] = '<label class="badge badge-danger">Belum Buat Tender!! </label>';
				}
				if ($angga->status_paket_tender == 0) {
					$row[] = $angga->tanggal_buat_rup;
				} else {
					$row[] = $angga->tanggal_buat_paket_tender;
				}
				$row[] = $angga->nama_unit_kerja;

				if ($angga->status_tahap_tender == 2 && $angga->status_paket_tender == 2) {
					$row[] = '<a class="btn btn-success btn-sm" href="javascript:;" onClick="byid_paket_tender_biasa_berlangsung(' . "'" . $angga->id_paket . "','lihat_paket_tender_biasa'" . ')"><i class="fas fa fa-eye"></i> Lihat Paket</a>';
				} else {
					$row[] = '<label class="badge badge-danger"><i class="fas fa-sync"></i> Belum Di Umumkan / Belum Buat Paket</label>';
				}
				$data[] = $row;
			}
			$output = array(
				"draw" => intval($_POST['draw']),
				"recordsTotal" => $this->Paket_model->count_all_data_paket_agency_penunjukan_langsung(),
				"recordsFiltered" => $this->Paket_model->count_filtered_data_paket_agency_penunjukan_langsung($role_agency, $area_agency),
				"data" => $data
			);
			$this->output->set_content_type('application/json')->set_output(json_encode($output));
		} else if ($this->session->userdata('id_role') == 6) {
			$role_agency = $this->session->userdata('id_pegawai');
			$area_agency = $this->session->userdata('id_unit_kerja2');
			$resultsss = $this->Paket_model->getdatatable_paket_tender_agency_penunjukan_langsung_manager($role_agency, $area_agency);
			$data = [];
			$no = $_POST['start'];
			foreach ($resultsss as $angga) {
				$row = array();
				$row[] = ++$no;
				$row[] = $angga->nama_paket;
				if ($angga->status_paket_tender == 0) {
					$row[] = $angga->kode_jenis_anggaran . $angga->kode_jenis_pengadaan . $angga->kode_metode_pemilihan . $angga->kode_unit_kerja . $angga->kode_produk_dl_negri;
				} else {
					$row[] = $angga->kode_tender;
				}
				$row[] = $angga->nama_metode_pemilihan;
				if ($angga->status_paket_tender == 1) {
					$row[] = '<label class="badge badge-success">Sedang Berlangsung</label>';
				} else {
					$row[] = '<label class="badge badge-warning">Draft</label>';
				}
				if ($angga->status_paket_tender == 0) {
					$row[] = $angga->tanggal_buat_rup;
				} else {
					$row[] = $angga->tanggal_buat_paket_tender;
				}
				$row[] = $angga->nama_unit_kerja;
				if ($angga->status_persetujuan_manager == 4) {
					$row[] = '<a class="btn btn-success btn-sm" href="javascript:;" onClick="byid_paket_tender_biasa_berlangsung(' . "'" . $angga->id_paket . "','lihat_paket_tender_biasa'" . ')"><i class="fas fa fa-eye"></i> Lihat Paket</a>';
				} else {
					$row[] = '<a class="btn btn-primary btn-sm" href="javascript:;" onClick="byidPenunjukanLangsung(' . "'" . $angga->id_paket . "','detail_penunjukan_langsung'" . ')"><i class="fas fa fa-eye"></i> Lihat Paket Dan Approvel</a>';
				}

				$data[] = $row;
			}
			$output = array(
				"draw" => intval($_POST['draw']),
				"recordsTotal" => $this->Paket_model->count_all_data_paket_agency_penunjukan_langsung(),
				"recordsFiltered" => $this->Paket_model->count_filtered_data_paket_agency_penunjukan_langsung($role_agency, $area_agency),
				"data" => $data
			);
			$this->output->set_content_type('application/json')->set_output(json_encode($output));
		}
	}

	// Penetpan LANGSUNG
	public function getdata_paket_tertender_penetapan_langsung_beranda()
	{
		if ($this->session->userdata('id_role') == 1) {
			$resultss = $this->Paket_model->getdatatable_paket_tender_penetapan_langsung();
			$data = [];
			$no = $_POST['start'];
			foreach ($resultss as $angga) {
				$row = array();
				$row[] = ++$no;
				if ($angga->status_paket_tender == 0) {
					$row[] = $angga->kode_jenis_anggaran . $angga->kode_jenis_pengadaan . $angga->kode_metode_pemilihan . $angga->kode_unit_kerja . $angga->kode_produk_dl_negri;
				} else {
					$row[] = $angga->kode_tender;
				}
				$row[] = $angga->nama_paket;
				$row[] = $angga->nama_metode_pemilihan;
				if ($angga->selesai_semua_tender == null) {
					$row[] = '<label class="badge badge-warning">Draf</label>';
				} else {
					if (date('d F Y H:i', strtotime($angga->selesai_semua_tender))  >= date('d F Y H:i')) {
						$row[] = '<label class="badge badge-danger">Tender Sedang Berlangsung</label>';
					} else if (date('d F Y H:i', strtotime($angga->selesai_semua_tender)) >= date('d F Y H:i') || date('d F Y H:i', strtotime($angga->selesai_semua_tender))  == date('d F Y H:i')) {
						$row[] = '<label class="badge badge-danger">Tender Sedang Berlangsung</label>';
					} else {
						$row[] = '<label class="badge badge-success">Tender Selesai</label>';
					}
				}
				$row[] = $angga->tanggal_buat_rup;
				$row[] = $angga->nama_unit_kerja;
				if ($angga->selesai_semua_tender == null) {
					$row[] = '<label class="badge badge-danger"><i class="fas fa-sync"></i> Belum Di Umumkan / Belum Buat Paket</label>';
				} else {
					if (date('d F Y H:i', strtotime($angga->selesai_semua_tender))  >= date('d F Y H:i')) {
						$row[] = '<a class="btn btn-success btn-sm" href="javascript:;" onClick="byid_paket_transaksi_berlangsung(' . "'" . $angga->id_paket . "','lihat_paket_penetapan_biasa'" . ')"><i class="fas fa fa-eye"></i> Lihat Paket</a>';
					} else if (date('d F Y H:i', strtotime($angga->selesai_semua_tender)) >= date('d F Y H:i') || date('d F Y H:i', strtotime($angga->selesai_semua_tender))  == date('d F Y H:i')) {
						$row[] = '<a class="btn btn-success btn-sm" href="javascript:;" onClick="byid_paket_transaksi_berlangsung(' . "'" . $angga->id_paket . "','lihat_paket_penetapan_biasa'" . ')"><i class="fas fa fa-eye"></i> Lihat Paket</a>';
					} else {
						$row[] = '<a class="btn btn-success btn-sm" href="javascript:;" onClick="byid_paket_transaksi_berlangsung(' . "'" . $angga->id_paket . "','lihat_paket_penetapan_biasa'" . ')"><i class="fas fa fa-eye"></i> Lihat Paket</a>';
					}
				}
				$data[] = $row;
			}
			$output = array(
				"draw" => intval($_POST['draw']),
				"recordsTotal" => $this->Paket_model->count_all_data_paket_tender_penetapan_langsung(),
				"recordsFiltered" => $this->Paket_model->count_filtered_data_paket_tender_penetapan_langsung(),
				"data" => $data
			);
			$this->output->set_content_type('application/json')->set_output(json_encode($output));

			// UNTUK ROLE AGENCY
		} else if ($this->session->userdata('id_role') == 2 || $this->session->userdata('id_role') == 8) {
			$role_agency = $this->session->userdata('id_pegawai');
			$area_agency = $this->session->userdata('id_unit_kerja2');
			$resultsss = $this->Paket_model->getdatatable_paket_tender_agency_penetapan_langsung($role_agency, $area_agency);
			$data = [];
			$no = $_POST['start'];
			foreach ($resultsss as $angga) {
				$row = array();
				$row[] = ++$no;
				if ($angga->status_paket_tender == 0) {
					$row[] = $angga->kode_jenis_anggaran . $angga->kode_jenis_pengadaan . $angga->kode_metode_pemilihan . $angga->kode_unit_kerja . $angga->kode_produk_dl_negri;
				} else {
					$row[] = $angga->kode_tender;
				}
				$row[] = $angga->nama_paket;
				$row[] = $angga->nama_metode_pemilihan;
				if ($angga->selesai_semua_tender == null) {
					$row[] = '<label class="badge badge-warning">Draf</label>';
				} else {
					if (date('d F Y H:i', strtotime($angga->selesai_semua_tender))  >= date('d F Y H:i')) {
						$row[] = '<label class="badge badge-danger">Tender Sedang Berlangsung</label>';
					} else if (date('d F Y H:i', strtotime($angga->selesai_semua_tender)) >= date('d F Y H:i') || date('d F Y H:i', strtotime($angga->selesai_semua_tender))  == date('d F Y H:i')) {
						$row[] = '<label class="badge badge-danger">Tender Sedang Berlangsung</label>';
					} else {
						$row[] = '<label class="badge badge-success">Tender Selesai</label>';
					}
				}
				if ($angga->status_paket_tender == 0) {
					$row[] = $angga->tanggal_buat_rup;
				} else {
					$row[] = $angga->tanggal_buat_rup;
				}
				$row[] = $angga->nama_unit_kerja;
				if ($angga->selesai_semua_tender == null) {
					$row[] = '<label class="badge badge-danger"><i class="fas fa-sync"></i> Belum Di Umumkan / Belum Buat Paket</label>';
				} else {
					if (date('d F Y H:i', strtotime($angga->selesai_semua_tender))  >= date('d F Y H:i')) {
						$row[] = '<a class="btn btn-success btn-sm" href="javascript:;" onClick="byid_paket_transaksi_berlangsung(' . "'" . $angga->id_paket . "','lihat_paket_penetapan_biasa'" . ')"><i class="fas fa fa-eye"></i> Lihat Paket</a>';
					} else if (date('d F Y H:i', strtotime($angga->selesai_semua_tender)) >= date('d F Y H:i') || date('d F Y H:i', strtotime($angga->selesai_semua_tender))  == date('d F Y H:i')) {
						$row[] = '<a class="btn btn-success btn-sm" href="javascript:;" onClick="byid_paket_transaksi_berlangsung(' . "'" . $angga->id_paket . "','lihat_paket_penetapan_biasa'" . ')"><i class="fas fa fa-eye"></i> Lihat Paket</a>';
					} else {
						$row[] = '<a class="btn btn-success btn-sm" href="javascript:;" onClick="byid_paket_transaksi_berlangsung(' . "'" . $angga->id_paket . "','lihat_paket_penetapan_biasa'" . ')"><i class="fas fa fa-eye"></i> Lihat Paket</a>';
					}
				}
				$data[] = $row;
			}
			$output = array(
				"draw" => intval($_POST['draw']),
				"recordsTotal" => $this->Paket_model->count_all_data_paket_agency_penetapan_langsung(),
				"recordsFiltered" => $this->Paket_model->count_filtered_data_paket_agency_penetapan_langsung($role_agency, $area_agency),
				"data" => $data
			);
			$this->output->set_content_type('application/json')->set_output(json_encode($output));
		} else if ($this->session->userdata('id_role') == 6) {
			$role_agency = $this->session->userdata('id_pegawai');
			$area_agency = $this->session->userdata('id_unit_kerja2');
			$resultsss = $this->Paket_model->getdatatable_paket_tender_agency_penetapan_langsung_manager($role_agency, $area_agency);
			$data = [];
			$no = $_POST['start'];
			foreach ($resultsss as $angga) {
				$row = array();
				$row[] = ++$no;
				$row[] = $angga->nama_paket;
				if ($angga->status_paket_tender == 0) {
					$row[] = $angga->kode_jenis_anggaran . $angga->kode_jenis_pengadaan . $angga->kode_metode_pemilihan . $angga->kode_unit_kerja . $angga->kode_produk_dl_negri;
				} else {
					$row[] = $angga->kode_tender;
				}
				$row[] = $angga->nama_metode_pemilihan;
				if ($angga->selesai_semua_tender == null) {
					$row[] = '<label class="badge badge-warning">Draf</label>';
				} else {
					if (date('d F Y H:i', strtotime($angga->selesai_semua_tender))  >= date('d F Y H:i')) {
						$row[] = '<label class="badge badge-danger">Tender Sedang Berlangsung</label>';
					} else if (date('d F Y H:i', strtotime($angga->selesai_semua_tender)) >= date('d F Y H:i') || date('d F Y H:i', strtotime($angga->selesai_semua_tender))  == date('d F Y H:i')) {
						$row[] = '<label class="badge badge-danger">Tender Sedang Berlangsung</label>';
					} else {
						$row[] = '<label class="badge badge-success">Tender Selesai</label>';
					}
				}
				if ($angga->status_paket_tender == 0) {
					$row[] = $angga->tanggal_buat_rup;
				} else {
					$row[] = $angga->tanggal_buat_rup;
				}
				$row[] = $angga->nama_unit_kerja;
				$data[] = $row;
			}
			$output = array(
				"draw" => intval($_POST['draw']),
				"recordsTotal" => $this->Paket_model->count_all_data_paket_agency_penetapan_langsung(),
				"recordsFiltered" => $this->Paket_model->count_filtered_data_paket_agency_penetapan_langsung($role_agency, $area_agency),
				"data" => $data
			);
			$this->output->set_content_type('application/json')->set_output(json_encode($output));
		}
	}

	// ini get data paket tender seblom di buat paket tendernya
	public function getdata_dari_rup()
	{
		if ($this->session->userdata('id_role') == 1) {
			$resultss = $this->Paket_model->getdatatable();
			$data = [];
			$no = $_POST['start'];
			foreach ($resultss as $angga) {
				$row = array();
				$row[] = ++$no;
				$row[] = $angga->kode_jenis_anggaran . $angga->kode_jenis_pengadaan . $angga->kode_metode_pemilihan . $angga->kode_unit_kerja . $angga->kode_produk_dl_negri;
				if ($angga->status_paket_tender >= 1 && $angga->id_kualifikasi >= 1 && $angga->id_kualifikasi <= 15) {

					// desember 2022
					$row[] = '<a href="' . base_url('paket/edit/' . $angga->id_paket) . '" class="btn btn-sm btn-block btn-warning">Edit</a>
					<div class="alert alert-success" role="alert"> <i class="far fa-thumbs-up"></i> Paket ' . $angga->nama_paket . '<br>Sedang Berlangsung !!</div>
					';
				} else {
					$row[] = '<a href="javascript:;" onClick="byid(' . "'" . $angga->id_paket . "','detail'" . ')">' . $angga->nama_paket . '</a>';
				}
				$row[] = $angga->nama_unit_kerja;
				$row[] = $angga->program_paket;
				$row[] = $angga->nama_jenis_pengadaan;
				$row[] = $angga->nama_metode_pemilihan;
				$row[] = $angga->nama_jenis_anggaran;
				$data[] = $row;
			}
			$output = array(
				"draw" => intval($_POST['draw']),
				"recordsTotal" => $this->Paket_model->count_all_data(),
				"recordsFiltered" => $this->Paket_model->count_filtered_data(),
				"data" => $data
			);
			$this->output->set_content_type('application/json')->set_output(json_encode($output));
		} else if (($this->session->userdata('id_role') == 2 || $this->session->userdata('id_role') == 8)) {
			$role_agency = $this->session->userdata('id_pegawai');
			$area_agency = $this->session->userdata('id_unit_kerja2');
			$resultss = $this->Paket_model->getdatatable2($role_agency,  $area_agency);
			$data = [];
			$no = $_POST['start'];
			foreach ($resultss as $angga) {
				$row = array();
				$row[] = ++$no;
				$row[] = $angga->kode_jenis_anggaran . $angga->kode_jenis_pengadaan . $angga->kode_metode_pemilihan . $angga->kode_unit_kerja . $angga->kode_produk_dl_negri;
				if ($angga->status_paket_tender >= 1 && $angga->id_kualifikasi <= 16) {
					$row[] = '<div class="alert alert-success" role="alert"> <i class="far fa-thumbs-up"></i> Paket ' . $angga->nama_paket . '<br>Sedang Berlangsung !!</div>';
				} else {
					$row[] = '<a href="javascript:;" onClick="byid(' . "'" . $angga->id_paket . "','detail_transaksi'" . ')">' . $angga->nama_paket . '</a>';
				}
				$row[] = $angga->nama_unit_kerja;
				$row[] = $angga->program_paket;
				$row[] = $angga->nama_jenis_pengadaan;
				$row[] = $angga->nama_metode_pemilihan;
				$row[] = $angga->nama_jenis_anggaran;
				$data[] = $row;
			}
			$output = array(
				"draw" => intval($_POST['draw']),
				"recordsTotal" => $this->Paket_model->count_all_data2(),
				"recordsFiltered" => $this->Paket_model->count_filtered_data2($role_agency,  $area_agency),
				"data" => $data
			);
			$this->output->set_content_type('application/json')->set_output(json_encode($output));
		}
	}

	// get paket tender dari rup untuk transaksi langsung
	public function getdata_dari_rup_transaksi_langsung()
	{
		if ($this->session->userdata('id_role') == 1) {
			$resultss = $this->Paket_model->getdatatable_tambah_transaksi_langsung();
			$data = [];
			$no = $_POST['start'];
			foreach ($resultss as $angga) {
				$row = array();
				$row[] = ++$no;
				$row[] = $angga->kode_jenis_anggaran . $angga->kode_jenis_pengadaan . $angga->kode_metode_pemilihan . $angga->kode_unit_kerja . $angga->kode_produk_dl_negri;
				if ($angga->status_paket_tender >= 1 && $angga->id_kualifikasi >= 1 && $angga->id_kualifikasi <= 15) {

					$row[] = '<div class="alert alert-success" role="alert"> <i class="far fa-thumbs-up"></i> Paket ' . $angga->nama_paket . '<br>Sedang Berlangsung !!</div>';
				} else {
					$row[] = '<a href="javascript:;" onClick="byid(' . "'" . $angga->id_paket . "','detail'" . ')">' . $angga->nama_paket . '</a>';
				}
				$row[] = $angga->nama_unit_kerja;
				$row[] = $angga->program_paket;
				$row[] = $angga->nama_jenis_pengadaan;
				$row[] = $angga->nama_metode_pemilihan;
				$row[] = $angga->nama_jenis_anggaran;
				$row[] = '<a class="btn btn-block btn-sm btn-success" href="javascript:;" onClick="byid(' . "'" . $angga->id_paket . "','detail'" . ')"> <i class="fas fa fa-edit"></i> Edit Paket</a>';
				$data[] = $row;
			}
			$output = array(
				"draw" => intval($_POST['draw']),
				"recordsTotal" => $this->Paket_model->count_all_data_tambah_transaksi_langsung(),
				"recordsFiltered" => $this->Paket_model->count_filtered_data_tambah_transaksi_langsung(),
				"data" => $data
			);
			$this->output->set_content_type('application/json')->set_output(json_encode($output));
		} else if (($this->session->userdata('id_role') == 2 || $this->session->userdata('id_role') == 8)) {
			$role_agency = $this->session->userdata('id_pegawai');
			$area_agency = $this->session->userdata('id_unit_kerja2');
			$resultss = $this->Paket_model->getdatatable2_tambah_transaksi_langsung($role_agency,  $area_agency);
			$data = [];
			$no = $_POST['start'];
			foreach ($resultss as $angga) {
				$row = array();
				$row[] = ++$no;
				$row[] = $angga->kode_jenis_anggaran . $angga->kode_jenis_pengadaan . $angga->kode_metode_pemilihan . $angga->kode_unit_kerja . $angga->kode_produk_dl_negri;
				if ($angga->status_paket_tender >= 1 && $angga->id_kualifikasi <= 16) {
					$row[] = '<div class="alert alert-success" role="alert"> <i class="far fa-thumbs-up"></i> Paket ' . $angga->nama_paket . '<br>Sedang Berlangsung !!</div>';
				} else {
					$row[] = '<a href="javascript:;" onClick="byid(' . "'" . $angga->id_paket . "','detail'" . ')">' . $angga->nama_paket . '</a>';
				}
				$row[] = $angga->nama_unit_kerja;
				$row[] = $angga->program_paket;
				$row[] = $angga->nama_jenis_pengadaan;
				$row[] = $angga->nama_metode_pemilihan;
				$row[] = $angga->nama_jenis_anggaran;
				$row[] = '<a class="btn btn-sm btn-success btn-block" href="javascript:;" onClick="byid(' . "'" . $angga->id_paket . "','detail'" . ')"> <i class="fas fa fa-edit"></i> Edit Paket</a>';
				$data[] = $row;
			}
			$output = array(
				"draw" => intval($_POST['draw']),
				"recordsTotal" => $this->Paket_model->count_all_data2_tambah_transaksi_langsung(),
				"recordsFiltered" => $this->Paket_model->count_filtered_data2_tambah_transaksi_langsung($role_agency,  $area_agency),
				"data" => $data
			);
			$this->output->set_content_type('application/json')->set_output(json_encode($output));
		}
	}



	public function byid_paket_transaksi_berlangsung($id_paket)
	{
		$get_paket = $this->Paket_model->getByid($id_paket);
		$output = [
			"get_paket" => $get_paket,
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function byid($id_paket)
	{

		$getsumberdana = $this->Paket_model->getSumberDana($id_paket);
		$getlokasipekerjaan = $this->Paket_model->getLokasiPekerjaan($id_paket);
		$getjadwalpemilihan = $this->Paket_model->getJadwalPemilihan($id_paket);
		$get_paket = $this->Paket_model->getByid($id_paket);
		$output = [
			"get_paket" => $get_paket,
			"get_sumberdana" => $getsumberdana,
			"get_lokasi_kerja" => $getlokasipekerjaan,
			"get_jadwal_pemilihan" => $getjadwalpemilihan
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function byBuatPaket($id_paket)
	{

		$getsumberdana = $this->Paket_model->getSumberDana($id_paket);
		$getlokasipekerjaan = $this->Paket_model->getLokasiPekerjaan($id_paket);
		$getjadwalpemilihan = $this->Paket_model->getJadwalPemilihan($id_paket);
		$get_paket = $this->Paket_model->getByid($id_paket);
		$output = [
			"get_paket" => $get_paket,
			"get_sumberdana" => $getsumberdana,
			"get_lokasi_kerja" => $getlokasipekerjaan,
			"get_jadwal_pemilihan" => $getjadwalpemilihan
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}
	// ========
	// =============================LOKASI PEKERJAAN===========================
	// ========
	// =================================BATAS========================
	public function data_get_lokasi_pekerjaan($id_paket)
	{
		$resultss = $this->Paket_model->getdatatablelokasi($id_paket);
		$no = $_POST['start'];
		$data = [];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] = $angga->nama_provinsi;
			$row[] = $angga->nama_kabupaten;
			$row[] = $angga->detail_lokasi;
			$row[] = '<a href="#" class="btn btn-success btn-sm" onClick="byidLokasi(' . "'" . $angga->id_lokasi_pekerjaan . "','editlokasi'" . ')"><i class="fas fa-edit"></i> Edit</a> <a href="#" class="btn btn-danger btn-sm" onClick="byidLokasi(' . "'" . $angga->id_lokasi_pekerjaan . "','hapuslokasi'" . ')">  <i class="fas fa-trash"></i> Hapus</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Paket_model->count_all_datalokasi($id_paket),
			"recordsFiltered" => $this->Paket_model->count_filtered_datalokasi($id_paket),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}
	// ADD LOKASI
	public function add_lokasi_kerja()
	{
		$data = [
			'id_paket' => htmlspecialchars($this->input->post('id_paket')),
			'id_provinsi' => htmlspecialchars($this->input->post('id_provinsi')),
			'id_kabupaten' => htmlspecialchars($this->input->post('id_kabupaten')),
			'detail_lokasi' => htmlspecialchars($this->input->post('detail_lokasi')),
		];
		$this->Paket_model->create_lokasi_kerja($data);
		$this->output->set_content_type('application/json')->set_output(json_encode('clear'));
	}
	// EDIT LOKASI
	public function edit_lokasi_kerja()
	{
		$data = [
			'id_provinsi' => htmlspecialchars($this->input->post('id_provinsi')),
			'id_kabupaten' => htmlspecialchars($this->input->post('id_kabupaten')),
			'detail_lokasi' => htmlspecialchars($this->input->post('detail_lokasi')),
		];
		$this->Paket_model->updatelokasi_pekerjaan(array('id_lokasi_pekerjaan' => $this->input->post('id_lokasi_pekerjaan')), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode('clear'));
	}
	// GET BY ID LOKASI
	public function byidLokasi($id_lokasi_pekerjaan)
	{
		$data = $this->Paket_model->getLokasiPekerjaanbyid($id_lokasi_pekerjaan);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}
	// HAPUS DATA
	public function delete_lokasi_pekerjaan($id_lokasi_pekerjaan)
	{
		$data = $this->Paket_model->deletedata_lokasi_pekerjaan($id_lokasi_pekerjaan);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}
	// ========
	// =============================END LOKASI PEKERJAAN===========================
	// ========

	// ==============================BATASS========================================

	// ========
	// =============================SUMBER DANA===================================
	// ========

	// EDIT RUP BAGIAN SUMBERDANA
	public function data_get_sumberdana($id_paket)
	{
		$resultss = $this->Paket_model->getdatatablesumberdana($id_paket);
		$no = $_POST['start'];
		// $total = 0;
		$data = [];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] = $angga->asal_dana;
			$row[] = "Rp " . number_format($angga->hps, 2, ',', '.');
			// $row[] = $total += $angga->hps;
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Paket_model->count_all_datasumberdana($id_paket),
			"recordsFiltered" => $this->Paket_model->count_filtered_sumberdana($id_paket),
			"data" => $data,
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}
	// ADD LOKASI
	public function add_sumberdana()
	{
		$data = [
			'id_paket' => htmlspecialchars($this->input->post('id_paket')),
			'asal_dana' => htmlspecialchars($this->input->post('asal_dana')),
			'hps' => htmlspecialchars($this->input->post('hps')),
		];
		$this->Paket_model->create_sumberdana($data);
		$this->output->set_content_type('application/json')->set_output(json_encode('clear'));
	}
	// EDIT LOKASI
	public function edit_sumberdana()
	{
		$data = [
			'asal_dana' => htmlspecialchars($this->input->post('asal_dana')),
			'hps' => htmlspecialchars($this->input->post('hps')),
		];
		$this->Paket_model->updatesumberdana(array('id_sumber_dana' => $this->input->post('id_sumber_dana')), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode('clear'));
	}
	// GET BY ID LOKASI
	public function byidSumberdana($id_sumber_dana)
	{
		$data = $this->Paket_model->getSumberDanabyid($id_sumber_dana);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}
	// HAPUS DATA
	public function delete_sumberdana($id_sumber_dana)
	{
		$data = $this->Paket_model->deletedatasumberdana($id_sumber_dana);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}
	// ========
	// =============================END SUMBER DANA===========================
	// ========
	// ==============================BATASS========================================

	// ========
	// =============================JADWAL PEMILIHAN ===================================
	// ========

	// EDIT RUP BAGIAN JADWAL PEMILIHAN
	public function data_get_jadwal_pemilihan($id_paket)
	{
		$resultss = $this->Paket_model->getdatatablejadwal_pemilihan($id_paket);
		$no = $_POST['start'];
		$data = [];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] = $angga->asal_dana;
			$row[] = $angga->hps;
			$row[] = '<a href="#" class="btn btn-success btn-sm" onClick="byidJadwal_pemilihan(' . "'" . $angga->id_sumber_dana . "','editjadwal_pemilihan'" . ')"><i class="fas fa-edit"></i> Edit</a> <a href="#" class="btn btn-danger btn-sm" onClick="byidJadwal_pemilihan(' . "'" . $angga->id_sumber_dana . "','hapusjadwal_pemilihan'" . ')">  <i class="fas fa-trash"></i> Hapus</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Paket_model->count_all_datajadwal_pemilihan($id_paket),
			"recordsFiltered" => $this->Paket_model->count_filtered_jadwal_pemilihan($id_paket),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}
	// ADD LOKASI
	public function add_jadwal_pemilihan()
	{
		$data = [
			'id_paket' => htmlspecialchars($this->input->post('id_paket')),
			'asal_dana' => htmlspecialchars($this->input->post('asal_dana')),
			'hps' => htmlspecialchars($this->input->post('hps')),
		];
		$this->Paket_model->create_jadwal_pemilihan($data);
		$this->output->set_content_type('application/json')->set_output(json_encode('clear'));
	}
	// EDIT LOKASI
	public function edit_jadwal_pemilihan()
	{
		$data = [
			'asal_dana' => htmlspecialchars($this->input->post('asal_dana')),
			'hps' => htmlspecialchars($this->input->post('hps')),
		];
		$this->Paket_model->updatejadwal_pemilihan(array('id_sumber_dana' => $this->input->post('id_sumber_dana')), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode('clear'));
	}
	// GET BY ID LOKASI
	public function byidjadwal_pemilihan($id_sumber_dana)
	{
		$data = $this->Paket_model->getjadwal_pemilihanbyid($id_sumber_dana);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}
	// HAPUS DATA
	public function delete_jadwal_pemilihan($id_sumber_dana)
	{
		$data = $this->Paket_model->deletedatajadwal_pemilihan($id_sumber_dana);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}
	// ========
	// =============================END JADWAL PEMILIHAN===========================
	// ========

	// ========
	// =============================UPLOAD EXCEL RUP===========================
	// ========
	public function uploaddata()
	{
		$id_paket = $this->input->post('id_paket');
		$config['upload_path'] = './rincian_hps/';
		$config['allowed_types'] = 'xlsx|xls';
		$config['file_name'] = 'doc' . time();
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('importexcelhps')) {
			$file = $this->upload->data();
			$reader = ReaderEntityFactory::createXLSXReader();
			$reader->open('rincian_hps/' . $file['file_name']);
			foreach ($reader->getSheetIterator() as $sheet) {
				$numRow = 1;
				foreach ($sheet->getRowIterator() as $row) {
					if ($numRow > 1) {
						$rincian_hps = array(
							'jenis_barang_jasa_rincian_hps' => $row->getCellAtIndex(0),
							'satuan_rincian_hps' => $row->getCellAtIndex(1),
							'vol_rincian_hps' => $row->getCellAtIndex(2),
							'harga_rincian_hps ' => $row->getCellAtIndex(3),
							'persen_rincian_hps' => $row->getCellAtIndex(4),
							'keterangan_rincian_hps' => $row->getCellAtIndex(5),
							'status_hps' => 1,
							'id_paket' => $id_paket,
						);
						$this->Paket_model->insert_via_excel_rincian_hps($rincian_hps);
					}
					$numRow++;
				}
				$reader->close();
				unlink('rincian_hps/' . $file['file_name']);
				$this->session->set_flashdata('pesan', 'Data Berhasil Di Import');
				redirect('paket/rincian_hps/' . $id_paket);
			}
		} else {
			echo "Error : " . $this->upload->display_errors();
		}
	}


	// ========
	// =============================DOWNLOAD TEMPLATE_paket EXCEL RUP===========================
	// ========
	public function downloadtemplate_paket()
	{
		$this->load->view('rup_penyedia/download_excel');
	}

	// RINCIAN HPS
	public function rincian_hps($id_paket)
	{
		$data['total_rincian_hps']  = $this->Paket_model->totalRincianHps($id_paket);
		$data['total_hps']  = $this->Paket_model->totalhps($id_paket);
		$data['sumberdana']  = $this->Paket_model->getSumberDana($id_paket);
		$data['lokasi_kerja']  = $this->Paket_model->getLokasiPekerjaan($id_paket);
		$data['jadwal_pemilihan']  = $this->Paket_model->getJadwalPemilihan($id_paket);
		$data['angga'] = $this->Paket_model->getByid($id_paket);
		$data['getdivisi'] = $this->Paket_model->get_devisi();
		$data['get_jenis_anggaran'] = $this->Paket_model->get_jenis_anggaran();
		$data['get_metode'] = $this->Paket_model->get_metode_pemilihan();
		$data['get_jenis_pengadaan'] = $this->Paket_model->get_jenis_pengadaan();
		$data['get_produk_dl_negri'] = $this->Paket_model->get_produk_dalam_negri();
		$data['kabupaten'] = $this->Wilayah_model->getAllKabupaten();
		$data['provinsi'] = $this->Wilayah_model->getProvinsi();
		$this->load->view('template_paket/header');
		$this->load->view('template_paket/navbar');
		$this->load->view('paket/rincian_hps', $data);
		$this->load->view('template_paket/footer');
		$this->load->view('paket/ajax', $data);
	}

	// by id rincian_hps get by id

	public function data_get_rincian_hps($id_paket)
	{
		$resultss = $this->Paket_model->getdatatableRincianHps($id_paket);
		$no = $_POST['start'];
		// $total = 0;
		$data = [];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] = $angga->jenis_barang_jasa_rincian_hps;
			$row[] = $angga->satuan_rincian_hps;
			$row[] = $angga->vol_rincian_hps;
			$row[] = "Rp " . number_format($angga->harga_rincian_hps, 2, ',', '.');
			$row[] = "Rp " . number_format($angga->vol_rincian_hps * $angga->harga_rincian_hps, 2, ',', '.');
			$row[] = $angga->persen_rincian_hps . "%";
			$row[] = "Rp " . number_format($angga->vol_rincian_hps * $angga->harga_rincian_hps + ($angga->persen_rincian_hps / 100) * $angga->vol_rincian_hps * $angga->harga_rincian_hps, 2, ',', '.');
			$row[] = $angga->keterangan_rincian_hps;
			$row[] = '<a href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byidRincianHps(' . "'" . $angga->id_rincian_hps . "','editRincianHps'" . ')"><i class="fas fa-edit"></i> Edit</a> <a href="javascript:;" class="btn btn-danger  btn-block btn-sm" onClick="byidRincianHps(' . "'" . $angga->id_rincian_hps . "','hapusRincianHps'" . ')">  <i class="fas fa-trash"></i> Hapus</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Paket_model->count_all_dataRincianHps($id_paket),
			"recordsFiltered" => $this->Paket_model->count_filtered_RincianHps($id_paket),
			"data" => $data,
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function data_get_rincian_hps_pdf($id_paket)
	{
		// $data['rincian_hps_pdf']  = $this->Paket_model->get_by_rincian_hps_pdf($id_paket);
		$resultss = $this->Paket_model->getdatatableRincianHps_pdf($id_paket);
		$no = $_POST['start'];
		// $total = 0;
		$data = [];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] = $angga->nama_rincian_hps_pdf;
			$row[] = '<a href=' . base_url('/rincian_hps_pdf_file' . '/' . $angga->file_rincian_hps_pdf) . '>' . '<img width="30px" src=' . base_url('assets/img/pdf.png') . ' >' . '</a>';
			$row[] = "Rp " . number_format($angga->total_rincian_hps_pdf, 2, ',', '.');
			$row[] = '<a href="javascript:;" class="btn btn-danger  btn-block btn-sm" onClick="byidRincianHps_pdf(' . "'" . $angga->id_rincian_hps_pdf . "','hapus_rincian_hps_pdf'" . ')">  <i class="fas fa-trash"></i> Hapus</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Paket_model->count_all_dataRincianHps_pdf($id_paket),
			"recordsFiltered" => $this->Paket_model->count_filtered_RincianHps_pdf($id_paket),
			"data" => $data,
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}


	public function byidRincianHps_pdf($id_rincian_hps_pdf)
	{

		$get_rincian_hps_pdf = $this->Paket_model->get_by_rincian_hps_pdf2($id_rincian_hps_pdf);
		$output = [
			"get_rincian_hps_pdf" => $get_rincian_hps_pdf,
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}


	public function hps_pdf_sudah_di_buat($id_paket)
	{

		$sudah_dibuat_hps = $this->Paket_model->get_by_rincian_hps_pdf_sudah_dibuat($id_paket);
		$sudah_dibuat_hps_manual = $this->Paket_model->get_by_rincian_hps_sudah_dibuat($id_paket);

		$output = [
			"sudah_dibuat_hps" => $sudah_dibuat_hps,
			"sudah_dibuat_hps_manual" => $sudah_dibuat_hps_manual,
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function add_rincian_hps_pdf($id_paket)
	{
		$total_rincian_hps_pdf = $this->input->post('total_rincian_hps_pdf');
		$nama_rincian_hps_pdf = $this->input->post('nama_rincian_hps_pdf');
		$config['upload_path'] = './rincian_hps_pdf_file/';
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = 0;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('file_rincian_hps_pdf')) {

			$fileData = $this->upload->data();

			$upload = [
				'id_paket' => $id_paket,
				'status_rincian_hps_pdf' => 1,
				'nama_rincian_hps_pdf' => $nama_rincian_hps_pdf,
				'nama_pembuat_hps' => $this->session->userdata('nama_pegawai'),
				'total_rincian_hps_pdf' => $total_rincian_hps_pdf,
				'file_rincian_hps_pdf' => $fileData['file_name'],
			];
			$this->Paket_model->create_pdf_rincian_hps($upload);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		} else {
			$this->session->set_flashdata('error', $this->upload->display_errors());
			redirect(base_url('upload'));
		}
	}

	public function hapus_rincian_hps_pdf($hapus_rincian_hps_pdf)
	{
		$id_paket = $this->Paket_model->get_by_rincian_hps_pdf2($hapus_rincian_hps_pdf);
		$this->Paket_model->deletedata_rincian_hps_pdf($hapus_rincian_hps_pdf);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}
	// ADD LOKASI
	public function add_rincian_hps()
	{
		$this->form_validation->set_rules('jenis_barang_jasa_rincian_hps', 'Jenis Barang/Jasa', 'required|trim', ['required' => 'Jenis Barang/Jasa Wajib Diisi!']);
		$this->form_validation->set_rules('satuan_rincian_hps', 'Satuan', 'required|trim', ['required' => 'Satuan Wajib Diisi!']);
		$this->form_validation->set_rules('vol_rincian_hps', 'Vol', 'required|trim|numeric', ['required' => 'Vol Wajib Diisi!']);
		$this->form_validation->set_rules('keterangan_rincian_hps', 'Keterangan', 'required|trim', ['required' => 'Keterangan Wajib Diisi!']);
		$this->form_validation->set_rules('persen_rincian_hps', 'Pajak %', 'required|trim|numeric', ['required' => 'Pajak % Wajib Diisi!']);
		$this->form_validation->set_rules('harga_rincian_hps', 'Harga', 'required|trim|numeric', ['required' => 'Harga Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$data = [
				'jenis_barang_jasa_rincian_hps' => form_error('jenis_barang_jasa_rincian_hps'),
				'satuan_rincian_hps' => form_error('satuan_rincian_hps'),
				'vol_rincian_hps' => form_error('vol_rincian_hps'),
				'keterangan_rincian_hps' => form_error('keterangan_rincian_hps'),
				'persen_rincian_hps' => form_error('persen_rincian_hps'),
				'harga_rincian_hps' => form_error('harga_rincian_hps'),
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} else {
			$data = [
				'id_paket' => htmlspecialchars($this->input->post('id_paket')),
				'jenis_barang_jasa_rincian_hps' => htmlspecialchars($this->input->post('jenis_barang_jasa_rincian_hps')),
				'satuan_rincian_hps' => htmlspecialchars($this->input->post('satuan_rincian_hps')),
				'vol_rincian_hps' => htmlspecialchars($this->input->post('vol_rincian_hps')),
				'keterangan_rincian_hps' => htmlspecialchars($this->input->post('keterangan_rincian_hps')),
				'persen_rincian_hps' => htmlspecialchars($this->input->post('persen_rincian_hps')),
				'harga_rincian_hps' => htmlspecialchars($this->input->post('harga_rincian_hps')),
				'status_hps' => 1,
			];

			$this->Paket_model->create_rincian_hps($data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}
	// EDIT LOKASI
	public function edit_rincian_hps()
	{
		$this->form_validation->set_rules('jenis_barang_jasa_rincian_hps', 'Jenis Barang/Jasa', 'required|trim', ['required' => 'Jenis Barang/Jasa Wajib Diisi!']);
		$this->form_validation->set_rules('satuan_rincian_hps', 'Satuan', 'required|trim', ['required' => 'Satuan Wajib Diisi!']);
		$this->form_validation->set_rules('vol_rincian_hps', 'Vol', 'required|trim|numeric', ['required' => 'Vol Wajib Diisi!']);
		$this->form_validation->set_rules('keterangan_rincian_hps', 'Keterangan', 'required|trim', ['required' => 'Keterangan Wajib Diisi!']);
		$this->form_validation->set_rules('persen_rincian_hps', 'Pajak %', 'required|trim|numeric', ['required' => 'Pajak % Wajib Diisi!']);
		$this->form_validation->set_rules('harga_rincian_hps', 'Harga', 'required|trim|numeric', ['required' => 'Harga Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$data = [
				'jenis_barang_jasa_rincian_hps' => form_error('jenis_barang_jasa_rincian_hps'),
				'satuan_rincian_hps' => form_error('satuan_rincian_hps'),
				'vol_rincian_hps' => form_error('vol_rincian_hps'),
				'keterangan_rincian_hps' => form_error('keterangan_rincian_hps'),
				'persen_rincian_hps' => form_error('persen_rincian_hps'),
				'harga_rincian_hps' => form_error('harga_rincian_hps'),
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} else {
			$data = [
				'jenis_barang_jasa_rincian_hps' => htmlspecialchars($this->input->post('jenis_barang_jasa_rincian_hps')),
				'satuan_rincian_hps' => htmlspecialchars($this->input->post('satuan_rincian_hps')),
				'vol_rincian_hps' => htmlspecialchars($this->input->post('vol_rincian_hps')),
				'keterangan_rincian_hps' => htmlspecialchars($this->input->post('keterangan_rincian_hps')),
				'persen_rincian_hps' => htmlspecialchars($this->input->post('persen_rincian_hps')),
				'harga_rincian_hps' => htmlspecialchars($this->input->post('harga_rincian_hps')),
			];
			$this->Paket_model->update_rincian_hps(array('id_rincian_hps' => $this->input->post('id_rincian_hps')), $data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}

	public function delete_rincian_hps($id_rincian_hps)
	{
		$data = $this->Paket_model->deletedata_rincian_hps($id_rincian_hps);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function byRincianHps($id_paket)
	{

		$get_rincian_paket = $this->Paket_model->getRincianHpsByid($id_paket);
		$getsumberdana = $this->Paket_model->getSumberDana($id_paket);
		$getlokasipekerjaan = $this->Paket_model->getLokasiPekerjaan($id_paket);
		$getjadwalpemilihan = $this->Paket_model->getJadwalPemilihan($id_paket);
		$get_paket = $this->Paket_model->getByid($id_paket);
		$output = [
			"get_rincian_paket" => $get_rincian_paket,
			"get_paket" => $get_paket,
			"get_sumberdana" => $getsumberdana,
			"get_lokasi_kerja" => $getlokasipekerjaan,
			"get_jadwal_pemilihan" => $getjadwalpemilihan
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}



	// INI KONTROLER UNTUK MENGATUR KAK=======================

	// BY id
	public function getByIdKak($id_paket)
	{

		$get_kak = $this->Paket_model->getKerangkaKerjaByid($id_paket);
		$get_rincian_paket = $this->Paket_model->getRincianHpsByid($id_paket);
		$getsumberdana = $this->Paket_model->getSumberDana($id_paket);
		$getlokasipekerjaan = $this->Paket_model->getLokasiPekerjaan($id_paket);
		$getjadwalpemilihan = $this->Paket_model->getJadwalPemilihan($id_paket);
		$get_paket = $this->Paket_model->getByid($id_paket);
		$output = [
			"get_rincian_paket" => $get_rincian_paket,
			"get_paket" => $get_paket,
			"get_sumberdana" => $getsumberdana,
			"get_lokasi_kerja" => $getlokasipekerjaan,
			"get_jadwal_pemilihan" => $getjadwalpemilihan,
			"get_acuan_kerja" => $get_kak,

		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	// get edit
	public function Kerangka_Acuan_Kerja_Show($id_paket)
	{
		$data['total_rincian_hps']  = $this->Paket_model->totalRincianHps($id_paket);
		$data['total_hps']  = $this->Paket_model->totalhps($id_paket);
		$data['sumberdana']  = $this->Paket_model->getSumberDana($id_paket);
		$data['lokasi_kerja']  = $this->Paket_model->getLokasiPekerjaan($id_paket);
		$data['jadwal_pemilihan']  = $this->Paket_model->getJadwalPemilihan($id_paket);
		$data['angga'] = $this->Paket_model->getByid($id_paket);
		$data['getdivisi'] = $this->Paket_model->get_devisi();
		$data['get_jenis_anggaran'] = $this->Paket_model->get_jenis_anggaran();
		$data['get_metode'] = $this->Paket_model->get_metode_pemilihan();
		$data['get_jenis_pengadaan'] = $this->Paket_model->get_jenis_pengadaan();
		$data['get_produk_dl_negri'] = $this->Paket_model->get_produk_dalam_negri();
		$data['kabupaten'] = $this->Wilayah_model->getAllKabupaten();
		$data['provinsi'] = $this->Wilayah_model->getProvinsi();
		$this->load->view('template_paket/header');
		$this->load->view('template_paket/navbar');
		$this->load->view('paket/kerangka_acuan_kerja', $data);
		$this->load->view('template_paket/footer');
		$this->load->view('paket/ajax', $data);
	}


	// ADD KAK
	public function add_kak()
	{
		$id_paket = $this->input->post('id_paket');
		$config['upload_path'] = './kak_file/';
		$config['allowed_types'] = 'jpg|jpeg|png|pdf';
		$config['max_size'] = 0;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('file_kak')) {

			$fileData = $this->upload->data();

			$upload = [
				'id_paket' => $id_paket,
				'nama_file_kak' => $this->input->post('nama_file_kak'),
				'file_kak' => $fileData['file_name'],
			];
			$this->Paket_model->create_kak($upload);
			redirect(base_url('paket/Kerangka_Acuan_Kerja_Show/' . $id_paket));
		} else {
			$this->session->set_flashdata('error', $this->upload->display_errors());
			redirect(base_url('upload'));
		}
	}
	// EDIT MENGATUR KAK
	public function edit_kak()
	{
		$config['upload_path'] = './kak_file/';
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = 0;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('file_kak')) {

			$fileData = $this->upload->data();

			$upload = [
				'nama_file_kak' => $this->input->post('nama_file_kak'),
				'file_kak' => $fileData['file_name'],
			];

			$this->Paket_model->update_kak(array('id_kerangka_acuan_kerja' => $this->input->post('id_kerangka_acuan_kerja')), $upload);
			$this->output->set_content_type('application/json')->set_output(json_encode($upload));
		} else {
			$this->session->set_flashdata('error', $this->upload->display_errors());
			redirect(base_url('upload'));
		}
	}

	// get data kak
	public function data_get_kak($id_paket)
	{
		$resultss = $this->Paket_model->getdatatableKak($id_paket);
		$no = $_POST['start'];
		// $total = 0;
		$data = [];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] = $angga->nama_file_kak;
			$row[] = '<a href=' . base_url('/kak_file' . '/' . $angga->file_kak) . '>' . '<img width="40px" src=' . base_url('assets/img/pdf.png') . ' >' . '</a>';
			$row[] = '<a href="#" class="btn btn-success btn-sm" onClick="byidKak(' . "'" . $angga->id_kerangka_acuan_kerja . "','editKak'" . ')"><i class="fas fa-edit"></i> Edit</a> <a href="#" class="btn btn-danger btn-sm" onClick="byidKak(' . "'" . $angga->id_kerangka_acuan_kerja . "','hapusKak'" . ')">  <i class="fas fa-trash"></i> Hapus</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Paket_model->count_all_dataKak($id_paket),
			"recordsFiltered" => $this->Paket_model->count_filtered_Kak($id_paket),
			"data" => $data,
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}


	public function delete_kak($id_kerangka_acuan_kerja)
	{
		$data = $this->Paket_model->deletedata_kak($id_kerangka_acuan_kerja);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}
	// END KONTROLER UNTUK MENGATUR KAK=======================





	// INI KONTROLER UNTUK MENGATUR SYARAT KHUSUS KONTRAK=======================

	// BY id
	public function getByIdSyaratKontrak($id_paket)
	{

		$get_syarat_kontrak = $this->Paket_model->getsyarat_khusus_kontrakByid($id_paket);
		$get_paket = $this->Paket_model->getByid($id_paket);
		$output = [
			"get_paket" => $get_paket,
			"syarat_kontrak" => $get_syarat_kontrak,

		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	// get SYARAT KONTRAK VIEW
	public function Syarat_Kontrak_Show($id_paket)
	{
		$data['total_rincian_hps']  = $this->Paket_model->totalRincianHps($id_paket);
		$data['total_hps']  = $this->Paket_model->totalhps($id_paket);
		$data['sumberdana']  = $this->Paket_model->getSumberDana($id_paket);
		$data['lokasi_kerja']  = $this->Paket_model->getLokasiPekerjaan($id_paket);
		$data['jadwal_pemilihan']  = $this->Paket_model->getJadwalPemilihan($id_paket);
		$data['angga'] = $this->Paket_model->getByid($id_paket);
		$data['getdivisi'] = $this->Paket_model->get_devisi();
		$data['get_jenis_anggaran'] = $this->Paket_model->get_jenis_anggaran();
		$data['get_metode'] = $this->Paket_model->get_metode_pemilihan();
		$data['get_jenis_pengadaan'] = $this->Paket_model->get_jenis_pengadaan();
		$data['get_produk_dl_negri'] = $this->Paket_model->get_produk_dalam_negri();
		$data['kabupaten'] = $this->Wilayah_model->getAllKabupaten();
		$data['provinsi'] = $this->Wilayah_model->getProvinsi();
		$this->load->view('template_paket/header');
		$this->load->view('template_paket/navbar');
		$this->load->view('paket/syarat_khusus_kontrak', $data);
		$this->load->view('template_paket/footer');
		$this->load->view('paket/ajax', $data);
	}


	// syarat_kontrak
	public function add_syarat_kontrak()
	{
		$id_paket = $this->input->post('id_paket');
		$config['upload_path'] = './skk_file/';
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = 0;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('file_syarat_khusus_kontrak')) {

			$fileData = $this->upload->data();

			$upload = [
				'id_paket' => $id_paket,
				'nama_file_syarat_khusus_kontrak' => $this->input->post('nama_file_syarat_khusus_kontrak'),
				'file_syarat_khusus_kontrak' => $fileData['file_name'],
			];
			$this->Paket_model->create_syarat_khusus_kontrak($upload);
			$this->output->set_content_type('application/json')->set_output(json_encode($upload));
			// redirect(base_url('paket/Syarat_Kontrak_Show/' . $id_paket));
		} else {
			$this->session->set_flashdata('error', $this->upload->display_errors());
			redirect(base_url('upload'));
		}
	}
	// EDIT MENGATUR syarat_khusus_kontrak
	public function edit_syarat_khusus_kontrak()
	{
		$config['upload_path'] = './skk_file/';
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = 0;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('file_syarat_khusus_kontrak')) {

			$fileData = $this->upload->data();

			$upload = [
				'nama_file_syarat_khusus_kontrak' => $this->input->post('nama_file_syarat_khusus_kontrak'),
				'file_syarat_khusus_kontrak' => $fileData['file_name'],
			];

			$this->Paket_model->update_syarat_khusus_kontrak(array('id_syarat_khusus_kontrak' => $this->input->post('id_syarat_khusus_kontrak')), $upload);
			$this->output->set_content_type('application/json')->set_output(json_encode($upload));
		} else {
			$this->session->set_flashdata('error', $this->upload->display_errors());
			redirect(base_url('upload'));
		}
	}

	// get data syarat_kontrak
	public function data_get_syarat_kontrak($id_paket)
	{
		$resultss = $this->Paket_model->getdatatablesyarat_khusus_kontrak($id_paket);
		$no = $_POST['start'];
		// $total = 0;
		$data = [];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] = $angga->nama_file_syarat_khusus_kontrak;
			$row[] = '<a href=' . base_url('/skk_file' . '/' . $angga->file_syarat_khusus_kontrak) . '>' . '<img width="40px" src=' . base_url('assets/img/pdf.png') . ' >' . '</a>';
			$row[] = '<a href="javascript:;" class="btn btn-success btn-sm" onClick="byid_syarat_kontrak(' . "'" . $angga->id_syarat_khusus_kontrak . "','edit_syarat_kontrak'" . ')"><i class="fas fa-edit"></i> Edit</a> <a href="javascript:;" class="btn btn-danger btn-sm" onClick="byid_syarat_kontrak(' . "'" . $angga->id_syarat_khusus_kontrak . "','hapus_syarat_kontrak'" . ')">  <i class="fas fa-trash"></i> Hapus</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Paket_model->count_all_datasyarat_khusus_kontrak($id_paket),
			"recordsFiltered" => $this->Paket_model->count_filtered_syarat_khusus_kontrak($id_paket),
			"data" => $data,
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}


	public function delete_syarat_kontrak($id_syarat_khusus_kontrak)
	{
		$data = $this->Paket_model->deletedata_syarat_khusus_kontrak($id_syarat_khusus_kontrak);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	// END KONTROLER UNTUK MENGATUR SYARAT KHUSUS KONTRAK =======================




	// INI KONTROLER UNTUK MENGATUR FILE INFORMASI LAINYA=======================

	// BY id

	// get  informasi_lainya_show
	public function informasi_lainya_show($id_paket)
	{
		$data['total_rincian_hps']  = $this->Paket_model->totalRincianHps($id_paket);
		$data['total_hps']  = $this->Paket_model->totalhps($id_paket);
		$data['sumberdana']  = $this->Paket_model->getSumberDana($id_paket);
		$data['lokasi_kerja']  = $this->Paket_model->getLokasiPekerjaan($id_paket);
		$data['jadwal_pemilihan']  = $this->Paket_model->getJadwalPemilihan($id_paket);
		$data['angga'] = $this->Paket_model->getByid($id_paket);
		$data['getdivisi'] = $this->Paket_model->get_devisi();
		$data['get_jenis_anggaran'] = $this->Paket_model->get_jenis_anggaran();
		$data['get_metode'] = $this->Paket_model->get_metode_pemilihan();
		$data['get_jenis_pengadaan'] = $this->Paket_model->get_jenis_pengadaan();
		$data['get_produk_dl_negri'] = $this->Paket_model->get_produk_dalam_negri();
		$data['kabupaten'] = $this->Wilayah_model->getAllKabupaten();
		$data['provinsi'] = $this->Wilayah_model->getProvinsi();
		$this->load->view('template_paket/header');
		$this->load->view('template_paket/navbar');
		$this->load->view('paket/informasi_lainya', $data);
		$this->load->view('template_paket/footer');
		$this->load->view('paket/ajax', $data);
	}

	public function get_byid_informasi_lainya($id_paket)
	{

		$get_informasi_lainya = $this->Paket_model->get_informasi_lainya_Byid($id_paket);
		$get_paket = $this->Paket_model->getByid($id_paket);
		$output = [
			"get_paket" => $get_paket,
			"informasi_lainya" => $get_informasi_lainya,

		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	//informasi_lainya
	public function add_informasi_lainya()
	{
		$id_paket = $this->input->post('id_paket');
		$config['upload_path'] = './informasi_lainya/';
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = 0;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('file_informasi_lainya')) {

			$fileData = $this->upload->data();

			$upload = [
				'id_paket' => $id_paket,
				'nama_file_informasi_lainya' => $this->input->post('nama_file_informasi_lainya'),
				'file_informasi_lainya' => $fileData['file_name'],
			];
			$this->Paket_model->create_informasi_lainya($upload);
			$this->output->set_content_type('application/json')->set_output(json_encode($upload));
		} else {
			$this->session->set_flashdata('error', $this->upload->display_errors());
			redirect(base_url('upload'));
		}
	}
	// EDIT MENGATUR informasi_lainya
	public function edit_informasi_lainya()
	{
		$config['upload_path'] = './informasi_lainya/';
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = 0;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('file_informasi_lainya')) {

			$fileData = $this->upload->data();

			$upload = [
				'nama_file_informasi_lainya' => $this->input->post('nama_file_informasi_lainya'),
				'file_informasi_lainya' => $fileData['file_name'],
			];

			$this->Paket_model->update_informasi_lainya(array('id_informasi_lainya' => $this->input->post('id_informasi_lainya')), $upload);
			$this->output->set_content_type('application/json')->set_output(json_encode($upload));
		} else {
			$this->session->set_flashdata('error', $this->upload->display_errors());
			redirect(base_url('upload'));
		}
	}

	// get data informasi_lainya
	public function data_get_informasi_lainya($id_paket)
	{
		$resultss = $this->Paket_model->getdatatable_informasi_lainya($id_paket);
		$no = $_POST['start'];
		// $total = 0;
		$data = [];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] = $angga->nama_file_informasi_lainya;
			$row[] = '<a href=' . base_url('/informasi_lainya' . '/' . $angga->file_informasi_lainya) . '>' . '<img width="40px" src=' . base_url('assets/img/pdf.png') . ' >' . '</a>';
			$row[] = '<a href="javascript:;" class="btn btn-success btn-sm" onClick="byid_informasi_lainya(' . "'" . $angga->id_informasi_lainya . "','edit_informasi_lainya'" . ')"><i class="fas fa-edit"></i> Edit</a> <a href="javascript:;" class="btn btn-danger btn-sm" onClick="byid_informasi_lainya(' . "'" . $angga->id_informasi_lainya . "','hapus_informasi_lainya'" . ')">  <i class="fas fa-trash"></i> Hapus</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Paket_model->count_all_data_informasi_lainya($id_paket),
			"recordsFiltered" => $this->Paket_model->count_filtered_informasi_lainya($id_paket),
			"data" => $data,
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}


	public function delete_informasi_lainya($id_informasi_lainya)
	{
		$data = $this->Paket_model->deletedata_informasi_lainya($id_informasi_lainya);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	// END KONTROLER UNTUK MENGATUR informasi_lainya =======================

	// GET ATAU PILIH PANITIA

	public function PilihPanitia_Show($id_paket)
	{

		$data['total_rincian_hps']  = $this->Paket_model->totalRincianHps($id_paket);
		$data['total_hps']  = $this->Paket_model->totalhps($id_paket);
		$data['sumberdana']  = $this->Paket_model->getSumberDana($id_paket);
		$data['lokasi_kerja']  = $this->Paket_model->getLokasiPekerjaan($id_paket);
		$data['jadwal_pemilihan']  = $this->Paket_model->getJadwalPemilihan($id_paket);
		$data['angga'] = $this->Paket_model->getByid($id_paket);
		$data['getdivisi'] = $this->Paket_model->get_devisi();
		$data['get_jenis_anggaran'] = $this->Paket_model->get_jenis_anggaran();
		$data['get_metode'] = $this->Paket_model->get_metode_pemilihan();
		$data['get_jenis_pengadaan'] = $this->Paket_model->get_jenis_pengadaan();
		$data['get_produk_dl_negri'] = $this->Paket_model->get_produk_dalam_negri();
		$data['kabupaten'] = $this->Wilayah_model->getAllKabupaten();
		$data['provinsi'] = $this->Wilayah_model->getProvinsi();
		$this->load->view('template_paket/header');
		$this->load->view('template_paket/navbar');
		$this->load->view('paket/pilih_panitia', $data);
		$this->load->view('template_paket/footer');
		$this->load->view('paket/ajax', $data);
	}

	public function getByIdPilihPanitia($id_paket)
	{

		$get_paket = $this->Paket_model->getByid($id_paket);
		$output = [
			"get_paket" => $get_paket,

		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function get_panitia($id_paketnya)
	{
		$paketku = $this->Paket_model->get_row_paket_panitia($id_paketnya);
		$by_id_metode_pemilihan = $this->Paket_model->getByid($id_paketnya);
		// $id_panitianya =  $status_panitia_kepilih['status_panitia_id_detail_panitia'];
		// $id_paketnya2 =  $status_panitia_kepilih['status_panitia_id_paket'];
		if ($this->session->userdata('id_role') == 1) {
			if ($by_id_metode_pemilihan['id_metode_pemilihan'] == 8) {
				$result = $this->Paket_model->getdatatable4_4();
				$data = [];
				$no = $_POST['start'];
				foreach ($result as $panitia) {
					$row = array();
					$row[] = ++$no;
					$row[] = '<a href="javascript:;" onClick="byidPIlihPanitia2(' . "'" . $panitia->id_panitia . "','detailpanitia'" . ')">' . $panitia->nama_panitia . '</a>';
					$row[] = $panitia->nama_unit_kerja;
					if ($panitia->status_panitia == 0 || $panitia->status_panitia == NULL) {
						$row[] = 'Tidak Aktif';
					} else if ($panitia->status == 1) {
						$row[] = 'Aktif';
					}
					if ($panitia->status_penunjukan_langsung_panitia == 1) {
						$row[] = '<label class="badge badge-success">Panitia Penunjukan Langsung</label>';
					} else if ($panitia->status_penetapan_langsung == 1) {
						$row[] = '<label class="badge badge-warning">Panitia Penetapan Langsung</label>';
					} else {
						$row[] = '<label class="badge badge-primary">Panitia Tender</label>';
					}

					if ($paketku['id_panitia'] == 0) {
						$row[] = '<a href="javascript:;" class="btn btn-info btn-sm" onClick="byidPIlihPanitia(' . "'" . $panitia->id_panitia . "','pilih_panitia'" . ')"><i class="fas fa-users"></i> Pilih Panitia</a>';
					}
					if ($panitia->id_panitia !=  $paketku['id_panitia']) {
						$row[] = '<button disabled class="btn btn-danger btn-sm" onClick="byidPIlihPanitia(' . "'" . $panitia->id_panitia . "','pilih_panitia'" . ')"><i class="fas fa-users"></i> Disabled</button>';
					}
					if ($panitia->id_panitia !=  $paketku['id_panitia']) {
						$row[] = '<button disabled class="btn btn-danger btn-sm" onClick="byidPIlihPanitia(' . "'" . $panitia->id_panitia . "','pilih_panitia'" . ')"><i class="fas fa-users"></i> Disabled</button>';
					}


					if ($panitia->status_panitia_id_detail_panitia  == $paketku['id_panitia'] && $panitia->status_panitia_id_paket == $paketku['id_paket']) {
						$row[] = '<a href="javascript:;" class="btn btn-success btn-sm" onClick="byidPIlihPanitiaUbah(' . "'" . $panitia->id_panitia . "','udate_panitia'" . ')"><i class="fas fa-users"></i> Ubah Panitia</a>';
					} else {
						$row[] = '<a href="javascript:;" class="btn btn-success btn-sm" onClick="byidPIlihPanitiaUbah(' . "'" . $panitia->id_panitia . "','udate_panitia'" . ')"><i class="fas fa-users"></i> Ubah Panitia</a>';
					}
					$data[] = $row;
				}
				$output = array(
					"draw" => $_POST['draw'],
					"recordsTotal" => $this->Panitia_model->count_all_data(),
					"recordsFiltered" => $this->Panitia_model->count_filtered_data(),
					"data" => $data
				);
				$this->output->set_content_type('application/json')->set_output(json_encode($output));
			} else {
				$result = $this->Paket_model->getdatatable4();
				$data = [];
				$no = $_POST['start'];
				foreach ($result as $panitia) {
					$row = array();
					$row[] = ++$no;
					$row[] = '<a href="javascript:;" onClick="byidPIlihPanitia2(' . "'" . $panitia->id_panitia . "','detailpanitia'" . ')">' . $panitia->nama_panitia . '</a>';
					$row[] = $panitia->nama_unit_kerja;
					if ($panitia->status_panitia == 0 || $panitia->status_panitia == NULL) {
						$row[] = 'Tidak Aktif';
					} else if ($panitia->status == 1) {
						$row[] = 'Aktif';
					}
					if ($panitia->status_penunjukan_langsung_panitia == 1) {
						$row[] = '<label class="badge badge-success">Panitia Penunjukan Langsung</label>';
					} else if ($panitia->status_penetapan_langsung == 1) {
						$row[] = '<label class="badge badge-warning">Panitia Penetapan Langsung</label>';
					} else {
						$row[] = '<label class="badge badge-primary">Panitia Tender</label>';
					}
					if ($paketku['id_panitia'] == 0) {
						$row[] = '<a href="javascript:;" class="btn btn-info btn-sm" onClick="byidPIlihPanitia(' . "'" . $panitia->id_panitia . "','pilih_panitia'" . ')"><i class="fas fa-users"></i> Pilih Panitia</a>';
					}
					if ($panitia->id_panitia !=  $paketku['id_panitia']) {
						$row[] = '<button disabled class="btn btn-danger btn-sm" onClick="byidPIlihPanitia(' . "'" . $panitia->id_panitia . "','pilih_panitia'" . ')"><i class="fas fa-users"></i> Disabled</button>';
					}
					if ($panitia->id_panitia !=  $paketku['id_panitia']) {
						$row[] = '<button disabled class="btn btn-danger btn-sm" onClick="byidPIlihPanitia(' . "'" . $panitia->id_panitia . "','pilih_panitia'" . ')"><i class="fas fa-users"></i> Disabled</button>';
					}
					if ($panitia->status_panitia_id_detail_panitia  == $paketku['id_panitia'] && $panitia->status_panitia_id_paket == $paketku['id_paket']) {
						$row[] = '<a href="javascript:;" class="btn btn-success btn-sm" onClick="byidPIlihPanitiaUbah(' . "'" . $panitia->id_panitia . "','udate_panitia'" . ')"><i class="fas fa-users"></i> Ubah Panitia</a>';
					} else {
						$row[] = '<a href="javascript:;" class="btn btn-success btn-sm" onClick="byidPIlihPanitiaUbah(' . "'" . $panitia->id_panitia . "','udate_panitia'" . ')"><i class="fas fa-users"></i> Ubah Panitia</a>';
					}
					$data[] = $row;
				}
				$output = array(
					"draw" => $_POST['draw'],
					"recordsTotal" => $this->Panitia_model->count_all_data(),
					"recordsFiltered" => $this->Panitia_model->count_filtered_data(),
					"data" => $data
				);
				$this->output->set_content_type('application/json')->set_output(json_encode($output));
			}
		} else if ($this->session->userdata('id_role') == 2 || $this->session->userdata('id_role') == 8) {
			if ($by_id_metode_pemilihan['id_metode_pemilihan'] == 8) {
				$agency = $this->session->userdata('id_unit_kerja2');
				$result = $this->Paket_model->getdatatable5_5($agency);
				$data = [];
				$no = $_POST['start'];
				foreach ($result as $panitia) {
					$row = array();
					$row[] = ++$no;
					$row[] = '<a href="javascript:;" onClick="byidPIlihPanitia2(' . "'" . $panitia->id_panitia . "','detailpanitia'" . ')">' . $panitia->nama_panitia . '</a>';
					$row[] = $panitia->nama_unit_kerja;
					if ($panitia->status_panitia == 0 || $panitia->status_panitia == NULL) {
						$row[] = 'Tidak Aktif';
					} else if ($panitia->status == 1) {
						$row[] = 'Aktif';
					}
					if ($panitia->status_penunjukan_langsung_panitia == 1) {
						$row[] = '<label class="badge badge-success">Panitia Penunjukan Langsung</label>';
					} else if ($panitia->status_penetapan_langsung == 1) {
						$row[] = '<label class="badge badge-warning">Panitia Penetapan Langsung</label>';
					} else {
						$row[] = '<label class="badge badge-primary">Panitia Tender</label>';
					}
					if ($paketku['id_panitia'] == 0) {
						$row[] = '<a href="javascript:;" class="btn btn-info btn-sm" onClick="byidPIlihPanitia(' . "'" . $panitia->id_panitia . "','pilih_panitia'" . ')"><i class="fas fa-users"></i> Pilih Panitia</a>';
					}
					if ($panitia->id_panitia !=  $paketku['id_panitia']) {
						$row[] = '<button disabled class="btn btn-danger btn-sm" onClick="byidPIlihPanitia(' . "'" . $panitia->id_panitia . "','pilih_panitia'" . ')"><i class="fas fa-users"></i> Disabled</button>';
					}
					if ($panitia->id_panitia !=  $paketku['id_panitia']) {
						$row[] = '<button disabled class="btn btn-danger btn-sm" onClick="byidPIlihPanitia(' . "'" . $panitia->id_panitia . "','pilih_panitia'" . ')"><i class="fas fa-users"></i> Disabled</button>';
					}
					if ($panitia->status_panitia_id_detail_panitia  == $paketku['id_panitia'] && $panitia->status_panitia_id_paket == $paketku['id_paket']) {
						$row[] = '<a href="javascript:;" class="btn btn-success btn-sm" onClick="byidPIlihPanitiaUbah(' . "'" . $panitia->id_panitia . "','udate_panitia'" . ')"><i class="fas fa-users"></i> Ubah Panitia</a>';
					} else {
						$row[] = '<a href="javascript:;" class="btn btn-success btn-sm" onClick="byidPIlihPanitiaUbah(' . "'" . $panitia->id_panitia . "','udate_panitia'" . ')"><i class="fas fa-users"></i> Ubah Panitia</a>';
					}
					$data[] = $row;
				}
				$output = array(
					"draw" => $_POST['draw'],
					"recordsTotal" => $this->Paket_model->count_all_data5($agency),
					"recordsFiltered" => $this->Paket_model->count_filtered_data5($agency),
					"data" => $data
				);
				$this->output->set_content_type('application/json')->set_output(json_encode($output));
			} else {
				$agency = $this->session->userdata('id_unit_kerja2');
				$result = $this->Paket_model->getdatatable5($agency);
				$data = [];
				$no = $_POST['start'];
				foreach ($result as $panitia) {
					$row = array();
					$row[] = ++$no;
					$row[] = '<a href="javascript:;" onClick="byidPIlihPanitia2(' . "'" . $panitia->id_panitia . "','detailpanitia'" . ')">' . $panitia->nama_panitia . '</a>';
					$row[] = $panitia->nama_unit_kerja;
					if ($panitia->status_panitia == 0 || $panitia->status_panitia == NULL) {
						$row[] = 'Tidak Aktif';
					} else if ($panitia->status == 1) {
						$row[] = 'Aktif';
					}
					if ($panitia->status_penunjukan_langsung_panitia == 1) {
						$row[] = '<label class="badge badge-success">Panitia Penunjukan Langsung</label>';
					} else if ($panitia->status_penetapan_langsung == 1) {
						$row[] = '<label class="badge badge-warning">Panitia Penetapan Langsung</label>';
					} else {
						$row[] = '<label class="badge badge-primary">Panitia Tender</label>';
					}
					if ($paketku['id_panitia'] == 0) {
						$row[] = '<a href="javascript:;" class="btn btn-info btn-sm" onClick="byidPIlihPanitia(' . "'" . $panitia->id_panitia . "','pilih_panitia'" . ')"><i class="fas fa-users"></i> Pilih Panitia</a>';
					}
					if ($panitia->id_panitia !=  $paketku['id_panitia']) {
						$row[] = '<button disabled class="btn btn-danger btn-sm" onClick="byidPIlihPanitia(' . "'" . $panitia->id_panitia . "','pilih_panitia'" . ')"><i class="fas fa-users"></i> Disabled</button>';
					}
					if ($panitia->id_panitia !=  $paketku['id_panitia']) {
						$row[] = '<button disabled class="btn btn-danger btn-sm" onClick="byidPIlihPanitia(' . "'" . $panitia->id_panitia . "','pilih_panitia'" . ')"><i class="fas fa-users"></i> Disabled</button>';
					}
					if ($panitia->status_panitia_id_detail_panitia  == $paketku['id_panitia'] && $panitia->status_panitia_id_paket == $paketku['id_paket']) {
						$row[] = '<a href="javascript:;" class="btn btn-success btn-sm" onClick="byidPIlihPanitiaUbah(' . "'" . $panitia->id_panitia . "','udate_panitia'" . ')"><i class="fas fa-users"></i> Ubah Panitia</a>';
					} else {
						$row[] = '<a href="javascript:;" class="btn btn-success btn-sm" onClick="byidPIlihPanitiaUbah(' . "'" . $panitia->id_panitia . "','udate_panitia'" . ')"><i class="fas fa-users"></i> Ubah Panitia</a>';
					}
					$data[] = $row;
				}
				$output = array(
					"draw" => $_POST['draw'],
					"recordsTotal" => $this->Paket_model->count_all_data5($agency),
					"recordsFiltered" => $this->Paket_model->count_filtered_data5($agency),
					"data" => $data
				);
				$this->output->set_content_type('application/json')->set_output(json_encode($output));
			}
		}
	}
	// BY id

	public function update_pilih_panitia_di_paket($id_paket)
	{
		$data2 = $this->input->post('id_panitia');
		$data = [
			'id_panitia' =>  $this->input->post('id_panitia'),
			'status_panitia_dipilih' => 1,
		];
		$data4 = [
			'status_panitia_id_paket' => $id_paket,
			'status_panitia_id_detail_panitia' => $data2,
		];

		$this->Paket_model->update_pilih_panitia(array('id_paket' => $id_paket), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
		$this->Paket_model->update_status_dipilih_panitia($data4);
		$kirim_email = $this->Paket_model->update_email_pegawai($id_paket, $data2);
		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'mail.jmtm.co.id',
			'smtp_port' => 465,
			'smtp_user' => 'eproc@jmtm.co.id',
			'smtp_pass' => '@dminJMTM!',
			'mailtype'  => 'html',
			'charset'   => 'iso-8859-1'
		);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");

		foreach ($kirim_email as $value) {
			// Email dan nama pengirim
			$this->email->from('eproc@jmtm.co.id', 'JMTM');

			// Email penerima
			$this->email->to($value->email); // Ganti dengan email tujuan

			// Subject email
			$this->email->subject('E-Procurement JMTM');

			// Isi email
			$this->email->message("Anda mempunyai paket baru silahkan cek di website https://eproc.jmtm.co.id/auth");

			$this->email->send();
		}
	}

	public function update_panita_di_paket2($id_paket)
	{
		$data10 = $this->input->post('id_panita_mengikuti_paket');
		$data2 = $this->input->post('id_panitia');
		$data = [
			'id_panitia' => 0,
			'status_panitia_dipilih' => 0,
		];
		$data4 = [
			'status_panitia_id_paket' => 0,
			'status_panitia_id_detail_panitia' => 0,
		];

		$this->Paket_model->update_pilih_panitia(array('id_paket' => $id_paket), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
		$this->Paket_model->update_panitia_sudah_dipillih(array('id_panita_mengikuti_paket' => $data10), $data4);
		$kirim_email = $this->Paket_model->update_email_pegawai($id_paket, $data2);
		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'mail.jmtm.co.id',
			'smtp_port' => 465,
			'smtp_user' => 'eproc@jmtm.co.id',
			'smtp_pass' => '@dminJMTM!',
			'mailtype'  => 'html',
			'charset'   => 'iso-8859-1'
		);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");

		foreach ($kirim_email as $value) {
			// Email dan nama pengirim
			$this->email->from('eproc@jmtm.co.id', 'JMTM');

			// Email penerima
			$this->email->to($value->email); // Ganti dengan email tujuan

			// Subject email
			$this->email->subject('E-Procurement JMTM');

			// Isi email
			$this->email->message("Anda mempunyai paket baru silahkan cek di website https://eproc.jmtm.co.id/auth");

			$this->email->send();
		}
	}

	public function get_byid_panitia($id_panitia)
	{

		$panitia = $this->Paket_model->get_panitia_Byid($id_panitia);
		$detail = $this->Paket_model->get_panitia_Byid2($id_panitia);
		$get_paket = $this->Paket_model->getByid($id_panitia);
		$output = [
			"get_paket" => $get_paket,
			"panitia" => $panitia,
			"detail" => $detail,

		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	// Simpan Paket Dan Buat Paket Tender


	public function save_paket_tender($id_paket)
	{
		$get_kode = $this->Paket_model->getByid($id_paket);
		$data = [
			'kode_tender' => $get_kode['kode_jenis_anggaran'] . $get_kode['kode_jenis_pengadaan'] . $get_kode['kode_metode_pemilihan'] . $get_kode['kode_unit_kerja'] . $get_kode['kode_produk_dl_negri'] . $get_kode['kode_tender_random'],
			'tanggal_buat_paket_tender' => $this->input->post('tanggal_buat_paket_tender'),
			'no_surat_rencana_pengadaan' =>  $this->input->post('no_surat_rencana_pengadaan'),
			'status_paket_tender' =>  1,
			'status_tahap_tender' =>  1

		];
		$this->Paket_model->update_pilih_panitia(array('id_paket' => $id_paket), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	// ini untuk dokumen rencana



	// ADD add_Rencana_Dokumen
	public function add_Rencana_Dokumen()
	{
		$id_paket = $this->input->post('id_paket');
		$config['upload_path'] = './dokumen_rencana_pemilihan_file/';
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = 0;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('file_dokumen_persiapan')) {

			$fileData = $this->upload->data();

			$upload = [
				'id_paket' => $id_paket,
				'nama_file_dokumen_rencana' => $this->input->post('nama_file_dokumen_rencana'),
				'file_dokumen_persiapan' => $fileData['file_name'],
			];
			$this->Paket_model->create_DokumenRencana($upload);
			redirect(base_url('paket/edit/' . $id_paket));
		} else {
			$this->session->set_flashdata('error', $this->upload->display_errors());
			redirect(base_url('upload'));
		}
	}

	// get data kak
	public function data_dokumen_pemilihan_rencana($id_paket)
	{
		$resultss = $this->Paket_model->getdatatabledokumen_pemilihan_rencana($id_paket);
		$no = $_POST['start'];
		// $total = 0;
		$data = [];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] = $angga->nama_file_dokumen_rencana;
			$row[] = '<a href=' . base_url('/dokumen_rencana_pemilihan_file' . '/' . $angga->file_dokumen_persiapan) . '>' . '<img width="40px" src=' . base_url('assets/img/pdf.png') . ' >' . '</a>';
			$row[] = ' <a href="javascript:;" class="btn btn-danger btn-sm" onClick="byidDokumenRencana(' . "'" . $angga->id_dokumen_persiapan . "','hapusKak'" . ')">  <i class="fas fa-trash"></i> Hapus</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Paket_model->count_all_data_Rencana_Dokumen($id_paket),
			"recordsFiltered" => $this->Paket_model->count_filtered_Rencana_Dokumen($id_paket),
			"data" => $data,
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}
	public function getDokumenPersiapan($id_paket)
	{

		$get_dokumen_periapan = $this->Paket_model->getByid_Rencana_Dokumen($id_paket);
		$get_paket = $this->Paket_model->getByid($id_paket);
		$output = [
			"get_paket" => $get_paket,
			"get_dokumen_periapan" => $get_dokumen_periapan,

		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function delete_Rencana_Dokumen($id_dokumen_rencana)
	{
		$data = $this->Paket_model->deletedata_DokumenRencana($id_dokumen_rencana);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}


	// pemilihan penyedia
	public function getdata_all_vendor()
	{
		$resultss = $this->Rolepanitia_model->getdatatable_list_all_vendor_penunjukan_langsung();
		$data = [];
		$no = $_POST['start'];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] = '<a href="javascript:;"  class="btn btn-sm btn-primary" id="prosess" onClick="by_id_vendor_lama(' . "'" . $angga->id_vendor . "','tambah_vendor_lama'" . ')"><i class="fas fa fa-user"></i>  Pilih Penyedia</a>';
			$row[] =  $angga->username_vendor;
			$row[] =  $angga->email_usaha;
			$row[] =  $angga->nama_provinsi . ' ' . $angga->nama_kabupaten . ' ' . $angga->alamat_usaha;
			$row[] =  $angga->telpon_usaha;
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Rolepanitia_model->count_all_data_all_vendor_list_all_vendor(),
			"recordsFiltered" => $this->Rolepanitia_model->count_filtered_data_all_vendor_list_all_vendor(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}
	// penyedia lama di pilih

	public function getdata_penyedia_terplilih($id_paket)
	{
		$resultss = $this->Rolepanitia_model->getdatatable_list_all_vendor_terpilih($id_paket);
		$data = [];
		$no = $_POST['start'];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] = '<a href="javascript:;"  class="btn btn-sm btn-info" id="prosess" onClick="byid_vendor_baru(' . "'" . $angga->id_mengikuti_vendor . "','tambah_vendor'" . ')"><i class="fas fa fa-check"></i> </a>';
			$row[] =  $angga->username_vendor;
			$row[] =  $angga->email_usaha;
			$row[] =  $angga->alamat_usaha;
			$row[] =  $angga->telpon_usaha;
			$row[] = '<a href="javascript:;"  class="btn btn-sm btn-danger btn-block" id="prosess" onClick="by_id_vendor_lama(' . "'" . $angga->id_mengikuti_vendor . "','hapus_vendor'" . ')"><i class="fas fa-user-edit"></i> Revisi Pemilihan</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Rolepanitia_model->count_all_data_all_vendor_list_all_vendor_terpilih(),
			"recordsFiltered" => $this->Rolepanitia_model->count_filtered_data_all_vendor_list_all_vendor_terpilih($id_paket),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}



	public function getdata_penyedia_baru($id_paket)
	{
		$resultss = $this->Rolepanitia_model->getdatatable_list_all_vendor_baru($id_paket);
		$data = [];
		$no = $_POST['start'];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] = '<a href="javascript:;"  class="btn btn-sm btn-info" id="prosess" onClick="byid_vendor_baru(' . "'" . $angga->id_mengikuti_vendor . "','tambah_vendor'" . ')"><i class="fas fa fa-check"></i> </a>';
			$row[] =  $angga->username_vendor;
			$row[] =  $angga->no_ktp_vendor;
			$row[] =  $angga->email_vendor;
			$row[] =  $angga->alamat_vendor;
			$row[] =  $angga->telpon_vendor;
			$row[] = '<a href="javascript:;"  class="btn btn-sm btn-warning btn-block" id="prosess" onClick="byid_vendor_baru(' . "'" . $angga->id_mengikuti_vendor . "','edit_vendor'" . ')"><i class="fas fa fa-edit"></i> Edit Vendor</a><a href="javascript:;"  class="btn btn-sm btn-danger btn-block" id="prosess" onClick="byid_vendor_baru(' . "'" . $angga->id_mengikuti_vendor . "','hapus_vendor'" . ')"><i class="fas fa-user-edit"></i> Revisi Pemilihan</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Rolepanitia_model->count_all_data_all_vendor_list_all_vendor_baru(),
			"recordsFiltered" => $this->Rolepanitia_model->count_filtered_data_all_vendor_list_all_vendor_baru($id_paket),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function save_pilih_penyedia_baru($id_paket)
	{
		$username_vendor = $this->input->post('username_vendor');
		$password_vendor = $this->input->post('password_vendor');
		$email_vendor = $this->input->post('email_vendor');
		$no_ktp_vendor = $this->input->post('no_ktp_vendor');
		$telpon_vendor = $this->input->post('telpon_vendor');
		$alamat_vendor = $this->input->post('alamat_vendor');
		$status_mengikuti_paket =  $this->input->post('status_mengikuti_paket');

		$this->form_validation->set_rules('email_vendor', 'Email Vendor', 'required|trim|valid_email|is_unique[tbl_vendor.email_vendor]', ['required' => ' Email Vendor Wajib Diisi!', 'valid_email' => 'Email Tidak Valid',  'is_unique' => 'Email Sudah Terdaftar']);
		$this->form_validation->set_rules('username_vendor', 'Username Vendor', 'required|trim|is_unique[tbl_vendor.username_vendor]', ['required' => ' Username Vendor Wajib Diisi!', 'is_unique' => 'Username Sudah Terdaftar']);
		$this->form_validation->set_rules('password_vendor', 'Password Vendor', 'required|trim', ['required' => 'Password Vendor Wajib Diisi!']);
		$this->form_validation->set_rules('no_ktp_vendor', 'No Ktp Vendor', 'required|trim|numeric', ['required' => 'No Ktp Vendor Wajib Diisi!', 'numeric' => 'No Ktp Vendor Wajib Angka!']);
		$this->form_validation->set_rules('telpon_vendor', 'Telepon Vendor', 'required|trim|numeric', ['required' => 'Telepon Vendor Wajib Diisi!', 'numeric' => 'Telepon Vendor Wajib Angka!']);
		$this->form_validation->set_rules('alamat_vendor', 'Alamat Vendor', 'required|trim', ['required' => 'Alamat Vendor Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$data = [
				'email_vendor' => form_error('email_vendor'),
				'username_vendor' => form_error('username_vendor'),
				'password_vendor' => form_error('password_vendor'),
				'no_ktp_vendor' => form_error('no_ktp_vendor'),
				'telpon_vendor' => form_error('telpon_vendor'),
				'alamat_vendor' => form_error('alamat_vendor'),
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} else {
			$data  = array(
				'username_vendor' => $username_vendor,
				'password_vendor' => password_hash($password_vendor, PASSWORD_DEFAULT),
				'email_vendor' => $email_vendor,
				'no_ktp_vendor' => $no_ktp_vendor,
				'telpon_vendor' => $telpon_vendor,
				'alamat_vendor' => $alamat_vendor,
				'status_aktive_vendor' => 1,
				'status_vendor_baru' => 1,

			);
			$this->db->insert('tbl_vendor', $data);

			$package_id = $this->db->insert_id();
			$result = array();
			foreach ($status_mengikuti_paket as $key => $val) {
				$result[] = array(
					'id_mengikuti_vendor'   => $package_id,
					'id_mengikuti_paket_vendor'   => $id_paket,
					'status_mengikuti_paket'   => $status_mengikuti_paket[$key],
					'jenis_pemilihan' => 'vendor baru',
				);
			}
			$this->db->insert_batch('tbl_vendor_mengikuti_paket', $result);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}

	public function save_pilih_penyedia_lama($id_paket)
	{

		$id_mengikuti_vendor = $this->input->post('id_mengikuti_vendor');

		$id_metode_pemilihan = $this->Rolepanitia_model->getid_transaksi_langsung($id_paket);
		// var_dump($id_metode_pemilihan);
		// die;
		if ($id_metode_pemilihan['id_metode_pemilihan'] == 10) {
			$data  = array(
				'id_mengikuti_vendor' => $id_mengikuti_vendor,
				'id_mengikuti_paket_vendor' => $id_paket,
				'jenis_pemilihan' => 'vendor lama',
				'status_transaksi_langsung' => 1

			);
			$this->db->insert('tbl_vendor_mengikuti_paket', $data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		} else if ($id_metode_pemilihan['id_metode_pemilihan'] == 9) {
			$data  = array(
				'id_mengikuti_vendor' => $id_mengikuti_vendor,
				'id_mengikuti_paket_vendor' => $id_paket,
				'jenis_pemilihan' => 'vendor lama',
				'status_penetapan_langsung' => 1

			);
			$this->db->insert('tbl_vendor_mengikuti_paket', $data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}
	public function edit_pilih_penyedia_baru()
	{
		$id_vendor = $this->input->post('id_mengikuti_vendor');
		$username_vendor = $this->input->post('username_vendor');
		$password_vendor = $this->input->post('password_vendor');
		$email_vendor = $this->input->post('email_vendor');
		$no_ktp_vendor = $this->input->post('no_ktp_vendor');
		$telpon_vendor = $this->input->post('telpon_vendor');
		$alamat_vendor = $this->input->post('alamat_vendor');
		$data = [
			'username_vendor' => $username_vendor,
			'password_vendor' => password_hash($password_vendor, PASSWORD_DEFAULT),
			'email_vendor' => $email_vendor,
			'no_ktp_vendor' => $no_ktp_vendor,
			'telpon_vendor' => $telpon_vendor,
			'alamat_vendor' => $alamat_vendor,
		];
		$this->Rolepanitia_model->update_vendor_baru(array('id_vendor' => $id_vendor), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}
	public function by_id_vendor_lama($id_vendor)
	{

		$get_vendor_lama = $this->Rolepanitia_model->get_by_id_vendor_lama($id_vendor);
		$output = [
			"get_vendor_lama" => $get_vendor_lama,

		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}
	public function by_id_vendor_baru($id_mengikuti_vendor)
	{

		$get_vendor_baru = $this->Rolepanitia_model->get_by_id_vendor_baru($id_mengikuti_vendor);
		$output = [
			"get_vendor_baru" => $get_vendor_baru,

		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}


	public function delete_vendor_baru($id_mengikuti_vendor)
	{
		$this->Rolepanitia_model->delete_vendor_baru1($id_mengikuti_vendor);
		$this->Rolepanitia_model->delete_vendor_baru2($id_mengikuti_vendor);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}
	public function delete_vendor_lama($id_mengikuti_paket_vendor)
	{
		$this->Rolepanitia_model->delete_vendor_baru3($id_mengikuti_paket_vendor);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}

	// Transaksi Langsung Upload Dokumen

	public function getdatatable_dokumen_pengadaan_transaksi_langsung($id_paket)
	{
		$resultss = $this->Paket_model->getdatatable_dokumen_pengadaan_transaksi_langsung($id_paket);
		$data = [];
		$no = $_POST['start'];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] =  $angga->nama_file_dokumen_pengadaan;
			$row[] =   '<a href="https://eproc.jmtm.co.id/dokumen_pengadaan_transaksi_langsung/' . $angga->file_dokumen_pengadaan_transaksi_langsung . '">' . '<img width="70px" src=' . base_url('assets/img/logopdf.jpg') . ' >' . '</a>';
			$row[] = '<a href="javascript:;"  class="btn btn-sm btn-danger" id="prosess" onClick="by_id_dokumen_pengadaan(' . "'" . $angga->id_dokumen_pengadaan_transaksi_langsung . "','hapus_dokumen_vendor'" . ')"><i class="fas fa fa-trash"></i> </a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Paket_model->count_all_data_dokumen_pengadaan_transaksi_langsung(),
			"recordsFiltered" => $this->Paket_model->count_filtered_data_dokumen_pengadaan_transaksi_langsung($id_paket),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function by_id_dokumen_pengadaan($id_dokumen_pengadaan_transaksi_langsung)
	{

		$get_dokumen_transaksi_langsung = $this->Paket_model->by_id_dokumen_pengadaan_transaksi_langsung($id_dokumen_pengadaan_transaksi_langsung);
		$output = [
			"get_dokumen_transaksi_langsung" => $get_dokumen_transaksi_langsung,

		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}
	public function upload_dokumen_pengadaan_transaksi_langsung($id_paket)
	{
		$nama_file_dokumen_pengadaan = $this->input->post('nama_file_dokumen_pengadaan');
		$config['upload_path'] = './dokumen_pengadaan_transaksi_langsung/';
		$config['allowed_types'] = '*';
		$config['max_size'] = 0;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('file_dokumen_pengadaan_transaksi_langsung')) {

			$fileData = $this->upload->data();

			$upload = [
				'id_paket' => $id_paket,
				'nama_file_dokumen_pengadaan' => $nama_file_dokumen_pengadaan,
				'user_created' => $this->session->userdata('nama_pegawai'),
				'file_dokumen_pengadaan_transaksi_langsung' => $fileData['file_name'],
			];
			$this->Paket_model->tambah_dokumen_pengadaan_transaksi_lansung($upload);
			$this->output->set_content_type('application/json')->set_output(json_encode($upload));
		} else {
			$this->session->set_flashdata('error', $this->upload->display_errors());
			redirect(base_url('upload'));
		}
	}

	public function delete_dokumen_pengadaan_transaksi_langsung($id_dokumen_pengadaan_transaksi_langsung)
	{
		$this->Paket_model->delete_dokumen_pengadaan_transaksi_langsung($id_dokumen_pengadaan_transaksi_langsung);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}

	public function jadwal_transaksi_langsung($id_paket)
	{
		$data['result_data_jadwal_detail'] = $this->Paket_model->result_data_jadwal_detail($id_paket);
		$data['result_data_jadwal'] = $this->Paket_model->result_data_jadwal();
		$data['cek_kak'] = $this->Paket_model->cek_kak($id_paket);
		$data['cek_sskk'] = $this->Paket_model->cek_kak($id_paket);
		$data['cek_informasi'] = $this->Paket_model->cek_informasi($id_paket);
		$data['total_rincian_hps']  = $this->Paket_model->totalRincianHps($id_paket);
		$data['status_rincian_hps']  = $this->Paket_model->status_rincian_hps($id_paket);
		$data['total_hps']  = $this->Paket_model->totalhps($id_paket);
		$data['sumberdana']  = $this->Paket_model->getSumberDana($id_paket);
		$data['lokasi_kerja']  = $this->Paket_model->getLokasiPekerjaan($id_paket);
		$data['jadwal_pemilihan']  = $this->Paket_model->getJadwalPemilihan($id_paket);
		$data['angga'] = $this->Paket_model->getByid($id_paket);
		$data['getdivisi'] = $this->Paket_model->get_devisi();
		$data['get_jenis_anggaran'] = $this->Paket_model->get_jenis_anggaran();
		$data['get_metode'] = $this->Paket_model->get_metode_pemilihan();
		$data['get_jenis_pengadaan'] = $this->Paket_model->get_jenis_pengadaan();
		$data['get_produk_dl_negri'] = $this->Paket_model->get_produk_dalam_negri();
		$data['kabupaten'] = $this->Wilayah_model->getAllKabupaten();
		$data['provinsi'] = $this->Wilayah_model->getProvinsi();
		$this->load->view('template_paket/header');
		$this->load->view('template_paket/navbar');
		$this->load->view('paket/jadwal_transaksi_langsung', $data);
		$this->load->view('template_paket/footer');
		$this->load->view('paket/ajax', $data);
	}

	public function save_jadwal_transaksi_langsung($id_paket)
	{
		$nama_jadwal_transaksi_langsung_detail = $this->input->post('nama_jadwal_transaksi_langsung_detail');
		$tanggal_mulai = $this->input->post('tanggal_mulai');
		$tanggal_selesai = $this->input->post('tanggal_selesai');
		$tanggal_selesai_akhir = $this->input->post('tanggal_selesai[]');
		$batas_pendaftara_akhirn = $this->input->post('tanggal_selesai[]');
		$batas_pendaftaran2 = date('d-m-Y H:i', strtotime($batas_pendaftara_akhirn[0]));
		$tanggal_selesai_akhir2 = date('d-m-Y H:i', strtotime($tanggal_selesai_akhir[7]));

		$data = [
			'selesai_semua_tender' => $tanggal_selesai_akhir2,
			'batas_pendaftaran' => $batas_pendaftaran2
		];
		$where = [
			'id_paket' => $id_paket
		];

		$result = array();
		foreach ($nama_jadwal_transaksi_langsung_detail as $key => $val) {
			$result[] = array(
				'id_paket'   => $id_paket,
				'nama_jadwal_transaksi_langsung_detail'   => $nama_jadwal_transaksi_langsung_detail[$key],
				'tanggal_mulai'   => $tanggal_mulai[$key],
				'tanggal_selesai'   =>  $tanggal_selesai[$key],
				'user_created'   => 'Agency'
			);
		}
		$this->db->insert_batch('tbl_trankasi_langsung_jadwal_detail', $result);
		$this->Paket_model->update_kategori_penyedia($data, $where);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}
	public function update_jadwal_transaksi_langsung($id_paket)
	{
		$tanggal_mulai = $this->input->post('tanggal_mulai[]');
		$tanggal_selesai = $this->input->post('tanggal_selesai[]');
		$id_jadwal_transaksi_langsung_detail = $this->input->post('id_jadwal_transaksi_langsung_detail[]');
		// jadwal manual
		$jadwal_mulai = date('d-m-Y H:i', strtotime($tanggal_mulai[1]));
		$jadwal_selesai = date('d-m-Y H:i', strtotime($tanggal_selesai[1]));
		$id_jadwal = $id_jadwal_transaksi_langsung_detail[1];
		$tanggal_selesai_akhir30 =  date('d-m-Y H:i', strtotime($tanggal_selesai[1]));
		$where = [
			'id_jadwal_transaksi_langsung_detail' => $id_jadwal,
			'id_paket' => $id_paket,
		];
		$data = [
			'tanggal_mulai' => $jadwal_mulai,
			'tanggal_selesai' => $jadwal_selesai
		];
		$this->Paket_model->update_jadwal_transaksi_langsung($data, $where);
		$data_update = [
			'batas_pendaftaran' => $tanggal_selesai_akhir30
		];
		$where_update = [
			'id_paket' => $id_paket
		];

		$this->Paket_model->update_kategori_penyedia($data_update, $where_update);

		// jadwal manual2
		$jadwal_mulai = date('d-m-Y H:i', strtotime($tanggal_mulai[2]));
		$jadwal_selesai = date('d-m-Y H:i', strtotime($tanggal_selesai[2]));
		$id_jadwal = $id_jadwal_transaksi_langsung_detail[2];
		$where = [
			'id_jadwal_transaksi_langsung_detail' => $id_jadwal,
			'id_paket' => $id_paket,
		];
		$data = [
			'tanggal_mulai' => $jadwal_mulai,
			'tanggal_selesai' => $jadwal_selesai
		];
		$this->Paket_model->update_jadwal_transaksi_langsung($data, $where);


		// jadwal manual3
		$jadwal_mulai = date('d-m-Y H:i', strtotime($tanggal_mulai[3]));
		$jadwal_selesai = date('d-m-Y H:i', strtotime($tanggal_selesai[3]));
		$id_jadwal = $id_jadwal_transaksi_langsung_detail[3];
		$where = [
			'id_jadwal_transaksi_langsung_detail' => $id_jadwal,
			'id_paket' => $id_paket,
		];
		$data = [
			'tanggal_mulai' => $jadwal_mulai,
			'tanggal_selesai' => $jadwal_selesai
		];
		$this->Paket_model->update_jadwal_transaksi_langsung($data, $where);


		// jadwal manual4
		$jadwal_mulai = date('d-m-Y H:i', strtotime($tanggal_mulai[4]));
		$jadwal_selesai = date('d-m-Y H:i', strtotime($tanggal_selesai[4]));
		$id_jadwal = $id_jadwal_transaksi_langsung_detail[4];
		$where = [
			'id_jadwal_transaksi_langsung_detail' => $id_jadwal,
			'id_paket' => $id_paket,
		];
		$data = [
			'tanggal_mulai' => $jadwal_mulai,
			'tanggal_selesai' => $jadwal_selesai
		];
		$this->Paket_model->update_jadwal_transaksi_langsung($data, $where);


		// jadwal manual5
		$jadwal_mulai = date('d-m-Y H:i', strtotime($tanggal_mulai[5]));
		$jadwal_selesai = date('d-m-Y H:i', strtotime($tanggal_selesai[5]));
		$id_jadwal = $id_jadwal_transaksi_langsung_detail[5];
		$where = [
			'id_jadwal_transaksi_langsung_detail' => $id_jadwal,
			'id_paket' => $id_paket,
		];
		$data = [
			'tanggal_mulai' => $jadwal_mulai,
			'tanggal_selesai' => $jadwal_selesai
		];
		$this->Paket_model->update_jadwal_transaksi_langsung($data, $where);


		// jadwal manual6
		$jadwal_mulai = date('d-m-Y H:i', strtotime($tanggal_mulai[6]));
		$jadwal_selesai = date('d-m-Y H:i', strtotime($tanggal_selesai[6]));
		$id_jadwal = $id_jadwal_transaksi_langsung_detail[6];
		$where = [
			'id_jadwal_transaksi_langsung_detail' => $id_jadwal,
			'id_paket' => $id_paket,
		];
		$data = [
			'tanggal_mulai' => $jadwal_mulai,
			'tanggal_selesai' => $jadwal_selesai
		];
		$this->Paket_model->update_jadwal_transaksi_langsung($data, $where);


		// jadwal manual7
		$jadwal_mulai = date('d-m-Y H:i', strtotime($tanggal_mulai[7]));
		$jadwal_selesai = date('d-m-Y H:i', strtotime($tanggal_selesai[7]));
		$id_jadwal = $id_jadwal_transaksi_langsung_detail[7];
		$where = [
			'id_jadwal_transaksi_langsung_detail' => $id_jadwal,
			'id_paket' => $id_paket,
		];
		$data = [
			'tanggal_mulai' => $jadwal_mulai,
			'tanggal_selesai' => $jadwal_selesai
		];
		$this->Paket_model->update_jadwal_transaksi_langsung($data, $where);


		// jadwal manual8
		$jadwal_mulai = date('d-m-Y H:i', strtotime($tanggal_mulai[8]));
		$jadwal_selesai = date('d-m-Y H:i', strtotime($tanggal_selesai[8]));
		$id_jadwal = $id_jadwal_transaksi_langsung_detail[8];
		$tanggal_selesai_akhir =  date('d-m-Y H:i', strtotime($tanggal_selesai[8]));
		$where = [
			'id_jadwal_transaksi_langsung_detail' => $id_jadwal,
			'id_paket' => $id_paket,
		];
		$data = [
			'tanggal_mulai' => $jadwal_mulai,
			'tanggal_selesai' => $jadwal_selesai
		];
		$this->Paket_model->update_jadwal_transaksi_langsung($data, $where);

		$data_update = [
			'selesai_semua_tender' => $tanggal_selesai_akhir
		];
		$where_update = [
			'id_paket' => $id_paket
		];

		$this->Paket_model->update_kategori_penyedia($data_update, $where_update);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}

	public function update_kategori_penyedia($id_paket)
	{
		$kategori_penyedia = $this->input->post('kategori_penyedia_terpilih');
		$where = [
			'id_paket' => $id_paket
		];
		$data = [
			'kategori_penyedia' => $kategori_penyedia
		];
		$this->Paket_model->update_kategori_penyedia($data, $where);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}
	// minta persetujuan manager
	public function minta_persetujuan_manager($id_paket)
	{
		$nama_pelaksana = $this->input->post('nama_pelaksana');
		$where = [
			'id_paket' => $id_paket
		];
		$data = [
			'nama_pelaksana' => $nama_pelaksana,
			'status_persetujuan_manager' => 1,
			'notifikasi_manager' => 1,
		];
		$this->Paket_model->update_kategori_penyedia($data, $where);
		// ambil divisi untuk manger kirim telpon
		$get_divisi = $this->Paket_model->ambil_paket($id_paket);
		$ambil_divisi = $get_divisi['id_unit_kerja'];
		$nama_paket = $get_divisi['nama_paket'];
		$nama_metode_pemilihan = $get_divisi['nama_metode_pemilihan'];
		$divisi = $this->Paket_model->get_pegawai($ambil_divisi);
		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'mail.jmtm.co.id',
			'smtp_port' => 465,
			'smtp_user' => 'eproc@jmtm.co.id',
			'smtp_pass' => '@dminJMTM!',
			'mailtype'  => 'html',
			'charset'   => 'iso-8859-1'
		);

		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		// Email penerima
		$this->email->from('eproc@jmtm.co.id', 'JMTM');
		$this->email->to($divisi['email']); // Ganti dengan email tujuan

		// Subject email
		$this->email->subject('E-PROCUREMENT JMTM');

		// Isi email
		$this->email->message("Permintaan Persetujuan Paket : $nama_paket , Metode Pemilihan : $nama_metode_pemilihan , Login Dan setujui https://eproc.jmtm.co.id/");
		$output = [
			"telpon" => $divisi,
			"paket" => $get_divisi

		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
		$this->email->send();
	}

	// setujui dari manger
	public function persetujuan_manager($id_paket)
	{
		$get_divisi = $this->Paket_model->ambil_paket($id_paket);
		$nama_paket = $get_divisi['nama_paket'];
		$unit_kerja = $get_divisi['id_unit_kerja'];
		$nama_metode_pemilihan = $get_divisi['nama_metode_pemilihan'];
		$id_panitia = $get_divisi['id_panitia'];
		$by_result_panitia = $this->Paket_model->get_panitia_Byid2($id_panitia);
		$by_telpon_ketua_panitia = $this->Paket_model->get_ketua_panitia($id_panitia);
		$where = [
			'id_paket' => $id_paket
		];
		$data = [
			'nama_manager_penyetuju' => $this->session->userdata('nama_pegawai'),
			'status_persetujuan_manager' => 3,
		];
		$this->Paket_model->update_kategori_penyedia($data, $where);
		$by_agency = $this->Paket_model->get_pegawai_agency($unit_kerja);
		$get_telpon_agency = $by_agency['telepon'];
		$email_agency = $by_agency['email'];
		if ($get_divisi['id_metode_pemilihan'] == 10) {
			$output = [
				"telpon" => $get_telpon_agency,
				"paket" => $get_divisi

			];
			$config = array(
				'protocol' => 'smtp',
				'smtp_host' => 'jmtm.co.id',
				'smtp_port' => 465,
				'smtp_user' => 'mail.jmtm.co.id',
				'smtp_pass' => '@dminJMTM!',
				'mailtype'  => 'html',
				'charset'   => 'iso-8859-1'
			);
			$this->email->from('eproc@jmtm.co.id', 'JMTM');
			// Email penerima
			$this->email->to($email_agency); // Ganti dengan email tujuan

			// Subject email
			$this->email->subject('E-PROCUREMENT JMTM');

			// Isi email
			$this->email->message("Berhasil Di Setujui Nama Paket : $nama_paket , Metode Pemilihan : $nama_metode_pemilihan , Login Dan Umumkan Paket https://eproc.jmtm.co.id/");
			$this->email->send();
		} else {
			$output = [
				"telpon" => $by_telpon_ketua_panitia,
				"paket" => $get_divisi

			];
			$config = array(
				'protocol' => 'smtp',
				'smtp_host' => 'jmtm.co.id',
				'smtp_port' => 465,
				'smtp_user' => 'mail.jmtm.co.id',
				'smtp_pass' => '@dminJMTM!',
				'mailtype'  => 'html',
				'charset'   => 'iso-8859-1'
			);
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");

			foreach ($by_result_panitia as $key => $value) {
				// Email dan nama pengirim
				$this->email->from('eproc@jmtm.co.id', 'JMTM');

				// Email penerima
				$this->email->to($value['email']); // Ganti dengan email tujuan

				// Subject email
				$this->email->subject('E-PROCUREMENT JMTM');

				// Isi email
				$this->email->message("Berhasil Di Setujui Nama Paket : $nama_paket , Metode Pemilihan : $nama_metode_pemilihan , Login Dan Umumkan Paket https://eproc.jmtm.co.id/");
				$this->email->send();
			}
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}


	public function umumkan_paket_transaksi_langsung($id_paket)
	{
		$get_kode = $this->Paket_model->getByid($id_paket);
		$kirim_email = $this->input->post('kirim_email');
		$username_vendor = $this->input->post('username_vendor');
		$password_vendor = $this->input->post('password_vendor');
		$where = [
			'id_paket' => $id_paket
		];
		$data = [
			'kode_tender' => $get_kode['kode_jenis_anggaran'] . $get_kode['kode_jenis_pengadaan'] . $get_kode['kode_metode_pemilihan'] . $get_kode['kode_unit_kerja'] . $get_kode['kode_produk_dl_negri'] . $get_kode['kode_tender_random'],
			'status_persetujuan_manager' => 4,
			'status_paket_tender' =>  1,
			'status_tahap_tender' =>  1,
			'id_sub_agency' => $this->session->userdata('id_pegawai'),
			'token' => random_string('alnum', 128),
			'token_vendor' => random_string('alnum', 128)
		];
		$where_vendor_mengikuti_paket = [
			'id_mengikuti_paket_vendor' => $id_paket
		];
		$data2 = [
			'status_transaksi_langsung' => 1
		];
		$this->Paket_model->update_kategori_penyedia($data, $where);
		$this->Paket_model->update_berhasil_di_tunjuk_transaksi_langsung($data2, $where_vendor_mengikuti_paket);
		$vendor = $this->Rolepanitia_model->ambil_telpon_email($id_paket);
		$buka_password = password_verify($password_vendor, PASSWORD_DEFAULT);
		if ($vendor['jenis_pemilihan'] == 'vendor lama') {
			$telpon = $vendor['telpon_usaha'];
		} else {
			$telpon = $vendor['telpon_vendor'];
		}
		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'mail.jmtm.co.id',
			'smtp_port' => 465,
			'smtp_user' => 'eproc@jmtm.co.id',
			'smtp_pass' => '@dminJMTM!',
			'mailtype'  => 'html',
			'charset'   => 'iso-8859-1'
		);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");

		$this->email->from('eproc@jmtm.co.id', 'JMTM');


		// Email penerima
		$this->email->to($kirim_email); // Ganti dengan email tujuan

		// Subject email
		$this->email->subject('E-PROCUREMENT JMTM TRANSAKSI LANGSUNG');

		// Isi email
		$this->email->message("Kepada PT/PD : $username_vendor Anda Mempunyai Paket Transaksi Langsung  Silakan Login Dan lihat Paket.                                                Username : $username_vendor           Password:$buka_password                                    Login ke : https://vms.jmtm.co.id/auth");

		$this->email->send();
		$output = [
			"telpon" => $telpon,
			"vendor" => $vendor,
			"password_vendor" => $buka_password
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}


	// kirim_alasan_revisi_paket/batal
	public function kirim_alasan_revisi_paket($id_paket)
	{
		$get_divisi = $this->Paket_model->ambil_paket($id_paket);
		$nama_paket = $get_divisi['nama_paket'];
		$nama_metode_pemilihan = $get_divisi['nama_metode_pemilihan'];
		$id_panitia = $get_divisi['id_panitia'];
		$unit_kerja = $get_divisi['id_unit_kerja'];
		$by_result_panitia = $this->Paket_model->get_panitia_Byid2($id_panitia);
		$by_telpon_ketua_panitia = $this->Paket_model->get_ketua_panitia($id_panitia);
		$alasan_revisi_paket_atau_batalkan_paket = $this->input->post('alasan_revisi_paket_atau_batalkan_paket');
		$where = [
			'id_paket' => $id_paket
		];
		$data = [
			'alasan_revisi_paket_atau_batalkan_paket' => $alasan_revisi_paket_atau_batalkan_paket,
			'nama_manager_penyetuju' => $this->session->userdata('nama_pegawai'),
			'status_persetujuan_manager' => 2
		];
		$this->Paket_model->update_kategori_penyedia($data, $where);
		$by_agency = $this->Paket_model->get_pegawai_agency($unit_kerja);
		$get_telpon_agency = $by_agency['telepon'];
		$email_agency = $by_agency['email'];
		if ($get_divisi['id_metode_pemilihan'] == 10) {
			$output = [
				"alasan_revisi" => $alasan_revisi_paket_atau_batalkan_paket,
				"telpon" => $get_telpon_agency,
				"paket" => $get_divisi

			];
			$config = array(
				'protocol' => 'smtp',
				'smtp_host' => 'jmtm.co.id',
				'smtp_port' => 465,
				'smtp_user' => 'mail.jmtm.co.id',
				'smtp_pass' => '@dminJMTM!',
				'mailtype'  => 'html',
				'charset'   => 'iso-8859-1'
			);
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");

			$this->email->from('eproc@jmtm.co.id', 'JMTM');
			// Email penerima
			$this->email->to($email_agency); // Ganti dengan email tujuan

			// Subject email
			$this->email->subject('E-PROCUREMENT JMTM');

			// Isi email
			$this->email->message("Revisi Persetujuan Nama Paket : $nama_paket , Metode Pemilihan : $nama_metode_pemilihan , Alasan Revisi : $alasan_revisi_paket_atau_batalkan_paket , lihat Revisi  Login https://eproc.jmtm.co.id/");
			$this->email->send();
		} else {
			$output = [
				"alasan_revisi" => $alasan_revisi_paket_atau_batalkan_paket,
				"telpon" => $by_telpon_ketua_panitia,
				"paket" => $get_divisi

			];
			$config = array(
				'protocol' => 'smtp',
				'smtp_host' => 'jmtm.co.id',
				'smtp_port' => 465,
				'smtp_user' => 'mail.jmtm.co.id',
				'smtp_pass' => '@dminJMTM!',
				'mailtype'  => 'html',
				'charset'   => 'iso-8859-1'
			);
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");


			foreach ($by_result_panitia as $key => $value) {
				// Email dan nama pengirim
				$this->email->from('eproc@jmtm.co.id', 'JMTM');

				// Email penerima
				$this->email->to($value['email']); // Ganti dengan email tujuan

				// Subject email
				$this->email->subject('E-PROCUREMENT JMTM');

				// Isi email
				$this->email->message("Revisi Persetujuan Nama Paket : $nama_paket , Metode Pemilihan : $nama_metode_pemilihan , Alasan Revisi : $alasan_revisi_paket_atau_batalkan_paket , lihat Revisi  Login https://eproc.jmtm.co.id/");
				$this->email->send();
			}
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}
	// ini untuk notifikasi manager
	public function notifikasi_manager()
	{
		$data = $this->Paket_model->total_notif_manager();
		$output = [
			'dataku' => $data
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}
	// sudah di baca
	public function notifikasi_manager_sudah_dibaca()
	{
		$data = [
			'notifikasi_manager' => 0,
		];
		$data = $this->Paket_model->update_sudah_dibaca_manager(array('id_unit_kerja' => $this->session->userdata('id_unit_kerja2')), $data);
		$output = [
			'dataku' => $data
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	// INI UNTUK NEGOSIASI TRANSAKSI LANGSUUNG
	public function negosiasi_transaksi_langsung($id_paket)
	{
		$data['jumlah_peserta'] = $this->Rolepanitia_model->hitung_peserta($id_paket);
		$data['total_rincian_hps_pdf'] = $this->Paket_model->get_by_rincian_hps_pdf_result($id_paket);
		$data['total_hps_pdf_ada'] = $this->Paket_model->get_by_rincian_hps_pdf_sudah_dibuat($id_paket);
		$data['vendor_terpilih'] = $this->Paket_model->vendor_terpilih($id_paket);
		$data['result_data_jadwal_detail'] = $this->Paket_model->result_data_jadwal_detail($id_paket);
		$data['cek_kak'] = $this->Paket_model->cek_kak($id_paket);
		$data['cek_sskk'] = $this->Paket_model->cek_kak($id_paket);
		$data['cek_informasi'] = $this->Paket_model->cek_informasi($id_paket);
		$data['total_rincian_hps']  = $this->Paket_model->totalRincianHps($id_paket);
		$data['status_rincian_hps']  = $this->Paket_model->status_rincian_hps($id_paket);
		$data['total_hps']  = $this->Paket_model->totalhps($id_paket);
		$data['sumberdana']  = $this->Paket_model->getSumberDana($id_paket);
		$data['lokasi_kerja']  = $this->Paket_model->getLokasiPekerjaan($id_paket);
		$data['jadwal_pemilihan']  = $this->Paket_model->getJadwalPemilihan($id_paket);
		$data['paket'] = $this->Paket_model->getByid($id_paket);
		$data['getdivisi'] = $this->Paket_model->get_devisi();
		$data['get_jenis_anggaran'] = $this->Paket_model->get_jenis_anggaran();
		$data['get_metode'] = $this->Paket_model->get_metode_pemilihan();
		$data['get_jenis_pengadaan'] = $this->Paket_model->get_jenis_pengadaan();
		$data['get_produk_dl_negri'] = $this->Paket_model->get_produk_dalam_negri();
		$data['kabupaten'] = $this->Wilayah_model->getAllKabupaten();
		$data['provinsi'] = $this->Wilayah_model->getProvinsi();
		$data['vendor_terpilih_detail'] = $this->Paket_model->vendor_terpilih_detail($id_paket);
		$data['jadwal_tahap1'] = $this->Paket_model->get_jadwal_transaksi_langsung($id_paket);
		$data['data2'] = $this->Chat_negosiasi_model->getDataById_transaksi_langsung_chat_2($id_paket);
		$data['data2_2'] = $this->Chat_negosiasi_model->getDataById_transaksi_langsung_chat_2($id_paket);
		$id_pegawai = $this->session->userdata('id_pegawai');
		$data['ambil_paket']  = $this->Chat_negosiasi_model->get_byid_panitia($id_paket, $id_pegawai);
		$data['get_tahap_negosiasi_transaksi_langsung']  = $this->Paket_model->get_tahap_negosiasi_transaksi_langsung($id_paket);
		$this->load->view('template_paket/header');
		$this->load->view('template_paket/navbar');
		$this->load->view('paket/negosiasi_transaksi_langsung', $data);
		$this->load->view('template_paket/footer');
		$this->load->view('paket/ajax', $data);
	}
	// INI UNTUK NGELOAD CHAT TRANSAKSI LANGSUNG
	public function ngeload_chat_transaksi_langsung($id_paket)
	{
		$data = $this->Chat_negosiasi_model->getPesan($id_paket);
		echo json_encode(array(
			'data' => $data
		));
	}

	// INI UNTUK KIRIM PESANYA
	public function kirim_pesan_transaksi_langsung($id_paket)
	{
		$isi = $this->input->post('isi');
		$id_pengirim = $this->input->post('id_pengirim');
		$id_penerima = $this->input->post('id_penerima');
		$id_paket = $this->input->post('id_paket');
		$config['upload_path'] = './file_chat/';
		$config['allowed_types'] = 'pdf|jpeg|jpg|png|jfif|gif|xlss|docx';
		$config['max_size'] = 204800;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('dokumen_chat')) {

			$fileData = $this->upload->data();

			$upload = [
				'id_pengirim' => $id_pengirim,
				'isi' => $isi,
				'id_penerima' => $id_penerima,
				'id_paket' => $id_paket,
				'dokumen_chat' => $fileData['file_name'],
			];
			$this->Chat_negosiasi_model->tambah_chat($upload);
			$log = array('status' => true);
			echo json_encode($log);
			return true;
		} else if ($this->upload->do_upload('img_chat')) {

			$fileData2 = $this->upload->data();

			$upload = [
				'id_pengirim' => $id_pengirim,
				'isi' => $isi,
				'id_penerima' => $id_penerima,
				'id_paket' => $id_paket,
				'img_chat' => $fileData2['file_name'],
			];
			$this->Chat_negosiasi_model->tambah_chat($upload);
			$log = array('status' => true);
			echo json_encode($log);
			return true;
		} else {
			$upload = [
				'id_pengirim' => $id_pengirim,
				'isi' => $isi,
				'id_penerima' => $id_penerima,
				'id_paket' => $id_paket,
			];
			$this->Chat_negosiasi_model->tambah_chat($upload);
			$log = array('status' => true);
			echo json_encode($log);
			return true;
		}
	}
	// INI AMBIL DATA VENDORNYA
	public function GetAllVendor_transaksi_langsung($id_paket)
	{
		$get_vendor = $this->Chat_negosiasi_model->GetAllVendor_transaksi_langsung($id_paket);
		$output = [
			"vendor" => $get_vendor,
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	// INI BUKTI BA NEGOSIASI DARI VENDOR
	public function getdatatbl_bukti_negosiasi_transaksi_langsung_vendor($id_paket)
	{
		$resultss = $this->Paket_model->getdatatbl_bukti_negosiasi_transaksi_langsung_vendor($id_paket);
		$data = [];
		$no = $_POST['start'];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] =  $angga->username_vendor;
			$row[] =  $angga->nama_file_negosiasi;
			$row[] =   '<a href="https://vms.jmtm.co.id/file_negosiasi_vendor_transaksi_langsung_vendor/' . $angga->file_negosisasi . '">' . '<img width="30px" src=' . base_url('assets/img/pdf.png') . ' >' . '</a>';
			$row[] =   '<a class="btn btn-grad100 btn-sm" href="https://vms.jmtm.co.id/file_negosiasi_vendor_transaksi_langsung_vendor/' . $angga->file_negosisasi . '"><i class="fas fa fa-download"></i> Download File</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Paket_model->count_all_data_bukti_negosiasi_transaksi_langsung_vendor($id_paket),
			"recordsFiltered" => $this->Paket_model->count_filtered_data_bukti_negosiasi_transaksi_langsung_vendor($id_paket),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	// INI UNTUK PENETAPAM PEMENANAG TRANSAKSI LANGSUNG

	public function penetapan_pemenang_transaksi_langsung($id_paket)
	{
		$data['penetapan_pemenang'] = $this->Paket_model->penetapan_pemenang($id_paket);
		$data['jumlah_peserta'] = $this->Rolepanitia_model->hitung_peserta($id_paket);
		$data['total_rincian_hps_pdf'] = $this->Paket_model->get_by_rincian_hps_pdf_result($id_paket);
		$data['total_hps_pdf_ada'] = $this->Paket_model->get_by_rincian_hps_pdf_sudah_dibuat($id_paket);
		$data['vendor_terpilih'] = $this->Paket_model->vendor_terpilih($id_paket);
		$data['result_data_jadwal_detail'] = $this->Paket_model->result_data_jadwal_detail($id_paket);
		$data['cek_kak'] = $this->Paket_model->cek_kak($id_paket);
		$data['cek_sskk'] = $this->Paket_model->cek_kak($id_paket);
		$data['cek_informasi'] = $this->Paket_model->cek_informasi($id_paket);
		$data['total_rincian_hps']  = $this->Paket_model->totalRincianHps($id_paket);
		$data['status_rincian_hps']  = $this->Paket_model->status_rincian_hps($id_paket);
		$data['total_hps']  = $this->Paket_model->totalhps($id_paket);
		$data['sumberdana']  = $this->Paket_model->getSumberDana($id_paket);
		$data['lokasi_kerja']  = $this->Paket_model->getLokasiPekerjaan($id_paket);
		$data['jadwal_pemilihan']  = $this->Paket_model->getJadwalPemilihan($id_paket);
		$data['paket'] = $this->Paket_model->getByid($id_paket);
		$data['getdivisi'] = $this->Paket_model->get_devisi();
		$data['get_jenis_anggaran'] = $this->Paket_model->get_jenis_anggaran();
		$data['get_metode'] = $this->Paket_model->get_metode_pemilihan();
		$data['get_jenis_pengadaan'] = $this->Paket_model->get_jenis_pengadaan();
		$data['get_produk_dl_negri'] = $this->Paket_model->get_produk_dalam_negri();
		$data['kabupaten'] = $this->Wilayah_model->getAllKabupaten();
		$data['provinsi'] = $this->Wilayah_model->getProvinsi();
		$data['jadwal_tahap1'] = $this->Paket_model->get_jadwal_transaksi_langsung($id_paket);
		$data['data2'] = $this->Chat_negosiasi_model->getDataById_transaksi_langsung_chat($id_paket);
		$id_pegawai = $this->session->userdata('id_pegawai');
		$data['ambil_paket']  = $this->Chat_negosiasi_model->get_byid_panitia($id_paket, $id_pegawai);
		$this->load->view('template_paket/header');
		$this->load->view('template_paket/navbar');
		$this->load->view('paket/penetapan_pemenang_transaksi_langsung', $data);
		$this->load->view('template_paket/footer');
		$this->load->view('paket/ajax_penetapan_pemenang', $data);
	}
	// INI UNTUK PENETAOPAN PEMENANAG DAN KIRIM SURAT PENETAPAN PEMENANG
	public function get_datatable_penetapan_pemenang($id_paket)
	{
		$resultss = $this->Paket_model->get_datatable_penetapan_pemenang($id_paket);
		$data = [];
		$no = $_POST['start'];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] =  $angga->nama_surat_penetapan_pemenang;
			$row[] =   '<a href=' . base_url('/dokumen_file_surat_penetapan_pemenang' . '/' . $angga->file_surat_penetapan_pemenang) . '>' . '<img width="30px" src=' . base_url('assets/img/pdf.png') . ' >' . '</a>';
			$row[] = '<a href="javascript:;"  class="btn btn-sm btn-danger" id="prosess" onClick="by_id_penetapan_pemenang(' . "'" . $angga->id_penetapan_pemenanag . "','hapus_penetapan_pemenang'" . ')"><i class="fas fa fa-trash"></i> </a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Paket_model->count_all_data_penetapan_pemenang($id_paket),
			"recordsFiltered" => $this->Paket_model->count_filtered_data_penetapan_pemenang($id_paket),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function by_id_penetapan_pemenang($id_negosisasi_vendor)
	{

		$get_penetapan_pemenang = $this->Paket_model->by_id_penetapan_pemenang($id_negosisasi_vendor);
		$output = [
			"get_penetapan_pemenang" => $get_penetapan_pemenang,

		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}
	public function add_penetapan_pemenang($id_paket)
	{
		$nama_surat_penetapan_pemenang = $this->input->post('nama_surat_penetapan_pemenang');
		$id_vendor = $this->input->post('id_vendor');
		$vendor = $this->Paket_model->penetapan_pemenang($id_paket);
		if ($vendor['jenis_pemilihan'] == "vendor lama") {
			$telpon_vendir = $vendor['telpon_usaha'];
		} else {
			$telpon_vendir = $vendor['telpon_vendor'];
		}

		$kirim_email = $this->input->post('kirim_email');
		$config['upload_path'] = './dokumen_file_surat_penetapan_pemenang/';
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = 0;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('file_surat_penetapan_pemenang')) {

			$fileData = $this->upload->data();

			$upload = [
				'id_paket' => $id_paket,
				'id_vendor' => $id_vendor,
				'nama_surat_penetapan_pemenang' => $nama_surat_penetapan_pemenang,
				'user_created' => $this->session->userdata('nama_pegawai'),
				'file_surat_penetapan_pemenang' => $fileData['file_name'],
				'status_penetapan' => 1
			];
			$config = array(
				'protocol' => 'smtp',
				'smtp_host' => 'jmtm.co.id',
				'smtp_port' => 465,
				'smtp_user' => 'mail.jmtm.co.id',
				'smtp_pass' => '@dminJMTM!',
				'mailtype'  => 'html',
				'charset'   => 'iso-8859-1'
			);
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");

			$this->email->from('eproc@jmtm.co.id', 'JMTM');

			// Email penerima
			$this->email->to($kirim_email); // Ganti dengan email tujuan

			// Subject email
			$this->email->subject('E-Procurement JMTM');

			// Isi email

			$this->email->message("Anda Telah Di Tetapkan Sebagai Pemenang Lihat Surat Penetapan Pemenangnya https://eproc.jmtm.co.id/dokumen_file_surat_penetapan_pemenang/" . $fileData['file_name']);

			$this->email->send();
			$this->Paket_model->tambah_penetapan_langsung($upload);
			$output = [
				'filenya' =>  $fileData['file_name'],
				'telpon' => $telpon_vendir
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($output));
		} else {
			$this->session->set_flashdata('error', $this->upload->display_errors());
			redirect(base_url('upload'));
		}
	}

	public function delete_penetapan_pemenang($id_penetapan_pemenanag)
	{
		$this->Paket_model->delete_penetapan_pemenang($id_penetapan_pemenanag);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}
	// INI UNTUK BATALKAN TRNSAKSI LANGSUNG

	public function get_by_id_paket_batalkan_transaksi_langsung($id_paket)
	{
		$get_vendor_vendor = $this->Paket_model->ambil_paket($id_paket);
		$output = [
			"get_vendor_vendor" => $get_vendor_vendor,
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}
	public function batalkan_paket_transaksi_langsung()
	{
		$nama_pembatal_transaksi_langsung = $this->input->post('nama_pembatal_transaksi_langsung');
		$alasan_batal_paket_transaksi_langsung = $this->input->post('alasan_batal_paket_transaksi_langsung');
		$data = [
			'nama_pembatal_transaksi_langsung' => $nama_pembatal_transaksi_langsung,
			'alasan_batal_paket_transaksi_langsung' => $alasan_batal_paket_transaksi_langsung,
			'status_persetujuan_manager' => 0,
		];
		$this->Paket_model->update_batal_tender(array('id_paket' => $this->input->post('id_paket')), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}

	public function batalkan_paket_transaksi_langsung_okeee($id_paket)
	{
		$get_kode = $this->Paket_model->getByid($id_paket);
		$nama_paket_penetapan = $get_kode['nama_paket'];
		$vendor_kepilih = $this->Paket_model->vendor_terpilih_detail($id_paket);
		$kirim_email = $this->input->post('kirim_email');
		$telpon = $this->input->post('telpon');
		$alasan_batal_tender = $this->input->post('alasan_batal_tender');
		$username_vendor = $this->input->post('username_vendor');
		$id_vendor = $this->input->post('id_vendor');
		$where = [
			'id_paket' => $id_paket
		];
		$data = [
			'kode_tender' => $get_kode['kode_jenis_anggaran'] . $get_kode['kode_jenis_pengadaan'] . $get_kode['kode_metode_pemilihan'] . $get_kode['kode_unit_kerja'] . $get_kode['kode_produk_dl_negri'] . $get_kode['kode_tender_random'],
			'status_paket_tender' =>  0,
			'status_tahap_tender' =>  0,
			'token' => random_string('alnum', 128),
			'token_vendor' => random_string('alnum', 128)
		];
		$where_vendor_mengikuti_paket = [
			'id_mengikuti_paket_vendor' => $id_paket
		];
		$data2 = [
			'status_transaksi_langsung' => 0
		];
		if ($vendor_kepilih['status_vendor_baru'] == 1) {
			$data_kevendor = [
				'status_aktive_vendor' => 0
			];
			$where_kevendor = [
				'id_vendor' => $id_vendor
			];
		} else {
			$data_kevendor = [
				'status_aktive_vendor' => 1
			];
			$where_kevendor = [
				'id_vendor' => $id_vendor
			];
		}
		$paket_batal_data = [
			'alasan_tender_batal' => $alasan_batal_tender,
			// 'status_soft_delete' => 1,
			'status_pembatalan_atau_pengulangan' => 2,
			'status_persetujuan_manager' => 0,
		];
		$paket_batal_where = [
			'id_paket' => $id_paket
		];
		$this->Paket_model->buat_alasan_paket_batal($paket_batal_data, $paket_batal_where);
		$this->Paket_model->update_vendr($data_kevendor, $where_kevendor);
		$this->Paket_model->update_kategori_penyedia($data, $where);
		$this->Paket_model->update_berhasil_di_tunjuk_transaksi_langsung($data2, $where_vendor_mengikuti_paket);

		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'mail.jmtm.co.id',
			'smtp_port' => 465,
			'smtp_user' => 'eproc@jmtm.co.id',
			'smtp_pass' => '@dminJMTM!',
			'mailtype'  => 'html',
			'charset'   => 'iso-8859-1'
		);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");

		$this->email->from('eproc@jmtm.co.id', 'JMTM');

		// Email penerima
		$this->email->to($kirim_email); // Ganti dengan email tujuan

		// Subject email
		$this->email->subject('E-PROCUREMENT JMTM PENETAPAN LANGSUNG');

		// Isi email
		$this->email->message("Kepada PT/PD : $username_vendor , Bahwa Paket Penetapan Langsung Dengan Nama Paket : $nama_paket_penetapan , Telah Di Batalkan , Alasan Pembatalan : $alasan_batal_tender ");

		$this->email->send();

		$output = [
			'telpon' => $telpon,
			'paket' => $nama_paket_penetapan,
			'alasan' => $alasan_batal_tender
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function summary_transaksi_langsung($id_paket)
	{
		// $yuknga = $this->Chat_model->getDataById_transaksi_langsung_chat($id_paket);
		// $paket['test_paket'] = $yuknga['id_mengikuti_vendor'];		
		$ambil_kualifikasi = $this->Rolepanitia_model->getById($id_paket);
		$id_kualifikasi = $ambil_kualifikasi['id_kualifikasi'];
		$paket['jadwal_tahap1'] = $this->Rolepanitia_model->get_all_detail_jadwal_row($id_kualifikasi, $id_paket);
		$paket['jumlah_peserta'] = $this->Rolepanitia_model->hitung_peserta($id_paket);
		$paket['get_pdf_dokumen_kualifikasi_lelang'] = $this->Rolepanitia_model->get_pdf_dokumen_kualifikasi_lelang($id_paket);
		$paket['get_pdf_dokumen_kualifikasi'] = $this->Rolepanitia_model->get_pdf_dokumen_kualifikasi($id_paket);
		$paket['paket'] = $this->Rolepanitia_model->getById($id_paket);
		$paket['angga'] = $this->Paket_model->getByid($id_paket);
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
		$paket['peserta_tender'] = $this->Rolepanitia_model->peserta_tender($id_paket);


		//berita acara
		$paket['get_berita_acara_penawaran'] = $this->Rolepanitia_model->get_berita_acara_penawaran($id_paket);
		$paket['get_berita_acara_tender'] = $this->Rolepanitia_model->get_berita_acara_tender($id_paket);
		$paket['get_berita_acara_peringkat'] = $this->Rolepanitia_model->get_berita_acara_peringkat($id_paket);
		$paket['get_berita_acara_lainnya'] = $this->Rolepanitia_model->get_berita_acara_lainnya($id_paket);

		//tahap tahap
		$paket['get_tahap'] = $this->Rolepanitia_model->get_tahap_dokumen1($id_paket, $id_kualifikasi);
		$paket['total_rincian_hps']  = $this->Paket_model->totalRincianHps($id_paket);
		//berita
		$paket['get_tahap2'] = $this->Rolepanitia_model->get_tahap_berita($id_paket, $id_kualifikasi);

		//ambil dokumen persyaratan tambahan yang dari vendor
		$paket['get_dokumen_vendor_persyaratan_tambahan'] = $this->Rolepanitia_model->get_dokumen_persyaratan_vendor($id_paket);

		$paket['vendor_mengikuti_paket'] = $this->Rolepanitia_model->get_vendor_mengikuti_paket($id_paket);
		$paket['total_rincian_hps_pdf'] = $this->Paket_model->get_by_rincian_hps_pdf_result($id_paket);
		$paket['total_hps_pdf_ada'] = $this->Paket_model->get_by_rincian_hps_pdf_sudah_dibuat($id_paket);
		$paket['ambil_panitia'] = $this->Rolepanitia_model->ambil_panitia_tender($id_paket);

		$paket['row_panitia'] = $this->Rolepanitia_model->ambil_panitia_tender_row($id_paket);
		// var_dump($paket['get_tahap']);
		// die;
		$paket['chat_penjelasan'] = $this->Rolepanitia_model->ambil_semua_chat($id_paket);

		$paket['evaluasi'] = $this->Rolepanitia_model->ambil_semua_evaluasi($id_paket);


		$paket['lokasi_pekerjaan'] = $this->Rolepanitia_model->ambil_lokasi_kerja($id_paket);

		$paket['sumber_dana'] = $this->Rolepanitia_model->ambil_sumber_dana($id_paket);
		$paket['result_data_jadwal_detail'] = $this->Paket_model->result_data_jadwal_detail($id_paket);

		$paket['data2'] = $this->Chat_negosiasi_model->getDataById_transaksi_langsung_chat_2($id_paket);
		$id_pegawai = $this->session->userdata('id_pegawai');

		$paket['dokumen_pengadaan'] = $this->Paket_model->dokumen_pengadaan($id_paket);
		$paket['ba_negosiasi'] = $this->Paket_model->ba_negosiasi($id_paket);

		$id_kualifikasi = $ambil_kualifikasi['id_kualifikasi'];
		$this->load->view('paket/summary_transaksi_langsung', $paket);
	}

	public function getdata_paket_pemilihan_langsung()
	{
		if ($this->session->userdata('id_role') == 1) {
			$resultss = $this->Paket_model->getdatatable_paket_tender_terbatas();
			$data = [];
			$no = $_POST['start'];
			foreach ($resultss as $angga) {
				$row = array();
				$row[] = ++$no;
				if ($angga->status_paket_tender == 0) {
					$row[] = $angga->kode_jenis_anggaran . $angga->kode_jenis_pengadaan . $angga->kode_metode_pemilihan . $angga->kode_unit_kerja . $angga->kode_produk_dl_negri;
				} else {
					$row[] = $angga->kode_tender;
				}
				$row[] = $angga->nama_paket;
				$row[] = $angga->nama_metode_pemilihan;
				if ($angga->status_paket_tender == 1) {
					$row[] = '<label class="badge badge-warning"> Draft </label>';
				} else if ($angga->status_paket_tender == 1 && $angga->status_tahap_tender  == 1) {
					if (date('Y-m-d H:i', strtotime($angga->selesai_semua_tender)) > date('Y-m-d H:i')) {
						$row[] = '<label class="badge badge-info">Tender Sedang Berjalan </label>';
					} else {
						$row[] = '<label class="badge badge-success">Tender Sudah Selesai </label>';
					}
				} else if ($angga->status_paket_tender == 1 && $angga->status_tahap_tender  == 1) {
					if (date('Y-m-d H:i', strtotime($angga->selesai_semua_tender)) > date('Y-m-d H:i')) {
						$row[] = '<label class="badge badge-info">Tender Sedang Berjalan </label>';
					} else {
						$row[] = '<label class="badge badge-success">Tender Sudah Selesai </label>';
					}
				} else if ($angga->status_paket_tender == 2 && $angga->status_paket_tender == 2) {
					if (date('Y-m-d H:i', strtotime($angga->selesai_semua_tender)) > date('Y-m-d H:i')) {
						$row[] = '<label class="badge badge-info">Tender Sedang Berjalan </label>';
					} else {
						$row[] = '<label class="badge badge-success">Tender Sudah Selesai </label>';
					}
				} else if ($angga->status_paket_tender == 0) {
					if ($angga->status_pembatalan_atau_pengulangan == 2) {
						$row[] = '<a class="badge badge-warning" href="javascript:;" onClick="byid_paket_tender_biasa_berlangsung(' . "'" . $angga->id_paket . "','lihat_alasan_batal'" . ')"><i class="fas fa fa-eye"></i> Tender Batal / Mengulang</a>';
					} else {
						$row[] = '<label class="badge badge-danger">Belum Buat Tender!! </label>';
					}
				}

				if ($angga->status_paket_tender == 0) {
					$row[] = $angga->tanggal_buat_rup;
				} else {
					$row[] = $angga->tanggal_buat_paket_tender;
				}
				$row[] = $angga->nama_unit_kerja;
				if ($angga->status_tahap_tender == 2 && $angga->status_paket_tender == 2) {
					$row[] = '<a class="btn btn-success btn-sm" href="javascript:;" onClick="byid_paket_tender_biasa_berlangsung(' . "'" . $angga->id_paket . "','lihat_paket_tender_biasa'" . ')"><i class="fas fa fa-eye"></i> Lihat Paket</a>';
				} else {
					$row[] = '<label class="badge badge-danger"><i class="fas fa-sync"></i> Belum Di Umumkan</label>';
				}

				$data[] = $row;
			}
			$output = array(
				"draw" => intval($_POST['draw']),
				"recordsTotal" => $this->Paket_model->count_all_data_paket_tender_terbatas(),
				"recordsFiltered" => $this->Paket_model->count_filtered_data_paket_tender_terbatas(),
				"data" => $data
			);
			$this->output->set_content_type('application/json')->set_output(json_encode($output));
		} else if ($this->session->userdata('id_role') == 2 || $this->session->userdata('id_role') == 8) {
			$role_agency = $this->session->userdata('id_pegawai');
			$area_agency = $this->session->userdata('id_unit_kerja2');
			$resultsss = $this->Paket_model->getdatatable_paket_tender_agency_terbatas($role_agency, $area_agency);
			$data = [];
			$no = $_POST['start'];
			foreach ($resultsss as $angga) {
				$row = array();
				$row[] = ++$no;
				if ($angga->status_paket_tender == 0) {
					$row[] = $angga->kode_jenis_anggaran . $angga->kode_jenis_pengadaan . $angga->kode_metode_pemilihan . $angga->kode_unit_kerja . $angga->kode_produk_dl_negri;
				} else {
					$row[] = $angga->kode_tender;
				}
				$row[] = $angga->nama_paket;
				$row[] = $angga->nama_metode_pemilihan;
				if ($angga->status_paket_tender == 1) {
					$row[] = '<label class="badge badge-warning"> Draft </label>';
				} elseif ($angga->status_paket_tender == 1 && $angga->status_tahap_tender  == 1) {
					if (date('Y-m-d H:i', strtotime($angga->selesai_semua_tender)) > date('Y-m-d H:i')) {
						$row[] = '<label class="badge badge-info">Tender Sedang Berjalan </label>';
					} else {
						$row[] = '<label class="badge badge-success">Tender Sudah Selesai </label>';
					}
				} elseif ($angga->status_paket_tender == 1 && $angga->status_tahap_tender  == 1) {
					if (date('Y-m-d H:i', strtotime($angga->selesai_semua_tender)) > date('Y-m-d H:i')) {
						$row[] = '<label class="badge badge-info">Tender Sedang Berjalan </label>';
					} else {
						$row[] = '<label class="badge badge-success">Tender Sudah Selesai </label>';
					}
				} elseif ($angga->status_paket_tender == 2 && $angga->status_paket_tender == 2) {
					if (date('Y-m-d H:i', strtotime($angga->selesai_semua_tender)) > date('Y-m-d H:i')) {
						$row[] = '<label class="badge badge-info">Tender Sedang Berjalan </label>';
					} else {
						$row[] = '<label class="badge badge-success">Tender Sudah Selesai </label>';
					}
				} elseif ($angga->status_paket_tender == 0) {
					$row[] = '<label class="badge badge-danger">Belum Buat Tender!! </label>';
				}
				if ($angga->status_paket_tender == 0) {
					$row[] = $angga->tanggal_buat_rup;
				} else {
					$row[] = $angga->tanggal_buat_rup;
				}
				$row[] = $angga->nama_unit_kerja;
				// 18 oktober 2022
				// update 18 oktober 2022
				if ($angga->status_tahap_tender == 2 && $angga->status_paket_tender == 2) {
					$row[] = '<a href="javascipt:;" class="btn btn-sm btn-primary" onClick="byid_paket_tender_biasa_berlangsung(' . "'" . $angga->id_paket . "','lihat_tahap_tender'" . ')"><img src="' . base_url('assets/img/icon-jadwal.png') . '" width="25px" alt=""> Detail Jadwal</a> <a target="_blank" href="' . base_url('panitiajmtm/beranda/summary_tender/' . $angga->id_paket) . '" class="btn btn-sm btn-info" >Summary Tender</a>';
				} else {
					$row[] = '<button disabled class="btn btn-primary btn-sm" disabled><img src="' . base_url('assets/img/icon-jadwal.png') . '" width="25px" alt=""> Detail Jadwal</button>';
				}
				$data[] = $row;
			}
			$output = array(
				"draw" => intval($_POST['draw']),
				"recordsTotal" => $this->Paket_model->count_all_data_paket_agency_terbatas(),
				"recordsFiltered" => $this->Paket_model->count_filtered_data_paket_agency_terbatas($role_agency, $area_agency),
				"data" => $data
			);
			$this->output->set_content_type('application/json')->set_output(json_encode($output));
		} elseif ($this->session->userdata('id_role') == 6) {
			$role_agency = $this->session->userdata('id_pegawai');
			$area_agency = $this->session->userdata('id_unit_kerja2');
			$resultsss = $this->Paket_model->getdatatable_paket_tender_agency_terbatas($role_agency, $area_agency);
			$data = [];
			$no = $_POST['start'];
			foreach ($resultsss as $angga) {
				$row = array();
				$row[] = ++$no;
				if ($angga->status_paket_tender == 0) {
					$row[] = $angga->kode_jenis_anggaran . $angga->kode_jenis_pengadaan . $angga->kode_metode_pemilihan . $angga->kode_unit_kerja . $angga->kode_produk_dl_negri;
				} else {
					$row[] = $angga->kode_tender;
				}
				$row[] = $angga->nama_paket;
				$row[] = $angga->nama_metode_pemilihan;
				if ($angga->status_paket_tender == 1) {
					$row[] = '<label class="badge badge-warning"> Draft </label>';
				} elseif ($angga->status_paket_tender == 1 && $angga->status_tahap_tender  == 1) {
					$row[] = '<label class="badge badge-info">Pengumuman Pascakualifikasi </label>';
				} elseif ($angga->status_paket_tender == 1 && $angga->status_tahap_tender  == 1) {
					$row[] = '<label class="badge badge-info">Pengumuman Prakualifikasi </label>';
				} elseif ($angga->status_paket_tender == 2 && $angga->status_paket_tender == 2) {
					$row[] = '<label class="badge badge-info">Pengumuman Pascakualifikasi </label>';
				} elseif ($angga->status_paket_tender == 0) {
					$row[] = '<label class="badge badge-danger">Belum Buat Tender!! </label>';
				}
				if ($angga->status_paket_tender == 0) {
					$row[] = $angga->tanggal_buat_rup;
				} else {
					$row[] = $angga->tanggal_buat_rup;
				}
				$row[] = $angga->nama_unit_kerja;
				$data[] = $row;
			}
			$output = array(
				"draw" => intval($_POST['draw']),
				"recordsTotal" => $this->Paket_model->count_all_data_paket_agency_terbatas(),
				"recordsFiltered" => $this->Paket_model->count_filtered_data_paket_agency_terbatas($role_agency, $area_agency),
				"data" => $data
			);
			$this->output->set_content_type('application/json')->set_output(json_encode($output));
		}
	}
	public function perubahan_jadwal($id_jadwal_transaksi_langsung_detail)
	{

		// $nama_pegawai = $this->input->post('nama_pegawai');
		$alasan_pengubahan = $this->input->post('alasan_pengubahan');
		$id_paket  = $this->input->post('id_paket');


		/*
			1. menunggu
			2. approve
			3. Ditolak
		*/
		$data = [
			'id_jadwal_transaksi_langsung_detail' => $id_jadwal_transaksi_langsung_detail,
			'user_created' => 'Agency',
			'alasan_perubahan' => $alasan_pengubahan,
			'status_perubahan' => 2
		];

		$this->Paket_model->update_perubahan_jadwal($id_jadwal_transaksi_langsung_detail, $data);
		$this->session->set_flashdata('ubah', '<div class="alert alert-success alert-dismissible"> Perubahan Jadwal Berhasil!
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
		redirect('paket/jadwal_transaksi_langsung/' . $id_paket);
	}

	public function status_approve_panitia($id_jadwal_transaksi_langsung_detail)
	{

		$nama_pegawai = $this->input->post('nama_pegawai');
		$alasan_pengubahan = $this->input->post('alasan_pengubahan');
		$id_paket  = $this->input->post('id_paket');

		/*
			1. menunggu
			2. approve
			3. Ditolak
		*/
		$data = [
			'id_jadwal_transaksi_langsung_detail' => $id_jadwal_transaksi_langsung_detail,
			'user_created' => 'Panitia',
			'alasan_perubahan' => $alasan_pengubahan,
			'status_perubahan' => 1
		];

		$this->Paket_model->update_perubahan_jadwal($id_jadwal_transaksi_langsung_detail, $data);
		$this->session->set_flashdata('ubah', '<div class="alert alert-success alert-dismissible"> Perubahan Jadwal Berhasil Dikirim!
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
		redirect('paket/jadwal_transaksi_langsung/' . $id_paket);
	}
}
