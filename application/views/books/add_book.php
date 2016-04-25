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
		<!-- loop through author list here -->
	</select></p>
	<p>Or add a new author: <input type='text' name='new_author'></p>
	<p name='review'>Review: <textarea></textarea></p>
	<p name='rating'>Rating: <select>
		<option value='1'>1</option>
		<option value='2'>2</option>
		<option value='3'>3</option>
		<option value='4'>4</option>
		<option value='5'>5</option>		
		</select></p>
	<p><input type='submit' value='Add Book And Review'></p>
		

</body>
</html>