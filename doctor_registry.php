<?php
$host = "localhost";
$username = "root";
$db_password = "";
$database = "drug_dispensing_app";

// Create a database connection
$conn = new mysqli($host, $username, $db_password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$error = 1;
if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] === "POST") {
    // Rest of the code to handle the registration process
    $full_name = $_POST['full_name'];
    $Email = $_POST['Email'];
    $ssn_number = $_POST['ssn_number'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];
    $password = $_POST['password'];
    $specialty = $_POST['specialty'];
    

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO doctors (full_name, Email, ssn_number, address, phone_number, specialty, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssiss", $full_name, $Email, $ssn_number, $address, $phone_number, $specialty, $password);

    // Execute the statement
    if ($stmt->execute()) {
        $error = 0;
    } else {
        echo "Error during registration: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();

    // Create a redirection code
    header('Location: doctorslogin.php');
    exit();
}

// Close the database connection
$conn->close();
?>
