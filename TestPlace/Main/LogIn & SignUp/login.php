<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Read the database
    $lines = file("loginsignupdb.txt", FILE_IGNORE_NEW_LINES);
    $success = false;

    foreach ($lines as $line) {
        list($savedUsername, $savedPassword) = explode(",", $line);
        if ($savedUsername === $username && $savedPassword === $password) {
            $success = true;
            break;
        }
    }

    if ($success) {
        echo "Login successful!";
    } else {
        echo "Invalid username or password!";
    }
}
?>
