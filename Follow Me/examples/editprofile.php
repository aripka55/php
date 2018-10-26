<?php
if (!isset($_SESSION)){
    session_start(); //Start session_start
}

if (isset($_SESSION['email']) && isset($_POST['savebutton']))   {
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $title=$_POST['title'];
    $description=$_POST['description'];

    $email=$_SESSION['email'];
    require('dbconnection.php');
    $updatedb="UPDATE fm_users SET first_name=\"" .  $first_name . "\", last_name=\"" . $last_name .  "\", title=\"" . $title . "\", description=\"" . $description . "\" WHERE email = \"" . $email . "\"";

    $conn->query($updatedb);

    $sql = "SELECT * FROM fm_users WHERE email = '$email'";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()){
        //$_SESSION['email'] = $email;
        $_SESSION['first_name'] = $row['first_name'];
        $_SESSION['last_name'] = $row['last_name'];
        $_SESSION['description'] = $row['description'];
        $_SESSION['title'] = $row['title'];
        //$_SESSION['image_url'] = $row['image_url'];
    }
    header('Location: profile.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
        <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Follow Me Into the Darkness</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

        <!-- Bootstrap core CSS     -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="../assets/css/paper-kit.css?v=2.1.0" rel="stylesheet"/>

        <!--  CSS for Demo Purpose, don't include it in your project     -->
        <link href="../assets/css/demo.css" rel="stylesheet" />

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
                    <a class="navbar-brand" href="#">Follow Me</a>
                        </div>
                        <div class="collapse navbar-collapse" id="navbarToggler">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="login.php" class="nav-link">Login</a>
                        </li>

                                                                        <li class="nav-item">
                                                                                        <a href="#" class="nav-link">
                                                                                                Welcome<?php
                                                                                                echo " " . $_SESSION['email']; //WE need to use the session variable here because we don't have a variable called email on this page
                                                                                                  ?></a>
                                                                        </li>
                    </ul>
                </div>
                </div>
    </nav>

    <div class="wrapper">
        <div class="page-header page-header-xs" data-parallax="true" style="background-image: url('../assets/img/fabio-mangione.jpg');">
                        <div class="filter"></div>
                </div>

                <div class="section landing-section">
                                <div class="container">
                                                <div class="row">
                                                                <div class="col-md-8 ml-auto mr-auto">
                                                                                <h2 class="text-center">Edit Profile</h2>
                                                                                <form class="contact-form" action="" method="post">
                                                                                                <div class="row">


                                                                                                                <div class="col-md-6">
                                                                                                                                <label>First Name</label>
                                                                                                                                <div class="input-group">
                                                                                                                                        <span class="input-group-addon">
                                                                                                                                                        <i class="nc-icon nc-single-02"></i>
                                                                                                                                        </span>
                                                                                                                                        <input type="text" class="form-control" placeholder="First Name"  name="first_name" value="<?php echo $_SESSION['first_name']; ?>">
                                                                                                                                </div>
                                                                                                                </div>


                                                                                                                <div class="col-md-6">
                                                                                                                                <label>Last Name</label>
                                                                                                                                <div class="input-group">
                                                                                                                                        <span class="input-group-addon">
                                                                                                                                                <!-- <i class="nc-icon nc-email-85"></i> -->
                                                                                                                                                <i class="nc-icon nc-single-02"></i>
                                                                                                                                        </span>
                                                                                                                                        <input type="text" class="form-control" placeholder="Last Name" name="last_name" value="<?php echo $_SESSION['last_name']; ?>">
                                                                                                                                </div>
                                                                                                                </div>

                                                                                                </div> <!--Ends the first row -->

                                                                                                <label>Title</label>
                                                                                                <div class="input-group">
                                                                                                        <span class="input-group-addon">
                                                                                                                <!-- <i class="nc-icon nc-email-85"></i> -->
                                                                                                                <i class="nc-icon nc-tag-content"></i>
                                                                                                        </span>
                                                                                                        <input type="text" class="form-control" placeholder="Title" value="<?php echo $_SESSION['title']; ?>"  name="title">
                                                                                                </div>

                                                                                                <label>Description</label>
                                                                                                <textarea class="form-control" rows="4" placeholder="Tell everyone a little bit about you..." name="description"><?php echo $_SESSION['description'];?></textarea>
                                                                                                <div class="row">
                                                                                                                <div class="col-md-4 ml-auto mr-auto text-center">
                                                                                                                                <button class="btn btn-danger btn-lg btn-fill" name="savebutton">Save</button>
                                                                                                                </div>
                                                                                                </div>
                                                                                </form>
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
                        © <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by Creative Tim
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