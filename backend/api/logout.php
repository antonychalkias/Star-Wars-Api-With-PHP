<?php
// Assuming you have a POST request with 'logout' parameter
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
    // Perform any necessary logout actions (e.g., destroy session)

    echo json_encode(["status" => "success", "message" => "Logout successful"]);
} else {
    // Handle invalid request method or missing parameters
    echo json_encode(["status" => "error", "message" => "Invalid request"]);
}
?>
