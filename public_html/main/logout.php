<?php include_once('layout/head.php'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Activity Logs
                <small>Log out</small>
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
                                    <div class="alert alert-<?=$classs ?> <?=$classs; ?>">
                                        <strong>Successfully <?=$r; ?>!</strong>
                                    </div>
                                <?php endif; ?></a>
                                <a href="ualt.php" data-target="#add" type="submit"
                               class="btn btn-info pull-right btn-m "><i class="fa fa-server"> </i>
                                Login Logs</a>
                            
                                <a data-toggle="modal" data-target="#add" type="submit"
                               class="btn btn-success pull-right btn-m " onclick="printDiv('printableArea')"><i class="fa fa-print"> </i> Print </a>


                           
                            <div align="center">
                                <form action="" method="GET">
                                    <input type="date" name="dtFrom" value="<?php if (isset($_GET['dtFrom'])) {
                                        echo $_GET['dtFrom'];
                                    } ?>">
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
                        <div class="box-body" id="printableArea">
                            <div class="table-responsive">
                               
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Username</th>
                                    <th>Action</th>
                                    <th>Date / Time</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                $result = $db->prepare("SELECT *,ua.id as uaid FROM tbl_users u INNER JOIN tbl_ualt ua ON u.id=ua.user_id WHERE action='Logged-out.'ORDER BY ua.id DESC");
                                $result->execute();
                                for ($i = 1; $row = $result->fetch(); $i++) {
                                    $id = $row['uaid']; ?>
                                    <tr>
                                        <td> <?=$i; ?></td>
                                        <td> <?=$row['lname'] . ' ' . $row['fname']; ?></td>
                                        <td> <?=$row['action']; ?></td>
                                        <td> <?=format_datetime($row['created_at']); ?></td>
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
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
    
<?php include_once('layout/footer.php'); ?>