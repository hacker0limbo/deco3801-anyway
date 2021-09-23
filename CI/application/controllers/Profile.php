<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	// index page for user profile
	public function index()
	{
		$this->load->view('header');
		$this->load->view('userProfile');
		$this->load->view('footer');
	}
}