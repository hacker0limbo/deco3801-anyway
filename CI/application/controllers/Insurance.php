<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Insurance extends CI_Controller {
	public function index() {
    // index page for medical service
    // if no session stored, set langauge to english by default
		if(!$this->session->userdata('language')) {
			$user_data = array (
				'language' => 'english'
			);
			$this->session->set_userdata($user_data);
		}
		$language = $this->session->userdata('language');
		$header_lang = $this->lang->load('header_'.$language,$language, $return = TRUE);
		$medInsurance_lang = $this->lang->load('medInsurance_'.$language,$language,$return = TRUE);

		// load views with language information
		$this->load->view('header', $header_lang);
		$this->load->view('medInsurance', $medInsurance_lang);
		$this->load->view('footer');
	}

  public function student() {
    // clinic or surgery
    // if no session stored, set langauge to english by default
		if(!$this->session->userdata('language')) {
			$user_data = array (
				'language' => 'english'
			);
			$this->session->set_userdata($user_data);
		}
		$language = $this->session->userdata('language');
		$header_lang = $this->lang->load('header_'.$language,$language, $return = TRUE);
		$studentInsurance_lang = $this->lang->load('studentInsurance_'.$language,$language,$return = TRUE);

		// load views with language information
		$this->load->view('header', $header_lang);
		$this->load->view('studentInsurance', $studentInsurance_lang);
		$this->load->view('footer');
  }

  public function visitor() {
    // medical centre
    // if no session stored, set langauge to english by default
		if(!$this->session->userdata('language')) {
			$user_data = array (
				'language' => 'english'
			);
			$this->session->set_userdata($user_data);
		}
		$language = $this->session->userdata('language');
		$header_lang = $this->lang->load('header_'.$language,$language, $return = TRUE);
		$visitorInsurance_lang = $this->lang->load('visitorInsurance_'.$language,$language,$return = TRUE);

		// load views with language information
		$this->load->view('header', $header_lang);
		$this->load->view('visitorInsurance', $visitorInsurance_lang);
		$this->load->view('footer');
  }

  public function citizen() {
    // hospital service
    // if no session stored, set langauge to english by default
		if(!$this->session->userdata('language')) {
			$user_data = array (
				'language' => 'english'
			);
			$this->session->set_userdata($user_data);
		}
		$language = $this->session->userdata('language');
		$header_lang = $this->lang->load('header_'.$language,$language, $return = TRUE);
		$citizenInsurance_lang = $this->lang->load('citizenInsurance_'.$language,$language,$return = TRUE);

		// load views with language information
		$this->load->view('header', $header_lang);
		$this->load->view('citizenInsurance', $citizenInsurance_lang);
		$this->load->view('footer');
  }

}