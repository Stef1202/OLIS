<!DOCTYPE html>
<html>
<head>



   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">



</head>



<?php include_once('layout/head.php'); ?>
<body style="padding: 50px;">

<?php

if(isset($_GET['user_id'])){
    $userid = $_GET['user_id']; ?> 
    
<?php

$result = $db->prepare("SELECT * FROM tbl_users WHERE id = '$userid'");
$result->execute();
for ($i = 0; $row = $result->fetch(); $i++) {
    $id = $row['id']; 
    
    ?>
    
<center>
     <div class="login100-pic js-tilt" data-tilt>
                
                <img src="img/tl.png" alt="IMG" width="150" height="150">
                <center></center>
            </div>
      <span class="login100-form-title">
         <h4>
                   ONLINE LIBRARY INFORMATION SYSTEM USING QR CODE WITH CATALOGUING FOR CITY COLLEGE OF TAGAYTAY
</h4>
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
                                    <input id="passo" type="password" class="form-control" pattern="(?=^.{6,}$)(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&amp;*()_+}{&quot;:;'?/&gt;.&lt;,])(?!.*\s).*$"
                                           title="Must contain at least one special characters, one number and one uppercase and lowercase letter, and at least 6 or more characters"
                                           name="nPassword" placeholder="New Password" required>
                                         <div class="input-group-prepend">
                                         <button id="show_p" class="btn btn-outline-info" type="button" style="padding:4px;">
                                            <span class="fa fa-eye"></span>
                                            </button>
                                                </div></div>
                                </div>
                            </div>
                            <div class="form-group padd"><label class="col-sm-12 text-left">Re-type New Password</label>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                    <input id="pusa" type="password" class="form-control" pattern="(?=^.{6,}$)(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&amp;*()_+}{&quot;:;'?/&gt;.&lt;,])(?!.*\s).*$"
                                           title="Must contain at least one special characters, one number and one uppercase and lowercase letter, and at least 6 or more characters"
                                           name="rPassword" placeholder="Re-type New Password" required>
                                         <div class="input-group-prepend">
                                         <button id="show_pusa" class="btn btn-outline-info" type="button" style="padding:4px;">
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
        
</center>

<?php
}
?>


<?php if ($_GET['do']=='changePassword') { //Changepassword  
$id=$_GET['id'];

		$rtype=$_POST['rPassword']; $npas=$_POST['nPassword'];
		if ($rtype<>$npas){
			$message = 'Password not matched.' ;
			echo "<script type='text/javascript'>alert('$message');history.go(-1);</script>";
			exit();	
		}
		$npassword = endecrypt($_POST['nPassword'],'e');  
		$result = $db->prepare("SELECT * FROM tbl_users WHERE id='$id'");
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
<script>
    
    $('#show_p').on("mousedown", function functionName() {
    //Change the attribute to text
    $('#passo').attr('type', 'text');
    $('.glyphicon').removeClass('glyphicon-eye-open').addClass('glyphicon-eye-close');
}).on("mouseup", function () {
    //Change the attribute back to password
    $('#passo').attr('type', 'password');
    $('.glyphicon').removeClass('glyphicon-eye-close').addClass('glyphicon-eye-open');
}
);

var isIE = /*@cc_on!@*/false || !!document.documentMode;
var isEdge = !isIE && !!window.StyleMedia;
var showButton = !(isIE || isEdge)
if (!showButton) {
    document.getElementById("show_p").style.visibility = "hidden";
}


</script> 
<script>
    $('#show_pusa').on("mousedown", function functionName() {
    //Change the attribute to text
    $('#pusa').attr('type', 'text');
    $('.glyphicon').removeClass('glyphicon-eye-open').addClass('glyphicon-eye-close');
}).on("mouseup", function () {
    //Change the attribute back to password
    $('#pusa').attr('type', 'password');
    $('.glyphicon').removeClass('glyphicon-eye-close').addClass('glyphicon-eye-open');
}
);

var isIE = /*@cc_on!@*/false || !!document.documentMode;
var isEdge = !isIE && !!window.StyleMedia;
var showButton = !(isIE || isEdge)
if (!showButton) {
    document.getElementById("show_pusa").style.visibility = "hidden";
}

</script>
</body>
</html>
<?php include_once('layout/footer.php'); ?>