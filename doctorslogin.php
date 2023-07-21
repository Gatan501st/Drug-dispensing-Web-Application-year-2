<?php
session_start();

require_once "connect2.php";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $full_name=$_POST['full_name'];
  $password = $_POST['password'];

  $result = $conn->query("SELECT `full_name`, `password` FROM `doctors` WHERE `full_name` = '$full_name'");
  $row = mysqli_fetch_assoc($result);

  if ($_POST['password'] === $row["password"]) {
    // Set the name in the session
    $_SESSION['username'] = $row;
    
    // Redirect to the welcome page
    header('Location: welcomedoctor.php');
    exit();
    
} else {
    echo 'Invalid password!';
}

}

?>


<!DOCTYPE html>

<html>
  <head>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,regular,500,600,700,800,900,100italic,200italic,300italic,italic,500italic,600italic,700italic,800italic,900italic" rel="stylesheet" />
    <link rel="stylesheet " href="style.css">
    <meta charset="UTF-8">
    <title>doctor login</title>
  </head>
  <body>
    <div class ="container">
      <div class ="title">doctor login</div>
    <form action="" method ="post">

      <div class="User-details">
        <div class="input-box">
          <span class="details"> Full Name</span>
          <input type="text" placeholder="enter your name" name="full_name" required>
        </div>

        <div class="input-box">
          <span class="details">SSN Number</span>
          <input type="text" placeholder="enter your number " name="ssn_number" required>
        </div>

        <div class="input-box">
          <span class="details">Password</span>
          <input type="password"placeholder="Enter a Password"name="password" required autocomplete  maxlength="8" >
        </div>

      

      <a href="">forgot password</a>
      <div>
        <input type="SUBMIT"  value="Submit"/>

        <input type="RESET" />
      </div>

    </form>
  </body>
</html>
