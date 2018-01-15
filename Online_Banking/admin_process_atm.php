<?php 
session_start();
     
if(!isset($_SESSION['admin_login'])) 
    header('location: admin_login.php');   
?>

<?php
error_reporting(0);
if(isset($_POST['cust_id']))
{
    include 'db_connection.php';

    $id = $_POST['cust_id'];

    $result = mysqli_query($connection, "SELECT * FROM atm_card WHERE id='$id'");    
    $rws =  mysqli_fetch_assoc($result);
                
    if($rws["atm_status"] == "Pending")    
    mysqli_query($connection, "UPDATE atm_card SET atm_status = 'Issued' WHERE id='$id'");    
    
   echo '<script>alert("ATM Card Issued");';
   echo 'window.location= "admin_issue_atm.php";</script>';
}
else{
    echo '<script>alert("There are no requests for ATM Card");';
    echo 'window.location= "admin_issue_atm.php";</script>';
}
?>