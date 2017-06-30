<?php
require_once('functions.php');
session_start();
if (!isset($_SESSION['loggedAs'])) {
    header("Location: auth.php");
} else {
    $userName = $_SESSION['loggedAs'];
    $id = get_id_by_username($userName);
    header("Location: feed.php?id=".$id);
}