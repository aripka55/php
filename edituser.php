<?php
// check to see if session is started
if (!isset($_SESSION)) {
  session_start();
}
//if username not logged in, will move them to login page
if (!isset($_SESSION['username'])) {
   header('Location: login.php');
}

if (isset($_GET['id']) && $_GET['edit']=="edit"){

    require('dbconnection.php'); //bring in the database connection
    $sql = "SELECT * from users where userid =" . $_GET['id']; // id is int datatype note don't quote it
    $result = $conn->query($sql);

    echo "<form action=\"\" method=\"post\">";

    while ($row = $result->fetch_assoc()) {
        echo "<input name =\"userid\" type=\"text\" disabled value =\"". $row['userid'] ."\">";
        echo "<br />";
        echo "<input name =\"username\" type=\"text\" disabled value =\"". $row['username'] ."\">";
        echo "<br />";
        echo "<input name =\"password\"  type=\"text\" disabled value =\"". $row['password'] ."\">";
        echo "<br />";
        echo "<input type=\"submit\" name=\"submit\" value=\"change\">";
    }

    echo "</form>";

} else {
    echo "You should not be here.";
}
