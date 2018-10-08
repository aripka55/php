<?php
$cookie_name = "last_visit";
$cookie_value = date("l jS \of F Y h:i:s A");

if (isset($_COOKIE['last_visit'])){
  $notification = "You have been here within the last 30 days";
  $last_visit = $_COOKIE['last_visit'];
  setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
} else {
  $notification = "This is your first time here, or it's been more than 30 days";
  setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h2>
      <?php echo $notification; ?>
    </h2>
  </body>