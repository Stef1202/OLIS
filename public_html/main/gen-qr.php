<?php include_once('../config.php'); ?>
<html>

<head>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta name="language" content="English"/>
    <meta name="Revisit-After" content="1 Days"/>
    <meta name="robots" content="index, follow"/>
    <title> QR Code #</title>
    <link rel="icon" href="../images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../asset/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../asset/css/adminlte.min.css">
    <link rel="stylesheet" href="../asset/css/style.css">

</head>

<body onLoad="document.getElementById('startrunning').click();"  style="background-image: url('../images/plain.jpg'); background-repeat: no-repeat; background-size: 100% 100%;">
<div id="main">
    <div id="header">
        <div style="position:relative;top:+10px;left:0px;">
            <g:plusone size="medium"></g:plusone>
        </div>
        <br/><br/>
        <p style="text-align: center;font-size: 50px;">
            Print QR Code <br/>
<!--            --><?//= $_GET['qr']; ?>
        </p>

    </div>
    <div id="mainbody ">
        <div id="downloadArea">
        <table border="0" id="printableArea"  align="center">

            <tr>
                <td>
                    <textarea   id="data" type="hidden" hidden required><?= $_GET['qr']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <div class="button" id="startrunning" onclick="create()"></div>
                </td>
            </tr>
            <tr>

                <td align="center">
                    <div id="qrimage">
                        
                    </div>
                </td>
            </tr>

        </table>
        </div>
    </div>
    <p align="center">
        <!--<button class="btn btn-lg btn-default" value="BACK"  ><a href="index.php"> BACK</a></button>-->
<!--        <button class="btn btn-lg btn-info" value="Print" onclick="PrintDiv1('downloadArea')">DOWNLOAD</button>-->
<!--    <a class="btn btn-lg btn-success"  href="books.php?">Back</a>-->
        <button <a data-toggle="modal" data-target="#add" type="submit"
          class="btn btn-success pull-right btn-m " onclick="printDiv('printableArea')"><i class="fa fa-print"> </i> Print </a></button>
        
                           
    </p>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.esm.js"></script>


<script type="text/javascript">

    function create() {
        var data = document.getElementById("data").value;
         
      //  data = "hasas" + data;
        document.getElementById("qrimage").innerHTML = "<center><div width='40%'><i>"+data+"  </i><br><img width='40%'  style='border: 1px;' src='https://chart.googleapis.com/chart?chs=500x500&cht=qr&chl=" + encodeURIComponent(data) + "'/>";
    }

    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();

        document.body.innerHTML = originalContents;
    }

    function PrintDiv1(div)
    {
        html2canvas(div).then(canvas => {
            var myImage = canvas.toDataURL();
        downloadURI(myImage, "my-qrcode.png");
    });
    }

    function downloadURI(uri, name) {
        var link = document.createElement("a");

        link.download = name;
        link.href = uri;
        document.body.appendChild(link);
        link.click();
        //after creating link you should delete dynamic link
        //clearDynamicLink(link);
    }



</script>


</body>


</html>
