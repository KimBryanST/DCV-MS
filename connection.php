<?php 
    //Database connection
    $host = "localhost";
    $dbusername = "u785536991_DCVMS";
    $dbpassword = "!School@123";
    $dbname = "u785536991_DCVMS";
    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
    
    if($conn->connect_error){
        die("Connection failed: ". $conn->connect_error);
    }
    echo "";
?>