<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

	// index page
	// load sign up form
	public function index() {
		$this->load->view('header');
		$this->load->view('signUp');
		$this->load->view('footer');
	}


	// sign up new account
	// validate form information (unique username, valid email, password strength)
	// send email validation
	public function validate_signup() {

	}



}