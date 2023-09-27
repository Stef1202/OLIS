
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> <?=$title;?></title>
    <link rel="shortcut icon" href="../assets/images/cctlogo.png" />
<!--    <link rel="shortcut icon" href="logo.png"/>-->
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../assets/plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../assets/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../assets/dist/css/skins/_all-skins.min.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="../assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!--Refresh JS -->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../css/card.css">
    <link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="stylesheet" type="text/css" href="public_html/css/main.css">
	<link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<?php
if(!isset($_SESSION))   {    session_start();   }

function db_connect(){

    $hostname="localhost";

    $dbname="u823561260_library";
    $username="root";
    $password="";
 
//   $dbname="librarydb";
//     $username="root";
//     $password="";

    $db = new PDO("mysql:host=$hostname;dbname=$dbname",$username,$password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
}

$db = db_connect(); ?>
<style>

/* CSS */
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



<!-- print button -->
<button class="btn btn-primary pull-right btn-m " onclick='print()'><i class="fa fa-print"> </i> Print </button>

<!-- printable area -->
<div class="box-body" >
<div class="table-responsive" id="printableArea">
        <div id='contents' style='display:none'>
        <div id="header">
                    <table width="100%" style=" padding: 0 50px">
                        <tr style="vertical-align:top;">
                            <td width="25%" style="border:1 px; padding: 20px 50px">
                                <img src="../img/seal.png" class="dis-inline-block">
                            </td>
                            <td width="50%"style="border:0; padding: 20px" align="center">
                                <h4 class="dis-inline">City College of Tagaytay</h4><br>
                                <h5 class="dis-inline">Library</h5><br>
                                <h5 class="dis-inline">Akle St., Kaybagal South, Tagaytay City 4120</h5><br>
                                <h5 class="dis-inline">Tel. Nos. (046) 483-0470 / (046) 483-0672 </h5><br><br>
                                <h3>Book Report</h3><!--Sample lang-->
                                    
                            </td>
                                <td width="10%" style="border:0; padding: 10px 15px">
                                <img src="../img/cct-icon.png" class="dis-inline-block">
                            </td>
                            <td width="20%" style="border:0"></td>
                        </tr>
                    </table>
        </div>

        <!-- Yung table -->
        <table  class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>ISBN</th>
                    <th>Accession Number</th>
                    <th>Call Number</th>
                <th>Title</th>
                <th>Author</th>
                <th>Date Published</th>
                <th>Date Added</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <?php
           
            $result = $db->prepare("SELECT * FROM tbl_books b  ORDER BY id DESC");
            $result->execute();
            for ($i = 1; $row = $result->fetch(); $i++) {
                $id = $row['id']; $qrcode=$row['qrcode'];
                ?>
                <tr>
                    <td> <?= $i; ?></td>
                    <td> <?= $row['isbn']; ?></td>
                        <td> <?= $row['accno']; ?></td>
                    <td><?= $row['c1'] . '<br> ' . $row['c2'] . '<br> '. $row['c3']; ?></td>

                        
                    <td> <?= $row['bookTitle']; ?></td>
                    <td> <?= $row['author']; ?></td>
                    <td> <?= $row['copyrightDate']; ?></td>
                    <td> <?= format_date($row['dbook']); ?></td>
                    <td> <?= $row['status']; ?></td>

                </tr>

            <?php } ?>
               
            </tbody>
        </table>
   

    
        <div id='Signature'>
        <table width="100%" style=" padding: 0 50px">
            <tr style="vertical-align:bottom;">
                <td width="50%"style="border:0; padding: 20px" align="right">
                    <br><br>
                    <p class="dis-inline">________________________</p><br>
                    <p class="dis-inline">Signature over printed name</p>
                    <br><br>
                </td>
            </tr>
        </table>
        </div>
        </div>
            
         
    </div> 
</div>





<!-- JAVASCRIPT -->

<script>
        function MM_openBrWindow(theURL,winName,features) { //v2.0
            window.open(theURL,winName,features);
        }
    </script>

<script>
    
    
        function print() {
            document.getElementById('contents').style.display = 'block';
            var printContents = document.getElementById('printableArea').innerHTML;
            
            document.body.innerHTML = printContents;
            window.print();
  
            document.getElementById('contents').style.display = 'none';
        }
        
    </script>