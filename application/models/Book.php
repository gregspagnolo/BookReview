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

	// public function get_book_id($book_id)
	// {
	// 	$query = "SELECT * FROM books WHERE id = ?"
	// }

	
}