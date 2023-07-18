<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
  }

  // Update record
  if (isset($_POST['update'])) {
    $ssn_number = $_POST['ssn_number'];
    $newFirstName = $_POST['firstName'];
    $newEmail = $_POST['Email'];

    $updateQuery = "UPDATE patients SET full_name = '$newFirstName', Email = '$newEmail' WHERE ssn_number = '$ssn_number'";
    mysqli_query($conn, $updateQuery);
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
  }

  // Fetch data from the "patients" table
  $query = "SELECT * FROM patients";
  $result = mysqli_query($conn, $query);
}
?>

<!DOCTYPE html>
<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,regular,500,600,700,800,900,100italic,200italic,300italic,italic,500italic,600italic,700italic,800italic,900italic" rel="stylesheet" />
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
      if (isset($result) && $result->num_rows > 0) {
          echo "<table>";
          echo "<tr><th>ssn_number</th><th>full_name</th><th>Email</th><th>Actions</th></tr>";

          // Output data of each row
          while ($row = mysqli_fetch_assoc($result)) {
              echo '<tr>';
          
              // Output the data for each column
              echo '<td>' . $row['ssn_number'] . '</td>';
              echo '<td>' . $row['full_name'] . '</td>';
              echo '<td>' . $row['Email'] . '</td>';

              // Add delete button with a link to delete the record
              echo '<td><a href="?delete=' . $row['ssn_number'] . '">Delete</a></td>';
              
              echo '</tr>';
          }
          echo "</table>";
      } else {
          echo "0 results";
      }
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
    <label>SSN Number: </label>
    <input type="text" name="ssn_number" required><br>
    <label>New First Name: </label>
    <input type="text" name="firstName" required><br>
    <label>New Email Address: </label>
    <input type="Email" name="Email" required><br>
    <input type="submit" name="update" value="Update">
  </form>
</body>
</html>
