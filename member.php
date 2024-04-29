<?php

require_once 'vendor/autoload.php';

use \Firebase\JWT\JWT;

require_once "read_secret.php";

// login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["username"] == $admin_username && hash("sha256", $_POST["password"]) == $admin_password) {
        $payload = array("loggedin" => true);
        $jwt = JWT::encode($payload, $admin_secret, "HS256");
        setcookie("auth", $jwt);
        header("Location: main.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Login</title>
</head>
<body>
    <form action="member.php" method="post">
        <label for="username">Username: </label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password: </label><br>
        <input type="password" id="password" name="password"><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>