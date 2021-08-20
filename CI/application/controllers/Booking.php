<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {

	// booking homepage
	public function index()
	{
		$this->load->view('header');
		$this->load->view('bookingHomepage');
		$this->load->view('footer');
	}
}