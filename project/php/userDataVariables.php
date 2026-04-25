<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'database.php';

if (isset($_SESSION) && $_SESSION["user"]) {
    if ($_SESSION["user"]["username"]) {
        $username = htmlspecialchars($_SESSION["user"]["username"], ENT_QUOTES, 'UTF-8');
    }
    if ($_SESSION['user']['last_login']) {
        $lastLogin = htmlspecialchars($_SESSION['user']['last_login'], ENT_QUOTES, 'UTF-8');
    }
} else {
    $username = 'user';
}

$pfpPath = "../uploads/$username/pfp.png";