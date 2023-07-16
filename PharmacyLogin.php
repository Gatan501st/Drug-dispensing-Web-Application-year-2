
<?php
session_start();
// Check if the user is already logged in
if(isset($_SESSION['user_id'])) {
  // Redirect to the logged-in user's dashboard or homepage
  header("Location: welcomepharmacist.php");
  exit();
}

// Check if the login form is submitted
if(isset($_POST['submit'])) {
  // Simulate a database check for username and password
  $full_name = $_POST['full_name'];
  $password = $_POST['password'];

  // Your actual database validation logic should go here
  // For simplicity, this example uses hardcoded values
  $validUsername = 'full_name';
  $validPassword = 'password';

  if($username === $validUsername && $password === $validPassword) {
    // Authentication successful
    $_SESSION['user_id'] = 1; // Set the user's ID in the session
    header("Location: welcomepharmacist.html"); // Redirect to the dashboard or homepage
    exit();
  } else {
    // Invalid username or password
    $error = "Invalid username or password";
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
