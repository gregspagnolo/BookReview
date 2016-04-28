<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Add Book And Review</title>
		<link rel='stylesheet' href='/css/normalize.css'>
		<link rel='stylesheet' href='/css/skeleton.css'>
	</head>
	<style>
	.float {
		float: right;
		margin-top: 15px;
	}
	</style>
<body>
	<div class="container">
		<div class="row float">
			<a href="/Books/">Home</a>
			<a href="/Users/logout">Logout</a>
		</div>
		<div class="row">
			<div class="eight columns">
			<h4>Add a New Book Title and Review</h4>
			<form action='/Books/create_book/' method='post'>
			<?= $this->session->flashdata('add_book_errors') ?>
			<p>Book Title: <input class='u-full-width' type='text' name='title'></p>
			<p>Author:</p>
				<select class='u-full-width' name='author_from_list'>
					<option class='u-full-width'>Choose Author From List</option>
					<?php foreach ($authors as $author): ?>
					<option class='u-full-width'><?= $author['author'] ?></option>
					<?php endforeach; ?>
				</select>
				<p>Or add a new author: <input class='u-full-width' type='text' name='new_author'></p>
				<p>Review: <textarea name='comment' class='u-full-width'></textarea></p>
				<p>Rating: 
				<select class='u-full-width' name='rating'>
					<option value='1'>1</option>
					<option value='2'>2</option>
					<option value='3'>3</option>
					<option value='4'>4</option>
					<option value='5'>5</option>		
				</select></p>
				<p><input class='u-full-width' type='submit' value='Add Book And Review'></p>
			</div>
		</div>		
	</div>
</body>
</html>