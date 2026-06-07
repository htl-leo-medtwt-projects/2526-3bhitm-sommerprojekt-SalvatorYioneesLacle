<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (is_array($_SESSION) && isset($_SESSION['user']) && $_SESSION['login'] == 1 && isset($_POST['submit'])) {
    if (isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['tmp_name'] !== '') {
        include 'upload-pfp.php';
    }
    if (isset($_POST['username'])) {
        include 'editUsername.php';
    }
}



