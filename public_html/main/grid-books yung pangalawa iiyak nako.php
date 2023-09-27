<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="models/ajax/books-ajax.js"></script>

<style>
.c_container h1{
  font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
}
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

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                LIST OF BOOKS


            </h1>
        </section>

        <!-- Main content -->
       <div class="c_container" width="100%" height="100%" id="booksc">
           <h1 style="text-align: center";>Title Catalogue</h1> <br>
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
        <div class="row" id="books" >
           <!--Ajax books query load here-->
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