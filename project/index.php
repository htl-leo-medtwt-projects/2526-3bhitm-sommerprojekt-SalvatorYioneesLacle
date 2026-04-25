<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once './php/database.php';
require_once './php/userDataVariables.php';

function initPage() {
    $nav = initNav();
    $str = "
        <main>
            <nav>
                $nav
            </nav>

            <div class='page-headline'>
                <h2>Create your soundboard</h2>
            </div>
        </main>
    ";

    return $str;
}

function initNav() {
    $initUserSignedIn = initUserSignedIn();
    $str = "
        <div id='nav-btn-box'>
            <div class='nav-left'>
                <a href='./index.php' class='nav-btn'>
                    <img src='../images/logo/Soundboard-Logo-Small.png' alt='home button'>
                </a>
                <a href='./pages/upload-sound.php' class='nav-btn'>
                    <img src='./images/icons/light/upload.svg' alt='upload button'>
                </a>
                <a href='./pages/soundboard.php' class='nav-btn'>
                    <img src='./images/icons/light/soundboard.svg' alt='soundboard button'>
                </a>
                <a href='' class='nav-btn'>
                    C
                </a>
            </div>
            <div class='nav-account-box'>
                $initUserSignedIn
            </div>
        </div>
    ";

    return $str;
}

function initUserSignedIn() {
    global $pfpPath;
    $str = "";

    if (isset($_SESSION) && $_SESSION["user"]) {
        $str = "
            <div class='user-acc-box'>
                <a class='user-acc-pfp' href='./pages/account.php'>
                    <img src='$pfpPath' alt='user profile picture'>
                </a>
            </div>
        ";
    } else {
        $str = "
            <!-- Generated from figma -->
            <div class='header-auth' id='headerAuthContainer'>
                <a class='button-signin' href='./pages/signup.php'>
                    <div class='button-text'>Sign in</div>
                </a>
                <a class='button-register' href='./pages/login.php'>
                    <div class='button-text'>Register</div>
                </a>
            </div>
        ";
    }

    return $str;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/index.css">
    <script src="./js/main.js" defer></script>
    <title>Create your soundboard</title>
</head>

<body>
    <?php echo initPage(); ?>
</body>

</html>