<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'database.php';

if (!isset($_SESSION['user']) || !isset($_POST['submit']) || !isset($_FILES['fileToUpload'])) {
    exit;
}

$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES['fileToUpload']['name']);
$uploadOk = 1;

$name = 'temp';
$short_name = 'tmp';

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
if ($_FILES["fileToUpload"]["size"] > 500000) {
    // echo "Sorry, your file is too large.";
    $uploadOk = 0;
    header('Location: ../pages/upload-sound.php');
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    // echo "Sorry, your file was not uploaded.";
    header('Location: ../pages/upload-sound.php');
} else {
    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)) {
        // echo "The file " . basename($_FILES['fileToUpload']['name']) . " has been uploaded.";
        
        $insertStatement = "INSERT INTO sounds (name, short_name, path) VALUES ('temp', 'tmp', '$target_file');";
        if ($_res = $conn->query($insertStatement)) {
            // echo "<br>Image $target_file has been added to the datebase.";
        } else {
            // echo "<br> NO insertion into database";
        }
        header('Location: ../pages/upload-sound.php');
    }
}

?>