<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title><?= $books[0]['title']?> by <?= $books[0]['author']?></title>
		<link rel='stylesheet' href='/css/normalize.css'>
		<link rel='stylesheet' href='/css/skeleton.css'>
	</head>
	<style>
	.top-padding {
		margin-top: 40px;
	}
	.float {
		float: right;
		padding-top: 15px;
	}
	</style>
<body>
	<div class="container">
		<div class="row float">
				<a href="/Books/">Home</a>
				<a href="/Users/logout">Logout</a>
		</div>
		<div class="row">
			<div class="six columns">
				<p><h3><?= $books[0]['title'] ?></h3></p>
				<p><h6>Author: <?= $books[0]['author'] ?></h6></p>
				<h5>Reviews:</h5>
				<?php foreach($books as $book): ?>
				<p>Rating: <?= $book['rating'] ?></p>
				<a href="/users/show/<?=$book['user_id']?>"><?= $book['alias'] ?></a> says: <?= $book['comment'] ?>
				<?php $book['created_at'] = date("F j, Y"); ?>
				<p><i>Posted On: <?= $book['created_at'] ?></i></p>
				<?php if ($book['user_id'] == $this->session->userdata('user_id')) { ?>
				<a href='/Books/delete_review/<?= $book['id'] ?>'>Delete Review</a>
			 	<?php } ?>
				
				<hr>
				<?php endforeach; ?>
			</div>

			<div class="six columns top-padding">
				<form action='/books/book_review/<?= $books[0]['book_id'] ?>' method='post'>
					<p>Add A Review for <?= $books[0]['title'] ?>:</p>
					<p><textarea class='u-full-width' name='review_comment'></textarea></p>
					<p>Rating: 
					<select name='rating'>
						<option value='1'>1</option>
						<option value='2'>2</option>
						<option value='3'>3</option>
						<option value='4'>4</option>
						<option value='5'>5</option>		
					</select> stars</p>
					<?= $this->session->flashdata('review_error') ?>
					<p><input type='submit' value='Submit Review'></p>
				</form>
			</div>
		</div>
	</div>
</body>
</html>