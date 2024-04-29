<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!isset($_POST["l"]) || !isset($_POST["password"]) || !is_string($_POST["password"])) {
        echo "400 Bad Request";
        exit;
    }

    if (!in_array($_POST["l"] . ".json", scandir("links"))) {
        echo "404 Not Found";
        exit;
    }

    $data = json_decode(file_get_contents("links/" . basename($_POST["l"]) . ".json"), true);
    array_push($data["passwords"], $_POST["password"]);
    file_put_contents("links/" . basename($_POST["l"]) . ".json", json_encode($data));
}

?>