<?php
require_once '../core/database.php';
//request method
/*$method = $_SERVER['REQUEST_METHOD'];
$inpput = json_decode(file_get_contents('php://input'), true);
switch($method){
    case 'GET':
        // Handle GET request
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $result = $conn->query("SELECT * FROM users WHERE id = $id");
            $data = $result->fetch_assoc();
            echo json_encode($data);
        } else {
            $result = $conn->query("SELECT * FROM users");
            $users = [];
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
            echo json_encode($users);
        }
        break;
    case 'POST':
        // Handle POST request
        $name = $inpput['name'];
        $email = $inpput['email'];
        $stmt = $conn->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $email);
        if ($stmt->execute()) {
            echo json_encode(['message' => 'User created successfully']);
        } else {
            echo json_encode(['error' => $stmt->error]);
        }
        break;
    case 'PUT':
        // Handle PUT request
        $id = $_GET['id'];
        $name = $inpput['name'];
        $email = $inpput['email'];
        $stmt = $conn->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
        $stmt->bind_param("ssi", $name, $email, $id);
        if ($stmt->execute()) {
            echo json_encode(['message' => 'User updated successfully']);
        } else {
            echo json_encode(['error' => $stmt->error]);
        }
        break;
}*/
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        body { font-family: Arial; background: #f4f4f4; }
        .container { width: 80%; margin: auto; padding: 20px; background: #fff; margin-top: 50px; border-radius: 8px; }
        h2 { color: #8e44ad; }
        button { padding: 10px 20px; margin: 10px; background: #8e44ad; color: white; border: none; border-radius: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Welcome, Admin</h2>
        <a><p>Admin functionalities:</p></a>
        <a><button>Assign Course</button></a>
        <a href="../views/register.php"><button>Add Student</button></a>
        <a><button>Delete Student</button></a>
        <a><button>Delete Course</button></a>
         <a><button>View Course</button></a>
        <a href="../views/login.php"><button>Logout</button></a>
        <div class="table">
          <p><h3>Table of Students</h3></p>
            <table border="1" style="width: 100%; text-align: left; margin-top: 20px;">
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Edit</th>
                </tr>
                <?php
                $result = $conn->query("SELECT * FROM users");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>
                    <a href='../models/admin/updating.php'><button>update</button></a>
                    <a href='../models/admin/delete.php'><button>delete</button></a>
                    </td>";
                    echo "</tr>";
                }
                ?>
        </div>
    </div>
</body>
</html>
