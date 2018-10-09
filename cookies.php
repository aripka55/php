<?php
$cookie_name = "lastVisit";
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
if (isset($_COOKIE['lastVisit'])) {
  $notification = "AH-HA Mate, You have been here before. You just can't stay away.";
  $lastVisit = $_COOKIE['lastVisit'];
  setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
} else {
  $notification = "Welcome Mate!!! I see this is your first visit";
  setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
}

if ($seconds <= 60) {
  $notification = "Last time you were here Mate was " . (time() $lastVisit) . " seconds ago";
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
          echo ($lastVisit != "")? "<br /> Last time you came to see me mate: " . $lastVisit : "";
       ?>
    </p>
  </body>
</html>