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
</style>
<body>
<div class="topnav">
	<p class='left'><h3>Hi, <?= $this->session->userdata('user_session') ?></h3></p>
	<p class='right'><a href="Users/logout">Logout</a></p>
	<p class='right'><a href="/Books/add">Add Book and Review</a></p>
</div>

<h4>Recent Book Reviews:</h4>
<p>Here's where the book reviews will go</p>
<h4>Other Books with Reviews:</h4>
<p>Books with Reviews will go here</p>
</body>
</html>