<?php 
session_start();
     
if(!isset($_SESSION['admin_login'])) 
    header('location: admin_login.php');   
?>
 <?php
 error_reporting(0);
include 'db_connection.php';
$result = mysqli_query($connection, "SELECT * FROM beneficiary WHERE status='Pending'");
	   
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Online Banking System | Approve Beneficiary</title>
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
						<li class="current"><a href="#">Approve Benificiary</a></li>
						<li><a href="admin_changepass.php">Change Password</a></li>
						<li><a href="admin_logout.php">Logout</a></li>
					</ul>
				</nav>
			</div>
		</section><br>
		<div class="atm_issue_table">
			<div class="container">
				<center><h2>Welcome (Admin) <?php $admin_id=$_SESSION['admin_id'];include 'db_connection.php';$result1 = mysqli_query($connection, "SELECT * FROM admin WHERE admin_id = '$admin_id'");$rws1=  mysqli_fetch_assoc($result1);$name = $rws1["name"];echo "$name";?></h2>
				</center>
				<form action="approve_beneProcess.php" method="post">
					<table width="800" class="issueTable">
						<thead>
							<th>Select</th>
							<th>Sender ID</th>
							<th>Sender</th>
							<th>Receiver Account No</th>
							<th>Receiver</th>
							<th>Status</th>
						</thead>
						<tbody>
							<?php
							error_reporting(0);
                       			while($rws=  mysqli_fetch_assoc($result)){
		                            echo "<tr>";	
		                            echo "<td><input type='radio' name='cust_id' value=".$rws['id'];
		                            echo 'checked';
		                            echo "/></td>";	               		                       
		                            echo "<td>".$rws['sender_id']."</td>";
		                            echo "<td>".$rws['sender_name']."</td>";
		                            echo "<td>".$rws['receiver_account']."</td>";		
		                            echo "<td>".$rws['receiver_name']."</td>";
		                            echo "<td>".$rws['status']."</td>";		                            
		                            echo "</tr>";
                        		}
                        	?>
                        	<tr><td colspan="6"><center><input type="submit" name="benesubmit" value="Approve" class="BTN1"></center></td></tr>
						</tbody>
					</table>
				</form>
			</div>
		</div>
		<footer><center><b><p>Online Banking System Copyright &copy; 2017-18</p></b></center></footer>		
	</body>
</html>