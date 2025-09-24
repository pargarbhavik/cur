<?php
session_start();

// Check if the user is logged in (you can redirect them to the login page if not)
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php"); // Redirect to your login page
    exit();
}

require 'config.php';

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = $_SESSION["user_id"];

// Query to retrieve user details based on the user_id from the session
$sql = "SELECT * FROM users WHERE id = $user_id";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $fullname = $row["fullname"];
    $email = $row["email"];
    $username = $row["username"];
} else {
    // Handle the case where the user with the given ID does not exist
    echo "User not found";
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
</head>
<body>
    <h2>Welcome, <?php echo $fullname; ?>!</h2>
    <p>Your User Details:</p>
    <ul>
        <li><strong>Full Name:</strong> <?php echo $fullname; ?></li>
        <li><strong>Email:</strong> <?php echo $email; ?></li>
        <li><strong>Username:</strong> <?php echo $username; ?></li>
    </ul>
    <a href="index.html">Home</a> <!-- Provide a link to logout if needed -->
</body>
</html>
