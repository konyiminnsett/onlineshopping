<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Online Shop</title>
</head>
<body>
	<h1>Login to Online Shop Administration</h1>
	<?php if (isset($_GET['login'])and $_GET['login']=="failed"):?>
		<div class="error">Login failed!User name or password incorrect.</div>
	<?php endif; ?>
	<form action="login.php" method="post">
		<label for="name">Name</label>
		<input type="text" name="name" id="name">

		<label for="password">Password</label>
		<input type="password" id="password" name="password">
		<br><br>
		<input type="submit" value="Admin Login" name="">
	</form>
	
	

</body>
</html>