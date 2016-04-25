<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="description" content="Register and Login">
	<title>Register and Login</title>
	<style>
	form {
		display: inline-block;
	}
	</style>
</head>
<body>
<h2>Welcome!</h2>
	<?= $this->session->flashdata('logout') ?>
	<form action='Users/register' method='post'>
		<fieldset>
			<?= $this->session->flashdata('register_errors') ?>
			<legend>Register:</legend>
			<p>Name: <input type="text" name="name" placeholder="Name">
			<p>Alias: <input type="text" name="alias" placeholder="Alias"></p>
			<p>Email: <input type="email" name="email" placeholder="Email"></p>
			<p>Password: <input type="password" name="password" placeholder="Password"></p>
			<p>Confirm Password: <input type="password" name="confirm_password"></p>
			<input type="submit" value="Register">
		</fieldset>
	</form>

	<form action='Users/login' method='post'>
		<fieldset>
			<?= $this->session->flashdata('login_errors') ?>
			<?= $this->session->flashdata('msg') ?>
			<legend>Login:</legend>
			<p>Email: <input type="email" name="email" placeholder="Email"></p>
			<p>Password: <input type="password" name="password" placeholder="Password"></p>
			<input type="submit" value="Login">
		</fieldset>
	</form>
	
</body>
</html>