<?php
require_once 'header.php';
require_once 'includes/dbh-inc.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body background="img/pencil-art-colorful-wallpaper-99342104.jpg">


        <?php
		echo "<h1 class='hum' align = center>Available Products</h1><br><br><br>";

if (isset($_SESSION['user_id'])) {
$sql4 = "SELECT * FROM product;";
$result4 = $conn->query($sql4);
	echo "<ol class='ol'>";
	while ($row4 = $result4->fetch_assoc()) {

		switch ($row4['pro_id']) {
		 	case '1':
		 	$id6='1';
		 	$sql6 = "SELECT * FROM product WHERE pro_id='$id6';";
			$result6 = $conn->query($sql6);
			if ($row6 = $result6->fetch_assoc()) {
		 		echo "<h3><li></h3><img src='img/pencil.jpg' alt='Pencils' height='300' width='300'><br><br>";
				echo "<h2 align=left>".$row6['pro_name']."<br>MRP:-".$row6['pro_price']."</h2><br>";
				echo "<form method='POST'  action='cart.php'>
				<input type='hidden' name='id' value='".$_SESSION['user_id']."'>
				<input type='hidden' name='p_id' value='".$row6['pro_id']."'>
				<button name='cart' type='submit' class='btn btn-light'>Add To Cart</button></li>";
			echo "</form>";

			}
		 		break;
		 	
		 	case '2':

		 	$id7='2';
		 	$sql7 = "SELECT * FROM product WHERE pro_id='$id7';";
			$result7 = $conn->query($sql7);
			if ($row7 = $result7->fetch_assoc()) {
		 		echo "<h3><li></h3><img src='img/ITC Classmate-500x500.jpg' alt='Registers' height='300' width='300'><br><br>";
				echo "<h2 align=left>".$row7['pro_name']."<br>MRP:-".$row7['pro_price']."</h2><br>";
				echo "<form method='POST'  action='cart.php'>
				<input type='hidden' name='id' value='".$_SESSION['user_id']."'>
				<input type='hidden' name='p_id' value='".$row7['pro_id']."'>
				<button name='cart' type='submit' class='btn btn-light'>Add To Cart</button></li>";
				echo "</form>";
		 		}
		 		break;	

		 	default:
		 		echo "ERROR";
		 		break;
		 }
			
	
	}

	echo "</ol>";
}?>

</body>
</html>