<?php
if (!isset($_SESSION)) {
    session_start();
}
require('dbconnection.php');

$userid = $_SESSION['user_id'];

$sql = "SELECT user_id, first_name, last_name, title, image_url FROM fm_users";
$result = $conn->query($sql);
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

    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/paper-kit.css?v=2.1.0" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../assets/css/demo.css" rel="stylesheet" />

    <!-- Fonts and icons -->
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
                <a class="navbar-brand" href="#">Users</a>
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
                        <a href="users.php" class="nav-link">Users</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <?php echo $_SESSION['email']; ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="wrapper">
        <div class="page-header page-header-xs" data-parallax="true" style="background-image: url('../assets/img/fabio-mangione.jpg');">
            <div class="filter">
            </div>
        </div>
        <div class="section profile-content">
            <div class="container">
                <div class="owner">
                    <div class="avatar">
                        <img src="<?php echo $_SESSION['image_url']; ?>" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                    </div>
                    <div class="name">
                        <h4 class="title"><?php echo $_SESSION['first_name'] . " " . $_SESSION['last_name']; ?><br /></h4>
                        <h6 class="description"><?php echo $_SESSION['title']; ?></h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto text-center">
                        <p><?php echo $_SESSION['description']; ?></p>
                        <br />
                        <btn class="btn btn-outline-default btn-round"><i class="fa fa-cog"></i> Settings</btn>
                    </div>
                </div>
                <br/>
                <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#follows" role="tab">Followers</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#following" role="tab">Following</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Tab panes -->
                <div class="tab-content following">
                    <div class="tab-pane active" id="follows" role="tabpanel">
                        <div class="row">
                            <div class="col-md-6 ml-auto mr-auto">
                                <ul class="list-unstyled follows">
                                    <?php
                                    $following_sql = "SELECT user_id FROM fm_followers WHERE following_user_id = '$userid'";
                                    $following_result = $conn->query($following_sql);

                                    while($row = $following_result->fetch_row()) {
                                        $user_ids[] = $row[0];
                                    }
                                    while($row = $result->fetch_assoc()) {
                                        $follower_userid = $row['user_id'];
                                        if (in_array($follower_userid, $user_ids)) {
                                            echo "<li>";
                                            echo "<div class=\"row\">";
                                            echo "<div class=\"col-md-2 col-sm-2 ml-auto mr-0\">";
                                            echo "<img src=" . $row['image_url'] . " alt=\"Circle Image\" class=\"img-circle img-no-padding img-responsive\">";
                                            echo "</div>";
                                            echo "<div class=\"col-md-7 col-sm-4  ml-0 mr-0\">";
                                            echo "<h6>" . $row['first_name'] . " " . $row['last_name'] . "<br/><small>" . $row['title'] . "</small></h6>";
                                            echo "</div>";
                                            echo "</div>";
                                            echo "</li>";
                                            echo "<hr />";
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane text-center" id="following" role="tabpanel">
                        <div class="row">
                            <div class="col-md-6 ml-auto mr-auto">
                                <ul class="list-unstyled follows">
                                    <?php
                                        $sql = "SELECT user_id, first_name, last_name, title, image_url FROM fm_users";
                                        $result = $conn->query($sql);

                                        $following_sql = "SELECT following_user_id FROM fm_followers WHERE user_id = '$userid'";
                                        $following_result = $conn->query($following_sql);

                                        while($row = $following_result->fetch_row()) {
                                            $following_user_id[] = $row[0];
                                        }
                                        while($row = $result->fetch_assoc()) {
                                            $user_id = $row['user_id'];

                                            if (in_array($user_id, $following_user_id)) {
                                                echo "<li>";
                                                echo "<div class=\"row\">";
                                                echo "<div class=\"col-md-2 col-sm-2 ml-auto mr-0\">";
                                                echo "<img src=" . $row['image_url'] . " alt=\"Circle Image\" class=\"img-circle img-no-padding img-responsive\">";
                                                echo "</div>";
                                                echo "<div class=\"col-md-7 col-sm-4  ml-0 mr-0\">";
                                                echo "<h6>" . $row['first_name'] . " " . $row['last_name'] . "<br/><small>" . $row['title'] . "</small></h6>";
                                                echo "</div>";
                                                echo "</div>";
                                                echo "</li>";
                                                echo "<hr />";
                                            }
                                        }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
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
                        © <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by Creative Tem
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

<!--  Paper Kit Initialization snd functons -->
<script src="../assets/js/paper-kit.js?v=2.1.0"></script>

</html>