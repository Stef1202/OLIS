<?php include_once('layout/head.php');
$t= $_GET['t'];

if($t=='Books'){

}else{

}

?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
      <!--  <section class="content-header">
            <h1>
                
                <?=$t;?>
            </h1>
        </section> -->
         <?php if ($_GET['t'] == 'Books') { ?>
        <section class="content-header">
            <h1>
             &nbsp;Book Report
                <small>Print book report</small>
            </h1>
           <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active">Books Report &nbsp;&nbsp;</li>
                    </ol>
        </section>
         <?php }else{ ?>
         <section class="content-header">
            <h1>
             &nbsp;Transaction History Report
                <small>Print Transaction History Report</small>
            </h1>
           <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active">Transaction History Report &nbsp;&nbsp;</li>
                    </ol>
        </section>
         <?php } ?>

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
                                    <div class="alert alert-<?= $classs ?> <?= $classs; ?>">
                                        <strong>Successfully <?= $r; ?>!</strong>
                                    </div>
                                <?php endif; ?></a>
                                
                                <!-- header per page-->
                              <br> 
                                                <!-- end header-->
                                                
                            <a data-toggle="modal" data-target="#add" type="submit"
                               class="btn btn-primary pull-right btn-m " onclick="printDiv('printableArea')"><i class="fa fa-print"> </i> Print </a>
                            

                           
                            <!--<div align="center">
                                <form action="" method="GET">
                                    <label for="dtFrom">Date From: </label>
                                    <input type="date" name="dtFrom" value="<?php if (isset($_GET['dtFrom'])) {
                                        echo $_GET['dtFrom'];
                                    } ?>">
                                    <label for="dtTo">Date To: </label>
                                    <input type="date" name="dtTo" value="<?php if (isset($_GET['dtTo'])) {
                                        echo $_GET['dtTo'];
                                    } ?>">
                                    
                                    <input type="hidden" name="t" value="<?=$t;?>">
                                    <input type="submit" value="Search">


                                </form> 
                            </div>  -->
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
                            
                             <?php if ($_GET['t'] == 'Books') { ?>
                            <div align="center" style="display:none">
                                <form action="" method="GET">
                                    <label for="status">Filter by status </label>
                                     <select name="status" onchange="this.form.submit()">
                                    <option value="">All</option>
                                    <option value="Available" <?php if (isset($_GET['status']) && $_GET['status'] == 'Available') { echo 'selected'; } ?>>Available</option>
                                    <option value="Borrowed" <?php if (isset($_GET['status']) && $_GET['status'] == 'Borrowed') { echo 'selected'; } ?>>Borrowed</option>
                                    <option value="Archived" <?php if (isset($_GET['status']) && $_GET['status'] == 'Archived') { echo 'selected'; } ?>>Archived</option>
                                </select>
                                    
                                    <input type="hidden" name="t" value="<?=$t;?>">
                                     <!-- Remove the search button -->
        <!-- <input type="submit" value="Search"> -->
<!--                                    <input type="submit" value="Print" onclick="printDiv('printableArea')">-->

                                </form> 
                            </div>
                            <?php }else{ ?>
                            <div align="center" style="display:none">
                                <form action="" method="GET">
                                    <label for="bookStatus">Filter by status </label>
                                     <select name="bookStatus" onchange="this.form.submit()">
                                    <option value="">All</option>
                                    <option value="Borrowed" <?php if (isset($_GET['bookStatus']) && $_GET['bookStatus'] == 'Borrowed') { echo 'selected'; } ?>>Borrowed</option>
                                    <option value="Returned" <?php if (isset($_GET['bookStatus']) && $_GET['bookStatus'] == 'Returned') { echo 'selected'; } ?>>Returned</option>
                                </select>
                                    
                                    <input type="hidden" name="t" value="<?=$t;?>">
                                     <!-- Remove the search button -->
        <!-- <input type="submit" value="Search"> -->
<!--                                    <input type="submit" value="Print" onclick="printDiv('printableArea')">-->

                                </form> 
                            </div>
                            
                            
                            <?php } ?>
                       
                            
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" >
             
                            <div class="table-responsive" id="printableArea">
                                 <div id="userprofile" style="display:none" >
                                              <!--  <table width="100%" style=" padding: 0 50px">
                                                    <tr style="vertical-align:top;">
                                                        <td width="25%" style="border:1 px; padding: 20px 50px">
                                                            <img src="../img/seal.png" class="dis-inline-block">
                                                        </td>
                                                        <td width="50%"style="border:0; padding: 20px" align="center">
                                                            <h4 class="dis-inline">City College of Tagaytay</h4><br>
                                                            <h5 class="dis-inline">Library</h5><br>
                                                            <h5 class="dis-inline">Akle St., Kaybagal South, Tagaytay City 4120</h5><br>
                                                            <h5 class="dis-inline">Tel. Nos. (046) 483-0470 / (046) 483-0672 </h5><br><br>
                                                               <?php if ($_GET['t'] == 'Books') { ?>
                                                            <h3>Book Report</h3>
                                                              <?php }else{ ?>
                                                            <h3>History Report</h3>
                                                             <?php } ?>
                                                        </td>
                                                         <td width="10%" style="border:0; padding: 10px 15px">
                                                            <img src="../img/cct-icon.png" class="dis-inline-block">
                                                        </td>
                                                        <td width="20%" style="border:0"></td>
                                                    </tr>
                                                </table>  -->
                                                <table width="100%" style=" padding: 0 50px">
                                                    
                                                    <tr style="vertical-align:top;">
                                                        <td width="20%" style="border:0;     text-align: end;">
                                                            <img src="../img/ofct.png" class="dis-inline-block" style="width:115px;" >
                                                            
                                                        </td>
                                                        
                                                        <td width="60%"style="border:0; padding: 20px" align="center">
                                                            <h4 class="dis-inline">Republic of the Philippines<br>City of Tagaytay</h4><br>
                                                            <h4 class="dis-inline">City College of Tagaytay</h4><br>
                                                            <h4 class="dis-inline">Akle St., Kaybagal South, Tagaytay City 4120</h4><br>
                                                            <h4 class="dis-inline">Tel. Nos. (046) 483-0470 / (046) 483-0672 </h4><br><br>
                                                             <h3 class="dis-inline">Library </h3><br>
                                                                      
                                                           <?php if ($_GET['t'] == 'Books') { ?>
                                                            <h4>Book Report</h4>
                                                              <?php }else{ ?>
                                                            <h4>Transaction History Report</h4>
                                                             <?php } ?>



                                                        </td>
                                            
                                                         <td width="20%" style="border:0;">
                                                            <img src="../img/cct-icon.png" class="dis-inline-block" style="width: 100px;
    height: 115px;">
                                                            
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
                                
                            </style> <?php if($t=='Books'){ ?>
                                    <table id="" class="table table-bordered table-striped" name="bookSearch">
                                           <!-- <h1 style="text-align: center">Book Reports</h1><br> -->
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ISBN</th>
                                             <th>Accession Number</th>
                                             <th>Call Number</th>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>Date Published</th>
                                            <th>Date Added</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            

                                        <?php
                                        if(isset($_GET['dtFrom'])){
                                            $dtfrom = $_GET['dtFrom'];
                                            $dtto = $_GET['dtTo'];
                                                  // Add 1 day to the end date to include all records up to the selected date
                                            $dtto = date('Y-m-d', strtotime($dtto . '+1 day'));
                                            $date="  WHERE  b.dbook BETWEEN '$dtfrom' AND '$dtto' ";
                                        }else{
                                            $date='';
                                        }
                                        
                                         $status = isset($_GET['status']) ? $_GET['status'] : '';
                                                if (!empty($status)) {
                                                    if (!empty($date)) {
                                                        $statusFilter = "AND b.status = '$status'";
                                                    } else {
                                                        $statusFilter = "WHERE b.status = '$status'";
                                                    }
                                                } else {
                                                    $statusFilter = '';
                                                }
                                                
                                       

                                        
                                        $result = $db->prepare("SELECT * FROM tbl_books b $date $statusFilter ORDER BY id DESC");
                                        $result->execute();
                                        for ($i = 1; $row = $result->fetch(); $i++) {
                                            $id = $row['id']; $qrcode=$row['qrcode'];
                                            ?>
                                            <tr>
                                                <td> <?= $i; ?></td>
                                                <td> <?= $row['isbn']; ?></td>
                                                 <td> <?= $row['accno']; ?></td>
                                               <td><?= $row['c1'] . '<br> ' . $row['c2'] . '<br> '. $row['c3']; ?></td>

                                                 
                                                <td> <?= $row['bookTitle']; ?></td>
                                                <td> <?= $row['author']; ?></td>
                                                <td> <?= $row['copyrightDate']; ?></td>
                                                <td> <?= format_date($row['dbook']); ?></td>
                                                <td> <?= $row['status']; ?></td>

                                            </tr>

                                        <?php } ?>
                                          <!--<div id="userprofile" style="display:none;">
                                                <table width="100%" style=" padding: 0 50px" >
                                                    <tr style="vertical-align:bottom;">
                                                        <td width="50%"style="border:0 ; padding: 20px" align="right" >
                                                            <br><br>
                                                            <p class="dis-inline">________________________</p><br>
                                                            <p class="dis-inline">Signature over printed name</p>
                                                            <br><br>
                                                        </td>
                                                    </tr>
                                                </table>
                                    </div> -->
                                        </tbody>
                                    </table>
                                    <?php }else{ ?>

                                    <table id="history" class="table table-bordered table-striped" name="bookSearch1">
                                       <!-- <h1 style="text-align: center">History Reports</h1><br>  -->
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ISBN</th>
                                            <th>Accesion Number</th>
                                            <th>Title</th>
                                            <th>ID Number</th>
                                            <th>Borrower</th>
                                            <th>Department/ Course & Year Level</th>
                                            
                                            <th>Date Borrowed</th>
                                            <th>Date Return</th>
                                            <th>Penalty & Notes</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php

                                        if(isset($_GET['dtFrom'])){
                                            $dtfrom = $_GET['dtFrom'];
                                            $dtto = $_GET['dtTo'];
                                            // Add 1 day to the end date to include all records up to the selected date
                                            $dtto = date('Y-m-d', strtotime($dtto . '+1 day'));
                                            $date="  WHERE  bt.dateBarrow BETWEEN '$dtfrom' AND '$dtto' ";
                                        }else{
                                            $date='';
                                        }
                                    $bookStatus = isset($_GET['bookStatus']) ? $_GET['bookStatus'] : '';
                            if (!empty($bookStatus)) {
                                if (!empty($date)) {
                                    $bookstatusFilter = "AND bt.bookStatus = '$bookStatus'";
                                } else {
                                    $bookstatusFilter = "WHERE bt.bookStatus = '$bookStatus'";
                                }
                            } else {
                                $bookstatusFilter = '';
                            }
                           
                                      
                                        $result = $db->prepare("SELECT *,bt.id FROM tbl_books b INNER JOIN tbl_booktransactions bt ON b.id=bt.book_id 
                                    INNER JOIN tbl_users u ON u.id=bt.user_id $date $bookstatusFilter  ORDER BY bt.id DESC");
                                        $result->execute();
                                        for ($i = 1; $row = $result->fetch(); $i++) {
                                            $id = $row['id']; ?>
                                            <tr>
                                                <td> <?= $i; ?></td>
                                                <td> <?= $row['isbn']; ?></td>
                                                <td> <?= $row['accno']; ?></td>
                                                <td> <?= $row['bookTitle']; ?></td>
                                                <td> <?= $row['username']; ?></td>
                                                <td> <?= $row['fname'] . ' ' . $row['lname'] .' '.'(' . $row['role'] . ')'; ?></td>
                                                 <td> <?= $row['course'] . ' '. '(' . $row['yr_lvl'] . ')'; ?></td>
                                                

                                                <td> <?= format_date($row['dateBarrow']); ?></td>
                                                <td> <?= format_date($row['dateReturn']); ?></td>
                                                
                                              <!--  <td> <?= $row['penalty'] . ' - ' . $row['notes']; ?></td> -->
                                              
                                                <td> <?php
                                                if ($row['penalty'] > 0) {
                                                 echo  '₱ ' . $row['penalty'] . '.00'. ' - ';
                                                }
                                                echo $row['notes'];


                                                ?></td>
                                                <td>
                                                    <h4 style=" font-size: 16px; color: <?= ($row['bookStatus'] == 'Borrowed' ? 'red' : 'green'); ?>"><?= $row['bookStatus']; ?>
                                                        <?php
                                                        $dtNow = date('Y-m-d');
                                                        $date = new DateTime($row['dateBarrow']);
                                                        $date->modify('+7 day');
                                                        $dateWarning = $date->format('Y-m-d');


                                                        if ($row['bookStatus'] == 'Borrowed') {
                                                            if ($dtNow >= $dateWarning) {
                                                                echo " <br/> You have a penalty";
                                                             
                                                            }else{
                                                                echo  " <br/> Return On :".format_date($dateWarning) ;
                                                            }
                                                        }; ?>


                                                </td>
                                            </tr>

                                        <?php } ?>
                                        </tbody>
                                      
                                    </table>
                                    <?php  }?>
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
<!-- search bar for books-->
<script>
    $(document).ready(function() {
        // Initialize DataTable with options
        $('table[name="bookSearch"]').DataTable({
            "searching": true, // Enable search functionality
            "info": false, // Show information about the table
            "responsive": true, // Enable responsive design
            "lengthChange": false, // Disable the "Show entries" option
            "paging": false // Disable pagination
        });
        
      
    });
</script>
<!-- search bar for books-->
<script>
    $(document).ready(function() {
        // Initialize DataTable with options
        $('table[name="bookSearch1"]').DataTable({
            "searching": true, // Enable search functionality
            "info": false, // Show information about the table
            "responsive": true, // Enable responsive design
            "lengthChange": false, // Disable the "Show entries" option
            "paging": false // Disable pagination
        });
        
       
    });
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
        //   hide();
           window.location.href='print.php?t=<?= $t?>';
        }


        function show(){
             $('#history_filter').hide();
             $('#DataTables_Table_0_filter').hide();
           
            document.getElementById('userprofile').style.display = '';
            document.getElementById('signature').style.display = '';
            
        }
        
        // function hide(){
        //   $('#history_filter').show();
        //   $('#DataTables_Table_0_filter').show();
        //     document.getElementById('userprofile').style.display = 'none';
        //     document.getElementById('signature').style.display = 'none';
        // }
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