<?php
require 'database.php';

session_start();

// Open the database connection
open_connection();

$sql = "SELECT * FROM registration";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Name: " . $row["Name:"] . "Email: " . $row["Email"] . " - Phone: " . $row["Phone"] . "<br>";
    }
} 
$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error);
}

if ($result->num_rows > 0) {

}


// Close the database connection
close_connection();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="events.css"> 
    <title>Events & Graduation</title>
</head>
<body>
    <header>
    <nav class="navbar">
            <div class="logo">
                <a href="#">Better Community</a>
            </div>
<ul class="nav-links">
            <li><a href="homes.php">Home</a></li>
            <li><a href="forum.php">Forum</a></li>
            <li><a href="jobs.php">Jobs</a></li>
            <li><a href="#" class="active">Events</a></li>
            <li><a href="counselling.php">Counselling</a></li>
            <div class=" search-bar-container">
        <form action="Events.php" method="post">
        <input type ="text" place holder="Search...." class="Search-bar">
        <button class="search-button">Search</button>
        </form>
        </ul>

</header>
        <div class="main-content">
            <div class="left-section">
                <h3>Upcoming Events</h3>
                <div class="calendar-header">
                    <button id="prev-month" class="nav-button">Previous</button>
                    <span id="current-month" class="month-label"></span>
                    <button id="next-month"class="nav-button">Next</button>
                </div>
                <div class="calendar" id="calendar">
                    <div class="day-name">Sun</div>
                    <div class="day-name">Mon</div>
                    <div class="day-name">Tue</div>
                    <div class="day-name">Wed</div>
                    <div class="day-name">Thu</div>
                    <div class="day-name">Fri</div>
                    <div class="day-name">Sat</div>

                    <div class="empty"></div>
                    <div class="empty"></div>
                    <div class="day" data-event="Tech Giants, Melbourne">1</div>
                    <div class="day">2</div>
                    <div class="day">3</div>
                    <div class="day" data-event="Event 2 location sydney">4</div>
                    <div class="day">6</div>
                    <div class="day">7</div>
                    <div class="day">8</div>
                    <div class="day">9</div>
                    <div class="day">10</div>
                    <div class="day">11</div>
                    <div class="day">12</div>
                    <div class="day">13</div>
                    <div class="day">14</div>
                    <div class="day">15</div>
                    <div class="day">16</div>
                    <div class="day">17</div>
                    <div class="day">18</div>
                    <div class="day">19</div>
                    <div class="day">20</div>
                    <div class="day">21</div>
                    <div class="day">22</div>
                    <div class="day">23</div>
                    <div class="day">24</div>
                    <div class="day">25</div>
                    <div class="day">26</div>
                    <div class="day">27</div>
                    <div class="day">28</div>
                    <div class="day">29</div>
                    <div class="day">30</div>
                    <div class="day">31</div>
                </div>
            </div>

            <div class="right-section">
                <h3>Events</h3>
                <div class="events-box">Events Registration </div>
                <div class="events-box">Events 
                <div class="dropdown" id="eventDropdown">
                <ul>
                <li>Event 1: 10 AM - 12 PM</li>
                <li>Event 2: 2 PM - 4 PM</li>
            </ul>
                </div>
                </div>
            </div>
            

            <div id="eventRegistrationForm" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Event Registration</h2>
        <form action="register_event.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" required>

            <input type="submit" value="Register">
        </form>
    </div>
</div>


        </div>

        <div class="bottom-nav">
            <a href="#">About</a>
            <a href="Feedback.php">Contact</a>
            <a href="#">Terms of Use</a>
        </div>
    </div>

    <script src="Jss.js"></script> 
</body>
</html>
