<?php
include 'includes/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = $_POST['fullname'];
    $id_number = $_POST['id_number'];
    $role = $_POST['role'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];

    if ($password !== $repassword) {
        echo "Passwords do not match.";
        exit;
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (fullname, id_number, role, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $fullname, $id_number, $role, $hashed_password);

    if ($stmt->execute()) {
        echo "Sign-up successful. <a href='loginpage.php'>Go to Login Page</a>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sign Up Page</title>
    <link rel="stylesheet" href="css/signup.css">
</head>

<body>
    <div class="background">
        <div class="signup-card">
            <h1>Sign Up</h1>
            <form id="signup-form" action="signup.php" method="post">
    <input type="text" placeholder="Full Name" name="fullname" required>
    <input type="text" placeholder="ID Number" name="id_number" required>

    <select name="role" required>
        <option value="" disabled selected>Select Role</option>
        <option value="student">Student</option>
        <option value="supervisor">Supervisor</option>
    </select>

    <input type="password" placeholder="Password" name="password" required>
    <input type="password" placeholder="Re-enter Password" name="repassword" required>


                <button type="submit" class="signup-btn">Sign Up</button>
            </form>
        </div>

        <a href="loginpage.php" class="back-btn">Back</a>
    </div>
</body>

</html>