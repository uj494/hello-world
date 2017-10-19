<?php
session_start();
include 'C:\wamp64\www\WebTech\includes\dbh-inc.php';


?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>MY PAGE</title>
	  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<header>
	<nav>
		<ul>
			<li><a href="index.php">HOME</a></li></ul>
			<?php

				if (isset($_SESSION['user_id'])) {
					echo "<ul><li><form action='includes/logout.php'>
				<button class='btn btn-light '>LOGOUT</button>
	
				</form></li>";
				
				echo "<li><form method='POST'  action='includes/delete.php'>
				<input type='hidden' name='id' value='".$_SESSION['user_id']."'>
				<button name='delete' class='btn btn-light'>DELETE ACCOUNT</button>
	
				</form></li>";

				echo "<li><form method='POST'  action='yourcart.php'>
				<input type='hidden' name='id' value='".$_SESSION['user_id']."'>
				<button name='cart' class='btn btn-light'>Your Cart</button>
	
				</form></li>";
				} else {
					echo "<form action='includes/login-inc.php' method='POST'>
			<input type='text' name='id' placeholder='UserID'>
			<input type='Password' name='pwd' placeholder='Password'>
	<button type='submit' name='submit' class='btn btn-light'>login</button>
</form>";
				}
			
			
			echo"<li><a href='signup.php'>SIGNUP</a></li>";
			?>
		</ul>
	</nav>
</header>

.design li ul button {
 	margin-left: 55px;
 	text-decoration:none;
 	display:block;
 }


 .design li button:hover {
 	background-color: #00ffff; 
 }
 .design li ul li {
 	display: none;
 }

 .design li:hover ul li{
 	display: block;

 }

 .design li ul{
 	margin-top: 0px;
 }


.href {
	margin-top: 1px;
	margin-right: 10px;
}
.login {
	margin-top: -25px;
	margin-right: -110px;
}



.home {
	margin-top: 1px;
	right: 2px;
	margin-right: 10px;
}


.but {
	margin-top: 8px;
	margin-right: -100px;
	}



	ul {

 	margin: 0px;
 	padding: 0px;
 	list-style: none;
 }

 ul li {

 	float: left;
 	width: 100px;
 	height: 40px;
 	line-height: 40px;
 	text-align: center;
 	margin-top: 20px;

 } 

  ul li button {
 	
 	text-decoration:none;
 	display:block;
 }

ul li button:hover {
 	background-color: #00ffff; 
 }

 ul li ul li {
 	display: none;
 }

 ul li:hover ul li{
 	display: block;

 }

 ul li ul{
 	margin-top: 0px;
 }
