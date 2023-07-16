<?php
$full_name ="full_name";
$password ="password";
session_start();
if (!isset($_SESSION['full_name'])){
  echo "<h1>Welcome " .$_SESSION['$full_name']."</h1>";

}
else{
  if ($_POST['$full_name']==$full_name && $_POST['$password']==$password){
    $_SESSION['$full_name']=$full_name;
    echo"location.href = 'welcome";

  }
  else{
    echo"<script>alert('username or password incorrect!')</scrpt>";
  }
}

?>


<html>
  <head>
    <title>welcome to the dawa ke page</title>
  </head>
  <body>
  <?php
// Set session variables


echo "Session variables are set.";

    echo "welcome  patient" . $_SESSION["full_name"];
    ?>
  </body>
</html>
