<?php
$cookie_name = "last_visit";
$cookie_value = date("l jS \of F Y h:i:s A");// l -day of the week
$seconds = $lastVisit / 60;

//setcookie($cookie_name,$cookie_value, time() + (86400*30), "/");
//86400 = 1 day
//$inTwoMonths = 60 * 60 * 24 * 60 + time();
//setcookie('user', date("G:i - m/d/y"), $inTwoMonths);
//this adds one year to the current time, for the cookie expiration
//$year = 31536000 + time() ;
//setcookie(user, time (), $year);

// Checking if the cookie is set
if (isset($_COOKIE['last_visit'])) {
  $notification = "You have been here before.";
  $last_visit = $_COOKIE['last_visit'];
  setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
} else {
  $notification = "This is your first time visiting";
  setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
}

if ($seconds <= 60) {
  $notification = "The last time you visited was " . (time() $last_visit) . " seconds ago";
}
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <p>
      <?php
          echo $notification;
          echo ($last_visit != "")? "<br /> Last time you visited was: " . $last_visit : "";
       ?>
    </p>
  </body>
</html>