<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checker extends CI_Controller {

	// index page
	// load symptomCheck page
	public function index()
	{
		$this->load->view('header');
		$this->load->view('symptomCheck');
		$this->load->view('footer');
	}

	// load online chat page
	public function liveChat() {
		if ($this->session->userdata('logged_in')) {
			// if user logged in, show chat, else redirect to login page
			$this->load->view('header');
			$this->load->view('liveChat');
			$this->load->view('footer');
		} else {
			redirect('login', 'refresh');
		}
	}
}