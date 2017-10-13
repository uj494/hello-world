<?php
session_start();

include 'dbh-inc.php';


$userid = mysqli_real_escape_string($conn,$_POST['id']);
$password = mysqli_real_escape_string($conn,$_POST['pwd']);

$sql = "SELECT * FROM users WHERE user_uid='$userid'";
  $result = $conn->query($sql);
$row = $result->fetch_assoc();
$hash_pwd = $row['user_pwd'];
$hash = password_verify($password, $hash_pwd);

if ($hash == 0) {
	header('Location: ../index.php?error=empty');	
	exit();
} else {

		$stmt = $conn->prepare("SELECT * FROM users WHERE user_uid=? AND user_pwd=? ");
		$stmt->bind_param("ss",$username,$pwd);

		$username= $userid;
		$pwd=	$hash_pwd;

		$stmt->execute();	

	  	$result = $stmt->get_result();
	   
	   	if (!$row = $result->fetch_assoc()) {
	   	echo "Your Username or Password is incorrect";
	   	} else {
	   	$_SESSION['user_id'] = $row['user_id'];
	   		
	   	}

		header("Location: ../index.php");
	}