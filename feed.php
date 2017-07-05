<?php
require 'functions.php';
session_start();
if (!isset($_SESSION['loggedAs'])) {
    header("Location: auth.php");
}
if (isset($_GET["removePosts"])) {
    if ($_GET["id"] == $_SESSION["userID"]) {
        unlink("./userWall/posts-{$_GET['id']}.csv");
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
<style>
    .demo-list-icon {
        width: 300px;
        position: absolute;
        margin-top: -15px;
    }
</style>
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
            <span class="mdl-layout-title">Лента</span>
            <div class="mdl-layout-spacer"></div>
            <!-- Navigation. We hide it in small screens. -->
            <nav class="mdl-navigation mdl-layout--large-screen-only">
                <a class="mdl-navigation__link" href="compose.php?from=<?php echo get_id_by_username($_SESSION["loggedAs"]);?>&to=<?php echo $userData[0]['id'];?>">Добавить запись</a>
                <?php if ($_GET["id"] == $_SESSION["userID"]): ?>
                    <a class="mdl-navigation__link" href="feed.php?id=<?php echo $_SESSION["userID"];?>&removePosts=1">Удалить все записи</a>
                <?php endif ?>
            </nav>
            <nav class="mdl-navigation mdl-layout--small-screen-only">
                <a class="mdl-navigation__link" href="compose.php?from=<?php echo get_id_by_username($_SESSION["loggedAs"]);?>&to=<?php echo $userData[0]['id'];?>"><i class="material-icons">add</i></a>
                <?php if ($_GET["id"] == $_SESSION["userID"]): ?>
                    <a class="mdl-navigation__link" href="feed.php?id=<?php echo $_SESSION["userID"];?>&removePosts=1"><i class="material-icons">delete_forever</i></a>
                <?php endif ?>
            </nav>
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
                <h2 class="mdl-card__title-text"><?php echo $userData[0]['realName'];?></h2>
            </div>
            <div class="mdl-card__supporting-text">
                <ul class="demo-list-icon mdl-list">
                    <li class="mdl-list__item">
                       <span class="mdl-list__item-primary-content">
                             <i class="material-icons mdl-list__item-icon">email</i>
                             E-Mail: <?php echo $userData[0]['email'];?>
                        </span>
                    </li>
                    <li class="mdl-list__item">
                        <span class="mdl-list__item-primary-content">
                            <i class="material-icons mdl-list__item-icon">person</i>
                            <?php echo $userData[0]['age'];?> лет
                        </span>
                    </li>
                </ul>
            </div>
        </div><br><br>
        <?php foreach ($postdb as $post): ?>
            <div class="mdl-card" style="margin-left: 2%; width: 95%;">
                <div class="mdl-card__title">
                    <h2 class="mdl-card__title-text"><?php echo $post['title'];?></h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <?php echo $post['content'];?><br>
                    <a href="feed.php?id=<?php echo $post['senderID'];?>"><i>От <?php echo $post["sender"];?></i></a>
                </div>
            </div><br><br>
        <?php endforeach ?>
    </main>
</div>
</body>
</html>