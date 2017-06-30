<?php
require 'functions.php';
session_start();
if (!isset($_SESSION['loggedAs'])) {
    header("Location: auth.php");
}
$userData = return_user_data($_GET['from']);
$sender = $userData[0]["realName"];
if (isset($_GET['title']) && isset($_GET['content'])) {
    make_post($_GET["to"], $_GET['title'], $_GET['content'], $sender);
    header("Location: feed.php?id={$_GET["to"]}");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.teal-blue.min.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <title>Отправить запись</title>
</head>
<body>
<!-- Always shows a header, even in smaller screens. -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header mdl-layout__header--seamed">
        <div class="mdl-layout__header-row">
            <!-- Title -->
            <span class="mdl-layout-title">Отправка записи</span>
            <div class="mdl-layout-spacer"></div>
        </div>
    </header>
    <div class="mdl-layout__drawer">
        <span class="mdl-layout-title"><?php echo $loggedUserRealName;?></span>
        <nav class="mdl-navigation">
            <a class="mdl-navigation__link" href="feed.php?id=<?php echo $_SESSION["userID"];?>">Моя страница</a>
            <a class="mdl-navigation__link" href="search.php">Все пользователи</a>
            <a class="mdl-navigation__link" href="">Приложения</a>
            <a class="mdl-navigation__link" href="">Настройки</a>
            <a class="mdl-navigation__link" href="auth.php?logout=1">Выйти</a>
        </nav>
    </div>
    <main class="mdl-layout__content">
        <form action="compose.php" method="get">
            <div class="mdl-textfield mdl-js-textfield">
                <input class="mdl-textfield__input" type="text" id="userRealName" name="title">
                <label class="mdl-textfield__label" for="userRealName">Заголовок</label>
            </div><br>
            <div class="mdl-textfield mdl-js-textfield">
                <input class="mdl-textfield__input" type="text" id="userAge" name="content">
                <label class="mdl-textfield__label" for="userAge">Текст</label>
            </div>
            <input type="hidden" name="from" value="<?php echo $_GET['from'];?>">
            <input type="hidden" name="to" value="<?php echo $_GET['to'];?>">
            <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" type="submit">
                Отправить
            </button>
        </form>
    </main>
</div>
</body>
</html>
