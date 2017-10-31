<?php
include 'header.php';
include 'C:\wamp64\www\WebTech\includes\dbh-inc.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>BUY</title>
  
</head>
<body background="img\pencil-art-colorful-wallpaper-99342104.jpg">
<div style="color: white;">

<div align='center'> <form  method='POST'  action='yourcart.php'>
      
     <button name='cart' type='submit' class='btn btn-light'>Back To Cart</button></li>
      </form></div><br><br>

<h3 align="center"> Choose Your Payment Option </h3><br><br>
<?php
$id = $_SESSION['user_id'];
$sqlbuy = "SELECT * FROM cart WHERE userid='$id'";
  $resultbuy = $conn->query($sqlbuy);
  $sum=0;
 while($rowbuy = $resultbuy->fetch_assoc()){
 	$idbuy=$rowbuy['product_id'];
			$sqlcart = "SELECT * FROM product WHERE pro_id='$idbuy'";
  			$resultcart = $conn->query($sqlcart);
  			$rowcart = $resultcart->fetch_assoc();
  			$sum = $rowcart['pro_price'] + $sum;
  			echo "<h3 class = 'h3'>".$rowcart['pro_name'].":".$rowcart['pro_price']."</h3> <hr><br>";

 }
 echo "<h3 class = 'h3 '>Total Price :-".$sum."</h3><hr><br><br>";
?>
<h2 > Your Details :-</h2>

 <form  method="POST" style="width: 500px;" autocomplete="OUT">
  <div class="form-group" align="center">
    <input type="text" class="form-control" name="first" placeholder="firstname">
  </div>
  <div class="form-group" align="center">
    <input type="text" class="form-control" name="last" placeholder="Lastname">
  </div>
  <div class="form-group" align="center">
    <input type="text" class="form-control" name="contact" placeholder="Contact Number">
  </div>
  <div class="form-group" align="center">
    <textarea rows="4" cols="50" class="form-control" name="address" placeholder="Address"></textarea>
  </div>
  <div class="form-group" align="center">
    <input type="text" class="form-control" name="pincode" placeholder="Pincode">
  </div>
  <div class="form-group" align="center">
    <input type="text" class="form-control" name="city" placeholder="City">
  </div>
</form>
<br><br>
<ol >
<li><form method="POST" >
	<button type="submit" class='btn btn-light' name="CreditCard">Credit Card</button>
</form></li><br><br>
<li><form method="POST" >
	<button type="submit" class='btn btn-light' name="DebitCard">Debit Card</button>
</form></li>
</ol>
<?php
if (isset($_POST['DebitCard'])) {
//class="buy"
	echo"<div align='center' >
 <form method='POST' style='width: 500px;' action = 'paid.php'>
  <div class='form-group' align='center'>
    <input type='text' class='form-control' name='DC' placeholder='Debit Card Number'>
  </div>
  <div class='form-group' align='center'>
    <input type='text' class='form-control' name='NameOnDC' placeholder='Name On Card'>
  </div>
  <div class='form-group' align='center'>
    <input type='text' class='form-control' name='Edate' placeholder='Expiry Date'>
  </div>
  <div class='form-group' align='center'>
    <input type='Password' class='form-control' name='CVV' placeholder='CVV'>
  </div>
  <div class='form-group' align='center'>
  <button type='submit' class='btn btn-light' name='submit'>BUY</button>
  </div>
</form>
</div>";
}
elseif (isset($_POST['CreditCard'])) {

	echo"<div align='center' >
 <form method='POST' style='width: 500px;' action = 'paid.php'>
  <div class='form-group' align='center'>
    <input type='text' class='form-control' name='CC' placeholder='CreditCard Number'>
  </div>
  <div class='form-group' align='center'>
    <input type='text' class='form-control' name='NameOnCC' placeholder='Name On Card'>
  </div>
  <div class='form-group' align='center'>
    <input type='text' class='form-control' name='Edate' placeholder='Expiry Date'>
  </div>
  <div class='form-group' align='center'>
    <input type='Password' class='form-control' name='CVV' placeholder='CVV'>
  </div>
  <div class='form-group' align='center'>
  <button type='submit' class='btn btn-light' name='submit'>BUY</button>
  </div>
</form>
</div>";
}
?>
</div>
</body>
</html>