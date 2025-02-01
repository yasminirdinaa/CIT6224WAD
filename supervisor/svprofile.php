<?php
session_start();
include('includes/db_connection.php');

// Check if the user is logged in
if (!isset($_SESSION['id_number'])) {
    echo "You need to log in first. <a href='svlogin.php'>Login</a>";
    exit();
}

$user_id = $_SESSION['id_number'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $profile_picture_path = null;

    // Handle profile picture upload
    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
        $file_tmp = $_FILES['profile_picture']['tmp_name'];
        $file_name = basename($_FILES['profile_picture']['name']);
        $target_dir = "uploads/";
        $target_file = $target_dir . $user_id . "_" . $file_name;

        // Move the uploaded file
        if (move_uploaded_file($file_tmp, $target_file)) {
            $profile_picture_path = $target_file;
        } else {
            echo "Error uploading profile picture.";
            exit();
        }
    }

    // SQL query to update profile
    if ($profile_picture_path) {
        $stmt = $conn->prepare(
            "UPDATE users 
             SET fullname = ?, email = ?, program = ?, supervisor = ?, phone_number = ?, profile_picture = ? 
             WHERE id_number = ?"
        );
        $stmt->bind_param("sssssss", $fullname, $email, $program, $supervisor, $phone_number, $profile_picture_path, $user_id);
    } else {
        $stmt = $conn->prepare(
            "UPDATE users 
             SET fullname = ?, email = ?, program = ?, supervisor = ?, phone_number = ? 
             WHERE id_number = ?"
        );
        $stmt->bind_param("ssssss", $fullname, $email, $program, $supervisor, $phone_number, $user_id);
    }

    // Execute the query and handle the result
    if ($stmt->execute()) {
        echo "Profile updated successfully.";
    } else {
        echo "Error updating profile: " . $stmt->error;
    }

    $stmt->close();
}


// Fetch current user data
$sql = "SELECT fullname, id_number, email, program, supervisor, phone_number, profile_picture FROM users WHERE id_number = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user_id);
$stmt->execute();
$stmt->bind_result($fullname, $id_number, $email, $program, $supervisor, $phone_number, $profile_picture);
$stmt->fetch();
$stmt->close();

// Fetch all supervisors (role = 'supervisor')
$supervisor_sql = "SELECT fullname FROM users WHERE role = 'supervisor'";
$supervisor_result = $conn->query($supervisor_sql);

if (!$supervisor_result) {
    echo "Error fetching supervisors: " . $conn->error;
    exit();
}

$supervisors = [];
while ($row = $supervisor_result->fetch_assoc()) {
    $supervisors[] = $row['fullname'];
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <link rel="stylesheet" href="css/svprofile.css">
</head>

<body>
 <?php include('includes/header.php'); ?> 

<div class="container">
    <header>
        <h2>Profile</h2>
    </header>

    <div class="profile">
        <div class="profile-info">
            
        <table>
        <tr>
        <th rowspan="5" ><img src="<?php echo htmlspecialchars(!empty($profile_picture) ? $profile_picture : '../student/uploads/defaultpic.png'); ?>" alt="Profile Picture" width="150" height="150">
        </th>
        </tr>
        <tr>
            <th>Full Name</th>
            <td><?php echo htmlspecialchars($fullname); ?></td>
        </tr>
        <tr>
            <th>Supervisor ID</th>
            <td><?php echo htmlspecialchars($id_number); ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?php echo htmlspecialchars($email); ?></td>
        </tr>
        
        <tr>
            <th>Phone Number</th>
            <td><?php echo htmlspecialchars($phone_number); ?></td>
        </tr>
    </table>

            <button id="profile-btn">Edit Profile</button>
        </div>

        <form id="edit-form" method="POST" action="svprofile.php" enctype="multipart/form-data" style="display: none;">
            <h2>Edit Profile</h2>
            <label for="fullname">Full Name:</label>
            <input type="text" id="fullname" name="fullname" value="<?php echo htmlspecialchars($fullname); ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="xxx@student.mmu.edu.my" value="<?php echo htmlspecialchars($email); ?>" required>


            <label for="phone_number">Phone Number:</label>
            <input type="text" id="phone_number" name="phone_number" placeholder="012 3456789" value="<?php echo htmlspecialchars($phone_number); ?>" required pattern="\d*" title="Only numbers are allowed">

            <label for="profile_picture">Profile Picture:</label>
            <input type="file" id="profile_picture" name="profile_picture" accept="image/*">

            <button type="submit">Save Changes</button>
        </form>
    </div>
</div>

<script>
    // Get the button and form elements
    const editButton = document.getElementById('profile-btn');
    const editForm = document.getElementById('edit-form');

    // Toggle form visibility and hide the button when clicked
    editButton.addEventListener('click', function () {
        editForm.style.display = 'block';
        editButton.style.display = 'none';
    });
</script>

<?php include('includes/footer.php'); ?>
<script>document.getElementById("menuIcon").addEventListener("click", function (event) {
    const menu = document.getElementById("navbarLinks");
    menu.classList.toggle("active");
    event.stopPropagation();
});

document.addEventListener("click", function (event) {
    const menu = document.getElementById("navbarLinks");
    const menuIcon = document.getElementById("menuIcon");

    if (!menu.contains(event.target) && !menuIcon.contains(event.target)) {
        menu.classList.remove("active");
    }
});</script>
<script src="js/studentprofile.js"></script>

</body>
</html>
