<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Buka_penawaran extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Enkrip/Enkrip_model');
		$this->load->model('Beranda/Beranda_model');
		$this->load->model('Panitia/Rolepanitia_model');
		$this->load->model('Paket/Paket_model');
	}

	public function index()
	{
		$this->load->view('templatedokumen/header');
		$this->load->view('templatedokumen/navbar');
		$this->load->view('panitia_view/enkrip/index');
		$this->load->view('templatedokumen/footer');
	}

	public function daftar()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim|required|trim|is_unique[tbl_user_enkrip.username]');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|matches[password2]', ['required' => 'Password Wajib Diisi!', 'matches' => 'Password Tidak Sama']);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]', ['required' => 'User ID Wajib Diisi!', 'matches' => 'Password Tidak Sama']);

		if ($this->form_validation->run() == false) {
			$this->load->view('templatedokumen/header');
			$this->load->view('templatedokumen/navbar');
			$this->load->view('panitia_view/enkrip/daftar');
			$this->load->view('templatedokumen/footer');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$id_vendor_enkripsi = $this->input->post('id_vendor_enkripsi');
			$data = [
				'username' => $username,
				'password' => password_hash($password, PASSWORD_DEFAULT),
				'id_vendor_enkripsi' => $id_vendor_enkripsi,
			];
			$this->Enkrip_model->register($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">Berhasil Registrasi Silahkan Kembali dan lakukan login!
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
			redirect('buka_penawaran/daftar');
		}
	}

	public function cektoken()
	{
		$this->form_validation->set_rules('token', 'Token', 'required|trim', ['required' => 'Pastikan Paket Token Harus Sesuai!!!']);

		if ($this->form_validation->run() == false) {
			$this->load->view('templatedokumen/header');
			$this->load->view('templatedokumen/navbarlogin');
			$this->load->view('panitia_view/enkrip/cektoken');
			$this->load->view('templatedokumen/footer');
		} else {
			$token_paket = $this->input->post('token');
			$data['paket'] = $this->Enkrip_model->get_by_token($token_paket);
			$id_test = $this->Enkrip_model->get_by_token($token_paket);
			$angga = $id_test['id_paket'];
			if ($angga) {
				redirect('buka_penawaran/upload/' . $angga);
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">Token Tidak Valid!!!
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
				redirect('buka_penawaran/cektoken');
			}
		}
	}


	//angga itu id_paket
	public function upload($id_paket)
	{
		$data['rincian_hps_pdf_vendor_kosong']  = $this->Enkrip_model->rincian_hps_pdf_vendor_kosong($id_paket);
		$data['total_rincian_hps_pdf'] = $this->Paket_model->get_by_rincian_hps_pdf_result($id_paket);
		$data['total_hps_pdf_ada'] = $this->Paket_model->get_by_rincian_hps_pdf_sudah_dibuat($id_paket);
		$ambil_id_vendor_dan_paket = $this->Enkrip_model->get_vendor_by_id_dapet_id($id_paket);
		$id_mengikuti_paket_vendor = $ambil_id_vendor_dan_paket['id_mengikuti_paket_vendor'];
		$data['vendor'] = $this->Enkrip_model->get_vendor($id_mengikuti_paket_vendor);
		$data['total_rincian_hps_vendor']  = $this->Enkrip_model->totalRincianHps_vendor_manual($id_paket);
		$data['total_hps']  = $this->Enkrip_model->totalhps($id_paket);
		$data['paket'] = $this->Enkrip_model->get_informasi_tender($id_paket);
		$id_metode_pemilihan = $this->Enkrip_model->get_metode_pemilihan($id_paket);
		$data['metode_pemilihan'] = $id_metode_pemilihan['id_metode_pemilihan'];

		$id_kualifikasi = $data['paket']['id_kualifikasi'];
		$data['get_tahap_dokumen_negosiasi'] = $this->Rolepanitia_model->get_tahap_dokumen_negosiasi($id_paket, $id_kualifikasi);
		$data['pembukaan_dokumen_penawaran_satu_file_prakualfikasi'] = $this->Rolepanitia_model->pembukaan_dokumen_penawaran_satu_file_prakualfikasi($id_paket, $id_kualifikasi);

		$this->load->view('templatedokumen/header');
		$this->load->view('templatedokumen/navbarlogin');
		$this->load->view('panitia_view/enkrip/informasitender', $data);
		$this->load->view('templatedokumen/footer');
		$this->load->view('panitia_view/enkrip/ajax', $data);
	}

	// get table vendor

	public function getdata_vendor_mengikuti_paket($id_paket)
	{
		$ambil_kualifikasi = $this->Rolepanitia_model->getById($id_paket);
		$id_kualifikasi = $ambil_kualifikasi['id_kualifikasi'];

		//tahap tahap
		$tahap = $this->Rolepanitia_model->get_tahap($id_paket, $id_kualifikasi);

		$tahap_mulai =  $tahap->tanggal_mulai_jadwal;
		$tahap_selesai = $tahap->tanggal_selesai_jadwal;

		$resultss = $this->Enkrip_model->getdatatable_vendor_mengikuti_paket($id_paket);
		$data = [];
		$no = $_POST['start'];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] = $angga->username_vendor;
			if ($tahap_mulai >= date('d-m-Y H:i')) {
				$row[] = '<a href="javascript:;"  class="btn btn-sm btn-danger btn-block" >Belum Memasuki Tahap ini</a>';
			} else if ($tahap_selesai >= date('d-m-Y H:i') || $tahap_mulai == date('d-m-Y H:i')) {
				$row[] = '<a href="javascript:;" class="btn btn-sm btn-info btn-block" onClick="byid_penawaran(' . "'" . $angga->id_mengikuti_paket . "','lihat_harga_penawaran'" . ')"><i class="fas fa-envelope-open-text"></i> Buka Harga Penawaran</a>';
			} else {
				$row[] = '<a href="javascript:;" class="btn btn-sm btn-info btn-block" onClick="byid_penawaran(' . "'" . $angga->id_mengikuti_paket . "','lihat_harga_penawaran'" . ')"><i class="fas fa-envelope-open-text"></i> Buka Harga Penawaran</a>';
			}
			$row[] = '<a href="javascript:;" class="btn btn-sm btn-primary btn-block" onClick="byid_penawaran(' . "'" . $angga->id_mengikuti_paket . "','lihat_teknis_dokumen_tambahan'" . ')"><i class="fas fa-envelope-open-text"></i> Lihat & Download Dokumen Syarat Tambahan</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Enkrip_model->count_all_data_vendor_mengikuti_paket(),
			"recordsFiltered" => $this->Enkrip_model->count_filtered_data_vendor_mengikuti_paket($id_paket),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}


	public function byid_penawaran_harga($id_paket)
	{
		$no =  $this->uri->segment(3);
		$no1 =  $this->uri->segment(4);
		$ambil_paket_dan_vendor = $this->Enkrip_model->by_id_vendor_mengikuti_paket($no);
		$ambil_vendor = $ambil_paket_dan_vendor['id_mengikuti_vendor'];
		$get_rincian_paket = $this->Enkrip_model->totalRincianHps_vendor($ambil_vendor, $no1);
		$total = 0;
		foreach ($get_rincian_paket as $key => $value) {
			$total +=  $value['satuan_rincian_hps_vendor'] * $value['harga_rincian_hps_vendor'] - ($value['persen_rincian_hps_vendor'] / 100) * $value['satuan_rincian_hps_vendor'] * $value['harga_rincian_hps_vendor'];
		}
		$output = [
			"get_rincian_paket" => $total,
			"ambil_paket_dan_vendor" => $ambil_paket_dan_vendor,

		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}





	// INI DARI PAKET
	public function data_get_rincian_hps($id_paket)
	{
		$resultss = $this->Enkrip_model->getdatatableRincianHps($id_paket);
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
			$row[] = "Rp " . number_format($angga->satuan_rincian_hps * $angga->harga_rincian_hps, 2, ',', '.');
			$row[] = $angga->persen_rincian_hps . "%";
			$row[] = "Rp " . number_format($angga->satuan_rincian_hps * $angga->harga_rincian_hps - ($angga->persen_rincian_hps / 100) * $angga->satuan_rincian_hps * $angga->harga_rincian_hps, 2, ',', '.');
			$row[] = $angga->keterangan_rincian_hps;
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Enkrip_model->count_all_dataRincianHps($id_paket),
			"recordsFiltered" => $this->Enkrip_model->count_filtered_RincianHps($id_paket),
			"data" => $data,
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	// INI PENAWARAN VENDOR
	public function data_get_rincian_hps_vendor($id_paket)
	{
		$id_vendor = $this->session->userdata('id_vendor');
		$resultss = $this->Enkrip_model->getdatatableRincianHps_vendor($id_paket, $id_vendor);
		$no = $_POST['start'];
		// $total = 0;
		$data = [];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] = $angga->jenis_barang_jasa_rincian_hps_vendor;
			$row[] = $angga->satuan_rincian_hps_vendor;
			$row[] = $angga->vol_rincian_hps_vendor;
			$row[] = "Rp " . number_format($angga->harga_rincian_hps_vendor, 2, ',', '.');
			$row[] = "Rp " . number_format($angga->vol_rincian_hps_vendor * $angga->harga_rincian_hps_vendor, 2, ',', '.');
			$row[] = $angga->persen_rincian_hps_vendor . "%";
			$row[] = "Rp " . number_format($angga->vol_rincian_hps_vendor * $angga->harga_rincian_hps_vendor + ($angga->persen_rincian_hps_vendor / 100) * $angga->vol_rincian_hps_vendor * $angga->harga_rincian_hps_vendor, 2, ',', '.');
			$row[] = $angga->keterangan_rincian_hps_vendor;
			$row[] = '<a href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byidRincianHps(' . "'" . $angga->id_rincian_hps_vendor . "','editRincianHps'" . ')"><i class="fas fa-edit"></i> Edit</a> <a href="javascript:;" class="btn btn-danger  btn-block btn-sm" onClick="byidRincianHps(' . "'" . $angga->id_rincian_hps_vendor . "','hapusRincianHps'" . ')">  <i class="fas fa-trash"></i> Hapus</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Enkrip_model->count_all_dataRincianHps_vendor($id_paket, $id_vendor),
			"recordsFiltered" => $this->Enkrip_model->count_filtered_RincianHps_vendor($id_paket, $id_vendor),
			"data" => $data,
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}
	public function add_rincian_hps()
	{
		$this->form_validation->set_rules('jenis_barang_jasa_rincian_hps_vendor', 'Jenis Barang/Jasa', 'required|trim', ['required' => 'Jenis Barang/Jasa Wajib Diisi!']);
		$this->form_validation->set_rules('satuan_rincian_hps_vendor', 'Satuan', 'required|trim', ['required' => 'Satuan Wajib Diisi!']);
		$this->form_validation->set_rules('vol_rincian_hps_vendor', 'Vol', 'required|trim', ['required' => 'Vol Wajib Diisi!']);
		$this->form_validation->set_rules('keterangan_rincian_hps_vendor', 'Keterangan', 'required|trim', ['required' => 'Keterangan Wajib Diisi!']);
		$this->form_validation->set_rules('persen_rincian_hps_vendor', 'Pajak %', 'required|trim', ['required' => 'Pajak % Wajib Diisi!']);
		$this->form_validation->set_rules('harga_rincian_hps_vendor', 'Harga', 'required|trim', ['required' => 'Harga Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$data = [
				'jenis_barang_jasa_rincian_hps_vendor' => form_error('jenis_barang_jasa_rincian_hps_vendor'),
				'satuan_rincian_hps_vendor' => form_error('satuan_rincian_hps_vendor'),
				'vol_rincian_hps_vendor' => form_error('vol_rincian_hps_vendor'),
				'keterangan_rincian_hps_vendor' => form_error('keterangan_rincian_hps_vendor'),
				'persen_rincian_hps_vendor' => form_error('persen_rincian_hps_vendor'),
				'harga_rincian_hps_vendor' => form_error('harga_rincian_hps_vendor'),
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} else {
			$data = [
				'id_paket' => htmlspecialchars($this->input->post('id_paket')),
				'id_vendor' => htmlspecialchars($this->input->post('id_vendor')),
				'jenis_barang_jasa_rincian_hps_vendor' => htmlspecialchars($this->input->post('jenis_barang_jasa_rincian_hps_vendor')),
				'satuan_rincian_hps_vendor' => htmlspecialchars($this->input->post('satuan_rincian_hps_vendor')),
				'vol_rincian_hps_vendor' => htmlspecialchars($this->input->post('vol_rincian_hps_vendor')),
				'keterangan_rincian_hps_vendor' => htmlspecialchars($this->input->post('keterangan_rincian_hps_vendor')),
				'persen_rincian_hps_vendor' => htmlspecialchars($this->input->post('persen_rincian_hps_vendor')),
				'harga_rincian_hps_vendor' => htmlspecialchars($this->input->post('harga_rincian_hps_vendor')),
			];

			$this->Enkrip_model->create_rincian_hps($data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}
	// EDIT LOKASI
	public function edit_rincian_hps()
	{
		$this->form_validation->set_rules('jenis_barang_jasa_rincian_hps_vendor', 'Jenis Barang/Jasa', 'required|trim', ['required' => 'Jenis Barang/Jasa Wajib Diisi!']);
		$this->form_validation->set_rules('satuan_rincian_hps_vendor', 'Satuan', 'required|trim', ['required' => 'Satuan Wajib Diisi!']);
		$this->form_validation->set_rules('vol_rincian_hps_vendor', 'Vol', 'required|trim', ['required' => 'Vol Wajib Diisi!']);
		$this->form_validation->set_rules('keterangan_rincian_hps_vendor', 'Keterangan', 'required|trim', ['required' => 'Keterangan Wajib Diisi!']);
		$this->form_validation->set_rules('persen_rincian_hps_vendor', 'Pajak %', 'required|trim', ['required' => 'Pajak % Wajib Diisi!']);
		$this->form_validation->set_rules('harga_rincian_hps_vendor', 'Harga', 'required|trim', ['required' => 'Harga Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$data = [
				'jenis_barang_jasa_rincian_hps_vendor' => form_error('jenis_barang_jasa_rincian_hps_vendor'),
				'satuan_rincian_hps_vendor' => form_error('satuan_rincian_hps_vendor'),
				'vol_rincian_hps_vendor' => form_error('vol_rincian_hps_vendor'),
				'keterangan_rincian_hps_vendor' => form_error('keterangan_rincian_hps_vendor'),
				'persen_rincian_hps_vendor' => form_error('persen_rincian_hps_vendor'),
				'harga_rincian_hps_vendor' => form_error('harga_rincian_hps_vendor'),
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} else {
			$data = [
				'jenis_barang_jasa_rincian_hps_vendor' => htmlspecialchars($this->input->post('jenis_barang_jasa_rincian_hps_vendor')),
				'satuan_rincian_hps_vendor' => htmlspecialchars($this->input->post('satuan_rincian_hps_vendor')),
				'vol_rincian_hps_vendor' => htmlspecialchars($this->input->post('vol_rincian_hps_vendor')),
				'keterangan_rincian_hps_vendor' => htmlspecialchars($this->input->post('keterangan_rincian_hps_vendor')),
				'persen_rincian_hps_vendor' => htmlspecialchars($this->input->post('persen_rincian_hps_vendor')),
				'harga_rincian_hps_vendor' => htmlspecialchars($this->input->post('harga_rincian_hps_vendor')),
			];
			$this->Enkrip_model->update_rincian_hps(array('id_rincian_hps_vendor' => $this->input->post('id_rincian_hps_vendor')), $data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}

	public function delete_rincian_hps($id_rincian_hps_vendor)
	{
		$data = $this->Enkrip_model->deletedata_rincian_hps($id_rincian_hps_vendor);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	// =============================UPLOAD EXCEL Rincian HPS===========================
	// ========
	public function uploaddata_excel_vendor()
	{
		$id_paket = $this->input->post('id_paket');
		$config['upload_path'] = './rincian_hps_excel_vendor/';
		$config['allowed_types'] = 'xlsx|xls';
		$config['file_name'] = 'doc' . time();
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('importexcelhps_vendor')) {
			$file = $this->upload->data();
			$reader = ReaderEntityFactory::createXLSXReader();
			$reader->open('rincian_hps_excel_vendor/' . $file['file_name']);
			foreach ($reader->getSheetIterator() as $sheet) {
				$numRow = 1;
				foreach ($sheet->getRowIterator() as $row) {
					if ($numRow > 1) {
						$rincian_hps = array(
							'jenis_barang_jasa_rincian_hps_vendor' => $row->getCellAtIndex(0),
							'satuan_rincian_hps_vendor' => $row->getCellAtIndex(1),
							'vol_rincian_hps_vendor' => $row->getCellAtIndex(2),
							'harga_rincian_hps_vendor ' => $row->getCellAtIndex(3),
							'persen_rincian_hps_vendor' => $row->getCellAtIndex(4),
							'keterangan_rincian_hps_vendor' => $row->getCellAtIndex(5),
							'id_paket' => $id_paket,
							'id_vendor' => $this->session->userdata('id_vendor'),
						);
						$this->Enkrip_model->insert_via_excel_rincian_hps_vendor($rincian_hps);
					}
					$numRow++;
				}
				$reader->close();
				unlink('rincian_hps_excel_vendor/' . $file['file_name']);
				$this->session->set_flashdata('pesan', 'Data Berhasil Di Import');
				redirect('upload_dokumen/upload/' . $id_paket);
			}
		} else {
			echo "Error : " . $this->upload->display_errors();
		}
	}
	public function simpan_dokumen()
	{
		$id_vendor = $this->input->post('id_vendor');
		$id_paket = $this->input->post('id_paket');
		$upload = [
			'id_vendor' => $id_vendor,
			'id_paket' => $id_paket,
			'status_kirim_dokumen_penawaran' => 1
		];
		$this->Enkrip_model->create_status_kirim_dokumen($upload);
		$this->output->set_content_type('application/json')->set_output(json_encode($upload));
	}

	public function add_rincian_hps_pdf_vendor()
	{
		$id_paket = $this->input->post('id_paket');
		$config['upload_path'] = './rincian_hps_pdf_file_vendor/';
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = 0;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('file_rincian_hps_pdf_vendor')) {

			$fileData = $this->upload->data();

			$upload = [
				'id_paket' => $id_paket,
				'id_vendor' => $this->session->userdata('id_vendor'),
				'status_rincian_hps_pdf_vendor' => 1,
				'file_rincian_hps_pdf_vendor' => $fileData['file_name'],
			];
			$this->Enkrip_model->create_pdf_rincian_hps_vendor($upload);
			$this->session->set_flashdata('pesan_pdf', 'Hps Pdf Berhasil Di Kirim');
			redirect(base_url('upload_dokumen/upload/' . $id_paket));
		} else {
			$this->session->set_flashdata('error', $this->upload->display_errors());
			redirect(base_url('upload'));
		}
	}

	public function hapus_rincian_hps_pdf_vendor($hapus_rincian_hps_pdf)
	{
		$id_paket = $this->Enkrip_model->get_by_rincian_hps_pdf2_vendor($hapus_rincian_hps_pdf);
		$this->Enkrip_model->deletedata_rincian_hps_pdf_vendor($hapus_rincian_hps_pdf);
		redirect(base_url('upload_dokumen/upload/' . $id_paket['id_paket']));
	}


	public function data_get_administrasi_teknis_vendor($id_paket)
	{
		$no =  $this->uri->segment(3);
		$resultss = $this->Enkrip_model->getdatatable_administrasi_teknis_vendor($id_paket);
		$no = $_POST['start'];
		// $total = 0;
		$data = [];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] = $angga->nama_persyaratan;
			$row[] = '<a href="javascript:;" class="btn btn-primary btn-sm" onClick="byid_id_penawaran_teknis(' . "'" . $angga->id_persyaratan_tender . "','edit_id_penawaran_tambahan'" . ')"><i class="fas fa-upload"></i> Lihat & Download Dokumen Yang Dikirim</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Enkrip_model->count_all_data_administrasi_teknis_vendor(),
			"recordsFiltered" => $this->Enkrip_model->count_filtered_administrasi_teknis_vendor($id_paket),
			"data" => $data,
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function kirim_data_administrasi_teknis_vendor()
	{
		$id_vendor = $this->session->userdata('id_vendor');
		$upload = [
			'id_penawaran_teknis_jumping' => $this->input->post('id_penawaran_teknis'),
			'id_vendor' => $id_vendor,
			'status_dipilih' => 1,
			'id_paket' => $this->input->post('id_paket'),
		];
		$this->Enkrip_model->create_dokumen_administrasi_teknis_vendor($upload);
		$this->output->set_content_type('application/json')->set_output(json_encode($upload));
	}

	public function get_administrasi_teknis_byid($id_paket)
	{
		$id_vendor =  $this->uri->segment(3);
		$id_penawaran =  $this->uri->segment(4);
		$get_dokumen = $this->Enkrip_model->get_dokumen_administrasi_Byid($id_penawaran, $id_vendor, $id_paket);
		$get_id_penawaran_teknis = $this->Enkrip_model->get_administrasi_teknis_vendor_Byid($id_penawaran);
		$output = [
			"get_id_penawaran_teknis" => $get_id_penawaran_teknis,
			"get_dokumen" => $get_dokumen,
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function tambah_file_administrasi_teknis()
	{
		$id_vendor = $this->session->userdata('id_vendor');
		$config['upload_path'] = './file_dokumen_penawaran/';
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = 0;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('file_administrasi_teknis_vendor')) {

			$fileData = $this->upload->data();

			$upload = [
				'id_vendor' => $id_vendor,
				'id_paket' => $this->input->post('id_paket'),
				'id_penawaran_teknis_jumping' => $this->input->post('id_penawaran_teknis'),
				'status_dipilih_administrasi_teknis_vendor' => 1,
				'file_administrasi_teknis_vendor' => $fileData['file_name'],
			];
			$data2 = [
				'status_checked_dipilih_panitia' => $id_vendor,
			];
			$this->Enkrip_model->create_administrasi_teknis($upload);
			$this->Enkrip_model->update_teknisnya_asli(array('id_penawaran_teknis' => $this->input->post('id_penawaran_teknis')), $data2);
			$this->output->set_content_type('application/json')->set_output(json_encode($upload));
		} else {
			$this->session->set_flashdata('error', $this->upload->display_errors());
			redirect(base_url('upload'));
		}
	}

	public function delete_cancel($id_administrasi_teknis_vendor)
	{
		$data = $this->Enkrip_model->deletedata_dokumen_administrasi_teknis($id_administrasi_teknis_vendor);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templatedokumen/header');
			$this->load->view('templatedokumen/navbar');
			$this->load->view('panitia_view/enkrip/index');
			$this->load->view('templatedokumen/footer');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$this->enkrip_login->login($username, $password);
		}
	}

	public function logout()
	{
		$this->enkrip_login->logout();
	}

	// INI UNTUK MENAMPILKAN RINCIAN HPS PDF DARI VENDOR UNTUK TRANSAKSI LAGSUNG SAJA
	// INI UPLOAD RINCIAN HPS VIA PDF
	public function getdatatbl_rincian_hps_via_pdf_vendor($id_paket)
	{
		$resultss = $this->Enkrip_model->getdatatable_tbl_rincian_hps_via_pdf_vendor($id_paket);
		$data = [];
		$no = $_POST['start'];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] =  $angga->nama_rincian_hps_pdf;
			$row[] =  '<a target="_blank" href="https://vms.jmtm.co.id/rincian_hps_pdf_file_vendor/' . $angga->file_rincian_hps_pdf_vendor . '">' . '<img width="30px" src=' . base_url('assets/img/pdf.png') . ' >' . '</a>';
			$row[] = "Rp " . number_format($angga->total_rincian_hps_pdf, 2, ',', '.');
			$row[] = '<a target="_blank" class="btn btn-grad100 btn-sm" href="https://vms.jmtm.co.id/rincian_hps_pdf_file_vendor/' . $angga->file_rincian_hps_pdf_vendor . '"> <i class="fas fa fa-eye"></i> Lihat Dokumen</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Enkrip_model->count_all_data_dokumen_rincian_hps_pdf(),
			"recordsFiltered" => $this->Enkrip_model->count_filtered_data_dokumen_rincian_hps_pdf($id_paket),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	// PEMBUKAAN DOKUMEN PENAWARAN DOKUMEN PENGANDAAN
	public function getdatatable_dokumen_pengadaan_transaksi_langsung_vendor($id_paket)
	{
		$resultss = $this->Enkrip_model->getdatatable_dokumen_pengadaan_transaksi_langsung_vendor($id_paket);
		$data = [];
		$no = $_POST['start'];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] =  $angga->nama_dokumen_pengadaan_vendor;
			$row[] =  '<a target="_blank" href="https://vms.jmtm.co.id/file_dokumen_pengadaan_transaksi_langsung_vendor/' . $angga->file_dokumen_pengadaan_vendor . '">' . '<img width="30px" src=' . base_url('assets/img/pdf.png') . ' >' . '</a>';
			$row[] = '<a target="_blank" class="btn btn-grad7 btn-sm" href="https://vms.jmtm.co.id/file_dokumen_pengadaan_transaksi_langsung_vendor/' . $angga->file_dokumen_pengadaan_vendor . '"> <i class="fas fa fa-eye"></i> Lihat Dokumen</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Enkrip_model->count_all_data_dokumen_pengadaan_transaksi_langsung_vendor(),
			"recordsFiltered" => $this->Enkrip_model->count_filtered_data_dokumen_pengadaan_transaksi_langsung_vendor($id_paket),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	// INI RINCIAN HPS MANUAL DARI VENDOR
	// INI PENAWARAN VENDOR
	public function data_get_rincian_hps_vendor_manual($id_paket)
	{
		$resultss = $this->Enkrip_model->getdatatableRincianHps_vendor_manual($id_paket);
		$no = $_POST['start'];
		// $total = 0;
		$data = [];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] = $angga->jenis_barang_jasa_rincian_hps_vendor;
			$row[] = $angga->satuan_rincian_hps_vendor;
			$row[] = $angga->vol_rincian_hps_vendor;
			$row[] = "Rp " . number_format($angga->harga_rincian_hps_vendor, 2, ',', '.');
			$row[] = "Rp " . number_format($angga->vol_rincian_hps_vendor * $angga->harga_rincian_hps_vendor, 2, ',', '.');
			$row[] = $angga->persen_rincian_hps_vendor . "%";
			$row[] = "Rp " . number_format($angga->vol_rincian_hps_vendor * $angga->harga_rincian_hps_vendor + ($angga->persen_rincian_hps_vendor / 100) * $angga->vol_rincian_hps_vendor * $angga->harga_rincian_hps_vendor, 2, ',', '.');
			$row[] = $angga->keterangan_rincian_hps_vendor;
			// $row[] = '<a href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byidRincianHps(' . "'" . $angga->id_rincian_hps_vendor . "','editRincianHps'" . ')"><i class="fas fa-edit"></i> Edit</a> <a href="javascript:;" class="btn btn-danger  btn-block btn-sm" onClick="byidRincianHps(' . "'" . $angga->id_rincian_hps_vendor . "','hapusRincianHps'" . ')">  <i class="fas fa-trash"></i> Hapus</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Enkrip_model->count_all_dataRincianHps_vendor_manual($id_paket),
			"recordsFiltered" => $this->Enkrip_model->count_filtered_RincianHps_vendor_manual($id_paket),
			"data" => $data,
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	// INI UNTUK NAMPILIN SEMUA VENDORNYA
	public function getdata_peserta_vendor($id_paket)
	{
		$ambil_id_vendor_dan_paket = $this->Rolepanitia_model->get_vendor_by_id_dapet_id($id_paket);
		$id_mengikuti_paket_vendor = $ambil_id_vendor_dan_paket['id_mengikuti_paket_vendor'];
		$resultss = $this->Enkrip_model->getdatatable_peserta_vendor_tender($id_mengikuti_paket_vendor);
		$data = [];
		$no = $_POST['start'];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] = $angga->username_vendor;
			$row[] = $angga->pencatatan;
			$row[] = $angga->persen_pencatatan;
			$row[] = '<a class="btn btn-success btn-sm" href="javascript:;" onClick="byid_peserta_vendor_tender(' . "'" . $angga->id_mengikuti_vendor . "','lihat_dokumen_lelang'" . ')">Lihat</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Enkrip_model->count_all_data_peserta_vendor_tender($id_paket),
			"recordsFiltered" => $this->Enkrip_model->count_filtered_data_peserta_vendor_tender($id_paket),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function byid_peserta_vendor_tender($id_vendor)
	{
		$id_paket =  $this->uri->segment(4);
		$get_vendor =  $this->Rolepanitia_model->get_vendor_by_id($id_vendor, $id_paket);
		$total_hps  = $this->Enkrip_model->ambil_total_hps_all_vendor($id_paket, $id_vendor);
		$output = [
			"vendor" => $get_vendor,
			"total_hps" => $total_hps,
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	// PEMBUKAAN PENAWRAN HARGA

	// buka dokumen lelang
	public function getdatatable_dokumen_lelang($id_vendor)
	{
		$id_paket =  $this->uri->segment(4);
		$resultss = $this->Enkrip_model->getdatatable_dokumen_lelang_vendor($id_paket, $id_vendor);
		$data = [];
		$no = $_POST['start'];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] =  $angga->nama_file_dokumen_lelang_vendor;
			$row[] =   '<a target="_blank" href="https://vms.jmtm.co.id/file_dokumen_lelang/' . $angga->file_dokumen_lelang_vendor . '">' . '<img width="30px" src=' . base_url('assets/img/pdf.png') . ' >' . '</a>';
			$row[] =  '<a target="_blank" class="btn btn-sm btn-success" href="https://vms.jmtm.co.id/file_dokumen_lelang/' . $angga->file_dokumen_lelang_vendor . '">Download</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Enkrip_model->count_all_data_dokumen_lelang_vendor(),
			"recordsFiltered" => $this->Enkrip_model->count_filtered_data_dokumen_lelang_vendor($id_paket, $id_vendor),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function getdata_peserta_vendor_pdf($id_paket)
	{
		$ambil_id_vendor_dan_paket = $this->Rolepanitia_model->get_vendor_by_id_dapet_id($id_paket);
		$id_mengikuti_paket_vendor = $ambil_id_vendor_dan_paket['id_mengikuti_paket_vendor'];
		$resultss = $this->Enkrip_model->getdatatable_peserta_vendor_tender($id_mengikuti_paket_vendor);
		$data = [];
		$no = $_POST['start'];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] = $angga->username_vendor;
			$row[] = '<a class="btn btn-success btn-sm" href="javascript:;" onClick="byid_peserta_vendor_tender_pdf(' . "'" . $angga->id_mengikuti_vendor . "','lihat_harga_pdf'" . ')">Lihat</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Enkrip_model->count_all_data_peserta_vendor_tender($id_paket),
			"recordsFiltered" => $this->Enkrip_model->count_filtered_data_peserta_vendor_tender($id_paket),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function byid_peserta_vendor_tender_pdf($id_vendor)
	{
		$id_paket =  $this->uri->segment(4);
		$get_vendor =  $this->Rolepanitia_model->get_vendor_by_id($id_vendor, $id_paket);
		$get_harga_pdf =  $this->Enkrip_model->get_harga_rincian_hps_pdf_vendor($id_vendor, $id_paket);
		$get_harga_pdf_result =  $this->Enkrip_model->get_harga_rincian_hps_pdf_vendor_result($id_vendor, $id_paket);

		$output = [
			"vendor" => $get_vendor,
			"get_harga_pdf" => $get_harga_pdf,
			"get_harga_pdf_result" => $get_harga_pdf_result,
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}


	public function getdata_peserta_vendor_penetapan($id_paket)
	{
		$ambil_id_vendor_dan_paket = $this->Rolepanitia_model->get_vendor_by_id_dapet_id($id_paket);
		$id_mengikuti_paket_vendor = $ambil_id_vendor_dan_paket['id_mengikuti_paket_vendor'];
		$resultss = $this->Enkrip_model->getdatatable_peserta_vendor_tender_penetapan($id_mengikuti_paket_vendor);
		$data = [];
		$no = $_POST['start'];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] = $angga->username_vendor;
			$row[] = '<a class="btn btn-success btn-sm" href="javascript:;" onClick="byid_peserta_vendor_tender2(' . "'" . $angga->id_mengikuti_vendor . "','lihat_dokumen_lelang'" . ')">Lihat</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Enkrip_model->count_all_data_peserta_vendor_tender_penetapan($id_paket),
			"recordsFiltered" => $this->Enkrip_model->count_filtered_data_peserta_vendor_tender_penetapan($id_paket),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	// buka dokumen lelang
	public function getdatatable_dokumen_lelang_penetapan($id_vendor)
	{
		// file_dokumen_pengadaan_penetapan_langsung_vendor
		$id_paket =  $this->uri->segment(4);
		$resultss = $this->Enkrip_model->getdatatable_dokumen_lelang_vendor_penetapan($id_paket, $id_vendor);
		$data = [];
		$no = $_POST['start'];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] =  $angga->nama_dokumen_pengadaan_vendor;
			$row[] =   '<a target="_blank" href="https://vms.jmtm.co.id/file_dokumen_pengadaan_transaksi_langsung_vendor/' . $angga->file_dokumen_pengadaan_vendor . '">' . '<img width="30px" src=' . base_url('assets/img/pdf.png') . ' >' . '</a>';
			$row[] =  '<a target="_blank" class="btn btn-sm btn-success" href="https://vms.jmtm.co.id/file_dokumen_pengadaan_transaksi_langsung_vendor/' . $angga->file_dokumen_pengadaan_vendor . '">Download</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Enkrip_model->count_all_data_dokumen_lelang_vendor(),
			"recordsFiltered" => $this->Enkrip_model->count_filtered_data_dokumen_lelang_vendor($id_paket, $id_vendor),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	// INI RINCIAN HPS TENDER VENDOR BIASA

	public function getdata_peserta_vendor_rincian_hps_tender_biasa($id_paket)
	{
		$ambil_id_vendor_dan_paket = $this->Rolepanitia_model->get_vendor_by_id_dapet_id($id_paket);
		$id_mengikuti_paket_vendor = $ambil_id_vendor_dan_paket['id_mengikuti_paket_vendor'];
		$resultss = $this->Enkrip_model->getdatatable_peserta_vendor_tender($id_mengikuti_paket_vendor);
		$data = [];
		$no = $_POST['start'];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] = $angga->username_vendor;
			$row[] = '<a class="btn btn-success btn-sm" href="javascript:;" onClick="byid_peserta_vendor_tender_rincian_hps_manual(' . "'" . $angga->id_mengikuti_vendor . "','lihat_penawaran_harga_tender_biasa'" . ')">Lihat</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Enkrip_model->count_all_data_peserta_vendor_tender($id_paket),
			"recordsFiltered" => $this->Enkrip_model->count_filtered_data_peserta_vendor_tender($id_paket),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}


	public function getdatatable_lihat_rincian_hps_semua_vendor($id_vendor)
	{
		$id_paket =  $this->uri->segment(4);
		$resultss = $this->Enkrip_model->getdatatableRincianHps_vendor_manual_tender_biasa($id_paket, $id_vendor);
		$no = $_POST['start'];
		// $total = 0;
		$data = [];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] = $angga->jenis_barang_jasa_rincian_hps_vendor;
			$row[] = $angga->satuan_rincian_hps_vendor;
			$row[] = $angga->vol_rincian_hps_vendor;
			$row[] = "Rp " . number_format($angga->harga_rincian_hps_vendor, 2, ',', '.');
			$row[] = "Rp " . number_format($angga->vol_rincian_hps_vendor * $angga->harga_rincian_hps_vendor, 2, ',', '.');
			$row[] = $angga->persen_rincian_hps_vendor . "%";
			$row[] = "Rp " . number_format($angga->vol_rincian_hps_vendor * $angga->harga_rincian_hps_vendor + ($angga->persen_rincian_hps_vendor / 100) * $angga->vol_rincian_hps_vendor * $angga->harga_rincian_hps_vendor, 2, ',', '.');
			$row[] = $angga->keterangan_rincian_hps_vendor;
			// $row[] = '<a href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byidRincianHps(' . "'" . $angga->id_rincian_hps_vendor . "','editRincianHps'" . ')"><i class="fas fa-edit"></i> Edit</a> <a href="javascript:;" class="btn btn-danger  btn-block btn-sm" onClick="byidRincianHps(' . "'" . $angga->id_rincian_hps_vendor . "','hapusRincianHps'" . ')">  <i class="fas fa-trash"></i> Hapus</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Enkrip_model->count_all_dataRincianHps_vendor_manual_tender_biasa($id_paket, $id_vendor),
			"recordsFiltered" => $this->Enkrip_model->count_filtered_RincianHps_vendor_manual_tender_biasa($id_paket, $id_vendor),
			"data" => $data,
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function update_ke_evaluasi($id_vendor)
	{
		$id_paket =  $this->uri->segment(4);
		$where = [
			'id_mengikuti_vendor' => $id_vendor,
			'id_mengikuti_paket_vendor' => $id_paket
		];

		$data = [
			'nilai_penawaran' => $this->input->post('total_hps_per_vendor'),
		];
		$this->db->where($where);
		$this->db->update('tbl_vendor_mengikuti_paket', $data);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}
	public function update_penawaran_pdf_lempar()
	{
		$id_paket = $this->input->post('id_paket_lempar');
		$id_vendor = $this->input->post('id_vendor_lempar');
		$nilai_hps_vendor_pdf_lempar = $this->input->post('nilai_hps_vendor_pdf_lempar');
		$where = [
			'id_mengikuti_vendor' => $id_vendor,
			'id_mengikuti_paket_vendor' => $id_paket
		];

		$data = [
			'nilai_penawaran' => $nilai_hps_vendor_pdf_lempar
		];
		$this->db->where($where);
		$this->db->update('tbl_vendor_mengikuti_paket', $data);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}
}
