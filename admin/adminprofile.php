<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile - FYP Management</title>
    <link rel="stylesheet" href="../student/css/studentprofile.css">
</head>

<body>
<?php include('includes/header.php'); ?>

    <div class="container">
        <header>
            <h1>Profile</h1>
        </header>
        <div class="profile">
            <img id="profile-pic" src="profile-pic.jpg" alt="Student Profile Picture">
            <div class="profile-info">
                <h1>Sofea Hazreena</h1>
                <p><strong>Student ID:</strong> 1211103216</p>
                <p><strong>Email:</strong> <a href="mailto:sofea@example.com">sofea@example.com</a></p>
                <p><strong>Program:</strong> Bachelor of Computer Science</p>
                <p><strong>Supervisor:</strong> Helmi Mohamed Hussain</p>
                <p><strong>Phone Number:</strong> <span id="phone-number">012345678901</span></p>
                <button id="profile-btn">Edit Profile</button>
            </div>
        </div>

    </div>
    <div class="input-container">
        <input type="text" id="phone-input" style="display:none;" placeholder="Enter new phone number" maxlength="12">
        <button id="save-phone-btn" style="display:none;" onclick="savePhoneNumber()">Save Phone Number</button>
        <input type="file" id="profile-upload" style="display:none;" onchange="uploadProfilePicture()">
        <button id="remove-profile-pic-btn" style="display:none;" onclick="removeProfilePicture()">Remove Profile
            Picture</button>
    </div>
    <div class="button-container">
        <button id="save-changes-btn" onclick="saveChanges()">Save Changes</button>
        <button id="reset-btn" onclick="resetChanges()">Reset</button>
    </div>

    <script src="../student/js/studentprofile.js"></script>

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