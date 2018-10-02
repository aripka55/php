<?php
// checks to make sure session is started, if not, starts session
if(!isset($_SESSION)){
  session_start();
}

 echo basename($_SERVER['PHP_SELF']) == "login.php"? "<a href=\"login.php\"><strong>Login/Logout</strong></a>" : "<a href=\"login.php\">Login/Logout</a>";
 echo " | ";
 echo basename($_SERVER['PHP_SELF']) == "register.php"? "<a href=\"register.php\"><strong>Register</strong></a>" : "<a href=\"register.php\">Register</a>";

//these options only appear if user is logged in
 if(isset($_SESSION['username'])){
   echo " | ";
   echo basename($_SERVER['PHP_SELF']) == "upload.php"? "<a href=\"upload.php\"><strong>Upload an Image</strong></a>" : "<a href=\"upload.php\">Upload an Image</a>";
   echo " | ";
   echo basename($_SERVER['PHP_SELF']) == "users.php"? "<a href=\"users.php\"><strong>View Site Users</strong><a/>" : "<a href=\"users.php\">View Site Users<a/>";
 }
  ?>