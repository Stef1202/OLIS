<?php 
include_once('layout/head.php');

 $sql1 = "DROP TABLE IF EXISTS new_faculty_users";
        $r = $db->prepare($sql1);
        $r->execute();
?>
<div class="content-wrapper">



  <section class="content-header">
            <h1>
             &nbsp;Upload Faculty Members Accounts
            </h1>
           <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                        
                   
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
                    
                    .content{
                        height: 100%;
                    }
                    .box{
                        height: 100%;
                        padding: 50px;
                    }
                    .row{
                        height: 100%;
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
                        <form method="POST" action="" enctype="multipart/form-data">
                            <div class="form-group padd"><label class=" col-md-12 text-left" style='color:red'>Please upload the exported SQL table for the Faculty Member accounts: </label></div>
                            <div class="form-group padd" ><label class="col-md-12 text-left">Upload Faculty Members Accounts<small class="small-label float-right" style="color:red"> &emsp;(File Type: SQL)</small></label>
                             
                                <div class="col-md-12 col-xs-12" >
                                
                                    <input class="form-control" onchange="showButton()" type="file" id="file" name="uploadfile" value="" /></div>
                                    <div class="col-md-12" id="buton" style="display:none">
                                        
                                   <button  class="btn btn-outline-secondary pull-right" style='margin-top: -30px'type="submit" name="upload" value="1">Upload</button>
                                </div>
                                
                            </div>
                        </form></div>
                         <div class='col-md-12'>
                  
                            </div>
                        </div>
                        </div>
                            </div>
                        </div>
                        
               
              
            </div>
            </section>
        </div>
        
</center>

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
    $origname = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $file = $origname;
    $folder = "dbs/" . $file;

    // Now let's move the uploaded image into the folder: image
    if (move_uploaded_file($tempname, $folder)) {
        $message = 'Uploaded successfully';

        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "u823561260_library";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sqlFile = 'dbs/' . $file;
        $sql = file_get_contents($sqlFile);

        // Extract the old table name
        $pattern = '/CREATE TABLE\s+`(\w+)`/';
        preg_match($pattern, $sql, $matches);
        $oldTableName = $matches[1];

        // Modify the table name
        $newTableName = 'new_faculty_users';
        $sql = str_replace($oldTableName, $newTableName, $sql);

        // Execute the modified SQL statements
        $queries = explode(';', $sql);

        foreach ($queries as $query) {
            $result = $conn->query($query);
            if (!$result) {
                echo "Error executing query: " . $conn->error;
            }
        }

        // Close the database connection
        $conn->close();

        echo "<script type='text/javascript'>alert('$message');window.location.href='import_faculty.php';</script>";

    } else {
        $message = 'Uploading failed';
        echo "<script type='text/javascript'>alert('$message');window.location.href='upload_faculty_users.php';</script>";
    }
}

?>


</div>
</div>
<script>
    // window.history.replaceState({}, document.title, "/uploadatabase/" + "upload_users.php");
    
</script>


<?php include_once('layout/footer.php');?>