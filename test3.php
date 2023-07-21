<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet"href="table.css">
</head>
<body>








<table>
    <caption>
        Doctor details.
    </caption>
    <tr> 
    <?php
echo "Welcome: " . $username;
?>
       
        <th>full_name</th>
       <th>Email </th> 
       <th>doctor ssn number </th>
         <th>address</th>   
          <th>Phone Number</th>
         <th>Password</th>
        <th>Specialty</th>
        
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
        $selectQuery = "SELECT * FROM doctors";
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
                <td><?php print $row['specialty'] ; ?></td>
              
                <td>  <a href="edit.php? ssn_number= <?php print $row["ssn_number"]; ?> " >Edit </a></td>
                <td>  <a href="deletedoctor.php? ssn_number= <?php print $row["ssn_number"]; ?> " >Delete </a></td>
            </tr>
            <?php
            } 
        } else {
                echo "0 results";
                }

        
  ?>



</table>

<button><a href="doctorsignup.html">Add doctor
</a></button>

    </body>
    </html>
  
    <?php



// Check if the user ID is provided in the URL
if (isset($_GET['ssn_number'])) {
    $ssn_number = $_GET['ssn_number'];

    // Delete the user from the database
    $deleteQuery = "DELETE FROM doctors WHERE ssn_number = $ssn_number";
    $result = mysqli_query($conn, $deleteQuery);

    // Check if the deletion was successful
    if ($result) {
        echo "User deleted successfully.";
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet"href="table.css">
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
                
              
                <td>  <a href="editpatient.php? ssn_number= <?php print $row["ssn_number"]; ?> " >Edit </a></td>
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

// Close the database connection
mysqli_close($conn);
?>



<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet"href="table.css">
</head>
<body>
<table>
    <caption>
        pharmacy details.
    </caption>
    <tr> 
        
       
        <th>full_name</th>
       <th>Email </th> 
       <th>pharmacist ssn number </th>
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
    
        $selectQuery = "SELECT * FROM pharmacy";
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

<button><a href="pharmacy_info.html">Add pharmacist
</a></button>
<button><a href="logout.php">LOGOUT </a></button>

    </body>
    </html>
  
    <?php



// Check if the user ID is provided in the URL
if (isset($_GET['ssn_number'])) {
    $ssn_number = $_GET['ssn_number'];

    // Delete the user from the database
    $deleteQuery = "DELETE FROM pharmacy WHERE ssn_number = $ssn_number";
    $result = mysqli_query($conn, $deleteQuery);

    // Check if the deletion was successful
    if ($result) {
        echo "User deleted successfully.";
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>




$username = $_SESSION['user']['full_name'];
?>

<!DOCTYPE html>
<html>
<head>
   
</head>
<body>



<form action="logout.php" method="post">
    <input type="submit" value="Logout">
</form>



</body>
</html>

