<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Login Page</title>
    <link rel="stylesheet" href="css/adminlogin.css">
</head>

<body>
    <div class="background">
        <div class="signup-card">
            <h1>Admin Login</h1>
            <form action="adminhomepage.php" method="post">
                <input type="text" placeholder="Username" name="username" required>
                <input type="password" placeholder="Password" name="password" required>
                <button type="submit" class="signup-btn">Login</button>
            </form>
        </div>

        <a href="../loginpage.php" class="back-btn">Back</a>
    </div>
</body>

</html>