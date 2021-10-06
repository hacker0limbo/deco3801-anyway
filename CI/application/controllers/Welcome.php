<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	// index page
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
		$homepage_lang = $this->lang->load('homepage_'.$language,$language,$return = TRUE);

		// load views with language information
		$this->load->view('header', $header_lang);
		$this->load->view('homepage', $homepage_lang);
		$this->load->view('footer');
	}


	// switch langauge
	public function toEnglish() {
		$user_data = array (
			'language' => 'english'
		);
		$this->session->set_userdata($user_data);
		redirect($_SERVER['HTTP_REFERER']);
		
	}

	public function toChinese() {
		$user_data = array (
			'language' => 'chinese'
		);
		$this->session->set_userdata($user_data);
		redirect($_SERVER['HTTP_REFERER']);
		
	}

}
