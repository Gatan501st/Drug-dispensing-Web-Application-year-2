
<?php
session_start();

require_once "connect2.php";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $full_name=$_POST['full_name'];
  $password = $_POST['password'];

  $result = $conn->query("SELECT `full_name`, `password` FROM `admin_page` WHERE `full_name` = '$full_name'");
  $row = mysqli_fetch_assoc($result);

  if ($_POST['password'] === $row["password"]) {
    // Set the name in the session
    $_SESSION['user'] = $row;
    
    // Redirect to the welcome page
    header('Location: test3.php');
    exit();
    
} else {
    echo 'Invalid password!';
}

}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Admin page</title>
</head>
<body>
<div class="container">
    <div class="title">Admin Login</div>
    <form method="POST">
        <label>Username:</label>
        <input type="text" name="username" required><br>
        <label>Password:</label>
        <input type="password" name="password" required><br>
        <input type="submit" name="submit" value="Login">
    </form>
    <button onclick="location.href='logout.php'">LOGOUT</button>
</body>
</html>
