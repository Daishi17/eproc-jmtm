<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Beranda/Beranda_model');
		$this->load->model('Pegawai/Pegawai_model');
		$this->load->model('Rup/Rup_model');
		$this->load->model('Paket/Paket_model');
		$this->load->model('Laporan/Laporan_model');
		$this->load->model('Penilaian_vendor/Penilaian_vendor_model');
		$this->load->model('Progres_kinerja_tender/Progres_kinerja_vendor_model');
		$role = $this->session->userdata('id_role');
		if (!$role) {
			redirect('auth');
		} else {
		}
	}

	public function index()
	{



		$test_tender_berjalan  = $this->Beranda_model->count_selesai_tender();
		$j = 0;
		foreach ($test_tender_berjalan as $key => $value) {

			if ($value['selesai_semua_tender'] != NULL && date('Y-m-d H:i', strtotime($value['selesai_semua_tender'])) > date('Y-m-d H:i')) {
				// echo date('Y-m-d H:i', strtotime($convert));
				$data = [
					$value['selesai_semua_tender']
				];
				// var_dump($i++);
				// var_dump($i);
				$j++;
			}
		}
		$data['tender_berjalan_fix'] = $j;


		$session_agency = $this->session->userdata('id_unit_kerja2');
		$test_tender_selesai_agency  = $this->Beranda_model->count_selesai_tender_agency($session_agency);
		$k = 0;
		foreach ($test_tender_selesai_agency as $key => $value) {

			if ($value['selesai_semua_tender'] != NULL && date('Y-m-d H:i', strtotime($value['selesai_semua_tender'])) < date('Y-m-d H:i')) {
				// echo date('Y-m-d H:i', strtotime($convert));
				$data = [
					$value['selesai_semua_tender']
				];
				// var_dump($i++);
				// var_dump($i);
				$k++;
			}
		}
		$data['tender_selesai_fix_agency'] = $k;

		$test_tender_berjalan_agency  = $this->Beranda_model->count_selesai_tender_agency($session_agency);
		$l = 0;
		foreach ($test_tender_berjalan_agency as $key => $value) {

			if ($value['selesai_semua_tender'] != NULL && date('Y-m-d H:i', strtotime($value['selesai_semua_tender'])) > date('Y-m-d H:i')) {
				// echo date('Y-m-d H:i', strtotime($convert));
				$data = [
					$value['selesai_semua_tender']
				];
				// var_dump($i++);
				// var_dump($i);
				$l++;
			}
		}
		$data['tender_berjalan_fix_agency'] = $l;


		$data2['pegawai'] = $this->Pegawai_model->getByPanitia();
		// $data2['all_paket'] = $this->Penilaian_vendor_model->getAllPaket();


		$data2['tender_agency'] = $this->Beranda_model->getAgency();
		$data2['metode_pemilihan'] = $this->Beranda_model->get_metopem();
		$data2['get_vendor'] = $this->Beranda_model->get_vendor();
		$data2['get_vendor2'] = $this->Beranda_model->get_vendor2();
		$data2['get_vendor3'] = $this->Beranda_model->get_vendor3();

		$data['get_vendor'] = $this->Beranda_model->get_vendor();
		$data['get_vendor2'] = $this->Beranda_model->get_vendor2();
		$data['get_vendor3'] = $this->Beranda_model->get_vendor3();

		$data['hitung_pegawai'] = $this->Beranda_model->count_pegawai();
		$data['hitung_panitia'] = $this->Beranda_model->count_panitia();
		$data['hitung_divisi'] = $this->Beranda_model->count_divisi();
		$data['hitung_paket'] = $this->Beranda_model->count_paket();
		$data['hitung_rup'] = $this->Beranda_model->count_rup();
		$data['hitung_vendor'] = $this->Beranda_model->count_vendor();
		$data['hitung_agency'] = $this->Beranda_model->count_agency();

		// INI UNTUK TABLE DATA INFO DATTABLE BAWQAJ

		// jenis Pengadaan hcga
		$data['total_barang_hcga'] = $this->Beranda_model->total_barang_hcga();
		// $data['total_jasa_hcga'] = $this->Beranda_model->total_jasa_hcga();
		// $data['total_seluruh_jasa_barang_hcga'] = $data['total_barang_hcga'] + $data['total_jasa_hcga'];
		// metode pemilihan hcga
		$data['total_metode_pemilihan_langsung_hcga'] = $this->Beranda_model->total_metode_pemilihan_langsung_hcga();
		$data['total_metode_transaksi_langsung_hcga'] = $this->Beranda_model->total_metode_transaksi_langsung_hcga();
		$data['total_metode_seleksi_langsung_hcga'] = $this->Beranda_model->total_metode_seleksi_langsung_hcga();
		$data['total_metode_pemilhan_hcga'] = $data['total_metode_pemilihan_langsung_hcga'] + $data['total_metode_transaksi_langsung_hcga'] + $data['total_metode_seleksi_langsung_hcga'];

		// jenis Pengadaan pcr
		$data['total_barang_pcr'] = $this->Beranda_model->total_barang_pcr();
		// $data['total_jasa_pcr'] = $this->Beranda_model->total_jasa_pcr();
		// $data['total_seluruh_jasa_barang_pcr'] = $data['total_barang_pcr'] + $data['total_jasa_pcr'];
		// metode pemilihan pcr
		$data['total_metode_pemilihan_langsung_pcr'] = $this->Beranda_model->total_metode_pemilihan_langsung_pcr();
		$data['total_metode_transaksi_langsung_pcr'] = $this->Beranda_model->total_metode_transaksi_langsung_pcr();
		$data['total_metode_seleksi_langsung_pcr'] = $this->Beranda_model->total_metode_seleksi_langsung_pcr();
		$data['total_metode_pemilhan_pcr'] = $data['total_metode_pemilihan_langsung_pcr'] + $data['total_metode_transaksi_langsung_pcr'] + $data['total_metode_seleksi_langsung_pcr'];

		// jenis Pengadaan fta
		$data['total_barang_fta'] = $this->Beranda_model->total_barang_fta();
		// $data['total_jasa_fta'] = $this->Beranda_model->total_jasa_fta();
		// $data['total_seluruh_jasa_barang_fta'] = $data['total_barang_fta'] + $data['total_jasa_fta'];
		// metode pemilihan fta
		$data['total_metode_pemilihan_langsung_fta'] = $this->Beranda_model->total_metode_pemilihan_langsung_fta();
		$data['total_metode_transaksi_langsung_fta'] = $this->Beranda_model->total_metode_transaksi_langsung_fta();
		$data['total_metode_seleksi_langsung_fta'] = $this->Beranda_model->total_metode_seleksi_langsung_fta();
		$data['total_metode_pemilhan_fta'] = $data['total_metode_pemilihan_langsung_fta'] + $data['total_metode_transaksi_langsung_fta'] + $data['total_metode_seleksi_langsung_fta'];

		// jenis Pengadaan rms
		// $data['total_barang_rms'] = $this->Beranda_model->total_barang_rms();
		// $data['total_jasa_rms'] = $this->Beranda_model->total_jasa_rms();
		// $data['total_seluruh_jasa_barang_rms'] = $data['total_barang_rms'] + $data['total_jasa_rms'];
		// metode pemilihan rms
		$data['total_metode_pemilihan_langsung_rms'] = $this->Beranda_model->total_metode_pemilihan_langsung_rms();
		$data['total_metode_transaksi_langsung_rms'] = $this->Beranda_model->total_metode_transaksi_langsung_rms();
		$data['total_metode_seleksi_langsung_rms'] = $this->Beranda_model->total_metode_seleksi_langsung_rms();
		$data['total_metode_pemilhan_rms'] = $data['total_metode_pemilihan_langsung_rms'] + $data['total_metode_transaksi_langsung_rms'] + $data['total_metode_seleksi_langsung_rms'];

		// jenis Pengadaan amp
		$data['total_barang_amp'] = $this->Beranda_model->total_barang_amp();
		// $data['total_jasa_amp'] = $this->Beranda_model->total_jasa_amp();
		// $data['total_seluruh_jasa_barang_amp'] = $data['total_barang_amp'] + $data['total_jasa_amp'];
		// metode pemilihan amp
		$data['total_metode_pemilihan_langsung_amp'] = $this->Beranda_model->total_metode_pemilihan_langsung_amp();
		$data['total_metode_transaksi_langsung_amp'] = $this->Beranda_model->total_metode_transaksi_langsung_amp();
		$data['total_metode_seleksi_langsung_amp'] = $this->Beranda_model->total_metode_seleksi_langsung_amp();
		$data['total_metode_pemilhan_amp'] = $data['total_metode_pemilihan_langsung_amp'] + $data['total_metode_transaksi_langsung_amp'] + $data['total_metode_seleksi_langsung_amp'];

		// jenis Pengadaan pche
		// $data['total_barang_pche'] = $this->Beranda_model->total_barang_pche();
		// $data['total_jasa_pche'] = $this->Beranda_model->total_jasa_pche();
		// $data['total_seluruh_jasa_barang_pche'] = $data['total_barang_pche'] + $data['total_jasa_pche'];
		// metode pemilihan pche
		$data['total_metode_pemilihan_langsung_pche'] = $this->Beranda_model->total_metode_pemilihan_langsung_pche();
		$data['total_metode_transaksi_langsung_pche'] = $this->Beranda_model->total_metode_transaksi_langsung_pche();
		$data['total_metode_seleksi_langsung_pche'] = $this->Beranda_model->total_metode_seleksi_langsung_pche();
		$data['total_metode_pemilhan_pche'] = $data['total_metode_pemilihan_langsung_pche'] + $data['total_metode_transaksi_langsung_pche'] + $data['total_metode_seleksi_langsung_pche'];

		// jenis Pengadaan amtd
		// $data['total_barang_amtd'] = $this->Beranda_model->total_barang_amtd();
		// $data['total_jasa_amtd'] = $this->Beranda_model->total_jasa_amtd();
		// $data['total_seluruh_jasa_barang_amtd'] = $data['total_barang_amtd'] + $data['total_jasa_amtd'];
		// metode pemilihan amtd
		$data['total_metode_pemilihan_langsung_amtd'] = $this->Beranda_model->total_metode_pemilihan_langsung_amtd();
		$data['total_metode_transaksi_langsung_amtd'] = $this->Beranda_model->total_metode_transaksi_langsung_amtd();
		$data['total_metode_seleksi_langsung_amtd'] = $this->Beranda_model->total_metode_seleksi_langsung_amtd();
		$data['total_metode_pemilhan_amtd'] = $data['total_metode_pemilihan_langsung_amtd'] + $data['total_metode_transaksi_langsung_amtd'] + $data['total_metode_seleksi_langsung_amtd'];

		// jenis Pengadaan op1
		// $data['total_barang_op1'] = $this->Beranda_model->total_barang_op1();
		// $data['total_jasa_op1'] = $this->Beranda_model->total_jasa_op1();
		// $data['total_seluruh_jasa_barang_op1'] = $data['total_barang_op1'] + $data['total_jasa_op1'];
		// metode pemilihan op1
		$data['total_metode_pemilihan_langsung_op1'] = $this->Beranda_model->total_metode_pemilihan_langsung_op1();
		$data['total_metode_transaksi_langsung_op1'] = $this->Beranda_model->total_metode_transaksi_langsung_op1();
		$data['total_metode_seleksi_langsung_op1'] = $this->Beranda_model->total_metode_seleksi_langsung_op1();
		$data['total_metode_pemilhan_op1'] = $data['total_metode_pemilihan_langsung_op1'] + $data['total_metode_transaksi_langsung_op1'] + $data['total_metode_seleksi_langsung_op1'];

		// jenis Pengadaan op2
		// $data['total_barang_op2'] = $this->Beranda_model->total_barang_op2();
		// $data['total_jasa_op2'] = $this->Beranda_model->total_jasa_op2();
		// $data['total_seluruh_jasa_barang_op2'] = $data['total_barang_op2'] + $data['total_jasa_op2'];
		// metode pemilihan op2
		$data['total_metode_pemilihan_langsung_op2'] = $this->Beranda_model->total_metode_pemilihan_langsung_op2();
		$data['total_metode_transaksi_langsung_op2'] = $this->Beranda_model->total_metode_transaksi_langsung_op2();
		$data['total_metode_seleksi_langsung_op2'] = $this->Beranda_model->total_metode_seleksi_langsung_op2();
		$data['total_metode_pemilhan_op2'] = $data['total_metode_pemilihan_langsung_op2'] + $data['total_metode_transaksi_langsung_op2'] + $data['total_metode_seleksi_langsung_op2'];

		// jenis Pengadaan op3
		// $data['total_barang_op3'] = $this->Beranda_model->total_barang_op3();
		// $data['total_jasa_op3'] = $this->Beranda_model->total_jasa_op3();
		// $data['total_seluruh_jasa_barang_op3'] = $data['total_barang_op3'] + $data['total_jasa_op3'];
		// metode pemilihan op3
		$data['total_metode_pemilihan_langsung_op3'] = $this->Beranda_model->total_metode_pemilihan_langsung_op3();
		$data['total_metode_transaksi_langsung_op3'] = $this->Beranda_model->total_metode_transaksi_langsung_op3();
		$data['total_metode_seleksi_langsung_op3'] = $this->Beranda_model->total_metode_seleksi_langsung_op3();
		$data['total_metode_pemilhan_op3'] = $data['total_metode_pemilihan_langsung_op3'] + $data['total_metode_transaksi_langsung_op3'] + $data['total_metode_seleksi_langsung_op3'];

		// jenis Pengadaan msa1
		// $data['total_barang_msa1'] = $this->Beranda_model->total_barang_msa1();
		// $data['total_jasa_msa1'] = $this->Beranda_model->total_jasa_msa1();
		// $data['total_seluruh_jasa_barang_msa1'] = $data['total_barang_msa1'] + $data['total_jasa_msa1'];
		// metode pemilihan msa1
		$data['total_metode_pemilihan_langsung_msa1'] = $this->Beranda_model->total_metode_pemilihan_langsung_msa1();
		$data['total_metode_transaksi_langsung_msa1'] = $this->Beranda_model->total_metode_transaksi_langsung_msa1();
		$data['total_metode_seleksi_langsung_msa1'] = $this->Beranda_model->total_metode_seleksi_langsung_msa1();
		$data['total_metode_pemilhan_msa1'] = $data['total_metode_pemilihan_langsung_msa1'] + $data['total_metode_transaksi_langsung_msa1'] + $data['total_metode_seleksi_langsung_msa1'];


		// jenis Pengadaan msa2
		// $data['total_barang_msa2'] = $this->Beranda_model->total_barang_msa2();
		// $data['total_jasa_msa2'] = $this->Beranda_model->total_jasa_msa2();
		// $data['total_seluruh_jasa_barang_msa2'] = $data['total_barang_msa2'] + $data['total_jasa_msa2'];
		// metode pemilihan msa2
		$data['total_metode_pemilihan_langsung_msa2'] = $this->Beranda_model->total_metode_pemilihan_langsung_msa2();
		$data['total_metode_transaksi_langsung_msa2'] = $this->Beranda_model->total_metode_transaksi_langsung_msa2();
		$data['total_metode_seleksi_langsung_msa2'] = $this->Beranda_model->total_metode_seleksi_langsung_msa2();
		$data['total_metode_pemilhan_msa2'] = $data['total_metode_pemilihan_langsung_msa2'] + $data['total_metode_transaksi_langsung_msa2'] + $data['total_metode_seleksi_langsung_msa2'];


		// jenis Pengadaan msa3
		// $data['total_barang_msa3'] = $this->Beranda_model->total_barang_msa3();
		// $data['total_jasa_msa3'] = $this->Beranda_model->total_jasa_msa3();
		// $data['total_seluruh_jasa_barang_msa3'] = $data['total_barang_msa3'] + $data['total_jasa_msa3'];
		// metode pemilihan msa3
		$data['total_metode_pemilihan_langsung_msa3'] = $this->Beranda_model->total_metode_pemilihan_langsung_msa3();
		$data['total_metode_transaksi_langsung_msa3'] = $this->Beranda_model->total_metode_transaksi_langsung_msa3();
		$data['total_metode_seleksi_langsung_msa3'] = $this->Beranda_model->total_metode_seleksi_langsung_msa3();
		$data['total_metode_pemilhan_msa3'] = $data['total_metode_pemilihan_langsung_msa3'] + $data['total_metode_transaksi_langsung_msa3'] + $data['total_metode_seleksi_langsung_msa3'];


		// jenis Pengadaan pm
		// $data['total_barang_pm'] = $this->Beranda_model->total_barang_pm();
		// $data['total_jasa_pm'] = $this->Beranda_model->total_jasa_pm();
		// $data['total_seluruh_jasa_barang_pm'] = $data['total_barang_pm'] + $data['total_jasa_pm'];
		// metode pemilihan pm
		$data['total_metode_pemilihan_langsung_pm'] = $this->Beranda_model->total_metode_pemilihan_langsung_pm();
		$data['total_metode_transaksi_langsung_pm'] = $this->Beranda_model->total_metode_transaksi_langsung_pm();
		$data['total_metode_seleksi_langsung_pm'] = $this->Beranda_model->total_metode_seleksi_langsung_pm();
		$data['total_metode_pemilhan_pm'] = $data['total_metode_pemilihan_langsung_pm'] + $data['total_metode_transaksi_langsung_pm'] + $data['total_metode_seleksi_langsung_pm'];

		// jenis Pengadaan cpfta
		// $data['total_barang_cpfta'] = $this->Beranda_model->total_barang_cpfta();
		// $data['total_jasa_cpfta'] = $this->Beranda_model->total_jasa_cpfta();
		// $data['total_seluruh_jasa_barang_cpfta'] = $data['total_barang_cpfta'] + $data['total_jasa_cpfta'];
		// metode pemilihan cpfta
		$data['total_metode_pemilihan_langsung_cpfta'] = $this->Beranda_model->total_metode_pemilihan_langsung_cpfta();
		$data['total_metode_transaksi_langsung_cpfta'] = $this->Beranda_model->total_metode_transaksi_langsung_cpfta();
		$data['total_metode_seleksi_langsung_cpfta'] = $this->Beranda_model->total_metode_seleksi_langsung_cpfta();
		$data['total_metode_pemilhan_cpfta'] = $data['total_metode_pemilihan_langsung_cpfta'] + $data['total_metode_transaksi_langsung_cpfta'] + $data['total_metode_seleksi_langsung_cpfta'];

		// jenis Pengadaan rmq
		// $data['total_barang_rmq'] = $this->Beranda_model->total_barang_rmq();
		// $data['total_jasa_rmq'] = $this->Beranda_model->total_jasa_rmq();
		// $data['total_seluruh_jasa_barang_rmq'] = $data['total_barang_rmq'] + $data['total_jasa_rmq'];
		// metode pemilihan rmq
		$data['total_metode_pemilihan_langsung_rmq'] = $this->Beranda_model->total_metode_pemilihan_langsung_rmq();
		$data['total_metode_transaksi_langsung_rmq'] = $this->Beranda_model->total_metode_transaksi_langsung_rmq();
		$data['total_metode_seleksi_langsung_rmq'] = $this->Beranda_model->total_metode_seleksi_langsung_rmq();
		$data['total_metode_pemilhan_rmq'] = $data['total_metode_pemilihan_langsung_rmq'] + $data['total_metode_transaksi_langsung_rmq'] + $data['total_metode_seleksi_langsung_rmq'];


		//tender yang sudah selesai
		$data['tender_selesai'] = $this->Beranda_model->hitung_tender_selesai();

		$data['tender_ulang'] = $this->Beranda_model->hitung_tender_ulang();

		$data['hcga'] = $this->Beranda_model->get_count_tender_hcga();
		$data['fta'] = $this->Beranda_model->get_count_tender_fta();
		$data['rmms'] = $this->Beranda_model->get_count_tender_rmms();
		$data['amp'] = $this->Beranda_model->get_count_tender_amp();
		$data['pcahe'] = $this->Beranda_model->get_count_tender_pcahe();
		$data['amtd'] = $this->Beranda_model->get_count_tender_amtd();
		$data['bd'] = $this->Beranda_model->get_count_tender_bd();
		$data['op1'] = $this->Beranda_model->get_count_tender_op1();
		$data['msa1'] = $this->Beranda_model->get_count_tender_msa1();
		$data['op2'] = $this->Beranda_model->get_count_tender_op2();
		$data['msa2'] = $this->Beranda_model->get_count_tender_msa2();
		$data['op3'] = $this->Beranda_model->get_count_tender_op3();
		$data['msa3'] = $this->Beranda_model->get_count_tender_msa3();
		$data['pm'] = $this->Beranda_model->get_count_tender_pm();
		$data['cpfta'] = $this->Beranda_model->get_count_tender_cpfta();
		$data['rmq'] = $this->Beranda_model->get_count_tender_rmq();
		$data['proc'] = $this->Beranda_model->get_count_tender_proc();

		$data['total_barang_semua_paket'] = $this->Laporan_model->total_barang_semua_paket();
		$data['total_pemborongan_semua_paket'] = $this->Laporan_model->total_pemborongan_semua_paket();
		$data['total_konsultansi_semua_paket'] = $this->Laporan_model->total_konsultansi_semua_paket();
		$data['total_lain_semua_paket'] = $this->Laporan_model->total_lain_semua_paket();

		// count non tender
		$data['transaksi_langsung_fix'] = $this->Beranda_model->count_transaksi_langsung();
		$data['penetapan_langsung_fix'] =  $this->Beranda_model->count_penetapan_langsung();
		$data['penunjukkan_langsung_fix'] =  $this->Beranda_model->count_penunjukkan_langsung();

		$data['total_nontender_fix'] = $data['transaksi_langsung_fix'] + $data['penetapan_langsung_fix'] + $data['penunjukkan_langsung_fix'];

		// count tender fix
		$data['total_tender_fix'] = $this->Beranda_model->count_tender_fix();

		//count belum di umumkan
		$data['status_belum_diumumkan'] = $this->Beranda_model->count_belum_diumumkan();


		//get session agency
		$session = $this->session->userdata('id_unit_kerja2');

		// count non tender sesuai agency
		$data['transaksi_langsung_fix_agency'] = $this->Beranda_model->count_transaksi_langsung_agency($session);
		$data['penetapan_langsung_fix_agency'] =  $this->Beranda_model->count_penetapan_langsung_agency($session);
		$data['penunjukkan_langsung_fix_agency'] =  $this->Beranda_model->count_penunjukkan_langsung_agency($session);

		$data['total_nontender_fix_agency'] = $data['transaksi_langsung_fix_agency'] + $data['penetapan_langsung_fix_agency'] + $data['penunjukkan_langsung_fix_agency'];

		// count tender fix sesuai agency
		$data['total_tender_fix_agency'] = $this->Beranda_model->count_tender_fix_agency($session);

		//count belum di umumkan agency
		$data['status_belum_diumumkan_agency'] = $this->Beranda_model->count_belum_diumumkan_agency($session);


		//count panitia agency
		$data['total_panitia_agency'] = $this->Beranda_model->count_total_panitia_agency($session);

		//total paket agency
		$data['total_paket_agency'] = $this->Beranda_model->count_paket_agency($session);


		//count vendor fix
		$data['total_vendor_fix'] = $this->Beranda_model->count_vendor_fix();

		$test_tender_selesai  = $this->Beranda_model->count_selesai_tender();
		$i = 0;
		foreach ($test_tender_selesai as $key => $value) {

			if ($value['selesai_semua_tender'] != NULL) {
				// echo date('Y-m-d H:i', strtotime($convert));
				if (date('Y-m-d H:i', strtotime($value['selesai_semua_tender'])) < date('Y-m-d H:i')) {
					# code...
					$i++;
				}
				// var_dump($i++);
				// var_dump($i);
			}
		}
		$data['tender_selesai_fix'] = $i;

		$session_agency = $this->session->userdata('id_unit_kerja2');
		$test_tender_selesai_agency  = $this->Beranda_model->count_selesai_tender_agency($session_agency);
		$k = 0;
		foreach ($test_tender_selesai_agency as $key => $value) {

			if ($value['selesai_semua_tender'] != NULL) {
				// echo date('Y-m-d H:i', strtotime($convert));
				if (date('Y-m-d H:i', strtotime($value['selesai_semua_tender'])) < date('Y-m-d H:i')) {
					# code...
					$k++;
				}
				// var_dump($i++);
				// var_dump($i);
				$k++;
			}
		}
		$data['tender_selesai_fix_agency'] = $k;

		$this->load->view('template/header');
		$this->load->view('template/navlogin');
		$this->load->view('beranda/index', $data);
		$this->load->view('template/footer');
		$this->load->view('beranda/ajax_chart', $data);
	}
	// batas index

	public function editidentitas()
	{
		$data = $this->Beranda_model->getAdmin();
		$this->load->view('template/header');
		$this->load->view('template/navlogin');
		$this->load->view('beranda/editidentitas', $data);
		$this->load->view('template/footer');
		$this->load->view('beranda/ajax');
	}


	// INI UNTUK PENILAIAN KINERJA VENDOR
	public function penilaian_kinerja()
	{
		$data['metode_pemilihan'] = $this->Rup_model->get_metode_pemilihan();
		$data['get_jenis_pengadaan'] = $this->Rup_model->get_jenis_pengadaan();
		$this->load->view('template_paket/header');
		$this->load->view('template/navlogin');
		$this->load->view('penilaian_kinerja/index', $data);
		$this->load->view('template_paket/footer');
		$this->load->view('penilaian_kinerja/ajax_table');
	}

	public function getdata_vendor_pemenang()
	{
		$role_agency = $this->session->userdata('id_pegawai');
		$area_agency = $this->session->userdata('id_unit_kerja2');
		$resultss = $this->Penilaian_vendor_model->getdatatable_vendor_pemenang($area_agency);
		$data = [];
		$no = $_POST['start'];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] = '<a class="text-primary" title="Beri Penilaian" href="#" onClick="byid(' . "'" . $angga->id_mengikuti_paket_vendor . "','kasih_penilaian'" . ')">' . $angga->username_vendor . '</a>';
			$row[] = "Rp " . number_format($angga->negosiasi, 2, ',', '.');
			$row[] = $angga->nama_jenis_pengadaan;
			$row[] = $angga->nama_metode_pemilihan;
			// Rating Keterangan Kinerja
			if ($angga->rating_penilaian_vendor == 3) {
				$row[] = '<i class="fas fa-star text-warning"></i> <i class="fas fa-star text-warning"></i> <i class="fas fa-star text-warning"></i>';
			} else if ($angga->rating_penilaian_vendor == 2) {
				$row[] = '<i class="fas fa-star text-warning"></i> <i class="fas fa-star text-warning"></i>';
			} else if ($angga->rating_penilaian_vendor == 1) {
				$row[] = '<i class="fas fa-star text-warning"></i>';
			} else if ($angga->rating_penilaian_vendor == 4) {
				$row[] =
					'<a class="badge badge-danger text-white">Kinerja Vendor Kurang Baik</a>';
			} else {
				$row[] = '<a class="badge badge-info text-white">Vendor Belum Di Nilai</a>';
			}
			// Status Keterangan Kinerja
			if ($angga->rating_penilaian_vendor == 3) {
				$row[] = '<a class="badge badge-success text-white">Sangat Baik</a>';
			} else if ($angga->rating_penilaian_vendor == 2) {
				$row[] = '<a class="badge badge-warning">Baik</a>';
			} else if ($angga->rating_penilaian_vendor == 1) {
				$row[] = '<a class="badge badge-warning text-white">Cukup Baik</a>';
			} else if ($angga->rating_penilaian_vendor == 4) {
				$row[] =
					'<a class="badge badge-danger text-white">Kurang Baik</a>';
			} else {
				$row[] = '<a class="badge badge-info text-white">Vendor Belum Di Nilai</a>';
			}
			// Status Warning
			if ($angga->status_warning_vendor == 1) {
				$row[] = '<img width="70px" src=' . base_url('assets/img/warning.png') . ' >';
			} else if ($angga->status_warning_vendor == 2) {
				$row[] = '<img width="70px" src=' . base_url('assets/img/blacklist.png') . ' >';
			} else {
				$row[] =
					'<img width="70px" src=' . base_url('assets/img/aman2.png') . ' >';
			}

			// Nilai Akhir
			if ($angga->rating_penilaian_vendor == 3) {
				$row[] = '<a class="btn btn-success btn-sm text-white">' . $angga->rating_nilai_akhir . '</a>';
			} else if ($angga->rating_penilaian_vendor == 2) {
				$row[] = '<a class="btn btn-warning btn-sm text-white">' . $angga->rating_nilai_akhir . '</a>';
			} else if ($angga->rating_penilaian_vendor == 1) {
				$row[] = '<a class="btn btn-warning btn-sm text-white">' . $angga->rating_nilai_akhir . '</a>';
			} else if ($angga->rating_penilaian_vendor == 4) {
				$row[] = '<a class="btn btn-danger btn-sm text-white">' . $angga->rating_nilai_akhir . '</a>';
			} else {
				$row[] = '<a class="badge badge-info text-white">Vendor Belum Di Nilai</a>';
			}


			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Penilaian_vendor_model->count_all_data_vendor_pemenang(),
			"recordsFiltered" => $this->Penilaian_vendor_model->count_filtered_data_vendor_pemenang($area_agency),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}
	public function byid($id_paket)
	{
		$role_agency = $this->session->userdata('id_pegawai');
		$area_agency = $this->session->userdata('id_unit_kerja2');
		$get_paket = $this->Penilaian_vendor_model->get_paket_data_vendor_pemenang($area_agency, $id_paket);

		$output = [
			"get_paket" => $get_paket,
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}
	public function penilaian_kinerja_vendor($id_paket)
	{
		$data['lokasi_kerja'] = $this->Penilaian_vendor_model->lokasi_pekerjaan($id_paket);
		$role_agency = $this->session->userdata('id_pegawai');
		$area_agency = $this->session->userdata('id_unit_kerja2');
		$data['data_pemenang'] = $this->Penilaian_vendor_model->get_paket_data_vendor_pemenang($area_agency, $id_paket);
		$id_vendor = $data['data_pemenang']['id_vendor'];
		$id_paket_vendor = $data['data_pemenang']['id_mengikuti_paket_vendor'];
		$data['vendor_mengikuti_paket'] = $this->Penilaian_vendor_model->get_paket_data_vendor_pemenang_mengikuti_paket($id_vendor, $id_paket_vendor);
		// BAGIAN PEKERJAAN KONTRIKSI================
		$data['cek_jika_ada_pekerjaan_kontruksi_aspek1'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_kontruksi_indikator1($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_kontruksi_aspek2'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_kontruksi_indikator2($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_kontruksi_aspek3'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_kontruksi_indikator3($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_kontruksi_aspek4'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_kontruksi_indikator4($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_kontruksi_aspek5'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_kontruksi_indikator5($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_kontruksi_aspek6'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_kontruksi_indikator6($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_kontruksi_aspek7'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_kontruksi_indikator7($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_kontruksi_aspek8'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_kontruksi_indikator8($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_kontruksi_aspek9'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_kontruksi_indikator9($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_kontruksi_aspek10'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_kontruksi_indikator10($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_kontruksi_aspek11'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_kontruksi_indikator11($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_kontruksi_aspek12'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_kontruksi_indikator12($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_kontruksi_aspek13'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_kontruksi_indikator13($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_kontruksi_aspek14'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_kontruksi_indikator14($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_kontruksi_aspek15'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_kontruksi_indikator15($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_kontruksi_aspek16'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_kontruksi_indikator16($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_kontruksi_aspek17'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_kontruksi_indikator17($id_paket, $id_vendor);
		$tbl_pekerjaan_kontruksi = $this->Penilaian_vendor_model->result_data_tbl_penilaian_kontruksi();
		$data['indikator1'] = $tbl_pekerjaan_kontruksi[0]['indikator_pekerjaan_kontruksi'];
		$data['indikator2'] = $tbl_pekerjaan_kontruksi[1]['indikator_pekerjaan_kontruksi'];
		$data['indikator3'] = $tbl_pekerjaan_kontruksi[2]['indikator_pekerjaan_kontruksi'];
		$data['indikator4'] = $tbl_pekerjaan_kontruksi[3]['indikator_pekerjaan_kontruksi'];
		$data['indikator5'] = $tbl_pekerjaan_kontruksi[4]['indikator_pekerjaan_kontruksi'];
		$data['indikator6'] = $tbl_pekerjaan_kontruksi[5]['indikator_pekerjaan_kontruksi'];
		$data['indikator7'] = $tbl_pekerjaan_kontruksi[6]['indikator_pekerjaan_kontruksi'];
		$data['indikator8'] = $tbl_pekerjaan_kontruksi[7]['indikator_pekerjaan_kontruksi'];
		$data['indikator9'] = $tbl_pekerjaan_kontruksi[8]['indikator_pekerjaan_kontruksi'];
		$data['indikator10'] = $tbl_pekerjaan_kontruksi[9]['indikator_pekerjaan_kontruksi'];
		$data['indikator11'] = $tbl_pekerjaan_kontruksi[10]['indikator_pekerjaan_kontruksi'];
		$data['indikator12'] = $tbl_pekerjaan_kontruksi[11]['indikator_pekerjaan_kontruksi'];
		$data['indikator13'] = $tbl_pekerjaan_kontruksi[12]['indikator_pekerjaan_kontruksi'];
		$data['indikator14'] = $tbl_pekerjaan_kontruksi[13]['indikator_pekerjaan_kontruksi'];
		$data['indikator15'] = $tbl_pekerjaan_kontruksi[14]['indikator_pekerjaan_kontruksi'];
		$data['indikator16'] = $tbl_pekerjaan_kontruksi[15]['indikator_pekerjaan_kontruksi'];
		$data['indikator17'] = $tbl_pekerjaan_kontruksi[16]['indikator_pekerjaan_kontruksi'];

		$data['boobot_pekerjaan_kontruksi1'] = $tbl_pekerjaan_kontruksi[0]['bobot_pekerjaan_kontruksi'];
		$data['boobot_pekerjaan_kontruksi2'] = $tbl_pekerjaan_kontruksi[1]['bobot_pekerjaan_kontruksi'];
		$data['boobot_pekerjaan_kontruksi3'] = $tbl_pekerjaan_kontruksi[2]['bobot_pekerjaan_kontruksi'];
		$data['boobot_pekerjaan_kontruksi4'] = $tbl_pekerjaan_kontruksi[3]['bobot_pekerjaan_kontruksi'];
		$data['boobot_pekerjaan_kontruksi5'] = $tbl_pekerjaan_kontruksi[4]['bobot_pekerjaan_kontruksi'];
		$data['boobot_pekerjaan_kontruksi6'] = $tbl_pekerjaan_kontruksi[5]['bobot_pekerjaan_kontruksi'];
		$data['boobot_pekerjaan_kontruksi7'] = $tbl_pekerjaan_kontruksi[6]['bobot_pekerjaan_kontruksi'];
		$data['boobot_pekerjaan_kontruksi8'] = $tbl_pekerjaan_kontruksi[7]['bobot_pekerjaan_kontruksi'];
		$data['boobot_pekerjaan_kontruksi9'] = $tbl_pekerjaan_kontruksi[8]['bobot_pekerjaan_kontruksi'];
		$data['boobot_pekerjaan_kontruksi10'] = $tbl_pekerjaan_kontruksi[9]['bobot_pekerjaan_kontruksi'];
		$data['boobot_pekerjaan_kontruksi11'] = $tbl_pekerjaan_kontruksi[10]['bobot_pekerjaan_kontruksi'];
		$data['boobot_pekerjaan_kontruksi12'] = $tbl_pekerjaan_kontruksi[11]['bobot_pekerjaan_kontruksi'];
		$data['boobot_pekerjaan_kontruksi13'] = $tbl_pekerjaan_kontruksi[12]['bobot_pekerjaan_kontruksi'];
		$data['boobot_pekerjaan_kontruksi14'] = $tbl_pekerjaan_kontruksi[13]['bobot_pekerjaan_kontruksi'];
		$data['boobot_pekerjaan_kontruksi15'] = $tbl_pekerjaan_kontruksi[14]['bobot_pekerjaan_kontruksi'];
		$data['boobot_pekerjaan_kontruksi16'] = $tbl_pekerjaan_kontruksi[15]['bobot_pekerjaan_kontruksi'];
		$data['boobot_pekerjaan_kontruksi17'] = $tbl_pekerjaan_kontruksi[16]['bobot_pekerjaan_kontruksi'];
		$data['jika_sudah_di_tambah_pekerjaan_kontruksi'] = $this->Penilaian_vendor_model->jika_sudah_di_tambah_pekerjaan_kontruksi($id_paket, $id_vendor);

		// BAGIAN PEKERJAAN KONTRIKSI================

		// BAGIAN KONSULTAN KONTRUKSI================
		$data['cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek1'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_konsultan_kontruksi_indikator1($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek2'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_konsultan_kontruksi_indikator2($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek3'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_konsultan_kontruksi_indikator3($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek4'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_konsultan_kontruksi_indikator4($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek5'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_konsultan_kontruksi_indikator5($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek6'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_konsultan_kontruksi_indikator6($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek7'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_konsultan_kontruksi_indikator7($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek8'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_konsultan_kontruksi_indikator8($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek9'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_konsultan_kontruksi_indikator9($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek10'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_konsultan_kontruksi_indikator10($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek11'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_konsultan_kontruksi_indikator11($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek12'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_konsultan_kontruksi_indikator12($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek13'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_konsultan_kontruksi_indikator13($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek14'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_konsultan_kontruksi_indikator14($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_konsultan_kontruksi_aspek15'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_konsultan_kontruksi_indikator15($id_paket, $id_vendor);

		$tbl_pekerjaan_konsultan_kontruksi = $this->Penilaian_vendor_model->result_data_tbl_penilaian_konsultan_kontruksi();
		$data['indikator_pekerjaan_konsultan_kontruksi1'] = $tbl_pekerjaan_konsultan_kontruksi[0]['indikator_pekerjaan_konsultan_kontruksi'];
		$data['indikator_pekerjaan_konsultan_kontruksi2'] = $tbl_pekerjaan_konsultan_kontruksi[1]['indikator_pekerjaan_konsultan_kontruksi'];
		$data['indikator_pekerjaan_konsultan_kontruksi3'] = $tbl_pekerjaan_konsultan_kontruksi[2]['indikator_pekerjaan_konsultan_kontruksi'];
		$data['indikator_pekerjaan_konsultan_kontruksi4'] = $tbl_pekerjaan_konsultan_kontruksi[3]['indikator_pekerjaan_konsultan_kontruksi'];
		$data['indikator_pekerjaan_konsultan_kontruksi5'] = $tbl_pekerjaan_konsultan_kontruksi[4]['indikator_pekerjaan_konsultan_kontruksi'];
		$data['indikator_pekerjaan_konsultan_kontruksi6'] = $tbl_pekerjaan_konsultan_kontruksi[5]['indikator_pekerjaan_konsultan_kontruksi'];
		$data['indikator_pekerjaan_konsultan_kontruksi7'] = $tbl_pekerjaan_konsultan_kontruksi[6]['indikator_pekerjaan_konsultan_kontruksi'];
		$data['indikator_pekerjaan_konsultan_kontruksi8'] = $tbl_pekerjaan_konsultan_kontruksi[7]['indikator_pekerjaan_konsultan_kontruksi'];
		$data['indikator_pekerjaan_konsultan_kontruksi9'] = $tbl_pekerjaan_konsultan_kontruksi[8]['indikator_pekerjaan_konsultan_kontruksi'];
		$data['indikator_pekerjaan_konsultan_kontruksi10'] = $tbl_pekerjaan_konsultan_kontruksi[9]['indikator_pekerjaan_konsultan_kontruksi'];
		$data['indikator_pekerjaan_konsultan_kontruksi11'] = $tbl_pekerjaan_konsultan_kontruksi[10]['indikator_pekerjaan_konsultan_kontruksi'];
		$data['indikator_pekerjaan_konsultan_kontruksi12'] = $tbl_pekerjaan_konsultan_kontruksi[11]['indikator_pekerjaan_konsultan_kontruksi'];
		$data['indikator_pekerjaan_konsultan_kontruksi13'] = $tbl_pekerjaan_konsultan_kontruksi[12]['indikator_pekerjaan_konsultan_kontruksi'];
		$data['indikator_pekerjaan_konsultan_kontruksi14'] = $tbl_pekerjaan_konsultan_kontruksi[13]['indikator_pekerjaan_konsultan_kontruksi'];
		$data['indikator_pekerjaan_konsultan_kontruksi15'] = $tbl_pekerjaan_konsultan_kontruksi[14]['indikator_pekerjaan_konsultan_kontruksi'];

		$data['boobot_pekerjaan_konsultan_kontruksi1'] = $tbl_pekerjaan_konsultan_kontruksi[0]['bobot_pekerjaan_konsultan_kontruksi'];
		$data['boobot_pekerjaan_konsultan_kontruksi2'] = $tbl_pekerjaan_konsultan_kontruksi[1]['bobot_pekerjaan_konsultan_kontruksi'];
		$data['boobot_pekerjaan_konsultan_kontruksi3'] = $tbl_pekerjaan_konsultan_kontruksi[2]['bobot_pekerjaan_konsultan_kontruksi'];
		$data['boobot_pekerjaan_konsultan_kontruksi4'] = $tbl_pekerjaan_konsultan_kontruksi[3]['bobot_pekerjaan_konsultan_kontruksi'];
		$data['boobot_pekerjaan_konsultan_kontruksi5'] = $tbl_pekerjaan_konsultan_kontruksi[4]['bobot_pekerjaan_konsultan_kontruksi'];
		$data['boobot_pekerjaan_konsultan_kontruksi6'] = $tbl_pekerjaan_konsultan_kontruksi[5]['bobot_pekerjaan_konsultan_kontruksi'];
		$data['boobot_pekerjaan_konsultan_kontruksi7'] = $tbl_pekerjaan_konsultan_kontruksi[6]['bobot_pekerjaan_konsultan_kontruksi'];
		$data['boobot_pekerjaan_konsultan_kontruksi8'] = $tbl_pekerjaan_konsultan_kontruksi[7]['bobot_pekerjaan_konsultan_kontruksi'];
		$data['boobot_pekerjaan_konsultan_kontruksi9'] = $tbl_pekerjaan_konsultan_kontruksi[8]['bobot_pekerjaan_konsultan_kontruksi'];
		$data['boobot_pekerjaan_konsultan_kontruksi10'] = $tbl_pekerjaan_konsultan_kontruksi[9]['bobot_pekerjaan_konsultan_kontruksi'];
		$data['boobot_pekerjaan_konsultan_kontruksi11'] = $tbl_pekerjaan_konsultan_kontruksi[10]['bobot_pekerjaan_konsultan_kontruksi'];
		$data['boobot_pekerjaan_konsultan_kontruksi12'] = $tbl_pekerjaan_konsultan_kontruksi[11]['bobot_pekerjaan_konsultan_kontruksi'];
		$data['boobot_pekerjaan_konsultan_kontruksi13'] = $tbl_pekerjaan_konsultan_kontruksi[12]['bobot_pekerjaan_konsultan_kontruksi'];
		$data['boobot_pekerjaan_konsultan_kontruksi14'] = $tbl_pekerjaan_konsultan_kontruksi[13]['bobot_pekerjaan_konsultan_kontruksi'];
		$data['boobot_pekerjaan_konsultan_kontruksi15'] = $tbl_pekerjaan_konsultan_kontruksi[14]['bobot_pekerjaan_konsultan_kontruksi'];
		$data['jika_sudah_di_tambah_pekerjaan_konsultan_kontruksi'] = $this->Penilaian_vendor_model->jika_sudah_di_tambah_pekerjaan_konsultan_kontruksi($id_paket, $id_vendor);
		// BAGIAN KONSULTAN KONTRUKSI================

		// BAGIAN KONSULTAN KAJIAN KONTRUKSI================
		$data['cek_jika_ada_pekerjaan_kajian_konsultan_kontruksi_aspek1'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_konsultan_kajian_kontruksi_indikator1($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_kajian_konsultan_kontruksi_aspek2'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_konsultan_kajian_kontruksi_indikator2($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_kajian_konsultan_kontruksi_aspek3'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_konsultan_kajian_kontruksi_indikator3($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_kajian_konsultan_kontruksi_aspek4'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_konsultan_kajian_kontruksi_indikator4($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_kajian_konsultan_kontruksi_aspek5'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_konsultan_kajian_kontruksi_indikator5($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_kajian_konsultan_kontruksi_aspek6'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_konsultan_kajian_kontruksi_indikator6($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_kajian_konsultan_kontruksi_aspek7'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_konsultan_kajian_kontruksi_indikator7($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_kajian_konsultan_kontruksi_aspek8'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_konsultan_kajian_kontruksi_indikator8($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_kajian_konsultan_kontruksi_aspek9'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_konsultan_kajian_kontruksi_indikator9($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_kajian_konsultan_kontruksi_aspek10'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_konsultan_kajian_kontruksi_indikator10($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_kajian_konsultan_kontruksi_aspek11'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_konsultan_kajian_kontruksi_indikator11($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_kajian_konsultan_kontruksi_aspek12'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_konsultan_kajian_kontruksi_indikator12($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_kajian_konsultan_kontruksi_aspek13'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_konsultan_kajian_kontruksi_indikator13($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_kajian_konsultan_kontruksi_aspek14'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_konsultan_kajian_kontruksi_indikator14($id_paket, $id_vendor);

		$tbl_pekerjaan_kajian_konsultan_kontruksi = $this->Penilaian_vendor_model->result_data_tbl_penilaian_kajian_konsultan_kontruksi();
		$data['indikator_pekerjaan_kajian_konsultan_kontruksi1'] = $tbl_pekerjaan_kajian_konsultan_kontruksi[0]['indikator_pekerjaan_konsultan_kajian_kontruksi'];
		$data['indikator_pekerjaan_kajian_konsultan_kontruksi2'] = $tbl_pekerjaan_kajian_konsultan_kontruksi[1]['indikator_pekerjaan_konsultan_kajian_kontruksi'];
		$data['indikator_pekerjaan_kajian_konsultan_kontruksi3'] = $tbl_pekerjaan_kajian_konsultan_kontruksi[2]['indikator_pekerjaan_konsultan_kajian_kontruksi'];
		$data['indikator_pekerjaan_kajian_konsultan_kontruksi4'] = $tbl_pekerjaan_kajian_konsultan_kontruksi[3]['indikator_pekerjaan_konsultan_kajian_kontruksi'];
		$data['indikator_pekerjaan_kajian_konsultan_kontruksi5'] = $tbl_pekerjaan_kajian_konsultan_kontruksi[4]['indikator_pekerjaan_konsultan_kajian_kontruksi'];
		$data['indikator_pekerjaan_kajian_konsultan_kontruksi6'] = $tbl_pekerjaan_kajian_konsultan_kontruksi[5]['indikator_pekerjaan_konsultan_kajian_kontruksi'];
		$data['indikator_pekerjaan_kajian_konsultan_kontruksi7'] = $tbl_pekerjaan_kajian_konsultan_kontruksi[6]['indikator_pekerjaan_konsultan_kajian_kontruksi'];
		$data['indikator_pekerjaan_kajian_konsultan_kontruksi8'] = $tbl_pekerjaan_kajian_konsultan_kontruksi[7]['indikator_pekerjaan_konsultan_kajian_kontruksi'];
		$data['indikator_pekerjaan_kajian_konsultan_kontruksi9'] = $tbl_pekerjaan_kajian_konsultan_kontruksi[8]['indikator_pekerjaan_konsultan_kajian_kontruksi'];
		$data['indikator_pekerjaan_kajian_konsultan_kontruksi10'] = $tbl_pekerjaan_kajian_konsultan_kontruksi[9]['indikator_pekerjaan_konsultan_kajian_kontruksi'];
		$data['indikator_pekerjaan_kajian_konsultan_kontruksi11'] = $tbl_pekerjaan_kajian_konsultan_kontruksi[10]['indikator_pekerjaan_konsultan_kajian_kontruksi'];
		$data['indikator_pekerjaan_kajian_konsultan_kontruksi12'] = $tbl_pekerjaan_kajian_konsultan_kontruksi[11]['indikator_pekerjaan_konsultan_kajian_kontruksi'];
		$data['indikator_pekerjaan_kajian_konsultan_kontruksi13'] = $tbl_pekerjaan_kajian_konsultan_kontruksi[12]['indikator_pekerjaan_konsultan_kajian_kontruksi'];
		$data['indikator_pekerjaan_kajian_konsultan_kontruksi14'] = $tbl_pekerjaan_kajian_konsultan_kontruksi[13]['indikator_pekerjaan_konsultan_kajian_kontruksi'];

		$data['bobot_pekerjaan_kajian_konsultan_kontruksi1'] = $tbl_pekerjaan_kajian_konsultan_kontruksi[0]['bobot_pekerjaan_konsultan_kajian_kontruksi'];
		$data['bobot_pekerjaan_kajian_konsultan_kontruksi2'] = $tbl_pekerjaan_kajian_konsultan_kontruksi[1]['bobot_pekerjaan_konsultan_kajian_kontruksi'];
		$data['bobot_pekerjaan_kajian_konsultan_kontruksi3'] = $tbl_pekerjaan_kajian_konsultan_kontruksi[2]['bobot_pekerjaan_konsultan_kajian_kontruksi'];
		$data['bobot_pekerjaan_kajian_konsultan_kontruksi4'] = $tbl_pekerjaan_kajian_konsultan_kontruksi[3]['bobot_pekerjaan_konsultan_kajian_kontruksi'];
		$data['bobot_pekerjaan_kajian_konsultan_kontruksi5'] = $tbl_pekerjaan_kajian_konsultan_kontruksi[4]['bobot_pekerjaan_konsultan_kajian_kontruksi'];
		$data['bobot_pekerjaan_kajian_konsultan_kontruksi6'] = $tbl_pekerjaan_kajian_konsultan_kontruksi[5]['bobot_pekerjaan_konsultan_kajian_kontruksi'];
		$data['bobot_pekerjaan_kajian_konsultan_kontruksi7'] = $tbl_pekerjaan_kajian_konsultan_kontruksi[6]['bobot_pekerjaan_konsultan_kajian_kontruksi'];
		$data['bobot_pekerjaan_kajian_konsultan_kontruksi8'] = $tbl_pekerjaan_kajian_konsultan_kontruksi[7]['bobot_pekerjaan_konsultan_kajian_kontruksi'];
		$data['bobot_pekerjaan_kajian_konsultan_kontruksi9'] = $tbl_pekerjaan_kajian_konsultan_kontruksi[8]['bobot_pekerjaan_konsultan_kajian_kontruksi'];
		$data['bobot_pekerjaan_kajian_konsultan_kontruksi10'] = $tbl_pekerjaan_kajian_konsultan_kontruksi[9]['bobot_pekerjaan_konsultan_kajian_kontruksi'];
		$data['bobot_pekerjaan_kajian_konsultan_kontruksi11'] = $tbl_pekerjaan_kajian_konsultan_kontruksi[10]['bobot_pekerjaan_konsultan_kajian_kontruksi'];
		$data['bobot_pekerjaan_kajian_konsultan_kontruksi12'] = $tbl_pekerjaan_kajian_konsultan_kontruksi[11]['bobot_pekerjaan_konsultan_kajian_kontruksi'];
		$data['bobot_pekerjaan_kajian_konsultan_kontruksi13'] = $tbl_pekerjaan_kajian_konsultan_kontruksi[12]['bobot_pekerjaan_konsultan_kajian_kontruksi'];
		$data['bobot_pekerjaan_kajian_konsultan_kontruksi14'] = $tbl_pekerjaan_kajian_konsultan_kontruksi[13]['bobot_pekerjaan_konsultan_kajian_kontruksi'];
		$data['jika_sudah_di_tambah_pekerjaan_kajian_konsultan_kontruksi'] = $this->Penilaian_vendor_model->jika_sudah_di_tambah_pekerjaan_kajian_konsultan_kontruksi($id_paket, $id_vendor);
		// BAGIAN KONSULTAN KAJIAN KONTRUKSI================

		// BAGIAN KONSULTAN PENGAWASAN KONTRUKSI================

		$data['cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek1'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_konsultan_pengawasan_kontruksi_indikator1($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek2'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_konsultan_pengawasan_kontruksi_indikator2($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek3'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_konsultan_pengawasan_kontruksi_indikator3($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek4'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_konsultan_pengawasan_kontruksi_indikator4($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek5'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_konsultan_pengawasan_kontruksi_indikator5($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek6'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_konsultan_pengawasan_kontruksi_indikator6($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek7'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_konsultan_pengawasan_kontruksi_indikator7($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek8'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_konsultan_pengawasan_kontruksi_indikator8($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek9'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_konsultan_pengawasan_kontruksi_indikator9($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek10'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_konsultan_pengawasan_kontruksi_indikator10($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek11'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_konsultan_pengawasan_kontruksi_indikator11($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek12'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_konsultan_pengawasan_kontruksi_indikator12($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek13'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_konsultan_pengawasan_kontruksi_indikator13($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek14'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_konsultan_pengawasan_kontruksi_indikator14($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_konsultan_pengawas_kontruksi_aspek15'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_konsultan_pengawasan_kontruksi_indikator15($id_paket, $id_vendor);

		$tbl_pekerjaan_konsultan_pengawasan_kontruksi = $this->Penilaian_vendor_model->result_data_tbl_penilaian_pengawasan_konsultan_kontruksi();
		$data['indikator_konsultan_pengawas_kontruksi1'] = $tbl_pekerjaan_konsultan_pengawasan_kontruksi[0]['indikator_pekerjaan_konsultan_pengawasan_kontruksi'];
		$data['indikator_konsultan_pengawas_kontruksi2'] = $tbl_pekerjaan_konsultan_pengawasan_kontruksi[1]['indikator_pekerjaan_konsultan_pengawasan_kontruksi'];
		$data['indikator_konsultan_pengawas_kontruksi3'] = $tbl_pekerjaan_konsultan_pengawasan_kontruksi[2]['indikator_pekerjaan_konsultan_pengawasan_kontruksi'];
		$data['indikator_konsultan_pengawas_kontruksi4'] = $tbl_pekerjaan_konsultan_pengawasan_kontruksi[3]['indikator_pekerjaan_konsultan_pengawasan_kontruksi'];
		$data['indikator_konsultan_pengawas_kontruksi5'] = $tbl_pekerjaan_konsultan_pengawasan_kontruksi[4]['indikator_pekerjaan_konsultan_pengawasan_kontruksi'];
		$data['indikator_konsultan_pengawas_kontruksi6'] = $tbl_pekerjaan_konsultan_pengawasan_kontruksi[5]['indikator_pekerjaan_konsultan_pengawasan_kontruksi'];
		$data['indikator_konsultan_pengawas_kontruksi7'] = $tbl_pekerjaan_konsultan_pengawasan_kontruksi[6]['indikator_pekerjaan_konsultan_pengawasan_kontruksi'];
		$data['indikator_konsultan_pengawas_kontruksi8'] = $tbl_pekerjaan_konsultan_pengawasan_kontruksi[7]['indikator_pekerjaan_konsultan_pengawasan_kontruksi'];
		$data['indikator_konsultan_pengawas_kontruksi9'] = $tbl_pekerjaan_konsultan_pengawasan_kontruksi[8]['indikator_pekerjaan_konsultan_pengawasan_kontruksi'];
		$data['indikator_konsultan_pengawas_kontruksi10'] = $tbl_pekerjaan_konsultan_pengawasan_kontruksi[9]['indikator_pekerjaan_konsultan_pengawasan_kontruksi'];
		$data['indikator_konsultan_pengawas_kontruksi11'] = $tbl_pekerjaan_konsultan_pengawasan_kontruksi[10]['indikator_pekerjaan_konsultan_pengawasan_kontruksi'];
		$data['indikator_konsultan_pengawas_kontruksi12'] = $tbl_pekerjaan_konsultan_pengawasan_kontruksi[11]['indikator_pekerjaan_konsultan_pengawasan_kontruksi'];
		$data['indikator_konsultan_pengawas_kontruksi13'] = $tbl_pekerjaan_konsultan_pengawasan_kontruksi[12]['indikator_pekerjaan_konsultan_pengawasan_kontruksi'];
		$data['indikator_konsultan_pengawas_kontruksi14'] = $tbl_pekerjaan_konsultan_pengawasan_kontruksi[13]['indikator_pekerjaan_konsultan_pengawasan_kontruksi'];
		$data['indikator_konsultan_pengawas_kontruksi15'] = $tbl_pekerjaan_konsultan_pengawasan_kontruksi[14]['indikator_pekerjaan_konsultan_pengawasan_kontruksi'];

		$data['bobot_pekerjaan_konsultan_pengawas_kontruksi1'] = $tbl_pekerjaan_konsultan_pengawasan_kontruksi[0]['bobot_pekerjaan_konsultan_pengawasan_kontruksi'];
		$data['bobot_pekerjaan_konsultan_pengawas_kontruksi2'] = $tbl_pekerjaan_konsultan_pengawasan_kontruksi[1]['bobot_pekerjaan_konsultan_pengawasan_kontruksi'];
		$data['bobot_pekerjaan_konsultan_pengawas_kontruksi3'] = $tbl_pekerjaan_konsultan_pengawasan_kontruksi[2]['bobot_pekerjaan_konsultan_pengawasan_kontruksi'];
		$data['bobot_pekerjaan_konsultan_pengawas_kontruksi4'] = $tbl_pekerjaan_konsultan_pengawasan_kontruksi[3]['bobot_pekerjaan_konsultan_pengawasan_kontruksi'];
		$data['bobot_pekerjaan_konsultan_pengawas_kontruksi5'] = $tbl_pekerjaan_konsultan_pengawasan_kontruksi[4]['bobot_pekerjaan_konsultan_pengawasan_kontruksi'];
		$data['bobot_pekerjaan_konsultan_pengawas_kontruksi6'] = $tbl_pekerjaan_konsultan_pengawasan_kontruksi[5]['bobot_pekerjaan_konsultan_pengawasan_kontruksi'];
		$data['bobot_pekerjaan_konsultan_pengawas_kontruksi7'] = $tbl_pekerjaan_konsultan_pengawasan_kontruksi[6]['bobot_pekerjaan_konsultan_pengawasan_kontruksi'];
		$data['bobot_pekerjaan_konsultan_pengawas_kontruksi8'] = $tbl_pekerjaan_konsultan_pengawasan_kontruksi[7]['bobot_pekerjaan_konsultan_pengawasan_kontruksi'];
		$data['bobot_pekerjaan_konsultan_pengawas_kontruksi9'] = $tbl_pekerjaan_konsultan_pengawasan_kontruksi[8]['bobot_pekerjaan_konsultan_pengawasan_kontruksi'];
		$data['bobot_pekerjaan_konsultan_pengawas_kontruksi10'] = $tbl_pekerjaan_konsultan_pengawasan_kontruksi[9]['bobot_pekerjaan_konsultan_pengawasan_kontruksi'];
		$data['bobot_pekerjaan_konsultan_pengawas_kontruksi11'] = $tbl_pekerjaan_konsultan_pengawasan_kontruksi[10]['bobot_pekerjaan_konsultan_pengawasan_kontruksi'];
		$data['bobot_pekerjaan_konsultan_pengawas_kontruksi12'] = $tbl_pekerjaan_konsultan_pengawasan_kontruksi[11]['bobot_pekerjaan_konsultan_pengawasan_kontruksi'];
		$data['bobot_pekerjaan_konsultan_pengawas_kontruksi13'] = $tbl_pekerjaan_konsultan_pengawasan_kontruksi[12]['bobot_pekerjaan_konsultan_pengawasan_kontruksi'];
		$data['bobot_pekerjaan_konsultan_pengawas_kontruksi14'] = $tbl_pekerjaan_konsultan_pengawasan_kontruksi[13]['bobot_pekerjaan_konsultan_pengawasan_kontruksi'];
		$data['bobot_pekerjaan_konsultan_pengawas_kontruksi15'] = $tbl_pekerjaan_konsultan_pengawasan_kontruksi[14]['bobot_pekerjaan_konsultan_pengawasan_kontruksi'];
		$data['jika_sudah_di_tambah_pekerjaan_konsultan_pengawas_kontruksi'] = $this->Penilaian_vendor_model->jika_sudah_di_tambah_pekerjaan_pengawasan_konsultan_kontruksi($id_paket, $id_vendor);
		// BAGIAN KONSULTAN PENGAWASAN KONTRUKSI================



		// BAGIAN JASA LAINYA================
		$data['cek_jika_ada_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek1'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_jasa_lainya_indikator1($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek2'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_jasa_lainya_indikator2($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek3'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_jasa_lainya_indikator3($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek4'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_jasa_lainya_indikator4($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek5'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_jasa_lainya_indikator5($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek6'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_jasa_lainya_indikator6($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek7'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_jasa_lainya_indikator7($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek8'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_jasa_lainya_indikator8($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek9'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_jasa_lainya_indikator9($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek10'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_jasa_lainya_indikator10($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek11'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_jasa_lainya_indikator11($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek12'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_jasa_lainya_indikator12($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_konsultan_jasa_lainya_kontruksi_aspek13'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_jasa_lainya_indikator13($id_paket, $id_vendor);


		$tbl_pekerjaan_konsultan_jasalainya_kontruksi = $this->Penilaian_vendor_model->result_data_tbl_penilaian_konsultan_jasa_lainya_kontruksi();
		$data['indikator_konsultan_jasa_lainya_kontruksi1'] = $tbl_pekerjaan_konsultan_jasalainya_kontruksi[0]['indikator_pekerjaan_jasa_lainya'];
		$data['indikator_konsultan_jasa_lainya_kontruksi2'] = $tbl_pekerjaan_konsultan_jasalainya_kontruksi[1]['indikator_pekerjaan_jasa_lainya'];
		$data['indikator_konsultan_jasa_lainya_kontruksi3'] = $tbl_pekerjaan_konsultan_jasalainya_kontruksi[2]['indikator_pekerjaan_jasa_lainya'];
		$data['indikator_konsultan_jasa_lainya_kontruksi4'] = $tbl_pekerjaan_konsultan_jasalainya_kontruksi[3]['indikator_pekerjaan_jasa_lainya'];
		$data['indikator_konsultan_jasa_lainya_kontruksi5'] = $tbl_pekerjaan_konsultan_jasalainya_kontruksi[4]['indikator_pekerjaan_jasa_lainya'];
		$data['indikator_konsultan_jasa_lainya_kontruksi6'] = $tbl_pekerjaan_konsultan_jasalainya_kontruksi[5]['indikator_pekerjaan_jasa_lainya'];
		$data['indikator_konsultan_jasa_lainya_kontruksi7'] = $tbl_pekerjaan_konsultan_jasalainya_kontruksi[6]['indikator_pekerjaan_jasa_lainya'];
		$data['indikator_konsultan_jasa_lainya_kontruksi8'] = $tbl_pekerjaan_konsultan_jasalainya_kontruksi[7]['indikator_pekerjaan_jasa_lainya'];
		$data['indikator_konsultan_jasa_lainya_kontruksi9'] = $tbl_pekerjaan_konsultan_jasalainya_kontruksi[8]['indikator_pekerjaan_jasa_lainya'];
		$data['indikator_konsultan_jasa_lainya_kontruksi10'] = $tbl_pekerjaan_konsultan_jasalainya_kontruksi[9]['indikator_pekerjaan_jasa_lainya'];
		$data['indikator_konsultan_jasa_lainya_kontruksi11'] = $tbl_pekerjaan_konsultan_jasalainya_kontruksi[10]['indikator_pekerjaan_jasa_lainya'];
		$data['indikator_konsultan_jasa_lainya_kontruksi12'] = $tbl_pekerjaan_konsultan_jasalainya_kontruksi[11]['indikator_pekerjaan_jasa_lainya'];
		$data['indikator_konsultan_jasa_lainya_kontruksi13'] = $tbl_pekerjaan_konsultan_jasalainya_kontruksi[12]['indikator_pekerjaan_jasa_lainya'];

		$data['boobot_pekerjaan_konsultan_jasa_lainya_kontruksi1'] = $tbl_pekerjaan_konsultan_jasalainya_kontruksi[0]['bobot_pekerjaan_jasa_lainya'];
		$data['boobot_pekerjaan_konsultan_jasa_lainya_kontruksi2'] = $tbl_pekerjaan_konsultan_jasalainya_kontruksi[1]['bobot_pekerjaan_jasa_lainya'];
		$data['boobot_pekerjaan_konsultan_jasa_lainya_kontruksi3'] = $tbl_pekerjaan_konsultan_jasalainya_kontruksi[2]['bobot_pekerjaan_jasa_lainya'];
		$data['boobot_pekerjaan_konsultan_jasa_lainya_kontruksi4'] = $tbl_pekerjaan_konsultan_jasalainya_kontruksi[3]['bobot_pekerjaan_jasa_lainya'];
		$data['boobot_pekerjaan_konsultan_jasa_lainya_kontruksi5'] = $tbl_pekerjaan_konsultan_jasalainya_kontruksi[4]['bobot_pekerjaan_jasa_lainya'];
		$data['boobot_pekerjaan_konsultan_jasa_lainya_kontruksi6'] = $tbl_pekerjaan_konsultan_jasalainya_kontruksi[5]['bobot_pekerjaan_jasa_lainya'];
		$data['boobot_pekerjaan_konsultan_jasa_lainya_kontruksi7'] = $tbl_pekerjaan_konsultan_jasalainya_kontruksi[6]['bobot_pekerjaan_jasa_lainya'];
		$data['boobot_pekerjaan_konsultan_jasa_lainya_kontruksi8'] = $tbl_pekerjaan_konsultan_jasalainya_kontruksi[7]['bobot_pekerjaan_jasa_lainya'];
		$data['boobot_pekerjaan_konsultan_jasa_lainya_kontruksi9'] = $tbl_pekerjaan_konsultan_jasalainya_kontruksi[8]['bobot_pekerjaan_jasa_lainya'];
		$data['boobot_pekerjaan_konsultan_jasa_lainya_kontruksi10'] = $tbl_pekerjaan_konsultan_jasalainya_kontruksi[9]['bobot_pekerjaan_jasa_lainya'];
		$data['boobot_pekerjaan_konsultan_jasa_lainya_kontruksi11'] = $tbl_pekerjaan_konsultan_jasalainya_kontruksi[10]['bobot_pekerjaan_jasa_lainya'];
		$data['boobot_pekerjaan_konsultan_jasa_lainya_kontruksi12'] = $tbl_pekerjaan_konsultan_jasalainya_kontruksi[11]['bobot_pekerjaan_jasa_lainya'];
		$data['boobot_pekerjaan_konsultan_jasa_lainya_kontruksi13'] = $tbl_pekerjaan_konsultan_jasalainya_kontruksi[12]['bobot_pekerjaan_jasa_lainya'];
		$data['jika_sudah_di_tambah_pekerjaan_konsultan_jasa_lainya_kontruksi'] = $this->Penilaian_vendor_model->jika_sudah_di_tambah_pekerjaan_konsultan_jasa_lainya_kontruksi($id_paket, $id_vendor);

		// BAGIAN JASA LAINYA================



		// BAGIAN PENYEDIA BARANG================
		$data['cek_jika_ada_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek1'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_penyedia_barang_indikator1($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek2'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_penyedia_barang_indikator2($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek3'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_penyedia_barang_indikator3($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek4'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_penyedia_barang_indikator4($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek5'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_penyedia_barang_indikator5($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek6'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_penyedia_barang_indikator6($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek7'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_penyedia_barang_indikator7($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek8'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_penyedia_barang_indikator8($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek9'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_penyedia_barang_indikator9($id_paket, $id_vendor);
		$data['cek_jika_ada_pekerjaan_konsultan_penyedia_barang_kontruksi_aspek10'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_penyedia_barang_indikator10($id_paket, $id_vendor);

		$tbl_pekerjaan_konsultan_penyedia_barang_kontruksi = $this->Penilaian_vendor_model->result_data_tbl_penilaian_konsultan_penyedia_barang_kontruksi();
		$data['indikator_konsultan_penyedia_barang_kontruksi1'] = $tbl_pekerjaan_konsultan_penyedia_barang_kontruksi[0]['indikator_pekerjaan_penyedia_barang'];
		$data['indikator_konsultan_penyedia_barang_kontruksi2'] = $tbl_pekerjaan_konsultan_penyedia_barang_kontruksi[1]['indikator_pekerjaan_penyedia_barang'];
		$data['indikator_konsultan_penyedia_barang_kontruksi3'] = $tbl_pekerjaan_konsultan_penyedia_barang_kontruksi[2]['indikator_pekerjaan_penyedia_barang'];
		$data['indikator_konsultan_penyedia_barang_kontruksi4'] = $tbl_pekerjaan_konsultan_penyedia_barang_kontruksi[3]['indikator_pekerjaan_penyedia_barang'];
		$data['indikator_konsultan_penyedia_barang_kontruksi5'] = $tbl_pekerjaan_konsultan_penyedia_barang_kontruksi[4]['indikator_pekerjaan_penyedia_barang'];
		$data['indikator_konsultan_penyedia_barang_kontruksi6'] = $tbl_pekerjaan_konsultan_penyedia_barang_kontruksi[5]['indikator_pekerjaan_penyedia_barang'];
		$data['indikator_konsultan_penyedia_barang_kontruksi7'] = $tbl_pekerjaan_konsultan_penyedia_barang_kontruksi[6]['indikator_pekerjaan_penyedia_barang'];
		$data['indikator_konsultan_penyedia_barang_kontruksi8'] = $tbl_pekerjaan_konsultan_penyedia_barang_kontruksi[7]['indikator_pekerjaan_penyedia_barang'];
		$data['indikator_konsultan_penyedia_barang_kontruksi9'] = $tbl_pekerjaan_konsultan_penyedia_barang_kontruksi[8]['indikator_pekerjaan_penyedia_barang'];
		$data['indikator_konsultan_penyedia_barang_kontruksi10'] = $tbl_pekerjaan_konsultan_penyedia_barang_kontruksi[9]['indikator_pekerjaan_penyedia_barang'];

		$data['boobot_pekerjaan_konsultan_penyedia_barang_kontruksi1'] = $tbl_pekerjaan_konsultan_penyedia_barang_kontruksi[0]['bobot_pekerjaan_penyedia_barang'];
		$data['boobot_pekerjaan_konsultan_penyedia_barang_kontruksi2'] = $tbl_pekerjaan_konsultan_penyedia_barang_kontruksi[1]['bobot_pekerjaan_penyedia_barang'];
		$data['boobot_pekerjaan_konsultan_penyedia_barang_kontruksi3'] = $tbl_pekerjaan_konsultan_penyedia_barang_kontruksi[2]['bobot_pekerjaan_penyedia_barang'];
		$data['boobot_pekerjaan_konsultan_penyedia_barang_kontruksi4'] = $tbl_pekerjaan_konsultan_penyedia_barang_kontruksi[3]['bobot_pekerjaan_penyedia_barang'];
		$data['boobot_pekerjaan_konsultan_penyedia_barang_kontruksi5'] = $tbl_pekerjaan_konsultan_penyedia_barang_kontruksi[4]['bobot_pekerjaan_penyedia_barang'];
		$data['boobot_pekerjaan_konsultan_penyedia_barang_kontruksi6'] = $tbl_pekerjaan_konsultan_penyedia_barang_kontruksi[5]['bobot_pekerjaan_penyedia_barang'];
		$data['boobot_pekerjaan_konsultan_penyedia_barang_kontruksi7'] = $tbl_pekerjaan_konsultan_penyedia_barang_kontruksi[6]['bobot_pekerjaan_penyedia_barang'];
		$data['boobot_pekerjaan_konsultan_penyedia_barang_kontruksi8'] = $tbl_pekerjaan_konsultan_penyedia_barang_kontruksi[7]['bobot_pekerjaan_penyedia_barang'];
		$data['boobot_pekerjaan_konsultan_penyedia_barang_kontruksi9'] = $tbl_pekerjaan_konsultan_penyedia_barang_kontruksi[8]['bobot_pekerjaan_penyedia_barang'];
		$data['boobot_pekerjaan_konsultan_penyedia_barang_kontruksi10'] = $tbl_pekerjaan_konsultan_penyedia_barang_kontruksi[9]['bobot_pekerjaan_penyedia_barang'];
		$data['jika_sudah_di_tambah_pekerjaan_konsultan_penyedia_barang_kontruksi'] = $this->Penilaian_vendor_model->jika_sudah_di_tambah_pekerjaan_konsultan_penyedia_barang_kontruksi($id_paket, $id_vendor);

		// BAGIAN PENYEDIA BARANG================




		$this->load->view('template_paket/header');
		$this->load->view('template/navlogin');
		$this->load->view('penilaian_kinerja/penilaian_kinerja', $data);
		$this->load->view('template_paket/footer');
		$this->load->view('penilaian_kinerja/ajax');
	}



	// INI BAGIAN PROGRESSS KINERJA VENDORRR YANG TENDERNYA SEDANF DALAM PENGERJAAN

	public function progres_kinerja_vendor()
	{
		$data['metode_pemilihan'] = $this->Rup_model->get_metode_pemilihan();
		$data['get_jenis_pengadaan'] = $this->Rup_model->get_jenis_pengadaan();
		$this->load->view('template_paket/header');
		$this->load->view('template/navlogin');
		$this->load->view('progres_kinerja/index', $data);
		$this->load->view('template_paket/footer');
		$this->load->view('progres_kinerja/ajax');
	}


	public function getdata_vendor_pemenang_progres_tender()
	{
		$role_agency = $this->session->userdata('id_pegawai');
		$area_agency = $this->session->userdata('id_unit_kerja2');
		$resultss = $this->Penilaian_vendor_model->getdatatable_vendor_pemenang($area_agency);
		$data = [];
		$no = $_POST['start'];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] = $angga->username_vendor;
			$row[] = "Rp " . number_format($angga->negosiasi, 2, ',', '.');
			$row[] = $angga->nama_jenis_pengadaan;
			$row[] = $angga->nama_metode_pemilihan;
			if ($angga->tahap_selesai_dikerjakan_tender == 1) {
				$row[] = ' <label for="" class="badge badge-success">Pekerjaan Sudah Selesai</label>';
			} else {
				$row[] = '<label for="" class="badge badge-danger">Masih Dalam Pengerjaan</label>';
			}
			if ($angga->tahap_selesai_dikerjakan_tender == 1) {
				$row[]
					= '<a href="javascript:;" target="_blank" onClick="importpdf(' . $angga->id_mengikuti_paket_vendor . ')">' . '<img width="30px" src=' . base_url('assets/img/pdf.png') . ' >' . '</a>';
			} else {
				$row[] = '<label for="" class="badge badge-danger">Masih Dalam Pengerjaan</label>';
			}
			$row[] = '<a class="btn btn-sm btn-grad" title="Lihat Progres" href="#" onClick="byid(' . "'" . $angga->id_mengikuti_paket_vendor . "','lihat_progres'" . ')"><i class="fas fa-chart-line"></i> Lihat Progres</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Penilaian_vendor_model->count_all_data_vendor_pemenang(),
			"recordsFiltered" => $this->Penilaian_vendor_model->count_filtered_data_vendor_pemenang($area_agency),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function detail_progres_pengerjaan_tender($id_paket)
	{
		$data['lokasi_kerja'] = $this->Penilaian_vendor_model->lokasi_pekerjaan($id_paket);
		$role_agency = $this->session->userdata('id_pegawai');
		$area_agency = $this->session->userdata('id_unit_kerja2');
		$data['data_pemenang'] = $this->Penilaian_vendor_model->get_paket_data_vendor_pemenang($area_agency, $id_paket);
		$id_vendor = $data['data_pemenang']['id_vendor'];
		$id_paket = $data['data_pemenang']['id_mengikuti_paket_vendor'];
		$data['total_presentasi'] = $this->Progres_kinerja_vendor_model->total_nilai_persen_progres_kinerja($id_paket, $id_vendor);
		$this->load->view('template_paket/header');
		$this->load->view('template/navlogin');
		$this->load->view('progres_kinerja/detail_progres_kinerja', $data);
		$this->load->view('template_paket/footer');
		$this->load->view('progres_kinerja/ajax');
	}
	public function export_pdf_progres($id_paket)
	{
		$data['lokasi_kerja'] = $this->Penilaian_vendor_model->lokasi_pekerjaan($id_paket);
		$role_agency = $this->session->userdata('id_pegawai');
		$area_agency = $this->session->userdata('id_unit_kerja2');
		$data['data_pemenang'] = $this->Penilaian_vendor_model->get_paket_data_vendor_pemenang($area_agency, $id_paket);
		$id_vendor = $data['data_pemenang']['id_vendor'];
		$id_paket = $data['data_pemenang']['id_mengikuti_paket_vendor'];
		$data['report_progres'] = $this->Progres_kinerja_vendor_model->get_all_vendor_kinerja($id_paket, $id_vendor);
		$data['total_presentasi'] = $this->Progres_kinerja_vendor_model->total_nilai_persen_progres_kinerja($id_paket, $id_vendor);
		$this->load->view('progres_kinerja/export_pdf_progres', $data);
		$this->load->view('progres_kinerja/ajax');
	}


	// load progres
	public function load_progres_kinerja_tender($id_paket)
	{
		$data['lokasi_kerja'] = $this->Penilaian_vendor_model->lokasi_pekerjaan($id_paket);
		$role_agency = $this->session->userdata('id_pegawai');
		$area_agency = $this->session->userdata('id_unit_kerja2');
		$data['data_pemenang'] = $this->Penilaian_vendor_model->get_paket_data_vendor_pemenang($area_agency, $id_paket);
		$id_vendor = $data['data_pemenang']['id_vendor'];
		$id_paket = $data['data_pemenang']['id_mengikuti_paket_vendor'];
		$progres_vendor_kinerja = $this->Progres_kinerja_vendor_model->get_all_vendor_kinerja($id_paket, $id_vendor);
		$persentasi = $this->Progres_kinerja_vendor_model->total_nilai_persen_progres_kinerja($id_paket, $id_vendor);
		$output = [
			"kinerja" => $progres_vendor_kinerja,
			"persentasi" => $persentasi,
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function hapus_progres_kinerja($id_progres_pekerjaan_tender)
	{
		$data = $this->Progres_kinerja_vendor_model->hapus_progres_kinerja($id_progres_pekerjaan_tender);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function by_id_progres_vendor($id_progres_pekerjaan_tender)
	{
		$peogres_pekerjaan = $this->Progres_kinerja_vendor_model->by_id_progres_vendor($id_progres_pekerjaan_tender);
		$output = [
			"peogres_pekerjaan" => $peogres_pekerjaan,
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function kirim_komentar($id_paket)
	{
		$area_agency = $this->session->userdata('id_unit_kerja2');
		$paket = $this->Penilaian_vendor_model->get_paket_data_vendor_pemenang($area_agency, $id_paket);
		$id_vendor = $paket['id_vendor'];
		$nama_paket = $paket['nama_paket'];
		$nama_metode_pemilihan = $paket['nama_metode_pemilihan'];
		$id_paket = $paket['id_mengikuti_paket_vendor'];
		$id_progres_pekerjaan_tender = $this->input->post('id_progres_pekerjaan_tender');
		$alasan_progres = $this->input->post('alasan_progres');
		$where = [
			'id_progres_pekerjaan_tender' => $id_progres_pekerjaan_tender
		];
		$data = [
			'status_alasan_progres' => 1,
			'sudah_dibaca_perogres' => 0,
			'alasan_progres' => $alasan_progres
		];
		$this->Progres_kinerja_vendor_model->update_progres_vendor($data, $where);

		if ($paket['status_vendor_baru'] == null) {
			$email_vendor = $paket['email_usaha'];
			$telpon_vendor = $paket['telpon_usaha'];
		} else {
			$email_vendor = $paket['email_vendor'];
			$telpon_vendor = $paket['telpon_vendor'];
		}
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
		// Email dan nama pengirim
		$this->email->from('eproc@jmtm.co.id', 'JMTM');

		// Email penerima
		$this->email->to($email_vendor); // Ganti dengan email tujuan

		// Subject email
		$this->email->subject('E-PROCUREMENT JMTM PROGRES KINERJA');

		// Isi email
		$this->email->message("Laporan Progres Kinerja, Nama Paket : $nama_paket , Metode Pemilihan : $nama_metode_pemilihan , Komentar Agency : $alasan_progres , Cek Dan Login http://jmtm-eproc.kintekindo.net/");
		$this->email->send();

		$output = [
			"isi_komentar" => $alasan_progres,
			"paket" => $paket,
			"telpon" => $telpon_vendor
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}





	public function selesai_tender()
	{
		$id_paket = $this->input->post('id_paket');
		$id_vendor = $this->input->post('id_vendor');
		$where = [
			'id_mengikuti_paket_vendor' => $id_paket,
			'id_mengikuti_vendor' => $id_vendor
		];
		$data = [
			'tahap_selesai_dikerjakan_tender' => 1
		];
		$this->Progres_kinerja_vendor_model->update_selesai_tender($data, $where);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}



	// END BAGIAN PROGRESS KERJA




	// INI BAGIAN BARU PEKERJAAN KONTRUKSI
	public function tambah_warning_pekerjaan_kontruksisaya()
	{
		$id_paket = $this->input->post('id_paket', TRUE);
		$id_vendor = $this->input->post('id_vendor', TRUE);
		$indikator_pekerjaan_kontruksi = $this->input->post('indikator_pekerjaan_kontruksi', TRUE);
		$bobot_pekerjaan_kontruksi = $this->input->post('bobot_pekerjaan_kontruksi', TRUE);
		$penilaian_pekerjaan_kontruksi = $this->input->post('penilaian_kontruksi', TRUE);
		$nilai_akhir_pekerjaan_kontruksi = $this->input->post('nilai_akhir_pekerjaan_kontruksi', TRUE);
		// tbl_vendor mengikuti paket
		$rating_penilaian_vendor_pekerjaan_kontruksi = $this->input->post('rating_penilaian_vendor_pekerjaan_kontruksi');
		$status_rating_pekerjaan_kontruksi = $this->input->post('status_rating_pekerjaan_kontruksi');
		$status_nilai_akhir_pekerjaan_kontruksi = $this->input->post('status_nilai_akhir_pekerjaan_kontruksi');
		$area_agency = $this->session->userdata('id_unit_kerja2');
		$data['data_pemenang'] = $this->Penilaian_vendor_model->get_paket_data_vendor_pemenang($area_agency, $id_paket);
		$foroutput = $this->Penilaian_vendor_model->get_paket_data_vendor_pemenang($area_agency, $id_paket);
		$nama_paket = $foroutput['nama_paket'];
		$nama_metode_pemilihan = $foroutput['nama_metode_pemilihan'];
		$id_vendor2 = $data['data_pemenang']['id_mengikuti_vendor'];
		$id_paket_vendor = $data['data_pemenang']['id_mengikuti_paket_vendor'];
		$vendor_pemenag_by_id_pekerjaan_kontruksi = $this->Penilaian_vendor_model->by_id_vendor_pemenang_pekerjaan_kontruksi($id_vendor2, $id_paket_vendor);

		if ($vendor_pemenag_by_id_pekerjaan_kontruksi['status_warning_vendor'] == 1) {
			// ketable detail penilaian
			$result = array();
			foreach ($indikator_pekerjaan_kontruksi as $key => $val) {
				$result[] = array(
					'id_paket'   => $id_paket,
					'id_vendor'   => $id_vendor,
					'indikator_pekerjaan_kontruksi_detail'   => $indikator_pekerjaan_kontruksi[$key],
					'bobot_pekerjaan_kontruksi_detail'   => $bobot_pekerjaan_kontruksi[$key],
					'penilaian_kontruksi_detail'   =>  $penilaian_pekerjaan_kontruksi[$key],
					'nilai_akhir_pekerjaan_kontruksi_detail'   =>  $nilai_akhir_pekerjaan_kontruksi[$key],
				);
			}

			// ketable vendor mengkikuti paket
			$where = [
				'id_mengikuti_paket_vendor' => $id_paket,
				'id_mengikuti_vendor' => $id_vendor,
			];
			$data = [
				'rating_penilaian_vendor' => $rating_penilaian_vendor_pekerjaan_kontruksi,
				'status_rating' => $status_rating_pekerjaan_kontruksi,
				'status_rating_sudah_di_nilai' => 1,
				'status_jenis_penilayan' => 'kontruksi',
				'rating_nilai_akhir' => $status_nilai_akhir_pekerjaan_kontruksi,
			];

			// ke table vendor
			$where_tbl_vendor_warning = [
				'id_vendor' => $id_vendor,
			];
			$data_tbl_vendor_warning = [
				'status_warning_vendor' => 2,
			];
			// ini ketika di blacklist
			$data_blacklist_vendor = [
				'alasan_daftar_hitam' => "Mendapatakan Warning Ke 2 / Kinerja Vendor Kurang",
				'masa_berlaku_daftar_hitam_mulai' => date('d-m-Y H:i'),
				'masa_berlaku_daftar_hitam_selesai' => date('d-m-Y H:i', strtotime("+2 year")),
				'status_aktive_vendor' => 0,
				'status_daftar_hitam_vendor' => 1
			];

			$this->db->insert_batch('tbl_detaill_penilaian_kinerja_pekerjaan_kontruksi', $result);
			$this->Penilaian_vendor_model->update_ke_vendor($data_blacklist_vendor, $where_tbl_vendor_warning);
			$this->Penilaian_vendor_model->update_pekerjaan_kontruksi_vendor($data, $where);
			$this->Penilaian_vendor_model->update_status_warning_pekerjaan_kontruksi($data_tbl_vendor_warning, $where_tbl_vendor_warning);
			if ($foroutput['status_vendor_baru'] == null) {
				$email_vendor = $foroutput['email_usaha'];
				$telpon_vendor = $foroutput['telpon_usaha'];
			} else {
				$email_vendor = $foroutput['email_vendor'];
				$telpon_vendor = $foroutput['telpon_vendor'];
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
			// Email dan nama pengirim
			$this->email->from('eproc@jmtm.co.id', 'JMTM');

			// Email penerima
			$this->email->to($email_vendor); // Ganti dengan email tujuan

			// Subject email
			$this->email->subject('E-PROCUREMENT JMTM BLACKLIST!!! PENILAIAN KINERJA');

			// Isi email
			$this->email->message("Anda Mendapatkan Blacklist!!!, Anda Mendapatkan Warning Ke 2 Maka Anda Akan Kami Blacklist Selama 2 Tahun Pada Tender Jmtm E-procurement User Akan Kami NonAktifkan Sementara Sampai Hukuman 2 Tahun Blacklist Selesai, Nama Paket : $nama_paket , Metode Pemilihan : $nama_metode_pemilihan");
			$this->email->send();

			$output = [
				"isi" => "Anda Mendapatkan Blacklist!!!, Anda Mendapatkan Warning Ke 2 Maka Anda Akan Kami Blacklist Selama 2 Tahun Pada Tender Jmtm E-procurement User Akan Kami NonAktifkan Sementara Sampai Hukuman 2 Tahun Blacklist Selesai",
				"paket" => $foroutput,
				"telpon" => $telpon_vendor
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($output));
		} else {
			// ketable detail penilaian
			$result = array();
			foreach ($indikator_pekerjaan_kontruksi as $key => $val) {
				$result[] = array(
					'id_paket'   => $id_paket,
					'id_vendor'   => $id_vendor,
					'indikator_pekerjaan_kontruksi_detail'   => $indikator_pekerjaan_kontruksi[$key],
					'bobot_pekerjaan_kontruksi_detail'   => $bobot_pekerjaan_kontruksi[$key],
					'penilaian_kontruksi_detail'   =>  $penilaian_pekerjaan_kontruksi[$key],
					'nilai_akhir_pekerjaan_kontruksi_detail'   =>  $nilai_akhir_pekerjaan_kontruksi[$key],
				);
			}

			// ketable vendor mengkikuti paket
			$where = [
				'id_mengikuti_paket_vendor' => $id_paket,
				'id_mengikuti_vendor' => $id_vendor,
			];
			$data = [
				'rating_penilaian_vendor' => $rating_penilaian_vendor_pekerjaan_kontruksi,
				'status_rating' => $status_rating_pekerjaan_kontruksi,
				'status_rating_sudah_di_nilai' => 1,
				'status_jenis_penilayan' => 'kontruksi',
				'rating_nilai_akhir' => $status_nilai_akhir_pekerjaan_kontruksi,
			];

			// ke table vendor
			$where_tbl_vendor_warning = [
				'id_vendor' => $id_vendor,
			];
			$data_tbl_vendor_warning = [
				'status_warning_vendor' => 1,
			];
			$this->Penilaian_vendor_model->update_pekerjaan_kontruksi_vendor($data, $where);
			$this->db->insert_batch('tbl_detaill_penilaian_kinerja_pekerjaan_kontruksi', $result);
			$this->Penilaian_vendor_model->update_status_warning_pekerjaan_kontruksi($data_tbl_vendor_warning, $where_tbl_vendor_warning);

			if ($foroutput['status_vendor_baru'] == null) {
				$email_vendor = $foroutput['email_usaha'];
				$telpon_vendor = $foroutput['telpon_usaha'];
			} else {
				$email_vendor = $foroutput['email_vendor'];
				$telpon_vendor = $foroutput['telpon_vendor'];
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
			// Email dan nama pengirim
			$this->email->from('eproc@jmtm.co.id', 'JMTM');

			// Email penerima
			$this->email->to($email_vendor); // Ganti dengan email tujuan

			// Subject email
			$this->email->subject('E-PROCUREMENT JMTM WARNING!!! PENILAIAN KINERJA');

			// Isi email
			$this->email->message("Anda Mendapatkan Warning Ke 1, Perbaiki Kinerja Pada Tender Selanjutnya Jika Anda Mendapatkan Warning Ke 2 Maka Anda Akan Kami Blacklist Selama 2 Tahun Pada Tender Jmtm E-procurement, Nama Paket : $nama_paket , Metode Pemilihan : $nama_metode_pemilihan");
			$this->email->send();

			$output = [
				"isi" => "Anda Mendapatkan Warning Ke 1, Perbaiki Kinerja Pada Tender Selanjutnya Jika Anda Mendapatkan Warning Ke 2 Maka Anda Akan Kami Blacklist Selama 2 Tahun Pada Tender Jmtm E-procurement",
				"paket" => $foroutput,
				"telpon" => $telpon_vendor
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($output));
		}
	}
	public function tambah_pekerjaan_kontruksisaya()
	{

		$id_paket = $this->input->post('id_paket', TRUE);
		$id_vendor = $this->input->post('id_vendor', TRUE);
		$indikator_pekerjaan_kontruksi = $this->input->post('indikator_pekerjaan_kontruksi', TRUE);
		$bobot_pekerjaan_kontruksi = $this->input->post('bobot_pekerjaan_kontruksi', TRUE);
		$penilaian_pekerjaan_kontruksi = $this->input->post('penilaian_kontruksi', TRUE);
		$nilai_akhir_pekerjaan_kontruksi = $this->input->post('nilai_akhir_pekerjaan_kontruksi', TRUE);
		// tbl_vendor mengikuti paket
		$rating_penilaian_vendor_pekerjaan_kontruksi = $this->input->post('rating_penilaian_vendor_pekerjaan_kontruksi');
		$status_rating_pekerjaan_kontruksi = $this->input->post('status_rating_pekerjaan_kontruksi');
		$status_nilai_akhir_pekerjaan_kontruksi = $this->input->post('status_nilai_akhir_pekerjaan_kontruksi');

		$result = array();
		foreach ($indikator_pekerjaan_kontruksi as $key => $val) {
			$result[] = array(
				'id_paket'   => $id_paket,
				'id_vendor'   => $id_vendor,
				'indikator_pekerjaan_kontruksi_detail'   => $indikator_pekerjaan_kontruksi[$key],
				'bobot_pekerjaan_kontruksi_detail'   => $bobot_pekerjaan_kontruksi[$key],
				'penilaian_kontruksi_detail'   =>  $penilaian_pekerjaan_kontruksi[$key],
				'nilai_akhir_pekerjaan_kontruksi_detail'   =>  $nilai_akhir_pekerjaan_kontruksi[$key],
			);
		}

		$where = [
			'id_mengikuti_paket_vendor' => $id_paket,
			'id_mengikuti_vendor' => $id_vendor,
		];
		$data = [
			'rating_penilaian_vendor' => $rating_penilaian_vendor_pekerjaan_kontruksi,
			'status_rating' => $status_rating_pekerjaan_kontruksi,
			'status_rating_sudah_di_nilai' => 1,
			'status_jenis_penilayan' => 'kontruksi',
			'rating_nilai_akhir' => $status_nilai_akhir_pekerjaan_kontruksi,
		];
		$this->Penilaian_vendor_model->update_pekerjaan_kontruksi_vendor($data, $where);
		$this->db->insert_batch('tbl_detaill_penilaian_kinerja_pekerjaan_kontruksi', $result);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}


	public function reset_penilaian_performance_pekerjaan_kontruksi()
	{
		$id_paket = $this->input->post('id_paket', TRUE);
		$area_agency = $this->session->userdata('id_unit_kerja2');
		$data['data_pemenang'] = $this->Penilaian_vendor_model->get_paket_data_vendor_pemenang($area_agency, $id_paket);
		$foroutput = $this->Penilaian_vendor_model->get_paket_data_vendor_pemenang($area_agency, $id_paket);
		$nama_paket = $foroutput['nama_paket'];
		$nama_metode_pemilihan = $foroutput['nama_metode_pemilihan'];
		$id_vendor = $data['data_pemenang']['id_mengikuti_vendor'];
		$id_paket_vendor = $data['data_pemenang']['id_mengikuti_paket_vendor'];
		$vendor_pemenag_by_id_pekerjaan_kontruksi = $this->Penilaian_vendor_model->by_id_vendor_pemenang_pekerjaan_kontruksi($id_vendor, $id_paket_vendor);

		if ($vendor_pemenag_by_id_pekerjaan_kontruksi['status_warning_vendor'] == 1) {
			// update ke tbl_vendor_mengikuti_paket
			$where_warning = [
				'id_mengikuti_paket_vendor' => $id_paket,
				'id_mengikuti_vendor' => $id_vendor,
			];
			$data_warning = [
				'rating_penilaian_vendor' => null,
				'status_jenis_penilayan' => null,
				'status_rating' => null,
				'status_rating_sudah_di_nilai' => null,
				'rating_nilai_akhir' => null,
			];
			// update ke tbl_vendor
			$where_tbl_vendor_warning = [
				'id_vendor' => $id_vendor,
			];
			$data_tbl_vendor_warning = [
				'status_warning_vendor' => 0,
			];
			$where_delete_tbl_penilainya = [
				'id_paket' => $id_paket_vendor,
				'id_vendor' => $id_vendor
			];
			$this->Penilaian_vendor_model->delete_penilaian_kontruksi($where_delete_tbl_penilainya);
			$this->Penilaian_vendor_model->update_status_warning_pekerjaan_kontruksi($data_tbl_vendor_warning, $where_tbl_vendor_warning);
			$this->Penilaian_vendor_model->update_pekerjaan_kontruksi_vendor($data_warning, $where_warning);

			if ($foroutput['status_vendor_baru'] == null) {
				$email_vendor = $foroutput['email_usaha'];
				$telpon_vendor = $foroutput['telpon_usaha'];
			} else {
				$email_vendor = $foroutput['email_vendor'];
				$telpon_vendor = $foroutput['telpon_vendor'];
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
			// Email dan nama pengirim
			$this->email->from('eproc@jmtm.co.id', 'JMTM');

			// Email penerima
			$this->email->to($email_vendor); // Ganti dengan email tujuan

			// Subject email
			$this->email->subject('E-PROCUREMENT JMTM INFO PENILAIAN KINERJA !!!');

			// Isi email
			$this->email->message("Mengalamai Penilaian Ulang Oleh Agency Pada Nama Paket : $nama_paket , Metode Pemilihan : $nama_metode_pemilihan, Tidak Ada Peringataan, Saat Ini Aman, Anda Dapat Mengikuti Paket Tender Selanjutnya Pada Jmtm E-procurement.");
			$this->email->send();

			$output = [
				"isi" => "Mengalamai Penilaian Ulang Oleh Agency, Tidak Ada Peringataan, Saat Ini Aman, Anda Dapat Mengikuti Paket Tender Selanjutnya Pada Jmtm E-procurement.",
				"paket" => $foroutput,
				"telpon" => $telpon_vendor
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($output));
		} else if ($vendor_pemenag_by_id_pekerjaan_kontruksi['status_warning_vendor'] == 2) {
			$where_blacklist = [
				'id_mengikuti_paket_vendor' => $id_paket,
				'id_mengikuti_vendor' => $id_vendor,
			];
			$data_blacklist = [
				'rating_penilaian_vendor' => null,
				'status_rating' => null,
				'status_rating_sudah_di_nilai' => null,
				'status_jenis_penilayan' => null,
				'rating_nilai_akhir' => null,
			];
			$where_tbl_vendor_blacklist = [
				'id_vendor' => $id_vendor,
			];
			$data_tbl_vendor_blacklist = [
				'status_warning_vendor' => 1,
			];
			$where_delete_tbl_penilainya = [
				'id_paket' => $id_paket_vendor,
				'id_vendor' => $id_vendor
			];
			$data_blacklist_vendor = [
				'alasan_daftar_hitam' => null,
				'masa_berlaku_daftar_hitam_mulai' => null,
				'masa_berlaku_daftar_hitam_selesai' => null,
				'status_aktive_vendor' => 1,
				'status_daftar_hitam_vendor' => 0
			];
			$this->Penilaian_vendor_model->update_ke_vendor($data_blacklist_vendor, $where_tbl_vendor_blacklist);
			$this->Penilaian_vendor_model->delete_penilaian_kontruksi($where_delete_tbl_penilainya);
			$this->Penilaian_vendor_model->update_status_warning_pekerjaan_kontruksi($data_tbl_vendor_blacklist, $where_tbl_vendor_blacklist);
			$this->Penilaian_vendor_model->update_pekerjaan_kontruksi_vendor($data_blacklist, $where_blacklist);

			if ($foroutput['status_vendor_baru'] == null) {
				$email_vendor = $foroutput['email_usaha'];
				$telpon_vendor = $foroutput['telpon_usaha'];
			} else {
				$email_vendor = $foroutput['email_vendor'];
				$telpon_vendor = $foroutput['telpon_vendor'];
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
			// Email dan nama pengirim
			$this->email->from('eproc@jmtm.co.id', 'JMTM');

			// Email penerima
			$this->email->to($email_vendor); // Ganti dengan email tujuan

			// Subject email
			$this->email->subject('E-PROCUREMENT JMTM INFO PENILAIAN KINERJA !!!');

			// Isi email
			$this->email->message("Mengalamai Penilaian Ulang Oleh Agency Pada Nama Paket : $nama_paket , Metode Pemilihan : $nama_metode_pemilihan, Tidak Ada Peringataan Ke-2, Saat Ini Anda Masih Dalam Peringataan Ke-1, Anda Masih Dapat Mengikuti Paket Tender Selanjutnya Pada Jmtm E-procurement.");
			$this->email->send();

			$output = [
				"isi" => "Mengalamai Penilaian Ulang Oleh Agency, Tidak Ada Peringataan Ke-2, Saat Ini Anda Masih Dalam Peringataan Ke-1, Anda Masih Dapat Mengikuti Paket Tender Selanjutnya Pada Jmtm E-procurement.",
				"paket" => $foroutput,
				"telpon" => $telpon_vendor
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($output));
		} else {
			$where = [
				'id_mengikuti_paket_vendor' => $id_paket,
				'id_mengikuti_vendor' => $id_vendor,
			];
			$data = [
				'rating_penilaian_vendor' => null,
				'status_rating' => null,
				'status_jenis_penilayan' => null,
				'status_rating_sudah_di_nilai' => null,
				'rating_nilai_akhir' => null,
			];
			$where_delete_tbl_penilainya = [
				'id_paket' => $id_paket_vendor,
				'id_vendor' => $id_vendor
			];
			$this->Penilaian_vendor_model->delete_penilaian_kontruksi($where_delete_tbl_penilainya);
			$this->Penilaian_vendor_model->update_pekerjaan_kontruksi_vendor($data, $where);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}


	// INI BAGIAN BARU PEKERJAAN KONSULTAN KONTRUKSI
	public function tambah_warning_pekerjaan_konsultan_kontruksisaya()
	{
		$id_paket = $this->input->post('id_paket', TRUE);
		$id_vendor = $this->input->post('id_vendor', TRUE);
		$indikator_pekerjaan_konsultan_kontruksi = $this->input->post('indikator_pekerjaan_konsultan_kontruksi', TRUE);
		$bobot_pekerjaan_konsultan_kontruksi = $this->input->post('bobot_pekerjaan_konsultan_kontruksi', TRUE);
		$penilaian_konsultan_kontruksi = $this->input->post('penilaian_konsultan_kontruksi', TRUE);
		$nilai_akhir_pekerjaan_konsultan_kontruksi = $this->input->post('nilai_akhir_pekerjaan_konsultan_kontruksi', TRUE);
		// tbl_vendor mengikuti paket

		$rating_penilaian_vendor_pekerjaan_konsultan_kontruksi = $this->input->post('rating_penilaian_vendor_pekerjaan_konsultan_kontruksi');
		$status_rating_pekerjaan_konsultan_kontruksi = $this->input->post('status_rating_pekerjaan_konsultan_kontruksi');
		$status_nilai_akhir_pekerjaan_konsultan_kontruksi = $this->input->post('status_nilai_akhir_pekerjaan_konsultan_kontruksi');
		$area_agency = $this->session->userdata('id_unit_kerja2');
		$data['data_pemenang'] = $this->Penilaian_vendor_model->get_paket_data_vendor_pemenang($area_agency, $id_paket);
		$foroutput = $this->Penilaian_vendor_model->get_paket_data_vendor_pemenang($area_agency, $id_paket);
		$nama_paket = $foroutput['nama_paket'];
		$nama_metode_pemilihan = $foroutput['nama_metode_pemilihan'];
		$id_vendor2 = $data['data_pemenang']['id_mengikuti_vendor'];
		$id_paket_vendor = $data['data_pemenang']['id_mengikuti_paket_vendor'];
		$vendor_pemenag_by_id_pekerjaan_kontruksi = $this->Penilaian_vendor_model->by_id_vendor_pemenang_pekerjaan_kontruksi($id_vendor2, $id_paket_vendor);


		if ($vendor_pemenag_by_id_pekerjaan_kontruksi['status_warning_vendor'] == 1) {
			// ketable detail penilaian
			$result = array();
			foreach ($indikator_pekerjaan_konsultan_kontruksi as $key => $val) {
				$result[] = array(
					'id_paket'   => $id_paket,
					'id_vendor'   => $id_vendor,
					'indikator_pekerjaan_konsultan_kontruksi_detail'   => $indikator_pekerjaan_konsultan_kontruksi[$key],
					'bobot_pekerjaan_konsultan_kontruksi_detail'   => $bobot_pekerjaan_konsultan_kontruksi[$key],
					'penilaian_konsultan_kontruksi_detail'   =>  $penilaian_konsultan_kontruksi[$key],
					'nilai_akhir_pekerjaan_konsultan_kontruksi_detail'   =>  $nilai_akhir_pekerjaan_konsultan_kontruksi[$key],
				);
			}

			// ketable vendor mengkikuti paket
			$where = [
				'id_mengikuti_paket_vendor' => $id_paket,
				'id_mengikuti_vendor' => $id_vendor,
			];
			$data = [
				'rating_penilaian_vendor' => $rating_penilaian_vendor_pekerjaan_konsultan_kontruksi,
				'status_rating' => $status_rating_pekerjaan_konsultan_kontruksi,
				'status_rating_sudah_di_nilai' => 1,
				'status_jenis_penilayan' => 'konsultan kontruksi',
				'rating_nilai_akhir' => $status_nilai_akhir_pekerjaan_konsultan_kontruksi,
			];

			// ke table vendor
			$where_tbl_vendor_warning = [
				'id_vendor' => $id_vendor,
			];
			$data_tbl_vendor_warning = [
				'status_warning_vendor' => 2,
			];
			$data_blacklist_vendor = [
				'alasan_daftar_hitam' => "Mendapatakan Warning Ke 2 / Kinerja Vendor Kurang",
				'masa_berlaku_daftar_hitam_mulai' => date('d-m-Y H:i'),
				'masa_berlaku_daftar_hitam_selesai' => date('d-m-Y H:i', strtotime("+2 year")),
				'status_aktive_vendor' => 0,
				'status_daftar_hitam_vendor' => 1
			];
			$this->db->insert_batch('tbl_detail_penilaian_kinerja_pekerjaan_konsultan_kontruksi', $result);
			$this->Penilaian_vendor_model->update_ke_vendor($data_blacklist_vendor, $where_tbl_vendor_warning);
			$this->Penilaian_vendor_model->update_pekerjaan_kontruksi_vendor($data, $where);
			$this->Penilaian_vendor_model->update_status_warning_pekerjaan_kontruksi($data_tbl_vendor_warning, $where_tbl_vendor_warning);
			if ($foroutput['status_vendor_baru'] == null) {
				$email_vendor = $foroutput['email_usaha'];
				$telpon_vendor = $foroutput['telpon_usaha'];
			} else {
				$email_vendor = $foroutput['email_vendor'];
				$telpon_vendor = $foroutput['telpon_vendor'];
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
			// Email dan nama pengirim
			$this->email->from('eproc@jmtm.co.id', 'JMTM');

			// Email penerima
			$this->email->to($email_vendor); // Ganti dengan email tujuan

			// Subject email
			$this->email->subject('E-PROCUREMENT JMTM BLACKLIST!!! PENILAIAN KINERJA');

			// Isi email
			$this->email->message("Anda Mendapatkan Blacklist!!!, Anda Mendapatkan Warning Ke 2 Maka Anda Akan Kami Blacklist Selama 2 Tahun Pada Tender Jmtm E-procurement User Akan Kami NonAktifkan Sementara Sampai Hukuman 2 Tahun Blacklist Selesai, Nama Paket : $nama_paket , Metode Pemilihan : $nama_metode_pemilihan");
			$this->email->send();

			$output = [
				"isi" => "Anda Mendapatkan Blacklist!!!, Anda Mendapatkan Warning Ke 2 Maka Anda Akan Kami Blacklist Selama 2 Tahun Pada Tender Jmtm E-procurement User Akan Kami NonAktifkan Sementara Sampai Hukuman 2 Tahun Blacklist Selesai",
				"paket" => $foroutput,
				"telpon" => $telpon_vendor
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($output));
		} else {
			// ketable detail penilaian
			$result = array();
			foreach ($indikator_pekerjaan_konsultan_kontruksi as $key => $val) {
				$result[] = array(
					'id_paket'   => $id_paket,
					'id_vendor'   => $id_vendor,
					'indikator_pekerjaan_konsultan_kontruksi_detail'   => $indikator_pekerjaan_konsultan_kontruksi[$key],
					'bobot_pekerjaan_konsultan_kontruksi_detail'   => $bobot_pekerjaan_konsultan_kontruksi[$key],
					'penilaian_konsultan_kontruksi_detail'   =>  $penilaian_konsultan_kontruksi[$key],
					'nilai_akhir_pekerjaan_konsultan_kontruksi_detail'   =>  $nilai_akhir_pekerjaan_konsultan_kontruksi[$key],
				);
			}

			// ketable vendor mengkikuti paket
			$where = [
				'id_mengikuti_paket_vendor' => $id_paket,
				'id_mengikuti_vendor' => $id_vendor,
			];
			$data = [
				'rating_penilaian_vendor' => $rating_penilaian_vendor_pekerjaan_konsultan_kontruksi,
				'status_rating' => $status_rating_pekerjaan_konsultan_kontruksi,
				'status_rating_sudah_di_nilai' => 1,
				'status_jenis_penilayan' => 'konsultan kontruksi',
				'rating_nilai_akhir' => $status_nilai_akhir_pekerjaan_konsultan_kontruksi,
			];

			// ke table vendor
			$where_tbl_vendor_warning = [
				'id_vendor' => $id_vendor,
			];
			$data_tbl_vendor_warning = [
				'status_warning_vendor' => 1,
			];
			$this->Penilaian_vendor_model->update_pekerjaan_kontruksi_vendor($data, $where);
			$this->db->insert_batch('tbl_detail_penilaian_kinerja_pekerjaan_konsultan_kontruksi', $result);
			$this->Penilaian_vendor_model->update_status_warning_pekerjaan_kontruksi($data_tbl_vendor_warning, $where_tbl_vendor_warning);

			if ($foroutput['status_vendor_baru'] == null) {
				$email_vendor = $foroutput['email_usaha'];
				$telpon_vendor = $foroutput['telpon_usaha'];
			} else {
				$email_vendor = $foroutput['email_vendor'];
				$telpon_vendor = $foroutput['telpon_vendor'];
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
			// Email dan nama pengirim
			$this->email->from('eproc@jmtm.co.id', 'JMTM');

			// Email penerima
			$this->email->to($email_vendor); // Ganti dengan email tujuan

			// Subject email
			$this->email->subject('E-PROCUREMENT JMTM WARNING!!! PENILAIAN KINERJA');

			// Isi email
			$this->email->message("Anda Mendapatkan Warning Ke 1, Perbaiki Kinerja Pada Tender Selanjutnya Jika Anda Mendapatkan Warning Ke 2 Maka Anda Akan Kami Blacklist Selama 2 Tahun Pada Tender Jmtm E-procurement, Nama Paket : $nama_paket , Metode Pemilihan : $nama_metode_pemilihan");
			$this->email->send();

			$output = [
				"isi" => "Anda Mendapatkan Warning Ke 1, Perbaiki Kinerja Pada Tender Selanjutnya Jika Anda Mendapatkan Warning Ke 2 Maka Anda Akan Kami Blacklist Selama 2 Tahun Pada Tender Jmtm E-procurement",
				"paket" => $foroutput,
				"telpon" => $telpon_vendor
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($output));
		}
	}
	public function tambah_pekerjaan_konsultan_kontruksisaya()
	{

		$id_paket = $this->input->post('id_paket', TRUE);
		$id_vendor = $this->input->post('id_vendor', TRUE);
		$indikator_pekerjaan_konsultan_kontruksi = $this->input->post('indikator_pekerjaan_konsultan_kontruksi', TRUE);
		$bobot_pekerjaan_konsultan_kontruksi = $this->input->post('bobot_pekerjaan_konsultan_kontruksi', TRUE);
		$penilaian_konsultan_kontruksi = $this->input->post('penilaian_konsultan_kontruksi', TRUE);
		$nilai_akhir_pekerjaan_konsultan_kontruksi = $this->input->post('nilai_akhir_pekerjaan_konsultan_kontruksi', TRUE);
		// tbl_vendor mengikuti paket
		$rating_penilaian_vendor_pekerjaan_konsultan_kontruksi = $this->input->post('rating_penilaian_vendor_pekerjaan_konsultan_kontruksi');
		$status_rating_pekerjaan_konsultan_kontruksi = $this->input->post('status_rating_pekerjaan_konsultan_kontruksi');
		$status_nilai_akhir_pekerjaan_konsultan_kontruksi = $this->input->post('status_nilai_akhir_pekerjaan_konsultan_kontruksi');

		$result = array();
		foreach ($indikator_pekerjaan_konsultan_kontruksi as $key => $val) {
			$result[] = array(
				'id_paket'   => $id_paket,
				'id_vendor'   => $id_vendor,
				'indikator_pekerjaan_konsultan_kontruksi_detail'   => $indikator_pekerjaan_konsultan_kontruksi[$key],
				'bobot_pekerjaan_konsultan_kontruksi_detail'   => $bobot_pekerjaan_konsultan_kontruksi[$key],
				'penilaian_konsultan_kontruksi_detail'   =>  $penilaian_konsultan_kontruksi[$key],
				'nilai_akhir_pekerjaan_konsultan_kontruksi_detail'   =>  $nilai_akhir_pekerjaan_konsultan_kontruksi[$key],
			);
		}

		$where = [
			'id_mengikuti_paket_vendor' => $id_paket,
			'id_mengikuti_vendor' => $id_vendor,
		];
		$data = [
			'rating_penilaian_vendor' => $rating_penilaian_vendor_pekerjaan_konsultan_kontruksi,
			'status_rating' => $status_rating_pekerjaan_konsultan_kontruksi,
			'status_rating_sudah_di_nilai' => 1,
			'status_jenis_penilayan' => 'konsultan kontruksi',
			'rating_nilai_akhir' => $status_nilai_akhir_pekerjaan_konsultan_kontruksi,
		];
		$this->Penilaian_vendor_model->update_pekerjaan_kontruksi_vendor($data, $where);
		$this->db->insert_batch('tbl_detail_penilaian_kinerja_pekerjaan_konsultan_kontruksi', $result);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}

	public function reset_penilaian_performance_pekerjaan_konsultan_kontruksi()
	{
		$id_paket = $this->input->post('id_paket', TRUE);
		$area_agency = $this->session->userdata('id_unit_kerja2');
		$data['data_pemenang'] = $this->Penilaian_vendor_model->get_paket_data_vendor_pemenang($area_agency, $id_paket);
		$foroutput = $this->Penilaian_vendor_model->get_paket_data_vendor_pemenang($area_agency, $id_paket);
		$nama_paket = $foroutput['nama_paket'];
		$nama_metode_pemilihan = $foroutput['nama_metode_pemilihan'];
		$id_vendor = $data['data_pemenang']['id_mengikuti_vendor'];
		$id_paket_vendor = $data['data_pemenang']['id_mengikuti_paket_vendor'];
		$vendor_pemenag_by_id_pekerjaan_kontruksi = $this->Penilaian_vendor_model->by_id_vendor_pemenang_pekerjaan_kontruksi($id_vendor, $id_paket_vendor);

		if ($vendor_pemenag_by_id_pekerjaan_kontruksi['status_warning_vendor'] == 1) {
			// update ke tbl_vendor_mengikuti_paket
			$where_warning = [
				'id_mengikuti_paket_vendor' => $id_paket,
				'id_mengikuti_vendor' => $id_vendor,
			];
			$data_warning = [
				'rating_penilaian_vendor' => null,
				'status_jenis_penilayan' => null,
				'status_rating' => null,
				'status_rating_sudah_di_nilai' => null,
				'rating_nilai_akhir' => null,
			];
			// update ke tbl_vendor
			$where_tbl_vendor_warning = [
				'id_vendor' => $id_vendor,
			];
			$data_tbl_vendor_warning = [
				'status_warning_vendor' => 0,
			];
			$where_delete_tbl_penilainya = [
				'id_paket' => $id_paket_vendor,
				'id_vendor' => $id_vendor
			];
			$this->Penilaian_vendor_model->delete_penilaian_konsultan_kontruksi($where_delete_tbl_penilainya);
			$this->Penilaian_vendor_model->update_status_warning_pekerjaan_kontruksi($data_tbl_vendor_warning, $where_tbl_vendor_warning);
			$this->Penilaian_vendor_model->update_pekerjaan_kontruksi_vendor($data_warning, $where_warning);
			if ($foroutput['status_vendor_baru'] == null) {
				$email_vendor = $foroutput['email_usaha'];
				$telpon_vendor = $foroutput['telpon_usaha'];
			} else {
				$email_vendor = $foroutput['email_vendor'];
				$telpon_vendor = $foroutput['telpon_vendor'];
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
			// Email dan nama pengirim
			$this->email->from('eproc@jmtm.co.id', 'JMTM');

			// Email penerima
			$this->email->to($email_vendor); // Ganti dengan email tujuan

			// Subject email
			$this->email->subject('E-PROCUREMENT JMTM INFO PENILAIAN KINERJA !!!');

			// Isi email
			$this->email->message("Mengalamai Penilaian Ulang Oleh Agency Pada Nama Paket : $nama_paket , Metode Pemilihan : $nama_metode_pemilihan, Tidak Ada Peringataan, Saat Ini Aman, Anda Dapat Mengikuti Paket Tender Selanjutnya Pada Jmtm E-procurement.");
			$this->email->send();

			$output = [
				"isi" => "Mengalamai Penilaian Ulang Oleh Agency, Tidak Ada Peringataan, Saat Ini Aman, Anda Dapat Mengikuti Paket Tender Selanjutnya Pada Jmtm E-procurement.",
				"paket" => $foroutput,
				"telpon" => $telpon_vendor
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($output));
		} else if ($vendor_pemenag_by_id_pekerjaan_kontruksi['status_warning_vendor'] == 2) {
			$where_blacklist = [
				'id_mengikuti_paket_vendor' => $id_paket,
				'id_mengikuti_vendor' => $id_vendor,
			];
			$data_blacklist = [
				'rating_penilaian_vendor' => null,
				'status_rating' => null,
				'status_rating_sudah_di_nilai' => null,
				'status_jenis_penilayan' => null,
				'rating_nilai_akhir' => null,
			];
			$where_tbl_vendor_blacklist = [
				'id_vendor' => $id_vendor,
			];
			$data_tbl_vendor_blacklist = [
				'status_warning_vendor' => 1,
			];
			$where_delete_tbl_penilainya = [
				'id_paket' => $id_paket_vendor,
				'id_vendor' => $id_vendor
			];

			$data_blacklist_vendor = [
				'alasan_daftar_hitam' => null,
				'masa_berlaku_daftar_hitam_mulai' => null,
				'masa_berlaku_daftar_hitam_selesai' => null,
				'status_aktive_vendor' => 1,
				'status_daftar_hitam_vendor' => 0
			];
			$this->Penilaian_vendor_model->update_ke_vendor($data_blacklist_vendor, $where_tbl_vendor_blacklist);
			$this->Penilaian_vendor_model->delete_penilaian_konsultan_kontruksi($where_delete_tbl_penilainya);
			$this->Penilaian_vendor_model->update_status_warning_pekerjaan_kontruksi($data_tbl_vendor_blacklist, $where_tbl_vendor_blacklist);
			$this->Penilaian_vendor_model->update_pekerjaan_kontruksi_vendor($data_blacklist, $where_blacklist);

			if ($foroutput['status_vendor_baru'] == null) {
				$email_vendor = $foroutput['email_usaha'];
				$telpon_vendor = $foroutput['telpon_usaha'];
			} else {
				$email_vendor = $foroutput['email_vendor'];
				$telpon_vendor = $foroutput['telpon_vendor'];
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
			// Email dan nama pengirim
			$this->email->from('eproc@jmtm.co.id', 'JMTM');

			// Email penerima
			$this->email->to($email_vendor); // Ganti dengan email tujuan

			// Subject email
			$this->email->subject('E-PROCUREMENT JMTM INFO PENILAIAN KINERJA !!!');

			// Isi email
			$this->email->message("Mengalamai Penilaian Ulang Oleh Agency Pada Nama Paket : $nama_paket , Metode Pemilihan : $nama_metode_pemilihan, Tidak Ada Peringataan Ke-2, Saat Ini Anda Masih Dalam Peringataan Ke-1, Anda Masih Dapat Mengikuti Paket Tender Selanjutnya Pada Jmtm E-procurement.");
			$this->email->send();

			$output = [
				"isi" => "Mengalamai Penilaian Ulang Oleh Agency, Tidak Ada Peringataan Ke-2, Saat Ini Anda Masih Dalam Peringataan Ke-1, Anda Masih Dapat Mengikuti Paket Tender Selanjutnya Pada Jmtm E-procurement.",
				"paket" => $foroutput,
				"telpon" => $telpon_vendor
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($output));
		} else {
			$where = [
				'id_mengikuti_paket_vendor' => $id_paket,
				'id_mengikuti_vendor' => $id_vendor,
			];
			$data = [
				'rating_penilaian_vendor' => null,
				'status_rating' => null,
				'status_jenis_penilayan' => null,
				'status_rating_sudah_di_nilai' => null,
				'rating_nilai_akhir' => null,
			];
			$where_delete_tbl_penilainya = [
				'id_paket' => $id_paket_vendor,
				'id_vendor' => $id_vendor
			];
			$this->Penilaian_vendor_model->delete_penilaian_konsultan_kontruksi($where_delete_tbl_penilainya);
			$this->Penilaian_vendor_model->update_pekerjaan_kontruksi_vendor($data, $where);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}




	// INI BAGIAN BARU PEKERJAAN KAJIAN KONSULTAN KONTRUKSI
	public function tambah_warning_pekerjaan_kajian_konsultan_kontruksisaya()
	{
		$id_paket = $this->input->post('id_paket', TRUE);
		$id_vendor = $this->input->post('id_vendor', TRUE);
		$indikator_pekerjaan_kajian_konsultan_kontruksi = $this->input->post('indikator_pekerjaan_kajian_konsultan_kontruksi', TRUE);
		$bobot_pekerjaan_kajian_konsultan_kontruksi = $this->input->post('bobot_pekerjaan_kajian_konsultan_kontruksi', TRUE);
		$penilaian_kajian_konsultan_kontruksi = $this->input->post('penilaian_kajian_konsultan_kontruksi', TRUE);
		$nilai_akhir_pekerjaan_kajian_konsultan_kontruksi = $this->input->post('nilai_akhir_pekerjaan_kajian_konsultan_kontruksi', TRUE);
		// tbl_vendor mengikuti paket

		$rating_penilaian_vendor_pekerjaan_kajian_konsultan_kontruksi = $this->input->post('rating_penilaian_vendor_pekerjaan_kajian_konsultan_kontruksi');
		$status_rating_pekerjaan_kajian_konsultan_kontruksi = $this->input->post('status_rating_pekerjaan_kajian_konsultan_kontruksi');
		$status_nilai_akhir_pekerjaan_kajian_konsultan_kontruksi = $this->input->post('status_nilai_akhir_pekerjaan_kajian_konsultan_kontruksi');
		$area_agency = $this->session->userdata('id_unit_kerja2');
		$data['data_pemenang'] = $this->Penilaian_vendor_model->get_paket_data_vendor_pemenang($area_agency, $id_paket);
		$foroutput = $this->Penilaian_vendor_model->get_paket_data_vendor_pemenang($area_agency, $id_paket);
		$nama_paket = $foroutput['nama_paket'];
		$nama_metode_pemilihan = $foroutput['nama_metode_pemilihan'];
		$id_vendor2 = $data['data_pemenang']['id_mengikuti_vendor'];
		$id_paket_vendor = $data['data_pemenang']['id_mengikuti_paket_vendor'];
		$vendor_pemenag_by_id_pekerjaan_kontruksi = $this->Penilaian_vendor_model->by_id_vendor_pemenang_pekerjaan_kontruksi($id_vendor2, $id_paket_vendor);

		if ($vendor_pemenag_by_id_pekerjaan_kontruksi['status_warning_vendor'] == 1) {
			// ketable detail penilaian
			$result = array();
			foreach ($indikator_pekerjaan_kajian_konsultan_kontruksi as $key => $val) {
				$result[] = array(
					'id_paket'   => $id_paket,
					'id_vendor'   => $id_vendor,
					'indikator_pekerjaan_konsultan_kajian_kontruksi_detail'   => $indikator_pekerjaan_kajian_konsultan_kontruksi[$key],
					'bobot_pekerjaan_konsultan_kajian_kontruksi_detail'   => $bobot_pekerjaan_kajian_konsultan_kontruksi[$key],
					'penilaian_konsultan_kajian_kontruksi_detail'   =>  $penilaian_kajian_konsultan_kontruksi[$key],
					'nilai_akhir_pekerjaan_konsultan_kajian_kontruksi_detail'   =>  $nilai_akhir_pekerjaan_kajian_konsultan_kontruksi[$key],
				);
			}

			// ketable vendor mengkikuti paket
			$where = [
				'id_mengikuti_paket_vendor' => $id_paket,
				'id_mengikuti_vendor' => $id_vendor,
			];
			$data = [
				'rating_penilaian_vendor' => $rating_penilaian_vendor_pekerjaan_kajian_konsultan_kontruksi,
				'status_rating' => $status_rating_pekerjaan_kajian_konsultan_kontruksi,
				'status_rating_sudah_di_nilai' => 1,
				'status_jenis_penilayan' => 'kajian konsultan kontruksi',
				'rating_nilai_akhir' => $status_nilai_akhir_pekerjaan_kajian_konsultan_kontruksi,
			];

			// ke table vendor
			$where_tbl_vendor_warning = [
				'id_vendor' => $id_vendor,
			];
			$data_tbl_vendor_warning = [
				'status_warning_vendor' => 2,
			];
			$data_blacklist_vendor = [
				'alasan_daftar_hitam' => "Mendapatakan Warning Ke 2 / Kinerja Vendor Kurang",
				'masa_berlaku_daftar_hitam_mulai' => date('d-m-Y H:i'),
				'masa_berlaku_daftar_hitam_selesai' => date('d-m-Y H:i', strtotime("+2 year")),
				'status_aktive_vendor' => 0,
				'status_daftar_hitam_vendor' => 1
			];
			$this->db->insert_batch('tbl_detail_penilaian_kinerja_pekerjaan_kajian_kontruksi', $result);
			$this->Penilaian_vendor_model->update_ke_vendor($data_blacklist_vendor, $where_tbl_vendor_warning);
			$this->Penilaian_vendor_model->update_pekerjaan_kontruksi_vendor($data, $where);
			$this->Penilaian_vendor_model->update_status_warning_pekerjaan_kontruksi($data_tbl_vendor_warning, $where_tbl_vendor_warning);
			if ($foroutput['status_vendor_baru'] == null) {
				$email_vendor = $foroutput['email_usaha'];
				$telpon_vendor = $foroutput['telpon_usaha'];
			} else {
				$email_vendor = $foroutput['email_vendor'];
				$telpon_vendor = $foroutput['telpon_vendor'];
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
			// Email dan nama pengirim
			$this->email->from('eproc@jmtm.co.id', 'JMTM');

			// Email penerima
			$this->email->to($email_vendor); // Ganti dengan email tujuan

			// Subject email
			$this->email->subject('E-PROCUREMENT JMTM BLACKLIST!!! PENILAIAN KINERJA');

			// Isi email
			$this->email->message("Anda Mendapatkan Blacklist!!!, Anda Mendapatkan Warning Ke 2 Maka Anda Akan Kami Blacklist Selama 2 Tahun Pada Tender Jmtm E-procurement User Akan Kami NonAktifkan Sementara Sampai Hukuman 2 Tahun Blacklist Selesai, Nama Paket : $nama_paket , Metode Pemilihan : $nama_metode_pemilihan");
			$this->email->send();

			$output = [
				"isi" => "Anda Mendapatkan Blacklist!!!, Anda Mendapatkan Warning Ke 2 Maka Anda Akan Kami Blacklist Selama 2 Tahun Pada Tender Jmtm E-procurement User Akan Kami NonAktifkan Sementara Sampai Hukuman 2 Tahun Blacklist Selesai",
				"paket" => $foroutput,
				"telpon" => $telpon_vendor
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($output));
		} else {
			// ketable detail penilaian
			$result = array();
			foreach ($indikator_pekerjaan_kajian_konsultan_kontruksi as $key => $val) {
				$result[] = array(
					'id_paket'   => $id_paket,
					'id_vendor'   => $id_vendor,
					'indikator_pekerjaan_konsultan_kajian_kontruksi_detail'   => $indikator_pekerjaan_kajian_konsultan_kontruksi[$key],
					'bobot_pekerjaan_konsultan_kajian_kontruksi_detail'   => $bobot_pekerjaan_kajian_konsultan_kontruksi[$key],
					'penilaian_konsultan_kajian_kontruksi_detail'   =>  $penilaian_kajian_konsultan_kontruksi[$key],
					'nilai_akhir_pekerjaan_konsultan_kajian_kontruksi_detail'   =>  $nilai_akhir_pekerjaan_kajian_konsultan_kontruksi[$key],
				);
			}

			// ketable vendor mengkikuti paket
			$where = [
				'id_mengikuti_paket_vendor' => $id_paket,
				'id_mengikuti_vendor' => $id_vendor,
			];
			$data = [
				'rating_penilaian_vendor' => $rating_penilaian_vendor_pekerjaan_kajian_konsultan_kontruksi,
				'status_rating' => $status_rating_pekerjaan_kajian_konsultan_kontruksi,
				'status_rating_sudah_di_nilai' => 1,
				'status_jenis_penilayan' => 'kajian konsultan kontruksi',
				'rating_nilai_akhir' => $status_nilai_akhir_pekerjaan_kajian_konsultan_kontruksi,
			];

			// ke table vendor
			$where_tbl_vendor_warning = [
				'id_vendor' => $id_vendor,
			];
			$data_tbl_vendor_warning = [
				'status_warning_vendor' => 1,
			];
			$this->Penilaian_vendor_model->update_pekerjaan_kontruksi_vendor($data, $where);
			$this->db->insert_batch('tbl_detail_penilaian_kinerja_pekerjaan_kajian_kontruksi', $result);
			$this->Penilaian_vendor_model->update_status_warning_pekerjaan_kontruksi($data_tbl_vendor_warning, $where_tbl_vendor_warning);

			if ($foroutput['status_vendor_baru'] == null) {
				$email_vendor = $foroutput['email_usaha'];
				$telpon_vendor = $foroutput['telpon_usaha'];
			} else {
				$email_vendor = $foroutput['email_vendor'];
				$telpon_vendor = $foroutput['telpon_vendor'];
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
			// Email dan nama pengirim
			$this->email->from('eproc@jmtm.co.id', 'JMTM');

			// Email penerima
			$this->email->to($email_vendor); // Ganti dengan email tujuan

			// Subject email
			$this->email->subject('E-PROCUREMENT JMTM WARNING!!! PENILAIAN KINERJA');

			// Isi email
			$this->email->message("Anda Mendapatkan Warning Ke 1, Perbaiki Kinerja Pada Tender Selanjutnya Jika Anda Mendapatkan Warning Ke 2 Maka Anda Akan Kami Blacklist Selama 2 Tahun Pada Tender Jmtm E-procurement, Nama Paket : $nama_paket , Metode Pemilihan : $nama_metode_pemilihan");
			$this->email->send();

			$output = [
				"isi" => "Anda Mendapatkan Warning Ke 1, Perbaiki Kinerja Pada Tender Selanjutnya Jika Anda Mendapatkan Warning Ke 2 Maka Anda Akan Kami Blacklist Selama 2 Tahun Pada Tender Jmtm E-procurement",
				"paket" => $foroutput,
				"telpon" => $telpon_vendor
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($output));
		}
	}
	public function tambah_pekerjaan_kajian_konsultan_kontruksisaya()
	{

		$id_paket = $this->input->post('id_paket', TRUE);
		$id_vendor = $this->input->post('id_vendor', TRUE);
		$indikator_pekerjaan_kajian_konsultan_kontruksi = $this->input->post('indikator_pekerjaan_kajian_konsultan_kontruksi', TRUE);
		$bobot_pekerjaan_kajian_konsultan_kontruksi = $this->input->post('bobot_pekerjaan_kajian_konsultan_kontruksi', TRUE);
		$penilaian_kajian_konsultan_kontruksi = $this->input->post('penilaian_kajian_konsultan_kontruksi', TRUE);
		$nilai_akhir_pekerjaan_kajian_konsultan_kontruksi = $this->input->post('nilai_akhir_pekerjaan_kajian_konsultan_kontruksi', TRUE);
		// tbl_vendor mengikuti paket
		$rating_penilaian_vendor_pekerjaan_kajian_konsultan_kontruksi = $this->input->post('rating_penilaian_vendor_pekerjaan_kajian_konsultan_kontruksi');
		$status_rating_pekerjaan_kajian_konsultan_kontruksi = $this->input->post('status_rating_pekerjaan_kajian_konsultan_kontruksi');
		$status_nilai_akhir_pekerjaan_kajian_konsultan_kontruksi = $this->input->post('status_nilai_akhir_pekerjaan_kajian_konsultan_kontruksi');

		$result = array();
		foreach ($indikator_pekerjaan_kajian_konsultan_kontruksi as $key => $val) {
			$result[] = array(
				'id_paket'   => $id_paket,
				'id_vendor'   => $id_vendor,
				'indikator_pekerjaan_konsultan_kajian_kontruksi_detail'   => $indikator_pekerjaan_kajian_konsultan_kontruksi[$key],
				'bobot_pekerjaan_konsultan_kajian_kontruksi_detail'   => $bobot_pekerjaan_kajian_konsultan_kontruksi[$key],
				'penilaian_konsultan_kajian_kontruksi_detail'   =>  $penilaian_kajian_konsultan_kontruksi[$key],
				'nilai_akhir_pekerjaan_konsultan_kajian_kontruksi_detail'   =>  $nilai_akhir_pekerjaan_kajian_konsultan_kontruksi[$key],
			);
		}

		$where = [
			'id_mengikuti_paket_vendor' => $id_paket,
			'id_mengikuti_vendor' => $id_vendor,
		];
		$data = [
			'rating_penilaian_vendor' => $rating_penilaian_vendor_pekerjaan_kajian_konsultan_kontruksi,
			'status_rating' => $status_rating_pekerjaan_kajian_konsultan_kontruksi,
			'status_rating_sudah_di_nilai' => 1,
			'status_jenis_penilayan' => 'konsultan kontruksi',
			'rating_nilai_akhir' => $status_nilai_akhir_pekerjaan_kajian_konsultan_kontruksi,
		];
		$this->Penilaian_vendor_model->update_pekerjaan_kontruksi_vendor($data, $where);
		$this->db->insert_batch('tbl_detail_penilaian_kinerja_pekerjaan_kajian_kontruksi', $result);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}

	public function reset_penilaian_performance_pekerjaan_kajian_konsultan_kontruksi()
	{
		$id_paket = $this->input->post('id_paket', TRUE);
		$area_agency = $this->session->userdata('id_unit_kerja2');
		$data['data_pemenang'] = $this->Penilaian_vendor_model->get_paket_data_vendor_pemenang($area_agency, $id_paket);
		$foroutput = $this->Penilaian_vendor_model->get_paket_data_vendor_pemenang($area_agency, $id_paket);
		$nama_paket = $foroutput['nama_paket'];
		$nama_metode_pemilihan = $foroutput['nama_metode_pemilihan'];
		$id_vendor = $data['data_pemenang']['id_mengikuti_vendor'];
		$id_paket_vendor = $data['data_pemenang']['id_mengikuti_paket_vendor'];
		$vendor_pemenag_by_id_pekerjaan_kontruksi = $this->Penilaian_vendor_model->by_id_vendor_pemenang_pekerjaan_kontruksi($id_vendor, $id_paket_vendor);

		if ($vendor_pemenag_by_id_pekerjaan_kontruksi['status_warning_vendor'] == 1) {
			// update ke tbl_vendor_mengikuti_paket
			$where_warning = [
				'id_mengikuti_paket_vendor' => $id_paket,
				'id_mengikuti_vendor' => $id_vendor,
			];
			$data_warning = [
				'rating_penilaian_vendor' => null,
				'status_jenis_penilayan' => null,
				'status_rating' => null,
				'status_rating_sudah_di_nilai' => null,
				'rating_nilai_akhir' => null,
			];
			// update ke tbl_vendor
			$where_tbl_vendor_warning = [
				'id_vendor' => $id_vendor,
			];
			$data_tbl_vendor_warning = [
				'status_warning_vendor' => 0,
			];
			$where_delete_tbl_penilainya = [
				'id_paket' => $id_paket_vendor,
				'id_vendor' => $id_vendor
			];
			$this->Penilaian_vendor_model->delete_penilaian_kajian_konsultan_kontruksi($where_delete_tbl_penilainya);
			$this->Penilaian_vendor_model->update_status_warning_pekerjaan_kontruksi($data_tbl_vendor_warning, $where_tbl_vendor_warning);
			$this->Penilaian_vendor_model->update_pekerjaan_kontruksi_vendor($data_warning, $where_warning);
			if ($foroutput['status_vendor_baru'] == null) {
				$email_vendor = $foroutput['email_usaha'];
				$telpon_vendor = $foroutput['telpon_usaha'];
			} else {
				$email_vendor = $foroutput['email_vendor'];
				$telpon_vendor = $foroutput['telpon_vendor'];
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
			// Email dan nama pengirim
			$this->email->from('eproc@jmtm.co.id', 'JMTM');

			// Email penerima
			$this->email->to($email_vendor); // Ganti dengan email tujuan

			// Subject email
			$this->email->subject('E-PROCUREMENT JMTM INFO PENILAIAN KINERJA !!!');

			// Isi email
			$this->email->message("Mengalamai Penilaian Ulang Oleh Agency Pada Nama Paket : $nama_paket , Metode Pemilihan : $nama_metode_pemilihan, Tidak Ada Peringataan, Saat Ini Aman, Anda Dapat Mengikuti Paket Tender Selanjutnya Pada Jmtm E-procurement.");
			$this->email->send();

			$output = [
				"isi" => "Mengalamai Penilaian Ulang Oleh Agency, Tidak Ada Peringataan, Saat Ini Aman, Anda Dapat Mengikuti Paket Tender Selanjutnya Pada Jmtm E-procurement.",
				"paket" => $foroutput,
				"telpon" => $telpon_vendor
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($output));
		} else if ($vendor_pemenag_by_id_pekerjaan_kontruksi['status_warning_vendor'] == 2) {
			$where_blacklist = [
				'id_mengikuti_paket_vendor' => $id_paket,
				'id_mengikuti_vendor' => $id_vendor,
			];
			$data_blacklist = [
				'rating_penilaian_vendor' => null,
				'status_rating' => null,
				'status_rating_sudah_di_nilai' => null,
				'status_jenis_penilayan' => null,
				'rating_nilai_akhir' => null,
			];
			$where_tbl_vendor_blacklist = [
				'id_vendor' => $id_vendor,
			];
			$data_tbl_vendor_blacklist = [
				'status_warning_vendor' => 1,
			];
			$where_delete_tbl_penilainya = [
				'id_paket' => $id_paket_vendor,
				'id_vendor' => $id_vendor
			];

			$data_blacklist_vendor = [
				'alasan_daftar_hitam' => null,
				'masa_berlaku_daftar_hitam_mulai' => null,
				'masa_berlaku_daftar_hitam_selesai' => null,
				'status_aktive_vendor' => 1,
				'status_daftar_hitam_vendor' => 0
			];
			$this->Penilaian_vendor_model->update_ke_vendor($data_blacklist_vendor, $where_tbl_vendor_blacklist);
			$this->Penilaian_vendor_model->delete_penilaian_kajian_konsultan_kontruksi($where_delete_tbl_penilainya);
			$this->Penilaian_vendor_model->update_status_warning_pekerjaan_kontruksi($data_tbl_vendor_blacklist, $where_tbl_vendor_blacklist);
			$this->Penilaian_vendor_model->update_pekerjaan_kontruksi_vendor($data_blacklist, $where_blacklist);

			if ($foroutput['status_vendor_baru'] == null) {
				$email_vendor = $foroutput['email_usaha'];
				$telpon_vendor = $foroutput['telpon_usaha'];
			} else {
				$email_vendor = $foroutput['email_vendor'];
				$telpon_vendor = $foroutput['telpon_vendor'];
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
			// Email dan nama pengirim
			$this->email->from('eproc@jmtm.co.id', 'JMTM');

			// Email penerima
			$this->email->to($email_vendor); // Ganti dengan email tujuan

			// Subject email
			$this->email->subject('E-PROCUREMENT JMTM INFO PENILAIAN KINERJA !!!');

			// Isi email
			$this->email->message("Mengalamai Penilaian Ulang Oleh Agency Pada Nama Paket : $nama_paket , Metode Pemilihan : $nama_metode_pemilihan, Tidak Ada Peringataan Ke-2, Saat Ini Anda Masih Dalam Peringataan Ke-1, Anda Masih Dapat Mengikuti Paket Tender Selanjutnya Pada Jmtm E-procurement.");
			$this->email->send();

			$output = [
				"isi" => "Mengalamai Penilaian Ulang Oleh Agency, Tidak Ada Peringataan Ke-2, Saat Ini Anda Masih Dalam Peringataan Ke-1, Anda Masih Dapat Mengikuti Paket Tender Selanjutnya Pada Jmtm E-procurement.",
				"paket" => $foroutput,
				"telpon" => $telpon_vendor
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($output));
		} else {
			$where = [
				'id_mengikuti_paket_vendor' => $id_paket,
				'id_mengikuti_vendor' => $id_vendor,
			];
			$data = [
				'rating_penilaian_vendor' => null,
				'status_rating' => null,
				'status_jenis_penilayan' => null,
				'status_rating_sudah_di_nilai' => null,
				'rating_nilai_akhir' => null,
			];
			$where_delete_tbl_penilainya = [
				'id_paket' => $id_paket_vendor,
				'id_vendor' => $id_vendor
			];
			$this->Penilaian_vendor_model->delete_penilaian_kajian_konsultan_kontruksi($where_delete_tbl_penilainya);
			$this->Penilaian_vendor_model->update_pekerjaan_kontruksi_vendor($data, $where);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}




	// INI UNTUK PENILAIAN  KONSULTAN  PENGAWAS KONTRUKSI
	public function tambah_warning_pekerjaan_konsultan_pengawas_kontruksisaya()
	{
		$id_paket = $this->input->post('id_paket', TRUE);
		$id_vendor = $this->input->post('id_vendor', TRUE);
		$indikator_pekerjaan_konsultan_pengawas_kontruksi = $this->input->post('indikator_pekerjaan_konsultan_pengawas_kontruksi', TRUE);
		$bobot_pekerjaan_konsultan_pengawas_kontruksi = $this->input->post('bobot_pekerjaan_konsultan_pengawas_kontruksi', TRUE);
		$penilaian_konsultan_pengawas_kontruksi = $this->input->post('penilaian_konsultan_pengawas_kontruksi', TRUE);
		$nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi = $this->input->post('nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi', TRUE);
		// tbl_vendor mengikuti paket

		$rating_penilaian_vendor_pekerjaan_konsultan_pengawas_kontruksi = $this->input->post('rating_penilaian_vendor_pekerjaan_konsultan_pengawas_kontruksi');
		$status_rating_pekerjaan_konsultan_pengawas_kontruksi = $this->input->post('status_rating_pekerjaan_konsultan_pengawas_kontruksi');
		$status_nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi = $this->input->post('status_nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi');
		$area_agency = $this->session->userdata('id_unit_kerja2');
		$foroutput = $this->Penilaian_vendor_model->get_paket_data_vendor_pemenang($area_agency, $id_paket);
		$nama_paket = $foroutput['nama_paket'];
		$nama_metode_pemilihan = $foroutput['nama_metode_pemilihan'];
		$data['data_pemenang'] = $this->Penilaian_vendor_model->get_paket_data_vendor_pemenang($area_agency, $id_paket);
		$id_vendor2 = $data['data_pemenang']['id_mengikuti_vendor'];
		$id_paket_vendor = $data['data_pemenang']['id_mengikuti_paket_vendor'];
		$vendor_pemenag_by_id_pekerjaan_kontruksi = $this->Penilaian_vendor_model->by_id_vendor_pemenang_pekerjaan_kontruksi($id_vendor2, $id_paket_vendor);


		if ($vendor_pemenag_by_id_pekerjaan_kontruksi['status_warning_vendor'] == 1) {
			// ketable detail penilaian
			$result = array();
			foreach ($indikator_pekerjaan_konsultan_pengawas_kontruksi as $key => $val) {
				$result[] = array(
					'id_paket'   => $id_paket,
					'id_vendor'   => $id_vendor,
					'indikator_pekerjaan_konsultan_pengawasan_kontruksi_detail'   => $indikator_pekerjaan_konsultan_pengawas_kontruksi[$key],
					'bobot_pekerjaan_konsultan_pengawasan_kontruksi_detail'   => $bobot_pekerjaan_konsultan_pengawas_kontruksi[$key],
					'penilaian_konsultan_pengawasan_kontruksi_detail'   =>  $penilaian_konsultan_pengawas_kontruksi[$key],
					'nilai_akhir_pekerjaan_konsultan_pengawasan_kontruksi_detail'   =>  $nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi[$key],
				);
			}

			// ketable vendor mengkikuti paket
			$where = [
				'id_mengikuti_paket_vendor' => $id_paket,
				'id_mengikuti_vendor' => $id_vendor,
			];
			$data = [
				'rating_penilaian_vendor' => $rating_penilaian_vendor_pekerjaan_konsultan_pengawas_kontruksi,
				'status_rating' => $status_rating_pekerjaan_konsultan_pengawas_kontruksi,
				'status_rating_sudah_di_nilai' => 1,
				'status_jenis_penilayan' => 'konsultan pengawas kontruksi',
				'rating_nilai_akhir' => $status_nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi,
			];

			// ke table vendor
			$where_tbl_vendor_warning = [
				'id_vendor' => $id_vendor,
			];
			$data_tbl_vendor_warning = [
				'status_warning_vendor' => 2,
			];
			$data_blacklist_vendor = [
				'alasan_daftar_hitam' => "Mendapatakan Warning Ke 2 / Kinerja Vendor Kurang",
				'masa_berlaku_daftar_hitam_mulai' => date('d-m-Y H:i'),
				'masa_berlaku_daftar_hitam_selesai' => date('d-m-Y H:i', strtotime("+2 year")),
				'status_aktive_vendor' => 0,
				'status_daftar_hitam_vendor' => 1
			];
			$this->db->insert_batch('tbl_detail_penilaian_pekerjaan_konsultan_pengawasan_kontruksi', $result);
			$this->Penilaian_vendor_model->update_ke_vendor($data_blacklist_vendor, $where_tbl_vendor_warning);
			$this->Penilaian_vendor_model->update_pekerjaan_kontruksi_vendor($data, $where);
			$this->Penilaian_vendor_model->update_status_warning_pekerjaan_kontruksi($data_tbl_vendor_warning, $where_tbl_vendor_warning);
			if ($foroutput['status_vendor_baru'] == null) {
				$email_vendor = $foroutput['email_usaha'];
				$telpon_vendor = $foroutput['telpon_usaha'];
			} else {
				$email_vendor = $foroutput['email_vendor'];
				$telpon_vendor = $foroutput['telpon_vendor'];
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
			// Email dan nama pengirim
			$this->email->from('eproc@jmtm.co.id', 'JMTM');

			// Email penerima
			$this->email->to($email_vendor); // Ganti dengan email tujuan

			// Subject email
			$this->email->subject('E-PROCUREMENT JMTM BLACKLIST!!! PENILAIAN KINERJA');

			// Isi email
			$this->email->message("Anda Mendapatkan Blacklist!!!, Anda Mendapatkan Warning Ke 2 Maka Anda Akan Kami Blacklist Selama 2 Tahun Pada Tender Jmtm E-procurement User Akan Kami NonAktifkan Sementara Sampai Hukuman 2 Tahun Blacklist Selesai, Nama Paket : $nama_paket , Metode Pemilihan : $nama_metode_pemilihan");
			$this->email->send();

			$output = [
				"isi" => "Anda Mendapatkan Blacklist!!!, Anda Mendapatkan Warning Ke 2 Maka Anda Akan Kami Blacklist Selama 2 Tahun Pada Tender Jmtm E-procurement User Akan Kami NonAktifkan Sementara Sampai Hukuman 2 Tahun Blacklist Selesai",
				"paket" => $foroutput,
				"telpon" => $telpon_vendor
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($output));
		} else {
			// ketable detail penilaian
			$result = array();
			foreach ($indikator_pekerjaan_konsultan_pengawas_kontruksi as $key => $val) {
				$result[] = array(
					'id_paket'   => $id_paket,
					'id_vendor'   => $id_vendor,
					'indikator_pekerjaan_konsultan_pengawasan_kontruksi_detail'   => $indikator_pekerjaan_konsultan_pengawas_kontruksi[$key],
					'bobot_pekerjaan_konsultan_pengawasan_kontruksi_detail'   => $bobot_pekerjaan_konsultan_pengawas_kontruksi[$key],
					'penilaian_konsultan_pengawasan_kontruksi_detail'   =>  $penilaian_konsultan_pengawas_kontruksi[$key],
					'nilai_akhir_pekerjaan_konsultan_pengawasan_kontruksi_detail'   =>  $nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi[$key],
				);
			}

			// ketable vendor mengkikuti paket
			$where = [
				'id_mengikuti_paket_vendor' => $id_paket,
				'id_mengikuti_vendor' => $id_vendor,
			];
			$data = [
				'rating_penilaian_vendor' => $rating_penilaian_vendor_pekerjaan_konsultan_pengawas_kontruksi,
				'status_rating' => $status_rating_pekerjaan_konsultan_pengawas_kontruksi,
				'status_rating_sudah_di_nilai' => 1,
				'status_jenis_penilayan' => 'konsultan pengawas kontruksi',
				'rating_nilai_akhir' => $status_nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi,
			];

			// ke table vendor
			$where_tbl_vendor_warning = [
				'id_vendor' => $id_vendor,
			];
			$data_tbl_vendor_warning = [
				'status_warning_vendor' => 1,
			];
			$this->Penilaian_vendor_model->update_pekerjaan_kontruksi_vendor($data, $where);
			$this->db->insert_batch('tbl_detail_penilaian_pekerjaan_konsultan_pengawasan_kontruksi', $result);
			$this->Penilaian_vendor_model->update_status_warning_pekerjaan_kontruksi($data_tbl_vendor_warning, $where_tbl_vendor_warning);

			if ($foroutput['status_vendor_baru'] == null) {
				$email_vendor = $foroutput['email_usaha'];
				$telpon_vendor = $foroutput['telpon_usaha'];
			} else {
				$email_vendor = $foroutput['email_vendor'];
				$telpon_vendor = $foroutput['telpon_vendor'];
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
			// Email dan nama pengirim
			$this->email->from('eproc@jmtm.co.id', 'JMTM');

			// Email penerima
			$this->email->to($email_vendor); // Ganti dengan email tujuan

			// Subject email
			$this->email->subject('E-PROCUREMENT JMTM WARNING!!! PENILAIAN KINERJA');

			// Isi email
			$this->email->message("Anda Mendapatkan Warning Ke 1, Perbaiki Kinerja Pada Tender Selanjutnya Jika Anda Mendapatkan Warning Ke 2 Maka Anda Akan Kami Blacklist Selama 2 Tahun Pada Tender Jmtm E-procurement, Nama Paket : $nama_paket , Metode Pemilihan : $nama_metode_pemilihan");
			$this->email->send();

			$output = [
				"isi" => "Anda Mendapatkan Warning Ke 1, Perbaiki Kinerja Pada Tender Selanjutnya Jika Anda Mendapatkan Warning Ke 2 Maka Anda Akan Kami Blacklist Selama 2 Tahun Pada Tender Jmtm E-procurement",
				"paket" => $foroutput,
				"telpon" => $telpon_vendor
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($output));
		}
	}
	public function tambah_pekerjaan_konsultan_pengawas_kontruksisaya()
	{

		$id_paket = $this->input->post('id_paket', TRUE);
		$id_vendor = $this->input->post('id_vendor', TRUE);
		$indikator_pekerjaan_konsultan_pengawas_kontruksi = $this->input->post('indikator_pekerjaan_konsultan_pengawas_kontruksi', TRUE);
		$bobot_pekerjaan_konsultan_pengawas_kontruksi = $this->input->post('bobot_pekerjaan_konsultan_pengawas_kontruksi', TRUE);
		$penilaian_konsultan_pengawas_kontruksi = $this->input->post('penilaian_konsultan_pengawas_kontruksi', TRUE);
		$nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi = $this->input->post('nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi', TRUE);
		// tbl_vendor mengikuti paket
		$rating_penilaian_vendor_pekerjaan_konsultan_pengawas_kontruksi = $this->input->post('rating_penilaian_vendor_pekerjaan_konsultan_pengawas_kontruksi');
		$status_rating_pekerjaan_konsultan_pengawas_kontruksi = $this->input->post('status_rating_pekerjaan_konsultan_pengawas_kontruksi');
		$status_nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi = $this->input->post('status_nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi');

		$result = array();
		foreach ($indikator_pekerjaan_konsultan_pengawas_kontruksi as $key => $val) {
			$result[] = array(
				'id_paket'   => $id_paket,
				'id_vendor'   => $id_vendor,
				'indikator_pekerjaan_konsultan_pengawasan_kontruksi_detail'   => $indikator_pekerjaan_konsultan_pengawas_kontruksi[$key],
				'bobot_pekerjaan_konsultan_pengawasan_kontruksi_detail'   => $bobot_pekerjaan_konsultan_pengawas_kontruksi[$key],
				'penilaian_konsultan_pengawasan_kontruksi_detail'   =>  $penilaian_konsultan_pengawas_kontruksi[$key],
				'nilai_akhir_pekerjaan_konsultan_pengawasan_kontruksi_detail'   =>  $nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi[$key],
			);
		}

		$where = [
			'id_mengikuti_paket_vendor' => $id_paket,
			'id_mengikuti_vendor' => $id_vendor,
		];
		$data = [
			'rating_penilaian_vendor' => $rating_penilaian_vendor_pekerjaan_konsultan_pengawas_kontruksi,
			'status_rating' => $status_rating_pekerjaan_konsultan_pengawas_kontruksi,
			'status_rating_sudah_di_nilai' => 1,
			'status_jenis_penilayan' => 'konsultan pengawas kontruksi',
			'rating_nilai_akhir' => $status_nilai_akhir_pekerjaan_konsultan_pengawas_kontruksi,
		];
		$this->Penilaian_vendor_model->update_pekerjaan_kontruksi_vendor($data, $where);
		$this->db->insert_batch('tbl_detail_penilaian_pekerjaan_konsultan_pengawasan_kontruksi', $result);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}

	public function reset_penilaian_performance_pekerjaan_konsultan_pengawas_kontruksi()
	{
		$id_paket = $this->input->post('id_paket', TRUE);
		$area_agency = $this->session->userdata('id_unit_kerja2');
		$data['data_pemenang'] = $this->Penilaian_vendor_model->get_paket_data_vendor_pemenang($area_agency, $id_paket);
		$foroutput = $this->Penilaian_vendor_model->get_paket_data_vendor_pemenang($area_agency, $id_paket);
		$nama_paket = $foroutput['nama_paket'];
		$nama_metode_pemilihan = $foroutput['nama_metode_pemilihan'];
		$id_vendor = $data['data_pemenang']['id_mengikuti_vendor'];
		$id_paket_vendor = $data['data_pemenang']['id_mengikuti_paket_vendor'];
		$vendor_pemenag_by_id_pekerjaan_kontruksi = $this->Penilaian_vendor_model->by_id_vendor_pemenang_pekerjaan_kontruksi($id_vendor, $id_paket_vendor);

		if ($vendor_pemenag_by_id_pekerjaan_kontruksi['status_warning_vendor'] == 1) {
			// update ke tbl_vendor_mengikuti_paket
			$where_warning = [
				'id_mengikuti_paket_vendor' => $id_paket,
				'id_mengikuti_vendor' => $id_vendor,
			];
			$data_warning = [
				'rating_penilaian_vendor' => null,
				'status_jenis_penilayan' => null,
				'status_rating' => null,
				'status_rating_sudah_di_nilai' => null,
				'rating_nilai_akhir' => null,
			];
			// update ke tbl_vendor
			$where_tbl_vendor_warning = [
				'id_vendor' => $id_vendor,
			];
			$data_tbl_vendor_warning = [
				'status_warning_vendor' => 0,
			];
			$where_delete_tbl_penilainya = [
				'id_paket' => $id_paket_vendor,
				'id_vendor' => $id_vendor
			];
			$this->Penilaian_vendor_model->delete_penilaian_konsultan_pengawas_kontruksi($where_delete_tbl_penilainya);
			$this->Penilaian_vendor_model->update_status_warning_pekerjaan_kontruksi($data_tbl_vendor_warning, $where_tbl_vendor_warning);
			$this->Penilaian_vendor_model->update_pekerjaan_kontruksi_vendor($data_warning, $where_warning);

			if ($foroutput['status_vendor_baru'] == null) {
				$email_vendor = $foroutput['email_usaha'];
				$telpon_vendor = $foroutput['telpon_usaha'];
			} else {
				$email_vendor = $foroutput['email_vendor'];
				$telpon_vendor = $foroutput['telpon_vendor'];
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
			// Email dan nama pengirim
			$this->email->from('eproc@jmtm.co.id', 'JMTM');

			// Email penerima
			$this->email->to($email_vendor); // Ganti dengan email tujuan

			// Subject email
			$this->email->subject('E-PROCUREMENT JMTM INFO PENILAIAN KINERJA !!!');

			// Isi email
			$this->email->message("Mengalamai Penilaian Ulang Oleh Agency Pada Nama Paket : $nama_paket , Metode Pemilihan : $nama_metode_pemilihan, Tidak Ada Peringataan, Saat Ini Aman, Anda Dapat Mengikuti Paket Tender Selanjutnya Pada Jmtm E-procurement.");
			$this->email->send();

			$output = [
				"isi" => "Mengalamai Penilaian Ulang Oleh Agency, Tidak Ada Peringataan, Saat Ini Aman, Anda Dapat Mengikuti Paket Tender Selanjutnya Pada Jmtm E-procurement.",
				"paket" => $foroutput,
				"telpon" => $telpon_vendor
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($output));
		} else if ($vendor_pemenag_by_id_pekerjaan_kontruksi['status_warning_vendor'] == 2) {
			$where_blacklist = [
				'id_mengikuti_paket_vendor' => $id_paket,
				'id_mengikuti_vendor' => $id_vendor,
			];
			$data_blacklist = [
				'rating_penilaian_vendor' => null,
				'status_rating' => null,
				'status_rating_sudah_di_nilai' => null,
				'status_jenis_penilayan' => null,
				'rating_nilai_akhir' => null,
			];
			$where_tbl_vendor_blacklist = [
				'id_vendor' => $id_vendor,
			];
			$data_tbl_vendor_blacklist = [
				'status_warning_vendor' => 1,
			];
			$where_delete_tbl_penilainya = [
				'id_paket' => $id_paket_vendor,
				'id_vendor' => $id_vendor
			];

			$data_blacklist_vendor = [
				'alasan_daftar_hitam' => null,
				'masa_berlaku_daftar_hitam_mulai' => null,
				'masa_berlaku_daftar_hitam_selesai' => null,
				'status_aktive_vendor' => 1,
				'status_daftar_hitam_vendor' => 0
			];
			$this->Penilaian_vendor_model->update_ke_vendor($data_blacklist_vendor, $where_tbl_vendor_blacklist);
			$this->Penilaian_vendor_model->delete_penilaian_konsultan_pengawas_kontruksi($where_delete_tbl_penilainya);
			$this->Penilaian_vendor_model->update_status_warning_pekerjaan_kontruksi($data_tbl_vendor_blacklist, $where_tbl_vendor_blacklist);
			$this->Penilaian_vendor_model->update_pekerjaan_kontruksi_vendor($data_blacklist, $where_blacklist);

			if ($foroutput['status_vendor_baru'] == null) {
				$email_vendor = $foroutput['email_usaha'];
				$telpon_vendor = $foroutput['telpon_usaha'];
			} else {
				$email_vendor = $foroutput['email_vendor'];
				$telpon_vendor = $foroutput['telpon_vendor'];
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
			// Email dan nama pengirim
			$this->email->from('eproc@jmtm.co.id', 'JMTM');

			// Email penerima
			$this->email->to($email_vendor); // Ganti dengan email tujuan

			// Subject email
			$this->email->subject('E-PROCUREMENT JMTM INFO PENILAIAN KINERJA !!!');

			// Isi email
			$this->email->message("Mengalamai Penilaian Ulang Oleh Agency Pada Nama Paket : $nama_paket , Metode Pemilihan : $nama_metode_pemilihan, Tidak Ada Peringataan Ke-2, Saat Ini Anda Masih Dalam Peringataan Ke-1, Anda Masih Dapat Mengikuti Paket Tender Selanjutnya Pada Jmtm E-procurement.");
			$this->email->send();

			$output = [
				"isi" => "Mengalamai Penilaian Ulang Oleh Agency, Tidak Ada Peringataan Ke-2, Saat Ini Anda Masih Dalam Peringataan Ke-1, Anda Masih Dapat Mengikuti Paket Tender Selanjutnya Pada Jmtm E-procurement.",
				"paket" => $foroutput,
				"telpon" => $telpon_vendor
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($output));
		} else {
			$where = [
				'id_mengikuti_paket_vendor' => $id_paket,
				'id_mengikuti_vendor' => $id_vendor,
			];
			$data = [
				'rating_penilaian_vendor' => null,
				'status_rating' => null,
				'status_jenis_penilayan' => null,
				'status_rating_sudah_di_nilai' => null,
				'rating_nilai_akhir' => null,
			];
			$where_delete_tbl_penilainya = [
				'id_paket' => $id_paket_vendor,
				'id_vendor' => $id_vendor
			];
			$this->Penilaian_vendor_model->delete_penilaian_konsultan_pengawas_kontruksi($where_delete_tbl_penilainya);
			$this->Penilaian_vendor_model->update_pekerjaan_kontruksi_vendor($data, $where);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}




	// INI UNTUK PENILAIAN  KONSULTAN  JASA LAINYA KONTRUKSI
	public function tambah_warning_pekerjaan_konsultan_jasa_lainya_kontruksisaya()
	{
		$id_paket = $this->input->post('id_paket', TRUE);
		$id_vendor = $this->input->post('id_vendor', TRUE);
		$indikator_pekerjaan_konsultan_jasa_lainya_kontruksi = $this->input->post('indikator_pekerjaan_konsultan_jasa_lainya_kontruksi', TRUE);
		$bobot_pekerjaan_konsultan_jasa_lainya_kontruksi = $this->input->post('bobot_pekerjaan_konsultan_jasa_lainya_kontruksi', TRUE);
		$penilaian_konsultan_jasa_lainya_kontruksi = $this->input->post('penilaian_konsultan_jasa_lainya_kontruksi', TRUE);
		$nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi = $this->input->post('nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi', TRUE);
		// tbl_vendor mengikuti paket

		$rating_penilaian_vendor_pekerjaan_konsultan_jasa_lainya_kontruksi = $this->input->post('rating_penilaian_vendor_pekerjaan_konsultan_jasa_lainya_kontruksi');
		$status_rating_pekerjaan_konsultan_jasa_lainya_kontruksi = $this->input->post('status_rating_pekerjaan_konsultan_jasa_lainya_kontruksi');
		$status_nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi = $this->input->post('status_nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi');
		$area_agency = $this->session->userdata('id_unit_kerja2');
		$data['data_pemenang'] = $this->Penilaian_vendor_model->get_paket_data_vendor_pemenang($area_agency, $id_paket);
		$foroutput = $this->Penilaian_vendor_model->get_paket_data_vendor_pemenang($area_agency, $id_paket);
		$nama_paket = $foroutput['nama_paket'];
		$nama_metode_pemilihan = $foroutput['nama_metode_pemilihan'];
		$id_vendor2 = $data['data_pemenang']['id_mengikuti_vendor'];
		$id_paket_vendor = $data['data_pemenang']['id_mengikuti_paket_vendor'];
		$vendor_pemenag_by_id_pekerjaan_kontruksi = $this->Penilaian_vendor_model->by_id_vendor_pemenang_pekerjaan_kontruksi($id_vendor2, $id_paket_vendor);


		if ($vendor_pemenag_by_id_pekerjaan_kontruksi['status_warning_vendor'] == 1) {
			// ketable detail penilaian
			$result = array();
			foreach ($indikator_pekerjaan_konsultan_jasa_lainya_kontruksi as $key => $val) {
				$result[] = array(
					'id_paket'   => $id_paket,
					'id_vendor'   => $id_vendor,
					'indikator_pekerjaan_jasa_lainya_detail'   => $indikator_pekerjaan_konsultan_jasa_lainya_kontruksi[$key],
					'bobot_pekerjaan_jasa_lainya_detail'   => $bobot_pekerjaan_konsultan_jasa_lainya_kontruksi[$key],
					'penilaian_jasa_lainya_detail'   =>  $penilaian_konsultan_jasa_lainya_kontruksi[$key],
					'nilai_akhir_pekerjaan_jasa_lainya_detail'   =>  $nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi[$key],
				);
			}

			// ketable vendor mengkikuti paket
			$where = [
				'id_mengikuti_paket_vendor' => $id_paket,
				'id_mengikuti_vendor' => $id_vendor,
			];
			$data = [
				'rating_penilaian_vendor' => $rating_penilaian_vendor_pekerjaan_konsultan_jasa_lainya_kontruksi,
				'status_rating' => $status_rating_pekerjaan_konsultan_jasa_lainya_kontruksi,
				'status_rating_sudah_di_nilai' => 1,
				'status_jenis_penilayan' => 'konsultan jasa laianya kontruksi',
				'rating_nilai_akhir' => $status_nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi,
			];

			// ke table vendor
			$where_tbl_vendor_warning = [
				'id_vendor' => $id_vendor,
			];
			$data_tbl_vendor_warning = [
				'status_warning_vendor' => 2,
			];
			$data_blacklist_vendor = [
				'alasan_daftar_hitam' => "Mendapatakan Warning Ke 2 / Kinerja Vendor Kurang",
				'masa_berlaku_daftar_hitam_mulai' => date('d-m-Y H:i'),
				'masa_berlaku_daftar_hitam_selesai' => date('d-m-Y H:i', strtotime("+2 year")),
				'status_aktive_vendor' => 0,
				'status_daftar_hitam_vendor' => 1
			];

			$this->db->insert_batch('tbl_detail_penilaian_kinerja_pekerjaan_jasa_lainya', $result);
			$this->Penilaian_vendor_model->update_ke_vendor($data_blacklist_vendor, $where_tbl_vendor_warning);
			$this->Penilaian_vendor_model->update_pekerjaan_kontruksi_vendor($data, $where);
			$this->Penilaian_vendor_model->update_status_warning_pekerjaan_kontruksi($data_tbl_vendor_warning, $where_tbl_vendor_warning);
			if ($foroutput['status_vendor_baru'] == null) {
				$email_vendor = $foroutput['email_usaha'];
				$telpon_vendor = $foroutput['telpon_usaha'];
			} else {
				$email_vendor = $foroutput['email_vendor'];
				$telpon_vendor = $foroutput['telpon_vendor'];
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
			// Email dan nama pengirim
			$this->email->from('eproc@jmtm.co.id', 'JMTM');

			// Email penerima
			$this->email->to($email_vendor); // Ganti dengan email tujuan

			// Subject email
			$this->email->subject('E-PROCUREMENT JMTM BLACKLIST!!! PENILAIAN KINERJA');

			// Isi email
			$this->email->message("Anda Mendapatkan Blacklist!!!, Anda Mendapatkan Warning Ke 2 Maka Anda Akan Kami Blacklist Selama 2 Tahun Pada Tender Jmtm E-procurement User Akan Kami NonAktifkan Sementara Sampai Hukuman 2 Tahun Blacklist Selesai, Nama Paket : $nama_paket , Metode Pemilihan : $nama_metode_pemilihan");
			$this->email->send();

			$output = [
				"isi" => "Anda Mendapatkan Blacklist!!!, Anda Mendapatkan Warning Ke 2 Maka Anda Akan Kami Blacklist Selama 2 Tahun Pada Tender Jmtm E-procurement User Akan Kami NonAktifkan Sementara Sampai Hukuman 2 Tahun Blacklist Selesai",
				"paket" => $foroutput,
				"telpon" => $telpon_vendor
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($output));
		} else {
			// ketable detail penilaian
			$result = array();
			foreach ($indikator_pekerjaan_konsultan_jasa_lainya_kontruksi as $key => $val) {
				$result[] = array(
					'id_paket'   => $id_paket,
					'id_vendor'   => $id_vendor,
					'indikator_pekerjaan_jasa_lainya_detail'   => $indikator_pekerjaan_konsultan_jasa_lainya_kontruksi[$key],
					'bobot_pekerjaan_jasa_lainya_detail'   => $bobot_pekerjaan_konsultan_jasa_lainya_kontruksi[$key],
					'penilaian_jasa_lainya_detail'   =>  $penilaian_konsultan_jasa_lainya_kontruksi[$key],
					'nilai_akhir_pekerjaan_jasa_lainya_detail'   =>  $nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi[$key],
				);
			}

			// ketable vendor mengkikuti paket
			$where = [
				'id_mengikuti_paket_vendor' => $id_paket,
				'id_mengikuti_vendor' => $id_vendor,
			];
			$data = [
				'rating_penilaian_vendor' => $rating_penilaian_vendor_pekerjaan_konsultan_jasa_lainya_kontruksi,
				'status_rating' => $status_rating_pekerjaan_konsultan_jasa_lainya_kontruksi,
				'status_rating_sudah_di_nilai' => 1,
				'status_jenis_penilayan' => 'konsultan jasa laianya kontruksi',
				'rating_nilai_akhir' => $status_nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi,
			];

			// ke table vendor
			$where_tbl_vendor_warning = [
				'id_vendor' => $id_vendor,
			];
			$data_tbl_vendor_warning = [
				'status_warning_vendor' => 1,
			];
			$this->Penilaian_vendor_model->update_pekerjaan_kontruksi_vendor($data, $where);
			$this->db->insert_batch('tbl_detail_penilaian_kinerja_pekerjaan_jasa_lainya', $result);
			$this->Penilaian_vendor_model->update_status_warning_pekerjaan_kontruksi($data_tbl_vendor_warning, $where_tbl_vendor_warning);

			if ($foroutput['status_vendor_baru'] == null) {
				$email_vendor = $foroutput['email_usaha'];
				$telpon_vendor = $foroutput['telpon_usaha'];
			} else {
				$email_vendor = $foroutput['email_vendor'];
				$telpon_vendor = $foroutput['telpon_vendor'];
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
			// Email dan nama pengirim
			$this->email->from('eproc@jmtm.co.id', 'JMTM');

			// Email penerima
			$this->email->to($email_vendor); // Ganti dengan email tujuan

			// Subject email
			$this->email->subject('E-PROCUREMENT JMTM WARNING!!! PENILAIAN KINERJA');

			// Isi email
			$this->email->message("Anda Mendapatkan Warning Ke 1, Perbaiki Kinerja Pada Tender Selanjutnya Jika Anda Mendapatkan Warning Ke 2 Maka Anda Akan Kami Blacklist Selama 2 Tahun Pada Tender Jmtm E-procurement, Nama Paket : $nama_paket , Metode Pemilihan : $nama_metode_pemilihan");
			$this->email->send();

			$output = [
				"isi" => "Anda Mendapatkan Warning Ke 1, Perbaiki Kinerja Pada Tender Selanjutnya Jika Anda Mendapatkan Warning Ke 2 Maka Anda Akan Kami Blacklist Selama 2 Tahun Pada Tender Jmtm E-procurement",
				"paket" => $foroutput,
				"telpon" => $telpon_vendor
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($output));
		}
	}
	public function tambah_pekerjaan_konsultan_jasa_lainya_kontruksisaya()
	{

		$id_paket = $this->input->post('id_paket', TRUE);
		$id_vendor = $this->input->post('id_vendor', TRUE);
		$indikator_pekerjaan_konsultan_jasa_lainya_kontruksi = $this->input->post('indikator_pekerjaan_konsultan_jasa_lainya_kontruksi', TRUE);
		$bobot_pekerjaan_konsultan_jasa_lainya_kontruksi = $this->input->post('bobot_pekerjaan_konsultan_jasa_lainya_kontruksi', TRUE);
		$penilaian_konsultan_jasa_lainya_kontruksi = $this->input->post('penilaian_konsultan_jasa_lainya_kontruksi', TRUE);
		$nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi = $this->input->post('nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi', TRUE);
		// tbl_vendor mengikuti paket
		$rating_penilaian_vendor_pekerjaan_konsultan_jasa_lainya_kontruksi = $this->input->post('rating_penilaian_vendor_pekerjaan_konsultan_jasa_lainya_kontruksi');
		$status_rating_pekerjaan_konsultan_jasa_lainya_kontruksi = $this->input->post('status_rating_pekerjaan_konsultan_jasa_lainya_kontruksi');
		$status_nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi = $this->input->post('status_nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi');

		$result = array();
		foreach ($indikator_pekerjaan_konsultan_jasa_lainya_kontruksi as $key => $val) {
			$result[] = array(
				'id_paket'   => $id_paket,
				'id_vendor'   => $id_vendor,
				'indikator_pekerjaan_jasa_lainya_detail'   => $indikator_pekerjaan_konsultan_jasa_lainya_kontruksi[$key],
				'bobot_pekerjaan_jasa_lainya_detail'   => $bobot_pekerjaan_konsultan_jasa_lainya_kontruksi[$key],
				'penilaian_jasa_lainya_detail'   =>  $penilaian_konsultan_jasa_lainya_kontruksi[$key],
				'nilai_akhir_pekerjaan_jasa_lainya_detail'   =>  $nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi[$key],
			);
		}

		$where = [
			'id_mengikuti_paket_vendor' => $id_paket,
			'id_mengikuti_vendor' => $id_vendor,
		];
		$data = [
			'rating_penilaian_vendor' => $rating_penilaian_vendor_pekerjaan_konsultan_jasa_lainya_kontruksi,
			'status_rating' => $status_rating_pekerjaan_konsultan_jasa_lainya_kontruksi,
			'status_rating_sudah_di_nilai' => 1,
			'status_jenis_penilayan' => 'konsultan jasa laianya kontruksi',
			'rating_nilai_akhir' => $status_nilai_akhir_pekerjaan_konsultan_jasa_lainya_kontruksi,
		];
		$this->Penilaian_vendor_model->update_pekerjaan_kontruksi_vendor($data, $where);
		$this->db->insert_batch('tbl_detail_penilaian_kinerja_pekerjaan_jasa_lainya', $result);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}

	public function reset_penilaian_performance_pekerjaan_konsultan_jasa_lainya_kontruksi()
	{
		$id_paket = $this->input->post('id_paket', TRUE);
		$area_agency = $this->session->userdata('id_unit_kerja2');
		$data['data_pemenang'] = $this->Penilaian_vendor_model->get_paket_data_vendor_pemenang($area_agency, $id_paket);
		$foroutput = $this->Penilaian_vendor_model->get_paket_data_vendor_pemenang($area_agency, $id_paket);
		$nama_paket = $foroutput['nama_paket'];
		$nama_metode_pemilihan = $foroutput['nama_metode_pemilihan'];
		$id_vendor = $data['data_pemenang']['id_mengikuti_vendor'];
		$id_paket_vendor = $data['data_pemenang']['id_mengikuti_paket_vendor'];
		$vendor_pemenag_by_id_pekerjaan_kontruksi = $this->Penilaian_vendor_model->by_id_vendor_pemenang_pekerjaan_kontruksi($id_vendor, $id_paket_vendor);

		if ($vendor_pemenag_by_id_pekerjaan_kontruksi['status_warning_vendor'] == 1) {
			// update ke tbl_vendor_mengikuti_paket
			$where_warning = [
				'id_mengikuti_paket_vendor' => $id_paket,
				'id_mengikuti_vendor' => $id_vendor,
			];
			$data_warning = [
				'rating_penilaian_vendor' => null,
				'status_jenis_penilayan' => null,
				'status_rating' => null,
				'status_rating_sudah_di_nilai' => null,
				'rating_nilai_akhir' => null,
			];
			// update ke tbl_vendor
			$where_tbl_vendor_warning = [
				'id_vendor' => $id_vendor,
			];
			$data_tbl_vendor_warning = [
				'status_warning_vendor' => 0,
			];
			$where_delete_tbl_penilainya = [
				'id_paket' => $id_paket_vendor,
				'id_vendor' => $id_vendor
			];
			$this->Penilaian_vendor_model->delete_penilaian_konsultan_jasa_lainya_kontruksi($where_delete_tbl_penilainya);
			$this->Penilaian_vendor_model->update_status_warning_pekerjaan_kontruksi($data_tbl_vendor_warning, $where_tbl_vendor_warning);
			$this->Penilaian_vendor_model->update_pekerjaan_kontruksi_vendor($data_warning, $where_warning);

			if (
				$foroutput['status_vendor_baru'] == null
			) {
				$email_vendor = $foroutput['email_usaha'];
				$telpon_vendor = $foroutput['telpon_usaha'];
			} else {
				$email_vendor = $foroutput['email_vendor'];
				$telpon_vendor = $foroutput['telpon_vendor'];
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
			// Email dan nama pengirim
			$this->email->from('eproc@jmtm.co.id', 'JMTM');

			// Email penerima
			$this->email->to($email_vendor); // Ganti dengan email tujuan

			// Subject email
			$this->email->subject('E-PROCUREMENT JMTM INFO PENILAIAN KINERJA !!!');

			// Isi email
			$this->email->message("Mengalamai Penilaian Ulang Oleh Agency Pada Nama Paket : $nama_paket , Metode Pemilihan : $nama_metode_pemilihan, Tidak Ada Peringataan, Saat Ini Aman, Anda Dapat Mengikuti Paket Tender Selanjutnya Pada Jmtm E-procurement.");
			$this->email->send();

			$output = [
				"isi" => "Mengalamai Penilaian Ulang Oleh Agency, Tidak Ada Peringataan, Saat Ini Aman, Anda Dapat Mengikuti Paket Tender Selanjutnya Pada Jmtm E-procurement.",
				"paket" => $foroutput,
				"telpon" => $telpon_vendor
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($output));
		} else if ($vendor_pemenag_by_id_pekerjaan_kontruksi['status_warning_vendor'] == 2) {
			$where_blacklist = [
				'id_mengikuti_paket_vendor' => $id_paket,
				'id_mengikuti_vendor' => $id_vendor,
			];
			$data_blacklist = [
				'rating_penilaian_vendor' => null,
				'status_rating' => null,
				'status_rating_sudah_di_nilai' => null,
				'status_jenis_penilayan' => null,
				'rating_nilai_akhir' => null,
			];
			$where_tbl_vendor_blacklist = [
				'id_vendor' => $id_vendor,
			];
			$data_tbl_vendor_blacklist = [
				'status_warning_vendor' => 1,
			];
			$where_delete_tbl_penilainya = [
				'id_paket' => $id_paket_vendor,
				'id_vendor' => $id_vendor
			];
			$data_blacklist_vendor = [
				'alasan_daftar_hitam' => null,
				'masa_berlaku_daftar_hitam_mulai' => null,
				'masa_berlaku_daftar_hitam_selesai' => null,
				'status_aktive_vendor' => 1,
				'status_daftar_hitam_vendor' => 0
			];
			$this->Penilaian_vendor_model->update_ke_vendor($data_blacklist_vendor, $where_tbl_vendor_blacklist);
			$this->Penilaian_vendor_model->delete_penilaian_konsultan_jasa_lainya_kontruksi($where_delete_tbl_penilainya);
			$this->Penilaian_vendor_model->update_status_warning_pekerjaan_kontruksi($data_tbl_vendor_blacklist, $where_tbl_vendor_blacklist);
			$this->Penilaian_vendor_model->update_pekerjaan_kontruksi_vendor($data_blacklist, $where_blacklist);
			if ($foroutput['status_vendor_baru'] == null) {
				$email_vendor = $foroutput['email_usaha'];
				$telpon_vendor = $foroutput['telpon_usaha'];
			} else {
				$email_vendor = $foroutput['email_vendor'];
				$telpon_vendor = $foroutput['telpon_vendor'];
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
			// Email dan nama pengirim
			$this->email->from('eproc@jmtm.co.id', 'JMTM');

			// Email penerima
			$this->email->to($email_vendor); // Ganti dengan email tujuan

			// Subject email
			$this->email->subject('E-PROCUREMENT JMTM INFO PENILAIAN KINERJA !!!');

			// Isi email
			$this->email->message("Mengalamai Penilaian Ulang Oleh Agency Pada Nama Paket : $nama_paket , Metode Pemilihan : $nama_metode_pemilihan, Tidak Ada Peringataan Ke-2, Saat Ini Anda Masih Dalam Peringataan Ke-1, Anda Masih Dapat Mengikuti Paket Tender Selanjutnya Pada Jmtm E-procurement.");
			$this->email->send();

			$output = [
				"isi" => "Mengalamai Penilaian Ulang Oleh Agency, Tidak Ada Peringataan Ke-2, Saat Ini Anda Masih Dalam Peringataan Ke-1, Anda Masih Dapat Mengikuti Paket Tender Selanjutnya Pada Jmtm E-procurement.",
				"paket" => $foroutput,
				"telpon" => $telpon_vendor
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($output));
		} else {
			$where = [
				'id_mengikuti_paket_vendor' => $id_paket,
				'id_mengikuti_vendor' => $id_vendor,
			];
			$data = [
				'rating_penilaian_vendor' => null,
				'status_rating' => null,
				'status_jenis_penilayan' => null,
				'status_rating_sudah_di_nilai' => null,
				'rating_nilai_akhir' => null,
			];
			$where_delete_tbl_penilainya = [
				'id_paket' => $id_paket_vendor,
				'id_vendor' => $id_vendor
			];
			$this->Penilaian_vendor_model->delete_penilaian_konsultan_jasa_lainya_kontruksi($where_delete_tbl_penilainya);
			$this->Penilaian_vendor_model->update_pekerjaan_kontruksi_vendor($data, $where);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}


	// INI UNTUK PENILAIAN  KONSULTAN  PENYEDIA BARANG KONTRUKSI
	public function tambah_warning_pekerjaan_konsultan_penyedia_barang_kontruksisaya()
	{
		$id_paket = $this->input->post('id_paket', TRUE);
		$id_vendor = $this->input->post('id_vendor', TRUE);
		$indikator_pekerjaan_konsultan_penyedia_barang_kontruksi = $this->input->post('indikator_pekerjaan_konsultan_penyedia_barang_kontruksi', TRUE);
		$bobot_pekerjaan_konsultan_penyedia_barang_kontruksi = $this->input->post('bobot_pekerjaan_konsultan_penyedia_barang_kontruksi', TRUE);
		$penilaian_konsultan_penyedia_barang_kontruksi = $this->input->post('penilaian_konsultan_penyedia_barang_kontruksi', TRUE);
		$nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi = $this->input->post('nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi', TRUE);
		// tbl_vendor mengikuti paket

		$rating_penilaian_vendor_pekerjaan_konsultan_penyedia_barang_kontruksi = $this->input->post('rating_penilaian_vendor_pekerjaan_konsultan_penyedia_barang_kontruksi');
		$status_rating_pekerjaan_konsultan_penyedia_barang_kontruksi = $this->input->post('status_rating_pekerjaan_konsultan_penyedia_barang_kontruksi');
		$status_nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi = $this->input->post('status_nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi');
		$area_agency = $this->session->userdata('id_unit_kerja2');
		$foroutput = $this->Penilaian_vendor_model->get_paket_data_vendor_pemenang($area_agency, $id_paket);
		$nama_paket = $foroutput['nama_paket'];
		$nama_metode_pemilihan = $foroutput['nama_metode_pemilihan'];
		$data['data_pemenang'] = $this->Penilaian_vendor_model->get_paket_data_vendor_pemenang($area_agency, $id_paket);
		$id_vendor2 = $data['data_pemenang']['id_mengikuti_vendor'];
		$id_paket_vendor = $data['data_pemenang']['id_mengikuti_paket_vendor'];
		$vendor_pemenag_by_id_pekerjaan_kontruksi = $this->Penilaian_vendor_model->by_id_vendor_pemenang_pekerjaan_kontruksi($id_vendor2, $id_paket_vendor);


		if ($vendor_pemenag_by_id_pekerjaan_kontruksi['status_warning_vendor'] == 1) {
			// ketable detail penilaian
			$result = array();
			foreach ($indikator_pekerjaan_konsultan_penyedia_barang_kontruksi as $key => $val) {
				$result[] = array(
					'id_paket'   => $id_paket,
					'id_vendor'   => $id_vendor,
					'indikator_pekerjaan_penyedia_barang_detail'   => $indikator_pekerjaan_konsultan_penyedia_barang_kontruksi[$key],
					'bobot_pekerjaan_penyedia_barang_detail'   => $bobot_pekerjaan_konsultan_penyedia_barang_kontruksi[$key],
					'penilaian_penyedia_barang_detail'   =>  $penilaian_konsultan_penyedia_barang_kontruksi[$key],
					'nilai_akhir_pekerjaan_penyedia_barang_detail'   =>  $nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi[$key],
				);
			}

			// ketable vendor mengkikuti paket
			$where = [
				'id_mengikuti_paket_vendor' => $id_paket,
				'id_mengikuti_vendor' => $id_vendor,
			];
			$data = [
				'rating_penilaian_vendor' => $rating_penilaian_vendor_pekerjaan_konsultan_penyedia_barang_kontruksi,
				'status_rating' => $status_rating_pekerjaan_konsultan_penyedia_barang_kontruksi,
				'status_rating_sudah_di_nilai' => 1,
				'status_jenis_penilayan' => 'konsultan penyedia barang kontruksi',
				'rating_nilai_akhir' => $status_nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi,
			];

			// ke table vendor
			$where_tbl_vendor_warning = [
				'id_vendor' => $id_vendor,
			];
			$data_tbl_vendor_warning = [
				'status_warning_vendor' => 2,
			];

			$data_blacklist_vendor = [
				'alasan_daftar_hitam' => "Mendapatakan Warning Ke 2 / Kinerja Vendor Kurang",
				'masa_berlaku_daftar_hitam_mulai' => date('d-m-Y H:i'),
				'masa_berlaku_daftar_hitam_selesai' => date('d-m-Y H:i', strtotime("+2 year")),
				'status_aktive_vendor' => 0,
				'status_daftar_hitam_vendor' => 1
			];

			$this->db->insert_batch('tbl_detail_penilaian_kinerja_pekerjaan_penyedia_barang', $result);
			$this->Penilaian_vendor_model->update_ke_vendor($data_blacklist_vendor, $where_tbl_vendor_warning);
			$this->Penilaian_vendor_model->update_pekerjaan_kontruksi_vendor($data, $where);
			$this->Penilaian_vendor_model->update_status_warning_pekerjaan_kontruksi($data_tbl_vendor_warning, $where_tbl_vendor_warning);
			if ($foroutput['status_vendor_baru'] == null) {
				$email_vendor = $foroutput['email_usaha'];
				$telpon_vendor = $foroutput['telpon_usaha'];
			} else {
				$email_vendor = $foroutput['email_vendor'];
				$telpon_vendor = $foroutput['telpon_vendor'];
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
			// Email dan nama pengirim
			$this->email->from('eproc@jmtm.co.id', 'JMTM');

			// Email penerima
			$this->email->to($email_vendor); // Ganti dengan email tujuan

			// Subject email
			$this->email->subject('E-PROCUREMENT JMTM BLACKLIST!!! PENILAIAN KINERJA');

			// Isi email
			$this->email->message("Anda Mendapatkan Blacklist!!!, Anda Mendapatkan Warning Ke 2 Maka Anda Akan Kami Blacklist Selama 2 Tahun Pada Tender Jmtm E-procurement User Akan Kami NonAktifkan Sementara Sampai Hukuman 2 Tahun Blacklist Selesai, Nama Paket : $nama_paket , Metode Pemilihan : $nama_metode_pemilihan");
			$this->email->send();

			$output = [
				"isi" => "Anda Mendapatkan Blacklist!!!, Anda Mendapatkan Warning Ke 2 Maka Anda Akan Kami Blacklist Selama 2 Tahun Pada Tender Jmtm E-procurement User Akan Kami NonAktifkan Sementara Sampai Hukuman 2 Tahun Blacklist Selesai",
				"paket" => $foroutput,
				"telpon" => $telpon_vendor
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($output));
		} else {
			// ketable detail penilaian
			$result = array();
			foreach ($indikator_pekerjaan_konsultan_penyedia_barang_kontruksi as $key => $val) {
				$result[] = array(
					'id_paket'   => $id_paket,
					'id_vendor'   => $id_vendor,
					'indikator_pekerjaan_penyedia_barang_detail'   => $indikator_pekerjaan_konsultan_penyedia_barang_kontruksi[$key],
					'bobot_pekerjaan_penyedia_barang_detail'   => $bobot_pekerjaan_konsultan_penyedia_barang_kontruksi[$key],
					'penilaian_penyedia_barang_detail'   =>  $penilaian_konsultan_penyedia_barang_kontruksi[$key],
					'nilai_akhir_pekerjaan_penyedia_barang_detail'   =>  $nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi[$key],
				);
			}

			// ketable vendor mengkikuti paket
			$where = [
				'id_mengikuti_paket_vendor' => $id_paket,
				'id_mengikuti_vendor' => $id_vendor,
			];
			$data = [
				'rating_penilaian_vendor' => $rating_penilaian_vendor_pekerjaan_konsultan_penyedia_barang_kontruksi,
				'status_rating' => $status_rating_pekerjaan_konsultan_penyedia_barang_kontruksi,
				'status_rating_sudah_di_nilai' => 1,
				'status_jenis_penilayan' => 'konsultan penyedia barang kontruksi',
				'rating_nilai_akhir' => $status_nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi,
			];

			// ke table vendor
			$where_tbl_vendor_warning = [
				'id_vendor' => $id_vendor,
			];
			$data_tbl_vendor_warning = [
				'status_warning_vendor' => 1,
			];
			$this->Penilaian_vendor_model->update_pekerjaan_kontruksi_vendor($data, $where);
			$this->db->insert_batch('tbl_detail_penilaian_kinerja_pekerjaan_penyedia_barang', $result);
			$this->Penilaian_vendor_model->update_status_warning_pekerjaan_kontruksi($data_tbl_vendor_warning, $where_tbl_vendor_warning);

			if ($foroutput['status_vendor_baru'] == null) {
				$email_vendor = $foroutput['email_usaha'];
				$telpon_vendor = $foroutput['telpon_usaha'];
			} else {
				$email_vendor = $foroutput['email_vendor'];
				$telpon_vendor = $foroutput['telpon_vendor'];
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
			// Email dan nama pengirim
			$this->email->from('eproc@jmtm.co.id', 'JMTM');

			// Email penerima
			$this->email->to($email_vendor); // Ganti dengan email tujuan

			// Subject email
			$this->email->subject('E-PROCUREMENT JMTM WARNING!!! PENILAIAN KINERJA');

			// Isi email
			$this->email->message("Anda Mendapatkan Warning Ke 1, Perbaiki Kinerja Pada Tender Selanjutnya Jika Anda Mendapatkan Warning Ke 2 Maka Anda Akan Kami Blacklist Selama 2 Tahun Pada Tender Jmtm E-procurement, Nama Paket : $nama_paket , Metode Pemilihan : $nama_metode_pemilihan");
			$this->email->send();

			$output = [
				"isi" => "Anda Mendapatkan Warning Ke 1, Perbaiki Kinerja Pada Tender Selanjutnya Jika Anda Mendapatkan Warning Ke 2 Maka Anda Akan Kami Blacklist Selama 2 Tahun Pada Tender Jmtm E-procurement",
				"paket" => $foroutput,
				"telpon" => $telpon_vendor
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($output));
		}
	}
	public function tambah_pekerjaan_konsultan_penyedia_barang_kontruksisaya()
	{

		$id_paket = $this->input->post('id_paket', TRUE);
		$id_vendor = $this->input->post('id_vendor', TRUE);
		$indikator_pekerjaan_konsultan_penyedia_barang_kontruksi = $this->input->post('indikator_pekerjaan_konsultan_penyedia_barang_kontruksi', TRUE);
		$bobot_pekerjaan_konsultan_penyedia_barang_kontruksi = $this->input->post('bobot_pekerjaan_konsultan_penyedia_barang_kontruksi', TRUE);
		$penilaian_konsultan_penyedia_barang_kontruksi = $this->input->post('penilaian_konsultan_penyedia_barang_kontruksi', TRUE);
		$nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi = $this->input->post('nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi', TRUE);
		// tbl_vendor mengikuti paket
		$rating_penilaian_vendor_pekerjaan_konsultan_penyedia_barang_kontruksi = $this->input->post('rating_penilaian_vendor_pekerjaan_konsultan_penyedia_barang_kontruksi');
		$status_rating_pekerjaan_konsultan_penyedia_barang_kontruksi = $this->input->post('status_rating_pekerjaan_konsultan_penyedia_barang_kontruksi');
		$status_nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi = $this->input->post('status_nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi');

		$result = array();
		foreach ($indikator_pekerjaan_konsultan_penyedia_barang_kontruksi as $key => $val) {
			$result[] = array(
				'id_paket'   => $id_paket,
				'id_vendor'   => $id_vendor,
				'indikator_pekerjaan_penyedia_barang_detail'   => $indikator_pekerjaan_konsultan_penyedia_barang_kontruksi[$key],
				'bobot_pekerjaan_penyedia_barang_detail'   => $bobot_pekerjaan_konsultan_penyedia_barang_kontruksi[$key],
				'penilaian_penyedia_barang_detail'   =>  $penilaian_konsultan_penyedia_barang_kontruksi[$key],
				'nilai_akhir_pekerjaan_penyedia_barang_detail'   =>  $nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi[$key],
			);
		}

		$where = [
			'id_mengikuti_paket_vendor' => $id_paket,
			'id_mengikuti_vendor' => $id_vendor,
		];
		$data = [
			'rating_penilaian_vendor' => $rating_penilaian_vendor_pekerjaan_konsultan_penyedia_barang_kontruksi,
			'status_rating' => $status_rating_pekerjaan_konsultan_penyedia_barang_kontruksi,
			'status_rating_sudah_di_nilai' => 1,
			'status_jenis_penilayan' => 'konsultan penyedia barang kontruksi',
			'rating_nilai_akhir' => $status_nilai_akhir_pekerjaan_konsultan_penyedia_barang_kontruksi,
		];
		$this->Penilaian_vendor_model->update_pekerjaan_kontruksi_vendor($data, $where);
		$this->db->insert_batch('tbl_detail_penilaian_kinerja_pekerjaan_penyedia_barang', $result);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}

	public function reset_penilaian_performance_pekerjaan_konsultan_penyedia_barang_kontruksi()
	{
		$id_paket = $this->input->post('id_paket', TRUE);
		$area_agency = $this->session->userdata('id_unit_kerja2');
		$data['data_pemenang'] = $this->Penilaian_vendor_model->get_paket_data_vendor_pemenang($area_agency, $id_paket);
		$foroutput = $this->Penilaian_vendor_model->get_paket_data_vendor_pemenang($area_agency, $id_paket);
		$nama_paket = $foroutput['nama_paket'];
		$nama_metode_pemilihan = $foroutput['nama_metode_pemilihan'];
		$id_vendor = $data['data_pemenang']['id_mengikuti_vendor'];
		$id_paket_vendor = $data['data_pemenang']['id_mengikuti_paket_vendor'];
		$vendor_pemenag_by_id_pekerjaan_kontruksi = $this->Penilaian_vendor_model->by_id_vendor_pemenang_pekerjaan_kontruksi($id_vendor, $id_paket_vendor);

		if ($vendor_pemenag_by_id_pekerjaan_kontruksi['status_warning_vendor'] == 1) {
			// update ke tbl_vendor_mengikuti_paket
			$where_warning = [
				'id_mengikuti_paket_vendor' => $id_paket,
				'id_mengikuti_vendor' => $id_vendor,
			];
			$data_warning = [
				'rating_penilaian_vendor' => null,
				'status_jenis_penilayan' => null,
				'status_rating' => null,
				'status_rating_sudah_di_nilai' => null,
				'rating_nilai_akhir' => null,
			];
			// update ke tbl_vendor
			$where_tbl_vendor_warning = [
				'id_vendor' => $id_vendor,
			];
			$data_tbl_vendor_warning = [
				'status_warning_vendor' => 0,
			];
			$where_delete_tbl_penilainya = [
				'id_paket' => $id_paket_vendor,
				'id_vendor' => $id_vendor
			];
			$this->Penilaian_vendor_model->delete_penilaian_konsultan_penyedia_barang_kontruksi($where_delete_tbl_penilainya);
			$this->Penilaian_vendor_model->update_status_warning_pekerjaan_kontruksi($data_tbl_vendor_warning, $where_tbl_vendor_warning);
			$this->Penilaian_vendor_model->update_pekerjaan_kontruksi_vendor($data_warning, $where_warning);

			if (
				$foroutput['status_vendor_baru'] == null
			) {
				$email_vendor = $foroutput['email_usaha'];
				$telpon_vendor = $foroutput['telpon_usaha'];
			} else {
				$email_vendor = $foroutput['email_vendor'];
				$telpon_vendor = $foroutput['telpon_vendor'];
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
			// Email dan nama pengirim
			$this->email->from('eproc@jmtm.co.id', 'JMTM');

			// Email penerima
			$this->email->to($email_vendor); // Ganti dengan email tujuan

			// Subject email
			$this->email->subject('E-PROCUREMENT JMTM INFO PENILAIAN KINERJA !!!');

			// Isi email
			$this->email->message("Mengalamai Penilaian Ulang Oleh Agency Pada Nama Paket : $nama_paket , Metode Pemilihan : $nama_metode_pemilihan, Tidak Ada Peringataan, Saat Ini Aman, Anda Dapat Mengikuti Paket Tender Selanjutnya Pada Jmtm E-procurement.");
			$this->email->send();

			$output = [
				"isi" => "Mengalamai Penilaian Ulang Oleh Agency, Tidak Ada Peringataan, Saat Ini Aman, Anda Dapat Mengikuti Paket Tender Selanjutnya Pada Jmtm E-procurement.",
				"paket" => $foroutput,
				"telpon" => $telpon_vendor
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($output));
		} else if ($vendor_pemenag_by_id_pekerjaan_kontruksi['status_warning_vendor'] == 2) {
			$where_blacklist = [
				'id_mengikuti_paket_vendor' => $id_paket,
				'id_mengikuti_vendor' => $id_vendor,
			];
			$data_blacklist = [
				'rating_penilaian_vendor' => null,
				'status_rating' => null,
				'status_rating_sudah_di_nilai' => null,
				'status_jenis_penilayan' => null,
				'rating_nilai_akhir' => null,
			];
			$where_tbl_vendor_blacklist = [
				'id_vendor' => $id_vendor,
			];
			$data_tbl_vendor_blacklist = [
				'status_warning_vendor' => 1,
			];
			$where_delete_tbl_penilainya = [
				'id_paket' => $id_paket_vendor,
				'id_vendor' => $id_vendor
			];
			$data_blacklist_vendor = [
				'alasan_daftar_hitam' => null,
				'masa_berlaku_daftar_hitam_mulai' => null,
				'masa_berlaku_daftar_hitam_selesai' => null,
				'status_aktive_vendor' => 1,
				'status_daftar_hitam_vendor' => 0
			];
			$this->Penilaian_vendor_model->update_ke_vendor($data_blacklist_vendor, $where_tbl_vendor_blacklist);
			$this->Penilaian_vendor_model->delete_penilaian_konsultan_penyedia_barang_kontruksi($where_delete_tbl_penilainya);
			$this->Penilaian_vendor_model->update_status_warning_pekerjaan_kontruksi($data_tbl_vendor_blacklist, $where_tbl_vendor_blacklist);
			$this->Penilaian_vendor_model->update_pekerjaan_kontruksi_vendor($data_blacklist, $where_blacklist);
			if ($foroutput['status_vendor_baru'] == null) {
				$email_vendor = $foroutput['email_usaha'];
				$telpon_vendor = $foroutput['telpon_usaha'];
			} else {
				$email_vendor = $foroutput['email_vendor'];
				$telpon_vendor = $foroutput['telpon_vendor'];
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
			// Email dan nama pengirim
			$this->email->from('eproc@jmtm.co.id', 'JMTM');

			// Email penerima
			$this->email->to($email_vendor); // Ganti dengan email tujuan

			// Subject email
			$this->email->subject('E-PROCUREMENT JMTM INFO PENILAIAN KINERJA !!!');

			// Isi email
			$this->email->message("Mengalamai Penilaian Ulang Oleh Agency Pada Nama Paket : $nama_paket , Metode Pemilihan : $nama_metode_pemilihan, Tidak Ada Peringataan Ke-2, Saat Ini Anda Masih Dalam Peringataan Ke-1, Anda Masih Dapat Mengikuti Paket Tender Selanjutnya Pada Jmtm E-procurement.");
			$this->email->send();

			$output = [
				"isi" => "Mengalamai Penilaian Ulang Oleh Agency, Tidak Ada Peringataan Ke-2, Saat Ini Anda Masih Dalam Peringataan Ke-1, Anda Masih Dapat Mengikuti Paket Tender Selanjutnya Pada Jmtm E-procurement.",
				"paket" => $foroutput,
				"telpon" => $telpon_vendor
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($output));
		} else {
			$where = [
				'id_mengikuti_paket_vendor' => $id_paket,
				'id_mengikuti_vendor' => $id_vendor,
			];
			$data = [
				'rating_penilaian_vendor' => null,
				'status_rating' => null,
				'status_jenis_penilayan' => null,
				'status_rating_sudah_di_nilai' => null,
				'rating_nilai_akhir' => null,
			];
			$where_delete_tbl_penilainya = [
				'id_paket' => $id_paket_vendor,
				'id_vendor' => $id_vendor
			];
			$this->Penilaian_vendor_model->delete_penilaian_konsultan_penyedia_barang_kontruksi($where_delete_tbl_penilainya);
			$this->Penilaian_vendor_model->update_pekerjaan_kontruksi_vendor($data, $where);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}

	public function update_tanggal_kontrak($id_paket)
	{
		$tanggal_nomor_kontrak = $this->input->post('tanggal_nomor_kontak');
		$where = [
			'id_paket' => $id_paket,
		];
		$data = [
			'tanggal_nomor_kontak' => $tanggal_nomor_kontrak,
		];
		$this->Penilaian_vendor_model->update_ke_paket($data, $where);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}
	public function update_nomor_kontrak($id_paket)
	{
		$nomor_kontrak = $this->input->post('nomor_kontrak');
		$where = [
			'id_paket' => $id_paket,
		];
		$data = [
			'nomor_kontrak' => $nomor_kontrak,
		];
		$this->Penilaian_vendor_model->update_ke_paket($data, $where);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}

	public function update_jangka_mulai($id_paket)
	{
		$jangka_mulai = $this->input->post('jangka_mulai');
		$where = [
			'id_paket' => $id_paket,
		];
		$data = [
			'jangka_mulai' => $jangka_mulai,
		];
		$this->Penilaian_vendor_model->update_ke_paket($data, $where);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}
	public function update_jangka_selesai($id_paket)
	{
		$jangka_selesai = $this->input->post('jangka_selesai');
		$where = [
			'id_paket' => $id_paket,
		];
		$data = [
			'jangka_selesai' => $jangka_selesai,
		];
		$this->Penilaian_vendor_model->update_ke_paket($data, $where);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}
}
