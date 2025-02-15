<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address!";
        exit;
    }

    $file = "subscribers.txt"; 
    if (file_put_contents($file, $email . PHP_EOL, FILE_APPEND | LOCK_EX)) {
        echo "success";
    } else {
        echo "Failed to save email. Try again.";
    }
} else {
    echo "Invalid request.";
}
?>