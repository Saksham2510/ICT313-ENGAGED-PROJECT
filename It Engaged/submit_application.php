<?php
require 'database.php';
open_connection();
global $conn;

// Get form data
$job_id = $_POST['job_id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

// Get uploaded files
$cv = $_FILES['cv']['name'];
$resume = $_FILES['resume']['name'];

// Set upload directory
$uploadDir = 'uploads/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true); // Create the directory if it doesn't exist
}

// Move uploaded files to the 'uploads' directory
if (!move_uploaded_file($_FILES['cv']['tmp_name'], $uploadDir . $cv)) {
    die("Failed to upload CV.");
}
if (!move_uploaded_file($_FILES['resume']['tmp_name'], $uploadDir . $resume)) {
    die("Failed to upload Resume.");
}

// Prepare the SQL statement
$stmt = $conn->prepare("INSERT INTO applications (job_id, applicant_name, email, phone, cv, resume) VALUES (?, ?, ?, ?, ?, ?)");
if ($stmt === false) {
    die("Error preparing the SQL statement: " . $conn->error);
}

// Bind parameters
if (!$stmt->bind_param("isssss", $job_id, $name, $email, $phone, $cv, $resume)) {
    die("Error binding parameters: " . $stmt->error);
}
if ($stmt->execute()) {
    // Redirect back to jobs.php with a success message
    header("Location: jobs.php?message=Application submitted successfully.");
    exit;
} else {
    // Redirect back to jobs.php with an error message
    header("Location: jobs.php?message=Error: " . urlencode($stmt->error));
    exit;
}
// Close the statement and connection
$stmt->close();
close_connection();
?>
