<?php

require_once 'vendor/autoload.php';
require_once "read_secret.php";
require_once "authenticate.php";

function random_id() {
    $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $id = "";
    for ($i = 0; $i < 6; $i++) {
        $id .= $chars[rand(0, strlen($chars) - 1)];
    }
    return $id;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = random_id();
    $data = array(
        "url" => $_POST["url"],
        "name" => $_POST["name"],
        "email" => $_POST["email"],
        "picture" => $_POST["picture"],
        "passwords" => array()
    );
    file_put_contents("links/" . $id . ".json", json_encode($data));
    header("Location: main.php");
    exit;
}

?>