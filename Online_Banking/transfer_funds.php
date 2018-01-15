<?php 
session_start();
     
if(!isset($_SESSION['customer_login'])) 
    header('location: home.php');   
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Online Banking System | Transfer Money</title>
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
						<li><a href="mini_statements.php">Mini Statements</a></li>
						<li class="current"><a href="#">Transfer Funds</a></li>
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
					<h1>Welcome <?php $cust_id=$_SESSION['cust_id'];include 'db_connection.php';$result1 = mysqli_query($connection, "SELECT * FROM customer WHERE user_id = '$cust_id'");$rws1=  mysqli_fetch_assoc($result1);$name = $rws1["name"];echo "$name";?></h1>
					<h1>Transfer Funds</h1><br>
				</center>

				 <?php
				 error_reporting(0);
                    include 'db_connection.php';
        			$sender_id = $_SESSION['login_id'];
        			
        			$result = mysqli_query($connection, "SELECT * FROM beneficiary WHERE sender_id='$sender_id' AND status='Approved'");
	   				$rws=  mysqli_fetch_assoc($result);
        
        			$s_id=$rws["sender_id"];              

        			?>
					 
					 	<?php 
					 	
        				if($sender_id == $s_id)    
				        { ?>
				        	<div id="transfer">
				        		<?php 
				        echo "<form action='transfer_process.php' method='POST'>";
				        echo "<table cellspacing='20'>";
				        echo "<tr><td>Select Beneficiary:</td><td> <select name='transfer'>" ; 
				        
				        $result = mysqli_query($connection, "SELECT * FROM beneficiary WHERE sender_id='$sender_id' AND status='Approved'");
	   				
				        while($rws = mysqli_fetch_assoc($result)) {
				        echo "<option value = '".$rws["receiver_id"]."'>".$rws["receiver_name"]."</option>";
				        }
				      
				        echo "</td></tr></select>";
				         
				        echo "<tr><td>Enter Amount: </td><td><input type='number' name='t_val' required></td></tr>";
				        echo "<tr><td style='padding:5px;' colspan='2'><center><input type='submit' name='submitBtn' value='Transfer' class='BTN1'></center></td></tr>";
				        echo "</table></form>"; 
				        ?>
					</div>
				       <?php
				       } 
				       else{
				            echo "<br><br><div><center><h2>No Benefeciary Added with your account.</h2></center></div>";
				        }
        			?>
					<!-- <form>
						<table cellspacing="20">
							<tr>
								<td>Select Benificiary:</td>
								<td>
									<select>
										<option>Someone's Name</option>
										<option>Someone's Name</option>
										<option>Someone's Name</option>
										<option>Someone's Name</option>
									</select>
								</td>
							</tr>
							<tr>
								<td>Amount:</td>
								<td><input type="number" name="transferAmount" required></td>
							</tr>
							<tr>
								<td colspan="2"><center><input type="submit" value="Transfer" name="transferSubmit"></center></td>
							</tr>
						</table>
					</form>
				</div> -->
				<!-- <div id="iidd">
					<center>
						<h1><a href="beneficiary.php">Add Benificiary</a></h1><br>
					</center>		
				</div>		 -->
			<br><br><br>
		</section>
		<footer><center><b><p>Online Banking System Copyright &copy; 2017-18</p></b></center></footer>		
	</body>
</html>