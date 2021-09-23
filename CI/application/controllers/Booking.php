<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {

	// booking homepage
	public function index() {
		// if no session stored, set langauge to english by default
		if(!$this->session->userdata('language')) {
			$user_data = array (
				'language' => 'english'
			);
			$this->session->set_userdata($user_data);
		}
		$language = $this->session->userdata('language');
		$header_lang = $this->lang->load('header_'.$language,$language, $return = TRUE);
		$bookingHomepage_lang = $this->lang->load('bookingHomepage_'.$language,$language, $return = TRUE);
		$this->load->view('header', $header_lang);
		$this->load->view('bookingHomepage',$bookingHomepage_lang);
		$this->load->view('footer');
	}


	// load doctor information page
	public function loadDoctor() {
		$this->load->view('header');
		$this->load->view('bookingDoctor');
		$this->load->view('footer');
	}


	// load book appointment page (filter, map, etc)
	public function loadBook() {
		$this->load->view('header');
		$this->load->view('bookingBook');
		$this->load->view('footer');
	}

	
	// comfirm appointment and load comfirm page
	public function comfirmBooking() {
		// get 用户选择的appointment信息， pass到 bookingComfirm页面
	}


	// booking success
	public function bookingSuccess() {
		// comfirmbooking页面确认之后call这个function，把预定信息存在数据库里，同时发邮件给用户
		//load successmessage
	}
}