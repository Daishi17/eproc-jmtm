<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Penetapanlangsung extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('string');
		$this->load->model('Rup/Rup_model');
		$this->load->model('Wilayah/Wilayah_model');
		$this->load->model('Penetapanlangsung/Penetapanlangsung_model');
		$this->load->model('Paket/Paket_model');
		$this->load->model('Panitia/Rolepanitia_model');
		$this->load->model('Chat_negosiasi/Chat_negosiasi_model');
		$this->load->model('Penilaian_vendor/Penilaian_vendor_model');
		$this->load->model('Beranda/Chat_model');
	}

	public function index()
	{
		$this->load->view('template_penetapanlangsung/header');
		$this->load->view('template_penetapanlangsung/navbar');
		$this->load->view('penetapanlangsung/index');
		$this->load->view('template_penetapanlangsung/footer');
		$this->load->view('penetapanlangsung/beranda_ajax');
	}

	public function daftarpaket()
	{
		$this->load->view('template_penetapanlangsung/header');
		$this->load->view('template_penetapanlangsung/navbar');
		$this->load->view('penetapanlangsung/daftarpaket');
		$this->load->view('template_penetapanlangsung/footer');
		$this->load->view('penetapanlangsung/ajax');
	}

	public function informasipaket($id_paket)
	{
		$data['jumlah_peserta'] = $this->Rolepanitia_model->hitung_peserta($id_paket);
		$data['total_rincian_hps_pdf'] = $this->Paket_model->get_by_rincian_hps_pdf_result($id_paket);
		$data['total_hps_pdf_ada'] = $this->Paket_model->get_by_rincian_hps_pdf_sudah_dibuat($id_paket);
		$data['vendor_terpilih'] = $this->Paket_model->vendor_terpilih($id_paket);
		$data['result_data_jadwal_detail'] = $this->Paket_model->result_data_jadwal_detail2($id_paket);
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
		$data['id_paket'] = $this->uri->segment(3);
		$data['nama_vendor'] = $this->Penetapanlangsung_model->vendor_terpilih_row($id_paket);
		// var_dump($data['id_paket']);
		// die;
		$data['getdivisi'] = $this->Paket_model->get_devisi();
		$data['get_jenis_anggaran'] = $this->Paket_model->get_jenis_anggaran();
		$data['get_metode'] = $this->Paket_model->get_metode_pemilihan();
		$data['get_jenis_pengadaan'] = $this->Paket_model->get_jenis_pengadaan();
		$data['get_produk_dl_negri'] = $this->Paket_model->get_produk_dalam_negri();
		$data['kabupaten'] = $this->Wilayah_model->getAllKabupaten();
		$data['provinsi'] = $this->Wilayah_model->getProvinsi();
		$data['jadwal_tahap1'] = $this->Paket_model->get_jadwal_penetapan_langsung($id_paket);

		//get persyaratan
		$data['get_persyaratan'] = $this->Penetapanlangsung_model->get_persyaratan($id_paket);
		$data['get_tahap_download_dokumen_penetapan_langsung'] = $this->Paket_model->get_tahap_download_dokumen_penetapan_langsung($id_paket);
		$data['get_tahap_negosiasi_penetapan_langsung'] = $this->Paket_model->get_tahap_negosiasi_penetapan_langsung($id_paket);
		// INI TAHAP UNTUK PENETAPAN LANGSUNG
		$data['get_tahap_penetapan_pemenang_penetapan_langsung'] = $this->Paket_model->get_tahap_penetapan_pemenang_penetapan_langsung($id_paket);
		$this->load->view('template_penetapanlangsung/header');
		$this->load->view('template_penetapanlangsung/navbar');
		$this->load->view('penetapanlangsung/informasipaket', $data);
		$this->load->view('template_penetapanlangsung/footer');
		$this->load->view('penetapanlangsung/ajax');
	}

	public function buatpaket()
	{
		$data['getdivisi'] = $this->Rup_model->get_devisi();
		$data['get_jenis_anggaran'] = $this->Rup_model->get_jenis_anggaran();
		$data['get_metode'] = $this->Rup_model->get_metode_pemilihan();
		$data['get_jenis_pengadaan'] = $this->Rup_model->get_jenis_pengadaan();
		$data['get_produk_dl_negri'] = $this->Rup_model->get_produk_dalam_negri();
		$data['kabupaten'] = $this->Wilayah_model->getAllKabupaten();
		$data['provinsi'] = $this->Wilayah_model->getProvinsi();
		$data['all_paket'] = $this->Rup_model->getAllPaket();
		$this->load->view('template_penetapanlangsung/header');
		$this->load->view('template_penetapanlangsung/navbar');
		$this->load->view('penetapanlangsung/buatpaket', $data);
		$this->load->view('template_penetapanlangsung/footer');
		$this->load->view('penetapanlangsung/ajax');
	}

	public function detailpaket($id_paket)
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
		$data['id_paket'] = $this->uri->segment(3);
		$data['vendor_terpilih'] = $this->Paket_model->vendor_terpilih($id_paket);
		// var_dump($data['id_paket']);

		// die;
		$data['vendor_terpilih_detail'] = $this->Paket_model->vendor_terpilih_detail($id_paket);
		$data['getdivisi'] = $this->Paket_model->get_devisi();
		$data['get_jenis_anggaran'] = $this->Paket_model->get_jenis_anggaran();
		$data['get_metode'] = $this->Paket_model->get_metode_pemilihan();
		$data['get_jenis_pengadaan'] = $this->Paket_model->get_jenis_pengadaan();
		$data['get_produk_dl_negri'] = $this->Paket_model->get_produk_dalam_negri();
		$data['kabupaten'] = $this->Wilayah_model->getAllKabupaten();
		$data['provinsi'] = $this->Wilayah_model->getProvinsi();
		$this->load->view('template_penetapanlangsung/header');
		$this->load->view('template_penetapanlangsung/navbar');
		$this->load->view('penetapanlangsung/detailpaket', $data);
		$this->load->view('template_penetapanlangsung/footer');
		$this->load->view('penetapanlangsung/ajax');
	}

	public function buatjadwal($id_paket)
	{
		$data['angga'] = $this->Paket_model->getByid($id_paket);
		// var_dump($data['angga']);
		// die;
		$data['result_data_jadwal'] = $this->Penetapanlangsung_model->result_data_jadwal();
		$data['result_data_jadwal_detail'] = $this->Penetapanlangsung_model->result_data_jadwal_detail($id_paket);
		$this->load->view('template_penetapanlangsung/header');
		$this->load->view('template_penetapanlangsung/navbar');
		$this->load->view('penetapanlangsung/buatjadwal', $data);
		$this->load->view('template_penetapanlangsung/footer');
		$this->load->view('penetapanlangsung/ajax');
	}
	public function batalkan_paket_transaksi_langsung($id_paket)
	{
		$get_kode = $this->Paket_model->getByid($id_paket);
		$nama_paket_penetapan = $get_kode['nama_paket'];
		$vendor_kepilih = $this->Paket_model->vendor_terpilih_detail($id_paket);
		$kirim_email = $this->input->post('kirim_email');
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
			'status_penetapan_langsung' => 0
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
			'status_soft_delete' => 1
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
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
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
			'status_paket_tender' =>  1,
			'status_tahap_tender' =>  1,
			'token' => random_string('alnum', 128),
			'token_vendor' => random_string('alnum', 128)
		];
		$where_vendor_mengikuti_paket = [
			'id_mengikuti_paket_vendor' => $id_paket
		];
		$data2 = [
			'status_penetapan_langsung' => 1
		];
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
		$this->email->message("Kepada PT/PD : $username_vendor Anda Mempunyai Paket Penetapan Langsung Silakan Login Dan lihat Paket.                                                Username : $username_vendor           Password:$password_vendor                                    Login ke : https://vms.jmtm.co.id/auth");

		$this->email->send();
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}

	public function save_jadwal_penetapan_langsung($id_paket)
	{
		$nama_jadwal_penetapan_langsung_detail = $this->input->post('nama_jadwal_penetapan_langsung_detail');
		$tanggal_mulai = $this->input->post('tanggal_mulai');
		$tanggal_selesai = $this->input->post('tanggal_selesai');
		$tanggal_selesai_akhir = $this->input->post('tanggal_selesai[]');
		$batas_pendaftara_akhirn = $this->input->post('tanggal_selesai[]');
		$batas_pendaftaran2 = date('d-m-Y H:i', strtotime($batas_pendaftara_akhirn[0]));
		$tanggal_selesai_akhir2 = date('d-m-Y H:i', strtotime($tanggal_selesai_akhir[5]));
		$data = [
			'selesai_semua_tender' => $tanggal_selesai_akhir2,
			'batas_pendaftaran' => $batas_pendaftaran2
		];
		$where = [
			'id_paket' => $id_paket
		];

		$result = array();
		foreach ($nama_jadwal_penetapan_langsung_detail as $key => $val) {
			$result[] = array(
				'id_paket'   => $id_paket,
				'nama_jadwal_penetapan_langsung_detail'   => $nama_jadwal_penetapan_langsung_detail[$key],
				'tanggal_mulai'   => $tanggal_mulai[$key],
				'tanggal_selesai'   => $tanggal_selesai[$key],
				'user_created'   => 'Panitia'
			);
		}

		$this->db->insert_batch('tbl_penetapan_langsung_jadwal_detail', $result);
		$this->Paket_model->update_kategori_penyedia($data, $where);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}

	public function update_jadwal_penetapan_langsung($id_paket)
	{
		$tanggal_mulai = $this->input->post('tanggal_mulai[]');
		$tanggal_selesai = $this->input->post('tanggal_selesai[]');
		$id_jadwal_penetapan_langsung = $this->input->post('id_jadwal_penetapan_langsung[]');
		// jadwal manual
		$jadwal_mulai = date('d-m-Y H:i', strtotime($tanggal_mulai[1]));
		$jadwal_selesai = date('d-m-Y H:i', strtotime($tanggal_selesai[1]));
		$id_jadwal = $id_jadwal_penetapan_langsung[1];
		$tanggal_selesai_akhir30 =  date('d-m-Y H:i', strtotime($tanggal_selesai[1]));
		$where = [
			'id_jadwal_penetapan_langsung' => $id_jadwal,
			'id_paket' => $id_paket,
		];
		$data = [
			'tanggal_mulai' => $jadwal_mulai,
			'tanggal_selesai' => $jadwal_selesai
		];
		$this->Penetapanlangsung_model->update_jadwal_penetapan_langsung($data, $where);
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
		$id_jadwal = $id_jadwal_penetapan_langsung[2];
		$where = [
			'id_jadwal_penetapan_langsung' => $id_jadwal,
			'id_paket' => $id_paket,
		];
		$data = [
			'tanggal_mulai' => $jadwal_mulai,
			'tanggal_selesai' => $jadwal_selesai
		];
		$this->Penetapanlangsung_model->update_jadwal_penetapan_langsung($data, $where);


		// jadwal manual3
		$jadwal_mulai = date('d-m-Y H:i', strtotime($tanggal_mulai[3]));
		$jadwal_selesai = date('d-m-Y H:i', strtotime($tanggal_selesai[3]));
		$id_jadwal = $id_jadwal_penetapan_langsung[3];
		$where = [
			'id_jadwal_penetapan_langsung' => $id_jadwal,
			'id_paket' => $id_paket,
		];
		$data = [
			'tanggal_mulai' => $jadwal_mulai,
			'tanggal_selesai' => $jadwal_selesai
		];
		$this->Penetapanlangsung_model->update_jadwal_penetapan_langsung($data, $where);


		// jadwal manual4
		$jadwal_mulai = date('d-m-Y H:i', strtotime($tanggal_mulai[4]));
		$jadwal_selesai = date('d-m-Y H:i', strtotime($tanggal_selesai[4]));
		$id_jadwal = $id_jadwal_penetapan_langsung[4];
		$where = [
			'id_jadwal_penetapan_langsung' => $id_jadwal,
			'id_paket' => $id_paket,
		];
		$data = [
			'tanggal_mulai' => $jadwal_mulai,
			'tanggal_selesai' => $jadwal_selesai
		];
		$this->Penetapanlangsung_model->update_jadwal_penetapan_langsung($data, $where);


		// jadwal manual5
		$jadwal_mulai = date('d-m-Y H:i', strtotime($tanggal_mulai[5]));
		$jadwal_selesai = date('d-m-Y H:i', strtotime($tanggal_selesai[5]));
		$id_jadwal = $id_jadwal_penetapan_langsung[5];
		$where = [
			'id_jadwal_penetapan_langsung' => $id_jadwal,
			'id_paket' => $id_paket,
		];
		$data = [
			'tanggal_mulai' => $jadwal_mulai,
			'tanggal_selesai' => $jadwal_selesai
		];
		$this->Penetapanlangsung_model->update_jadwal_penetapan_langsung($data, $where);


		// jadwal manual6
		$jadwal_mulai = date('d-m-Y H:i', strtotime($tanggal_mulai[6]));
		$jadwal_selesai = date('d-m-Y H:i', strtotime($tanggal_selesai[6]));
		$id_jadwal = $id_jadwal_penetapan_langsung[6];
		$tanggal_selesai_akhir =  date('d-m-Y H:i', strtotime($tanggal_selesai[6]));
		$where = [
			'id_jadwal_penetapan_langsung' => $id_jadwal,
			'id_paket' => $id_paket,
		];
		$data = [
			'tanggal_mulai' => $jadwal_mulai,
			'tanggal_selesai' => $jadwal_selesai
		];
		$this->Penetapanlangsung_model->update_jadwal_penetapan_langsung($data, $where);

		$data_update = [
			'selesai_semua_tender' => $tanggal_selesai_akhir
		];
		$where_update = [
			'id_paket' => $id_paket
		];

		$this->Paket_model->update_kategori_penyedia($data_update, $where_update);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}

	public function get_dokumen_pengadaan($id_paket)
	{
		$result = $this->Penetapanlangsung_model->get_datatable_dokumen_pengadaan($id_paket);
		$data = [];
		$no = $_POST['start'];
		foreach ($result as  $angga) {
			$row = [];
			$row[] = ++$no;
			$row[] = $angga->nama_file_dokumen_pengadaan;
			$row[] = '<a target="_blank" href=' . base_url('/dokumen_pengadaan_penetapan_langsung' . '/' . $angga->file_dokumen_pengadaan_penetapan_langsung) . '>' . '<img width="40px" src=' . base_url('assets/img/pdf.png') . ' >' . '</a>';
			$row[] = '<a href="javascript:;" class="btn btn-danger btn-sm" onClick="byid_penetapan_langsung_delete(' . "'" . $angga->id_dokumen_penetapan_langsung . "','hapus'" . ')">  <i class="fas fa-trash"></i> Hapus</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => intval($_POST['draw']),
			"recordsTotal" => $this->Penetapanlangsung_model->count_filtered_data_dokumen_pengadaan($id_paket),
			"recordsFiltered" => $this->Penetapanlangsung_model->count_all_data_dokumen_pengadaan(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function upload_dokumen_pengadaan($id_paket)
	{
		$config['upload_path'] = './dokumen_pengadaan_penetapan_langsung/';
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = 0;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('file_dokumen_penetapan_langsung')) {

			$fileData = $this->upload->data();

			$upload = [
				'id_paket' => $id_paket,
				'nama_file_dokumen_pengadaan' => $this->input->post('nama_file_dokumen_pengadaan'),
				'file_dokumen_pengadaan_penetapan_langsung' => $fileData['file_name'],
				'user_created' => $this->session->userdata('nama_pegawai'),
				'date_created' => date('d-m-Y H:i')
			];
			$this->Penetapanlangsung_model->create_dokumen_penetapan_langsung($upload);
			$this->output->set_content_type('application/json')->set_output(json_encode($upload));
		} else {
			$this->session->set_flashdata('error', $this->upload->display_errors());
			redirect(base_url('upload'));
		}
	}

	public function delete_dokumen_pengadaan_dokumen_pengadaan($id_dokumen_pengadaan_penetapan_langsung)
	{
		$this->Penetapanlangsung_model->delete_dokumen_pengadaan($id_dokumen_pengadaan_penetapan_langsung);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}

	public function by_id_dokumen_pengadaan($id_dokumen_pengadaan_penetapan_langsung)
	{

		$get_dokumen_penetapan_langsung = $this->Penetapanlangsung_model->by_id_dokumen_pengadaan_penetapan_langsung($id_dokumen_pengadaan_penetapan_langsung);
		$output = [
			"get_dokumen_penetapan_langsung" => $get_dokumen_penetapan_langsung,

		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function byidDetail($id_paket)
	{
		$get_paket = $this->Paket_model->getByid($id_paket);
		$output = [
			"get_paket" => $get_paket,
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}


	public function get_all_paket()
	{
		$resultss = $this->Penetapanlangsung_model->get_datatable();
		$data = [];
		$no = $_POST['start'];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] = $angga->kode_jenis_anggaran . $angga->kode_jenis_pengadaan . $angga->kode_metode_pemilihan . $angga->kode_unit_kerja . $angga->kode_produk_dl_negri;
			$row[] = '<a href="javascript:;" onClick="byid(' . "'" . $angga->id_paket . "','detail'" . ')">' . $angga->nama_paket . '</a>';
			$row[] = $angga->nama_metode_pemilihan;
			$row[] = $angga->nama_unit_kerja;
			$row[] = $angga->program_paket;
			$row[] = $angga->nama_jenis_pengadaan;
			$row[] = $angga->nama_jenis_anggaran;
			if ($angga->selesai_semua_tender == null) {
				$row[] = '<label class="badge badge-warning">Paket Belum Di Buat</label>';
			} else {
				if (date('d F Y H:i', strtotime($angga->selesai_semua_tender))  >= date('d F Y H:i')) {
					$row[] = '<label class="badge badge-danger">Tender Sedang Berlangsung</label>';
				} else if (date('d F Y H:i', strtotime($angga->selesai_semua_tender)) >= date('d F Y H:i') || date('d F Y H:i', strtotime($angga->selesai_semua_tender))  == date('d F Y H:i')) {
					$row[] = '<label class="badge badge-danger">Tender Sedang Berlangsung</label>';
				} else {
					$row[] = '<label class="badge badge-success">Tender Selesai</label>';
				}
			}
			$row[] = '<a href="' . base_url('penetapanlangsung/editpaket/' . $angga->id_paket) . '" class="btn btn-success btn-sm btn-block""><i class="fas fa-edit"></i> Edit</a> <a href="javascript:;" class="btn btn-danger btn-sm btn-block " onClick="byid(' . "'" . $angga->id_paket . "','hapus'" . ')">  <i class="fas fa-trash"></i> Hapus</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => intval($_POST['draw']),
			"recordsTotal" => $this->Penetapanlangsung_model->count_filtered_data_paket_penetapan_langsung(),
			"recordsFiltered" => $this->Penetapanlangsung_model->count_all_data_paket_penetapan_langsung(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function get_paket_yang_sedang_berjalan()
	{
		$resultss = $this->Penetapanlangsung_model->get_datatable();
		$data = [];
		$no = $_POST['start'];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] = $angga->nama_paket;
			$row[] = $angga->kode_jenis_anggaran . $angga->kode_jenis_pengadaan . $angga->kode_metode_pemilihan . $angga->kode_unit_kerja . $angga->kode_produk_dl_negri;
			$row[] = $angga->nama_metode_pemilihan;
			$row[] = $angga->nama_jenis_pengadaan;
			$row[] = $angga->nama_unit_kerja;
			$row[] = $angga->program_paket;
			$row[] = $angga->nama_jenis_anggaran;
			if ($angga->selesai_semua_tender == null) {
				$row[] = '<label class="badge badge-warning">Paket Belum Di Buat</label>';
			} else {
				if (date('d F Y H:i', strtotime($angga->selesai_semua_tender))  >= date('d F Y H:i')) {
					$row[] = '<a class="btn btn-sm btn-grad100" href="' . base_url('penetapanlangsung/informasipaket/' . $angga->id_paket) . '">' . '<i class="fa fa-eye"></i>'  . ' Lihat Paket' . '</a>';
				} else if (date('d F Y H:i', strtotime($angga->selesai_semua_tender)) >= date('d F Y H:i') || date('d F Y H:i', strtotime($angga->selesai_semua_tender))  == date('d F Y H:i')) {
					$row[] = '<a class="btn btn-sm btn-grad100" href="' . base_url('penetapanlangsung/informasipaket/' . $angga->id_paket) . '">' . '<i class="fa fa-eye"></i>'  . ' Lihat Paket' . '</a>';
				} else {
					$row[] = '<a class="btn btn-sm btn-grad100" href="' . base_url('penetapanlangsung/informasipaket/' . $angga->id_paket) . '">' . '<i class="fa fa-eye"></i>'  . ' Lihat Paket' . '</a>';
				}
			}
			$data[] = $row;
		}
		$output = array(
			"draw" => intval($_POST['draw']),
			"recordsTotal" => $this->Penetapanlangsung_model->count_filtered_data_paket_penetapan_langsung(),
			"recordsFiltered" => $this->Penetapanlangsung_model->count_all_data_paket_penetapan_langsung(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	//CREATE
	public function save()
	{

		$table = "tbl_paket";
		$field = "kode_tender_random";
		$today = date('ymd');
		$text = '.JMTM.' . $today;
		$kode_terakhirnya = $this->Rup_model->get_kode_tender($text, $table, $field);
		$no_urut = (int) substr($kode_terakhirnya, -4, 4);
		$no_urut++;
		$hasilnya = $text . sprintf('%04s', $no_urut);

		$nama_paket = $this->input->post('nama_paket', TRUE);
		// $id_tahun_anggaran = $this->input->post('id_tahun_anggaran', TRUE);
		$id_unit_kerja = $this->input->post('id_unit_kerja', TRUE);
		$program_paket = $this->input->post('program_paket', TRUE);
		$id_jenis_pengadaan = $this->input->post('id_jenis_pengadaan', TRUE);
		$id_jenis_anggaran = $this->input->post('id_jenis_anggaran', TRUE);
		$id_metode_pemilihan = $this->input->post('id_metode_pemilihan', TRUE);
		$id_produk_dl_negri = $this->input->post('id_produk_dl_negri', TRUE);
		$uraian_pekerjaan_paket = $this->input->post('uraian_pekerjaan_paket', TRUE);
		$sepesifikasi_paket = $this->input->post('sepesifikasi_paket', TRUE);
		$kualifikasi_usaha = $this->input->post('kualifikasi_usaha', TRUE);
		// $id_kualifikasi = $this->input->post('id_kualifikasi', TRUE);
		// Insert lokasi Pekerjaan
		$id_provinsi = $this->input->post('id_provinsi', TRUE);
		$id_kabupaten = $this->input->post('id_kabupaten', TRUE);
		$detail_lokasi = $this->input->post('detail_lokasi', TRUE);

		//tahun jamak
		$tahun_mulai_jamak = $this->input->post('tahun_mulai_jamak');
		$tahun_selesai_jamak = $this->input->post('tahun_selesai_jamak');

		//alasan penetapan langsung
		$alasan_penetapan_langsung = $this->input->post('alasan_penetapan_langsung');


		// Insert Sumber Dana batchnya
		$asal_dana = $this->input->post('asal_dana', TRUE);
		$hps = $this->input->post('hps', TRUE);

		// Insert Jadwal Pemilihan Batchnya
		// $tahap = $this->input->post('tahap', TRUE);
		// $tanggal_mulai = $this->input->post('tanggal_mulai', TRUE);
		// $tanggal_selesai = $this->input->post('tanggal_selesai', TRUE);

		//Insert Table Paket Biasa
		$data  = array(
			'kode_rup_paket' => $id_jenis_anggaran . $id_jenis_pengadaan . $id_metode_pemilihan . $id_unit_kerja .  $id_produk_dl_negri,
			'kode_tender_random' => $hasilnya,
			'nama_paket' => $nama_paket,
			'id_unit_kerja' => $id_unit_kerja,
			'id_jenis_anggaran' => $id_jenis_anggaran,
			'program_paket' => $program_paket,
			'id_jenis_pengadaan' => $id_jenis_pengadaan,
			'id_metode_pemilihan' => $id_metode_pemilihan,
			// 'id_kualifikasi' => $id_kualifikasi,
			'id_produk_dl_negri' => $id_produk_dl_negri,
			'uraian_pekerjaan_paket' => $uraian_pekerjaan_paket,
			'sepesifikasi_paket' => $sepesifikasi_paket,
			'kualifikasi_usaha' => $kualifikasi_usaha,
			'tahun_mulai_jamak' => $tahun_mulai_jamak,
			'tahun_selesai_jamak' => $tahun_selesai_jamak,
			'alasan_penetapan_langsung' => $alasan_penetapan_langsung,
			'id_pegawai' => $this->session->userdata('id_pegawai'),
			'pembuat_paket' => $this->session->userdata('username'),
		);
		$this->db->insert('tbl_paket', $data);
		// End Insert Batch Tbl_paket
		$package_id = $this->db->insert_id(); // Ini ID table yang memberi Id Insertbatchnya
		// Insert Batch Lokasi
		$result = array();
		foreach ($detail_lokasi as $key => $val) {
			$result[] = array(
				'id_paket'   => $package_id,
				'id_provinsi'   => $id_provinsi[$key],
				'id_kabupaten'   => $id_kabupaten[$key],
				'detail_lokasi'   =>  $detail_lokasi[$key],
			);
		}

		$this->db->insert_batch('tbl_lokasi_pekerjaan', $result);
		// End Insert Batch Lokasi

		// Insert Batch Sumber Dana
		$result = array();
		foreach ($asal_dana as $key => $val) {
			$result[] = array(
				'id_paket'   => $package_id,
				'asal_dana'   => $asal_dana[$key],
				'hps'   => $hps[$key],
			);
		}
		$this->db->insert_batch('tbl_sumber_dana', $result);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}

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

	// update RUP
	public function update_rup()
	{

		$this->form_validation->set_rules('nama_paket', 'Nama Paket', 'required|trim', ['required' => 'Nama Paket Wajib Diisi!']);
		$this->form_validation->set_rules('id_unit_kerja', 'Nama Divisi', 'required|trim', ['required' => 'Nama Divisi Wajib Diisi!']);
		$this->form_validation->set_rules('program_paket', 'Nama Program', 'required|trim', ['required' => 'Nama Program Wajib Diisi!']);
		$this->form_validation->set_rules('id_jenis_pengadaan', 'Jenis Pengadaan', 'required|trim', ['required' => 'Jenis Pengadaan Wajib Diisi!']);
		$this->form_validation->set_rules('id_jenis_anggaran', 'Jenis Anggaran', 'required|trim', ['required' => 'Jenis Anggaran Wajib Diisi!']);
		$this->form_validation->set_rules('id_metode_pemilihan', 'Metode Pemilihan', 'required|trim', ['required' => 'Metode Pemilihan Wajib Diisi!']);
		$this->form_validation->set_rules('id_produk_dl_negri', 'Jenis Produk', 'required|trim', ['required' => 'Jenis Produk Wajib Diisi!']);
		$this->form_validation->set_rules('uraian_pekerjaan_paket', 'Uraian Pekerjaan Paket', 'required|trim', ['required' => 'Uraian Pekerjaan Paket Wajib Diisi!']);
		$this->form_validation->set_rules('kualifikasi_usaha', 'Kualifikasi Paket', 'required|trim', ['required' => 'Kualifikasi Paket Wajib Diisi!']);
		$this->form_validation->set_rules('sepesifikasi_paket', 'Sepesifikasi Paket', 'required|trim', ['required' => 'Sepesifikasi Paket Wajib Diisi!']);


		if ($this->form_validation->run() == false) {
			$data = [
				'nama_paket' => form_error('nama_paket'),
				'id_unit_kerja' => form_error('id_unit_kerja'),
				'program_paket' => form_error('program_paket'),
				'id_jenis_pengadaan' => form_error('id_jenis_pengadaan'),
				'id_jenis_anggaran' => form_error('id_jenis_anggaran'),
				'id_metode_pemilihan' => form_error('id_metode_pemilihan'),
				'id_produk_dl_negri' => form_error('id_produk_dl_negri'),
				'uraian_pekerjaan_paket' => form_error('uraian_pekerjaan_paket'),
				'kualifikasi_usaha' => form_error('kualifikasi_usaha'),
				'sepesifikasi_paket' => form_error('sepesifikasi_paket'),
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} else {
			$data = [
				'nama_paket' => htmlspecialchars($this->input->post('nama_paket')),
				'id_unit_kerja' => htmlspecialchars($this->input->post('id_unit_kerja')),
				'program_paket' => htmlspecialchars($this->input->post('program_paket')),
				'id_jenis_pengadaan' => htmlspecialchars($this->input->post('id_jenis_pengadaan')),
				'id_jenis_anggaran' => htmlspecialchars($this->input->post('id_jenis_anggaran')),
				'id_metode_pemilihan' => htmlspecialchars($this->input->post('id_metode_pemilihan')),
				'id_kualifikasi' => htmlspecialchars($this->input->post('id_kualifikasi')),
				'id_produk_dl_negri' => htmlspecialchars($this->input->post('id_produk_dl_negri')),
				'tahun_mulai_jamak' => htmlspecialchars($this->input->post('tahun_mulai_jamak')),
				'tahun_selesai_jamak' => htmlspecialchars($this->input->post('tahun_selesai_jamak')),
				'uraian_pekerjaan_paket' => htmlspecialchars($this->input->post('uraian_pekerjaan_paket')),
				'kualifikasi_usaha' => htmlspecialchars($this->input->post('kualifikasi_usaha')),
				'sepesifikasi_paket' => htmlspecialchars($this->input->post('sepesifikasi_paket')),
				'pembuat_paket' => $this->session->userdata('username')
			];
			$this->Rup_model->update(array('id_paket' => $this->input->post('id_paket')), $data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}
	// INI UNTUK NEGOSIASI penetapan LANGSUUNG
	public function negosiasi_penetapan_langsung($id_paket)
	{
		$data['jumlah_peserta'] = $this->Rolepanitia_model->hitung_peserta($id_paket);
		$data['total_rincian_hps_pdf'] = $this->Paket_model->get_by_rincian_hps_pdf_result($id_paket);
		$data['total_hps_pdf_ada'] = $this->Paket_model->get_by_rincian_hps_pdf_sudah_dibuat($id_paket);
		$data['vendor_terpilih'] = $this->Paket_model->vendor_terpilih($id_paket);
		$data['vendor_terpilih_detail'] = $this->Paket_model->vendor_terpilih_detail($id_paket);
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
		$data['jadwal_tahap1'] = $this->Paket_model->get_jadwal_penetapan_langsung($id_paket);
		$data['data2'] = $this->Chat_negosiasi_model->getDataById_penetapan_langsung_chat($id_paket);
		$id_pegawai = $this->session->userdata('id_pegawai');
		$data['ambil_paket']  = $this->Chat_negosiasi_model->get_byid_panitia($id_paket, $id_pegawai);
		$data['get_tahap_negosiasi_penetapan_langsung'] = $this->Paket_model->get_tahap_negosiasi_penetapan_langsung($id_paket);
		$this->load->view('template_paket/header');
		$this->load->view('template_paket/navbar');
		$this->load->view('paket/negosiasi_penetapan_langsung', $data);
		$this->load->view('template_paket/footer');
		$this->load->view('paket/ajax', $data);
	}
	// INI UNTUK NGELOAD CHAT penetapan LANGSUNG
	public function ngeload_chat_transaksi_langsung($id_paket)
	{
		$data = $this->Chat_negosiasi_model->getPesan($id_paket);
		echo json_encode(array(
			'data' => $data
		));
	}

	public function kirim_harga_negosiasi_kesepakatan()
	{
		$harga_nego = $this->input->post('harga_negosiasi_sepakat');
		$id_paket = $this->input->post('id_paket');
		$datavendor = $this->Penetapanlangsung_model->get_paket_data_vendor_pemenang($id_paket);
		$where = [
			'id_mengikuti_paket_vendor' => $datavendor['id_mengikuti_paket_vendor'],
			'id_mengikuti_vendor' => $datavendor['id_mengikuti_vendor'],
		];
		$data = [
			'negosiasi' => $harga_nego
		];
		$this->Penetapanlangsung_model->update_negosiasi($data, $where);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
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
		$get_vendor = $this->Chat_negosiasi_model->GetAllVendor_penetapan_langsung($id_paket);
		$output = [
			"vendor" => $get_vendor,
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	//add perysaratan
	public function add_persyaratan()
	{
		$nama_persyaratan_penetapan_langsung = $this->input->post('nama_persyaratan_penetapan_langsung');
		$keterangan_persyaratan_penetapan_langsung = $this->input->post('keterangan_persyaratan_penetapan_langsung');
		$id_paket = $this->input->post('id_paket');

		$data = [
			'nama_persyaratan_penetapan_langsung' => $nama_persyaratan_penetapan_langsung,
			'keterangan_persyaratan_penetapan_langsung' => $keterangan_persyaratan_penetapan_langsung,
			'id_paket' => $id_paket
		];
		$this->Penetapanlangsung_model->save_perysaratan_penetapan_langsung($data);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}

	public function update_persyaratan()
	{
		$nama_persyaratan_penetapan_langsung = $this->input->post('nama_persyaratan_penetapan_langsung');
		$keterangan_persyaratan_penetapan_langsung = $this->input->post('keterangan_persyaratan_penetapan_langsung');
		$id_paket = $this->input->post('id_paket');
		$id_persyaratan_penetapan_langsung = $this->input->post('id_persyaratan_penetapan_langsung');

		$data = [
			'nama_persyaratan_penetapan_langsung' => $nama_persyaratan_penetapan_langsung,
			'keterangan_persyaratan_penetapan_langsung' => $keterangan_persyaratan_penetapan_langsung,
			'id_paket' => $id_paket
		];
		$this->Penetapanlangsung_model->edit_persyaratan_penetapan_langsung($data, $id_persyaratan_penetapan_langsung);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}


	public function getpersyaratan($id_paket)
	{
		$resultss = $this->Penetapanlangsung_model->getdatatable_persyaratan_penetapan_langsung($id_paket);
		$data = [];
		$no = $_POST['start'];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] = $angga->nama_persyaratan_penetapan_langsung;
			$row[] = $angga->keterangan_persyaratan_penetapan_langsung;
			$row[] = '<a href="javascript:;" class="btn btn-success btn-sm" onClick="byid_penetapan_langsung(' . "'" . $angga->id_persyaratan_penetapan_langsung . "','edit'" . ')"><i class="fas fa-edit"></i> Edit</a> <a href="javascript:;" class="btn btn-danger btn-sm" onClick="byid_penetapan_langsung(' . "'" . $angga->id_persyaratan_penetapan_langsung . "','hapus'" . ')">  <i class="fas fa-trash"></i> Hapus</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Penetapanlangsung_model->count_all_data_persyaratan_penetapan_langsung($id_paket),
			"recordsFiltered" => $this->Penetapanlangsung_model->count_filtered_data_persyaratan_penetapan_langsung(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function byid_persyaratan_penetapan_langsung($id_paket)
	{
		$data = $this->Penetapanlangsung_model->getByidpersyaratan_penetapan_langsung($id_paket);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function delete_persyaratan_penetapan_langsung($id_persyaratan_penetapan_langsung)
	{
		$this->Penetapanlangsung_model->deletepersyaratan_penetapan_langsung($id_persyaratan_penetapan_langsung);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}

	public function get_dokumen_persyaratan_penetapan_langsung($id_paket)
	{
		$resultss = $this->Penetapanlangsung_model->getDokumen_persyaratan_penetapan_langsung($id_paket);
		$data = [];
		$no = $_POST['start'];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] = $angga->nama_persyaratan_penetapan_langsung;
			$row[] = $angga->keterangan_persyaratan_penetapan_langsung;
			$row[] = '<a target="_blank" href="https://vms.jmtm.co.id/dokumen_pengadaan_penetapan_langsung/' . $angga->file_persyaratan_penetapan_langsung . '">' . '<img width="20px" src=' . base_url('assets/img/pdfku.png') . ' > ' . $angga->nama_file_persyaratan_persyaratan_penetapan_langsung . '</a>';
			if ($angga->status_lengkap == 0 || $angga->status_lengkap == NULL || $angga->status_lengkap == 2) {
				$row[] = '<a href="javascript:;" class="btn btn-sm btn-grad201" onClick="byid_penetapan_langsung_uploaded(' . "'" . $angga->id_vendor_dokumen_persyaratan_penetapan_langsung . "','benar'" . ')"><i class="text-success fas fa-check"></i> Benar</a> <a href="javascript:;" class="btn btn-sm btn-grad201" onClick="byid_penetapan_langsung_uploaded(' . "'" . $angga->id_vendor_dokumen_persyaratan_penetapan_langsung . "','salah'" . ')"><i class="text-danger fas fa-times"></i> Salah</a>';
			} else if ($angga->status_lengkap == 1) {
				$row[] = '<a href="javascript:;" class="btn btn-sm btn-grad201"><i class="text-success fas fa-check"></i> Dokumen Sudah Diapprove</a>';
			}

			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Penetapanlangsung_model->count_all_data_Dokumen_persyaratan_penetapan_langsung($id_paket),
			"recordsFiltered" => $this->Penetapanlangsung_model->count_filtered_data_Dokumen_persyaratan_penetapan_langsung(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function by_id_dokumen_penetapan_langsung($id_vendor_dokumen_persyaratan_penetapan_langsung)
	{
		$data = $this->Penetapanlangsung_model->get_id_dokumen_uploaded($id_vendor_dokumen_persyaratan_penetapan_langsung);
		$output = [
			"get_dokumen_penetapan_langsung" => $data,
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function approve_dokumen_persyaratan($id_vendor_dokumen_persyaratan_penetapan_langsung)
	{
		$data = [
			'status_lengkap' => 1,
		];
		// var_dump($id_vendor_dokumen_persyaratan_penetapan_langsung);
		// die;
		$this->Penetapanlangsung_model->approve_dokumen_persyaratan($data, $id_vendor_dokumen_persyaratan_penetapan_langsung);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}

	public function approve_dokumen_tidak_setuju()
	{
		$id_vendor_dokumen_persyaratan_penetapan_langsung = $this->input->post('id_vendor_dokumen_persyaratan_penetapan_langsung');
		$alasan_tidak_lulus = $this->input->post('alasan_tidak_lulus');

		$data = [
			'alasan_tidak_lulus' => $alasan_tidak_lulus,
			'status_lengkap' => 2
		];
		// var_dump($id_vendor_dokumen_persyaratan_penetapan_langsung);
		// die;
		$this->Penetapanlangsung_model->approve_dokumen_persyaratan($data, $id_vendor_dokumen_persyaratan_penetapan_langsung);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}

	public function editpaket($id_paket)
	{
		$data['sumberdana']  = $this->Rup_model->totalhps($id_paket);
		$data['sumberdana']  = $this->Rup_model->getSumberDana($id_paket);
		$data['lokasi_kerja']  = $this->Rup_model->getLokasiPekerjaan($id_paket);
		$data['jadwal_pemilihan']  = $this->Rup_model->getJadwalPemilihan($id_paket);
		$data['angga'] = $this->Rup_model->getByid($id_paket);
		$data['getdivisi'] = $this->Rup_model->get_devisi();
		$data['get_jenis_anggaran'] = $this->Rup_model->get_jenis_anggaran();
		$data['get_metode'] = $this->Rup_model->get_metode_pemilihan();
		$data['get_jenis_pengadaan'] = $this->Rup_model->get_jenis_pengadaan();
		$data['get_produk_dl_negri'] = $this->Rup_model->get_produk_dalam_negri();
		$data['kabupaten'] = $this->Wilayah_model->getAllKabupaten();
		$data['provinsi'] = $this->Wilayah_model->getProvinsi();
		$this->load->view('template_penetapanlangsung/header');
		$this->load->view('template_penetapanlangsung/navbar');
		$this->load->view('penetapanlangsung/editpaket', $data);
		$this->load->view('template_penetapanlangsung/footer');
		$this->load->view('rup_penyedia/ajax', $data);
	}

	public function penetapan_pemenang_penetapan_langsung($id_paket)
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
		$this->load->view('penetapanlangsung/penetapan_pemenang_penetapan_langsung', $data);
		$this->load->view('template_paket/footer');
		$this->load->view('penetapanlangsung/ajax_penetapan_pemenang', $data);
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
		$file_surat_penetapan_pemenang = $this->input->post('file_surat_penetapan_pemenang');
		$nama_surat_penetapan_pemenang = $this->input->post('nama_surat_penetapan_pemenang');
		$id_vendor = $this->input->post('id_vendor');
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
			$this->Paket_model->tambah_penetapan_langsung($upload);


			$where_kehidupan = [
				'id_paket' => $id_paket
			];
			$datapaket_kehidupan = [
				'selesai_semua_tender' => 'test'
			];
			$this->Penetapanlangsung_model->update_ke_paket($datapaket_kehidupan, $where_kehidupan);
			$this->output->set_content_type('application/json')->set_output(json_encode($upload));
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
			$this->email->message("Anda Telah Di Tetapkan Sebagai Pemenang Lihat Surat Penetapan Pemenangnya https://mail.jmtm.co.id/dokumen_file_surat_penetapan_pemenang/" . $fileData['file_name']);

			$this->email->send();
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

	public function summary_penetapan_langsung($id_paket)
	{
		$paket['data2'] = $this->Chat_model->getDataById($id_paket);
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
		$paket['result_data_jadwal_detail'] = $this->Paket_model->result_data_jadwal_detail2($id_paket);

		$paket['data2'] = $this->Chat_negosiasi_model->getDataById_transaksi_langsung_chat($id_paket);
		$id_pegawai = $this->session->userdata('id_pegawai');

		$paket['dokumen_pengadaan'] = $this->Penetapanlangsung_model->dokumen_pengadaan($id_paket);
		$paket['ba_negosiasi'] = $this->Paket_model->ba_negosiasi($id_paket);

		$paket['persyaratan_penetapan_langsung'] = $this->Penetapanlangsung_model->persyaratan_penetapan_langsung($id_paket);

		$paket['persyaratan_terpenuhi'] = $this->Penetapanlangsung_model->persyaratan_terpenuhi($id_paket);

		$id_kualifikasi = $ambil_kualifikasi['id_kualifikasi'];
		$this->load->view('penetapanlangsung/summary_penetapan_langsung', $paket);
	}
}
