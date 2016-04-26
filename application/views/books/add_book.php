<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Add Book And Review</title>
	</head>
<body>
<h2>Add a New Book Title and Review:</h2>
<form action='/Books/create_book/' method='post'>
	<p>Book Title: <input type='text' name='title'></p>
	<p>Author:</p>
	<p>Choose From the list:<select name='author_from_list'>
		<?php foreach ($authors as $author): ?>
			<option><?= $author['author'] ?></option>
		<?php endforeach; ?>
	</select></p>
	<p>Or add a new author: <input type='text' name='new_author'></p>
	<p>Review: <textarea name='comment'></textarea></p>
	<p>Rating: <select name='rating'>
		<option value='1'>1</option>
		<option value='2'>2</option>
		<option value='3'>3</option>
		<option value='4'>4</option>
		<option value='5'>5</option>		
		</select></p>
	<p><input type='submit' value='Add Book And Review'></p>
		

</body>
</html>