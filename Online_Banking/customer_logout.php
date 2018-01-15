<?php 
	error_reporting(0);
	session_start();

	include 'db_connection.php';

	$date = date('Y-m-d h:i:s');
	$cust_id = $_SESSION['cust_id'];
	
	mysqli_query($connection, "UPDATE customer SET last_logout='$date' WHERE user_id = '$cust_id'");

	session_destroy();
	header('location: home.php');


?>