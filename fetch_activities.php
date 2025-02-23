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

// Fetch recent activities
$query = "SELECT name FROM activities ORDER BY created_at DESC LIMIT 5";
$result = $conn->query($query);

$activities = [];
while ($row = $result->fetch_assoc()) {
    $activities[] = $row;
}

// Output the data as JSON
echo json_encode([
    'activities' => $activities
]);

$conn->close();
?>
