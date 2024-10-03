<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "engaged";
$conn=null;

function open_connection(){
	global $servername,$username,$password,$dbname;
	global $conn;
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
}
function active($currect_page){
    $url = str_replace(".php","", basename($_SERVER['PHP_SELF'])); 
    if($currect_page == $url){
        echo 'active'; 
    }
}

function close_connection(){
	global $conn;
	if(isset($conn)){
	   $conn->close();
	}
}

function select_rows($sql){
	global $conn;
	
	$rows=array();
	
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($rows, $row);
		}
	} 
	return $rows;
}
//====================================================================
function get_users(){
    open_connection();

	$sql = "SELECT ID,Name, email FROM users";
	$rows=select_rows($sql);
	
	close_connection();
     
	return $rows; 
}

function get_events(){
	open_connection();

	$sql = "SELECT event_id,event_date,location,description FROM events";
	$rows=select_rows($sql);
	
	close_connection();
     
	return $rows; 
}
function get_graduation(){
    open_connection();

	$sql = "SELECT id, date, time, location, description FROM graduation";
	
	close_connection();
     
	return $HTTP_RAW_POST_DATA; 
}

function get_internships(){
	open_connection();

	$sql = "SELECT internship_id,title,company,location,description FROM internships";
	$rows=select_rows($sql);
	
	close_connection();
     
	return $rows; 
}   

	function get_jobs(){
		open_connection();
	
		$sql = "SELECT job_id,title,company,location,description, posted_by FROM jobs";
		$rows=select_rows($sql);
		
		close_connection();
		 
		return $rows; 
 }

 // Function to insert registration data
function event($name, $email, $phone) {
    global $conn;

    $stmt = $conn->prepare("INSERT INTO registration (Name, Email, Phone) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $phone);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Assuming the database connection is already open and stored in $conn

// Get the form data
function Jobs(){
	$job_id = $_POST['job_id'];
$applicant_name = $_POST['applicant_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

// Prepare the SQL statement
$stmt = $conn->prepare("INSERT INTO applications (job_id, applicant_name, email, phone) VALUES (?, ?, ?, ?)");

// Bind parameters (s stands for string, i for integer, etc.)
$stmt->bind_param("isss", $job_id, $applicant_name, $email, $phone);

// Execute the statement
if ($stmt->execute()) {
    echo "Application submitted successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement
$stmt->close();


}


?>

