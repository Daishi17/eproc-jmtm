<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Enkrip extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library('form_validation');
      $this->load->library('encryption');
   }
   public function index()
   {
      $angga = "pramsco";
      $ciphertext = $this->encryption->encrypt($angga);
      echo $ciphertext;
      echo $this->encryption->decrypt('b0cbe82e86243c1b91be475aa8b14a059e7e44ce6a6f0cea0886b403143bb6e5697527c7fee4anggagantengb1fcad092e4502045e48ed7f0743c34027121536ff9a7da4e05cRCa2rgN8eeQN7knYuCQjRKjWtMDAZndyC0KgsgLrM8s');
      // $this->load->view('template/header');
      // $this->load->view('template/navlogin');
      // $this->load->view('enkripsi/index');
      // $this->load->view('template/footer');
   }
}
