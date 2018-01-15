<?php 
session_start();
    
if(!isset($_SESSION['admin_login'])) 
    header('location: admin_login.php');   
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Online Banking System | Add Customer</title>
		<link rel="stylesheet" type="text/css" href="./css/Style.css">
		<script type="text/javascript">
			function val() {
				var num = parseInt(document.getElementById('minAmt').value);
				if (num <= 500) {
					alert("The starting Amount Should be more than 500 Rs");
					return false;
				}
			}
		</script>
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
						<li class="current"><a href="#">Add Customer</a></li>
						<li><a href="edit_delete.php">Edit/Delete Customer</a></li>
						<li><a href="admin_issue.php">Approve Requests</a></li>
						<li><a href="approve_beneficiary.php">Approve Benificiary</a></li>
						<li><a href="admin_changepass.php">Change Password</a></li>
						<li><a href="admin_logout.php">Logout</a></li>
					</ul>
				</nav>
			</div>
		</section><br>
		<div class="container">
			<center><h2>Welcome (Admin) <?php $admin_id=$_SESSION['admin_id'];include 'db_connection.php';$result1 = mysqli_query($connection, "SELECT * FROM admin WHERE admin_id = '$admin_id'");$rws1=  mysqli_fetch_assoc($result1);$name = $rws1["name"];echo "$name";?></h2></center><br><br>
			<div id="add">
				<center><h2><u>Add Customer:</u></h2></center><br>
				<form action="addcustomer_process.php" method="post" name="add" onsubmit="return val()">
					<table cellspacing="20">
						<tr>
							<td>Customer's Name:</td>
							<td><input type="text" name="custName" required pattern="[A-Za-z\s]{4,50}" title="Enter Valid Name eg. Ankit Rana"></td>
						</tr>						
						<tr>
							<td>User Name:</td>
							<td><input type="text" name="custUser" pattern="[a-z0-9]{4,}" title="User Name should contain only smaller case letters eg. ankit123 and size should be more than 4" required></td>
						</tr>
						<tr>
							<td>Gender:</td>
							<td><input type="radio" name="r1" required value="Male"><span>Male</span><input type="radio" name="r1" required value="Female"><span>Female</span><input type="radio" name="r1" required value="Others"><span>Others</span></td>
						</tr>
						<tr>
							<td>DOB:</td>
							<td><input type="date" name="dob" required></td>
						</tr>
						<tr>
							<td>Nominee:</td>
							<td><input type="text" name="nominee" pattern="[A-Za-z\s]{4,50}" title="Enter Valid Name eg. Ankit Rana" required></td>
						</tr>
						<tr>
							<td>Branch:</td>
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
							<td>Account Type:</td>
							<td>
								<select name="type">
									<option>Savings</option>
									<option>Current</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Account No:</td>
							<td><input type="text" name="accNo" pattern="[1-9]{1}[0-9]{8}" title="Account No should be numbers of size 9 and not start with 0 eg. 786512345" required></td>
						</tr>
						<tr>
							<td>Minimum Amount:</td>
							<td><input type="number" name="minAmt" id="minAmt"></td>
						</tr>
						<tr>
							<td>Address:</td>
							<td><textarea name="address" required></textarea></td>
						</tr>
						<tr>
							<td>Mobile:</td>
							<td><input type="text" name="mob" pattern="[7-9]{1}[0-9]{9}" title="Mobile Number should start with 7,8,9 and of size 10 eg. 9876541234" required></td>
						</tr>
						<tr>
							<td>Email Id:</td>
							<td><input type="email" name="eid" required></td>
						</tr>
						<tr>
							<td>Password:</td>
							<td><input type="password" name="pass" pattern=".{6,}" title="Password should be of more than 6 characters" required></td>
						</tr>
						<tr></tr>
						<tr></tr>
						<tr>
							<td colspan="2"><center><input type="submit" name="addbtn" value="Add Customer" class="BTN"></center></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
		<br><br>
		<footer><center><b><p>Online Banking System Copyright &copy; 2017-18</p></b></center></footer>		
	</body>
</html>
