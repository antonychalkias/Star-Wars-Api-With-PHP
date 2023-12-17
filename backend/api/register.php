<?php
require_once('../db/db_connection.php');

// Assuming you have a POST request with 'username', 'email', and 'password'
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = OpenCon();

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the username or email is already taken
    $checkQuery = "SELECT * FROM users WHERE username='$username' OR email='$email'";
    $checkResult = $conn->query($checkQuery);

    if ($checkResult->num_rows > 0) {
        // Username or email already exists
        echo json_encode(["status" => "error", "message" => "Username or email already exists"]);
    } else {
        // Insert new user
        $insertQuery = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        $insertResult = $conn->query($insertQuery);

        if ($insertResult) {
            // Registration successful
            echo json_encode(["status" => "success", "message" => "Registration successful"]);
        } else {
            // Registration failed
            echo json_encode(["status" => "error", "message" => "Registration failed"]);
        }
    }

    CloseCon($conn);
} else {
    // Handle invalid request method
    echo json_encode(["status" => "error", "message" => "Invalid request method"]);
}
?>
