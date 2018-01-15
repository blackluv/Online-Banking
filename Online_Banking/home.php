<?php 
	error_reporting(0);
	if(!isset($_SESSION['customer_login'])){
	if(isset($_POST['submitBtn'])){
    include 'db_connection.php';

    $username=$_POST['uName'];
    
    //salting of password
    $salt="@g26jQsG&nh*&#8v";
    $password= sha1($_POST['pass'].$salt);
    /*$password = $_POST['pass'];*/

    $acc_no = $_POST['pin'];
  
    $result = mysqli_query($connection, "SELECT * FROM customer WHERE user_id = '$username' AND password = '$password' AND account_no = '$acc_no'");

    /*echo "<br><br><pre>";
	print_r($result);
*/
    $rws=  mysqli_fetch_assoc($result);
/*    echo "lll";*/

/*    echo "<br><br><pre>";
	print_r($rws);*/
    
    $user = $rws["user_id"];
    $pwd = $rws["password"]; 
    $acc = $rws["account_no"];
    $name = $rws["name"];
    $id = $rws["id"];
    
    if($user == $username && $pwd == $password && $acc == $acc_no){
        session_start();
        $_SESSION['customer_login'] = 1;
        $_SESSION['cust_id'] = $username;
        $_SESSION['account_no'] = $acc_no;
        $_SESSION['name'] = $name;
        $_SESSION['login_id'] = $id;

    	header('location: details.php'); 
    }
   
	else{
    	echo '<script>alert("Enter Correct Details");';
		echo 'window.location= "home.php";</script>';
	}
}
}
?>

<?php 
session_start();
        
if(isset($_SESSION['customer_login'])) 
    header('location:details.php');   
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Online Banking System | Home</title>
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
						<li class="current"><a href="home.php">HOME</a></li>
						<li><a href="services.php">FEATURES</a></li>
						<li><a href="about.php">ABOUT US</a></li>
					</ul>
				</nav>
			</div>
		</header>
		<br>
		<section id="login-section">
			<div class="container">
				<div id="login">
					<h2><span id="getDown"><img src="./Images/lock.png" alt="a small lock image"></span>Login to Online Banking:</h2><hr>
					<form action="" method="POST">
						<table>
							<tr>
								<td>Account No:</td>
								<td><input type="text" name="pin" id="pin" pattern="[1-9]{1}[0-9]{8}" title="Account No should be numbers of size 9 and not start with 0 eg. 786512345" required></td>
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
								<td><input type="Password" name="pass" id="pass" pattern=".{6,}" title="Password should be of more than 6 characters" required><br></td>
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
				<div id="help">
					<h2 id="jic">May We Help You?</h2><hr>
					<div><a href="safeonline.php">Safe Online Banking Tips?</a></div><br>
					<div><a href="faq.php">FAQ's?</a></div><br>
					<div><a href="about.php">Contact Us?</a></div><br>
					<div><a href="services.php">Services We Provide?</a></div><br>
				</div>
			</div>
		</section>
		<section id="lastSection">
			
				<div id="lastDiv"><p>Our internet banking portal provides personal banking services that gives you complete control over all your banking demands online. Online banking is the Internet banking service provided by Bank of India, India's largest and premier commercial bank. Internet banking is the most convenient way to bank- anytime, any place, at your convenience.
				</p>
				<ul>
            <li>Phishing is a fraudulent attempt, usually made through email, phone calls, SMS etc seeking your personal and confidential information.</li>
            <li>State Bank or any of its representative never sends you email/SMS or calls you over phone to get your personal information, password or one time SMS (high security) password.</li>
            <li>Any such e-mail/SMS or phone call is an attempt to fraudulently withdraw money from your account through Internet Banking. Never respond to such email/SMS or phone call. </li>
            <li>Change your Internet Banking password at periodical intervals.</li>
            <li>Always check the last log-in date and time in the post login page.</li>
            </ul>
				</div>
		</section>
		<footer><center><b><p>Online Banking System Copyright &copy; 2017-18</p></b></center></footer>		
	</body>
</html>

