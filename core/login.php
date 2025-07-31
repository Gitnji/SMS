<?php
session_start();
include 'database.php';



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate input
    if (empty($email) || empty($password)) {
        echo "email or password is required.";
        exit;
    }

    // Prepare and execute SQL statement
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if ($password === $user['password']) {
            $_SESSION['email'] = $email;
            $_SESSION['role'] = $user['role'];
            if ($_SESSION['role'] === 'admin') {
                header("Location: ../views/admin_dashboard.php");
            } else {
                header("Location: ../views/student_dashboard.php");
            }
            exit;
        }
        else {
            echo "Invalid email or password.";
        }
    }
}