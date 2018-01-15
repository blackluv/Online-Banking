<?php 
session_start();
     
if(!isset($_SESSION['customer_login'])) 
    header('location: home.php');   
?>

<?php
    error_reporting(0);
    if (isset($_POST['t_val'])) {
        
    
     $t_amount = $_POST['t_val'];
     $sender_id = $_SESSION["login_id"];
     $reciever_id = $_POST['transfer'];
     
     //select last transaction id in reciever's passbook.
     include 'db_connection.php';
     $result = mysqli_query($connection, "SELECT MAX(transactionid) from passbook".$reciever_id);
        $rws =  mysqli_fetch_assoc($result);
     $r_last_tid = $rws["MAX(transactionid)"];
     /*echo "$r_last_tid";*/
     
    //select the details in the last row of reciever's passbook.
     $result = mysqli_query($connection, "SELECT * from passbook".$reciever_id." WHERE transactionid='$r_last_tid'");
       
    while($rws= mysqli_fetch_assoc($result)){
    $r_amount=$rws["amount"];
    $r_name=$rws["name"];
    $r_branch=$rws["branch"];
    $r_ifsc=$rws["ifsc"];
    }
    
   //select the last transaction id in the sender's passbook
    $result = mysqli_query($connection, "SELECT MAX(transactionid) from passbook".$sender_id);
        $rws =  mysqli_fetch_assoc($result);
     
     $s_last_tid=$rws["MAX(transactionid)"];
    
    //select the details in the last row of sender's passbook.

     $result = mysqli_query($connection, "SELECT * from passbook".$sender_id." WHERE transactionid='$s_last_tid'");
       
    while($rws = mysqli_fetch_assoc($result)) {
    $s_amount=$rws["amount"];
    $s_name=$rws["name"];
    $s_branch=$rws["branch"];
    $s_ifsc=$rws["ifsc"];
    }
    
    $date=date("Y-m-d");
    
    $s_total=$s_amount-$t_amount; //sender's final balance.
    
    if($s_amount <= 500)
    {
        echo '<script>alert("Your account balance is less than Rs. 500.\n\nYou must maintain a minimum balance of Rs. 500 in order to proceed with the transfer.");';
        echo 'window.location= "transfer_funds.php";</script>';
    }
    elseif($t_amount<100){
         echo '<script>alert("You cannot transfer less than Rs. 100");';
        echo 'window.location= "transfer_funds.php";</script>';
    }
    elseif($s_total < 500)
    {
        echo '<script>alert("You do not have enough balance in your account to proceed this transfer.\n\nYou must maintain a minimum of Rs. 500 in your account.");';
        echo 'window.location= "transfer_funds.php";</script>';
    }
    
    else{ 
        //insert statement into reciever passbook.
        $r_total = $r_amount + $t_amount;
        mysqli_query($connection, "insert into passbook".$reciever_id." values('','$date','$r_name','$r_branch','$r_ifsc','$t_amount','0','$r_total','BY $s_name')");
        
        //insert statement into sender passbook.
        $s_total=$s_amount-$t_amount;
        mysqli_query($connection, "insert into passbook".$sender_id." values('','$date','$s_name','$s_branch','$s_ifsc','0','$t_amount','$s_total','TO $r_name')");
        
        
        
        echo '<script>alert("Transfer Successful.");';
        echo 'window.location= "transfer_funds.php";</script>';
    }

}
?>
