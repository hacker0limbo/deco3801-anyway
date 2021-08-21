<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	// index page
	// if already logged in, load homepage
	// if remembered, load homepage
	// set relevant values in session/cookies
	public function index() {
		$this->load->view('header');
		$this->load->view('logIn');
		$this->load->view('footer');
	}


	// submit login form and validate user information
	// set relecant values in session/cookies
	// fail -> show error message
	// success -> show homepage 
	public function validate_login() {

	}


	// log user out
	// clear session and cookies
	public function logout() {

	}



}