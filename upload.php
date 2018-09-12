<?php 
if(!isset($_SESSION)){
    session_start();
}

if(!isset($_SESSION['username'])){
    header('Location: login.php');
}

var_dump($_POST['upload']);
echo "<hr />";
var_dump($_FILES['upload']);

if($_FILES['upload'] != null){

    $target_dir = "upload/";
    echo $target_dir . "<br>";
    $target_file = $target_dir . basename($_FILES['upload']['files']);
    echo $target_file . "<br>";

    move_uploaded_file($_FILES['upload']['tmp_name'], $target_file);
}
?>

Upload your file.

<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="upload">
    <br />
    <input type="submit">
</form>
