<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    if (!empty($name) && !empty($email) && !empty($phone)) {

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "engaged";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Insert data into the database
        $sql = "INSERT INTO registrations (name, email, phone) VALUES ('$name', '$email', '$phone')";

        if ($conn->query($sql) === TRUE) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close the connection
        $conn->close();
    } else {
        echo "Please fill out all fields.";
    }
} else {
    echo "Invalid request method.";
}
?>
