<?php include_once('head.php'); ?>


    <!-- Logo desktop -->
    <div style="text-align: center;">
        <a href="index.php"><img src="front/images/icons/cctlogo.png" alt="LOGO" height="500px"></a>
    </div>
    <!-- Page heading -->
    <div class="container p-t-4 p-b-40">
        <h2 class="f1-l-1 cl2" style="text-align:center">

        </h2>
    </div>

    <!-- Content -->
    <section class="bg0 p-b-60">
        <div class="container">
            <div class="row justify-content-center">

                <div class="box-header">
                    <!-- /result -->
                    <form action="" method="get">
                        <input name="search" type="text" style="height: 30px" class="" height="100" value="<?= (isset($_GET['search']) ? $_GET['search'] : ''); ?>" placeholder="Search Book Details">
                        <button type="submit" name="">Search</button>
                    </form>
                </div>

                <div class="box-body">
                    <div class="table-responsive">
                        <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
                        <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
                        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
                        <!------ Include the above in your HEAD tag ---------->

                        <div class="container">
                            <div class="row-fluid">


                                <?php
                                if (isset($_GET['search'])) {
                                    $s = $_GET['search'];
                                    $whr = " WHERE CONCAT(`qrcode`, `isbn`, `bookTitle`, `author`, `edition`, `subject`, `callNumber`, `copyrightDate`) LIKE '%$s%' ";
                                } else {
                                    $whr = "";
                                }
                                $result = $db->prepare("SELECT * FROM tbl_books $whr ORDER BY id DESC");
                                $result->execute();
                                for ($i = 1;
                                $row = $result->fetch();
                                $i++) { ?>
                                <!--  qrcode`, `status` FROM `tbl_books` WHERE 1-->
                                <?php if ($i % 3 == 0) { ?>
                                <ul class="thumbnails">
                                    <?php } ?>
                                    <ul class="thumbnails">
                                        <li class="span4">
                                            <div class="thumbnail" style="padding: 0">

                                                <div class="caption" align="center">
                                                    <h3> <?= $row['bookTitle'] . '(' . date('Y', strtotime($row['copyrightDate'])) . ')'; ?></h3>
                                                    <p> <?php
                                                        echo $row['edition'] . '<br/>';
                                                        echo $row['author'] . '<br/>';
                                                        echo $row['subject'] . '<br/>';
                                                        echo $row['isbn'] . '<br/>';
                                                        echo $row['callNumber'] . '<br/>';
                                                        ?>
                                                    </p>

                                                    <h4 style="color: <?= ($row['status'] == 'Available' ? 'green' : 'red'); ?>"><?= $row['status']; ?>
                                                </div>

                                            </div>
                                        </li>

                                        <?php if ($i % 3 == 0) { ?>
                                    </ul>
                                <?php } ?>
                                    <?php } ?>

                                </ul>

                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </section>
<?php include_once('footer.php'); ?>