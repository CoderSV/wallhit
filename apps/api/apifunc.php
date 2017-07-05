<?php

function printJSONResult($result) {
    $jsonresult = json_encode($result);
    die($jsonresult);
}

function printJSONError($error) {
    $result = array();
    $result['error'] = "empty userID";
    printJSONResult($result);
}