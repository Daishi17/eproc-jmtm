<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ukpbj extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{

		$this->load->view('template/header');
		$this->load->view('template/navlogin');
		$this->load->view('ukpbj/index');
		$this->load->view('template/footer');
		$this->load->view('ukpbj/ajax');
	}


	public function tambah_ukpbj()
	{

		$this->load->view('template/header');
		$this->load->view('template/navlogin');
		$this->load->view('ukpbj/tambah_ukpbj');
		$this->load->view('template/footer');
		$this->load->view('ukpbj/ajax');
	}

	public function edit_ukpbj()
	{

		$this->load->view('template/header');
		$this->load->view('template/navlogin');
		$this->load->view('ukpbj/edit_ukpbj');
		$this->load->view('template/footer');
		$this->load->view('ukpbj/ajax');
	}


	public function fetch_ukpbj()
	{
		$data = array();
		for ($i = 0; $i < 1; $i++) {
			$row = array();
			$row[] = '28891';
			$row[] = '<a href="ukpbj/edit_ukpbj">UKPBJ LKPP</a>';
			$row[] = 'Jl. Epicentrum Tengah Lot 11 B, Jakarta Selatan, DKI Jakarta';
			$row[] = '219898898';
			$row[] = '219898898';
			$row[] = '24 Juni 2018';
			$data[] = $row;
		}
		$output = array(
			"data" => $data,
		);
		header('Content-Type: application/json');
		echo json_encode($output);
	}
}
