<?php 
session_start();
     
if(!isset($_SESSION['admin_login'])) 
    header('location: admin_login.php');   
?>

<?php 
	error_reporting(0);
	if (isset($_POST['accNo'])) {
		include 'db_connection.php';	
	

	$name = $_POST['custName'];
	$gender = $_POST['r1'];
	$dob = $_POST['dob'];
	$nominee = $_POST['nominee'];
	$type = $_POST['type'];
	$credit = $_POST['minAmt'];
	$address = $_POST['address'];
	$mobile = $_POST['mob'];
	$email = $_POST['eid'];
	$acc_no = $_POST['accNo'];
	$user_name = $_POST['custUser'];
	$active = 1;

	//salting of password
	$salt ="@g26jQsG&nh*&#8v";
	$password =  sha1($_POST['pass'].$salt);

	$branch = $_POST['branch'];
	$date=date("Y-m-d");
	switch($branch){
	case 'Mumbai': $ifsc="123A";
	    break;
	case 'Delhi': $ifsc="123B";
	    break;
	case 'Chennai': $ifsc="123C";
	    break;
	case 'Kolkata': $ifsc="123D";
	    break;
}

/*echo "$name $gender $branch $password $user_name $acc_no $email $mobile $address $credit $type $nominee $dob";*/

$result = mysqli_query($connection, "SELECT MAX(id) from customer");
        $rws =  mysqli_fetch_assoc($result);
        $result1 = mysqli_query($connection, "SELECT * from customer WHERE account_no = '$acc_no'");
        $rws1 =  mysqli_fetch_assoc($result1);

        if ($rws1['account_no'] == $acc_no) {
        	echo '<script>alert("This Account No already exists!!!");';
		echo 'window.location= "add_customer.php";</script>';
        }
        elseif ($rws1['user_id'] == $user_name) {
        	echo '<script>alert("This User Name already Exists");';
		echo 'window.location= "add_customer.php";</script>';	
        }        
        else{

        $id = $rws['MAX(id)'] + 1;

        /*echo "<br>$id";*/

        mysqli_query($connection, "CREATE TABLE passbook".$id." 
    (transactionid int(10) AUTO_INCREMENT, transactiondate date, name VARCHAR(255), branch VARCHAR(255), ifsc VARCHAR(255), credit int(10), debit int(10), 
    amount float(10,2), narration VARCHAR(255), PRIMARY KEY (transactionid))");

         mysqli_query($connection, "insert into passbook".$id." values('','$date','$name','$branch','$ifsc','$credit','0','$credit','Account Open')");

         mysqli_query($connection, "insert into customer values('','$name','$gender','$dob','$nominee','$type','$address','$mobile','$user_name','$password','$branch','','$active','$acc_no','$email','$ifsc')");

         echo '<script>alert("Account Created Successfully!!!");';
		echo 'window.location= "edit_delete.php";</script>';

}
}
?>