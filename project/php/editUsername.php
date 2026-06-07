<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once "database.php";

if (isset($_POST["submit"]) && isset($_SESSION['user']) && $_SESSION['login'] == 1) {
    $user = $_SESSION['user'];
    $id = $user['id'];
    $_username = $conn->real_escape_string($_POST["username"]);

    // Edit username of current user
    $stmt = "UPDATE users SET username = '$_username' WHERE id = '$id' AND user_deleted = 0 LIMIT 1;";

    if ($_res = $conn->query($stmt)) {
        // Success
        // Search for user to get user data
        $stmt = $conn->prepare(
            "SELECT * FROM users WHERE id = ? AND user_deleted = 0 LIMIT 1;"
        );
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $resUser = $stmt->get_result();

        if ($resUser->num_rows === 1) {
            $user = $resUser->fetch_assoc();
            $_SESSION["user"] = $user;
        } else {
            // Error
            sendMessage('Username could not be edited.');
        }
        header("Location: ../pages/account.php");
    } else {
        // $insertStatement = "INSERT INTO users (username, profile_picture, password_hash, signup_date, last_login, user_deleted)
        //                 VALUES ('$_username', 'images/icons/light/User.svg', '$_passwordHash',  NOW(), NOW(), 0);";

        // if ($_res = $conn->query($insertStatement)) {
        //     // Search for user to get user data
        //     $stmt = $conn->prepare(
        //         "SELECT * FROM users WHERE username = ? AND user_deleted = 0 LIMIT 1;"
        //     );
        //     $stmt->bind_param("s", $_username);
        //     $stmt->execute();
        //     $resUser = $stmt->get_result();

        //     if ($resUser->num_rows === 1) {
        //         $user = $resUser->fetch_assoc();

        //         $_SESSION["login"] = 1;
        //         $_SESSION["user"] = $user;
        //         header("Location: ../pages/account.php");
        //     } else {
        //         // Error
        //         header("Location: ../pages/signup.php");
        //     }
        // } else {
        //     // Error message
        //     header("Location: ../pages/signup.php");
        // }
    }
} else {
    // Error message
    header("Location: ../pages/signup.php");
}

$conn->close();

?>