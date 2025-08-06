
<?php
require_once '../../core/database.php';

if (!isset($_GET['id'])) {
    echo "No user ID provided.";
    exit;
}

$id = intval($_GET['id']);

// getting user data
$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    echo "User not found.";
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("UPDATE users SET email = ?, password = ? WHERE id =?");
    $stmt->bind_param("ssi", $email, $password, $id);
    if ($stmt->execute()) {
        header("Location: ../../views/admin_dashboard.php");
        exit;
    } else {
        echo "Error updating user: " . $stmt->error;
    }}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update</title>
    <style>
        body { font-family: Arial; background: #f0f0f0; }
        .container { width: 300px; margin: 100px auto; background: #fff; padding: 20px; border-radius: 8px; }
        input[type=text], input[type=password] { width: 100%; padding: 8px; margin: 8px 0; }
        button { width: 100%; padding: 10px; background: #2ecc71; color: #fff; border: none; border-radius: 4px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Update</h2>
        <form method="POST">
            <input type="text" name="email" placeholder="email" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit">Update</button>
        </form>
        <p><a href="../../views/admin_dashboard.php">Back to Dashboard</a></p>
    </div>
</body>
</html>
