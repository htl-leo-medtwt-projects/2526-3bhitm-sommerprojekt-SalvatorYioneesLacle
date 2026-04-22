<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
// For login
// require_once "../php/authCheck.php";

require_once '../php/database.php';

if (isset($_SESSION) && $_SESSION["user"] && $_SESSION["user"]["username"]) {
    $username = htmlspecialchars($_SESSION["user"]["username"], ENT_QUOTES, 'UTF-8');
} else {
    $username = 'user';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/account.css">
    <script src="../js/account.js" defer></script>
    <title>Soundboard - Your Account</title>
</head>

<body>
    <main>
        <nav>
            
        </nav>
        <div class="box">
            <div class="user">
                <img class="icon" src="../images/icons/light/user.svg" alt="user icon">
            </div>
            <div class="text-box">
                <div class="welcome-user">Welcome, <?php echo $username; ?></div>
                <div class="last-login">Last Login: 15.03.2026, 15:03</div>
            </div>
        </div>
    </main>
</body>

</html>