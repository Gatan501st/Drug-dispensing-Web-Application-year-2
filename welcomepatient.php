<?php
session_start();

$username = $_SESSION['user']['full_name'];

?>



<html>
  <head>
    <title>welcome to the dawa ke page</title>
  </head>
  <body>
  <h1>
    <?php
    echo "Welcome: " . $username;
   ?>
   </h1>

<div>
<button onclick="location.href='logout.php'">LOGOUT</button>
<button onclick="location.href='patientsickness.html'" type="button">Go to Patient sickness Page</button>

</div>
  </body>

</html>
