<?php
include 'header.php';
include 'C:\wamp64\www\WebTech\includes\dbh-inc.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body  background="img\pencil-art-colorful-wallpaper-99342104.jpg">
 <div style="color: white;">
<?php
if (isset($_SESSION['user_id'])) {
	$id2 = $_SESSION['user_id'];
	$sql2 = "SELECT * FROM users WHERE user_id='$id2'";
	$result2 = $conn->query($sql2);
	if ($row2 = $result2->fetch_assoc()) {
	echo "<h1 align='center' >Welcome To My Website</h1><br>";
	echo "<h1 align='center' >hello ".$row2['user_first']."</h1><br><br>";
	}

  echo "<h2 align='center'><form class='products' action='viewproducts.php' method='POST'>
	<button type='submit' name='Products' class='btn btn-primary'>Show Available Products</button>
</form></h2>";

} else {
	echo "<h1 align='center' >Welcome To My Website</h1><br><br><br>";
	echo "<p  align='center' ><h2 align='center'>YOU ARE NOT LOGGED IN!</h2></p>";
}
?>
</div>


</body>
</html>
