<?php 
    require_once "../config/db.php";
    $sql="select count(*) from books where Availability='Available'";
    $result= mysqli_query($con,$sql);
    $Abooks= mysqli_fetch_all($result);
    mysqli_free_result($result);

    $sql="select count(*) from books where Availability!='Available'";
    $result= mysqli_query($con,$sql);
    $Ubooks= mysqli_fetch_all($result);
    mysqli_free_result($result);

    mysqli_close($con);
?>
<html>
<head>
    <!-- CSS -->
    <link rel="stylesheet" href="../design.css">
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="stylesheet" type="text/css" href="../css/card.css">

    <!-- Bootsrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Javascript -->
    <script src="../js/action.js"></script>

    <!--Font Awesome-->
</head>
<body onload="sideNav()">

<?php 
    include_once("nav.php");
?>

<!--Top Bar-->
<div id="con">
   <div class="content">
        <div class="top_bar2">
            <a style="color: #fff; cursor: pointer;"  onclick="toggleNav()">&#9776; Online Library Information System</a>
        </div>
        <div class="cardbox" style="padding: 0 100px">
            <div class="row">
                <div class="column">
                    <div class="ccard pload">
                        <table>
                            <tr>
                                <td>
                                    <p>Available<br>Books</p>
                                </td>
                                <td>
                                    <canvas id="availBChart" style=" width: 100%;max-width: 600px; height: 300px; padding: 50px"></canvas>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="column">
                    <div class="ccard pload">
                        <canvas class="center"id="myChart" style=" width: 100%;max-width: 500px; height: 300px"></canvas>
                    </div>
                </div>
                <div class="column">
                    <div class="ccard pload">
                        <canvas class="center"id="myChart" style=" width: 100%;max-width: 500px; height: 300px"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <footer class="footer">
    <center><p>Copyright ©2023 City College of Tagaytay All Rights Reserved.</p></center>
    </footer>

</div>


<!--Scripts-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="../js/main.js"></script>
    <script>
        var Abooks =<?php echo json_encode($Abooks);?>;
        var Ubooks =<?php echo json_encode($Ubooks);?>;
        var xValues = ["Available","Unavailable"];
        var yValues = [Abooks,Ubooks];
        var barColors = [
        "#b91d47",
        "#00aba9",
        ];

        new Chart("availBChart", {
        type: "doughnut",
        data: {
            labels: xValues,
            datasets: [{
            backgroundColor: barColors,
            data: yValues,
            }]
        },
        options: {
            title: {
            display: true,
            }
        }
        });
    </script>



    
</body>
</html>