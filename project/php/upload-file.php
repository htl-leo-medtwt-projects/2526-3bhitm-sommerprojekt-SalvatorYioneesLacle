<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'database.php';
require_once 'userDataVariables.php';

if (!is_array($_SESSION) || !isset($_SESSION['user']) || $_SESSION['user'] == ''
    || $_SESSION['login'] == 0 || !isset($_POST['submit']) || !isset($_FILES['fileToUpload'])) {
    header('Location: ../pages/upload-sound.php');
    exit;
}

$errors;

$username = $_SESSION['user']['username'];
$userId = $_SESSION['user']['id']; // To assign owner user of sound file, on publish --> user_id = null

$target_dir = "../uploads/$userId/";
$target_file = $target_dir . basename($_FILES['fileToUpload']['name']);

$file_name = trim($_POST['filename']) != null || '' ? basename(trim($_POST['filename'])) : basename(explode('.', $_FILES['fileToUpload']['name'])[0]); // Fix this --> 
$file_name_short = substr($file_name, 0, 3);

$uploadOk = 1;

// https://stackoverflow.com/questions/2303372/create-a-folder-if-it-doesnt-already-exist
if (!file_exists("../uploads/$userId/")) {
    mkdir("../uploads/$userId/", 0777, true);
}

// Check if file already exists
if (file_exists($target_file)) {
    // echo "Sorry, file already exists.";
    $uploadOk = 0;
    header('Location: ../pages/upload-sound.php');
}

$fileType = pathinfo($target_file, PATHINFO_EXTENSION);
if (isset($_POST['submit'])) {
    $check = getimagesize($_FILES['fileToUpload']['tmp_name']);
    if ($check !== false) {
        // echo "File is an image - " . $check['mime'] . ".";
        $uploadOk = 1;
        header('Location: ../pages/upload-sound.php');
    }
}

// Allow certain file formats
if ($fileType != "wav" && $fileType != "mp3") {
    // echo "Sorry, only MP3 and WAV files are allowed.";
    $uploadOk = 0;
    header('Location: ../pages/upload-sound.php');
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 1000000) {
    // echo "Sorry, your file is too large.";
    $uploadOk = 0;
    header('Location: ../pages/upload-sound.php');
}

// If var is set --> default
// if (true) {
//     $userId = null;
// }

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    // echo "Sorry, your file was not uploaded.";
    header('Location: ../pages/upload-sound.php');
} else {
    // 1. Upload file
    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)) {
        // echo "The file " . basename($_FILES['fileToUpload']['name']) . " has been uploaded.";

        // 2. Rename file
        rename($target_file, $target_dir . $file_name . ".$fileType");
        $target_file = $target_dir . $file_name . ".$fileType";

        // 3. Add to database
        $insertStatement = "INSERT INTO sounds (name, short_name, path, user_id) VALUES ('$file_name', '$file_name_short', '$target_file', '$userId');";
        if ($_res = $conn->query($insertStatement)) {
            // echo "<br>Image $target_file has been added to the datebase.";
        } else {
            // echo "<br> NO insertion into database";
        }
        header('Location: ../pages/upload-sound.php');
    }
}

?>