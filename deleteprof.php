<?php

session_start();
require_once 'includes/dbh-inc.php';

$id = $_SESSION['user_id'];

$filename = "uploads/profile".$id."*";

$fileinfo = glob($filename);

$fileext = explode(".", $fileinfo[0]);
$fileactualext = $fileext[1];

$file =  "uploads/profile".$id.".".$fileactualext;

if (!unlink($file)) {
	echo "File was not deleted ";
} else {

}

$sql = "UPDATE profileimg SET status = 1 WHERE u_id = '$id';";
        mysqli_query($conn,$sql);

        header("Location: profile.php?deleteSuccess");