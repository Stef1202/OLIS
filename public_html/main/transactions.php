<?php include_once('layout/head.php');
?>

<style>
    .espace{
        padding-bottom: 20px;
    }
</style>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
     <!--   <section class="content-header">
            <h1>
                <?php $t = $_GET['t']; ?>
                <?php $q = $_GET['q']; ?>
                <?= str_replace('ed', '', $_GET['t']); ?>ing
            </h1>
        </section> -->
                <?php if ($_GET['t'] == 'Borrowed') { ?>
        <section class="content-header">
            <h1>
             &nbsp;Borrowing of Books
                <small>Borrow books</small>
            </h1>
           <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active">Borrowing of Books &nbsp;&nbsp;</li>
                    </ol>
        </section>
         <?php  }?>
          <?php if ($_GET['t'] == 'Returned') { ?>
        <section class="content-header">
            <h1>
             &nbsp;Returning of Books
                <small>Return books</small>
            </h1>
           <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active">Returning of Books &nbsp;&nbsp;</li>
                    </ol>
        </section>
         <?php  }?>

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
                                    <div id='alert' class="alert alert-<?= $classs ?> <?= $classs; ?>">
                                        <strong>Successfully <?= $r; ?>!</strong>
                                    </div>
                                <?php endif; ?></a>
                            <form enctype="multipart/form-data" method="post" action="models/CRUDS.php">
                                <div class="row">
                                 
                                    <div class="col-xs-5" id="camera">
                                       
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="video-box">
                                                    <video width="100%" id="preview"></video>
                                                </div>
                                                  <?php if ($t == 'Borrowed') { 
                                                                ?><center> <progress value="0" max="3" id="progressBar"></progress> 
                                                                <span id="loadinn"><p style="font-size: 14px; text-align:center; color:blue;"><i>Loading camera...</i></p></span>
                                                                <div id="l" style='display:none'><br>
                                                                <p style="font-size: 14px; text-align:center; color:green;"><i>Scan QR Code to Borrow Book/s</i></p></div></center>
                                                        
                                                            
                                                           
                        
                                              
                                             <div style="text-align:center">            
                                          <a data-toggle="modal" data-target="#add" type="submit"
                                              class="btn btn-primary t btn-m "><i class="fa fa-book"> </i> Manual Borrowing </a>
                                              </div>



                                <!--                                <a data-toggle="modal" data-target="#scan" type="submit"-->
                                <!--                                   class="btn btn-warning pull-right btn-m "><i class="fa fa-search"> </i> Scan QR </a>-->
             
             
                            
                            
                                                   <?php } ?>
                                                     <?php if ($t == 'Returned') {
                                                                ?><center> <progress value="0" max="3" id="progressBar"></progress> 
                                                                <span id="loadinn"><p style="font-size: 14px; text-align:center; color:blue;"><i>Loading camera...</i></p></span>
                                                                <div id="l" style='display:none'><br>
                                                         <p style="font-size: 14px; text-align:center; color:green;"><i>Scan QR Code to Return Book/s</i></p></div></center>
                                                        <div style="text-align:center">            
                                          <a data-toggle="modal" data-target="#return" type="submit"
                                              class="btn btn-primary t btn-m "><i class="fa fa-book"> </i> Manual Returning </a>
                                              </div>
                                                         <?php
                                                                
                                                           
                        
                                                   } ?>
                                            </div>
                                        </div>

                                    </div>
                                       
                                                    <h3 style="text-align:left"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Books Details: </h3> <br>
                                               
                                    <?php
                                    if (isset($_GET['code'])) {
                                        $qrcode = $_GET['code'];

                                        if ($t == 'Borrowed') {
                                            $result = my_query("SELECT  * FROM tbl_books WHERE qrcode='$qrcode'");
                                            if ($row = $result->fetch()) {

                                                if ($row['status'] <> 'Available') {
                                                    $message = "Book is not available";
                                                    echo "<script type='text/javascript'>alert('$message');window.location.href='transactions.php?t=Borrowed';</script>";
                                                }
                                                
                                                $xbook_id = $row['id'];
                                                $isbn = $row['isbn'];
                                                $accno = $row['accno'];
                                                $bookTitle = $row['bookTitle'];
                                                $author = $row['author'];
                                                $copyrightDate = $row['copyrightDate'];


                                            }
                                        } else {
                                            $result = my_query("SELECT  *,bt.id FROM  tbl_booktransactions bt 
                                            INNER JOIN tbl_books b ON b.id=bt.book_id INNER JOIN tbl_users u ON u.id=bt.user_id WHERE qrcode='$qrcode' AND bookStatus = 'Borrowed' ");
                                            
                                            if ($row = $result->fetch()) {

                                                $id = $row['id'];
                                                $xbook_id = $row['book_id'];
                                                $isbn = $row['isbn'];
                                                 $accno = $row['accno'];
                                                $bookTitle = $row['bookTitle'];
                                                $author = $row['author'];
                                                $copyrightDate = $row['copyrightDate'];
                                                
                                                $rstatus=$row['bookStatus'];
                                                
                                                $bookBarrowed = $row['dateBarrow']; 
                                                $date = new DateTime($bookBarrowed); 
                                                $date->modify('+7 day');
                                                $dateReturning= $date->format('Y-m-d');
                                                
                                                if($rstatus <>"Returned"){
                                                      $_SESSION['returnedUserId'] = $row['user_id'];
                                                }
                                                
                                                 if($row['status']<>'Available') { 
                                                      if($dateReturning <= $dateNow ) {
                                                             "penalty";
                                                          
                                                          
                                                            $date1=date_create($dateNow); //Date Difference
                                                            $date2=date_create($dateReturning);
                                                            $diff=date_diff($date1,$date2);
                                                              $diff = $diff->d;//noofday
                                                            $amt= $diff * 5 ;
                                                      
                                                          $xpenalties  = " $diff (days) * 5 = ₱ $amt.00" ;
                                                         
                                                          
                                                      }
                                                   
                                                          
                                                }else{
                                                    $message = "Book already returned";
                                                    echo "<script type='text/javascript'>alert('$message');history.go(-1);</script>";
                                                    $xpenalties = ' ';
                                                    
                                                }
                                                
                                          
                                            }else{
                                                    $message = "Book already returned";
                                                    echo "<script type='text/javascript'>alert('$message');window.location.href='transactions.php?t=Returned';</script>";
                                                    $xpenalties = ' ';
                                                    
                                                }
                                        }
}

                                    ?>
                                    <input type="hidden" value="<?= (isset($xbook_id) ? $xbook_id : ''); ?>"   name="book_id"  required readonly/>
                                    <div class="col-xs-7" id="inputdata">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <label class="control-label" for="qrcode">ISBN</label>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <input type="text" value="<?= (isset($isbn) ? $isbn : ''); ?>" class="form-control readonly" id="qrcode" name="qrcode" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <label class="control-label" for="qrcode">Accesion Number</label>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <input type="text" value="<?= (isset($accno) ? $accno : ''); ?>" class="form-control readonly" id="accno" name="accno" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <label class="control-label" for="bookTitle">Title </label>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control readonly" value="<?= (isset($bookTitle) ? $bookTitle : ''); ?>" id="bookTitle" name="bookTitle" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <label class="control-label" for="author">Author</label>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control readonly" value="<?= (isset($author) ? $author : ''); ?>" id="author" name="author" required />
                                                </div>
                                            </div>
                                        </div>
                                      
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <label class="control-label" for="datePublished">Date Published</label>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control readonly" value="<?= (isset($copyrightDate) ? $copyrightDate : ''); ?>" id="copyrightDate" name="copyrightDate" required />
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <label class="control-label" for="id_number">Borrower's Information</label>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="form-group">

                                                   <?php if ($t == 'Borrowed') { ?>
                                                    <select name="user_id" class="form-control select" required>
                                                        <option value=""> -- Click to Select -- </option>
                                                        <?php
                                                        $result = my_query("SELECT * FROM tbl_users WHERE role<>'Librarian' AND role<>'Admin' AND status='Active' ");
                                                        for ($i = 1; $row = $result->fetch(); $i++) {
                                                            $selected = '';
                                                            if (isset($_SESSION['borrowedUserId'])) {
                                                                if ($_SESSION['borrowedUserId'] == $row['id']) {
                                                                    $selected = 'selected';
                                                                }
                                                            }
                                                            ?>
                                                            <option value="<?= $row['id']; ?>" <?= $selected; ?>>
                                                                <?= $row['fname'] . ' ' . $row['lname'] .  ' ' . $row['suffix'].' - ' . $row['userNo'] . ' (' . $row['role'] . ')' . ' ('.$row['course'].')'. ' ('.$row['yr_lvl'].')'; ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>

                                                    <?php } else { ?>
                                                        <select name="user_id" class="form-control readonly" required>
                                                            <option></option>
                                                            <?php $result = my_query("SELECT * FROM tbl_users WHERE role<>'Librarian' AND role<>'Admin' AND status='Active' ");
                                                            for ($i = 1; $row = $result->fetch(); $i++) { ?>
                                                            
                                                                <option value="<?= $row['id']; ?>"
                                                                    <?php
                                                                    if (isset($_SESSION['returnedUserId'])) {
                                                                        if ($_SESSION['returnedUserId'] == $row['id']) {
                                                                            echo 'selected';
                                                                        }
                                                                    }
                                                                    ?>
                                                                >
                                                                    <?= $row['fname']. ' ' .$row['lname'].  ' ' . $row['suffix']. ' - '.$row['userNo'] . ' (' . $row['role']. ')' . ' ('.$row['course'].')'. ' ('.$row['yr_lvl'].')' ; ?>
                                                                </option>
                                                                 <option >  </option>
                                                            <?php } ?>
                                                           
                                                        </select>
                                                        
 

                                                    <?php } ?>

                                                </div>
                                            </div>
                                        </div>

                                           <?php  if (isset($_SESSION['status'])) if ($_SESSION['status'] == 'Returned') { ?>
                                           <div class="row">
                                            <div class="col-xs-12">
                                                <label class="control-label" for="dateBarrow">Date Borrowed </label>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control readonly" value="<?= (isset($bookBarrowed) ? $bookBarrowed : ''); ?>" id="dateBarrow" name="bookTitle" required />
                                                </div>
                                            </div>
                                        </div>
                                        <?php  }?>

                                        <?php 
                                             if ($t == 'Returned') { ?>
                                            <input type="hidden"    name="id"  value="<?=$id;?>" >
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <label class="control-label" for="bookTitle">Penalty </label>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="form-group"> 
                                             
                                                    <label style="color:red"> <?php if (isset($xpenalties)) echo $xpenalties;?>       </label> 
                                                    
                                                    <input type="number" class="form-control readonly"  value="<?= (isset($amt) ? $amt : ''); ?>" name="penalty" id= "penalty" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row"> 
                                            <div class="col-xs-12">
                                                <label class="control-label" for="author">Notes</label>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control"  name="notes"  >
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>

                                        <div class="row">
                                            <div class="col-xs-12">
                                                <a href="transactions.php?t=Borrowed" type="button" class="btn btn-danger  btn-huge">Cancel</a> 
                                                <?php if ($t == 'Borrowed') { ?>
                                                 <button type="" class="btn btn   btn-huge"  >
                                                     
                                                    </button>
                                                    <button type="submit" class="btn btn-info   btn-huge" name="func_param" value="transact" id="transact">
                                                        Borrow Book
                                                    </button>
                                                <?php } else { ?>
                                                <button type="" class="btn btn   btn-huge"  >
                                                    <button type="submit" class="btn btn-info   btn-huge" name="func_param" value="transactReturn" id="transact">
                                                        Return Book
                                                    </button>
                                                <?php }  ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.box-header -->
                        <?php if ($t == 'Borrowed'){ ?>
                        <div class="box-body">
                            <div class="table-responsive">
                                
                                <table id="example1" class="table table-bordered table-striped">
                                    
                                    <thead>
                                  
                                    <tr>
                                        <th>#</th>
                                        <th>ISBN</th>
                                        <th>Accession Number</th>
                                        <th>Book Title</th>
                                        <th>Author</th>
                                        <th>Date Published</th>
                                        <th>Borrower</th>
                                        <th>Course/ Department</th>
                                        <th>Year Level</th>
                                        <th>Date Borrowed</th>
                                        
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    $and = '';
                                    if ($t == 'Borrowed') {
                                        $and = "  WHERE bookStatus='$t' ";
                                    } elseif ($t == 'Returned') {
                                        $and = "  WHERE bookStatus='$t' ";
                                    }

                                    $result = $db->prepare("SELECT *,bt.id FROM tbl_books b INNER JOIN tbl_booktransactions bt ON b.id=bt.book_id 
                                    INNER JOIN tbl_users u ON u.id=bt.user_id  $and ORDER BY bt.id DESC");
                                    $result->execute();
                                    for ($i = 1; $row = $result->fetch(); $i++) {
                                        $id = $row['id']; ?>
                                        <tr>
                                            <td> <?= $i; ?></td>
                                            <td> <?= $row['isbn']; ?></td>
                                            <td> <?= $row['accno']; ?></td>
                                            <td> <?= $row['bookTitle']; ?></td>
                                            <td> <?= $row['author']; ?></td>
                                            <td> <?= $row['copyrightDate']; ?></td>
                                            <td> <?= $row['fname'] . ' ' . $row['lname'] . ' ' . $row['suffix']. '(' . $row['role'] . ')'; ?></td>
                                             <td> <?= $row['course']; ?></td>
                                              <td> <?= $row['yr_lvl']; ?></td>
                                            <td> <?= format_date($row['dateBarrow']); ?></td>
                                            
                                             <td>
                                            <h4 style="color: <?= ($row['bookStatus'] == 'Borrowed' ? 'red' : 'green'); ?>"><?= ($row['bookStatus'] == 'Borrowed' ? 'Unavailable' : 'Available'); ?>
                                                <?php
                                                $dtNow = date('Y-m-d');
                                                $date = new DateTime($row['dateBarrow']);
                                                $date->modify('+7 day');
                                                $dateWarning = $date->format('Y-m-d');


                                                if ($row['bookStatus'] == 'Borrowed') {
                                                    if ($dtNow >= $dateWarning) {
                                                           echo " <br/> 'Have a Penalty'"  ;
                                                                 
                                                    }else{
                                                        echo  " <br/> Return On : ".format_date($dateWarning) ;
                                                    }
                                                }; ?>


                                        </td>
                                            <td>
                                                <!--                                        `qrcode`,  `edition`, `subject`, `callNumber`, ``, ``, `is_archieved` FROM `tbl_books` WHERE 1-->
                                            <!-- naka bukod nayung sa action ng borrow and return-->
                                              
                                                    <a href="#edit<?= $id; ?>" data-toggle="modal" class="btn btn-primary"><i class="fa fa-fw fa-eye" title="View"></i></a>

                               
                                            </td>
                                        </tr>

                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php } else{ ?>
                        <div class="box-body">
                            <div class="table-responsive">
                                
                                <table id="example1" class="table table-bordered table-striped">
                                    
                                    <thead>
                                  
                                    <tr>
                                        <th>#</th>
                                        <th>ISBN</th>
                                        <th>Accession Number</th>
                                        <th>Book Title</th>
                                        <th>Author</th>
                                        <th>Date Published</th>
                                        <th>Borrower</th>
                                        <th>Course/ Department</th>
                                        <th>Year Level</th>
                                        <th>Date Borrowed</th>
                                        <th>Date Returned</th>
                                        <th>Penalty & Notes</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    $and = '';
                                    if ($t == 'Borrowed') {
                                        $and = "  WHERE bookStatus='$t' ";
                                    } elseif ($t == 'Returned') {
                                        $and = "  WHERE bookStatus='$t' ";
                                    }

                                    $result = $db->prepare("SELECT *,bt.id FROM tbl_books b INNER JOIN tbl_booktransactions bt ON b.id=bt.book_id 
                                    INNER JOIN tbl_users u ON u.id=bt.user_id  $and ORDER BY bt.id DESC");
                                    $result->execute();
                                    for ($i = 1; $row = $result->fetch(); $i++) {
                                        $id = $row['id']; ?>
                                        <tr>
                                            <td> <?= $i; ?></td>
                                            <td> <?= $row['isbn']; ?></td>
                                            <td> <?= $row['accno']; ?></td>
                                            <td> <?= $row['bookTitle']; ?></td>
                                            <td> <?= $row['author']; ?></td>
                                            <td> <?= $row['copyrightDate']; ?></td>
                                            <td> <?= $row['fname'] . ' ' . $row['lname'] .  ' ' . $row['suffix']. '(' . $row['role'] . ')'; ?></td>
                                             <td> <?= $row['course']; ?></td>
                                              <td> <?= $row['yr_lvl']; ?></td>
                                            <td> <?= format_date($row['dateBarrow']); ?></td>
                                            <td> <?= format_date($row['dateReturn']); ?></td>
                                            <td> <?php
                                                if ($row['penalty']  > 0) {
                                                    
                                                  echo  '₱ ' . $row['penalty'] . '.00'. ' - ';
                                                  
                                                  
                                                }
                                                echo $row['notes'];


                                                ?></td>
                                             <td>
                                            <h4 style="color: <?= ($row['bookStatus'] == 'Borrowed' ? 'red' : 'green'); ?>"><?= ($row['bookStatus'] == 'Borrowed' ? 'Unavailable' : 'Available'); ?>
                                                <?php
                                                $dtNow = date('Y-m-d');
                                                $date = new DateTime($row['dateBarrow']);
                                                $date->modify('+7 day');
                                                $dateWarning = $date->format('Y-m-d');


                                                if ($row['bookStatus'] == 'Borrowed') {
                                                    if ($dtNow >= $dateWarning) {
                                                           echo " <br/> 'Have a Penalty'"  ;
                                                                 
                                                    }else{
                                                        echo  " <br/> Return On : ".format_date($dateWarning) ;
                                                    }
                                                }; ?>


                                        </td>
                                            <td>
                                                <!--                                        `qrcode`,  `edition`, `subject`, `callNumber`, ``, ``, `is_archieved` FROM `tbl_books` WHERE 1-->
                                            <!-- naka bukod nayung sa action ng borrow and return-->
                                                
                              <a href="#edit<?= $id; ?>" data-toggle="modal" class="btn btn-primary" title="Edit"><i class="fa fa-fw fa-pencil" title="Edit"></i></a>
                               
                                            </td>
                                        </tr>

                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                         <?php }?>
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
    <div class="modal fade" id="add" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Borrow Book</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="models/CRUDS.php" method="post">
                        <div class="box-body">

                            <div class="form-group"><label class="col-sm-2 control-label">Book</label>
                                <div class="col-sm-10">
                                    <!--                                    <input type="text" class="form-control" name="qrcode" placeholder="QR Code"   required>-->
                                    <select name="book_id[]" class="form-control select"  required>
                                        <option></option>
                                        <?php $result = my_query("SELECT * FROM tbl_books WHERE status='Available' ");
                                        for ($i = 1; $row = $result->fetch(); $i++) { ?>
                                            <option value="<?= $row['id']; ?>"><?=  $row['bookTitle'] . ' ('.$row['accno'].')'; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group"><label class="col-sm-2 control-label">User</label>
                                <div class="col-sm-10">
                                    <select name="user_id" class="form-control select" required>
                                        <option></option>
                                        <?php $result = my_query("SELECT * FROM tbl_users WHERE role<>'Librarian' AND role<>'Admin' AND status='Active' ");
                                        for ($i = 1; $row = $result->fetch(); $i++) { ?>
                                            <option value="<?= $row['id']; ?>"><?= $row['fname']. ' ' .$row['lname']. ' ' . $row['suffix']. ' - '.$row['userNo'] . ' ('.$row['role'].')' . ' ('.$row['course'].')' . ' ('.$row['yr_lvl'].')'  ; ?></option>
                                            
                                            
                                            
                                        <?php } ?>
                                    </select>
                                    
                                </div>
                            </div>
                            
                        <div class="form-group"><label class="col-sm-2 control-label">Date Borrow</label>
                                <div class="col-sm-10">
                                    <input type="date" class='form-control datereturn' data-toggle='popover' required onchange ="validateDates('<?= $row['dateBarrow'];?>', this.value)" name="date" value="<?php if (isset($_GET['date'])) {
                                        echo $_GET['date'];
                                    } ?>"></div>
                            </div>  
                            <!--<script>
function validateDates(minDate, inputDate) {
    var currentDate = new Date();
    var selectedDate = new Date(inputDate);
    var minAllowedDate = new Date(minDate);

    // Check if the selected date is in the future
    if (selectedDate > currentDate) {
        alert('Please select a date in the past or today.');
        return;
    }

    // Check if the selected date is in the correct format
    if (isNaN(selectedDate.getTime()) || inputDate.length !== 10) {
        alert('Please enter a valid date in the format YYYY-MM-DD.');
        return;
    }

    // Check if the selected date is before the minimum allowed date
    if (selectedDate < minAllowedDate) {
        alert('Please select a date on or after ' + minAllowedDate.toISOString().substring(0, 10));
        return;
    }
}
</script>  -->
<script>
function validateDates(minDate, inputDate) {
    var currentDate = new Date();
    var selectedDate = new Date(inputDate);
    var minAllowedDate = new Date(minDate);

    // Check if the selected date is in the future
    if (selectedDate > currentDate) {
        alert('Please select a date in the past or today.');
        document.getElementsByName("date")[0].value = ""; // Clear the date input
        return;
    }

    // Check if the selected date is in the correct format
    if (isNaN(selectedDate.getTime()) || inputDate.length !== 10) {
        alert('Please enter a valid date in the format YYYY-MM-DD.');
        document.getElementsByName("date")[0].value = ""; // Clear the date input
        return;
    }

    // Check if the selected date is before the minimum allowed date
    if (selectedDate < minAllowedDate) {
        alert('Please select a date on or after ' + minAllowedDate.toISOString().substring(0, 10));
        document.getElementsByName("date")[0].value = ""; // Clear the date input
        return;
    }
}
</script>


                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary pull-right" name="func_param" value="borrow">
                                Borrow
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.return -->
    <div class="modal fade" id="return" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Return Book</h4>
                </div>
                <div class="modal-body">
                 <div class="box-body">
                            <div class="table-responsive">
                                <!-- search bar for books-->
<script>
    $(document).ready(function() {
        // Initialize DataTable with options
        $('table[name="bookSearch"]').DataTable({
            "searching": true, // Enable search functionality
            "info": true, // Show information about the table
            "responsive": true, // Enable responsive design
              "lengthMenu": [5, 10, 25, 50], // Number of entries to show in length menu
            "lengthChange": true, // Disable the "Show entries" option
            "paging": true // Disable pagination
        });
    });
</script>        
                                <table id="" name="bookSearch"class="table table-bordered table-striped">
                                    
                                    <thead>
                                  
                                    <tr>
                                        <th>#</th>
                  
                                        <th>Accession Number</th>
                                        <th>Book Title</th>
                                    
                                     
                                        <th>Borrower</th>
                                        <th>Date Borrowed</th>
                                        
                                    
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    $and = '';
                                    if ($t == 'Returned') {
                                        $and = "  WHERE bookStatus='$t' ";
                                    } elseif ($t == 'Borrowed') {
                                        $and = "  WHERE bookStatus='$t' ";
                                    }

                                    $result = $db->prepare("SELECT *,bt.id FROM tbl_books b INNER JOIN tbl_booktransactions bt ON b.id=bt.book_id 
                                    INNER JOIN tbl_users u ON u.id=bt.user_id  WHERE bookStatus='Borrowed' ORDER BY bt.id DESC");
                                    $result->execute();
                                    for ($i = 1; $row = $result->fetch(); $i++) {
                                        $id = $row['id']; ?>
                                        <tr>
                                            <td> <?= $i; ?></td>
                                         
                                            <td> <?= $row['accno']; ?></td>
                                            <td> <?= $row['bookTitle']; ?></td>
                                        
                                            <td> <?= $row['fname'] . ' ' . $row['lname']. ' ' . $row['suffix'] . '(' . $row['role'] . ')'; ?></td>
                                            <td> <?= format_date($row['dateBarrow']); ?></td>
                                            
                                            
                                            <td>
                                                <!--                                        `qrcode`,  `edition`, `subject`, `callNumber`, ``, ``, `is_archieved` FROM `tbl_books` WHERE 1-->
                                            <!-- naka bukod nayung sa action ng borrow and return-->
                                              
                                                    <a href="#edits<?= $id; ?>" data-toggle="modal" class="btn btn-primary"><i class="fa fa-hand-paper-o" aria-hidden="true" title="Manual Return"></i></a>

                               
                                            </td>
                                        </tr>

                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
     
        <!-- manual returning di ko alam bat nasira-->
        
        <?php $result = $db->prepare("SELECT *,bt.id FROM tbl_books b INNER JOIN tbl_booktransactions bt ON b.id=bt.book_id 
                                    INNER JOIN tbl_users u ON u.id=bt.user_id  WHERE bookStatus='Borrowed' ORDER BY bt.id DESC");
                                    $result->execute();
                                    for ($i = 1; $row = $result->fetch(); $i++) {
                                        $id = $row['id']; ?>

     <div class="modal fade" id="edits<?= $id; ?>" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
           
                <!-- naka bukod nayung sa action ng edit -->
        <!-- manual returning modal -->
  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Return Book</h4>
                </div>
                      <form class="form-horizontal" action="models/CRUDS.php"
                      method="post">
                    <div class="modal-body">

                        <div class="box-body">
                            <input value="<?= $row['id']; ?>" type="hidden" class="form-control" name="id">
                            <input value="<?= $row['book_id']; ?>" type="hidden" class="form-control" name="book_id">

                            <div class="form-group"><label class="col-sm-2 control-label"> ISBN </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control readonly" name="isbn" value="<?= $row['isbn']; ?>" placeholder="isbn"
                                           required></div>
                            </div>
                               <div class="form-group"><label class="col-sm-2 control-label"> Accession Number </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control readonly" name="accno" value="<?= $row['accno']; ?>" placeholder="Accession Number"
                                           required></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label"> Book Title </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control readonly" name="bookTitle" value="<?= $row['bookTitle']; ?>" placeholder="Book Title"
                                           required></div>
                            </div>
                              <div class="form-group"><label class="col-sm-2 control-label"> Author </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control readonly" name="author" value="<?= $row['author']; ?>" placeholder="Author"   copyrightDate
                                           required></div>
                            </div>
                             <div class="form-group"><label class="col-sm-2 control-label"> Date Publish </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control readonly" name="copyrightDate" value="<?= $row['copyrightDate']; ?>" placeholder="Datepublish"   
                                           required></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Date Borrowed</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control readonly" name="dateBarrow" value="<?=format_date($row['dateBarrow']); ?>" placeholder="Date Borrowed"
                                           required></div>
                            </div>
                                
                            

                            <div class="form-group"><label class="col-sm-2 control-label">Notes</label>
                                <div class="col-sm-10">
                                    <input value="<?= $row['notes']; ?>" type="text" class="form-control" 
                                           name="notes" placeholder="notes"></div>
                            </div>
                        <div class="form-group"><label class="col-sm-2 control-label"> Borrower</label>
                                <div class="col-sm-10">
                                    <input value=" <?= $row['fname'] . ' ' . $row['lname'] . '(' . $row['role'] . ')'; ?>" type="text" class="form-control readonly"
                                           name="borrower" placeholder="Borrower's ID/Name"></div>
                                           
                            </div>
                              <?php if ($row['role'] == 'Faculty') { ?>
                                      <div class="form-group"><label class="col-sm-2 control-label">Department</label>
                                <div class="col-sm-10">
                                    <input value=" <?= $row['course']; ?> " type="text" class="form-control readonly"
                                           name="course" placeholder="Course/ Department"></div>
                            </div>
                <?php  }?>
                 <?php if ($row['role'] == 'Student') { ?>
                                      <div class="form-group"><label class="col-sm-2 control-label">Course</label>
                                <div class="col-sm-10">
                                    <input value=" <?= $row['course']; ?> " type="text" class="form-control readonly"
                                           name="course" placeholder="Course/ Department"></div>
                            </div>
                <?php  }?>
                <?php if ($row['role'] == 'Student') { ?>
                           
                             <div class="form-group"><label class="col-sm-2 control-label"> Year Level</label>
                                <div class="col-sm-10">
                                    <input value=" <?= $row['yr_lvl']; ?> " type="text" class="form-control readonly"
                                           name="yr_lvl" placeholder="Year Level"></div>
                                           
                            </div>
                <?php  }?>
   
                            <div class="form-group"><label class="col-sm-2 control-label"> Status</label>
                                <div class="col-sm-10">
                                    <input value=" <?= $row['bookStatus']; ?> " type="text" class="form-control readonly"
                                           name="bookStatus" placeholder="Book Status"></div>
                                           
                            </div>
<div class="form-group">
    <label class="col-sm-2 control-label">Date Return</label>
    <div class="col-sm-10">
        <input type="date" class="form-control datereturn" data-toggle="popover" name="date" onchange="validateDatesReturn('<?php echo $row['dateBarrow']; ?>', this.value, '<?=$id?>')"  id='<?=$id?>'  value="<?php if (isset($_GET['date'])) { echo $_GET['date']; } ?>"  required>
    </div>
</div>

<div class="form-group"><label class="col-sm-2 control-label">Penalty</label>
                                <div class="col-sm-10">
                                    <label style="color:red" id= 'penalty<?=$id?>'></label> 
                                       <input type="number" class="form-control readonly" id= 'amount<?=$id?>' for="penalty" value="<?= (isset($amt1) ? $amt1 : ''); ?>" name="penalty" id="penalty" >
                                           </div>
                            </div>

<script>
    function validateDatesReturn(dateReturn, dateInput, divID) {
        var borrowedDate = new Date(dateReturn);
        var returnDate = new Date(dateInput);
        var currentDate = new Date();
        console.log(divID);

        if (isNaN(returnDate.getTime())) {
            document.getElementById('penalty'+divID).innerHTML = '';
            document.getElementById('amount'+divID).value = '';
            alert("Invalid date format! Please enter a valid date.");
             document.getElementById(divID).value = ""; // Clear the input field
        } else if (returnDate < borrowedDate) {
            document.getElementById('penalty'+divID).innerHTML = '';
            document.getElementById('amount'+divID).value = '';
            alert("Invalid date! The return date cannot be earlier than the borrowed date.");
            document.getElementById(divID).value = ""; // Clear the input field
        }
        else if (returnDate > currentDate) {
            document.getElementById('penalty'+divID).innerHTML = '';
            document.getElementById('amount'+divID).value = '';
            alert("Invalid date! The return date cannot be later than today.");
            document.getElementById(divID).value = ""; // Clear the input field
        }else{
            document.getElementById('penalty'+divID).innerHTML = '';
            document.getElementById('amount'+divID).value = '';
            var daysbetween = returnDate.getTime() - borrowedDate.getTime();
            var days = daysbetween / (1000 * 60 * 60 * 24);
            if(days > 7){
            var penaltydays = days - 7; 
            var messagelabel = penaltydays+' days: '+penaltydays+'* 5 pesos penalty per day = '+(penaltydays*5)+'pesos';
            document.getElementById('penalty'+divID).innerHTML += messagelabel;
            document.getElementById('amount'+divID).value = penaltydays*5;
            }
            
        }
    }
</script>
                       <!-- <script>
function validateDates(dateReturn, dateInput) {
    var borrowedDate = new Date("<?=$row['dateBarrow'];?>");
    var returnDate = new Date(dateInput);

    if (returnDate < borrowedDate) {
        alert("Invalid date! The return date cannot be earlier than the borrowed date.");
        // You can reset the input value or take any other appropriate action here
    } else if (returnDate > new Date(dateReturn)) {
        alert("Invalid date! The return date cannot be later than the maximum allowed date.");
        // You can reset the input value or take any other appropriate action here
    }
}
</script>  --> 
<!--<script>
function validateDates(dateReturn, dateInput) {
    var borrowedDate = new Date("<?=$row['dateBarrow'];?>");
    var returnDate = new Date(dateInput);

    if (returnDate < borrowedDate) {
        alert("Invalid date! The return date cannot be earlier than the borrowed date.");
        document.getElementsByName("dateR")[0].value = ""; // Clear the input field
    } else if (returnDate > new Date(dateReturn)) {
        alert("Invalid date! The return date cannot be later than the maximum allowed date.");
        document.getElementsByName("dateR")[0].value = ""; // Clear the input field
    }
}
</script> -->

                            



                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary pull-right" name="func_param"   value="returned"> 
                                Return 
                            </button> 
                        </div>
                    </div>
                </form>  <!-- return action-->
                              
               
            </div>
        </div>
    </div>
<?php } ?>

                                    
<?php $result = $db->prepare("SELECT *,bt.id FROM tbl_books b INNER JOIN tbl_booktransactions bt ON b.id=bt.book_id INNER JOIN tbl_users u ON u.id=bt.user_id  $and ORDER BY bt.id DESC");

$result->execute();

for ($i = 1; $row = $result->fetch(); $i++) {
    $id = $row['id']; 
                                                $bookBarrowed = $row['dateBarrow']; 
                                                $rstatus=$row['bookStatus'];
                                                $date = new DateTime($bookBarrowed); 
                                                $date->modify('+7 day');
                                                $dateReturning= $date->format('Y-m-d');
                                                
                                                if($rstatus <> "Returned"){
                                                      $_SESSION['returnedUserId'] = $row['user_id'];
                                                }
                                                
                                                 if($row['status']<>'Available') { 
                                                      if($dateReturning <= $dateNow ) {
                                                             "penalty";
                                                          
                                                          
                                                            $date1=date_create($dateNow); //Date Difference
                                                            $date2=date_create($dateReturning);
                                                            $diff=date_diff($date1,$date2);
                                                              $diff = $diff->d;//noofday
                                                            $amt1= $diff * 5 ;
                                                      
                                                          $xpenalties  = " $diff (days) * 5 = ₱ $amt1.00" ;
                                                         
                                                          
                                                      }else{
                                                          $xpenalties = '';
                                                          $amt1 = '';
                                                      }
                                                   
                                                          
                                                }else{
                                                    $message = "Book already returned";
                                                    echo "<script type='text/javascript'>alert('$message');history.go(-1);</script>";
                                                    $xpenalties = ' ';
                                                    
                                                }
    
    
    
    
    ?>
    
    <!-- /.Edit -->
    <div class="modal fade" id="edit<?= $id; ?>" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
           
                <!-- naka bukod nayung sa action ng edit -->
 <?php if ($t == 'Borrowed'){ ?>
  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">View</h4>
                </div>
                      <form class="form-horizontal" action="models/CRUDS.php"
                      method="post">
                    <div class="modal-body">

                        <div class="box-body">
                            <input value="<?= $row['id']; ?>" type="hidden" class="form-control" name="id">
                            <input value="<?= $row['book_id']; ?>" type="hidden" class="form-control" name="book_id">

                            <div class="form-group"><label class="col-sm-2 control-label"> ISBN </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control readonly" name="isbn" value="<?= $row['isbn']; ?>" placeholder="isbn"
                                           required></div>
                            </div>
                               <div class="form-group"><label class="col-sm-2 control-label"> Accession Number </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control readonly" name="accno" value="<?= $row['accno']; ?>" placeholder="Accession Number"
                                           required></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label"> Book Title </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control readonly" name="bookTitle" value="<?= $row['bookTitle']; ?>" placeholder="Book Title"
                                           required></div>
                            </div>
                              <div class="form-group"><label class="col-sm-2 control-label"> Author </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control readonly" name="author" value="<?= $row['author']; ?>" placeholder="Author"   copyrightDate
                                           required></div>
                            </div>
                             <div class="form-group"><label class="col-sm-2 control-label"> Date Publish </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control readonly" name="copyrightDate" value="<?= $row['copyrightDate']; ?>" placeholder="Datepublish"   
                                           required></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Date Borrowed</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control readonly" name="dateBarrow" value="<?=format_date($row['dateBarrow']); ?>" placeholder="Date Borrowed"
                                           required></div>
                            </div>
                                
                            <div class="form-group"><label class="col-sm-2 control-label">Penalty</label>
                                <div class="col-sm-10">
                                       <input type="number" class="form-control readonly" for="penalty" value="<?= $row['penalty']; ?>" name="penalty" id="penalty" >
                                           </div>
                            </div>

                            <div class="form-group"><label class="col-sm-2 control-label">Notes</label>
                                <div class="col-sm-10">
                                    <input value="<?= $row['notes']; ?>" type="text" class="form-control"  readonly
                                           name="notes" placeholder="notes"></div>
                            </div>
                        <div class="form-group"><label class="col-sm-2 control-label"> Borrower</label>
                                <div class="col-sm-10">
                                    <input value=" <?= $row['fname'] . ' ' . $row['lname'] . '(' . $row['role'] . ')'; ?>" type="text" class="form-control readonly"
                                           name="borrower" placeholder="Borrower's ID/Name"></div>
                                           
                            </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Email Address</label>
                                <div class="col-sm-10">
                                    <input value=" <?= $row['email']; ?> " type="text" class="form-control readonly"
                                           name="email" placeholder="Email"></div>
                                           
                            </div>
                             <div class="form-group"><label class="col-sm-2 control-label">School</label>
                                <div class="col-sm-10">
                                    <input value=" <?= $row['school']; ?> " type="text" class="form-control readonly"
                                           name="school" placeholder="School"></div>
                                           
                            </div>
                                  <?php if ($row['role'] == 'Student') { ?>
                                         <div class="form-group"><label class="col-sm-2 control-label"> Course</label>
                                <div class="col-sm-10">
                                    <input value=" <?= $row['course']; ?> " type="text" class="form-control readonly"
                                           name="course" placeholder="Course/ Department"></div>
                                           
                            </div>
                        
                <?php  }?>
                <?php if ($row['role'] == 'Faculty') { ?>
                                         <div class="form-group"><label class="col-sm-2 control-label"> Department</label>
                                <div class="col-sm-10">
                                    <input value=" <?= $row['course']; ?> " type="text" class="form-control readonly"
                                           name="course" placeholder="Course/ Department"></div>
                                           
                            </div>
                        
                <?php  }?>
                <?php if ($row['role'] == 'Guest') { ?>
                                         <div class="form-group"><label class="col-sm-2 control-label"> Course</label>
                                <div class="col-sm-10">
                                    <input value=" <?= $row['course']; ?> " type="text" class="form-control readonly"
                                           name="course" placeholder="Course/ Department"></div>
                                           
                            </div>
                        
                <?php  }?>
                
                 <?php if ($row['role'] == 'Student') { ?>
                                     <div class="form-group"><label class="col-sm-2 control-label"> Year Levels</label>
                                <div class="col-sm-10">
                                    <input value=" <?= $row['yr_lvl']; ?> " type="text" class="form-control readonly"
                                           name="yr_lvl" placeholder="Year Level"></div>
                                           
                            </div>
                        
                <?php  }?>
                 <?php if ($row['role'] == 'Guest') { ?>
                                     <div class="form-group"><label class="col-sm-2 control-label"> Year Levels</label>
                                <div class="col-sm-10">
                                    <input value=" <?= $row['yr_lvl']; ?> " type="text" class="form-control readonly"
                                           name="yr_lvl" placeholder="Year Level"></div>
                                           
                            </div>
                        
                <?php  }?>
                            
                               
                             
                            <div class="form-group"><label class="col-sm-2 control-label"> Status</label>
                                <div class="col-sm-10">
                                    <input value=" <?= $row['bookStatus']; ?> " type="text" class="form-control readonly"
                                           name="bookStatus" placeholder="Book Status"></div>
                                           
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                           <!-- <button type="submit" class="btn btn-primary pull-right" name="func_param"   value="returned"> 
                                Return 
                            </button> -->
                        </div>
                    </div>
                </form>  <!-- return action-->
                               <?php } else{ ?>
                                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Edit</h4>
                </div>
                             <form class="form-horizontal" action="models/CRUDS.php"
                      method="post">
                    <div class="modal-body">

                      <div class="box-body">
                            <input value="<?= $row['id']; ?>" type="hidden" class="form-control" name="id">
                            <input value="<?= $row['book_id']; ?>" type="hidden" class="form-control" name="book_id">

                            <div class="form-group"><label class="col-sm-2 control-label"> ISBN </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control readonly" name="isbn" value="<?= $row['isbn']; ?>" placeholder="isbn"
                                           required></div>
                            </div>
                               <div class="form-group"><label class="col-sm-2 control-label"> Accession Number </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control readonly" name="accno" value="<?= $row['accno']; ?>" placeholder="Accession Number"
                                           required></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label"> Book Title </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control readonly" name="bookTitle" value="<?= $row['bookTitle']; ?>" placeholder="Book Title"
                                           required></div>
                            </div>
                              <div class="form-group"><label class="col-sm-2 control-label"> Author </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control readonly" name="author" value="<?= $row['author']; ?>" placeholder="Author"   copyrightDate
                                           required></div>
                            </div>
                             <div class="form-group"><label class="col-sm-2 control-label"> Date Publish </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control readonly" name="copyrightDate" value="<?= $row['copyrightDate']; ?>" placeholder="Datepublish"   
                                           required></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Date Borrowed</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control readonly" name="dateBarrow" value="<?=format_date($row['dateBarrow']); ?>" placeholder="Date Borrowed"
                                           required></div>
                            </div>
                             <div class="form-group"><label class="col-sm-2 control-label">Date Returned</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control readonly" name="dateBarrow" value="<?=format_date($row['dateReturn']); ?>" placeholder="Date Borrowed"
                                           required></div>
                            </div>
                               
                            <div class="form-group"><label class="col-sm-2 control-label">Penalty</label>
                                <div class="col-sm-10">
                                       <input type="number" class="form-control readonly"  value="<?= $row['penalty']; ?>" name="penalty" id= "penalty" >
                                           </div>
                            </div>

                            <div class="form-group"><label class="col-sm-2 control-label">Notes</label>
                                <div class="col-sm-10">
                                    <input value="<?= $row['notes']; ?>" type="text" class="form-control " 
                                           name="notes" placeholder="notes"></div>
                            </div>
                            
                         
                                        
                        <div class="form-group"><label class="col-sm-2 control-label"> Borrower </label>
                                <div class="col-sm-10">
                                    <input value=" <?= $row['fname'] . ' ' . $row['lname'] . '(' . $row['role'] . ')'; ?>" type="text" class="form-control readonly"
                                           name="borrower" placeholder="Borrower's ID/Name"></div>
                                           
                            </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Email Address</label>
                                <div class="col-sm-10">
                                    <input value=" <?= $row['email']; ?> " type="text" class="form-control readonly"
                                           name="email" placeholder="Email"></div>
                                           
                            </div>
                             <div class="form-group"><label class="col-sm-2 control-label">School</label>
                                <div class="col-sm-10">
                                    <input value=" <?= $row['school']; ?> " type="text" class="form-control readonly"
                                           name="school" placeholder="School"></div>
                                           
                            </div>
                                    <?php if ($row['role'] == 'Student') { ?>
                                         <div class="form-group"><label class="col-sm-2 control-label"> Course</label>
                                <div class="col-sm-10">
                                    <input value=" <?= $row['course']; ?> " type="text" class="form-control readonly"
                                           name="course" placeholder="Course/ Department"></div>
                                           
                            </div>
                        
                <?php  }?>
                <?php if ($row['role'] == 'Faculty') { ?>
                                         <div class="form-group"><label class="col-sm-2 control-label"> Department</label>
                                <div class="col-sm-10">
                                    <input value=" <?= $row['course']; ?> " type="text" class="form-control readonly"
                                           name="course" placeholder="Course/ Department"></div>
                                           
                            </div>
                        
                <?php  }?>
                <?php if ($row['role'] == 'Guest') { ?>
                                         <div class="form-group"><label class="col-sm-2 control-label"> Course</label>
                                <div class="col-sm-10">
                                    <input value=" <?= $row['course']; ?> " type="text" class="form-control readonly"
                                           name="course" placeholder="Course/ Department"></div>
                                           
                            </div>
                        
                <?php  }?>
                
                 <?php if ($row['role'] == 'Student') { ?>
                                     <div class="form-group"><label class="col-sm-2 control-label"> Year Levels</label>
                                <div class="col-sm-10">
                                    <input value=" <?= $row['yr_lvl']; ?> " type="text" class="form-control readonly"
                                           name="yr_lvl" placeholder="Year Level"></div>
                                           
                            </div>
                        
                <?php  }?>
                 <?php if ($row['role'] == 'Guest') { ?>
                                     <div class="form-group"><label class="col-sm-2 control-label"> Year Levels</label>
                                <div class="col-sm-10">
                                    <input value=" <?= $row['yr_lvl']; ?> " type="text" class="form-control readonly"
                                           name="yr_lvl" placeholder="Year Level"></div>
                                           
                            </div>
                        
                <?php  }?>
                            <div class="form-group"><label class="col-sm-2 control-label"> Status</label>
                                <div class="col-sm-10">
                                    <input value=" <?= $row['bookStatus']; ?> " type="text" class="form-control readonly"
                                           name="bookStatus" placeholder="Book Status"></div>
                                           
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary pull-right" name="func_param"   value="eedit"> 
                                Save
                            </button>  
                        </div>
                    </div>
                </form>
                                 <?php }?>
               
            </div>
        </div>
    </div>
    
    <!--end edit for return -->
    
    
    
    
 
<?php } ?>



    <script>
        $(".readonly").on('keydown paste focus mousedown', function(e){
            if(e.keyCode != 9) // ignore tab
                e.preventDefault();
        });
      
       var boxalert = document.getElementById('alert');
        
        var seconds = 3;
        var Timer = setInterval(function(){
          if(seconds <= 0){
            clearInterval(Timer);
            boxalert.style.display='none';
          }
          seconds -= 1;
        }, 1000);
        
    </script>
    <script src="../assets/js/jquery3.3.1.min.js"></script>
    <script src="../assets/js/instascan.min.js"></script>
    <script type="text/javascript">
        var scanner = new Instascan.Scanner({video: document.getElementById('preview'),
            mirror: false
        });
        
        scanner.addListener('scan', function (content) {
            var isbn = content;
            // alert(isbn);
            window.location.replace("transactions.php?t=<?=$t;?>&code=" + isbn);

        });
        
        var preview = document.getElementById('preview');
        
        var timeleft = 3;
        var downloadTimer = setInterval(function(){
          if(timeleft <= 0){
            clearInterval(downloadTimer);
            document.getElementById("loadinn").style.display='none';
            document.getElementById("progressBar").style.display='none';
            document.getElementById("l").style.display='block';
           
          }
          document.getElementById("progressBar").value = 3 - timeleft;
          timeleft -= 1;
        }, 1000);
        
        
        setTimeout(startCamera, 3000);
            
        function startCamera(){
        Instascan.Camera.getCameras().then(function (cameras) {
            if (cameras.length > 0) {
                if(cameras[1] != ""){
                    scanner.start(cameras[1]);
                }
                
                scanner.start(cameras[0]);
                
            } else {
                console.error('No cameras found.');
            }
        }).catch(function (e) {
            console.error(e);
        });
            
        }
        
        
    </script>
    <script>function myFunction(x) {
            if (x.matches) { // If media query matches
                document.getElementById("camera").className = "col-xs-12 espace";
                document.getElementById("inputdata").className = "col-xs-12";
            } else {
                document.getElementById("camera").className = "col-xs-5";
                document.getElementById("inputdata").className = "col-xs-7";
            }
            }
    
            var x = window.matchMedia("(max-width: 700px)")
            myFunction(x) // Call listener function at run time
            x.addListener(myFunction)
            
            
              
    </script>

<?php include_once('layout/footer.php'); ?>