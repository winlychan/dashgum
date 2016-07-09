<?php

class DB_Functions {

    private $db;

    //put your code here
    // constructor
    function __construct() {
        include_once '../controller/db_connect.php';
        // connecting to database
        $this->db = new DB_Connect();
        $this->db->connect();
    }

    // destructor
    function __destruct() {

    }

    /**
     * Storing new user
     * returns user details
     */
    public function storeUser($name, $password, $email, $gcm_regid, $gcm_mac_address) {
        // insert user into database
        $result = mysql_query("INSERT INTO gcm_users(name, email, password, gcm_regid, gcm_mac_address, created_at) VALUES('$name', '$email', '$password', '$gcm_regid', '$gcm_mac_address', NOW())");
        // check for successful store
        if ($result) {
            // get user details
            $id = mysql_insert_id(); // last inserted id
            $result = mysql_query("SELECT * FROM gcm_users WHERE id = $id") or die(mysql_error());
            // return user details
            if (mysql_num_rows($result) > 0) {
                return mysql_fetch_array($result);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


  public function insertregister($firstname, $lastname, $bday, $email, $sex, $country, $password, $txtid, $address, $telephone, $memberid){
    $result = mysql_query("INSERT INTO `user`(`firstname`, `lastname`, `birthdate`, `email`, `sex`, `nationality`, `password`, `address`, `identity`, `telephone`, `member_id`)
    VALUES ('$firstname', '$lastname', '$bday', '$email', '$sex', '$country', '$password', '$address', '$txtid', '$telephone', '$memberid')");
  }

    /**
     * Check user is existed or not
     */
    public function isUserExisted($email,$txtid) {
        $result = mysql_query("SELECT email,identity from user WHERE email = '$email' OR identity = '$txtid'");
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            // user existed
            return 1;
        } else {
            // user not existed
            return 0;
        }
    }

}

?>
