<?php
session_start();
session_unset(); // Clear session
session_destroy(); // Destroy session
header("Location: ex6.php"); // Redirect to login page
exit();
?>
