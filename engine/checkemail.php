<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once '../controller/db_functions.php';

$email = $_GET['email'];
$txtid = $_GET['txtid'];
$db = new DB_Functions();
$boolean = $db->isUserExisted($email,$txtid);


$outp = "[";
$outp .= '{"boolean":"'  . $boolean . '"}';
$outp .="]";

print $outp;


?>
