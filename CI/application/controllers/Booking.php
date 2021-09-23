<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {

	// booking homepage
	public function index() {
		$this->load->view('header');
		$this->load->view('bookingHomepage');
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