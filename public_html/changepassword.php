<!DOCTYPE html>



<?php 
include_once('config.php');

include_once('references.php');
?>




<body >

<?php

if(isset($_GET['user_id'])){
    $userid = $_GET['user_id']; ?> 
    
<?php

$result = $db->prepare("SELECT * FROM tbl_users WHERE id = '$userid' and status='Active'");
$result->execute();

if ($result->rowCount() == 0){
    $message = "Account not found";
    		echo "<script type='text/javascript'>alert('$message'); window.location.href='index.php';</script>";
}else{






for ($i = 0; $row = $result->fetch(); $i++) {
    $id = $row['id']; 
    
    ?>
    
    <style>
 h1,h2,h3,h4,h5{
            font-family:  'Arial Narrow Bold', sans-serif;
        
            
        }

        h1{
            font-size: 3rem;
            
        }

        button, td, label{
            font-family: 'Century Gothic';
            font-size: 0.8rem;
        }
        
        p{
            font-family: 'Century Gothic';
            font-size: 1.3rem;
            COLOR: black;
        }
        label{
            color: #000;
        }

        a{
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            font-weight: 200;
  
        }

        hr{
            height: 1px;
        }

        td{
            padding: 10px;
            font-family: 'Century Gothic';
        }
        
        body{
            overflow-wrap: break-word;
        }
        
        .padd{
            padding: 20px 350px;
        }
       .wraplogin{
            background-color: rgb(255 255 255 / 70%);
            border-radius: 10px;
            overflow: hidden;
            padding: 35px;
            height: 650px;
            width: 900px;
        }
        @media screen and (max-width: 425px) {
          .wraplogin{
            background-color: rgb(255 255 255 / 70%);
            border-radius: 10px;
            overflow: hidden;
            padding: 55px;
            height: 790px;
            width: 900px;
        }
     
        }
      
     
        

        footer p{
            font-size: 1rem;
            color: #464646;
        }
        
         @media screen and (max-width: 1600px) {
          .padd {
            padding-right: 100px;
    padding-left: 100px;
          }
        }
        
        @media screen and (max-width: 1200px) {
          .padd {
            padding: 20px;
          }
        }
        
        @media screen and (max-width: 768px) {
          .wraplogin {
            padding: 20px;
          }
        }
        @media screen and (max-width: 1600px) {
          .col-12 {
            padding-right:100px;
            padding-left:100px;
          }
        }
         @media screen and (max-width: 1200px) {
          .col-12 {
            padding-right:100px;
            padding-left:100px;
          }
        }
         @media screen and (max-width: 768px) {
          .col-12 {
            padding-right:10px;
            padding-left:10px;
          }
        }
 @media screen and (max-width: 1600px) {
          .col-md-2.col-xs-12 {
               padding-right: 0px;
    padding-left: 13px;
    padding-top: 10px;
    font-size: 14px;
          }
        }
         @media screen and (max-width: 768px) {
          .col-md-2.col-xs-12 {
            padding-right:15px;
            padding-left:15px;
            font-size: 14px;
          }
        }
        
        /* hover effects */
        .container-login100-form-btn a:hover {
  text-decoration: underline;
}

.container-login100-form-btn a.txt2 {
  margin: 0 5px;
  color: red;
}
</style>
  
 <div class="limiter">
    <div class="container-login100">
        <div class="container-login100Black padd">
        <div class="wraplogin">
             <div class='row'>
            <div class="col-12"  style="text-align:center">
                
                             <img src="img/ccts.png" alt="IMG" width="100" height="120">
            </div>
      <span class="login100-form-titlesignup">
          <h2><br>
                  <b> ONLINE LIBRARY INFORMATION SYSTEM USING QR CODE WITH CATALOGUING FOR CITY COLLEGE OF TAGAYTAY</b>
                </h2>
                </span>
    <div class='col-12'>
            <form class="form-horizontal" action="changepassword.php?user_id=<?= $userid ?>&do=changePassword&id=<?= $id; ?>" method="post">
             
                 <div class="col-12"> 
                <span class="login-form-titlesignup">
                   <p><b> FORGOT PASSWORD</b> </p>
                </span>
               
                    <input value="<?= $row['id']; ?>" type="hidden" class="form-control" name="id">
                              <div class="form-group"><label class="col-md-2 col-xs-12" style="color:black; font-size: 14px;text-align: left;">Username</label>
                                <div class="col-md-10 col-xs-12">
                                   <input value="<?= $row['username']; ?>" type="text" class="form-control" name="username" placeholder="Username" required readonly></div>
                                   <input value="<?= $row['password']; ?>" type="text" class="form-control" name="cPassword" style='display:none'></div>
                                     
                        
                                <div class="form-group"><label class="col-md-2 col-xs-12" style="color:black;  font-size: 14px;text-align: left;">Type New Password</label>
                                    <div class="col-md-10 col-xs-12">
                                        <div class="input-group mb-3">
                                    <input id="passo" type="password" class="form-control" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&+~|{}:;<>/])[A-Za-z\d$@$!%*?&+~|{}:;<>/]{6,}"
                                           title="Must contain at least one special characters, one number and one uppercase and lowercase letter, and at least 6 or more characters"
                                           name="nPassword" placeholder="New Password" required>
                                
                                        <div class="input-group-prepend">
                                        <button id="show_p" class="btn btn-info" type="button" style="padding:4px width:10px;">
                                            <span class="fa fa-eye"></span>
                                            </button></div></div>
                                            </div>
                            </div>
                             <div class="form-group"><label class="col-md-2 col-xs-12" style="color:black;  font-size: 14px;text-align: left;">Re-type New Password</label>
                                    <div class="col-md-10 col-xs-12">
                                        <div class="input-group mb-3">
                                    <input id="pusa" type="password" class="form-control" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&+~|{}:;<>/])[A-Za-z\d$@$!%*?&+~|{}:;<>/]{6,}"
                                           title="Must contain at least one special characters, one number and one uppercase and lowercase letter, and at least 6 or more characters"
                                           name="rPassword" placeholder="Re-type New Password" required>
                                
                                          <div class="input-group-prepend">
                                         <button id="show_pusa" class="btn btn-info" type="button" style="padding:4px width:10px;">
                                          <span class="fa fa-eye"></span>
                                            </button>
                                            </div></div>
                                            </div>
                            </div>

             <div class="container-login100-form-btn" style="display:content">
                 <a class="txt2" style="color: black; cursor: pointer;" href="index.php"> <b><i class="fa fa-home" aria-hidden="true"></i> &nbsp;Back to home &nbsp;&nbsp;</a></b> /
                    <a class="txt2" style="color:red; cursor: pointer;" href="forgot-password.php"> &nbsp;Forgot Password&nbsp;&nbsp;</a>/
                    
                    <a class="txt2" style="color: black;" href="signup.php">
                         &nbsp;Sign up as Guest&nbsp; 
                        <i class="fa fa-users" aria-hidden="true"></i>
                    </a> 
                   
                    
                </div>
                
                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn" style="    font-size: 14px;">
                        Update Password
                    </button>
                </div>


               
                </div>
                </div> </div>
      
            </form>
            </div>
            
        </div>
    </div>
    </div>
</div>

<footer class="footer">
    <center><p style="color:white">Copyright &copy;<script>document.write(new Date().getFullYear());</script> City College of Tagaytay All Rights Reserved.</p></center>
</footer>    
    
    
    
    
    
    
    
    
    
    
 <!--   
<center>
     <div class="login100-pic js-tilt" data-tilt>
                
                             <img src="img/ccts.png" alt="IMG" width="130" height="150">
                <center></center>
            </div>
  <span class="login100-form-titlesignup">
          <h1>
                  <b> ONLINE LIBRARY INFORMATION SYSTEM USING QR CODE WITH CATALOGUING FOR CITY COLLEGE OF TAGAYTAY</b>
</h1>
                </span>
                
                
                
                <style>
                    
                    .padd{
                        padding: 30px;
                    }
                </style>
            <div class="card" style="height: 100%;max-width: 90%; width: 50%">
                
                <div class="card-header">
                    Change Password
                </div>
                <div class="card-body">
                    <form action="changepassword.php?user_id=<?= $userid ?>&do=changePassword&id=<?= $id; ?>" method="post">
                        <div class="box-body">
                            <input value="<?= $row['id']; ?>" type="hidden" class="form-control" name="id">
                            <div class="form-group padd"><label class="col-sm-12 text-left">Username</label>
                                <div class="col-sm-12">
                                    <input value="<?= $row['username']; ?>" type="text" class="form-control" name="username" placeholder="Username" required readonly>
                                </div>
                            </div>
                            <div class="form-group padd"><label class="col-sm-12 text-left">Type New Password</label>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                    <input id="passo" type="password" class="form-control" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&+~|{}:;<>/])[A-Za-z\d$@$!%*?&+~|{}:;<>/]{6,}"
                                           title="Must contain at least one special characters, one number and one uppercase and lowercase letter, and at least 6 or more characters"
                                           name="nPassword" placeholder="New Password" required>
                                         <div class="input-group-prepend">
                                         <button id="show_p" class="btn btn-outline-info" type="button" style="padding:4px width:10px;">
                                            <span class="fa fa-eye"></span>
                                            </button>
                                                </div></div>
                                </div>
                            </div>
                            <div class="form-group padd"><label class="col-sm-12 text-left">Re-type New Password</label>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                    <input id="pusa" type="password" class="form-control" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&+~|{}:;<>/])[A-Za-z\d$@$!%*?&+~|{}:;<>/]{6,}"
                                           title="Must contain at least one special characters, one number and one uppercase and lowercase letter, and at least 6 or more characters"
                                           name="rPassword" placeholder="Re-type New Password" required>
                                         <div class="input-group-prepend">
                                         <button id="show_pusa" class="btn btn-outline-info" type="button" style="padding:4px width:10px;">
                                          <span class="fa fa-eye"></span>
                                            </button>
                                            </div></div>
                                </div>
                                <div style="height: 30px"></div>
                            </div>
                        </div>
                            
                            <button type="submit" class="btn btn-primary pull-right">Save</button>
                 
                    </form>
              
            </div>
        </div>
        
</center>  -->




<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    
    $('#show_p').on("mousedown", function functionName() {
    console.log('bat ayaw gumana');
    //Change the attribute to text
    $('#passo').attr('type', 'text');
    $('#show_p').on("mouseup", function () {
    //Change the attribute back to password
    $('#passo').attr('type', 'password');
}
);

var isIE = /*@cc_on!@*/false || !!document.documentMode;
var isEdge = !isIE && !!window.StyleMedia;
var showButton = !(isIE || isEdge)
if (!showButton) {
    document.getElementById("show_p").style.visibility = "hidden";
}})


</script> 
<script>
    $('#show_pusa').on("mousedown", function functionName() {
    //Change the attribute to text
    $('#pusa').attr('type', 'text');
    $('#show_pusa').on("mouseup", function () {
    //Change the attribute back to password
    $('#pusa').attr('type', 'password');
}
);

var isIE = /*@cc_on!@*/false || !!document.documentMode;
var isEdge = !isIE && !!window.StyleMedia;
var showButton = !(isIE || isEdge)
if (!showButton) {
    document.getElementById("show_pusa").style.visibility = "hidden";
}})

</script>
<?php
}}
?>

c
<?php if ($_GET['do']=='changePassword') { //Changepassword  
$id=$_GET['id'];
$cpass = $_POST['cPassword'];
$cpassword = endecrypt($_POST['cPassword'], 'd');
		$rtype=$_POST['rPassword']; $npas=$_POST['nPassword'];
		if ($rtype<>$npas){
			$message = 'Password not matched.' ;
			echo "<script type='text/javascript'>alert('$message');history.go(-1);</script>";
			exit();	
		}
	
// Check if the current password is the same as the new password
    if ($cpassword == $npas) {
        $message = "New password cannot be the same as the current password.";
        echo "<script type='text/javascript'>alert('$message');history.go(-1);</script>";
        exit();
    }
		$npassword = endecrypt($_POST['nPassword'],'e');  

		$result = $db->prepare("SELECT * FROM tbl_users WHERE id='$id' AND password='$cpass' ");
		$result->execute();
		if($row = $result->fetch()) {  
			$q = $db->prepare("UPDATE tbl_users SET password='$npassword' WHERE id='$id'");
			$q->execute(array());
			$message = 'Password changed successfully';
			echo "<script type='text/javascript'>alert('$message');window.location.href='signin.php';</script>";
			exit();
		} else { 
			$message = "Invalid password.";
    		echo "<script type='text/javascript'>alert('$message');</script>";
    		exit();
		}
	}

}
?>






</body>
</html>
