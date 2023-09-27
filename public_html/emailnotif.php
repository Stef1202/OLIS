<?php
if(!isset($_SESSION))   {    session_start();   }

$currentDate = date('Y-m-d'); //this will get the current date ie when this was posted 2107-07-06


$host_name = " sg-nme-web604.main-hosting.eu ";
$database = " u823561260_library ";
$user_name = " u823561260_library ";
$password = " Z@g8D1H]Ugu ";

   
        $dbcon = new PDO("mysql:host=$hostname;dbname=$dbname",$username,$password);
    $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
    if($dbcon->connect_error) die($dbcon->connect_error);

	  $remind_query1 = "SELECT * FROM Bridges30 WHERE reminder= '$currentDate' "; //Sql query to find users that reminders dates match current date.
    
	if($run1 = $dbcon->query($remind_query1))
    {
	 $rows = $run1->num_rows;
      
      for ($j = 0; $j < $rows; ++$j)//loop through each user in results and send a reminder email.
      {
      	$run1->data_seek($j);
      	$row = $run1->fetch_array(MYSQLI_NUM);
      	
      	$to = $row[4]; //gets the user email address 
          $subject = "Code 30 Reminder";
          $message = "Hi ".$row[1]."\nJust a reminder that your code 30 will expiry on the ".$row[6].",\n"
      	            ."Please renew your code\n"."\nThank You"."\nBridges Nursery";
        $headers = "From: Bridges Nursery";
      	
		  mail($to,$subject,$message,$headers);
      }
		
	}
	
	
	
	$to  = $email;
		$from = $server_email ;
		$subject = "Online Library Information System";
		$txt = "Please return the book before $dt to avoid penalty";
		$headers = "From:" . $from;
		mail($to,$subject,$txt,$headers);
		$message = 'Email successfully sent' ;
		echo "<script type='text/javascript'>alert('$message');history.go(-1);</script>"; 
		exit(); 
	
?>