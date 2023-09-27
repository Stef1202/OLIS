<!DOCTYPE html> 
<html>
<head>
    <link rel="stylesheet" href="css/bs/bootstrap.css">
<script src="https://kit.fontawesome.com/26220a333c.js" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/asvd/dragscroll/master/dragscroll.js"></script>
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

.centers {
  margin: auto;
  width: 50%;
  padding: 10px;
}

#searchCategory {
    padding: 20px;
    margin-top: -6px;
    border: 0;
    border-radius: 0;
    background: #f1f1f1;
  }

@media screen and (max-width: 600px) {
  .centers {
  margin: auto;
  width: 100%;
  padding: 10px;
}
        }

</style>
</head>
<?php include_once('layout/head.php'); 



?>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
           <section class="content-header">
            <h1>
             &nbsp; Catalogue
                <small>view Descriptive Catalogue</small>
            </h1>
           <ol class="breadcrumb">
               <?php if($_SESSION['role']=='Admin'||$_SESSION['role']=='Librarian'){?>
                        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                        <?php }else{ ?>
                        <li><a href="index2.php"><i class="fa fa-home"></i> Home</a></li>
                        <?php } ?>
                        <li class="active">Catalogue &nbsp;&nbsp;</li>
                    </ol>
        </section>

        <!-- Main content -->
       <div class="c_container" width="100%" height="100%">
           <h1 style="text-align: center";>Descriptive Catalogue</h1> <br>
            <!--<div class="dropdown"> -->
            <!--                    <button class="dropbtn" ><i class ="fa fa-eye"></i> Types of Catalogues</button>-->
            <!--                    <div class="dropdown-content">-->
            <!--                    <a href="grid-books.php">Title Catalogue</a>-->
            <!--                     <a href="card.php">Subject Catalogue</a>-->
                                
            <!--                     </div>-->
            <!--                            </div>-->
           <!-- <center>
            <div class="btn-group" style="padding: 30px"> 
               <button class="btn redbtn active" >Descriptive Catalogue</button>
                <button class="btn redbtn" onclick="window.location.href='grid-books.php'">Title Catalogue</button>
                <button class="btn redbtn" onclick="window.location.href='card.php'">Subject Catalogue</button>
                <button class="btn redbtn " onclick="window.location.href='authorC.php'">Author Catalogue</button>
                 
                    
                                    
            </div></center>  -->
    <!--      <div class="searchcontainer pload">-->
    <!--    <div class="searchbox">-->
    <!--        <div class="searchinput">-->
    <!--        <p type="submit" id="close" style="cursor:pointer; display:none" onclick="Close()">X</p>-->
    <!--        <input type="search" id ="search" name="search" placeholder="Search books"/>    -->
    <!--            <i class="fa fa-search" type="submit" id="searchbtn" style="cursor:pointer; padding-left: 20px; float: right;"></i>-->
    <!--        </div>-->
    <!--    </div>     -->
    <!--</div>-->
    
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
                 <div class="dropdown" style='padding-left: 5px'>
    <!--<button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa-solid fa-filter"></i>-->
    <!--</button>-->
    <!--<ul class="dropdown-menu">-->
        <form>
          <select name="filter" id="filter"  onchange='Filter()' class="dropdown-menu form-control select" >
              <option ><option>
      
      <?php $strQuery = "SELECT subject as category FROM tbl_books ";
     
            $result = $db->query($strQuery) or exit("Error code ({$db->errno}): {$db->error}");
            
            for ($i = 1; $row = $result->fetch(); $i++) {
            ?>  <option value='<?= $row['category']?>'><?= $row['category']?></option> <?php
             
            }
            ?>
              </select></form>
    <!--</ul>-->
  </div>

            <!--</div>-->
        <!--</div>  --></div>
    <!--</div>--></div>
   
        <!--</div>-->
   </div>
</div>
    <ul class="pager">
      <li class="previous" id='previous' onclick='subtract()'><a href="#">Previous</a></li>
      <li id= 'cpage' style='display:none' value = '1'></li>
      <li class="next" id='next' onclick='add()' ><a href="#">Next</a></li>
    </ul>
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


$(document).ready(function(e){
    
    function getbooks(){
        var cpage = document.getElementById('cpage').value;
        console.log(cpage);
          $.ajax({    
          type: "POST",
          url: "models/ajax/pagingbooks.php",             
          dataType: "html", 
          data: {
            offset: cpage
            },
          success: function(data){                    
              $("#books").html(data);
              
             
             
          }
        });
        
        if(cpage == 1){
                document.getElementById('previous').style.display = 'none';
            }else{
                document.getElementById('previous').style.display = 'block';
            }
            
        var total = document.getElementsByClassName('pagingbooks').length;
         if(total < 10){
                document.getElementById('next').style.display = 'none';
            }else{
                document.getElementById('next').style.display = 'block';
            }
        
        
        
        const scardbox =document.getElementById('searchcardbox');
        var totals = document.getElementById('totals').value;
        console.log(total);
           
            
         if(scardbox.style.display == 'block'){   
            if(totals < 10){
                document.getElementById('next').style.display = 'none';
            }else{
                document.getElementById('next').style.display = 'block';
            }
         }
        
    }
    
    var loadBookList =setInterval(getbooks, 200);
    
});

// setInterval(function(){
//     $('#books').load("models/ajax/books_backup.php");

//  }, 2000) ;
 
 
 
 
 
 $('#search').on('keyup',function(){document.getElementById('cpage').value = 1; });
 //Yung search na bago, di na sya on key up. I think pwede naman kaso baka magulo ;-;. And masyado nakong nanghihina para itry pa yun
$('#searchbtn').click(function(){
document.getElementById('cpage').value = 1;
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

$('#filter').on('change', function(){
    clearInterval(loadbooks);
});

function fetchData(){
    var cpage = document.getElementById('cpage').value;
    var name = $('#search').val(); 
    $.ajax({    
    type: "POST",
    url: "models/ajax/search-books back up.php",             
    dataType: "html", 
    data: {
        search: name,
        offset: cpage,
    },                 
    success: function(data){               
        $("#sbooks").html(data);
    }
});
}
});


function add(){
    var current = document.getElementById('cpage').value;
    document.getElementById('cpage').value = current+1;
    console.log(current);
}


function subtract(){
    var current = document.getElementById('cpage').value;
    
    if(current == 1){
        document.getElementById('cpage').value = 1;
    }else{
    document.getElementById('cpage').value = current-1;
    }
    console.log(current);
}



function Filter(){
document.getElementById('cpage').value = 1;
var category = $('select').find(":selected").val();
const cardbox=document.getElementById('cardbox');
const scardbox =document.getElementById('searchcardbox');
// const x = document.getElementById("close");
// x.style.display = 'inline';
cardbox.style.display = 'none';
scardbox.style.display = 'block';
fetchData2();

var loadbooks2 = setInterval(fetchData2, 1000) ;
 $('#search').on("keyup",function(){
     clearInterval(loadbooks2);
 });
 
 $('#searchbtn').click(function(){
     clearInterval(loadbooks2);
 });

function fetchData2(){
    var cpage = document.getElementById('cpage').value;
    var category = $('select').find(":selected").val();
    $.ajax({    
    type: "POST",
    url: "models/ajax/filter.php",             
    dataType: "html", 
    data: {
        search: category,
        offset: cpage,
    },                 
    success: function(data){               
        $("#sbooks").html(data);
    }
});
}
}


//Yung X na lumalabas pag nagsearch para mareset value ng search box and bumalik sya dun sa cardbox na una. I know pwede syang gawing function to call pero tinamad nako mas madali parin copy paste
function Close(){
    document.getElementById('cpage').value = 1;
    const cardbox=document.getElementById('cardbox');
    const scardbox =document.getElementById('searchcardbox');
    const x = document.getElementById("close");
    const input = document.getElementById("search");
    input.value = '';
    x.style.display = 'none';
    cardbox.style.display = 'block';
    scardbox.style.display = 'none';
        
        }




</script>

<?php include_once('layout/footer.php'); ?>