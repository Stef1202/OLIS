
<!DOCTYPE html>
<html>
<head>


<link rel="stylesheet" href="css/bs/bootstrap.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">



</head>



<?php include_once('layout/head.php'); ?>
<body>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                List of Active Users
                <small>view active users</small>
            </h1>
           <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active"> List of Active Users</li>
                    </ol>
        </section>
        

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <!-- /.box-header -->
                    <div class="box box-primary"><br>
                        <!--  <h1 style="text-align:center"> List of Active Users</h1><br>  -->
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
                                    <div id='alert' class="alert alert-<?=$classs ?> <?=$classs; ?>">
                                        <strong>Successfully <?=$r; ?>!</strong>
                                    </div>
                                <?php endif; ?></a>
                                
                            <a data-toggle="modal" data-target="#add" type="submit"
                               class="btn btn-primary pull-right btn-m " ><i class="fa fa-user-plus"> </i>
                                Add New Account </a> 
                                <a class="btn  pull-right btn-m "></a>
                          <!--  <a href="deactivate.php" data-target="#add" type="submit"
                               class="btn btn-danger pull-right btn-m "><i class="fa fa-user-times"> </i>
                                Deactivated Accounts </a> -->
                        </div>
                        
                        <!--Query-->
                        <?php
                        $result = $db->prepare("SELECT * FROM tbl_users WHERE status='Active' ORDER BY id DESC");
                        $result->execute();
                        for ($i = 1; $row = $result->fetch(); $i++) {?> 
                                    <div class="usernumber" style="display:none"><?= $row['userNo'];?></div>
                                    
                        <?php } ?>
                        
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                      
                                    <tr>
                                        <th>#</th>
                                        <th>Access Level</th>
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
                                    $result = $db->prepare("SELECT * FROM tbl_users WHERE status='Active' ORDER BY id DESC");
                                    $result->execute();
                                    for ($i = 1; $row = $result->fetch(); $i++) {
                                        $id = $row['id']; 
                                        $rol=$row['role'];?>
                                        

                                        <tr>
                                            <td> <?=$i; ?></td>
                                            <td> <?= ($rol== 'Admin' ? 'System Administrator' : $rol); ?></td>
                                            <td> <?=$row['fname']; ?></td>
                                            <td> <?=$row['lname']; ?></td>
                                            <td> <?=$row['mname']; ?></td>
                                            <td> <?=$row['suffix']; ?></td>
                                            <td> <?=$row['email']; ?></td>
                                            <td> <?=$row['school']; ?></td>
                                            <td> <?=$row['course']; ?></td>
                                            <td> <?=$row['yr_lvl']; ?></td> 
                                         
                                            <td> <?=$row['username']; ?></td>
                                            <td><?=$stat=$row['status']; ?>  </td>
                                            <td>
                                                
                                                    <style>
                                                .horizontal-buttons {
                                                    display: flex;
                                                    
                                                }
                                                
                                                .horizontal-buttons > div {
                                                    margin-right: 10px; /* Adjust the margin as needed */
                                                }
                                            </style>
                                                
                                                   <div class="horizontal-buttons">      
                                                 <a href="#editUser<?= $id; ?>" data-toggle="modal" class="btn btn-primary" title="Edit User"><i class="fa fa-fw fa-pencil"></i></a>&nbsp;&nbsp;
                                                  <a style="cursor:pointer"onclick="changePassword(<?=$id; ?>)" data-toggle="modal" class="btn btn-warning" title="Change Password"><i class="fa fa-key" aria-hidden="true"></i></a>&nbsp;&nbsp;
                                                  
                                                    <?php
                                                                if($rol=='Admin'){
                                                                }else{?>
                                                   <a href="models/user.php?do=deactive&id=<?=$id; ?>"
                                                                           onclick="return  confirm('Are you sure you want to deactivate this user? ')" class="btn btn-danger" title="Deactivate"><i class="fa fa-user-times" aria-hidden="true"></i></a>
                                                   <?php }?>
                                                   </div>
                                              <!--  <div class="btn-group">
                                                    <button type="button" class="btn btn-danger dropdown-toggle"
                                                            data-toggle="dropdown" aria-expanded="true"><i
                                                            class="fa fa-fw fa-gear"> </i>
                                                        <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="#editUser<?=$id; ?>" data-toggle="modal"><i
                                                                    class="fa fa-fw fa-pencil"> Edit</i></a></li>
                                                                   
                                                       <li><a style="cursor:pointer"onclick="changePassword(<?=$id; ?>)"  data-toggle="modal"><i
                                                                    class="fa fa-fw fa-user"> Change Password</i></a>
                                                        </li> 

                                                        <li>
                                                            <?php


                                                            
                                                                if($rol=='Admin'){

                                                                }else{

                                            ?>
                                                                        <a href="models/user.php?do=deactive&id=<?=$id; ?>"
                                                                           onclick="return  confirm('Are you sure you want to deactivate this user? ')"><i
                                                                                class="fa fa-fw fa-user-times"> Deactive</i></a>
                                                                    

                                                                    <?php }?>
                                                        </li>
                                                    </ul>
                                                </div> -->
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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" ><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Add User</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="models/user.php?do=add" method="post" id="addUserForm">
                        <div class="box-body"> 
                            <div class="form-group"><label class="col-sm-3 ">ID Number<i style="color:red" >*</i> </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="userNo" id="userNo" onchange="UserNo()" placeholder="ID Number" minlength="6"  oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 15);"
           pattern="\d{6,}" title="Must contain at least 6 digits"
                                           autofocus required>
                                           <p style="color:grey; font-weight: 200; font-size: 1.3rem">Also the user's username</p>
                                           </div>
                            </div>
                            <div class="form-group"><label class="col-sm-3">First Name<i style="color:red" >*</i></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="firstname" placeholder="First Name"
                                    pattern="^(?=.*[a-z])(?=.*[A-Z])[a-zA-Z\s]+$" 
           title="Must contain 1 uppercase. Note: Please don't use special characters except for white space"
                                           required></div>
                            </div>
                            <div class="form-group"><label class="col-sm-3">Last Name<i style="color:red" >*</i></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="lastname" placeholder="Last Name"
                                    pattern="^(?=.*[a-z])(?=.*[A-Z])[a-zA-Z\s]+$" 
           title="Must contain 1 uppercase. Note: Please don't use special characters except for white space"
                                           required></div>
                            </div>
                               <div class="form-group"><label class="col-sm-3">Middle Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="mname" placeholder="Middle Name"
                                    pattern="^(?=.*[a-z])(?=.*[A-Z])[a-zA-Z\s]+$" 
           title="Must contain 1 uppercase. Note: Please don't use special characters except for white space"
                                           ></div>
                            </div>
                             <!--  <div class="form-group"><label class="col-sm-2 control-label">Suffix</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="suffix" placeholder="Jr., I, II, III"
                                           ></div>
                            </div> -->
                            <div class="form-group">
                                <label class="col-sm-3">Suffix</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="suffix" id="suffix" placeholder="Example: Jr., I, II, III"
                                    pattern="^(?:[A-Z][a-z]*|[A-Z]+)(?:\.)?$"
           title="Must start with an uppercase letter or be all caps. Only one special character (period) allowed at the end."
                                    >
                                    </div>
                                </div>
                           <!--  <div class="form-group">
                                    <label class="col-sm-3" >Suffix</label>
                                    <div class="col-sm-9">
                                    <select placeholder="Click to Select" name="suffix" id="suffix" class="form-control" >
                                     <option selected="selected" class="s" value"" > </option> 
                             
                        
                            <option ></option> 
                                         <?php      $res = my_query("SELECT * FROM tbl_constants WHERE type='Suffix'");
                                        for($i=1; $r = $res->fetch(); $i++){  ?>
                                            <option ><?=$r['value'];?></option>
                                        <?php } ?>
                            
                                        </select>
                                            </div>
                                       </div>  -->
                                       
                            <!-- <div class="form-group" style="display:none"><label class="col-sm-2 control-label" >School</label>-->
                            <!--    <div class="col-sm-10">-->
                            <!--        <input name="school" class="form-control" value="CCT" readonly />-->
                            <!--    </div>-->
                            <!--</div>-->
                     
                            
                            <div class="form-group">
    <label class="col-sm-3">Access Level<i style="color:red">*</i></label>
    <div class="col-sm-9">
        <select placeholder="Click to Select" name="role" id="role" class="form-control" onchange="SelectOption(); cconfirmSelection();" required>
            <option disabled selected value="">Select Access Level</option>
            <?php
            $res = my_query("SELECT * FROM tbl_constants WHERE type='Role'");
            for ($i = 1; $r = $res->fetch(); $i++) {
                ?>
                <option value="<?= $r['value']; ?>"><?= ($r['value'] == 'Admin' ? 'System Administrator' : $r['value']); ?></option>
            <?php } ?>
        </select>
    </div>
</div>
<script>
   
      function confirmSelection() {
        var selectedOption = document.getElementById("role").value;
        if (selectedOption !== "") {
            var role = document.getElementById("role").options[document.getElementById("role").selectedIndex].text;
            var confirmed = confirm("Are you sure you want to select Access Level: " + role + "?");
            if (!confirmed) {
                document.getElementById("role").selectedIndex = 0; // Reset to the default option
            }
        }
    }

   
</script>





                            <div class="form-group">
                                <label class="col-sm-3">Email<br>Address<i style="color:red" >*</i></br></label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                                    </div>
                                </div>
                                
                                                   <div class="form-group" id="yearLevelGroup" style="display: none;">
                            <label class="col-sm-3">Year Level<i style="color:red">*</i></br></label>
                            <div class="col-sm-9">
                                <input type="text" id='yr_lvl' class="form-control" name="yr_lvl" placeholder="Ex. 4TH YEAR"  pattern="(\d+[A-Z\s]+|[A-Z\s]+\d+)" title="Please enter all caps letters followed by a space and a number." >
                            </div>
                        </div>
                                 <div class="form-group" id="courseGroup" style="display: none;">
                                    <label class="col-sm-3" for="course">Course<i style="color:red">*</i></label>
                                    <div class="col-sm-9">
                                        <select name="course" id="course" class="form-control" onchange="cconfirmCourseSelection();">
                                            <option disabled selected value="">Click to Select Course </option>
                                            <?php
                                            $courses = [
                                                "BSCS",
                                                "BSIT",
                                                "BSBA-HRDM",
                                                "BSBA-MM",
                                                "BSBA-OFAD",
                                                "BSHM",
                                                "BSE-E",
                                                "BSE-F",
                                                "BSE-M",
                                                "BSE-SS",
                                                "BSTM"
                                            ];
                                
                                            $currentCourse = $row['course'];
                                
                                            foreach ($courses as $course) {
                                                $selected = ($currentCourse === $course) ? 'selected' : '';
                                                echo "<option value=\"$course\" $selected>$course</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
       

<script>
    function confirmCourseSelection() {
        var selectedCourse = document.getElementById("course").value;
        if (selectedCourse !== "") {
            var confirmed = confirm("Are you sure you want to select the course: " + selectedCourse + "?");
            if (!confirmed) {
                document.getElementById("course").selectedIndex = 0; // Reset to the default option
            }
        }
    }
</script>


                       <div class="form-group" name="departmentGroup" style="display: none;">
                                <label class="col-sm-3" for="course">Department<i style="color:red">*</i></label>
                                <div class="col-sm-9">
                                    <select name="course" id="department" class="form-control" onchange="cconfirmDep('department');" >
                                        <option disabled selected value="">Click to Select Department</option>
                                        <?php
                                        $departments = [
                                            "SBM",
                                            "SCS",
                                            "SHTM",
                                            "SED",
                                            "SAS"
                                        ];
                            
                                        $currentDepartment = $row['course'];
                                     
                                        foreach ($departments as $department) {
                                              $selected = ($currentDepartment === $department) ? 'selected' : '';
                                                echo "<option value=\"$department\" $selected>$department</option>";
                                            
                                            
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <script>
    function confirmDep(department) {
        var selectedElement = document.getElementsByName('department')[0];
        var selectedValue = selectedElement.value;
        
        if (selectedValue !== "") {
            var confirmed = confirm("Are you sure you want to select the " + department + ": " + selectedValue + "?");
            if (!confirmed) {
                selectedElement.selectedIndex = 0; // Reset to the default option
            }
        }
    }
</script>


                      <!--      <div id="ifadlibgue" style="display: none">
                                <div class="form-group">
                                    <div id="ifFaculty"><label class="col-sm-3" for="course" placeholder=" --Select--">Department<i style="color:red" >*</i></label></div>
                                    <div id="ifStudent"><label class="col-sm-3" for="course" placeholder=" --Select--">Course<i style="color:red" >*</i></label></div>
                                    <div class="col-sm-9">
                                    <select placeholder="Click to Select" name="course" id="selection" class="form-control">
                                       
                                        <option selected="selected" class="s">Select</option>
                                        <!--<option value="SBM"> SBM </option>-->
                                        <!--<option value="SCS"> SCS </option>-->
                                        <!--<option value="SHTM"> SHTM </option>-->
                                        <!--<option value="SED"> SED </option>-->
                                        <!--<option value="SAS"> SAS </option>-->
                                        <!--<option value="BSCS"> BSCS </option>-->
                                        <!--<option value="BSIT"> BSIT </option>-->
                                        <!--<option value="BSBA-HRDM"> BSBA-HRDM </option>-->
                                        <!--<option value="BSBA-MM"> BSBA-MM </option>-->
                                        <!--<option value="BSBA-OFAD"> BSBA-OFAD </option>-->
                                        <!--<option value="BSHM"> BSHM </option>-->
                                        <!--<option value="BSE-E"> BSE-E </option>-->
                                        <!--<option value="BSE-F"> BSE-F </option>-->
                                        <!--<option value="BSE-M"> BSE-M </option>-->
                                        <!--<option value="BSE-SS"> BSE-SS </option>-->
                                        <!--<option value="BSTM"> BSTM </option>
                                        </select>
                                     </div>
                                    </div>   
                                
                                
                                
                               
                                    <!--    <option selected="selected" class="s" value"">Select Course</option>  -->
                                        
                             
                               
                                    
                                  
                             <!--</div> -->
                         <!--        <div class="form-group">
                                    <label class="col-sm-2 control-label" >Year Level</label>
                                    <div class="col-sm-10">
                                    <select placeholder="Click to Select" name="yr_lvl" id="yr_lvl" class="form-control" >
                                     <option selected="selected" class="s" value"" > </option>   -->
                             
                           <!--  <option selected="selected" class="s" value"" > -- Select Course -- </option>  -->
                        <!--    <option ></option> 
                                         <?php      $res = my_query("SELECT * FROM tbl_constants WHERE type='Year Level'");
                                        for($i=1; $r = $res->fetch(); $i++){  ?>
                                            <option ><?=$r['value'];?></option>
                                        <?php } ?>
                            
                                        </select>
                                            </div>
                                       </div>  -->
                            
                            <div class="form-group blueblue"><label class="col-sm-3" >Mobile<br>Number<i style="color:red" >*</i></label>
                    
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <div class="input-group-append">
                                           <div class='input-group-text'>+63 </div>
                                            </div>
                                    <input type="text" class="form-control" name="contact"
                                           placeholder="(ex. 9502 *** ***)"  minlength="10" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"  pattern="[0-9]+.{9,}" title="Must contain at least 10 digit"
                                           required>
                                          
                                           
                                            </div>
                                           </div>
                                           
                            </div>
                            <div class="form-group"><label class="col-sm-3">Address<i style="color:red" >*</i></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="address"  placeholder="Address"
                                    pattern="^(?=.*[a-z])(?=.*[A-Z])[a-zA-Z\s.,]+$"
           title="Must contain uppercase in first letter. Note: Please don't use special characters except for period (.), comma (,) and white space"
                                           required></div>
                            </div>
                         <!--   <div class="form-group"><label class="col-sm-2 control-label">Username<i style="color:red" >*</i></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control readonly" name="username" id="username" placeholder="Username"
                                           required></div>
                                     
                            </div> -->
                            <div class="form-group"><label class="col-sm-3" >Password<i style="color:red" >*</i></label>
                    
                                <div class="col-sm-9 blueblue">
                                    <div class="input-group">
                                    <input id="passed" type="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&+~|{}:;<>/])[A-Za-z\d$@$!%*?&+~|{}:;<>/]{6,}"
                                           title="Must contain at least one special characters, one number and one uppercase and lowercase letter, and at least 6 or more characters"
                                           class="form-control" name="password" placeholder="Password" required>
                                           <!-- An element to toggle between password visibility -->
                                           <div class="input-group-prepend">
                                           <button id="show_passed" class="btn btn-info" type="button" style="padding:5px;">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                            </button>
                                            </div>
                                           
                                             </div>
                                            </div> 
                            </div>
                  
                        </div>

                        <div class="modal-footer">
                            <button  id="cancelBtn" type="button" class="btn btn-default" data-dismiss="modal" >Cancel</button>
                            <button  type="submit" class="btn btn-primary pull-right">Save</button>
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
    <div class="modal fade" id="editUser<?=$id; ?>"  role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Edit User</h4>
                </div>
                <div class="modal-body">
 
                <form id="editForms"class="form-horizontal" action="models/user.php?do=edit&id=<?=$id; ?>" method="post">
                        <div class="box-body"><input value="<?=$row['id']; ?>" type="hidden"
                                                     class="form-control" name="id">

                            <div class="form-group"><label class="col-sm-3">ID Number</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="userNo" value="<?=$row['userNo']; ?>" placeholder="ID Number" minlength="6"  oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 15);"
           pattern="\d{6,}" title="Must contain at least 6 digits"
                                           autofocus required>
                                           <p style="color:grey; font-weight: 200; font-size: 1.3rem">Also the user's username</p>
                                           </div>
                            </div>
                             <div class="form-group"><label class="col-sm-3">Firstname</label>
                                <div class="col-sm-9">
                                    <input value="<?=$row['fname']; ?>" type="text" class="form-control"
                                           name="firstname" placeholder="Firstname"
                                            pattern="^(?=.*[a-z])(?=.*[A-Z])[a-zA-Z\s]+$" 
           title="Must contain 1 uppercase. Note: Please don't use special characters except for white space"required></div>
                            </div>
                            <div class="form-group"><label class="col-sm-3">Lastname</label>
                                <div class="col-sm-9">
                                    <input value="<?=$row['lname']; ?>" type="text" class="form-control"
                                           name="lastname" placeholder="Lastname"  
                                           pattern="^(?=.*[a-z])(?=.*[A-Z])[a-zA-Z\s]+$" 
           title="Must contain 1 uppercase. Note: Please don't use special characters except for white space"required></div>
                            </div>
                            <div class="form-group"><label class="col-sm-3">Middle Name</label>
                                <div class="col-sm-9">
                                    <input type="text" value="<?=$row['mname']; ?>" class="form-control" name="mname" placeholder="Middle Name"
                                    pattern="^(?=.*[a-z])(?=.*[A-Z])[a-zA-Z\s]+$" 
           title="Must contain 1 uppercase. Note: Please don't use special characters except for white space"
                                          
                                           ></div>
                            </div>
                             
                                    <div class="form-group">
                                <label class="col-sm-3">Suffix</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="suffix" id="suffix" value="<?=$row['suffix']; ?>" placeholder="Example: Jr., I, II, III"
                                    pattern="^(?:[A-Z][a-z]*|[A-Z]+)(?:\.)?$"
           title="Must start with an uppercase letter or be all caps. Only one special character (period) allowed at the end."
                                    >
                                    </div>
                                </div>
                                       
                                       
                             <?php if ($row['role'] == 'Guest'){ ?>
                           <div class="form-group" ><label class="col-sm-3" >School</label>
                            <div class="col-sm-9">
                                   <input type="text" name="school" class="form-control" value="<?=$row['school']; ?>"
                                   pattern="^[A-Z\s.]+$"
            title="Must be in all caps and may include white space. Note: Please don't use special characters except for white space" required>
                          </div>
                            </div>
                               <?php } else{ ?>
                                <div class="form-group" style="display:none"><label class="col-sm-3" >School</label>
                            <div class="col-sm-9">
                                   <input name="school" class="form-control" value="CCT"/>
                          </div>
                            </div>
                                 <?php }?>
                            <?php if ($row['role'] == 'Guest'){ ?>
                            <div class="form-group" style="display:none"><label class="col-sm-3">Access Level</label>
                                <div class="col-sm-9">
                                    <select name="role" class="form-control" required>
                                        <?php      $res = my_query("SELECT * FROM tbl_constants WHERE type='Role'");
                                        for($ix=1; $r = $res->fetch(); $ix++){  ?>
                                            <option <?=($row['role']==$r['value'] ? 'selected' : '');  ?> ><?=$r['value'];?></option>
                                        <?php } ?>
                                    </select></div>
                            </div>
                            <?php } else{ ?>
                            <div class="form-group" ><label class="col-sm-3">Access Level<i style="color:red" >*</i></label>
                                <div class="col-sm-9">
                                    <select name="role" class="form-control" disabled required>
                                        <?php      $res = my_query("SELECT * FROM tbl_constants WHERE type='Role'");
                                        for($ix=1; $r = $res->fetch(); $ix++){  ?>
                                            <option <?=($row['role']==$r['value'] ? 'selected' : '');  ?> ><?=($r['value']=='Admin'?'System Administrator' : $r['value']);?></option>
                                        <?php } ?>
                                    </select></div>
                            </div>
                            
                             <?php }?>
                             
                            <div class="form-group"><label class="col-sm-3">Email Address</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" name="email" value="<?=$row['email']; ?>" placeholder="Email"
                                     pattern="^[a-zA-Z0-9]+(?:\.[a-zA-Z0-9]+)*@[a-zA-Z0-9]+(?:\.[a-zA-Z0-9]+)*$"
                                    
                                    title="Please enter a valid email address (e.g., example@example.com)"
                                           required></div>
                            </div>
                           
                                <?php if ($row['role'] == 'Student'){ ?>
                                 <div class="form-group">
                                <label class="col-sm-3">Year Level<i style="color:red" >*</i></br></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="yr_lvl" value="<?=$row['yr_lvl']; ?>" placeholder="Ex. 4TH YEAR"  pattern="(\d+[A-Z\s]+|[A-Z\s]+\d+)" title="Please enter all caps letters followed by a space and a number." required>
                                    </div>
                                </div>
                            <?php } ?>
                             <?php if ($row['role'] == 'Guest'){ ?>
                                 <div class="form-group">
                                <label class="col-sm-3">Year Level<i style="color:red" >*</i></br></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="yr_lvl" value="<?=$row['yr_lvl']; ?>" 
                                    placeholder="Example: Grade 12 if SHS and 4th Year if College"
                                   pattern="(\d+[A-Z\s]+|[A-Z\s]+\d+)" title="Please enter all caps letters followed by a space and a number."required>
                                    </div>
                                </div>
                            <?php } ?>
                            
                            <?php if ($row['role'] == 'Faculty'){ ?>
                            <div class="form-group">
                                                <label class="col-sm-3" for="course" placeholder="Click to Select Depart">Department<i style="color:red" >*</i></label>
                                                <div class="col-sm-9">
                                                    <select name="course" id="dep<?=$id?>" class="form-control" onchange="cconfirmDepSelection(<?=$id?>);">
                                                        <?php
                                                        $departments = [
                                                            "SBM",
                                                            "SCS",
                                                            "SHTM",
                                                            "SED",
                                                            "SAS"
                                                        ];
                                            
                                                        $currentDepartment = $row['course'];
                                                        $selected = ($currentDepartment != '') ? 'selected' : '';
                                            
                                                        echo "<option value=\"$currentDepartment\" $selected>$currentDepartment</option>";
                                            
                                                        foreach ($departments as $department) {
                                                            if ($department != $currentDepartment) {
                                                                echo "<option value=\"$department\">$department</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                                                          <script>
    function confirmDepSelection(divid) {
        var selectedDep = document.getElementById("dep"+divid).value;
        if (selectedDep !== "") {
            var confirmed = confirm("Are you sure you want to select the Department: " + selectedDep + "?");
            if (!confirmed) {
                document.getElementById("dep"+divid).selectedIndex = 0; // Reset to the default option
            }
        }
    }
</script>
             

                            <?php } ?>
                            
                            <?php if ($row['role'] == 'Student'){ ?>
                            <div class="form-group">
                                            <label class="col-sm-3" for="course" placeholder="Click to Select Course-">Course <i style="color:red" >*</i></label>
                                            <div class="col-sm-9">
                                                <select name="course" id="course<?=$id?>" class="form-control"
                                                onchange="cconfirmCourseSelection1(<?=$id?>);">
                                                    <?php
                                                    $courses1 = [
                                                        "BSCS",
                                                        "BSIT",
                                                        "BSBA-HRDM",
                                                        "BSBA-MM",
                                                        "BSBA-OFAD",
                                                        "BSHM",
                                                        "BSE-E",
                                                        "BSE-F",
                                                        "BSE-M",
                                                        "BSE-SS",
                                                        "BSTM"
                                                    ];
                                        
                                                    $currentCourse1 = $row['course'];
                                                    $selected1 = ($currentCourse1 != '') ? 'selected' : '';
                                        
                                                    echo "<option value=\"$currentCourse1\" $selected1>$currentCourse1</option>";
                                        
                                                    foreach ($courses1 as $course) {
                                                        if ($course != $currentCourse1) {
                                                            echo "<option value=\"$course\">$course</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <script>
    function confirmCourseSelection1(divid) {
        var selectedCourse1 = document.getElementById("course"+divid).value;
        if (selectedCourse1 !== "") {
            var confirmed = confirm("Are you sure you want to select the course: " + selectedCourse1 + "?");
            if (!confirmed) {
                document.getElementById("course"+divid).selectedIndex = 0; // Reset to the default option
            }
        }
    }
</script>
                        
                                       
                                  
                            <?php } ?>
                             <?php if ($row['role'] == 'Guest'){ ?>
                         <div class="form-group">
                               <label class="col-sm-3">Course<i style="color:red" >*</i></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="course" value="<?=$row['course']; ?>" placeholder="Course"
                                        pattern="^[A-Z\s]+$"
            title="Must be in all caps and may include white space. Note: Please don't use special characters except for white space"
                                               required></div>
                                 </div>
                            <?php } ?>
                            
                   
                            
                            <?php   $cont = $row['contact'];
                                    $mobilecontact = trim($cont, '+63');
                            ?>
                            
                            <div class="form-group blueblue"><label class="col-sm-3" >Mobile<br>Number<i style="color:red" >*</i></label>
                    
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <div class="input-group-append">
                                           <div class='input-group-text'>+63 </div>
                                            </div>
                                    <input type="text" class="form-control" name="contact"
                                           placeholder="(ex. 9502 *** ***)"  minlength="10" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"  value="<?php echo $mobilecontact ?>" pattern="[0-9]+.{9,}" title="Must contain at least 10 digit"
                                           required>
                                          
                                           
                                            </div>
                                           </div>
                                           
                            </div>
                                
                                 <div class="form-group">
                               <label class="col-sm-3">Address</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="address" value="<?=$row['address']; ?>" placeholder="Address"
                                               required></div>
                                 </div>
                                  <div class="form-group" style="display:none">
                               <label class="col-sm-3">Username</label>
                                    <div class="col-sm-9">
                                        <input value="<?=$row['username']; ?>" type="text" class="form-control" id ="usernamee"
                                               placeholder="Username" required readonly></div>
                            
</div>
                            </div>
                            <div class="modal-footer">
                                <button  id="editcancelBtn" type="button" class="btn btn-default" data-dismiss="modal" >Cancel</button>
                                <button type="submit" class="btn btn-primary pull-right">Save</button>
                            </div>
                        </div>
                    </form>
 
 
                </div> 
                </div>
            </div>
        </div>
        <?php } ?>
<div id="passm"></div>
    
<!-- auto clear modal add -->    
<script>
    // Get the modal element
var modal = document.getElementById("add");

// Get the cancel button element
var cancelBtn = document.getElementById("cancelBtn");

// Reset form fields when cancel button is clicked
cancelBtn.addEventListener("click", function() {
  var form = document.getElementById("addUserForm");
  form.reset();
});

// Close the modal when cancel button is clicked
cancelBtn.addEventListener("click", function() {
  modal.style.display = "none";
});

</script>

<!-- edit not saving the recent data when cancel-->
<script>
    // Get the edit modal element
var editModal = document.getElementById("editUser<?=$id; ?>");

// Get the cancel button element
var cancelBtn = document.getElementById("editcancelBtn");

// Get the form element
var editForm = document.getElementById("editForms");

// Store the initial form values
var initialFormValues = {};
var formElements = editForm.elements;
for (var i = 0; i < formElements.length; i++) {
  initialFormValues[formElements[i].name] = formElements[i].value;
}

// Reset form fields to initial values when cancel button is clicked
cancelBtn.addEventListener("click", function() {
  for (var i = 0; i < formElements.length; i++) {
    formElements[i].value = initialFormValues[formElements[i].name];
  }
});

// Close the edit modal when cancel button is clicked
cancelBtn.addEventListener("click", function() {
  editModal.style.display = "none";
});

    
    
</script>



  
<script>
    
    $('#show_passed').on("mousedown", function functionName() {
    //Change the attribute to text
    $('#passed').attr('type', 'text');
    $('.glyphicon').removeClass('glyphicon-eye-open').addClass('glyphicon-eye-close');
}).on("mouseup", function () {
    //Change the attribute back to password
    $('#passed').attr('type', 'password');
    $('.glyphicon').removeClass('glyphicon-eye-close').addClass('glyphicon-eye-open');
}
);

var isIE = /*@cc_on!@*/false || !!document.documentMode;
var isEdge = !isIE && !!window.StyleMedia;
var showButton = !(isIE || isEdge)
if (!showButton) {
    document.getElementById("show_passed").style.visibility = "hidden";
}

</script>

 

 <script>
    function changePassword(name){
    console.log(name);
    $.ajax({    
            type: "POST",
            url: "models/ajax/changep.php",             
            dataType: "html", 
            data: {
                user_id: name
            },                 
            success: function(data){               
                $("#passm").html(data);
                $('#updatePassword').modal();


                
                    $('#show_p').on("mousedown", function functionName() {
                        //Change the attribute to text
                        $('#passo').attr('type', 'text');
                        $('#show_p').on("mouseup", function () {
                        //Change the attribute back to password
                            $('#passo').attr('type', 'password');
                            }
                        );
                    });

                    $('#show_ps').on("mousedown", function functionName() {
                    //Change the attribute to text
                        $('#passos').attr('type', 'text');
                            $('#show_ps').on("mouseup", function () {
                            //Change the attribute back to password
                            $('#passos').attr('type', 'password');
                            }
                        );
                    });



                    $('#show_pusa').on("mousedown", function functionName() {
                        console.log('pinindot ko bat ayaw');
                    //Change the attribute to text
                        $('#pusa').attr('type', 'text');
                        $('#show_pusa').on("mouseup", function () {
                            //Change the attribute back to password
                            $('#pusa').attr('type', 'password');
                                    }   
                            );
                            }
                        );
                    }
            
        });
}


</script>
<script>
   


        $(".readonly").on('keydown paste focus mousedown', function(e){
            if(e.keyCode != 9) // ignore tab
                e.preventDefault();
        });
 
        function showUsername() {
         document.getElementById('username').value = document.getElementById("userNo").value;
         }


        function ifUserExist(){
        var txt, i, a;
    
        //user number div
        var userNumber =document.getElementsByClassName('usernumber');
        console.log(userNumber);
    
        //input field
        var userNo =document.getElementById('userNo');
    
        //convert input to string
        var input = userNo.value.toString();
        console.log(input)
    
    
        for(i = 0; i < userNumber.length;i++){

        let a = userNumber[i].textContent.toString();
        
        //condition
        console.log(a,input);
        console.log(input);
        console.log(a == input);
        if(a == input){
            
            userNo.setCustomValidity('User Exists');
            userNo.reportValidity();
            event.preventDefault();
            break;
        } 
            userNo.setCustomValidity('');
       
    }

}
    
    function UserNo(){
        console.log('pinindot mo naman');
        showUsername();
        ifUserExist();
    }
    
    
function SelectOption1() {
  let role = document.getElementById('role').value;
  var select = document.getElementById("course");
  var selection = document.getElementById('selection');
  const BSBA_OFAD = document.createElement("option");
  const BSHM = document.createElement("option");
  const BSE_F = document.createElement("option");
  const BSE_E = document.createElement("option");
  const BSE_M = document.createElement("option");
  const BSTM = document.createElement("option");
  const BSE_SS = document.createElement("option");
  const BSBA_MM = document.createElement("option");
  const BSBA_HRDM = document.createElement("option");
  const BSIT = document.createElement("option");
  const BSCS = document.createElement("option");
  const SAS = document.createElement("option");
  const SED = document.createElement("option");
  const SHTM = document.createElement("option");
  const SCS = document.createElement("option");
  const SBM = document.createElement("option");

  BSBA_OFAD.value = 'BSBA-OFAD';
  BSHM.value = 'BSHM';
  BSE_F.value = 'BSE-F';
  BSE_E.value = 'BSE-E';
  BSE_M.value = 'BSE-M';
  BSTM.value = 'BSTM';
  BSE_SS.value = 'BSE-SS';
  BSBA_MM.value = 'BSBA-HRDM';
  BSBA_HRDM.value = 'BSIT';
  BSIT.value = 'BSIT';
  BSCS.value = 'BSCS';
  SAS.value = 'SAS';
  SED.value = 'SED';
  SHTM.value = 'SHTM';
  SCS.value = 'SCS';
  SBM.value = 'SBM';

  BSBA_OFAD.text = 'BSBA-OFAD';
  BSHM.text = 'BSHM';
  BSE_F.text = 'BSE-F';
  BSE_E.text = 'BSE-E';
  BSE_M.text = 'BSE-M';
  BSTM.text = 'BSTM';
  BSE_SS.text = 'BSE-SS';
  BSBA_MM.text = 'BSBA-MM';
  BSBA_HRDM.text = 'BSBA_HRDM';
  BSIT.text = 'BSIT';
  BSCS.text = 'BSCS';
  SAS.text = 'SAS';
  SED.text = 'SED';
  SHTM.text = 'SHTM';
  SCS.text = 'SCS';
  SBM.text = 'SBM';

  if (role == 'Librarian' || role == 'Admin' || role == 'Guest') {
    document.getElementById('ifadlibgue').style.display = 'none';
  } else {
    document.getElementById('ifadlibgue').style.display = 'block';
    if (role == 'Faculty') {
      document.getElementById('ifFaculty').style.display = 'block';
      document.getElementById('ifStudent').style.display = 'none';
      $("#selection option[value='BSCS']").remove();
      $("#selection option[value='BSIT']").remove();
      $("#selection option[value='BSBA-HRDM']").remove();
      $("#selection option[value='BSBA-MM']").remove();
      $("#selection option[value='BSE-SS']").remove();
      $("#selection option[value='BSTM']").remove();
      $("#selection option[value='BSE-M']").remove();
      $("#selection option[value='BSE-E']").remove();
      $("#selection option[value='BSE-F']").remove();
      $("#selection option[value='BSHM']").remove();
      $("#selection option[value='BSBA-OFAD']").remove();
      selection.add(SAS, null);
      selection.add(SED, null);
      selection.add(SHTM, null);
      selection.add(SCS, null);
      selection.add(SBM, null);
    } else {
      document.getElementById('ifFaculty').style.display = 'none';
      document.getElementById('ifStudent').style.display = 'block';
      $("#selection option[value='SAS']").remove();
      $("#selection option[value='SED']").remove();
      $("#selection option[value='SHTM']").remove();
      $("#selection option[value='SCS']").remove();
      $("#selection option[value='SBM']").remove();
      selection.add(BSBA_OFAD, null);
      selection.add(BSHM, null);
      selection.add(BSE_F, null);
      selection.add(BSE_E, null);
      selection.add(BSE_M, null);
      selection.add(BSTM, null);
      selection.add(BSE_SS, null);
      selection.add(BSBA_MM, null);
      selection.add(BSBA_HRDM, null);
      selection.add(BSIT, null);
      selection.add(BSCS, null);
    }
  }
}

    
    window.history.replaceState({}, document.title, "/public_html/main/" + "users.php");
    </script>
    
    <!--yr lvl -->
<script>
    function SelectOption() {
        var roleSelect = document.getElementById("role");
        var yearLevelInput = document.getElementsByName("yr_lvl")[0];
        var yearLevelGroup = document.getElementById("yearLevelGroup");
        var departmentGroup = document.getElementsByName("departmentGroup")[0];
        var courseGroup = document.getElementById("courseGroup");
         var courseInput = document.getElementById("course");
          var depInput = document.getElementsByName("department")[0];

        if (roleSelect.value === "Student") {
            yearLevelInput.required = true;
            document.getElementById("department").value = '';
            document.getElementById("department").removeAttribute("required");
            document.getElementById("course").setAttribute("required", "");
            document.getElementById("yr_lvl").setAttribute("required", "");
            yearLevelGroup.style.display = "block";
            departmentGroup.style.display = "none";
            courseGroup.style.display = "block";
            courseInput.required = true;
            courseInput.disabled = false;
        } else if (roleSelect.value === "Faculty") {
            document.getElementById("yr_lvl").value = '';
            document.getElementById("course").value = '';
            document.getElementById("department").setAttribute("required", "");
            document.getElementById("course").removeAttribute("required");
            document.getElementById("yr_lvl").removeAttribute("required");
            yearLevelInput.required = false;
            yearLevelGroup.style.display = "none";
            departmentGroup.style.display = "block";
            courseGroup.style.display = "none";
            depInput.required = true;
            depInput.disabled = false;
        } else {
            document.getElementById("yr_lvl").removeAttribute("required");
            document.getElementById("course").removeAttribute("required");
            document.getElementById("department").removeAttribute("required");
            document.getElementById("department").value = '';
            document.getElementById("yr_lvl").value = '';
            document.getElementById("course").value = '';
            yearLevelInput.required = false;
            yearLevelGroup.style.display = "none";
            departmentGroup.style.display = "none";
            courseGroup.style.display = "none";
        }
    }
</script>


</body>
</html>
<?php include_once('layout/footer.php'); ?>