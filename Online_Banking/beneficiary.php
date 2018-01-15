<?php 
session_start();
        
if(!isset($_SESSION['customer_login'])) 
    header('location: home.php');   
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Online Banking System | Add Beneficiary</title>
		<link rel="stylesheet" type="text/css" href="./css/Style.css">
		<style type="text/css">
			#t:hover{
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
						<li ><a href="mini_statements.php">Mini Statements</a></li>
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
					<h1><a href="display_beneficiary.php" id="t">Display Beneficiary List</a></h1><br>
				</center>
				<div id="Benificiary">
					<br><center><h1>Add Benificiary</h1></center>
					<form method="post" action="beneficiary_process.php">
						<table cellspacing="30">
							<tr>
								<td>Payee's Full Name:</td>
								<td>
									<input type="text" name="name" pattern="[A-Za-z\s]{4,50}" title="Enter Valid Name eg. Ankit Rana" required>
								</td>
							</tr>
							<tr>
								<td>Payee's Account Number:</td>
								<td><input type="text" name="account_no" pattern="[1-9]{1}[0-9]{8}" title="Account No should be numbers of size 9 and not start with 0 eg. 786512345" required></td>
							</tr>
							<tr>
								<td>Select Branch:</td>
								<td>
									<select name="branch">
										<option>Mumbai</option>
										<option>Delhi</option>
										<option>Chennai</option>
										<option>Kolkata</option>
									</select>
								</td>
							</tr>
							<tr>
								<td>IFSC Code:</td>
								<td><input type="text" name="ifsc"  pattern="[0-9A-Za-z]{4}" title="IFSC Code is of length 4 and alpha-numeric" required></td>
							</tr>							
							<tr>
								<td colspan="2"><center><input type="submit" value="Add Beneficiary" name="payeeSubmit" class="BTN3"></center></td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</section><br><br><br>
		<footer><center><b><p>Online Banking System Copyright &copy; 2017-18</p></b></center></footer>		
	</body>
</html>

