<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

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
        $this->load->view('beranda_gm/index', $data);
        $this->load->view('template/footer');
        $this->load->view('beranda_gm/ajax_chart', $data);
    }
}
