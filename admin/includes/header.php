<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FYP Portal</title>
    <style>
        nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: rgb(18, 88, 148);
    padding: 1em 2em;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    position: relative;
}

        .navbar-left a {
            color: #fff;
            font-size: 1.5em;
            font-weight: bold;
            text-decoration: none;
        }

        .menu-icon {
            display: block;
            font-size: 2em;
            color: #fff;
            cursor: pointer;
        }

        .navbar-right {
            list-style: none;
            margin: 0;
            padding: 0;
            display: none;
            position: fixed;
            right: -250px;
            top: 0;
            height: 100%;
            width: 250px;
            background-color: #0d447f8e;
            transition: right 0.3s ease-in-out;
            z-index: 1000;
        }

        .navbar-right li {
            margin: 1em 0;
            text-align: center;
        }

        .navbar-right li a {
            color: #fff;
            text-decoration: none;
            font-size: 1.2em;
            font-weight: bold;
            transition: color 0.3s;
        }

        .navbar-right li a:hover {
            color: #f8f9fa;
            text-decoration: underline;
        }

        .navbar-right.active {
            display: block;
            right: 0;
        }

        .navbar-right::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: -1;
            display: none;
        }

        .navbar-right.active::before {
            display: block;
        }

        .logout-img {
            width: 20px;
            height: 20px;
            object-fit: contain;
            cursor: pointer;
        }

        .search-container {
    display: flex;
    align-items: center;
    background-color: transparent;
    border-radius: 4px;
    /* padding: 0.5em; */
    position: absolute;
    right: 5em; /* Adjust this value as needed */
    top: 45%;
    transform: translateY(-50%);
}

.search-input {
    border: none;
    outline: none;
    padding: 0.5em;
    font-size: 1em;
    width: 100%;
    border-radius: 20px;
}

.search-button {
    background: none;
    border: none;
    cursor: pointer;
    position: absolute;
    right: 0.5px;
    top: 40%;
    transform: translateY(-50%);
    width: 22px;
    height: 22px;
}
    </style>
</head>
<body>
    <nav>
        <div class="navbar-left">
            <a href="adminhomepage.php">FYP PORTAL</a>
        </div>

        <form class="search-container" method="GET" action="search_users.php" id="searchForm">
    <input type="text" name="search" id="searchInput" class="search-input" placeholder="Search...">
    <button type="submit" id="searchButton" class="search-button">
        <img src="../images/search1.png" alt="Search" style="width: 20px; height: 20px;">
    </button>
</form>

        <div class="menu-icon" id="menuIcon">
            &#x2022;&#x2022;&#x2022;
        </div>
        
        <ul class="navbar-right" id="navbarLinks">
        <li><a href="adminhomepage.php">Home</a></li>
            <li><a href="usermanagement.php">User Management</a></li>
            <li><a href="admin_proposal.php">Proposal Status</a></li>
            <li><a href="admin_update.php">Manage Proposal</a></li>
            <li><a href="adminlogin.php">
                <img src="../images/logout.png" alt="Logout" class="logout-img">
            </a></li>
        </ul>
    </nav>
        </ul>
    </div>
    <script>
       
        document.getElementById('searchButton').addEventListener('click', function() {
        var searchForm = document.getElementById('searchForm');
        // Toggle visibility of the search input field
        if (searchForm.style.display === 'none' || searchForm.style.display === '') {
            searchForm.style.display = 'flex';
        } else {
            // searchForm.style.display = 'none';
        }
    });

document.getElementById('searchForm').addEventListener('submit', function (e) {
    var searchInput = document.getElementById('searchInput').value.trim();
    if (searchInput === "") {
        e.preventDefault();3
        alert("Please enter a search term.");
    }
});


    </script>
</body>
</html>