
<?php include_once('config.php'); ?>

   <?php   if (isset($_SESSION['logged_in'])) if($_SESSION['logged_in']== "true"){
    if ($_SESSION['role'] == 'Admin' || $_SESSION['role']=='Librarian'){
    header("Location: main/index.php");
    exit; 
    }else{
    
    header("Location: main/index2.php");
    exit;
    }
   }

?> 
<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="design.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	
    <!-- Bootsrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
    <link rel="icon" type="image/png" href="front/images/icons/cctloogo.png"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="front/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="front/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="front/fonts/fontawesome-5.0.8/css/fontawesome-all.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="front/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="front/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="front/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="front/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="front/css/util.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="front/css/main.css">
    <!-- Javascript -->
    <script src="action.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.11/clipboard.min.js"></script>
    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.css" integrity="sha512-2dJkRM/DmWkZqINs3QixNKKsgG9mlBT9/PieLVF8OEGHCpPNBoPFYmGPL/yD7JuQVVm2IESF5K0zTDBaf4qehQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <head> 
        <title>CCT OLIS</title>
        <link rel="icon" href="img/cct-icon.png" type="image/icon type">
    </head>

    
    <style>
         blockquote {
            border-style: solid;
            border-width: 5px;
            font-size: 15px;
            font-style: italic;
            border-color: #eee #17b978;
            border-left: 5px solid #17b978;
            padding:20px;
        }

        h1,h2,h3,h4,h5{
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
        }

        h1{
            font-size: 3rem;
        }

        p, button, td{
            font-family: 'Century Gothic';
            font-size: 1.3rem;
        }

        a{
            font-family: 'Arial Narrow Bold', sans-serif;
            font-weight: 200;
            color:gray;
        }

        hr{
            height: 1px;
        }

        td{
            padding: 10px;
            font-family: 'Century Gothic';
        }
        body{
            overflow-wrap: break-word;
        }

        footer p{
            font-size: 1rem;
        }
        
        .top_bar a:hover {
  text-decoration: underline;
}
        
    </style>
</head>
<!-- Desktop-->

<!-- Header -->
<header>
    <!-- Header desktop -->

        <div class = "topbar">
        <div class="top_bar">
                    <a href="index.php"><img src="img/cct-icon.png" height="25px" width=auto> Home</a>
                    <a href="about.php">About</a>
                    <a href="contact.php">Contact Us</a>
                    <!--<a href="Developers/index.php">Developers</a>-->
                    <a href="signin.php">Login</a>
        </div></div>
        <!-- Mobile -->
        <div class="mobile-header-container">
        
        <div class="wrap-header-mobile">
            <!-- Button show menu -->
            <div class="btn-show-menu-mobile hamburger hamburger--squeeze m-r--8">
								<span class="hamburger-box">
									<span class="hamburger-inner"></span>
								</span>
            </div>
        </div></div>

        <!-- Menu Mobile -->
        <div class="menu-mobile">
            <ul class="topbar-mobile">

                <div class="left-topbar">
                    <a href="index.php" class="left-topbar-item">Home</a>
                    <a href="about.php" class="left-topbar-item">About</a>
                    <a href="contact.php" class="left-topbar-item">Contact Us</a>
                    <a href="signin.php" class="left-topbar-item">Log in</a>
                </div>
            </ul>
        </div>
</header>

