
<?php 
session_start();
     
if(!isset($_SESSION['admin_login'])) 
    header('location: admin_login.php');   
?>



<!DOCTYPE html>
<html>
	<head>
		<title>Online Banking System | Admin Home</title>
		<link rel="stylesheet" type="text/css" href="./css/Style.css">
	</head>
	<body>
		<header>
			<div class="container">
				<div id="title">
					<h1><span id="spn">Online</span> Banking System</h1>
				</div>
				<nav>
					<ul>
						<li><a href="admin_login.php">HOME</a></li>
						<li><a href="services.php">FEATURES</a></li>
						<li><a href="about.php">ABOUT US</a></li>
					</ul>
				</nav>
			</div>
		</header>
		<section class="navbar">
			<div class="container">
				<nav id="insideLogin">
					<ul>
						<li><a href="add_customer.php">Add Customer</a></li>
						<li><a href="edit_delete.php">Edit/Delete Customer</a></li>
						<li><a href="admin_issue.php">Approve Requests</a></li>
						<li><a href="approve_beneficiary.php">Approve Benificiary</a></li>
						<li><a href="admin_changepass">Change Password</a></li>
						<li><a href="admin_logout.php">Logout</a></li>
					</ul>
				</nav>
			</div>
		</section>
		<br><br>
		<div class="container">
			<center><h2>Welcome (Admin) <?php $admin_id=$_SESSION['admin_id'];include 'db_connection.php';$result1 = mysqli_query($connection, "SELECT * FROM admin WHERE admin_id = '$admin_id'");$rws1=  mysqli_fetch_assoc($result1);$name = $rws1["name"];echo "$name";?></h2>
				<h3>Your last login date and time was <?php $date = $rws1["last_login"]; echo "$date"; ?></h3></center><br><br>
			<div id="box">
				<center>
					<font size="5">
					<div><a href="add_customer.php">Add customer</a></div><br>
					<div><a href="edit_delete.php">Edit Customer</a></div><br>
					<div><a href="edit_delete.php">Delete Customer</a></div><br>
					<div><a href="admin_issue.php">Approve Requests</a></div><br>
					<div><a href="approve_beneficiary.php">Approve Benificiary</a></div><br>
					<div><a href="admin_changepass.php">Change Password</a></div><br>
					<div><a href="admin_logout.php">Logout</a></div>
					</font>
				</center>
			</div>
		</div>
		<br>
		<footer><center><b><p>Online Banking System Copyright &copy; 2017-18</p></b></center></footer>		
	</body>
</html>
