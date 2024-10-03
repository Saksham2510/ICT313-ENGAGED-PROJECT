<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Better Community - Homepage</title>
    <link rel="stylesheet" href="homes.css">
</head>
<body>

    <!-- Navigation Bar -->
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="#">Better Community</a>
            </div>
            <ul class="nav-links">
                <li><a href="#">Home</a></li>
                <li><a href="jobs.php">Jobs & Internships</a></li>
                <li><a href="Events.php">Events</a></li>
                 <li><a href="counselling.php">Counselling</a></li>
                <li><a href="feedback.php">Contact Us</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Feedback</a></li>
            </ul>
            <div class="header-right">
                <a href="login.php" class="btn-logout">Log Out</a>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Welcome to Better Community</h1>
            <p>A place where students connect, share, and grow together.</p>
            <a href="#" class="btn-hero">Join Us Now</a>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-links">
                <a href="#">Privacy Policy</a> | 
                <a href="#">Terms of Service</a>
                | <a href="#">Feedback</a>
            </div>
            <p>&copy; <?php echo date("Y"); ?> Better Community. All Rights Reserved.</p>
        </div>
    </footer>

</body>
</html>
