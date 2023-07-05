<!DOCTYPE html>
<html>
<head>
  <title>admin table Operations</title>
  <style>
    table {
      border-collapse: collapse;
    }

    th, td {
      border: 1px solid black;
    }
  </style>
</head>
<body>
  <table id="Table">
    <thead>
      <tr>
        <th></th>
        <th></th>
        <th></th>
        <th>Actions</th>
      </tr>
    </thead>
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


 // Delete record
      if (isset($_GET['delete'])) {
        $ssn_number = $_GET['delete'];
        $deleteQuery = "DELETE FROM patients WHERE ssn_number = $ssn_number";
        mysqli_query($conn, $deleteQuery);
      }
          if (isset($_POST['update'])) {
        $full_name = $_POST['full_name'];
        $Email = $_POST['Email'];
        $ssn_number= $_POST['ssn_number'];
        $updateQuery = "UPDATE patients SET full_name = '$full_name', Email = '$Email', ssn_number = '$ssn_number'";
        mysqli_query($conn, $updateQuery);
      }
// Insert record
      if (isset($_POST['add'])) {
        $full_name= $_POST['newFirstName'];
        $Email = $_POST['newEmail'];

        $insertQuery = "INSERT INTO patients (ssn_number,full_name, Email) VALUES ('$ssn_number',$full_name', '$Email')";
        mysqli_query($conn, $insertQuery);
      }

// Fetch data from the "patients" table
$query = "SELECT * FROM patients";
$result = mysqli_query($conn, $query);


// Display the table
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ssn_number</th><th>full_name</th><th>Email</th></tr>";

    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {

        echo '<tr>';
    
        // Output the data for each column
        echo '<td>' . $row['ssn_number'] . '</td>';
        echo '<td>' . $row['full_name'] . '</td>';
        echo '<td>' . $row['Email'] . '</td>';
   
        // Add more table cells as needed
        
        echo '</tr>';
        }
    echo "</table>";
} else {
    echo "0 results";
}

// Close the database connection
$conn->close();
?>
</tbody>
  </table>
  
  <h2>Add New Record</h2>
  <form method="POST">
    <label>First Name: </label>
    <input type="text" name="new-FullName" required><br>
    <label>Email Address: </label>
    <input type="Email" name="newEmail" required><br>
    <input type="submit" name="add" value="Add">
  </form>

  <h2>Update Record</h2>
  <form method="POST">
    <label>New First Name: </label>
    <input type="text" name="firstName" required><br>
    <label>New Email Address: </label>
    <input type="Email" name="Email" required><br>
    <input type="submit" name="update" value="Update">
  </form>
</body>
</html>
