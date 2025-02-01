<?php
include 'includes/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = $_POST['fullname'];
    $student_id = $_POST['student_id'];
    $supervisor_id = $_POST['supervisor_id']; // Capture selected supervisor
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];

    if ($password !== $repassword) {
        echo "Passwords do not match.";
        exit;
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Updated query to include supervisor_id
    $stmt = $conn->prepare("INSERT INTO students (fullname, student_id, supervisor_id, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $fullname, $student_id, $supervisor_id, $hashed_password);

    if ($stmt->execute()) {
        echo "Sign-up successful. <a href='loginpage.php'>Go to Login Page</a>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

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
            <form id="signup-form" action="studentsignup.php" method="post">
                <input type="text" placeholder="Full Name" name="fullname" required>
                <input type="text" placeholder="Student ID" name="student_id" required>

                <!-- Supervisor Dropdown -->
                <select name="supervisor_id" required>
                    <option value="" disabled selected>Select Supervisor</option>
                    <?php
                    // Fetch supervisors from the database
                    $stmt = $conn->prepare("SELECT id, fullname FROM supervisors");
                    $stmt->execute();
                    $stmt->store_result();
                    $stmt->bind_result($id, $fullname);

                    // Debugging: Display SQL result to ensure data is fetched
                    echo "<!-- Debugging Output -->";
                    if ($stmt->num_rows > 0) {
                        // Loop through and populate the dropdown
                        while ($stmt->fetch()) {
                            echo "<option value=\"$id\">$fullname</option>";
                            // Debugging: Display supervisor details
                            echo "<p>Supervisor ID: $id, Full Name: $fullname</p>";
                        }
                    } else {
                        echo "<p>No supervisors found.</p>";
                    }
                    $stmt->close();
                    ?>
                </select>

                <input type="password" placeholder="Password" name="password" required>
                <input type="password" placeholder="Re-enter Password" name="repassword" required>

                <button type="submit" class="signup-btn">Sign Up</button>
            </form>
        </div>

        <a href="studentlogin.php" class="back-btn">Back</a>
    </div>
</body>

</html>
