<?php
session_start();
$host = 'localhost';
$username = 'root';  // Database username
$password = '';      // Database password
$dbname = 'culture_exchange';

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Sanitize inputs to prevent SQL injection
    $user = mysqli_real_escape_string($conn, $user);
    $pass = mysqli_real_escape_string($conn, $pass);

    // Check if user exists
    $sql = "SELECT * FROM users WHERE username = '$user'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User exists, verify password
        $row = $result->fetch_assoc();
        if (password_verify($pass, $row['password'])) {
            // Password is correct, start session
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            header('Location: dashboard.php');  // Redirect to dashboard
        } else {
            // Incorrect password
            echo "<script>alert('Invalid username or password');</script>";
        }
    } else {
        // User doesn't exist
        echo "<script>alert('Invalid username or password');</script>";
    }
}

$conn->close();
?>
