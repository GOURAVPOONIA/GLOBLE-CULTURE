<?php
$dbn_host = 'localhost'; // Define the database host
$db_user = 'root';      // Define the database username
$db_pass = '';          // Define the database password
$db_name = 'culture_exchange'; // Define the database name

// Database connection
$conn = mysqli_connect($dbn_host, $db_user, $db_pass, $db_name) or die(mysqli_connect_error());
$sql = 'SELECT * FROM events';
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$row = mysqli_fetch_array($result);
$sql = 'SELECT * FROM users';
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$row = mysqli_fetch_array($result);
$sql = 'SELECT * FROM events';
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$row = mysqli_fetch_array($result);

?>
