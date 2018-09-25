<?php
//Check to see if session has started
if (!isset($_SESSION)){
  session_start();
}
//If user is not logged in, send them to login page
if (!isset($_SESSION['username'])){
  header('Location: login.php');
}

if (isset($_GET['id']) && $_GET['edit']="edit"){
    require('dbconnection.php'); // Bring in database connection
    $sql = "SELECT * FROM users WHERE userid = " . $_GET['id'];
    $result = $conn->query($sql);

    echo "<form action=\"\" method=\"post\">"

    while ($row = $result->fetch_assoc()){
        echo "<input type=\"text\" disabled value=\"$row['userid']\">"
    }

} else{
    echo "You should net be here.";
}
?>