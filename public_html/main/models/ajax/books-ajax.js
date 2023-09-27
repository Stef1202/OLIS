$(document).ready(function(e){
    $.ajax({    
      type: "GET",
      url: "models/ajax/books.php",             
      dataType: "html",                  
      success: function(data){                    
          $("#books").html(data); 
         
      }
  });
});

setInterval(function(){
    $('#books').load("models/ajax/books.php");
 }, 2000) ;
 
 
 //PS. Yung isang ajax lang mahal ko, eto ang hirap mahalin T^T