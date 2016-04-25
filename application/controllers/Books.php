<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Books extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Book');
	}

	public function index()
	{
		$this->load->view('/books/main');
	}

	public function add()
	{
		$this->load->view('/books/add_book');
	}

	public function create_book()
	{
		//var_dump($this->input->post());
		$this->Book->create_book($this->input->post());
		// $this->Book->get_book_id($book_id);
		// insert review (post-review-rating)
	}

	public function show($id)
	{

	}
}