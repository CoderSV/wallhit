<?php
// getUserPosts
// getUserPosts?userID=123
// returns all userposts;

// raw result
$result = array("error" => null);
// error handling
if (!isset($_GET['userID'])) {
    $result['error'] = "empty userID";
    $jsonresult = json_encode($result);
    die($jsonresult);
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
$jsonresult = json_encode($result);
die($jsonresult);

// APIResult not found
$result['error'] = "no posts found";
$jsonresult = json_encode($result);
die($jsonresult);