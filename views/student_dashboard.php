<?php
include '../core/database.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard</title>
    <style>
        body { font-family: Arial; background: #f9f9f9; }
        .container { width: 80%; margin: auto; padding: 20px; background: #fff; margin-top: 50px; border-radius: 8px; }
        h2 { color: #2c3e50; }
        button { padding: 10px 20px; margin: 10px; background: #2980b9; color: white; border: none; border-radius: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Welcome, Student</h2>
        <a><button>View My Courses</button></a>
        <a href=""><button>check my grades</button></a>
        <a href="../views/login.php"><button>Logout</button></a>
    </div>
    <div class="table">
          <p><h3>Table of courses</h3></p>
            <table border="1" style="width: 100%; text-align: left; margin-top: 20px;">
                <tr>
                    <th>ID</th>
                    <th>Course</th>
                    <th>Description</th>
                </tr>
                <?php
                $result = $conn->query("SELECT * FROM courses");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['course_name'] . "</td>";
                    echo "<td>" . $row['course_description'] . "</td>";
                    echo "<td>
                    <a href='../models/student/joinc.php?id=" . $row['id'] . "'><button>Join</button></a>
                    </td>";
                    echo "</tr>";
                }
                ?>
        </div>
    </div>
</body>
</html>
