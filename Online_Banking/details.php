<?php 
session_start();
     
if(!isset($_SESSION['customer_login'])) 
    header('location: home.php');   
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Online Banking System | Personal Details</title>
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
						<li class="current"><a href="#">Personal Details</a></li>
						<li><a href="beneficiary.php">Beneficiary</a></li>
						<li><a href="mini_statements.php">Mini Statements</a></li>
						<li><a href="transfer_funds.php">Transfer Funds</a></li>
						<li><a href="issue.php">Request Service</a></li>
						<li><a href="changepass.php">Change Password</a></li>
						<li><a href="customer_logout.php">Logout</a></li>
					</ul>
				</nav>
			</div>
		</section>
		<section>
			<div class="container">
				<center>
					<h1>Welcome <?php $cust_id=$_SESSION['cust_id'];include 'db_connection.php';$result= mysqli_query($connection, "SELECT * FROM customer WHERE user_id = '$cust_id'");$rws=  mysqli_fetch_assoc($result);$name = $rws["name"];echo "$name";?></h1>
					<h1>Personal Details</h1><br>
				</center><br>
				<div id="div1">
					<div class="jfp">
					<span class="makeBold">Name:</span><span>&nbsp;&nbsp;<?php $cust_id=$_SESSION['cust_id'];include 'db_connection.php';$result= mysqli_query($connection, "SELECT * FROM customer WHERE user_id = '$cust_id'");$rws=  mysqli_fetch_assoc($result);$name = $rws["name"];echo "$name";?></span><br><br>
					<span class="makeBold">Gender:</span><span>&nbsp;&nbsp;<?php $cust_id=$_SESSION['cust_id'];include 'db_connection.php';$result= mysqli_query($connection, "SELECT * FROM customer WHERE user_id = '$cust_id'");$rws=  mysqli_fetch_assoc($result);$gender = $rws["gender"];echo "$gender";?></span><br><br>
					<span class="makeBold">Email:</span><span>&nbsp;&nbsp;<?php $cust_id=$_SESSION['cust_id'];include 'db_connection.php';$result= mysqli_query($connection, "SELECT * FROM customer WHERE user_id = '$cust_id'");$rws=  mysqli_fetch_assoc($result);$email_id = $rws["email_id"];echo "$email_id";?></span><br><br>
					<span class="makeBold">Phone No:</span><span>&nbsp;&nbsp;<?php $cust_id=$_SESSION['cust_id'];include 'db_connection.php';$result= mysqli_query($connection, "SELECT * FROM customer WHERE user_id = '$cust_id'");$rws=  mysqli_fetch_assoc($result);$phone_no = $rws["mobile_no"];echo "$phone_no";?></span><br><br>
					<span class="makeBold">Address:</span><span>&nbsp;&nbsp;<?php $cust_id=$_SESSION['cust_id'];include 'db_connection.php';$result= mysqli_query($connection, "SELECT * FROM customer WHERE user_id = '$cust_id'");$rws=  mysqli_fetch_assoc($result);$name = $rws["address"];echo "$name";?></span><br><br>
					</div>
				</div>
				<div id="div2">
					<div class="jfp">
					<span class="makeBold">Account No:</span><span>&nbsp;&nbsp;<?php $cust_id=$_SESSION['cust_id'];include 'db_connection.php';$result= mysqli_query($connection, "SELECT * FROM customer WHERE user_id = '$cust_id'");$rws=  mysqli_fetch_assoc($result);$name = $rws["account_no"];echo "$name";?></span><br><br>
					<span class="makeBold">Nominee:</span><span>&nbsp;&nbsp;<?php $cust_id=$_SESSION['cust_id'];include 'db_connection.php';$result= mysqli_query($connection, "SELECT * FROM customer WHERE user_id = '$cust_id'");$rws=  mysqli_fetch_assoc($result);$name = $rws["nominee"];echo "$name";?></span><br><br>
					<span class="makeBold">Branch Name:</span><span>&nbsp;&nbsp;<?php $cust_id=$_SESSION['cust_id'];include 'db_connection.php';$result= mysqli_query($connection, "SELECT * FROM customer WHERE user_id = '$cust_id'");$rws=  mysqli_fetch_assoc($result);$name = $rws["branch"];echo "$name";?></span><br><br>
					<span class="makeBold">Account Type:</span><span>&nbsp;&nbsp;<?php $cust_id=$_SESSION['cust_id'];include 'db_connection.php';$result= mysqli_query($connection, "SELECT * FROM customer WHERE user_id = '$cust_id'");$rws=  mysqli_fetch_assoc($result);$name = $rws["account"];echo "$name";?></span><br><br>
					<span class="makeBold">User Id:</span><span>&nbsp;&nbsp;<?php $cust_id=$_SESSION['cust_id'];include 'db_connection.php';$result= mysqli_query($connection, "SELECT * FROM customer WHERE user_id = '$cust_id'");$rws=  mysqli_fetch_assoc($result);$name = $rws["user_id"];echo "$name";?></span><br><br>
					</div>
				</div>
			</div>			
		</section><br>	
		
		<?php
			$cust_id=$_SESSION['cust_id'];
			include 'db_connection.php';
			$result= mysqli_query($connection, "SELECT * FROM customer WHERE user_id = '$cust_id'");
			$rws=  mysqli_fetch_assoc($result);
			$logout = $rws["last_logout"];
			echo "<center><h2>Your last Login date and time was $logout</h2></center>"
		?>

		<br><br>
		<footer><center><b><p>Online Banking System Copyright &copy; 2017-18</p></b></center></footer>		
	</body>
</html>