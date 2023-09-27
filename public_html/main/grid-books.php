<!DOCTYPE html>
<html>
<head>
<script src="https://kit.fontawesome.com/26220a333c.js" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/asvd/dragscroll/master/dragscroll.js"></script>
<script type="text/javascript" src="models/ajax/books-ajax.js"></script>
<link rel="stylesheet" href="css/bs/bootstrap.css">

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
/* The Modal (background) */
#myModal {
  margin-top: -100px;
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1050; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 150%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
#modal-content {
  background-color: #fefefe;
  margin: 15% auto; /* 15% from the top and centered */
  padding: 10px;
  border: 1px solid #888;
  max-width: 80%;
  width: 50%/* Could be more or less, depending on screen size */
}

/* The Close Button */
.closebox {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.closebox:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

.main {
  padding: 10px;
  margin-top: 20px;
  max-width: 100%;
  max-height: 50%;
  height: 100%;
  overflow: auto;
}

.main img {
  height: auto;
  width: 800px;
}

#btn1, #btn2{
    display: none;
}
  
@media screen and (max-width: 700px){
    #modal-content{
    width: 99%;
    }
    
    #btn1, #btn2{
        display: block;
    }
    
    .main{
          cursor: grab;
          cursor: -o-grab;
          cursor: -moz-grab;
          cursor: -webkit-grab;
    }
}



.centers {
  margin: auto;
  width: 50%;
  padding: 10px;
}


</style>
</head>
<?php include_once('layout/head.php'); ?>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
<section class="content-header">
            <h1>
             &nbsp;Catalogue
                <small>view Title catalogue</small>
            </h1>
           <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active">Catalogue &nbsp;&nbsp;</li>
                    </ol>
        </section>

        <!-- Main content -->
       <div class="c_container" width="100%" height="100%" id="booksc">
            <span class="pull-right"><h5 style="color:white">Help <i class="fa-regular fa-circle-question fa-lg" id="myBtn" style="cursor: pointer; color:white" title="Title Card Format"></i></h5></span>
            <h1 style="text-align: center";>Title Catalogue</h1> <br>
            <center>
            <div class="btn-group" style="padding: 30px"> 
                  <button class="btn redbtn active" onclick="window.location.href='des.php'">Descriptive Catalogue</button>  
                <button class="btn redbtn active">Title Catalogue</button>
                <button class="btn redbtn" onclick="window.location.href='card.php'">Subject Catalogue</button>
                <button class="btn redbtn" onclick="window.location.href='authorC.php'">Author Catalogue</button>
                
                                    
            </div></center>
                                    
<div class="blueblue">
    <div class="centers">
        <!--<div class="col-lg-4 col-lg-offset-4">-->
            <div class="input-group">                                         
    <!--<div class="searchcontainer pload" style="vertical-align: middle">-->
             <div class="input-group-prepend">
                <button type="submit" class="btn btn-outline-secondary btn-lg" id="close" style="cursor:pointer; display:none" onclick="Close()">
                <i class="fa fa-x" style="cursor:pointer; padding-left: 20px; float: right;"></i>
                </button>
            </div>
        <!--<div class="searchbox">-->
    <!--<div class="searchinput">-->
            
        <input type="search" class="form-control"id ="search" name="search" placeholder="Search books" style="border-radius: 5px"/>    
            <div class="input-group-append">
                <button type="button" class="btn btn-secondary btn-lg"  id="searchbtn">
                <i class="fa fa-search" style="cursor:pointer; padding-left: 20px; float: right;"></i></button>
            <!--</div>-->
        <!--</div>  --></div>
    <!--</div>--></div>
        <!--</div>-->
   </div>
</div>


<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content" id="modal-content">
    <span class="closebox">&times;</span>
    <div class="main dragscroll"><img id="map" src="models/2.jpg" ></div>
    <button id="btn1" type="button" class="btn btn-primary" onclick="zoomin()"> Zoom In</button>
    <button id="btn2" type="button" class="btn btn-primary" onclick="zoomout()"> Zoom Out</button>
  </div>

</div>

<div class="space"></div> 
    <div class="cardbox" id="cardbox" >
        <div class="row" id="books" >
           <!--Ajax books query load here-->
        </div>
    </div>
<div class="cardbox" id="searchcardbox" style="display:none" >
        <div class="row" id="sbooks" >
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
    // Pinaghirapan ko pato di naman pala magagamit hayst
    // function Search(){
    //     var txt, i, a;
    //     var filter=document.getElementById("search");
    //     var input=filter.value.toUpperCase();
    //     var cardbox=document.getElementById("cardbox");
    //     console.log(cardbox);

    //     var book=document.getElementsByClassName("column");
    //     console.log(book);

    //     for (i = 0; i < book.length; i++) {
    //         a = book[i].querySelectorAll("div.ccard")[0];
    //         txt = a.textContent || a.innerText;
    //     if (txt.toUpperCase().indexOf(input) > -1) {
    //         book[i].style.display = "";
    //     } else {
    //         book[i].style.display = "none";
    //     }
    //     }
    // }
    
    
// set interval for the cardbox found on books-ajax.js


//Yung search na bago, di na sya on key up. I think pwede naman kaso baka magulo ;-;. And masyado nakong nanghihina para itry pa yun
$('#searchbtn').click(function(){
var name = $('#search').val();
const cardbox=document.getElementById('cardbox');
const scardbox =document.getElementById('searchcardbox');
const x = document.getElementById("close");
x.style.display = 'inline';
cardbox.style.display = 'none';
scardbox.style.display = 'block';
fetchData();

//set interval for the search/cardbox(Magkahiwalay kase narereset yung search kapag same cardbox ang ginamit. If ever may safe way man sa internet how to do it, sorry triny kita hanapin kaso di talaga tayo meant T^T)
var loadbooks = setInterval(fetchData, 1000) ;
$('#close').click(function(){
    clearInterval(loadbooks);
});

function fetchData(){
    var name = $('#search').val(); 
    $.ajax({    
    type: "POST",
    url: "models/ajax/search-books.php",             
    dataType: "html", 
    data: {
        search: name
    },                 
    success: function(data){               
        $("#sbooks").html(data);
    }
});
}
});


//Yung X na lumalabas pag nagsearch para mareset value ng search box and bumalik sya dun sa cardbox na una. I know pwede syang gawing function to call pero tinamad nako mas madali parin copy paste
function Close(){
    const cardbox=document.getElementById('cardbox');
    const scardbox =document.getElementById('searchcardbox');
    const x = document.getElementById("close");
    const input = document.getElementById("search");
    input.value = '';
    x.style.display = 'none';
    cardbox.style.display = 'block';
    scardbox.style.display = 'none';
            $.ajax({    
                type: "GET",
                url: "models/ajax/books.php",             
                dataType: "html",                  
                success: function(data){        
                    $("#books").html(data); 
                }
            });
        }
        
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("closebox")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

function zoomin() {
  var myImg = document.getElementById("map");
  var currWidth = myImg.clientWidth;
  if (currWidth == 1000) return false;
  else {
    myImg.style.width = (currWidth + 100) + "px";
  }
}

function zoomout() {
  var myImg = document.getElementById("map");
  var currWidth = myImg.clientWidth;
  if (currWidth == 300) return false;
  else {
    myImg.style.width = (currWidth - 100) + "px";
  }
}
</script>

<?php include_once('layout/footer.php'); ?>