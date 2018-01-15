<?php 
	session_start();
	        
	if(isset($_SESSION['admin_login'])) 
	    header('location:admin_home.php');   
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Online Banking System | Admin Login</title>
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
						<li class="current"><a href="#">HOME</a></li>
						<li><a href="services.php">FEATURES</a></li>
						<li><a href="about.php">ABOUT US</a></li>
					</ul>
				</nav>
			</div>
		</header>
		<br>
		<section id="login-section-admin">
			<div class="container">
				<div id="loginAdmin">
					<center><h2><span id="getDown"><img src="./Images/lock.png" alt="a small lock image"></span>Admin Login</h2><hr></center>
					<form action="" method="post">
						<table>
							<tr>
								<td>Admin Id:</td>
								<td><input type="text" name="pin" id="pin" pattern="[1-9]{1}[0-9]{4}" title="Admin Id should contain only numbers of size 5" required></td>
							</tr>
							<tr><td></td></tr>
							<tr><td></td></tr>
							<tr><td></td></tr>
							<tr>
								<td>User Name:</td>
								<td><input type="text" name="uName" id="uName" pattern="[a-z0-9]{4,}" title="User Name should contain only smaller case letters eg. ankit123 and size should be more than 4" required><br></td>
							</tr>
							<tr><td></td></tr>
							<tr><td></td></tr>
							<tr><td></td></tr>
							<tr>
								<td>Password:</td>
								<td><input type="Password" name="pwd" id="pass" pattern=".{6,}" title="Password should be of more than 6 characters" required><br></td>
							</tr>
							<tr><td></td></tr>
							<tr><td></td></tr>
							<tr><td></td></tr>
							<tr><td></td></tr>
							<tr><td></td></tr>
							<tr><td></td></tr>
							<tr><td></td></tr>
							<tr><td></td></tr>
							<tr>
								<td colspan="2"><input type="submit" value="LOG IN" id="button1" name="submitBtn"></td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</section>

		<br>
		<footer><center><b><p>Online Banking System Copyright &copy; 2017-18</p></b></center></footer>		
	</body>
</html>

<?php 
	error_reporting(0);
	if(isset($_POST['submitBtn'])){
	    include 'db_connection.php';
	    $username = $_POST['uName'];
	    $password = $_POST['pwd'];
	    $admin_id = $_POST['pin'];
	  
	    $result = mysqli_query($connection, "SELECT * FROM admin WHERE user_id = '$username' AND password = '$password' AND admin_id = '$admin_id'");
	    $rws=  mysqli_fetch_assoc($result);
	    /*echo "<pre><br>";
	    print_r($rws);*/

	    $user = $rws["user_id"];
    	$pwd = $rws["password"]; 
    	$id = $rws["admin_id"];
    	$name = $rws["name"];
		    
	    if($user == $username && $pwd == $password && $id == $admin_id){
        session_start();
        $_SESSION['admin_login'] = 1;
        $_SESSION['admin_user_id'] = $username;
        $_SESSION['admin_id'] = $admin_id;
        $_SESSION['name'] = $name;
        include 'db_connection.php';

    	header('location: admin_home.php'); 
    }
   
	else{
    	echo '<script>alert("Enter Correct Details");';
		echo 'window.location= "admin_login.php";</script>';
	}

}
?>