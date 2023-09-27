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
                                                                                         <div class="dropdown">
                                    <button onclick="myFunction()" class="dropbtn"><i class ="fa fa-list"></i> Logs: StudentS/Faculty</button>
                            <div id="myDropdown" class="dropdown-content">
                                 <input  type="text"   placeholder="Search.." id="myInput" onkeyup="filterFunction()" >
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
                               class="btn btn-primary pull-right btn-m " onclick="printDiv('printableArea')"><i class="fa fa-print"> </i> Print </a>
                            

                           
                            <div align="center">
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
<!--                                    <input type="submit" value="Print" onclick="printDiv('printableArea')">-->
                                </form> 
                            </div>
                            
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" >
                            <div class="table-responsive" id="printableArea">
                                 <div id="userprofile" style="display:none;">
                                                <table width="100%" style=" padding: 0 50px">
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
                                    <table id="" class="table table-bordered table-striped">
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
                                            $date="  WHERE  b.dbook BETWEEN '$dtfrom' AND '$dtto' ";
                                        }else{
                                            $date='';
                                        }
                                        $result = $db->prepare("SELECT * FROM tbl_books b $date   ORDER BY id DESC");
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

                                    <table id="" class="table table-bordered table-striped">
                                       <!-- <h1 style="text-align: center">History Reports</h1><br>  -->
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ISBN</th>
                                            <th>Accesion Number</th>
                                            <th>Title</th>
                                             <th>ID Number</th>
                                            <th>Borrower</th>
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
                                            $date="  WHERE  bt.dateBarrow BETWEEN '$dtfrom' AND '$dtto' ";
                                        }else{
                                            $date='';
                                        }

                                        $result = $db->prepare("SELECT *,bt.id FROM tbl_books b INNER JOIN tbl_booktransactions bt ON b.id=bt.book_id 
INNER JOIN tbl_users u ON u.id=bt.user_id $date   ORDER BY bt.id DESC");
                                        $result->execute();
                                        for ($i = 1; $row = $result->fetch(); $i++) {
                                            $id = $row['id']; ?>
                                            <tr>
                                                <td> <?= $i; ?></td>
                                                <td> <?= $row['isbn']; ?></td>
                                                <td> <?= $row['accno']; ?></td>
                                                <td> <?= $row['bookTitle']; ?></td>
                                                <td> <?= $row['username']; ?></td>
                                                <td> <?= db_get_result('tbl_users',"CONCAT(fname, ' ',lname)",['id'=>$row['user_id']]);?></td>

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
                                                    <h4 style="color: <?= ($row['bookStatus'] == 'Borrowed' ? 'red' : 'green'); ?>"><?= $row['bookStatus']; ?>
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
                                
                                 <div>
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
        function MM_openBrWindow(theURL,winName,features) { //v2.0
            window.open(theURL,winName,features);
        }
    </script>

    <script type="text/javascript">
    
        function printDiv(divName) {
            document.getElementById('userprofile').style.display = '';
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            document.getElementById('userprofile').style.display = 'none';
        }



    </script>
<?php include_once('layout/footer.php'); ?>