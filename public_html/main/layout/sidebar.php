
<style>
    a, span, i{
        font-size: 1.2rem;
    }
    img{
                        border-radius: 50%;
                    }
</style>

<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                                <?php
$uid = $_SESSION['user_id'];
$result = my_query("SELECT * FROM tbl_users WHERE id='$uid'");

while ($row = $result->fetch()) {
?>
                            
                            <img src="image/<?php echo $row['pic']?>" class="user-image" alt="User Image"><?php }?>
                </div>
                <div class="pull-left info"><br>
                    <p style="color:white; text-align: center;"> Hello,  <?php echo $_SESSION['fullname']; ?> </p> <br>
                   <?php 
                    if ($_SESSION['role'] == 'Admin'){
                        echo 'System Administrator';
                    }
                    else{
                    echo $_SESSION['role'];}
                    ?>
                    
                </div>
            </div>
         
            <hr/>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->

            <ul class="sidebar-menu">
                 
                <?php if ($_SESSION['role'] == 'Admin') { ?>
                <li class=""><a href="index.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

                 <!--   <li> -->
                       <!-- <a href="users.php"> -->
                        <!--    <i class="fa fa-users"></i> <span>Account Management</span> -->
                      <!--  </a> -->
                <!--    </li> -->
                    
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-users"></i>
                            <span>Account Management</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="users.php" style='font-size: 1.2rem'><i class="fa fa-angle-down"></i><span>&nbsp;&nbsp;&nbsp;List of Accounts</span></a>
                            </li>
                           

                              <li><a href="deactivate.php" data-target="#add" type="submit" style='font-size: 1.2rem'><i class="fa fa-angle-down"></i><span>&nbsp;&nbsp;&nbsp;Deactivated Accounts</span></a>
                            </li>
                        
                           
                        </ul>
                        
                    </li>
                    
            
                    <!--    <li class="treeview">-->
                    <!--    <a href="#">-->
                    <!--        <i class="fa fa-book"></i>-->
                    <!--        <span>Books</span>-->
                    <!--        <i class="fa fa-angle-left pull-right"></i>-->
                    <!--    </a>-->
                    <!--    <ul class="treeview-menu">-->
                    <!--        <li><a href="books.php"><i class="fa fa-angle-double-right"></i>List of Books</a>-->
                    <!--        </li>-->
                    <!--        <li><a href="books.php?t=Archived"><i class="fa fa-angle-double-right"></i>Archived Books</a>-->
                    <!--        </li>-->
                    <!--        <li><a href="des.php"><i class="fa fa-angle-double-right"></i>View Catalogue</a>-->
                    <!--        </li>-->
                    <!--                         </ul>-->
                        
                    <!--</li>-->

                    <!--<li class="treeview">-->
                    <!--    <a href="#">-->
                    <!--        <i class="fa fa-archive"></i>-->
                    <!--        <span>Borrowing and Returning</span>-->
                    <!--        <i class="fa fa-angle-left pull-right"></i>-->
                    <!--    </a>-->
                    <!--    <ul class="treeview-menu">-->
                    <!--        <li><a href="transactions.php?t=Borrowed"><i class="fa fa-angle-double-right"></i>  Borrowing of Book</a>-->
                    <!--        </li>-->
                    <!--        <li><a href="transactions.php?t=Returned"><i class="fa fa-angle-double-right"></i>   Returning of Book</a>-->
                    <!--        </li>-->
                            <!--                        <li><a href="history.php"><i class="fa fa-angle-double-right"></i> Transaction History</a></li>-->
                    <!--    </ul>-->
                    <!--</li>-->
                  <!--  <li><a href="ualt.php"><i class="fa fa-adjust "></i> <span>User Logs</span></a></li> -->
            <!-- <li class="treeview">
                      <a href="#">
                         <i class="fa fa-cogs"></i>
                        <span>Settings</span>                      <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                       </span>
                    </a>
                       <ul class="treeview-menu">
                         <li><a href="contact.php"><i class="fa  fa-circle-o"></i> <span>Contact Us</span></a></li> 
                        <li><a href="constants.php"><i class="fa fa-circle-o"></i> <span>Constants</span></a></li>
                    </ul>
                 </li>  -->
      <!--<li class="treeview">-->
      <!--              <a href="#">-->
      <!--                  <i class="fa fa-print"></i>-->
      <!--                  <span>Reports</span>-->
      <!--                  <span class="pull-right-container">-->
      <!--                    <i class="fa fa-angle-left pull-right"></i>-->
      <!--                  </span>-->
      <!--              </a>-->
      <!--              <ul class="treeview-menu">-->
      <!--                  <li><a href="print.php?t=Books"><i class="fa  fa-circle-o"></i> <span>Book Report</span></a></li>-->
      <!--                  <li><a href="print.php?t=History"><i class="fa fa-circle-o"></i> <span> History Report</span></a></li>-->
      <!--                   <li><a href="ualt.php"><i class="fa fa-angle-double-right"></i>User Logs</a>-->
      <!--                      </li>-->
      <!--              </ul>-->
      <!--          </li>-->
                <!--    backup        -->
                     <li class="treeview">
                    <a href="#">
                  <i class="fa fa-download" aria-hidden="true"></i>
                        <span>Database</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="bback.php"><i class="fa fa-angle-down"></i><span>&nbsp;&nbsp;&nbsp;Download Database</span></a></li>
                        <li><a href="upload_users.php"><i class="fa fa-angle-down"></i><span>&nbsp;&nbsp;&nbsp;Upload Students DBS</span></a></li>
                        <li><a href="upload_faculty.php"><i class="fa fa-angle-down"></i><span>&nbsp;&nbsp;&nbsp;Upload Faculty Member DBS</span></a></li>
           
                    </ul>
                </li> 
                <?php } ?>

                <!--            <li><a href="reports.php"><i class="fa fa-print"></i> <span>Report </span></a></li>-->

                <?php if ($_SESSION['role'] == 'Librarian') { ?>
                <li class=""><a href="index.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                 <!--   <li>
                        <a href="books.php">
                            <i class="fa fa-book"></i> <span>Book List</span>
                        </a>
                    </li> -->
                <li class="treeview">
                     <a href="#">
                       <i class="fa fa-book"></i>
                <span>Books</span>
                     <i class="fa fa-angle-left pull-right"></i>
                      </a>
                 <ul class="treeview-menu">
               <li><a href="books.php"><i class="fa fa-angle-down" aria-hidden="true"></i><span>&nbsp;&nbsp;&nbsp;Book Collection</span></a>
                       </li>
                        <li><a href="books.php?t=Archived"><i class="fa fa-angle-down" aria-hidden="true"></i><span>&nbsp;&nbsp;&nbsp;Archived Books</span></a>
                       </li>
                   <li><a href="des.php"><i class="fa fa-angle-down" aria-hidden="true"></i><span>&nbsp;&nbsp;&nbsp;View Catalogue</span></a>
                           </li>
                                         </ul>
                    
                  </li>
                   

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-bookmark"></i>
                            <span>Borrowing and Returning</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="transactions.php?t=Borrowed"><i class="fa fa-angle-down"></i><span>&nbsp;&nbsp;&nbsp;Borrow Books</span></a>
                            </li>
                            <li><a href="transactions.php?t=Returned"><i class="fa fa-angle-down"></i><span>&nbsp;&nbsp;&nbsp;Return Books</span></a>
                            </li>
                            <!--                        <li><a href="history.php"><i class="fa fa-angle-double-right"></i> Transaction History</a></li>-->
                        </ul>
                    </li>
                          <li class="treeview">
                    <a href="#">
                        <i class="fa fa-print"></i>
                        <span>Reports</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="print.php?t=Books"><i class="fa fa-angle-down"></i><span>&nbsp;&nbsp;&nbsp;Book Report</span></a></li>
                        <li><a href="print.php?t=History"><i class="fa fa-angle-down"></i><span>&nbsp;&nbsp;&nbsp;Transaction History Report</span></a></li>
                         <li><a href="ualt.php"><i class="fa fa-angle-down"></i><span>&nbsp;&nbsp;&nbsp;User Logs</span></a></li>
                    </ul>
                </li>
                 
                <?php } ?>

                <?php if ($_SESSION['role'] == 'Faculty') { ?>
                    <li class=""><a href="index2.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                    <li class=""><a href="des.php"><i class="fa fa-book"></i> <span>Catalogue</span></a></li>
                    <li class=""><a href="history.php"><i class="fa fa-calendar"></i> <span>  Transaction History  </span></a></li>

                <?php  }?>
                
                <?php if ($_SESSION['role'] == 'Guest') { ?>
                    <li class=""><a href="index2.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                    <li class=""><a href="des.php"><i class="fa fa-book"></i> <span>Catalogue</span></a></li>
                    <li class=""><a href="ghistory.php"><i class="fa fa-calendar"></i> <span>  Transaction History  </span></a></li>

                <?php  }?>

                <?php if ($_SESSION['role'] == 'Student') { ?>
                    <li class=""><a href="index2.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                    <li class=""><a href="des.php"><i class="fa fa-book"></i> <span>Catalogue </span></a></li>
                    <li class=""><a href="history.php"><i class="fa fa-calendar"></i> <span>  Transaction History  </span></a></li>

                <?php  }?>

                <?php if ($_SESSION['role'] == 'Guest') { ?>

                <?php  }?>


          

               <!-- <li><a href="updatepass.php"><i
                                class="fa fa-gear"></i> <span>Change Password</span></a></li>  -->
                <li><a href="models/user.php?do=logout" onclick="return  confirm('Do you want to logout ?')"><i
                                class="fa fa-sign-out"></i> <span>Logout</span></a></li>
                                

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
</div>