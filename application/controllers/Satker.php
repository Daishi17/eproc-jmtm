<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Satker extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{

		$this->load->view('template/header');
		$this->load->view('template/navlogin');
		$this->load->view('satker/index');
		$this->load->view('template/footer');
		$this->load->view('satker/ajax');
	}

	public function fetch_satker()
	{
		$data = array();
		for ($i = 0; $i < 0; $i++) {
			$row = array();
			$row[] = '313999';
			$row[] = '<a href="subagency/detail_subagency">Agency 1</a>';
			$row[] = 'Epicentrum Tengah';
			$row[] = '021999999';
			$row[] = 'AGENCY 1';
			$data[] = $row;
		}
		$output = array(
			"data" => $data,
		);
		header('Content-Type: application/json');
		echo json_encode($output);
	}
}
