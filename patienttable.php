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
       
       <th>patient ssn number </th>
         <th>address</th>
         <th>patient sickness</th>      
          
        
        
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
        $selectQuery = "SELECT * FROM patient_sickness";
        $result = mysqli_query($conn, $selectQuery);
  
        // Display the table
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                 <td><?php print $row['full_name'] ; ?></td> 
               
                <td><?php print $row['ssn_number']; ?></td>
                <td><?php print $row['address']; ?></td>
              
                <td><?php print $row['sickness_description'] ; ?></td>
                
              
                <td>  <a href="edit.php? ssn_number= <?php print $row["ssn_number"]; ?> " >prescribe </a></td>
              
          
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
  
   













