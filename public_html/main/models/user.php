<?php 
include_once('../../config.php');
//echo endecrypt('asd','e');
//exit();
if (isset($_POST['lastname'])) {
	$lastname = $_POST['lastname'];
	$firstname = $_POST['firstname'];
	$mname = $_POST['mname'];
	$suffix = $_POST['suffix'];
	$role = $_POST['role'];
	$username = $_POST['username'];
    $email = $_POST['email'];
    $userNo = $_POST['userNo'];
    $contact = '+63'.$_POST['contact'];
    $school = $_POST['school'];
    $address = $_POST['address'];
    $course = $_POST['course'];
    $yr_lvl = $_POST['yr_lvl'];
	$password = endecrypt($_POST['password'],'e'); 
	$password2 = $_POST['password'];
	$zero='0'; 
}

if ($_GET['do']=='add') { //Insert 

	$result = $db->prepare("SELECT * FROM tbl_users WHERE  userNo='$userNo' ");
	$result->execute(); 
	if($row = $result->fetch()) {
		$message = "User already exists.";
		echo "<script type='text/javascript'>alert('$message');history.go(-1);</script>"; 
		exit();
	} else { 
	    if ($role =='Librarian'){
	       $sql = "INSERT INTO tbl_users(fname, lname, mname, suffix, role, status, username, password, school, email, userNo, course, contact, address, yr_lvl) VALUES ('$firstname','$lastname','$mname', '$suffix','$role','Active','$userNo','$password', 'CCT',  '$email','$userNo','Library', '$contact','$address', '$yr_lvl')";
		$q = $db->prepare($sql);
		$q->execute(array());	
		header("location: ../users.php?r=added");
		exit(); 
	    } else if ($role =='Admin'){
	        $sql = "INSERT INTO tbl_users(fname, lname, mname, suffix, role, status, username, password, school, email, userNo, course, contact, address, yr_lvl) VALUES ('$firstname','$lastname','$mname', '$suffix','$role','Active','$userNo','$password', 'CCT',  '$email','$userNo','MIS', '$contact','$address', '$yr_lvl' )";
		$q = $db->prepare($sql);
		$q->execute(array());	
		header("location: ../users.php?r=added");
		exit();
	    } else{
		$sql = "INSERT INTO tbl_users(fname, lname, mname, suffix, role, status, username, password, school, email, userNo, course, contact, address, yr_lvl) VALUES ('$firstname','$lastname','$mname', '$suffix','$role','Active','$userNo','$password', 'CCT',  '$email','$userNo','$course', '$contact','$address', '$yr_lvl' )";
		$q = $db->prepare($sql);
		$q->execute(array());	
		header("location: ../users.php?r=added");
		exit();}
	}
}

if ($_GET['do']=='signup') { //Sign Up

	$result = $db->prepare("SELECT * FROM tbl_users WHERE  username='$username'");
	$result->execute(); 
	if($row = $result->fetch()) {
		$message = "User already exists.";
		echo "<script type='text/javascript'>alert('$message');history.go(-1);</script>"; 
		exit();
	} else { 
		$sql = "INSERT INTO tbl_users(fname, lname, mname, suffix, role, status, username, password, email, userNo, course, yr_lvl, school, contact, address) VALUES ('$firstname','$lastname', '$mname', ' $suffix', '$role','Active','$username','$password','$email','$userNo', '$course', '$yr_lvl','$school', '$contact','$address')";
		$q = $db->prepare($sql);
		$q->execute(array());	
		header("location: ../../signin.php?r=added");
		exit();
	}
} 


if ($_GET['do']=='forgotPassword') {
	$username= $_POST['username'];
	$result = $db->prepare("SELECT *,CONCAT(fname,' ',lname) fullname FROM  tbl_users WHERE username='$username'");
	$result->execute();
    if($row = $result->fetch()) {  
    		$email = $row['email'];
    		$password = $row['password'];
    	//	$password = endecrypt($row['password'],'d');
    	
    	if (is_numeric($password)==1){
    	    $pass = $password;
    	}
    	else{
    	    $pass = endecrypt($row['password'],'d');
    	}


		$to  = $email;
		$from = $server_email ;
		$id = $row['id'];
		$headers = 'From:'.$from." \r\n";
		$headers .= 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$subject = "Online Library Information System";
		$txt = "<!DOCTYPE html><html><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8' /></head><body><p>You submitted a request form on the Online Library Information System to change your account password. </p>
	    <p>To continue, please use this link: </p><a href='https://cct-olis.site/changepassword.php?user_id=$id'>Change Password</a></body></html>";
		mail($to,$subject,$txt,$headers);
		$message = 'Email successfully sent' ;
		echo "<script type='text/javascript'>alert('$message');window.location.href='../../signin.php';</script>"; 
		exit(); 
	}else{

		$message = 'Username not found.' ;
		echo "<script type='text/javascript'>alert('$message');history.go(-1);</script>";
		exit();
	} 
	

}




if ($_GET['do']=='login') { //Login  
	$a = $_POST['username'];
	$b = endecrypt($_POST['password'],'e');
	$c = $_POST['password'];

	$result = $db->prepare("SELECT *,CONCAT(fname,' ',lname) fullname FROM tbl_users WHERE username='$a' AND (password='$b' or password='$c')");
	$result->execute();
	if($row = $result->fetch()) { 
		$_SESSION['userID'] = $row['id'];
        $_SESSION['user_id'] = $row['id'];
		$_SESSION['fullname'] = $row['fullname'];
		$_SESSION['role'] = $row['role']; 
		$_SESSION['username'] = $row['username'];



        if ($row['status'] == 'Deactive') {
            $message = 'Your account is now deactived. Please contact the system administrator.';
            echo "<script type='text/javascript'>alert('$message');window.location.href='../../signin.php';</script>";
            exit();
        }
        
        
        $role = $row['role'];
		date_default_timezone_set('Asia/Manila');
		$userID= $row['id'];
		$dt =  date('Y-m-d H:i:s');
		$action="Logged-in.";
		$r = $db->prepare("INSERT INTO `tbl_ualt`(`user_id`, `created_at`, `action`) VALUES ('$userID','$dt','$action')");
		$r->execute(array());

        
       
        $res = $db->prepare("SELECT id as uaid FROM tbl_ualt WHERE user_id='$userID' AND logout IS NULL ORDER BY id DESC");
    	$res->execute();
    	if($row = $res->fetch()){
    	    $_SESSION['log'] = $row['uaid'];
    	}
    	
		$_SESSION['logged_in'] = "true";    
        
        
		$message = "Log in successfully.";
		if($role=='Admin' || $role=='Librarian'){
		    echo "<script type='text/javascript'>alert('$message');window.location.href='../index.php';</script>";
        }else{
		    echo "<script type='text/javascript'>alert('$message');window.location.href='../index2.php';</script>";
        }


		exit(); 
	}else {
		$message = "Invalid username or password."; 
		echo "<script type='text/javascript'>alert('$message');window.location.href='../../signin.php';</script>";
		exit(); 
	} 
}

if ($_GET['do']=='logout') { //Logout  
	date_default_timezone_set('Asia/Manila');
	$userID=$_SESSION['userID'];
	$log = $_SESSION['log'];
	$dt =  date('Y-m-d H:i:s');
	$action="Logged-out.";
	$r = $db->prepare("UPDATE`tbl_ualt` SET `logout`='$dt' WHERE id='$log'");
	$r->execute(array());


    $_SESSION['logged_in'] = "false";
	$message = "Log out successfully.";

        unset($_SESSION['userID']);
        unset($_SESSION['fname']);
        unset($_SESSION['role']);
        unset($_SESSION['username']);
        unset($_SESSION['log']);

        echo "<script type='text/javascript'>alert('$message');window.location.href='../../index.php';</script>";

	exit();

}


if ($_GET['do']=='sessionLost') { //destroy session
	date_default_timezone_set('Asia/Manila');
	$userID=$_SESSION['userID'];
	$dt =  date('Y-m-d H:i:s');
	$action="Account-deactivated.";
	$r = $db->prepare("INSERT INTO `tbl_ualt`(`user_id`, `created_at`, `action`) VALUES ('$userID','$dt','$action')");
	$r->execute(array());


    $_SESSION['logged_in'] = "false";
	$message = "Your account has been deactivated";

        unset($_SESSION['userID']);
        unset($_SESSION['fname']);
        unset($_SESSION['role']);
        unset($_SESSION['username']);

        echo "<script type='text/javascript'>alert('$message');window.location.href='../../index.php';</script>";

	exit();

}

if (isset($_GET['id'])) {
	$id=$_GET['id'];
	$stmt = $db->prepare("SELECT role FROM tbl_users WHERE id=?");
	$stmt->execute([$id]);
	$role = $stmt->fetchColumn();

	if ($_GET['do']=='edit') { //Edit  
		$sql = "UPDATE tbl_users SET  fname=?, lname=?, mname=?, suffix=?, role=?, username=?, email=?, course=?, userNo=?, contact=?, address=?, school=?, yr_lvl=?  WHERE id=?";
		$q = $db->prepare($sql);
		if ($role =='Librarian'){

		$q->execute(array($firstname,$lastname, $mname, $suffix, $role, $userNo,$email,'Library',$userNo,$contact,$address,$school,'',$id));
		header("location: ../users.php?r=updated");
		} else if ($role =='Admin'){
		$q->execute(array($firstname,$lastname, $mname, $suffix, $role, $userNo,$email,'MIS',$userNo,$contact,$address,$school,$yr_lvl,$id));
		header("location: ../users.php?r=updated");
		}else {
		$q->execute(array($firstname,$lastname, $mname, $suffix, $role, $userNo,$email,$course,$userNo,$contact,$address,$school,$yr_lvl,$id));
		header("location: ../users.php?r=updated");
		}
	}
	
	if ($_GET['do']=='deactive') { //Deactive
		$stmt =' SELECT COUNT(*) FROM tbl_users WHERE role="Librarian" AND status="Active" ';
		$res = $db->query($stmt);
		$libtotal = $res->fetchColumn();
		if($role=='Librarian'){
				if($libtotal==1){
					$message = "Please add another Librarian account first before deactivating this account";
					echo "<script type='text/javascript'>alert('$message');history.go(-1);</script>"; 
					exit();
				}else{
				$q = $db->prepare("UPDATE tbl_users SET status='Deactive' WHERE id='$id'");
				$q->execute(array());	 
				header("location: ../users.php?r=updated");
			}
		}else{
			$q = $db->prepare("UPDATE tbl_users SET status='Deactive' WHERE id='$id'");
			$q->execute(array());	 
			header("location: ../users.php?r=updated");
		}
	}


    if ($_GET['do']=='active') { //active
        $q = $db->prepare("UPDATE tbl_users SET status='Active' WHERE id='$id'");
        $q->execute(array());
        header("location: ../users.php?r=updated");
    }

	if ($_GET['do']=='changePassword') { //Changepassword  
		$rtype=$_POST['rPassword']; $npas=$_POST['nPassword'];
		if ($rtype<>$npas){
			$message = 'Password not matched.' ;
			echo "<script type='text/javascript'>alert('$message');history.go(-1);</script>";
			exit();	
		}
        
		$cpassword = $_POST['cPassword'];
		if (is_numeric($cpassword)==1){
		    $cpassword = $_POST['cPassword'];
		}else{
		    $cpassword = endecrypt($_POST['cPassword'],'e'); 
		}
		
		$npassword = endecrypt($_POST['nPassword'],'e');  
		 // Check if the current password is the same as the new password
    
		$result = $db->prepare("SELECT * FROM tbl_users WHERE id='$id' AND password='$cpassword'");
		$result->execute();
		if($row = $result->fetch()) { 
		    
		    if ($cpassword == $npassword) {
                $message = "New password cannot be the same as the current password.";
                echo "<script type='text/javascript'>alert('$message');history.go(-1);</script>";
                exit();
            }
            
            else{
			$q = $db->prepare("UPDATE tbl_users SET password='$npassword' WHERE id='$id'");
			$q->execute(array());	
            $message = 'Updated successfully';
    		    header("location: ../myprofile.php?r=$message");
			    
			
		    
		}
			
			
			
		} else { 
			$message = "Invalid password.";
    		    echo "<script type='text/javascript'>alert('$message');history.go(-1);</script>";
          
			exit();
		    
		}

		
	}
	
	if ($_GET['do']=='changePassword2') { //Changepassword  
		$rtype=$_POST['rPassword']; $npas=$_POST['nPassword'];
		if ($rtype<>$npas){
			$message = 'Password not matched.' ;
			echo "<script type='text/javascript'>alert('$message');history.go(-1);</script>";
			exit();	
		}
        
		$cpassword = $_POST['cPassword'];
		if (is_numeric($cpassword)==1){
		    $cpassword = $_POST['cPassword'];
		}else{
		    $cpassword = endecrypt($_POST['cPassword'],'e'); 
		}
		
		$npassword = endecrypt($_POST['nPassword'],'e');  
		 // Check if the current password is the same as the new password
    
		$result = $db->prepare("SELECT * FROM tbl_users WHERE id='$id' AND password='$cpassword'");
		$result->execute();
		if($row = $result->fetch()) { 
		    
		    if ($cpassword == $npassword) {
                $message = "New password cannot be the same as the current password.";
                echo "<script type='text/javascript'>alert('$message');history.go(-1);</script>";
                exit();
            }
            
            else{
			$q = $db->prepare("UPDATE tbl_users SET password='$npassword' WHERE id='$id'");
			$q->execute(array());	
            $message = 'updated';
    		    header("location: ../users.php?r=$message");
			    
			
		    
		}
			
			
			
		} else { 
			$message = "Invalid password.";
    		    echo "<script type='text/javascript'>alert('$message');history.go(-1);</script>";
          
			exit();
		    
		}

		
	}


//	function ualt($action) {
//		date_default_timezone_set('Asia/Manila');
//		$dt =  date('Y-m-d h:i:s');
//		$r = $db->prepare("INSERT INTO `tbl_ualt`(`id`, `dt`, `action`) VALUES ('$userID','$dt','$action')");
//		$r->execute(array());
//	}



}
?>