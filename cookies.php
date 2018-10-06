<?php
$cookie_name = "user";
$cookie_value ="John Doe";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
// 86400 = 1 day
$lastvisit_cookie = "lastvisit";
$lastvisit_cookie_value = date("F j, Y, g:i a");
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
    if(isset($_COOKIE['user']) && (isset ($_COOKIE['lastvisit']))) {
        $lastvisit = $_COOKIE['lastvisit'];
        echo "You have been here before. The last time you were here was " . $lastvisit;
        setcookie($lastvisit_cookie, $lastvisit_cookie_value, 31536000 + time(), "/");
    } else {
        echo "This is your first time here";
        //setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
        // Last time they visited the page.... tomorrows assignment

    }
    setcookie($cookie_name, $cookie_value, time() + (60), "/");
    setcookie($lastvisited_cookie, $lastvisit_cookie_val, 31536000 + time(), "/");
    ?>
</body>
</html>