<?php
// Sample database
include_once('db.php');


$offset = $_POST['offset'];

if($offset == 1){
    $and = 'limit 10';
}else{
    $off = ($offset-1)*10;
    $and = "limit 10  offset $off";
}


$sql = "SELECT * FROM tbl_books  ORDER BY bookTitle $and";
$result = mysqli_query($con, $sql);
$books = mysqli_fetch_all($result);
mysqli_free_result($result);
mysqli_close($con);




// Count the number of available copies per book
$copyCounts = array();
foreach ($books as $book) {
    $title = $book[6]; // Assuming book title is stored at index 6
    if (!isset($copyCounts[$title])) {
        $copyCounts[$title] = 0;
    }
    if ($book[12] == "Available") {
        $copyCounts[$title]++;
    }
}


$i=0;
// Display the book information along with the copy counts
foreach ($books as $book) {
    $i++;
    $total = $i;
    $id = $book[0];
    echo '<div class="column1 pagingbooks" id ="book_'.$i.'">
            <div class="ccard1 pload">
                <div class="row" style="text-align: left">
                    <span style="text-align: left; color:red;">';

    if ($book[12] == "Available") {
        echo '<br/><p style="color: green; font-size:16px;"><b>' . htmlspecialchars($book[12]) . '</b></p>';
    } else {
        echo '<br/><p style="color: red; font-size:16px;"><b>' . htmlspecialchars($book[12]) . '</b></p>';
    }
    // Display the copy count for the book
    $title = $book[6];
    if (isset($copyCounts[$title])) {
        echo '<b><p style="color:green; font-size:15px;">Number of Copies of the Book Available: ' . $copyCounts[$title] . '</p></b>';
    } else {
        echo '<b><p style="color:green; font-size:15px;">Number of Copies of the Book Available: 0</p></b>';
    }
    

    echo '
          <b><p style="color:black; font-size:15px; line-height: 1.3;">ISBN: ' . htmlspecialchars($book[5]) . '</p></b>
          <b><p style="color:black; font-size:15px; line-height: 1.3;">Shelf Number: ' . htmlspecialchars($book[1]) . '</p></b>
          <b><p style="color:black; font-size:15px; line-height: 1.3;">Subject Number: ' . htmlspecialchars($book[2]) . '</p></b>
          <b><p style="color:black; font-size:15px; line-height: 1.3;">Year: ' . htmlspecialchars($book[3]) . '</p></b>
          <b><p style="color:black; font-size:15px; line-height: 1.3;">Accession Number: ' . htmlspecialchars($book[15]) . '</p></b>
          <b><p style="color:black; font-size:15px; line-height: 1.3;">Title: ' . htmlspecialchars($book[6]) . '</p></b>
          <b><p style="color:black; font-size:15px; line-height: 1.3;">Author/s: ' . htmlspecialchars($book[7]) . ', ' . htmlspecialchars($book[18]) . ', ' . htmlspecialchars($book[19]) . '</p></b>
          <b><p style="color:black; font-size:15px; line-height: 1.3;">Edition: ' . htmlspecialchars($book[8]) . '</p></b>
          <b><p style="color:black; font-size:15px; line-height: 1.3;">Subject: ' . htmlspecialchars($book[9]) . '</p></b>
          <b><p style="color:black; font-size:15px; line-height: 1.3;">Publisher: ' . htmlspecialchars($book[17]) . '</p></b>
          <b><p style="color:black; font-size:15px; line-height: 1.3;">Date of Publication: ' . htmlspecialchars($book[11]) . '</p></b>
          <b><p style="color:black; font-size:15px; line-height: 1.3;">Reference: ' . htmlspecialchars($book[20]) . '</p></b>
          <b><p style="color:black; font-size:15px; line-height: 1.3;">Bibliographical: ' . htmlspecialchars($book[21]) . '</p></b>
          <b><p style="color:black; font-size:15px; line-height: 1.3;">Tracing Number: ' . htmlspecialchars($book[22]) . '</p></b>
          <b><p style="color:black; font-size:15px; line-height: 1.3;">Date Added: ' . htmlspecialchars($book[23]) . '</p></b>';

    

    echo '</span>
          </div>
        </div>
      </div>';
}

echo "<input value='$total' id='total' style='display:none'>";
?>
