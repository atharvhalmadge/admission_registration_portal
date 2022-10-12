<?php
    $first_name = $_POST['first_name'];
    $first_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $ssc = $_POST['ssc'];
    $pcm = $_POST['pcm'];
    $hsc = $_POST['hsc'];
    $cet = $_POST['cet'];
    $jee = $_POST['jee'];
    $address = $_POST['address'];


    $conn = new mysqli('localhost','root','','information');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }
    else{
        $stmt = $conn->prepare("insert into register(first_name, middle_name, last_name, gender, email, phone_number, ssc, pcm,hsc, cet, jee, address) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssddddds", $first_name, $middle_name, $last_name, $gender, $email, $phone_number, $ssc, $pcm, $hsc, $cet, $jee, $address);
        $stmt->execute();
        echo "registration successfully...";
        $stmt->close();
        $conn->close();
    }



    ?>