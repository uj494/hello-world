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
	
	echo "<form class='comment' method='POST' action='".replyComments($conn)."'>
	<input type='hidden' name='cid' value='".$cid."'>
	<input type='hidden' name='uid' value='".$uid."'>
	<textarea name='reply'></textarea><br>
	<button name='replySubmit' type='submit'>reply</button>
</form>";
?>



</body>
</html>
