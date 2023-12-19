// Updated register.js

$(document).ready(function () {
    $("#registerForm").submit(function (event) {
        event.preventDefault();

        // Serialize form data
        var formData = $(this).serialize();

        // Send Ajax request
        $.ajax({
            type: "POST",
            url: "../../backend/api/register.php", // Update the URL to your actual backend location
            data: formData,
            dataType: "json",
            success: function (response) {
                // Handle the response from the server
                if (response.status === "success") {
                    alert("Registration successful");
                    window.location.href = '../loginForm/login.html';

                } else {
                    $("#errorDiv").text(response.message).removeClass("d-none");
                }
            },
            error: function () {
                alert("Error during registration. Please try again.");
            }
        });
    });
});
