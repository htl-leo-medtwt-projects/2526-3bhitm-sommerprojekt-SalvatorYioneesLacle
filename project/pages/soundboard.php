<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once '../php/database.php';
require_once '../php/userDataVariables.php';

$sounds;
$soundPath;
$needsNewPage = false;

function getAllSounds() {
    global $conn, $sounds, $soundPath, $id;
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
}
getAllSounds();

function initPage() {
    global $needsNewPage;
    $str = '';
    $nav = initNav();
    $generateSoundboard = generateSoundboard();
    $volBar = initVolumeBar();
    $pageBtns = $needsNewPage ? initPageButtons() : "";

    $str .= "
        <main>
            <nav>
                $nav
            </nav>
            <div id='wrapper'>
                $generateSoundboard
            </div>
            $volBar
            $pageBtns
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

function generateSoundboard() {
    global $soundPath, $needsNewPage;

    // Max 50 buttons per page
    $maxBtns = 50;
    $countBtns = count($soundPath);
    $pages = ceil($countBtns / $maxBtns);

    $str = "<div class='soundboard' >";

    // Init page buttons for soundboard
    // if (/*$countBtns > $maxBtns*/ true) {
    //     $needsNewPage = true;
    // }

    // Split buttons into seperate pages to scroll to
    for ($j = 0; $j < $pages; $j++) {
        $str .= "<div class='soundboard-pages' id='page-$j'>";
        for ($i = 0; $i < min($countBtns - $maxBtns * $j, $maxBtns); $i++) {  
            $str .= "<div class='soundboard-btn'>
                        <img class='soundboard-icon' src='../images/soundboard/soundboard_button_alpha_v5.svg' alt='soundboard button $i' onmousedown=\"playSound('$soundPath[$i]', '$i')\" onmouseup=\"dimBtn('$i')\">
                    </div>\n";

            // $str .= "<div class='soundboard-btn'>
            //             <img class='soundboard-icon' src='../images/soundboard/soundboard_button_alpha_v5.svg' alt='soundboard button $i' onmousedown=\"playSound('$soundPath[4]', '$i')\" onmouseup=\"dimBtn('$i')\">
            //         </div>\n";
        }
        $str .= "</div>";
        $pages++;
    }
    $str .= '</div>';

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

function initPageButtons() {
    $str = "
        <div class='page-btns-box'>
            <div id='page-btn-left'>
                <img src='../images/icons/light/arrow_left.svg' alt='arrow left' onclick=\"toPrevPage()\">
            </div>
            <div id='page-btn-right'>
                <img src='../images/icons/light/arrow_right.svg' alt='arrow right' onclick=\"toNextPage()\">
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
    <link rel='stylesheet' href='../css/soundboard.css'>
    <script src='../js/soundboard.js' defer></script>
    <title>Create your soundboard</title>
</head>

<body>
    <?php echo initPage(); ?>
</body>

</html>