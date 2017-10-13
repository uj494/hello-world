<?php
session_start();

include 'dbh-inc.php';

$first = $_POST['first'];
$last = $_POST['last'];
$userid = $_POST['id'];
$password = $_POST['pwd'];

if (empty($first)) {
header('Location: ../signup.php?error=empty');	
exit();
}
if (empty($last)) {

header('Location: ../signup.php?error=empty');	
exit();
}
if (empty($userid)) {

header('Location: ../signup.php?error=empty');	
exit();
}
else{
$sql = "SELECT 	user_uid FROM users WHERE user_uid='$userid'";
 $result = $conn->query($sql);
 $uidcheck = mysqli_num_rows($result);
if ($uidcheck > 0) {
	header('Location: ../signup.php?error=username');
	exit();	
} else {

	$encrypted_password = password_hash($password, PASSWORD_DEFAULT);
$sql = "INSERT INTO users (user_first,user_last,user_uid, user_pwd) VALUES ('$first','$last','$userid','$encrypted_password');";
  $result = $conn->query($sql);
   

header('Location: ../index.php?signup=success');
}
}
?>