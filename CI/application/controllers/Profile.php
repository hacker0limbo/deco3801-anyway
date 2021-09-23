<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	// index page for user profile
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
		$userProfile_lang = $this->lang->load('userProfile_'.$language,$language, $return = TRUE);
		$this->load->view('header', $header_lang);
		$this->load->view('userProfile', $userProfile_lang);
		$this->load->view('footer');
	}
}