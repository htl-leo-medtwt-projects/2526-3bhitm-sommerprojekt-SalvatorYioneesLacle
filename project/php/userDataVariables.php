<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'database.php';

if (isset($_SESSION) && $_SESSION["user"] && $_SESSION['user'] != '' && $_SESSION['login'] == 1) {
    if ($_SESSION["user"]["username"]) {
        $username = htmlspecialchars($_SESSION["user"]["username"], ENT_QUOTES, 'UTF-8');
    }
    if ($_SESSION["user"]["last_login"]) {
        $lastLogin = htmlspecialchars($_SESSION["user"]["last_login"], ENT_QUOTES, "UTF-8");
    }
    if ($_SESSION["user"]["signup_date"]) {
        $signupDate = htmlspecialchars($_SESSION["user"]["signup_date"], ENT_QUOTES, "UTF-8");
    }
    if ($_SESSION["user"]["profile_picture"]) {
        $pfpPath = htmlspecialchars($_SESSION["user"]["profile_picture"], ENT_QUOTES, 'UTF-8');
    }
} else {
    $username = 'user';
}

function showError($errorArray) {
    $str = "<errors>";

    for ($i=0; $i < count($errorArray); $i++) { 
        $str .= "
            <error>
                <header>{$errorArray[$i]->header}</header>
                <p>{$errorArray[$i]->message}</p>
            </error>
        ";
    }
    $str .= "</errors>";
    return $str;
}
