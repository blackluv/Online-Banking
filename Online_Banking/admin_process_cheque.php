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

    $result = mysqli_query($connection, "SELECT * FROM cheque_book WHERE id='$id'");    
    $rws =  mysqli_fetch_assoc($result);
                
    if($rws["cheque_book_status"] == "Pending")    
    mysqli_query($connection, "UPDATE cheque_book SET cheque_book_status = 'Issued' WHERE id='$id'");    
    
   echo '<script>alert("Cheque Book Issued");';
   echo 'window.location= "admin_issue_cheque.php";</script>';
}
else{
    echo '<script>alert("There are no requests for Cheque Book");';
    echo 'window.location= "admin_issue_cheque.php";</script>';
}
?>