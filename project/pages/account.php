<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once '../php/database.php';
require_once '../php/userDataVariables.php';
// require_once "../php/authCheck.php";

function initPage() {
    global $username, $lastLogin, $pfpPath;
    $nav = initNav();

    $str = "
        <main>
            <nav>
                $nav
            </nav>
            <div class='box'>
                <div class='user'>
                    <div class='user-pfp-box' onclick=\"getPopUp(0)\">
                        <img class='user-pfp' src='../$pfpPath' alt='user pfp'>
                        <div class='edit-btn'>
                            <img src='../images/icons/light/Edit.svg' alt='edit icon'>
                        </div>
                    </div>
                </div>
                <div class='text-box'>
                    <div class='username' onclick=\"getPopUp(1)\">$username</div>
                    <div class='last-login'>Last Login: $lastLogin</div>
                </div>
            </div>
            <div class='popup-box'></div>
        </main>
    ";
    return $str;
}

function initNav() {
    $str = "
        <div id='nav-btn-box'>
            <div class='nav-left'>
                <a href='../index.php' class='nav-btn'>
                    <img src='../images/icons/light/Home.svg' alt='home button'>
                </a>
                <a href='./upload-sound.php' class='nav-btn'>
                    <img src='../images/icons/light/upload.svg' alt='upload button'>
                </a>
                <a href='./soundboard.php' class='nav-btn'>
                    <img src='../images/icons/light/soundboard.svg' alt='soundboard button'>
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
    <link rel="stylesheet" href="../css/signup-login.css">
    <link rel='stylesheet' href='../css/form-styling.css'>
    <script src="../js/account.js" defer></script>
    <title>Soundboard - Your Account</title>
</head>

<body>
    <?php echo initPage(); ?>
</body>

</html>