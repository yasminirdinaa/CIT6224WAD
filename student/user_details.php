<?php
include 'includes/db_connection.php'; // Include database connection file

if (isset($_GET['id'])) {
    $userId = intval($_GET['id']);
    
    // Fetch the user details from the database
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->bind_param("i", $userId); // The user ID is passed as a parameter
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Assuming the profile picture is stored as a file path in 'profile_picture' column
        $profilePicture = isset($user['profile_picture']) && !empty($user['profile_picture']) ? $user['profile_picture'] : 'uploads/default.jpg';

        // Display user details (name, id, etc.)
        echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>User Details</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    margin: 0;
                    padding: 0;
                    background-color: #f4f4f4;
                }
                .container {
                    width: 80%;
                    margin: 0 auto;
                    background-color: #fff;
                    padding: 20px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    border-radius: 10px;
                    margin-top: 50px;
                }
                .user-info {
                    display: flex;
                    align-items: center;
                    margin-bottom: 20px;
                }
                .user-info img {
                    width: 100px;
                    height: 100px;
                    border-radius: 50%;
                    margin-right: 20px;
                }
                .user-info div {
                    font-size: 1.2em;
                }
                .user-info h2 {
                    margin: 0;
                    font-size: 1.5em;
                    color: #333;
                }
                .user-info p {
                    margin: 5px 0;
                    color: #555;
                }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='user-info'>
                    <img src='" . $profilePicture . "' alt='Profile Picture'>
                    <div>
                        <h2>" . htmlspecialchars($user['fullname']) . "</h2>
                        <p><strong>ID Number:</strong> " . htmlspecialchars($user['id_number']) . "</p>
                        <p><strong>Role:</strong> " . htmlspecialchars($user['role']) . "</p>
                    </div>
                </div>
            </div>
        </body>
        </html>";
    } else {
        echo "User not found.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "No user selected.";
}
?>
