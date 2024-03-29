<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "drug_dispensing_app";

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] === "POST") {
    // Rest of the code to handle the registration process 
    $full_name = $_POST['full_name'];
    $ssn_number = $_POST['ssn_number'];
    $Email = $_POST['Email'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];
    $password = $_POST['password'];
    $contract_no = $_POST['contract_no'];

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO pharmacy (full_name, ssn_number, Email, address, phone_number, password, contract_no) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sississ", $full_name, $ssn_number, $Email, $address, $phone_number, $password, $contract_no);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Registration successful.";
    } else {
        echo "Error during registration: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();

    // Create a redirection code
    $redirectUrl = "PharmacyLogin.php";

    // Redirect the user to the login page
    ob_start(); // Start output buffering
    header("Location: $redirectUrl"); // Perform the redirect
    ob_end_flush(); // Send the output and redirect
    exit(); // Stop script execution
}
?>
