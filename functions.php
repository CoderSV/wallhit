<?php
ini_set("session.gc_probability",0);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/**
 * CORE COMMANDS
 */

function get_userdb() {
    $dbh = new PDO('mysql:host=localhost;dbname=wallhitdev', "wallhit", "lxojFfu1ugLi5Ehf");
    $result = $dbh->query("SELECT * FROM users;");
    $result = $result->fetchAll();
    return $result;
}

function get_postdb($id) {
    $dbh = new PDO('mysql:host=localhost;dbname=wallhitdev', "wallhit", "lxojFfu1ugLi5Ehf");
    $result = $dbh->query("SELECT * FROM posts WHERE id_get = {$id};");
    $result = $result->fetchAll();
    return $result;
}

/**
 * AUTH
 */

function check_userpassword($login, $password) {
    $dbh = new PDO('mysql:host=localhost;dbname=wallhitdev', "wallhit", "lxojFfu1ugLi5Ehf");
    $result = $dbh->query("SELECT * FROM users WHERE userName = '{$login}' AND password = '{$password}';");
    if ($result->fetchAll()[0]["password"] == $password) {
        return true;
    };
    return false;
}

function make_user($login, $password, $realname, $age) {
    $dbh = new PDO('mysql:host=localhost;dbname=wallhitdev', "wallhit", "lxojFfu1ugLi5Ehf");
    $dbh->exec("INSERT INTO users VALUES (NULL, '{$realname}', '{$login}', '{$age}', '{$password}');");
}

/**
 * USERDB GET FUNCTIONS
 */

function return_user_data($id) {
    $dbh = new PDO('mysql:host=localhost;dbname=wallhitdev', "wallhit", "lxojFfu1ugLi5Ehf");
    $result = $dbh->query("SELECT * FROM users WHERE id = '{$id}';");
    $result = $result->fetchAll()[0];
            $baked_user_data[] = array(
                'realName' => $result['realName'],
                'age' => $result['age'],
                'id' => $result['id'],
                'email' => $result['userName'],
            );
            return $baked_user_data;
}

function get_id_by_username($username) {
    $dbh = new PDO('mysql:host=localhost;dbname=wallhitdev', "wallhit", "lxojFfu1ugLi5Ehf");
    $result = $dbh->query("SELECT * FROM users WHERE userName = '{$username}';");
    $result = $result->fetchAll()[0];
    if ($result['userName'] == $username) {
            $userid = $result['id'];
            return $userid;
    }
    return false;
}

function get_user_real_name_by_id($id) {
    $dbh = new PDO('mysql:host=localhost;dbname=wallhitdev', "wallhit", "lxojFfu1ugLi5Ehf");
    $result = $dbh->query("SELECT * FROM users WHERE id = '{$id}';");
    $result = $result->fetchAll()[0];
    if ($result['id'] == $id) {
        $userid = $result['userName'];
        return $userid;
    }
    return false;
}

function get_user_real_name_by_user_name($username) {
    $dbh = new PDO('mysql:host=localhost;dbname=wallhitdev', "wallhit", "lxojFfu1ugLi5Ehf");
    $result = $dbh->query("SELECT * FROM users WHERE userName = '{$username}';");
    $result = $result->fetchAll()[0];
    if ($result['userName'] == $username) {
        $userRealName = $result['realName'];
        return $userRealName;
    }
    return false;
}

function get_user_name_by_user_real_name($username) {
    $dbh = new PDO('mysql:host=localhost;dbname=wallhitdev', "wallhit", "lxojFfu1ugLi5Ehf");
    $result = $dbh->query("SELECT * FROM users WHERE realName = '{$username}';");
    $result = $result->fetchAll()[0];
    if ($result['userName'] == $username) {
        $userName = $result['login'];
        return $userName;
    }
    return false;
}

function remove_user($id) {
    $dbh = new PDO('mysql:host=localhost;dbname=wallhitdev', "wallhit", "lxojFfu1ugLi5Ehf");
    $dbh->exec("DELETE FROM users WHERE id = {$id};");
}
/**
 * POSTS
 */

function get_user_posts($id) {
    $postdb = get_postdb($id);
    return $postdb;
}

function make_post($content, $senderID, $getID) {
    $dbh = new PDO('mysql:host=localhost;dbname=wallhitdev', "wallhit", "lxojFfu1ugLi5Ehf");
    $dbh->exec("INSERT INTO posts VALUES (NULL, '{$senderID}', '{$getID}', '{$content}');");
}

function remove_post($id) {
    $dbh = new PDO('mysql:host=localhost;dbname=wallhitdev', "wallhit", "lxojFfu1ugLi5Ehf");
    $dbh->exec("DELETE FROM posts WHERE id = {$id};");
}