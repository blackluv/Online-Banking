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

    $result = mysqli_query($connection, "SELECT * FROM beneficiary WHERE id='$id'");    
    $rws =  mysqli_fetch_assoc($result);
                
    if($rws["status"] == "Pending")    
    mysqli_query($connection, "UPDATE beneficiary SET status = 'Approved' WHERE id='$id'");    
    
   echo '<script>alert("Beneficiary Approved");';
   echo 'window.location = "approve_beneficiary.php";</script>';
}
else{
    echo '<script>alert("There are no requests for approval");';
    echo 'window.location= "approve_beneficiary.php";</script>';
}
?>