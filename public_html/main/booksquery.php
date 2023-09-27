<?php 
//sample database
        $hostname = "localhost";
        $dbname = "u823561260_library";
        $username = "root";
        $password = "";
    $con=mysqli_connect($hostname,$username,$password,$dbname);

    if(!$con){
        echo "Connection error: ".mysqli_connect_error();
    }
    $sql="Select * from tbl_books order by bookTitle";
    $result= mysqli_query($con, $sql);
    $books= mysqli_fetch_all($result);
    
    mysqli_free_result($result);
    mysqli_close($con);
    ?>