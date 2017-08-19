<?php
function check_userpassword($login, $password) {
    $dbh = new PDO('mysql:host=localhost;dbname=wallhitdev', "wallhit", "lxojFfu1ugLi5Ehf");
    $result = $dbh->query("SELECT * FROM users WHERE userName = '{$login}' AND password = '{$password}';");
    if ($result->fetchAll()[0]['password'] == $password) {
        return true;
    };
    return false;
}
echo check_userpassword("itaysonlab@gmail.com", "test");