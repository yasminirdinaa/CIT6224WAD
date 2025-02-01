// login.js

window.onload = function() {
    // Check for error parameter in URL
    const urlParams = new URLSearchParams(window.location.search);
    const errorMessage = urlParams.get('error');
    let errorText = "";

    // Set the error text based on the error type
    if (errorMessage === "password_invalid") {
        errorText = "Password Invalid. Please Try Again.";
    } else if (errorMessage === "account_not_found") {
        errorText = "Account Not Found. Please Try Again.";
    }

    // Show the error message in the modal
    if (errorText !== "") {
        document.getElementById("error-message-text").innerText = errorText;
        document.getElementById("error-message-box").style.display = "block";

        // Hide the message box after 5 seconds
        setTimeout(function() {
            document.getElementById("error-message-box").style.display = "none";
        }, 5000);
    }
};
