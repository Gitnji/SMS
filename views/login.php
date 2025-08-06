<!-- views/login.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body { font-family: Arial; background: #f0f0f0; }
        .container { width: 300px; margin: 100px auto; background: #fff; padding: 20px; border-radius: 8px; }
        input[type=text], input[type=password] { width: 100%; padding: 8px; margin: 8px 0; }
        button { width: 100%; padding: 10px; background: #3498db; color: #fff; border: none; border-radius: 4px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form action="../core/login.php" method="POST">
            <input type="text" name="email" placeholder="email" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="/SMS/sms/views/register.php">Sign up</a></p>
    </div>
</body>
</html>
