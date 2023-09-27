<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
</style>
</head>

<?php include_once('layout/head.php'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
       <section class="content-header">
            <h1>
             &nbsp; Print User Logs
                <small>BSIT Logs</small>
            </h1>
           <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                        <li><a href="ualt.php"><i class="fa fa-user" ></i> User Logs</a></li>
                        <li class="active">BSIT Logs&nbsp;&nbsp;</li>
                    </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <!-- /.box-header -->
                    <div class="box box-primary">
                        <div class="box-header">
                            <!-- /result -->
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
                                    <div class="alert alert-<?=$classs ?> <?=$classs; ?>">
                                        <strong>Successfully <?=$r; ?>!</strong>
                                    </div>
                                <?php endif; ?></a>
                                                <div class="dropdown">
             <button onclick="myFunction()" class="dropbtn"><i class ="fa fa-filter"></i> Filter</button>
                            <div id="myDropdown" class="dropdown-content">
                                 <input  type="text"   placeholder="Search.." id="myInput" onkeyup="filterFunction()" >
                                    <a href="ualt.php">All </a>
                                      <a href="sysad.php">System Administrator</a>
                                          <a href="liblog.php">Librarian</a>
                           
                                    <a href="BSCS.php">BSCS STUDENTS</a>
                           <a href="BSIT.php">BSIT STUDENTS</a>
                                <a href="BSBA-HRDM.php">BSBA-HRDM STUDENTS</a>
                                 <a href="BSBA-MM.php">BSBA-MM STUDENTS</a>
                                    <a href="BSBA-OFAD.php">BSBA-OFAD STUDENTS</a>
                                 <a href="BSE-SS.php">BSE-SS STUDENTS</a>
                                <a href="BSTM.php">BSTM STUDENTS</a>
                                  <a href="BSHM.php">BSHM STUDENTS</a>
                                 <a href="BSE-M.php">BSE-M STUDENTS</a>
                                 <a href="BSE-E.php">BSE-E STUDENTS</a>
                                <a href="BSE-F.php">BSE-F STUDENTS</a>
                                <a href="faculty.php">FACULTY MEMBERS</a>
                                  <a href="guestlogs.php">GUEST</a>
  </div>
</div>
                               
           
                                
                        <a data-toggle="modal" data-target="#add" type="submit"
                               class="btn btn-info pull-right btn-m " onclick="printDiv('printableArea')"><i class="fa fa-print"> </i> Print </a>
                           
                           
                            <div align="center">
                                <form action="" method="GET" onsubmit="return validateDates()">
                                    <label for="dtFrom">Date From: </label>
                                    <input type="date" id="dtFrom" name="dtFrom" value="<?php if (isset($_GET['dtFrom'])) {
                                        echo $_GET['dtFrom'];
                                    } ?>">
                                    <label for="dtTo">Date To: </label>
                                    <input type="date" id="dtTo" name="dtTo" value="<?php if (isset($_GET['dtTo'])) {
                                        echo $_GET['dtTo'];
                                    } ?>">
                                    
                                    <input type="hidden" name="t" value="<?=$t;?>">
                                    <input type="submit" value="Search">
                                </form> 
                            </div>
                        

                        </div>
                        
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive"  id="printableArea">
                               <!-- inalis ko sa table id="example1" -->
                          <div id="userprofile" style="display:none;">
                                                 <table width="100%" style=" padding: 0 50px">
                                                    <tr style="vertical-align:top;">
                                                        <td width="20%" style="border:0;     text-align: end;">
                                                            <img src="../img/ofct.png" class="dis-inline-block" style="width:95px;" >
                                                        </td>
                                                        <td width="60%"style="border:0; padding: 20px" align="center">
                                                            <h5 class="dis-inline">Republic of the Philippines<br>City of Tagaytay</h4><br>
                                                            <h5 class="dis-inline">CITY COLLEGE OF TAGAYTAY</h4><br>
                                                            <h5 class="dis-inline">Akle St., Kaybagal South, Tagaytay City 4120</h4><br>
                                                            <h5 class="dis-inline">Tel. Nos. (046) 483-0470 / (046) 483-0672 </h4><br><br>
                                                             <h4 class="dis-inline">Library </h4><br>
                                                         <h5>User Logs: BSIT</h5>
                                                        </td>
                                                         <td width="20%" style="border:0;">
                                                            <img src="../img/cct-icon.png" class="dis-inline-block" style="width: 80px;
    height: 100px;">
                                                        </td>
                                                    </tr>
                                                </table>
                                    </div>
                            <table id="border" width="100%" ><!--Please css gumana kanaa huhu. Yung bootstrap na border-dark di nagana whyyy
                            -->
                            <style>
                                
                                #border{
                                    border: 1px solid black;
                                    border-collapse: collapse;
                                    padding: 0 50px;
                                }
                                
                                #border tr{
                                    border: 0.2px solid black;
                                    border-collapse: collapse;
                                    padding: 10px;
                                }
                                
                                #border td,th{
                                    padding: 10px;
                                }
                                
                                @media print{
                                    #border{
                                    border: 0.2px solid black;
                                    border-collapse: collapse;
                                    padding: 10px;
                                    }
                                }
                            </style>
                            <table id="" class="table table-bordered table-striped" >
                                <thead>
                                <tr>
                                      <th>#</th>
                                    <th>ID Number</th>
                                    <th>Name</th>
                                    <th>School</th>
                                    <th>Course</th>
                                    <th>Year Level</th>
                                    <th>Logged-in</th>
                                    <th>Logged-out</th>
                                </tr>
                                </thead>
                                <tbody>

                                  <?php
                                            if (isset($_GET['dtFrom'])) {
                                            $dtfrom = $_GET['dtFrom'];
                                            $dtto = $_GET['dtTo'];
                                        
                                            // Add 1 day to the end date to include all records up to the selected date
                                            $dtto = date('Y-m-d', strtotime($dtto . '+1 day'));
                                        
                                             $date = " AND (ua.created_at BETWEEN '$dtfrom' AND '$dtto' OR ua.logout BETWEEN '$dtfrom' AND '$dtto')";
                                        } else {
                                            $date = '';
                                        }
                                       
                              
                                $result = $db->prepare("SELECT *, ua.id as uaid FROM tbl_users u INNER JOIN tbl_ualt ua ON u.id = ua.user_id WHERE course = 'BSIT' AND role = 'Student' AND school='CCT' $date ORDER BY ua.id DESC");
                                $result->execute();
                                for ($i = 1; $row = $result->fetch(); $i++) {
                                    $id = $row['uaid']; ?>
                                    <tr>
                                          <td> <?=$i; ?></td>
                                        <td> <?=$row['username']; ?></td>
                                        <td> <?=$row['lname'] . ' ' . $row['fname']. ' ' . $row['suffix']; ?></td>
                                        <td> <?=$row['school']; ?></td>
                                        <td> <?=$row['course']; ?></td>
                                         <td> <?=$row['yr_lvl']; ?></td>
                                        <td> <?=format_datetime($row['created_at']); ?></td>
                                        <td> <?=format_datetime($row['logout']); ?></td>
                                    </tr>

                                       
                                <?php } ?>
                                

                                </tbody>
                            </table>
                            </table>
                            <div id='signature' style='display:none'>
                                                <table width="100%" style=" padding: 0 50px">
                                                    <tr style="vertical-align:bottom;">
                                                        <td width="50%"style="border:0; padding: 20px" align="right">
                                                            <br><br>
                                                            <p class="dis-inline">________________________</p><br>
                                                            <p class="dis-inline">Signature over printed name</p>
                                                            <br><br>
                                                        </td>
                                                    </tr>
                                                </table>
                                    </div>
                        </div>
                        </div>
                        <!-- /.box-body -->
                    </div>


                    <!-- /.box-body -->
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <script>
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

function filterFunction() {
  var input, filter, ul, li, a, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  div = document.getElementById("myDropdown");
  a = div.getElementsByTagName("a");
  for (i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = "";
    } else {
      a[i].style.display = "none";
    }
  }
}
</script>
<script>
        function MM_openBrWindow(theURL,winName,features) { //v2.0
            window.open(theURL,winName,features);
        }
    </script>

    <script type="text/javascript">
    
       function printDiv(divName) {
            show();
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
           hide();
        }


        function show(){
            document.getElementById('userprofile').style.display = '';
            document.getElementById('signature').style.display = '';
        }
        
        function hide(){
            document.getElementById('userprofile').style.display = 'none';
            document.getElementById('signature').style.display = 'none';
        }


    </script>
      <script>
function validateDates() {
    var dtFrom = document.getElementById('dtFrom').value;
    var dtTo = document.getElementById('dtTo').value;
    
    // Validate the date format using a regular expression (DD-MM-YYYY)
    var dateRegex = /^\d{4}-\d{2}-\d{2}$/;
    if (!dateRegex.test(dtFrom) || !dateRegex.test(dtTo)) {
        showAlert('Invalid date format. Please use DD-MM-YYYY format.');
        return false;
    }
    
    // Convert the date strings to Date objects for comparison
    var fromDate = new Date(dtFrom);
    var toDate = new Date(dtTo);
    
    // Get the current date
    var currentDate = new Date();
    
    // Compare the dates to ensure dtFrom is before or equal to dtTo
    if (fromDate > toDate) {
        showAlert('Invalid date range. Date From must be before or equal to Date To.');
        return false;
    }
    
    // Compare the dates to ensure they are not in the future
    if (fromDate > currentDate || toDate > currentDate) {
        showAlert('Invalid date. Please select a date in the past or today.');
        return false;
    }
    
    return true;
}

function showAlert(message) {
    var alertBox = document.createElement('div');
    alertBox.setAttribute('class', 'alert');
    alertBox.textContent = message;
    
    document.body.appendChild(alertBox);
    
    setTimeout(function() {
        alertBox.style.display = 'none';
    }, 3000); // 3 seconds
}
</script>

<style>
.alert {
    position: fixed;
    top: 70px;
    left: 60%;
    transform: translateX(-50%);
    padding: 10px;
    background-color: #f44336;
    color: white;
    font-weight: bold;
    border-radius: 5px;
}
</style>
<?php include_once('layout/footer.php'); ?>