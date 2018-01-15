<?php 
session_start();
     
if(!isset($_SESSION['customer_login'])) 
    header('location: home.php');   
?>
 <?php
 error_reporting(0);
include 'db_connection.php';
$sender_id=$_SESSION["login_id"];
$result1 = mysqli_query($connection, "SELECT * FROM beneficiary WHERE sender_id='$sender_id'");
/*$rws = mysqli_fetch_assoc($result);
print_r($rws);*/
	   
?>
<?php
error_reporting(0);
if(isset($_POST['cust_id']))
{
include 'db_connection.php';
$customer_id = $_POST["cust_id"];
mysqli_query($connection, "DELETE FROM beneficiary WHERE id = '$customer_id'");

echo '<script>alert("Beneficiary Deleted successfully. ");';
echo 'window.location= "display_beneficiary.php";</script>';
                    
}
/*else{
	echo '<script>alert("Select One Option");';
	echo 'window.location= "display_beneficiary.php";</script>';
}*/
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Online Banking System | Beneficiary</title>
		<link rel="stylesheet" type="text/css" href="./css/Style.css">
		<style type="text/css">
			#iidd h1 a:hover{
				font-weight: bold;
				color: red;
			}
		</style>
	</head>
	<body>
		<header>
			<div class="container">
				<div id="title">
					<h1><span id="spn">Online</span> Banking System</h1>
				</div>
				<nav>
					<ul>
						<li><a href="home.php">HOME</a></li>
						<li><a href="cust_features.php">FEATURES</a></li>
						<li><a href="cust_about.php">ABOUT US</a></li>
					</ul>
				</nav>
			</div>
		</header>
		<section class="navbar">
			<div class="container">
				<nav id="insideLogin">
					<ul>
						<li><a href="details.php">Personal Details</a></li>
						<li class="current"><a href="#">Beneficiary</a></li>
						<li><a href="mini_statements.php">Mini Statements</a></li>
						<li><a href="transfer_funds.php">Transfer Funds</a></li>
						<li><a href="issue.php">Request Service</a></li>
						<li><a href="changepass.php">Change Password</a></li>
						<li><a href="customer_logout.php">Logout</a></li>
					</ul>
				</nav>
			</div>
		</section>
		<div class="atm_issue_table">
			<div class="container">
				<center>
					<h1>Welcome <?php $cust_id=$_SESSION['cust_id'];include 'db_connection.php';$result= mysqli_query($connection, "SELECT * FROM customer WHERE user_id = '$cust_id'");$rws=  mysqli_fetch_assoc($result);$name = $rws["name"];echo "$name";?></h1>
					<h2>Beneficiary List</h2>
				</center>
				<form method="post" action="">
					<table width="700" class="issueTable">
						<thead>
							<th>ID</th>
							<th>Name</th>
							<th>Beneficiary Account No</th>
							<th>Status</th>
						</thead>
						<tbody>
							<?php
	                   			while($rws1=  mysqli_fetch_assoc($result1)){
		                            echo "<tr>";	
		                            echo "<td><input type='radio' name='cust_id' value=".$rws1['id'];
		                            echo 'checked';
		                            echo "/></td>";	               		                       
		                            echo "<td>".$rws1['receiver_name']."</td>";
		                            echo "<td>".$rws1['receiver_account']."</td>";
		                            echo "<td>".$rws1['status']."</td>";		                            
		                            echo "</tr>";
	                    		}
	                    	?>
	                    	<tr><td colspan="4"><center><input type="submit" name="deleteSubmit" value="Delete" class="BTN1"></center></td></tr>
						</tbody>
					</table>
				</form>
				<div id="iidd">
					<center>
						<h1><a href="beneficiary.php">Back</a></h1><br>
					</center>		
				</div>
			</div>
		</div>
		<footer><center><b><p>Online Banking System Copyright &copy; 2017-18</p></b></center></footer>		
	</body>
</html>