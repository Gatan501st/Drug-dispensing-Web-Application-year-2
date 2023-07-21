<!DOCTYPE html>
<html>
<head>

</head>
<body>
<table>
    <caption>
        patient details.
    </caption>
    <tr> 
        
       
        <th>full_name</th>
       <th>Email </th> 
       <th>patient ssn number </th>
         <th>address</th>   
          <th>Phone Number</th>
         <th>Password</th>
        
        
        <th>Actions</th>
        <th>Actions</th>
    </tr>
    <tbody>
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
        $selectQuery = "SELECT * FROM patients";
        $result = mysqli_query($conn, $selectQuery);
  
        // Display the table
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                 <td><?php print $row['full_name'] ; ?></td> 
                <td><?php print $row['Email']; ?></td>
                <td><?php print $row['ssn_number']; ?></td>
                <td><?php print $row['address']; ?></td>
                <td><?php print $row['password'] ; ?></td>
                <td><?php print $row['phone_number'] ; ?></td>
                
              
                <td>  <a href="edit.php? ssn_number= <?php print $row["ssn_number"]; ?> " >Edit </a></td>
                <td>  <a href="deletepatient.php? ssn_number= <?php print $row["ssn_number"]; ?> " >Delete </a></td>
            </tr>
            <?php
            } 
        } else {
                echo "0 results";
                }

        
  ?>



</table>

<button><a href="patientform.html">Add patient
</a></button>

    </body>
    </html>
  
    <?php



// Check if the user ID is provided in the URL
if (isset($_GET['ssn_number'])) {
    $ssn_number = $_GET['ssn_number'];

    // Delete the user from the database
    $deleteQuery = "DELETE FROM patients WHERE ssn_number = $ssn_number";
    $result = mysqli_query($conn, $deleteQuery);

    // Check if the deletion was successful
    if ($result) {
        echo "User deleted successfully.";
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }
}











