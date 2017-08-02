<?php
require 'functions.php';
session_start();
if (!isset($_SESSION['loggedAs'])) {
    header("Location: auth.php");
}
if (isset($_GET['setTheme'])) {
    $_SESSION['theme'] = $_GET['setTheme'];
    header("Location: feed.php?id={$_SESSION['userID']}");
}
if (isset($_GET['remove'])) {
    remove_user($_SESSION['userID']);
    header("Location: auth.php?exit=1");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <?php if ($_SESSION['theme'] == "teal-blue"): ?>
        <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.teal-blue.min.css">
    <?php endif; ?>
    <?php if ($_SESSION['theme'] == "blue-red"): ?>
        <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.blue-red.min.css">
    <?php endif; ?>
    <?php if ($_SESSION['theme'] == "dark"): ?>
        <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.blue-red.min.css">
    <?php endif; ?>
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <title>Лента</title>
</head>
<body>
<?php if ($_SESSION['theme'] == "teal-blue"): ?>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-color--teal-500">
    <?php endif; ?>
    <?php if ($_SESSION['theme'] == "blue-red"): ?>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-color--blue-500">
        <?php endif; ?>
        <?php if ($_SESSION['theme'] == "dark"): ?>
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-color--grey-900">
            <?php endif; ?>
            <?php if ($_SESSION['theme'] == "dark"): ?>
            <header class="mdl-layout__header mdl-layout__header--seamed mdl-color--grey-900">
                <?php endif; ?>
                <?php if (($_SESSION['theme'] == "teal-blue") or ($_SESSION['theme'] == "blue-red")): ?>
                <header class="mdl-layout__header mdl-layout__header--seamed">
                    <?php endif; ?>
        <div class="mdl-layout__header-row">
            <!-- Title -->
            <span class="mdl-layout-title">Настройки</span>
            <div class="mdl-layout-spacer"></div>
            <a class="mdl-navigation__link" href="config.php?remove=1">Удалить профиль</a>
        </div>
    </header>
    <div class="mdl-layout__drawer">
        <span class="mdl-layout-title"><?php echo $_SESSION['userRealName'];?></span>
        <nav class="mdl-navigation">
            <a class="mdl-navigation__link" href="feed.php?id=<?php echo $_SESSION["userID"];?>">Моя страница</a>
            <a class="mdl-navigation__link" href="search.php">Все пользователи</a>
            <a class="mdl-navigation__link" href="">Приложения</a>
            <a class="mdl-navigation__link" href="config.php">Настройки</a>
            <a class="mdl-navigation__link" href="auth.php?logout=1">Выйти</a>
        </nav>
    </div>
    <main class="mdl-layout__content">
        <div class="mdl-card" style="margin-left: 2%; width: 95%;">
            <div class="mdl-card__title">
                <h2 class="mdl-card__title-text">Тема</h2>
            </div>
            <div class="mdl-card__supporting-text">
                <form action="config.php" method="get">
                <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-1">
                    <input type="radio" id="option-1" class="mdl-radio__button" name="setTheme" value="teal-blue" checked>
                    <span class="mdl-radio__label">Сине-зеленая</span>
                </label><br>
                <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-2">
                    <input type="radio" id="option-2" class="mdl-radio__button" name="setTheme" value="blue-red">
                    <span class="mdl-radio__label">Синяя</span>
                </label><br>
                    <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-3">
                        <input type="radio" id="option-3" class="mdl-radio__button" name="setTheme" value="dark">
                        <span class="mdl-radio__label">Темная</span>
                    </label>
                    <br><br><br>
                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" type="submit">
                        Применить
                    </button>
                </form>
            </div>
    </main>