<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	// index page for user profile
	public function index()
	{
		$username = $this->session->userdata('username');
		$sql = "select username,email,gender,DOB,language,medicare_status from user where username = '$username'";
		$res = $this->db->query($sql);
		foreach($res->result() as $item){
			$data['username']= $item->username;
			$data['email']= $item->email;
			$data['gender']= $item->gender;
			$data['DOB']= $item->DOB;
			$data['language']= $item->language;
			$data['medicare_status']= $item->medicare_status;
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
      	$data = array_merge($data, $userProfile_lang);
		$this->load->view('header', $header_lang);
		$this->load->view('userProfile', $data);
		}
		//$this->load->view('footer');
	}

	public function update(){
		$username = $this->session->userdata('username');
		$gender = $this->input->post('my-input');
		$DOB = $this->input->post('DOB');
		$language = $this->input->post('my-select');
		$medicare_status = $this->input->post('status');
		$sql="update user set gender='$gender',DOB='$DOB',language='$language',medicare_status='$medicare_status' where username = '$username'";
		$this->db->query($sql);
		$sql = "select username,email,gender,DOB,language,medicare_status from user where username = '$username'";
		$res = $this->db->query($sql);
		foreach($res->result() as $item){
			$data['username']= $item->username;
			$data['email']= $item->email;
			$data['gender']= $item->gender;
			$data['DOB']= $item->DOB;
			$data['language']= $item->language;
			$data['medicare_status']= $item->medicare_status;
			
		}
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
		$data = array_merge($data, $userProfile_lang);
		$this->load->view('header', $header_lang);
		$this->load->view('userProfile', $data);
		
	}

	public function email(){
		$username = $this->session->userdata('username');
		$new_email = $this->input->post('new_email');
		$sql="update user set email = '$new_email' where username = '$username'";
		$this->db->query($sql);
		$sql = "select username,email,gender,DOB,language,medicare_status from user where username = '$username'";
		$res = $this->db->query($sql);
		foreach($res->result() as $item){
			$data['username']= $item->username;
			$data['email']= $item->email;
			$data['gender']= $item->gender;
			$data['DOB']= $item->DOB;
			$data['language']= $item->language;
			$data['medicare_status']= $item->medicare_status;
		}
		if(!$this->session->userdata('language')) {
			$user_data = array (
			  'language' => 'english'
		  );
		  $this->session->set_userdata($user_data);
		}
		$language = $this->session->userdata('language');
		$header_lang = $this->lang->load('header_'.$language,$language, $return = TRUE);
		$userProfile_lang = $this->lang->load('userProfile_'.$language,$language, $return = TRUE);
		$data = array_merge($data, $userProfile_lang);
		$this->load->view('header', $header_lang);
		$this->load->view('userProfile', $data);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');
		$value=$this->form_validation->run();
		
	}
}