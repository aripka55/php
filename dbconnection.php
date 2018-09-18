<?php
    // Setting up the Database Connection
    $db_host = 'localhost'; // Database is installed on PHP server
    $db_user = 'andrew'; // Name to log into the database
    $db_password = 'southhills#'; // Password to log into MySQL
    $db_name = 'andrew'; // Name of the database within MySQL
    $conn = new mysqli($db_host, $db_user, $db_password, $db_name);
    if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
    ?>