<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	// index page
	public function index()
	{
		$this->load->view('header');
		$this->load->view('homepage');
		$this->load->view('footer');
	}
}
