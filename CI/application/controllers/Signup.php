<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

	// index page
	// load sign up form
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
		$signup_lang = $this->lang->load('signup_'.$language,$language, $return = TRUE);

		$this->load->view('header', $header_lang);
		$this->load->view('signup', $signup_lang);
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
		$this->form_validation->set_rules('username', 'Username', 'required|trim|callback_valid_username');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|callback_valid_password');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('agreement', 'agreement', 'required');


		//Check all inputs by run form_validation 
		//TRUE -> add new user into database 
		//FALSE -> redirect signup page and show error messages
		if($this->form_validation->run() === FALSE) {
			// if no session stored, set langauge to english by default
			if(!$this->session->userdata('language')) {
				$user_data = array (
					'language' => 'english'
				);
				$this->session->set_userdata($user_data);
			}
			$language = $this->session->userdata('language');
			$header_lang = $this->lang->load('header_'.$language,$language, $return = TRUE);
			$signup_lang = $this->lang->load('signup_'.$language,$language, $return = TRUE);

			$this->load->view('header', $header_lang);
			$this->load->view('signup', $signup_lang);
			$this->load->view('footer');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			//Add user date into database
			$this->user_model->signup($username, $password);

			//Show signup success message and direct to login page
			$this->session->set_flashdata('signup', 'You are now registered! &nbsp Log in now!');
			redirect('login');
		}
	}

	//check username validation
	//if the username already exists in the database return TRUE if unexists
	public function valid_username($username) {
		$this->form_validation->set_message('valid_username', 
			'Username have been used. Please choose a different one');
        if($this->user_model->valid_username($username)){
            return true;
        } else {
            return false;
        }
	}

	//check password validation
	//if the password strength is strong enough return TRUE
	public function valid_password($password) {
		if (preg_match("/^[^0-9]*$/", $password)) {
            $this->form_validation->set_message('valid_password',
            'Password must contain numbers');
            return FALSE; //No words
        } else if (preg_match("/^[^a-zA-Z]*$/", $password)) {
            $this->form_validation->set_message('valid_password',
            'Password must contain characters');
            return FALSE; //No number
        } else if (strlen($password) < 3) {
            $this->form_validation->set_message('valid_password',
            'Password should more than 3 digits');
            return FALSE; //too short
        } else if (strlen($password) > 10) {
            $this->form_validation->set_message('valid_password',
            'Password should less than 10 digits');
            return FALSE; //too long
        }
        else {
            return TRUE;
        }
	}

	// check email validation
	// user open the verify link, set up verify status in database
	public function email_verification() {
		
	}



}