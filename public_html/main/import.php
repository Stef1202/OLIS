<?php 
include_once('layout/head.php');


?>
<div class="content-wrapper">



  <section class="content-header">
            <h1>
             &nbsp;Import to tbl_users
            </h1>
           <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                        
                   
                        <li class="active">Import &nbsp;&nbsp;</li>
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
            text-align: left;
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
                      
                      
                
                         
                    <div class='col-md-12'>
                        <form method="POST" action="" id="fields" enctype="multipart/form-data">
                            
                             <div class="form-group padd"><label class="col-md-12 text-left" style='color:red'>Please align the columns on their respective fields: </label>
                               
                                <br>
                            </div>
                    <?php 
                    $strQuery = "DESC `tbl_users`";

                    // Execute the query, or else return the error message.
                    $result = $db->query($strQuery) or exit("Error code ({$db->errno}): {$db->error}");
                        // If the query returns a valid response, prepare the JSON string
                        if ($result) {
                            // The `$arrData` array holds the chart attributes and data
                        
                            for ($i = 1; $row = $result->fetch(); $i++) {

                                $fields[] = $row['Field'];     
                            }
                        }
                        
                        
                        for ($i = 0; $i < count($fields); $i++){
                            if($fields[$i] != 'id' && $fields[$i] != 'role' && $fields[$i] != 'pic' && $fields[$i] != 'created_at' && $fields[$i] != 'school' && $fields[$i] != 'suffix' && $fields[$i] != 'status' && $fields[$i] != 'username' && $fields[$i] != 'password'){
                        ?>
                        <div class="form-group padd" ><label class="col-sm-2"><?= ($fields[$i]=='userNo' ? 'User Number' :  ($fields[$i]=='fname' ? 'First Name' : ($fields[$i]=='lname' ? 'Last Name' : ($fields[$i]=='mname' ? 'Middle Name' : ($fields[$i]=='yr_lvl' ? 'Year Level' : ($fields[$i]=='bdate' ? 'Birthday' : ($fields[$i]=='address' ? 'Address' : ($fields[$i]=='contact' ? 'Contact' : ($fields[$i]=='email' ? 'Email Address' : ($fields[$i]=='gender' ? 'Gender' : ($fields[$i]=='course' ? 'Course' :$fields[$i] ))))))))))); ?></label>
                                <div class="col-sm-10">
                                    <select name="<?= $fields[$i]; ?>" id = '<?= $fields[$i]; ?>' class="form-control" required>
                                        <option value="NULL"></option>
                                        <?php   $str = "DESC `new_users`";
                                                $res = $db->query($str) or exit("Error code ({$db->errno}): {$db->error}");
                                                        if ($res) {
                                                            for ($x = 1; $row = $res->fetch(); $x++) {
                                                                 ?>
                                            <option value='<?= $row['Field']?>' ><?= $row['Field'] ?></option>
                                            <?php } }?>
                                    </select>
                                </div>
                            </div>
                            
                        <?php }else{}
                        } ?> 
                        
                        
                          <div class="form-group padd" ><label class="col-sm-2">Username <i style='color:red'>*</i></label>
                                <div class="col-sm-10">
                                    <select name="username" id= 'username' class="form-control" required>
                                        <option></option>
                                        <?php   $str = "DESC `new_users`";
                                                $res = $db->query($str) or exit("Error code ({$db->errno}): {$db->error}");
                                                        if ($res) {
                                                            for ($x = 1; $row = $res->fetch(); $x++) {
                                                                 ?>
                                            <option value='<?= $row['Field']?>' ><?= $row['Field']?></option>
                                            <?php } }?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group padd" ><label class="col-sm-2">Password <i style='color:red'>*</i></label>
                                <div class="col-sm-10">
                                    <select name="password" id='password' class="form-control" required>
                                    <option></option>
                                        <?php   $str = "DESC `new_users`";
                                                $res = $db->query($str) or exit("Error code ({$db->errno}): {$db->error}");
                                                        if ($res) {
                                                            for ($x = 1; $row = $res->fetch(); $x++) {
                                                                 ?>
                                            <option value='<?= $row['Field']?>' ><?= $row['Field']?></option>
                                            <?php } }?>
                                    </select>
                                </div>
                            </div>
                            <input type='hidden' name='import' value='1' />
                        
                       
                    </form>
                     <div class="form-group padd"><label class="col-md-2 text-left"></label>
                                <div class="col-sm-12">
                                    
                                  <button  class="btn btn-outline-secondary pull-right" onclick='Columns()'>Upload</button>
                                </div>
                                <br><br><br><br><br>
                            </div>
                </div>
                  
                      </div>
                      
                        </div>
                        </div>
                            </div>
                        </div>
                        
               
              
            </div>
            </section>
            </center>




<div class="modal" id="confirm" tabindex="-1" role="dialog" >
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="padding: 30px">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" ><span
                            aria-hidden="true">X</span></button>
                </div>
            
                <div class="modal-body">
                  <div class="form-group"><label class="col-md-12 text-left" style='color:red'>WARNING: This operation cannot be undone. Please check if the alignment of columns are correct. <br><br>Are you sure you want to import this? </label>
                               
                                <br>
                            </div>
                  <table class="table table-bordered table-striped">
                                    <thead>
                                      
                                    <tr>
                                        <th>Field </th>
                                        <th>Column</th>
                                     
                                    </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td>User Number</td>
                                            <td id ='i1'></td>
                                        </tr>
                                        <tr>
                                            <td>First Name</td>
                                            <td id='i2'></td>
                                        </tr>
                                        <tr>
                                            <td>Last Name</td>
                                            <td id='i3'></td>
                                        </tr>
                                        <tr>
                                            <td>Middle Name</td>
                                            <td id='i4'></td>
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td id='i5'></td>
                                        </tr>
                                        <tr>
                                            <td>Contact</td>
                                            <td id='i6'></td>
                                        </tr>
                                        <tr>
                                            <td>Email Address</td>
                                            <td id='i7'></td>
                                        </tr>
                                        <tr>
                                            <td>Gender</td>
                                            <td id='i8'></td>
                                        </tr>
                                        <tr>
                                            <td>Course</td>
                                            <td id='i9'></td>
                                        </tr>
                                        <tr>
                                            <td>Year Level</td>
                                            <td id='i10'></td>
                                        </tr>
                                        <tr>
                                            <td>Birthday</td>
                                            <td id='i11'></td>
                                        </tr>
                                        <tr>
                                            <td>Username</td>
                                            <td id='i12'></td>
                                        </tr>
                                        <tr>
                                            <td>Password</td>
                                            <td id='i13'></td>
                                        </tr>

                                    </tbody>
                                </table>  
                <button type="button"  
                class="btn btn-primary btn-m" onclick='submit()'> Import </button>
                
                </div>
            </div>
        </div>
    </div>

        </div>
        




</div>
<script>

    

function Columns(){
    <?php
  for ($i = 0; $i < count($fields); $i++){
        if($fields[$i] != 'id' && $fields[$i] != 'role' && $fields[$i] != 'pic' && $fields[$i] != 'created_at' && $fields[$i] != 'school' && $fields[$i] != 'suffix' && $fields[$i] != 'status' && $fields[$i] != 'username' && $fields[$i] != 'password'){
    ?>
    var <?= $fields[$i]; ?> = document.getElementById('<?= $fields[$i]; ?>').value;
    <?php }else{}
    } ?>
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    if (username == '' || password == ''){
        alert('Username and Password Field are required');
    }else{
        document.getElementById('i1').innerHTML = userNo;
        document.getElementById('i2').innerHTML = fname;
        document.getElementById('i3').innerHTML = lname;
        document.getElementById('i4').innerHTML = mname;
        document.getElementById('i5').innerHTML = address;
        document.getElementById('i6').innerHTML = contact;
        document.getElementById('i7').innerHTML = email;
        document.getElementById('i8').innerHTML = gender;
        document.getElementById('i9').innerHTML = course;
        document.getElementById('i10').innerHTML = yr_lvl;
        document.getElementById('i11').innerHTML = bdate;
        document.getElementById('i12').innerHTML = username;
        document.getElementById('i13').innerHTML = password;
        
        $('#confirm').modal();
    }
}

function submit(){
    document.getElementById('fields').submit();
}
</script>





<?php 
if (isset($_POST['userNo'])){
    $userNo = $_POST['userNo'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mname= $_POST['mname'];
    $role= "Student";
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $course = $_POST['course'];
    $yr_lvl = $_POST['yr_lvl'];
    $bdate = $_POST['bdate'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $school = "CCT";
    $status = "Active";
    
?>


<?php

 

if (isset($_POST['import'])) {
    $result = $db->prepare("SELECT *
                            FROM tbl_users t1
                            WHERE EXISTS (
                              SELECT 1
                              FROM new_users t2
                              WHERE t1.userNo = t2.$userNo
                            );
                        ");
	$result->execute(); 
	
	 if ($result->rowCount() > 0) {
        $message = 'Error: The two tables have similar records';
        $sql1 = "DROP TABLE IF EXISTS new_users";
        $r = $db->prepare($sql1);
        $r->execute();
        echo "<script>alert('$message'); window.location.href='upload_users.php'</script>";
        exit();
    } else {
        $sql = "INSERT INTO tbl_users(userNo, fname, lname, mname, role, address, contact, email, gender, course, yr_lvl, bdate, username, password, school, status)
                SELECT $userNo, $fname, $lname, $mname, '$role', $address, $contact, $email, $gender, $course, $yr_lvl, $bdate, $username, $password, '$school', '$status'
                FROM new_users";
        $q = $db->prepare($sql);
        $q->execute();

        $sql1 = "DROP TABLE IF EXISTS new_users";
        $r = $db->prepare($sql1);
        $r->execute();

        echo '<script>alert("Imported Successfully"); window.location.href="upload_users.php"</script>';
        exit();
    }
}
	
}
?>



<?php include_once('layout/footer.php');?>