<?php
require_once 'header.php';
require_once 'includes/dbh-inc.php';
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="styles/style.css">
</head>
<body background="img/pencil-art-colorful-wallpaper-99342104.jpg">

<?php
if (isset($_SESSION['user_id'])) {

$id = $_SESSION['user_id'];
$sqlimg = "SELECT * FROM profileimg WHERE u_id = '$id'";
$resultimg = mysqli_query($conn,$sqlimg);

while ($rowimg = mysqli_fetch_assoc($resultimg)) {
	echo "<div  align='center'>";
	 if ($rowimg['status'] == 0) {

	 	$filename = "uploads/profile".$id."*";

		$fileinfo = glob($filename);

		$fileext = explode(".", $fileinfo[0]);
		$fileactualext = $fileext[1];

	 	echo "<img src='uploads/profile".$id.".".$fileactualext."?".mt_rand()."' height='300px' width='300px'>";


	 ?>	<br><br><form action="deleteprof.php" method="POST" >
	<div align="center"><button  type="submit" name="submit" class="btn btn-light">REMOVE PROFILE PICTURE</button></div>
</form>"
	 <?php  
	} else{
	 	echo "<img src='img/default.jpg'";
	 }
	echo "</div>";
}
?>
<form action="upload.php" method="POST" enctype="multipart/form-data">
	<div  style="margin-right: -110px;" align="center"><input type="file" name="file"></div><br>
	<div align="center"><button  type="submit" name="submit" class="btn btn-light">UPLOAD PROFILE PICTURE</button></div>
</form><br>

<div align="center">
	<?php
					$id2 = $_SESSION['user_id'];
					$sql2 = "SELECT * FROM users WHERE user_id='$id2'";
					$result2 = $conn->query($sql2);
					if ($row2 = $result2->fetch_assoc()) {
						echo "<h2>".$row2['user_first'].str_repeat('&nbsp', 3).$row2['user_last']."</h2>";
					}
	?>

</div>

<?php
}
?>
</body>
</html>