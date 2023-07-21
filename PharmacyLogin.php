<?php
session_start();

require_once "connect2.php";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $full_name=$_POST['full_name'];
  $password = $_POST['password'];

  $result = $conn->query("SELECT `full_name`, `password` FROM `pharmacy` WHERE `full_name` = '$full_name'");
  $row = mysqli_fetch_assoc($result);

  if ($_POST['password'] === $row["password"]) {
    // Set the name in the session
    $_SESSION['user'] = $row;
    
    // Redirect to the welcome page
    header('Location: welcomepharmacy.php');
    exit();
    
} else {
    echo 'Invalid password!';
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
    <form  action ='welcomepharmacist.php' method="POST" >

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
