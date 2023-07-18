<?php
require_once "connect2.php";

if(isset($_POST["update"])){
    $full_name = $_POST['full_name'];
    $Email = $_POST['Email'];
    $ssn_number = $_POST['ssn_number'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];
    $password = $_POST['password'];
    $specialty = $_POST['specialty'];
    $sql="UPDATE doctors SET full_name='$full_name', Email='$Email',ssn_number='$ssn_number',address='$address',phone_number='$phone_number',password='$password',specialty='$specialty'";
    if($conn->query($sql)===TRUE){
        header("Location:htmltabledoctors");
    
    }else{
        echo "Error updating" . $conn->error;
    }
}


?>
<!DOCTYPE html>
<html>
	<head>
		<title>Patient Information Page</title>
		<meta charset="UTF=8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet " href="style.css" />
	</head>
	<body>
		<form action=""method="POST">
        <div class="User-details">
      <div class="input-box">
        <span class="details"> Full Name</span>

        <input type="text"
          placeholder="enter your name"
          name="full_name"
          required>
      </div>

      <div class="input-box">
        <span class="details"> Email</span>
        <input
          type="text"
          placeholder="enter a valid email"
          name="Email"
          required
        >
      </div>

        <div class="input-box">
          <span class="details">SSN Number</span>
          <input
            type="text"
            placeholder="enter your number "
            name="ssn_number"
            required
          >
        </div>

        <div class="input-box">
          <span class="details">Address</span>
          <input
            type="text"
            placeholder="enter your Address "
            name="address"
            required> 
        </div>

      
      <div class="input-box">
        <span class="details">Phone number</span>
        <input
          type="number"
          placeholder="enter your number "
          name="phone_number"
          required
        >
      </div>

      <div class="input-box">
        <span class="details">specialty</span>
        <input
          type="text"
          placeholder="enter specialty "
          name="specialty"
          required
        >
      </div>
        
      

      <div class="input-box">
        <span class="details">Password</span>
        <input type="password"placeholder="Enter a Password"name="password" required autocomplete  maxlength="8" >
      </div>

      <div>
<br><br><br>
			<button><input type="reset"></button><br><br>
            <button><input type="submit" value="Submit" id="update" name="update"></button>
        </form>
	</body>
</html>

