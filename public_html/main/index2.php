<?php include_once('layout/head.php'); ?>
<?php

$result = $db->prepare("SELECT   
  (SELECT COUNT(*) FROM tbl_users) AS ttUsers,
  (SELECT COUNT(*) FROM tbl_users) AS ttUser");
$result->execute();
if ($row = $result->fetch()) {
    $ttUser = $row['ttUser'];
} ?>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
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
            <h1>
                Dashboard

            </h1>
        </section>

        <!-- Main content -->
        <section class="content">


            <div class="row">
                <div class="col-xs-12">

                    <div class="box box-primary">
                        <div class="box-header">

                        </div>

<style>
    @media screen and (max-width: 768px) {
          .box-body {
           border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    padding: 10px;
    display: grid;
    align-items: center;
    justify-items: center;
    align-content: center;
    justify-content: center;
          }
        }
        @media screen and (max-width: 768px) {
              .col-xs-6 {
                width: 330px;
            }
        }
         @media screen and (max-width: 768px) {
             .mychartBox {
                width: 370px;
                height: 350px;
            }
        }
   
</style>
                        <div class="box-body">
                            <div id='alerts' class="alert alert-danger danger" style='display:none'>
                                        <strong>You have a penalty!</strong>
                                    </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <label>Borrowed book</label>
                                <div class="table-responsive"   style="    height: 340px;">
                                    <table class="table table-bordered table-striped" id="returnedBooksTable">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Book Info.</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php $result = my_query("SELECT  *,CONCAT(isbn, ' ' ,bookTitle)bookInfo,bt.created_at FROM tbl_booktransactions bt
                         INNER JOIN tbl_books b ON b.id=bt.book_id  INNER JOIN tbl_users u ON u.id=bt.user_id
                         WHERE bookStatus='Borrowed'  and user_id='$user_id' ORDER BY bt.id      DESC ");
                                        for ($i = 1; $row = $result->fetch(); $i++) { ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $row['bookInfo']; ?></td>
                                                <td><?= $row['dateBarrow']; ?></td>
                                              <td>
                                            <h4 style="font-size: 16px;color: <?= ($row['bookStatus'] == 'Borrowed' ? 'red' : 'green'); ?>"><?= $row['bookStatus']; ?>
                                                <?php
                                                $dtNow = date('Y-m-d');
                                                $date = new DateTime($row['dateBarrow']);
                                                $date->modify('+7 day');
                                                $dateWarning = $date->format('Y-m-d');


                                                if ($row['bookStatus'] == 'Borrowed') {
                                if ($dtNow >= $dateWarning) {
                                    echo '<br/> You have a penalty: ';
                                    echo '<script>alert("You have a penalty!");document.getElementById("alerts").style.display="";</script>';  // Show an alert message ?>
                                    
                            <?php    } else {
                                    echo '<br/> Return On: ' . format_date($dateWarning);
                                }
                            }; ?>


                                        </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div><br><br><br>
                                        <div class="mychartBox" id="AchartA" style="padding-bottom:30px">
                                 <label>Data Visualization Borrowed book</label>
                                 <canvas id="CategoriesA" style="padding:20px;"></canvas></div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <label>Returned book</label>
                                <div class="table-responsive" style=" height: 340px;">
                                    <table class="table table-bordered table-striped" name="returnedBooksTable"  >
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Book Info.</th>
                                            <th>Date</th>
                                             <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $result = my_query("SELECT  *,CONCAT(isbn, ' ' ,bookTitle)bookInfo,bt.created_at FROM tbl_booktransactions bt
                         INNER JOIN tbl_books b ON b.id=bt.book_id  INNER JOIN tbl_users u ON u.id=bt.user_id
                         WHERE bookStatus='Returned'   and user_id='$user_id' ORDER BY bt.id      DESC ");
                                        for ($i = 1; $row = $result->fetch(); $i++) { ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $row['bookInfo']; ?></td>
                                                <td><?= $row['dateReturn']; ?></td>
                                                 <td>
                                                    <h4 style=" font-size: 16px; color: <?= ($row['bookStatus'] == 'Borrowed' ? 'red' : 'green'); ?>"><?= $row['bookStatus']; ?>
                                                        <?php
                                                        $dtNow = date('Y-m-d');
                                                        $date = new DateTime($row['dateBarrow']);
                                                        $date->modify('+7 day');
                                                        $dateWarning = $date->format('Y-m-d');


                                                        if ($row['bookStatus'] == 'Borrowed') {
                                                            if ($dtNow >= $dateWarning) {
                                                                echo " <br/> You have a penalty";
                                                             
                                                            }else{
                                                                echo  " <br/> Return On :".format_date($dateWarning) ;
                                                            }
                                                        }; ?>


                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div><br><br><br>
                                   <div class="mychartBox" id="AchartB" style="padding-bottom:30px">
                                <label>Data Visualization Returned book</label>
                                <canvas id="CategoriesB" style="padding:20px;"></canvas>
                                </div>
                            </div>
  
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="display:none">
                                <label>Borrowed book</label>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Book Info.</th>
                                            <th>Date</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php $result = my_query("SELECT  *, MONTHNAME(dateBarrow) as rlbl, COUNT(*) as rc, CONCAT(isbn, ' ' ,bookTitle)bookInfo, bt.created_at FROM tbl_booktransactions bt
                                    INNER JOIN tbl_books b ON b.id=bt.book_id  INNER JOIN tbl_users u ON u.id=bt.user_id
                                    WHERE bookStatus='Borrowed'  and user_id='$user_id' ORDER BY bt.id      DESC ");
                                    
                                    if ($result) {
                                        // The `$arrData` array holds the chart attributes and data
                                    
                                        for ($i = 1; $row = $result->fetch(); $i++) {

                                            $Rmonths[] = $row['rlbl'];      
                                            $Rcount[] = $row['rc'];
                                        }
                                    }
                                        for ($i = 1; $row = $result->fetch(); $i++) { ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $row['bookInfo']; ?></td>
                                                <td><?= $row['dateBarrow']; ?></td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="display:none">
                                <label>Returned book</label>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Book Info.</th>
                                            <th>Date</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $result = my_query("SELECT  *,MONTHNAME(dateReturn) as clbl, COUNT(*) as cc,CONCAT(isbn, ' ' ,bookTitle)bookInfo,bt.created_at FROM tbl_booktransactions bt
                         INNER JOIN tbl_books b ON b.id=bt.book_id  INNER JOIN tbl_users u ON u.id=bt.user_id
                         WHERE bookStatus='Returned'   and user_id='$user_id' ORDER BY bt.id      DESC ");
                         if ($result) {
                            // The `$arrData` array holds the chart attributes and data
                        
                            for ($i = 1; $row = $result->fetch(); $i++) {

                                $Cmonths[] = $row['clbl'];      
                                $Ccount[] = $row['cc'];
                            }
                        }
                                        for ($i = 1; $row = $result->fetch(); $i++) { ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $row['bookInfo']; ?></td>
                                                <td><?= $row['dateReturn']; ?></td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                        
                                    </table>
                                    
                                </div>
                                
                            </div>
                            <br><br><br><br><br><br><br><br><br><br><br><br><br>
                        <!-- <div class="gg">
                            <div class="mychartBox" id="AchartA" style="padding:30px">
                                 <label>Borrowed book</label>
                                 <canvas id="CategoriesA" style="padding:20px;"></canvas></div><br><br><br><br><br><br><br><br><br><br><br>
                            
                            <div class="mychartBox" id="AchartB" style="padding:30px">
                                <label>Returned book</label>
                                <canvas id="CategoriesB" style="padding:20px;"></canvas></div>
                        </div> -->
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>


            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
                              <!-- Borrow search -->
                            <script>
    $(document).ready(function() {
        // Initialize DataTable with options
        $('#returnedBooksTable').DataTable({
            "paging": true, // Enable pagination
            "lengthMenu": [3, 6, 12, 25], // Number of entries to show in length menu
            "searching": true, // Enable search functionality
            "info": true, // Show information about the table
            "responsive": true // Enable responsive design
        });
    });
</script>
<!-- return search -->
                   <script>
    $(document).ready(function() {
        // Initialize DataTable with options
        $('table[name="returnedBooksTable"]').DataTable({
            "paging": true, // Enable pagination
            "lengthMenu": [3, 6, 12, 25], // Number of entries to show in length menu
            "searching": true, // Enable search functionality
            "info": true, // Show information about the table
            "responsive": true // Enable responsive design
        });
    });
</script>
    <script>

Chart.defaults.font.size = 15;
Chart.defaults.font.family = 'Century Gothic';
Chart.defaults.font.color = '#000';
Chart.defaults.font.weight = 'bold';
var Rmonths = <?php echo json_encode($Rmonths);?>;
var Rcount = <?php echo json_encode($Rcount);?>;
var Cmonths = <?php echo json_encode($Cmonths);?>;
var Ccount = <?php echo json_encode($Ccount);?>;

var barColors = [
    
      'rgba(255, 99, 132, 0.2)',
      'rgba(255, 159, 64, 0.2)',
      'rgba(255, 205, 86, 0.2)',
      'rgba(75, 192, 192, 0.2)',
      'rgba(54, 162, 235, 0.2)',
      'rgba(153, 102, 255, 0.2)',
      'rgba(201, 203, 207, 0.2)'
    
        ];

var brColors=[
    'rgb(255, 99, 132)',
      'rgb(255, 159, 64)',
      'rgb(255, 205, 86)',
      'rgb(75, 192, 192)',
      'rgb(54, 162, 235)',
      'rgb(153, 102, 255)',
      'rgb(201, 203, 207)'
];


var aChart = new Chart("CategoriesA", {
  type: "bar",
  data: {
    labels: Rmonths,
    datasets: [{
    barThickness: 30,
    axis: 'y',
    data: Rcount,
    backgroundColor: barColors,
    borderColor:brColors,
      borderWidth: 1
  }]
  },
  options: {
    maintainAspectRatio: false,
    scales: {
        yAxes: { display: true,
            title: {
                display: true,
                
                
                text: 'Months'
            },ticks: {mirror: true}},
            
            
            
        xAxes: { display: true,
            title: {
                display: true,
                text: 'Number of Borrowed Books'
            },ticks: {
        beginAtZero: true,
        callback: function(value) {if (value % 1 === 0) {return value;}}}}
    },
    plugins: {
            legend: {
                display: false,
                labels: {
                    font: {
                        size: 15,
                    }
                }
            },
             tooltip: {
                    callbacks: {
                        label: (context) => {
                       
                            return `${context.raw} Borrowed books `
                            
                        }
                    }
                }
        },
    indexAxis: 'y',
}});

var bChart = new Chart("CategoriesB", {
  type: "bar",
  data: {
    labels: Cmonths,
    datasets: [{
    barThickness: 30,
    axis: 'y',
    data: Ccount,
    backgroundColor: barColors,
    borderColor:brColors,
      borderWidth: 1
  }]
  },
  options: {
    maintainAspectRatio: false,
    scales: {
        yAxes: {display: true,
            title: {
                display: true,
                text: 'Months'
            },ticks: {mirror: true}},
        xAxes: { display: true,
            title: {
                display: true,
                text: 'Number of Returned Books'
            },ticks: {
        beginAtZero: true,
        callback: function(value) {if (value % 1 === 0) {return value;}}}}
    },
    plugins: {
            legend: {
                display: false,
                labels: {
                    font: {
                        size: 15,
                    }
                }
            },
             tooltip: {
                    callbacks: {
                        label: (context) => {
                       
                            return `${context.raw} Returned books `
                            
                        }
                    }
                }
        },
    indexAxis: 'y',
}});


let totalbarsA = aChart.config.data.labels.length;

if(totalbarsA > 15){
    newheight = (totalbarsA - 15) * 30 +chartHeight;
    document.getElementById('AchartA').style.height =newheight + 'px';
}

let totalbarsB = bChart.config.data.labels.length;

if(totalbarsB > 15){
    newheight = (totalbarsB - 15) * 30 +chartHeight;
    document.getElementById('AchartB').style.height =newheight + 'px';
}





</script>

<?php include_once('layout/footer.php'); ?>