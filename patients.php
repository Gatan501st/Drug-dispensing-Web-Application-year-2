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
    $full_name=$_POST['full_name'];
$Date_of_birth=$_POST['Date_of_birth'];
$ssn_number=$_POST['ssn_number'];
$Email=$_POST['Email'];
$address=$_POST['address'];
$phone_number=$_POST['phone_number'];
$password=$_POST['password'];
$gender=$_POST['gender'];
$method_of_payment=$_POST['method_of_payment'];

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("insert into patients(full_name,Date_of_Birth,ssn_number,Email,address,phone_number,password,gender,method_of_payment )values(?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssisss",$full_name,$Date_of_birth,$ssn_number,$Email,$address,$phone_number,$password,$gender,$method_of_payment);

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


    header('Location: patientLogin.php') or die ("failed");



$conn->close();

?>