<?php
//must be in caps!
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  require('dbconnection.php');
  // Grab Post data...could be dangerous because of XSS or SQL injection
  $username = $_POST['username'];
  // Sanitize the $username by remove tags
   //sanitize the username by removing tags
   $username = filter_var($username, FILTER_SANITIZE_STRING);

   //trim any white space from beginning and end of username - 
   $username = trim($username);

   //remove slashes // or \\ from username - not allowed
   //$username = stripslashes($username);
   $username = str_replace("/", "", $username);
   $username = str_replace("//", "", $username);

   //remove spaces
   //$username = str_replace(' ', '',$username); //first parameter is string to look for and second parameter is the replacement
   $username = preg_replace("/\s+/", "", $username);

  // Grab Post data... password will be hashed so no need to sanitize
  $password = $_POST['password'];

  // password hash wont work on red hat till new version
  //MD5 instentanious, bad for security - "rainbow table" = hashed guesses
  //hash is : takes password through algorythem and brings back a hash
  // impossible to reverse! good for security - BCRYPT "salts passwords"
  $password = password_hash($password, PASSWORD_BCRYPT);
  $sql = "INSERT INTO users (username,password) VALUES ('$username','$password')";
  $conn->query($sql);
}
require ('navbar.php');
echo "<hr />";
echo "<br />";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form method="post" action="" >
      username:<input type="text" name="username"><br>
      password:<input type="password" name="password"><br>
      <input type="submit">
    </form>

  </body>
</html>