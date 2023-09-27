  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


    
<?php include_once('layout/head.php'); ?>

<?php


$result = $db->prepare("SELECT   
  (SELECT COUNT(*)  FROM tbl_booktransactions bt     WHERE bookStatus='Borrowed'  ORDER BY bt.id      DESC) AS ttBorrowed,
  (SELECT COUNT(*)  FROM tbl_booktransactions bt    WHERE bookStatus='Returned'  ORDER BY bt.id      DESC) AS ttReturned,
  (SELECT COUNT(*) FROM tbl_books) AS ttBooks,
  (SELECT COUNT(*) FROM tbl_users) AS ttUsers,
  (SELECT COUNT(*) FROM tbl_users WHERE status != 'Active') AS ttDUsers,
  (SELECT COUNT(*) FROM tbl_users) AS ttUser");
$result->execute();
if ($row = $result->fetch()) {
    $ttUser = $row['ttUser'];
    ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
      
        <!-- Main content -->
         <section class="content-header">
            <h1>
                Dashboard
                <small>Welcome</small>
            </h1>
        </section>
        <section class="content">


            <div class="row">
                <div class="col-xs-12">

                    <div class="box box-primary">
                        <div class="box-header">

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">


                         <?php if ($_SESSION['role'] == 'Admin') { ?>
                            <div class="col-lg-6 col-xs-12">
                                <!-- small box -->
                                <div class="small-box bg-aqua">
                                    <div class="inner">
                                        <h4><b><?= $ttUser ?></b></h4>
                                        <h3><b>Users</b></h3>
                                    </div>
                                    <div class="icon">
                                       
                                    </div>
                                    <a href="users.php" class="small-box-footer">
                                        More info <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            
                            <div class="col-lg-6 col-xs-12">
                                <!-- small box -->
                                <div class="small-box bg-yellow">
                                    <div class="inner">
                                        <h4><?= $row['ttDUsers'] ?></h3>
                                        <h3 style="margin-top: 0; overflow-wrap: break-word; ">Deactivated Accounts</h3>
                                    </div>
                                    <div class="icon">
                                       
                                    </div>
                                    <a href="deactivate.php" class="small-box-footer">
                                        More info <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>


                       
         <div class="box-body">
            
                <label><br>
      
            <br></label>
            
                <!--                                </div>-->
                                                </div>
                                                <!-- endadmin visua -->
                        </div>
                        
              
                    <div class="box-body">
                    
                                                <div class="col-12">
                                                    <label>Users</label>
                                                   
                    
                                                     <?php 
                                   
                                                        $strQuery = "SELECT role as labels, COUNT(*) as users FROM tbl_users  WHERE status = 'Active' GROUP BY role";
                    
                                                        // Execute the query, or else return the error message.
                                                        $result = $db->query($strQuery) or exit("Error code ({$db->errno}): {$db->error}");
                                                        
                                                        // If the query returns a valid response, prepare the JSON string
                                                        if ($result) {
                                                            // The `$arrData` array holds the chart attributes and data
                                                        
                                                            for ($i = 1; $row = $result->fetch(); $i++) {
    
                                                                $roles[] = $row['labels'];      
                                                                $users[] = $row['users'];
                                                            }
                                                        }
                    
                     
                                                    ?>
                                                    
                                                      <?php 
                                   
                                                        $strQuery = "SELECT role as labels, COUNT(*) as users FROM tbl_users WHERE status != 'Active'  GROUP BY role";
                    
                                                        // Execute the query, or else return the error message.
                                                        $result = $db->query($strQuery) or exit("Error code ({$db->errno}): {$db->error}");
                                                        
                                                        // If the query returns a valid response, prepare the JSON string
                                                        if ($result) {
                                                            // The `$arrData` array holds the chart attributes and data
                                                        
                                                            for ($i = 1; $row = $result->fetch(); $i++) {
    
                                                                $Droles[] = $row['labels'];      
                                                                $Dusers[] = $row['users'];
                                                            }
                                                        }
                    
                     
                                                    ?>
                    
                                                   
                                                    <div class="mychartBox" id="AchartU"><canvas id="Users" style="padding:20px;"></canvas></div>
                                                    <!--</div>-->
                                                 </div>
                                                    <?php } ?>
                                                    <!-- end return visua-->
            
                
                 <?php if ($_SESSION['role'] == 'Librarian') { ?>
                            
                            <div class="col-lg-4 col-xs-12">
                                <!-- small box -->
                                <div class="small-box bg-yellow">
                                    <div class="inner">
                                        <h4><b><?= $row['ttBooks'] ?></b></h4>
                                        <h3><b> Book Collection</b></h3>
                                    </div>
                                    <div class="icon">
                                       
                                    </div>
                                    <a href="books.php?" class="small-box-footer">
                                        More info <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <style>
    .icon {
        font-size: 10px; /* Adjust the size to your desired value */
    }
</style>


                            <div class="col-lg-4 col-xs-12">
                                <!-- small box -->
                                <div class="small-box bg-green">
                                    <div class="inner">
                                        <h4><b><?= $row['ttBorrowed'] ?></b></h4>
                                        <h3><b> Borrowed  </b></h3>
                                    </div>
                                    <div class="icon">
                                       
                                    </div>
                                    <a href="transactions.php?t=Borrowed" class="small-box-footer">
                                        More info <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-xs-12">
                                <!-- small box -->
                                <div class="small-box bg-red">
                                    <div class="inner">
                                        <h4><b><?= $row['ttReturned'] ?></b></h4>
                                        <h3><b>Returned </b></h3>
                                    </div>
                                    <div class="icon">
                                       
                                    </div>
                                    <a href="transactions.php?t=Returned" class="small-box-footer">
                                        More info <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>

                        </div>
                 <div class="box-body">
                <label><br>
      
            <br>Monthly Borrowed and Returned Books</label>
                <div class="col-12">
                    <div class="c50" style="text-align: center;">
                        <div class="cdoughnut"><canvas id="BorrowReturn" style="padding:0px;"></canvas></div>
                        <label style ="font-size: 13px;">Borrowed </label>
                    </div>
                    <div class="c50" style="text-align: center;">
                    <div class="cdoughnut"><canvas id="Return" style="padding:0px;"></canvas></div>
                     <label style ="font-size: 13px;">Returned </label>
                    </div>
                </div>
                
                <style>
                    
        @media screen and (max-width: 600px) {
          .col-12 {
            padding: 0px;
             
            display: grid;
            align-content: center;
            justify-content: center;
            justify-items: center;
            align-items: center;
          }
        }
         @media screen and (max-width: 600px) {
          .c50 {
          /*width:200%;*/
              width: 600px;
          }
        }
        @media screen and (max-width: 600px) {
          .mychartBox {
            padding: 20px;
            display: block;
            box-sizing: border-box;
            height: 890px;
            width: 365px;
          }
        }
        
        
           

                </style>
                                            <div class="col-12">
                                                <label>Borrowed Books</label>
                                                <?php 
                                                  //   WHERE  dateBarrow  BETWEEN '$d1' AND '$d2' 
                                                    $strQuery = "SELECT MONTHNAME(dateBarrow) as lbl, COUNT(*) as c FROM tbl_booktransactions GROUP BY MONTHNAME(dateBarrow)   ORDER BY MONTHNAME(dateBarrow) DESC   LIMIT 12  ";
                
                                                    // Execute the query, or else return the error message.
                                                    $result = $db->query($strQuery) or exit("Error code ({$db->errno}): {$db->error}");
                
                                                    // If the query returns a valid response, prepare the JSON string
                                                    if ($result) {
                                                        // The `$arrData` array holds the chart attributes and data
                                                    
                                                        for ($i = 1; $row = $result->fetch(); $i++) {

                                                            $Bmonths[] = $row['lbl'];      
                                                            $Bcount[] = $row['c'] ;
                                                        }
                                                    }
                
                 
                                                ?>
                
                                               
                                                <?php 
                                                  //   WHERE  dateBarrow  BETWEEN '$d1' AND '$d2' 
                                                    $strQuery = "SELECT subject as slbl, COUNT(*) as borrowed FROM tbl_books WHERE status='Borrowed' GROUP BY subject;";
                
                                                    // Execute the query, or else return the error message.
                                                    $result = $db->query($strQuery) or exit("Error code ({$db->errno}): {$db->error}");
                
                                                    // If the query returns a valid response, prepare the JSON string
                                                    if ($result) {
                                                        // The `$arrData` array holds the chart attributes and data
                                                    
                                                        for ($i = 1; $row = $result->fetch(); $i++) {

                                                            $subj[] = $row['slbl'];      
                                                            $availb[] = $row['borrowed'];
                                                        }
                                                    }
                
                 
                                                ?>
                                               <div class="mychartBox" id="AchartA"><canvas id="CategoriesA" style="padding:20px;"></canvas></div>
                                                </div>
                                                </div>
                                                
                                                <?php } ?>
                                
                                
                                                    
                     <?php if ($_SESSION['role'] == 'Librarian') { ?>
                     <div class="box-body">
                    
                                                <div class="col-12">
                                                    <label>Returned/Available Books</label>
                                                   
                    
                                                    <?php 
                                                      //   WHERE  dateBarrow  BETWEEN '$d1' AND '$d2' 
                                                        $strQuery = "SELECT MONTHNAME(dateReturn) as rlbl, COUNT(*) as rc FROM tbl_booktransactions WHERE dateReturn IS NOT NULL GROUP BY MONTHNAME(dateReturn)   ORDER BY MONTHNAME(dateReturn) DESC   LIMIT 12  ";
                    
                                                        // Execute the query, or else return the error message.
                                                        $result = $db->query($strQuery) or exit("Error code ({$db->errno}): {$db->error}");
                                                        
                                                        // If the query returns a valid response, prepare the JSON string
                                                        if ($result) {
                                                            // The `$arrData` array holds the chart attributes and data
                                                        
                                                            for ($i = 1; $row = $result->fetch(); $i++) {
    
                                                                $Rmonths[] = $row['rlbl'];      
                                                                $Rcount[] = $row['rc'];
                                                            }
                                                        }
                    
                     
                                                    ?>
                    
                                                    <?php 
                                                      //   WHERE  dateBarrow  BETWEEN '$d1' AND '$d2' 
                                                        $strQuery = "SELECT subject as albl, COUNT(*) as available FROM tbl_books WHERE status='Available' GROUP BY subject;";
                    
                                                        // Execute the query, or else return the error message.
                                                        $result = $db->query($strQuery) or exit("Error code ({$db->errno}): {$db->error}");
                    
                                                        // If the query returns a valid response, prepare the JSON string
                                                        if ($result) {
                                                            // The `$arrData` array holds the chart attributes and data
                                                        
                                                            for ($i = 1; $row = $result->fetch(); $i++) {
    
                                                                $asubj[] = $row['albl'];      
                                                                $aavailb[] = $row['available'];
                                                            }
                                                        }
                                                        
                     
                                                    ?>
                                                    <div class="mychartBox" id="AchartB"><canvas id="CategoriesB" style="padding:20px;"></canvas></div>
                                                    </div>
                                                    </div>
                                                    
                                                    <?php } ?>
                                
 

                       
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

   
    <script>
Chart.defaults.font.size = 14;
Chart.defaults.font.family = 'Century Gothic';
Chart.defaults.font.color = '#000';
Chart.defaults.font.weight = 'bold';
<?php if ($_SESSION['role'] == 'Librarian') { ?>
var Bmonths = <?php echo json_encode($Bmonths);?>;
var Bcount = <?php echo json_encode($Bcount);?>;
<?php } ?>
<?php if ($_SESSION['role'] == 'Admin') { ?>
var Roles = <?php echo json_encode($roles);?>;
var Users = <?php echo json_encode($users);?>;
var DRoles = <?php echo json_encode($Droles);?>;
var DUsers = <?php echo json_encode($Dusers);?>;
<?php } ?>

var barColors = [
    
      'rgba(254,192,1, 0.2)',
      'rgba(2, 162, 185, 0.2)',
      'rgba(222,62,68, 0.2)',
      'rgba(2,162,185, 0.2)',
      'rgba(54, 162, 235, 0.2)',
      'rgba(27,163,69, 0.2)',
      'rgba(0,129,255, 0.2)'
    
        ];

var brColors=[
    'rgb(254,192,1)',
      'rgb(2, 162, 185)',
      'rgb(222,62,68)',
      'rgb(2,162,185)',
      'rgb(54, 162, 235)',
      'rgb(27,163,69)',
      'rgb(0,129,255)'
];
<?php if ($_SESSION['role'] == 'Librarian') { ?>
var Bchart = new Chart( document.getElementById("BorrowReturn"), {
  type: "line",
  data: {
    labels: Bmonths,
    datasets: [{ 
      data: Bcount,
      backgroundColor: barColors,
      borderColor:brColors,
      borderWidth: 1,

  }]
  },
  options: 
  {
            
            title: {
            display: true,
            },
            plugins: {
                legend :{
                    display: false
                   },
                tooltip: {
                    callbacks: {
                        label: (context) => {
                            return `${context.raw} borrowed books (${context.label})`
                        }
                    }
                }
            }
            
            
        }
});
<?php }else{ ?>
var UserChart = new Chart( document.getElementById("Users"), {
  type: "bar",
  data: {
    labels: Roles,
    datasets: [{ 
      data: DUsers,
      label: 'Deactivated',
      backgroundColor: 'rgba(243, 156, 18, 0.7)',
      borderWidth: 1,
      borderRadius: 20,
  },{ 
      label: 'Active',
      data: Users,
      backgroundColor: 'rgba(0, 192, 239, 0.7)',

      borderWidth: 1,
      borderRadius: 20,
  }
  ]
  },
   options: {
    scales: {
         x: {
        stacked: true,
        display: true,
            title: {
                display: true,
                text: 'Users',
          font: {
            size: 15,
            weight: 'bold',
            lineHeight: 1.2,
          },
            },
      },
      y: {
        stacked: true,
        display: true,
            title: {
                display: true,
                text: 'Total Number',
                font: {
            size: 15,
            weight: 'bold',
            lineHeight: 1.2,
          },
            },
        ticks: {
        beginAtZero: true,
        callback: function(value) {if (value % 1 === 0) {return value;}}}
      },
        
    },
    maintainAspectRatio: false,
    plugins: {
            legend: {
                display: true
            },
        }
    
}
});
<?php } ?>

<?php if ($_SESSION['role'] == 'Librarian') { ?>
var subjects = <?php echo json_encode($subj);?>;
var subjectAdjusted = subjects.map(label => label.split(' '));
var available_books = <?php echo json_encode($availb);?>;
let chartHeight = 350;

var cChart = new Chart("CategoriesA", {
  type: "bar",
  data: {
    labels: subjects,
    datasets: [{
    barThickness: 30,
    axis: 'y',
    data: available_books,
    backgroundColor: barColors,
    borderColor:brColors,
      borderWidth: 1
    
  }]
  },
  options: {
    scales: {
        yAxes: {
            display: true,
            title: {
                display: true,
                text: 'Subjects'
            },
            ticks: {mirror: true}},
        xAxes: {
             display: true,
            title: {
                display: true,
                text: 'Number of Borrowed Books'
            },
            ticks: {
        beginAtZero: true,
        callback: function(value) {if (value % 1 === 0) {return value;}},
            
        } }, 
       
    },
    maintainAspectRatio: false,
    indexAxis: 'y',
    plugins: {
            legend: {
                position: 'bottom',
                labels :{
                    generateLabels: (chart) => {
                        const { backgroundColor } = chart.data.datasets[0]; // Get the background colors array
                        const { borderColor } = chart.data.datasets[0]; // Get the background colors array
                        return chart.data.labels.map( 
                                      
                            (label, index) => ({
                                    text: label,
                                    fillStyle: backgroundColor[index % backgroundColor.length],
                                    strokeStyle: borderColor[index % borderColor.length],
                                })
                        )
                    }
                },
            },
            tooltip: {
                    callbacks: {
                        label: (context) => {
                            return `${context.raw} borrowed books with ${context.label} subject`
                            
                        }
                    }
                }
        }
    
}});


let totalbarsB = cChart.config.data.labels.length;

if(totalbarsB > 15){
    newheight = (totalbarsB - 15) * 30 +chartHeight;
    document.getElementById('AchartA').style.height =newheight + 'px';
}
console.log(document.getElementById('AchartA').style.height);




var Rmonths = <?php echo json_encode($Rmonths);?>;
var Rcount = <?php echo json_encode($Rcount);?>;

var Rchart = new Chart( document.getElementById("Return"), {
  type: "line",
  data: {
    labels: Rmonths,
    datasets: [{ 
      data: Rcount,
      backgroundColor: barColors,
      borderColor:brColors,
      borderWidth: 1,

  }]
  },
  options: {
            
            title: {
            display: true,
            },
            
            plugins: {
                legend :{
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: (context) => {
                           
                            return `${context.raw} returned books (${context.label}) `
                        }
                    }
                }
            }
        }
});


var asubjects = <?php echo json_encode($asubj);?>;
var asubjectsAdjusted =asubjects.map(label => label.split(' '));
var aavailable_books = <?php echo json_encode($aavailb);?>;

var aChart = new Chart("CategoriesB", {
  type: "bar",
  data: {
    labels: asubjects,
    datasets: [{
    barThickness: 25,
    axis: 'y',
    data: aavailable_books,
    backgroundColor: barColors,
    borderColor:brColors,
    borderWidth: 1
  }]
  },
  options: {
    maintainAspectRatio: false,
    scales: {
        yAxes: {
            display: true,
            title: {
                display: true,
                text: 'Subjects'
            },
            ticks: {mirror: true}},
        xAxes: {
            display: true,
            title: {
                display: true,
                text: 'Number of Available Books'
            },
            
            ticks: {
        beginAtZero: true,
        callback: function(value) {if (value % 1 === 0) {return value;}}}}
    },
    plugins: {
             legend: {
                position: 'bottom',
                labels :{
                    font: {
                        size: 15,
                    },
                    generateLabels: (chart) => {
                        const { backgroundColor } = chart.data.datasets[0]; // Get the background colors array
                        const { borderColor } = chart.data.datasets[0]; // Get the background colors array
                        return chart.data.labels.map( 
                                      
                            (label, index) => ({
                                    text: label,
                                    fillStyle: backgroundColor[index % backgroundColor.length],
                                    strokeStyle: borderColor[index % borderColor.length],
                                })
                        )
                    }
                },
            },
            
            
             tooltip: {
                    callbacks: {
                        label: (context) => {
                          
                            return `${context.raw} available books with ${context.label} subject`
                            
                        }
                    }
                }
        },
    indexAxis: 'y',
}});


let totalbarsA = aChart.config.data.labels.length;

if(totalbarsA > 15){
    newheight = (totalbarsA - 15) * 30 +chartHeight;
    document.getElementById('AchartB').style.height =newheight + 'px';
}
console.log(document.getElementById('AchartB').style.height);

<?php } ?>
</script>
    <?php } ?>
<?php include_once('layout/footer.php'); ?>