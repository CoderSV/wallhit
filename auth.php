<?php
require 'functions.php';
session_start();
if (isset($_POST['userName'])) {
    if (empty($_POST["userName"])) {
        echo '<script>alert("Нет почты!");</script>';
} else {
    if (empty($_POST["userPassword"])) {
        echo '<script>alert("Нет пароля!");</script>';
} else {
if (check_userpassword($_POST['userName'], $_POST['userPassword'])) {
$_SESSION["loggedAs"] = $_POST['userName'];
$_SESSION["userID"] = get_id_by_username($_SESSION["loggedAs"]);
$_SESSION["userRealName"] = get_user_real_name_by_user_name($_SESSION['loggedAs']);
if (!isset($_SESSION['theme'])) {
$_SESSION['theme'] = "teal-blue";
}
header("Location: feed.php?id={$_SESSION['userID']}");
} else {
echo '<script>alert("Неверный пароль!");</script>';
}
}
}
}
if (isset($_SESSION['loggedAs'])) {
header("Location: index.php");
}
if (isset($_GET['logout'])) {
unset($_SESSION['loggedAs']);
header("Location: index.php");
}
if (isset($_GET['exit'])) {
session_unset();
header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Вход</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/now-ui-kit.css" rel="stylesheet" />
</head>

<body class="login-page">
    <div class="page-header">
        <div class="page-header-image" style="background-image:url(assets/img/login.jpg)"></div>
        <div class="container">
            <div class="col-md-4 content-center">
                <div class="card card-login card-plain">
                    <form class="form" method="POST" action="auth.php">
                        <div class="header header-primary text-center">
                            <h2>Вход</h2>

                        </div>
                        <div class="content">
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons users_circle-08"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Почта..." name="userName" required />
                            </div>
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons ui-1_lock-circle-open"></i>
                                </span>
                                <input type="password" placeholder="Пароль..." class="form-control" name="userPassword" required />
                            </div>
                        <div class="text-center">
                            <input type="submit" class="btn btn-primary btn-round btn-lg btn-block btn-info" value="Войти">
                        </div>
                            <div class="pull-center">
                                <h6>
                                    <br>
                                    <a href="makeuser.php" class="link">Создать акканут</a>
                                </h6>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/core/tether.min.js" type="text/javascript"></script>
<script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="assets/js/plugins/bootstrap-switch.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="assets/js/now-ui-kit.js" type="text/javascript"></script>

</html>