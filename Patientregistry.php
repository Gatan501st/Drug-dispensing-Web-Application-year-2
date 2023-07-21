<?php
$hostname="localhost";
$username="root";
$password="";
$dbname="drug_dispensing_tool";
//Connect to the database
$connection=mysqli=connect($hostname, $username,$password,$dbname);
//Check the connection
if(!$connection){
    die('Database connection failed:' .mysqli_connect_error());
}
if (isset($_POST['submit_patient_registration'])) {
    $registerPatient = $_POST['register_patient'];
    $dosage = $_POST['dosage'];

    // Fetch medicine details
    $prescribedMedicine = null;
    foreach ($medicines as $medicine) {
        if ($medicine['name'] === $selectedMedicine) {
            $prescribedMedicine = $medicine;
            break;
        }
    }
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $contact = $_POST['contact'];

        // Display the entered information
        echo '<h2>Entered Information:</h2>';
        echo '<p>Name: ' . htmlspecialchars($name) . '</p>';
        echo '<p>Age: ' . htmlspecialchars($age) . '</p>';
        echo '<p>Gender: ' . htmlspecialchars($gender) . '</p>';
        echo '<p>Contact Information: ' . htmlspecialchars($contact) . '</p>';
        echo '<p>SSN Number:' .htmlspecialchars($ssn_number) .'<p>';
    }
    } else {
        echo '<p>Selected medicine not found.</p>';
    }

?>
