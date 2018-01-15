<?php 
session_start();
        
if(!isset($_SESSION['customer_login'])) 
    header('location: home.php');   
?>

<?php
error_reporting(0);
    if (isset($_POST['payeeSubmit'])) {
        
        $sender_id = $_SESSION["login_id"];
        $sender_name = $_SESSION["name"];
        
        $Payee_name = $_POST['name'];
        $acc_no = $_POST['account_no'];
        $branch = $_POST['branch'];
        $ifsc = $_POST['ifsc'];
        
        include 'db_connection.php';
        $result = mysqli_query($connection, "SELECT * FROM beneficiary WHERE sender_id='$sender_id' AND receiver_account='$acc_no'");
        $rws =  mysqli_fetch_assoc($result);
        /*print_r($rws);*/
        
        $s1 = $rws["sender_id"];
        $s2 = $rws["receiver_account"];

        
        $result1 = mysqli_query($connection, "SELECT * FROM customer WHERE account_no = '$acc_no'");
        $rws1 =  mysqli_fetch_assoc($result1);
        $s = $rws1["id"];
        
        if($sender_id == $rws1["id"]) //can't send request to himself
        {
        echo '<script>alert("You cant add yourself as a beneficiery!");';
             echo 'window.location= "beneficiary.php";</script>';
        }
        
        else if($s1 == $sender_id && $s2 == $acc_no)
        {
            echo '<script>alert("You cant add a beneficiery twice!");';
            echo 'window.location= "beneficiary.php";</script>';
        }
        
        else if($rws1["name"] != $Payee_name || $rws1["account_no"] != $acc_no || $rws1["branch"] != $branch || $rws1["ifsc_code"] != $ifsc)
        {
        
        echo '<script>alert("Beneficiary Not Found!\nPlease enter correct details");';
             echo 'window.location = "beneficiary.php";</script>';
        }
        
        
        else{
             
            $status = "Pending";
            mysqli_query($connection, "insert into beneficiary values('','$sender_id','$sender_name','$s','$acc_no','$Payee_name','$status')");
        header("location: display_beneficiary.php");
        }
    }
?>            