<?php
session_start();

$username = $_SESSION['username']['full_name'];

?>
<html>
  <head>
    <link rel="stylesheet " href="style.css" />
    <title>welcome pharmacist</title>
  </head>
  <body>
 
  
  <div class ="container">
    <p>welcome to the pharmacist page</p>
    <h1>
    <?php
    echo "Welcome Pharmacist: " . $username;
   ?></h1>
    <div>
      <button onclick="location.href='logout.php'">LOGOUT</button>
      <button onclick="location.href='prescribe.html'" type="button">create Prescription, Page</button>
      <button onclick="location.href='medicine_registry.php'" type="button">view Prescription, Page</button>
  </div>
</div>
  </body>
</html>
