<?php include_once('layout/head.php'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                CONSTANTS
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
                               class="btn btn-primary pull-right btn-m "><i class="fa fa-plus"> </i> Add </a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Type</th>
                                    <th>Value</th>
                                    <th>Sub Value</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                $result = $db->prepare("SELECT * FROM tbl_constants ORDER BY id DESC");
                                $result->execute();
                                for ($i = 1; $row = $result->fetch(); $i++) {
                                    $id = $row['id']; ?>
                                    <tr>
                                        <td> <?= $i; ?></td>
                                        <td> <?= $row['type']; ?></td>
                                        <td> <?= $row['value']; ?></td>
                                        <td> <?= $row['sub_value']; ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-danger dropdown-toggle"
                                                        data-toggle="dropdown" aria-expanded="true"><i
                                                            class="fa fa-fw fa-gear"> </i>
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#edit<?= $id; ?>" data-toggle="modal"><i
                                                                    class="fa fa-fw fa-pencil"> Edit</i></a></li>
                                                    <li><a href="models/do.php?do=deleteConstants&id=<?= $id; ?>"
                                                           onclick="return  confirm('Delete Constant? There is NO undo!')"><i
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

    <!-- /.Add -->
    <div class="modal fade" id="add" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Add</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="models/CRUDS.php" method="post">
                        <div class="box-body">

                            <div class="form-group"><label class="col-sm-2 control-label">Type</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="type" placeholder="Type"
                                           required></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Value</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="value" placeholder="Value"
                                           required></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Sub Value</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="sub_value" placeholder="Sub Value"  >
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary pull-right" name="func_param" value="IUConstants">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php $result = $db->prepare("SELECT * FROM tbl_constants ORDER BY id DESC");
$result->execute();
for ($i = 0; $row = $result->fetch(); $i++) {
    $id = $row['id']; ?>
    <!-- /.Edit -->
    <div class="modal fade" id="edit<?= $id; ?>" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Edit</h4>
                </div>

                <form class="form-horizontal" action="models/CRUDS.php"
                      method="post">
                    <div class="modal-body">


                        <div class="box-body">
                            <input value="<?= $row['id']; ?>" type="hidden"
                                   class="form-control" name="id">

                            <div class="form-group"><label class="col-sm-2 control-label">Type</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="type" value="<?= $row['type']; ?>" placeholder="type"
                                           required></div>
                            </div>

                            <div class="form-group"><label class="col-sm-2 control-label">Value</label>
                                <div class="col-sm-10">
                                    <input value="<?= $row['value']; ?>" type="text" class="form-control"
                                           name="value" placeholder="Value" required></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Sub Value</label>
                                <div class="col-sm-10">
                                    <input value="<?= $row['sub_value']; ?>" type="text" class="form-control"
                                           name="sub_value" placeholder="Sub Value"  ></div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary pull-right" name="func_param" value="IUConstants">
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


<?php } ?>

<?php include_once('layout/footer.php'); ?>