<?php 
session_start();
     
if(!isset($_SESSION['customer_login'])) 
    header('location: home.php');   
?>

<?php 
error_reporting(0);
	include 'db_connection.php';
	$sender_id = $_SESSION["login_id"];
	$result = mysqli_query($connection, "SELECT * FROM passbook".$sender_id);
 ?>

<!DOCTYPE html>
<html>
	<head>
		<title>Online Banking System | Mini Statements</title>
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
						<li><a href="details.php">Personal Details</a></li>
						<li><a href="beneficiary.php">Beneficiary</a></li>
						<li class="current"><a href="#">Mini Statements</a></li>
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
					<h1>Welcome <?php $cust_id=$_SESSION['cust_id'];$result1 = mysqli_query($connection, "SELECT * FROM customer WHERE user_id = '$cust_id'");$rws1=  mysqli_fetch_assoc($result1);$name = $rws1["name"];echo "$name";?></h1>
					<h1><u>Mini Statements</u></h1>
				</center>
			</div>
		</section>
		<div class="atm_issue_table">
			<div class="container">
				<table width="800" class="issueTable">
					<thead>
						<th>Sr.No</th>
                        <th>Transaction Date</th>
                        <th>Narration</th>
                        <th>Credit</th>
                        <th>Debit</th>
                        <th>Balance Amount</th>
					</thead>
					<tbody>
						<?php
						error_reporting(0);
                   			while($rws =  mysqli_fetch_assoc($result)){	                          
	                            echo "<td>".$rws['transactionid']."</td>";
	                            echo "<td>".$rws['transactiondate']."</td>";
	                            echo "<td>".$rws['narration']."</td>";		                            
	                            echo "<td>".$rws['credit']."</td>";		                            
	                            echo "<td>".$rws['debit']."</td>";		                            
	                            echo "<td>".$rws['amount']."</td>";		                            
	                            echo "</tr>";
                    		}
                    	?>
					</tbody>
				</table>				
			</div>
		</div>
		<br><br>
		<footer><center><b><p>Online Banking System Copyright &copy; 2017-18</p></b></center></footer>		
	</body>
</html>