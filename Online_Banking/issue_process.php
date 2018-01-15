<?php 
session_start();
        
if(!isset($_SESSION['customer_login'])) 
    header('location: home.php');   
?>
<?php
error_reporting(0);
include 'db_connection.php';
$name=$_SESSION['name'];
$account_no = $_SESSION['account_no'];
$option = $_POST['req'];

$atm_status = $cheque_book_status="Not Requested";
if($option == 'atm')
    $atm_status="Pending";
else
    $cheque_book_status="Pending";
    
    $result = mysqli_query($connection, "SELECT * FROM cheque_book WHERE account_no='$account_no'");
    $rws=mysqli_fetch_assoc($result);
    $c_status=$rws["cheque_book_status"];
    $c_id=$rws["account_no"];

    $result = mysqli_query($connection, "SELECT * FROM atm_card WHERE account_no='$account_no'");
    $rws=mysqli_fetch_assoc($result);
    $a_status=$rws["atm_status"];
    $a_id=$rws["account_no"];
    
    
    if(($option=='atm' && (($a_status=='Pending')||($a_status=='Issued'))) || ($option=='cheque' && (($c_status=='Pending')||($c_status=='Issued'))))           
    {
        echo '<script>alert("You have already made a request!");';
   echo 'window.location= "issue.php";</script>';
}
  
elseif($option == 'atm'){
    mysqli_query($connection, "insert into atm_card values('','$name','$account_no','$atm_status')");

    echo '<script>alert("Request succesfull. You will recieve confirmation from branch very soon.");';
    echo 'window.location= "issue.php";</script>';
}
else {
    mysqli_query($connection, "insert into cheque_book values('','$name','$account_no','$cheque_book_status')");

echo '<script>alert("Request succesfull. You will recieve confirmation from branch very soon.");';
echo 'window.location= "issue.php";</script>';
}


?>