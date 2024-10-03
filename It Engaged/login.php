<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection settings
$servername = "localhost";
$username = "root"; 
$password = "";     
$dbname = "engaged"; 

// Create a connection        
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Start the session
session_start();

// Check if the registration form is submitted
if (isset($_POST['register'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encrypt the password
       
    
  // Check for any missing required fields
  if (empty($first_name) || empty($last_name) || empty($email) || empty($password)) {
    echo "All fields are required.";
} else {
    // Prepare the SQL statement to insert the data
    $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $first_name, $last_name, $email, $password);

    // Execute the query
    if ($stmt->execute()) {
        echo "Registration successful!";
        header("Location: login.php"); // Redirect to login page after successful registration
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
}

// Check if the login form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Fetch the user from the database
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify the password using password_verify()
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            header("Location:http://localhost/It Engaged/homes.php"); // Redirect to the home page
            exit();
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "User not found.";
    }

    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login And Signup form</title>
    <link rel="stylesheet" href="login.Css">
</head>

<body>
    <div class="hero">
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="login()">Log In</button>
                <button type="button" class="toggle-btn" onclick="signup()">Signup</button>
            </div>

            <!-- Removed the social icons section -->
            
            <form id="login" class="input-group" method="POST" action="">
                <input type="text" class="input-field" name="email" placeholder="Email" required>
                <input type="password" class="input-field" name="password" placeholder="Enter Password" required>
                <input type="checkbox" class="check-box"><span>Remember Password</span>
                <button type="submit" class="submit-btn" name="login">Login</button>
            </form>

            <form id="register" class="input-group" method="POST" action="">
                
                <input type="text" class="input-field" placeholder="First Name" name="first_name" required>
                <input type="text" class="input-field" placeholder="Last Name" name="last_name"required>
                <input type="email" class="input-field" placeholder="Email" name="email" required>
                <input type="password" class="input-field" placeholder="Create Password" name="password" required>
				<input type="password" class="input-field" placeholder="Confirm Password" name="confirm_password" required>
                <input type="checkbox" class="check-box"><span>I agree to the terms & conditions</span>
                <button type="submit" class="submit-btn" name="register">signup</button>
            </form>
        </div>
    </div>

    <script>
        var x = document.getElementById("login");
        var y = document.getElementById("register");
        var z = document.getElementById("btn");

        function signup() {
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "110px";
        }

        function login() {
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0px";
        }
    </script>
</body>


</html>