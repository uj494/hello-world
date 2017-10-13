<?php
include 'header.php';
include 'C:\wamp64\www\PHP\includes\comment-inc.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
 
<?php
if (isset($_SESSION['user_id'])) {

	echo "
<img src='img\IMG_6203 (2).jpg' height='300' width='300'/>";


	echo "<form class='comment' method='POST' action='".setComments($conn)."'>
	<input type='hidden' name='uid' value='".$_SESSION['user_id']."'>
	<textarea name='message'></textarea><br>
	<button name='commentSubmit' type='submit'>Comment</button>
</form>";
getComments($conn);
} else {
	echo "<p  align='center'><strong>YOU ARE NOT LOGGED IN!</strong></p>";
}
?>



</body>
</html>
