<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
error_reporting(0);


class Laporan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Laporan/Laporan_model');
		$this->load->model('Beranda/Beranda_model');
		$this->load->model('Paket/Paket_model');
	}

	public function index()
	{
		$data['laporan'] = $this->Laporan_model->get_all();
		$data['get_jenis_pengadaan'] = $this->Paket_model->get_jenis_pengadaan();
		$data['getdivisi'] = $this->Paket_model->get_devisi();
		$data['total_nilai_hps_paket'] = $this->Paket_model->total_nilai_hps_paket2();
		$data['total_nilai_negosiasi_paket'] = $this->Paket_model->total_nilai_negosiasi_paket2();
		$this->load->view('template/header');
		$this->load->view('template/navlogin');
		$this->load->view('laporan/index', $data);
		$this->load->view('template/footer');
		$this->load->view('laporan/ajax');
	}

	public function grafik_dan_rekap()
	{
		//jenis pengadaan hcga
		$data['total_barang_hcga'] = $this->Beranda_model->total_barang_hcga();
		$data['total_jasa_pemborongan_hcga'] = $this->Beranda_model->total_jasa_pemborongan_hcga();
		$data['total_jasa_konsultansi_hcga'] = $this->Beranda_model->total_jasa_konsultansi_hcga();
		$data['total_jasa_lain_hcga'] = $this->Beranda_model->total_jasa_lain_hcga();
		$data['total_seluruh_jasa_barang_hcga'] = $data['total_barang_hcga'] + $data['total_jasa_pemborongan_hcga'] + $data['total_jasa_konsultansi_hcga'] + $data['total_jasa_lain_hcga'];
		// metode pemilihan hcga
		$data['total_penunjukkan_langsung_hcga'] = $this->Laporan_model->total_penunjukkan_langsung_hcga();
		$data['total_transaksi_langsung_hcga'] = $this->Laporan_model->total_transaksi_langsung_hcga();
		$data['total_penetapan_langsung_hcga'] = $this->Laporan_model->total_penetapan_langsung_hcga();
		$data['total_tender_hcga'] = $this->Laporan_model->total_tender_hcga();
		$data['total_kesuluruhan_hcga'] = $data['total_penunjukkan_langsung_hcga'] + $data['total_transaksi_langsung_hcga'] + $data['total_penetapan_langsung_hcga'] + $data['total_tender_hcga'];
		//total duit dan persentasi hcga
		$data['total_kontrak_penunjukkan_langsung_hcga'] = $this->Laporan_model->total_kontrak_penunjukkan_langsung_hcga();
		$data['total_kontrak_transaksi_langsung_hcga'] = $this->Laporan_model->total_kontrak_transaksi_langsung_hcga();
		$data['total_kontrak_penetapan_langsung_hcga'] = $this->Laporan_model->total_kontrak_penetapan_langsung_hcga();
		$data['total_kontrak_tender_hcga'] = $this->Laporan_model->total_kontrak_tender_hcga();
		$data['total_kontrak_hcga'] = $this->Laporan_model->total_kontrak_hcga();
		$data['total_efisiensi_penunjukkan_langsung_hcga'] = $this->Laporan_model->total_efisiensi_penunjukkan_langsung_hcga();
		$data['total_efisiensi_transaksi_langsung_hcga'] = $this->Laporan_model->total_efisiensi_transaksi_langsung_hcga();
		$data['total_efisiensi_penetapan_langsung_hcga'] = $this->Laporan_model->total_efisiensi_penetapan_langsung_hcga();
		$data['total_efisiensi_tender_hcga'] = $this->Laporan_model->total_efisiensi_tender_hcga();
		$data['total_efesiensi_hcga'] = $this->Laporan_model->total_efesiensi_hcga();

		// jenis Pengadaan pcr
		$data['total_barang_pcr'] = $this->Beranda_model->total_barang_pcr();
		$data['total_jasa_pemborongan_pcr'] = $this->Beranda_model->total_jasa_pemborongan_pcr();
		$data['total_jasa_konsultansi_pcr'] = $this->Beranda_model->total_jasa_konsultansi_pcr();
		$data['total_jasa_lain_pcr'] = $this->Beranda_model->total_jasa_lain_pcr();
		$data['total_seluruh_jasa_barang_pcr'] = $data['total_barang_pcr'] + $data['total_jasa_pemborongan_pcr'] + $data['total_jasa_konsultansi_pcr'] + $data['total_jasa_lain_pcr'];
		// metode pemilihan pcr
		$data['total_penunjukkan_langsung_pcr'] = $this->Laporan_model->total_penunjukkan_langsung_pcr();
		$data['total_transaksi_langsung_pcr'] = $this->Laporan_model->total_transaksi_langsung_pcr();
		$data['total_penetapan_langsung_pcr'] = $this->Laporan_model->total_penetapan_langsung_pcr();
		$data['total_tender_pcr'] = $this->Laporan_model->total_tender_pcr();
		$data['total_kesuluruhan_pcr'] = $data['total_penunjukkan_langsung_pcr'] + $data['total_transaksi_langsung_pcr'] + $data['total_penetapan_langsung_pcr'] + $data['total_tender_pcr'];
		//total duit dan persentasi pcr
		$data['total_kontrak_penunjukkan_langsung_pcr'] = $this->Laporan_model->total_kontrak_penunjukkan_langsung_pcr();
		$data['total_kontrak_transaksi_langsung_pcr'] = $this->Laporan_model->total_kontrak_transaksi_langsung_pcr();
		$data['total_kontrak_penetapan_langsung_pcr'] = $this->Laporan_model->total_kontrak_penetapan_langsung_pcr();
		$data['total_kontrak_tender_pcr'] = $this->Laporan_model->total_kontrak_tender_pcr();
		$data['total_kontrak_pcr'] = $this->Laporan_model->total_kontrak_pcr();
		$data['total_efisiensi_penunjukkan_langsung_pcr'] = $this->Laporan_model->total_efisiensi_penunjukkan_langsung_pcr();
		$data['total_efisiensi_transaksi_langsung_pcr'] = $this->Laporan_model->total_efisiensi_transaksi_langsung_pcr();
		$data['total_efisiensi_penetapan_langsung_pcr'] = $this->Laporan_model->total_efisiensi_penetapan_langsung_pcr();
		$data['total_efisiensi_tender_pcr'] = $this->Laporan_model->total_efisiensi_tender_pcr();
		$data['total_efesiensi_pcr'] = $this->Laporan_model->total_efesiensi_pcr();

		// jenis Pengadaan fta
		$data['total_barang_fta'] = $this->Beranda_model->total_barang_fta();
		$data['total_jasa_pemborongan_fta'] = $this->Beranda_model->total_jasa_pemborongan_fta();
		$data['total_jasa_konsultansi_fta'] = $this->Beranda_model->total_jasa_konsultansi_fta();
		$data['total_jasa_lain_fta'] = $this->Beranda_model->total_jasa_lain_fta();
		$data['total_seluruh_jasa_barang_fta'] = $data['total_barang_fta'] + $data['total_jasa_pemborongan_fta'] + $data['total_jasa_konsultansi_fta'] + $data['total_jasa_lain_fta'];
		// metode pemilihan fta
		$data['total_penunjukkan_langsung_fta'] = $this->Laporan_model->total_penunjukkan_langsung_fta();
		$data['total_transaksi_langsung_fta'] = $this->Laporan_model->total_transaksi_langsung_fta();
		$data['total_penetapan_langsung_fta'] = $this->Laporan_model->total_penetapan_langsung_fta();
		$data['total_tender_fta'] = $this->Laporan_model->total_tender_fta();
		$data['total_kesuluruhan_fta'] = $data['total_penunjukkan_langsung_fta'] + $data['total_transaksi_langsung_fta'] + $data['total_penetapan_langsung_fta'] + $data['total_tender_fta'];
		//total duit dan persentasi fta
		$data['total_kontrak_penunjukkan_langsung_fta'] = $this->Laporan_model->total_kontrak_penunjukkan_langsung_fta();
		$data['total_kontrak_transaksi_langsung_fta'] = $this->Laporan_model->total_kontrak_transaksi_langsung_fta();
		$data['total_kontrak_penetapan_langsung_fta'] = $this->Laporan_model->total_kontrak_penetapan_langsung_fta();
		$data['total_kontrak_tender_fta'] = $this->Laporan_model->total_kontrak_tender_fta();
		$data['total_kontrak_fta'] = $this->Laporan_model->total_kontrak_fta();
		$data['total_efisiensi_penunjukkan_langsung_fta'] = $this->Laporan_model->total_efisiensi_penunjukkan_langsung_fta();
		$data['total_efisiensi_transaksi_langsung_fta'] = $this->Laporan_model->total_efisiensi_transaksi_langsung_fta();
		$data['total_efisiensi_penetapan_langsung_fta'] = $this->Laporan_model->total_efisiensi_penetapan_langsung_fta();
		$data['total_efisiensi_tender_fta'] = $this->Laporan_model->total_efisiensi_tender_fta();
		$data['total_efesiensi_fta'] = $this->Laporan_model->total_efesiensi_fta();

		// jenis Pengadaan rms
		$data['total_barang_rmms'] = $this->Beranda_model->total_barang_rmms();
		$data['total_jasa_pemborongan_rmms'] = $this->Beranda_model->total_jasa_pemborongan_rmms();
		$data['total_jasa_konsultansi_rmms'] = $this->Beranda_model->total_jasa_konsultansi_rmms();
		$data['total_jasa_lain_rmms'] = $this->Beranda_model->total_jasa_lain_rmms();
		$data['total_seluruh_jasa_barang_rmms'] = $data['total_barang_rmms'] + $data['total_jasa_pemborongan_rmms'] + $data['total_jasa_konsultansi_rmms'] + $data['total_jasa_lain_rmms'];
		// metode pemilihan rms
		$data['total_penunjukkan_langsung_rmms'] = $this->Laporan_model->total_penunjukkan_langsung_rmms();
		$data['total_transaksi_langsung_rmms'] = $this->Laporan_model->total_transaksi_langsung_rmms();
		$data['total_penetapan_langsung_rmms'] = $this->Laporan_model->total_penetapan_langsung_rmms();
		$data['total_tender_rmms'] = $this->Laporan_model->total_tender_rmms();
		$data['total_kesuluruhan_rmms'] = $data['total_penunjukkan_langsung_rmms'] + $data['total_transaksi_langsung_rmms'] + $data['total_penetapan_langsung_rmms'] + $data['total_tender_rmms'];
		//total duit dan persentasi rmms
		$data['total_kontrak_penunjukkan_langsung_rmms'] = $this->Laporan_model->total_kontrak_penunjukkan_langsung_rmms();
		$data['total_kontrak_transaksi_langsung_rmms'] = $this->Laporan_model->total_kontrak_transaksi_langsung_rmms();
		$data['total_kontrak_penetapan_langsung_rmms'] = $this->Laporan_model->total_kontrak_penetapan_langsung_rmms();
		$data['total_kontrak_tender_rmms'] = $this->Laporan_model->total_kontrak_tender_rmms();
		$data['total_kontrak_rmms'] = $this->Laporan_model->total_kontrak_rmms();
		$data['total_efisiensi_penunjukkan_langsung_rmms'] = $this->Laporan_model->total_efisiensi_penunjukkan_langsung_rmms();
		$data['total_efisiensi_transaksi_langsung_rmms'] = $this->Laporan_model->total_efisiensi_transaksi_langsung_rmms();
		$data['total_efisiensi_penetapan_langsung_rmms'] = $this->Laporan_model->total_efisiensi_penetapan_langsung_rmms();
		$data['total_efisiensi_tender_rmms'] = $this->Laporan_model->total_efisiensi_tender_rmms();
		$data['total_efesiensi_rmms'] = $this->Laporan_model->total_efesiensi_rmms();

		// jenis Pengadaan amp
		$data['total_barang_amp'] = $this->Beranda_model->total_barang_amp();
		$data['total_jasa_pemborongan_amp'] = $this->Beranda_model->total_jasa_pemborongan_amp();
		$data['total_jasa_konsultansi_amp'] = $this->Beranda_model->total_jasa_konsultansi_amp();
		$data['total_jasa_lain_amp'] = $this->Beranda_model->total_jasa_lain_amp();
		$data['total_seluruh_jasa_barang_amp'] = $data['total_barang_amp'] + $data['total_jasa_pemborongan_amp'] + $data['total_jasa_konsultansi_amp'] + $data['total_jasa_lain_amp'];
		// metode pemilihan amp
		$data['total_penunjukkan_langsung_amp'] = $this->Laporan_model->total_penunjukkan_langsung_amp();
		$data['total_transaksi_langsung_amp'] = $this->Laporan_model->total_transaksi_langsung_amp();
		$data['total_penetapan_langsung_amp'] = $this->Laporan_model->total_penetapan_langsung_amp();
		$data['total_tender_amp'] = $this->Laporan_model->total_tender_amp();
		$data['total_kesuluruhan_amp'] = $data['total_penunjukkan_langsung_amp'] + $data['total_transaksi_langsung_amp'] + $data['total_penetapan_langsung_amp'] + $data['total_tender_amp'];
		//total duit dan persentasi amp
		$data['total_kontrak_penunjukkan_langsung_amp'] = $this->Laporan_model->total_kontrak_penunjukkan_langsung_amp();
		$data['total_kontrak_transaksi_langsung_amp'] = $this->Laporan_model->total_kontrak_transaksi_langsung_amp();
		$data['total_kontrak_penetapan_langsung_amp'] = $this->Laporan_model->total_kontrak_penetapan_langsung_amp();
		$data['total_kontrak_tender_amp'] = $this->Laporan_model->total_kontrak_tender_amp();
		$data['total_kontrak_amp'] = $this->Laporan_model->total_kontrak_amp();
		$data['total_efisiensi_penunjukkan_langsung_amp'] = $this->Laporan_model->total_efisiensi_penunjukkan_langsung_amp();
		$data['total_efisiensi_transaksi_langsung_amp'] = $this->Laporan_model->total_efisiensi_transaksi_langsung_amp();
		$data['total_efisiensi_penetapan_langsung_amp'] = $this->Laporan_model->total_efisiensi_penetapan_langsung_amp();
		$data['total_efisiensi_tender_amp'] = $this->Laporan_model->total_efisiensi_tender_amp();
		$data['total_efesiensi_amp'] = $this->Laporan_model->total_efesiensi_amp();

		// jenis Pengadaan pche
		$data['total_barang_pche'] = $this->Beranda_model->total_barang_pche();
		$data['total_jasa_pemborongan_pche'] = $this->Beranda_model->total_jasa_pemborongan_pche();
		$data['total_jasa_konsultansi_pche'] = $this->Beranda_model->total_jasa_konsultansi_pche();
		$data['total_jasa_lain_pche'] = $this->Beranda_model->total_jasa_lain_pche();
		$data['total_seluruh_jasa_barang_pche'] = $data['total_barang_pche'] + $data['total_jasa_pemborongan_pche'] + $data['total_jasa_konsultansi_pche'] + $data['total_jasa_lain_pche'];
		// metode pemilihan pche
		$data['total_penunjukkan_langsung_pche'] = $this->Laporan_model->total_penunjukkan_langsung_pche();
		$data['total_transaksi_langsung_pche'] = $this->Laporan_model->total_transaksi_langsung_pche();
		$data['total_penetapan_langsung_pche'] = $this->Laporan_model->total_penetapan_langsung_pche();
		$data['total_tender_pche'] = $this->Laporan_model->total_tender_pche();
		$data['total_kesuluruhan_pche'] = $data['total_penunjukkan_langsung_pche'] + $data['total_transaksi_langsung_pche'] + $data['total_penetapan_langsung_pche'] + $data['total_tender_pche'];
		//total duit dan persentasi pche
		$data['total_kontrak_penunjukkan_langsung_pche'] = $this->Laporan_model->total_kontrak_penunjukkan_langsung_pche();
		$data['total_kontrak_transaksi_langsung_pche'] = $this->Laporan_model->total_kontrak_transaksi_langsung_pche();
		$data['total_kontrak_penetapan_langsung_pche'] = $this->Laporan_model->total_kontrak_penetapan_langsung_pche();
		$data['total_kontrak_tender_pche'] = $this->Laporan_model->total_kontrak_tender_pche();
		$data['total_kontrak_pche'] = $this->Laporan_model->total_kontrak_pche();
		$data['total_efisiensi_penunjukkan_langsung_pche'] = $this->Laporan_model->total_efisiensi_penunjukkan_langsung_pche();
		$data['total_efisiensi_transaksi_langsung_pche'] = $this->Laporan_model->total_efisiensi_transaksi_langsung_pche();
		$data['total_efisiensi_penetapan_langsung_pche'] = $this->Laporan_model->total_efisiensi_penetapan_langsung_pche();
		$data['total_efisiensi_tender_pche'] = $this->Laporan_model->total_efisiensi_tender_pche();
		$data['total_efesiensi_pche'] = $this->Laporan_model->total_efesiensi_pche();

		// jenis Pengadaan amtd
		$data['total_barang_amtd'] = $this->Beranda_model->total_barang_amtd();
		$data['total_jasa_pemborongan_amtd'] = $this->Beranda_model->total_jasa_pemborongan_amtd();
		$data['total_jasa_konsultansi_amtd'] = $this->Beranda_model->total_jasa_konsultansi_amtd();
		$data['total_jasa_lain_amtd'] = $this->Beranda_model->total_jasa_lain_amtd();
		$data['total_seluruh_jasa_barang_amtd'] = $data['total_barang_amtd'] + $data['total_jasa_pemborongan_amtd'] + $data['total_jasa_konsultansi_amtd'] + $data['total_jasa_lain_amtd'];
		// metode pemilihan amtd
		$data['total_penunjukkan_langsung_amtd'] = $this->Laporan_model->total_penunjukkan_langsung_amtd();
		$data['total_transaksi_langsung_amtd'] = $this->Laporan_model->total_transaksi_langsung_amtd();
		$data['total_penetapan_langsung_amtd'] = $this->Laporan_model->total_penetapan_langsung_amtd();
		$data['total_tender_amtd'] = $this->Laporan_model->total_tender_amtd();
		$data['total_kesuluruhan_amtd'] = $data['total_penunjukkan_langsung_amtd'] + $data['total_transaksi_langsung_amtd'] + $data['total_penetapan_langsung_amtd'] + $data['total_tender_amtd'];
		//total duit dan persentasi amtd
		$data['total_kontrak_penunjukkan_langsung_amtd'] = $this->Laporan_model->total_kontrak_penunjukkan_langsung_amtd();
		$data['total_kontrak_transaksi_langsung_amtd'] = $this->Laporan_model->total_kontrak_transaksi_langsung_amtd();
		$data['total_kontrak_penetapan_langsung_amtd'] = $this->Laporan_model->total_kontrak_penetapan_langsung_amtd();
		$data['total_kontrak_tender_amtd'] = $this->Laporan_model->total_kontrak_tender_amtd();
		$data['total_kontrak_amtd'] = $this->Laporan_model->total_kontrak_amtd();
		$data['total_efisiensi_penunjukkan_langsung_amtd'] = $this->Laporan_model->total_efisiensi_penunjukkan_langsung_amtd();
		$data['total_efisiensi_transaksi_langsung_amtd'] = $this->Laporan_model->total_efisiensi_transaksi_langsung_amtd();
		$data['total_efisiensi_penetapan_langsung_amtd'] = $this->Laporan_model->total_efisiensi_penetapan_langsung_amtd();
		$data['total_efisiensi_tender_amtd'] = $this->Laporan_model->total_efisiensi_tender_amtd();
		$data['total_efesiensi_amtd'] = $this->Laporan_model->total_efesiensi_amtd();

		// jenis Pengadaan op1
		$data['total_barang_op1'] = $this->Beranda_model->total_barang_op1();
		$data['total_jasa_pemborongan_op1'] = $this->Beranda_model->total_jasa_pemborongan_op1();
		$data['total_jasa_konsultansi_op1'] = $this->Beranda_model->total_jasa_konsultansi_op1();
		$data['total_jasa_lain_op1'] = $this->Beranda_model->total_jasa_lain_op1();
		$data['total_seluruh_jasa_barang_op1'] = $data['total_barang_op1'] + $data['total_jasa_pemborongan_op1'] + $data['total_jasa_konsultansi_op1'] + $data['total_jasa_lain_op1'];
		// metode pemilihan op1
		$data['total_penunjukkan_langsung_op1'] = $this->Laporan_model->total_penunjukkan_langsung_op1();
		$data['total_transaksi_langsung_op1'] = $this->Laporan_model->total_transaksi_langsung_op1();
		$data['total_penetapan_langsung_op1'] = $this->Laporan_model->total_penetapan_langsung_op1();
		$data['total_tender_op1'] = $this->Laporan_model->total_tender_op1();
		$data['total_kesuluruhan_op1'] = $data['total_penunjukkan_langsung_op1'] + $data['total_transaksi_langsung_op1'] + $data['total_penetapan_langsung_op1'] + $data['total_tender_op1'];
		//total duit dan persentasi op1
		$data['total_kontrak_penunjukkan_langsung_op1'] = $this->Laporan_model->total_kontrak_penunjukkan_langsung_op1();
		$data['total_kontrak_transaksi_langsung_op1'] = $this->Laporan_model->total_kontrak_transaksi_langsung_op1();
		$data['total_kontrak_penetapan_langsung_op1'] = $this->Laporan_model->total_kontrak_penetapan_langsung_op1();
		$data['total_kontrak_tender_op1'] = $this->Laporan_model->total_kontrak_tender_op1();
		$data['total_kontrak_op1'] = $this->Laporan_model->total_kontrak_op1();
		$data['total_efisiensi_penunjukkan_langsung_op1'] = $this->Laporan_model->total_efisiensi_penunjukkan_langsung_op1();
		$data['total_efisiensi_transaksi_langsung_op1'] = $this->Laporan_model->total_efisiensi_transaksi_langsung_op1();
		$data['total_efisiensi_penetapan_langsung_op1'] = $this->Laporan_model->total_efisiensi_penetapan_langsung_op1();
		$data['total_efisiensi_tender_op1'] = $this->Laporan_model->total_efisiensi_tender_op1();
		$data['total_efesiensi_op1'] = $this->Laporan_model->total_efesiensi_op1();

		// jenis Pengadaan op2
		$data['total_barang_op2'] = $this->Beranda_model->total_barang_op2();
		$data['total_jasa_pemborongan_op2'] = $this->Beranda_model->total_jasa_pemborongan_op2();
		$data['total_jasa_konsultansi_op2'] = $this->Beranda_model->total_jasa_konsultansi_op2();
		$data['total_jasa_lain_op2'] = $this->Beranda_model->total_jasa_lain_op2();
		$data['total_seluruh_jasa_barang_op2'] = $data['total_barang_op2'] + $data['total_jasa_pemborongan_op2'] + $data['total_jasa_konsultansi_op2'] + $data['total_jasa_lain_op2'];
		// metode pemilihan op2
		$data['total_penunjukkan_langsung_op2'] = $this->Laporan_model->total_penunjukkan_langsung_op2();
		$data['total_transaksi_langsung_op2'] = $this->Laporan_model->total_transaksi_langsung_op2();
		$data['total_penetapan_langsung_op2'] = $this->Laporan_model->total_penetapan_langsung_op2();
		$data['total_tender_op2'] = $this->Laporan_model->total_tender_op2();
		$data['total_kesuluruhan_op2'] = $data['total_penunjukkan_langsung_op2'] + $data['total_transaksi_langsung_op2'] + $data['total_penetapan_langsung_op2'] + $data['total_tender_op2'];
		//total duit dan persentasi op2
		$data['total_kontrak_penunjukkan_langsung_op2'] = $this->Laporan_model->total_kontrak_penunjukkan_langsung_op2();
		$data['total_kontrak_transaksi_langsung_op2'] = $this->Laporan_model->total_kontrak_transaksi_langsung_op2();
		$data['total_kontrak_penetapan_langsung_op2'] = $this->Laporan_model->total_kontrak_penetapan_langsung_op2();
		$data['total_kontrak_tender_op2'] = $this->Laporan_model->total_kontrak_tender_op2();
		$data['total_kontrak_op2'] = $this->Laporan_model->total_kontrak_op2();
		$data['total_efisiensi_penunjukkan_langsung_op2'] = $this->Laporan_model->total_efisiensi_penunjukkan_langsung_op2();
		$data['total_efisiensi_transaksi_langsung_op2'] = $this->Laporan_model->total_efisiensi_transaksi_langsung_op2();
		$data['total_efisiensi_penetapan_langsung_op2'] = $this->Laporan_model->total_efisiensi_penetapan_langsung_op2();
		$data['total_efisiensi_tender_op2'] = $this->Laporan_model->total_efisiensi_tender_op2();
		$data['total_efesiensi_op2'] = $this->Laporan_model->total_efesiensi_op2();

		// jenis Pengadaan op3
		$data['total_barang_op3'] = $this->Beranda_model->total_barang_op3();
		$data['total_jasa_pemborongan_op3'] = $this->Beranda_model->total_jasa_pemborongan_op3();
		$data['total_jasa_konsultansi_op3'] = $this->Beranda_model->total_jasa_konsultansi_op3();
		$data['total_jasa_lain_op3'] = $this->Beranda_model->total_jasa_lain_op3();
		$data['total_seluruh_jasa_barang_op3'] = $data['total_barang_op3'] + $data['total_jasa_pemborongan_op3'] + $data['total_jasa_konsultansi_op3'] + $data['total_jasa_lain_op3'];
		// metode pemilihan op3
		$data['total_penunjukkan_langsung_op3'] = $this->Laporan_model->total_penunjukkan_langsung_op3();
		$data['total_transaksi_langsung_op3'] = $this->Laporan_model->total_transaksi_langsung_op3();
		$data['total_penetapan_langsung_op3'] = $this->Laporan_model->total_penetapan_langsung_op3();
		$data['total_tender_op3'] = $this->Laporan_model->total_tender_op3();
		$data['total_kesuluruhan_op3'] = $data['total_penunjukkan_langsung_op3'] + $data['total_transaksi_langsung_op3'] + $data['total_penetapan_langsung_op3'] + $data['total_tender_op3'];
		//total duit dan persentasi op3
		$data['total_kontrak_penunjukkan_langsung_op3'] = $this->Laporan_model->total_kontrak_penunjukkan_langsung_op3();
		$data['total_kontrak_transaksi_langsung_op3'] = $this->Laporan_model->total_kontrak_transaksi_langsung_op3();
		$data['total_kontrak_penetapan_langsung_op3'] = $this->Laporan_model->total_kontrak_penetapan_langsung_op3();
		$data['total_kontrak_tender_op3'] = $this->Laporan_model->total_kontrak_tender_op3();
		$data['total_kontrak_op3'] = $this->Laporan_model->total_kontrak_op3();
		$data['total_efisiensi_penunjukkan_langsung_op3'] = $this->Laporan_model->total_efisiensi_penunjukkan_langsung_op3();
		$data['total_efisiensi_transaksi_langsung_op3'] = $this->Laporan_model->total_efisiensi_transaksi_langsung_op3();
		$data['total_efisiensi_penetapan_langsung_op3'] = $this->Laporan_model->total_efisiensi_penetapan_langsung_op3();
		$data['total_efisiensi_tender_op3'] = $this->Laporan_model->total_efisiensi_tender_op3();
		$data['total_efesiensi_op3'] = $this->Laporan_model->total_efesiensi_op3();

		// jenis Pengadaan msa1
		$data['total_barang_msa1'] = $this->Beranda_model->total_barang_msa1();
		$data['total_jasa_pemborongan_msa1'] = $this->Beranda_model->total_jasa_pemborongan_msa1();
		$data['total_jasa_konsultansi_msa1'] = $this->Beranda_model->total_jasa_konsultansi_msa1();
		$data['total_jasa_lain_msa1'] = $this->Beranda_model->total_jasa_lain_msa1();
		$data['total_seluruh_jasa_barang_msa1'] = $data['total_barang_msa1'] + $data['total_jasa_pemborongan_msa1'] + $data['total_jasa_konsultansi_msa1'] + $data['total_jasa_lain_msa1'];
		// metode pemilihan msa1
		$data['total_penunjukkan_langsung_msa1'] = $this->Laporan_model->total_penunjukkan_langsung_msa1();
		$data['total_transaksi_langsung_msa1'] = $this->Laporan_model->total_transaksi_langsung_msa1();
		$data['total_penetapan_langsung_msa1'] = $this->Laporan_model->total_penetapan_langsung_msa1();
		$data['total_tender_msa1'] = $this->Laporan_model->total_tender_msa1();
		$data['total_kesuluruhan_msa1'] = $data['total_penunjukkan_langsung_msa1'] + $data['total_transaksi_langsung_msa1'] + $data['total_penetapan_langsung_msa1'] + $data['total_tender_msa1'];
		//total duit dan persentasi msa1
		$data['total_kontrak_penunjukkan_langsung_msa1'] = $this->Laporan_model->total_kontrak_penunjukkan_langsung_msa1();
		$data['total_kontrak_transaksi_langsung_msa1'] = $this->Laporan_model->total_kontrak_transaksi_langsung_msa1();
		$data['total_kontrak_penetapan_langsung_msa1'] = $this->Laporan_model->total_kontrak_penetapan_langsung_msa1();
		$data['total_kontrak_tender_msa1'] = $this->Laporan_model->total_kontrak_tender_msa1();
		$data['total_kontrak_msa1'] = $this->Laporan_model->total_kontrak_msa1();
		$data['total_efisiensi_penunjukkan_langsung_msa1'] = $this->Laporan_model->total_efisiensi_penunjukkan_langsung_msa1();
		$data['total_efisiensi_transaksi_langsung_msa1'] = $this->Laporan_model->total_efisiensi_transaksi_langsung_msa1();
		$data['total_efisiensi_penetapan_langsung_msa1'] = $this->Laporan_model->total_efisiensi_penetapan_langsung_msa1();
		$data['total_efisiensi_tender_msa1'] = $this->Laporan_model->total_efisiensi_tender_msa1();
		$data['total_efesiensi_msa1'] = $this->Laporan_model->total_efesiensi_msa1();


		// jenis Pengadaan msa2
		$data['total_barang_msa2'] = $this->Beranda_model->total_barang_msa2();
		$data['total_jasa_pemborongan_msa2'] = $this->Beranda_model->total_jasa_pemborongan_msa2();
		$data['total_jasa_konsultansi_msa2'] = $this->Beranda_model->total_jasa_konsultansi_msa2();
		$data['total_jasa_lain_msa2'] = $this->Beranda_model->total_jasa_lain_msa2();
		$data['total_seluruh_jasa_barang_msa2'] = $data['total_barang_msa2'] + $data['total_jasa_pemborongan_msa2'] + $data['total_jasa_konsultansi_msa2'] + $data['total_jasa_lain_msa2'];
		// metode pemilihan msa2
		$data['total_penunjukkan_langsung_msa2'] = $this->Laporan_model->total_penunjukkan_langsung_msa2();
		$data['total_transaksi_langsung_msa2'] = $this->Laporan_model->total_transaksi_langsung_msa2();
		$data['total_penetapan_langsung_msa2'] = $this->Laporan_model->total_penetapan_langsung_msa2();
		$data['total_tender_msa2'] = $this->Laporan_model->total_tender_msa2();
		$data['total_kesuluruhan_msa2'] = $data['total_penunjukkan_langsung_msa2'] + $data['total_transaksi_langsung_msa2'] + $data['total_penetapan_langsung_msa2'] + $data['total_tender_msa2'];
		//total duit dan persentasi msa2
		$data['total_kontrak_penunjukkan_langsung_msa2'] = $this->Laporan_model->total_kontrak_penunjukkan_langsung_msa2();
		$data['total_kontrak_transaksi_langsung_msa2'] = $this->Laporan_model->total_kontrak_transaksi_langsung_msa2();
		$data['total_kontrak_penetapan_langsung_msa2'] = $this->Laporan_model->total_kontrak_penetapan_langsung_msa2();
		$data['total_kontrak_tender_msa2'] = $this->Laporan_model->total_kontrak_tender_msa2();
		$data['total_kontrak_msa2'] = $this->Laporan_model->total_kontrak_msa2();
		$data['total_efisiensi_penunjukkan_langsung_msa2'] = $this->Laporan_model->total_efisiensi_penunjukkan_langsung_msa2();
		$data['total_efisiensi_transaksi_langsung_msa2'] = $this->Laporan_model->total_efisiensi_transaksi_langsung_msa2();
		$data['total_efisiensi_penetapan_langsung_msa2'] = $this->Laporan_model->total_efisiensi_penetapan_langsung_msa2();
		$data['total_efisiensi_tender_msa2'] = $this->Laporan_model->total_efisiensi_tender_msa2();
		$data['total_efesiensi_msa2'] = $this->Laporan_model->total_efesiensi_msa2();


		// jenis Pengadaan msa3
		$data['total_barang_msa3'] = $this->Beranda_model->total_barang_msa3();
		$data['total_jasa_pemborongan_msa3'] = $this->Beranda_model->total_jasa_pemborongan_msa3();
		$data['total_jasa_konsultansi_msa3'] = $this->Beranda_model->total_jasa_konsultansi_msa3();
		$data['total_jasa_lain_msa3'] = $this->Beranda_model->total_jasa_lain_msa3();
		$data['total_seluruh_jasa_barang_msa3'] = $data['total_barang_msa3'] + $data['total_jasa_pemborongan_msa3'] + $data['total_jasa_konsultansi_msa3'] + $data['total_jasa_lain_msa3'];
		// metode pemilihan msa3
		$data['total_penunjukkan_langsung_msa3'] = $this->Laporan_model->total_penunjukkan_langsung_msa3();
		$data['total_transaksi_langsung_msa3'] = $this->Laporan_model->total_transaksi_langsung_msa3();
		$data['total_penetapan_langsung_msa3'] = $this->Laporan_model->total_penetapan_langsung_msa3();
		$data['total_tender_msa3'] = $this->Laporan_model->total_tender_msa3();
		$data['total_kesuluruhan_msa3'] = $data['total_penunjukkan_langsung_msa3'] + $data['total_transaksi_langsung_msa3'] + $data['total_penetapan_langsung_msa3'] + $data['total_tender_msa3'];
		//total duit dan persentasi msa3
		$data['total_kontrak_penunjukkan_langsung_msa3'] = $this->Laporan_model->total_kontrak_penunjukkan_langsung_msa3();
		$data['total_kontrak_transaksi_langsung_msa3'] = $this->Laporan_model->total_kontrak_transaksi_langsung_msa3();
		$data['total_kontrak_penetapan_langsung_msa3'] = $this->Laporan_model->total_kontrak_penetapan_langsung_msa3();
		$data['total_kontrak_tender_msa3'] = $this->Laporan_model->total_kontrak_tender_msa3();
		$data['total_kontrak_msa3'] = $this->Laporan_model->total_kontrak_msa3();
		$data['total_efisiensi_penunjukkan_langsung_msa3'] = $this->Laporan_model->total_efisiensi_penunjukkan_langsung_msa3();
		$data['total_efisiensi_transaksi_langsung_msa3'] = $this->Laporan_model->total_efisiensi_transaksi_langsung_msa3();
		$data['total_efisiensi_penetapan_langsung_msa3'] = $this->Laporan_model->total_efisiensi_penetapan_langsung_msa3();
		$data['total_efisiensi_tender_msa3'] = $this->Laporan_model->total_efisiensi_tender_msa3();
		$data['total_efesiensi_msa3'] = $this->Laporan_model->total_efesiensi_msa3();


		// jenis Pengadaan pm
		$data['total_barang_pm'] = $this->Beranda_model->total_barang_pm();
		$data['total_jasa_pemborongan_pm'] = $this->Beranda_model->total_jasa_pemborongan_pm();
		$data['total_jasa_konsultansi_pm'] = $this->Beranda_model->total_jasa_konsultansi_pm();
		$data['total_jasa_lain_pm'] = $this->Beranda_model->total_jasa_lain_pm();
		$data['total_seluruh_jasa_barang_pm'] = $data['total_barang_pm'] + $data['total_jasa_pemborongan_pm'] + $data['total_jasa_konsultansi_pm'] + $data['total_jasa_lain_pm'];
		// metode pemilihan pm
		$data['total_penunjukkan_langsung_pm'] = $this->Laporan_model->total_penunjukkan_langsung_pm();
		$data['total_transaksi_langsung_pm'] = $this->Laporan_model->total_transaksi_langsung_pm();
		$data['total_penetapan_langsung_pm'] = $this->Laporan_model->total_penetapan_langsung_pm();
		$data['total_tender_pm'] = $this->Laporan_model->total_tender_pm();
		$data['total_kesuluruhan_pm'] = $data['total_penunjukkan_langsung_pm'] + $data['total_transaksi_langsung_pm'] + $data['total_penetapan_langsung_pm'] + $data['total_tender_pm'];
		//total duit dan persentasi pm
		$data['total_kontrak_penunjukkan_langsung_pm'] = $this->Laporan_model->total_kontrak_penunjukkan_langsung_pm();
		$data['total_kontrak_transaksi_langsung_pm'] = $this->Laporan_model->total_kontrak_transaksi_langsung_pm();
		$data['total_kontrak_penetapan_langsung_pm'] = $this->Laporan_model->total_kontrak_penetapan_langsung_pm();
		$data['total_kontrak_tender_pm'] = $this->Laporan_model->total_kontrak_tender_pm();
		$data['total_kontrak_pm'] = $this->Laporan_model->total_kontrak_pm();
		$data['total_efisiensi_penunjukkan_langsung_pm'] = $this->Laporan_model->total_efisiensi_penunjukkan_langsung_pm();
		$data['total_efisiensi_transaksi_langsung_pm'] = $this->Laporan_model->total_efisiensi_transaksi_langsung_pm();
		$data['total_efisiensi_penetapan_langsung_pm'] = $this->Laporan_model->total_efisiensi_penetapan_langsung_pm();
		$data['total_efisiensi_tender_pm'] = $this->Laporan_model->total_efisiensi_tender_pm();
		$data['total_efesiensi_pm'] = $this->Laporan_model->total_efesiensi_pm();

		// jenis Pengadaan cpfta
		$data['total_barang_cpfta'] = $this->Beranda_model->total_barang_cpfta();
		$data['total_jasa_pemborongan_cpfta'] = $this->Beranda_model->total_jasa_pemborongan_cpfta();
		$data['total_jasa_konsultansi_cpfta'] = $this->Beranda_model->total_jasa_konsultansi_cpfta();
		$data['total_jasa_lain_cpfta'] = $this->Beranda_model->total_jasa_lain_cpfta();
		$data['total_seluruh_jasa_barang_cpfta'] = $data['total_barang_cpfta'] + $data['total_jasa_pemborongan_cpfta'] + $data['total_jasa_konsultansi_cpfta'] + $data['total_jasa_lain_cpfta'];
		// metode pemilihan cpfta
		$data['total_penunjukkan_langsung_cpfta'] = $this->Laporan_model->total_penunjukkan_langsung_cpfta();
		$data['total_transaksi_langsung_cpfta'] = $this->Laporan_model->total_transaksi_langsung_cpfta();
		$data['total_penetapan_langsung_cpfta'] = $this->Laporan_model->total_penetapan_langsung_cpfta();
		$data['total_tender_cpfta'] = $this->Laporan_model->total_tender_cpfta();
		$data['total_kesuluruhan_cpfta'] = $data['total_penunjukkan_langsung_cpfta'] + $data['total_transaksi_langsung_cpfta'] + $data['total_penetapan_langsung_cpfta'] + $data['total_tender_cpfta'];
		//total duit dan persentasi cpfta
		$data['total_kontrak_penunjukkan_langsung_cpfta'] = $this->Laporan_model->total_kontrak_penunjukkan_langsung_cpfta();
		$data['total_kontrak_transaksi_langsung_cpfta'] = $this->Laporan_model->total_kontrak_transaksi_langsung_cpfta();
		$data['total_kontrak_penetapan_langsung_cpfta'] = $this->Laporan_model->total_kontrak_penetapan_langsung_cpfta();
		$data['total_kontrak_tender_cpfta'] = $this->Laporan_model->total_kontrak_tender_cpfta();
		$data['total_kontrak_cpfta'] = $this->Laporan_model->total_kontrak_cpfta();
		$data['total_efisiensi_penunjukkan_langsung_cpfta'] = $this->Laporan_model->total_efisiensi_penunjukkan_langsung_cpfta();
		$data['total_efisiensi_transaksi_langsung_cpfta'] = $this->Laporan_model->total_efisiensi_transaksi_langsung_cpfta();
		$data['total_efisiensi_penetapan_langsung_cpfta'] = $this->Laporan_model->total_efisiensi_penetapan_langsung_cpfta();
		$data['total_efisiensi_tender_cpfta'] = $this->Laporan_model->total_efisiensi_tender_cpfta();
		$data['total_efesiensi_cpfta'] = $this->Laporan_model->total_efesiensi_cpfta();

		// jenis Pengadaan rmq
		$data['total_barang_rmq'] = $this->Beranda_model->total_barang_rmq();
		$data['total_jasa_pemborongan_rmq'] = $this->Beranda_model->total_jasa_pemborongan_rmq();
		$data['total_jasa_konsultansi_rmq'] = $this->Beranda_model->total_jasa_konsultansi_rmq();
		$data['total_jasa_lain_rmq'] = $this->Beranda_model->total_jasa_lain_rmq();
		$data['total_seluruh_jasa_barang_rmq'] = $data['total_barang_rmq'] + $data['total_jasa_pemborongan_rmq'] + $data['total_jasa_konsultansi_rmq'] + $data['total_jasa_lain_rmq'];
		// metode pemilihan rmq
		$data['total_penunjukkan_langsung_rmq'] = $this->Laporan_model->total_penunjukkan_langsung_rmq();
		$data['total_transaksi_langsung_rmq'] = $this->Laporan_model->total_transaksi_langsung_rmq();
		$data['total_penetapan_langsung_rmq'] = $this->Laporan_model->total_penetapan_langsung_rmq();
		$data['total_tender_rmq'] = $this->Laporan_model->total_tender_rmq();
		$data['total_kesuluruhan_rmq'] = $data['total_penunjukkan_langsung_rmq'] + $data['total_transaksi_langsung_rmq'] + $data['total_penetapan_langsung_rmq'] + $data['total_tender_rmq'];
		//total duit dan persentasi rmq
		$data['total_kontrak_penunjukkan_langsung_rmq'] = $this->Laporan_model->total_kontrak_penunjukkan_langsung_rmq();
		$data['total_kontrak_transaksi_langsung_rmq'] = $this->Laporan_model->total_kontrak_transaksi_langsung_rmq();
		$data['total_kontrak_penetapan_langsung_rmq'] = $this->Laporan_model->total_kontrak_penetapan_langsung_rmq();
		$data['total_kontrak_tender_rmq'] = $this->Laporan_model->total_kontrak_tender_rmq();
		$data['total_kontrak_rmq'] = $this->Laporan_model->total_kontrak_rmq();
		$data['total_efisiensi_penunjukkan_langsung_rmq'] = $this->Laporan_model->total_efisiensi_penunjukkan_langsung_rmq();
		$data['total_efisiensi_transaksi_langsung_rmq'] = $this->Laporan_model->total_efisiensi_transaksi_langsung_rmq();
		$data['total_efisiensi_penetapan_langsung_rmq'] = $this->Laporan_model->total_efisiensi_penetapan_langsung_rmq();
		$data['total_efisiensi_tender_rmq'] = $this->Laporan_model->total_efisiensi_tender_rmq();
		$data['total_efesiensi_rmq'] = $this->Laporan_model->total_efesiensi_rmq();

		// jenis Pengadaan bd
		$data['total_barang_bd'] = $this->Beranda_model->total_barang_bd();
		$data['total_jasa_pemborongan_bd'] = $this->Beranda_model->total_jasa_pemborongan_bd();
		$data['total_jasa_konsultansi_bd'] = $this->Beranda_model->total_jasa_konsultansi_bd();
		$data['total_jasa_lain_bd'] = $this->Beranda_model->total_jasa_lain_bd();
		$data['total_seluruh_jasa_barang_bd'] = $data['total_barang_bd'] + $data['total_jasa_pemborongan_bd'] + $data['total_jasa_konsultansi_bd'] + $data['total_jasa_lain_bd'];
		// metode pemilihan bd
		$data['total_penunjukkan_langsung_bd'] = $this->Laporan_model->total_penunjukkan_langsung_bd();
		$data['total_transaksi_langsung_bd'] = $this->Laporan_model->total_transaksi_langsung_bd();
		$data['total_penetapan_langsung_bd'] = $this->Laporan_model->total_penetapan_langsung_bd();
		$data['total_tender_bd'] = $this->Laporan_model->total_tender_bd();
		$data['total_kesuluruhan_bd'] = $data['total_penunjukkan_langsung_bd'] + $data['total_transaksi_langsung_bd'] + $data['total_penetapan_langsung_bd'] + $data['total_tender_bd'];
		//total duit dan persentasi bd
		$data['total_kontrak_penunjukkan_langsung_bd'] = $this->Laporan_model->total_kontrak_penunjukkan_langsung_bd();
		$data['total_kontrak_transaksi_langsung_bd'] = $this->Laporan_model->total_kontrak_transaksi_langsung_bd();
		$data['total_kontrak_penetapan_langsung_bd'] = $this->Laporan_model->total_kontrak_penetapan_langsung_bd();
		$data['total_kontrak_tender_bd'] = $this->Laporan_model->total_kontrak_tender_bd();
		$data['total_kontrak_bd'] = $this->Laporan_model->total_kontrak_bd();
		$data['total_efisiensi_penunjukkan_langsung_bd'] = $this->Laporan_model->total_efisiensi_penunjukkan_langsung_bd();
		$data['total_efisiensi_transaksi_langsung_bd'] = $this->Laporan_model->total_efisiensi_transaksi_langsung_bd();
		$data['total_efisiensi_penetapan_langsung_bd'] = $this->Laporan_model->total_efisiensi_penetapan_langsung_bd();
		$data['total_efisiensi_tender_bd'] = $this->Laporan_model->total_efisiensi_tender_bd();
		$data['total_efesiensi_bd'] = $this->Laporan_model->total_efesiensi_bd();

		//total jenis pengadaan
		$data['total_barang'] = $this->Laporan_model->total_barang();
		$data['total_jasa_pemborongan'] = $this->Laporan_model->total_jasa_pemborongan();
		$data['total_jasa_konsultansi'] = $this->Laporan_model->total_jasa_konsultansi();
		$data['total_jasa_lain'] = $this->Laporan_model->total_jasa_lain();

		//total metopem
		$data['penunjukkan_langsung'] = $this->Laporan_model->total_penunjukkan_langsung();
		$data['transaksi_langsung'] = $this->Laporan_model->total_transaksi_langsung();
		$data['penetapan_langsung'] = $this->Laporan_model->total_penetapan_langsung();
		$data['tender'] = $this->Laporan_model->total_tender();

		//total kontrak
		$data['total_kontrak_penunjukkan_langsung'] = $this->Laporan_model->total_kontrak_penunjukkan_langsung();
		$data['total_kontrak_transaksi_langsung'] = $this->Laporan_model->total_kontrak_transaksi_langsung();
		$data['total_kontrak_penetapan_langsung'] = $this->Laporan_model->total_kontrak_penetapan_langsung();
		$data['total_kontrak_tender'] = $this->Laporan_model->total_kontrak_tender();

		//hps
		$data['total_hps_penunjukkan_langsung'] = $this->Laporan_model->total_hps_penunjukkan_langsung();
		$data['total_hps_transaksi_langsung'] = $this->Laporan_model->total_hps_transaksi_langsung();
		$data['total_hps_penetapan_langsung'] = $this->Laporan_model->total_hps_penetapan_langsung();
		$data['total_hps_tender'] = $this->Laporan_model->total_hps_tender();

		//ambil seluruh nilai kontrak
		$data['total_seluruh_kontrak'] = $this->Laporan_model->total_seluruh_kontrak();

		// total semua jenis pengadaan
		$data['total_barang_semua_paket'] = $this->Laporan_model->total_barang_semua_paket();
		$data['total_pemborongan_semua_paket'] = $this->Laporan_model->total_pemborongan_semua_paket();
		$data['total_konsultansi_semua_paket'] = $this->Laporan_model->total_konsultansi_semua_paket();
		$data['total_lain_semua_paket'] = $this->Laporan_model->total_lain_semua_paket();
		$data['total_semua_paket_jenis_pengadaan'] = $data['total_barang_semua_paket'] + $data['total_pemborongan_semua_paket'] + $data['total_konsultansi_semua_paket'] + $data['total_lain_semua_paket'];

		// anggaran
		$data['anggaran_barang'] = $this->Laporan_model->anggaran_barang();
		$data['anggaran_pemborongan'] = $this->Laporan_model->anggaran_pemborongan();
		$data['anggaran_konsultansi'] = $this->Laporan_model->anggaran_konsultansi();
		$data['anggaran_lain'] = $this->Laporan_model->anggaran_lain();

		// kontrak
		$data['kontrak_barang'] = $this->Laporan_model->kontrak_barang();
		$data['kontrak_pemborongan'] = $this->Laporan_model->kontrak_pemborongan();
		$data['kontrak_konsultansi'] = $this->Laporan_model->kontrak_konsultansi();
		$data['kontrak_lain'] = $this->Laporan_model->kontrak_lain();

		// ini tahun dan bulanya
		$data['tanggal_tahun_procurement'] = $this->Beranda_model->get_tahun_dan_bulan();
		$this->load->view('template/header');
		$this->load->view('template/navlogin');
		$this->load->view('laporan/grafik_dan_rekap', $data);
		$this->load->view('template/footer');
		$this->load->view('laporan/ajax', $data);
	}

	public function grafik_dan_rekap_pdf()
	{

		$data['total_barang_hcga'] = $this->Beranda_model->total_barang_hcga();
		$data['total_jasa_pemborongan_hcga'] = $this->Beranda_model->total_jasa_pemborongan_hcga();
		$data['total_jasa_konsultansi_hcga'] = $this->Beranda_model->total_jasa_konsultansi_hcga();
		$data['total_jasa_lain_hcga'] = $this->Beranda_model->total_jasa_lain_hcga();
		$data['total_seluruh_jasa_barang_hcga'] = $data['total_barang_hcga'] + $data['total_jasa_pemborongan_hcga'] + $data['total_jasa_konsultansi_hcga'] + $data['total_jasa_lain_hcga'];
		// metode pemilihan hcga
		$data['total_penunjukkan_langsung_hcga'] = $this->Laporan_model->total_penunjukkan_langsung_hcga();
		$data['total_transaksi_langsung_hcga'] = $this->Laporan_model->total_transaksi_langsung_hcga();
		$data['total_penetapan_langsung_hcga'] = $this->Laporan_model->total_penetapan_langsung_hcga();
		$data['total_tender_hcga'] = $this->Laporan_model->total_tender_hcga();
		$data['total_kesuluruhan_hcga'] = $data['total_penunjukkan_langsung_hcga'] + $data['total_transaksi_langsung_hcga'] + $data['total_penetapan_langsung_hcga'] + $data['total_tender_hcga'];
		//total duit dan persentasi hcga
		$data['total_kontrak_penunjukkan_langsung_hcga'] = $this->Laporan_model->total_kontrak_penunjukkan_langsung_hcga();
		$data['total_kontrak_transaksi_langsung_hcga'] = $this->Laporan_model->total_kontrak_transaksi_langsung_hcga();
		$data['total_kontrak_penetapan_langsung_hcga'] = $this->Laporan_model->total_kontrak_penetapan_langsung_hcga();
		$data['total_kontrak_tender_hcga'] = $this->Laporan_model->total_kontrak_tender_hcga();
		$data['total_kontrak_hcga'] = $this->Laporan_model->total_kontrak_hcga();
		$data['total_efisiensi_penunjukkan_langsung_hcga'] = $this->Laporan_model->total_efisiensi_penunjukkan_langsung_hcga();
		$data['total_efisiensi_transaksi_langsung_hcga'] = $this->Laporan_model->total_efisiensi_transaksi_langsung_hcga();
		$data['total_efisiensi_penetapan_langsung_hcga'] = $this->Laporan_model->total_efisiensi_penetapan_langsung_hcga();
		$data['total_efisiensi_tender_hcga'] = $this->Laporan_model->total_efisiensi_tender_hcga();
		$data['total_efesiensi_hcga'] = $this->Laporan_model->total_efesiensi_hcga();

		// jenis Pengadaan pcr
		$data['total_barang_pcr'] = $this->Beranda_model->total_barang_pcr();
		$data['total_jasa_pemborongan_pcr'] = $this->Beranda_model->total_jasa_pemborongan_pcr();
		$data['total_jasa_konsultansi_pcr'] = $this->Beranda_model->total_jasa_konsultansi_pcr();
		$data['total_jasa_lain_pcr'] = $this->Beranda_model->total_jasa_lain_pcr();
		$data['total_seluruh_jasa_barang_pcr'] = $data['total_barang_pcr'] + $data['total_jasa_pemborongan_pcr'] + $data['total_jasa_konsultansi_pcr'] + $data['total_jasa_lain_pcr'];
		// metode pemilihan pcr
		$data['total_penunjukkan_langsung_pcr'] = $this->Laporan_model->total_penunjukkan_langsung_pcr();
		$data['total_transaksi_langsung_pcr'] = $this->Laporan_model->total_transaksi_langsung_pcr();
		$data['total_penetapan_langsung_pcr'] = $this->Laporan_model->total_penetapan_langsung_pcr();
		$data['total_tender_pcr'] = $this->Laporan_model->total_tender_pcr();
		$data['total_kesuluruhan_pcr'] = $data['total_penunjukkan_langsung_pcr'] + $data['total_transaksi_langsung_pcr'] + $data['total_penetapan_langsung_pcr'] + $data['total_tender_pcr'];
		//total duit dan persentasi pcr
		$data['total_kontrak_penunjukkan_langsung_pcr'] = $this->Laporan_model->total_kontrak_penunjukkan_langsung_pcr();
		$data['total_kontrak_transaksi_langsung_pcr'] = $this->Laporan_model->total_kontrak_transaksi_langsung_pcr();
		$data['total_kontrak_penetapan_langsung_pcr'] = $this->Laporan_model->total_kontrak_penetapan_langsung_pcr();
		$data['total_kontrak_tender_pcr'] = $this->Laporan_model->total_kontrak_tender_pcr();
		$data['total_kontrak_pcr'] = $this->Laporan_model->total_kontrak_pcr();
		$data['total_efisiensi_penunjukkan_langsung_pcr'] = $this->Laporan_model->total_efisiensi_penunjukkan_langsung_pcr();
		$data['total_efisiensi_transaksi_langsung_pcr'] = $this->Laporan_model->total_efisiensi_transaksi_langsung_pcr();
		$data['total_efisiensi_penetapan_langsung_pcr'] = $this->Laporan_model->total_efisiensi_penetapan_langsung_pcr();
		$data['total_efisiensi_tender_pcr'] = $this->Laporan_model->total_efisiensi_tender_pcr();
		$data['total_efesiensi_pcr'] = $this->Laporan_model->total_efesiensi_pcr();

		// jenis Pengadaan fta
		$data['total_barang_fta'] = $this->Beranda_model->total_barang_fta();
		$data['total_jasa_pemborongan_fta'] = $this->Beranda_model->total_jasa_pemborongan_fta();
		$data['total_jasa_konsultansi_fta'] = $this->Beranda_model->total_jasa_konsultansi_fta();
		$data['total_jasa_lain_fta'] = $this->Beranda_model->total_jasa_lain_fta();
		$data['total_seluruh_jasa_barang_fta'] = $data['total_barang_fta'] + $data['total_jasa_pemborongan_fta'] + $data['total_jasa_konsultansi_fta'] + $data['total_jasa_lain_fta'];
		// metode pemilihan fta
		$data['total_penunjukkan_langsung_fta'] = $this->Laporan_model->total_penunjukkan_langsung_fta();
		$data['total_transaksi_langsung_fta'] = $this->Laporan_model->total_transaksi_langsung_fta();
		$data['total_penetapan_langsung_fta'] = $this->Laporan_model->total_penetapan_langsung_fta();
		$data['total_tender_fta'] = $this->Laporan_model->total_tender_fta();
		$data['total_kesuluruhan_fta'] = $data['total_penunjukkan_langsung_fta'] + $data['total_transaksi_langsung_fta'] + $data['total_penetapan_langsung_fta'] + $data['total_tender_fta'];
		//total duit dan persentasi fta
		$data['total_kontrak_penunjukkan_langsung_fta'] = $this->Laporan_model->total_kontrak_penunjukkan_langsung_fta();
		$data['total_kontrak_transaksi_langsung_fta'] = $this->Laporan_model->total_kontrak_transaksi_langsung_fta();
		$data['total_kontrak_penetapan_langsung_fta'] = $this->Laporan_model->total_kontrak_penetapan_langsung_fta();
		$data['total_kontrak_tender_fta'] = $this->Laporan_model->total_kontrak_tender_fta();
		$data['total_kontrak_fta'] = $this->Laporan_model->total_kontrak_fta();
		$data['total_efisiensi_penunjukkan_langsung_fta'] = $this->Laporan_model->total_efisiensi_penunjukkan_langsung_fta();
		$data['total_efisiensi_transaksi_langsung_fta'] = $this->Laporan_model->total_efisiensi_transaksi_langsung_fta();
		$data['total_efisiensi_penetapan_langsung_fta'] = $this->Laporan_model->total_efisiensi_penetapan_langsung_fta();
		$data['total_efisiensi_tender_fta'] = $this->Laporan_model->total_efisiensi_tender_fta();
		$data['total_efesiensi_fta'] = $this->Laporan_model->total_efesiensi_fta();

		// jenis Pengadaan rms
		$data['total_barang_rmms'] = $this->Beranda_model->total_barang_rmms();
		$data['total_jasa_pemborongan_rmms'] = $this->Beranda_model->total_jasa_pemborongan_rmms();
		$data['total_jasa_konsultansi_rmms'] = $this->Beranda_model->total_jasa_konsultansi_rmms();
		$data['total_jasa_lain_rmms'] = $this->Beranda_model->total_jasa_lain_rmms();
		$data['total_seluruh_jasa_barang_rmms'] = $data['total_barang_rmms'] + $data['total_jasa_pemborongan_rmms'] + $data['total_jasa_konsultansi_rmms'] + $data['total_jasa_lain_rmms'];
		// metode pemilihan rms
		$data['total_penunjukkan_langsung_rmms'] = $this->Laporan_model->total_penunjukkan_langsung_rmms();
		$data['total_transaksi_langsung_rmms'] = $this->Laporan_model->total_transaksi_langsung_rmms();
		$data['total_penetapan_langsung_rmms'] = $this->Laporan_model->total_penetapan_langsung_rmms();
		$data['total_tender_rmms'] = $this->Laporan_model->total_tender_rmms();
		$data['total_kesuluruhan_rmms'] = $data['total_penunjukkan_langsung_rmms'] + $data['total_transaksi_langsung_rmms'] + $data['total_penetapan_langsung_rmms'] + $data['total_tender_rmms'];
		//total duit dan persentasi rmms
		$data['total_kontrak_penunjukkan_langsung_rmms'] = $this->Laporan_model->total_kontrak_penunjukkan_langsung_rmms();
		$data['total_kontrak_transaksi_langsung_rmms'] = $this->Laporan_model->total_kontrak_transaksi_langsung_rmms();
		$data['total_kontrak_penetapan_langsung_rmms'] = $this->Laporan_model->total_kontrak_penetapan_langsung_rmms();
		$data['total_kontrak_tender_rmms'] = $this->Laporan_model->total_kontrak_tender_rmms();
		$data['total_kontrak_rmms'] = $this->Laporan_model->total_kontrak_rmms();
		$data['total_efisiensi_penunjukkan_langsung_rmms'] = $this->Laporan_model->total_efisiensi_penunjukkan_langsung_rmms();
		$data['total_efisiensi_transaksi_langsung_rmms'] = $this->Laporan_model->total_efisiensi_transaksi_langsung_rmms();
		$data['total_efisiensi_penetapan_langsung_rmms'] = $this->Laporan_model->total_efisiensi_penetapan_langsung_rmms();
		$data['total_efisiensi_tender_rmms'] = $this->Laporan_model->total_efisiensi_tender_rmms();
		$data['total_efesiensi_rmms'] = $this->Laporan_model->total_efesiensi_rmms();

		// jenis Pengadaan amp
		$data['total_barang_amp'] = $this->Beranda_model->total_barang_amp();
		$data['total_jasa_pemborongan_amp'] = $this->Beranda_model->total_jasa_pemborongan_amp();
		$data['total_jasa_konsultansi_amp'] = $this->Beranda_model->total_jasa_konsultansi_amp();
		$data['total_jasa_lain_amp'] = $this->Beranda_model->total_jasa_lain_amp();
		$data['total_seluruh_jasa_barang_amp'] = $data['total_barang_amp'] + $data['total_jasa_pemborongan_amp'] + $data['total_jasa_konsultansi_amp'] + $data['total_jasa_lain_amp'];
		// metode pemilihan amp
		$data['total_penunjukkan_langsung_amp'] = $this->Laporan_model->total_penunjukkan_langsung_amp();
		$data['total_transaksi_langsung_amp'] = $this->Laporan_model->total_transaksi_langsung_amp();
		$data['total_penetapan_langsung_amp'] = $this->Laporan_model->total_penetapan_langsung_amp();
		$data['total_tender_amp'] = $this->Laporan_model->total_tender_amp();
		$data['total_kesuluruhan_amp'] = $data['total_penunjukkan_langsung_amp'] + $data['total_transaksi_langsung_amp'] + $data['total_penetapan_langsung_amp'] + $data['total_tender_amp'];
		//total duit dan persentasi amp
		$data['total_kontrak_penunjukkan_langsung_amp'] = $this->Laporan_model->total_kontrak_penunjukkan_langsung_amp();
		$data['total_kontrak_transaksi_langsung_amp'] = $this->Laporan_model->total_kontrak_transaksi_langsung_amp();
		$data['total_kontrak_penetapan_langsung_amp'] = $this->Laporan_model->total_kontrak_penetapan_langsung_amp();
		$data['total_kontrak_tender_amp'] = $this->Laporan_model->total_kontrak_tender_amp();
		$data['total_kontrak_amp'] = $this->Laporan_model->total_kontrak_amp();
		$data['total_efisiensi_penunjukkan_langsung_amp'] = $this->Laporan_model->total_efisiensi_penunjukkan_langsung_amp();
		$data['total_efisiensi_transaksi_langsung_amp'] = $this->Laporan_model->total_efisiensi_transaksi_langsung_amp();
		$data['total_efisiensi_penetapan_langsung_amp'] = $this->Laporan_model->total_efisiensi_penetapan_langsung_amp();
		$data['total_efisiensi_tender_amp'] = $this->Laporan_model->total_efisiensi_tender_amp();
		$data['total_efesiensi_amp'] = $this->Laporan_model->total_efesiensi_amp();

		// jenis Pengadaan pche
		$data['total_barang_pche'] = $this->Beranda_model->total_barang_pche();
		$data['total_jasa_pemborongan_pche'] = $this->Beranda_model->total_jasa_pemborongan_pche();
		$data['total_jasa_konsultansi_pche'] = $this->Beranda_model->total_jasa_konsultansi_pche();
		$data['total_jasa_lain_pche'] = $this->Beranda_model->total_jasa_lain_pche();
		$data['total_seluruh_jasa_barang_pche'] = $data['total_barang_pche'] + $data['total_jasa_pemborongan_pche'] + $data['total_jasa_konsultansi_pche'] + $data['total_jasa_lain_pche'];
		// metode pemilihan pche
		$data['total_penunjukkan_langsung_pche'] = $this->Laporan_model->total_penunjukkan_langsung_pche();
		$data['total_transaksi_langsung_pche'] = $this->Laporan_model->total_transaksi_langsung_pche();
		$data['total_penetapan_langsung_pche'] = $this->Laporan_model->total_penetapan_langsung_pche();
		$data['total_tender_pche'] = $this->Laporan_model->total_tender_pche();
		$data['total_kesuluruhan_pche'] = $data['total_penunjukkan_langsung_pche'] + $data['total_transaksi_langsung_pche'] + $data['total_penetapan_langsung_pche'] + $data['total_tender_pche'];
		//total duit dan persentasi pche
		$data['total_kontrak_penunjukkan_langsung_pche'] = $this->Laporan_model->total_kontrak_penunjukkan_langsung_pche();
		$data['total_kontrak_transaksi_langsung_pche'] = $this->Laporan_model->total_kontrak_transaksi_langsung_pche();
		$data['total_kontrak_penetapan_langsung_pche'] = $this->Laporan_model->total_kontrak_penetapan_langsung_pche();
		$data['total_kontrak_tender_pche'] = $this->Laporan_model->total_kontrak_tender_pche();
		$data['total_kontrak_pche'] = $this->Laporan_model->total_kontrak_pche();
		$data['total_efisiensi_penunjukkan_langsung_pche'] = $this->Laporan_model->total_efisiensi_penunjukkan_langsung_pche();
		$data['total_efisiensi_transaksi_langsung_pche'] = $this->Laporan_model->total_efisiensi_transaksi_langsung_pche();
		$data['total_efisiensi_penetapan_langsung_pche'] = $this->Laporan_model->total_efisiensi_penetapan_langsung_pche();
		$data['total_efisiensi_tender_pche'] = $this->Laporan_model->total_efisiensi_tender_pche();
		$data['total_efesiensi_pche'] = $this->Laporan_model->total_efesiensi_pche();

		// jenis Pengadaan amtd
		$data['total_barang_amtd'] = $this->Beranda_model->total_barang_amtd();
		$data['total_jasa_pemborongan_amtd'] = $this->Beranda_model->total_jasa_pemborongan_amtd();
		$data['total_jasa_konsultansi_amtd'] = $this->Beranda_model->total_jasa_konsultansi_amtd();
		$data['total_jasa_lain_amtd'] = $this->Beranda_model->total_jasa_lain_amtd();
		$data['total_seluruh_jasa_barang_amtd'] = $data['total_barang_amtd'] + $data['total_jasa_pemborongan_amtd'] + $data['total_jasa_konsultansi_amtd'] + $data['total_jasa_lain_amtd'];
		// metode pemilihan amtd
		$data['total_penunjukkan_langsung_amtd'] = $this->Laporan_model->total_penunjukkan_langsung_amtd();
		$data['total_transaksi_langsung_amtd'] = $this->Laporan_model->total_transaksi_langsung_amtd();
		$data['total_penetapan_langsung_amtd'] = $this->Laporan_model->total_penetapan_langsung_amtd();
		$data['total_tender_amtd'] = $this->Laporan_model->total_tender_amtd();
		$data['total_kesuluruhan_amtd'] = $data['total_penunjukkan_langsung_amtd'] + $data['total_transaksi_langsung_amtd'] + $data['total_penetapan_langsung_amtd'] + $data['total_tender_amtd'];
		//total duit dan persentasi amtd
		$data['total_kontrak_penunjukkan_langsung_amtd'] = $this->Laporan_model->total_kontrak_penunjukkan_langsung_amtd();
		$data['total_kontrak_transaksi_langsung_amtd'] = $this->Laporan_model->total_kontrak_transaksi_langsung_amtd();
		$data['total_kontrak_penetapan_langsung_amtd'] = $this->Laporan_model->total_kontrak_penetapan_langsung_amtd();
		$data['total_kontrak_tender_amtd'] = $this->Laporan_model->total_kontrak_tender_amtd();
		$data['total_kontrak_amtd'] = $this->Laporan_model->total_kontrak_amtd();
		$data['total_efisiensi_penunjukkan_langsung_amtd'] = $this->Laporan_model->total_efisiensi_penunjukkan_langsung_amtd();
		$data['total_efisiensi_transaksi_langsung_amtd'] = $this->Laporan_model->total_efisiensi_transaksi_langsung_amtd();
		$data['total_efisiensi_penetapan_langsung_amtd'] = $this->Laporan_model->total_efisiensi_penetapan_langsung_amtd();
		$data['total_efisiensi_tender_amtd'] = $this->Laporan_model->total_efisiensi_tender_amtd();
		$data['total_efesiensi_amtd'] = $this->Laporan_model->total_efesiensi_amtd();

		// jenis Pengadaan op1
		$data['total_barang_op1'] = $this->Beranda_model->total_barang_op1();
		$data['total_jasa_pemborongan_op1'] = $this->Beranda_model->total_jasa_pemborongan_op1();
		$data['total_jasa_konsultansi_op1'] = $this->Beranda_model->total_jasa_konsultansi_op1();
		$data['total_jasa_lain_op1'] = $this->Beranda_model->total_jasa_lain_op1();
		$data['total_seluruh_jasa_barang_op1'] = $data['total_barang_op1'] + $data['total_jasa_pemborongan_op1'] + $data['total_jasa_konsultansi_op1'] + $data['total_jasa_lain_op1'];
		// metode pemilihan op1
		$data['total_penunjukkan_langsung_op1'] = $this->Laporan_model->total_penunjukkan_langsung_op1();
		$data['total_transaksi_langsung_op1'] = $this->Laporan_model->total_transaksi_langsung_op1();
		$data['total_penetapan_langsung_op1'] = $this->Laporan_model->total_penetapan_langsung_op1();
		$data['total_tender_op1'] = $this->Laporan_model->total_tender_op1();
		$data['total_kesuluruhan_op1'] = $data['total_penunjukkan_langsung_op1'] + $data['total_transaksi_langsung_op1'] + $data['total_penetapan_langsung_op1'] + $data['total_tender_op1'];
		//total duit dan persentasi op1
		$data['total_kontrak_penunjukkan_langsung_op1'] = $this->Laporan_model->total_kontrak_penunjukkan_langsung_op1();
		$data['total_kontrak_transaksi_langsung_op1'] = $this->Laporan_model->total_kontrak_transaksi_langsung_op1();
		$data['total_kontrak_penetapan_langsung_op1'] = $this->Laporan_model->total_kontrak_penetapan_langsung_op1();
		$data['total_kontrak_tender_op1'] = $this->Laporan_model->total_kontrak_tender_op1();
		$data['total_kontrak_op1'] = $this->Laporan_model->total_kontrak_op1();
		$data['total_efisiensi_penunjukkan_langsung_op1'] = $this->Laporan_model->total_efisiensi_penunjukkan_langsung_op1();
		$data['total_efisiensi_transaksi_langsung_op1'] = $this->Laporan_model->total_efisiensi_transaksi_langsung_op1();
		$data['total_efisiensi_penetapan_langsung_op1'] = $this->Laporan_model->total_efisiensi_penetapan_langsung_op1();
		$data['total_efisiensi_tender_op1'] = $this->Laporan_model->total_efisiensi_tender_op1();
		$data['total_efesiensi_op1'] = $this->Laporan_model->total_efesiensi_op1();

		// jenis Pengadaan op2
		$data['total_barang_op2'] = $this->Beranda_model->total_barang_op2();
		$data['total_jasa_pemborongan_op2'] = $this->Beranda_model->total_jasa_pemborongan_op2();
		$data['total_jasa_konsultansi_op2'] = $this->Beranda_model->total_jasa_konsultansi_op2();
		$data['total_jasa_lain_op2'] = $this->Beranda_model->total_jasa_lain_op2();
		$data['total_seluruh_jasa_barang_op2'] = $data['total_barang_op2'] + $data['total_jasa_pemborongan_op2'] + $data['total_jasa_konsultansi_op2'] + $data['total_jasa_lain_op2'];
		// metode pemilihan op2
		$data['total_penunjukkan_langsung_op2'] = $this->Laporan_model->total_penunjukkan_langsung_op2();
		$data['total_transaksi_langsung_op2'] = $this->Laporan_model->total_transaksi_langsung_op2();
		$data['total_penetapan_langsung_op2'] = $this->Laporan_model->total_penetapan_langsung_op2();
		$data['total_tender_op2'] = $this->Laporan_model->total_tender_op2();
		$data['total_kesuluruhan_op2'] = $data['total_penunjukkan_langsung_op2'] + $data['total_transaksi_langsung_op2'] + $data['total_penetapan_langsung_op2'] + $data['total_tender_op2'];
		//total duit dan persentasi op2
		$data['total_kontrak_penunjukkan_langsung_op2'] = $this->Laporan_model->total_kontrak_penunjukkan_langsung_op2();
		$data['total_kontrak_transaksi_langsung_op2'] = $this->Laporan_model->total_kontrak_transaksi_langsung_op2();
		$data['total_kontrak_penetapan_langsung_op2'] = $this->Laporan_model->total_kontrak_penetapan_langsung_op2();
		$data['total_kontrak_tender_op2'] = $this->Laporan_model->total_kontrak_tender_op2();
		$data['total_kontrak_op2'] = $this->Laporan_model->total_kontrak_op2();
		$data['total_efisiensi_penunjukkan_langsung_op2'] = $this->Laporan_model->total_efisiensi_penunjukkan_langsung_op2();
		$data['total_efisiensi_transaksi_langsung_op2'] = $this->Laporan_model->total_efisiensi_transaksi_langsung_op2();
		$data['total_efisiensi_penetapan_langsung_op2'] = $this->Laporan_model->total_efisiensi_penetapan_langsung_op2();
		$data['total_efisiensi_tender_op2'] = $this->Laporan_model->total_efisiensi_tender_op2();
		$data['total_efesiensi_op2'] = $this->Laporan_model->total_efesiensi_op2();

		// jenis Pengadaan op3
		$data['total_barang_op3'] = $this->Beranda_model->total_barang_op3();
		$data['total_jasa_pemborongan_op3'] = $this->Beranda_model->total_jasa_pemborongan_op3();
		$data['total_jasa_konsultansi_op3'] = $this->Beranda_model->total_jasa_konsultansi_op3();
		$data['total_jasa_lain_op3'] = $this->Beranda_model->total_jasa_lain_op3();
		$data['total_seluruh_jasa_barang_op3'] = $data['total_barang_op3'] + $data['total_jasa_pemborongan_op3'] + $data['total_jasa_konsultansi_op3'] + $data['total_jasa_lain_op3'];
		// metode pemilihan op3
		$data['total_penunjukkan_langsung_op3'] = $this->Laporan_model->total_penunjukkan_langsung_op3();
		$data['total_transaksi_langsung_op3'] = $this->Laporan_model->total_transaksi_langsung_op3();
		$data['total_penetapan_langsung_op3'] = $this->Laporan_model->total_penetapan_langsung_op3();
		$data['total_tender_op3'] = $this->Laporan_model->total_tender_op3();
		$data['total_kesuluruhan_op3'] = $data['total_penunjukkan_langsung_op3'] + $data['total_transaksi_langsung_op3'] + $data['total_penetapan_langsung_op3'] + $data['total_tender_op3'];
		//total duit dan persentasi op3
		$data['total_kontrak_penunjukkan_langsung_op3'] = $this->Laporan_model->total_kontrak_penunjukkan_langsung_op3();
		$data['total_kontrak_transaksi_langsung_op3'] = $this->Laporan_model->total_kontrak_transaksi_langsung_op3();
		$data['total_kontrak_penetapan_langsung_op3'] = $this->Laporan_model->total_kontrak_penetapan_langsung_op3();
		$data['total_kontrak_tender_op3'] = $this->Laporan_model->total_kontrak_tender_op3();
		$data['total_kontrak_op3'] = $this->Laporan_model->total_kontrak_op3();
		$data['total_efisiensi_penunjukkan_langsung_op3'] = $this->Laporan_model->total_efisiensi_penunjukkan_langsung_op3();
		$data['total_efisiensi_transaksi_langsung_op3'] = $this->Laporan_model->total_efisiensi_transaksi_langsung_op3();
		$data['total_efisiensi_penetapan_langsung_op3'] = $this->Laporan_model->total_efisiensi_penetapan_langsung_op3();
		$data['total_efisiensi_tender_op3'] = $this->Laporan_model->total_efisiensi_tender_op3();
		$data['total_efesiensi_op3'] = $this->Laporan_model->total_efesiensi_op3();

		// jenis Pengadaan msa1
		$data['total_barang_msa1'] = $this->Beranda_model->total_barang_msa1();
		$data['total_jasa_pemborongan_msa1'] = $this->Beranda_model->total_jasa_pemborongan_msa1();
		$data['total_jasa_konsultansi_msa1'] = $this->Beranda_model->total_jasa_konsultansi_msa1();
		$data['total_jasa_lain_msa1'] = $this->Beranda_model->total_jasa_lain_msa1();
		$data['total_seluruh_jasa_barang_msa1'] = $data['total_barang_msa1'] + $data['total_jasa_pemborongan_msa1'] + $data['total_jasa_konsultansi_msa1'] + $data['total_jasa_lain_msa1'];
		// metode pemilihan msa1
		$data['total_penunjukkan_langsung_msa1'] = $this->Laporan_model->total_penunjukkan_langsung_msa1();
		$data['total_transaksi_langsung_msa1'] = $this->Laporan_model->total_transaksi_langsung_msa1();
		$data['total_penetapan_langsung_msa1'] = $this->Laporan_model->total_penetapan_langsung_msa1();
		$data['total_tender_msa1'] = $this->Laporan_model->total_tender_msa1();
		$data['total_kesuluruhan_msa1'] = $data['total_penunjukkan_langsung_msa1'] + $data['total_transaksi_langsung_msa1'] + $data['total_penetapan_langsung_msa1'] + $data['total_tender_msa1'];
		//total duit dan persentasi msa1
		$data['total_kontrak_penunjukkan_langsung_msa1'] = $this->Laporan_model->total_kontrak_penunjukkan_langsung_msa1();
		$data['total_kontrak_transaksi_langsung_msa1'] = $this->Laporan_model->total_kontrak_transaksi_langsung_msa1();
		$data['total_kontrak_penetapan_langsung_msa1'] = $this->Laporan_model->total_kontrak_penetapan_langsung_msa1();
		$data['total_kontrak_tender_msa1'] = $this->Laporan_model->total_kontrak_tender_msa1();
		$data['total_kontrak_msa1'] = $this->Laporan_model->total_kontrak_msa1();
		$data['total_efisiensi_penunjukkan_langsung_msa1'] = $this->Laporan_model->total_efisiensi_penunjukkan_langsung_msa1();
		$data['total_efisiensi_transaksi_langsung_msa1'] = $this->Laporan_model->total_efisiensi_transaksi_langsung_msa1();
		$data['total_efisiensi_penetapan_langsung_msa1'] = $this->Laporan_model->total_efisiensi_penetapan_langsung_msa1();
		$data['total_efisiensi_tender_msa1'] = $this->Laporan_model->total_efisiensi_tender_msa1();
		$data['total_efesiensi_msa1'] = $this->Laporan_model->total_efesiensi_msa1();


		// jenis Pengadaan msa2
		$data['total_barang_msa2'] = $this->Beranda_model->total_barang_msa2();
		$data['total_jasa_pemborongan_msa2'] = $this->Beranda_model->total_jasa_pemborongan_msa2();
		$data['total_jasa_konsultansi_msa2'] = $this->Beranda_model->total_jasa_konsultansi_msa2();
		$data['total_jasa_lain_msa2'] = $this->Beranda_model->total_jasa_lain_msa2();
		$data['total_seluruh_jasa_barang_msa2'] = $data['total_barang_msa2'] + $data['total_jasa_pemborongan_msa2'] + $data['total_jasa_konsultansi_msa2'] + $data['total_jasa_lain_msa2'];
		// metode pemilihan msa2
		$data['total_penunjukkan_langsung_msa2'] = $this->Laporan_model->total_penunjukkan_langsung_msa2();
		$data['total_transaksi_langsung_msa2'] = $this->Laporan_model->total_transaksi_langsung_msa2();
		$data['total_penetapan_langsung_msa2'] = $this->Laporan_model->total_penetapan_langsung_msa2();
		$data['total_tender_msa2'] = $this->Laporan_model->total_tender_msa2();
		$data['total_kesuluruhan_msa2'] = $data['total_penunjukkan_langsung_msa2'] + $data['total_transaksi_langsung_msa2'] + $data['total_penetapan_langsung_msa2'] + $data['total_tender_msa2'];
		//total duit dan persentasi msa2
		$data['total_kontrak_penunjukkan_langsung_msa2'] = $this->Laporan_model->total_kontrak_penunjukkan_langsung_msa2();
		$data['total_kontrak_transaksi_langsung_msa2'] = $this->Laporan_model->total_kontrak_transaksi_langsung_msa2();
		$data['total_kontrak_penetapan_langsung_msa2'] = $this->Laporan_model->total_kontrak_penetapan_langsung_msa2();
		$data['total_kontrak_tender_msa2'] = $this->Laporan_model->total_kontrak_tender_msa2();
		$data['total_kontrak_msa2'] = $this->Laporan_model->total_kontrak_msa2();
		$data['total_efisiensi_penunjukkan_langsung_msa2'] = $this->Laporan_model->total_efisiensi_penunjukkan_langsung_msa2();
		$data['total_efisiensi_transaksi_langsung_msa2'] = $this->Laporan_model->total_efisiensi_transaksi_langsung_msa2();
		$data['total_efisiensi_penetapan_langsung_msa2'] = $this->Laporan_model->total_efisiensi_penetapan_langsung_msa2();
		$data['total_efisiensi_tender_msa2'] = $this->Laporan_model->total_efisiensi_tender_msa2();
		$data['total_efesiensi_msa2'] = $this->Laporan_model->total_efesiensi_msa2();


		// jenis Pengadaan msa3
		$data['total_barang_msa3'] = $this->Beranda_model->total_barang_msa3();
		$data['total_jasa_pemborongan_msa3'] = $this->Beranda_model->total_jasa_pemborongan_msa3();
		$data['total_jasa_konsultansi_msa3'] = $this->Beranda_model->total_jasa_konsultansi_msa3();
		$data['total_jasa_lain_msa3'] = $this->Beranda_model->total_jasa_lain_msa3();
		$data['total_seluruh_jasa_barang_msa3'] = $data['total_barang_msa3'] + $data['total_jasa_pemborongan_msa3'] + $data['total_jasa_konsultansi_msa3'] + $data['total_jasa_lain_msa3'];
		// metode pemilihan msa3
		$data['total_penunjukkan_langsung_msa3'] = $this->Laporan_model->total_penunjukkan_langsung_msa3();
		$data['total_transaksi_langsung_msa3'] = $this->Laporan_model->total_transaksi_langsung_msa3();
		$data['total_penetapan_langsung_msa3'] = $this->Laporan_model->total_penetapan_langsung_msa3();
		$data['total_tender_msa3'] = $this->Laporan_model->total_tender_msa3();
		$data['total_kesuluruhan_msa3'] = $data['total_penunjukkan_langsung_msa3'] + $data['total_transaksi_langsung_msa3'] + $data['total_penetapan_langsung_msa3'] + $data['total_tender_msa3'];
		//total duit dan persentasi msa3
		$data['total_kontrak_penunjukkan_langsung_msa3'] = $this->Laporan_model->total_kontrak_penunjukkan_langsung_msa3();
		$data['total_kontrak_transaksi_langsung_msa3'] = $this->Laporan_model->total_kontrak_transaksi_langsung_msa3();
		$data['total_kontrak_penetapan_langsung_msa3'] = $this->Laporan_model->total_kontrak_penetapan_langsung_msa3();
		$data['total_kontrak_tender_msa3'] = $this->Laporan_model->total_kontrak_tender_msa3();
		$data['total_kontrak_msa3'] = $this->Laporan_model->total_kontrak_msa3();
		$data['total_efisiensi_penunjukkan_langsung_msa3'] = $this->Laporan_model->total_efisiensi_penunjukkan_langsung_msa3();
		$data['total_efisiensi_transaksi_langsung_msa3'] = $this->Laporan_model->total_efisiensi_transaksi_langsung_msa3();
		$data['total_efisiensi_penetapan_langsung_msa3'] = $this->Laporan_model->total_efisiensi_penetapan_langsung_msa3();
		$data['total_efisiensi_tender_msa3'] = $this->Laporan_model->total_efisiensi_tender_msa3();
		$data['total_efesiensi_msa3'] = $this->Laporan_model->total_efesiensi_msa3();


		// jenis Pengadaan pm
		$data['total_barang_pm'] = $this->Beranda_model->total_barang_pm();
		$data['total_jasa_pemborongan_pm'] = $this->Beranda_model->total_jasa_pemborongan_pm();
		$data['total_jasa_konsultansi_pm'] = $this->Beranda_model->total_jasa_konsultansi_pm();
		$data['total_jasa_lain_pm'] = $this->Beranda_model->total_jasa_lain_pm();
		$data['total_seluruh_jasa_barang_pm'] = $data['total_barang_pm'] + $data['total_jasa_pemborongan_pm'] + $data['total_jasa_konsultansi_pm'] + $data['total_jasa_lain_pm'];
		// metode pemilihan pm
		$data['total_penunjukkan_langsung_pm'] = $this->Laporan_model->total_penunjukkan_langsung_pm();
		$data['total_transaksi_langsung_pm'] = $this->Laporan_model->total_transaksi_langsung_pm();
		$data['total_penetapan_langsung_pm'] = $this->Laporan_model->total_penetapan_langsung_pm();
		$data['total_tender_pm'] = $this->Laporan_model->total_tender_pm();
		$data['total_kesuluruhan_pm'] = $data['total_penunjukkan_langsung_pm'] + $data['total_transaksi_langsung_pm'] + $data['total_penetapan_langsung_pm'] + $data['total_tender_pm'];
		//total duit dan persentasi pm
		$data['total_kontrak_penunjukkan_langsung_pm'] = $this->Laporan_model->total_kontrak_penunjukkan_langsung_pm();
		$data['total_kontrak_transaksi_langsung_pm'] = $this->Laporan_model->total_kontrak_transaksi_langsung_pm();
		$data['total_kontrak_penetapan_langsung_pm'] = $this->Laporan_model->total_kontrak_penetapan_langsung_pm();
		$data['total_kontrak_tender_pm'] = $this->Laporan_model->total_kontrak_tender_pm();
		$data['total_kontrak_pm'] = $this->Laporan_model->total_kontrak_pm();
		$data['total_efisiensi_penunjukkan_langsung_pm'] = $this->Laporan_model->total_efisiensi_penunjukkan_langsung_pm();
		$data['total_efisiensi_transaksi_langsung_pm'] = $this->Laporan_model->total_efisiensi_transaksi_langsung_pm();
		$data['total_efisiensi_penetapan_langsung_pm'] = $this->Laporan_model->total_efisiensi_penetapan_langsung_pm();
		$data['total_efisiensi_tender_pm'] = $this->Laporan_model->total_efisiensi_tender_pm();
		$data['total_efesiensi_pm'] = $this->Laporan_model->total_efesiensi_pm();

		// jenis Pengadaan cpfta
		$data['total_barang_cpfta'] = $this->Beranda_model->total_barang_cpfta();
		$data['total_jasa_pemborongan_cpfta'] = $this->Beranda_model->total_jasa_pemborongan_cpfta();
		$data['total_jasa_konsultansi_cpfta'] = $this->Beranda_model->total_jasa_konsultansi_cpfta();
		$data['total_jasa_lain_cpfta'] = $this->Beranda_model->total_jasa_lain_cpfta();
		$data['total_seluruh_jasa_barang_cpfta'] = $data['total_barang_cpfta'] + $data['total_jasa_pemborongan_cpfta'] + $data['total_jasa_konsultansi_cpfta'] + $data['total_jasa_lain_cpfta'];
		// metode pemilihan cpfta
		$data['total_penunjukkan_langsung_cpfta'] = $this->Laporan_model->total_penunjukkan_langsung_cpfta();
		$data['total_transaksi_langsung_cpfta'] = $this->Laporan_model->total_transaksi_langsung_cpfta();
		$data['total_penetapan_langsung_cpfta'] = $this->Laporan_model->total_penetapan_langsung_cpfta();
		$data['total_tender_cpfta'] = $this->Laporan_model->total_tender_cpfta();
		$data['total_kesuluruhan_cpfta'] = $data['total_penunjukkan_langsung_cpfta'] + $data['total_transaksi_langsung_cpfta'] + $data['total_penetapan_langsung_cpfta'] + $data['total_tender_cpfta'];
		//total duit dan persentasi cpfta
		$data['total_kontrak_penunjukkan_langsung_cpfta'] = $this->Laporan_model->total_kontrak_penunjukkan_langsung_cpfta();
		$data['total_kontrak_transaksi_langsung_cpfta'] = $this->Laporan_model->total_kontrak_transaksi_langsung_cpfta();
		$data['total_kontrak_penetapan_langsung_cpfta'] = $this->Laporan_model->total_kontrak_penetapan_langsung_cpfta();
		$data['total_kontrak_tender_cpfta'] = $this->Laporan_model->total_kontrak_tender_cpfta();
		$data['total_kontrak_cpfta'] = $this->Laporan_model->total_kontrak_cpfta();
		$data['total_efisiensi_penunjukkan_langsung_cpfta'] = $this->Laporan_model->total_efisiensi_penunjukkan_langsung_cpfta();
		$data['total_efisiensi_transaksi_langsung_cpfta'] = $this->Laporan_model->total_efisiensi_transaksi_langsung_cpfta();
		$data['total_efisiensi_penetapan_langsung_cpfta'] = $this->Laporan_model->total_efisiensi_penetapan_langsung_cpfta();
		$data['total_efisiensi_tender_cpfta'] = $this->Laporan_model->total_efisiensi_tender_cpfta();
		$data['total_efesiensi_cpfta'] = $this->Laporan_model->total_efesiensi_cpfta();

		// jenis Pengadaan rmq
		$data['total_barang_rmq'] = $this->Beranda_model->total_barang_rmq();
		$data['total_jasa_pemborongan_rmq'] = $this->Beranda_model->total_jasa_pemborongan_rmq();
		$data['total_jasa_konsultansi_rmq'] = $this->Beranda_model->total_jasa_konsultansi_rmq();
		$data['total_jasa_lain_rmq'] = $this->Beranda_model->total_jasa_lain_rmq();
		$data['total_seluruh_jasa_barang_rmq'] = $data['total_barang_rmq'] + $data['total_jasa_pemborongan_rmq'] + $data['total_jasa_konsultansi_rmq'] + $data['total_jasa_lain_rmq'];
		// metode pemilihan rmq
		$data['total_penunjukkan_langsung_rmq'] = $this->Laporan_model->total_penunjukkan_langsung_rmq();
		$data['total_transaksi_langsung_rmq'] = $this->Laporan_model->total_transaksi_langsung_rmq();
		$data['total_penetapan_langsung_rmq'] = $this->Laporan_model->total_penetapan_langsung_rmq();
		$data['total_tender_rmq'] = $this->Laporan_model->total_tender_rmq();
		$data['total_kesuluruhan_rmq'] = $data['total_penunjukkan_langsung_rmq'] + $data['total_transaksi_langsung_rmq'] + $data['total_penetapan_langsung_rmq'] + $data['total_tender_rmq'];
		//total duit dan persentasi rmq
		$data['total_kontrak_penunjukkan_langsung_rmq'] = $this->Laporan_model->total_kontrak_penunjukkan_langsung_rmq();
		$data['total_kontrak_transaksi_langsung_rmq'] = $this->Laporan_model->total_kontrak_transaksi_langsung_rmq();
		$data['total_kontrak_penetapan_langsung_rmq'] = $this->Laporan_model->total_kontrak_penetapan_langsung_rmq();
		$data['total_kontrak_tender_rmq'] = $this->Laporan_model->total_kontrak_tender_rmq();
		$data['total_kontrak_rmq'] = $this->Laporan_model->total_kontrak_rmq();
		$data['total_efisiensi_penunjukkan_langsung_rmq'] = $this->Laporan_model->total_efisiensi_penunjukkan_langsung_rmq();
		$data['total_efisiensi_transaksi_langsung_rmq'] = $this->Laporan_model->total_efisiensi_transaksi_langsung_rmq();
		$data['total_efisiensi_penetapan_langsung_rmq'] = $this->Laporan_model->total_efisiensi_penetapan_langsung_rmq();
		$data['total_efisiensi_tender_rmq'] = $this->Laporan_model->total_efisiensi_tender_rmq();
		$data['total_efesiensi_rmq'] = $this->Laporan_model->total_efesiensi_rmq();

		// jenis Pengadaan bd
		$data['total_barang_bd'] = $this->Beranda_model->total_barang_bd();
		$data['total_jasa_pemborongan_bd'] = $this->Beranda_model->total_jasa_pemborongan_bd();
		$data['total_jasa_konsultansi_bd'] = $this->Beranda_model->total_jasa_konsultansi_bd();
		$data['total_jasa_lain_bd'] = $this->Beranda_model->total_jasa_lain_bd();
		$data['total_seluruh_jasa_barang_bd'] = $data['total_barang_bd'] + $data['total_jasa_pemborongan_bd'] + $data['total_jasa_konsultansi_bd'] + $data['total_jasa_lain_bd'];
		// metode pemilihan bd
		$data['total_penunjukkan_langsung_bd'] = $this->Laporan_model->total_penunjukkan_langsung_bd();
		$data['total_transaksi_langsung_bd'] = $this->Laporan_model->total_transaksi_langsung_bd();
		$data['total_penetapan_langsung_bd'] = $this->Laporan_model->total_penetapan_langsung_bd();
		$data['total_tender_bd'] = $this->Laporan_model->total_tender_bd();
		$data['total_kesuluruhan_bd'] = $data['total_penunjukkan_langsung_bd'] + $data['total_transaksi_langsung_bd'] + $data['total_penetapan_langsung_bd'] + $data['total_tender_bd'];
		//total duit dan persentasi bd
		$data['total_kontrak_penunjukkan_langsung_bd'] = $this->Laporan_model->total_kontrak_penunjukkan_langsung_bd();
		$data['total_kontrak_transaksi_langsung_bd'] = $this->Laporan_model->total_kontrak_transaksi_langsung_bd();
		$data['total_kontrak_penetapan_langsung_bd'] = $this->Laporan_model->total_kontrak_penetapan_langsung_bd();
		$data['total_kontrak_tender_bd'] = $this->Laporan_model->total_kontrak_tender_bd();
		$data['total_kontrak_bd'] = $this->Laporan_model->total_kontrak_bd();
		$data['total_efisiensi_penunjukkan_langsung_bd'] = $this->Laporan_model->total_efisiensi_penunjukkan_langsung_bd();
		$data['total_efisiensi_transaksi_langsung_bd'] = $this->Laporan_model->total_efisiensi_transaksi_langsung_bd();
		$data['total_efisiensi_penetapan_langsung_bd'] = $this->Laporan_model->total_efisiensi_penetapan_langsung_bd();
		$data['total_efisiensi_tender_bd'] = $this->Laporan_model->total_efisiensi_tender_bd();
		$data['total_efesiensi_bd'] = $this->Laporan_model->total_efesiensi_bd();

		//total jenis pengadaan
		$data['total_barang'] = $this->Laporan_model->total_barang();
		$data['total_jasa_pemborongan'] = $this->Laporan_model->total_jasa_pemborongan();
		$data['total_jasa_konsultansi'] = $this->Laporan_model->total_jasa_konsultansi();
		$data['total_jasa_lain'] = $this->Laporan_model->total_jasa_lain();

		//total metopem
		$data['penunjukkan_langsung'] = $this->Laporan_model->total_penunjukkan_langsung();
		$data['transaksi_langsung'] = $this->Laporan_model->total_transaksi_langsung();
		$data['penetapan_langsung'] = $this->Laporan_model->total_penetapan_langsung();
		$data['tender'] = $this->Laporan_model->total_tender();

		//total kontrak
		$data['total_kontrak_penunjukkan_langsung'] = $this->Laporan_model->total_kontrak_penunjukkan_langsung();
		$data['total_kontrak_transaksi_langsung'] = $this->Laporan_model->total_kontrak_transaksi_langsung();
		$data['total_kontrak_penetapan_langsung'] = $this->Laporan_model->total_kontrak_penetapan_langsung();
		$data['total_kontrak_tender'] = $this->Laporan_model->total_kontrak_tender();

		//hps
		$data['total_hps_penunjukkan_langsung'] = $this->Laporan_model->total_hps_penunjukkan_langsung();
		$data['total_hps_transaksi_langsung'] = $this->Laporan_model->total_hps_transaksi_langsung();
		$data['total_hps_penetapan_langsung'] = $this->Laporan_model->total_hps_penetapan_langsung();
		$data['total_hps_tender'] = $this->Laporan_model->total_hps_tender();

		//ambil seluruh nilai kontrak
		$data['total_seluruh_kontrak'] = $this->Laporan_model->total_seluruh_kontrak();
		// $this->load->view('template/header');
		// $this->load->view('template/navlogin');
		$this->load->view('laporan/grafik_dan_rekap_pdf', $data);
		// $this->load->view('template/footer');
		// $this->load->view('laporan/ajax');
	}

	public function total_pdf()
	{
		// $this->load->view('template/header');
		// $this->load->view('template/navlogin');
		$data['laporan'] = $this->Laporan_model->get_all();
		$this->load->view('laporan/total_pdf', $data);
		// $this->load->view('template/footer');
		// $this->load->view('laporan/ajax');
	}

	public function kinerja_vendor()
	{
		$data['laporan_kinerja'] = $this->Laporan_model->laporan_kinerja();
		$this->load->view('template/header');
		$this->load->view('template/navlogin');
		$this->load->view('laporan/kinerja_vendor', $data);
		$this->load->view('template/footer');
		$this->load->view('laporan/ajax');
	}

	public function kinerja_vendor_pdf()
	{
		$data['laporan_kinerja'] = $this->Laporan_model->laporan_kinerja();
		$this->load->view('laporan/kinerja_vendor_pdf', $data);
	}

	public function daftarhitam()
	{
		$data['laporan_daftarhitam'] = $this->Laporan_model->laporan_daftarhitam();
		$this->load->view('template/header');
		$this->load->view('template/navlogin');
		$this->load->view('laporan/daftarhitam', $data);
		$this->load->view('template/footer');
		$this->load->view('laporan/ajax');
	}

	public function daftarhitam_pdf()
	{
		$data['laporan_daftarhitam'] = $this->Laporan_model->laporan_daftarhitam();
		$this->load->view('laporan/daftarhitam_pdf', $data);
	}

	public function jenis_pengadaan_doughnut_pdf()
	{
		$data['total_barang_semua_paket'] = $this->Laporan_model->total_barang_semua_paket();
		$data['total_pemborongan_semua_paket'] = $this->Laporan_model->total_pemborongan_semua_paket();
		$data['total_konsultansi_semua_paket'] = $this->Laporan_model->total_konsultansi_semua_paket();
		$data['total_lain_semua_paket'] = $this->Laporan_model->total_lain_semua_paket();
		$data['total_semua_paket_jenis_pengadaan'] = $data['total_barang_semua_paket'] + $data['total_pemborongan_semua_paket'] + $data['total_konsultansi_semua_paket'] + $data['total_lain_semua_paket'];
		$this->load->view('laporan/jenis_pengadaan_dougnut_pdf', $data);
		$this->load->view('laporan/ajax', $data);
	}

	public function jenis_pengadaan_bar_pdf()
	{
		$data['total_barang_semua_paket'] = $this->Laporan_model->total_barang_semua_paket();
		$data['total_pemborongan_semua_paket'] = $this->Laporan_model->total_pemborongan_semua_paket();
		$data['total_konsultansi_semua_paket'] = $this->Laporan_model->total_konsultansi_semua_paket();
		$data['total_lain_semua_paket'] = $this->Laporan_model->total_lain_semua_paket();
		$data['total_semua_paket_jenis_pengadaan'] = $data['total_barang_semua_paket'] + $data['total_pemborongan_semua_paket'] + $data['total_konsultansi_semua_paket'] + $data['total_lain_semua_paket'];
		$this->load->view('laporan/jenis_pengadaan_bar_pdf', $data);
		$this->load->view('laporan/ajax', $data);
	}

	public function jenis_pengadaan_polar_pdf()
	{
		$data['total_barang_semua_paket'] = $this->Laporan_model->total_barang_semua_paket();
		$data['total_pemborongan_semua_paket'] = $this->Laporan_model->total_pemborongan_semua_paket();
		$data['total_konsultansi_semua_paket'] = $this->Laporan_model->total_konsultansi_semua_paket();
		$data['total_lain_semua_paket'] = $this->Laporan_model->total_lain_semua_paket();
		$data['total_semua_paket_jenis_pengadaan'] = $data['total_barang_semua_paket'] + $data['total_pemborongan_semua_paket'] + $data['total_konsultansi_semua_paket'] + $data['total_lain_semua_paket'];
		$this->load->view('laporan/jenis_pengadaan_polar_pdf', $data);
		$this->load->view('laporan/ajax', $data);
	}

	public function jenis_pengadaan_pie_pdf()
	{
		$data['total_barang_semua_paket'] = $this->Laporan_model->total_barang_semua_paket();
		$data['total_pemborongan_semua_paket'] = $this->Laporan_model->total_pemborongan_semua_paket();
		$data['total_konsultansi_semua_paket'] = $this->Laporan_model->total_konsultansi_semua_paket();
		$data['total_lain_semua_paket'] = $this->Laporan_model->total_lain_semua_paket();
		$data['total_semua_paket_jenis_pengadaan'] = $data['total_barang_semua_paket'] + $data['total_pemborongan_semua_paket'] + $data['total_konsultansi_semua_paket'] + $data['total_lain_semua_paket'];
		$this->load->view('laporan/jenis_pengadaan_pie_pdf', $data);
		$this->load->view('laporan/ajax', $data);
	}

	public function nilai_kontrak_doughnut_pdf()
	{
		$data['kontrak_barang'] = $this->Laporan_model->kontrak_barang();
		$data['kontrak_pemborongan'] = $this->Laporan_model->kontrak_pemborongan();
		$data['kontrak_konsultansi'] = $this->Laporan_model->kontrak_konsultansi();
		$data['kontrak_lain'] = $this->Laporan_model->kontrak_lain();
		$this->load->view('laporan/nilai_kontrak_doughnut_pdf', $data);
		$this->load->view('laporan/ajax', $data);
	}

	public function nilai_kontrak_bar_pdf()
	{
		$data['kontrak_barang'] = $this->Laporan_model->kontrak_barang();
		$data['kontrak_pemborongan'] = $this->Laporan_model->kontrak_pemborongan();
		$data['kontrak_konsultansi'] = $this->Laporan_model->kontrak_konsultansi();
		$data['kontrak_lain'] = $this->Laporan_model->kontrak_lain();
		$this->load->view('laporan/nilai_kontrak_bar_pdf', $data);
		$this->load->view('laporan/ajax', $data);
	}

	public function nilai_kontrak_polar_pdf()
	{
		$data['kontrak_barang'] = $this->Laporan_model->kontrak_barang();
		$data['kontrak_pemborongan'] = $this->Laporan_model->kontrak_pemborongan();
		$data['kontrak_konsultansi'] = $this->Laporan_model->kontrak_konsultansi();
		$data['kontrak_lain'] = $this->Laporan_model->kontrak_lain();
		$this->load->view('laporan/nilai_kontrak_polar_pdf', $data);
		$this->load->view('laporan/ajax', $data);
	}

	public function nilai_kontrak_pie_pdf()
	{
		$data['kontrak_barang'] = $this->Laporan_model->kontrak_barang();
		$data['kontrak_pemborongan'] = $this->Laporan_model->kontrak_pemborongan();
		$data['kontrak_konsultansi'] = $this->Laporan_model->kontrak_konsultansi();
		$data['kontrak_lain'] = $this->Laporan_model->kontrak_lain();
		$this->load->view('laporan/nilai_kontrak_pie_pdf', $data);
		$this->load->view('laporan/ajax', $data);
	}

	public function getdata()
	{
		if (isset($_POST['start'], $_POST['draw'])) {

			$resultss = $this->Laporan_model->getdatatable();
			$data = [];
			$no = $_POST['start'];
			foreach ($resultss as $isi) {
				$get_pemenang = $this->Laporan_model->get_pemenang($isi->id_paket);
				$row = array();
				$row[] = ++$no;
				$row[] = $isi->kode_tender;
				$row[] = $isi->nama_jenis_pengadaan;
				$row[] = $isi->nama_metode_pemilihan;
				$row[] = date('F', strtotime($isi->tanggal_buat_rup));
				$row[] =
					date("Y", strtotime($isi->tanggal_buat_rup));
				$row[] = $isi->nama_paket;
				$row[] = $isi->nama_unit_kerja;
				if ($isi->hps) {
					$row[] = number_format($isi->hps, 2, ',', '.');
				} else {
					$row[] = 0;
				}


				if ($get_pemenang) {
					$row[] = $get_pemenang->username_vendor;
				} else {
					$row[] = '';
				}
				if ($isi->id_metode_pemilihan == 10 || $isi->id_metode_pemilihan == 9 || $isi->id_metode_pemilihan == 8) {
					$row[] = number_format($isi->negosiasi, 2, ',', '.');
				} else {
					if ($get_pemenang) {
						$row[] = number_format($get_pemenang->negosiasi, 2, ',', '.');
					} else {
						$row[] = '';
					}
				}


				if ($isi->id_metode_pemilihan == 10 || $isi->id_metode_pemilihan == 9 || $isi->id_metode_pemilihan == 8) {
					if ($isi->hps) {
						$row[] = number_format($isi->hps - $isi->negosiasi, 2, ',', '.');
					} else {
						$row[] = 0;
					}
				} else {
					if ($get_pemenang) {
						$row[] = number_format($isi->hps - $get_pemenang->negosiasi, 2, ',', '.');
					} else {
						$row[] = '';
					}
				}



				if ($isi->hps) {
					$total = $isi->hps - $get_pemenang->negosiasi;
				} else {
					$row[] = 0;
				}

				if ($isi->hps) {
					$row[] =  number_format($total / $isi->hps, 2);
				} else {
					$row[] = 0;
				}

				$row[] = $isi->nama_pegawai;
				$row[] = $isi->alasan_tender_batal . '' . $isi->alasan_tender_pengulanagan;
				$data[] = $row;
			}
			$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->Laporan_model->count_all_data(),
				"recordsFiltered" => $this->Laporan_model->count_filtered_data(),
				"data" => $data
			);
			$this->output->set_content_type('application/json')->set_output(json_encode($output));
		} else {
			$this->output->set_content_type('application/json')->set_output(json_encode(['error' => 'Missing parameters']));
		}
	}

	// LAPORAN TKDN

	function laporan_tkdn()
	{
		$data['laporan'] = $this->Laporan_model->get_all();
		$data['get_jenis_pengadaan'] = $this->Paket_model->get_jenis_pengadaan();
		$data['getdivisi'] = $this->Paket_model->get_devisi();
		$data['total_nilai_hps_paket'] = $this->Paket_model->total_nilai_hps_paket2();
		$data['total_nilai_negosiasi_paket'] = $this->Paket_model->total_nilai_negosiasi_paket2();
		$this->load->view('template/header');
		$this->load->view('template/navlogin');
		$this->load->view('laporan/laporan_tkdn', $data);
		$this->load->view('template/footer');
		$this->load->view('laporan/ajax');
	}

	public function getdata_tkdn()
	{
		$resultss = $this->Laporan_model->getdatatable_tkdn();
		$data = [];
		$no = $_POST['start'];
		foreach ($resultss as $isi) {
			$get_pemenang = $this->Laporan_model->get_pemenang_tkdn($isi->id_paket);
			$get_sumber_dana = $this->Laporan_model->get_sumber_dana($isi->id_paket);
			$row = array();
			$row[] = ++$no;
			$row[] = $isi->nama_paket;
			$row[] = $isi->nama_jenis_pengadaan;
			$row[] = $isi->nama_jenis_anggaran;
			$row[] = number_format($get_sumber_dana->total_hps, 2, ',', '.');
			$row[] = number_format($get_pemenang->negosiasi, 2, ',', '.');
			$row[] = number_format($get_pemenang->negosiasi, 2, ',', '.');

			if ($get_pemenang) {
				$row[] = $get_pemenang->nama_usaha;
			} else {
				$row[] = '';
			}
			$row[] = $get_pemenang->kualifikasi_usaha;
			$row[] = $isi->pencatatan;

			if ($isi->pencatatan == 'PDN') {
				$row[] = $isi->persen_pencatatan . ' %';
				$row[] = '0.00%';
				$row[] = '0.00%';
			} else if ($isi->pencatatan == 'PDN') {
				$row[] = '0.00%';
				$row[] = $isi->persen_pencatatan . ' %';
				$row[] = '0.00%';
			} else if ($isi->pencatatan == 'IMPORT') {
				$row[] = '0.00%';
				$row[] = '0.00%';
				$row[] = $isi->persen_pencatatan . ' %';
			}
			$row[] = $isi->persen_pencatatan . ' %';
			$row[] = '';
			$row[] = '';
			$row[] = '';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Laporan_model->count_all_data_tkdn(),
			"recordsFiltered" => $this->Laporan_model->count_filtered_data_tkdn(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}
}
