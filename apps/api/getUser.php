<?php
// getUser
// getUser?userID=123
// returns ID, nickname, realname, age.

// raw result
$result = array("error" => null);
// error handling
if (!isset($_GET['userID'])) {
    $result['error'] = "empty userID";
    $jsonresult = json_encode($result);
    die($jsonresult);
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
        $jsonresult = json_encode($result);
        die($jsonresult);
    }
}
fclose($file);
// APIResult not found
$result['error'] = "user with selected ID not found";
$jsonresult = json_encode($result);
die($jsonresult);