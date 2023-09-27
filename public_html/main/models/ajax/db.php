<?php 

$hostname="localhost";
$dbname="u823561260_library";
$username="root";
$password="";
$con=mysqli_connect($hostname,$username,$password,$dbname);

// $hostname="127.0.0.1";
// $dbname="u823561260_library";
// $username="u823561260_library";
// $password="#Asd1234";
// $con=mysqli_connect($hostname,$username,$password,$dbname);

if(!$con){
    echo "Connection error: ".mysqli_connect_error();
}
?>
<!--$hostname="sg-nme-web604.main-hosting.eu";-->

<!--    $dbname="u823561260_library";-->
<!--    $username="u823561260_library";-->
<!--    $password="Z@g8D1H]Ugu";-->