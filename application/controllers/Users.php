<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('User');
	}

	public function index()
	{
		$this->load->view('index');
	}

	public function register()
	{
		//Creating rules for form validation//
		$this->form_validation->set_rules('name', 'Name', 'required|min_length[3]');
		$this->form_validation->set_rules('alias', 'Alias', 'required');
		$this->form_validation->set_rules("email", "Email", "required|valid_email|is_unique[users.email]");
		$this->form_validation->set_rules("password", "Password", "required|min_length[6]");
		$this->form_validation->set_rules("confirm_password", "Confirmation", "required|matches[password]");
		//If there's errors, then send the errors back through to the session
		if($this->form_validation->run() === FALSE)
		{
			$this->session->set_flashdata("register_errors", validation_errors());
			redirect('/');		
		}
		else
		{
			$this->User->create($this->input->post());
			$user_info = $this->User->getUser($this->input->post());
			$this->session->set_userdata('user_id', $user_info['id']);
			$this->session->set_userdata('user_session', $user_info['alias']);
		    redirect("/books/");
		}
	}

	public function login()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules("password", "Password", "required|min_length[8]");
		if($this->form_validation->run() === FALSE)
		{
			$this->session->set_flashdata("login_errors", validation_errors());
			redirect('/');		
		}
		else
		{
			$user_info = $this->User->getUser($this->input->post());

		if (password_verify($this->input->post('password'), $user_info['password'])) 
		{
			$this->session->set_userdata('user_id', $user_info['id']);
			$this->session->set_userdata('user_session', $user_info['alias']);
		    redirect("/books/");

		} 
		else 
		{
		    $this->session->set_flashdata('msg', 'Invalid Username and/or Password');
			redirect('/');		
		}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}
}