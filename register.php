<?php
//must be in caps!
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  require('dbconnection.php');
  $username = $_POST['username'];
  $password = $_POST['password'];

  // password hash wont work on red hat till new version
  //MD5 instentanious, bad for security - "rainbow table" = hashed guesses
  //hash is : takes password through algorythem and brings back a hash
  // impossible to reverse! good for security - BCRYPT "salts passwords"
  $password = password_hash($password, PASSWORD_BCRYPT);
  $sql = "INSERT INTO users (username,password) VALUES ('$username','$password')";
  $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

   <a href = "register.php">Register</a>
     <?php
     if (isset($_SESSION['username'])) {
     echo "<a href =\"upload.php\"> | Upload </a>";
     }
     if (isset($_SESSION['username'])) {
     echo "<a href =\"users.php\"> | Users </a>";
     }
      ?>

    <form method="post" action="" >
      username:<input type="text" name="username"><br>
      password:<input type="password" name="password"><br>
      <input type="submit">
    </form>

  </body>
</html>