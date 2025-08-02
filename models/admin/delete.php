<?php
session_start();
require_once(__DIR__ . '/../../core/database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$id = $_POST['id'];

$sql = $conn->prepare("DELETE FROM users WHERE id = ?");
$stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

if ($stmt->execute()) {
} else {
  echo "Error deleting record: " . $conn->error;
    }}

$conn->close();
?>
