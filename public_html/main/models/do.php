<?php
include_once('../../config.php');


if ($_GET['do'] == 'deleteConstants') {
    $q = $db->prepare("DELETE FROM tbl_constants  WHERE id='$id'");
    $q->execute(array());
    header("location: ../constants.php?r=deleted");
}

if ($_GET['do'] == 'delete') {


    $query = db_delete('tbl_contact_us', ['id' => $_GET['id']]);
    $message = "Information successfully deleted.";
    echo "<script type='text/javascript'>alert('$message');history.go(-1);</script>";
    exit();

}

if ($_GET['do'] == 'archivedBook') {
    $query = db_update('tbl_books', ['status' => 'Archived'], ['id' => $_GET['id']]);
    $message = "Book successfully archived.";
    echo "<script type='text/javascript'>alert('$message');history.go(-1);</script>";
    exit();

}

if ($_GET['do'] == 'restoreBook') {
    $query = db_update('tbl_books', ['status' => 'Available'], ['id' => $_GET['id']]);
    $message = "Book successfully restored.";
    echo "<script type='text/javascript'>alert('$message');history.go(-1);</script>";
    exit();

}


if ($_GET['do'] == 'stat') {

    if ($_GET['stat'] == 0) {
        $newstat = '1';
    } else {
        $newstat = '0';
    }
    $data = array(
        "stat" => $newstat,
    );

    $query = db_update($_GET['tbl'], $data, ['id' => $_GET['id']]);
    $message = "Information successfully updated.";
    echo "<script type='text/javascript'>alert('$message');history.go(-1);</script>";
    exit();

}
if ($_GET['do'] == 'updateCMS') { //Update CMS

    $data = array(
        "mission" => $_POST['mission'],
        "vision" => $_POST['vision'],
        "email" => $_POST['email'],
        "contact" => $_POST['contact'],
        "termsCondition" => $_POST['termsCondition'],

        "aboutIntro" => $_POST['aboutIntro'],
        "address" => $_POST['address'],
//        "profile" => $_POST['profile'],
        "aboutUs" => $_POST['aboutUs'],
        "quotation" => $_POST['quotation'],

        "name" => $_POST['name'],
        "mapFrame" => $_POST['mapFrame'],
        "fbLink" => $_POST['fbLink'],
    );

    $where = array('id' => '1');
    $query = db_update('tbl_companyinfo', $data, $where);

    $message = "Information successfully updated.";
    echo "<script type='text/javascript'>alert('$message');window.location.href='../cms.php';</script>";
    exit();
}
?>