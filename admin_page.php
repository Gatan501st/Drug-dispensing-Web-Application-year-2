<?php
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
    $full_name = $_POST['full_name'];
    $password = $_POST['password'];

    // Fetch user from the database based on the provided username
    $selectQuery = "SELECT * FROM admin_page WHERE full_name = '$full_name'";
    $result = $conn->query($selectQuery);

    if ($result->num_rows === 1) {
        // User found, check the password
        $user = $result->fetch_assoc();
        $hashedPassword = $user['password'];

        // Verify the password using password_verify function
        if (password_verify($password, $hashedPassword)) {
            // Password is correct, authentication successful
            echo "Authentication successful!";
            // Perform further actions after successful authentication
        } else {
            // Password is incorrect
            echo "Authentication failed! Incorrect password.";
        }
    } else {
        // User not found
        echo "Authentication failed! User not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>admin page </title>
</head>
<body>
<div class ="container">
            <div class ="title">Admin Login</div>
    <form method="POST">
        <label>Username:</label>
        <input type="text" name="username" required><br>
        <label>Password:</label>
        <input type="password" name="password" required><br>
        <input type="submit" name="submit" value="Login">
    </form>
    <button onclick="location.href='logout.php'">LOGOUT</button>
      <button onclick="location.href='admintable.php'" type="button">Go to Prescription Page</button>
</body>
</html>
