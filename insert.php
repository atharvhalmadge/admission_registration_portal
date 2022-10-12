<?php
$first_name=$_POST['first_name'];
$middle_name=$_POST['middle_name'];
$last_name=$_POST['last_name'];
$gender=$_POST['gender'];
$category=$_POST['category'];
$email=$_POST['email'];
$phone_number=$_POST['phone_number'];
$parent_phone_number=$_POST['parent_phone_number'];
$ssc=$_POST['ssc'];
$board=$_POST['board'];
$hsc=$_POST['hsc'];
$pcm=$_POST['pcm'];
$jee_yn=$_POST['jee_yn'];
$cet=$_POST['cet'];
$jee=$_POST['jee'];
$address=$_POST['address'];
$field=$_POST['field'];


$field = isset($_POST['field']) && is_array($_POST['field']) ? $_POST['field'] : [];
$intrested_field =implode(PHP_EOL, $field);
$CB=$_POST['CB'];

// echo $field;
// $intrested_field = implode(" , ", $field); //to convert array into string
// echo "$intrested_field <br>";
//echo $intrested_field;
if (!empty($first_name)|| !empty($middle_name)|| !empty($last_name)|| !empty($gender)|| !empty($category)|| !empty($email)|| !empty($phone_number)|| !empty($parent_phone_number)|| !empty($ssc)|| !empty($board)|| !empty($hsc)|| !empty($pcm)|| !empty($jee_yn)|| !empty($cet)|| !empty($jee)|| !empty($address)|| !empty($intrested_field) || !empty($CB))
{
     $host = "localhost";
     $dbUsername ="root";
     $dbPassword = "";
     $dbname = "student_data";

     $conn =new mysqli($host, $dbUsername, $dbPassword, $dbname);

     if (mysqli_connect_error()){
         die('Connect Error('. mysqli_connect_errno().')'.mysqli_connect_error());

     }
     else{
            $SELECT = "SELECT email From info Where email = ? Limit 1";
            $INSERT = "INSERT Into info ('first_name', 'middle_name', 'last_name', 'gender', 'category', 'email', 'phone_number', 'parent_phone_number', 'ssc', 'board', 'hsc', 'pcm', 'jee_yn', 'cet', 'jee', 'address', 'intrested_field','CB') VALUES ('?', '?', '?', '?' ,'?' ,'?' ,'?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?','?')";
        $stmt = $conn->prepare($SELECT);
        $stmt -> bind_param("s", $email);
        $stmt -> execute();
        $stmt -> bind_result($email);
        $stmt -> store_result();
        $rnum = $stmt->num_rows;

            if($rnum==0){
            $stmt->close();
            $stmt = $conn->prepare("INSERT Into info (first_name, middle_name, last_name, gender, category, email, phone_number, parent_phone_number, ssc, board, hsc, pcm, jee_yn, cet, jee, address, intrested_field, CB) VALUES (?, ?, ?, ?, ?, ?, ? ,? ,? ,?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt -> bind_param("ssssssssssssssssss", $first_name, $middle_name, $last_name, $gender, $category, $email, $phone_number, $parent_phone_number, $ssc, $board, $hsc, $pcm, $jee_yn, $cet, $jee, $address, $intrested_field, $CB);
            $stmt->execute();
            // echo "New Record Inserted Successfully";
            header("location: Thank_you.html");
        }
        else{
            header("location: registered.html");
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
