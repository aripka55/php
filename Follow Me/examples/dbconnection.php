<?php
// Setting up the database connection
$db_host = 'localhost';
$db_user = 'andrew'; // Username
$db_password = 'southhills#'; 
$db_name = 'andrew'; // Database Name 
$conn = new mysqli($db_host, $db_user, $db_password, $db_name);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
 ?>