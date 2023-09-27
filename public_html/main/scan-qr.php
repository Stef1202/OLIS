<?php include_once('../config.php'); ?>
<html>
<head>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta name="language" content="English"/>
    <meta name="Revisit-After" content="1 Days"/>
    <meta name="robots" content="index, follow"/>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title></title>
    <link rel="icon" href="../asset/images/logo.png" type="image/x-icon">

    <style type="text/css">
        body {
            width: 100%;
            text-align: center;
            background: white;
        }

        img {
            border: 0;
        }

        #main {
            margin: 15px auto;
            background: white;
            overflow: auto;
            width: 100%;
        }

        #header {
            background: black;
            margin-bottom: 15px;
        }

        #mainbody {
            background: black;
            width: 100%;
            display: none;
        }

        #footer {
            background: black;
        }

        #v {
            width: 320px;
            height: 240px;
        }

        #qr-canvas {
            display: none;
        }

        #qrfile {
            width: 320px;
            height: 240px;
        }

        #mp1 {
            text-align: center;
            font-size: 35px;
        }

        #imghelp {
            position: relative;
            left: 0px;
            top: -160px;
            z-index: 100;
            font: 18px arial, sans-serif;
            background: #f0f0f0;
            margin-left: 35px;
            margin-right: 35px;
            padding-top: 10px;
            padding-bottom: 10px;
            border-radius: 20px;
        }

        .selector {
            margin: 0;
            padding: 0;
            cursor: pointer;
            margin-bottom: -5px;
        }

        #outdiv {
            width: 320px;
            height: 240px;
            border: solid;
            border-width: 3px 3px 3px 3px;
        }

        #result {
            border: solid;
            border-width: 1px 1px 1px 1px;
            padding: 20px;
            width: 70%;
        }

        ul {
            margin-bottom: 0;
            margin-right: 40px;
        }

        li {
            display: inline;
            padding-right: 0.5em;
            padding-left: 0.5em;
            font-weight: bold;
            border-right: 1px solid #333333;
        }

        li a {
            text-decoration: none;
            color: black;
        }

        #footer a {
            color: black;
        }

        .tsel {
            padding: 0;
        }

    </style>

    <script type="text/javascript" src="webQR/js/llqrcode.js"></script>
    <script type="text/javascript" src="webQR/js/plusone.js"></script>
    <script type="text/javascript" src="webQR/js/webqr.js"></script>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body style="background:white;">
<div id="main">

    <div id="mainbody">
        <table class="tsel" border="0" width="100%">
            <tr>
                <td valign="top" align="center" width="50%">
                    <table class="tsel" border="0">
                        <tr>
                            <td>
                                <img class="selector" id="webcamimg" src="webQR/vid.png" onclick="setwebcam()" align="left"/>
                            </td>
                            <td><img class="selector" id="qrimg" src="webQR/cam.png" onclick="setimg()" align="right"/>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                <div id="outdiv">
                                </div>
                            </td>
                        </tr>


                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3" align="center">
                </td>
            </tr>
            <tr>
                <td colspan="3" align="center">

                    <form action="result-qr.php" method="GET">
                        OUTPUT HERE <br/> <br/>

<!--                        <select name="classId" class="form-control select" required>-->
<!--                            <option></option>-->
<!--                            --><?php //$res = my_query("SELECT *,CONCAT(room,' ',section)info  FROM tbl_class ");
//                            for ($i = 1; $r = $res->fetch(); $i++) {
//                                $id = $r['id']; ?>
<!--                                <option value="--><?//= $r['id']; ?><!--">--><?//= $r['info']; ?><!--</option>-->
<!--                            --><?php //} ?>
<!--                        </select>-->
<!--                        <br/>-->

                        <input name="qr" id="result" placeholder="QR CODE RESULT " required>
                        <br/> <br/>
                        <a href="../index.php" class="btn btn-danger">Close</a>
                        <!--                        <a href="scan-qr.php?r=-->
                        <? //= $_GET['r']; ?><!--" class="btn btn-default">Refresh</a>-->
<!--                        <button type="submit" name="show" value="yes" class="btn btn-info">Display</button>-->
                        <button type="submit" name="show" value="no" class="btn btn-success">Submit</button>
                    </form>


                </td>
            </tr>
        </table>

        <script async src="webQR/js/f.txt"></script>


    </div>&nbsp;

</div>
<canvas id="qr-canvas" width="800" height="600"></canvas>
<script type="text/javascript">load();</script>


<!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>-->
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>-->

<script src="http://code.jquery.com/jquery-latest.js"></script>
<script>
    $(document).ready(function () {
        setInterval(function () {
            $("#refreshMoto").load("scan-qr.php?r=<?=$_GET['r'];?> #refreshMoto");
        }, 1000);
    });
</script>
