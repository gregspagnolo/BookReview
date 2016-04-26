<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Book Title</title>
	</head>
<body>

<?php foreach($books as $book): ?>
	<p><?= $book['title'] ?></p>
	<p><?= $book['author'] ?></p>
<?php endforeach; ?>
</body>
</html>