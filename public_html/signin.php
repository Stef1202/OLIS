<?php include_once('config.php'); ?>

   <?php   if (isset($_SESSION['logged_in'])) if($_SESSION['logged_in']== "true"){
    if ($_SESSION['role'] == 'Admin' || $_SESSION['role']=='Librarian'){
    header("Location: main/index.php");
    exit; 
    }else{
    
    header("Location: main/index2.php");
    exit;
    }
   }

?> 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Online Library Information System</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="assets/plugins/iCheck/square/blue.css">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!--bawal bumalik sa login page-->
<script>
        function preventBack() {
            window.history.forward();
        }
        setTimeout("preventBack()", 0);
        window.onunload = function() { null };
    </script>

</head>

<?php include_once('references.php');?>
<body>
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
            height: 550px;
            width: 900px;
        }
        @media screen and (max-width: 425px) {
          .wraplogin{
            background-color: rgb(255 255 255 / 70%);
            border-radius: 10px;
            overflow: hidden;
            padding: 55px;
            height: 700px;
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
<a class="box-title">  <?php if (isset($_GET['r'])): ?>
        <?php
        $r = $_GET['r'];
        if ($r == 'added') {
            $classs = 'success';
        } else if ($r == 'updated') {
            $classs = 'info';
        } else if ($r == 'deleted') {
            $classs = 'danger';
        } else {
            $classs = 'hide';
        }
        ?>
        <div id='alert' class="alert alert-<?=$classs ?> <?=$classs; ?>">
            <strong>Successfully <?=$r; ?> guest!</strong>
        </div> <?php endif; ?></a>
        
<script>
        // Get the alert element
        var alertElement = document.getElementById('alert');

        // Function to hide the alert after 3 seconds
        setTimeout(function() {
            alertElement.style.display = 'none';
        }, 3000); // Set the timeout to 3000 milliseconds (3 seconds)
    </script>
  
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
            <form class="form-horizontal" action="main/models/user.php?do=login" method="post">
             
                 <div class="col-12"> 
                <span class="login-form-titlesignup">
                   <p><b> USER LOGIN</b> </p>
                </span>
               

                              <div class="form-group"><label class="col-md-2 col-xs-12" style="color:black; font-size: 14px;text-align: left;">Username</label>
                                <div class="col-md-10 col-xs-12">
                                    <input type="text" class="form-control" name="username" data-validate="Please input your Username/ID number"placeholder="Username/ID number" 
                                           required></div>
                                     
                            </div>
                                <div class="form-group"><label class="col-md-2 col-xs-12" style="color:black;  font-size: 14px;text-align: left;">Password</label>
                                    <div class="col-md-10 col-xs-12">
                                        <div class="input-group mb-3">

                                        <input type="password" class="form-control" name="password" placeholder="Password" id ="password" required>
                                
                                        <div class="input-group-prepend">
                                        <button id="show_password" class="btn btn-info" type="button" style="padding:5px width:10px;">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                            </button></div></div>
                                           

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
                    <button class="login100-form-btn">
                        Login
                    </button>
                </div>


               
                </div>
                </div>
      
            </form>
            </div>
            
        </div>
    </div>
    </div>
</div>

<footer class="footer">
    <center><p style="color:white">Copyright &copy;<script>document.write(new Date().getFullYear());</script> City College of Tagaytay All Rights Reserved.</p></center>
</footer>





<!-- jQuery 2.2.3 -->
<script src="assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="assets/plugins/iCheck/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
<script>
    function MM_openBrWindow(theURL,winName,features) { //v2.0
        window.open(theURL,winName,features);
    }
</script>

<script>
    
    $('#show_password').on("mousedown", function functionName() {
    //Change the attribute to text
    $('#password').attr('type', 'text');
    $('.glyphicon').removeClass('glyphicon-eye-open').addClass('glyphicon-eye-close');
}).on("mouseup", function () {
    //Change the attribute back to password
    $('#password').attr('type', 'password');
    $('.glyphicon').removeClass('glyphicon-eye-close').addClass('glyphicon-eye-open');
}
);

var isIE = /*@cc_on!@*/false || !!document.documentMode;
var isEdge = !isIE && !!window.StyleMedia;
var showButton = !(isIE || isEdge)
if (!showButton) {
    document.getElementById("show_password").style.visibility = "hidden";
}

  var seconds = 3;
        var Timer = setInterval(function(){
          if(seconds <= 0){
            clearInterval(Timer);
            boxalert.style.display='none';
          }
          seconds -= 1;
        }, 1000);
        
        
             window.history.replaceState({}, document.title, "/public_html/" + "signin.php");

</script>
</body>
</html> 