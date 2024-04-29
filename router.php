<?php
// Define the list of allowed files
$allowedFiles = array(
    "/authenticate.php",
    "/index.php",
    "/log.php",
    "/main.php",
    "/member.php",
    "/new.php",
    "/read_secret.php",
    "/render.php",
    "/view_logs.php",
);

// Get the requested URI
$requestURI = $_SERVER['REQUEST_URI'];

// Redirect requests to '/' to '/index.php'
if ($requestURI === '/') {
    header('Location: /index.php');
    exit;
}

// Check if the requested file is allowed
if (in_array($requestURI, $allowedFiles)) {
    // If the file is allowed, include it
    include(__DIR__ . $requestURI);
} else {
    // If the file is not allowed, return a 404 error
    header("HTTP/1.0 404 Not Found");
    echo '404 Not Found';
}
?>
