<?php
require_once 'database.php';

if (!isset($_POST['submit']) || !isset($_FILES['fileToUpload'])) {
    exit;
}

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES['fileToUpload']['name']);

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

$uploadOk = 1;

$fileType = pathinfo($target_file, PATHINFO_EXTENSION);
if (isset($_POST['submit'])) {
    $check = getimagesize($_FILES['fileToUpload']['tmp_name']);
    if ($check !== false) {
        echo "File is an image - " . $check['mime'] . ".";
        $uploadOk = 1;
    }
}

// Check file size
if ($_FILES["fileUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if ($fileType != "wav" && $fileType != "mp3") {
    echo "Sorry, only MP3 and WAV files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)) {
        echo "The file " . basename($_FILES['fileToUpload']['name']) . " has been uploaded.";
    }
}

?>