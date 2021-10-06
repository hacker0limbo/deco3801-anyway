<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	// index page
	// if already logged in, load homepage
	// if remembered, load homepage
	// set relevant values in session/cookies
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
		$login_lang = $this->lang->load('login_'.$language,$language, $return = TRUE);
		$this->load->view('header', $header_lang);
		$this->load->view('login', $login_lang);
		$this->load->view('footer');
	}


	// submit login form and validate user information
	// set relecant values in session/cookies
	// fail -> show error message
	// success -> show homepage 
	public function validate_login() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$remember = $this->input->post('remember');

		//Set form_validation error html format
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert" style="margin-top:5px;">','</div>');
		//Set form_validation rules for each input 1.Username 2.Password
		$this->form_validation->set_rules('username', 'Username', 'required|trim|callback_check_username');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|callback_check_password');

		//if user not logged in
		if(!$this->session->userdata('logged_in')) {
			//if username or password are incorrect return login page displat error message
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
				$login_lang = $this->lang->load('login_'.$language,$language, $return = TRUE);
				$this->load->view('header', $header_lang);
				$this->load->view('login', $login_lang);
				$this->load->view('footer');
			} else {
				//get user information
				$user_info = $this->user_model->user_info($username);

				//assign user information to an array
				$user_data = array (
					'username' => $user_info['username'],
					'password' => $user_info['password'],
					'email' => $user_info['email'],
					'logged_in' => true
				);

				//set session data
				$this->session->set_userdata($user_data);

				//if remember me is active create cookie
				if($remember) {
					set_cookie("username", $username, '300'); //set cookie username
					set_cookie("password", $password, '300'); //set cookie password
					set_cookie("remember", $remember, '300'); //set cookie remember
				}

				
				//all success means login and redirect to homepage then show success message
				$this->session->set_flashdata('login', 'Welcome to Anyway Medicare System');
				$homepage = base_url().'welcome';
				header("Location: $homepage");
			}
		} else {
			redirect('welcome');
		}
	}


	//check if the username is exist in database
	public function check_username() {
		$username = $this->input->post('username');
		$this->form_validation->set_message('check_username', 'Username does not exist or incorrect');
		if($this->user_model->check_username($username)) {
			return true;
		} else {
			return false;
		}
	}

	//check the username and password are correct
	public function check_password() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->form_validation->set_message('check_password', 'Password incorrect. Please try again. ');
		if($this->user_model->check_password($username, $password)) {
			return true;
		} else {
			return false;
		}
	}

	// log user out
	// clear session and cookies
	public function logout() {
		//delete login status
		$this->session->unset_userdata('logged_in'); 
		//delete cookie
		delete_cookie("username");
		delete_cookie("password");
		delete_cookie("remember");

		//back to homepage when logout
		$homepage = base_url().'welcome';
		header("Location: $homepage");

	}



}