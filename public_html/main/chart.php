<?php
include_once('layout/head.php');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Chart
            <small></small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <!-- /result -->
                        <a class="box-title">  <?php if (isset($_GET['r'])): ?>
                                <?php
                                $r = $_GET['r'];
                                if ($r == 'added') {
                                    $classs = 'success';
                                } else if ($r == 'updated') {
                                    $classs = 'info';
                                } else if ($r == 'deleted') {
                                    $classs = 'danger';
                                } else {
                                    $classs = 'hide';
                                }
                                ?>
                                <div class="alert alert-<?php echo $classs ?> <?php echo $classs; ?>">
                                    <strong>Successfully <?php echo $r; ?>!</strong>
                                </div>
                            <?php endif; ?></a>

                    </div>

                    <!-- /.box-header -->
                    <div class="table-responsive">

                        <button style="float:right;" class="btn btn-success btn"><a href="javascript:Clickheretoprint()"
                                                                                    style="color: white"> <i
                                        class="icon-print "> Print</i></button>
                        </a>
                        <form action="" method="get">

                            <center>
                                <strong>
<!--                                    Type :-->
<!--                                    <select style="width: 150px;" name="type">-->
<!--                                        --><?php // $result = my_query("SELECT *  FROM incident $strW GROUP BY incidentType   ");
//                                        for ($i = 1; $row = $result->fetch(); $i++) { ?>
<!--                                        <option value="--><?//=$row['incidentType'];?><!--" --><?php //if(isset($_GET['type'])){ echo ($row['incidentType']==$_GET['type'] ? 'selected' : ''); } ?><!-- >--><?//=$row['incidentType'];?><!--</option>-->
<!--                                        --><?php //}?>
<!--                                    </select>-->

                                    From :
                                    <input type="date" name="d1" class="tcal" value="<?php if (isset($_GET['d1'])) {
                                        echo $_GET['d1'];
                                    } ?>"/> To:
                                    <input type="date" name="d2" class="tcal" value="<?php if (isset($_GET['d2'])) {
                                        echo $_GET['d2'];
                                    } ?>"/>
                                    <button class="btn btn-info"
                                            style="width: 123px; height:35px; margin-top:-8px;margin-left:8px;"
                                            type="submit"><i class="icon icon-search icon-large"></i> Search
                                    </button>
                                </strong></center>
                        </form>


                        <div class="content" id="content">
                            <div style="font-weight:bold; text-align:center;font-size:14px;margin-bottom: 15px;">


                                Report from&nbsp;<?php if (isset($_GET['d1'])) {
                                    echo $_GET['d1'];
                                } ?>&nbsp;to&nbsp;<?php if (isset($_GET['d2'])) {
                                    echo $_GET['d2'];
                                } ?>
                                <!-- REPORT  CHART-->

                                <script type="text/javascript"   src="http://static.fusioncharts.com/code/latest/fusioncharts.js"></script>
                                <?php include_once('fusioncharts.php'); ?>

                                <?php
                                if (isset($_GET['d1'])) {
                                    $d1 = $_GET['d1'];
                                    $d2 = $_GET['d2'];
                                  //   WHERE  dateBarrow  BETWEEN '$d1' AND '$d2' 
                                    $strQuery = "SELECT MONTHNAME(dateBarrow) as lbl, COUNT(*) as c FROM tbl_booktransactions GROUP BY MONTHNAME(dateBarrow)   ORDER BY MONTHNAME(dateBarrow) DESC   LIMIT 12  ";

                                    // Execute the query, or else return the error message.
                                    $result = $db->query($strQuery) or exit("Error code ({$db->errno}): {$db->error}");

                                    // If the query returns a valid response, prepare the JSON string
                                    if ($result) {
                                        // The `$arrData` array holds the chart attributes and data
                                        $arrData = array(
                                            "chart" => array(
                                                "caption" => "Number of Borrowed Books   ",
                                                "showValues" => "0",
                                                "theme" => "zune"
                                            )
                                        );

                                        $arrData["data"] = array();

                                        for ($i = 1; $row = $result->fetch(); $i++) {
                                            array_push($arrData["data"], array(
                                                    "label" => $row["lbl"].'('. $row["c"].')',
                                                    "value" => $row["c"]
                                                )
                                            );
                                        }

                                        $jsonEncodedData = json_encode($arrData);

                                        $columnChart = new FusionCharts("column2D", "myFirstChart", 1000, 500, "chart-1", "json", $jsonEncodedData);

                                        // Render the chart
                                        $columnChart->render();

                                    }


                                }
                                ?>

                                <div id="chart-1"><!-- Fusion Charts will render here--></div>
                            </div>

                        </div>


                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>


<?php include_once('layout/footer.php');  ?>

<script language="javascript">
    function Clickheretoprint() {
        var disp_setting = "toolbar=yes,location=no,directories=yes,menubar=yes,";
        disp_setting += "scrollbars=yes,width=700, height=400, left=100, top=25";
        var content_vlue = document.getElementById("content").innerHTML;

        var docprint = window.open("", "", disp_setting);
        docprint.document.open();
        docprint.document.write('</head><body onLoad="self.print()" style="width: 700px; font-size:11px; font-family:arial; font-weight:normal;">');
        docprint.document.write(content_vlue);
        docprint.document.close();
        docprint.focus();
    }
</script>