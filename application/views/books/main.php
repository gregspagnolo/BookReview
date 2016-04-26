<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Books Home</title>
	</head>
<style>

.right {
	float: right;
	padding: 10px;
}

.left {
	float: left;
}

.recent {
	width: 400px;
	background-color: lightgray;
	border-radius: 10px;
	padding: 10px;
}


</style>
<body>
<div class="topnav">
	<p class='left'><h3>Hi, <?= $this->session->userdata('user_session') ?></h3></p>
	<p class='right'><a href="Users/logout">Logout</a></p>
	<p class='right'><a href="/Books/add">Add Book and Review</a></p>
</div>

<div class="recent">
<h4>Recent Book Reviews:</h4>
<?php foreach ($reviews as $three_reviews): ?>
<p><a href="/books/show/<?=$three_reviews['book_id'] ?>"><?= $three_reviews['title'] ?></a></p>
<p>Rating: <?= $three_reviews['rating'] ?></p>
<p><?= $three_reviews['alias'] ?> says: <?= $three_reviews['comment'] ?></p>
<p><i>Posted On <?= $three_reviews['created_at'] ?></i></p>
<hr>
<?php endforeach; ?> 
<hr>
</div>

<h4>Other Books with Reviews:</h4>
<p>Books with Reviews will go here</p>
</body>
</html>