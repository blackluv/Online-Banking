<?php 
session_start();
     
if(!isset($_SESSION['admin_login'])) 
    header('location: admin_login.php');   
?>

<?php
error_reporting(0);
	include 'db_connection.php';
    $change = $_SESSION['login_id'];
    if(isset($_POST['change_password'])){
    	$result = mysqli_query($connection, "SELECT * FROM admin WHERE id='$change'");          
    $rws =  mysqli_fetch_assoc($result);
    
    /*$salt="@g26jQsG&nh*&#8v";*/
    $old = $_POST['old_password'];
    /*$old=  sha1($_POST['old_password'].$salt);*/
    $new = $_POST['new_password'];
    $again = $_POST['again_password'];
    
    if($rws["password"] == $old && $new == $again){
    	mysqli_query($connection, "UPDATE admin SET password='$new' WHERE id='$change'");
    	echo '<script>alert("Password Changed Successfully");';
		echo 'window.location= "admin_home.php";</script>';                       
    }
    else if ($rws["password"] != $old) {
    	echo '<script>alert("Enter your Old Password Correctly!!!");';
		echo 'window.location= "admin_changepass.php";</script>';                        	
    }
	
	elseif ($new != $again) {
	 	echo '<script>alert("Your Changed Passwords do not match!!!");';
		echo 'window.location= "admin_changepass.php";</script>';                        	   	
	    }   

    else{
        
        echo '<script>alert("Incorrect Details!!!");';
		echo 'window.location= "admin_changepass.php";</script>';                        	   	
    }
    }
    ?>


<!DOCTYPE html>
<html>
	<head>
		<title>Online Banking System | Admin Change Password</title>
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
						<li><a href="approve_beneficiary.php">Approve Benificiary</a></li>
						<li class="current"><a href="#">Change Password</a></li>
						<li><a href="admin_logout.php">Logout</a></li>
					</ul>
				</nav>
			</div>
		</section><br>
		<section>
			<div class="container">
				<center>
					<h2>Welcome (Admin) <?php $admin_id=$_SESSION['admin_id'];include 'db_connection.php';$result1 = mysqli_query($connection, "SELECT * FROM admin WHERE admin_id = '$admin_id'");$rws1=  mysqli_fetch_assoc($result1);$name = $rws1["name"];echo "$name";?></h2>
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