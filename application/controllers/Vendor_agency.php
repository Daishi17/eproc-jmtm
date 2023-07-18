<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Vendor_agency extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Vendor/Vendor_model');
		$this->load->model('Auth_model');
	}

	public function index()
	{
		$this->load->view('template_vendor/header');
		$this->load->view('template_vendor/navbar');
		$this->load->view('vendor/vendor_aktif');
		$this->load->view('template_vendor/footer');
		$this->load->view('vendor/ajax');
	}

	public function get_vendor()
	{
		$result = $this->Vendor_model->getdatatable();
		$data = [];
		$no = $_POST['start'];
		foreach ($result as $vendor) {
			$row = array();
			$row[] = ++$no;
			$row[] = $vendor->username_vendor;
			$row[] = $vendor->email_vendor;
			$row[] = $vendor->nib;
			$row[] = '<a href="' . base_url('vendor/detail/' . $vendor->id_vendor) . '" class="btn btn-info btn-sm" onClick="byid(' . "'" . $vendor->id_vendor . "','detail_vendor'" . ')"><i class="fa fa-search"></i> Detail</a> <a href="javascript:;" class="btn btn-success btn-sm" onClick="byid(' . "'" . $vendor->id_vendor . "','approve_vendor'" . ')"><i class="far fa-thumbs-up"></i> Terima</a> <a href="javascript:;" class="btn btn-danger btn-sm" onClick="byid(' . "'" . $vendor->id_vendor . "','tolak_vendor'" . ')"><i class="far fa-thumbs-up"></i> Tolak</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Vendor_model->count_all_data(),
			"recordsFiltered" => $this->Vendor_model->count_filtered_data(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function get_by_id($id_pegawai)
	{
		$get_vendor = $this->Vendor_model->getById($id_pegawai);
		$output = [
			"get_vendor" => $get_vendor
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function approve_vendor($id_vendor)
	{
		$data = [
			'status_aktive_vendor' => 1,
			'diterima_oleh' => $this->session->userdata('nama_pegawai'),
			'tanggal_diterima' => date('m-d-Y H:i')
		];
		$this->Vendor_model->update_status($id_vendor, $data);
		$this->output->set_content_type('application/json')->set_output(json_encode('berhasil'));
		$kirim_email = $this->Vendor_model->notif_email_vendor($id_vendor);
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
		$this->email->to($kirim_email->email_vendor); // Ganti dengan email tujuan

		// Subject email
		$this->email->subject('E-Procurement JMTM');

		// Isi email
		$this->email->message("Selamat Pendaftaran Penyedia Anda Sudah Diterima Silahkan Lakukan Login");

		$this->email->send();
	}

	public function detail($id_vendor)
	{
		$data['vendor'] = $this->Vendor_model->getById($id_vendor);
		$data['cek_verifikasi'] = $this->Vendor_model->cek_Verifikasi($id_vendor);
		$data['persyaratan_vms'] = $this->Vendor_model->get_all_persyaratan();
		$data['all_verifikasi'] = $this->Vendor_model->all_verifikasi($id_vendor);
		$this->load->view('template_vendor/header');
		$this->load->view('template_vendor/navbar');
		$this->load->view('vendor/detail', $data);
		$this->load->view('template_vendor/footer');
		$this->load->view('vendor/ajax_vms');
	}


	public function vendor_aktif()
	{
		$this->load->view('template_vendor/header');
		$this->load->view('template_vendor/navbar');
		$this->load->view('vendor/index');
		$this->load->view('template_vendor/footer');
		$this->load->view('vendor/ajax');
	}

	public function get_vendor_aktif()
	{
		$result = $this->Vendor_model->getdatatable2();
		// var_dump($result);
		// die;
		$data = [];
		$no = $_POST['start'];
		foreach ($result as $vendor) {
			$row = array();
			$row[] = ++$no;
			$row[] = $vendor->username_vendor;
			$row[] = $vendor->email_vendor;
			$row[] = $vendor->nib;
			$row[] = '<a href="' . base_url('vendor/detail/' . $vendor->id_vendor) . '" class="btn btn-info btn-sm"><i class="fa fa-search"></i> Detail</a> <a href="javascript:;" class="btn btn-danger btn-sm" onClick="byid(' . "'" . $vendor->id_vendor . "','daftar_hitam'" . ')"><i class="fa fa-ban"></i> Blacklist</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Vendor_model->count_all_data2(),
			"recordsFiltered" => $this->Vendor_model->count_filtered_data2(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function ban_vendor()
	{
		$this->form_validation->set_rules('alasan_daftar_hitam', 'Alasan Daftar Hitam', 'required|trim', ['required' => 'Alasan Daftar Hitam Wajib Diisi!']);
		$this->form_validation->set_rules('masa_berlaku_daftar_hitam', 'Masa Berlaku Daftar Hitam', 'required|trim', ['required' => 'Masa Berlaku Daftar Hitam Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$data = [
				'alasan_daftar_hitam' => form_error('alasan_daftar_hitam'),
				'masa_berlaku_daftar_hitam' => form_error('masa_berlaku_daftar_hitam'),
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} else {
			$data = [
				'alasan_daftar_hitam' => htmlspecialchars($this->input->post('alasan_daftar_hitam')),
				'masa_berlaku_daftar_hitam' => $this->input->post('masa_berlaku_daftar_hitam'),
				'status_aktive_vendor' => 0,
				'status_daftar_hitam_vendor' => 1
			];
			$this->Vendor_model->masukkan_daftarhitam(array('id_vendor' => $this->input->post('id_vendor')), $data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}

	public function daftar_hitam()
	{
		$this->load->view('template_vendor/header');
		$this->load->view('template_vendor/navbar');
		$this->load->view('vendor/daftarhitam');
		$this->load->view('template_vendor/footer');
		$this->load->view('vendor/ajax');
	}

	public function get_vendor_blacklist()
	{
		$result = $this->Vendor_model->getdatatable3();
		// var_dump($result);
		// die;
		$data = [];
		$no = $_POST['start'];
		foreach ($result as $vendor) {
			$row = array();
			$row[] = ++$no;
			$row[] = $vendor->username_vendor;
			$row[] = $vendor->email_vendor;
			$row[] = $vendor->nib;
			$row[] = '<a href="' . base_url('vendor/detail/' . $vendor->id_vendor) . '" class="btn btn-info btn-sm"><i class="fa fa-search"></i> Detail</a> ';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Vendor_model->count_all_data3(),
			"recordsFiltered" => $this->Vendor_model->count_filtered_data3(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function gantipassword()
	{
		$this->load->view('template_vendor/header');
		$this->load->view('template_vendor/navbar');
		$this->load->view('vendor/gantipassword');
		$this->load->view('template_vendor/footer');
		$this->load->view('vendor/ajax');
	}

	public function logakses()
	{
		$id_pegawai = $this->session->userdata('id_pegawai');
		$data['log_akses'] = $this->Auth_model->get_ip($id_pegawai);
		$this->load->view('template_vendor/header');
		$this->load->view('template_vendor/navbar');
		$this->load->view('vendor/logakses', $data);
		$this->load->view('template_vendor/footer');
		$this->load->view('vendor/ajax');
	}

	public function verifikasi_dokumen($id_vendor)
	{
		$data = [
			'nama_persyaratan_dokumen' => $this->input->post('nama_persyaratan_dokumen1'),
			'status_kelengkapan_verifikasi' => $this->input->post('status_kelengkapan_verifikasi1'),
			'id_vendor' => $id_vendor
		];
		$this->Vendor_model->simpan_verifikasi($data);

		$data2 = [
			'nama_persyaratan_dokumen' => $this->input->post('nama_persyaratan_dokumen2'),
			'status_kelengkapan_verifikasi' => $this->input->post('status_kelengkapan_verifikasi2'),
			'id_vendor' => $id_vendor
		];
		$this->Vendor_model->simpan_verifikasi($data2);

		$data3 = [
			'nama_persyaratan_dokumen' => $this->input->post('nama_persyaratan_dokumen3'),
			'status_kelengkapan_verifikasi' => $this->input->post('status_kelengkapan_verifikasi3'),
			'id_vendor' => $id_vendor
		];
		$this->Vendor_model->simpan_verifikasi($data3);

		$data4 = [
			'nama_persyaratan_dokumen' => $this->input->post('nama_persyaratan_dokumen4'),
			'status_kelengkapan_verifikasi' => $this->input->post('status_kelengkapan_verifikasi4'),
			'id_vendor' => $id_vendor
		];
		$this->Vendor_model->simpan_verifikasi($data4);

		$data5 = [
			'nama_persyaratan_dokumen' => $this->input->post('nama_persyaratan_dokumen5'),
			'status_kelengkapan_verifikasi' => $this->input->post('status_kelengkapan_verifikasi5'),
			'id_vendor' => $id_vendor
		];
		$this->Vendor_model->simpan_verifikasi($data5);

		$data6 = [
			'nama_persyaratan_dokumen' => $this->input->post('nama_persyaratan_dokumen6'),
			'status_kelengkapan_verifikasi' => $this->input->post('status_kelengkapan_verifikasi6'),
			'id_vendor' => $id_vendor
		];
		$this->Vendor_model->simpan_verifikasi($data6);

		$data7 = [
			'nama_persyaratan_dokumen' => $this->input->post('nama_persyaratan_dokumen7'),
			'status_kelengkapan_verifikasi' => $this->input->post('status_kelengkapan_verifikasi7'),
			'id_vendor' => $id_vendor
		];
		$this->Vendor_model->simpan_verifikasi($data7);

		$data8 = [
			'nama_persyaratan_dokumen' => $this->input->post('nama_persyaratan_dokumen8'),
			'status_kelengkapan_verifikasi' => $this->input->post('status_kelengkapan_verifikasi8'),
			'id_vendor' => $id_vendor
		];
		$this->Vendor_model->simpan_verifikasi($data8);

		$data9 = [
			'nama_persyaratan_dokumen' => $this->input->post('nama_persyaratan_dokumen9'),
			'status_kelengkapan_verifikasi' => $this->input->post('status_kelengkapan_verifikasi9'),
			'id_vendor' => $id_vendor
		];
		$this->Vendor_model->simpan_verifikasi($data9);

		$data10 = [
			'nama_persyaratan_dokumen' => $this->input->post('nama_persyaratan_dokumen10'),
			'status_kelengkapan_verifikasi' => $this->input->post('status_kelengkapan_verifikasi10'),
			'id_vendor' => $id_vendor
		];
		$this->Vendor_model->simpan_verifikasi($data10);

		$data11 = [
			'nama_persyaratan_dokumen' => $this->input->post('nama_persyaratan_dokumen11'),
			'status_kelengkapan_verifikasi' => $this->input->post('status_kelengkapan_verifikasi11'),
			'id_vendor' => $id_vendor
		];
		$this->Vendor_model->simpan_verifikasi($data11);

		$data12 = [
			'nama_persyaratan_dokumen' => $this->input->post('nama_persyaratan_dokumen12'),
			'status_kelengkapan_verifikasi' => $this->input->post('status_kelengkapan_verifikasi12'),
			'id_vendor' => $id_vendor
		];
		$this->Vendor_model->simpan_verifikasi($data12);

		$data13 = [
			'nama_persyaratan_dokumen' => $this->input->post('nama_persyaratan_dokumen13'),
			'status_kelengkapan_verifikasi' => $this->input->post('status_kelengkapan_verifikasi13'),
			'id_vendor' => $id_vendor
		];
		$this->Vendor_model->simpan_verifikasi($data13);

		$data14 = [
			'nama_persyaratan_dokumen' => $this->input->post('nama_persyaratan_dokumen14'),
			'status_kelengkapan_verifikasi' => $this->input->post('status_kelengkapan_verifikasi14'),
			'id_vendor' => $id_vendor
		];
		$this->Vendor_model->simpan_verifikasi($data14);

		$data15 = [
			'nama_persyaratan_dokumen' => $this->input->post('nama_persyaratan_dokumen15'),
			'status_kelengkapan_verifikasi' => $this->input->post('status_kelengkapan_verifikasi15'),
			'id_vendor' => $id_vendor
		];
		$this->Vendor_model->simpan_verifikasi($data15);

		$data16 = [
			'nama_persyaratan_dokumen' => $this->input->post('nama_persyaratan_dokumen16'),
			'status_kelengkapan_verifikasi' => $this->input->post('status_kelengkapan_verifikasi16'),
			'id_vendor' => $id_vendor
		];
		$this->Vendor_model->simpan_verifikasi($data16);

		$data17 = [
			'nama_persyaratan_dokumen' => $this->input->post('nama_persyaratan_dokumen17'),
			'status_kelengkapan_verifikasi' => $this->input->post('status_kelengkapan_verifikasi17'),
			'id_vendor' => $id_vendor
		];
		$this->Vendor_model->simpan_verifikasi($data17);

		$data18 = [
			'nama_persyaratan_dokumen' => $this->input->post('nama_persyaratan_dokumen18'),
			'status_kelengkapan_verifikasi' => $this->input->post('status_kelengkapan_verifikasi18'),
			'id_vendor' => $id_vendor
		];
		$this->Vendor_model->simpan_verifikasi($data18);

		$data19 = [
			'nama_persyaratan_dokumen' => $this->input->post('nama_persyaratan_dokumen19'),
			'status_kelengkapan_verifikasi' => $this->input->post('status_kelengkapan_verifikasi19'),
			'id_vendor' => $id_vendor
		];
		$this->Vendor_model->simpan_verifikasi($data19);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhasil Di Edit!</div>');
		redirect('vendor/detail/' . $id_vendor);
	}

	public function update_verifikasi_dokumen($id_vendor)
	{
		$data = [
			'status_kelengkapan_verifikasi' => $this->input->post('status_kelengkapan_verifikasi1'),
			'id_vendor' => $id_vendor
		];
		$this->Vendor_model->update_verifikasi($data, $this->input->post('id_vendor_verifikasi_dokumen1'));

		$data2 = [
			'status_kelengkapan_verifikasi' => $this->input->post('status_kelengkapan_verifikasi2'),
			'id_vendor' => $id_vendor
		];
		$this->Vendor_model->update_verifikasi($data2, $this->input->post('id_vendor_verifikasi_dokumen2'));

		$data3 = [
			'status_kelengkapan_verifikasi' => $this->input->post('status_kelengkapan_verifikasi3'),
			'id_vendor' => $id_vendor
		];
		$this->Vendor_model->update_verifikasi($data3, $this->input->post('id_vendor_verifikasi_dokumen3'));

		$data4 = [
			'status_kelengkapan_verifikasi' => $this->input->post('status_kelengkapan_verifikasi4'),
			'id_vendor' => $id_vendor
		];
		$this->Vendor_model->update_verifikasi($data4, $this->input->post('id_vendor_verifikasi_dokumen4'));

		$data5 = [
			'status_kelengkapan_verifikasi' => $this->input->post('status_kelengkapan_verifikasi5'),
			'id_vendor' => $id_vendor
		];
		$this->Vendor_model->update_verifikasi($data5, $this->input->post('id_vendor_verifikasi_dokumen5'));

		$data6 = [
			'status_kelengkapan_verifikasi' => $this->input->post('status_kelengkapan_verifikasi6'),
			'id_vendor' => $id_vendor
		];
		$this->Vendor_model->update_verifikasi($data6, $this->input->post('id_vendor_verifikasi_dokumen6'));

		$data7 = [
			'status_kelengkapan_verifikasi' => $this->input->post('status_kelengkapan_verifikasi7'),
			'id_vendor' => $id_vendor
		];
		$this->Vendor_model->update_verifikasi($data7, $this->input->post('id_vendor_verifikasi_dokumen7'));

		$data8 = [
			'status_kelengkapan_verifikasi' => $this->input->post('status_kelengkapan_verifikasi8'),
			'id_vendor' => $id_vendor
		];
		$this->Vendor_model->update_verifikasi($data8, $this->input->post('id_vendor_verifikasi_dokumen8'));

		$data9 = [
			'status_kelengkapan_verifikasi' => $this->input->post('status_kelengkapan_verifikasi9'),
			'id_vendor' => $id_vendor
		];
		$this->Vendor_model->update_verifikasi($data9, $this->input->post('id_vendor_verifikasi_dokumen9'));

		$data10 = [
			'status_kelengkapan_verifikasi' => $this->input->post('status_kelengkapan_verifikasi10'),
			'id_vendor' => $id_vendor
		];
		$this->Vendor_model->update_verifikasi($data10, $this->input->post('id_vendor_verifikasi_dokumen10'));

		$data11 = [
			'status_kelengkapan_verifikasi' => $this->input->post('status_kelengkapan_verifikasi11'),
			'id_vendor' => $id_vendor
		];
		$this->Vendor_model->update_verifikasi($data11, $this->input->post('id_vendor_verifikasi_dokumen11'));

		$data12 = [
			'status_kelengkapan_verifikasi' => $this->input->post('status_kelengkapan_verifikasi12'),
			'id_vendor' => $id_vendor
		];
		$this->Vendor_model->update_verifikasi($data12, $this->input->post('id_vendor_verifikasi_dokumen12'));

		$data13 = [
			'status_kelengkapan_verifikasi' => $this->input->post('status_kelengkapan_verifikasi13'),
			'id_vendor' => $id_vendor
		];
		$this->Vendor_model->update_verifikasi($data13, $this->input->post('id_vendor_verifikasi_dokumen13'));

		$data14 = [
			'status_kelengkapan_verifikasi' => $this->input->post('status_kelengkapan_verifikasi14'),
			'id_vendor' => $id_vendor
		];
		$this->Vendor_model->update_verifikasi($data14, $this->input->post('id_vendor_verifikasi_dokumen14'));

		$data15 = [
			'status_kelengkapan_verifikasi' => $this->input->post('status_kelengkapan_verifikasi15'),
			'id_vendor' => $id_vendor
		];
		$this->Vendor_model->update_verifikasi($data15, $this->input->post('id_vendor_verifikasi_dokumen15'));

		$data16 = [
			'status_kelengkapan_verifikasi' => $this->input->post('status_kelengkapan_verifikasi16'),
			'id_vendor' => $id_vendor
		];
		$this->Vendor_model->update_verifikasi($data16, $this->input->post('id_vendor_verifikasi_dokumen16'));

		$data17 = [
			'status_kelengkapan_verifikasi' => $this->input->post('status_kelengkapan_verifikasi17'),
			'id_vendor' => $id_vendor
		];
		$this->Vendor_model->update_verifikasi($data17, $this->input->post('id_vendor_verifikasi_dokumen17'));

		$data18 = [
			'status_kelengkapan_verifikasi' => $this->input->post('status_kelengkapan_verifikasi18'),
			'id_vendor' => $id_vendor
		];
		$this->Vendor_model->update_verifikasi($data18, $this->input->post('id_vendor_verifikasi_dokumen18'));

		$data19 = [
			'status_kelengkapan_verifikasi' => $this->input->post('status_kelengkapan_verifikasi19'),
			'id_vendor' => $id_vendor
		];
		$this->Vendor_model->update_verifikasi($data19, $this->input->post('id_vendor_verifikasi_dokumen19'));



		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhasil Di Edit!</div>');
		redirect('vendor/detail/' . $id_vendor);
	}

	public function data_get_ijin_usaha($id_vendor)
	{

		$resultss = $this->Vendor_model->getdatatable_izin_usaha($id_vendor);
		$no = $_POST['start'];
		// $total = 0;
		$data = [];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] = $angga->nama_izin_usaha;
			$row[] = $angga->no_izin_usaha;
			$row[] = $angga->masa_berlaku_izin_usaha;
			$row[] = $angga->intansi_pemberi;
			$row[] = $angga->kualifikasi_izin_usaha;
			$row[] = '<a href="https://vms.jmtm.co.id/file_dokumen_izin_usaha/' . $angga->dokumen_izin_usaha . '">' . '<img width="40px" src=' . base_url('assets/img/pdf.png') . ' >' . '</a>';
			if ($angga->status_sesuai == 0 || $angga->status_sesuai == NULL) {
				$row[] = '<a href="javascript:;" class="btn btn-success btn-sm btn-block" onClick="byid_id_izin_usaha(' . "'" . $angga->id_izin_usaha . "','edit_id_izin_usaha'" . ')"><i class="fas fa-check"></i> Sesuai</a> <a href="javascript:;" class="btn btn-danger btn-block  btn-sm" onClick="byid_id_izin_usaha(' . "'" . $angga->id_izin_usaha . "','hapus_id_izin_usaha'" . ')">  <i class="fas fa-times"></i> Tidak Sesuai</a>';
			} else if ($angga->status_sesuai == 1) {
				$row[] = '<button disabled href="javascript:;" class="btn btn-success btn-sm btn-block" onClick="byid_id_izin_usaha(' . "'" . $angga->id_izin_usaha . "','edit_id_izin_usaha'" . ')"><i class="fas fa-check"></i> Sesuai</button> <a href="javascript:;" class="btn btn-danger btn-block  btn-sm" onClick="byid_id_izin_usaha(' . "'" . $angga->id_izin_usaha . "','hapus_id_izin_usaha'" . ')">  <i class="fas fa-times"></i> Tidak Sesuai</a>';
			}

			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Vendor_model->count_all_data_izin_usaha(),
			"recordsFiltered" => $this->Vendor_model->count_filtered_izin_usaha($id_vendor),
			"data" => $data,
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}


	//data Ijin Usaha

	//approve izin usaha
	public function approve_izin_usaha()
	{
		$data = [
			'status_sesuai' => 1,
			'alasan' => $this->input->post('alasan')
		];
		$this->Vendor_model->update_id_izin_usaha(array('id_izin_usaha' => $this->input->post('id_izin_usaha')), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function approve_izin_usaha2()
	{
		$data = [
			'status_sesuai' => 0,
			'alasan' => $this->input->post('alasan')
		];
		$this->Vendor_model->update_id_izin_usaha(array('id_izin_usaha' => $this->input->post('id_izin_usaha')), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function get_byid_id_izin_usaha($id_izin_usaha)
	{

		$get_id_izin_usaha = $this->Vendor_model->get_izin_usaha_Byid($id_izin_usaha);
		$output = [
			"izin_usaha" => $get_id_izin_usaha,
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	// EDIT MENGATUR id_izin_usaha
	public function edit_id_izin_usaha()
	{
		$config['upload_path'] = './file_dokumen_izin_usaha/';
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = 0;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('dokumen_izin_usaha')) {

			$fileData = $this->upload->data();

			$upload = [
				'no_izin_usaha' => $this->input->post('no_izin_usaha'),
				'masa_berlaku_izin_usaha' => $this->input->post('masa_berlaku_izin_usaha'),
				'intansi_pemberi' => $this->input->post('intansi_pemberi'),
				'kualifikasi_izin_usaha' => $this->input->post('kualifikasi_izin_usaha'),
				'dokumen_izin_usaha' => $fileData['file_name'],
			];
			$this->Vendor_model->update_id_izin_usaha(array('id_izin_usaha' => $this->input->post('id_izin_usaha')), $upload);
			$this->output->set_content_type('application/json')->set_output(json_encode($upload));
		} else {
			$this->session->set_flashdata('error', $this->upload->display_errors());
			redirect(base_url('upload'));
		}
	}

	public function delete_izin_usaha($id_id_izin_usaha)
	{
		$data = $this->Vendor_model->deletedata_id_izin_usaha($id_id_izin_usaha);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	// BATAS=============

	public function data_get_akta($id_vendor)
	{

		$resultss = $this->Vendor_model->getdatatable_akta($id_vendor);
		$no = $_POST['start'];
		// $total = 0;
		$data = [];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] = $angga->no_akta_pendirian;
			$row[] = $angga->tanggal_surat_akta_pendirian;
			$row[] = $angga->notaris_akta_pendirian;
			$row[] = '<a href="https://vms.jmtm.co.id/file_dokumen_akta/' . $angga->file_dokumen_akta_pendirian . '">' . '<img width="40px" src=' . base_url('assets/img/pdf.png') . ' >' . '</a>';
			if ($angga->status_sesuai == 0 || $angga->status_sesuai == NULL) {
				$row[] = '<a href="javascript:;" class="btn btn-block btn-success btn-sm" onClick="byid_akta(' . "'" . $angga->id_akta_pendirian . "','edit_akta'" . ')"><i class="fas fa-check"></i> Sesuai</a> <a href="javascript:;" class="btn btn-danger btn-block btn-sm" onClick="byid_akta(' . "'" . $angga->id_akta_pendirian . "','hapus_akta'" . ')">  <i class="fas fa-times"></i> Tidak Sesuai</a>';
			} else if ($angga->status_sesuai == 1) {
				$row[] = '<button disabled href="javascript:;" class="btn btn-block btn-success btn-sm" onClick="byid_akta(' . "'" . $angga->id_akta_pendirian . "','edit_akta'" . ')"><i class="fas fa-check"></i> Sesuai</button> <a href="javascript:;" class="btn btn-danger btn-block btn-sm" onClick="byid_akta(' . "'" . $angga->id_akta_pendirian . "','hapus_akta'" . ')">  <i class="fas fa-times"></i> Tidak Sesuai</a>';
			}
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Vendor_model->count_all_data_akta(),
			"recordsFiltered" => $this->Vendor_model->count_filtered_akta($id_vendor),
			"data" => $data,
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	//approve akta
	public function approve_akta()
	{
		$data = [
			'status_sesuai' => 1,
			'alasan' => $this->input->post('alasan')
		];
		$this->Vendor_model->update_akta(array('id_akta_pendirian' => $this->input->post('id_akta_pendirian')), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function approve_akta2()
	{
		$data = [
			'status_sesuai' => 0,
			'alasan' => $this->input->post('alasan')
		];
		$this->Vendor_model->update_akta(array('id_akta_pendirian' => $this->input->post('id_akta_pendirian')), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	//data Akta
	// public function add_akta()
	// {

	// 	$config['upload_path'] = './file_dokumen_akta/';
	// 	$config['allowed_types'] = 'pdf';
	// 	$config['max_size'] = 0;

	// 	$this->load->library('upload', $config);

	// 	if ($this->upload->do_upload('file_dokumen_akta_pendirian')) {

	// 		$fileData = $this->upload->data();

	// 		$upload = [
	// 			'id_vendor' => $id_vendor,
	// 			'no_akta_pendirian' => $this->input->post('no_akta_pendirian'),
	// 			'tanggal_surat_akta_pendirian' => $this->input->post('tanggal_surat_akta_pendirian'),
	// 			'notaris_akta_pendirian' => $this->input->post('notaris_akta_pendirian'),
	// 			'file_dokumen_akta_pendirian' => $fileData['file_name'],
	// 		];
	// 		$this->Vendor_model->create_akta($upload);
	// 		$this->output->set_content_type('application/json')->set_output(json_encode($upload));
	// 	} else {
	// 		$this->session->set_flashdata('error', $this->upload->display_errors());
	// 		redirect(base_url('upload'));
	// 	}
	// }

	public function get_byid_akta($id_akta_pendirian)
	{

		$akta = $this->Vendor_model->get_byid_akta($id_akta_pendirian);
		$output = [
			"akta" => $akta,
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}



	// EDIT MENGATUR Akta
	public function edit_akta()
	{
		$config['upload_path'] = './file_dokumen_akta/';
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = 0;

		$this->load->library('upload', $config);
		if ($this->upload->do_upload('file_dokumen_akta_pendirian')) {

			$fileData = $this->upload->data();
			$upload = [
				'no_akta_pendirian' => $this->input->post('no_akta_pendirian'),
				'tanggal_surat_akta_pendirian' => $this->input->post('tanggal_surat_akta_pendirian'),
				'notaris_akta_pendirian' => $this->input->post('notaris_akta_pendirian'),
				'file_dokumen_akta_pendirian' => $fileData['file_name'],
			];
			$this->Vendor_model->update_akta(array('id_akta_pendirian' => $this->input->post('id_akta_pendirian')), $upload);
			$this->output->set_content_type('application/json')->set_output(json_encode($upload));
		} else {
			$this->session->set_flashdata('error', $this->upload->display_errors());
			redirect(base_url('upload'));
		}
	}

	public function delete_akta($id_akta_pendirian)
	{
		$data = $this->Vendor_model->deletedata_akta($id_akta_pendirian);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	// BATASSSS
	public function data_get_pemilik($id_vendor)
	{

		$resultss = $this->Vendor_model->getdatatable_pemilik($id_vendor);
		$no = $_POST['start'];
		// $total = 0;
		$data = [];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] = $angga->nama_pemilik;
			$row[] = $angga->no_ktp_pemilik;
			$row[] = $angga->alamat_pemilik;
			$row[] = $angga->saham_pemilik;
			$row[] = '<a href="https://vms.jmtm.co.id/file_bukti_pemilik/' . $angga->file_bukti_pemilik . '">' . '<img width="40px" src=' . base_url('assets/img/pdf.png') . ' >' . '</a>';
			if ($angga->status_sesuai == 0 || $angga->status_sesuai == NULL) {
				$row[] = '<a href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byid_pemilik(' . "'" . $angga->id_pemilik . "','edit_pemilik'" . ')"><i class="fas fa-check"></i> Sesuai</a> <a href="javascript:;" class="btn btn-danger btn-sm btn-block" onClick="byid_pemilik(' . "'" . $angga->id_pemilik . "','hapus_pemilik'" . ')">  <i class="fas fa-times"></i> Tidak Sesuai</a>';
			} else if ($angga->status_sesuai == 1) {
				$row[] = '<button disabled href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byid_pemilik(' . "'" . $angga->id_pemilik . "','edit_pemilik'" . ')"><i class="fas fa-check"></i> Sesuai</button> <a href="javascript:;" class="btn btn-danger btn-sm btn-block" onClick="byid_pemilik(' . "'" . $angga->id_pemilik . "','hapus_pemilik'" . ')">  <i class="fas fa-times"></i> Tidak Sesuai</a>';
			}

			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Vendor_model->count_all_data_pemilik(),
			"recordsFiltered" => $this->Vendor_model->count_filtered_pemilik($id_vendor),
			"data" => $data,
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function get_byid_pemilik($id_pemilik)
	{

		$pemilik = $this->Vendor_model->get_byid_pemilik($id_pemilik);
		$output = [
			"pemilik" => $pemilik,
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	//approve akta
	public function approve_pemilik()
	{
		$data = [
			'status_sesuai' => 1,
			'alasan' => $this->input->post('alasan')
		];
		$this->Vendor_model->update_pemilik(array('id_pemilik' => $this->input->post('id_pemilik')), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function approve_pemilik2()
	{
		$data = [
			'status_sesuai' => 0,
			'alasan' => $this->input->post('alasan')
		];
		$this->Vendor_model->update_pemilik(array('id_pemilik' => $this->input->post('id_pemilik')), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	// EDIT MENGATUR pemilik
	public function edit_pemilik()
	{
		$upload = [
			'nama_pemilik' => $this->input->post('nama_pemilik'),
			'no_ktp_pemilik' => $this->input->post('no_ktp_pemilik'),
			'alamat_pemilik' => $this->input->post('alamat_pemilik'),
			'saham_pemilik' => $this->input->post('saham_pemilik'),
		];
		$this->Vendor_model->update_pemilik(array('id_pemilik' => $this->input->post('id_pemilik')), $upload);
		$this->output->set_content_type('application/json')->set_output(json_encode($upload));
	}

	public function delete_pemilik($id_pemilik)
	{
		$data = $this->Vendor_model->deletedata_pemilik($id_pemilik);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	// BATASSSS
	public function data_get_pengurus($id_vendor)
	{

		$resultss = $this->Vendor_model->getdatatable_pengurus($id_vendor);
		$no = $_POST['start'];
		// $total = 0;
		$data = [];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] = $angga->nama_pengurus;
			$row[] = $angga->no_ktp_pengurus;
			$row[] = $angga->alamat_pengurus;
			$row[] = $angga->jabatan_pengurus;
			$row[] = $angga->mulai_pengurus;
			$row[] = $angga->selesai_pengurus;
			$row[] = '<a href="https://vms.jmtm.co.id/file_bukti_pengurus/' . $angga->file_bukti_pengurus . '">' . '<img width="40px" src=' . base_url('assets/img/pdf.png') . ' >' . '</a>';
			if ($angga->status_sesuai == 0 || $angga->status_sesuai == NULL) {
				$row[] = '<a href="javascript:;" class="btn btn-block btn-success btn-sm" onClick="byid_pengurus(' . "'" . $angga->id_pengurus . "','edit_pengurus'" . ')"><i class="fas fa-check"></i> Sesuai</a> <a href="javascript:;" class="btn btn-danger btn-sm" onClick="byid_pengurus(' . "'" . $angga->id_pengurus . "','hapus_pengurus'" . ')">  <i class="fas fa-times"></i> Tidak Sesuai</a>';
			} else if ($angga->status_sesuai == 1) {
				$row[] = '<button disabled href="javascript:;" class="btn btn-block btn-success btn-sm" onClick="byid_pengurus(' . "'" . $angga->id_pengurus . "','edit_pengurus'" . ')"><i class="fas fa-check"></i> Sesuai</button> <a href="javascript:;" class="btn btn-danger btn-sm" onClick="byid_pengurus(' . "'" . $angga->id_pengurus . "','hapus_pengurus'" . ')">  <i class="fas fa-times"></i> Tidak Sesuai</a>';
			}
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Vendor_model->count_all_data_pengurus(),
			"recordsFiltered" => $this->Vendor_model->count_filtered_pengurus($id_vendor),
			"data" => $data,
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function approve_pengurus()
	{
		$data = [
			'status_sesuai' => 1,
			'alasan' => $this->input->post('alasan')
		];
		$this->Vendor_model->update_pengurus(array('id_pengurus' => $this->input->post('id_pengurus')), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function approve_pengurus2()
	{
		$data = [
			'status_sesuai' => 0,
			'alasan' => $this->input->post('alasan')
		];
		$this->Vendor_model->update_pengurus(array('id_pengurus' => $this->input->post('id_pengurus')), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function get_byid_pengurus($id_pengurus)
	{

		$pengurus = $this->Vendor_model->get_byid_pengurus($id_pengurus);
		$output = [
			"pengurus" => $pengurus,
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	// EDIT MENGATUR Pengurus
	public function edit_pengurus()
	{
		$upload = [
			'nama_pengurus' => $this->input->post('nama_pengurus'),
			'no_ktp_pengurus' => $this->input->post('no_ktp_pengurus'),
			'alamat_pengurus' => $this->input->post('alamat_pengurus'),
			'jabatan_pengurus' => $this->input->post('jabatan_pengurus'),
			'mulai_pengurus' => $this->input->post('mulai_pengurus'),
			'selesai_pengurus' => $this->input->post('selesai_pengurus'),
		];
		$this->Vendor_model->update_pengurus(array('id_pengurus' => $this->input->post('id_pengurus')), $upload);
		$this->output->set_content_type('application/json')->set_output(json_encode($upload));
	}

	public function delete_pengurus($id_pengurus)
	{
		$data = $this->Vendor_model->deletedata_pengurus($id_pengurus);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	// BATASSSS
	public function data_get_tenaga_ahli($id_vendor)
	{

		$resultss = $this->Vendor_model->getdatatable_tenaga_ahli($id_vendor);
		$no = $_POST['start'];
		// $total = 0;
		$data = [];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] = $angga->nama_tenaga_ahli;
			$row[] = $angga->tanggal_lahir_tenaga_ahli;
			$row[] = $angga->alamat_tenaga_ahli;
			$row[] = $angga->pendidikan_trakhir_tenaga_ahli;
			$row[] = $angga->profesi_tenaga_ahli;
			$row[] = $angga->jabatan_tenaga_ahli;
			$row[] = $angga->pengalaman_tenaga_ahli;
			$row[] = '<a href="https://vms.jmtm.co.id/file_bukti_tenaga_ahli/' . $angga->file_bukti_tenaga_ahli . '">' . '<img width="40px" src=' . base_url('assets/img/pdf.png') . ' >' . '</a>';
			if ($angga->status_sesuai == 0 || $angga->status_sesuai == NULL) {
				$row[] = '<a href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byid_tenaga_ahli(' . "'" . $angga->id_tenaga_ahli . "','edit_tenaga_ahli'" . ')"><i class="fas fa-check"></i> Sesuai</a> <a href="javascript:;" class="btn btn-danger btn-block btn-sm" onClick="byid_tenaga_ahli(' . "'" . $angga->id_tenaga_ahli . "','hapus_tenaga_ahli'" . ')">  <i class="fas fa-times"></i> Tidak Sesuai</a>';
			} else if ($angga->status_sesuai == 1) {
				$row[] = '<button disabled href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byid_tenaga_ahli(' . "'" . $angga->id_tenaga_ahli . "','edit_tenaga_ahli'" . ')"><i class="fas fa-check"></i> Sesuai</button> <a href="javascript:;" class="btn btn-danger btn-block btn-sm" onClick="byid_tenaga_ahli(' . "'" . $angga->id_tenaga_ahli . "','hapus_tenaga_ahli'" . ')">  <i class="fas fa-times"></i> Tidak Sesuai</a>';
			}

			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Vendor_model->count_all_data_tenaga_ahli(),
			"recordsFiltered" => $this->Vendor_model->count_filtered_tenaga_ahli($id_vendor),
			"data" => $data,
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	//data tenaga_ahli
	public function add_tenaga_ahli()
	{
		$nama_tenaga_ahli = $this->input->post('nama_tenaga_ahli', TRUE);
		$tanggal_lahir_tenaga_ahli = $this->input->post('tanggal_lahir_tenaga_ahli', TRUE);
		$alamat_tenaga_ahli = $this->input->post('alamat_tenaga_ahli', TRUE);
		$pendidikan_trakhir_tenaga_ahli = $this->input->post('pendidikan_trakhir_tenaga_ahli', TRUE);
		$email_tenaga_ahli = $this->input->post('email_tenaga_ahli', TRUE);
		$profesi_tenaga_ahli = $this->input->post('profesi_tenaga_ahli', TRUE);
		$jenis_kelamin_tenaga_ahli = $this->input->post('jenis_kelamin_tenaga_ahli', TRUE);
		$kewarganegaraan_tenaga_ahli = $this->input->post('kewarganegaraan_tenaga_ahli', TRUE);
		$pengalaman_tenaga_ahli = $this->input->post('pengalaman_tenaga_ahli', TRUE);
		$status_kepegawaian_tenaga_ahli = $this->input->post('status_kepegawaian_tenaga_ahli', TRUE);
		$jabatan_tenaga_ahli = $this->input->post('jabatan_tenaga_ahli', TRUE);

		// cv
		$tahun_cv = $this->input->post('tahun_cv', TRUE);
		$uraian_cv = $this->input->post('uraian_cv', TRUE);

		// pendidikan
		$tahun_pendidikan = $this->input->post('tahun_pendidikan', TRUE);
		$uraian_pendidikan = $this->input->post('uraian_pendidikan', TRUE);

		// setrtifikat
		$tahun_sertifikat = $this->input->post('tahun_sertifikat', TRUE);
		$uraian_sertifikat = $this->input->post('uraian_sertifikat', TRUE);

		// bahasa
		$uraian_bahasa = $this->input->post('uraian_bahasa', TRUE);

		$data  = array(
			'nama_tenaga_ahli' => $nama_tenaga_ahli,
			'tanggal_lahir_tenaga_ahli' => $tanggal_lahir_tenaga_ahli,
			'email_tenaga_ahli' => $email_tenaga_ahli,
			'alamat_tenaga_ahli' => $alamat_tenaga_ahli,
			'pendidikan_trakhir_tenaga_ahli' => $pendidikan_trakhir_tenaga_ahli,
			'profesi_tenaga_ahli' => $profesi_tenaga_ahli,
			'jabatan_tenaga_ahli' => $jabatan_tenaga_ahli,
			'jenis_kelamin_tenaga_ahli' => $jenis_kelamin_tenaga_ahli,
			'kewarganegaraan_tenaga_ahli' => $kewarganegaraan_tenaga_ahli,
			'pengalaman_tenaga_ahli' => $pengalaman_tenaga_ahli,
			'status_kepegawaian_tenaga_ahli' => $status_kepegawaian_tenaga_ahli,
			'id_vendor' => $this->session->userdata('id_vendor'),
		);
		$this->db->insert('tbl_vendor_tenaga_ahli', $data);
		$package_id = $this->db->insert_id();

		// ini untuk cv
		$result = array();
		foreach ($uraian_cv as $key => $val) {
			$result[] = array(
				'id_tenaga_ahli'   => $package_id,
				'tahun_cv'   => $tahun_cv[$key],
				'uraian_cv'   =>  $uraian_cv[$key],
			);
		}
		$this->db->insert_batch('tbl_vendor_cv', $result);

		// untuk Pendidikan

		$result = array();
		foreach ($uraian_pendidikan as $key => $val) {
			$result[] = array(
				'id_tenaga_ahli'   => $package_id,
				'tahun_pendidikan'   => $tahun_pendidikan[$key],
				'uraian_pendidikan'   =>  $uraian_pendidikan[$key],
			);
		}
		$this->db->insert_batch('tbl_vendor_pendidikan', $result);
		// sertifikat
		$result = array();
		foreach ($uraian_sertifikat as $key => $val) {
			$result[] = array(
				'id_tenaga_ahli'   => $package_id,
				'tahun_sertifikat'   => $tahun_sertifikat[$key],
				'uraian_sertifikat'   =>  $uraian_sertifikat[$key],
			);
		}
		$this->db->insert_batch('tbl_vendor_sertifikat', $result);

		// Bahasa
		$result = array();
		foreach ($uraian_bahasa as $key => $val) {
			$result[] = array(
				'id_tenaga_ahli'   => $package_id,
				'uraian_bahasa'   => $uraian_bahasa[$key],
			);
		}
		$this->db->insert_batch('tbl_vendor_bahasa', $result);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}

	public function approve_tenaga_ahli()
	{
		$data = [
			'status_sesuai' => 1,
			'alasan' => $this->input->post('alasan')
		];
		$this->Vendor_model->update_tenaga_ahli(array('id_tenaga_ahli' => $this->input->post('id_tenaga_ahli')), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function approve_tenaga_ahli2()
	{
		$data = [
			'status_sesuai' => 0,
			'alasan' => $this->input->post('alasan')
		];
		$this->Vendor_model->update_tenaga_ahli(array('id_tenaga_ahli' => $this->input->post('id_tenaga_ahli')), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function edit_tenaga_ahli($id_tenaga_ahli)
	{
		$data['tenaga_ahli'] = $this->Vendor_model->get_byid_tenaga_ahli($id_tenaga_ahli);
		$data['cv'] = $this->Vendor_model->get_byid_vendor_cv($id_tenaga_ahli);
		$data['pendidikan'] = $this->Vendor_model->get_byid_vendor_pendidikan($id_tenaga_ahli);
		$data['sertifikat'] = $this->Vendor_model->get_byid_vendor_sertifikat($id_tenaga_ahli);
		$data['bahasa'] = $this->Vendor_model->get_byid_vendor_bahasa($id_tenaga_ahli);
		$this->load->view('template/header');
		$this->load->view('datapenyedia/css_custom');
		$this->load->view('template/navlogin');
		$this->load->view('datapenyedia/edit_tenaga_ahli', $data);
		$this->load->view('template/footer');
		$this->load->view('datapenyedia/ajax');
	}

	public function update_tenaga_ahli()
	{

		$nama_tenaga_ahli = $this->input->post('nama_tenaga_ahli', TRUE);
		$tanggal_lahir_tenaga_ahli = $this->input->post('tanggal_lahir_tenaga_ahli', TRUE);
		$alamat_tenaga_ahli = $this->input->post('alamat_tenaga_ahli', TRUE);
		$pendidikan_trakhir_tenaga_ahli = $this->input->post('pendidikan_trakhir_tenaga_ahli', TRUE);
		$email_tenaga_ahli = $this->input->post('email_tenaga_ahli', TRUE);
		$profesi_tenaga_ahli = $this->input->post('profesi_tenaga_ahli', TRUE);
		$jenis_kelamin_tenaga_ahli = $this->input->post('jenis_kelamin_tenaga_ahli', TRUE);
		$kewarganegaraan_tenaga_ahli = $this->input->post('kewarganegaraan_tenaga_ahli', TRUE);
		$pengalaman_tenaga_ahli = $this->input->post('pengalaman_tenaga_ahli', TRUE);
		$status_kepegawaian_tenaga_ahli = $this->input->post('status_kepegawaian_tenaga_ahli', TRUE);
		$jabatan_tenaga_ahli = $this->input->post('jabatan_tenaga_ahli', TRUE);

		$upload  = array(
			'nama_tenaga_ahli' => $nama_tenaga_ahli,
			'tanggal_lahir_tenaga_ahli' => $tanggal_lahir_tenaga_ahli,
			'email_tenaga_ahli' => $email_tenaga_ahli,
			'alamat_tenaga_ahli' => $alamat_tenaga_ahli,
			'pendidikan_trakhir_tenaga_ahli' => $pendidikan_trakhir_tenaga_ahli,
			'profesi_tenaga_ahli' => $profesi_tenaga_ahli,
			'jabatan_tenaga_ahli' => $jabatan_tenaga_ahli,
			'jenis_kelamin_tenaga_ahli' => $jenis_kelamin_tenaga_ahli,
			'kewarganegaraan_tenaga_ahli' => $kewarganegaraan_tenaga_ahli,
			'pengalaman_tenaga_ahli' => $pengalaman_tenaga_ahli,
			'status_kepegawaian_tenaga_ahli' => $status_kepegawaian_tenaga_ahli,
			'id_vendor' => $this->session->userdata('id_vendor'),
		);
		$this->Vendor_model->update_tenaga_ahli(array('id_tenaga_ahli' => $this->input->post('id_tenaga_ahli')), $upload);
		$this->output->set_content_type('application/json')->set_output(json_encode($upload));
	}

	public function get_byid_tenaga_ahli($id_tenaga_ahli)
	{

		$tenaga_ahli = $this->Vendor_model->get_byid_tenaga_ahli($id_tenaga_ahli);
		$output = [
			"tenaga_ahli" => $tenaga_ahli,
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	// EDIT MENGATUR tenaga_ahli

	public function delete_tenaga_ahli($id_tenaga_ahli)
	{
		$data = $this->Vendor_model->deletedata_tenaga_ahli($id_tenaga_ahli);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}
	// CRUD CV
	public function data_get_cv($id_tenaga_ahli)
	{
		$resultss = $this->Vendor_model->getdatatable_cv($id_tenaga_ahli);
		$no = $_POST['start'];
		// $total = 0;
		$data = [];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] = $angga->tahun_cv;
			$row[] = $angga->uraian_cv;
			$row[] = '<a href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byid_cv(' . "'" . $angga->id_cv . "','edit_cv'" . ')"><i class="fas fa-edit"></i> Edit</a> <a href="javascript:;" class="btn btn-danger btn-block btn-sm" onClick="byid_cv(' . "'" . $angga->id_cv . "','hapus_cv'" . ')">  <i class="fas fa-trash"></i> Hapus</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Vendor_model->count_all_data_cv(),
			"recordsFiltered" => $this->Vendor_model->count_filtered_cv($id_tenaga_ahli),
			"data" => $data,
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	//data cv
	public function add_cv()
	{
		$id_tenaga_ahli = $this->input->post('id_tenaga_ahli');
		$upload = [
			'id_tenaga_ahli' => $id_tenaga_ahli,
			'tahun_cv' => $this->input->post('tahun_cv'),
			'uraian_cv' => $this->input->post('uraian_cv'),
		];
		$this->Vendor_model->create_cv($upload);
		$this->output->set_content_type('application/json')->set_output(json_encode($upload));
	}
	public function get_byid_cv($id_cv)
	{

		$cv = $this->Vendor_model->get_byid_cv($id_cv);
		$output = [
			"cv" => $cv,
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	// EDIT MENGATUR cv
	public function edit_cv()
	{
		$upload = [
			'id_cv' => $this->input->post('id_cv'),
			'uraian_cv' => $this->input->post('uraian_cv'),
			'tahun_cv' => $this->input->post('tahun_cv'),
		];
		$this->Vendor_model->update_cv(array('id_cv' => $this->input->post('id_cv')), $upload);
		$this->output->set_content_type('application/json')->set_output(json_encode($upload));
	}

	public function delete_cv($id_cv)
	{
		$data = $this->Vendor_model->deletedata_cv($id_cv);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	// CRUD Sertifikat
	public function data_get_sertifikat($id_tenaga_ahli)
	{
		$resultss = $this->Vendor_model->getdatatable_sertifikat($id_tenaga_ahli);
		$no = $_POST['start'];
		// $total = 0;
		$data = [];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] = $angga->tahun_sertifikat;
			$row[] = $angga->uraian_sertifikat;
			$row[] = '<a href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byid_sertifikat(' . "'" . $angga->id_sertifikat . "','edit_sertifikat'" . ')"><i class="fas fa-edit"></i> Edit</a> <a href="javascript:;" class="btn btn-danger btn-block btn-sm" onClick="byid_sertifikat(' . "'" . $angga->id_sertifikat . "','hapus_sertifikat'" . ')">  <i class="fas fa-trash"></i> Hapus</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Vendor_model->count_all_data_sertifikat(),
			"recordsFiltered" => $this->Vendor_model->count_filtered_sertifikat($id_tenaga_ahli),
			"data" => $data,
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	//data cv
	public function add_sertifikat()
	{
		$id_tenaga_ahli = $this->input->post('id_tenaga_ahli');
		$upload = [
			'id_tenaga_ahli' => $id_tenaga_ahli,
			'tahun_sertifikat' => $this->input->post('tahun_sertifikat'),
			'uraian_sertifikat' => $this->input->post('uraian_sertifikat'),
		];
		$this->Vendor_model->create_sertifikat($upload);
		$this->output->set_content_type('application/json')->set_output(json_encode($upload));
	}
	public function get_byid_sertifikat($id_sertifikat)
	{

		$sertifikat = $this->Vendor_model->get_byid_sertifikat($id_sertifikat);
		$output = [
			"sertifikat" => $sertifikat,
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	// EDIT MENGATUR sertifikat
	public function edit_sertifikat()
	{
		$upload = [
			'id_sertifikat' => $this->input->post('id_sertifikat'),
			'uraian_sertifikat' => $this->input->post('uraian_sertifikat'),
			'tahun_sertifikat' => $this->input->post('tahun_sertifikat'),
		];
		$this->Vendor_model->update_sertifikat(array('id_sertifikat' => $this->input->post('id_sertifikat')), $upload);
		$this->output->set_content_type('application/json')->set_output(json_encode($upload));
	}

	public function delete_sertifikat($id_sertifikat)
	{
		$data = $this->Vendor_model->deletedata_sertifikat($id_sertifikat);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	// CRUD Pendidikan
	public function data_get_pendidikan($id_tenaga_ahli)
	{
		$resultss = $this->Vendor_model->getdatatable_pendidikan($id_tenaga_ahli);
		$no = $_POST['start'];
		// $total = 0;
		$data = [];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] = $angga->tahun_pendidikan;
			$row[] = $angga->uraian_pendidikan;
			$row[] = '<a href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byid_pendidikan(' . "'" . $angga->id_pendidikan . "','edit_pendidikan'" . ')"><i class="fas fa-edit"></i> Edit</a> <a href="javascript:;" class="btn btn-danger btn-block btn-sm" onClick="byid_pendidikan(' . "'" . $angga->id_pendidikan . "','hapus_pendidikan'" . ')">  <i class="fas fa-trash"></i> Hapus</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Vendor_model->count_all_data_pendidikan(),
			"recordsFiltered" => $this->Vendor_model->count_filtered_pendidikan($id_tenaga_ahli),
			"data" => $data,
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	//data cv
	public function add_pendidikan()
	{
		$id_tenaga_ahli = $this->input->post('id_tenaga_ahli');
		$upload = [
			'id_tenaga_ahli' => $id_tenaga_ahli,
			'tahun_pendidikan' => $this->input->post('tahun_pendidikan'),
			'uraian_pendidikan' => $this->input->post('uraian_pendidikan'),
		];
		$this->Vendor_model->create_pendidikan($upload);
		$this->output->set_content_type('application/json')->set_output(json_encode($upload));
	}
	public function get_byid_pendidikan($id_pendidikan)
	{

		$pendidikan = $this->Vendor_model->get_byid_pendidikan($id_pendidikan);
		$output = [
			"pendidikan" => $pendidikan,
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	// EDIT MENGATUR pendidikan
	public function edit_pendidikan()
	{
		$upload = [
			'id_pendidikan' => $this->input->post('id_pendidikan'),
			'uraian_pendidikan' => $this->input->post('uraian_pendidikan'),
			'tahun_pendidikan' => $this->input->post('tahun_pendidikan'),
		];
		$this->Vendor_model->update_pendidikan(array('id_pendidikan' => $this->input->post('id_pendidikan')), $upload);
		$this->output->set_content_type('application/json')->set_output(json_encode($upload));
	}

	public function delete_pendidikan($id_pendidikan)
	{
		$data = $this->Vendor_model->deletedata_pendidikan($id_pendidikan);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}
	// CRUD Bahasa
	public function data_get_bahasa($id_tenaga_ahli)
	{
		$resultss = $this->Vendor_model->getdatatable_bahasa($id_tenaga_ahli);
		$no = $_POST['start'];
		// $total = 0;
		$data = [];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] = $angga->uraian_bahasa;
			$row[] = '<a href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byid_bahasa(' . "'" . $angga->id_bahasa . "','edit_bahasa'" . ')"><i class="fas fa-edit"></i> Edit</a> <a href="javascript:;" class="btn btn-danger btn-block btn-sm" onClick="byid_bahasa(' . "'" . $angga->id_bahasa . "','hapus_bahasa'" . ')">  <i class="fas fa-trash"></i> Hapus</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Vendor_model->count_all_data_bahasa(),
			"recordsFiltered" => $this->Vendor_model->count_filtered_bahasa($id_tenaga_ahli),
			"data" => $data,
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	//data cv
	public function add_bahasa()
	{
		$id_tenaga_ahli = $this->input->post('id_tenaga_ahli');
		$upload = [
			'id_tenaga_ahli' => $id_tenaga_ahli,
			'uraian_bahasa' => $this->input->post('uraian_bahasa'),
		];
		$this->Vendor_model->create_bahasa($upload);
		$this->output->set_content_type('application/json')->set_output(json_encode($upload));
	}
	public function get_byid_bahasa($id_bahasa)
	{

		$bahasa = $this->Vendor_model->get_byid_bahasa($id_bahasa);
		$output = [
			"bahasa" => $bahasa,
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	// EDIT MENGATUR bahasa
	public function edit_bahasa()
	{
		$upload = [
			'id_bahasa' => $this->input->post('id_bahasa'),
			'uraian_bahasa' => $this->input->post('uraian_bahasa'),
		];
		$this->Vendor_model->update_bahasa(array('id_bahasa' => $this->input->post('id_bahasa')), $upload);
		$this->output->set_content_type('application/json')->set_output(json_encode($upload));
	}

	public function delete_bahasa($id_bahasa)
	{
		$data = $this->Vendor_model->deletedata_bahasa($id_bahasa);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	// INI UNTUKK PERALATAN CRUD

	public function data_get_peralatan($id_vendor)
	{
		$resultss = $this->Vendor_model->getdatatable_peralatan($id_vendor);
		$no = $_POST['start'];
		// $total = 0;
		$data = [];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] = $angga->nama_peralatan;
			$row[] = $angga->jumlah_peralatan;
			$row[] = $angga->kapasitas_peralatan;
			$row[] = $angga->merk_peralatan;
			$row[] = $angga->kondisi_peralatan;
			$row[] = $angga->tahun_pembuatan_peralatan;
			$row[] = $angga->lokasi_sekarang_peralatan;
			$row[] = '<a href="https://vms.jmtm.co.id/file_bukti_kepemilikan_peralatan/' . $angga->file_bukti_kepemilikan_peralatan . '">' . '<img width="40px" src=' . base_url('assets/img/pdf.png') . ' >' . '</a>';
			if ($angga->status_sesuai == 0 || $angga->status_sesuai == NULL) {
				$row[] = '<a href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byid_peralatan(' . "'" . $angga->id_peralatan . "','edit_peralatan'" . ')"><i class="fas fa-check"></i> Sesuai</a> <a href="javascript:;" class="btn btn-danger btn-block btn-sm" onClick="byid_peralatan(' . "'" . $angga->id_peralatan . "','hapus_peralatan'" . ')">  <i class="fas fa-times"></i> Tidak Sesuai</a>';
			} else if ($angga->status_sesuai == 1) {
				$row[] = '<button disabled href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byid_peralatan(' . "'" . $angga->id_peralatan . "','edit_peralatan'" . ')"><i class="fas fa-check"></i> Sesuai</button> <a href="javascript:;" class="btn btn-danger btn-block btn-sm" onClick="byid_peralatan(' . "'" . $angga->id_peralatan . "','hapus_peralatan'" . ')">  <i class="fas fa-times"></i> Tidak Sesuai</a>';
			}

			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Vendor_model->count_all_data_peralatan(),
			"recordsFiltered" => $this->Vendor_model->count_filtered_peralatan($id_vendor),
			"data" => $data,
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function get_byid_peralatan($id_peralatan)
	{

		$peralatan = $this->Vendor_model->get_byid_peralatan($id_peralatan);
		$output = [
			"peralatan" => $peralatan,
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function approve_peralatan()
	{
		$data = [
			'status_sesuai' => 1,
			'alasan' => $this->input->post('alasan')
		];
		$this->Vendor_model->update_peralatan(array('id_peralatan' => $this->input->post('id_peralatan')), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function approve_peralatan2()
	{
		$data = [
			'status_sesuai' => 0,
			'alasan' => $this->input->post('alasan')
		];
		$this->Vendor_model->update_peralatan(array('id_peralatan' => $this->input->post('id_peralatan')), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	// EDIT MENGATUR peralatan
	public function edit_peralatan()
	{
		$config['upload_path'] = './file_bukti_kepemilikan_peralatan/';
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = 0;

		$this->load->library('upload', $config);
		if ($this->upload->do_upload('file_bukti_kepemilikan_peralatan')) {

			$fileData = $this->upload->data();
			$upload = [
				'nama_peralatan' => $this->input->post('nama_peralatan'),
				'jumlah_peralatan' => $this->input->post('jumlah_peralatan'),
				'kapasitas_peralatan' => $this->input->post('kapasitas_peralatan'),
				'merk_peralatan' => $this->input->post('merk_peralatan'),
				'kondisi_peralatan' => $this->input->post('kondisi_peralatan'),
				'tahun_pembuatan_peralatan' => $this->input->post('tahun_pembuatan_peralatan'),
				'lokasi_sekarang_peralatan' => $this->input->post('lokasi_sekarang_peralatan'),
				'file_bukti_kepemilikan_peralatan' => $fileData['file_name'],
			];
			$this->Vendor_model->update_peralatan(array('id_peralatan' => $this->input->post('id_peralatan')), $upload);
			$this->output->set_content_type('application/json')->set_output(json_encode($upload));
		} else {
			$this->session->set_flashdata('error', $this->upload->display_errors());
			redirect(base_url('upload'));
		}
	}

	public function delete_peralatan($id_peralatan)
	{
		$data = $this->Vendor_model->deletedata_peralatan($id_peralatan);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	// INI UNTUKK PENGALAMAN CRUD
	public function data_get_pengalaman($id_vendor)
	{
		$resultss = $this->Vendor_model->getdatatable_pengalaman($id_vendor);
		$no = $_POST['start'];
		// $total = 0;
		$data = [];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] = $angga->nama_pekerjaan_pengalaman;
			$row[] = $angga->lokasi_pengalaman;
			$row[] = $angga->instansi_pengalaman;
			$row[] = $angga->alamat_pengalaman;
			$row[] = $angga->tanggal_kontrak;
			$row[] = $angga->selesai_kontrak;
			$row[] = '<a href="https://vms.jmtm.co.id/bukti_pengalaman/' . $angga->bukti_pengalaman . '">' . '<img width="40px" src=' . base_url('assets/img/pdf.png') . ' >' . '</a>';
			if ($angga->status_sesuai == 0 || $angga->status_sesuai == NULL) {
				$row[] = '<a href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byid_pengalaman(' . "'" . $angga->id_pengalaman . "','edit_pengalaman'" . ')"><i class="fas fa-check"></i> Sesuai</a> <a href="javascript:;" class="btn btn-danger btn-block btn-sm" onClick="byid_pengalaman(' . "'" . $angga->id_pengalaman . "','hapus_pengalaman'" . ')">  <i class="fas fa-times"></i> Tidak Sesuai</a>';
			} else if ($angga->status_sesuai == 1) {
				$row[] = '<button disabled href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byid_pengalaman(' . "'" . $angga->id_pengalaman . "','edit_pengalaman'" . ')"><i class="fas fa-check"></i> Sesuai</button> <a href="javascript:;" class="btn btn-danger btn-block btn-sm" onClick="byid_pengalaman(' . "'" . $angga->id_pengalaman . "','hapus_pengalaman'" . ')">  <i class="fas fa-times"></i> Tidak Sesuai</a>';
			}

			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Vendor_model->count_all_data_pengalaman(),
			"recordsFiltered" => $this->Vendor_model->count_filtered_pengalaman($id_vendor),
			"data" => $data,
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function approve_pengalaman()
	{
		$data = [
			'status_sesuai' => 1,
			'alasan' => $this->input->post('alasan')
		];
		$this->Vendor_model->update_pengalaman(array('id_pengalaman' => $this->input->post('id_pengalaman')), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function approve_pengalaman2()
	{
		$data = [
			'status_sesuai' => 0,
			'alasan' => $this->input->post('alasan')
		];
		$this->Vendor_model->update_pengalaman(array('id_pengalaman' => $this->input->post('id_pengalaman')), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function get_byid_pengalaman($id_pengalaman)
	{

		$pengalaman = $this->Vendor_model->get_byid_pengalaman($id_pengalaman);
		$output = [
			"pengalaman" => $pengalaman,
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	// EDIT MENGATUR pengalaman
	public function edit_pengalaman()
	{
		$config['upload_path'] = './bukti_pengalaman/';
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = 0;

		$this->load->library('upload', $config);
		if ($this->upload->do_upload('bukti_pengalaman')) {

			$fileData = $this->upload->data();
			$upload = [
				'nama_pekerjaan_pengalaman' => $this->input->post('nama_pekerjaan_pengalaman'),
				'lokasi_pengalaman' => $this->input->post('lokasi_pengalaman'),
				'instansi_pengalaman' => $this->input->post('instansi_pengalaman'),
				'alamat_pengalaman' => $this->input->post('alamat_pengalaman'),
				'tanggal_kontrak' => $this->input->post('tanggal_kontrak'),
				'selesai_kontrak' => $this->input->post('selesai_kontrak'),
				'bukti_pengalaman' => $fileData['file_name'],
			];
			$this->Vendor_model->update_pengalaman(array('id_pengalaman' => $this->input->post('id_pengalaman')), $upload);
			$this->output->set_content_type('application/json')->set_output(json_encode($upload));
		} else {
			$this->session->set_flashdata('error', $this->upload->display_errors());
			redirect(base_url('upload'));
		}
	}

	public function delete_pengalaman($id_pengalaman)
	{
		$data = $this->Vendor_model->deletedata_pengalaman($id_pengalaman);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	// INI UNTUKK PAJAK CRUD
	public function data_get_pajak($id_vendor)
	{
		$resultss = $this->Vendor_model->getdatatable_pajak($id_vendor);
		$no = $_POST['start'];
		// $total = 0;
		$data = [];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] = $angga->nama_pajak_vendor;
			$row[] = $angga->tanggal_pajak_vendor;
			$row[] = '<a href="https://vms.jmtm.co.id/file_bukti_pajak_vendor/' . $angga->file_bukti_pajak_vendor . '">' . '<img width="40px" src=' . base_url('assets/img/pdf.png') . ' >' . '</a>';
			if ($angga->status_sesuai == 0 || $angga->status_sesuai == NULL) {
				$row[] = '<a href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byid_pajak(' . "'" . $angga->id_pajak . "','edit_pajak'" . ')"><i class="fas fa-check"></i> Sesuai</a> <a href="javascript:;" class="btn btn-danger btn-block btn-sm" onClick="byid_pajak(' . "'" . $angga->id_pajak . "','hapus_pajak'" . ')">  <i class="fas fa-times"></i> Tidak Sesuai</a>';
			} else if ($angga->status_sesuai == 1) {
				$row[] = '<button disabled href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byid_pajak(' . "'" . $angga->id_pajak . "','edit_pajak'" . ')"><i class="fas fa-check"></i> Sesuai</button> <a href="javascript:;" class="btn btn-danger btn-block btn-sm" onClick="byid_pajak(' . "'" . $angga->id_pajak . "','hapus_pajak'" . ')">  <i class="fas fa-times"></i> Tidak Sesuai</a>';
			}

			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Vendor_model->count_all_data_pajak(),
			"recordsFiltered" => $this->Vendor_model->count_filtered_pajak($id_vendor),
			"data" => $data,
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function approve_pajak()
	{
		$data = [
			'status_sesuai' => 1,
			'alasan' => $this->input->post('alasan')
		];
		$this->Vendor_model->update_pajak(array('id_pajak' => $this->input->post('id_pajak')), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function approve_pajak2()
	{
		$data = [
			'status_sesuai' => 0,
			'alasan' => $this->input->post('alasan')
		];
		$this->Vendor_model->update_pajak(array('id_pajak' => $this->input->post('id_pajak')), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function get_byid_pajak($id_pajak)
	{

		$pajak = $this->Vendor_model->get_byid_pajak($id_pajak);
		$output = [
			"pajak" => $pajak,
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	// EDIT MENGATUR pajak
	public function edit_pajak()
	{
		$config['upload_path'] = './file_bukti_pajak_vendor/';
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = 0;

		$this->load->library('upload', $config);
		if ($this->upload->do_upload('file_bukti_pajak_vendor')) {

			$fileData = $this->upload->data();
			$upload = [
				'nama_pajak_vendor' => $this->input->post('nama_pajak_vendor'),
				'tanggal_pajak_vendor' => $this->input->post('tanggal_pajak_vendor'),
				'file_bukti_pajak_vendor' => $fileData['file_name'],
			];
			$this->Vendor_model->update_pajak(array('id_pajak' => $this->input->post('id_pajak')), $upload);
			$this->output->set_content_type('application/json')->set_output(json_encode($upload));
		} else {
			$this->session->set_flashdata('error', $this->upload->display_errors());
			redirect(base_url('upload'));
		}
	}

	public function delete_pajak($id_pajak)
	{
		$data = $this->Vendor_model->deletedata_pajak($id_pajak);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	//KEUANGAN
	public function data_get_keuangan($id_vendor)
	{
		$resultss = $this->Vendor_model->getdatatable_keuangan($id_vendor);
		$no = $_POST['start'];
		// $total = 0;
		$data = [];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] = $angga->tahun_audit;
			if ($angga->status_audit == 'Audit') {
				$row[] = '<p class="badge badge-success">Sudah Audit</p> <i class="fa fa-check text-success"></i>';
			} else if ($angga->status_audit == 'Tidak Audit' || $angga->status_audit == NULL) {
				$row[] = '<p class="badge badge-danger">Belum Audit</p> <i class="fa fa-times text-danger"></i>';
			}
			$row[] = '<a href="https://vms.jmtm.co.id/file_bukti_keuangan/' . $angga->bukti . '">' . '<img width="40px" src=' . base_url('assets/img/pdf.png') . ' >' . '</a>';

			if ($angga->status_sesuai == 0 || $angga->status_sesuai == NULL) {
				$row[] = '<a href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byid_keuangan(' . "'" . $angga->id_keuangan . "','edit_keuangan'" . ')"><i class="fas fa-check"></i> Sesuai</a> <a href="javascript:;" class="btn btn-danger btn-block btn-sm" onClick="byid_keuangan(' . "'" . $angga->id_keuangan . "','hapus_keuangan'" . ')">  <i class="fas fa-times"></i> Tidak Sesuai</a>';
			} else if ($angga->status_sesuai == 1) {
				$row[] = '<button disabled href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byid_keuangan(' . "'" . $angga->id_keuangan . "','edit_keuangan'" . ')"><i class="fas fa-check"></i> Sesuai</button> <a href="javascript:;" class="btn btn-danger btn-block btn-sm" onClick="byid_keuangan(' . "'" . $angga->id_keuangan . "','hapus_keuangan'" . ')">  <i class="fas fa-times"></i> Tidak Sesuai</a>';
			}

			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Vendor_model->count_all_data_keuangan(),
			"recordsFiltered" => $this->Vendor_model->count_filtered_keuangan($id_vendor),
			"data" => $data,
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	//data pajak
	// public function add_keuangan()
	// {

	// 	$config['upload_path'] = './file_bukti_keuangan/';
	// 	$config['allowed_types'] = 'pdf';
	// 	$config['max_size'] = 0;

	// 	$this->load->library('upload', $config);

	// 	if ($this->upload->do_upload('file_bukti_keuangan_vendor')) {

	// 		$fileData = $this->upload->data();

	// 		$upload = [
	// 			'id_vendor' => $id_vendor,
	// 			'tahun_audit' => $this->input->post('tahun_audit'),
	// 			'status_audit' => $this->input->post('status_audit'),
	// 			'bukti' => $fileData['file_name'],
	// 		];
	// 		$this->Vendor_model->create_keuangan($upload);
	// 		$this->output->set_content_type('application/json')->set_output(json_encode($upload));
	// 	} else {
	// 		$this->session->set_flashdata('error', $this->upload->display_errors());
	// 		redirect(base_url('upload'));
	// 	}
	// }

	public function approve_keuangan()
	{
		$data = [
			'status_sesuai' => 1,
			'alasan' => $this->input->post('alasan')
		];
		$this->Vendor_model->update_keuangan(array('id_keuangan' => $this->input->post('id_keuangan')), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function approve_keuangan2()
	{
		$data = [
			'status_sesuai' => 0,
			'alasan' => $this->input->post('alasan')
		];
		$this->Vendor_model->update_keuangan(array('id_keuangan' => $this->input->post('id_keuangan')), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function get_byid_keuangan($id_pajak)
	{

		$pajak = $this->Vendor_model->get_byid_keuangan($id_pajak);
		$output = [
			"keuangan" => $pajak,
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	// EDIT MENGATUR pajak
	public function edit_keuangan()
	{
		$config['upload_path'] = './file_bukti_keuangan/';
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = 0;

		$this->load->library('upload', $config);
		if ($this->upload->do_upload('file_bukti_keuangan_vendor')) {

			$fileData = $this->upload->data();
			$upload = [
				'tahun_audit' => $this->input->post('tahun_audit'),
				'status_audit' => $this->input->post('status_audit'),
				'bukti' => $fileData['file_name'],
			];
			$this->Vendor_model->update_keuangan(array('id_keuangan' => $this->input->post('id_keuangan')), $upload);
			$this->output->set_content_type('application/json')->set_output(json_encode($upload));
		} else {
			$this->session->set_flashdata('error', $this->upload->display_errors());
			redirect(base_url('upload'));
		}
	}

	public function delete_keuangan($id_pajak)
	{
		$data = $this->Vendor_model->deletedata_keuangan($id_pajak);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}
	//END KEUANGAN

	// NIB
	public function data_get_nib($id_vendor)
	{
		$resultss = $this->Vendor_model->getdatatable_nib($id_vendor);
		$no = $_POST['start'];
		// $total = 0;
		$data = [];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] = $angga->nomor_nib;
			if ($angga->masa_berlaku_seumur_hidup == 1) {
				$row[] = 'SEUMUR HIDUP';
			} else if ($angga->masa_berlaku_seumur_hidup == NULL || $angga->masa_berlaku_seumur_hidup == 0) {
				$row[] = $angga->masa_berlaku_awal . ' S/D ' . $angga->masa_berlaku_akhir;
			}
			$row[] = '<a href="https://vms.jmtm.co.id/file_bukti_nib/' . $angga->file_bukti_nib_vendor . '">' . '<img width="40px" src=' . base_url('assets/img/pdf.png') . ' >' . '</a>';

			if ($angga->status_sesuai == 0 || $angga->status_sesuai == NULL) {
				$row[] = '<a href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byid_nib(' . "'" . $angga->id_nib . "','edit_nib'" . ')"><i class="fas fa-check"></i> Sesuai</a> <a href="javascript:;" class="btn btn-danger btn-block btn-sm" onClick="byid_nib(' . "'" . $angga->id_nib . "','hapus_nib'" . ')">  <i class="fas fa-times"></i> Tidak Sesuai</a>';
			} else if ($angga->status_sesuai == 1) {
				$row[] = '<button disabled href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byid_nib(' . "'" . $angga->id_nib . "','edit_nib'" . ')"><i class="fas fa-check"></i> Sesuai</button> <a href="javascript:;" class="btn btn-danger btn-block btn-sm" onClick="byid_nib(' . "'" . $angga->id_nib . "','hapus_nib'" . ')">  <i class="fas fa-times"></i> Tidak Sesuai</a>';
			}

			$data[] = $row;
			// <a href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byid_nib(' . "'" . $angga->id_nib . "','edit_nib'" . ')"><i class="fas fa-edit"></i> Edit</a>
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Vendor_model->count_all_data_nib(),
			"recordsFiltered" => $this->Vendor_model->count_filtered_nib($id_vendor),
			"data" => $data,
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function approve_nib()
	{
		$data = [
			'status_sesuai' => 1,
			'alasan' => $this->input->post('alasan')
		];
		$this->Vendor_model->update_nib(array('id_nib' => $this->input->post('id_nib')), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function approve_nib2()
	{
		$data = [
			'status_sesuai' => 0,
			'alasan' => $this->input->post('alasan')
		];
		$this->Vendor_model->update_nib(array('id_nib' => $this->input->post('id_nib')), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function get_byid_nib($id_nib)
	{
		$nib = $this->Vendor_model->get_byid_nib($id_nib);
		$output = [
			"nib" => $nib,
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function delete_nib($id_nib)
	{
		$data = $this->Vendor_model->deletedata_nib($id_nib);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	// END NIB

	// TDP
	public function data_get_tdp($id_vendor)
	{
		$resultss = $this->Vendor_model->getdatatable_tdp($id_vendor);
		$no = $_POST['start'];
		// $total = 0;
		$data = [];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			if ($angga->masa_berlaku_seumur_hidup == 1) {
				$row[] = 'SEUMUR HIDUP';
			} else if ($angga->masa_berlaku_seumur_hidup == NULL || $angga->masa_berlaku_seumur_hidup == 0) {
				$row[] = $angga->masa_berlaku_awal . ' S/D ' . $angga->masa_berlaku_akhir;
			}
			$row[] = '<a href="https://vms.jmtm.co.id/file_bukti_tdp/' . $angga->file_bukti_tdp_vendor . '">' . '<img width="40px" src=' . base_url('assets/img/pdf.png') . ' >' . '</a>';
			if ($angga->status_sesuai == 0 || $angga->status_sesuai == NULL) {
				$row[] = '<a href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byid_tdp(' . "'" . $angga->id_tdp . "','edit_tdp'" . ')"><i class="fas fa-check"></i> Sesuai</a> <a href="javascript:;" class="btn btn-danger btn-block btn-sm" onClick="byid_tdp(' . "'" . $angga->id_tdp . "','hapus_tdp'" . ')">  <i class="fas fa-times"></i> Tidak Sesuai</a>';
			} else if ($angga->status_sesuai == 1) {
				$row[] = '<button disabled href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byid_tdp(' . "'" . $angga->id_tdp . "','edit_tdp'" . ')"><i class="fas fa-check"></i> Sesuai</button> <a href="javascript:;" class="btn btn-danger btn-block btn-sm" onClick="byid_tdp(' . "'" . $angga->id_tdp . "','hapus_tdp'" . ')">  <i class="fas fa-times"></i> Tidak Sesuai</a>';
			}
			$data[] = $row;
			// <a href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byid_nib(' . "'" . $angga->id_nib . "','edit_nib'" . ')"><i class="fas fa-edit"></i> Edit</a>
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Vendor_model->count_all_data_tdp($id_vendor),
			"recordsFiltered" => $this->Vendor_model->count_filtered_tdp($id_vendor),
			"data" => $data,
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function approve_tdp()
	{
		$data = [
			'status_sesuai' => 1,
			'alasan' => $this->input->post('alasan')
		];
		$this->Vendor_model->update_tdp(array('id_tdp' => $this->input->post('id_tdp')), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function approve_tdp2()
	{
		$data = [
			'status_sesuai' => 0,
			'alasan' => $this->input->post('alasan')
		];
		$this->Vendor_model->update_tdp(array('id_tdp' => $this->input->post('id_tdp')), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function get_byid_tdp($id_tdp)
	{
		$tdp = $this->Vendor_model->get_byid_tdp($id_tdp);
		$output = [
			"tdp" => $tdp,
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function delete_tdp($id_tdp)
	{
		$data = $this->Vendor_model->deletedata_tdp($id_tdp);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	//END TDP

	//SIUP
	public function data_get_siup($id_vendor)
	{


		$resultss = $this->Vendor_model->getdatatable_siup($id_vendor);
		$no = $_POST['start'];
		// $total = 0;
		$data = [];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			if ($angga->masa_berlaku_seumur_hidup == 1) {
				$row[] = 'SEUMUR HIDUP';
			} else if ($angga->masa_berlaku_seumur_hidup == NULL || $angga->masa_berlaku_seumur_hidup == 0) {
				$row[] = $angga->masa_berlaku_awal . ' S/D ' . $angga->masa_berlaku_akhir;
			}
			$row[] = '<a href="https://vms.jmtm.co.id/file_bukti_siup/' . $angga->file_bukti_siup_vendor . '">' . '<img width="40px" src=' . base_url('assets/img/pdf.png') . ' >' . '</a>';
			if ($angga->status_sesuai == 0 || $angga->status_sesuai == NULL) {
				$row[] = '<a href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byid_siup(' . "'" . $angga->id_siup . "','edit_siup'" . ')"><i class="fas fa-check"></i> Sesuai</a> <a href="javascript:;" class="btn btn-danger btn-block btn-sm" onClick="byid_siup(' . "'" . $angga->id_siup . "','hapus_siup'" . ')">  <i class="fas fa-times"></i> Tidak Sesuai</a>';
			} else if ($angga->status_sesuai == 1) {
				$row[] = '<button disabled href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byid_siup(' . "'" . $angga->id_siup . "','edit_siup'" . ')"><i class="fas fa-check"></i> Sesuai</button> <a href="javascript:;" class="btn btn-danger btn-block btn-sm" onClick="byid_siup(' . "'" . $angga->id_siup . "','hapus_siup'" . ')">  <i class="fas fa-times"></i> Tidak Sesuai</a>';
			}
			$data[] = $row;
			// <a href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byid_nib(' . "'" . $angga->id_nib . "','edit_nib'" . ')"><i class="fas fa-edit"></i> Edit</a>
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Vendor_model->count_all_data_siup($id_vendor),
			"recordsFiltered" => $this->Vendor_model->count_filtered_siup($id_vendor),
			"data" => $data,
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function approve_siup()
	{
		$data = [
			'status_sesuai' => 1,
			'alasan' => $this->input->post('alasan')
		];
		$this->Vendor_model->update_siup(array('id_siup' => $this->input->post('id_siup')), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function approve_siup2()
	{
		$data = [
			'status_sesuai' => 0,
			'alasan' => $this->input->post('alasan')
		];
		$this->Vendor_model->update_siup(array('id_siup' => $this->input->post('id_siup')), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function get_byid_siup($id_siup)
	{
		$siup = $this->Vendor_model->get_byid_siup($id_siup);
		$output = [
			"siup" => $siup,
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function delete_siup($id_siup)
	{
		$data = $this->Vendor_model->deletedata_siup($id_siup);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	//END SIUP

	// NPWP
	public function data_get_npwp($id_vendor)
	{
		$resultss = $this->Vendor_model->getdatatable_npwp($id_vendor);
		$no = $_POST['start'];
		// $total = 0;
		$data = [];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] = $angga->npwp;
			if ($angga->masa_berlaku_seumur_hidup == 1) {
				$row[] = 'SEUMUR HIDUP';
			} else if ($angga->masa_berlaku_seumur_hidup == NULL || $angga->masa_berlaku_seumur_hidup == 0) {
				$row[] = $angga->masa_berlaku_awal . ' S/D ' . $angga->masa_berlaku_akhir;
			}
			$row[] = '<a href="https://vms.jmtm.co.id/file_bukti_npwp/' . $angga->file_bukti_npwp_vendor . '">' . '<img width="40px" src=' . base_url('assets/img/pdf.png') . ' >' . '</a>';
			if ($angga->status_sesuai == 0 || $angga->status_sesuai == NULL) {
				$row[] = '<a href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byid_npwp(' . "'" . $angga->id_npwp . "','edit_npwp'" . ')"><i class="fas fa-check"></i> Sesuai</a> <a href="javascript:;" class="btn btn-danger btn-block btn-sm" onClick="byid_npwp(' . "'" . $angga->id_npwp . "','hapus_npwp'" . ')">  <i class="fas fa-times"></i> Tidak Sesuai</a>';
			} else if ($angga->status_sesuai == 1) {
				$row[] = '<button disabled href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byid_npwp(' . "'" . $angga->id_npwp . "','edit_npwp'" . ')"><i class="fas fa-check"></i> Sesuai</button> <a href="javascript:;" class="btn btn-danger btn-block btn-sm" onClick="byid_npwp(' . "'" . $angga->id_npwp . "','hapus_npwp'" . ')">  <i class="fas fa-times"></i> Tidak Sesuai</a>';
			}
			$data[] = $row;
			// <a href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byid_nib(' . "'" . $angga->id_nib . "','edit_nib'" . ')"><i class="fas fa-edit"></i> Edit</a>
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Vendor_model->count_all_data_npwp($id_vendor),
			"recordsFiltered" => $this->Vendor_model->count_filtered_npwp($id_vendor),
			"data" => $data,
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function approve_npwp()
	{
		$data = [
			'status_sesuai' => 1,
			'alasan' => $this->input->post('alasan')
		];
		$this->Vendor_model->update_npwp(array('id_npwp' => $this->input->post('id_npwp')), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function approve_npwp2()
	{
		$data = [
			'status_sesuai' => 0,
			'alasan' => $this->input->post('alasan')
		];
		$this->Vendor_model->update_npwp(array('id_npwp' => $this->input->post('id_npwp')), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}


	public function get_byid_npwp($id_siup)
	{
		$npwp = $this->Vendor_model->get_byid_npwp($id_siup);
		$output = [
			"npwp" => $npwp,
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function delete_npwp($id_siup)
	{
		$data = $this->Vendor_model->deletedata_npwp($id_siup);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}
	//END NPWP


	//SKPKP
	public function data_get_skpkp($id_vendor)
	{


		$resultss = $this->Vendor_model->getdatatable_skpkp($id_vendor);
		$no = $_POST['start'];
		// $total = 0;
		$data = [];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			if ($angga->masa_berlaku_seumur_hidup == 1) {
				$row[] = 'SEUMUR HIDUP';
			} else if ($angga->masa_berlaku_seumur_hidup == NULL || $angga->masa_berlaku_seumur_hidup == 0) {
				$row[] = $angga->masa_berlaku_awal . ' S/D ' . $angga->masa_berlaku_akhir;
			}
			$row[] = '<a href="https://vms.jmtm.co.id/file_bukti_skpkp/' . $angga->file_bukti_skpkp_vendor . '">' . '<img width="40px" src=' . base_url('assets/img/pdf.png') . ' >' . '</a>';
			if ($angga->status_sesuai == 0 || $angga->status_sesuai == NULL) {
				$row[] = '<a href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byid_skpkp(' . "'" . $angga->id_skpkp . "','edit_skpkp'" . ')"><i class="fas fa-check"></i> Sesuai</a> <a href="javascript:;" class="btn btn-danger btn-block btn-sm" onClick="byid_skpkp(' . "'" . $angga->id_skpkp . "','hapus_skpkp'" . ')">  <i class="fas fa-times"></i> Tidak Sesuai</a>';
			} else if ($angga->status_sesuai == 1) {
				$row[] = '<button disabled href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byid_skpkp(' . "'" . $angga->id_skpkp . "','edit_skpkp'" . ')"><i class="fas fa-check"></i> Sesuai</button> <a href="javascript:;" class="btn btn-danger btn-block btn-sm" onClick="byid_skpkp(' . "'" . $angga->id_skpkp . "','hapus_skpkp'" . ')">  <i class="fas fa-times"></i> Tidak Sesuai</a>';
			}
			$data[] = $row;
			// <a href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byid_nib(' . "'" . $angga->id_nib . "','edit_nib'" . ')"><i class="fas fa-edit"></i> Edit</a>
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Vendor_model->count_all_data_skpkp($id_vendor),
			"recordsFiltered" => $this->Vendor_model->count_filtered_skpkp($id_vendor),
			"data" => $data,
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function approve_skpkp()
	{
		$data = [
			'status_sesuai' => 1,
			'alasan' => $this->input->post('alasan')
		];
		$this->Vendor_model->update_skpkp(array('id_skpkp' => $this->input->post('id_skpkp')), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function approve_skpkp2()
	{
		$data = [
			'status_sesuai' => 0,
			'alasan' => $this->input->post('alasan')
		];
		$this->Vendor_model->update_skpkp(array('id_skpkp' => $this->input->post('id_skpkp')), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function get_byid_skpkp($id_skpkp)
	{
		$skpkp = $this->Vendor_model->get_byid_skpkp($id_skpkp);
		$output = [
			"skpkp" => $skpkp,
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function delete_skpkp($id_skpkp)
	{
		$data = $this->Vendor_model->deletedata_skpkp($id_skpkp);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}
	//END SKPKP

	//SPPT
	public function data_get_sppt($id_vendor)
	{


		$resultss = $this->Vendor_model->getdatatable_sppt($id_vendor);
		$no = $_POST['start'];
		// $total = 0;
		$data = [];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			if ($angga->masa_berlaku_seumur_hidup == 1) {
				$row[] = 'SEUMUR HIDUP';
			} else if ($angga->masa_berlaku_seumur_hidup == NULL || $angga->masa_berlaku_seumur_hidup == 0) {
				$row[] = $angga->masa_berlaku_awal . ' S/D ' . $angga->masa_berlaku_akhir;
			}
			$row[] = '<a href="https://vms.jmtm.co.id/file_bukti_sppt/' . $angga->file_bukti_sppt_vendor . '">' . '<img width="40px" src=' . base_url('assets/img/pdf.png') . ' >' . '</a>';
			if ($angga->status_sesuai == 0 || $angga->status_sesuai == NULL) {
				$row[] = '<a href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byid_sppt(' . "'" . $angga->id_sppt . "','edit_sppt'" . ')"><i class="fas fa-check"></i> Sesuai</a> <a href="javascript:;" class="btn btn-danger btn-block btn-sm" onClick="byid_sppt(' . "'" . $angga->id_sppt . "','hapus_sppt'" . ')">  <i class="fas fa-times"></i> Tidak Sesuai</a>';
			} else if ($angga->status_sesuai == 1) {
				$row[] = '<button disabled href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byid_sppt(' . "'" . $angga->id_sppt . "','edit_sppt'" . ')"><i class="fas fa-check"></i> Sesuai</button> <a href="javascript:;" class="btn btn-danger btn-block btn-sm" onClick="byid_sppt(' . "'" . $angga->id_sppt . "','hapus_sppt'" . ')">  <i class="fas fa-times"></i> Tidak Sesuai</a>';
			}
			$data[] = $row;
			// <a href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byid_nib(' . "'" . $angga->id_nib . "','edit_nib'" . ')"><i class="fas fa-edit"></i> Edit</a>
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Vendor_model->count_all_data_sppt($id_vendor),
			"recordsFiltered" => $this->Vendor_model->count_filtered_sppt($id_vendor),
			"data" => $data,
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function approve_sppt()
	{
		$data = [
			'status_sesuai' => 1,
			'alasan' => $this->input->post('alasan')
		];
		$this->Vendor_model->update_sppt(array('id_sppt' => $this->input->post('id_sppt')), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function approve_sppt2()
	{
		$data = [
			'status_sesuai' => 0,
			'alasan' => $this->input->post('alasan')
		];
		$this->Vendor_model->update_sppt(array('id_sppt' => $this->input->post('id_sppt')), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function get_byid_sppt($id_siujk)
	{
		$sppt = $this->Vendor_model->get_byid_sppt($id_siujk);
		$output = [
			"sppt" => $sppt,
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function delete_sppt($id_siujk)
	{
		$data = $this->Vendor_model->deletedata_sppt($id_siujk);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}
	//END SPPT

	// SIUJK
	public function data_get_siujk($id_vendor)
	{


		$resultss = $this->Vendor_model->getdatatable_siujk($id_vendor);
		$no = $_POST['start'];
		// $total = 0;
		$data = [];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			if ($angga->masa_berlaku_seumur_hidup == 1) {
				$row[] = 'SEUMUR HIDUP';
			} else if ($angga->masa_berlaku_seumur_hidup == NULL || $angga->masa_berlaku_seumur_hidup == 0) {
				$row[] = $angga->masa_berlaku_awal . ' S/D ' . $angga->masa_berlaku_akhir;
			}
			$row[] = '<a href="https://vms.jmtm.co.id/file_bukti_siujk/' . $angga->file_bukti_siujk_vendor . '">' . '<img width="40px" src=' . base_url('assets/img/pdf.png') . ' >' . '</a>';
			if ($angga->status_sesuai == 0 || $angga->status_sesuai == NULL) {
				$row[] = '<a href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byid_siujk(' . "'" . $angga->id_siujk . "','edit_siujk'" . ')"><i class="fas fa-check"></i> Sesuai</a> <a href="javascript:;" class="btn btn-danger btn-block btn-sm" onClick="byid_siujk(' . "'" . $angga->id_siujk . "','hapus_siujk'" . ')">  <i class="fas fa-times"></i> Tidak Sesuai</a>';
			} else if ($angga->status_sesuai == 1) {
				$row[] = '<button disabled href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byid_siujk(' . "'" . $angga->id_siujk . "','edit_siujk'" . ')"><i class="fas fa-check"></i> Sesuai</button> <a href="javascript:;" class="btn btn-danger btn-block btn-sm" onClick="byid_siujk(' . "'" . $angga->id_siujk . "','hapus_siujk'" . ')">  <i class="fas fa-times"></i> Tidak Sesuai</a>';
			}
			$data[] = $row;
			// <a href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byid_nib(' . "'" . $angga->id_nib . "','edit_nib'" . ')"><i class="fas fa-edit"></i> Edit</a>
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Vendor_model->count_all_data_siujk($id_vendor),
			"recordsFiltered" => $this->Vendor_model->count_filtered_siujk($id_vendor),
			"data" => $data,
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function approve_siujk()
	{
		$data = [
			'status_sesuai' => 1,
			'alasan' => $this->input->post('alasan')
		];
		$this->Vendor_model->update_siujk(array('id_siujk' => $this->input->post('id_siujk')), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function approve_siujk2()
	{
		$data = [
			'status_sesuai' => 0,
			'alasan' => $this->input->post('alasan')
		];
		$this->Vendor_model->update_siujk(array('id_siujk' => $this->input->post('id_siujk')), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function get_byid_siujk($id_siujk)
	{
		$siujk = $this->Vendor_model->get_byid_siujk($id_siujk);
		$siujk = [
			"siujk" => $siujk,
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($siujk));
	}

	public function delete_siujk($id_siujk)
	{
		$data = $this->Vendor_model->deletedata_siujk($id_siujk);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}
	// END SIUJK

	// KTP
	public function data_get_ktp($id_vendor)
	{


		$resultss = $this->Vendor_model->getdatatable_ktp($id_vendor);
		$no = $_POST['start'];
		// $total = 0;
		$data = [];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			$row[] = $angga->no_ktp;
			if ($angga->masa_berlaku_seumur_hidup == 1) {
				$row[] = 'SEUMUR HIDUP';
			} else if ($angga->masa_berlaku_seumur_hidup == NULL || $angga->masa_berlaku_seumur_hidup == 0) {
				$row[] = $angga->masa_berlaku_awal . ' S/D ' . $angga->masa_berlaku_akhir;
			}
			$row[] = '<a href="https://vms.jmtm.co.id/file_bukti_ktp/' . $angga->file_bukti_ktp_vendor . '">' . '<img width="40px" src=' . base_url('assets/img/pdf.png') . ' >' . '</a>';
			if ($angga->status_sesuai == 0 || $angga->status_sesuai == NULL) {
				$row[] = '<a href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byid_ktp(' . "'" . $angga->id_ktp . "','edit_ktp'" . ')"><i class="fas fa-check"></i> Sesuai</a> <a href="javascript:;" class="btn btn-danger btn-block btn-sm" onClick="byid_ktp(' . "'" . $angga->id_ktp . "','hapus_ktp'" . ')">  <i class="fas fa-times"></i> Tidak Sesuai</a>';
			} else if ($angga->status_sesuai == 1) {
				$row[] = '<button disabled href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byid_ktp(' . "'" . $angga->id_ktp . "','edit_ktp'" . ')"><i class="fas fa-check"></i> Sesuai</button> <a href="javascript:;" class="btn btn-danger btn-block btn-sm" onClick="byid_ktp(' . "'" . $angga->id_ktp . "','hapus_ktp'" . ')">  <i class="fas fa-times"></i> Tidak Sesuai</a>';
			}
			$data[] = $row;
			// <a href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byid_nib(' . "'" . $angga->id_nib . "','edit_nib'" . ')"><i class="fas fa-edit"></i> Edit</a>
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Vendor_model->count_all_data_ktp($id_vendor),
			"recordsFiltered" => $this->Vendor_model->count_filtered_ktp($id_vendor),
			"data" => $data,
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function approve_ktp()
	{
		$data = [
			'status_sesuai' => 1,
			'alasan' => $this->input->post('alasan')
		];
		$this->Vendor_model->update_ktp(array('id_ktp' => $this->input->post('id_ktp')), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function approve_ktp2()
	{
		$data = [
			'status_sesuai' => 0,
			'alasan' => $this->input->post('alasan')
		];
		$this->Vendor_model->update_ktp(array('id_ktp' => $this->input->post('id_ktp')), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function get_byid_ktp($id_ktp)
	{
		$ktp = $this->Vendor_model->get_byid_ktp($id_ktp);
		$ktp = [
			"ktp" => $ktp,
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($ktp));
	}

	public function delete_ktp($id_ktp)
	{
		$data = $this->Vendor_model->deletedata_ktp($id_ktp);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}
	// END KTP

	// SBU
	public function data_get_sbu($id_vendor)
	{
		$resultss = $this->Vendor_model->getdatatable_sbu($id_vendor);
		$no = $_POST['start'];
		// $total = 0;
		$data = [];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			if ($angga->masa_berlaku_seumur_hidup == 1) {
				$row[] = 'SEUMUR HIDUP';
			} else if ($angga->masa_berlaku_seumur_hidup == NULL || $angga->masa_berlaku_seumur_hidup == 0) {
				$row[] = $angga->masa_berlaku_awal . ' S/D ' . $angga->masa_berlaku_akhir;
			}
			$row[] = '<a href="https://vms.jmtm.co.id/file_bukti_sbu/' . $angga->file_bukti_sbu_vendor . '">' . '<img width="40px" src=' . base_url('assets/img/pdf.png') . ' >' . '</a>';
			if ($angga->status_sesuai == 0 || $angga->status_sesuai == NULL) {
				$row[] = '<a href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byid_sbu(' . "'" . $angga->id_sbu . "','edit_sbu'" . ')"><i class="fas fa-check"></i> Sesuai</a> <a href="javascript:;" class="btn btn-danger btn-block btn-sm" onClick="byid_sbu(' . "'" . $angga->id_sbu . "','hapus_sbu'" . ')">  <i class="fas fa-times"></i> Tidak Sesuai</a>';
			} else if ($angga->status_sesuai == 1) {
				$row[] = '<button disabled href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byid_sbu(' . "'" . $angga->id_sbu . "','edit_sbu'" . ')"><i class="fas fa-check"></i> Sesuai</button> <a href="javascript:;" class="btn btn-danger btn-block btn-sm" onClick="byid_sbu(' . "'" . $angga->id_sbu . "','hapus_sbu'" . ')">  <i class="fas fa-times"></i> Tidak Sesuai</a>';
			}
			$data[] = $row;
			// <a href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byid_nib(' . "'" . $angga->id_nib . "','edit_nib'" . ')"><i class="fas fa-edit"></i> Edit</a>
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Vendor_model->count_all_data_sbu($id_vendor),
			"recordsFiltered" => $this->Vendor_model->count_filtered_sbu($id_vendor),
			"data" => $data,
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function approve_sbu()
	{
		$data = [
			'status_sesuai' => 1,
			'alasan' => $this->input->post('alasan')
		];
		$this->Vendor_model->update_sbu(array('id_sbu' => $this->input->post('id_sbu')), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function approve_sbu2()
	{
		$data = [
			'status_sesuai' => 0,
			'alasan' => $this->input->post('alasan')
		];
		$this->Vendor_model->update_sbu(array('id_sbu' => $this->input->post('id_sbu')), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function get_byid_sbu($id_sbu)
	{
		$sbu = $this->Vendor_model->get_byid_sbu($id_sbu);
		$sbu = [
			"sbu" => $sbu,
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($sbu));
	}

	public function delete_sbu($id_sbu)
	{
		$data = $this->Vendor_model->deletedata_sbu($id_sbu);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}
	//END SBU

	// DOMISILI
	public function data_get_domisili($id_vendor)
	{
		$resultss = $this->Vendor_model->getdatatable_domisili($id_vendor);
		$no = $_POST['start'];
		// $total = 0;
		$data = [];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			if ($angga->masa_berlaku_seumur_hidup == 1) {
				$row[] = 'SEUMUR HIDUP';
			} else if ($angga->masa_berlaku_seumur_hidup == NULL || $angga->masa_berlaku_seumur_hidup == 0) {
				$row[] = $angga->masa_berlaku_awal . ' S/D ' . $angga->masa_berlaku_akhir;
			}
			$row[] = '<a href="https://vms.jmtm.co.id/file_bukti_domisili/' . $angga->file_bukti_domisili_vendor . '">' . '<img width="40px" src=' . base_url('assets/img/pdf.png') . ' >' . '</a>';
			if ($angga->status_sesuai == 0 || $angga->status_sesuai == NULL) {
				$row[] = '<a href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byid_domisili(' . "'" . $angga->id_domisili . "','edit_domisili'" . ')"><i class="fas fa-check"></i> Sesuai</a> <a href="javascript:;" class="btn btn-danger btn-block btn-sm" onClick="byid_domisili(' . "'" . $angga->id_domisili . "','hapus_domisili'" . ')">  <i class="fas fa-times"></i> Tidak Sesuai</a>';
			} else if ($angga->status_sesuai == 1) {
				$row[] = '<button disabled href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byid_domisili(' . "'" . $angga->id_domisili . "','edit_domisili'" . ')"><i class="fas fa-check"></i> Sesuai</button> <a href="javascript:;" class="btn btn-danger btn-block btn-sm" onClick="byid_domisili(' . "'" . $angga->id_domisili . "','hapus_domisili'" . ')">  <i class="fas fa-times"></i> Tidak Sesuai</a>';
			}
			$data[] = $row;
			// <a href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byid_nib(' . "'" . $angga->id_nib . "','edit_nib'" . ')"><i class="fas fa-edit"></i> Edit</a>
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Vendor_model->count_all_data_domisili($id_vendor),
			"recordsFiltered" => $this->Vendor_model->count_filtered_domisili($id_vendor),
			"data" => $data,
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function approve_domisili()
	{
		$data = [
			'status_sesuai' => 1,
			'alasan' => $this->input->post('alasan')
		];
		$this->Vendor_model->update_domisili(array('id_domisili' => $this->input->post('id_domisili')), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function approve_domisili2()
	{
		$data = [
			'status_sesuai' => 0,
			'alasan' => $this->input->post('alasan')
		];
		$this->Vendor_model->update_domisili(array('id_domisili' => $this->input->post('id_domisili')), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function get_byid_domisili($id_domisili)
	{
		$sbu = $this->Vendor_model->get_byid_domisili($id_domisili);
		$sbu = [
			"domisili" => $sbu,
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($sbu));
	}

	public function delete_domisili($id_domisili)
	{
		$data = $this->Vendor_model->deletedata_domisili($id_domisili);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}
	//END DOMISILI

	// BAGAN
	public function data_get_bagan($id_vendor)
	{

		$resultss = $this->Vendor_model->getdatatable_bagan($id_vendor);
		$no = $_POST['start'];
		// $total = 0;
		$data = [];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			if ($angga->masa_berlaku_seumur_hidup == 1) {
				$row[] = 'SEUMUR HIDUP';
			} else if ($angga->masa_berlaku_seumur_hidup == NULL || $angga->masa_berlaku_seumur_hidup == 0) {
				$row[] = $angga->masa_berlaku_awal . ' S/D ' . $angga->masa_berlaku_akhir;
			}
			$row[] = '<a href="https://vms.jmtm.co.id/file_bukti_bagan/' . $angga->file_bukti_bagan_vendor . '">' . '<img width="40px" src=' . base_url('assets/img/pdf.png') . ' >' . '</a>';
			if ($angga->status_sesuai == 0 || $angga->status_sesuai == NULL) {
				$row[] = '<a href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byid_bagan(' . "'" . $angga->id_bagan . "','edit_bagan'" . ')"><i class="fas fa-check"></i> Sesuai</a> <a href="javascript:;" class="btn btn-danger btn-block btn-sm" onClick="byid_bagan(' . "'" . $angga->id_bagan . "','hapus_bagan'" . ')">  <i class="fas fa-times"></i> Tidak Sesuai</a>';
			} else if ($angga->status_sesuai == 1) {
				$row[] = '<button disabled href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byid_bagan(' . "'" . $angga->id_bagan . "','edit_bagan'" . ')"><i class="fas fa-check"></i> Sesuai</button> <a href="javascript:;" class="btn btn-danger btn-block btn-sm" onClick="byid_bagan(' . "'" . $angga->id_bagan . "','hapus_bagan'" . ')">  <i class="fas fa-times"></i> Tidak Sesuai</a>';
			}
			$data[] = $row;
			// <a href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byid_nib(' . "'" . $angga->id_nib . "','edit_nib'" . ')"><i class="fas fa-edit"></i> Edit</a>
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Vendor_model->count_all_data_bagan($id_vendor),
			"recordsFiltered" => $this->Vendor_model->count_filtered_bagan($id_vendor),
			"data" => $data,
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function approve_bagan()
	{
		$data = [
			'status_sesuai' => 1,
			'alasan' => $this->input->post('alasan')
		];
		$this->Vendor_model->update_bagan(array('id_bagan' => $this->input->post('id_bagan')), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function approve_bagan2()
	{
		$data = [
			'status_sesuai' => 0,
			'alasan' => $this->input->post('alasan')
		];
		$this->Vendor_model->update_bagan(array('id_bagan' => $this->input->post('id_bagan')), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function get_byid_bagan($id_bagan)
	{
		$sbu = $this->Vendor_model->get_byid_bagan($id_bagan);
		$sbu = [
			"bagan" => $sbu,
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($sbu));
	}

	public function delete_bagan($id_bagan)
	{
		$data = $this->Vendor_model->deletedata_bagan($id_bagan);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}
	//END BAGAN

	// BPJS KETENAGAKERJAAN
	public function data_get_bpjs_ketenagakerjaan($id_vendor)
	{

		$resultss = $this->Vendor_model->getdatatable_bpjs_ketenagakerjaan($id_vendor);
		$no = $_POST['start'];
		// $total = 0;
		$data = [];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			if ($angga->masa_berlaku_seumur_hidup == 1) {
				$row[] = 'SEUMUR HIDUP';
			} else if ($angga->masa_berlaku_seumur_hidup == NULL || $angga->masa_berlaku_seumur_hidup == 0) {
				$row[] = $angga->masa_berlaku_awal . ' S/D ' . $angga->masa_berlaku_akhir;
			}
			$row[] = '<a href="https://vms.jmtm.co.id/file_bukti_bpjs_ketenagakerjaan/' . $angga->file_bukti_bpjs_ketenagakerjaan_vendor . '">' . '<img width="40px" src=' . base_url('assets/img/pdf.png') . ' >' . '</a>';
			if ($angga->status_sesuai == 0 || $angga->status_sesuai == NULL) {
				$row[] = '<a href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byid_bpjs_ketenagakerjaan(' . "'" . $angga->id_bpjs_ketenagakerjaan . "','edit_bpjs_ketenagakerjaan'" . ')"><i class="fas fa-check"></i> Sesuai</a> <a href="javascript:;" class="btn btn-danger btn-block btn-sm" onClick="byid_bpjs_ketenagakerjaan(' . "'" . $angga->id_bpjs_ketenagakerjaan . "','hapus_bpjs_ketenagakerjaan'" . ')">  <i class="fas fa-times"></i> Tidak Sesuai</a>';
			} else if ($angga->status_sesuai == 1) {
				$row[] = '<button disabled href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byid_bpjs_ketenagakerjaan(' . "'" . $angga->id_bpjs_ketenagakerjaan . "','edit_bpjs_ketenagakerjaan'" . ')"><i class="fas fa-check"></i> Sesuai</button> <a href="javascript:;" class="btn btn-danger btn-block btn-sm" onClick="byid_bpjs_ketenagakerjaan(' . "'" . $angga->id_bpjs_ketenagakerjaan . "','hapus_bpjs_ketenagakerjaan'" . ')">  <i class="fas fa-times"></i> Tidak Sesuai</a>';
			}
			$data[] = $row;
			// <a href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byid_nib(' . "'" . $angga->id_nib . "','edit_nib'" . ')"><i class="fas fa-edit"></i> Edit</a>
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Vendor_model->count_all_data_bpjs_ketenagakerjaan($id_vendor),
			"recordsFiltered" => $this->Vendor_model->count_filtered_bpjs_ketenagakerjaan($id_vendor),
			"data" => $data,
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function approve_bpjsketenagakerjaan()
	{
		$data = [
			'status_sesuai' => 1,
			'alasan' => $this->input->post('alasan')
		];
		$this->Vendor_model->update_bpjs_ketenagakerjaan(array('id_bpjs_ketenagakerjaan' => $this->input->post('id_bpjs_ketenagakerjaan')), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function approve_bpjsketenagakerjaan2()
	{
		$data = [
			'status_sesuai' => 0,
			'alasan' => $this->input->post('alasan')
		];
		$this->Vendor_model->update_bpjs_ketenagakerjaan(array('id_bpjs_ketenagakerjaan' => $this->input->post('id_bpjs_ketenagakerjaan')), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function get_byid_bpjs_ketenagakerjaan($id_bpjs_ketenagakerjaan)
	{
		$sbu = $this->Vendor_model->get_byid_bpjs_ketenagakerjaan($id_bpjs_ketenagakerjaan);
		$sbu = [
			"id_bpjs_ketenagakerjaan" => $sbu,
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($sbu));
	}

	public function delete_bpjs_ketenagakerjaan($id_bpjs_ketenagakerjaan)
	{
		$data = $this->Vendor_model->deletedata_bpjs_ketenagakerjaan($id_bpjs_ketenagakerjaan);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}
	//END BPJS KETENAGAKERJAAN

	// BPJS BPJS KESEHATAN
	public function data_get_bpjs_kesehatan($id_vendor)
	{

		$resultss = $this->Vendor_model->getdatatable_bpjs_kesehatan($id_vendor);
		$no = $_POST['start'];
		// $total = 0;
		$data = [];
		foreach ($resultss as $angga) {
			$row = array();
			$row[] = ++$no;
			if ($angga->masa_berlaku_seumur_hidup == 1) {
				$row[] = 'SEUMUR HIDUP';
			} else if ($angga->masa_berlaku_seumur_hidup == NULL || $angga->masa_berlaku_seumur_hidup == 0) {
				$row[] = $angga->masa_berlaku_awal . ' S/D ' . $angga->masa_berlaku_akhir;
			}
			$row[] = '<a href="https://vms.jmtm.co.id/file_bukti_bpjs_kesehatan/' . $angga->file_bukti_bpjs_kesehatan_vendor . '">' . '<img width="40px" src=' . base_url('assets/img/pdf.png') . ' >' . '</a>';
			if ($angga->status_sesuai == 0 || $angga->status_sesuai == NULL) {
				$row[] = '<a href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byid_bpjs_kesehatan(' . "'" . $angga->id_bpjs_kesehatan . "','edit_bpjs_kesehatan'" . ')"><i class="fas fa-check"></i> Sesuai</a> <a href="javascript:;" class="btn btn-danger btn-block btn-sm" onClick="byid_bpjs_kesehatan(' . "'" . $angga->id_bpjs_kesehatan . "','hapus_bpjs_kesehatan'" . ')">  <i class="fas fa-times"></i> Tidak Sesuai</a>';
			} else if ($angga->status_sesuai == 1) {
				$row[] = '<button disabled href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byid_bpjs_kesehatan(' . "'" . $angga->id_bpjs_kesehatan . "','edit_bpjs_kesehatan'" . ')"><i class="fas fa-check"></i> Sesuai</button> <a href="javascript:;" class="btn btn-danger btn-block btn-sm" onClick="byid_bpjs_kesehatan(' . "'" . $angga->id_bpjs_kesehatan . "','hapus_bpjs_kesehatan'" . ')">  <i class="fas fa-times"></i> Tidak Sesuai</a>';
			}
			$data[] = $row;
			// <a href="javascript:;" class="btn btn-success btn-block btn-sm" onClick="byid_nib(' . "'" . $angga->id_nib . "','edit_nib'" . ')"><i class="fas fa-edit"></i> Edit</a>
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Vendor_model->count_all_data_bpjs_kesehatan($id_vendor),
			"recordsFiltered" => $this->Vendor_model->count_filtered_bpjs_kesehatan($id_vendor),
			"data" => $data,
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}


	public function approve_bpjskesehatan()
	{
		$data = [
			'status_sesuai' => 1,
			'alasan' => $this->input->post('alasan')
		];
		$this->Vendor_model->update_bpjs_kesehatan(array('id_bpjs_kesehatan' => $this->input->post('id_bpjs_kesehatan')), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function approve_bpjskesehatan2()
	{
		$data = [
			'status_sesuai' => 0,
			'alasan' => $this->input->post('alasan')
		];
		$this->Vendor_model->update_bpjs_kesehatan(array('id_bpjs_kesehatan' => $this->input->post('id_bpjs_kesehatan')), $data);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function get_byid_bpjs_kesehatan($id_bpjs_kesehatan)
	{
		$sbu = $this->Vendor_model->get_byid_bpjs_kesehatan($id_bpjs_kesehatan);
		$sbu = [
			"id_bpjs_kesehatan" => $sbu,
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($sbu));
	}

	public function delete_bpjs_kesehatan($id_bpjs_kesehatan)
	{
		$data = $this->Vendor_model->deletedata_bpjs_kesehatan($id_bpjs_kesehatan);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}
	//END BPJS KESEHATAN
}
