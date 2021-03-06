<?php
require 'functions.php';
session_start();
if (!isset($_SESSION['loggedAs'])) {
    header("Location: auth.php");
}
$userData = return_user_data($_GET['from']);
$sender = $userData[0]["realName"];
if (isset($_GET['content'])) {
    make_post($_GET['content'], $_GET['from'], $_GET['to']);
    header("Location: feed.php?id={$_GET["to"]}");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Отправить</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/now-ui-kit.css" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets/css/demo.css" rel="stylesheet" />
</head>

<body class="login-page">
<div class="page-header">
    <div class="page-header-image" style="background-image:url(assets/img/login.jpg)"></div>
    <nav class="navbar navbar-toggleable-md bg-primary fixed-top bg-info navbar-transparent" color-on-scroll="500">
        <div class="container">
            <div class="navbar-translate">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
                <a class="navbar-brand" style="color: white">
                    WallHit
                </a>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="../assets/img/blurred-image-1.jpg">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="feed.php?id=<?php echo $_SESSION["userID"];?>">Домой</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="search.php">Пользователи</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="auth.php?logout=1">Выйти</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="content-center">
            <div class="row card">
                <h4 class="title text-center" style="color: black;">Отправить <?php echo get_user_real_name_by_id($_GET['to']);?></h4>
                <form action="compose.php" method="get">
                    <textarea style="margin-left: auto; margin-right: auto; width: 95%" class="form-control" placeholder="Текст" name="content" rows="1"></textarea>
                    <input type="hidden" name="from" value="<?php echo $_GET['from'];?>">
                    <input type="hidden" name="to" value="<?php echo $_GET['to'];?>">
                    <br>
                    <button class="btn btn-warning" style="width: 95%; margin-bottom: 15px;" type="submit">Отправить</button>
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