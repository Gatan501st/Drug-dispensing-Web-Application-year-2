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
$drug_name=$_POST['drug_name'];
$drug_ID=$_POST['drug_ID'];
$chemical_composition=$_POST['chemical_composition'];
$description=$_POST['description'];
$price=$_POST['price'];
$stock=$_POST['stock'];

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("insert into medicine(drug_name,drug_ID,chemical_composition,description,price,stock )values(?,?,?,?,?,?)");
    $stmt->bind_param("ssssii",$drug_name,$drug_ID,$chemical_composition,$description,$price,$stock);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Registration successful.";
    } else {
        echo "Error during registration: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();
}


// Close the database connection


   



$conn->close();

?>