<?php
if (isset($_SESSION['id'])) {
	echo $_SESSION['id']; 
} else
{
	echo "you are not logged in";
}
?>


$_SESSION['id'] = $row['id'];

session_start();