<?php
$output = shell_exec('ls -lah');
echo "$output";

$pwd = shell_exec('pwd');
echo "<pre>$pwd</pre>";
?>