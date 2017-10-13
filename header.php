<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>MY PAGE</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<header>
	<nav>
		<ul>
			<li><a href="index.php">HOME</a></li>
			<?php

				if (isset($_SESSION['user_id'])) {
					echo "<form action='includes/logout.php'>
				<button>LOGOUT</button>
	
				</form>";
				} else {
					echo "<form action='includes/login-inc.php' method='POST'>
			<input type='text' name='id' placeholder='UserID'>
			<input type='Password' name='pwd' placeholder='Password'>
	<button type='submit' name='submit'>login</button>
</form>";
				}
			
			?>
			<li><a href="signup.php">SIGNUP</a></li>
		</ul>
	</nav>
</header>
<h1 align="center">Welcome To My Website</h1>
</body>
</html>
<?php
/*if (isset($_SESSION['user_id'])) {
				echo "
<img src='img\IMG_6203 (2).jpg' height='300' width='300'/>";
}
?>*/