<html>
    <!-- CSS -->
    <link rel="stylesheet" href="design.css">
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

    <!-- Javascript -->
    <script src="action.js"></script>

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.css" integrity="sha512-2dJkRM/DmWkZqINs3QixNKKsgG9mlBT9/PieLVF8OEGHCpPNBoPFYmGPL/yD7JuQVVm2IESF5K0zTDBaf4qehQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /><head> 
        <title>CCT OLIS</title>
        <link rel="icon" href="img/cct-icon.png" type="image/icon type">
    </head>
    <body>
 

    <!--top bar-->
    <?php include_once('hheader.php');?>

    <!--Banner Layout-->
    <div class="hometl">
    <table cellspacing=0 border=0>
        <tr width="100%">
            <td class="homelabel"><h1 style="font-size: 4vw;">ONLINE LIBRARY INFORMATION SYSTEM USING QR CODE WITH CATALOGUING FOR CITY COLLEGE OF TAGAYTAY</h1>
                <!--<button type="button" class="btn btn-primary" onclick="window.location.href='signin.php'">Login</button>-->
                <button type="button" class="btn btn-primary" onclick="window.location.href='signup.php'">Guest</button>
            </td>
            <td bgcolor="#262070" style="text-align: right;"><img src="img/home.png"></td>
        </tr>
    </table>
</div>

<!-- Mobile Banner-->
<div class="hometl-mobile">
    <table cellspacing=0 border=0>
        <tr width="100%">
            <td class="homelabel"><h1 style="font-size: 30px; text-align: center">ONLINE LIBRARY INFORMATION SYSTEM USING QR CODE WITH CATALOGUING</h1>
            <center>
                <!--<button type="button" class="btn btn-primary" onclick="window.location.href='signin.php'">Login</button>-->
                <button type="button" class="btn btn-primary" onclick="window.location.href='signup.php'">Guest</button>
            </center>
            </td>
        </tr>
    </table>
</div>
<!-- Objectives-->
<div class="txt" >
    <center>
        <h1>OBJECTIVE</h1>
        <hr><br>
        <P>The objective of this system is to provide an online cataloguing for the students, faculty members, and guests<br> to help them browse the available books<br> in the library of City College of Tagaytay.</P>
        <br><hr>
    </center>
</div>

<!-- Slideshow-->
<div class="pics">
    
    <div class="slideshow-container">
    
    <div class="mySlides fade_in">
      <div class="numbertext">1 / 3</div>
      <img src="img/z.jpg" style="width:100%">
    </div>
    
    <div class="mySlides fade_in">
      <div class="numbertext">2 / 3</div>
      <img src="img/x.jpg" style="width:100%">
    </div>
    
    <div class="mySlides fade_in">
      <div class="numbertext">3 / 3</div>
      <img src="img/v.jpg" style="width:100%">
    </div>
    
    <a class="prev" onclick="plusSlides(-1)">❮</a>
    <a class="next" onclick="plusSlides(1)">❯</a>
    
    </div>
    <br>
    
    <div style="text-align:center">
      <span class="dot" onclick="currentSlide(1)"></span> 
      <span class="dot" onclick="currentSlide(2)"></span> 
      <span class="dot" onclick="currentSlide(3)"></span> 
    </div>
    
    <script type="text/Javascript" src="js/action.js">
    </script>
</div>

<!-- About CCT-->
<div class="txt">
    <center>
        <h1>ABOUT CCT</h1>
        <hr>
        <br>
        <P>The City College of Tagaytay in Tagaytay City is an institution of <BR>higher learning, a Local College, which was established <BR>by virtue of City Ordinance 2002-229.<BR><BR><hr>

            <p style="font-size: 1rem;"> CCT can be found at Akle St., Tagaytay Centrum Tagaytay City, Philippines</p>
    </center>
</div>

<!--Map-->
<CENTER>
<div class="map">
    <br><br>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3869.5898777650686!2d120.93602947583827!3d14.101370889102762!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd779f718e18bd%3A0xfb8d756cd37578df!2sCity%20College%20of%20Tagaytay!5e0!3m2!1sen!2sph!4v1682841177027!5m2!1sen!2sph" 
width="100%" 
height="450" 
style="border:0;" 
allowfullscreen="" 
loading="lazy" 
referrerpolicy="no-referrer-when-downgrade">
</iframe>
</div>
</center>

<!-- Footer-->
<?php include_once('hfooter.php');?>


</html>

