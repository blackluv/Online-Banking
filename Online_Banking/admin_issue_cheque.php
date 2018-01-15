<?php 
session_start();
     
if(!isset($_SESSION['admin_login'])) 
    header('location: admin_login.php');   
?>
 <?php
 error_reporting(0);
include 'db_connection.php';
$result = mysqli_query($connection, "SELECT * FROM cheque_book WHERE cheque_book_status='Pending'");
	   
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Online Banking System | Issue Cheque Book</title>
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
						<li class="current"><a href="admin_issue.php">Approve Requests</a></li>
						<li><a href="approve_beneficiary.php">Approve Benificiary</a></li>
						<li><a href="admin_changepass.php">Change Password</a></li>
						<li><a href="admin_logout.php">Logout</a></li>
					</ul>
				</nav>
			</div>
		</section>
		<div class="atm_issue_table">
			<div class="container">
				<center><h2>Welcome (Admin) <?php $admin_id=$_SESSION['admin_id'];include 'db_connection.php';$result1 = mysqli_query($connection, "SELECT * FROM admin WHERE admin_id = '$admin_id'");$rws1=  mysqli_fetch_assoc($result1);$name = $rws1["name"];echo "$name";?></h2></center>
				<form action="admin_process_cheque.php" method="post">
					<table width="500" class="issueTable">
						<thead>
							<th>Select</th>
							<th>Name</th>
							<th>Account No</th>
							<th>Cheque Book Status</th>
						</thead>
						<tbody>
							<?php
							error_reporting(0);
                       			while($rws=  mysqli_fetch_assoc($result)){
		                            echo "<tr>";
		                            echo "<td><input type='radio' name='cust_id' value=".$rws['id'];
		                            echo 'checked';
		                            echo "/></td>";	           
		                            echo "<td>".$rws['cust_name']."</td>";
		                            echo "<td>".$rws['account_no']."</td>";
		                            echo "<td>".$rws['cheque_book_status']."</td>";	                          
		                            echo "</tr>";
                        		}
                        	?>
                        	<tr><td colspan="4"><center><input type="submit" name="chequesubmit" value="Approve" class="BTN1"></center></td></tr>
						</tbody>
					</table>
				</form>
			</div>
		</div>
		<footer><center><b><p>Online Banking System Copyright &copy; 2017-18</p></b></center></footer>		
	</body>
</html>