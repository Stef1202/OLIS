<?php include_once('../config.php'); ?>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-info">

                <div class="col-md-12">

                    <p align="right">
                        <button class="btn btn-lg btn-info" value="Print" onclick="printDiv('printableArea')">PRINT
                        </button>
                    </p>
                    <?php
                    $qrcode = $_GET['qr'];
                    $result = $db->prepare("SELECT *,CONCAT(fname,' ',lname)fullname  FROM tbl_students    WHERE  qrCode='$qrcode' ");
                    $result->execute();
                    if ($row = $result->fetch()) {
                        $student_id = $row['id']; ?>
                        <div class="table-responsive">
                            <table class="table" id="printableArea">
                                <tr>
                                    <td colspan="4" class="text-center"><h1>INFORMATION </h1></td>
                                </tr>
                                <tr>

                                    <td colspan="4">
                                        <img src="images/student/<?= $row['pic']; ?>" width="220px"></td>
                                </tr>
                                <tr>
                                    <td colspan="4"> Registration #:
                                        <a href=""><?= $row['studNo']; ?></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">Name: <?= $row['fullname']; ?></td>
                                    <td>Gender: <?= $row['gender']; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2">Address: <?= $row['address']; ?></td>

                                </tr>
                                <tr>
                                    <td colspan="2"> Contact: <?= $row['contact'] . ' / ' . $row['email']; ?></td>
                                </tr>

                                <tr>

                                </tr>

                            </table>
                        </div>

                        <?php
                        date_default_timezone_set('Asia/Manila');
                        $dateTimeNow = date('Y-m-d H:i:sa');
                        $dateNow = date('Y-m-d');
                        $timeNow = date('h:i:sa');
                        //H:i:s
                        $classId = $_GET['classId'];
                        $res = my_query("SELECT *,cc.id id FROM tbl_classstudent cc  INNER JOIN tbl_class c ON cc.classId=c.id
                        WHERE classId = '$classId' AND  studId='$student_id'  ORDER BY cc.id DESC");
                        $res->execute();
                        if ($r = $res->fetch()) {



                            $resA = my_query("SELECT *  FROM tbl_attendances  WHERE classId = '$classId' AND  studId='$student_id'  AND class_date= '$dateNow'");
                            $resA->execute();
                            if ($rA = $resA->fetch()){
                                //Update
                                db_update('tbl_attendances', ["class_status" => 'Absent',], ["id"=>$rA['id']]);
                                $message = "Attendance Successfully Time Out Absent.";
                            }else{
                                //Add
                                $data = array("studId" => $student_id, "classId" => $classId, "class_status" => 'Absent', "class_date" => $dateNow);
                                db_insert('tbl_attendances', $data);
                                $message = "Attendance Successfully Time In Absent.";
                            }

                        


                            echo "<script type='text/javascript'>alert('$message');history.go(-1);</script>";
                            exit();


                        } else {
                            $message = "Not belong to class.";
                            echo "<script type='text/javascript'>alert('$message');history.go(-1);</script>";
                            exit();
                        }

                        } else {

                        $message = "QR Code not found.";
                        echo "<script type='text/javascript'>alert('$message');history.go(-1);</script>";
                        exit();
                    } ?>


                    <form action="models/do.php" method="get">
                        <input name="temp" value="<?= $_SESSION['temp']; ?>" type="text">
                        <input name="registration_id" value="<?= $registration_id; ?>" type="text">
                        <button type="submit" value="addRecords" class="btn btn-info" name="do">Save</button>
                    </form>


                </div>
            </div>
        </div>

        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
<?php include_once('layout/footer.php'); ?>