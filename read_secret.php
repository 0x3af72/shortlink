<?php

// read secret
$secret = explode("\n", file_get_contents("secret"));
$admin_username = $secret[0];
$admin_password = $secret[1];
$admin_secret = $secret[2];

?>