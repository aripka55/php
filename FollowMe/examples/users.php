<?php
if (!isset($_SESSION)) {
    session_start();
}
require('dbconnection.php');

$userid = $_SESSION['user_id'];


$sql="SELECT * FROM fm_users";
$result = $conn->query($sql);
$all_user=array();
while ($row = $result->fetch_assoc())
{
        $all_user[]=$row['userid'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
        //var_dump($all_user);
        foreach ($all_user as $value1) {
                foreach($_POST as $key => $value2)
                {
                        $found=0;
                        if ($value1 == $value2){// echo " This value: ".$value1." is in! <br />";
                        $found=1;
                        $sql3 ="INSERT INTO fm_follow (user_id, follow_by) VALUES ($main_user,$value1)";
                        $result3 = $conn->query($sql3);
                        break;
                        }
                }
                if ($found==0){//echo "This value: ".$value1." is NOT FOUND! <br />";
                        $sql4 ="DELETE FROM fm_follow WHERE user_id='$main_user' AND follow_by='$value1'";
                        $result4 = $conn->query($sql4);

                }
        }
}



$user_data=array();
$sql2 = "SELECT * FROM fm_follow WHERE user_id = " . $_SESSION['userid'];
$result2 = $conn->query($sql2);
while ($row2 = $result2->fetch_assoc())
{
                $user_data[]=$row2['follow_by'];
}
//var_dump($user_data);
function checkUser($user,$user_data )
{//this handles the checking to make sure users are properly displayed when following
  if (in_array("$user", $user_data)) {echo "checked";}// else {echo "checked";}
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<link rel="icon" type="image/png" href="../assets/img/favicon.ico">
<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title>Edit Profile Page</title>
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />
<!-- Bootstrap core CSS     -->
<link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
<link href="../assets/css/paper-kit.css?v=2.1.0" rel="stylesheet"/>
  <!--     Fonts and icons     -->
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,300,700' rel='stylesheet' type='text/css'>
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
<link href="../assets/css/nucleo-icons.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-expand-md fixed-top navbar-transparent" color-on-scroll="150">
  <div class="container">
<div class="navbar-translate">
  <button class="navbar-toggler navbar-toggler-right navbar-burger" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar"></span>
                <span class="navbar-toggler-bar"></span>
                <span class="navbar-toggler-bar"></span>
  </button>
  <a class="navbar-brand" href="#">FOLLOW ME</a>
</div>
        <div class="collapse navbar-collapse" id="navbarToggler">
    <ul class="navbar-nav ml-auto">
                         <li class="nav-item">  <a href="login.php" class="nav-link">Log In</a> </li>
                          <li class="nav-item"> <a href="#" class="nav-link"><?php echo $_SESSION['email']; ?></a></li>
    </ul>
  </div>
</div>
</nav>

<div class="wrapper">
    <div class="page-header page-header-xs" data-parallax="true" style="background-image: url('../assets/img/fabio-mangione.jpg');">
        <div class="filter">
        </div>
   </div>

<br /><br />


<form action="" method="post">

<div class="row">
                <div class="col-md-6 ml-auto mr-auto">
                                <ul class="list-unstyled follows">
<?php
$sql="SELECT * FROM fm_users";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
                $_user_id = $row['userid'];
                $_user_firstname = $row['firstname'];
                $_user_lastname = $row['lastname'];
                $_user_title = $row['title'];
                $_user_image = $row['image'];
                //generates an array of all users
                $all_user[]=$row['userid'];
?>
<li>
<div class="row">
        <div class="col-md-2 col-sm-2 ml-auto mr-auto">
                <img src="<?php echo $_user_image ?>" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                </div>
<div class="col-md-7 col-sm-4  ml-auto mr-auto">
        <h6> <?php echo ( $_user_firstname . " " . $_user_lastname. " user id:  " . $_user_id) ?><br/><small><?php echo $_user_title ?></small></h6>
<?php checkUser($_user_id, $user_data); ?>

</div>
<div class="col-md-3 col-sm-2  ml-auto mr-auto">
        <div class="form-check">
                <label class="form-check-label">
                        <input class="form-check-input" name="<?php echo $_user_id ?>" type="checkbox"
                                value="<?php echo $_user_id ?>" <?php checkUser($_user_id, $user_data); ?> >
                        <span class="form-check-sign"></span>
                </label>
        </div>
</div>
</div>
</li>
<hr />
<?php } ?>
</div>
</ul>
</div>
<div class="row">
                            <div class="col-md-4 ml-auto mr-auto text-center">
                                <button class="btn btn-danger btn-lg btn-fill">Submit</button>
                            </div>
                        </div>
</form>
</div> <!--Ends Wrapper class -->

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
        <div class="credits ml-auto"><span class="copyright"> © <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by Creative Tim</span>
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


<!--  Paper Kit Initialization snd functons -->
<script src="../assets/js/paper-kit.js?v=2.1.0"></script>

</html>