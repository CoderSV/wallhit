<?php
require "apifunc.php";
// getUser
// getUser?userID=123
// returns ID, nickname, realname, age.

// error handling
if (!isset($_GET['userID'])) {
    printJSONError("empty userID");
}
// getting user info
$file = fopen('../../users.csv', 'a+');
while (($line = fgetcsv($file)) !== FALSE) {
    if ($line[4] == $_GET['userID']) {
        $result['userName'] = $line[0];
        $result['userRealName'] = $line[2];
        $result['userAge'] = $line[3];
        $result['userID'] = $line[4];
        fclose($file);
        printJSONResult($result);
    }
}
fclose($file);
// APIResult not found
printJSONError("user with this ID not found");