<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checker extends CI_Controller {

	// index page
	// load symptomCheck page
	public function index()
	{
		// if no session stored, set langauge to english by default
		if(!$this->session->userdata('language')) {
			$user_data = array (
				'language' => 'english'
			);
			$this->session->set_userdata($user_data);
		}
		$language = $this->session->userdata('language');
		$header_lang = $this->lang->load('header_'.$language,$language, $return = TRUE);
		$symptomCheck_lang = $this->lang->load('symptomCheck_'.$language,$language, $return = TRUE);
		$this->load->view('header', $header_lang);
		$this->load->view('symptomCheck', $symptomCheck_lang);
		$this->load->view('footer');
	}

	// load online chat page
	public function liveChat() {
		if ($this->session->userdata('logged_in')) {
			// if user logged in, show chat, else redirect to login page
			// if no session stored, set langauge to english by default
			if(!$this->session->userdata('language')) {
				$user_data = array (
					'language' => 'english'
				);
				$this->session->set_userdata($user_data);
			}
			$language = $this->session->userdata('language');
			$header_lang = $this->lang->load('header_'.$language,$language, $return = TRUE);
			$liveChat_lang = $this->lang->load('liveChat_'.$language,$language, $return = TRUE);
			$this->load->view('header', $header_lang);
			$this->load->view('liveChat', $liveChat_lang);
			$this->load->view('footer');
		} else {
			redirect('login', 'refresh');
		}
	}
}