

<?php

if(!isset($_SESSION))   {    session_start();   }

function db_connect(){
    $hostname = "localhost";
    $dbname = "u823561260_library";
    $username = "root";
    $password = "";

    try {
        $db = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $e) {
        // Handle the exception here, such as displaying an error message
        echo "Connection failed: " . $e->getMessage();
        exit;
    }
}

function getPrediction($h2O,$rainDrop){
    if ($h2O==2 & $rainDrop==2) {
        $predict='Dangerous';
    }else{
        $predict='Sample';
    }
    return $predict;
}

function last_insert(){
    $db = db_connect();
    return $db->lastInsertId();
}

function db_getid($tableName,$where,$column){
    $db = db_connect();
    $stringWhere = "";
    $value = "";
    $array = array();

    foreach($where as $key => $values){
        $stringWhere .= $key. "= '".$values."' AND ";
        $array[":".$key] = $values;
    }

    $stringWhere = substr($stringWhere,0,-4);
    $query = "SELECT ".$column." FROM ".$tableName." WHERE ".$stringWhere;

    try{
        $sth = $db->query($query);
        if(!empty($sth)) {
            $row = $sth->fetch(PDO::FETCH_ASSOC);
            $value=$row[$column];

        }
        else $value="";
    }catch(PDOException $e){

    }

    return $value;
}

function db_error($e){
    echo json_encode(array("success"=>false,"message"=>$e));
}

function db_count($tableName, $where){
    $db = db_connect();
    $stringWhere = "";
    $array = array();
    $count = 0;

    foreach($where as $key => $values){
        $stringWhere .= $key. " = '".$values."' AND ";
        $array[":".$key] = $values;
    }
    $stringWhere = substr($stringWhere,0,-4);
    $query = "SELECT COUNT(*) as n FROM $tableName WHERE $stringWhere";
    try{
        $sth = $db->query($query);
        if(!empty($sth)){
            $row = $sth->fetch(PDO::FETCH_ASSOC);
            $count = $row['n'];
        }
    }catch(Exception $e){
        $count = 0;
    }

    return $count;
}

function getSettings($column_name){
    $value = "";
    $db = db_connect();
    $query = "SELECT $column_name FROM settings";
    $sth = $db->query($query);
    while($row = $sth->fetch(PDO::FETCH_ASSOC)){
        $value = $row[$column_name];
    }
    return $value;
}

function get_result($tableName,$data,$where){
    $db = db_connect();
    $stringValues = "";
    $stringWhere = "";
    $array = array();

    foreach($where as $key => $values){
        $stringWhere .= $key. " = '".$values."' AND ";
        $array[":".$key] = $values;
    }

    $value = "";
    $stringWhere = substr($stringWhere,0,-4);
    $stringValues = substr($stringValues,0,-1);
    $query = "SELECT $data FROM $tableName WHERE ".$stringWhere;


    try{
        $sth = $db->query($query);

        if(!empty($sth)) {
            $row = $sth->fetch(PDO::FETCH_ASSOC);
            $value=$row[$data];

        }
        else $value="";

    }catch(PDOException $e){
        $value="";
    }
    return $value;
}
function db_update($tableName,$data,$where){
    $db = db_connect();
    $stringValues = "";
    $stringWhere = "";
    $array = array();

    foreach($data as $key => $value){
        $stringValues .= $key. " = :".$key.",";
        $array[":".$key] = $value;
    }

    foreach($where as $key => $values){
        $stringWhere .= $key. "= :".$key." AND ";
        $array[":".$key] = $values;
    }

    $boolean = "";
    $stringWhere = substr($stringWhere,0,-4);
    $stringValues = substr($stringValues,0,-1);
    $query = "UPDATE $tableName SET ".$stringValues." WHERE ".$stringWhere;


    try{
        $sth = $db->prepare($query);
        $sth->execute($array);
        $boolean = true;
    }catch(PDOException $e){
        $boolean = false;
    }

    return $boolean;
}
function db_insert($tableName,$data){
    $db = db_connect();
    $stringValues = "";
    $stringInit = "";
    $stringParam = "";
    $array = array();
    foreach($data as $key => $value){
        $stringInit .= $key.",";
        $stringValues .= ":".$key.",";
        $array[":".$key] = $value;
    }
    $boolean = "";
    $stringInit = substr($stringInit,0,-1);
    $stringValues = substr($stringValues,0,-1);
    $query = "INSERT INTO $tableName (".$stringInit.") VALUES(".$stringValues.")";
    try{
        $sth = $db->prepare($query);
        $sth->execute($array);
        $boolean = $db->lastInsertId();

    }catch(PDOException $e){
        $boolean = $e;
    }

    return $boolean;
}
function db_delete($tableName,$data){
    $db = db_connect();
    $stringWhere="";

    $array = array();

    foreach($data as $key =>$values){
        $stringWhere .= $key. "= :".$key." AND ";
        $array[":".$key] = $values;
    }

    $boolean="";
    $stringWhere = substr($stringWhere,0,-4);
    $query = "DELETE FROM $tableName WHERE ".$stringWhere;

    try{
        $sth = $db->prepare($query);
        $sth->execute($array);
        $boolean=true;
    }catch(PDOException $e){
        $boolean = $e;
    }

    return $boolean;
}
function db_response($query){
    if($query) echo json_encode(array('success' => true)); else echo json_encode(array('success' => false));
}
function db_select($tableName,$orderby){
    $db = db_connect();
    $query = "SELECT * FROM $tableName $orderby";
    $value=$db->query($query);
    return $value;
}
function db_select_by_id($tableName,$where){
    $db = db_connect();
    $query = "SELECT * FROM $tableName WHERE ".$where;
    $value=$db->query($query);
    return $value;
}


function isExists($tableName,$where){
    $db = db_connect();
    $boolean = "";
    $where_string = "";
    foreach($where as $key => $values){
        $where_string .= $key. "= '".$values."' AND";
    }
    $where_string = substr($where_string,0,-4);

    try{
        $query = "SELECT * FROM $tableName WHERE ".$where_string;
        $sth=$db->query($query);
        if($sth->rowCount ()  > 0) $boolean = true;
        else $boolean = false;
    }catch(PDOException $e){
        $boolean = false;
    }

    return $boolean;
}

function db_select_where($tableName,$where){
    $db = db_connect();
    $query = "SELECT * FROM $tableName WHERE ".$where;
    $value=$db->query($query);
    return $value;
}
function my_query($mquery){
    $db = db_connect();
    $query = $mquery;
    $value=$db->query($query);
    return $value;
}


function order_stat($value){

    return $value;
}

function format_date($val)
{
    if ($val <> '') {
        $val = date('M. d, Y ', strtotime($val));
    }
    return $val;
}

function format_time($val)
{
    if ($val <> '') {
        $val = date('g:i A', strtotime($val));
    }
    return $val;
}

function format_datetime($val)
{
    if ($val <> '') {
        $val = date('M. d, Y h:i A', strtotime($val));
    }
    return $val;
}

function peso_format($amount)
{
    $amount = number_format($amount, 2, ".", ","); // returns: 1,23
    if ($amount == '0.00') {
        $amount = "";
    }
    //$amount = "<a class='text-align: right;'>".$amount."</a>";

    return $amount;
}

function ualt($action){
    $data = array("userId"=>$_SESSION['user_id'], "action"=>$action);
    $query = db_insert('logs',$data);
}



function endecrypt( $string, $action = 'e' ) {
    // you may change these values to your own
    $secret_key = $_SESSION['key'];
    $secret_iv = $_SESSION['key'];

    $output = false;
    $encrypt_method = "AES-256-CBC";
    $key = hash( 'sha256', $secret_key );
    $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );

    if( $action == 'e' ) {
        $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
    }
    else if( $action == 'd' ){
        $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
    }

    return $output;
}

function db_get_result($tableName, $column, $where)
{
    $db = db_connect();
    $stringWhere = "";
    $value = "";
    $array = array();

    foreach ($where as $key => $values) {
        $stringWhere .= $key . "= '" . $values . "' AND ";
        $array[":" . $key] = $values;
    }

    $stringWhere = substr($stringWhere, 0, -4);
    $query = "SELECT " . $column . " FROM " . $tableName . " WHERE " . $stringWhere;

    try {
        $sth = $db->query($query);
        if (!empty($sth)) {
            $row = $sth->fetch(PDO::FETCH_ASSOC);
            $value = $row[$column];

        } else $value = "";
    } catch (PDOException $e) {

    }

    return $value;
}



// function compute_age( $val) {
// //    list($day,$month,$year) = explode("/",$val);
// //    $year_diff  = date("Y") - $year;
// //    $month_diff = date("m") - $month;
// //    $day_diff   = date("d") - $day;
// //    if ($day_diff < 0 || $month_diff < 0)
// //        $year_diff--;
// //    return $year_diff;

//     return 19;
// }



//Declaration


date_default_timezone_set('Asia/Manila');
$dt =  date('Y-m-d H:i:sa');
$_BASE_URL_PATH = "http://localhost/library/";
$dateNow = date('Y-m-d');


$title='Online Library Information System.';
$_SESSION['key']='imBlessed@o1';
$server_email='admin@cct-olis.site';
$db =db_connect();


(isset($_SESSION['user_id']) ? $user_id=$_SESSION['user_id'] : $user_id=0);
(isset($_SESSION['role']) ? $user_role=$_SESSION['role'] :  $user_role='');



// if (isset($_SESSION['role'])) {
//     if ($_SESSION['role'] == 'Seller') { //For main user only
//         $user_id=$_SESSION['user_id'];
//         $strW = ' WHERE seller_id='.$user_id;
//         $strA = ' AND seller_id='.$user_id;
//     } else {
//         $strW = '';
//         $strA = '';
//     }
// }

function itexmo($number,$message){
    $ch = curl_init();
    $itexmo = array('1' => $number, '2' => $message, '3' => "", 'passwd' => "");
    curl_setopt($ch, CURLOPT_URL,"https://www.itexmo.com/php_api/api.php");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,
        http_build_query($itexmo));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    return curl_exec ($ch);
    curl_close ($ch);
}

function sendEmail($xsubject,$body,$email){
$subject = "FROM : CCT-Online Library Information System, ". $xsubject;
$txt = $body;
$to = $email;
$from = 'admin@library.phsite.tech';
$headers = "From:" . $from;
mail($to, $subject, $txt, $headers);
}

function isMobileDevice(){
    $aMobileUA = array(
        '/iphone/i' => 'iPhone',
        '/ipod/i' => 'iPod',
        '/ipad/i' => 'iPad',
        '/android/i' => 'Android',
        '/blackberry/i' => 'BlackBerry',
        '/webos/i' => 'Mobile'
    );

    //Return true if Mobile user Agent is detected
    foreach($aMobileUA as $sMobileKey => $sMobileOS){
        if(preg_match($sMobileKey, $_SERVER['HTTP_USER_AGENT'])){
            return true;
        }
    }
    //Otherwise return false..
    return false;
}



// function distance(
//     $latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371000)
// {
//     // convert from degrees to radians
//     $latFrom = deg2rad($latitudeFrom);
//     $lonFrom = deg2rad($longitudeFrom);
//     $latTo = deg2rad($latitudeTo);
//     $lonTo = deg2rad($longitudeTo);

//     $latDelta = $latTo - $latFrom;
//     $lonDelta = $lonTo - $lonFrom;

//     $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
//             cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
//     return $angle * $earthRadius;
// }

$adminFee = 0.01; // 1percent

(isset($_SESSION['ar']) ? $ar=$_SESSION['ar'] :  $ar='AR');

?>