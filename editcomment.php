<?php
include 'C:\wamp64\www\PHP\includes\comment-inc.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
 
<?php
	$cid = $_POST['cid'];
	$uid = $_POST['uid'];
	$message = $_POST['message'];
	
	echo "<form class='comment' method='POST' action='".editComments($conn)."'>
	<input type='hidden' name='cid' value='".$cid."'>
	<input type='hidden' name='uid' value='".$uid."'>
	<textarea name='message'>".$message."</textarea><br>
	<button name='commentSubmit' type='submit'>Edit</button>
</form>";
?>



</body>
</html>
