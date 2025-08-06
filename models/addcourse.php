
<?php
include '../core/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $course_name = $_POST['course_name'];
    $course_description = $_POST['course_description'];


    $stmt = $conn->prepare("INSERT INTO courses (course_name, course_description) VALUES (?, ?)");
    $stmt->bind_param("ss", $course_name, $course_description);

    if ($stmt->execute()) {
        echo "course added";
        header("Location: ../views/admin_dashboard.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Add Course</title>
    <style>
        body { font-family: Arial; background: #f0f0f0; }
        .container { width: 300px; margin: 100px auto; background: #fff; padding: 20px; border-radius: 8px; }
        input[type=text], input[type=password] { width: 100%; padding: 8px; margin: 8px 0; }
        button { width: 100%; padding: 10px; background: #3498db; color: #fff; border: none; border-radius: 4px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add Course</h2>
        <form  method="POST">
            <input type="text" name="course_name" placeholder="course" required><br>
            <input type="text" name="course_description" placeholder="description" required><br>
            <button type="submit">Add</button>
        </form>
    </div>
</body>
</html>
