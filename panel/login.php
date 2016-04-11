<?php
    session_start();
    require_once "../DBEntities/LoginEntity.php";
    require_once "../utilities/TableNames.php";
    require_once "../utilities/utilities.php";
    require_once "../utilities/PublicPages.php";
    require_once "../utilities/PublicSessions.php";

    if(isset($_POST["email"]) && isset($_POST["pass"]))
    {
        echo "test is passed";
        $login=new LoginEntity(\utilities\TableNames::$Login);
        $person=$login->checkLogin($_POST["email"],$_POST["pass"]);




        if($person!=false)
        {
            $_SESSION[PublicSessions::$user]=$person;
            Utilities::redirect("managing.php");
        }

        else
            echo "problem in geting";
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>KURD-KALA panel</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">-->
    <!-- Ionicons -->
    <!--<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>KURD</b>-KALA</a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">به پنل مدیریت وارد شوید</p>
        <form action="login.php" method="post">
            <div class="form-group has-feedback">
                <input type="email" class="form-control" name="email" placeholder="Email"/>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="pass" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">

                    </div>
                </div><!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div><!-- /.col -->
            </div>
        </form>



        <a href="#">I forgot my password</a><br>
        <a href="register.html" class="text-center" >Register a new membership</a>

    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->

<!-- jQuery 2.1.4 -->
<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

