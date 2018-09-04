<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>

<?php
$username = $_POST['username'];
$password = $_POST['password'];
?>

   <body>
      <form>
        <form method="post" action="">
        <input type="text" name="username" placeholder="Enter Username"><br />
        <input type="password" name="password">
        <br>
        <input type="submit" value="GO">
        <br>
        <input type="submit" name="logout" value="logout">

      </form>

<?php
if (isset($username) && isset($password)){
    if ($username == "andrew" && $password == "password"){
        $_SESSION['username'] = $username;
    }
}

echo "Logged in as: " . $_SESSION['username'];

?>
    </body>
</html>

