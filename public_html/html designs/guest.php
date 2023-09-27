
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS -->
    <link rel="stylesheet" href="design.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/card.css">

    <!-- Bootsrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.css" integrity="sha512-2dJkRM/DmWkZqINs3QixNKKsgG9mlBT9/PieLVF8OEGHCpPNBoPFYmGPL/yD7JuQVVm2IESF5K0zTDBaf4qehQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
        <title>Guest: Catalogue</title>
        <link rel="icon" href="img/cct-icon.png" type="image/icon type">
    </head>
    <body>

    <!--top bar-->
    <div class="top_bar">
        <a href="home.html"><img src="img/cct-icon.png" height="25px" width=auto> Home</a>
        <a href="about.html">About</a>
        <a href="contact.html">Contact Us</a>
        <a href="login.html">Login</a>
    </div>

    <!--Banner Layout-->
    <div class="hometl">
        <table cellspacing=0 border=0 width="100%">
            <tr width="100%">
                <td style="background-color: #262070; height: auto; padding-left: 50px;"><h1 style="font-size: 3vw;">WELCOME!</h1><p style="color: burlywood; font-size: 1.5vw;">City College of Tagaytay/Library</p>
                </td>
                <td bgcolor="#262070" style="text-align: right;"><img src="img/home.png" style="height: 9vw; width: auto;"></td>
            </tr>
        </table>
    </div>

    <!--Catalogue-->
    <?php include("catalogue.php");?>


<!--Bottom Bar-->
<footer class="footer">
    <center><p>Copyright ©2023 City College of Tagaytay All Rights Reserved.</p></center>
</footer>
</html>

