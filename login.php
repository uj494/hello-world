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
<div style="color: white;">
<?php

$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

if (strpos($url, 'error=empty') !== false) {
	echo "<h2 align='center'>FILL OUT ALL FEILDS!</h2>";	
}

if (strpos($url, 'error=username') !== false) {
  echo "<h3 align='center'>Username don't exists!</h3>";  
}


if (strpos($url, 'error=pwd') !== false) {
  echo "<h3 align='center'>Wrong Password!</h3>";  
}


else {
?>
	<div align="center" >
 <form action="includes/login-inc.php" method="POST" style="width: 500px;" autocomplete="OUT">
  <div class="form-group" align="center">
    <input type="text" class="form-control" name="id" placeholder="UserID">
  </div>
  <div class="form-group" align="center">
    <input type="Password" class="form-control" name="pwd" placeholder="Password">
  </div>
  <div class="form-group" align="center">
  <button type="submit" class="btn btn-light" name="submit" >Login</button>
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
</div>

</body>
</html>