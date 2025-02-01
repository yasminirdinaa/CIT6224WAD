<?php
// Assuming you have already set up your database connection
include '../includes/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_number = $_POST['id_number'];
    $new_password = $_POST['new_password'];

    // Generate a hashed password
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    // Update the password in the database
    $stmt = $conn->prepare("UPDATE users SET password = ? WHERE id_number = ? AND role = 'student'");
    $stmt->bind_param("ss", $hashed_password, $id_number);
    if ($stmt->execute()) {
        echo "Password updated successfully. <a href='studentlogin.php'>Login now</a>";
    } else {
        echo "There was an issue updating the password. Please try again.";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Forgot Password</title>
    <link rel="stylesheet" href="../admin/css/adminlogin.css">
</head>

<body>
    <div class="background">
        <div class="signup-card">
            <h1>Forgot Password</h1>
            <form action="forgot_password.php" method="post">
                <input type="text" placeholder="ID Number" name="id_number" required>
                <input type="password" placeholder="New Password" name="new_password" required>
                <button type="submit" class="signup-btn">Reset Password</button>
            </form>
        </div>
        
        <a href="studentlogin.php" class="back-btn">Back to Login</a>
    </div>
</body>

</html>
