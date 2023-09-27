<?php
if (isset($_GET['code'])) {
    $qrcode = $_GET['code'];

    if ($t == 'Borrowed') {
        $result = my_query("SELECT  * FROM tbl_books WHERE qrcode='$qrcode'");
        if ($row = $result->fetch()) {

            if ($row['status'] <> 'Available') {
                $message = "Book is not available";
                echo "<script type='text/javascript'>alert('$message');history.go(-1);</script>";
            }
            
            $xbook_id = $row['id'];
            $isbn = $row['isbn'];
            $bookTitle = $row['bookTitle'];
            $author = $row['author'];
            $copyrightDate = $row['copyrightDate'];


        }
    } else {
        $result = my_query("SELECT  *,bt.id FROM  tbl_booktransactions bt 
        INNER JOIN tbl_books b ON b.id=bt.book_id INNER JOIN tbl_users u ON u.id=bt.user_id WHERE qrcode='$qrcode'");
        if ($row = $result->fetch()) {

            $id = $row['id'];
            $xbook_id = $row['book_id'];
            $isbn = $row['isbn'];
            $bookTitle = $row['bookTitle'];
            $author = $row['author'];
            $copyrightDate = $row['copyrightDate'];
            $res = my_query("SELECT * FROM tbl_booktransaction WHERE id='$id' AND bookStatus ='Borrowed' ");
            if($row=$result->fetch()){
                $_SESSION['returnedUserId'] = $row['user_id'];
            }
            
            
            $rstatus=$row['bookStatus'];
            
            $bookBarrowed = $row['dateBarrow']; 
            $date = new DateTime($bookBarrowed); 
            $date->modify('+7 day');
            $dateReturning= $date->format('Y-m-d');


            if($rstatus<>'Returned') { 
                    if($dateReturning <= $dateNow ) {
                        echo "Penalty";
                        
                        
                        $date1=date_create($dateNow); //Date Difference
                        $date2=date_create($dateReturning);
                        $diff=date_diff($date1,$date2);
                        echo  $diff = $diff->d;//noofday
                        $amt= $diff * 5 ;
                        $xpenalties  = "Penalty : $diff (days) = $amt " ;
                    }
                
                        
            }else{
                $xpenalties = ' ';
                $bookBarrowed= ' ';
            }
            
        
        }
    }


}
?>