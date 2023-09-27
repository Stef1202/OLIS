<?php include_once('layout/head.php');
?>
    <div class="content-wrapper" >
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Transaction History
            </h1>
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
                                    <div class="alert alert-<?= $classs ?> <?= $classs; ?>">
                                        <strong>Successfully <?= $r; ?>!</strong>
                                    </div>
                                <?php endif; ?></a>
                                
                                <a data-toggle="modal" data-target="#add" type="submit"
                               class="btn btn-success pull-right btn-m " onclick="printDiv('printableArea')"><i class="fa fa-print"> </i> Print </a>

<style>
    @media screen and (max-width: 600px) {
         .ems {
    
    display: grid;
    position: relative;
    justify-items: center;
    align-items: center;
    justify-content: center;
    align-content: center;
}
        }
    
</style>
                           
                            
                            


                        </div>
              <div class="ems" align="center">
    <form action="" method="GET" onsubmit="return validateDates()">
        <label for="dtFrom">Date From: </label>
        <input type="date" id="dtFrom" name="dtFrom" value="<?php if (isset($_GET['dtFrom'])) {
            echo $_GET['dtFrom'];
        } ?>">
        <label for="dtTo">&emsp;Date To: </label>
        <input type="date" id="dtTo" name="dtTo" value="<?php if (isset($_GET['dtTo'])) {
            echo $_GET['dtTo'];
        } ?>">
        <!--<input type="hidden" name="t" value="<?=$t;?>">-->
        <input type="submit" value="Search">
        <!--                                    <input type="submit" value="Print" onclick="printDiv('printableArea')">-->
    </form>
</div>

<script>
    function validateDates() {
        var dtFrom = document.getElementById('dtFrom').value;
        var dtTo = document.getElementById('dtTo').value;

        // Validate the date format using a regular expression (YYYY-MM-DD)
        var dateRegex = /^\d{4}-\d{2}-\d{2}$/;
        if (!dateRegex.test(dtFrom) || !dateRegex.test(dtTo)) {
            showAlert('Invalid date format. Please use YYYY-MM-DD format.');
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

        setTimeout(function () {
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

                        <!-- /.box-header -->
                        <div class="box-body"  >
                            <div class="table-responsive" id="printableArea">
                                    <div id="userprofile" style="display:none;">
                                            <?php
                                             $uid = $_SESSION['user_id'];
                                            $result = $db->prepare("SELECT * FROM tbl_users   WHERE id='$user_id' AND id='$uid' ");
                                            $result->execute();
                                            for ($i = 1; $row = $result->fetch(); $i++) {
                                            ?> 
                                                <table width="100%" style="border: 1px solid black; padding: 0 50px">
                                                    <tr style="vertical-align:top;">
                                                        <td width="30%" style="border:0; padding: 20px 50px">
                                                            <img src="../img/cct-icon.png" class="dis-inline-block">
                                                        </td>
                                                        <td width="50%"style="border:0; padding: 20px" align="center">
                                                            <h4 class="dis-inline">City College of Tagaytay</h4><br>
                                                            <h5 class="dis-inline">Tagaytay Centrum, Tagaytay City</h5><br><br>
                                                            <?php if ($_SESSION['role'] == 'Student') { ?>
                                                             <h4 class="dis-inline">STUDENTS LIBRARY CARD</h4><br>
                                                        <?php  }?>
                                                         <?php if ($_SESSION['role'] == 'Faculty') { ?>
                                                             <h4 class="dis-inline">FACULTY MEMBERS LIBRARY CARD</h4><br>
                                                        <?php  }?>
                                                       
                                                  
                                                        </td>
                                                        <td width="20%" style="padding:10px">
                                                                
                                                                <img src="image/<?php echo $row['pic']?>" class="user-image" alt="User Image">
                                                                   
                                                        </td>
                                                    </tr>
                                                <tr style="border: 1px solid black"><td colspan="3" style="padding-left: 20px"><p class="dis-inline"><b>Name: </p></b><p class="dis-inline"><?= $row['lname'].', ' .$row['fname'].' '.$row['suffix']?></p><br></td></tr>
                                                <tr style="border: 1px solid black"><td colspan="3" style="padding-left: 20px"><p class="dis-inline"><b>Course: </p></b><p class="dis-inline"><?= $row['course']?></p><br></td></tr>
                                                <tr style="border: 1px solid black"><td colspan="3" style="padding-left: 20px"><p class="dis-inline"><b>Year Level: </p></b><p class="dis-inline"><?= $row['yr_lvl']?></p><br></td></tr>
                                                 <tr style="border: 1px solid black"><td colspan="3" style="padding-left: 20px"><p class="dis-inline"><b>ID Number: </p></b><p class="dis-inline"><?= $row['username']?></p><br></td></tr>
                                                <tr style="border: 1px solid black"><td colspan="3" style="padding-left: 20px"><p class="dis-inline"><b>Address: </p></b><p class="dis-inline"><?= $row['address']?></p><br></td></tr>
                                                <tr style="border: 1px solid black"><td colspan="3" style="padding-left: 20px"><p class="dis-inline"><b>Contact Number: </p></b><p class="dis-inline"><?= $row['contact']?></p><br></td></tr>
                                               <!-- <tr style="border: 1px solid black"><td colspan="3" style="padding-left: 20px"><p class="dis-inline"><b>Date: </p></b><p class="dis-inline"><?php
                                                        
                                                         print date('D, d M Y ');
                                                     
                                                        ?></p><br></td></tr> -->
                                                </table >
                                            <?php }?>
                                    </div>
                            <table id="border" width="100%" style="border: 1px solid black; border-collapse: collapse;">
    <style>
        #border tr {
            border: 1px solid black;
            border-collapse: collapse;
        }
        
        #border td, #border th {
            padding: 10px;
            border: 1px solid black;
        }
        
        @media print {
            #border tr {
                border: 1px solid black;
                border-collapse: collapse;
            }
            
            #border td, #border th {
                padding: 10px;
                border: 1px solid black;
            }
        }
    </style>
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Accession Number</th>
                                    <th>Book Title</th>
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
                                            $date="  AND  bt.dateBarrow BETWEEN '$dtfrom' AND '$dtto'";
                                        }else{
                                            $date='';
                                        }
                                  
                              
                                
                                $result = $db->prepare("SELECT *, bt.id FROM tbl_books b
                        INNER JOIN tbl_booktransactions bt ON b.id = bt.book_id
                        INNER JOIN tbl_users u ON u.id = bt.user_id
                        WHERE bt.user_id = '$user_id'  $date
                        ORDER BY bt.id DESC");
                                $result->execute();
                                for ($i = 1; $row = $result->fetch(); $i++) {
                                    $id = $row['id']; ?>
                                    <tr>
                                        <td> <p><?= $i; ?></p></td>
                                        <td> <p> <?= $row['accno']; ?></p></td>
                                        <td> <p> <?= $row['bookTitle']; ?></p></td>
                                        <td> <p> <?= format_date($row['dateBarrow']); ?></p></td>
                                        <td> <p> <?= format_date($row['dateReturn']); ?></p></td>
                                            <td> <?php
                                                if ($row['penalty'] > 0) {
                                                  echo  '₱' . $row['penalty'] . ' - ';
                                                }
                                                echo $row['notes'];


                                                ?></td>
                        
                            
                                         
                                        <td>
                                            <h4 style="font-size: 16px;color: <?= ($row['bookStatus'] == 'Borrowed' ? 'red' : 'green'); ?>"><?= $row['bookStatus']; ?>
                                                <?php
                                                $dtNow = date('Y-m-d');
                                                $date = new DateTime($row['dateBarrow']);
                                                $date->modify('+7 day');
                                                $dateWarning = $date->format('Y-m-d');


                                                if ($row['bookStatus'] == 'Borrowed') {
                                                    if ($dtNow >= $dateWarning) {
                                                           echo " <br/> You have a penalty: " ;
                                                    }else{
                                                        echo  " <br/> Return On :".format_date($dateWarning) ;
                                                    }
                                                }; ?>


                                        </td>
                                    </tr>

                                <?php } ?>
                                </tbody>
                               
                            </table>
                            
                             <div id="signature" style="display:none;">
                                                <table width="100%" style=" padding: 0 50px">
                                                    <tr style="vertical-align:top;">
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
    
    
<?php include_once('layout/footer.php'); ?>