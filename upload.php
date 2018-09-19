<?php
// Check to see if session is started
if (!isset($_SESSION)) {
  session_start();
}

// If username is not in the database, it will move them to the login page
if (!isset($_SESSION['username'])) {
  // Die("Don't even try mate");
  // Before HTML can't but put at bottom, must be at top
  // When you use header you need 'location: then where you are going to'
  header('Location: login.php'); // If you wanted HTTPS address you need full URL
}

// Takes whatever this is and tells you about it, good for trouble shooting
var_dump($_FILES['upload']);
echo"<hr />";
// Post could have been changed from php 5 to 7
var_dump($_POST['upload']); // Trouble shooting wrong statement

// Use ctrl / to auto comment by line

// Code for uploading file, will work after post data is sent
if (isset($_FILES['upload']) ){ //could use != null after ] instead of isset
  // Check to see if uploads folder exists
  if (!file_exists("uploads")){
    // If uploads folder(directory) dose not exist create it
    mkdir("./uploads"); // ./ is the root directory
  }

  if(!file_exists("uploads/" . $_SESSION['username'])){
    mkdir("uploads/" . $_SESSION['username']);
  }

  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES['upload']['name']);
  $uploadVerify = true;

// Lets check to see if the file already exists

// Vupdaariables are global
if (file_exists($target_file)) {
  $uploadVerify = false;
  $ret = "Sorry file already exists";
}

// Check file for type
$file_type = $_FILES['upload']['type'];

switch ($file_type) {
  case 'image/jpeg':
    $uploadVerify = true;
    break;
  case 'image/png':
    $uploadVerify = true;
    break;
  case 'image/gif':
    $uploadVerify = true;
    break;
  case 'application/pdf':
    $uploadVerify = true;
    break;
  default:
    $uploadVerify = false;
    $ret = "sorry only jpeg, gif, png, and pdf files allowed";
    break;
}

// PHP has file upload limit of 2mb by default
if ($_FILES['upload']['size'] > 1000000 ) {
  $uploadVerify = false;
  $ret = "Sorry file too big";
}

// If set value has value can be used as true w/o conditions
if ($uploadVerify) {
    // Moves files
    move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file);
}
}

 ?>

 Upload your file.
<br />
 <!--info on w3schools-->
 <form action="" method="post" enctype="multipart/form-data">
   <input type="file" name="upload">
 <br />
 <br />
 <input type="submit">

 </form>

 <h5 style="color:red;">
   <?php if ($ret) { echo $ret; } ?>
</h5>

