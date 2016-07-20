<?php
include_once '../controller/db_functions.php';
session_start();
$email                  = $_POST['emaillogin'];
$password               = $_POST['password'];
$db = new DB_Functions();
$password = md5($password);
//print $email."<br>";
//print $password;
$data = $db->getUser($email,$password);
if($data == false){
  header('Location: ../theme/login.html');
  //print $data;
}else{
  //print $data['firstname'];
  $_SESSION["firstname"] = $data['firstname'];
  $_SESSION["lastname"] = $data['lastname'];
  $_SESSION["email"] = $data['email'];
  $_SESSION["country"] = $data['country'];
  $_SESSION["address"] = $data['address'];
  $_SESSION["city"] = $data['city'];
  $_SESSION["postcode"] = $data['postcode'];
  $_SESSION["telephone"] = $data['telephone'];
  $_SESSION["member_id"] = $data['member_id'];
  header('Location: ../theme/Profile.html');
}

 ?>
