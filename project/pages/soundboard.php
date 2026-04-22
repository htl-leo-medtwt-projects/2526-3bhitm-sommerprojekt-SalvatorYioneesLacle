<?php

function initPage() {
    $str = '';
    $nav = initNav();
    $generateButtons = generateButtons();

    $str .= "
        <main>
            <nav>
                $nav
            </nav>
            <div id='wrapper'>
                <div class='soundboard'>
                    $generateButtons
                </div>
            </div>
        </main>
    ";

    return $str;
}

function initNav() {
    $str = '';

    $str .= "
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
            <div class='nav-account-box'>
                <!-- Generated from figma -->
                <div class='header-auth' id='headerAuthContainer'>
                    <div class='button-signin'>
                        <div class='button-text'>Sign in</div>
                    </div>
                    <div class='button-register'>
                        <div class='button-text'>Register</div>
                    </div>
                </div>
            </div>
        </div>
    ";

    return $str;
}

// move to php
function generateButtons() {
    $str = '';

    for ($i = 0; $i < 30; $i++) {
        $str .= "<img class='buttons-icon' src='../images/soundboard/soundboard_button_alpha Kopie.svg' alt='soundboard button $i'>";
    }
    
    return $str;
}

?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='../css/main.css'>
    <link rel='stylesheet' href='../css/soundboard.css'>
    <script src='../js/soundboard.js' defer></script>
    <title>Create your soundboard</title>
</head>

<body>
    <?php echo initPage(); ?>
</body>

</html>