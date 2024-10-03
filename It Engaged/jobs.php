<?php
 session_start();
require 'database.php';
open_connection();
global $conn;

if (isset($_GET['message'])) {
    echo "<p style='color: green;'>" . htmlspecialchars($_GET['message']) . "</p>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Listings</title>
    <link rel="stylesheet" href="jobs.css">
    <script>
        function showJobDetails(jobId) {
            fetch(`job_details.php?job_id=${jobId}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('job-details').innerHTML = `
                        <h3>${data.company_name}</h3>
                        <p>Location: ${data.location}</p>
                        <p>Job Type: ${data.job_type}</p>
                        <p>Work Type: ${data.work_type}</p>
                        <button onclick="showApplicationForm(${data.id})">Apply</button>
                        <button>Save</button>
                    `;
                });
        }

        function showApplicationForm(jobId) {
            document.getElementById('job_id').value = jobId;
            document.getElementById('applicationForm').style.display = 'block';
        }
    </script>
</head>
<body>
<header>
    <div class="navbar">
        <div class="logo">
            <a href="#">Better Community</a>
        </div>
        <ul class="nav-links">
            <li><a href="homes.php">Home</a></li>
            <li><a href="#">Forum</a></li>
            <li><a href="#">Jobs</a></li>
            <li><a href="Events.php">Events</a></li> 
            <li><a href="counselling.php">Counselling</a></li>
            <li><a href="Feedback.php">Contact Us</a></li>
        </ul>
        <div class="header-right">
            <a href="login.php" class="btn-login">Log Out</a>
        </div>
    </div>
</header>
    <main>
        <div id="job-listings">
            <h2>Job Listings</h2>
            <ul>
            <?php
    $sql = "SELECT id, company_name, job_title, location, job_type, work_type, company_logo, job_description FROM jobs";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<li style="list-style: none; margin-bottom: 20px;">';
            echo '<div style="display: flex; align-items: center;">';
            echo '<img src="uploads/' . htmlspecialchars($row['company_logo']) . '" alt="Logo" style="width:200px;height:200px;margin-right:15px;">';
            echo '<div>';
            echo '<p style="margin: 0; font-weight: bold;">' . htmlspecialchars($row['company_name']) . '</p>';
            echo '<a href="#" onclick="showJobDetails(' . $row['id'] . ')" style="text-decoration: none; color: #4b0082;">' . htmlspecialchars($row['job_title']) . ' at ' . htmlspecialchars($row['company_name']) . '</a>';
            echo '</div>';
            echo '</div>';
            echo '</li>';
        }
    } else {
        echo "<p>No job listings available.</p>";
    }
?>
            </ul>
        </div>
        <div id="job-details">
            <h2>Job Details</h2>
            <script>
    function showJobDetails(jobId) {
        // Fetching job details from job-id.php (corrected endpoint)
        fetch(`job-id.php?id=${jobId}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data.error) {
                    alert(data.error);  // Alert the error message if job is not found
                } else {
                    document.getElementById('job-details').innerHTML = `
                        <h3>${data.company_name}</h3>
                        <p>Location: ${data.location}</p>
                        <p>Job Type: ${data.job_type}</p>
                        <p>Work Type: ${data.work_type}</p>
                        <p>${data.job_description}</p>
                        <button onclick="showApplicationForm(${data.id})">Apply</button>
                        <button onclick="saveJob(${data.id})">Save</button>
                    `;
                }
            })
            .catch(error => {
                console.error('Error fetching job details:', error);
            });
    }

    function showApplicationForm(jobId) {
        document.getElementById('job_id').value = jobId;
        document.getElementById('applicationForm').style.display = 'block';
    }

    function saveJob(jobId) {
        alert(`Job ${jobId} has been saved!`);
    }
</script>        </div>
    </main>

    <div id="applicationForm" style="display:none;">
        <form action="submit_application.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="job_id" id="job_id">
            <label for="name">Name:</label>
            <input type="text" name="name" required>
            <label for="email">Email:</label>
            <input type="email" name="email" required>
            <label for="phone">Phone:</label>
            <input type="tel" name="phone" required>
            <label for="cv">CV:</label>
            <input type="file" name="cv" accept=".pdf,.doc,.docx">
            <label for="resume">Resume:</label>
            <input type="file" name="resume" accept=".pdf,.doc,.docx" required>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
<?php close_connection(); ?>
