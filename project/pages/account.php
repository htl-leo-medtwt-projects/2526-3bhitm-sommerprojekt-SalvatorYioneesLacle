<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
require_once "../php/authCheck.php";
require_once '../php/database.php';

if (isset($_SESSION) && $_SESSION["user"] && $_SESSION["user"]["username"]) {
    $username = htmlspecialchars($_SESSION["user"]["username"], ENT_QUOTES, 'UTF-8');
} else {
    $username = 'user';
}

function initPage() {
    global $username;
    $nav = initNav();
    $lastLogin = $_SESSION['user']['last_login'];

    $str = "
        <main>
            <nav>
                $nav
            </nav>
            <div class='box'>
                <div class='user'>
                    <img class='icon' src='../images/icons/light/user.svg' alt='user icon'>
                </div>
                <div class='text-box'>
                    <div class='welcome-user'>Welcome, $username </div>
                    <div class='last-login'>Last Login: $lastLogin</div>
                </div>
            </div>
        </main>
    ";
    return $str;
}

function initNav() {
    $str = "
        <div id='nav-btn-box'>
            <div class='nav-left'>
                <a href='../index.php' class='nav-btn'>
                    <img src='../images/logo/Soundboard-Logo-Small.png' alt='home button'>
                </a>
                <a href='./upload-sound.php' class='nav-btn'>
                    <img src='../images/icons/light/upload.svg' alt='upload button'>
                </a>
                <a href='./soundboard.php' class='nav-btn'>
                    <img src='../images/icons/light/soundboard.svg' alt='soundboard button'>
                </a>
                <a href='' class='nav-btn'>
                    C
                </a>
            </div>
        </div>
    ";

    return $str;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/account.css">
    <script src="../js/account.js" defer></script>
    <title>Soundboard - Your Account</title>
</head>

<body>
    <?php echo initPage(); ?>
</body>

</html>