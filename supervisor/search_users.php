<?php
include 'includes/db_connection.php'; // Include database connection file
include('includes/header.php'); 

if (isset($_GET['search'])) {
    $searchTerm = htmlspecialchars($_GET['search']);
    
    $stmt = $conn->prepare("SELECT * FROM users WHERE fullname LIKE ? OR id_number LIKE ? OR role LIKE ?");
    $searchTerm = "%" . $searchTerm . "%";
    $stmt->bind_param("sss", $searchTerm, $searchTerm, $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();

    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Search Results</title>
        <link rel='stylesheet' href='styles.css'>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'>
    </head>
    <body>
        <div class='container'>";

    if ($result->num_rows > 0) {
        echo "<h2>Search Results:</h2><div class='search-results'><ul>";

        while ($row = $result->fetch_assoc()) {
            $profilePicture = isset($row['profile_picture']) && !empty($row['profile_picture']) ? $row['profile_picture'] : 'uploads/default.jpg';
            echo "<li style='display: flex; align-items: flex-start; gap: 15px; padding: 10px;'> 
                <img src='" . htmlspecialchars($profilePicture) . "' alt='Profile Picture' style='width: 50px; height: 50px; border-radius: 50%; align-self: center;'> 
                <div>
                    <a href='user_details.php?id=" . htmlspecialchars($row['id']) . "' style='font-weight: bold;'>" . htmlspecialchars($row['fullname']) . "</a><br>
                    <span>ID: " . htmlspecialchars($row['id_number']) . "</span><br>
                    <span> " . htmlspecialchars($row['role']) . "</span><br>
                    <a href='mailto:" . htmlspecialchars($row['email']) . "'><i class='fas fa-envelope'></i> " . htmlspecialchars($row['email']) . "</a><br />
                    <a href='tel:" . htmlspecialchars($row['phone_number']) . "'><i class='fas fa-phone-alt'></i> " . htmlspecialchars($row['phone_number']) . "</a><br>
                </div>
              </li>";
        }
        echo "</ul></div>";
    } else {
        echo "<p>No results found.</p>";
    }

    echo "</div>";
    include('includes/footer.php');
    echo "</body></html>";

    $stmt->close();
    $conn->close();
}
?>
