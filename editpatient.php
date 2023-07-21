<?php
require_once "connect2.php";

if(isset($_POST["update"])){
    $full_name=$_POST['full_name'];
    $Date_of_birth=$_POST['Date_of_birth'];
    $ssn_number=$_POST['ssn_number'];
    $Email=$_POST['Email'];
    $address=$_POST['address'];
    $phone_number=$_POST['phone_number'];
    $password=$_POST['password'];
    $gender=$_POST['gender'];
    $method_of_payment=$_POST['method_of_payment'];
    
    $sql="UPDATE patients SET full_name='$full_name', Email='$Email',ssn_number='$ssn_number',address='$address',phone_number='$phone_number',password='$password',gender='$gender',method_of_payment='$method_of_payment',Date_of_birth='$Date_of_birth'";
    if($conn->query($sql)===TRUE){
        header("test3.php");
    
    }else{
        echo "Error updating" . $conn->error;
    }
}
?>
<html lang ="en" dir ="1tr"></html>
  
    <head>
      <meta charset="UTF-8">
        <meta name = "viewport" content = "width=device-width,initial-scale=1.0"/>
      <title>Patients update</title>
      <link rel="stylesheet " href="style.css">
      <meta charset="UTF-8">
    </head>

    <body>   
        <div class ="container">
        <div class ="title">Registration</div>
         <form  action ='' method="POST" >

        

          <div class="User-details">
            <div class="input-box">
              <span class="details"> Full Name</span>
             
              <input type="text" placeholder="enter your name" name="full_name" required>
            </div>


        
          <div class="input-box">
            <span class="details">Date of Birth</span>
            <input type="Date"  name="Date_of_birth" required>
          </div>

        

    
          <div class="input-box">
            <span class="details">SSN Number</span>
            <input type="text" placeholder="enter your number " name="ssn_number" required>
          </div>

       
        
          <div class="input-box">
            <span class="details"> Email</span>
            <input type="text" placeholder="enter a valid email" name="Email" required>
          </div>

    

      
          <div class="input-box">
            <span class="details"> Address</span>
            <input type="text"placeholder="enter your address" name="address" required>
          </div>

      

    
          <div class="input-box">
            <span class="details"> Phone Number</span>
            <input type="tell"placeholder="enter a number"  name="phone_number" required>
          </div>


     
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password"placeholder="Enter a Password"name="password" required autocomplete  maxlength="8" >
          </div>

          <div class="input-box">
            <label for="Payment">Payment:</label>
            <select id="payment" name="method_of_payment">
              <option>mpesa</option>
              <option>cash</option>
            </select>
          </div>
  
       <div class="gender-details">
         <span class ="gender-info">Gender</span>
        <input type="radio" name="gender" value="male"> Male
        <input type="radio" name="gender" value="female"> Female
        
         
          <div class="category">
           
          </div>
          <br/>

       
  <div>
          <input type="SUBMIT"  value="Submit"/>

          <input type="RESET" />
        </div>
      
      </form>
    </body>
  </html>
</html>