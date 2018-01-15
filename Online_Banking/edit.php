<?php 
session_start();
     
if(!isset($_SESSION['admin_login'])) 
    header('location: admin_login.php');   
?>

<?php 
	error_reporting(0);
	if(isset($_GET['id'])){
	$value = $_GET['id'];
	include 'db_connection.php';

	$result = mysqli_query($connection, "SELECT * from customer where id = $value");

	$row = mysqli_fetch_array($result);
	/*echo "<br><pre>";
	print_r($row);*/
	}

	if(isset($_POST['editbtn'])){

		$hide = $_POST['hide'];
		$custName = $_POST['custName'];
		$dob = $_POST['dob'];
		$mob = $_POST['mob'];
		$eid = $_POST['eid'];
		//$dob = $_POST['dob'];
		$add = $_POST['add'];
		$uName = $_POST['uName'];
		$nominee = $_POST['nominee'];
		$branch = $_POST['branch'];
		$type = $_POST['type'];

		/*echo "$hide $custName $dob $mob $eid $add $uName $nominee $branch $type";*/


	include 'db_connection.php';

	$result = mysqli_query($connection, "UPDATE `customer` SET `name` = '".$custName."', `dob` = '".$dob."', `mobile_no` = '".$mob."', `email_id` = '".$eid."', `user_id` = '".$uName."', `address` = '".$add."', `nominee` = '".$nominee."', `branch` = '".$branch."', `account` = '".$type."' where `customer`.`id` = '".$hide."'");

	/*mysqli_query($connection, "UPDATE `customer` SET `name` = '".$custName."', `dob` = '".$dob."', `phone_no` = '".$dob."' where `id` = '".$hide."'");*/

	header("location: edit_delete.php");

	}


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
			</section>

			<div class="container">
			<center><h2>Welcome Admin (Staff's Name)</h2></center><br><br>
			<div id="add">
				<center><h2><u>Edit Customer Details</u></h2></center>
				<form action="" method="post">
					<table cellspacing="20">
						<tr>
							<td><input type="hidden" name="hide" value="<?php echo $value;?>"></td>
						</tr>
						<tr>
							<td>Customer's Name:</td>
							<td><input type="text" name="custName" value="<?php echo $row['name'];?>" required pattern="[A-Za-z\s]{4,50}" title="Enter Valid Name eg. Ankit Rana"></td>
						</tr>
						<tr>
							<td>DOB:</td>
							<td><input type="date" name="dob" value="<?php echo $row['dob'];?>"></td>
						</tr>
						<tr>
							<td>Nominee:</td>
							<td><input type="text" name="nominee" value="<?php echo $row['nominee'];?>" required pattern="[A-Za-z\s]{4,50}" title="Enter Valid Name eg. Ankit Rana"></td>
						</tr>
						<tr>
							<td>Branch:</td>
							<td>
								<select name="branch">
									<?php 
										if ($row['branch'] == "Mumbai"){
											?>
											<option selected>Mumbai</option>
											<option>Delhi</option>
											<option>Chennai</option>
											<option>Kolkata</option>
									<?php }
										else if ($row['branch'] == "Kolkata") {
											
									?>
											<option>Mumbai</option>
											<option>Delhi</option>
											<option>Chennai</option>
											<option selected>Kolkata</option>
									<?php 
										}
										else if ($row['branch'] == "Delhi") {
									?>
											<option>Mumbai</option>
											<option selected>Delhi</option>
											<option>Chennai</option>
											<option>Kolkata</option>
									<?php 
										}
										else{
									?>
											<option>Mumbai</option>
											<option>Delhi</option>
											<option selected>Chennai</option>
											<option>Kolkata</option>
									<?php 
										}
									?>																
								</select>
							</td>
						</tr>
						<tr>
							<td>Account Type:</td>
							<td>
								<select name="type">
									<?php 
										if ($row['account'] == "Savings"){
											?>
									<option selected>Savings</option>
									<option>Current</option>
									<?php 
										}

										else{
									 ?>
									<option>Savings</option>
									<option selected>Current</option>
									<?php 
									} ?>
								</select>
							</td>
						</tr>
						<tr>
							<td>Address:</td>
							<td><textarea name="add"><?php echo $row['address'];?></textarea></td>
						</tr>
						<tr>
							<td>Phone No:</td>
							<td><input type="text" name="mob" value="<?php echo $row['mobile_no'];?>" pattern="[7-9]{1}[0-9]{9}" title="Mobile Number should start with 7,8,9 and of size 10 eg. 9876541234" required></td>
						</tr>
						<tr>
							<td>Email Id:</td>
							<td><input type="email" name="eid" value="<?php echo $row['email_id'];?>"></td>
						</tr>
						<tr>
							<td>User Name:</td>
							<td><input type="text" name="uName" value="<?php echo $row['user_id'];?>"></td>
						</tr>
						<tr></tr>
						<tr></tr>
						<tr>
							<td colspan="2"><center><input type="submit" name="editbtn" value="Change Details" pattern="[a-z0-9]{4,}" title="User Name should contain only smaller case letters eg. ankit123 and size should be more than 4" required></center></td>
						</tr>
					</table>
				</form>
			</div>
		</div><br><br><br>
		<footer><center><b><p>Online Banking System Copyright &copy; 2017-18</p></b></center></footer>		
	</body>
</html>