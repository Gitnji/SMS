<?php
session_start();
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate input
    if (empty($email) || empty($password)) {
        echo "Email or password is required.";
        exit;
    }

    // Prepare and execute SQL statement
    $role = 'student'; 
    $stmt = $conn->prepare("UPDATE users SET email = ?, password = ? WHERE id = ?");
    $stmt->bind_param("ss", $email, $password);

    if ($stmt->execute()) {
        echo "Registration successful. You can now <a href='../views/login.php'>login</a>.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}