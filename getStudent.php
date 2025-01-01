<?php 

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    //retrieve from data
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    //Database connection
    
    $host = "localhost";
    $dbusername = "u785536991_DCVMS";
    $dbpassword = "!School@123";
    $dbname = "u785536991_DCVMS";
    
    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
    
    if($conn->connect_error){
        die("Connection failed: ". $conn->connect_error);
    }
    
    //validate login auth
    $query = "SELECT * FROM student_login WHERE username= '$username' AND password= '$password'";
    
    $result = $conn->query($query);
    $row = mysqli_fetch_array($result);
    
    
    if($result->num_rows == 1){
        //successful login
        header("Location: studentIndex.php?id_number=$row[id_number]");
        exit();
    }
  
    else{
        //failed login
        header("Location: error.html");
        exit();
    }
    
    $conn->close();
}

?>