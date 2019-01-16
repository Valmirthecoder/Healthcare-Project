<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,intial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<header>
		<nav>
			<a href="#">
			<img src="img/logo.png height="100px" width="100px;">
			</a>
			<ul>
				<li><a href="index.php">Home</a></li>
			</ul>
			</nav>

			<div>


				<?php

					if (isset($_SESSION['userId'])) {
						echo '<form action="includes/logout.inc.php" method="post">
						<button type="submit" name="logout-submit">Logout</button>
						</form>';
					}
					else  {
						echo '<form action="includes/login.inc.php" method="post">
						<input type="text" name="mailuid" placeholder="Username/Email...">
						<input type="password" name="pwd" placeholder="Password...">
						<button type="submit" name="login-submit">Login</button>
						</form>
						<a href="signup.php">Signup</a>';
					}
				?>




				
				
			</div>
		
	</header>

