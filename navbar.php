<?php
echo "<br />";
//echo "<a href=users.php>Users</a>";

echo (basename($_SERver['PHP_SELF']) == "users.php") ?" <a href=users.php><strong>Users</strong></a>" : "<a href=users.php>Users</a>";

if (basename($_SERVER['PHP_SELF']) == "users.php"){
    echo "<a href=users.php><strong>Users</strong></a>";
} else{
    "<a href=users.php>Users</a>";
}

"<a href=upload.php>Upload</a>";
?>