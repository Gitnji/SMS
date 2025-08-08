<?php
session_start();
include 'C:/xampp/htdocs/SMS/SMS-1/core/database.php';


if(isset($_POST['join'])){
    $email = $_POST['email'];
    $course_name = $_POST['course_name'];

     $check = $conn->prepare("SELECT * FROM enrollments WHERE email = ? AND course_name = ?");
    $check->bind_param("ss", $email, $course_name);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('You have already joined this course.');</script>";
}else {
        $stmt = $conn->prepare("INSERT INTO enrollments (email, course_name) VALUES (?, ?)");
        $stmt->bind_param("ii", $email, $course_name);

        if ($stmt->execute()) {
            echo "<script>alert('Successfully joined the course.');window.location.href='../views/admin_dashboard.php';</script>";
        } else {
            echo "Error: " . $conn->error;
            }
        
        }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Course</title>
    <style>
        body { font-family: Arial; background: #f0f0f0; }
        .container { width: 300px; margin: 100px auto; bac.kground: #fff; padding: 20px; border-radius: 8px; }
        input[type=text], input[type=password] { width: 100%; padding: 8px; margin: 8px 0; }
        button { width: 100%; padding: 10px; background: #3498db; color: #fff; border: none; border-radius: 4px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Join Course</h2>
        <form method="POST">
            <input type="text" name="email" placeholder=""  ><br>
            <input type="text" name="course_name" placeholder="" ><br>
            <button type="submit" name="join">Join</button>
        </form>
        <p>Back to  <a href="/SMS/sms-1/views/student_dashboard.php">Dashboard</a></p>
    </div>
</body>
</html>