<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	// index page
	public function index()
	{
		$this->load->view('header');
		$this->load->view('logIn');
		$this->load->view('footer');
	}
}