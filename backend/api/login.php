<?php
session_start();
require_once('../db/db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = OpenCon();

    $username = $conn->real_escape_string($_POST['loginUsername']);
    $password = $conn->real_escape_string($_POST['loginPassword']);

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            echo json_encode(["status" => "success", "message" => "Login successful"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Incorrect password"]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "User not found"]);
    }

    CloseCon($conn);
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method"]);
}
?>
