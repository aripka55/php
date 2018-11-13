<?php
session_start();
require('dbconnection.php');

$userid = $_SESSION['user_id'];

$sql = "SELECT * FROM fm_users";

$result = $conn->query($sql);

$sql2 = "SELECT user_id, first_name, last_name, title, image_url FROM fm_users";

$result2 = $conn->query($sql2);

// People that are following you 
$sql3 = "SELECT user_id FROM fm_followers WHERE following_user_id = '$userid'";

$followingprofile = $conn->query($sql3);

while($row = $followingprofile->fetch_row()) {
$follows_me[] = $row[0];
}

// People that you are following
$sql4 = "SELECT following_user_id FROM fm_followers WHERE fm_user_id = '$userid'";

$follow_result = $conn->query($sql4);

while($row1 = $follow_result->fetch_row()) {
$following_user_id[] = $row1[0];
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<link rel="icon" type="image/png" href="../assets/img/favicon.ico">
<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

<title>Profile Page by Andrew</title>

<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
<meta name="viewport" content="width=device-width" />

<!-- Bootstrap core CSS -->
<link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
<link href="../assets/css/paper-kit.css?v=2.1.0" rel="stylesheet"/>

<!-- CSS for Demo Purpose, don't include it in your project -->
<link href="../assets/css/demo.css" rel="stylesheet" />

<!-- Fonts and icons -->
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,300,700' rel='stylesheet' type='text/css'>
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
<link href="../assets/css/nucleo-icons.css" rel="stylesheet">
</head>

<body>
  <!--Navigation Bar-->
  <nav class="navbar navbar-expand-md fixed-top navbar-transparent" color-on-scroll="150">
    <div class="container">
        <div class="navbar-translate">
        <button class="navbar-toggler navbar-toggler-right navbar-burger" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-bar"></span>
        <span class="navbar-toggler-bar"></span>
        <span class="navbar-toggler-bar"></span>
        </button>
         <a class="navbar-brand" href="#">Edit Profile</a>
        </div>
        <div class="collapse navbar-collapse" id="navbarToggler">
         <ul class="navbar-nav ml-auto">
     <li class="nav-item">
     <a href="login.php" class="nav-link">Login</a>
     </li>
     <li class="nav-item">
     <a href="profile.php" class="nav-link">Profile</a>
     </li>
     <li class="nav-item">
     <a href="editprofile.php" class="nav-link">Edit Profile</a>
    </li>
    <li class="nav-item">
     <a href="users_old.php" class="nav-link">Users</a>
     </li>
     <li class="nav-item">

    <a href="#" class="nav-link">
      <?php echo $_SESSION['email']; ?>
     </a>
    </li>
     </li>
         </ul>
         </div>
        </div>
  </nav> <!-- nav bar end-->

<div class="wrapper">

<div class="page-header page-header-xs" data-parallax="true" style="background-image: url('../assets/img/fabio-mangione.jpg');">

<div class="filter"></div>

</div>

<!-- profile section-->

<div class="section profile-content">
  <div class="container">
  <div class="owner">
  <div class="avatar">
<!--My image is not coming through, think I have the file path wrong in the database-->
  <img src="<?php echo $_SESSION['image_url']; ?>" alt="Circle Image" class="img-circle img-no-padding img-responsive">
  </div>
    <div class="name">
        <h4 class="title"><?php echo $_SESSION['first_name'] . " " . $_SESSION['last_name']; ?><br /></h4>
           <h6 class="description"><?php echo $_SESSION['title']; ?></h6>
     </div>
  </div>
      <div class="row">
         <div class="col-md-6 ml-auto mr-auto text-center">
           <p><?php echo $_SESSION['description']; ?> </p>
               <br />
             <btn class="btn btn-outline-default btn-round" ><a href="editprofile.php"><i class="fa fa-cog"></i> Edit Profile</a></btn>
           </div>
          </div>
          <br/>

        <!--second navigation the followers and following-->

        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#follows" role="tab">Follows</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#following" role="tab">Following</a>
                    </li>
                </ul>
            </div>
        </div><!--end second navigation-->



        <!-- Tab panes -->

<!-- start for both following and followers-->

        <div class="tab-content following">

<!-- following me section-->
     <div class="tab-pane active" id="follows" role="tabpanel">
     <?php while($row = $result->fetch_assoc()){
     if (in_array($row['user_id'], $follows_me)) {?>
    <div class="row">
    <div class="col-md-2 col-sm-2 ml-auto mr-auto">
        <img src="<?php  echo  $row['image_url']; ?>" alt="Circle Image" class="img-circle img-no-padding img-responsive">
    <h6><?php echo $row['first_name'] ." " . $row['last_name'] ; ?>
    <br/><small><?php   echo $row['title']; ?></small></h6>
    </div>
    </div>
    <hr />
    <?php } ?>
    <?php } ?>
   </div>

<!--people I'm following section-->

      <div class="tab-pane text-center" id="following" role="tabpanel">
      <?php while($row2 = $result2->fetch_assoc()){
      if (in_array($row2['user_id'], $following_user_id)) {?>
      <div class="row">
       <div class="col-md-2 col-sm-2 ml-auto mr-auto">
       <img src="<?php  echo  $row2['image_url']; ?>" alt="Circle Image" class="img-circle img-no-padding img-responsive">
        <h6><?php echo $row2['first_name'] ." " . $row2['last_name'] ; ?>
        <br/><small><?php       echo $row2['title']; ?></small></h6>
       </div>
       </div>
       <hr />
      <?php } ?>
       <?php } ?>
       <div class="row">
         <div class="col-md-6 ml-auto mr-auto text-center">
                        <btn class="btn btn-outline-default btn-round" ><i class="fa fa-cog"></i><a href="users_old.php">Change Following People</a></btn>
                    </div>
         </div><!-- end following-->
        </div><!-- end of follwers/following both section-->
   </div>

</div>
</div>

<footer class="footer section-dark">

<div class="container">

    <div class="row">

        <nav class="footer-nav">

            <ul>
                <li><a href="https://www.creative-tim.com">Creative Tim</a></li>
                <li><a href="http://blog.creative-tim.com">Blog</a></li>
                <li><a href="https://www.creative-tim.com/license">Licenses</a></li>
            </ul>

        </nav>

        <div class="credits ml-auto">

            <span class="copyright">

                © <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by Chaos

            </span>

        </div>

    </div>

</div>

</footer>

</body>
<!-- Core JS Files -->
<script src="../assets/js/jquery-3.2.1.js" type="text/javascript"></script>
<script src="../assets/js/jquery-ui-1.12.1.custom.min.js" type="text/javascript"></script>

<!-- <script src="../assets/js/tether.min.js" type="text/javascript"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>

<!-- Paper Kit Initialization snd functons -->
<script src="../assets/js/paper-kit.js?v=2.1.0"></script>

</html>