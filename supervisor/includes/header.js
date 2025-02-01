// scripts.js

// Toggle the navbar visibility
document.getElementById('searchButton').addEventListener('click', function() {
    var searchForm = document.getElementById('searchForm');
    // Toggle visibility of the search input field
    if (searchForm.style.display === 'none' || searchForm.style.display === '') {
        searchForm.style.display = 'flex';
    } else {
        searchForm.style.display = 'none';
    }
});

// Search button functionality
document.getElementById('searchButton').addEventListener('click', function() {
    var searchInput = document.getElementById('searchInput').value;
    if (searchInput.trim() !== "") {
        alert("Searching for: " + searchInput);
        // Implement actual search functionality here
    } else {
        alert("Please enter a search term.");
    }
});
