<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CheckerApi extends CI_Controller {
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

		// load views with language information
		$this->load->view('header', $header_lang);
		$this->load->view('checkerApi');
		$this->load->view('footer');
	}

}