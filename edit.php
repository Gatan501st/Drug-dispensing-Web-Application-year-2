<?php
require_once "connection.php";

if(isset($_POST["update"])){
    $full_name = $_POST['full_name'];
    $Email = $_POST['Email'];
    $ssn_number = $_POST['ssn_number'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];
    $password = $_POST['password'];
    $specialty = $_POST['specialty'];
    $sql="UPDATE doctors SET ssn_number='$ssn_number', full_name='$full_name',lastname='$lastname',emailaddress='$emailaddress',password='$password',phone='$phone',yearsofexperience='$yearsofexperience',gender='$gender',specialty='$specialty',extrainfo='$extrainfo' ";
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
        <link rel="stylesheet"href="registrationfiles.css">
	</head>
	<body>
		<form action=""method="POST">
			<label for="docSSN">Doctor SSN:</label><br>
			<input type="number"id="docSSN"name="docSSN"><br>

			<label for="firstname">First Name:</label><br>
			<input type="text"id="firstname"name="firstname"><br>

            <label for="lastname">Last Name:</label><br>
			<input type="text"id="lastname"name="lastname"><br>

			<label for="emailaddress">Email Address:</label><br>
			<input type="email"id="emailaddress"name="emailaddress"size="50"><br>

			<label for="password">Password:</label><br>
			<input type="text"id="password"name="password"><br>

			<label for="phone">Phone Number</label><br>
			<input type="number"id="Age"name="Age" size="10"><br>

            <label for="yearsofexperience">Years Of Experience:</label><br>
			<input type="number"id="yearsofexperience"name="yearsofexperience"><br>

			<label for="Gender">Gender:<br>Male</label>
			<input type="radio"id="male"name="Gender"value="Male"><br>

			<label for="Gender">Female</label>
			<input type="radio"id="female"name="Gender"value="Female"><br>

			<label for="Gender">Prefer not to say</label>
			<input type="radio"id="prefernottosay"name="Gender"value="Non-Disclosed"><br>


			<label for="specialty">Specialty:</label><br>
			<input type="text"id="specialty"name="specialty"><br>


            <label for="anyotherinfo">Additional Information</label><br>
			<input type="text"id="anyotherinfo"name="anyotherinfo"><br>

<br><br><br>
			<button><input type="reset"></button><br><br>
            <button><input type="submit" value="Submit" id="update" name="update"></button>
        </form>
	</body>
</html>

