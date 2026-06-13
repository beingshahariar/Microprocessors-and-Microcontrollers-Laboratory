<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "smart_medicine";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>