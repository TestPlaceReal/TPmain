<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Read the database
    $lines = file("loginsignupdb.txt", FILE_IGNORE_NEW_LINES);
    $success = true;

    // Check if the username already exists
    foreach ($lines as $line) {
        list($savedUsername, $savedPassword) = explode(",", $line);
        if ($savedUsername === $username) {
            $success = false;
            echo "Username already exists!";
            break;
        }
    }

    // If username doesn't exist, add to the database
    if ($success) {
        $newUser = $username . ',' . $password . PHP_EOL;
        file_put_contents("loginsignupdb.txt", $newUser, FILE_APPEND | LOCK_EX);
        echo "Sign up successful!";
    }
}
?>
