
<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
    <style>
        body { font-family: Arial; background: #f0f0f0; }
        .container { width: 300px; margin: 100px auto; background: #fff; padding: 20px; border-radius: 8px; }
        input[type=text], input[type=password] { width: 100%; padding: 8px; margin: 8px 0; }
        button { width: 100%; padding: 10px; background: #2ecc71; color: #fff; border: none; border-radius: 4px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Signup</h2>
        <form action="../core/register.php" method="POST">
            <input type="text" name="email" placeholder="email" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit">Sign Up</button>
        </form>
        <p>Already have an account? <a href="../views/login.php">Login</a></p>
    </div>
</body>
</html>
