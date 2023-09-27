<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     
    <link rel="stylesheet" href="css/bs/bootstrap.css">
    <title>CCT OLIS</title>
    
    <style>
        .container {
            margin-top: 50px;
        }
        .card {
            border-radius: 0;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .card-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
        }
        .card-title {
            margin-bottom: 0;
            text-align: center;
    padding-bottom: 30px;
    padding-top: 30px;
        }
        .card-body {
            text-align: center;
                height: 80px;
                align-self: center;
                display: grid;
                justify-items: center;
                align-items: center;
                justify-content: center;
        }
        .col-md-8{
            width: 40px;
    vertical-align: top;
        }
    </style>
</head>
<?php include_once('layout/head.php'); ?>
<body>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Data Base</h1>
            <ol class="breadcrumb">
                <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                <li class="active">Database</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <!-- Result -->
                            <?php if (isset($_GET['r'])): ?>
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
                            <?php endif; ?>
                        </div>
                        
                        <div class="box-body" style="height: 410px;">
                                
                            <div class="container">
                                 <h1 class="card-title">Backup Database</h1>
                                <div class="row" style="display: grid;
    justify-content: center;r">
                                  
                                 
                                       
                                              
                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#confirmationModal">Download</button>
                                                  
                                     
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Confirmation Modal -->
    <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel" style="font-size: 22px;">Confirmation</h5>
                    <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">  
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
                <div class="modal-body">
                    Are you sure you want to download?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <a href="../backup/backup.php" class="btn btn-success">Yes</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
<?php include_once('layout/footer.php'); ?>