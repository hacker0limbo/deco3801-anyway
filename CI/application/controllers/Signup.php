<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

	// index page
	// load sign up form
	public function index() {
		$this->load->view('header');
		$this->load->view('signup');
		$this->load->view('footer');
	}


	// sign up new account
	// validate form information (unique username, valid email, password strength)
	// send email validation with verify link
	public function validate_signup() {
		//Check if user have already logged in
		//TRUE -> direct to homepage
		//FALSE -> continuous signup process
		if($this->session->userdata('logged_in')) {
			$homepage = base_url();
			header("Location: $home");
		}

		//Set form_validation error html format
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert" style="margin-top:5px;">','</div>');
		//Set form_validation rules for each input 1.Username 2.Password 3.Email
		$this->form_validation->set_rules('username', 'Username', 'required|trim|callback_username_exists');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|callback_check_password');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|callback_check_email_exists');

		//Check all inputs by run form_validation 
		//TRUE -> add new user into database 
		//FALSE -> redirect signup page and show error messages
		if($this->form_validation->run() === FALSE) {
			$this->load->view('header');
			$this->load->view('signup');
			$this->load->view('footer');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			//Add user date into database
			$this->user->signup($username, $password);

			//Show signup success message and direct to homepage
			$this->session->set_flashdata('signup', 'You are now registered! Log in now!');
			redirect('welcome');
		}
	}

	//username validation
	//check if the username already exists in the database return TRUE if unexists
	public function username_exists() {


	}

	// email validation
	// user open the verify link, set up verify status in database
	public function email_verification() {
		
	}



}