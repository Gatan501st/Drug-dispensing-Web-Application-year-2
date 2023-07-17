<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "drug_dispensing_app";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the table and ID are provided
if (isset($_POST["patients"]) && isset($_POST["id"])) {
    $patients = $_POST["patients"];
    $id = $_POST["id"];

    // Delete the row from the table
    $sql = "DELETE FROM $patients WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Row deleted successfully.";
    } else {
        echo "Error deleting row: " . $conn->error;
    }
} else {
    echo "Invalid table or ID.";
}

$conn->close();
?>
