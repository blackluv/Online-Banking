<?php 
session_start();
        
if(!isset($_SESSION['customer_login'])) 
    header('location: home.php');   
?>

<?php
	error_reporting(0);
	include 'db_connection.php';
    $change = $_SESSION['login_id'];
    if(isset($_POST['change_password'])){
    	$result = mysqli_query($connection, "SELECT * FROM customer WHERE id='$change'");          
    $rws=  mysqli_fetch_assoc($result);
    
    $salt="@g26jQsG&nh*&#8v";
    /*$old = $_POST['old_password'];*/
    $old=  sha1($_POST['old_password'].$salt);
    $new=  sha1($_POST['new_password'].$salt);
    $again=sha1($_POST['again_password'].$salt);
    
    if($rws["password"] == $old && $new == $again){
    	mysqli_query($connection, "UPDATE customer SET password='$new' WHERE id='$change'");
    	echo '<script>alert("Password Changed Successfully");';
		echo 'window.location= "details.php";</script>';                       
    }
    else if ($rws["password"] != $old) {
    	echo '<script>alert("Enter your Old Password Correctly!!!");';
		echo 'window.location= "changepass.php";</script>';                        	
    }
	
	elseif ($new != $again) {
	 	echo '<script>alert("Your Changed Passwords do not match!!!");';
		echo 'window.location= "changepass.php";</script>';                        	   	
	    }   

    else{
        
        echo '<script>alert("Incorrect Details!!!");';
		echo 'window.location= "changepass.php";</script>';                        	   	
    }
    }
    ?>

<!DOCTYPE html>
<html>
	<head>
		<title>Online Banking System | Change Password</title>
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
						<li><a href="transfer_funds.php">Transfer Funds</a></li>
						<li><a href="issue.php">Request Service</a></li>
						<li class="current"><a href="#">Change Password</a></li>
						<li><a href="customer_logout.php">Logout</a></li>
					</ul>
				</nav>
			</div>
		</section>
		<section>
			<div class="container">
				<center>
					<h1>Welcome <?php $cust_id=$_SESSION['cust_id'];include 'db_connection.php';$result1 = mysqli_query($connection, "SELECT * FROM customer WHERE user_id = '$cust_id'");$rws1=  mysqli_fetch_assoc($result1);$name = $rws1["name"];echo "$name";?></h1>
					<h1><u>Change Password</u></h1>
				</center>
				<br>
				<div id="chng">
					<form action="" method="post">
						<table cellspacing="20">
							<tr>
								<td>Enter Old Password:</td>
								<td><input type="password" name="old_password" placeholder="Old Password..." pattern=".{6,}" title="Password should be of more than 6 characters" required></td>
							</tr>
								<td>Enter New Password:</td>
								<td><input type="password" name="new_password" placeholder="New Password..." pattern=".{6,}" title="Password should be of more than 6 characters" required></td>
							</tr>
							<tr>
								<td>Confirm New Password:</td>
								<td><input type="password" name="again_password" placeholder="Confirm Password..." pattern=".{6,}" title="Password should be of more than 6 characters" required></td>
							</tr>
							<tr>
								<td colspan="2"><center><input type="submit" value="Change" name="change_password" class="BTN2"></center></td>
							</tr>
						</table>
					</form>
				</div>
		</section>
		<br>
		<br>
		<footer><center><b><p>Online Banking System Copyright &copy; 2017-18</p></b></center></footer>		
	</body>
</html>