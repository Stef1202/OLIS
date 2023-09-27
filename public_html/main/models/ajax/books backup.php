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
        echo '<div class="column1"  > 
            <div class="ccard1 pload">
               <div class="row " style="text-align: left" >
                   
                   
                    <span style="text-align: left" style="color:red; >
                    <b>
                      <p style="color:black; font-size:16px;"> ISBN: '.htmlspecialchars($book[5]).'</p>
                     <p style="color:black; font-size:16px;">Shelf Number: '.htmlspecialchars($book[1]).'</p>
                        <p style="color:black; font-size:16px;">Subject Number: '.htmlspecialchars($book[2]).'</p>
                        <p style="color:black; font-size:16px;">Year: '.htmlspecialchars($book[3]).'</p>
                          <p style="color:black; font-size:16px;"> Accession Number: '.htmlspecialchars($book[15]).'</p>
                        <p style=" color:black;; font-size:16px; "text-align:center;"> Title: '.htmlspecialchars($book[6]). '</p>
                        <p style="color:black; font-size:16px;"> Author/s: '.htmlspecialchars($book[7]).', '.htmlspecialchars($book[18]).' , '.htmlspecialchars($book[19]).' </p>
                       
                        <p style=" color:black; font-size:16px;"> Edition '.htmlspecialchars($book[8]).'</p>
                      <p style=" color:black; font-size:16px; ">Subject: '.htmlspecialchars($book[9]).'</p>
                         <p style=" color:black; font-size:16px;">Publisher: '.htmlspecialchars($book[17]).'</p>
                            <p style=" color:black; font-size:16px;">Date of Publication: '.htmlspecialchars($book[11]).'</p>
                        
                        <p style="color:black; font-size:16px;"> Reference:'.htmlspecialchars($book[20]).'</p>
                        <p style="color:black; font-size:16px;"> Bibliographical:'. htmlspecialchars($book[21]).'</p> 
                         <p style="color:black; font-size:16px;"> Tracing Number:'. htmlspecialchars($book[22]).'</p> 
                         <p style="color:black; font-size:16px;"> Date Added:'. htmlspecialchars($book[23]).'</p> 
                        </b>';
                         
                         if ($book[12]=="Available") {
                            echo "<br/><p style='color: green;'><b>".htmlspecialchars($book[12])."</b></p>";
                        }
                        else{
                            echo "<br/><p style='color: red;'><b>".htmlspecialchars($book[12])."</b></p>";
                        }
                    echo '
                      
                        
                        </b>
                    </span>  
                </div>   
            </div>
        </div>';
    }
?>


