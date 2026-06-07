<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$errors;

function sendMessage($msg) {
    $str = "";
    return $str;
}

function displayMessage() {
    global $errors;
    echo $errors;
}