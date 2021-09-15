<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {
	public function index() {
    // index page for medical service
		$this->load->view('header');
		$this->load->view('medService');
		$this->load->view('footer');
	}

  public function clinic() {
    // clinic or surgery
    $this->load->view('header');
		$this->load->view('clinicService');
		$this->load->view('footer');
  }

  public function medicalCentre() {
    // medical centre
    $this->load->view('header');
		$this->load->view('centreService');
		$this->load->view('footer');
  }

  public function hospital() {
    // hospital service
    $this->load->view('header');
		$this->load->view('hospitalService');
		$this->load->view('footer');
  }

}