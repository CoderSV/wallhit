<?php
require '../../functions.php';
session_start();
if (!isset($_SESSION['loggedAs'])) {
    header("Location: ../../auth.php");
}
if (!isset($_GET['appID'])) {
    header("Location: ../../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.deep_orange-deep_purple.min.css" />
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <title>Приложение</title>
</head>
<body>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-color--teal-500">
    <header class="mdl-layout__header mdl-layout__header--seamed">
        <div class="mdl-layout__header-row">
            <!-- Title -->
            <span class="mdl-layout-title">Приложение</span>
            <div class="mdl-layout-spacer"></div>
        </div>
    </header>
    <div class="mdl-layout__drawer">
        <span class="mdl-layout-title"><?php echo $_SESSION['userRealName'];?></span>
        <nav class="mdl-navigation">
            <a class="mdl-navigation__link" href="../../feed.php?id=<?php echo $_SESSION["userID"];?>">Моя страница</a>
            <a class="mdl-navigation__link" href="../../search.php">Все пользователи</a>
            <a class="mdl-navigation__link" href="">Приложения</a>
            <a class="mdl-navigation__link" href="">Настройки</a>
            <a class="mdl-navigation__link" href="../../auth.php?logout=1">Выйти</a>
        </nav>
    </div>