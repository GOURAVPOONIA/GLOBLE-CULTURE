<?php
// Database connection
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'culture_exchange';

$conn = new mysqli($host, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user count
$userQuery = "SELECT COUNT(*) AS user_count FROM users";
$userResult = $conn->query($userQuery);
$userData = $userResult->fetch_assoc();

// Fetch event count
$eventQuery = "SELECT COUNT(*) AS event_count FROM events";
$eventResult = $conn->query($eventQuery);
$eventData = $eventResult->fetch_assoc();

// Output the data as JSON
echo json_encode([
    'user_count' => $userData['user_count'],
    'event_count' => $eventData['event_count']
]);

$conn->close();
?>
