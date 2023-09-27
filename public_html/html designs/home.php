<html>
    <!-- CSS -->
    
    <body>

    <!--top bar-->
    <?php include_once('hheader.php');?>

    <!--Banner Layout-->
    <div class="hometl">
    <table cellspacing=0 border=0>
        <tr width="100%">
            <td class="homelabel"><h1 style="font-size: 4vw;">ONLINE LIBRARY INFORMATION SYSTEM USING QR CODE WITH CATALOGUING</h1>
                <button type="button" class="btn btn-primary" onclick="window.location.href='login.html'">Login</button>
                <button type="button" class="btn btn-primary" onclick="window.location.href='guest.php'">Guest</button>
            </td>
            <td bgcolor="#262070" style="text-align: right;"><img src="img/home.png"></td>
        </tr>
    </table>
</div>
<!-- Objectives-->
<div class="txt">
    <center>
        <h1 style="font-size: 3vw;">OBJECTIVE</h1>
        <hr><br>
        <P style="font-size: 1.3vw;">The objective of this system is to provide an online cataloguing for<br> the students, faculty members, and guests to help them<br> browse the available books in the library of <br>City College of Tagaytay.</P>
        <br><hr>
    </center>
</div>

<!-- Slideshow-->
<div class="pics">
    
    <div class="slideshow-container">
    
    <div class="mySlides fade_in">
      <div class="numbertext">1 / 3</div>
      <img src="img/1.jpg" style="width:100%">
    </div>
    
    <div class="mySlides fade_in">
      <div class="numbertext">2 / 3</div>
      <img src="img/2.jpg" style="width:100%">
    </div>
    
    <div class="mySlides fade_in">
      <div class="numbertext">3 / 3</div>
      <img src="img/3.jpg" style="width:100%">
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
        <h1 style="font-size: 3vw;">ABOUT CCT</h1>
        <hr>
        <br>
        <P style="font-size: 1.3vw;">The City College of Tagaytay in Tagaytay City is an institution of <BR>higher learning, a Local College, which was established <BR>by virtue of City Ordinance 2002-229.<BR><BR><hr>

            <p style="font-size: 1vw;"> CCT can be found at 4W2Q+GCX, Kaybagal South, Tagaytay, 4120 Cavite</p>
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

