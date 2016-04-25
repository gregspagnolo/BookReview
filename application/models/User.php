<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model{

	public function create($post)
	{
		$query = "INSERT INTO users (name, alias, email, password, created_at, updated_at) VALUES (?, ?, ?, ?, NOW(), NOW())";
		$values = array($post['name'], $post['alias'], $post['email'], password_hash($post['password'], PASSWORD_DEFAULT));
		$this->db->query($query, $values);
	}

	public function getUser($logininfo)
	{
		$query = "SELECT * FROM users WHERE email= ?";
		$values = array($logininfo['email']);
		return $this->db->query($query, $values)->row_array();
	}
}