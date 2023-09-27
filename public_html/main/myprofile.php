<?php 
include_once('layout/head.php');
?>
<div class="content-wrapper">
 <?php
$uid = $_SESSION['user_id'];
$result = my_query("SELECT * FROM tbl_users WHERE id='$uid'");

while ($row = $result->fetch()) {
    $id = $row['id'];
?>


  <section class="content-header">
            <h1>
             &nbsp;Profile
                <small>view your profile</small>
            </h1>
           <ol class="breadcrumb"><?php if ($row['role'] == 'Librarian' || $row['role'] == 'Admin'){ ?>
                        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                        
                        <?php } else { ?>
                        <li><a href="index2.php"><i class="fa fa-home"></i> Home</a></li> <?php } ?>
                        <li class="active">Profile &nbsp;&nbsp;</li>
                    </ol>
        </section>


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/bs/bootstrap.css">


<div class="blueblue whole-page">
    
  <a class="box-title">  <?php if (isset($_GET['r'])): ?>
                                    <?php
                                    $r = $_GET['r'];
                                    if ($r == 'Uploaded successfully') {
                                        $classs = 'success';
                                    } else if ($r == 'Updated successfully') {
                                        $classs = 'info';
                                    } else if ($r == 'Uploading failed') {
                                        $classs = 'danger';
                                    } else {
                                        $classs = 'hide';
                                    }
                                    ?>
                                    <div id='alert' class="alert alert-<?=$classs ?> <?=$classs; ?>">
                                        <strong> <?=$r; ?>!</strong>
                                    </div>
                                    <script>
        // Get the alert element
        var alertElement = document.getElementById('alert');

        // Function to hide the alert after 3 seconds
        setTimeout(function() {
            alertElement.style.display = 'none';
        }, 3000); // Set the timeout to 3000 milliseconds (3 seconds)
    </script>
                                <?php endif; ?></a>
                                


<center>
                <style>
                    @media screen and (max-width: 10000px) {
          .padd {
            padding: 30px ;
          }
        }
        @media screen and (max-width: 1200px) {
          .padd {
            padding: 30px ;
          }
        }
        @media screen and (max-width: 600px) {
          .padd {
            padding:  0px;
          }
        }
        
        @media screen and (max-width: 10000px) {
          .card {
            padding-right: 195px;
    padding-left: 195px;
          }
        }
        @media screen and (max-width: 1200px) {
          .card {
                padding-right: 100px;
    padding-left: 100px;
          }
        }
         @media screen and (max-width: 600px) {
          .card {
                padding-right: 10px;
    padding-left: 10px;
          }
        }
                    
                    h1{
                        font-family:'Impact';
                    }
                    img{
                        border-radius: 50%;
                    }
                </style>
                 <section class="content">
                     <div class="row">
                <div class="col-xs-12">

                    <div class="box box-primary">
                        <div class="box-header">

                        </div>
            <div class="card" style="height: 100%; padding-top: 15px;">
                 <div class="card-body">
                        <div class='row'>
                      
                      
                        <div class="col-md-12">
                                   <img width="25%"src="image/<?php echo $row['pic']; ?>">
                        </div>
                         
                    <div class='col-md-12'>
                        <form method="POST" action="" enctype="multipart/form-data">
                    
                            <div class="form-group padd" ><label class="col-md-12 text-left">Change Profile Picture<small class="small-label text-left" style="color:red">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;File Type: JPG, JPEG, and PNG</small></label>
                             
                                <div class="col-md-12 col-xs-12" >
                                
                                    <input class="form-control" onchange="showButton()" type="file" id="file" name="uploadfile" value="" /></div>
                                    <div class="col-md-12" id="buton" style="display:none">
                                        
                                   <button  class="btn btn-outline-secondary pull-right" style='margin-top: -30px'type="submit" name="upload" value="<?= $row['id']?>">Upload Photo</button>
                                </div>
                                
                            </div>
                        </form></div>
                         <div class='col-md-12'>
                        <div class="box-body">
                        
                           
                        
                                <?php if ($_SESSION['role'] == 'Guest') { ?>
                     
                             <div class="form-group padd"><label class="col-md-2 text-left">School ID</label>
                                <div class="col-md-10">
                                    <input value="<?= $row['userNo']; ?>" type="text" class="form-control" name="username" placeholder="Username" required readonly>
                                </div>
                            </div>
                      <?php } else { ?>
                <div class="form-group padd"><label class="col-md-2 text-left">School ID</label>
                                <div class="col-md-10">
                                    <input value="<?= $row['username']; ?>" type="text" class="form-control" name="username" placeholder="Username" required readonly>
                                </div>
                            </div>
               <?php } ?>
                         
                            <div class="form-group padd"><label class="col-md-2 text-left">Role</label>
                                <div class="col-md-10">
                                    <input value="<?= $row['role']; ?>" type="text" class="form-control" name="username" placeholder="Username" required readonly>
                                </div>
                            </div>
                            
                            <div class="form-group padd"><label class="col-md-2 text-left">School</label>
                                <div class="col-md-10">
                                    <input value="<?= $row['school']; ?>" type="text" class="form-control" name="school" placeholder="School" required readonly>
                                </div>
                            </div>
                   
                              <?php if ($_SESSION['role'] == 'Student') { ?>
                      <div class="form-group padd"><label class="col-md-2 text-left">Year Level</label>
                                <div class="col-md-10">
                                    <input value="<?= $row['yr_lvl']; ?>" type="text" class="form-control" name="yr_lvl" placeholder="Year Level" readonly>
                                </div>
                            </div>
                            <div class="form-group padd"><label class="col-md-2 text-left">Course</label>
                                <div class="col-md-10">
                                    <input value="<?= $row['course']; ?>" type="text" class="form-control" name="course" placeholder="Course" readonly>
                                </div>
                            </div>
                <?php  }?>
                 <?php if ($_SESSION['role'] == 'Guest') { ?>
                      <div class="form-group padd"><label class="col-md-2 text-left">Year Level</label>
                                <div class="col-md-10">
                                    <input value="<?= $row['yr_lvl']; ?>" type="text" class="form-control" name="yr_lvl" placeholder="Year Level" readonly>
                                </div>
                            </div>
                            <div class="form-group padd"><label class="col-md-2 text-left">Course</label>
                                <div class="col-md-10">
                                    <input value="<?= $row['course']; ?>" type="text" class="form-control" name="course" placeholder="Course" readonly>
                                </div>
                            </div>
                <?php  }?>
                <?php if ($_SESSION['role'] == 'Faculty') { ?>
                     
                            <div class="form-group padd"><label class="col-md-2 text-left">Department</label>
                                <div class="col-md-10">
                                    <input value="<?= $row['course']; ?>" type="text" class="form-control" name="course" placeholder="Course" readonly>
                                </div>
                            </div>
                <?php  }?>
                            
                        
                            <div class="form-group padd"><label class="col-md-2 text-left">Address</label>
                                <div class="col-md-10">
                                    <input value="<?= $row['address']; ?>" type="text" class="form-control" name="username" placeholder="Username" required readonly>
                                </div>
                            </div>
                            <div class="form-group padd"><label class="col-md-2 text-left">Contact Number</label>
                                <div class="col-md-10">
                                    <input value="<?= $row['contact']; ?>" type="text" class="form-control" name="username" placeholder="Username" required readonly>
                                </div>
                            </div>
                            <div class="form-group padd"><label class="col-md-2 text-left">Email</label>
                                <div class="col-md-10">
                                    <input value="<?= $row['email']; ?>" type="text" class="form-control" name="username" placeholder="Username" required readonly>
                                </div>
                            </div>
                            <div class="form-group padd"><label class="col-md-2 text-left"></label>
                                <div class="col-md-10">
                                   <button onclick="window.location.href='updatepass.php'" class="btn btn-outline-secondary pull-left">Change password</button>
                                </div>
                            </div>
                            </div>
                          
                          
                           </div>
                            </div>
                        </div>
                        </div>
                            </div>
                        </div>
                        
               
              
            </div>
            </section>
        </div>
        
</center>



<?php } ?>
<script>
    
    function showButton(){
        var button=document.getElementById('buton');
        var file=document.getElementById('file');
        if (file.value == ''){
            button.style.display = 'none';
        } else {
            button.style.display = 'block';
        }
    }
</script>


<?php
error_reporting(0);
 
$msg = "";
 
// If upload button is clicked ...
if (isset($_POST['upload'])) {
    $id = $_POST['upload'];
    $origname = $_FILES["uploadfile"]["name"];
    $filename = explode('.', $origname);
    $name = $filename[0];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $strQuery = "SELECT * FROM tbl_users WHERE pic LIKE '%$name%'";
    $result = $db->query($strQuery) or exit("Error code ({$db->errno}): {$db->error}");
    if($result){
        for ($i = 1; $row = $result->fetch(); $i++) {
        $count = $i;
            }
        $file_count = $count +1;
        $file =  $name.'('.$file_count.').'.end($filename); 
    } else {
        $file =$origname;
    }
   
    $folder = "image/" .$file;
    $sql = "UPDATE tbl_users SET  pic=?  WHERE id=?";
	$q = $db->prepare($sql);
	$q->execute(array($file, $id));
 

 
    // Now let's move the uploaded image into the folder: image
    if (move_uploaded_file($tempname, $folder)) {
        $message = 'Uploaded successfully';
         echo "<script type='text/javascript'>window.location.href='myprofile.php?r=$message';</script>";
    } else {
        $message = 'Uploading failed';
         echo "<script type='text/javascript'>window.location.href='myprofile.php?r=$message';</script>";
    }
}
?>


</div>
</div>
<script>
    window.history.replaceState({}, document.title, "/public_html/main/" + "myprofile.php");
    
</script>


<?php include_once('layout/footer.php');?>