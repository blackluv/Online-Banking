<?php 
session_start();
     
if(!isset($_SESSION['customer_login'])) 
    header('location: home.php');   
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Online Banking System | About Us</title>
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
						<li class="current"><a href="#">ABOUT US</a></li>
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
				<h2 style="color:#2E4372;"><u>Features:</u></h2>
				<ul type="square">
					<li>Registration For Online Banking</li>
					<li>Adding Benificiary account</li>
					<li>Money Transfer</li>
					<li>Mini Statement</li>
					<li>ATM and Cheque Book approval</li>
				</ul>
			</div>
			<div class="random">
				<h2 style="color:#2E4372;"><u>Contact Us:</u></h2>
				<h3><u>Mumbai Branch:</u></h3>
				<div><span>Address - 31, Mark Internationla, 31 Apmc Yard, Masco Sector 18, Vashi, Navi Mumbai.</span></div>
				<div><span>Telephone No - 02227889741</span></div>
				<div><span>Email ID - onlinemumbai@gmail.com</span></div><br>
				<h3><u>Delhi Branch:</u></h3>
				<div><span>Address - 314, 27 New Delhi House, Barakhamba Road</span></div>
				<div><span>Telephone No - 23717332</span></div>
				<div><span>Email ID - onlinedelhi@gmail.com</span></div><br>
				<h3><u>Chennai Branch:</u></h3>
				<div><span>Address - 73/2, N M Road, Aminjikarai</span></div>
				<div><span>Telephone No - 04422343091</span></div>
				<div><span>Email ID - onlinechennai@gmail.com</span></div><br>
				<h3><u>Kolkata Branch:</u></h3>
				<div><span>Address - 27, Rhenius Street, Nanjappa Circle, Shanti Nagar</span></div>
				<div><span>Telephone No - 22213811</span></div>
				<div><span>Email ID - onlinekolkata@gmail.com</span></div>
			</div>
		</div><br><br>
		<footer><center><b><p>Online Banking System Copyright &copy; 2017-18</p></b></center></footer>		
	</body>
</html>