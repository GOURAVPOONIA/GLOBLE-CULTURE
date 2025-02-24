<?php
$dbn_host = 'localhost'; // Define the database host
$db_user = 'root';      // Define the database username
$db_pass = '';          // Define the database password
$db_name = 'culture_exchange'; // Define the database name

// Database connection
$conn = mysqli_connect($dbn_host, $db_user, $db_pass, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch data from the 'events' table
$sql_events = 'SELECT * FROM events';
$result_events = mysqli_query($conn, $sql_events);

if (!$result_events) {
    die("Query failed: " . mysqli_error($conn));
}

// Fetch data from the 'users' table
$sql_users = 'SELECT * FROM users';
$result_users = mysqli_query($conn, $sql_users);

if (!$result_users) {
    die("Query failed: " . mysqli_error($conn));
}

// Fetch the first row from events
$row_events = mysqli_fetch_array($result_events, MYSQLI_ASSOC);

// Fetch the first row from users
$row_users = mysqli_fetch_array($result_users, MYSQLI_ASSOC);

mysqli_close($conn);
?>
