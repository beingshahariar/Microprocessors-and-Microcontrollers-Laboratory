<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: text/plain");

include "db.php";

$secret_token = "12345";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo "Only POST allowed";
    exit;
}

$token = $_POST["token"] ?? "";

if ($token !== $secret_token) {
    echo "Invalid token";
    exit;
}

$temperature = $_POST["temperature"] ?? 0;
$heart_rate = $_POST["heart_rate"] ?? 0;
$bag_weight = $_POST["bag_weight"] ?? 0;
$status = $_POST["status"] ?? "UNKNOWN";
$event = $_POST["event"] ?? "DATA";

$stmt = $conn->prepare(
    "INSERT INTO health_logs 
    (temperature, heart_rate, bag_weight, status_text, event_text) 
    VALUES (?, ?, ?, ?, ?)"
);

$stmt->bind_param("didss", $temperature, $heart_rate, $bag_weight, $status, $event);

if ($stmt->execute()) {
    echo "Data inserted successfully";
} else {
    echo "Insert failed";
}

$stmt->close();
$conn->close();
?>