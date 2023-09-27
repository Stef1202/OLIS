<?php 
//sample database - di na tinanggal nakakatamad
    
    include_once('db.php');

    //if(isset($_GET['search'])) {$search = $_GET['search'];}
    $search = $_POST['search'];
    $sql="Select * from tbl_books WHERE 
                        isbn = '$search'
                        order by bookTitle";
    $result= mysqli_query($con, $sql);
    $books= mysqli_fetch_all($result);
    
    mysqli_free_result($result);
    mysqli_close($con);

    $i=0;
    
    echo ' <div class="form-group" id="paccnumbers">
                                <label class="col-sm-3"> Past Accession Numbers<i style="color:red" ></i></label><div class="col-sm-9">';
    foreach($books as $book){
        $i += 1;
                     echo '<input type="text"  class="form-control" value="'.$book[15].'"  readonly>';
                               
                 
    }
    
    if($i == 0){
         echo '<input type="text"  class="form-control" value="None"  readonly>';
    }
    
    echo ' </div></div> ';
?>

