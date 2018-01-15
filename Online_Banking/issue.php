
<?php 
session_start();
     
if(!isset($_SESSION['customer_login'])) 
    header('location: home.php');   
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Online Banking System | Issue Cheque Book/ATM Card</title>
		<link rel="stylesheet" type="text/css" href="./css/Style.css">
		<style type="text/css">
			#thistable{
				margin: auto;
				margin: 1px solid black;
				font-size: 22px;
				width: 400px;
			}
			#thisdiv{
				margin: auto;
				width: 400px;
				background-color: #e6e6e6;
				padding: 5px;
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
						<li class="current"><a href="#">Request Service</a></li>
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
					<h1><u>Issue Cheque Book/ATM Card</u></h1>
				</center>
				
		</section><br>
		<div id="thisdiv">
			<center>
				<form action="issue_process.php" method="post">
					<table cellspacing="10">
						<tr>
							<td><b>Issue:</b></td>
							<td><select name="req">
								<option value="atm" selected>ATM Card</option>
								<option value="cheque">Cheque Book</option>
							</select></td>
						</tr>
						<tr>
							<td colspan="2"><center><input type="submit" name="reqsubmit" value="Request" class="BTN1"></center></td>
						</tr>
					</table>
				</form>
			</center>
		</div><br><br>

		<?php 
		error_reporting(0);
    include 'db_connection.php';
    $acc_no = $_SESSION['account_no'];
    
    $result = mysqli_query($connection, "SELECT * FROM cheque_book WHERE account_no='$acc_no'");
    $rws=mysqli_fetch_assoc($result);
    $c_status = $rws["cheque_book_status"];
    $c_acc_id=$rws["account_no"];
    
    $result = mysqli_query($connection, "SELECT * FROM atm_card WHERE account_no='$acc_no'");
    $rws=mysqli_fetch_assoc($result);
    $atm_status=$rws["atm_status"];
    $a_acc_id=$rws["account_no"];
    ?>
    <table id="thistable">
    	<?php 
    if(($a_acc_id==$acc_no) || ($c_acc_id==$acc_no))
    {
        
    
    echo "<tr><td>ATM Card Status: </td><td>$atm_status</td></tr>";
    echo "<tr><td>Cheque Book Status: </td><td>$c_status</td></tr>";
    echo "</table>";
    }
    ?>
    </table>





		<br><br>
		<footer><center><b><p>Online Banking System Copyright &copy; 2017-18</p></b></center></footer>		
	</body>
</html>

