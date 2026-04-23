<?php

function initPage() {
    $nav = initNav();
    $str = "
        <main>
            <nav>
                $nav
            </nav>

            <div class='box'>
                <div class='upload-your-sounds'>Upload your sounds</div>
                <div class='upload-box'>
                    <div class='upload-box-child'>
                        <div>
                            <form action='../php/upload-file.php' method='post' enctype='multipart/form-data'>
                                <p>Select audio file to upload</p>
                                <div>
                                    <input type='text' name='username'>
                                    <p>File name</p>
                                </div>
                                <div>
                                    <input type='file' name='fileToUpload' id='fileToUpload'>
                                    <p>Upload</p>
                                </div>
                                <input class='button button-txt' type='submit' value='Upload' name='submit'>
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
            <div class='nav-account-box'>
                <!-- Generated from figma -->
                <div class='header-auth' id='headerAuthContainer'>
                    <a class='button-signin' href='./signup.php'>
                        <div class='button-text'>Sign in</div>
                    </a>
                    <a class='button-register' href='./login.php'>
                        <div class='button-text'>Register</div>
                    </a>
                </div>
            </div>
        </div>
    ";

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
    <script src='../js/upload.js' defer></script>
    <title>Create your soundboard</title>
</head>

<body>
    <?php echo initPage(); ?>
</body>

</html>