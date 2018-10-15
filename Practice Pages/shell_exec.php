<?php
$output = shell_exec('ls -lah');
echo "$output";

$pwd = shell_exec('pwd');
echo "<pre>$pwd</pre>";

$file_test = file_exists("test");
if ($file_test) {
  $folder_test = is_dir("test");
  if ($folder_test) {
    echo "test exists, and is a folder" . "<br/>";

    $testArray = scandir("test/");
    //var_dump($testArray);

    foreach ($testArray as $key => $value) {
      // code...
      if ($value == "." || $value == "..") { continue; }
      echo $value . "<br />";
    }

  } else {
    echo "test exists and is a file";
  }
} else {
  mkdir("test");
}

$users = shell_exec("w");
$usersExploded = explode("\n", $users);
//var_dump($usersExploded);
foreach ($usersExploded as $key => $value) {
  if ($key == "0" || $key == "1") { continue; }
  echo $value . "<br>";
}

?>