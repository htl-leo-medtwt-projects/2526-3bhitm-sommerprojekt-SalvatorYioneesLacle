<?php

$_db_host = "db_server";
$_db_datenbank = "soundboard";
$_db_username = "soundboard";
$_db_passwort = "sb-password";

$conn = new mysqli($_db_host, $_db_username, $_db_passwort, $_db_datenbank);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare(
    "SELECT * FROM users where username = ?"
);
$stmt->bind_param("s", $username);
$stmt->execute();
$user = $stmt->get_result();

// $conn->close();
