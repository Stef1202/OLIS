<?php
// sample database
include_once('db.php');
$sql = "SELECT * FROM tbl_books ORDER BY bookTitle";
$result = mysqli_query($con, $sql);
$books = mysqli_fetch_all($result);
mysqli_free_result($result);
mysqli_close($con);

foreach ($books as $book) {
    $id = $book[0];
    echo '<div class="column1">
            <div class="ccard1 pload">
                <div class="row" style="text-align: left">
                    <span style="text-align: left; color:red;">';

    if ($book[12] == "Available") {
        echo '<br/><p style="color: green; font-size:16px;"><b>' . htmlspecialchars($book[12]) . '</b></p>';
    } else {
        echo '<br/><p style="color: red; font-size:16px;"><b>' . htmlspecialchars($book[12]) . '</b></p>';
    }

    echo '
          <b><p style="color:black; font-size:15px;">ISBN: ' . htmlspecialchars($book[5]) . '</p></b>
          <b><p style="color:black; font-size:15px;">Shelf Number: ' . htmlspecialchars($book[1]) . '</p></b>
          <b><p style="color:black; font-size:15px;">Subject Number: ' . htmlspecialchars($book[2]) . '</p></b>
          <b><p style="color:black; font-size:15px;">Year: ' . htmlspecialchars($book[3]) . '</p></b>
          <b><p style="color:black; font-size:15px;">Accession Number: ' . htmlspecialchars($book[15]) . '</p></b>
          <b><p style="color:black; font-size:15px;">Title: ' . htmlspecialchars($book[6]) . '</p></b>
          <b><p style="color:black; font-size:15px;">Author/s: ' . htmlspecialchars($book[7]) . ', ' . htmlspecialchars($book[18]) . ', ' . htmlspecialchars($book[19]) . '</p></b>
          <b><p style="color:black; font-size:15px;">Edition: ' . htmlspecialchars($book[8]) . '</p></b>
          <b><p style="color:black; font-size:15px;">Subject: ' . htmlspecialchars($book[9]) . '</p></b>
          <b><p style="color:black; font-size:15px;">Publisher: ' . htmlspecialchars($book[17]) . '</p></b>
          <b><p style="color:black; font-size:15px;">Date of Publication: ' . htmlspecialchars($book[11]) . '</p></b>
          <b><p style="color:black; font-size:15px;">Reference: ' . htmlspecialchars($book[20]) . '</p></b>
          <b><p style="color:black; font-size:15px;">Bibliographical: ' . htmlspecialchars($book[21]) . '</p></b>
          <b><p style="color:black; font-size:15px;">Tracing Number: ' . htmlspecialchars($book[22]) . '</p></b>
          <b><p style="color:black; font-size:15px;">Date Added: ' . htmlspecialchars($book[23]) . '</p></b>';

    echo '</span>
          </div>
        </div>
      </div>';
}
?>
