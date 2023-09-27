$(document).ready(function(e){
    $.ajax({    
            type: "GET",
            url: "models/ajax/availability.php",             
            dataType: "html",                  
            success: function(data){                    
                $("#books").html(data); 
                
            }
        });
        
    })