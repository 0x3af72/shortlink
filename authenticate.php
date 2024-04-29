<?php

use \Firebase\JWT\JWT;
use \Firebase\JWT\Key;

// authenticate
if (isset($_COOKIE["auth"])) {
    try {
        $decoded = JWT::decode($_COOKIE["auth"], new Key($admin_secret, "HS256"));
        if (!(isset($decoded->loggedin) || $decoded->loggedin !== true)) {
            http_response_code(403);
            echo "403 Forbidden";
            exit;
        }
    } catch (Exception $e) {
        http_response_code(403);
        echo "403 Forbidden";   
        exit;
    }
} else {
    http_response_code(403);
    echo "403 Forbidden";   
    exit;
}

?>