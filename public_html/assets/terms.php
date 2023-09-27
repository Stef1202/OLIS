<?php include_once('layout/head.php'); ?>
<?php include_once('layout/nav-bar.php'); ?>
<?php include_once('layout/center-pic.php'); ?>

    <!--TERMS AND CONDITIONS-->
    <div class="container"
         style="background-color:white; font-family:Sans Serif; font-size:18px; padding:30px; text-align:justify; margin-top:2.5cm">
        <h3>TERMS AND CONDITIONS <?= $_SESSION['Cname']; ?></h3>
        <?= $_SESSION['Cterms']; ?>

<!--        <p style="float:right">-->
<!--            <a href="assets/Terms_and_Conditions.pdf" download style="text-decoration:none"><img-->
<!--                        border="0" src="assets/img/pdfdl.png" alt="pdf_file" width="200" height="50">-->
<!--            </a>-->
<!--        </p>-->

    </div>
    <!--TERMS AND CONDITIONS END-->

<?php include_once('layout/footer.php'); ?>