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



</head>

<?php include_once('references.php');?>
<body>

<STYLE>
     h1,h2,h3,h4,h5{
            font-family: 'Arial Narrow Bold', sans-serif;
        
            
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
            color: #000;

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
            background-color:rgb(255 255 255 / 70%);
            border-radius: 10px;
            overflow: hidden;
            padding: 35px;
            height: 1150px;
            width: 900px;
        }
          @media screen and (max-width: 768px) {
          .wraplogin{
            background-color: rgb(255 255 255 / 70%);
            border-radius: 10px;
            overflow: hidden;
            padding: 55px;
            height: 1555px;
            width: 900px;
        }
     
        }
         @media screen and (max-width: 425px) {
          .wraplogin{
            background-color: rgb(255 255 255 / 70%);
            border-radius: 10px;
            overflow: hidden;
            padding: 55px;
            height: 1555px;
            width: 900px;
        }
     
        }
       
        form{
            padding: 50px;
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
          form{
              padding: 0px;
          }
        }
        
        @media screen and (max-width: 768px) {
          .wraplogin {
            padding: 20px;
          }
        }
           @media screen and (max-width: 1600px) {
          .col-12 {
            padding-right:50px;
            padding-left:50px;
          }
        }
         @media screen and (max-width: 1200px) {
          .col-12 {
            padding-right:50px;
            padding-left:50px;
          }
        }
         @media screen and (max-width: 768px) {
          .col-12 {
            padding-right:20px;
            padding-left:20px;
          }
        }
         @media screen and (max-width: 425px) {
          .col-12 {
            padding-right:10px;
            padding-left:10px;
          }
        }
 @media screen and (max-width: 1600px) {
          .col-md-2.col-xs-12 {
               padding-right: 0px;
    padding-left: 15px;
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
          
          form{
              padding: 0px;
          }
        
        

</STYLE>

<div class="limiter" id="signup">
        <div class="container-login100" role="document">
            <DIV CLASS="container-login100Black padd">
            <div class="wraplogin">
                <div class='row'>
                      <div class="col-12" style='text-align: center'>
                
                <img src="img/ccts.png" alt="IMG" width="100" height="120">
              
                </div>
 
                      <span class="login100-form-titlesignup">
         
                  <h2><BR> <b> ONLINE LIBRARY INFORMATION SYSTEM USING QR CODE WITH CATALOGUING FOR CITY COLLEGE OF TAGAYTAY </b></h2>

                </span>
                
                
                    <div class='col-12'>
                       
                    <form class="form-horizontal" action="main/models/user.php?do=signup" method="post">
                        <div class='col-12'>
                         <span class="login-form-title" style="color: black">
                 <P> <b> SIGN UP FORM FOR GUESTS </b></P>
                </span>
                        <div class='row'>
                       <!-- <b> <p class="pull-right" style="color:black; FONT-FAMILY:'CENTURY GOTHIC'; FONT-SIZE: 0.8REM">The school ID will also be the user's username</p></b>  -->
                        <div class="col-12"> 
                       
                            <div class="form-group"><label class="col-md-2 col-xs-12   ">Username<i style="color:red" >*</i> </label>
                                <div class="col-md-10 col-xs-12">
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Please input a unique Username" minlength="6" 
                                           autofocus required></div>
                            </div>
                            <div class="form-group"><label class="col-md-2 col-xs-12  ">ID Number<i style="color:red" >*</i></label>
                                <div class="col-md-10 col-xs-12">
                                    <input type="text" class="form-control" name="userNo" placeholder="ID Number" minlength="6"  oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 15);"
           pattern="\d{6,}" title="Must contain at least 6 digits"
                                           required></div>
                            </div>
                            <div class="form-group"><label class="col-md-2 col-xs-12  ">First Name<i style="color:red" >*</i></label>
                                <div class="col-md-10 col-xs-12">
                                    <input type="text" class="form-control" name="firstname" placeholder="First Name"
                                  pattern="^(?=.*[a-z])(?=.*[A-Z])[a-zA-Z\s]+$" 
           title="Must contain 1 uppercase. Note: Please don't use special characters except for white space"
                                    
                                           required></div>
                            </div>
                            <div class="form-group"><label class="col-md-2 col-xs-12  ">Last Name<i style="color:red" >*</i></label>
                                <div class="col-md-10 col-xs-12">
                                    <input type="text" class="form-control" name="lastname" placeholder="Last Name" pattern="^(?=.*[a-z])(?=.*[A-Z])[a-zA-Z\s]+$" 
           title="Must contain 1 uppercase. Note: Please don't use special characters except for white space"
                                           required></div>
                            </div>
                               <div class="form-group"><label class="col-md-2 col-xs-12  ">Middle Name</label>
                                <div class="col-md-10 col-xs-12">
                                    <input type="text" class="form-control" name="mname" placeholder="Middle Name"  pattern="^(?=.*[a-z])(?=.*[A-Z])[a-zA-Z\s]+$" 
           title="Must contain 1 uppercase. Note: Please don't use special characters except for white space"
                                           ></div>
                            </div>
                        
                                     <!-- <div class="form-group">
                                    <label class="col-md-2 col-xs-12  " >Suffix</label>
                                    <div class="col-md-10 col-xs-12">
                                    <select placeholder="Click to Select" name="suffix" id="suffix" class="form-control" >
                                     <option selected="selected" class="s" value"" placeholder='Select Suffix '></option> 
                                      <option value=" "> </option>
                                    <option value=" Jr.">Jr. </option>
                                     <option value=" Sr.">Sr. </option>
                                      <option value=" I">I </option>
                                       <option value=" II">II </option>
                                        <option value=" III">III </option>
                                         <option value=" IV">IV </option>
                                          <option value=" V">V </option>
                                    
                            
                                        </select>
                                            </div>
                                       </div>  -->
                             <div class="form-group">
                                <label class="col-md-2 col-xs-12  ">Suffix</label>
                                <div class="col-md-10 col-xs-12">
                                    <input type="text" class="form-control" name="suffix" id="suffix" placeholder="Example: Jr., I, II, III"
                                    pattern="^(?:[A-Z][a-z]*|[A-Z]+)(?:\.)?$"
           title="Must start with an uppercase letter or be all caps. Only one special character (period) allowed at the end."
                                    >
                                    </div>
                                </div>

                            <div class="form-group">
                                <label class="col-md-2 col-xs-12  ">Email Address<i style="color:red" >*</i></label>
                                <div class="col-md-10 col-xs-12">
                                    <input type="text" class="form-control" name="email" placeholder="Email" 
                                    pattern="^[a-zA-Z0-9]+(?:\.[a-zA-Z0-9]+)*@[a-zA-Z0-9]+(?:\.[a-zA-Z0-9]+)*$"
                                    
                                    title="Please enter a valid email address (e.g., example@example.com)"
                                    required>
                                    </div>
                                </div>
                                   <div class="form-group">
                                <label class="col-md-2 col-xs-12  ">School<i style="color:red" >*</i></label>
                                <div class="col-md-10 col-xs-12">
                                    <input type="text" class="form-control" name="school" placeholder="Must be all caps. Example: CCT, CVSU" pattern="^[A-Z\s.]+$"
            title="Must be in all caps and may include white space. Note: Please don't use special characters except for white space"
           required>
                                    </div>
                                </div>
                                  <div class="form-group">
                                <label class="col-md-2 col-xs-12  ">Course</label>
                                <div class="col-md-10 col-xs-12">
                                    <input type="text" class="form-control" name="course" placeholder="Must be all caps. Course/Strand If Senior High School"
                                    pattern="^[A-Z\s]+$"
            title="Must be in all caps and may include white space. Note: Please don't use special characters except for white space"
                                    >
                                    </div>
                                </div>
                                <div class="form-group">
                                <label class="col-md-2 col-xs-12  ">Yeal Level</label>
                                <div class="col-md-10 col-xs-12">
                                    <input type="text" class="form-control" name="yr_lvl" placeholder="Must be all caps. Example: GRADE 12 and 4TH YEAR "
                                   pattern="(\d+[A-Z\s]+|[A-Z\s]+\d+)" title="Please enter all caps letters followed by a space and a number."
                                    
                                    >
                                    </div>
                                </div>
                   
        
                            <!--<div class="form-group"><label class="col-md-2 col-xs-12  ">Contact<i style="color:red" >*</i></label>-->
                            <!--    <div class="col-md-10 col-xs-12">-->
                            <!--        <input type="text" class="form-control" name="contact"-->
                            <!--               placeholder="(ex. 9502 *** ***)"  minlength="10" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"  pattern="[0-9]+.{10,}" title="Must contain at least 11 digit"-->
                            <!--               required></div>-->
                            <!--</div>-->
                            <div class="form-group"><label class="col-md-2 col-xs-12  " >Mobile Number<i style="color:red" >*</i></label>
                    
                                <div class="col-md-10 col-xs-12">
                                    <div class="input-group">
                                        <div class="input-group-append">
                                           <div class='input-group-text'>+63 </div>
                                            </div>
                                    <input type="text" class="form-control" name="contact"
                                           placeholder="(ex. 9502 *** ***)"  minlength="10" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"  pattern="[0-9]+.{9,}" title="Must contain at least 10 digit"
                                           required>
                                          
                                           
                                            </div>
                                           </div>
                                           
                            </div>
                            <div class="form-group"><label class="col-md-2 col-xs-12  ">Address<i style="color:red" >*</i></label>
                                <div class="col-md-10 col-xs-12">
                                    <input type="text" class="form-control" name="address"  placeholder="Complete Address. Must be sentence case."
                                    pattern="^(?=.*[a-z])(?=.*[A-Z])[a-zA-Z\s.,]+$"
           title="Must contain uppercase in first letter. Note: Please don't use special characters except for period (.), comma (,) and white space"
                                           required></div>
                            </div>
                            
                            <div class="form-group"><label class="col-md-2 col-xs-12  " >Password<i style="color:red" >*</i></label>
                    
                                <div class="col-md-10 col-xs-12">
                                    <div class="input-group">
                                    <input id="pass" type="password" pattern="(?=^.{6,}$)(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&amp;*()_+}{&quot;:;'?/&gt;.&lt;,])(?!.*\s).*$"
                                           title="Must contain at least one special characters, one number and one uppercase and lowercase letter, and at least 6 or more characters"
                                           class="form-control" name="password" placeholder="Password" required>
                                           <!-- An element to toggle between password visibility -->
                                           <br>
                                           <div class="input-group-prepend">
                                            <button id="show_pass" class="btn btn-info" type="button" style="padding:5px width:10px;">
                                            <span class="glyphicon glyphicon-eye-open" ></span>
                                            </button>
                                            </div>
                                            </div>
                                           </div>
                                           
                            </div>
                                 <div class="form-group" style="display:none"><label class="col-md-2 col-xs-12  " >Role</label>
                                <div class="col-md-10 col-xs-12">
                                    <input name="role" class="form-control" value="Guest" readonly />
                                </div>
                            </div>
                  
                        </div>
                             <div class="container-login100-form-btn">
                   <b> <a class="txt2" style="color:black; cursor: pointer;" href="index.php"><i class="fa fa-home" aria-hidden="true"></i> &nbsp;Back to home &nbsp;</a>/
                    <a class="txt2" style="color:black; " href="signin.php">
                        &nbsp;Already have an account?
                        <i class="fa fa-sign-in" aria-hidden="true"></i>
                    </a> </b>
                </div>
                        <div class="container-login100-form-btn" style="display:content">
                            <button type="submit" class="login100-form-btn">Sign Up</button>
                        </div>
                             
                </div>
                </div>
                    </form>
                    </div>
            
                </div>
            </div>
            </DIV>
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
    
    $('#show_pass').on("mousedown", function functionName() {
    //Change the attribute to text
    $('#pass').attr('type', 'text');
    $('.glyphicon').removeClass('glyphicon-eye-open').addClass('glyphicon-eye-close');
}).on("mouseup", function () {
    //Change the attribute back to password
    $('#pass').attr('type', 'password');
    $('.glyphicon').removeClass('glyphicon-eye-close').addClass('glyphicon-eye-open');
}
);

var isIE = /*@cc_on!@*/false || !!document.documentMode;
var isEdge = !isIE && !!window.StyleMedia;
var showButton = !(isIE || isEdge)
if (!showButton) {
    document.getElementById("show_pass").style.visibility = "hidden";
}

</script>

</body>
</html> 