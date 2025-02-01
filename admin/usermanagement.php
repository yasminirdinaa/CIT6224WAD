<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin User Management</title>
    <link rel="stylesheet" href="css/usermanagement.css">

</head>

<body>
<?php include('includes/header.php'); ?>

    <div class="background">
        <div class="user-management-card">
            <h1>User Management</h1>
            <div class="user-list">
                <h2>Registered Users</h2>
                <table>
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>John Doe</td>
                            <td>johndoe@example.com</td>
                            <td>12345</td>
                            <td>Student</td>
                            <td><button class="delete-button">Delete</button></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Jane Smith</td>
                            <td>janesmith@example.com</td>
                            <td>98765</td>
                            <td>Supervisor</td>
                            <td><button class="delete-button">Delete</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="add-user-form">
                <h2>Add New User</h2>
                <form class="add-user">
                    <label for="userid">User ID:</label>
                    <input type="text" id="userid" placeholder="User ID" required>

                    <label for="name">Name:</label>
                    <input type="text" id="name" placeholder="Enter name" required>

                    <label for="email">Email:</label>
                    <input type="email" id="email" placeholder="Enter email" required>

                    <label for="password">Password:</label>
                    <input type="password" id="password" placeholder="Enter password" required>

                    <label for="role">Role:</label>
                    <select id="role" required>
                        <option value="Student">Student</option>
                        <option value="Supervisor">Supervisor</option>
                        <option value="Admin">Admin</option>
                    </select>

                    <button type="submit" class="add-button">Add User</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.getElementById("menuIcon").addEventListener("click", function (event) {
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
        });
    </script>
    <?php include('includes/footer.php'); ?>

</body>

</html>