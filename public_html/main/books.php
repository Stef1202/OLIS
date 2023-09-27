<?php include_once('layout/head.php'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
     
           


    <?php  if (isset($_GET['t'])) { if ($_GET['t'] == 'Archived') { ?>

           <section class="content-header">
            <h1>
             &nbsp; List of Archived Books
                <small>view list of archived books</small>
            </h1>
           <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active">List of Archived Books &nbsp;&nbsp;</li>
                    </ol>
        </section>
<?php  }}else{?> 
    <section class="content-header">
            <h1>
             &nbsp; List of Books
                <small>view list of books</small>
            </h1>
           <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active">List of Books &nbsp;&nbsp;</li>
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
                                    <div id='alert' class="alert alert-<?= $classs ?> <?= $classs; ?>">
                                        <strong>Successfully <?= $r; ?>!</strong>
                                    </div>
                                <?php endif; ?></a>
                      
                           
                                        <?php if (isset($_GET['t'])) {} else { ?>

                                                  <div class="btnspace"> <a data-toggle="modal" data-target="#add" type="submit" 
                                                                       class="btn btn-primary pull-right btn-m "><i class="fa fa-plus"> </i> Add New Books </a></div>
                                        <?php  }?>         
                                                                  

         
                               
                                <a class="btn  pull-right btn-m "></a>
                                  <div class="btnspace">  <a data-toggle="modal" data-target="#qrcodes" type="submit" onclick="loadQR()"
                                    class="btn btn-primary pull-right btn-m "><i class="fa fa-print"> </i> Print Selected Books </a>
                                    <input type="checkbox"  onclick="toggle(this)" > Select Shown Entries</div>
                                    
                                        <a class="btn  pull-right btn-m "></a>
           <!--               <div class="btnspace">  <a href="des.php"
                               class="btn btn-warning pull-right btn-m " ><i class="fa fa-eye"> </i> View Catalogue </a></div>
 <a class="btn  pull-right btn-m "></a>
                            <?php if(isset($_GET['t'])){ ?>
                                <div class="btnspace"><a href="books.php"
                                   class="btn btn-info pull-right btn-m "><i class="fa fa-book"> </i> List of Books </a></div>
                            <?php }else { ?>
                            
                            <div class="btnspace">    <a href="books.php?t=Archived"
                                   class="btn btn-info pull-right btn-m "><i class="fa fa-file-archive-o" aria-hidden="true"></i>  Archived List </a></div> 

                            <?php } ?>   -->


                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                         <th>Select for Printing QR code</th>
                                        <th>ISBN</th>
                                        <th>Accession Number</th>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Date Published</th>
                                        <th>Date Added</th>
                                        <th>Subject</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                        if(isset($_GET['t'])){
                                            $and = " WHERE status='Archived'" ;
                                        }else{
                                            $and = " WHERE status<>'Archived'" ;
                                        }
                                    
                                    $result = $db->prepare("SELECT * FROM tbl_books $and ORDER BY id DESC");
                                    $result->execute();
                                    for ($i = 1; $row = $result->fetch(); $i++) {
                                        $id = $row['id']; $qrcode=$row['qrcode'];
                                        ?>
                                        <tr>
                                            <td> <?= $i; ?></td>
                                            <td><input type="checkbox" name="qr" class="qr" onclick="Prt()" value="<?= $row['qrcode'];?>" data-valuetwo="<?= $row['bookTitle'];?>"/></td>
                                            <td class='isbn'> <?= $row['isbn']; ?></td>
                                            <td> <?= $row['accno']; ?></td>
                                            <td> <?= $row['bookTitle']; ?></td>
                                            <td> <?= $row['author']; ?></td>
                                            <td> <?= $row['copyrightDate']; ?></td>
                                                <td> <?= format_date($row['dbook']); ?></td>
                                                <td> <?= ($row['subject']); ?></td>
                                            <td> <?=$Bstat= $row['status']; ?></td>
                                            <td>
                                                <!--                                        `qrcode`,  `edition`, `subject`, `callNumber -->
                                                <style>
                                                .horizontal-buttons {
                                                    display: flex;
                                                    
                                                }
                                                
                                                .horizontal-buttons > div {
                                                    margin-right: 10px; /* Adjust the margin as needed */
                                                }
                                            </style>
                                                
                                                   <div class="horizontal-buttons">            
                                         
                                                <?php if(isset($_GET['t'])){ 
                                                        
                                                        if($Bstat=='Archived'){
                                                        ?>
                                               <a  href="models/do.php?do=restoreBook&id=<?= $id; ?>" data-toggle="modal"  type="submit"
                                              class="btn btn-warning t btn-m " title="Restore"><i class="fa fa-fw fa-retweet" aria-hidden="true"> </i> </a>&nbsp;&nbsp;
                                                <?php }
                                                        ?>
                                                        <?php }else { 
                                                        if($Bstat=='Available'){
                                                        ?>
                                                         <a  href="#edit<?= $id; ?>" data-toggle="modal"  type="submit"
                                              class="btn btn-primary t btn-m " title="Edit"><i class="fa fa-fw fa-pencil"> </i> </a>  &nbsp;&nbsp;
                                               <a  href="models/do.php?do=archivedBook&id=<?= $id; ?>" onclick="return  confirm('Archived this Book?')"
                                              class="btn btn-warning t btn-m " title="Archive"><i class="fa fa-file-archive-o" aria-hidden="true"> </i> </a>&nbsp;&nbsp;
                                              <?php } }?>
                                              
                                              
                                               <a  onclick="MM_openBrWindow('gen-qr.php?qr=<?= $qrcode; ?>','','resizable=yes,width=800,height=600')"
                                               class="btn btn-info t btn-m"  title="View"
                                                             target="_blank" href=""><i class="fa fa-fw fa-eye"> </i> </a>
                                              
                                              
                                            
                                              
                                              </div>
                                               <!-- <div class="btn-group">
                                                    <button type="button" class="btn btn-danger dropdown-toggle"
                                                            data-toggle="dropdown" aria-expanded="true"><i
                                                                class="fa fa-fw fa-gear"> </i>
                                                        <span class="caret"></span>
                                                    </button>
                                                 
                                              
                                                   <ul class="dropdown-menu">
                                                        <li><a href="#edit<?= $id; ?>" data-toggle="modal">
                                                            <i class="fa fa-fw fa-pencil"> Edit</i></a></li>
                                                        <?php if(isset($_GET['t'])){ 
                                                        
                                                        if($Bstat=='Archived'){
                                                        ?>
                                                        
                                                        <li><a href="models/do.php?do=restoreBook&id=<?= $id; ?>"
                                                               onclick="return  confirm('Restore this Book?')"><i class="fa fa-retweet" aria-hidden="true"> Restore </i></a>
                                                        <?php }
                                                        ?>
                                                        <?php }else { 
                                                        if($Bstat=='Available'){
                                                        ?>
                                                        
                                                        <li><a href="models/do.php?do=archivedBook&id=<?= $id; ?>"
                                                               onclick="return  confirm('Archived this Book?')">
                                                            <i class="fa fa-file-archive-o" aria-hidden="true"> Archive </i></a>
                                                        <?php } }?>
                                                        

                                                        </li>
                                                        <li><a onclick="MM_openBrWindow('gen-qr.php?qr=<?= $qrcode; ?>','','resizable=yes,width=800,height=600')"
                                                             target="_blank" href=""><i
                                                                        class="fa fa-fw fa-eye"> View QR</i></a>
                                                        </li>

                                                    </ul>  -->
                                                </div>
                                            </td>
                                        </tr>

                                    <?php } ?>
                                    </tbody>
                                </table>
                                <!-- unang mong gawa stef-->
                              <!--   <div class="btnspace">  <a data-toggle="modal" data-target="#qrcodes" type="submit" onclick="loadQR()"
                                    class="btn btn-primary pull-right btn-m "><i class="fa fa-print"> </i> Print Selected Books </a>
                                    <input type="checkbox"  onclick="toggle(this)" > Select All Row Entries</div>
                                        <a class="btn  pull-right btn-m "></a>  -->
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
                    <h4 class="modal-title" id="exampleModalLabel">Add new books</h4>
                </div>
                <div class="modal-body">
                    <form id="addUserForm"class="form-horizontal" action="models/CRUDS.php" method="post">
                        <div class="box-body">

                            <div class="form-group"><label class="col-sm-3 ">ISBN<i style="color:red" >*</i></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="isbn" placeholder="ISBN: Ex.123-43254-123-21" id="isbn" onchange="checkForCopies()" pattern="^\d{1,13}(-?x?-?\d{1,13})*$" onchange="showCode()" required>
                                </div> <!--pattern="^\d{1,13}(-?x?-?\d{1,13})*$" -->
                            </div>
                            <script>
                                
                            </script>
                            <div class="form-group"><label class="col-sm-3">Call Number<i style="color:red" >*</i></label>
                                <div class="col-sm-9">
                             
                                <input type="text" class="form-control" name="c1" placeholder="Shelf Number" id="c1"  required>

                                

                                    <input type="text" class="form-control" name="c2" placeholder="Subject Number: Ex. C123T" id="c2"   pattern="^[A-Za-z]{0,6}\.?\d{1,6}[A-Za-z]{0,6}\.?$" title="Please enter a subject number with an optional letters and one special character (.) before and after 1-6 digits" required>  
                                    <input type="number" class="form-control" name="c3" placeholder="Year" id="c3"  min="1800" max="<?=date('Y');?>" step="1" required>
                                </div>
                            </div>
                           
                       
                            <div class="form-group"><label class="col-sm-3 ">Title<i style="color:red" >*</i></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="bookTitle" placeholder="Title" pattern="[A-Z][A-Za-z\s,.\/]*" title="Please enter a valid title. The first letter should be capitalized, and only the following special characters are allowed: period (.), comma (,), slash (/), and white space" required>
                                </div>
                            </div>
                             <div class="form-group"><label class="col-sm-3 ">Author/s<i style="color:red" >*</i></label>
                                <div class="col-sm-9">
                                    <input type="text"  class="form-control" name="author" id="author"placeholder="First Author"required>
                                    <input type="text"  class="form-control" name="author2" id="author2"placeholder="Second Author" >
                                    <input type="text"  class="form-control" name="author3" id="author2"placeholder="Third Author" >
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-3 ">Edition</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="edition" placeholder="Edition"  >
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-3 ">Subject<i style="color:red" >*</i></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-3 ">Publisher</label>
                                <div class="col-sm-9">
                                    <input type="text"  class="form-control" name="publish" placeholder="Publisher" >
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-3 ">Copyright Date</label>
                                <div class="col-sm-9">
                                    <input type="number"  min="1800" max="<?=date('Y');?>" step="1"    class="form-control" name="copyrightDate" placeholder="Copyright Date"  >
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-3 ">Book Details</label>
                                <div class="col-sm-9">
                                    <input type="text"  class="form-control" name="Bdetails" placeholder="(e.g number of pages, inches)"  >
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-3 ">Glossary/ Index</label>
                                <div class="col-sm-9">
                                    <input type="text"  class="form-control" name="glossary" placeholder="Glossary/Index"  >
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-3 ">References</label>
                                <div class="col-sm-9">
                                    <input type="text"  class="form-control" name="ref" id="ref" placeholder="References"  >
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-3 ">Bibliography</label>
                                <div class="col-sm-9">
                                    <input type="text"   class="form-control" name="bibli" id="bibli" placeholder="Bibliography"  >
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-3 ">Tracing Number</label>
                                <div class="col-sm-9">
                                    <input type="text"  class="form-control" name="trac" id="trac" placeholder="Tracing Number"  >
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-3 ">Date Added<i style="color:red" >*</i></label>
                                <div class="col-sm-9">
                                    <input type="date"  class="form-control" name="dbook" id="dbook" placeholder="Date Added" max="<?= date('Y-m-d'); ?>" required>
                                </div>
                            </div>
                            
                            <div class="form-group"><label class="col-sm-3 ">Number of Copies<i style="color:red" >*</i></label>
                                <div class="col-sm-9">
                                    <input type="number"   class="form-control" name="copies" id="copies" placeholder="Number of copies" min=2 onchange='getCopies()' required>
                                </div>
                            </div>
                            
                            
                            <div id='pacc'></div>
                            
                                <div class="form-group" id="accnumbers" style='display:none'>
                                <label class="col-sm-3"> Accession Numbers<i style="color:red" >*</i></label><div class="col-sm-9" id='acc'>
                                    
                                </div>
                                </div>    
                            
                            
                            <div class="form-group" style="display:none"><label class="col-sm-3 ">Status</label>
                                <div class="col-sm-9">
                                    <input name="status" class="form-control" value="Available" required />
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button id="cancelBtn" type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary pull-right" name="func_param" value="IUBook">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
        <!-- auto clear modal add -->    
<script>
    // Get the modal element
var modal = document.getElementById("add");
var accessions= document.getElementById("accnumbers");
var acc= document.getElementById("acc");

function getCopies(){ 
var copies= document.getElementById("copies").value;
accessions.style.display='block';
acc.innerHTML = ' ';
for (let i = 0; i < copies; i++){
    v = i+1;
        acc.innerHTML += '<input type="text"  class="form-control" name="accno'+v+'" id="accno'+v+'" placeholder="Example 12343c.1" pattern="^[0-9]+c?\.?[0-9]*$" onchange="checkDups('+v+')" title="Please enter a valid accession number. The format should be digits or `c`, followed by a period and another digit (e.g., 12343c.1)" required>';
                                
    }
    

}

function checkDups(current){
    console.log()
    var copies= document.getElementById("copies").value;
    var acc;
    for (let i = 0; i < copies; i++){
        let v = i+1; 
        acc = document.getElementById("accno"+v).value.toString();
        var cur = document.getElementById("accno"+current).value.toString();
        console.log(acc, cur);
        if (acc != ''){
             if (v != current){
                 if (acc == cur){
                    alert('You already put this accession number');
                     document.getElementById("accno"+current).value = '';
                }
            }
        }
       
                                
    }
    
}

function checkForCopies(){
    var name = $('#isbn').val(); 
    console.log(name);
    $.ajax({    
        type: "POST",
        url: "models/ajax/search_isbn.php",             
        dataType: "html", 
        data: {
            search: name
        },                 
        success: function(data){               
            $("#pacc").html(data);
        }
    });

    
}

// Get the cancel button element
var cancelBtn = document.getElementById("cancelBtn");

// Reset form fields when cancel button is clicked
cancelBtn.addEventListener("click", function() {
  var form = document.getElementById("addUserForm");
  form.reset();
  accessions.style.display='none';
  acc.innerHTML = ' ';
});

// Close the modal when cancel button is clicked
cancelBtn.addEventListener("click", function() {
  modal.style.display = "none";
});

</script>

<?php $result = $db->prepare("SELECT * FROM tbl_books ORDER BY id DESC");
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


                            <div class="form-group"><label class="col-sm-2 control-label">ISBN<i style="color:red" >*</i></label>
                                <div class="col-sm-10">
                                    <input value="<?= $row['isbn']; ?>" type="text" class="form-control"
                                           name="isbn" placeholder="ISBN: Ex.123-43254-123-21" id="isbn" pattern="^\d{1,13}(-?x?-?\d{1,13})*$" required></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Call Number<i style="color:red" >*</i></label>
                                <div class="col-sm-10">
                                    <input value="<?= $row['c1']; ?>" type="text" class="form-control" name="c1" id="c1"  required>
                                    <input value="<?= $row['c2']; ?>" type="text" class="form-control" name="c2" placeholder="Subject Number: Ex. C123T" id="c2"   pattern="^[A-Za-z]{0,6}\.?\d{1,6}[A-Za-z]{0,6}\.?$" title="Please enter a subject number with an optional letters and one special character (.) before and after 1-6 digits"  required>
                                    <input value="<?= $row['c3']; ?>" type="number" placeholder="Year" class="form-control" name="c3" id="c3"  min="1800" max="<?=date('Y');?>" step="1" required>
                                </div>
                            </div>
                         <div class="form-group"><label class="col-sm-2 control-label">Accession Number<i style="color:red" >*</i></label>
                                <div class="col-sm-10">
                                    <input type="text" value ="<?= $row['accno']; ?>" class="form-control" name="accno" placeholder="Example 12343c.1" id="accno" pattern="^[0-9]+c?\.?[0-9]*$" title="Please enter a valid accession number. The format should be digits or 'c', followed by a period and another digit (e.g., 12343c.1)" required>
                                </div>
                            </div>
                            
                            <div class="form-group"><label class="col-sm-2 control-label"> Title <i style="color:red" >*</i></label>
                                <div class="col-sm-10">
                                    <input value="<?= $row['bookTitle']; ?>" type="text" class="form-control"
                                           name="bookTitle" placeholder="Title"  pattern="[A-Z][A-Za-z\s,.\/]*" title="Please enter a valid title. The first letter should be capitalized, and only the following special characters are allowed: period (.), comma (,), slash (/), and white space" required ></div>
                            </div>

                            <div class="form-group"><label class="col-sm-2 control-label">Author/s<i style="color:red" >*</i></label>
                                <div class="col-sm-10">
                                    <input type="text" value="<?= $row['author']; ?>" class="form-control" name="author" id="author"placeholder="First Author" required>
                                    <input type="text" value="<?= $row['author2']; ?>" class="form-control" name="author2" id="author2"placeholder="Second Author" >
                                    <input type="text" value="<?= $row['author3']; ?>" class="form-control" name="author3" id="author2"placeholder="Third Author" >
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Edition</label>
                                <div class="col-sm-10">
                                    <input type="text" value="<?= $row['edition']; ?>" class="form-control" name="edition" placeholder="Edition"  >
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Subject<i style="color:red" >*</i></label>
                                <div class="col-sm-10">
                                    <input type="text" value="<?= $row['subject']; ?>" class="form-control" name="subject" placeholder="Subject" required>
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Publisher</label>
                                <div class="col-sm-10">
                                    <input type="text" value="<?= $row['publish']; ?>" class="form-control" name="publish" placeholder="Publisher" >
                                </div>
                            </div>
                                      <div class="form-group"><label class="col-sm-2 ">Copyright Date</label>
                                <div class="col-sm-10">
                                    <input type="number"  min="1800" max="<?=date('Y');?>" step="1"    value="<?= $row['copyrightDate']; ?>" class="form-control" name="copyrightDate" placeholder="Copyright Date"  >
                                </div>
                            </div>
                            
                            <div class="form-group"><label class="col-sm-2 control-label">Book Details</label>
                                <div class="col-sm-10">
                                    <input value="<?= $row['Bdetails']; ?>" type="text"  class="form-control" name="Bdetails"  >
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Glossary/ Index</label>
                                <div class="col-sm-10">
                                    <input value="<?= $row['glossary']; ?>" type="text"  class="form-control" name="glossary" placeholder="Glossary/Index"  >
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">References</label>
                                <div class="col-sm-10">
                                    <input type="text"  value="<?= $row['ref']; ?>" class="form-control" name="ref" id="ref" placeholder="References"  >
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Bibliography</label>
                                <div class="col-sm-10">
                                    <input type="text"  value="<?= $row['bibli']; ?>" class="form-control" name="bibli" id="bibli" placeholder="Bibliography"  >
                                </div>
                            </div>
                                  <div class="form-group"><label class="col-sm-2 control-label">Tracing Number</label>
                                <div class="col-sm-10">
                                    <input type="text"  value="<?= $row['trac']; ?>" class="form-control" name="trac" id="trac" placeholder="Tracing Number"  >
                                </div>
                            </div>
                             <div class="form-group">
                        <label class="col-sm-2 control-label">Date Added <i style="color:red" >*</i></label>
                        <div class="col-sm-10">
                            <input type="date" value="<?= $row['dbook']; ?>" class="form-control" name="dbook" id="dbook" placeholder="Date Added" max="<?= date('Y-m-d'); ?>" required>
                        </div>
                    </div>
                  

                            <div class="form-group"><label class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-10">
                                    <select name="status" class="form-control"  <?=($row['status']=='Borrowed' ? 'disabled' : '');  ?> required>
                                        <option></option>
                                        <?php $res = my_query("SELECT * FROM tbl_constants WHERE type='Status' AND value != 'Archived'");
                                        for ($ix = 1; $r = $res->fetch(); $ix++) { ?>
                                            <option  <?= ($row['status'] == $r['value'] ? 'selected' : ''); ?> ><?= $r['value']; ?></option>
                                        <?php } ?>
                                    </select>

                                </div>
                            </div>



                        </div>
                        <div class="modal-footer">
                            <button  type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary pull-right" name="func_param" value="IUBook">
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



<?php } ?>
<div class="modal fade" id="qrcodes" tabindex="-1" role="dialog" >
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="padding: 30px">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                <div class="modal-header">
                   
                    <h4 class="modal-title" id="exampleModalLabel">PRINT QR CODES</h4>
                    <button type="button" id="printbtn" onclick="printSelectedQR()" 
                class="btn btn-primary btn-m "><i class="fa fa-print"> </i></button>
                </div>
                <div class="modal-body"><center>
                <!--<button type="button" id="printbtn" onclick="printSelectedQR()" 
                class="btn btn-primary btn-m "><i class="fa fa-print"> </i></button> --><center><br>
                <div id="printSelectedQR" >
                                        QR CODES
                    <div id="qr-image">images here </div>

                </div>   
                
                </div>
            </div>
        </div>
    </div>
    
<script type="text/javascript">

function toggle(source) {
    var checkboxes = document.querySelectorAll('input[name="qr"]');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] != source)
            checkboxes[i].checked = source.checked;
    }
    Prt();
}

var qrArray = [];
var btitles = [];
function Prt(){
    qrArray = [];
    btitles = [];
    let checkboxes = document.querySelectorAll("input[name='qr']:checked");
    for (let i = 0 ; i < checkboxes.length; i++) {
        qrArray.push(checkboxes[i].value)
        btitles.push(checkboxes[i].getAttribute('data-valuetwo'));
    }
    loadQR(...qrArray);
    console.log(...qrArray);
    console.log(...btitles);
}




function loadQR(){
    var qrimage = document.getElementById("qr-image");
    qrimage.innerHTML = "";
    var i,data;
    console.log(qrArray);
    for (i = 0; i < qrArray.length; i++){
    data =qrArray[i];
    titles = btitles[i];
    console.log(data);
    console.log(titles);
    qrimage.innerHTML += 
            "<center><div width='40%'><i>"+data+" "+titles+"</i><br>"+
            "<img width='40%'  style='border: 1px;' src='https://chart.googleapis.com/chart?chs=500x500&cht=qr&chl=" + encodeURIComponent(data) + "'/></div></center>";

    }
    }
</script>
<script>

function printSelectedQR(){
  //  document.getElementById('printSelectedQR').style.display = 'block';
    var printContents = document.getElementById('printSelectedQR').innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    location.replace("books.php");
   // document.getElementById('printSelectedQR').style.display = 'none';
}
</script>
<script>
    function MM_openBrWindow(theURL,winName,features) { //v2.0
        window.open(theURL,winName,features);
    }
    
    
    <?php if ($_GET['t'] != 'Archived') {?>
        window.history.replaceState({}, document.title, "/public_html/main/" + "books.php");
    <?php }else{ ?>
        window.history.replaceState({}, document.title, "/public_html/main/" + "books.php?t=Archived");
     <?php } ?>
</script>
<?php include_once('layout/footer.php'); ?>