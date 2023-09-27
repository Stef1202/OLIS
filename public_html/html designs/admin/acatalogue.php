<html>
<head>
    <!-- CSS -->
    <link rel="stylesheet" href="../design.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/card.css">

    <!-- Bootsrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Javascript -->
    <script src="../action.js"></script>

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.css" integrity="sha512-2dJkRM/DmWkZqINs3QixNKKsgG9mlBT9/PieLVF8OEGHCpPNBoPFYmGPL/yD7JuQVVm2IESF5K0zTDBaf4qehQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body onload="sideNav()">

<?php 
    include_once("nav.php");
?>
<!--Top Bar-->
<div id="con">
    <div class="top_bar2">
        <a style="color: #fff; cursor: pointer;"  onclick="toggleNav()">&#9776; Online Library Information System</a>
    </div>
    <?php 
        include_once("../catalogue.php");
    ?>
    <footer class="footer">
    <center><p>Copyright ©2023 City College of Tagaytay All Rights Reserved.</p></center>
    </footer>
</div>



<!--Scripts-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="../js/main.js"></script>
    <script>
        function sideNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("con").style.marginLeft = "250px";
        }
        function toggleNav() {
            var element = document.getElementById("mySidenav");
            var main =document.getElementById("con");
            if (element.style.width == "250px") {
                element.style.width = "0px";
                main.style.marginLeft = "0px";
            } else {
                element.style.width = "250px";
                main.style.marginLeft = "250px";
            }
}
        </script>
</body>
</html>