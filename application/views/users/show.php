<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel='stylesheet' href='/css/normalize.css'>
		<link rel='stylesheet' href='/css/skeleton.css'>
	</head>

<body>
	<div class="container">
		<p>User Alias: <?= $user_info[0]['alias'] ?></p>
		<p>Name: <?= $user_info[0]['name'] ?></p>
		<p>Email: <?= $user_info[0]['email'] ?></p>
		<p>Total Reviews:</p>

		<h5>Posted Reviews on the following books:</h5>
		<?php foreach($user_info as $users): ?>
			<p><a href="/books/show/<?= $users['book_id'] ?>"><?= $users['title'] ?></a></p>
		<?php endforeach; ?>

	</div>
</body>
</html>