<?php
if (!isset($_SESSION)){
  session_start();
}

if (!isset($_SESSION['username'])){
  header('Location: login.php');
}

require('navbar.php');
echo "<hr />";
echo "<br />";

if (isset($_SESSION['username'])) {
  echo "<a href =\"upload.php\">  Upload </a>";
  }
  if (isset($_SESSION['username'])) {
  echo "<a href =\"users.php\"> | Users </a>";
  }

// Check to see if there is any post info...it would come from the change form
if (isset($_POST)){
require('dbconnection.php'); //bring in database connection
$userid = $_POST['userid'];
$username = $_POST['username'];
$password = $_POST['password'];
$sql = "UPDATE users set username = \"$username\", password = \"$password\" WHERE userid = $userid";
$result = $conn->query($sql);

}

if (isset($_GET['id']) && $_GET['edit']=="edit") {
  require('dbconnection.php'); //bring in database connection
  $sql = "SELECT * from users where userid = " . $_GET['id']; //id is int datatype don't quote it
  $result = $conn->query($sql);


  echo "<form action=\"?userid=\" method=\"post\">";

  while ($row = $result->fetch_assoc()) {
    echo "<input type=\"text\" disabled value=\"" . $row['userid'] . "\">";
    echo "<input name=\"userid\" type=\"hidden\" value=\"" . $row['userid'] . "\">";
    echo "<br />";
    echo "<input name=\"username\" type=\"text\" value=\"" . $row['username'] . "\">";
    echo "<br />";
    echo "<input name=\"password\" type=\"text\" value=\"" . $row['password'] . "\">";
    echo "<br />";
    echo "<input type=\"submit\" name=\"submit\" value=\"change\">";
  }

  echo "</form>";


} else {
  echo "You should not be here.";
}





?>