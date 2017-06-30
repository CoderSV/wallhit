<?php
require 'functions.php';
session_start();
if (isset($_POST['userName'])) {
    if (check_userpassword($_POST['userName'], $_POST['userPassword'])) {
        $_SESSION["loggedAs"] = $_POST['userName'];
        $_SESSION["userID"] = get_id_by_username($_SESSION["loggedAs"]);
        header("Location: feed.php?id={$_SESSION['userID']}");
    } else {
        echo '<script>alert("Wrong password!");</script>';
    }
}
if (isset($_GET['logout'])) {
    session_destroy();
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
            <nav class="mdl-navigation mdl-layout--large-screen-only">
                <a class="mdl-navigation__link" href="feed.php">Страница</a>
            </nav>
        </div>
    </header>
    <main class="mdl-layout__content">
        <div class="page-content">
            <form action="auth.php" method="post">
                <div class="mdl-textfield mdl-js-textfield">
                    <input class="mdl-textfield__input" type="text" id="userName" name="userName">
                    <label class="mdl-textfield__label" for="userName">Имя пользователя</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield">
                    <input class="mdl-textfield__input" type="password" id="userPassword" name="userPassword">
                    <label class="mdl-textfield__label" for="userPassword">Пароль</label>
                </div>
                <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" type="submit">
                    Войти
                </button>
                <button class="mdl-button mdl-js-button mdl-button--flat mdl-button--colored" type="button">
                    <A href="makeuser.php">Регистрация</A>
                </button>
            </form>
        </div>
    </main>
</div>
</body>
</html>
