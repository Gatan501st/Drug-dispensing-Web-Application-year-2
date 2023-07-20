


<?php
require_once "connect2.php";

if (isset($_GET["ssn_number"])) {

    $ssn_number = $_GET["ssn_number"];

    // Use prepared statements to prevent SQL injection
    $sql = "DELETE FROM pharmacy WHERE ssn_number = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $ssn_number);

    if ($stmt->execute()) {
        // Record successfully deleted, redirect to the desired page
        header("Location: test3.php");
        exit();
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
