<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Books Home</title>
		<link rel='stylesheet' href='/css/normalize.css'>
		<link rel='stylesheet' href='/css/skeleton.css'>
	</head>
	<style>
		.login-top {
			margin: 15px;
			padding: 10px;
		}
	</style>

<body>
	<div class="container">
		<div class="row">
			 <div class="six columns">
				<p><h5>Hi, <?= $this->session->userdata('user_session') ?></h5></p>
			</div>

			<div class="six columns login-top">
				<a class='button' href="/Books/add">Add Book and Review</a>
				<a href="/Users/logout">Logout</a>
			</div>
		</div>


		<div class="row">
			<div class="six columns">
				<h4>Recent Book Reviews:</h4>
				<?php foreach ($reviews as $three_reviews): ?>
				<p><a href="/books/show/<?=$three_reviews['book_id'] ?>"><?= $three_reviews['title'] ?></a></p>
				<p>Rating: <?= $three_reviews['rating'] ?></p>
				<p><strong><?= $three_reviews['alias'] ?></strong> says: <?= $three_reviews['comment'] ?></p>
				<?php $three_reviews['created_at'] = date("F j, Y"); ?>
				<p><i>Posted On <?= $three_reviews['created_at'] ?></i></p>
				<hr>
				<?php endforeach; ?> 
			</div>

			<div class="six columns">
				<h4>Other Books with Reviews:</h4>
				<?php foreach($book_reviews as $book_review): ?>
				<p><a href="/books/show/<?=$book_review['book_id']?>"><?= $book_review['title'] ?></a></p>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</body>
</html>



















