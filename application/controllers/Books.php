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
		$three_reviews = $this->Book->get_3_reviews();
		$this->load->view('/books/main', array('reviews'=>$three_reviews));
	}

	public function add()
	{
		$authors = $this->Book->show_authors();
		$this->load->view('/books/add_book', array('authors' => $authors));
	}

	public function create_book()
	{

		//need to do a check for if book is not created then create it
		$this->Book->create_book($this->input->post());
		$book_id = $this->Book->get_book_id($this->input->post('title'));
		$this->Book->create_review($this->input->post(), $book_id);
		redirect("/books/show/" . $book_id['id']);
	}

	public function show($id)
	{
		$book_id = $this->Book->book_page($id);
		$this->load->view('/Books/show', array('books' =>$book_id));
	}

}