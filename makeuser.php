<?php
require 'functions.php';
if (isset($_POST["userName"]) && isset($_POST['userPassword'])) {
    make_user($_POST['userName'], $_POST['userPassword'], $_POST['userRealName'], $_POST['userAge']);
    header("Location: auth.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.teal-pink.min.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <title>Регистрация</title>
</head>
<body>
<!-- Always shows a header, even in smaller screens. -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
            <!-- Title -->
            <span class="mdl-layout-title">Регистрация</span>
            <!-- Add spacer, to align navigation to the right -->
            <div class="mdl-layout-spacer"></div>
            <!-- Navigation. We hide it in small screens. -->
        </div>
    </header>
    <main class="mdl-layout__content mdl-color--teal-500">
        <div class="page-content">
            <div class="mdl-card" style="margin-left: 2%; width: 95%;">
                <div class="mdl-card__title">
                    <h2 class="mdl-card__title-text">Регистрация</h2>
                </div>
             <div class="mdl-card__supporting-text" style="margin: auto;">
            <form action="makeuser.php" method="post">
                <div style="width: 100%;" class="mdl-textfield mdl-js-textfield">
                    <input class="mdl-textfield__input" type="email" id="userName" name="userName">
                    <label class="mdl-textfield__label" for="userName">Электронный адрес</label>
                </div><br>
                <div style="width: 100%;" class="mdl-textfield mdl-js-textfield">
                    <input class="mdl-textfield__input" type="password" id="userPassword" name="userPassword">
                    <label class="mdl-textfield__label" for="userPassword">Пароль</label>
                </div><br>
                <div style="width: 100%;" class="mdl-textfield mdl-js-textfield">
                    <input class="mdl-textfield__input" type="text" id="userRealName" name="userRealName">
                    <label class="mdl-textfield__label" for="userRealName">Ваше имя и фамилия</label>
                </div><br>
                <div style="width: 100%;" class="mdl-textfield mdl-js-textfield">
                    <input class="mdl-textfield__input" type="text" id="userAge" name="userAge">
                    <label class="mdl-textfield__label" for="userAge">Возраст</label>
                </div>
                <button style="width: 100%;" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" type="submit">
                    Регистрация
                </button>
            </form>
            </div>
        </div>
    </main>
</div>
</body>
</html>