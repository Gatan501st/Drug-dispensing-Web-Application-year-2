<?php
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Connect to the database
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "drug_dispensing_app";
    
    try {
        $db = new PDO("mysql:host=$host;database=$database", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Retrieve the user's password from the database
        $stmt = $db->prepare('SELECT password FROM pharmacy WHERE full_name = :full_name');
        $stmt->execute(['username' => $_POST['username']]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Check if the password is correct
        if ($row && password_verify($_POST['password'], $row['password'])) {
            // Set the full name in the session
            $_SESSION['full_name'] = $_POST['full_name'];
            
            // Redirect to the home page
            header('Location: welcomepharmacist.html');
            exit();
        } else {
            echo 'Invalid username or password!';
        }
    } catch (PDOException $e) {
        echo 'Database connection error: ' . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>pharmacy Login</title>
    <link rel="stylesheet " href="style.css">
  </head>
  <body>
    <form  action ='pharmacy_registry.php' method="POST" >

      <div>
        <label for="pharmacist name ">pharmacist name</label>
        <input type="text" name="full_name" />

        <div>
          <label for="ssn number">ssn number</label>
          <input type="number" name="ssn_number" />
        </div>

        <div>
        <span class="details"> Phone Number</span>
        <input
          type="tell"
          placeholder="enter a number"
          name="phone_no"
          required
        />
      </div>
        <div>
          <label for="password">password</label>
          <input type="password" name="password" />
        </div>
      

      <a href="">forgot password</a>
      <div>
        <input type="SUBMIT" value="Submit" />

        <input type="RESET" />
      </div>
    </form>
  </body>
</html>
