<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checker extends CI_Controller {

	// index page
	public function index()
	{
		$this->load->view('header');
		$this->load->view('symptomCheck');
		$this->load->view('footer');
	}
}