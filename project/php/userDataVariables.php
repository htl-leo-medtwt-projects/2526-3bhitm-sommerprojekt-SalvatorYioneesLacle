<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'database.php';

if (isset($_SESSION) && isset($_SESSION["user"]) && isset($_SESSION["login"]) && $_SESSION["login"] == 1) {
    if (isset($_SESSION["user"]["id"])) {
        $id = htmlspecialchars($_SESSION["user"]["id"], ENT_QUOTES, 'UTF-8');
    }
    if (isset($_SESSION["user"]["username"])) {
        $username = htmlspecialchars($_SESSION["user"]["username"], ENT_QUOTES, 'UTF-8');
    }
    if (isset($_SESSION["user"]["last_login"])) {
        $lastLogin = htmlspecialchars($_SESSION["user"]["last_login"], ENT_QUOTES, "UTF-8");
    }
    if (isset($_SESSION["user"]["signup_date"])) {
        $signupDate = htmlspecialchars($_SESSION["user"]["signup_date"], ENT_QUOTES, "UTF-8");
    }
    if (isset($_SESSION["user"]["profile_picture"])) {
        $pfpPath = htmlspecialchars($_SESSION["user"]["profile_picture"], ENT_QUOTES, 'UTF-8');
        // resizePfp();
        // resizePfp2();
    }
}

function showError($errorArray) {
    $str = "<errors>";

    for ($i = 0; $i < count($errorArray); $i++) {
        $str .= "
            <error>
                <header>{$errorArray[$i]->header}</header>
                <p>{$errorArray[$i]->message}</p>
            </error>
        ";
    }
    $str .= "</errors>";
    return $str;
}

function resizePfp2() {
    global $pfpPath;
    if (file_exists($pfpPath)) {
        $size = getimagesize($pfpPath);
    } else {
        $size = getimagesize("./php/" . $pfpPath);
    }
    $width = $size[0];
    $height = $size[1];
}

// function resizePfp() {
//     global $pfpPath;
//     // Source - https://stackoverflow.com/a/1856049
//     // Posted by Tatu Ulmanen, modified by community. See post 'Timeline' for change history
//     // Retrieved 2026-05-28, License - CC BY-SA 3.0

//     $fileType = pathinfo($pfpPath, PATHINFO_EXTENSION);
//     if ($fileType == "png") {
//         $image = imagecreatefrompng($pfpPath);
//     }

//     if ($fileType == "jpg" || $fileType == "jpeg") {
//         // $image = imagecreatefromjpeg($pfpPath);
//     }

//     if ($fileType == "gif") {
//         $image = imagecreatefromgif($pfpPath);
//     }

//     $thumb_width = 200;
//     $thumb_height = 200;

//     $width = imagesx($image);
//     $height = imagesy($image);

//     $original_aspect = $width / $height;
//     $thumb_aspect = $thumb_width / $thumb_height;

//     if ($original_aspect >= $thumb_aspect) {
//         // If image is wider than thumbnail (in aspect ratio sense)
//         $new_height = $thumb_height;
//         $new_width = $width / ($height / $thumb_height);
//     } else {
//         // If the thumbnail is wider than the image
//         $new_width = $thumb_width;
//         $new_height = $height / ($width / $thumb_width);
//     }

//     $thumb = imagecreatetruecolor($thumb_width, $thumb_height);

//     // Resize and crop
//     imagecopyresampled($thumb,
//         $image,
//         0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
//         0 - ($new_height - $thumb_height) / 2, // Center the image vertically
//         0, 0,
//         $new_width, $new_height,
//         $width, $height);
//     imagejpeg($thumb, $pfpPath, 80);

// }