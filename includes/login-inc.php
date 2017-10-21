<?php
session_start();

require_once 'dbh-inc.php';


$userid = $_POST['id'];
$password = $_POST['pwd'];

$sql = "SELECT * FROM users WHERE user_uid='$userid'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$hash_pwd = $row['user_pwd'];
$hash = password_verify($password, $hash_pwd);

if ($hash == 0) {
	header('Location: ../index.php?error=empty');	
	exit();
} else {

		$sql = "SELECT * FROM users WHERE user_uid='$userid' AND user_pwd='$hash_pwd' ";
	  	$result = $conn->query($sql);
	   
	   	if (!$row = $result->fetch_assoc()) {
	   	echo "Your Username or Password is incorrect";
	   	} else {
	   	$_SESSION['user_id'] = $row['user_id'];
	   		
	   	}

		header("Location: ../index.php");
	}