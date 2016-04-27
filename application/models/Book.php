<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends CI_Model {

	public function create_book($post)
	{
		if (isset($post['author_from_list']) && strlen($post['author_from_list']) != 0)
		{
			$author = $post['author_from_list'];
		}
		else
		{
			$author = $post['new_author'];
		}
		$query = "INSERT INTO books (title, author, created_at, updated_at, user_id)
				 VALUES (?, ?, NOW(), NOW(), ?)";
		$values = array($post['title'], $author, $this->session->userdata('user_id'));
		$this->db->query($query, $values);
	}

	public function get_book_id($book_title)
	{
		$query = "SELECT id FROM books WHERE title = ?";
		$value = array($book_title);
		return $this->db->query($query, $value)->row_array();
	}

	public function create_review($post, $book_id)
	{
		$query = "INSERT INTO reviews (rating, comment, created_at, updated_at, book_id, user_id)
				VALUES (?, ?, NOW(), NOW(), ?, ?)";
		$values = array($post['rating'], $post['comment'], $book_id['id'], $this->session->userdata('user_id'));
		$this->db->query($query, $values);
	}

	public function create_book_review($post, $book_id)
	{
		$query = "INSERT INTO reviews (comment, rating, created_at, book_id, user_id)
				 VALUES (?, ?, NOW(), ?, ?)";
		$values = array($post['review_comment'], $post['rating'], $book_id, $this->session->userdata('user_id'));
		$this->db->query($query, $values);
	}

	public function get_3_reviews()
	{
		$query = "SELECT reviews.*, books.title, users.alias FROM reviews
				  LEFT JOIN books ON books.id = reviews.book_id
				  LEFT JOIN users ON users.id = reviews.user_id 
				  GROUP BY reviews.created_at DESC LIMIT 3";
		return $this->db->query($query)->result_array();
	}

	public function books_with_reviews()
	{
		$query = "SELECT reviews.*, books.title FROM reviews
				  LEFT JOIN books ON books.id = reviews.book_id
				  GROUP BY books.title";
		return $this->db->query($query)->result_array();
	}

	public function book_page($book_id)
	{
		$query = "SELECT reviews.*, books.title, books.author, users.alias 		 
				  FROM reviews
				  LEFT JOIN books ON books.id = reviews.book_id
				  LEFT JOIN users ON users.id = reviews.user_id 
				  WHERE books.id = ?
				  LIMIT 3";
		$value = array($book_id);
		return $this->db->query($query, $value)->result_array();
	}

	public function get_user_info($user_info)
	{
		$query = "SELECT books.title, users.*, books.title, books.id AS book_id, COUNT(*)
				  FROM books
				  LEFT JOIN reviews ON reviews.book_id = books.id
				  LEFT JOIN users ON users.id = reviews.user_id
				  WHERE reviews.user_id= ?
				  GROUP BY books.title";
		$values = array($user_info);
		return $this->db->query($query, $values)->result_array();
	}

	public function show_authors()
	{
		return $this->db->query("SELECT author FROM books GROUP BY author")->result_array();
	}
}