<!DOCTYPE html>
<html>
<head>
  <title>Table with CRUD Operations</title>
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
  <table id="myTable">
    <thead>
      <tr>
        <th>SSN</th>
        <th>First Name</th>
        <th>Email Address</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      // Database connection details
      $servername = "localhost";
      $username = "root";
      $password = "";
      $database = "drugdispensing";

      // Create connection
      $conn = new mysqli($servername, $username, $password, $database);

      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      // Delete record
      if (isset($_GET['delete'])) {
        $SSN = $_GET['delete'];
        $deleteQuery = "DELETE FROM patients WHERE SSN = $SSN";
        mysqli_query($conn, $deleteQuery);
      }

      // Update record
      if (isset($_POST['update'])) {
        $firstName = $_POST['firstname'];
        $email = $_POST['emailaddress'];
        $SSN = $_POST['SSN'];
        $updateQuery = "UPDATE patients SET firstname = '$firstName', emailaddress = '$email', SSN = '$SSN'";
        mysqli_query($conn, $updateQuery);
      }

      // Insert record
      if (isset($_POST['add'])) {
        $firstName = $_POST['newFirstName'];
        $email = $_POST['newEmail'];

        $insertQuery = "INSERT INTO patients (SSN,firstname, emailaddress) VALUES ('$SSN',$firstName', '$email')";
        mysqli_query($conn, $insertQuery);
      }

      // Fetch data from the "patients" table
      $selectQuery = "SELECT * FROM patients";
      $result = mysqli_query($conn, $selectQuery);

      // Display the table
      if ($result->num_rows > 0) {
          // Output data of each row
          while ($row = mysqli_fetch_assoc($result)) {
              echo '<tr>';
              echo '<td>' . $row['SSN'] . '</td>';
              echo '<td>' . $row['firstname'] . '</td>';
              echo '<td>' . $row['emailaddress'] . '</td>';
              echo '</tr>';
         
            }
      } else {
          echo "<tr><td colspan='4'>0 results</td></tr>";
      }

      // Close the database connection
      $conn->close();
      ?>
    </tbody>
  </table>
  
  <h2>Add New Record</h2>
  <form method="POST">
    <label>First Name: </label>
    <input type="text" name="newFirstName" required><br>
    <label>Email Address: </label>
    <input type="email" name="newEmail" required><br>
    <input type="submit" name="add" value="Add">
  </form>

  <h2>Update Record</h2>
  <form method="POST">
    <label>New First Name: </label>
    <input type="text" name="firstName" required><br>
    <label>New Email Address: </label>
    <input type="email" name="email" required><br>
    <input type="submit" name="update" value="Update">
  </form>
</body>
</html>
