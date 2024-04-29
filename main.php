<?php

require_once 'vendor/autoload.php';
require_once "read_secret.php";
require_once "authenticate.php";

$links = [];
foreach (scandir("links") as $link) {
    if (str_ends_with($link, ".json")) {
        array_push($links, str_replace(".json", "", $link));
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Panel</title>
</head>
<body>
    <h2>Create new link</h2>
    <form action="new.php" method="post">
        <label for="url">Google service URL: </label><br>
        <input type="text" id="url" name="url"><br>
        <label for="name">Name: </label><br>
        <input type="text" id="name" name="name"><br>
        <label for="email">Email address: </label><br>
        <input type="text" id="email" name="email"><br>
        <label for="picture">Profile picture link: </label><br>
        <input type="text" id="picture" name="picture"><br>
        <input type="submit" value="Submit">
    </form>
    <hr>
    <h2>All links</h2>
    <ul>
    <?php foreach ($links as $link): ?>
        <li><a href="<?php echo 'view_logs.php?l=' . $link ?>"><?php echo $link ?></a></li>
    <?php endforeach; ?>
    </ul>
</body>
</html>