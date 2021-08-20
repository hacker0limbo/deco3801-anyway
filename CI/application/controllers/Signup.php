<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

	// index page
	public function index()
	{
		$this->load->view('header');
		$this->load->view('signUp');
		$this->load->view('footer');
	}
}