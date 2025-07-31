<!-- views/admin_dashboard.php -->
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
        <p>Admin functionalities:</p>
        <button>Assign Course</button>
        <button>Enroll Student</button>
        <button>Delete Student</button>
        <button>Delete Course</button>
        <a href="../views/login.php"><button>Logout</button></a>
    </div>
</body>
</html>
