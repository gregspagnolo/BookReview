<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="description" content="Register and Login">
	<title>Register and Login</title>
	<link rel='stylesheet' href='/css/normalize.css'>
	<link rel='stylesheet' href='/css/skeleton.css'>
</head>
<body>
	<div class="container">
		<h3>Welcome!</h3>
		<div class="row">
			<div class='six columns'>
				<form action='/Users/register' method='post'>
					<?= $this->session->flashdata('register_errors') ?>
					<legend>Register</legend>
					<p>Name: <input class='u-full-width' type="text" name="name" placeholder="Name">
					<p>Alias: <input class='u-full-width' type="text" name="alias" placeholder="Alias"></p>
					<p>Email: <input class='u-full-width' type="email" name="email" placeholder="Email"></p>
					<p>Password: <input class='u-full-width' type="password" name="password" placeholder="Password"></p>
					<p>Confirm Password: <input class='u-full-width' type="password" name="confirm_password"></p>
					<input class='button-primary' type="submit" value="Register">	
				</form>
			</div>
		
			<div class='six columns'>
				<form action='/Users/login' method='post'>
					<?= $this->session->flashdata('login_errors') ?>
					<?= $this->session->flashdata('msg') ?>
					<legend>Login</legend>
					<p>Email: <input class='u-full-width' type="email" name="email" placeholder="Email"></p>
					<p>Password: <input class='u-full-width' type="password" name="password" placeholder="Password"></p>
					<input type="submit" value="Login">
				</form>
			</div>
		</div>
	</div>
</body>
</html>