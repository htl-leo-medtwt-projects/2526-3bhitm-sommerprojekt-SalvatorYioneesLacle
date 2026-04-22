<?php

function initPage() {
    $str = '';
    $nav = initNav();

    $str .= "
        <main>
            <nav>
                $nav
            </nav>

            <div class='box'>
                <div class='upload-your-sounds'>Create an account</div>
                <div class='upload-box'>
                    <div class='upload-box-child'>
                        <div>
                            <form action='../php/createUser.php' method='post'>
                                <div>
                                    <input type='text' name='username'>
                                    <p>Username</p>
                                </div>
                                <div>
                                    <input type='password' name='password-1'>
                                    <p>Password</p>
                                </div>
                                <div>
                                    <input type='password' name='password-2'>
                                    <p>Retype password</p>
                                </div>
                                <input class='button button-txt' type='submit' value='Continue' name='submit'>
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
    <link rel='stylesheet' href='../css/signup-login.css'>
    <script src='../js/signup.js' defer></script>
    <title>Create your soundboard</title>
</head>

<body>
    <?php echo initPage(); ?>
</body>

</html>