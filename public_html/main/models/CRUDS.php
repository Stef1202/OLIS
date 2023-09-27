<?php
require_once "../../config.php";
echo $function = $_POST['func_param'];

switch ($function) {

    case 'transactReturn':
        $data = array(
            "dateReturn" => $dt,
            "penalty" => $_POST['penalty'],
            
            "notes" => $_POST['notes'],
            "bookStatus" => 'Returned',
            
        );
        $query = db_update('tbl_booktransactions', $data, ['id' => $_POST['id']]);
        $query = db_update('tbl_books', ['status' => 'Available'], ['id' => $_POST['book_id']]);


        $message = "Book successfully returned.";
        echo "<script type='text/javascript'>alert('$message');window.location.href='../transactions.php?t=Returned';</script>";
        break;


 case 'transact':
    $userId = $_POST['user_id'];

    if (isExists('tbl_users', ['status' => 'Deactive', 'id' => $userId]) === true) {
        $message = "User is deactivated";
        echo "<script type='text/javascript'>alert('$message');history.go(-1);</script>";
        exit();
    }

    $book_id = $_POST['book_id'];
    $result = my_query("SELECT COUNT(*) AS c FROM tbl_booktransactions WHERE bookStatus='Borrowed' AND user_id='$userId'");
    if ($row = $result->fetch()) {
        if ($row['c'] == 2) {
            $message = 'The number of allowed borrows of books is limited to two (2) per user.';
            echo "<script type='text/javascript'>alert('$message');history.go(-1);</script>";
            exit();
        }
    }

    // Check if the book has only one copy
    $result = my_query("SELECT * FROM tbl_books WHERE id = '$book_id'");
    if ($row = $result->fetch()) {
        $title = $row['bookTitle'];
        $status = $row['status'];

        if ($status == "Available") {
            $copyCounts = my_query("SELECT COUNT(*) AS count FROM tbl_books WHERE bookTitle = '$title' AND status = 'Available'");
            $count = $copyCounts->fetchColumn();

            if ($count == 1) {
                $message = 'The book is not available for borrowing and is for library room use only.';
                echo "<script type='text/javascript'>alert('$message');history.go(-1);</script>";
                exit();
            }
        } else {
            $message = 'The book is not available for borrowing and is for library room use only.';
            echo "<script type='text/javascript'>alert('$message');history.go(-1);</script>";
            exit();
        }
    } else {
        $message = 'The book does not exist.';
        echo "<script type='text/javascript'>alert('$message');history.go(-1);</script>";
        exit();
    }

    $_SESSION['borrowedUserId'] = $userId;
    $data = array(
        "user_id" => $userId,
        "book_id" => $book_id,
        "dateBarrow" => $dt,
        "bookStatus" => 'Borrowed',
        "penalty" => $xpenalties,
    );
    $query = db_insert('tbl_booktransactions', $data);
    $query = db_update('tbl_books', ['status' => 'Borrowed'], ['id' => $book_id]);

    $message = "Book successfully borrowed.";
    echo "<script type='text/javascript'>alert('$message');window.location.href='../transactions.php?t=Borrowed';</script>";
    break;



    case 'returned':
    
        $date = $_POST['date'];
        $data = array(
       
            "dateReturn" => $date,
            "penalty" => $_POST['penalty'],
            "notes" => $_POST['notes'],
            "bookStatus" => 'Returned',
        );
        
        
     
        $query = db_update('tbl_booktransactions', $data, ['id' => $_POST['id']]);
        $query = db_update('tbl_books', ['status' => 'Available'], ['id' => $_POST['book_id']]);
        

        $message = "Book successfully returned.";
        echo "<script type='text/javascript'>alert('$message');window.location.href='../transactions.php?t=Returned';</script>";
        
        break;
        
        case 'return':
        $dateA = strtotime($_POST['dateBarrow']);
        $dateB = strtotime($_POST['date']);
        $dateC = strtotime($dt);
        $date = $_POST['date'];
        $data = array(
       
            "dateReturn" => $date,
            "penalty" => $xpenalties,
            "penalty" => $_POST['penalty'],
            "notes" => $_POST['notes'],
            "bookStatus" => 'Returned',
        );
        
        
        if($dateA > $dateB){
            $message = 'The date returned cannot be later than the date borrowed';
            echo "<script type='text/javascript'>alert('$message');history.go(-1);</script>";
            exit();
        }else if($dateB > $dateC){
            $message = 'The date returned cannot be later than today';
            echo "<script type='text/javascript'>alert('$message');history.go(-1);</script>";
            exit();
        }else{
        $query = db_update('tbl_booktransactions', $data, ['id' => $_POST['id']]);
        $query = db_update('tbl_books', ['status' => 'Available'], ['id' => $_POST['book_id']]);
        

        $message = "Book successfully returned.";
        echo "<script type='text/javascript'>alert('$message');window.location.href='../transactions.php?t=Returned';</script>";}
        break;
        
      case 'eedit':
        $data = array(
       
            "dateReturn" => $dt,
            "penalty" => $xpenalties,
            "penalty" => $_POST['penalty'],
            "notes" => $_POST['notes'],
            "bookStatus" => 'Returned',
        );
        $query = db_update('tbl_booktransactions', $data, ['id' => $_POST['id']]);
        $query = db_update('tbl_books', ['status' => 'Available'], ['id' => $_POST['book_id']]);


        $message = "Successfully Edited";
        echo "<script type='text/javascript'>alert('$message');window.location.href='../transactions.php?t=Returned';</script>";
        break;
        
  

  case 'borrow':
    $userId = $_POST['user_id'];
    $date = $_POST["date"];
    if (isExists('tbl_users', ['status' => 'Deactive', 'id' => $userId]) === true) {
        $message = "User is deactivated";
        echo "<script type='text/javascript'>alert('$message');history.go(-1);</script>";
        exit();
    }

    foreach ($_POST['book_id'] as $book) {
        $data = array(
            "user_id" => $_POST['user_id'],
            "book_id" => $book,
            "dateBarrow" => $date,
            "bookStatus" => 'Borrowed',
        );
        
        $result = my_query("SELECT bookTitle FROM tbl_books WHERE id = '$book'");
        if (!$row = $result->fetch()) {
            $message = 'No result found.';
            echo "<script type='text/javascript'>alert('$message');history.go(-1);</script>";
            exit();
        }
        
        $result = my_query("SELECT bookTitle FROM tbl_books WHERE id = '$book' AND status <> 'Available'");
        if ($row = $result->fetch()) {
            $message = 'Invalid. Book not found ' . $row['bookTitle'];
            echo "<script type='text/javascript'>alert('$message');history.go(-1);</script>";
            exit();
        }

        $result = my_query("SELECT COUNT(*)c FROM tbl_booktransactions WHERE bookStatus='Borrowed' AND user_id= '$userId' ");
        if ($row = $result->fetch()) {
            if ($row['c'] == 2) {
                $message = 'The number of books allowed to be borrowed is only limited to two(2) at a time per user';
                echo "<script type='text/javascript'>alert('$message');history.go(-1);</script>";
                exit();
            }
        }
        
  // Check if the book has only one copy
$result = my_query("SELECT * FROM tbl_books WHERE id = '$book'");
if ($row = $result->fetch()) {
    $title = $row['bookTitle'];
    $status = $row['status'];
    
    if ($status == "Available") {
        $copyCounts = my_query("SELECT COUNT(*) AS count FROM tbl_books WHERE bookTitle = '$title' AND status = 'Available'");
        $count = $copyCounts->fetchColumn();
        
        if ($count == 1) {
            $message = 'The book is not available for borrowing and is for library room use only.';
            echo "<script type='text/javascript'>alert('$message');history.go(-1);</script>";
            exit();
        }
    }
}


        $query = db_insert('tbl_booktransactions', $data);
        $query = db_update('tbl_books', ['status' => 'Borrowed'], ['id' => $book]);
    }

    $message = "Book successfully borrowed.";
    echo "<script type='text/javascript'>alert('$message');window.location.href='../transactions.php?t=Borrowed';</script>";

    break;

        
        
        // case 'return':
        // $userId = $_POST['user_id'];
        

        // foreach ($_POST['book_id'] as $book) {
        //     $data = array(
       
        //     "dateReturn" => $dt,
        //     "penalty" => $xpenalties,
     
        //     "notes" => $_POST['notes'],
        //     "bookStatus" => 'Returned',
        // );
            
        //          $result = my_query("SELECT bookTitle FROM tbl_books WHERE   id= '$book'  ");
        //     if ($row = $result->fetch()) {
                
        //     }else{
        //         $message = 'No result found.';
        //         echo "<script type='text/javascript'>alert('$message');history.go(-1);</script>";
        //         exit();
        //     }
            
            

            
        //     $query = db_update('tbl_booktransactions', $data, ['id' => $_POST['id']]);
        //     $query = db_update('tbl_books', ['status' => 'Available'], ['id' => $_POST['book_id']]);


        // }
        // // ``, `dateReturn`, `penalty`, `notes`

        // $message = "Book successfully Returned.";
        // echo "<script type='text/javascript'>alert('$message');window.location.href='../transactions.php?t=Borrowed';</script>";
        	
        // break;


//Books
 case 'IUBook':
      
       
            $qrcode = $_POST['accno'];
            $isbn = $_POST['isbn'];
            $c1 = $_POST['c1'];
            $c2 = $_POST['c2'];
            $c3 = $_POST['c3'];
            $accno = $_POST['accno'];
            $bookTitle = $_POST['bookTitle'];
            $author = $_POST['author'];
            $author2 = $_POST['author2'];
            $author3 = $_POST['author3'];
            $edition = $_POST['edition'];
            $subject = $_POST['subject'];
            $publish = $_POST['publish'];
            $copyrightDate = $_POST['copyrightDate'];
            $Bdetails = $_POST['Bdetails'];
            $glossary = $_POST['glossary'];
            $ref = $_POST['ref'];
            
            $bibli = $_POST['bibli'];
            $trac = $_POST['trac'];
            
            $dbook = $_POST['dbook'];
            $status = $_POST['status'];
            $created_at =$dt;
     

        if (isset($_POST['id'])) {  //Update
         $data1 = array(
            "qrcode" => $_POST['accno'],
            "isbn" => $_POST['isbn'],
            "c1" => $_POST['c1'],
            "c2" => $_POST['c2'],
            "c3" => $_POST['c3'],
            "accno" => $_POST['accno'],
            "bookTitle" => $_POST['bookTitle'],
            "author" => $_POST['author'],
             "author2" => $_POST['author2'],
              "author3" => $_POST['author3'],
            "edition" => $_POST['edition'],
            "subject" => $_POST['subject'],
            "publish" => $_POST['publish'],
            "copyrightDate" => $_POST['copyrightDate'],
            "Bdetails" => $_POST['Bdetails'],
            "glossary" => $_POST['glossary'],
            "ref" => $_POST['ref'],
            "bibli" => $_POST['bibli'],
            "trac" => $_POST['trac'],
            "dbook" => $_POST['dbook'],
            "status" => $_POST['status'],
            "created_at" =>$dt,
//            "is_archieved" =>  $_POST['is_archieved'],
        );
            $id = $_POST['id'];
            $where = array('id' => $id);
            $query = db_update('tbl_books', $data1, $where);
            echo "<script type='text/javascript'>window.location.href='../books.php?r=updated';</script>";
        } else {
            $copies = $_POST['copies'];
             for ($i = 0; $i < $copies; $i++){
                  $v = $i + 1;
                    if (isExists('tbl_books', ['accno' => $_POST["accno$v"]]) === true) {
                    $acc = $_POST["accno$v"];
                     $message = "Accession Number Already exists: $acc";
                     echo "<script type='text/javascript'>alert('$message');history.go(-1);</script>";
                     exit();
             }
                 
             }
            
            for ($i = 0; $i < $copies; $i++){
                $v = $i + 1;
                $data = array(
                    "qrcode" => $_POST["accno$v"],
                    "isbn" => $isbn,
                    "c1" => $c1,
                    "c2" => $c2,
                    "c3" => $c3,
                    "accno" => $_POST["accno$v"],
                    "bookTitle" => $bookTitle,
                    "author" => $author,
                    "author2" => $author2,
                    "author3" => $author3,
                    "edition" => $edition,
                    "subject" => $subject,
                    "publish" => $publish,
                    "copyrightDate" => $copyrightDate,
                    "Bdetails" => $Bdetails,
                    "glossary" => $glossary,
                    "ref" => $ref,
                    "bibli" => $bibli,
                    "trac" => $trac,
                    "dbook" => $dbook,
                    "status" => $status,
                    "created_at" =>$created_at,
                );
                $query = db_insert('tbl_books', $data);
                
                if ($v == $copies){
                     echo "<script type='text/javascript'>window.location.href='../books.php?r=added';</script>";
                }
            }
           
        }
        break;

    case 'deleteBook':
        $id = $_POST['id'];
        $where = array('id' => $id);
        $query = db_delete('tbl_books', $where);

        $message = "Information successfully deleted.";
        echo "<script type='text/javascript'>window.location.href='../books.php?r=deleted';</script>";
        break;

    //Constants
    case 'IUConstants':

        $type = $_POST['type'];
        $value = $_POST['value'];
        $sub_value = $_POST['sub_value'];

        $data = array(
            "type" => $type,
            "value" => $value,
            "sub_value" => $sub_value,
        );

        if (isset($_POST['id'])) {  //Update
            $id = $_POST['id'];
            $where = array('id' => $id);
            $query = db_update('tbl_constants', $data, $where);
            echo "<script type='text/javascript'>window.location.href='../constants.php?r=updated';</script>";
        } else {
            $query = db_insert('tbl_constants', $data);
            echo "<script type='text/javascript'>window.location.href='../constants.php?r=added';</script>";
        }
        break;

    case 'deleteConstants':
        $id = $_POST['id'];
        $where = array('id' => $id);
        $query = db_delete('tbl_constants', $where);

        $message = "Information successfully deleted.";
        echo "<script type='text/javascript'>window.location.href='../constants.php?r=deleted';</script>";
        break;

} ?>