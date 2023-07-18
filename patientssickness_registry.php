<?php 
$host = "localhost";
$username = "root";
$password = "";
$database = "drug_dispensing_app";

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] === "POST") {
    // Rest of the code to handle the registration process 
    $full_name = $_POST['full_name'];
    $ssn_number = $_POST['ssn_number'];
    $sickness_description = $_POST['sickness_description'];

    
    $stmt = $conn->prepare("INSERT INTO patient_sickness (full_name, ssn_number, sickness_description) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $full_name, $ssn_number, $sickness_description);
    
    // Execute the statement
    if ($stmt->execute()) {
        echo "Registration successful.";
    } else {
        echo "Error during registration: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();
}
?>
