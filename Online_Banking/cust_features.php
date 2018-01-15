<?php 
session_start();
     
if(!isset($_SESSION['customer_login'])) 
    header('location: home.php');   
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Online Banking System | Features</title>
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
						<li class="current"><a href="#">FEATURES</a></li>
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
						<li><a href="beneficiary.php">Beneficiary</a></li>
						<li><a href="mini_statements.php">Mini Statements</a></li>
						<li><a href="transfer_funds.php">Transfer Funds</a></li>
						<li><a href="issue.php">Request Service</a></li>
						<li><a href="changepass.php">Change Password</a></li>
						<li><a href="customer_logout.php">Logout</a></li>
					</ul>
				</nav>
			</div>
		</section><br>
		<div class="container">
			<div class="random">
				<h2 style="text-align:center;color:#2E4372;"><u>Online Banking Features:</u></h2>
				<ul type="square">
					<li>Registration for Online Banking by Admin.</li>
					<li>Transfer of money from one account to another account by Customer.</li>
					<li>Adding Beneficiary account by Customer.</li>
					<li>Admin must approve for beneficiary activation before it can be used for transferring funds.</li>
					<li>Customer gets to know his last login date and time each time he logs in.</li>
					<li>Customer can check all their transactions made with their account.</li>
					<li>Transaction Date can also be viewed By Customer in Mini Statements Section.</li>
					<li>Customer can request for ATM Card and Cheque Book.</li>
					<li>Admin will approve requests for ATM card and Cheque Book.</li>
					<li>Admin Login page is hidden from customer for security purpose.</li>
					<li>Customers and Admins can change their passwords</li>
				</ul>
			</div>
		</div>
		<br><br>
		<footer><center><b><p>Online Banking System Copyright &copy; 2017-18</p></b></center></footer>		
	</body>
</html>