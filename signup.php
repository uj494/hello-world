<?php
include 'header.php';
?>
<?php

$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

if (strpos($url, 'error=empty') !== false) {
	echo "FILL OUT ALL FEILDS!";	
}

elseif (strpos($url, 'error=username') !== false) {
	echo "<h3 align='center'>Username exists!</h3>";	
}

if (isset($_SESSION['user_id'])) {
	echo "YOU ARE ALREADY LOGGED IN";
} else {
	echo "<div align='center'>
	<form action='includes/signup-inc.php' method='POST' >
	<input type='text' name='first' placeholder='Firstname'><br><br>
	<input type='text' name='last' placeholder='Lastname'><br><br>
	<input type='text' name='id' placeholder='UserID'><br><br>
	<input type='Password' name='pwd' placeholder='Password'><br><br>
	<button type='submit' name='submit'>Sign up</button>
</form> </div>";
}
?>
</body>
</html>