<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
class Panitia extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library(['form_validation']);
		$this->load->model('Panitia/Panitia_model');
		$this->load->model('Wilayah/Wilayah_model');
		$this->load->model('Pegawai/Pegawai_model');
		$this->load->model('Rup/Rup_model');
	}

	public function index()
	{
		// $data['panitia'] = $this->Panitia_model->getAll();
		// $data['hitungpanitia'] = $this->Panitia_model->countPerId();
		$this->load->view('template_panitia/header');
		$this->load->view('template/navlogin');
		$this->load->view('panitia/index');
		$this->load->view('template_panitia/footer');
		$this->load->view('panitia/ajax');
	}

	//nama panitianya
	public function get_panitia()
	{
		if ($this->session->userdata('id_role') == 1) {
			$result = $this->Panitia_model->getdatatable();
			$data = [];
			$no = $_POST['start'];
			foreach ($result as $panitia) {
				$row = array();
				$row[] = ++$no;
				$row[] = $panitia->nama_panitia;
				$row[] = $panitia->nama_unit_kerja;
				$row[] = $panitia->anggota . ' Anggota';
				if ($panitia->status_panitia == 0 || $panitia->status_panitia == NULL) {
					$row[] = 'Tidak Aktif';
				} else if ($panitia->status_panitia == 1) {
					$row[] = 'Aktif';
				}
				if ($panitia->status_penunjukan_langsung_panitia == 1) {
					$row[] = '<label class="badge badge-success">Panitia Penunjukan Langsung</label>';
				} else if ($panitia->status_penetapan_langsung == 1) {
					$row[] = '<label class="badge badge-warning">Panitia Penetapan Langsung</label>';
				} else if ($panitia->status_tender_terbatas == 1) {
					$row[] = '<label class="badge badge-danger">Panitia Tender Terbatas</label>';
				} else {
					$row[] = '<label class="badge badge-primary">Panitia Tender</label>';
				}
				$row[] = '<a href="javascript:;" class="btn btn-success btn-sm" onClick="byid(' . "'" . $panitia->id_panitia . "','edit'" . ')"><i class="fas fa-edit"></i> Edit</a>';
				$data[] = $row;
			}
			$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->Panitia_model->count_all_data(),
				"recordsFiltered" => $this->Panitia_model->count_filtered_data(),
				"data" => $data
			);
			$this->output->set_content_type('application/json')->set_output(json_encode($output));
		} else if ($this->session->userdata('id_role') == 2) {
			$result = $this->Panitia_model->getdatatable2($this->session->userdata('id_unit_kerja2'));
			$data = [];
			$no = $_POST['start'];
			foreach ($result as $panitia) {
				$row = array();
				$row[] = ++$no;
				$row[] = '<a href="javascript:;" onClick="byid(' . "'" . $panitia->id_panitia . "','detail'" . ')">' . $panitia->nama_panitia . '</a>';
				$row[] = $panitia->nama_unit_kerja;
				$row[] = $panitia->anggota . ' Anggota';
				if ($panitia->status_panitia == 0 || $panitia->status_panitia == NULL) {
					$row[] = 'Tidak Aktif';
				} else if ($panitia->status_panitia == 1) {
					$row[] = 'Aktif';
				}
				if ($panitia->status_penunjukan_langsung_panitia == 1) {
					$row[] = '<label class="badge badge-success">Panitia Penunjukan Langsung</label>';
				} else if ($panitia->status_penetapan_langsung == 1) {
					$row[] = '<label class="badge badge-warning">Panitia Penetapan Langsung</label>';
				} else {
					$row[] = '<label class="badge badge-primary">Panitia Tender</label>';
				}
				$row[] = '<a href="javascript:;" class="btn btn-success btn-sm" onClick="byid(' . "'" . $panitia->id_panitia . "','edit'" . ')"><i class="fas fa-edit"></i> Edit</a> <a href="javascript:;" class="btn btn-danger btn-sm" onClick="byid(' . "'" . $panitia->id_panitia . "','hapus'" . ')">  <i class="fas fa-trash-alt"></i> Hapus</a>';
				$data[] = $row;
			}
			$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->Panitia_model->count_all_data2($this->session->userdata('id_unit_kerja2')),
				"recordsFiltered" => $this->Panitia_model->count_filtered_data2($this->session->userdata('id_unit_kerja2')),
				"data" => $data
			);
			$this->output->set_content_type('application/json')->set_output(json_encode($output));
		}
	}

	//get calon barunya di edit
	public function get_anggota_baru()
	{
		$result = $this->Panitia_model->get_datatable_pegawai();
		// die;
		$data = [];
		$no = $_POST['start'];
		$i = 1;
		foreach ($result as $pegawai) {
			$row = array();
			$row[] = '<input type="checkbox" value="' . $pegawai->id_pegawai . '" name="id_pegawai2[]">';
			$row[] = ++$no;
			$row[] = $pegawai->nama_pegawai;
			$row[] = $pegawai->username;
			$row[] = $pegawai->nip;
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Panitia_model->count_all_data_pegawai(),
			"recordsFiltered" => $this->Panitia_model->count_filtered_data_pegawai(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	//get anggota yang sudah berada didalem panitianya
	public function get_anggota($id_panitia)
	{
		$result = $this->Panitia_model->get_datatable_anggota($id_panitia);
		$test = $this->Panitia_model->get_role_panitia();
		$no = $_POST['start'];
		$data = [];
		$dati = [];
		foreach ($result as $anggota) {
			$riw = array();
			foreach ($test as $role_panitia) {
				$riw[] = $role_panitia->id_role_panitia;
				$riw[] = $role_panitia->nama_role_panitia;
			}

			$row = array();
			$row[] = ++$no;
			$row[] = $anggota->nama_pegawai;
			$row[] = $anggota->username;
			$row[] = $anggota->nip;
			$row[] = $anggota->nama_role_panitia;
			$row[] = '<a href="javascript:;" class="btn btn-sm btn-primary" onClick="byidanggota(' . "'" . $anggota->id_detail_panitia . "','edit_role'" . ')">  <i class="fas fa-edit"></i> Edit Role </a> <a href="javascript:;" class="btn btn-sm btn-danger" onClick="byidanggota(' . "'" . $anggota->id_detail_panitia . "','hapusanggota'" . ')">  <i class="fas fa-trash-alt"></i> Hapus </a> ';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Panitia_model->count_all_anggota($id_panitia),
			"recordsFiltered" => $this->Panitia_model->count_filtered_data_anggota($id_panitia),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function get_by_id($id_panitia)
	{
		$get_panitia = $this->Panitia_model->getById($id_panitia);
		$get_anggota = $this->Panitia_model->getAnggotaDetail($id_panitia);
		$output = [
			"get_panitia" => $get_panitia,
			"get_anggota" => $get_anggota
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function tambahpanitia()
	{
		$data['provinsi'] = $this->Wilayah_model->getProvinsi();
		$data['getdivisi'] = $this->Rup_model->get_devisi();
		$data['pegawai'] = $this->Pegawai_model->getByPanitia();
		$data['area'] = $this->Panitia_model->getArea();
		$this->load->view('template_panitia/header');
		$this->load->view('template/navlogin');
		$this->load->view('panitia/tambahpanitia', $data);
		$this->load->view('template_panitia/footer');
		$this->load->view('panitia/ajax');
	}

	//CREATE
	public function save()
	{
		// $this->form_validation->set_rules('nama_panitia', 'Nama Panitia', 'required|trim');
		$nama_panitia = $this->input->post('nama_panitia', TRUE);
		$nomor_sk = $this->input->post('nomor_sk', TRUE);
		$tahun = $this->input->post('tahun', TRUE);
		$alamat_kantor = $this->input->post('alamat_kantor', TRUE);
		$provinsi = $this->input->post('id_provinsi', TRUE);
		$kabupaten = $this->input->post('id_kabupaten', TRUE);
		$id_area = $this->input->post('id_area', TRUE);
		$id_unit_kerja = $this->input->post('id_unit_kerja', TRUE);
		$id_pegawai = $_POST['id_pegawai2'];
		$status_penetapan_langsung = $this->input->post('status_penetapan_langsung', TRUE);
		$status_penunjukan_langsung_panitia = $this->input->post('status_penunjukan_langsung_panitia', TRUE);
		$status_tender_terbatas = $this->input->post('status_tender_terbatas', TRUE);
		$this->Panitia_model->tambah($nama_panitia, $nomor_sk, $tahun, $alamat_kantor, $provinsi, $kabupaten, $id_area, $id_unit_kerja, $id_pegawai, $status_penetapan_langsung, $status_penunjukan_langsung_panitia, $status_tender_terbatas);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Berhasil Di Simpan!</div>');
		redirect('panitia');
	}

	//Show panitia
	public function show($id_panitia)
	{
		$data['getRole'] = $this->Panitia_model->getAnggotaRole($id_panitia);
		$data['panitia'] = $this->Panitia_model->getById($id_panitia);
		$data['cek_panitia_status'] = $this->Panitia_model->by_cek_status_panitia($id_panitia);
		$data['role'] = $this->Panitia_model->getRole($id_panitia);
		//get anggotanya
		$data['cekidanggota'] = $this->Panitia_model->getCekId($id_panitia);
		$data['anggota'] = $this->Panitia_model->getAnggota($id_panitia);
		$data['wilayah'] = $this->Wilayah_model->getProvinsi();
		$data['getdivisi'] = $this->Rup_model->get_devisi();
		$data['area'] = $this->Panitia_model->getArea();
		$data['testget'] = $this->Panitia_model->tesgetByPanitia();
		$data['tambahpanitia'] = $this->Panitia_model->getByPanitia();
		$this->load->view('template_panitia/header');
		$this->load->view('template/navlogin');
		$this->load->view('panitia/editpanitia', $data);
		$this->load->view('template_panitia/footer');
		$this->load->view('panitia/ajax', $data);
	}

	public function edit()
	{


		$id_panitia = $this->input->post('id_panitia', TRUE);
		$nama_panitia = $this->input->post('nama_panitia', TRUE);
		$nomor_sk = $this->input->post('nomor_sk', TRUE);
		$tahun = $this->input->post('tahun', TRUE);
		$alamat_kantor = $this->input->post('alamat_kantor', TRUE);
		$provinsi = $this->input->post('id_provinsi', TRUE);
		$kabupaten = $this->input->post('id_kabupaten', TRUE);
		$id_area = $this->input->post('id_area', TRUE);
		$id_unit_kerja = $this->input->post('id_unit_kerja', TRUE);
		$status_panitia = $this->input->post('status_panitia', TRUE);
		$data = [
			'id_panitia' => $id_panitia,
			'nama_panitia' => $nama_panitia,
			'nomor_sk' => $nomor_sk,
			'tahun' => $tahun,
			'alamat_kantor' => $alamat_kantor,
			'id_provinsi' => $provinsi,
			'id_kabupaten' => $kabupaten,
			'id_area' => $id_area,
			'id_unit_kerja' => $id_unit_kerja,
			'status_panitia' => $status_panitia,
			'created_at' => date('Y-m-d H:i')
		];
		// var_dump($data);
		// die;
		$this->Panitia_model->update($data, $id_panitia);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data Berhasil Di Edit!</div>');
		redirect('panitia');
	}

	public function hapus_anggota($id_detail_panitia)
	{
		$this->Panitia_model->delete_anggota($id_detail_panitia);
		$this->output->set_content_type('application/json')->set_output(json_encode('berhasil'));
	}

	public function deletepanitia($id_panitia)
	{
		$this->Panitia_model->delete($id_panitia);
		$this->output->set_content_type('application/json')->set_output(json_encode('berhasil'));
	}


	//ubah role anggota
	public function editRole_byid()
	{
		$id_role_panitia = htmlspecialchars($this->input->post('id_role_panitia'));
		$id_panitia = htmlspecialchars($this->input->post('id_panitia'));
		$get_ambil_detail_panitia = $this->Panitia_model->get_detal_panitia($id_panitia, $id_role_panitia);
		if ($get_ambil_detail_panitia['id_role_panitia'] == null) {
			$data = [
				'id_role_panitia' => $id_role_panitia,
			];
			$this->Panitia_model->update_role_anggota(array('id_detail_panitia' => $this->input->post('id_detail_panitia')), $data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		} else if ($get_ambil_detail_panitia['id_role_panitia'] != 2) {
			$id_role_panitia_asli_di_db = $get_ambil_detail_panitia['id_role_panitia'];
			if ($id_role_panitia == $id_role_panitia_asli_di_db) {
				$is_unique_nip =  '|is_unique[tbl_detail_panitia.id_role_panitia]';
			} else {
				$is_unique_nip = '';
			}
			$this->form_validation->set_rules('id_role_panitia', 'Role Ketua Sudah Ada Yang Punya', 'required|trim|xss_clean' . $is_unique_nip, ['required' => 'Role Wajib Diisi!', 'is_unique' => 'Role Ketua Sudah Ada Yang Punya']);

			if ($this->form_validation->run() == false) {
				$data = [
					// 'nama_pegawai' => form_error('nama_pegawai'),
					'id_role_panitia' => form_error('id_role_panitia'),
				];
				$this->output->set_content_type('application/json')->set_output(json_encode($data));
			} else {
				$data = [
					'id_role_panitia' => $id_role_panitia,
				];
				$this->Panitia_model->update_role_anggota(array('id_detail_panitia' => $this->input->post('id_detail_panitia')), $data);
				$this->output->set_content_type('application/json')->set_output(json_encode('success'));
			}
		} else {
			$data = [
				'id_role_panitia' => $id_role_panitia,
			];
			$this->Panitia_model->update_role_anggota(array('id_detail_panitia' => $this->input->post('id_detail_panitia')), $data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}

	public function tambah_anggota()
	{
		$id_panitia  = $this->input->post('id_panitia');
		$id_pegawai2 = $this->input->post('id_pegawai2[]');
		$i = 1;
		foreach ($id_pegawai2 as $row) {
			if (!empty($row)) {
				$data = [
					'id_panitia' => $id_panitia,
					'id_pegawai2' => $row
				];
				$this->Panitia_model->tambahAnggota($data);
			}
			$i++;
		}
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}


	public function editpanitia()
	{
		$data['provinsi'] = $this->Wilayah_model->getProvinsi();
		$this->load->view('template_panitia/header');
		$this->load->view('template/navlogin');
		$this->load->view('panitia/editpanitia', $data);
		$this->load->view('template_panitia/footer');
		$this->load->view('panitia/ajax');
	}

	//get role panitia
	public function get_role() //klpd
	{
		$data = $this->Panitia_model->get_role_panitia();
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}
}
