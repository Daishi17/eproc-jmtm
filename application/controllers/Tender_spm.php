<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Tender_spm extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Uat_model');
		$this->load->model('Panitia/Rolepanitia_model');
		$this->load->model('Paket/Paket_model');
		$this->load->model('Rup/Rup_model');
	}

	public function index()
	{
		$id_role =  $this->session->userdata('id_role');
		$id_pegawai = $this->session->userdata('id_pegawai');
		$id_role = $this->session->userdata('id_role');
		// var_dump($id_role);
		// die;
		$data['getdivisi'] = $this->Rup_model->get_devisi();
		$data['status_penetapan_langsung'] = $this->Rolepanitia_model->cek_role_penetapan($id_pegawai);
		$this->load->view('template/header');
		$this->load->view('template/navlogin', $data);
		$this->load->view('tender_spm/index');
		$this->load->view('template/footer');
		$this->load->view('tender_spm/ajax');
	}


	public function data_get_tender_spm()
	{
		$result = $this->Paket_model->getdatatable_spm();
		$data = [];
		$no = $_POST['start'];
		foreach ($result as $panitia) {
			$row = array();
			$row[] = ++$no;
			if ($panitia->status_paket_tender == 0) {
				$row[] = '<label class="badge badge-info"> Dalam Proses Pembuatan Paket </label>';
			} else {
				$row[] = $panitia->kode_tender;
			}
			$row[] = $panitia->nama_paket;
			$row[] = $panitia->nama_jenis_pengadaan;
			$row[] = $panitia->nama_metode_pemilihan;
			$row[] = $panitia->nama_panitia;
			if ($panitia->sts_spm == 1) {
				$row[] = '<label class="badge badge-danger"> Belum Di Konfirmasi </label>';
			} else {
				$row[] = '<label class="badge badge-success"> Sudah Di Konfirmasi </label>';
			}

			if ($panitia->sts_spm == 1) {
				$row[] = '<a href="javascript:;" class="btn btn-success btn-sm" onClick="by_id(' . "'" . $panitia->id_paket . "','konfirmasi'" . ')"><i class="fas fa-check"></i> Konfirmasi</a>';
			} else {
				$row[] = '<a href="javascript:;" class="btn btn-danger btn-sm" onClick="by_id(' . "'" . $panitia->id_paket . "','batal_konfirmasi'" . ')"><i class="fas fa-times"></i> Batal Konfirmasi</a>';
			}


			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Paket_model->count_all_data_spm(),
			"recordsFiltered" => $this->Paket_model->count_filtered_data_spm(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function by_id($id_paket)
	{

		$data = $this->Paket_model->get_by_id_paket($id_paket);
		$output = [
			"get_paket" => $data,
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}
	public function konfirmasi($id_paket)
	{
		$type = $this->input->post('type');
		$where = [
			'id_paket' => $id_paket
		];
		if ($type == 'konfirmasi') {
			$data = [
				'sts_spm' => 2,
				'notif_spm' => 2,
			];
			$this->Paket_model->update_batal_tender($where, $data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		} else {
			$data = [
				'sts_spm' => 1,
				'notif_spm' => 1,
			];
			$this->Paket_model->update_batal_tender($where, $data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}
}
