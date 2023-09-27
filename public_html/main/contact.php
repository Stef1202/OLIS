<?php include_once('layout/head.php'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Contact
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
                                    <div class="alert alert-<?php echo $classs ?> <?php echo $classs; ?>">
                                        <strong>Successfully <?php echo $r; ?>!</strong>
                                    </div>
                                <?php endif; ?></a>
<!--                            <a data-toggle="modal" data-target="#add" type="submit"-->
<!--                               class="btn btn-primary pull-right btn-m "><i class="fa fa-plus"> </i> Add </a>-->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>Message</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                $result = $db->prepare("SELECT * FROM tbl_contact_us  ORDER BY id DESC");
                                $result->execute();
                                for ($i = 1; $row = $result->fetch(); $i++) {
                                    $id = $row['id']; ?>
                                    <tr>
                                        <td> <?=$i; ?></td>
                                        <td> <?=$row['name']; ?></td>
                                        <td> <?= $row['email']; ?></td>
                                        <td> <?= $row['contact']; ?></td>
                                        <td> <?=$row['message']; ?></td>
                                        <td> <?=format_datetime($row['created_at']); ?></td>

                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-danger dropdown-toggle"
                                                        data-toggle="dropdown" aria-expanded="true"><i
                                                            class="fa fa-fw fa-gear"> </i>
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="models/do.php?do=delete&id=<?php echo $id; ?>"
                                                           onclick="return  confirm('Delete contact? There is NO undo!')"><i
                                                                    class="fa fa-fw fa-trash"> Delete</i></a></li>
                                                </ul>
                                            </div>
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


<?php include_once('layout/footer.php'); ?>