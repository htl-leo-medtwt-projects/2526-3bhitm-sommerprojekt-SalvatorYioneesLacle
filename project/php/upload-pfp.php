<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'database.php';
require_once 'userDataVariables.php';

if (!is_array($_SESSION) || !isset($_SESSION['user']) || $_SESSION['user'] == ''
    || $_SESSION['login'] == 0 || !isset($_POST['submit']) || !isset($_FILES['fileToUpload'])) {
    // header('Location: ../pages/customiseUser.php');
    exit;
}

$errors;

$username = $_SESSION['user']['username'];
$userId = $_SESSION['user']['id'];

$target_dir = "uploads/$userId/";
$target_file = $target_dir . basename($_FILES['fileToUpload']['name']);

$uploadOk = 1;

// https://stackoverflow.com/questions/2303372/create-a-folder-if-it-doesnt-already-exist
if (!file_exists("../" . $target_dir)) {
    mkdir("../" . $target_dir, 0777, true);
}

// Check if file already exists
if (file_exists("../" . $target_file)) {
    // echo "Sorry, file already exists.";
    $uploadOk = 0;
    // header('Location: ../pages/customiseUser.php');
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 1000000) {
    // echo "Sorry, your file is too large.";
    $uploadOk = 0;
    // header('Location: ../pages/customiseUser.php');
}

$fileType = pathinfo("../" . $target_file, PATHINFO_EXTENSION);
if (isset($_POST['submit'])) {
    $check = getimagesize($_FILES['fileToUpload']['tmp_name']);
    if ($check !== false) {
        // echo "File is an image - " . $check['mime'] . ".";
        $uploadOk = 1;
        // header('Location: ../pages/customiseUser.php');
    }
}

// Allow certain file formats
if ($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "gif") {
    // echo "Sorry, only MP3 and WAV files are allowed.";
    $uploadOk = 0;
    // header('Location: ../pages/customiseUser.php');
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    // echo "Sorry, your file was not uploaded.";
    // header('Location: ../pages/customiseUser.php');
} else {
    // 1. Upload file
    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], "../" . $target_file)) {
        // echo "The file " . basename($_FILES['fileToUpload']['name']) . " has been uploaded.";

        // 2. Rename file
        // $new_target_file = $target_dir . "pfp" . ".$fileType";
        // rename($target_file, $new_target_file);
        // $target_file = $new_target_file;

        $selectStmt = $conn->prepare(
            "SELECT profile_picture FROM users WHERE id = ?;"
        );
        $selectStmt->bind_param("i", $userId);
        $selectStmt->execute();

        $res = $selectStmt->get_result();
        $tempPfp = $res->fetch_assoc()["profile_picture"];

        // Delete old pfp
        if ($res->num_rows === 1 && str_contains("../" . $tempPfp, "../" . $target_dir) && file_exists("../" . $tempPfp)) {
            unlink("../" . $tempPfp);
        }

        // 3. Add to database
        $updateStatement = $conn->prepare(
            "UPDATE users SET profile_picture = ? WHERE id = ?;"
        );
        $updateStatement->bind_param("si", $target_file, $userId);
        $updateStatement->execute();

        // if ($_res = $conn->query($updateStatement)) {
        // $user = $res->fetch_assoc();
        // $_SESSION['user'] = $user;
        // echo "<br>Image $target_file has been added to the datebase.";
        $_SESSION["user"]["profile_picture"] = $target_file;
        header('Location: ../pages/account.php');
        // } else {
        // echo "<br> NO insertion into database";
        // header('Location: ../pages/customiseUser.php');
        // }
    } else {
        // header('Location: ../pages/customiseUser.php');
    }
}

?>