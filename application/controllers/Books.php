<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Books extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Book');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$books_with_reviews = $this->Book->books_with_reviews();
		$three_reviews = $this->Book->get_3_reviews();
		$this->load->view('/books/main', array('reviews'=>$three_reviews,'book_reviews' => $books_with_reviews));
	}

	public function add()
	{
		$authors = $this->Book->show_authors();
		$this->load->view('/books/add_book', array('authors' => $authors));
	}

	public function create_book()
	{
		$this->form_validation->set_rules('title', 'Book Title', 'required');
		$this->form_validation->set_rules('author_from_list', 'Author From list', 'required');
		$this->form_validation->set_rules("comment", "Review", "required");
		$this->form_validation->set_rules("rating", "Rating", "required");
		if($this->form_validation->run() === FALSE)
		{
			$this->session->set_flashdata("add_book_errors", validation_errors());
			redirect('/books/add');	
		}
		else
		{	
			$this->Book->create_book($this->input->post());
			$book_id = $this->Book->get_book_id($this->input->post('title'));
			$this->Book->create_review($this->input->post(), $book_id);
			redirect("/books/show/" . $book_id['id']);
		}
	}

	public function show($id)
	{
		$book_id = $this->Book->book_page($id);
		$this->load->view('/Books/show', array('books' =>$book_id));
	}

	public function book_review($book_id)
	{
		$book_review = $this->Book->create_book_review($this->input->post(), $book_id);
		redirect('/books/show/'.$book_id);
	}

}