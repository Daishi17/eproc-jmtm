
<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Rup extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form', 'string');
		$this->load->library(['form_validation']);
		$this->load->model('Wilayah/Wilayah_model');
		$this->load->model('Rup/Rup_model');
		$this->load->model('Kualifikasi/Kualifikasi_model');
	}
	// ========== kodingan untuk paket penyedia ==========
	public function rup_penyedia()
	{
		$data['all_paket'] = $this->Rup_model->getAllPaket();
		$data['getdivisi'] = $this->Rup_model->get_devisi();
		$data['get_jenis_pengadaan'] = $this->Rup_model->get_jenis_pengadaan();
		$this->load->view('template_sirup/header');
		$this->load->view('template_sirup/navbar');
		$this->load->view('rup_penyedia/index', $data);
		$this->load->view('template_sirup/footer');
		$this->load->view('rup_penyedia/ajax');
	}

	public function rup_penyedia_edit($id_paket)
	{
		$data['sumberdana']  = $this->Rup_model->totalhps($id_paket);
		$data['sumberdana']  = $this->Rup_model->getSumberDana($id_paket);
		$data['lokasi_kerja']  = $this->Rup_model->getLokasiPekerjaan($id_paket);
		$data['jadwal_pemilihan']  = $this->Rup_model->getJadwalPemilihan($id_paket);
		$data['angga'] = $this->Rup_model->getByid($id_paket);
		$data['yu_kerja'] = $this->Rup_model->paksa_unit_kerja($id_paket);
		$data['getdivisi'] = $this->Rup_model->get_devisi();
		$data['get_jenis_anggaran'] = $this->Rup_model->get_jenis_anggaran();
		$data['get_metode'] = $this->Rup_model->get_metode_pemilihan();
		$data['get_jenis_pengadaan'] = $this->Rup_model->get_jenis_pengadaan();
		$data['get_produk_dl_negri'] = $this->Rup_model->get_produk_dalam_negri();
		$data['kabupaten'] = $this->Wilayah_model->getAllKabupaten();
		$data['provinsi'] = $this->Wilayah_model->getProvinsi();
		$data['tahun_anggaran'] = $this->db->query("SELECT * FROM tbl_tahun_anggaran WHERE status_tahun_anggaran = 1")->result_array();
		$this->load->view('template_sirup/header');
		$this->load->view('template_sirup/navbar');
		$this->load->view('rup_penyedia/edit', $data);
		$this->load->view('template_sirup/footer');
		$this->load->view('rup_penyedia/ajax', $data);
	}
	// var_dump($data);
	// die();
	public function tambah_rup_penyedia()
	{
		$data['getdivisi'] = $this->Rup_model->get_devisi();
		$data['get_jenis_anggaran'] = $this->Rup_model->get_jenis_anggaran();
		$data['get_metode'] = $this->Rup_model->get_metode_pemilihan();
		$data['get_jenis_pengadaan'] = $this->Rup_model->get_jenis_pengadaan();
		$data['get_produk_dl_negri'] = $this->Rup_model->get_produk_dalam_negri();
		$data['kabupaten'] = $this->Wilayah_model->getAllKabupaten();
		$data['provinsi'] = $this->Wilayah_model->getProvinsi();
		$data['all_paket'] = $this->Rup_model->getAllPaket();
		$data['tahun_anggaran'] = $this->db->query("SELECT * FROM tbl_tahun_anggaran WHERE status_tahun_anggaran = 1")->result_array();
		$this->load->view('template_sirup/header');
		$this->load->view('template_sirup/navbar');
		$this->load->view('rup_penyedia/tambah', $data);
		$this->load->view('template_sirup/footer');
		$this->load->view('rup_penyedia/ajax', $data);
	}

	//CREATE
	public function save()
	{

		$table = "tbl_paket";
		$field = "kode_tender_random";
		$today = date('dmY');
		$text = '.JMTM.' . $today;
		$kode_terakhirnya = $this->Rup_model->get_kode_tender($text, $table, $field);
		$no_urut = (int) substr($kode_terakhirnya, -4, 4);
		$no_urut++;
		$hasilnya = $text . sprintf('%04s', $no_urut);

		$nama_paket = $this->input->post('nama_paket', TRUE);
		$id_tahun_anggaran = $this->input->post('id_tahun_anggaran', TRUE);
		$id_unit_kerja = $this->input->post('id_unit_kerja', TRUE);
		$program_paket = $this->input->post('program_paket', TRUE);
		$id_jenis_pengadaan = $this->input->post('id_jenis_pengadaan', TRUE);
		$id_jenis_anggaran = $this->input->post('id_jenis_anggaran', TRUE);
		$id_metode_pemilihan = $this->input->post('id_metode_pemilihan', TRUE);
		$id_produk_dl_negri = $this->input->post('id_produk_dl_negri', TRUE);
		$uraian_pekerjaan_paket = $this->input->post('uraian_pekerjaan_paket', TRUE);
		$sepesifikasi_paket = $this->input->post('sepesifikasi_paket', TRUE);
		$kualifikasi_usaha = $this->input->post('kualifikasi_usaha', TRUE);
		$id_kualifikasi = $this->input->post('id_kualifikasi', TRUE);
		// Insert lokasi Pekerjaan
		$id_provinsi = $this->input->post('id_provinsi', TRUE);
		$id_kabupaten = $this->input->post('id_kabupaten', TRUE);
		$detail_lokasi = $this->input->post('detail_lokasi', TRUE);

		//tahun jamak
		$tahun_mulai_jamak = $this->input->post('tahun_mulai_jamak');
		$tahun_selesai_jamak = $this->input->post('tahun_selesai_jamak');


		// Insert Sumber Dana batchnya
		$asal_dana = $this->input->post('asal_dana', TRUE);
		$hps = $this->input->post('hps', TRUE);
		$tahun_anggaran = $this->input->post('tahun_anggaran', TRUE);

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
			'id_kualifikasi' => $id_kualifikasi,
			'id_produk_dl_negri' => $id_produk_dl_negri,
			'uraian_pekerjaan_paket' => $uraian_pekerjaan_paket,
			'sepesifikasi_paket' => $sepesifikasi_paket,
			'kualifikasi_usaha' => $kualifikasi_usaha,
			'tahun_mulai_jamak' => $tahun_mulai_jamak,
			'id_tahun_anggaran' => $id_tahun_anggaran,
			'tahun_selesai_jamak' => $tahun_selesai_jamak,
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
				'tahun_anggaran' => $tahun_anggaran[$key]
			);
		}
		$this->db->insert_batch('tbl_sumber_dana', $result);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
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
				'id_unit_kerja' => $this->input->post('id_unit_kerja'),
				'id_tahun_anggaran' =>  $this->input->post('id_tahun_anggaran'),
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

	public function getdata()
	{
		if ($this->session->userdata('id_role') == 1) {
			$resultss = $this->Rup_model->getdatatable();
			$data = [];
			$no = $_POST['start'];
			foreach ($resultss as $angga) {
				$row = array();
				$row[] = ++$no;
				$row[] = $angga->kode_jenis_anggaran . $angga->kode_jenis_pengadaan . $angga->kode_metode_pemilihan . $angga->kode_unit_kerja . $angga->kode_produk_dl_negri;
				$row[] = '<a href="javascript:;" onClick="byid(' . "'" . $angga->id_paket . "','detail'" . ')">' . $angga->nama_paket . '</a>';
				$row[] = $angga->nama_unit_kerja;
				$row[] = $angga->program_paket;
				$row[] = $angga->nama_jenis_pengadaan;
				$row[] = $angga->nama_metode_pemilihan;
				$row[] = $angga->keterangan;
				$row[] = $angga->nama_jenis_anggaran;
				if ($angga->status_finalisasi_draft == 1 || $angga->status_finalisasi_draft == 3) {
					if ($angga->status_paket_tender >= 1) {
						$row[] = '<a href="javascript:;" class="btn btn-info btn-sm btn-block disabled" onClick="byid(' . "'" . $angga->id_paket . "','revisi_paket'" . ')"><i class="far fa-thumbs-up"></i> Tender Sedang Berlangsung <br> Tidak Dapat Merubah Paket ini !! <i class="fas fa-check"></i></a>';
					} else {
						$row[] = '<button type="button" disabled class="btn btn-success btn-sm btn-block" onClick="byid(' . "'" . $angga->id_paket . "','finalisasi'" . ')"><i class="fas fa-check"></i> Paket Di Finalisasi <br>' . $angga->nama_peminta_revisi . ' </a>';
					}
				} else if ($angga->status_finalisasi_draft == 2) {
					$row[] = '<a href="javascript:;" class="btn btn-info btn-sm btn-block" onClick="byid(' . "'" . $angga->id_paket . "','setujui_paket'" . ')"><i class="fas fa-file-signature"></i> Permintaan Refisi Paket</a>';
				} else {
					$row[] = '<a href="javascript:;" class="btn btn-success btn-sm btn-block" onClick="byid(' . "'" . $angga->id_paket . "','finalisasi'" . ')"><i class="fas fa-check"></i> Finalisasi Draf <br> Paket Di Buat Oleh ' . $angga->pembuat_paket . '  </a>';
				}
				if ($angga->status_finalisasi_draft == 0) {
					$row[] = '<a href="javascript:;" class="btn btn-success btn-sm btn-block " onClick="byid(' . "'" . $angga->id_paket . "','edit'" . ')"><i class="fas fa-edit"></i> Edit</a> <a href="javascript:;" class="btn btn-danger btn-sm btn-block " onClick="byid(' . "'" . $angga->id_paket . "','hapus'" . ')">  <i class="fas fa-trash"></i> Hapus</a>';
				}
				if ($angga->status_paket_tender >= 1) {
					$row[] = '<a href="javascript:;" class="btn btn-success btn-sm btn-block " onClick="byid(' . "'" . $angga->id_paket . "','edit'" . ')"><i class="fas fa-edit"></i> Edit</a> <a href="javascript:;" class="btn btn-danger btn-sm btn-block disabled" onClick="byid(' . "'" . $angga->id_paket . "','hapus'" . ')">  <i class="fas fa-trash"></i> Hapus</a>';
				} else {
					$row[] = '<a href="javascript:;" class="btn btn-success btn-sm btn-block " onClick="byid(' . "'" . $angga->id_paket . "','edit'" . ')"><i class="fas fa-edit"></i> Edit</a> <a href="javascript:;" class="btn btn-danger btn-sm btn-block " onClick="byid(' . "'" . $angga->id_paket . "','hapus'" . ')">  <i class="fas fa-trash"></i> Hapus</a>';
				}
				$row[] = '<a href="javascript:;" class="btn btn-success btn-sm btn-block " onClick="byid(' . "'" . $angga->id_paket . "','edit'" . ')"><i class="fas fa-edit"></i> Edit</a> <a href="javascript:;" class="btn btn-danger btn-sm btn-block " onClick="byid(' . "'" . $angga->id_paket . "','hapus'" . ')">  <i class="fas fa-trash"></i> Hapus</a>';
				$data[] = $row;
			}
			$output = array(
				"draw" => intval($_POST['draw']),
				"recordsTotal" => $this->Rup_model->count_all_data(),
				"recordsFiltered" => $this->Rup_model->count_filtered_data(),
				"data" => $data
			);
			$this->output->set_content_type('application/json')->set_output(json_encode($output));
		} else if (($this->session->userdata('id_role') == 2)) {
			$role_agency = $this->session->userdata('id_pegawai');
			$area_agency = $this->session->userdata('id_unit_kerja2');
			$resultsss = $this->Rup_model->getdatatable2($role_agency,  $area_agency);
			$data = [];
			$no = $_POST['start'];
			foreach ($resultsss as $anggi) {
				$row = array();
				$row[] = ++$no;
				$row[] = $anggi->kode_jenis_anggaran . $anggi->kode_jenis_pengadaan . $anggi->kode_metode_pemilihan . $anggi->kode_unit_kerja . $anggi->kode_produk_dl_negri;
				$row[] = '<a href="javascript:;" onClick="byid(' . "'" . $anggi->id_paket . "','detail'" . ')">' . $anggi->nama_paket . '</a>';
				$row[] = $anggi->nama_unit_kerja;
				$row[] = $anggi->program_paket;
				$row[] = $anggi->nama_jenis_pengadaan;
				$row[] = $anggi->nama_metode_pemilihan;
				$row[] = $anggi->keterangan;
				$row[] = $anggi->nama_jenis_anggaran;
				if ($anggi->status_finalisasi_draft == 1) {
					if ($anggi->status_paket_tender >= 1) {
						$row[] = '<a href="javascript:;" class="btn btn-info btn-sm btn-block disabled" onClick="byid(' . "'" . $anggi->id_paket . "','revisi_paket'" . ')"><i class="far fa-thumbs-up"></i> Tender Sedang Berlangsung <br> Tidak Dapat Revisi Paket <i class="fas fa-check"></i></a>';
					} else {
						$row[] = '<a href="javascript:;" class="btn btn-success btn-sm btn-block disabled"><i class="fas fa fa-check text-white"></i> Paket Di Finalisasi</a><a href="javascript:;" class="btn btn-warning btn-sm btn-block" onClick="byid(' . "'" . $anggi->id_paket . "','revisi_paket'" . ')"><i class="fas fa-file-signature"></i> Revisi Paket</a>';
					}
				} else {
					if ($anggi->status_finalisasi_draft == 2) {
						$row[] = '<a href="javascript:;" class="btn btn-danger btn-sm btn-block disabled" onClick="byid(' . "'" . $anggi->id_paket . "','finalisasi'" . ')"><i class="fas fa-sync-alt"></i> Menunngu Di Approve</a>';
					} else if ($anggi->status_finalisasi_draft == 3) {
						$row[] = '<a href="javascript:;" class="btn btn-success btn-sm btn-block" onClick="byid(' . "'" . $anggi->id_paket . "','finalisasi'" . ')"><i class="fas fa-sync-alt"></i> Finalisasi Draf</a>';
					} else if ($anggi->status_finalisasi_draft == 0) {
						$row[] = '<a href="javascript:;" class="btn btn-success btn-sm btn-block" onClick="byid(' . "'" . $anggi->id_paket . "','finalisasi'" . ')"><i class="fas fa-check"></i> Finalisasi Draf</a>';
					}
				}
				if ($anggi->status_finalisasi_draft == 1 || $anggi->status_finalisasi_draft == 2) {
					$row[] = '<a href="javascript:;" class="btn btn-success btn-sm btn-block disabled" onClick="byid(' . "'" . $anggi->id_paket . "','edit'" . ')"><i class="fas fa-edit"></i> Edit</a> <a href="javascript:;" class="btn btn-danger btn-sm btn-block disabled" onClick="byid(' . "'" . $anggi->id_paket . "','hapus'" . ')">  <i class="fas fa-trash"></i> Hapus</a>';
				} else {
					$row[] = '<a href="javascript:;" class="btn btn-success btn-sm btn-block" onClick="byid(' . "'" . $anggi->id_paket . "','edit'" . ')"><i class="fas fa-edit"></i> Edit</a> <a href="javascript:;" class="btn btn-danger btn-sm btn-block" onClick="byid(' . "'" . $anggi->id_paket . "','hapus'" . ')">  <i class="fas fa-trash"></i> Hapus</a>';
				}
				$data[] = $row;
			}
			$output = array(
				"draw" => intval($_POST['draw']),
				"recordsTotal" => $this->Rup_model->count_all_data2(),
				"recordsFiltered" => $this->Rup_model->count_filtered_data2($role_agency, $area_agency),
				"data" => $data
			);
			$this->output->set_content_type('application/json')->set_output(json_encode($output));
		}
	}


	public function byid($id_paket)
	{
		$getsumberdana = $this->Rup_model->getSumberDana($id_paket);
		$getlokasipekerjaan = $this->Rup_model->getLokasiPekerjaan($id_paket);
		$getjadwalpemilihan = $this->Rup_model->getJadwalPemilihan($id_paket);
		$get_paket = $this->Rup_model->getByid($id_paket);
		$output = [
			"get_paket" => $get_paket,
			"get_sumberdana" => $getsumberdana,
			"get_lokasi_kerja" => $getlokasipekerjaan,
			"get_jadwal_pemilihan" => $getjadwalpemilihan
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function update()
	{
		$this->form_validation->set_rules('nama_unit_kerja', 'Nama Unit Kerja', 'required|trim', ['required' => 'Nama Unit Kerja Wajib Diisi!']);
		$this->form_validation->set_rules('kode_unit_kerja', 'Kode Unit Kerja', 'required|trim', ['required' => 'Kode Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$data = [
				'nama_unit_kerja' => form_error('nama_unit_kerja'),
				'kode_unit_kerja' => form_error('kode_unit_kerja'),
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} else {
			$data = [
				'nama_unit_kerja' => htmlspecialchars($this->input->post('nama_unit_kerja')),
				'kode_unit_kerja' => htmlspecialchars($this->input->post('kode_unit_kerja')),
			];
			$this->Rup_model->update(array('id_paket' => $this->input->post('id_paket')), $data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}
	public function delete($id_paket)
	{
		$data = [
			'status_soft_delete' => 1
		];
		$this->Rup_model->softdeletedata($id_paket, $data);
		$this->output->set_content_type('application/json')->set_output(json_encode('berhasil'));
	}



	// Approvel
	// finalisai Drat
	public function finalisasi_draft($id_paket)
	{
		$data = [
			'status_finalisasi_draft' => 1,
			'nama_peminta_revisi' => $this->session->userdata('username'),
		];
		$this->Rup_model->update(array('id_paket' => $id_paket), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}
	// pengiriman Revisi
	public function kirim_revisi_paket()
	{
		$id_paket = $this->input->post('id_paket');
		$nama_peminta_revisi = $this->input->post('nama_peminta_revisi');
		$alasan_revisi_paket = $this->input->post('alasan_revisi_paket');
		$data = [
			'nama_peminta_revisi' => $nama_peminta_revisi,
			'alasan_revisi_paket' => $alasan_revisi_paket,
			'status_finalisasi_draft' => 2,
		];
		$this->Rup_model->update(array('id_paket' => $id_paket), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}

	// Penyetujian Revisi Dari Admin
	public function setuji_revisi()
	{
		$id_paket = $this->input->post('id_paket');
		$data = [
			'status_finalisasi_draft' => 3,
		];
		$this->Rup_model->update(array('id_paket' => $id_paket), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}



	// ========
	// =============================LOKASI PEKERJAAN===========================
	// ========
	// =================================BATAS========================
	public function data_get_lokasi_pekerjaan($id_paket)
	{
		$resultss = $this->Rup_model->getdatatablelokasi($id_paket);
		$no = $_POST['start'];
		$data = [];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] = $angga->nama_provinsi;
			$row[] = $angga->nama_kabupaten;
			$row[] = $angga->detail_lokasi;
			$row[] = '<a href="javascript:;" class="btn btn-success btn-sm" onClick="byidLokasi(' . "'" . $angga->id_lokasi_pekerjaan . "','editlokasi'" . ')"><i class="fas fa-edit"></i> Edit</a> <a href="javascript:;" class="btn btn-danger btn-sm" onClick="byidLokasi(' . "'" . $angga->id_lokasi_pekerjaan . "','hapuslokasi'" . ')">  <i class="fas fa-trash"></i> Hapus</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Rup_model->count_all_datalokasi($id_paket),
			"recordsFiltered" => $this->Rup_model->count_filtered_datalokasi($id_paket),
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
		$this->Rup_model->create_lokasi_kerja($data);
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
		$this->Rup_model->updatelokasi_pekerjaan(array('id_lokasi_pekerjaan' => $this->input->post('id_lokasi_pekerjaan')), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode('clear'));
	}
	// GET BY ID LOKASI
	public function byidLokasi($id_lokasi_pekerjaan)
	{
		$data = $this->Rup_model->getLokasiPekerjaanbyid($id_lokasi_pekerjaan);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}
	// HAPUS DATA
	public function delete_lokasi_pekerjaan($id_lokasi_pekerjaan)
	{
		$data = $this->Rup_model->deletedata_lokasi_pekerjaan($id_lokasi_pekerjaan);
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

		$resultss = $this->Rup_model->getdatatablesumberdana($id_paket);
		$no = $_POST['start'];
		$total = 0;
		$data = [];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] = $angga->asal_dana;
			if (!$angga->hps) {
				$row[] = '';
			} else {
				$row[] = "Rp " . number_format($angga->hps, 2, ',', '.');
			}
			$row[] = $angga->tahun_anggaran;
			$row[] = '<a href="javascript:;" class="btn btn-success btn-sm" onClick="byidSumberdana(' . "'" . $angga->id_sumber_dana . "','editsumberdana'" . ')"><i class="fas fa-edit"></i> Edit</a> <a href="javascript:;" class="btn btn-danger btn-sm" onClick="byidSumberdana(' . "'" . $angga->id_sumber_dana . "','hapussumberdana'" . ')">  <i class="fas fa-trash"></i> Hapus</a>';
			if (!$angga->hps) {
				$row[] = '';
			} else {
				$row[] = $total += $angga->hps;
			}

			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Rup_model->count_all_datasumberdana($id_paket),
			"recordsFiltered" => $this->Rup_model->count_filtered_sumberdana($id_paket),
			"data" => $data,
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}
	// ADD Sumber Dana
	public function add_sumberdana()
	{
		$data = [
			'id_paket' => htmlspecialchars($this->input->post('id_paket')),
			'asal_dana' => htmlspecialchars($this->input->post('asal_dana')),
			'hps' => htmlspecialchars($this->input->post('hps')),
			'tahun_anggaran' => htmlspecialchars($this->input->post('tahun_anggaran'))
		];
		$this->Rup_model->create_sumberdana($data);
		$this->output->set_content_type('application/json')->set_output(json_encode('clear'));
	}
	// EDIT Sumber Dana
	public function edit_sumberdana()
	{
		$data = [
			'asal_dana' => htmlspecialchars($this->input->post('asal_dana')),
			'hps' => htmlspecialchars($this->input->post('hps')),
			'tahun_anggaran' => htmlspecialchars($this->input->post('tahun_anggaran'))
		];
		$this->Rup_model->updatesumberdana(array('id_sumber_dana' => $this->input->post('id_sumber_dana')), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode('clear'));
	}
	// GET BY ID LOKASI
	public function byidSumberdana($id_sumber_dana)
	{
		$data = $this->Rup_model->getSumberDanabyid($id_sumber_dana);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}
	// HAPUS DATA
	public function delete_sumberdana($id_sumber_dana)
	{
		$data = $this->Rup_model->deletedatasumberdana($id_sumber_dana);
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
		$resultss = $this->Rup_model->getdatatablejadwal_pemilihan($id_paket);
		$no = $_POST['start'];
		$data = [];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] = $angga->asal_dana;
			$row[] = $angga->hps;
			$row[] = '<a href="javascript:;" class="btn btn-success btn-sm" onClick="byidJadwal_pemilihan(' . "'" . $angga->id_sumber_dana . "','editjadwal_pemilihan'" . ')"><i class="fas fa-edit"></i> Edit</a> <a href="javascript:;" class="btn btn-danger btn-sm" onClick="byidJadwal_pemilihan(' . "'" . $angga->id_sumber_dana . "','hapusjadwal_pemilihan'" . ')">  <i class="fas fa-trash"></i> Hapus</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Rup_model->count_all_datajadwal_pemilihan($id_paket),
			"recordsFiltered" => $this->Rup_model->count_filtered_jadwal_pemilihan($id_paket),
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
		$this->Rup_model->create_jadwal_pemilihan($data);
		$this->output->set_content_type('application/json')->set_output(json_encode('clear'));
	}
	// EDIT LOKASI
	public function edit_jadwal_pemilihan()
	{
		$data = [
			'asal_dana' => htmlspecialchars($this->input->post('asal_dana')),
			'hps' => htmlspecialchars($this->input->post('hps')),
		];
		$this->Rup_model->updatejadwal_pemilihan(array('id_sumber_dana' => $this->input->post('id_sumber_dana')), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode('clear'));
	}
	// GET BY ID LOKASI
	public function byidjadwal_pemilihan($id_sumber_dana)
	{
		$data = $this->Rup_model->getjadwal_pemilihanbyid($id_sumber_dana);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}
	// HAPUS DATA
	public function delete_jadwal_pemilihan($id_sumber_dana)
	{
		$data = $this->Rup_model->deletedatajadwal_pemilihan($id_sumber_dana);
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
		if ($this->session->userdata('id_role') == 1) {
			$table = "tbl_paket";
			$field = "kode_tender_random";
			$today = date('ymd');
			$text = '.JMTM.' . $today;
			$kode_terakhirnya = $this->Rup_model->get_kode_tender($text, $table, $field);
			$no_urut = (int) substr($kode_terakhirnya, -4, 4);
			$no_urut++;
			$hasilnya = $text . sprintf('%04s', $no_urut);

			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'xlsx|xls';
			$config['file_name'] = 'doc' . time();
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('importexcel')) {
				$file = $this->upload->data();
				$reader = ReaderEntityFactory::createXLSXReader();
				$reader->open('uploads/' . $file['file_name']);
				foreach ($reader->getSheetIterator() as $sheet) {
					$numRow = 1;
					foreach ($sheet->getRowIterator() as $row) {
						if ($numRow > 1) {
							$paketrup = array(
								'kode_rup_paket' => $row->getCellAtIndex(0),
								'nama_paket' => $row->getCellAtIndex(1),
								'id_unit_kerja' => $row->getCellAtIndex(2),
								'program_paket' => $row->getCellAtIndex(3),
								'id_jenis_pengadaan' => $row->getCellAtIndex(4),
								'id_metode_pemilihan' => $row->getCellAtIndex(5),
								'id_produk_dl_negri' => $row->getCellAtIndex(6),
								'uraian_pekerjaan_paket ' => $row->getCellAtIndex(7),
								'sepesifikasi_paket' => $row->getCellAtIndex(8),
								'kualifikasi_usaha' => $row->getCellAtIndex(9),
								'id_jenis_anggaran' => $row->getCellAtIndex(10),
								'pembuat_paket' => $this->session->userdata('username'),
								'kode_tender_random' => $hasilnya,
							);
							$this->Rup_model->insert_via_excel($paketrup);
							$package_id = $this->db->insert_id();
							$sumber_dana = array(
								'id_paket' =>  $package_id,
								'asal_dana' => $row->getCellAtIndex(12),
								'hps' => $row->getCellAtIndex(13),
							);
							$this->Rup_model->insert_via_excel_sumber_dana($sumber_dana);
						}
						$numRow++;
					}
					$reader->close();
					unlink('uploads/' . $file['file_name']);
					$this->session->set_flashdata('pesan', 'Data Berhasil Di Import');
					redirect('rup/rup_penyedia');
				}
			} else {
				echo "Error : " . $this->upload->display_errors();
			}
		} else if ($this->session->userdata('id_role') == 2) {
			$table = "tbl_paket";
			$field = "kode_tender_random";
			$today = date('ymd');
			$text = '.JMTM.' . $today;
			$kode_terakhirnya = $this->Rup_model->get_kode_tender($text, $table, $field);
			$no_urut = (int) substr($kode_terakhirnya, -4, 4);
			$no_urut++;
			$hasilnya = $text . sprintf('%04s', $no_urut);
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'xlsx|xls';
			$config['file_name'] = 'doc' . time();
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('importexcel')) {
				$file = $this->upload->data();
				$reader = ReaderEntityFactory::createXLSXReader();
				$reader->open('uploads/' . $file['file_name']);
				foreach ($reader->getSheetIterator() as $sheet) {
					$numRow = 1;
					foreach ($sheet->getRowIterator() as $row) {
						if ($numRow > 1) {
							$paketrup = array(
								'kode_rup_paket' => $row->getCellAtIndex(0),
								'nama_paket' => $row->getCellAtIndex(1),
								'id_unit_kerja' => $this->session->userdata('id_unit_kerja2'),
								'program_paket' => $row->getCellAtIndex(3),
								'id_jenis_pengadaan' => $row->getCellAtIndex(4),
								'id_metode_pemilihan' => $row->getCellAtIndex(5),
								'id_produk_dl_negri' => $row->getCellAtIndex(6),
								'uraian_pekerjaan_paket ' => $row->getCellAtIndex(7),
								'sepesifikasi_paket' => $row->getCellAtIndex(8),
								'kualifikasi_usaha' => $row->getCellAtIndex(9),
								'id_jenis_anggaran' => $row->getCellAtIndex(10),
								'pembuat_paket' => $this->session->userdata('username'),
								'id_pegawai' => $this->session->userdata('id_pegawai'),
								'kode_tender_random' => $hasilnya,
							);
							$this->Rup_model->insert_via_excel($paketrup);
							$package_id = $this->db->insert_id();
							// $lokasi = array(
							//    'id_paket' =>  $package_id,
							//    'id_provinsi' => $row->getCellAtIndex(12),
							//    'id_kabupaten' => $row->getCellAtIndex(13),
							//    'detail_lokasi' => $row->getCellAtIndex(14),
							// );
							// $this->Rup_model->insert_via_excel_lokasi($lokasi);
							// ini sumber dana
							$sumber_dana = array(
								'id_paket' =>  $package_id,
								'asal_dana' => $row->getCellAtIndex(12),
								'hps' => $row->getCellAtIndex(13),
							);
							$this->Rup_model->insert_via_excel_sumber_dana($sumber_dana);
						}
						$numRow++;
					}
					$reader->close();
					unlink('uploads/' . $file['file_name']);
					$this->session->set_flashdata('pesan', 'Data Berhasil Di Import');
					redirect('rup/rup_penyedia');
				}
			} else {
				echo "Error : " . $this->upload->display_errors();
			}
		}
	}

	
	public function dataKualifikasi($id_kualifikasi)
	{
		$data = $this->Kualifikasi_model->getKualifikasi($id_kualifikasi);
		echo '<option value="">--Pilih Kualifikasi--</option>';
		foreach ($data as $key => $value) {
			echo '<option value="' . $value['id_kualifikasi'] . '">' . $value['nama_kualifikasi'] . '</option>';
		}
	}	
// ========
	// =============================DOWNLOAD TEMPLATE EXCEL RUP===========================
	// ========
	public function downloadtemplate()
	{
		$this->load->view('rup_penyedia/download_excel');
	}
}
