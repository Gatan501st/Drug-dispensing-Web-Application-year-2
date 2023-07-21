<?php
// Start a new or resume an existing session
session_start();

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$database = "drug_dispensing_app";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = $_POST['username'];
    $password = $_POST['password'];

    // Fetch user from the database based on the provided username and password
    $selectQuery = "SELECT * FROM admin_page WHERE full_name = '$full_name' AND password = '$password'";
    $result = $conn->query($selectQuery);

    if ($result->num_rows === 1) {
        // Authentication successful, store username in a session variable and redirect to another site
        $_SESSION['username'] = $full_name;
        header('Location: test3.php');
        exit();
    } else {
        // Authentication failed, show an error message
        echo "Authentication failed! Incorrect username or password.";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Admin page</title>
</head>
<body>
<div class="container">
    <div class="title">Admin Login</div>
    <form method="POST">
        <label>Username:</label>
        <input type="text" name="username" required><br>
        <label>Password:</label>
        <input type="password" name="password" required><br>
        <input type="submit" name="submit" value="Login">
    </form>
    <button onclick="location.href='logout.php'">LOGOUT</button>
</body>
</html>
