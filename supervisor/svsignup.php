<?php
include 'includes/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = $_POST['fullname'];
    $staff_id = $_POST['staff_id'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];

    if ($password !== $repassword) {
        echo "Passwords do not match.";
        exit;
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO supervisors (fullname, staff_id, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $fullname, $staff_id, $hashed_password);

    if ($stmt->execute()) {
        echo "Sign-up successful. <a href='logipage.php'>Go to Login Page</a>";
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
    <link rel="stylesheet" href="../css/signup.css">
</head>

<body>
    <div class="background">
        <div class="signup-card">
            <h1>Sign Up</h1>
            <form id="signup-form" action="svsignup.php" method="post">
    <input type="text" placeholder="Full Name" name="fullname" required>
    <input type="text" placeholder="Staff ID" name="staff_id" required>

    <input type="password" placeholder="Password" name="password" required>
    <input type="password" placeholder="Re-enter Password" name="repassword" required>


                <button type="submit" class="signup-btn">Sign Up</button>
            </form>
        </div>

        <a href="svlogin.php" class="back-btn">Back</a>
    </div>
</body>

</html>