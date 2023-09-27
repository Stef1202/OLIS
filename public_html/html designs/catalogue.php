<?php 
//sample database
    require_once "config/db.php";
    $sql="Select * from books order by title";
    $result= mysqli_query($con, $sql);
    $books= mysqli_fetch_all($result);
    
    mysqli_free_result($result);
    mysqli_close($con);
    ?>

<!--Catalogue-->

<div class="c_container" width="100%" height="100%">
    <div class="searchcontainer pload">
        <div class="searchbox">
            <div class="searchinput">
                <form action="">
                <input type="search" style="width: 100%;" id ="search" name="search" onkeyup="Search()" placeholder="Search books"/>
                </form>
            </div>
        </div>     
    </div>
    <div class="space"></div>
    <div class="cardbox" >
        <div class="row" id="books">
            <?php
                foreach($books as $book){
                    ?>
                    <div class="column">
                        <div class="ccard pload" id="hoverChange">
                            <table><tr>
                                <td width="10%" style="text-align: left; vertical-align: top;">
                                    <p><?php echo htmlspecialchars($book[3])?></p>
                                    <p><?php echo htmlspecialchars($book[4])?></p>
                                    <p><?php echo htmlspecialchars($book[5])?></p>
                                </td>
                                <td width="auto" style="text-align: center;">
                                    <h1 style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; "><?php echo htmlspecialchars($book[0])?></h1>
                                    <p><?php echo htmlspecialchars($book[1])?></p>
                                    <p><?php echo htmlspecialchars($book[2])?></p>
                                    <p><?php echo htmlspecialchars($book[8])?></p>
                                    <p><?php echo htmlspecialchars($book[6])?></p>
                                    <?php if ($book[7]=="Available") echo "<br/><p style='color: green;'>".htmlspecialchars($book[7])."</p>";
                                        else echo "<br/><p style='color: red;'>".htmlspecialchars($book[7])."</p>" ?></p>
                                </td>
                             </tr></table>
                        </div>
                    </div>
                        <?php
                }
                ?>
        </div>
    </div>
</div>


<script>
    function Search(){
        var txt, i, a;
        var filter=document.getElementById("search");
        var input=filter.value.toUpperCase();
        var cardbox=document.getElementById("books");
        console.log(cardbox);

        var book=document.getElementsByClassName("column");
        console.log(book);

        for (i = 0; i < book.length; i++) {
            a = book[i].querySelectorAll("div.ccard")[0];
            txt = a.textContent || a.innerText;
        if (txt.toUpperCase().indexOf(input) > -1) {
            book[i].style.display = "";
        } else {
            book[i].style.display = "none";
        }
        }
    }

</script>