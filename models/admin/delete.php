<?php
require_once '../../core/database.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        header("Location: ../../views/admin_dashboard.php");
        exit;
    } else {
        echo "Error deleting user: " . $stmt->error;
    }
} else {
    echo "No user ID specified.";
}
?>