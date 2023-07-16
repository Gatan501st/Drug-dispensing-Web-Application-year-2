
<?php
 session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>patient login</title>
    <link rel="stylesheet " href="style.css">
  </head>
  <body>
    <form action="welcomepatient.php" method ="post">
      <div>
      <label for="patient name">patient name</label>
      <input type="text" name="full_name" />

      <div>
      <label for="ssn number">ssn number</label>
      <input type="number"name="ssn_number"  />
</div>
      <div>
      <label for="password">password</label>
      <input type="password"name="password"  />
      </div>

      

      <a href="">forgot password</a>
      <div>
        <input type="SUBMIT"  value="Submit"/>

        <input type="RESET" />
      </div>

    </form>
  </body>
</html>
