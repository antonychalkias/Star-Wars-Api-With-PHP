<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {

    if (isset($_SESSION['user_id'])) {
        session_destroy();
        echo json_encode(["status" => "success", "redirect" => "../../frontend/homepage.html"]);
        exit;
    } else {
        echo json_encode(["status" => "error", "message" => "User not logged in"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request"]);
}
?>
