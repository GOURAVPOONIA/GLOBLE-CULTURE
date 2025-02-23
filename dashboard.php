<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.html'); // Redirect to login if not logged in
    exit;
}

$host = 'localhost';
$username = 'root'; // Database username
$password = ''; // Database password
$dbname = 'culture_exchange';

// Create a connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the logged-in user's information from the database
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id = $user_id";
$result = $conn->query($sql);
$user_data = $result->fetch_assoc();

// Fetch recent activities
$activity_sql = "SELECT * FROM activities ORDER BY created_at DESC LIMIT 5";
$activities_result = $conn->query($activity_sql);

// Fetch upcoming events
$event_sql = "SELECT * FROM events ORDER BY created_at DESC LIMIT 5";
$events_result = $conn->query($event_sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="G.avif" type="image/x-icon">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Global Culture Exchange Hub</title>
    <link rel="stylesheet" href="style.css">
    <script src="dashboard.js" defer></script>
</head>
<body>

    <!-- Sidebar -->
    <nav class="sidebar">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="contact_us.php">Messages</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <header>
            <h1>Welcome, <?php echo htmlspecialchars($user_data['username']); ?>!</h1>
        </header>

        <div class="content-container">
            <div class="profile">
                <h2>Profile Information</h2>
                <p><strong>Username:</strong> <?php echo htmlspecialchars($user_data['username']); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($user_data['email']); ?></p>
                <p><strong>Account Created:</strong> <?php echo $user_data['created_at']; ?></p>
            </div>

            <div class="statistics">
                <div class="stat-box">
                    <h2>Recent Activities</h2>
                    <ul>
                        <?php while ($activity = $activities_result->fetch_assoc()) { ?>
                            <li><?php echo htmlspecialchars($activity['name']); ?></li>
                        <?php } ?>
                    </ul>
                </div>

                <div class="stat-box">
                    <h2>Upcoming Events</h2>
                    <ul>
                        