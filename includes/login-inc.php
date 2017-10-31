<?php
session_start();
include 'dbh-inc.php';


$userid = $_POST['id'];
$password = $_POST['pwd'];

/*$sql = "SELECT * FROM users WHERE user_uid='$userid'";
  $result = $conn->query($sql);
$row = $result->fetch_assoc();
$hash_pwd = $row['user_pwd'];
$hash = password_verify($password, $hash_pwd);*/

if (empty($userid)) {
header('Location: ../login.php?error=empty');	
exit();
}

/*if ($hash == 0) {
	header('Location: ../login.php?error=pwd');	
	exit();
}*/
	
else{
$sql = "SELECT * FROM users WHERE user_uid='$userid'";
 	$result = $conn->query($sql);
 	$row = $result->fetch_assoc();
 	$hash_pwd = $row['user_pwd'];
	$hash = password_verify($password, $hash_pwd);
 //$row = $result->fetch_assoc()
 $uidcheck = mysqli_num_rows($result);
if ($uidcheck==0) {
	header('Location: ../login.php?error=username');
	exit();	
}  elseif ($hash == 0) {
			header('Location: ../login.php?error=pwd');	
			exit();
		}

		/*$hash_pwd = $row['user_pwd'];
		$hash = password_verify($password, $hash_pwd);
		if ($hash == 0) {
			header('Location: ../login.php?error=pwd');	
			exit();
		} */ else {
			$sqllogin = "SELECT * FROM users WHERE user_uid='$userid' AND user_pwd='$hash_pwd' ";
	  		$resultlogin = $conn->query($sqllogin);
	  		$rowlogin = $resultlogin->fetch_assoc();
	   	$_SESSION['user_id'] = $rowlogin['user_id'];
	   			header("Location: ../index.php");
	   	}
	   
}
		//$sql = "SELECT * FROM users WHERE user_uid='$userid' AND user_pwd='$hash_pwd' ";
	  	//$result = $conn->query($sql);
	   
	   	/*if (!$row = $result->fetch_assoc()) {
	   	echo "Your Username or Password is incorrect";
	   	} */

		//header("Location: ../index.php");
	