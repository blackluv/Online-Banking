<?php 
session_start();
     
if(!isset($_SESSION['admin_login'])) 
    header('location: admin_login.php');   
?>
<?php 
	error_reporting(0);
	if(isset($_GET['id'])){
		$value = $_GET['id'];
		//echo "$value";

		include 'db_connection.php';

		mysqli_query($connection, " UPDATE `customer` SET `acc_status` = '0' WHERE `customer`.`id` = '".$value."' ");

		header("location: edit_delete.php");
		}


?>