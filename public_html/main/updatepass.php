
<!DOCTYPE html>
<html>
<head>

<?php include_once('layout/head.php'); ?>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/bs/bootstrap.css">
<style>
    .whole-page {
    height: 40vw;
}
</style>


</head>
<div class="content-wrapper">
  <section class="content-header">
            <h1>
             &nbsp;Change Password
               
            </h1>
           <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                        <li><a href="myprofile.php"><i class="fa fa-user"></i> Profile</a></li>
                        <li class="active">Change Password &nbsp;&nbsp;</li>
                    </ol>
        </section>
<div class="blueblue whole-page">
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
                                        <strong>Successfully <?=$r; ?>!</strong>
                                    </div>
                                <?php endif; ?></a>
                                <script>
        // Get the alert element
        var alertElement = document.getElementById('alert');

        // Function to hide the alert after 3 seconds
        setTimeout(function() {
            alertElement.style.display = 'none';
        }, 3000); // Set the timeout to 3000 milliseconds (3 seconds)
    </script>
 
  <?php
$uid = $_SESSION['user_id'];
$result = my_query("SELECT * FROM tbl_users WHERE id='$uid'");

while ($row = $result->fetch()) {
    $id = $row['id'];
?>

<center>
                <style>
                    
                    .padd{
                        padding: 30px;
                    }
                </style>
                <section class="content">
                     <div class="row">
                <div class="col-xs-12">

                    <div class="box box-primary">
                        <div class="box-header">

                        </div>
            <div class="card" style="height: 100%;max-width: 90%; width: 50%; padding-top: 50px;">
                
                
                
                <div class="card-body">
                    
                 
                    <form action="models/user.php?do=changePassword&id=<?= $id?>" method="post">
                        <div class="box-body">
                            <input value="<?= $row['id']; ?>" type="hidden" class="form-control" name="id">
                            <div class="form-group padd"><label class="col-sm-12 text-left">Username</label>
                                <div class="col-sm-12">
                                    <input value="<?= $row['username']; ?>" type="text" class="form-control" name="username" placeholder="Username" required readonly>
                                </div>
                            </div>
                            <div class="form-group padd"><label class="col-sm-12 text-left">Type Old Password</label>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                    <input id="passos" type="password" class="form-control" 
                                          
                                           name="cPassword" placeholder="Old Password" required>
                                         <div class="input-group-prepend">
                                         <button id="show_ps" class="btn btn-info" type="button" style="padding:5px width:10px;">
                                            <span class="fa fa-eye"></span>
                                            </button>
                                                </div></div>
                                </div>
                            </div>

                            <div class="form-group padd"><label class="col-sm-12 text-left">Type New Password</label>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                    <input id="passo" type="password" class="form-control" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&+~|{}:;<>/])[A-Za-z\d$@$!%*?&+~|{}:;<>/]{6,}"
                                           title="Must contain at least one special characters, one number and one uppercase and lowercase letter, and at least 6 or more characters"
                                           name="nPassword" placeholder="New Password" required>
                                         <div class="input-group-prepend">
                                         <button id="show_p" class="btn btn-info" type="button" style="padding:5px width:10px;">
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
                                         <button id="show_pusa" class="btn btn-info" type="button" style="padding:5px width:10px;">
                                          <span class="fa fa-eye"></span>
                                            </button>
                                            </div></div>
                                </div>
                                <div style="height: 30px"></div>
                            </div>
                              <div class="form-group padd"><label class="col-md-2 text-left"></label>
                                <div class="col-sm-12">
                                     <a href="myprofile.php" class="btn btn-primary btn-lg pull-middle">Cancel</a>
                                   <button type="submit" class="btn btn-primary btn-lg pull-right">Save</button>
                                </div>
                                <br><br><br><br><br>
                            </div>
                        </div>
                            
                         
                 
                    </form>
              
            </div>
            
            
            
            
            
            
        </div>
         </div>
          </div>
           </div>
        </section>
</center>
<?php } ?>

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

$('#show_ps').on("mousedown", function functionName() {
    //Change the attribute to text
    $('#passos').attr('type', 'text');
    $('.glyphicon').removeClass('glyphicon-eye-open').addClass('glyphicon-eye-close');
    }).on("mouseup", function () {
    //Change the attribute back to password
    $('#passos').attr('type', 'password');
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
  
<script>
    
    $('#show_passed').on("mousedown", function functionName() {
    //Change the attribute to text
    $('#passed').attr('type', 'text');
    $('.glyphicon').removeClass('glyphicon-eye-open').addClass('glyphicon-eye-close');
}).on("mouseup", function () {
    //Change the attribute back to password
    $('#passed').attr('type', 'password');
    $('.glyphicon').removeClass('glyphicon-eye-close').addClass('glyphicon-eye-open');
}
);

var isIE = /*@cc_on!@*/false || !!document.documentMode;
var isEdge = !isIE && !!window.StyleMedia;
var showButton = !(isIE || isEdge)
if (!showButton) {
    document.getElementById("show_passed").style.visibility = "hidden";
}

    window.history.replaceState({}, document.title, "/public_html/main/" + "updatepass.php");

</script>

</div>
</html>

<?php include_once('layout/footer.php')?>