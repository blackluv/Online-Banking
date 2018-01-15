<?php 
session_start();
    
if(!isset($_SESSION['admin_login'])) 
    header('location: admin_login.php');   
?>

<?php 

	error_reporting(0);
	session_start();

	include 'db_connection.php';

	$date = date('Y-m-d h:i:s');
	$admin_id = $_SESSION['admin_id'];
	
	mysqli_query($connection, "UPDATE admin SET last_login='$date' WHERE admin_id = '$admin_id'");

	session_destroy();
	header('location: admin_login.php');

?>