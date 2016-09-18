<?php
session_start();
session_name('firstname');
session_name('lastname');
session_name('email');
session_name('country');
session_name('address');
session_name('city');
session_name('postcode');
session_name('telephone');
session_name('member_id');
session_name('image');
session_destroy();
session_commit();
header("Location: ../theme/login.html");

?>
