<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once '../php/database.php';
require_once '../php/userDataVariables.php';

function initPage() {
    $nav = initNav();
    $str = "
        <main>
            <nav>
                $nav
            </nav>

            <div class='form-wrapper'>
                <div class='form-header'>Upload your sounds</div>
                <div class='form-box'>
                    <div class='form-box-child'>
                        <div>
                            <form action='../php/upload-file.php' method='post' enctype='multipart/form-data'>
                                <p>Select audio file to upload</p>
                                <div>
                                    <input class='input' type='text' name='filename' id='filename'>
                                    <p>File name</p>
                                </div>
                                <div>
                                    <div id='upload-btn-box'>
                                        <input class='input' type='file' name='fileToUpload' id='fileToUpload'>
                                        <label for='fileToUpload' class='custom-file-upload'>
                                            <i class='fas fa-upload mr-2'>
                                                <img class='upload-icon' src='../images/icons/dark/upload.svg' alt='upload-image'>
                                            </i>
                                            Upload File
                                        </label>
                                        <span id='file-name' class='file-name'>No file selected</span>
                                    </div>
                                </div>
                                <input class='input button' type='submit' value='Upload' name='submit'>
                            </form>
                        </div>
                    </div>
                    <!--<div class='button'>
                        <img class='upload-icon' src='../images/icons/dark/upload.svg' alt='upload-image'>
                        <div class='button-txt'>Upload</div>
                    </div>-->
                </div>
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
            <div class='nav-account-box'>
                $initUserSignedIn
            </div>
        </div>
    ";

    return $str;
}

function initUserSignedIn() {
    global $pfpPath, $username;
    $str = "";

    if (isset($_SESSION) && isset($_SESSION["user"])) {
        $str = "
            <div class='user-acc-box'>
                <a class='user-acc-pfp' href='./account.php'>
                    <p>$username</p>
                    <img src='../$pfpPath' alt='user pfp'>
                </a>
            </div>
        ";
    } else {
        $str = "
            <!-- Generated from figma -->
            <div class='header-auth' id='headerAuthContainer'>
                <a class='button-signin' href='./signup.php'>
                    <div class='button-text'>Sign in</div>
                </a>
                <a class='button-register' href='./login.php'>
                    <div class='button-text'>Register</div>
                </a>
            </div>
        ";
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
    <link rel='stylesheet' href='../css/upload-sound.css'>
    <link rel='stylesheet' href='../css/form-styling.css'>
    <script src='../js/upload.js' defer></script>
    <title>Create your soundboard</title>
</head>

<body>
    <?php echo initPage(); ?>
</body>

</html>