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
}