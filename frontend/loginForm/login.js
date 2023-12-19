$(document).ready(function () {
    $("#loginForm").submit(function (event) {
        event.preventDefault();

        var formData = $(this).serialize();


        $.ajax({
            type: "POST",
            url: "../../backend/api/login.php",
            data: formData,
            dataType: "json",
            success: function (response) {
                console.log(response); 

                if (response.status === "success") {
                    alert("Login successful");  
                    window.location.href = '../dashboard/dashboard.html';
                } else {
                    $("#errorDiv").text(response.message).removeClass("d-none");
            

                    setTimeout(function () {
                        $("#errorDiv").addClass("d-none").text("");
                    }, 10000);
                }
            },            
            error: function () {
                console.log("Error during login. Please try again.");
            }
        });
    });
});
