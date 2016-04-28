<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel='stylesheet' href='/css/normalize.css'>
		<link rel='stylesheet' href='/css/skeleton.css'>
		<style>
		.user_top {
			margin-top: 80px;
		}
		.float {
			float: right;
			padding-top: 10px;
		}
		</style>
	</head>

<body>

	<div class="container">
	<div class="row float">
		<a href="/Books/">Home</a>
		<a href="/Books/add/">Add Book And Review</a>
		<a href="/Users/logout">Logout</a>
	</div>
	  <div class="row">
	  	<div class="12 column user_top">
			<p><h4>User Alias: <?= $user_info[0]['alias'] ?></h4></p>
			<p>Name: <?= $user_info[0]['name'] ?></p>
			<p>Email: <?= $user_info[0]['email'] ?></p>
			<?php $sum = 0;
			foreach($user_info as $count) {
				$sum = $sum + $count['COUNT(*)'];
			}
			?>
			<p>Total Reviews: <?= $sum;  ?>	
			<h5>Posted Reviews on the following books:</h5>
			<?php foreach($user_info as $users): ?>
				<p><a href="/books/show/<?= $users['book_id'] ?>"><?= $users['title'] ?></a></p>
			<?php endforeach; ?>
		</div>
	 </div>

	</div>
</body>
</html>
