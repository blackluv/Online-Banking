<?php 
session_start();
     
if(!isset($_SESSION['admin_login'])) 
    header('location: admin_login.php');   
?>

<?php 
	error_reporting(0);
	include 'db_connection.php';
	$result = mysqli_query($connection, "SELECT * from `customer` where `acc_status` = '1' ");

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Online Banking System | Edit/Delete Customers</title>
		<link rel="stylesheet" type="text/css" href="./css/Style.css">
		<style type="text/css">
			table{
				border: 2px solid black;
				text-align: center;
				background-color: #e6e6e6;
				margin-top: 60px;
				margin-bottom: 70px;
			}
			th{
				border: 2px solid black;	
			}
			tr{
				border: 2px solid black;
			}
			td{
				border: 2px solid black;
			}
			table a:hover{
				color: red;
				font-weight: bold;
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
						<li class="current"><a href="#">Edit/Delete Customer</a></li>
						<li><a href="admin_issue.php">Approve Requests</a></li>
						<li><a href="approve_beneficiary.php">Approve Benificiary</a></li>
						<li><a href="admin_changepass.php">Change Password</a></li>
						<li><a href="admin_logout.php">Logout</a></li>
					</ul>
				</nav>
			</div>
		</section><br>

		<div class="container">

			<center><h2>Welcome (Admin) <?php $admin_id=$_SESSION['admin_id'];include 'db_connection.php';$result1 = mysqli_query($connection, "SELECT * FROM admin WHERE admin_id = '$admin_id'");$rws1=  mysqli_fetch_assoc($result1);$name = $rws1["name"];echo "$name";?></h2></center>

			<table align="center">
				<thead>
					<th>Sr. No</th>
					<th>Name</th>
					<th>Gender</th>
					<th>DOB</th>
					<th>Nominee</th>
					<th>Account Type</th>
					<th>Address</th>
					<th>Phone No</th>
					<th>User Name</th>
					<th>Branch</th>
					<th>Account No</th>
					<th>Email ID</th>
					<th>Status</th>
					<th colspan="2"><center>Action</center></th>
				</thead>
				<tbody>
					<?php 
						$count = 1;
						/*$count2 = 1;*/
						while($row = mysqli_fetch_assoc($result)){ 
							echo "<tr>";
							echo "<td>".$count."</td>";
							echo "<td>".$row["name"]."</td>";
							echo "<td>".$row["gender"]."</td>";
							echo "<td>".$row["dob"]."</td>";
							echo "<td>".$row["nominee"]."</td>";
							echo "<td>".$row["account"]."</td>";
							echo "<td>".$row["address"]."</td>";
							echo "<td>".$row["mobile_no"]."</td>";
							echo "<td>".$row["user_id"]."</td>";
							echo "<td>".$row["branch"]."</td>";
							echo "<td>".$row["account_no"]."</td>";
							echo "<td>".$row["email_id"]."</td>";
							echo "<td>ACTIVE</td>";
							echo "<td>"."<a href='edit.php?id=".$row['id']."'>"."Edit"."</a>"."</td>";
							echo "<td>"."<a href='delete.php?id=".$row['id']."'>"."Delete"."</a>"."</td>";
							echo "</tr>";
					
							$count++;
							/*$count2++;*/
						}
					?>
				</tbody>
			</table>
		</div>

		<footer><center><b><p>Online Banking System Copyright &copy; 2017-18</p></b></center></footer>		
	</body>
</html>
