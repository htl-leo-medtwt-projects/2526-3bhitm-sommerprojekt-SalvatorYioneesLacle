<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once "database.php";

if (isset($_POST["submit"])) {
    $_username = $conn->real_escape_string($_POST["username"]);
    $_password = $conn->real_escape_string($_POST["password-1"]);
    if (strcmp($_password, $conn->real_escape_string($_POST["password-2"])) != 0) {
        include("../pages/account.php");
        // Error message

        exit;
    }

    $_passwordHash = password_hash($_password, PASSWORD_BCRYPT);

    // Check if user with same username exists
    $stmt = $conn->prepare(
        "SELECT * FROM users WHERE username = ? AND user_deleted = 0 LIMIT 1;"
    );
    $stmt->bind_param("s", $_username);
    $stmt->execute();

    $res = $stmt->get_result();

    if ($res->num_rows > 0) {
        // User already exists
        include("../pages/signup.html");
    } else {
        $insertStatement = "INSERT INTO users (username, profile_picture, password_hash, signup_date, last_login, user_deleted)
                        VALUES ('$_username', './images/icons/light/Music.svg', '$_passwordHash',  NOW(), NOW(), 0);";

        // Search for user to get user data
        $stmt = $conn->prepare(
            "SELECT * FROM users WHERE username = ? AND user_deleted = 0 LIMIT 1;"
        );
        $stmt->bind_param("s", $_username);
        $stmt->execute();
        $resUser = $stmt->get_result();

        // To add user stuff to another table
        if ($resUser->num_rows === 1) {
            $user = $resUser->fetch_assoc();

            $_SESSION["login"] = 1;
            $_SESSION["user"] = $user;
            // $_id = $conn->real_escape_string($user["id"]);

            // $settingsStatement = "INSERT INTO user_settings (user_id) VALUES ('$_id');";

        } else {
            include("../pages/account.php");
        }

        if ($_res = $conn->query($insertStatement)) {
            include("../pages/account.php");
        } else {
            // Error message
            include("../pages/signup.html");
        }
    }
} else {
    // Error message
    include("../pages/signup.html");
}

$conn->close();

?>