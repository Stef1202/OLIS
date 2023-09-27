<?php 
    $con=mysqli_connect('localhost','root','','books');

    if(!$con){
        echo "Connection error: ".mysqli_connect_error();
    }
?>