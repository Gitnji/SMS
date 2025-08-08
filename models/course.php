<?php
include 'C:/xampp/htdocs/SMS/SMS-1/core/database.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Course</title>
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
        <a href="../models/addcourse.php"><button>Add Course</button></a>
        <a href="../views/admin_dashboard.php"><button>Back</button></a>
        <div class="table">
          <p><h3>Table of Courses</h3></p>
            <table border="1" style="width: 100%; text-align: left; margin-top: 20px;">
                <tr>
                    <th>ID</th>
                    <th>Courses</th>
                    <th>Edit</th>
                </tr>
                <?php
                $result = $conn->query("SELECT * FROM courses ");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['course_name'] . "</td>";
                    echo "<td>
                    <a href='../models/admin/update.php?id=" . $row['id'] . "'><button>update</button></a>
                    <a href='../models/admin/delete.php?id=" . $row['id'] . "' onclick=\"return confirm('Are you sure?');\"><button>delete</button></a>
                    </td>";
                    echo "</tr>";
                }
                ?>
        </div>
    </div>
</body>
</html>
