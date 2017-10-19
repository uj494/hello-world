<?php
include 'header.php';
?>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body background="img\pencil-art-colorful-wallpaper-99342104.jpg">
<?php

$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

if (strpos($url, 'error=empty') !== false) {
	echo "<h2 align='center'>FILL OUT ALL FEILDS!</h2>";	
}

elseif (strpos($url, 'error=username') !== false) {
	echo "<h3 align='center'>Username exists!</h3>";	
}

if (isset($_SESSION['user_id'])) {
	echo "YOU ARE ALREADY LOGGED IN";
} else {
?>
	<div align="center" >
 <form action="includes/signup-inc.php" method="POST" style="width: 500px;" autocomplete="OUT">
  <div class="form-group" align="center">
    <input type="text" class="form-control" name="first" placeholder="Firstname">
  </div>
  <div class="form-group" align="center">
    <input type="text" class="form-control" name="last" placeholder="Lastname">
  </div>
  <div class="form-group" align="center">
    <input type="text" class="form-control" name="id" placeholder="UserID">
  </div>
  <div class="form-group" align="center">
    <input type="Password" class="form-control" name="pwd" placeholder="Password">
  </div>
  <div class="form-group" align="center">
  <button type="submit" class="btn btn-light" name="submit" >Sign Up</button>
  </div>
</form>
</div>

 <?php
	/*echo "<div align='center'>
	<form action='includes/signup-inc.php' method='POST' >
	<input type='text' name='first' placeholder='Firstname'><br><br>
	<input type='text' name='last' placeholder='Lastname'><br><br>
	<input type='text' name='id' placeholder='UserID'><br><br>
	<input type='Password' name='pwd' placeholder='Password'><br><br>
	<button type='submit' name='submit'>Sign up</button>
</form> </div>";*/
}
?>

</body>
</html>