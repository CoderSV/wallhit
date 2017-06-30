<?php
require ('../api/wallhit-publicapi.php');
$userListDecoded = json_decode(Users::getAllUsers());
$userListEncoded = Users::getAllUsers();

echo "<pre>";
echo "Decoded userlist";
echo "<br>";
var_dump($userListDecoded);
echo "Encoded userlist [JSON-ed]";
echo "<br>";
echo $userListEncoded;
echo "</pre>";
