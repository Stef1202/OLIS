<?php include_once('layout/head.php'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
               Deactivated Accounts
                <small>view list of deactivated accounts</small>
            </h1>
           <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active">Deactivated Accounts </li>
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
                              
                                
                               <!--  <a href="users.php" data-target="#add" type="submit"
                               class="btn btn-info pull-right btn-m "><i class="fa fa-user"> </i>
                                Activated Accounts </a> -->
                                </div>
                        <!-- /.box-header -->
                     <!--   <h1 style="text-align: center"> List of Deactivated Accounts</h1> <br> -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Role</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Middle Name</th>
                                        <th>Suffix</th>
                                        <th>Email</th>
                                        <th>School</th>
                                        <th>Course / Departments</th>
                                        <th>Year Level</th>
                                        <th>ID Number / Username</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    $result = $db->prepare("SELECT * FROM tbl_users  WHERE status='Deactive' ORDER BY id DESC");
                                    $result->execute();
                                    for ($i = 1; $row = $result->fetch(); $i++) {
                                        $id = $row['id']; ?>

                                        <tr>
                                          <td> <?=$i; ?></td>
                                            <td> <?=$rol=$row['role']; ?></td>
                                            <td> <?=$row['fname']; ?></td>
                                            <td> <?=$row['lname']; ?></td>
                                            <td> <?=$row['mname']; ?></td>
                                            <td> <?=$row['suffix']; ?></td>
                                            <td> <?=$row['email']; ?></td>
                                            <td> <?=$row['school']; ?></td>
                                            <td> <?=$row['course']; ?></td>
                                            <td> <?=$row['yr_lvl']; ?></td> 
                                         
                                            <td> <?=$row['username']; ?></td>
                                            <td><?=$stat=($row['status']=='Deactive'? 'Deactivated' : $row['status']); ?>  </td>
                                            <td style="text-align:center;">
                                               
            
                                                   <a href="models/user.php?do=active&id=<?=$id;  ?>"  onclick="return  confirm('Are you sure you want to activate this user?')" data-toggle="modal" class="btn btn-primary" title="Activate"> <i class="fa fa-user" aria-hidden="true"></i></a> 
                                                   
                                                    

                                                                
                                                   
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
                    <h4 class="modal-title" id="exampleModalLabel">Add User</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="models/user.php?do=add" method="post">
                        <div class="box-body">
                            <div class="form-group"><label class="col-sm-2 control-label">School ID</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="userNo" id="userNo" onchange="showUsername();" placeholder="School ID"
                                           autofocus required></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Lastname</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="lastname" placeholder="Lastname"
                                           required></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Firstname</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="firstname" placeholder="Firstname"
                                           required></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Role</label>
                                <div class="col-sm-10">
                                    <select name="role" class="form-control" required>
                                        <option></option>
                                        <?php      $res = my_query("SELECT * FROM tbl_constants WHERE type='Role'");
                                        for($i=1; $r = $res->fetch(); $i++){  ?>
                                            <option ><?=$r['value'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email" placeholder="Email"
                                           required></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Course</label>
                                <div class="col-sm-10">
                                    <input type="course" class="form-control" name="course" placeholder="Course(if student)"
                                    ></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Contact</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="contact"
                                           placeholder="(ex. 09 502 *** ***)"  minlength="11" maxlength="11" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"  pattern="[0-9]+.{10,}" title="Must contain at least 11 digit"
                                           required></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Address</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="address"  placeholder="Address"
                                           required></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Username"
                                           required></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"
                                           title="Must contain at least one special characters, one number and one uppercase and lowercase letter, and at least 6 or more characters"
                                           class="form-control" name="password" placeholder="Password" required></div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary pull-right">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php $result =my_query("SELECT * FROM tbl_users ORDER BY id DESC");
 
for ($i = 0; $row = $result->fetch(); $i++) {
    $id = $row['id']; ?>
    <!-- /.Edit -->
    <div class="modal fade" id="editUser<?=$id; ?>"   role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Edit User</h4>
                </div>
                <div class="modal-body">
 
   <form class="form-horizontal" action="models/user.php?do=edit&id=<?=$id; ?>" method="post">
                        <div class="box-body"><input value="<?=$row['id']; ?>" type="hidden"
                                                     class="form-control" name="id">

                            <div class="form-group"><label class="col-sm-2 control-label">School ID</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="userNo" value="<?=$row['userNo']; ?>" placeholder="School ID"
                                           autofocus required></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Lastname</label>
                                <div class="col-sm-10">
                                    <input value="<?=$row['lname']; ?>" type="text" class="form-control"
                                           name="lastname" placeholder="Lastname"   required></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Firstname</label>
                                <div class="col-sm-10">
                                    <input value="<?=$row['fname']; ?>" type="text" class="form-control"
                                           name="firstname" placeholder="Firstname" required></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Role</label>
                                <div class="col-sm-10">
                                    <select name="role" class="form-control" required>
                                        <?php      $res = my_query("SELECT * FROM tbl_constants WHERE type='Role'");
                                        for($ix=1; $r = $res->fetch(); $ix++){  ?>
                                            <option <?=($row['role']==$r['value'] ? 'selected' : '');  ?> ><?=$r['value'];?></option>
                                        <?php } ?>
                                    </select></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email" value="<?=$row['email']; ?>" placeholder="Email"
                                           required></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Contact</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="contact" value="<?=$row['contact']; ?>"
                                           placeholder="(ex. 09 502 *** ***)"  minlength="11" maxlength="11" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"  pattern="[0-9]+.{10,}" title="Must contain at least 11 digit"
                                           required>

                                </div>
                                </div>
                                
                                 <div class="form-group">
                               <label class="col-sm-2 control-label">Address</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="address" value="<?=$row['address']; ?>" placeholder="Address"
                                               required></div>
                                 </div>
                                  <div class="form-group">
                               <label class="col-sm-2 control-label">Username</label>
                                    <div class="col-sm-10">
                                        <input value="<?=$row['username']; ?>" type="text" class="form-control"
                                               placeholder="Username" required readonly></div>
                            
</div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary pull-right">Save</button>
                            </div>
                        </div>
                    </form>
 
 
                </div> 
                </div>
            </div>
        </div> 
    
    
        <div class="modal fade" id="updatePasswordUser<?=$id; ?>"  role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Update Password</h4>
                </div>
                <div class="modal-body">

                    <form class="form-horizontal" action="models/user.php?do=changePassword&id=<?=$id; ?>"
                          method="post">
                        <div class="box-body"><input value="<?=$row['id']; ?>" type="hidden"
                                                     class="form-control" name="id">
                            <div class="form-group"><label class="col-sm-2 control-label">Username</label>
                                <div class="col-sm-10">
                                    <input value="<?=$row['username']; ?>" type="text" class="form-control"
                                           name="username" placeholder="Username" required readonly></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-10">
                                    <input pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"
                                           title="Must contain at least one special characters, one number and one uppercase and lowercase letter, and at least 6 or more characters"
                                           value="<?=$row['password']; ?>" type="password" class="form-control"
                                           name="password" placeholder="Password" required readonly></div>
                            </div>

                            <div class="form-group"><label class="col-sm-2 control-label">Type Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control"
                                           pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"
                                           title="Must contain at least one special characters, one number and one uppercase and lowercase letter, and at least 6 or more characters"
                                           name="cPassword" placeholder="Type Current Password" required></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">New Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control"
                                           pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"
                                           title="Must contain at least one special characters, one number and one uppercase and lowercase letter, and at least 6 or more characters"
                                           name="nPassword" placeholder="New Password" required></div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary pull-right">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

 
<?php } ?>
    <script type="text/javascript">
        function showUsername() {
         document.getElementById('username').value = document.getElementById("userNo").value;
         }
    </script>
<?php include_once('layout/footer.php'); ?>