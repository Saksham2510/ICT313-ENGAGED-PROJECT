<?php
session_start();
require 'database.php'; 

Open_Connection();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

// Fetch user data from the database
$user_id = $_SESSION['user_id'];
$conn = new mysqli('localhost', 'root', '', 'engaged');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT first_name, last_name, email, address, phone_number FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Error preparing statement: " . $conn->error);
}

$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "User not found.";
    exit();
}

// Update user data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];

    $update_sql = "UPDATE users SET first_name=?, last_name=?, email=?, address=?, phone_number=? WHERE id=?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("sssssi", $first_name, $last_name, $email, $address, $phone_number, $user_id);

    if ($update_stmt->execute()) {
        echo "Profile updated successfully!";
        header("Refresh:0"); 
    } else {
        echo "Error updating profile: " . $conn->error;
    }
}

Close_Connection();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profile.css">
    <title>User Profile</title>
</head>
<body>
    <header>
        <div class="header-title">Profile Page</div>
    </header>

    <div class="container">
        <aside class="sidebar">
            <h3>Account</h3>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="jobs.php">Job Intern</a></li>
                <li><a href="Events.php">Events Management</a></li>
                <li><a href="#">Settings and Privacy</a></li>
                <li><a href="#">Change Password</a></li>
            </ul>
        </aside>

        <main class="profile-content">
            <h2>Your Profile</h2>
            <form method="POST" class="profile-form">
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" value="<?php echo htmlspecialchars($user['first_name']); ?>" required>

                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" value="<?php echo htmlspecialchars($user['last_name']); ?>" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>

                <label for="address">Address:</label>
                <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($user['address']); ?>" required>

                <label for="phone_number">Phone Number:</label>
                <input type="tel" id="phone_number" name="phone_number" value="<?php echo htmlspecialchars($user['phone_number']); ?>" required>

                <button type="submit">Update Profile</button>
            </form>
        </main>
    </div>

    <footer>
        <a href="#">About</a>
        <a href="#">Contact</a>
        <a href="#">Terms of Use</a>
    </footer>
</body>
</html>
