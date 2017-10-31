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
		
			<?php

				if (isset($_SESSION['user_id'])) {

					echo"<ul class='design'>
			<li><form class='home' action='index.php' >
				<button class='btn btn-light '>HOME</button>
	
				</form></li>";
					
						$id = $_SESSION['user_id'];
						$sqlimg = "SELECT * FROM profileimg WHERE u_id = '$id'";
						$resultimg = mysqli_query($conn,$sqlimg);

						while ($rowimg = mysqli_fetch_assoc($resultimg)) {
							//echo "<div  align='center'>";
							 if ($rowimg['status'] == 0) {
					echo "<li><form  method = 'POST' action ='profile.php' >
						<input style='margin-top: 2px; border-radius: 30px; '  type = 'image' src = 'uploads\profile".$id.".jpg' height='40px' width='40px' >	</form><ul>";		
	
				
					} else {
				echo "<li><form  method = 'POST' action ='profile.php' >
						<input style='margin-top: 0px; border-radius: 30px;'  type = 'image' src = 'img\default.jpg' height='50px' width='70px' class='btn btn-light '>
						</form><ul>";
					}


			}
				
				echo "<li><form method='POST'  action='includes/delete.php'>
				<input type='hidden' name='id' value='".$_SESSION['user_id']."'>
				<button name='delete' class='btn btn-light'>DELETE ACCOUNT</button>
	
				</form></li>";

				echo "<li><form method='POST'  action='yourcart.php'>
				<input type='hidden' name='id' value='".$_SESSION['user_id']."'>
				<button name='cart' class='btn btn-light'>Your Cart</button>
	
				</form></li>";

				echo "<li><form action='includes/logout.php'>
				<button class='btn btn-light '>LOGOUT</button>
	
				</form></li></ul></li></ul>";
				} else {
					echo"<ul><li><form action='index.php' >
				<button class='btn btn-light '>HOME</button>
	
				</form></li>";

					/*echo "<li><form class='login'  action='includes/login-inc.php' method='POST'></li>
			<li><input type='text' name='id' placeholder='UserID'></li>
			<li><input type='Password' name='pwd' placeholder='Password'></li>
	<li><button type='submit' name='submit' class='btn btn-light'>login</button></li>
</form>";*/
				echo "<li><form class='login'  action='login.php' method='POST'></li>
					<li><button type='submit' name='submit' class='btn btn-light'>login</button></li>
					</form>";
			
							
			echo "<li><form  action='signup.php' >
				<button class='btn btn-light '>SignUp</button>
	
				</form></li>";
			}
			?>
	</nav>
</header>


