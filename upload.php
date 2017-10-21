<?php
session_start();
require_once 'includes/dbh-inc.php';

$id = $_SESSION['user_id'];


if (isset($_POST['submit'])) {
		$file = $_FILES['file'];
		$fileName = $_FILES['file']['name'];
		$fileTmpName = $_FILES['file']['tmp_name'];
		$fileSize = $_FILES['file']['size'];
		$fileError = $_FILES['file']['error'];
		$fileType = $_FILES['file']['type'];
        
 		print_r($file);

		$fileExt = explode('.', $fileName);
		$fileActualExt = strtolower(end($fileExt));

		$allowed = array('jpg','jpeg','png','pdf','JPG');

		if (in_array($fileActualExt, $allowed)) {
			if ($fileError === 0) {
				if ($fileSize < 100000000000) {
					
					$fileNameNew = "profile".$id.".".$fileActualExt;

					$fileDestination = 'uploads/'.$fileNameNew;
					move_uploaded_file($fileTmpName, $fileDestination);

					$sql = "UPDATE profileimg SET status = 0 WHERE u_id='$id';";
        				$result = $conn->query($sql);

					header("Location: profile.php?uploadSuccess");

				} else {
					echo "Your file is too large!";
				}
			} else {
				echo "error in file uploading!";
		}
		
		} else {
			echo "you cannot upload files of this type!";
		}
	}