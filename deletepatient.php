


<?php
    require_once "connect2.php";

    if(isset($_GET["ssn_number"])){

        $ssn_number = $_GET["ssn_number"];
        $sql = "DELETE FROM patients WHERE ssn_number='$ssn_number'";

        if ($conn->query($sql) === TRUE) {
            header("Location: test3.php");
            exit();
        } else {
          echo "Error deleting record: " . $conn->error;
        }
        
        $conn->close();
    }




?>