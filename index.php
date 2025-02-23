<?php
include('db_connection.php'); // Include the database connection

// Fetch the latest 3 events
$query = "SELECT * FROM events ORDER BY event_date DESC LIMIT 3";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="G.avif" type="image/x-icon">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Global Culture Exchange Hub</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Header Section -->
    <header>
        <div class="navbar">
            <div class="logo">Global Culture Exchange Hub</div>
            <nav>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about_us.php">About</a></li>
                    <li><a href="login.html">Login</a></li>
                    <li><a href="register.html">Register</a></li>
                    

                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Section -->
    <section class="main-content">
        <div class="hero">
            <h1>Welcome to the Global Culture Exchange Hub</h1>
            <p>Explore, Learn, and Share Cultures from Around the World</p>
            <button onclick="window.location.href='register.html'">Join Us Now</button>
        </div>
        <div class="features">
            <div class="feature">
                <h2>Global Connections</h2>
                <p>Connect with people from different cultures around the world.</p>
            </div>
            <div class="feature">
                <h2>Learn & Share</h2>
                <p>Exchange knowledge and experiences to foster mutual understanding.</p>
            </div>
            <div class="feature">
                <h2>Events & Activities</h2>
                <p>Participate in global events and activities to celebrate diversity.</p>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2025 Global Culture Exchange Hub. All rights reserved.</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>

