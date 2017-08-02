<?php
require 'functions.php';
session_start();
if (!isset($_SESSION['loggedAs'])) {
    header("Location: auth.php");
}
$userdb = get_userdb();
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
    <title>Поиск</title>
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
            <span class="mdl-layout-title">Все пользователи</span>
            <div class="mdl-layout-spacer"></div>
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
        <?php foreach ($userdb as $user): ?>
            <div class="mdl-card<?php if($_SESSION['theme'] == 'white'):?>  mdl-color--grey-200<?php endif; ?>" style="margin-left: 2%; width: 95%;">
            <div class="mdl-card__title">
                <h2 class="mdl-card__title-text"><?php echo $user['realName'];?></h2>
            </div>
            <div class="mdl-card__supporting-text">
                <ul class="demo-list-icon mdl-list">
                    <li class="mdl-list__item">
                       <span class="mdl-list__item-primary-content">
                             <i class="material-icons mdl-list__item-icon">person</i>
                             E-Mail: <?php echo $user['userName'];?>
                        </span>
                    </li>
                    <li class="mdl-list__item">
                        <span class="mdl-list__item-primary-content">
                            <i class="material-icons mdl-list__item-icon">person</i>
                            <?php echo $user['age'];?> лет
                        </span>
                    </li>
                    <li class="mdl-list__item">
                        <span class="mdl-list__item-primary-content">
                            <i class="material-icons mdl-list__item-icon">person</i>
                            ID: <?php echo $user['id'];?>
                        </span>
                    </li>
                </ul>
            </div>
            <div class="mdl-card__actions mdl-card--border">
                <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="feed.php?id=<?php echo $user['id'];?>">
                    Просмотреть профиль
                </a>
            </div>
        </div><br><br>
        <?php endforeach ?>
    </main>
</div>
</body>
</html>