<?php
  session_start();
  require('dbconnection.php');


if (isset($_POST['email'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

   $sql = "SELECT * FROM fm_users where email = '$email'";

   //or you could do it this way for the $sql
    //$sql = "SELECT email, password, first_name, last_name, description, title, image_url FROM fm_users where email = '$email'";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()){

    // use the $row['email'] value from fm_users database

    if ($email == $row['email'] && password_verify($password, $row['password']) ){
    //set variables from profile.php page
    $_SESSION['email'] = $email;
    $_SESSION['img_url'] = $row['image_url'];
    $_SESSION['first_name'] = $row['first_name'];
    $_SESSION['last_name'] = $row['last_name'];
    $_SESSION['title'] = $row['title'];
    $_SESSION['description'] = $row['description'];

    } //closes if statement

    } //closes while loop

    }// closes POST condition

    if (isset($_SESSION['email'])) {
    header('Location: profile.php');

    } //closes if (isset)

    ?>

<!doctype html>

<html lang="en">

<head>

        <meta charset="utf-8" />

        <link rel="icon" type="image/png" href="../assets/img/favicon.ico">

        <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />




        <title>Paper Kit 2 by Chaos</title>



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

    <nav class="navbar navbar-expand-md fixed-top navbar-transparent">

        <div class="container">

                        <div class="navbar-translate">

                    <button class="navbar-toggler navbar-toggler-right navbar-burger" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">

                                        <span class="navbar-toggler-bar"></span>

                                        <span class="navbar-toggler-bar"></span>

                                        <span class="navbar-toggler-bar"></span>

                    </button>

                    <a class="navbar-brand" href="https://www.creative-tim.com">Paper Kit 2</a>

                        </div>

                        <div class="collapse navbar-collapse" id="navbarToggler">

                    <ul class="navbar-nav ml-auto">

                                        <li class="nav-item">

                            <a href="../index.html" class="nav-link"><i class="nc-icon nc-layout-11"></i>Components</a>

                        </li>

                        <li class="nav-item">

                            <a href="../documentation/tutorial-components.html" target="_blank" class="nav-link"><i class="nc-icon nc-book-bookmark"></i>  Documentation</a>

                        </li>

                                        <li class="nav-item">

                        <a class="nav-link" rel="tooltip" title="Follow us on Twitter" data-placement="bottom" href="https://twitter.com/CreativeTim" target="_blank">

                            <i class="fa fa-twitter"></i>

                            <p class="d-lg-none">Twitter</p>

                        </a>

                    </li>

                    <li class="nav-item">

                        <a class="nav-link" rel="tooltip" title="Like us on Facebook" data-placement="bottom" href="https://www.facebook.com/CreativeTim" target="_blank">

                            <i class="fa fa-facebook-square"></i>

                            <p class="d-lg-none">Facebook</p>

                        </a>

                    </li>

                    <li class="nav-item">

                        <a class="nav-link" rel="tooltip" title="Follow us on Instagram" data-placement="bottom" href="https://www.instagram.com/CreativeTimOfficial" target="_blank">

                            <i class="fa fa-instagram"></i>

                            <p class="d-lg-none">Instagram</p>

                        </a>

                    </li>

                    <li class="nav-item">

                        <a class="nav-link" rel="tooltip" title="Star on GitHub" data-placement="bottom" href="https://www.github.com/CreativeTimOfficial" target="_blank">

                            <i class="fa fa-github"></i>

                            <p class="d-lg-none">GitHub</p>

                        </a>

                    </li>

                    </ul>

                </div>

                </div>

    </nav>

    <div class="wrapper">

        <div class="page-header" style="background-image: url('../assets/img/login-image.jpg');">

            <div class="filter"></div>

                <div class="container">

                    <div class="row">

                        <div class="col-lg-4 ml-auto mr-auto">

                            <div class="card card-register">

                                <h3 class="title">Login</h3>

                                                                <div class="social-line text-center">

                                    <a href="#pablo" class="btn btn-neutral btn-facebook btn-just-icon">

                                        <i class="fa fa-facebook-square"></i>

                                    </a>

                                    <a href="#pablo" class="btn btn-neutral btn-google btn-just-icon">

                                        <i class="fa fa-google-plus"></i>

                                    </a>

                                                                        <a href="#pablo" class="btn btn-neutral btn-twitter btn-just-icon">

                                                                                <i class="fa fa-twitter"></i>

                                                                        </a>









                                </div>

                                <form class="register-form" method="post" action="">

                                    <label>Email</label>

                                    <input type="text" class="form-control" name="email" placeholder="Email">



                                    <label>Password</label>

                                    <input type="password" class="form-control" name="password" placeholder="Password">

                                    <button class="btn btn-danger btn-block btn-round">Login</button>

                                </form>

                                <div class="forgot">

                                    <a href="#" class="btn btn-link btn-danger">Forgot password?</a>

                                </div>

                            </div>

                        </div>

                    </div>

                                        <div class="footer register-footer text-center">

                                                <h6>&copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by Choas</h6>

                                        </div>

                </div>

        </div>

    </div>

</body>



<!-- Core JS Files -->

<script src="../assets/js/jquery-3.2.1.js" type="text/javascript"></script>

<script src="../assets/js/jquery-ui-1.12.1.custom.min.js" type="text/javascript"></script>

<script src="../assets/js/tether.min.js" type="text/javascript"></script>

<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>



<!--  Paper Kit Initialization snd functons -->

<script src="../assets/js/paper-kit.js?v=2.0.1"></script>



</html>