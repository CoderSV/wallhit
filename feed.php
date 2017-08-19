<?php
require 'functions.php';
session_start();
if (!isset($_SESSION['loggedAs'])) {
    header("Location: auth.php");
}
if (isset($_GET["removePost"])) {
    if ($_GET["id"] == $_SESSION["userID"]) {
        remove_post($_GET["removePost"]);
    } else {
        echo "<script>alert(\"Ошибка: данный пользователь не является владельцем удаляемой страницы.\");</script>";
    }
}
$userData = return_user_data($_GET['id']);
$postdb = get_user_posts($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title><?php echo $userData[0]['realName'];?></title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/now-ui-kit.css" rel="stylesheet" />
</head>

<body class="profile-page">
<!-- Navbar -->
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
        <div class="collapse navbar-collapse justify-content-end" id="navigation" style="background-image: url('assets/img/blurred-image-1.jpg')" data-nav-image="assets/img/blurred-image-1.jpg">
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
<!-- End Navbar -->
<div class="wrapper">
    <div class="page-header page-header-small">
        <div class="page-header-image" data-parallax="true" style="background-image: url('assets/img/login.jpg');">
        </div>
        <div class="container">
            <div class="content-center">
                <!--<div class="photo-container">
                    <img src="../assets/img/ryan.jpg" alt="">
                </div>-->
                <h3 class="title"><?php echo $userData[0]['realName'];?></h3>
                <p class="category"><?php echo $userData[0]['email'];?> / <?php echo $userData[0]['age'];?> лет</p>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="container">
            <div class="button-container">
                <a href="compose.php?from=<?php echo get_id_by_username($_SESSION["loggedAs"]);?>&to=<?php echo $userData[0]['id'];?>" class="btn btn-info btn-primary btn-round btn-lg">Написать</a>
            </div>
            <h3 class="title">Записи</h3>
            <?php foreach ($postdb as $post): ?>
                <?php
                $sendername = get_user_real_name_by_id($post['id_sender']);
                ?>
                <div class="row card">
                    <a href="feed.php?id=<?php echo $post['id_sender'];?>"><h4 class="title text-center">От <?php echo $sendername;?></h4></a>
                    <h5 style="margin-left: 10px;"><?php echo $post['post'];?></h5>
                    <?php if ($_GET["id"] == $_SESSION["userID"]): ?>
                        <center style='margin: 10px;'><a href="feed.php?id=<?php echo $_SESSION["userID"];?>&removePost=<?php echo $post['id'];?>">Удалить</a></center>
                    <?php endif ?>
                </div><br><br>
            <?php endforeach ?>
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