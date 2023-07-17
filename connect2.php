<?php



    $host = "localhost";
    $username = "root";
    $pwrd = "";
    $db = "drug_dispensing_app";
    
    
    
    $conn = new mysqli($host, $username, $pwrd, $db);
    
    if($conn -> connect_error){
      die("connection to database failed");
    }
    
    else("connection successful");
    
    ?>