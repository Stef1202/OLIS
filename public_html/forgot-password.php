
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Online Library Information System</title>
    <link rel="shortcut icon" href="assets/images/logoo.png" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="assets/plugins/iCheck/square/blue.css">
    
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">



</head>
<?php include_once('references.php');?>

<body  >
    <STYLE>
     h1,h2,h3,h4,h5{
            font-family: 'Arial Narrow Bold', sans-serif;
            
        }

        h1{
            font-size: 3rem;
            
        }

        button, td, label{
            font-family: 'Century Gothic';
            font-size: 0.7rem;
        }
        
        p{
            font-family: 'Century Gothic';
            font-size: 1.3rem;
            color:black;

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

        footer p{
            font-size: 1rem;
        }
         .padd{
            padding: 20px 350px;
        }
         @media screen and (max-width: 1600px) {
          .padd {
            padding: 100px 100px;
            
          }
        }
        
        @media screen and (max-width: 1200px) {
          .padd {
            padding: 20px;
          }
        }
        .wrap-login100{
            background-color: rgb(255 255 255 / 70%);
            border-radius: 10px;
            overflow: hidden;
            padding: 35px;
            height: 500px;
            width: 900px;
        }
        @media screen and (max-width: 425px) {
          .wrap-login100{
            background-color: rgb(255 255 255 / 70%);
            border-radius: 10px;
            overflow: hidden;
            padding: 55px;
            height: 700px;
            width: 900px;
        }
     
        }
        
        @media screen and (max-width: 768px) {
          .wrap-login100 {
            padding: 20px;
          }
        }
        @media screen and (max-width: 1600px) {
          .col-12 {
           padding-right: 250px;
    padding-left: 250px;
          }
        }
         @media screen and (max-width: 1200px) {
          .col-12 {
            padding-right:250px;
            padding-left:250px;
          }
        }
         @media screen and (max-width: 768px) {
          .col-12 {
       padding-right: 150px;
    padding-left: 150px;px;
          }
        }
         @media screen and (max-width: 768px) {
          .col-12 {
       padding-right: 50px;
    padding-left: 50px;px;
          }
        }
</STYLE>

    <div class="container-login100" role="document">
        <DIV CLASS="container-login100Black padd">
            <div class="wrap-login100" style="text-align:center">
                <div class="row">
               <div class="col-12"  style="text-align:center">
                
                             <img src="img/ccts.png" alt="IMG" width="100" height="120">
               
            </div>
                       <span class="login100-form-titlesignup">
          <h2>
              <BR>
                  <b> ONLINE LIBRARY INFORMATION SYSTEM USING QR CODE WITH CATALOGUING FOR CITY COLLEGE OF TAGAYTAY</b>
</h2>
                </span>
                  <div class="col-12"> 
                    <form class="form-horizontal"  action="main/models/user.php?do=forgotPassword" method="post" >
                      
                        <b> <span class="login-form-title" style="color:black;">
                  <P> Forgot Password Form</P>
                </span></b>
                            <div class="form-group"><label class="col-sm-2 " style="color:black; padding: 0px; padding-top: 5px; font-size: 13px;">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Your Username" data-validate="Please input your Username"
                                           required></div>
                                     
                            </div>
                            
                              <div class="container-login100-form-btn">
                     <a class="txt2" style="color: black; cursor: pointer;" href="index.php"> <b><i class="fa fa-home" aria-hidden="true"></i> &nbsp;Back to home &nbsp;&nbsp;</a></b> /
                    <b><a class="txt2" href="signin.php" style="color:black;"> </b>
                       Login
                       
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div>
                        <div class="container-login100-form-btn">
                            <button type="submit" class="login100-form-btn">Submit</button>
                            <br> 
                        </div>
                        
                        
                </div>
            
                    </form>
                    
                    
               </div>
            </div>
            </DIV>
        </div>
        
        
        

<!-- /.login-box -->
<footer class="footer">
    <center><p style="color:white">Copyright &copy;<script>document.write(new Date().getFullYear());</script> City College of Tagaytay All Rights Reserved.</p></center>
</footer>


<!-- jQuery 2.2.3 -->
<script src="assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="assets/plugins/iCheck/icheck.min.js"></script>
<!-- <script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script> -->
</body>
</html>
