<?php

/**
 * CORE COMMANDS
 */

function get_userdb() {
    $file = fopen('users.csv', 'a+');
    $result = array();
    while (($line = fgetcsv($file)) !== FALSE) {
        $result[] = array(
            'login' => $line[0],
            'password' => $line[1],
            'realName' => $line[2],
            'age' => $line[3],
            'id' => $line[4],
        );
    }
    fclose($file);
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
    $users = get_userdb();
    foreach ($users as $user) {
        if ($user['login'] == $login && $user['password'] == $password) {
            return true;
        }
    }
    return false;
}

function make_user($login, $password, $realname, $age) {
    $file = "users.csv";
    $userid = md5(time() . $_SERVER['REMOTE_ADDR']);
    file_put_contents($file, $login.",".$password.",".$realname.",".$age.",".$userid."\r\n", FILE_APPEND);
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
                'email' => $user['login'],
            );
            return $baked_user_data;
        }
    }
    return false;
}

function get_id_by_username($username) {
    $userdb = get_userdb();
    foreach ($userdb as $user) {
        if ($user['login'] == $username) {
            $userid = $user['id'];
            return $userid;
        }
    }
    return false;
}

function get_user_real_name_by_user_name($username) {
    $userdb = get_userdb();
    foreach ($userdb as $user) {
        if ($user['login'] == $username) {
            $userRealName = $user['realName'];
            return $userRealName;
        }
    }
    return false;
}

function get_user_name_by_user_real_name($username) {
    $userdb = get_userdb();
    foreach ($userdb as $user) {
        if ($user['realName'] == $username) {
            $userName = $user['login'];
            return $userName;
        }
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

function make_post($id, $title, $content, $sender) {
    $file = "./userWall/posts-{$id}.csv";

    $senderName = get_user_name_by_user_real_name($sender);
    $senderID = get_id_by_username($senderName);

    file_put_contents($file, $title.",".$content.",".$id.",".$sender.",".$senderID."\r\n", FILE_APPEND);
}