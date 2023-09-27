<?php

// if(time() - $_SESSION['timestamp'] > 300) {  
//         $_SESSION['logged_in'] = false;
//         session_destroy();
//         $asd=$_SESSION['timestamp'];


// date_default_timezone_set('Asia/Manila'); 
// $dt =  date('Y-m-d h:i:s');  

// $userID=$_SESSION['userID']; 
//   $action="Logged-out.";
//   $r = $db->prepare("INSERT INTO `tbl_ualt`(`userID`, `dt`, `action`) VALUES ('$userID','$dt','$action')");
//   $r->execute(array()); 

//   unset($_SESSION['userID']);
//   unset($_SESSION['fname']);
//   unset($_SESSION['role']); 
//   unset($_SESSION['username']); 
//   $_SESSION['logged_in'] = "false"; 
//       $message = "Automatic logout.";
//   echo "<script type='text/javascript'>alert('$message');window.location.href='../signin.php';</script>";
//         exit;
//     } else {
//         $_SESSION['timestamp'] = time(); //set new timestamp
//     }
//on session creation  ?>
 <div id="checking"></div>

<script>
    function CheckUser(){
        var user = <?php echo json_encode($_SESSION['userID']); ?>;
        $.ajax({    
            type: "POST",
            url: "../main/models/ajax/session_destroy.php",
            data:{
                user_id: user,
            },                  
            success: function(data){                    
                $("#checking").html(data); 
            }
        });
    }


var check = setInterval(CheckUser,1000);
</script>
<style>
     .logo-title {
        float: left;
        font-size: 15px;
        line-height: 50px;
        text-align: left;
        padding: 0 10px;
        width: auto;
        font-family: 'Century Gothic', cursive;
        font-weight: 500;
        height: 50px;
        display: block;
        color: #f9f9f9;
    }

        h3,h4{
            font-family:  'Century Gothic';
            font-style: normal; font-variant: normal; font-weight: 100;
            vertical-align: middle;
        }
        h1,h2,h5{
            font-family:'Impact',  'Arial Narrow Bold', sans-serif;
            font-style: normal; font-variant: normal; font-weight: 100;
        }

        h1{
            font-size: 3rem;
        }

        
        p, button{
            font-family: 'Century Gothic';
            font-size: 1.3rem;
        }
        label{
            font-family: 'Century Gothic';
            font-size: 1.5rem;
            padding: 10px;
        }

        a{
            font-family: 'Century Gothic';
            font-weight: 200;
            color:gray;
        }
        
        img{
            aspect-ratio: 1/1;
        }
        
        hr{
            height: 1px;
        }

        td,th{
            padding: 10px;
            font-family: 'Century Gothic';
        }
        
        body{
            overflow-wrap: break-word;
        }

        footer p{
            font-size: 1rem;
        }
        

        .mychartBox{
            width: 100%;
            height: 350px;
        }

        .c50{
            width: 45%;
            display: inline-block;
        }
        .cdoughnut{
            width: 75%;
            margin: auto;
        }
        
        
</style>
<header class="main-header   ">
    <!-- Logo -->
    <a href="#" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b><h4>  CCT </h4></b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b><h4>   CCT </h4></b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <span class="logo-title">
            Online Library Information System
				</span>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <?php
$uid = $_SESSION['user_id'];
$result = my_query("SELECT * FROM tbl_users WHERE id='$uid'");

while ($row = $result->fetch()) {
?>
                            
                            <img src="image/<?php echo $row['pic']?>" class="user-image" alt="User Image"><?php }?>
                        <!-- Timer -->
<!--
                        <script type="text/javascript">
                            tday = new Array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
                            tmonth = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

                            function GetClock() {

                                var d = new Date();
                                var nday = d.getDay(), nmonth = d.getMonth(), ndate = d.getDate(),
                                    nyear = d.getFullYear();
                                var nhour = d.getHours(), nmin = d.getMinutes(), nsec = d.getSeconds(), ap;

                                if (nhour == 0) {
                                    ap = " AM";
                                    nhour = 12;
                                }
                                else if (nhour < 12) {
                                    ap = " AM";
                                }
                                else if (nhour == 12) {
                                    ap = " PM";
                                }
                                else if (nhour > 12) {
                                    ap = " PM";
                                    nhour -= 12;
                                }
                                if (nmin <= 9) nmin = "0" + nmin;
                                if (nsec <= 9) nsec = "0" + nsec;

                                document.getElementById('clockbox').innerHTML = "" + tday[nday] + ", " + tmonth[nmonth] + " " + ndate + ", " + nyear + " " + nhour + ":" + nmin + ":" + nsec + ap + "";

                            }

                            window.onload = function () {
                                GetClock();
                                setInterval(GetClock, 1000);

                            }
                        </script>  -->

                        <span id="clockbox" class="hidden-xs"> <?php echo $_SESSION['fullname']; ?> </span>


                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <?php
$uid = $_SESSION['user_id'];
$result = my_query("SELECT * FROM tbl_users WHERE id='$uid'");

while ($row = $result->fetch()) {
?>
                            
                            <img src="image/<?php echo $row['pic']?>" class="img-circle" alt="User Image"><?php }?>

                            <p>  <?php echo $_SESSION['fullname']; ?>   </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-footer">
                           <div class="pull-left">
                                <?php $id = $_SESSION['user_id']; ?>
                           
                                  <a href="myprofile.php" class="btn btn-default btn-flat">View Profile</a> 
                            </div> 
                            <!--<div class="pull-center">
                                <?php $id = $_SESSION['user_id']; ?>
                           <a href="profile.php" class="btn btn-default btn-flat">View Profile
                                    Password</a> 
                                    
                            </div> -->

                            <div class="pull-right">
                                <a href="models/user.php?do=logout" onclick="return  confirm('Do you want to logout ?')" class="btn btn-default btn-flat">Log
                                    Out</a>
                            </div>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>
</header>


<?php $result = $db->prepare("SELECT * FROM tbl_users ORDER BY id DESC");
$result->execute();
for ($i = 0; $row = $result->fetch(); $i++) {
    $id = $row['id']; 
    ?>
    <div class="modal fade" id="updatePassword<?= $id; ?>" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Update Password</h4>
                </div>
                <div class="modal-body">

                    <form class="form-horizontal" action="models/user.php?do=changePassword&id=<?= $id; ?>" method="post">
                        <div class="box-body">
                            <input value="<?= $row['id']; ?>" type="hidden" class="form-control" name="id">
                            <div class="form-group"><label class="col-sm-12">Username</label>
                                <div class="col-sm-12">
                                    <input value="<?= $row['username']; ?>" type="text" class="form-control" name="username" placeholder="Username" required readonly>
                                </div>
                            </div>
                            <!--
                            <div class="form-group"><label class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-10">
                                    <input value="<?= endecrypt($row['password'], 'd'); ?>" type="password" class="form-control" name="password" placeholder="Password" required readonly>
                                </div>
                            </div> -->

                            <div class="form-group"><label class="col-sm-12">Type Current Password</label>
                                <div class="col-sm-12">
                                    <input  type="password" class="form-control" name="cPassword" placeholder="Type Current Password" required>
                                           
                                </div>
                            </div>
                        
                            
                            <div class="form-group"><label class="col-sm-12">Type New Password</label>
                                <div class="col-sm-12">
                                    <input  type="password" class="form-control" pattern="(?=.*\\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"
                                           title="Must contain at least one special characters, one number and one uppercase and lowercase letter, and at least 6 or more characters"
                                           name="nPassword" placeholder="New Password" required>
                                            
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-12">Re-type New Password</label>
                                <div class="col-sm-12">
                                    <input  type="password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"
                                           title="Must contain at least one special characters, one number and one uppercase and lowercase letter, and at least 6 or more characters"
                                           name="rPassword" placeholder="Re-type New Password" required>
                                            
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary pull-right">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php } ?>


<?php $result = $db->prepare("SELECT * FROM tbl_users WHERE id='$user_id' ORDER BY id DESC");
$result->execute();
for ($i = 0; $row = $result->fetch(); $i++) {
    $id = $row['id']; ?>
    <!-- /.Edit -->
    <div class="modal fade" id="editProfile<?= $id; ?>" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Edit</h4>
                </div>
                <div class="modal-body">

                    <form class="form-horizontal" action="models/CRUDS.php?" method="post">
                        <div class="box-body">
                            <input value="<?= $row['id']; ?>" type="hidden" class="form-control" name="id">
                            <input value="<?= $row['sellerNo']; ?>" type="hidden" class="form-control" name="cusNo">

                            <div class="form-group"><label class="col-sm-2 control-label">Lastname</label>
                                <div class="col-sm-10">
                                    <input value="<?= $row['lname']; ?>" type="text" class="form-control" name="lname" placeholder="Lastname" autofocus required>
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Firstname</label>
                                <div class="col-sm-10">
                                    <input value="<?= $row['fname']; ?>" type="text" class="form-control" name="fname" placeholder="Firstname" required>
                                </div>
                            </div>

                            <div class="form-group"><label class="col-sm-2 control-label">Address</label>
                                <div class="col-sm-10">
                                    <input value="<?= $row['address']; ?>" type="text" class="form-control" name="address" placeholder="Address" required>
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input value="<?= $row['email']; ?>" type="email" class="form-control" name="email" placeholder="Email" required>
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Contact</label>
                                <div class="col-sm-10">
                                    <input value="<?= $row['contact']; ?>" type="number" class="form-control" name="contact" placeholder="Contact" required>
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Username</label>
                                <div class="col-sm-10">
                                    <input value="<?= $row['username']; ?>" type="text" class="form-control" name="username" placeholder="Username" readonly>
                                </div>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary pull-right" name="func_param" value="updateProfile">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>



