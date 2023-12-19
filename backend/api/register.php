<?php
require_once('../db/db_connection.php');

// Assuming you have a POST request with 'username', 'email', and 'password'
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = OpenCon();

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    $checkQuery = "SELECT * FROM users WHERE username='$username' OR email='$email'";
    $checkResult = $conn->query($checkQuery);

    if ($checkResult->num_rows > 0) {

        echo json_encode(["status" => "error", "message" => "Username or email already exists"]);
    } elseif (strlen($password) < 8 || !preg_match('/[A-Z]/', $password) || !preg_match('/[0-9]/', $password) || !preg_match('/[!@#$%^&*(),.?":{}|<>]/', $password)) {

        echo json_encode(["status" => "error", "message" => "Password should be at least 8 characters long and contain at least one uppercase letter, one number, and one special character"]);
    } else {

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);


        $insertQuery = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashedPassword')";
        $insertResult = $conn->query($insertQuery);

        if ($insertResult) {

            echo json_encode(["status" => "success", "message" => "Registration successful"]);
        } else {

            echo json_encode(["status" => "error", "message" => "Registration failed"]);
        }
    }

    CloseCon($conn);
} else {

    echo json_encode(["status" => "error", "message" => "Invalid request method"]);
}
?>
