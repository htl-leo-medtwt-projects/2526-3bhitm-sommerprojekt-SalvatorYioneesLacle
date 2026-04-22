<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
require_once "database.php";

if (isset($_POST["submit"])) {
    $_username = $_POST["username"];
    $_password = $_POST["password"];

    $stmt = $conn->prepare(
        "SELECT * FROM users WHERE username = ? AND user_deleted = 0 LIMIT 1;"
    );
    $stmt->bind_param("s", $_username);
    $stmt->execute();

    $res = $stmt->get_result();

    if ($res->num_rows === 1) {
        $user = $res->fetch_assoc();

        if (password_verify($_password, $user["password_hash"])) {
            $_SESSION["login"] = 1;
            $_SESSION["user"] = $user;

            $stmt = $conn->prepare(
                "UPDATE users SET last_login = NOW() WHERE id = ?"
            );
            $stmt->bind_param("i", $user["id"]);
            $stmt->execute();

        } else {
            // Wrong password
            include("../pages/login.html");
        }
    } else {
        // User not found
        include("../pages/login.html");
    }
}

if (is_array($_SESSION) && isset($_SESSION["login"]) && $_SESSION["login"] == 1) {
    header("Location: ../pages/account.php");
}

$conn->close();
?>