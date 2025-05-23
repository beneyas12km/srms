<?php
session_start();
error_reporting(0);
include('includes/config.php');
if ($_SESSION['alogin'] != '') {
    $_SESSION['alogin'] = '';
}
if (isset($_POST['login'])) {
    $uname = $_POST['username'];
    $password = md5($_POST['password']);
    $sql = "SELECT UserName,Password FROM admin WHERE UserName=:uname and Password=:password";
    $query = $dbh->prepare($sql);
    $query->bindParam(':uname', $uname, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) {
        $_SESSION['alogin'] = $_POST['username'];
        echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
    } else {

        echo "<script>alert('Invalid Details');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Result Management System</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
    <link rel="stylesheet" href="css/prism/prism.css" media="screen">
    <link rel="stylesheet" href="css/main.css" media="screen">
    <script src="js/modernizr/modernizr.min.js"></script>
    <style>
        body {
            background-color: rgb(200, 300, 400);
            background-image: url('images/bgimg.png');
            background-size: cover;
            background-attachment: fixed;

        }

        body::before {
            content: '';

            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('images/bgimg.png');

            background-size: cover;

            background-attachment: fixed;

            filter: blur(5px);

            z-index: -1;

        }

        .id {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            position: absolute;
            top: 10px;
            left: 250px;
        }

        #click1 {
            position: absolute;
            top: 10px;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            font-weight: 900;
            font-size: 20px;
        }

        #click1:hover {
            background-color: blue;
            color: red;
        }

        .panel {
            background-color: rgba(255, 255, 255, 0.5);

            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.9);

        }

        .btn:hover {

            box-shadow: 0 0 10px rgba(0, 0, 0, 0.9);
        }
    </style>
</head>

<body class="">
    <div class="main-wrapper">

        <div class="">
            <div class="row">
                <h1 align="center" style="color: #0011ff; font-size: largerer; font-weight:bolder;">Dream Success Academy | SRMS</h1>
                <div class="col-lg-6 visible-lg-block">

                    <img class="id" src="images/d.jpg" alt="dsa">

                    <section class="section">
                        <div class="row mt-40">
                            <div class="col-md-10 col-md-offset-1 pt-50">

                                <div class="row mt-30 ">
                                    <div class="col-md-11">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title text-center">
                                                    <h4 style="font-weight: bolder;">For Students</h4>
                                                </div>
                                            </div>
                                            <div class="panel-body p-20">

                                                <div class="section-title">
                                                    <p class="sub-title" align="center">Student Result Management System</p>
                                                </div>

                                                <form class="form-horizontal" method="post">
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-6 control-label">Search your result</label>
                                                        <div class="col-sm-6">
                                                            <a href="find-result.php" id="click1">click here</a>
                                                        </div>
                                                    </div>

                                                </form>




                                            </div>
                                        </div>


                                    </div>

                                </div>

                            </div>

                        </div>

                    </section>
                </div>
                <div class="col-lg-6">
                    <section class="section">
                        <div class="row mt-40">
                            <div class="col-md-10 col-md-offset-1 pt-50">

                                <div class="row mt-30 ">
                                    <div class="col-md-11">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title text-center">
                                                    <h4 style="font-weight: bolder;">Admin Login</h4>
                                                </div>
                                            </div>
                                            <div class="panel-body p-20">

                                                <div class="section-title">
                                                    <p class="sub-title">Student Result Management System</p>
                                                </div>

                                                <form class="form-horizontal" method="post">
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="username" class="form-control" id="inputEmail3" placeholder="UserName">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                                                        <div class="col-sm-10">
                                                            <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
                                                        </div>
                                                    </div>

                                                    <div class="form-group mt-20">
                                                        <div class="col-sm-offset-2 col-sm-10">

                                                            <button type="submit" name="login" class="btn btn-success btn-labeled pull-right" style="background-color: red;">Sign in<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                                        </div>
                                                    </div>
                                                </form>




                                            </div>
                                        </div>

                                        <p class="text-muted text-center"><small>Copyright © 2024 Dream Success Academy </a></small> </p>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </section>

                </div>

            </div>

        </div>


    </div>

    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/jquery-ui/jquery-ui.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/pace/pace.min.js"></script>
    <script src="js/lobipanel/lobipanel.min.js"></script>
    <script src="js/iscroll/iscroll.js"></script>


    <script src="js/main.js"></script>
    <script>
        $(function() {

        });
    </script>

</body>

</html>