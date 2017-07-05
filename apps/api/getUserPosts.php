<?php
require "apifunc.php";
// getUserPosts
// getUserPosts?userID=123
// returns all userposts;

// error handling
if (!isset($_GET['userID'])) {
    printJSONError("empty userID");
}
// getting user info
$file = fopen("../../userWall/posts-{$_GET['userID']}.csv", 'r');
$result = array();
$number = 0;
while (($line = fgetcsv($file)) !== FALSE) {
    $result["title{$number}"] = $line[0];
    $result["content{$number}"] = $line[1];
    $result["senderID{$number}"] = $line[2];
    $result["sender{$number}"] = $line[3];
    $number++;
}
fclose($file);
printJSONResult($result);