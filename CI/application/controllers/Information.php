<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Information extends CI_Controller {

	// index page for medical information
	public function index()
	{
		$this->load->view('header');
		$this->load->view('medInformation');
		$this->load->view('footer');
	}

	// load the medical services page
	public function loadMedService()
	{
		$this->load->view('header');
		$this->load->view('medService');
		$this->load->view('footer');
	}

	// load the medical insurance page
	public function loadMedInsurance()
	{
		$this->load->view('header');
		$this->load->view('medInsurance');
		$this->load->view('footer');
	}


}