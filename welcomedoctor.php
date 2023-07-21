<?php
session_start();

$username = $_SESSION['username']['full_name'];

?>



<html>
  <head>
  <link rel="stylesheet " href="style.css" />
    <title>welcome to the dawa ke page</title>
  </head>
  <body>
  <div class ="container">
  <h1>
    <?php
    echo "Welcome: " . $username;
   ?>
   </h1>

<div>
<button onclick="location.href='logout.php'">LOGOUT</button>
<button onclick="location.href='patienttable.php'" type="button">Go to Patient sickness Page</button>

</div>
  </body>

</html>
