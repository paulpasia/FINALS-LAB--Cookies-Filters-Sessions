<?php
// Start session to store user login status
session_start();

// Predefined users with their usernames and passwords (hashed for security)
$users = [
    "Raizen" => password_hash("vidal123", PASSWORD_DEFAULT),
    "Joerieleto" => password_hash("junior123", PASSWORD_DEFAULT),
    "Paul" => password_hash("pasia123", PASSWORD_DEFAULT),
    "Migs" => password_hash("sepina123", PASSWORD_DEFAULT),
    "Kc" => password_hash("fesarit123", PASSWORD_DEFAULT)
];

// Check if 'name' and 'password' are set in the POST request
if (isset($_POST['name']) && isset($_POST['password'])) {
    // Filter the input to prevent XSS and sanitize strings
    $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
    $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

    // Check if user exists in the predefined list
    if (array_key_exists($name, $users)) {
        // Verify the provided password with the hashed password
        if (password_verify($password, $users[$name])) {
            // Login successful, set session variables and cookies
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $name;

            // Set a cookie for the user's session to last for 1 hour
            setcookie('username', $name, time() + 3600, '/');

            // Return 'success' to indicate login success
            echo "success";
        } else {
            // Invalid password
            echo "Invalid password!";
        }
    } else {
        // User not found in the predefined list
        echo "Invalid name or password!";
    }
} else {
    // If 'name' or 'password' is missing in the request
    echo "Please provide both name and password!";
}
?>
