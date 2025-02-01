<!DOCTYPE html>
<html lang="en">

<head>
    <title>Supervisor Login Page</title>
    <link rel="stylesheet" href="../admin/css/adminlogin.css">
</head>

<body>
    <div class="background">
        <div class="signup-card">
            <h1>Supervisor Login</h1>
            <form action="svlogin.php" method="post">
    <input type="text" placeholder="ID Number" name="staff_id" required>
    <input type="password" placeholder="Password" name="password" required>
    <button type="submit" class="signup-btn">Login</button>
</form>
 <!-- Forgot Password Link -->
 <a href="forgot_password.php" class="forgot-password-btn">Forgot Password? <br /></a>
            
            <a href="../supervisor/svsignup.php" class="signup-button">Sign Up</a>
        </div>

        <a href="../loginpage.php" class="back-btn">Back</a>
    </div>
    <div>
        <footer class="footer">
            <div class="footer-container">
                <p>&copy; 2024 FCI Final Year Project Management System. All Rights Reserved.</p>
                <p>
                    <a href="terms.php" target="_blank">Terms of Use</a> |
                    <a
                        href="mailto:1211103216@student.mmu.edu.my,1211103227@student.mmu.edu.my,1211103216@student.mmu.edu.my,1211103216@student.mmu.edu.my">Contact
                        Us</a>
                </p>
            </div>
        </footer>
    </div>
</body>

</html>

<?php
include '../includes/db_connection.php'; // Include the database connection

session_start(); // Start session before processing

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $staff_id = $_POST['staff_id'];
    $password = $_POST['password'];

    // Prepare and execute the SQL statement securely
    $stmt = $conn->prepare("SELECT fullname, password FROM supervisors WHERE staff_id = ?");
    $stmt->bind_param("s", $staff_id);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($fullname, $hashed_password);
        $stmt->fetch();

        // Verify the password
        if (password_verify($password, $hashed_password)) {
            $_SESSION['staff_id'] = $staff_id;
            $_SESSION['fullname'] = $fullname;
            // Redirect to the homepage upon successful login
            header("Location: svhomepage.php");
            exit();
        } else {
            // Echo password invalid message
            echo "Password Invalid. Please <a href='svlogin.php'>Try Again</a>";
        }
    } else {
        // Echo account not found message
        echo "Account Not Found. Please <a href='svlogin.php'>Try Again</a>";
    }

    $stmt->close();
}

$conn->close();
?>

