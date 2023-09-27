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
                        <div class="ems"align="center">
                                 <form action="" method="GET" onsubmit="return validateDate()">
                                    <label for="dtFrom">Date From: </label>
                                    <input type="date" name="dtFrom" value="<?php if (isset($_GET['created_at'])) {
                                        echo $_POST['dtFrom'];
                                    } ?>">
                                    <label for="dtTo">&emsp;Date To: </label>
                                    <input type="date" name="dtTo" value="<?php if (isset($_GET['created_at'])) {
                                        echo $_POST['dtTo'];
                                    } ?>">
                                    <!--<input type="hidden" name="t" value="<?=$t;?>">-->
                                    <input type="submit" value="Search">
<!--                                    <input type="submit" value="Print" onclick="printDiv('printableArea')">-->
                                </form> 
                            </div>
                            <script>
    function validateDate() {
        var dtFrom = new Date(document.getElementById("dtFrom").value);
        var dtTo = new Date(document.getElementById("dtTo").value);

        // Check if the date from is earlier than the date to
        if (dtFrom > dtTo) {
            alert("Invalid date selection. The 'Date From' cannot be later than the 'Date To'.");
            return false; // Prevent form submission
        }

        return true; // Allow form submission
    }
</script>

                        <!-- /.box-header -->
                        <div class="box-body"  >
                            <div class="table-responsive">
                              
                            <table id="" class="table table-bordered table-striped" width="100%" ><!--Please css gumana kanaa huhu. Yung bootstrap na border-dark di nagana whyyy
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
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Accession Number</th>
                                    <th>Title</th>
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
                                            $date="  WHERE  b.dbook BETWEEN '$dtfrom' AND '$dtto' ";
                                        }else{
                                            $date='';
                                        }

                                
                                $result = $db->prepare("SELECT *,bt.id FROM tbl_books b INNER JOIN tbl_booktransactions bt ON b.id=bt.book_id 
                                INNER JOIN tbl_users u ON u.id=bt.user_id  WHERE user_id='$user_id' ORDER BY bt.id DESC");
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