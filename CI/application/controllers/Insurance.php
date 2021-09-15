<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Insurance extends CI_Controller {
	public function index() {
    // index page for medical service
		$this->load->view('header');
		$this->load->view('medInsurance');
		$this->load->view('footer');
	}

  public function student() {
    // clinic or surgery
    $this->load->view('header');
		$this->load->view('studentInsurance');
		$this->load->view('footer');
  }

  public function visitor() {
    // medical centre
    $this->load->view('header');
		$this->load->view('visitorInsurance');
		$this->load->view('footer');
  }

  public function citizen() {
    // hospital service
    $this->load->view('header');
		$this->load->view('citizenInsurance');
		$this->load->view('footer');
  }

}