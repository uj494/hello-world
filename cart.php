<?php
session_start();
require_once 'includes/dbh-inc.php';
echo "<link rel='stylesheet' type='text/css' href='styles/style.css'>";

$uid = $_POST['id'];
$p_id = $_POST['p_id'];

$sql5 = "INSERT INTO cart (product_id,userid) VALUES ('$p_id' , '$uid');";

$result5 = $conn->query($sql5);

header('Location: viewproducts.php?cart=success');
	