<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.c_container h1{
  font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
}
.dropbtn {
  background-color: #04AA6D;
  color: white;
  padding: 10px;
  font-size: 13px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 10px 14px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}

.redbtn{
    background-color: #9C6868;
    color: #fff;
}

.redbtn:hover {
    color: #6D4A4A;
}
</style>
</head>
<?php include_once('layout/head.php'); ?>
<?php include_once('booksquery.php');?>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                LIST OF BOOKS


            </h1>
        </section>

        <!-- Main content -->
       <div class="c_container" width="100%" height="100%">
           <h1 style="text-align: center";>Title Catalogue</h1> <br>
            <!--<div class="dropdown"> -->
            <!--        <button class="dropbtn" ><i class ="fa fa-eye"></i> Types of Catalogues</button>-->
            <!--                    <div class="dropdown-content">-->
            <!--                        <a href="card.php">Subject Catalogue</a>-->
            <!--                        <a href="authorC.php">Author Catalogue</a>-->
                                
            <!--                    </div>-->
            <!--</div>-->
            <center>
            <div class="btn-group" style="padding: 30px"> 
                <button class="btn redbtn active">Title Catalogue</button>
                <button class="btn redbtn" onclick="window.location.href='card.php'">Subject Catalogue</button>
                <button class="btn redbtn" onclick="window.location.href='authorC.php'">Author Catalogue</button>
                                    
            </div></center>
                                    
                                         
    <div class="searchcontainer pload">
        <div class="searchbox">
            <div class="searchinput">
                <form action="">
                <input type="search" style="width: 100%;" id ="search" name="search" onkeyup="Search()" placeholder="Search books"/>
                </form>
            </div>
        </div>     
    </div>
    &nbsp
    <div class="space"></div> 
    <div class="cardbox" id="printableArea" >
        <div class="row" id="books " >
            <?php
                foreach($books as $book){
                    ?>
                    <div class="column"  > 
                        <div class="ccard pload" id="hoverChange">
                           <div class="row " style="text-align: left" >
                               
                               <span class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="text-align: left" style="color:red;">
                                   <b>
                                    <p style="color:black; font-size:16px;"><?php echo htmlspecialchars($book[1])?></p>
                                    <p style="color:black; font-size:16px;"><?php echo htmlspecialchars($book[2])?></p>
                                    <p style="color:black; font-size:16px;"><?php echo htmlspecialchars($book[3])?></p>
                                    <?php if ($book[12]=="Available") echo "<br/><p style='color: green;'><b>".htmlspecialchars($book[12])."</b></p>";
                                        else echo "<br/><p style='color: red;'><b>".htmlspecialchars($book[12])."</b></p>" ?></p>
                                </span>
                                <span class="col-lg-9 col-md-9 col-sm-9 col-xs-9" style="text-align: left">
                                    <p style="text-alignment: 1; color:black;; font-size:16px;"> &emsp; &emsp;<?php echo htmlspecialchars($book[6])?>
                                    <p style="color:black; font-size:16px;"><?php echo htmlspecialchars($book[7])?>
                                     <p style="color:black; font-size:16px;"> &emsp; &emsp;<?php echo htmlspecialchars($book[6])?> / <?php echo htmlspecialchars($book[8])?>--<?php echo htmlspecialchars($book[7])?></p>
                                    <p style="color:black; font-size:16px;"> &emsp; &emsp;<?php echo htmlspecialchars($book[14])?></p><br>
                                    <p style="color:black; font-size:16px;"> &emsp; &emsp;Reference:<?php echo htmlspecialchars($book[20])?></p>
                                    <p style="color:black; font-size:16px;"> &emsp; &emsp;Bibliographical:<?php echo htmlspecialchars($book[21])?></p>
                                    <p style="color:black; font-size:16px;"> &emsp; &emsp;ISBN: <?php echo htmlspecialchars($book[5])?></p><br>
                                    <p style="text-transform:uppercase; color:black; font-size:16px; line-height: 1.2;"> &emsp; &emsp;<?php echo htmlspecialchars($book[9])?></p>
                                    </b>
                                </span>  
                            </div> 
                          
                        </div>
                    </div>
                        <?php
                }
                ?>
        </div>
    </div>
</div>
        <!-- /.content -->
    </div>
     <script>
        function MM_openBrWindow(theURL,winName,features) { //v2.0
            window.open(theURL,winName,features);
        }
    </script>

    <script type="text/javascript">
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
<script>
    function Search(){
        var txt, i, a;
        var filter=document.getElementById("search");
        var input=filter.value.toUpperCase();
        var cardbox=document.getElementById("cardbox");
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

<?php include_once('layout/footer.php'); ?>