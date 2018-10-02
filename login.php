<?php 
session_start(); 
require('dbconnection.php');

if(isset($_POST['username'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    // SQL statment to execute. SURROUND VARIABLES WITH SINGLE QUOTES
    $sql = "SELECT username, password FROM users where username = '$username'"; 

    //Execute the SQL and return array to $result
    $result = $conn->query($sql);

    // Extraction the returned query information
    while($row = $result->fetch_assoc()){
       if ($username == $row['username'] && password_verify($password, $row['password'])){
            $_SESSION['username'] = $username;
        } // Closes IF statements
    } // Closes WHILE statements
} // Closes POST statements
?>

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


//echo $username;
//echo $password;

if (isset ($_POST['logout'])){
    unset($_SESSION['username']);
}
?>

   <body>

    <body>

<!--<a href="register.php">Register Here</a>-->

<?php
// if (isset($_SESSION['username'])){
//     echo "<a href=\"upload.php\"> | Upload an Image</a>";
//
// }
//
// if (isset($_SESSION['username'])){
//     echo "<a href=\"users.php\"> | View Site Users</a>";
//
// }

// echo "<a href=\"login.php\">Login/Logout</a>";
// echo "<a href=\"register.php\"> | Register</a>";
//
// if (isset($_SESSION['username'])){
//   echo "<a href=\"upload.php\"> | Upload an Image</a>";
//   echo "<a href=\"users.php\"> | View Site Users<a/>";
// }

//brings in content from navbar page
require('navbar.php');

echo "<hr />";
echo "<br />";
 ?>
    <form method="post" action="">
        <input type="text" name="username" placeholder="Enter Username"><br />
        <input type="password" name="password">
        <br>
        <input type="submit" value="Go">
        <br>
        <input type="submit" name="logout" value="Logout">
    </form>

<?php


echo "Logged in as: " . $_SESSION['username'];

?>
    </body>
</html>

