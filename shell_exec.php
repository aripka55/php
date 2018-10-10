<?php
$output = shell_exec('ls -lah');
echo "$output";

$pwd = shell_exec('pwd');
echo "<pre>$pwd</pre>";
?>

<?php
$filename = "/var/www/html/andrew/php/test";

if (file_exists($filename)) {
    echo "$filename does exist";
} else {
    echo "$filename does not exist";
} else {
    mkdir("test");
}
?>