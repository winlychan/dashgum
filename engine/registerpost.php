<?php

include_once '../controller/db_functions.php';

$firstname              = $_POST['first_name'];
$lastname               = $_POST['last_name'];
$bday                   = $_POST['DOBYear'].'-'.$_POST['DOBMonth'].'-'.$_POST['DOBDay'];
$email                  = $_POST['email'];
$sex                    = $_POST['Sex'];
$country                = $_POST['Country'];
$password               = $_POST['password'];
$password_confirmation  = $_POST['password_confirmation'];
$txtid                  = $_POST['txtID'];
$address                = $_POST['Address'].' '.$_POST['City'].' '.$_POST['Postcode'];
$telephone              = $_POST['Telephone'];
$memberid = genid($country,$txtid);

$db = new DB_Functions();
$password = md5($password);
$db->insertregister($firstname, $lastname, $bday, $email, $sex, $country, $password, $txtid, $address, $telephone, $memberid);
//insertregister($firstname, $lastname, $bday, $email, $sex, $country, $password, $password_confirmation, $txtid, $address, $telephone, $memberid)
header("Location: ../Theme/login.html");
function genid($country,$txtid){
$id = substr($txtid,-8);
//$nation = substr($country,0,2);
$nation = strtoupper($nation);
$result = $nation.$id;
return $result;
}

?>
