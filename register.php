<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    require('dbconnection.php');
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "INSERT INTO users (username,password) VALUES ('$username, '$password')";
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <form method="post" action="">
        <input type="text" name="username"><br>
        <input type="password" name="password"><br>
        <input type="submit">
    </form>
    
</body>
</html>