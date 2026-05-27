<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once '../php/database.php';
require_once '../php/userDataVariables.php';

// Get all sounds where public
$stmt = $conn->prepare(
    "SELECT * FROM sounds where public = 1 or user_id = ?"
);
$stmt->bind_param("i", $id);
$stmt->execute();
$res = $stmt->get_result();

if ($res->num_rows > 0) {
    $sounds = $res->fetch_all();
    $_SESSION["sounds"] = $sounds;
}

if (isset($_SESSION) && isset($_SESSION["sounds"])) {
    for ($i = 0; $i < count($_SESSION["sounds"]); $i++) {
        if (isset($_SESSION["sounds"][$i])) {
            $soundPath[$i] = $_SESSION["sounds"][$i][3];
        }
    }
}

function generateButtons() {
    global $soundPath;
    $str = '';

    for ($i = 0; $i < count($soundPath); $i++) {
        $str .= "<img class='buttons-icon' src='../images/soundboard/soundboard_button_alpha_v5.svg' alt='soundboard button $i' onmousedown=\"playSound('$soundPath[$i]')\">\n";
    }

    return $str;
}

function playSound() {
    // Source - https://stackoverflow.com/a/8773102
    // Posted by Dipu Raj, modified by community. See post 'Timeline' for change history
    // Retrieved 2026-05-08, License - CC BY-SA 4.0

    // $myAudioFile = "myAudiofile.wav";
    // echo '<audio autoplay="true" style="display:none;">
    //          <source src="' . $myAudioFile . '" type="audio/wav">
    //      </audio>';

}

function initPage() {
    $str = '';
    $nav = initNav();
    $generateButtons = generateButtons();
    $volBar = initVolumeBar();

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
            $volBar
        </main>
    ";

    return $str;
}

function initNav() {
    $initUserSignedIn = initUserSignedIn();
    $str = '';

    $str .= "
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

function initVolumeBar() {
    // https://freefrontend.com/css-range-sliders/ - CSS-only Sound Meter
    $str = "
        <div class='range-slider'>
            <input id='volume-slider' type='range' min='0' max='100' value='50' steps='10'>
            <span data-value='50'>50</span>    
        </div>
        <div class='sound-meter-box'>
            <input type='range' class='sound-meter' min='-60' max='0' value='-60' disabled />
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
    <link rel='stylesheet' href='../css/soundboard.css'>
    <script src='../js/soundboard.js' defer></script>
    <title>Create your soundboard</title>
</head>

<body>
    <?php echo initPage(); ?>
</body>

</html>