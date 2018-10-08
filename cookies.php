<?php

$cookie_name="user";
$cookie_value="bob";



//setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // this is equal to one day
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

 <?php
   //check to see if cookie has already been set
        if (isset($_COOKIE['user'])) {

            $lastVisit = $_COOKIE['user'];

            $timeElapsed = date() - $_COOKIE['lastVisit'];

            $timeElapsed->format('%s');

                        // Last Visit Date

            echo "Greetings Mate! <br> The last time you were here was on: " . $timeElapsed;



          } else {

            echo "Hello Mate! I see this is the first time you have been here.";

            //set the cookie info - 86400 is one day. This can be changed to year, months etc...
            //a year would be  = 31536000 + time()
            //months could be set like this $inTwoMonths = 60 * 60 * 24 * 60 + time();

            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

            setcookie('lastVisit', date("G:i - m/d/y"), time() + (86400 * 30), "/");

          }

        setcookie($cookie_name, $cookie_value, time() + (60), "/"); // this expires the cookie



    ?>
</body>
</html>