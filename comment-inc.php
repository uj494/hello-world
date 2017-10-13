<?php
include 'dbh-inc.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php

function setComments($conn) {
	if (isset($_POST['commentSubmit'])) {
		$uid = $_POST['uid'];
		$message = $_POST['message'];

		$sql = "INSERT INTO comment (uid,message) 
		VALUES ('$uid' , '$message')";

		$result = $conn->query($sql);
	}

}

function getComments($conn) {

$sql = "SELECT * FROM comment";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
	$id = $row['uid']; 
	$sql2 = "SELECT * FROM users WHERE user_id='$id'";
	$result2 = $conn->query($sql2);
	if ($row2 = $result2->fetch_assoc()) {
		echo "<div class = 'comment-box'><p>";
	echo "<strong>".$row2['user_first']."</strong>:-<br><br>";
	echo nl2br($row['message']);
	echo "</p>";

	if (isset($_SESSION['user_id'])) {

		if ($_SESSION['user_id'] == $row['uid']) {
		
			$id = $_SESSION['user_id'];
			
			echo "<form class='delete' method='POST' action='".deleteComments($conn,$id)."'>
	<input type='hidden' name='cid' value='".$row['cid']."'>
	<button type='submit' name='commentDelete'> delete</button>
	</form>
	<form class='edit' method='POST' action='editcomment.php'>
	<input type='hidden' name='cid' value='".$row['cid']."'>
	<input type='hidden' name='uid' value='".$row['uid']."'>
	<input type='hidden' name='message' value='".$row['message']."'>
	<button> edit</button>
	</form>";	

		} else {
			$id = $_SESSION['user_id'];

			$sqlReply = "SELECT * FROM comment WHERE uid!='$id'";
			
			$resultReply = $conn->query($sqlReply);
			while($rowReply = $resultReply->fetch_assoc()) {
				for($i=1;$i<=100;$i++){
				if($rowReply['cid'] == $i){
				
			echo "<form class='edit' method='POST' action='replycomment.php'>
			
				<input type='hidden' name='cid' value='".$i."'>
				<input type='hidden' name='uid' value='".$_SESSION['user_id']."'>
				<button type='submit' name='replyComment'>reply</button>
				</form>";
			}
			}
		}
		
	}
	
	echo "</div>";
	}

	
}
}
}

function deleteComments($conn,$id) {
	if (isset($_POST['commentDelete'])) {
		$cid = $_POST['cid'];

		$sql = "DELETE FROM comment WHERE cid='$cid' AND uid = '$id'";

		$result = $conn->query($sql);
		header("Location: index.php");
	}

}

function editComments($conn) {
	if (isset($_POST['commentSubmit'])) {
		$cid = $_POST['cid'];
		$uid = $_POST['uid'];
		$message = $_POST['message'];

		$sql = "UPDATE comment SET message='$message' WHERE cid='$cid'";

		$result = $conn->query($sql);
		header("Location: index.php");
	}

}


function replyComments($conn) {
	if (isset($_POST['replySubmit'])) {
		$cid = $_POST['cid'];
		$uid = $_POST['uid'];
		$message = $_POST['reply'];

		$sql = "UPDATE comment SET reply='$message' AND reply_id='$uid' WHERE cid='$cid'";

		$result = $conn->query($sql);
		header("Location: index.php");
	}

}

?>
</body>
</html>