<?php

use phpDocumentor\Reflection\Types\This;

defined('BASEPATH') or exit('No direct script access allowed');
error_reporting(0);

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Home/Home_model');
		$this->load->model('Wilayah/Wilayah_model');
		$this->load->model('Rup/Rup_model');
		$this->load->model('Paket/Paket_model');
		$this->load->model('Kualifikasi/Kualifikasi_model');
		$this->load->model('Panitia/Rolepanitia_model', 'Rolepanitia_model');
	}

	public function index()
	{
		$data['berita'] = $this->Home_model->ambil_berita();
		//tender
		$data['ambil_paket'] = $this->Home_model->ambil_paket();
		$data['hitung_pengadaan_barang'] = $this->Home_model->hitung_paket();
		$data['ambil_paket2'] = $this->Home_model->ambil_paket2();
		$data['hitung_pengadaan_jasa_konsultasi'] = $this->Home_model->hitung_paket2();
		$data['ambil_paket3'] = $this->Home_model->ambil_paket3();
		$data['hitung_jasa_pemborongan'] = $this->Home_model->hitung_paket3();
		$data['ambil_paket4'] = $this->Home_model->ambil_paket4();
		$data['hitung_jasa_lain'] = $this->Home_model->hitung_paket4();

		// $this->load->view('template/header');
		// $this->load->view('template/navbar', $data);
		// $this->load->view('home/index', $data);
		// $this->load->view('home/ajax');
		// $this->load->view('template/footer_landing');
		$this->load->view('home/new_landing', $data);
	}
	public function cari_paket()
	{
		$data['berita'] = $this->Home_model->ambil_berita();
		//tender
		$data['ambil_paket'] = $this->Home_model->ambil_paket();
		$data['hitung_pengadaan_barang'] = $this->Home_model->hitung_paket();
		$data['ambil_paket2'] = $this->Home_model->ambil_paket2();
		$data['hitung_pengadaan_jasa_konsultasi'] = $this->Home_model->hitung_paket2();
		$data['ambil_paket3'] = $this->Home_model->ambil_paket3();
		$data['hitung_jasa_pemborongan'] = $this->Home_model->hitung_paket3();
		$data['ambil_paket4'] = $this->Home_model->ambil_paket4();
		$data['hitung_jasa_lain'] = $this->Home_model->hitung_paket4();
		// DATA RUP
		$data['all_paket'] = $this->Rup_model->getAllPaket();
		$data['getdivisi'] = $this->Rup_model->get_devisi();
		$data['metode_pemilihan'] = $this->Rup_model->get_metode_pemilihan();
		$data['get_jenis_pengadaan'] = $this->Rup_model->get_jenis_pengadaan();
		//$this->load->view('template/header');
		//$this->load->view('template/navbar_cari_paket', $data);
		$this->load->view('home/cari_paket', $data);
		//$this->load->view('home/ajax');
		//$this->load->view('template/footer_landing');
	}

	public function datatable()
	{
		$resultss = $this->Home_model->getdatatable();
		$data = [];
		$no = $_POST['start'];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] = $angga->kode_tender;
			$row[] = '<a class="text-primary" href="javascript:;" onClick="byid(' . "'" . $angga->id_paket . "','detail'" . ')">' . $angga->nama_paket . '</a>';
			$row[] = $angga->nama_jenis_pengadaan;
			$row[] = $angga->nama_metode_pemilihan;
			$row[] = $angga->nama_jenis_anggaran;

			$row[] = '<a style="width:100px;font-size:10px" class="btn btn-grad9 text-white btn-sm" href="javascript:;" onClick="byid(' . "'" . $angga->id_paket . "','lihat_tahap'" . ')"><i class="far fa-calendar-alt"></i> Tahap</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => intval($_POST['draw']),
			"recordsTotal" => $this->Home_model->count_all_data(),
			"recordsFiltered" => $this->Home_model->count_filtered_data(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}
	public function byid($id_paket)
	{
		$ambil_kualifikasi = $this->Rolepanitia_model->getById($id_paket);
		$id_kualifikasi = $ambil_kualifikasi['id_kualifikasi'];
		$total_hpskuajah = $this->Paket_model->totalhps($id_paket);
		$jadwal = $this->Rolepanitia_model->get_all_detail_jadwal_row($id_kualifikasi, $id_paket);
		$total_rincian_hps_pdf = $this->Paket_model->get_by_rincian_hps_pdf_result($id_paket);
		$total_hps_pdf_ada = $this->Paket_model->get_by_rincian_hps_pdf_sudah_dibuat($id_paket);
		$vendor_terpilih = $this->Paket_model->vendor_terpilih($id_paket);
		$total_rincian_hps = $this->Paket_model->totalRincianHps($id_paket);
		$status_rincian_hps = $this->Paket_model->status_rincian_hps($id_paket);
		$total_hps = $this->Paket_model->totalhps($id_paket);
		$lokasi_kerja = $this->Paket_model->getLokasiPekerjaan($id_paket);
		$getsumberdana = $this->Rup_model->getSumberDana($id_paket);
		$get_paket = $this->Rup_model->getByid($id_paket);
		$iini_hps_ku = $total_hps['hps'];
		$total = 0;
		foreach ($total_rincian_hps as $key => $value) {
			$total +=  $value['vol_rincian_hps'] * $value['harga_rincian_hps'] + ($value['persen_rincian_hps'] / 100) * $value['vol_rincian_hps'] * $value['harga_rincian_hps'];
		}

		$output = [
			"get_paket" => $get_paket,
			"get_sumberdana" => $getsumberdana,
			"jadwal_saya" => $jadwal,
			"total_hps_pdf_ada" => $total_hps_pdf_ada,
			"vendor_terpilih" => $vendor_terpilih,
			"total_rincian_hps" => $total_rincian_hps,
			"status_rincian_hps" => $status_rincian_hps,
			"total_hps" => $iini_hps_ku,
			"lokasi_kerja" => $lokasi_kerja,
			"total_rincian_hps_pdf" => $total_rincian_hps_pdf,
			"total" => $total
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function ambil_persyaratan($id_paket)
	{ {
			$get_persyaratan = $this->Home_model->get_persyaratan($id_paket);
			$output = [
				"get_persyaratan" => $get_persyaratan,
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($output));
		}
	}
}
