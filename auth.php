<?php
require 'functions.php';
session_start();
if (isset($_POST['userName'])) {
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
if (isset($_SESSION['loggedAs'])) {
    header("Location: index.php");
}
if (isset($_GET['logout'])) {
    unset($_SESSION['loggedAs']);
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.teal-blue.min.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <title>Вход</title>
</head>
<body>
<!-- Always shows a header, even in smaller screens. -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
            <!-- Title -->
            <span class="mdl-layout-title">Вход в систему</span>
            <!-- Add spacer, to align navigation to the right -->
            <div class="mdl-layout-spacer"></div>
            <!-- Navigation. We hide it in small screens. -->
        </div>
    </header>
    <main class="mdl-layout__content mdl-color--teal-500">
        <div class="page-content">
            <div class="mdl-card" style="margin-left: 2%; width: 95%;">
                <div class="mdl-card__title">
                    <h2 class="mdl-card__title-text">Вход</h2>
                </div>
                <div class="mdl-card__supporting-text" style="margin: auto;">
                    <form action="auth.php" method="post">
                        <div class="mdl-textfield mdl-js-textfield" style="width: 100%;">
                            <input class="mdl-textfield__input" type="text" id="userName" name="userName">
                            <label class="mdl-textfield__label" for="userName">Имя пользователя</label>
                        </div><br>
                        <div class="mdl-textfield mdl-js-textfield" style="width: 100%;">
                            <input class="mdl-textfield__input" type="password" id="userPassword" name="userPassword">
                            <label class="mdl-textfield__label" for="userPassword">Пароль</label>
                        </div>
                        <br><br><br>
                        <button style="width: 100%;" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" type="submit">
                            Войти
                        </button><br>
                        <button style="width: 100%;" class="mdl-button mdl-js-button mdl-button--colored">
                            <a href="makeuser.php">Регистрация</a>
                        </button>
                    </form>
                </div>
        </div>
    </main>
</div>
</body>
</html>
