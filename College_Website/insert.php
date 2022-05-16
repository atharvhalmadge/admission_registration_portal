<?php
$first_name=$_POST['first_name'];
$middle_name=$_POST['middle_name'];
$last_name=$_POST['last_name'];
$email=$_POST['email'];
$phone_number=$_POST['phone_number'];
$ssc=$_POST['ssc'];
$pcm=$_POST['pcm'];
$hsc=$_POST['hsc'];
$cet=$_POST['cet'];
$jee=$_POST['jee'];
$address=$_POST['address'];

if (!empty($first_name)|| !empty($middle_name)|| !empty($last_name)|| !empty($email)|| !empty($phone_number)|| !empty($ssc)|| !empty($pcm)|| !empty($hsc)|| !empty($cet)|| !empty($jee)|| !empty($address))
{
     $host = "localhost";
     $dbUsername ="root";
     $dbPassword = "";
     $dbname = "information";

     $conn =new mysqli($host, $dbUsername, $dbPassword, $dbname);

     if (mysqli_connect_error()){
         die('Connect Error('. mysqli_connect_errno().')'.mysqli_connect_error());

     }
     else{
            $SELECT = "SELECT email From register Where email = ? Limit 1";
            $INSERT = "INSERT Into register ('first_name', 'middle_name', 'last_name', 'email', 'phone_number', 'ssc', 'pcm', 'hsc', 'cet', 'jee', 'address') VALUES ('?', '?', '?', '?' ,'?' ,'?' ,'?', '?', '?', '?', '?')";
        $stmt = $conn->prepare($SELECT);
        $stmt -> bind_param("s", $email);
        $stmt -> execute();
        $stmt -> bind_result($email);
        $stmt -> store_result();
        $rnum = $stmt->num_rows;

            if($rnum==0){
            $stmt->close();
            echo "In Insert File";
            $stmt = $conn->prepare("INSERT Into register (first_name, middle_name, last_name, email, phone_number, ssc, pcm, hsc, cet, jee, address) VALUES (?, ?, ?, ? ,? ,? ,?, ?, ?, ?, ?)");
            $stmt -> bind_param("sssssssssss", $first_name, $middle_name, $last_name, $email, $phone_number, $ssc, $pcm, $hsc, $cet, $jee, $address);
            $stmt->execute();
            echo "New Record Inserted Successfully";
        }
        else{
            echo "You Have already Registered.";
        }
        $stmt->close();
        $conn->close();
     }
}
else{
    echo "All fields are required";
    die();

}


?>
