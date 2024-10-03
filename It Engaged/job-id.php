<?php
require 'database.php';
open_connection();
global $conn;

$job_id = $_GET['id'];

$sql = "SELECT * FROM jobs WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $job_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $job = $result->fetch_assoc();
    echo json_encode($job);
} else {
    echo json_encode(['error' => 'Job not found']);
}

$stmt->close();
close_connection();
?>
