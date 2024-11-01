<?php

function getHeader($pageTitle) {
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>$pageTitle</title>
        <style>
            /* Your existing styles */
        </style>
    </head>
    <body>
    <header class='title-bar'>
        <h1>Group 3</h1>
        <p>BSIT - 3D</p>";

    // Display logged-in user if session exists
    if (isset($_SESSION['username'])) {
        echo "<p>Welcome, " . $_SESSION['username'] . " | <a href='logout.php'>Logout</a></p>";
    } else {
        echo "<p><a href='ex6.php'>Login</a></p>";
    }

    echo "</header><main>";
}
?>
