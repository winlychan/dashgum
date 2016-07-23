<?php
session_start();
if($_SESSION!=null){
  $data['member_id'] = $_SESSION["member_id"];
}else{
  header('Location: ../theme/login.html');
}
include_once '../controller/db_functions.php';
$db = new DB_Functions();
$firstname  = $_POST["firstname"];
$lastname   = $_POST["lastname"];
$email      = $_POST["email"];
$country    = $_POST["country"];
$address    = $_POST["address"];
$city       = $_POST["city"];
$postcode   = $_POST["postcode"];
$telephone  = $_POST["telephone"];
$member_id  = $data['member_id'];
//$image      = $_POST["image"];
$password   = $_POST["password"];
$confirm_password = $_POST["confirm_password"];
//print $password;
if($password==null){

  $db->updateProfilewithoutpassword($firstname, $lastname, $email, $country, $address, $city, $postcode, $telephone, $member_id);
  print "UPDATE user SET firstname='$firstname', lastname='$lastname', email='$email', nationality='$country', address='$address', city='$city', postcode='$postcode', telephone='$telephone'  WHERE member_id='$member_id'";
  header("Location: ../theme/Profile.php");
}else{
  if($password != $confirm_password){
    header('Location: ../theme/Profile.php?confirm=1');
  }else{

  $db->updateProfilewithpassword($firstname, $lastname, $email, $country, $address, $city, $postcode, $telephone, $password, $member_id);
    print "UPDATE user SET firstname='$firstname', lastname='$lastname', email='$email', nationality='$country', address='$address', city='$city', postcode='$postcode', telephone='$telephone', password='$password', confirm_password='$confirm_password'  WHERE member_id='$member_id'";
  header("Location: ../theme/Profile.php");
  }
}



 ?>
