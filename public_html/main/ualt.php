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
                User Logs
                <small>view activity logs</small>
            </h1>
             
           <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active">User Logs</li>
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
                                <?php endif; ?></a>  <br>
                <!--<h1 style="text-align:center"> User Logs</h1><br>  -->
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
                                 
          
                        </div>
                        
                        <!-- /.box-header -->
                        <div class="box-body" id="printableArea">
                            <div class="table-responsive">
                               <!-- inalis ko sa table id="example1" -->
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                              
                                <tr>
                                    <th>#</th>
                                     <th>ID Number</th>
                                    <th>Name</th>
                                    <th>Role</th>
                                    <th>School</th>
                                    <th>Course / Department</th>
                                    <th>Year Level</th>
                                    <!--<th>Action</th>-->
                                    <th>Logged-in</th>
                                    <th>Logged-out</th>
                                    <!--<th>Date / Time</th>-->
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                $result = $db->prepare("SELECT *,
                                      
                                                        u.id as uaid 
                                                        FROM tbl_users u 
                                                        INNER JOIN tbl_ualt ua ON u.id = ua.user_id 
                                                        
                                                        ORDER BY ua.id DESC");
                                $result->execute();
                                for ($i = 1; $row = $result->fetch(); $i++) {
                                    $id = $row['uaid']; ?>
                                    <tr>
                                        <td> <?=$i; ?></td>
                                        <td> <?=$row['userNo']; ?></td>
                                        <td> <?=$row['lname'] . ' ' . $row['fname']. ' ' . $row['suffix']; ?></td>
                                        <td> <?=$row['role']; ?></td>
                                        <td> <?=$row['school']; ?></td>
                                        <td> <?=$row['course']; ?></td>
                                        <td> <?=$row['yr_lvl']; ?></td>
                                        <td> <?=format_datetime($row['created_at']); ?></td>
                                        <td> <?=format_datetime($row['logout']); ?></td>
                                       
                                  
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
    
<?php include_once('layout/footer.php'); ?>
</html>