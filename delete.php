<?php
session_start();

include 'C:\wamp64\www\WebTech\includes\dbh-inc.php';

	if (isset($_POST['delete'])) {
		$cid = $_POST['id'];

		$sql = "DELETE FROM users WHERE user_id='$cid'";

		$result = $conn->query($sql);
		header("Location: index.php");
	}


session_destroy();

header("Location: ../index.php");