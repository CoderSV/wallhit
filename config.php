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
    <?php if (($_SESSION['theme'] == "dark") or ($_SESSION['theme'] == "black")): ?>
        <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.blue-red.min.css">
    <?php endif; ?>
    <?php if ($_SESSION['theme'] == "brown"): ?>
        <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.brown-deep_purple.min.css">
    <?php endif; ?>
    <?php if ($_SESSION['theme'] == "grey"): ?>
        <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.grey-blue.min.css">
    <?php endif; ?>
    <?php if ($_SESSION['theme'] == "white"): ?>
        <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.grey-blue.min.css">
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
        <?php if ($_SESSION['theme'] == "grey"): ?>
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-color--grey-500">
            <?php endif; ?>
            <?php if ($_SESSION['theme'] == "white"): ?>
            <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-color--white">
                <?php endif; ?>
                <?php if ($_SESSION['theme'] == "brown"): ?>
                <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-color--brown-500">
                    <?php endif; ?>
        <?php if ($_SESSION['theme'] == "dark"): ?>
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-color--grey-900">
            <?php endif; ?>
            <?php if ($_SESSION['theme'] == "dark"): ?>
            <header class="mdl-layout__header mdl-layout__header--seamed mdl-color--grey-900">
                <?php endif; ?>
                <?php if ($_SESSION['theme'] == "black"): ?>
                <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header" style="background: black">
                    <?php endif; ?>
                    <?php if ($_SESSION['theme'] == "black"): ?>
                    <header class="mdl-layout__header mdl-layout__header--seamed" style="background: black">
                        <?php endif; ?>
                        <?php if ($_SESSION['theme'] == "white"): ?>
                        <header class="mdl-layout__header mdl-layout__header--seamed" style="background: white">
                            <?php endif; ?>
                        <?php if (($_SESSION['theme'] == "teal-blue") or ($_SESSION['theme'] == "blue-red") or ($_SESSION['theme'] == "brown") or ($_SESSION['theme'] == "grey")): ?>
                        <header class="mdl-layout__header mdl-layout__header--seamed">
                            <?php endif; ?>
        <div class="mdl-layout__header-row">
            <!-- Title -->
            <span class="mdl-layout-title">Настройки</span>
            <div class="mdl-layout-spacer"></div>
            <a class="mdl-navigation__link" href="config.php?remove=1">Удалить профиль</a>
        </div>
    </header>
    <?php if ($_SESSION['theme'] == "dark"): ?>
    <div class="mdl-layout__drawer mdl-color--grey-900" style="color: white;">
        <?php elseif ($_SESSION['theme'] == "black"): ?>
        <div class="mdl-layout__drawer" style="background: black; color: white;">
        <?php else: ?>
        <div class="mdl-layout__drawer">
        <?php endif;?>
        <span class="mdl-layout-title"><?php echo $_SESSION['userRealName'];?></span>
        <nav class="mdl-navigation">
            <a class="mdl-navigation__link" href="feed.php?id=<?php echo $_SESSION["userID"];?>">Моя страница</a>
            <a class="mdl-navigation__link" href="search.php">Все пользователи</a>
            <a class="mdl-navigation__link" href="apps/">Приложения</a>
            <a class="mdl-navigation__link" href="config.php">Настройки</a>
            <a class="mdl-navigation__link" href="auth.php?logout=1">Выйти</a>
        </nav>
    </div>
    <main class="mdl-layout__content">
        <div class="mdl-card<?php if($_SESSION['theme'] == 'white'):?>  mdl-color--grey-200<?php endif; ?>" style="margin-left: 2%; width: 95%;">
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
                    </label><br>
                    <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-4">
                        <input type="radio" id="option-4" class="mdl-radio__button" name="setTheme" value="black">
                        <span class="mdl-radio__label">Абсолютно черная</span>
                    </label><br>
                    <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-5">
                        <input type="radio" id="option-5" class="mdl-radio__button" name="setTheme" value="brown">
                        <span class="mdl-radio__label">Коричневая</span>
                    </label><br>
                    <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-7">
                        <input type="radio" id="option-7" class="mdl-radio__button" name="setTheme" value="white">
                        <span class="mdl-radio__label">Белая</span>
                    </label><br>
                    <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-6">
                        <input type="radio" id="option-6" class="mdl-radio__button" name="setTheme" value="grey">
                        <span class="mdl-radio__label">Серая</span>
                    </label>
                    <br><br><br>
                    <button style="width: 100%;" class="mdl-button mdl-js-button" type="submit">
                        Применить
                    </button>
                </form>
            </div>
    </main>