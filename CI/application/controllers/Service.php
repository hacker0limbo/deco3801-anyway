<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {
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
		$medService_lang = $this->lang->load('medService_'.$language,$language, $return = TRUE);
		$this->load->view('header', $header_lang);
		$this->load->view('medService', $medService_lang);
		$this->load->view('footer');
	}

  public function serviceType() {
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
		$serviceType_lang = $this->lang->load('serviceType_'.$language,$language, $return = TRUE);
		$this->load->view('header', $header_lang);
		$this->load->view('serviceType', $serviceType_lang);
		$this->load->view('footer');
  }

  public function medicalProcess() {
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
		$medicalProcess_lang = $this->lang->load('medicalProcess_'.$language,$language, $return = TRUE);
		$this->load->view('header', $header_lang);
		$this->load->view('medicalProcess', $medicalProcess_lang);
		$this->load->view('footer');
  }

//   public function hospital() {
//     // hospital service
//     // if no session stored, set langauge to english by default
// 		if(!$this->session->userdata('language')) {
// 			$user_data = array (
// 				'language' => 'english'
// 			);
// 			$this->session->set_userdata($user_data);
// 		}
// 		$language = $this->session->userdata('language');
// 		$header_lang = $this->lang->load('header_'.$language,$language, $return = TRUE);
// 		$hospitalService_lang = $this->lang->load('hospitalService_'.$language,$language, $return = TRUE);
// 		$this->load->view('header', $header_lang);
// 		$this->load->view('hospitalService', $hospitalService_lang);
// 		$this->load->view('footer');
//   }

}