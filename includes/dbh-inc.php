<?php
$dbServername = "localhost";
$dbUsername = "id3337033_ujju";
$dbPassword = "login2-ujju";
$dbName = "id3337033_login2";

$conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);

if(!$conn){
	die("Connection Failed: ".mysqli_connect_error());
}
?>