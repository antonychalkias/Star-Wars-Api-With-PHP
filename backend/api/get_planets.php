<?php
session_start();
require_once('../db/db_connection.php');


function getPlanets() {
    $conn = OpenCon();


    if ($conn === false) {
        return ["status" => "error", "message" => "Database connection error"];
    }


    $sql = "SELECT * FROM planets";
    $result = $conn->query($sql);

    if ($result === false) {
        return ["status" => "error", "message" => "Database query error: " . $conn->error];
    }

    if ($result->num_rows > 0) {
        $planets = array();

        while ($row = $result->fetch_assoc()) {
            $planets[] = $row;
        }

        CloseCon($conn); 

        return ["status" => "success", "planets" => $planets];
    } else {
        CloseCon($conn); 

        return ["status" => "success", "planets" => []]; 
    }
}

$response = getPlanets();
header('Content-Type: application/json');
echo json_encode($response);
?>
