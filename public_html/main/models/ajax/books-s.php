<?php 
//sample database
    include_once('db.php');
    $sql="Select * from tbl_books
                        order by bookTitle";

    $result= mysqli_query($con, $sql);
    $books= mysqli_fetch_all($result);
    
    mysqli_free_result($result);
    mysqli_close($con);

    
    foreach($books as $book){
        $id = $book[0];        
        echo '<div class="column" > 
                        <div class="ccard pload" >
                           <div class="row">
                                <span class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="text-align: left">
                                    <b>
                                    <p style="color:black; font-size:16px;">'.htmlspecialchars($book[1]).'</p>
                                    <p style="color:black; font-size:16px;">'.htmlspecialchars($book[2]).'</p>
                                    <p style="color:black; font-size:16px;">'.htmlspecialchars($book[3]).'</p>';
                                    
                                    if ($book[12]=="Available")
                                        { echo "<br/><p style='color: green;'><b>".htmlspecialchars($book[12])."</b></p>";}
                                    else 
                                        {echo "<br/><p style='color: red;'><b>".htmlspecialchars($book[12])."</b></p>" ;}
                               
                               echo '</span>
                                <span class="col-lg-9 col-md-9 col-sm-9 col-xs-9" style="text-align: left">
                                    <p style="text-transform:uppercase; color:black; font-size:16px;"> &emsp; &emsp;'.htmlspecialchars($book[9]).'
                                    <p style="color:black; font-size:16px;">'.htmlspecialchars($book[7]).'
                                     <p style="color:black; font-size:16px;"> &emsp; &emsp;'.htmlspecialchars($book[6]).' / '.htmlspecialchars($book[7]).', '.htmlspecialchars($book[18]).', '.htmlspecialchars($book[19]).' '.htmlspecialchars($book[8]).'--'.htmlspecialchars($book[17]).', c'.htmlspecialchars($book[11]).'.</p>
                                    <p style="color:black; font-size:16px;"> &emsp; &emsp;'.htmlspecialchars($book[14]).'</p><br>
                                     <p style="color:black; font-size:16px;"> &emsp; &emsp;Reference:'.htmlspecialchars($book[20]).'</p>
                                    <p style="color:black; font-size:16px;"> &emsp; &emsp;Bibliographical:'.htmlspecialchars($book[21]).'</p>
                                    <p style="color:black; font-size:16px;"> &emsp; &emsp;ISBN: '.htmlspecialchars($book[5]).'</p><br>
                                    </b>
                                </span> 
                            </div> 
                        </div>
                    </div>';
    }
?>


