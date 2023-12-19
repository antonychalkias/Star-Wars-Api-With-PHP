<?php
session_start();
require_once('../db/db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!isset($_SESSION['user_id'])) {
        echo json_encode(["status" => "error", "message" => "User not logged in"]);
        exit;
    }

    $conn = OpenCon();

    $planetName = $conn->real_escape_string($_POST['planetName']);
    $rotationPeriod = $conn->real_escape_string($_POST['rotationPeriod']);
    $orbitalPeriod = $conn->real_escape_string($_POST['orbitalPeriod']);
    $diameter = $conn->real_escape_string($_POST['diameter']);
    $climate = $conn->real_escape_string($_POST['climate']);
    $gravity = $conn->real_escape_string($_POST['gravity']);
    $userId = $_SESSION['user_id'];

    $sql = "INSERT INTO planets (name, rotation_period, orbital_period, diameter, climate, gravity, user_id) 
            VALUES ('$planetName', '$rotationPeriod', '$orbitalPeriod', '$diameter', '$climate', '$gravity', '$userId')";
    
    if ($conn->query($sql)) {
        echo json_encode(["status" => "success", "message" => "Planet added successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error adding planet"]);
    }

    CloseCon($conn);
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method"]);
}
?>
