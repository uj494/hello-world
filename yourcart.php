<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body background="img\pencil-art-colorful-wallpaper-99342104.jpg">



<?php
include 'header.php';
include 'C:\wamp64\www\WebTech\includes\dbh-inc.php';
?>
<div style="color: white;">
<?php
echo "<div align='center'> <form  method='POST'  action='viewproducts.php'>";
		 	
		 	echo "<button name='cart' type='submit' class='btn btn-light'>Back To Shopping</button></li>";
			echo "</form></div><br><br>";

$userid2 = $_SESSION['user_id'];
$sql8 = "SELECT * FROM cart WHERE userid='$userid2'";
  $result8 = $conn->query($sql8);
  $uidcheck = mysqli_num_rows($result8);
  echo "<ol>";
while ($row8 = $result8->fetch_assoc()) {
			$id=$row8['product_id'];
			$idcart = $row8['userid'];
			$sqlcart = "SELECT * FROM product WHERE pro_id='$id'";
  			$resultcart = $conn->query($sqlcart);
  			$rowcart = $resultcart->fetch_assoc();
		 	echo "<strong><li>Product id:-</strong>   ".$row8['product_id']."<br>";
		 	echo $rowcart['pro_name']."<br></li>";
		 	echo "<strong>Product price:-</strong>".$rowcart['pro_price']."<br>";
		 	echo "<form method='POST'  action='".removeitem($conn,$idcart)."'>";
		 	
				echo"<input type='hidden' name='orderid' value='".$row8['order_id']."'>";
		 	echo "<button name='cart' type='submit' class='btn btn-light'>Remove From Cart</button></li>";
			echo "</form><br><br>";
		 }

		 if ($uidcheck > 0) { 

		 echo "<div align='center'><form method='POST'  action='BUY.php'>";
		 	
		 	echo "<button name='cart' type='submit' class='btn btn-light'>BUY</button></li>";
			echo "</form></div>";
			}


			function removeitem($conn,$idcart) {
			if (isset($_POST['cart'])) {
				$cid = $_POST['orderid'];

				$sql = "DELETE FROM cart WHERE order_id='$cid' AND userid = '$idcart'";

				$result = $conn->query($sql);
				header("Location: yourcart.php");
			}

		}




			?>
			</div>
			</body>
</html>