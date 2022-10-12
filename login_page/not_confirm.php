<?php
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "student_data";  
  
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());
    }

    $id = $_GET['id'];
    $query = "UPDATE info SET confirmation=0 WHERE id='$id'";

    $data = mysqli_query($con, $query);

    if($data)
    {
        
        header ("location: display.php");
    }
    else{
        echo "Failed to delete record from database.";
    }
?>