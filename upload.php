<?php 
if (!isset($_SESSION)){
    session_start();
}

if (!isset($_SESSION['username'])){
    header('Location: login.php');
}

var_dump($_POST['upload']);
echo "<hr />";
var_dump($_FILES['upload']);

if (isset($_FILES['upload'])){
    // Check to see if uploads folder exists
    
    //If uploads folder does not exist, create it
    mkdir("uploads/");
    
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES['upload']['name']);
    $uploadVerification = true;

    // Lets check to see if the file already exists
    if (file_exists($target_file)){
        $uploadVerification = false;
        $ret = "Sorry file already exists!";
    }

    // Check file for type
    $file_type = $_FILES['upload']['type'];
    switch ($file_type){
        case "image/jpeg";
          $uploadVerification = true;
          break;
        case "image/png";
          $uploadVerification = true;
          break;
        case "application/pdf";
          $uploadVerification = true;
          break;
        default;
          $uploadVerification = false;
          $ret = "sorry obly jpg, png, gif, and pdf files are allowed";
    }

    if ($_FILES['upload'] ['size'] > 1000000 ){
        $uploadVerification = false;
        $ret = "Sorry file is too big!";
    }

    if ($uploadVerification) {
        move_uploaded_file($_FILES['upload']['tmp_name'], $target_file);
    }
}
?>

Upload your file.

<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="upload">
    <br />
    <input type="submit">
</form>

<h5 style="color: red;">
  <?php if ($ret) { echo $ret; }) ?>
</h5> -->
