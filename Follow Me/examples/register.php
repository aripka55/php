<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  require('dbconnection.php');
        $sql = "SELECT * FROM fm_users";
        $checkForTable = $conn->query($sql);

        if (mysqli_num_rows($checkForTable) < 1 ) {

    $sql = "CREATE TABLE IF NOT EXISTS fm_users (

                        userid INT AUTO_INCREMENT,

                        email VARCHAR(255),

                        password VARCHAR(255),

                        PRIMARY KEY(userid)

                )";

    $tableCreate = $conn->query($sql);

  }



  $email = $_POST['email'];

  $email = filter_var($email, FILTER_SANITIZE_EMAIL);

  $email = trim($email);



  $password = $_POST['password'];

  $password = password_hash($password, PASSWORD_BCRYPT);

  $sql = "INSERT INTO fm_users (email,password) VALUES ('$email','$password')";

  $conn->query($sql);

}

session_start();

?>



<!doctype html>

<html lang="en">

<head>

        <meta charset="utf-8" />

        <link rel="icon" type="image/png" href="../assets/img/favicon.ico">

        <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />



        <title>Follow Me</title>



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

                    <a class="navbar-brand" href="https://www.creative-tim.com">Follow Me</a>

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

                                <h3 class="title">Register</h3>

                                <form class="register-form" action="" method="post">

                                    <label>Email</label>

                                    <input type="text" name="email" class="form-control" placeholder="Email">



                                    <label>Password</label>

                                    <input type="password" name="password" class="form-control" placeholder="Password">

                                    <button class="btn btn-danger btn-block btn-round">Register</button>

                                </form>

                                <div class="forgot">

                                    <a href="#" class="btn btn-link btn-danger">Forgot password?</a>

                                </div>

                            </div>

                        </div>

                    </div>

                                        <div class="footer register-footer text-center">

                                                <h6>&copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by Creative Tim</h6>

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