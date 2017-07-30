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
    foreach ($result as $user) {
        $result[] = array(
            'login' => $user['userName'],
            'password' => $user['password'],
            'realName' => $user['realName'],
            'age' => $user['age'],
            'id' => $user['id'],
        );
    }
    return $result;
}

function get_postdb($id) {
    $file = fopen("./userWall/posts-{$id}.csv", 'a+');
    $result = array();
    while (($line = fgetcsv($file)) !== FALSE) {
        $result[] = array(
            'title' => $line[0],
            'content' => $line[1],
            'id' => $line[2],
            'sender' => $line[3],
            'senderID' => $line[4],
        );
    }
    fclose($file);
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
    $userdb = get_userdb();
    $baked_user_data = array();
    foreach ($userdb as $user) {
        if ($user['id'] == $id) {
            $baked_user_data[] = array(
                'realName' => $user['realName'],
                'age' => $user['age'],
                'id' => $user['id'],
                'email' => $user['userName'],
            );
            return $baked_user_data;
        }
    }
    return false;
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

/**
 * POSTS
 */

function get_user_posts($id) {
    $postdb = get_postdb($id);
    $baked_post_data = array();
    foreach ($postdb as $post) {
            $baked_post_data[] = array(
                'title' => $post['title'],
                'content' => $post['content'],
                'id' => $post['id'],
                'sender' => $post['sender'],
                'senderID' => $post['senderID'],
            );
    }
    return $baked_post_data;
}

function make_post($id, $title, $content, $sender, $from) {
    $file = "./userWall/posts-{$id}.csv";

    $senderName = get_user_name_by_user_real_name($sender);

    file_put_contents($file, $title.",".$content.",".$id.",".$sender.",".$from."\r\n", FILE_APPEND);
}