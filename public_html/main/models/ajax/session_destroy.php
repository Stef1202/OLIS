<?php

include_once('db.php');
include_once('../../../config.php');

$userID= $_POST['user_id'];

$sql="Select count(*) as count From tbl_users Where id= '$userID' and status='Active'";
$result= mysqli_query($con, $sql);
$count= mysqli_fetch_assoc($result);

mysqli_free_result($result);
mysqli_close($con);

if($count['count'] == 0){
    date_default_timezone_set('Asia/Manila');
    $dt =  date('Y-m-d H:i:s');
	$log = $_SESSION['log'];
	$action="Logged-out.";
	$r = $db->prepare("UPDATE`tbl_ualt` SET `logout`='$dt' WHERE id='$log'");
	$r->execute(array());


    $_SESSION['logged_in'] = "false";
    $message = "Your session has expired or has been destroyed. Please try to login again or contact the system administrator";

        unset($_SESSION['userID']);
        unset($_SESSION['fname']);
        unset($_SESSION['role']);
        unset($_SESSION['username']);
        unset($_SESSION['log']);

        echo "<script type='text/javascript'>alert('$message'); 
        clearInterval(check);window.location.href='../signin.php';</script>";
        exit();

            
        }
    
?>
