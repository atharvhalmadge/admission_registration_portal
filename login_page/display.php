<?php  
session_start();  
  
if(!$_SESSION['email'])  
{  
  
    header("Location: login.html");//redirect to the login page to secure the welcome page without login access.  
}  
  
?> 
<html>
    <head>
        <title>Registered Students</title>
        
        <style>
            .container{overflow: hidden}
            .tab-btn{margin-left: 42%; margin-top: 2%; margin-bottom: 2%;}
            /* #table1{ table-layout: fixed; word-wrap:break-word; display:block; max-width="100%" }
            #table2{width="10%"; table-layout: fixed; word-wrap:break-word;  } */

            *{        }

        </style>
    </head>
    <body style="background-color: CBF1F5; width:110%;">
        <h1 style="text-align: center;">Students Data</h1>
        <button onclick="document.location='logout.php'" style="margin-left:95%; margin-bottom:1%;">Logout</button>
        <div class="container">
        <table id="table1" border = "1">
            <tr>
                <!-- <th>Id</th> -->
                <th width="50">Date & Time</th>
                <th width="30">First Name</th>
                <th width="30">Middle Name</th>
                <th width="30">Last Name</th>
                <th width="30">Gender</th>
                <th width="30">Category</th>
                <th width="50">Email</th>
                <th width="50">Phone Number</th>
                <th width="50">Parent Phone Number</th>
                <th width="30">SSC Total</th>
                <th width="40">Board</th>
                <th width="30">HSC Total</th>
                <th width="30">PCM Total</th>
                <th width="30">JEE<br>(Yes/No)</th>
                <th width="30">MHT-CET Marks</th>
                <th width="30">JEE Marks</th>
                <th width="60">Intrested Fields</th>
                <th width="50">Address</th>
                <th width="30">Counseller Name</th>
                <th width="40">Operations</th>
                <th width="40">Confirmation</th>
    
            </tr>

<?php
    // error_reporting(0);
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "student_data";  
  
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }

    $query = "SELECT * FROM info where confirmation=0";
    $data = mysqli_query($con,$query);
    $total = mysqli_num_rows($data);
    // echo "$total";
    // $result = mysqli_fetch_assoc($data);
    // echo $result['first_name', 'middle_name', 'last_name', 'gender', 'category', 'email', 'phone_number', 'ssc', 'pcm', 'hsc', 'cet', 'jee', 'address', 'intrested_field'];
    // echo $result['first_name']." ".$result['middle_name']." ".$result['last_name']." ".$result['gender']." ".$result['category']." ".$result['email']." ".$result['phone_number']." ".$result['ssc']." ".$result['pcm']." ".$result['hsc']." ".$result['cet']." ".$result['jee']." ".$result['address']." ".$result['intrested_field'];

    if($total!=0){
        while(($result=mysqli_fetch_assoc($data))){
            echo "
            <tr>
            <td>".$result['date_time']."</td>
            <td>".$result['first_name']."</td>
            <td>".$result['middle_name']."</td>
            <td>".$result['last_name']."</td>
            <td>".$result['gender']."</td>
            <td>".$result['category']."</td>
            <td>".$result['email']."</td>
            <td>".$result['phone_number']."</td>
            <td>".$result['parent_phone_number']."</td>
            <td>".$result['ssc']."</td>
            <td>".$result['board']."</td>
            <td>".$result['hsc']."</td>
            <td>".$result['pcm']."</td>
            <td>".$result['jee_yn']."</td>
            <td>".$result['cet']."</td>
            <td>".$result['jee']."</td>
            <td>".$result['intrested_field']."</td>
            <td>".$result['address']."</td>
            <td>".$result['CB']."</td>
            <td><a href = 'delete.php?id=$result[id]'>Delete</a></td>
            <td><a href = 'confirm.php?id=$result[id]'>Confirmed</a></td>
            
            </tr>
            ";
        }
    }
    else{
        echo "No records found";
    }
    
?>
<table>

    <!-- <div class="tab tab-btn">
        <button onclick="tab1_to_tab2()">Admission Confirm</button>
        <button onclick="tab2_to_tab1()">Admission Not Confirm</button>
    </div> -->

    <h1 style="text-align: center;">Admission Confirmed</h1>
    <div class="tab">
        <!-- <table id="table2"  border = "1"> -->
        <table id="table2" border = "1" >
        <tr>
                <!-- <th>Id</th> -->
                
                <th width="50">Date & Time</th>
                <th width="30">First Name</th>
                <th width="30">Middle Name</th>
                <th width="30">Last Name</th>
                <th width="30">Gender</th>
                <th width="30">Category</th>
                <th width="50">Email</th>
                <th width="50">Phone Number</th>
                <th width="50">Parent Phone Number</th>
                <th width="30">SSC Total</th>
                <th width="40">Board</th>
                <th width="30">HSC Total</th>
                <th width="30">PCM Total</th>
                <th width="30">JEE<br>(Yes/No)</th>
                <th width="30">MHT-CET Marks</th>
                <th width="30">JEE Marks</th>
                <th width="40">Intrested Fields</th>
                <th width="50">Address</th>
                <th width="30">Counseller Name</th>
                <th width="30">Edit</th>
                <th width="40">Operations</th>
                <th width="40">Confirmation</th>
                
                <!-- <th>Date & Time</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Category</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Parent Phone Number</th>
                <th>SSC Total</th>
                <th>Board</th>
                <th>HSC Total</th>
                <th>PCM Total</th>
                <th>JEE<br>(Yes/No)</th>
                <th>MHT-CET Marks</th>
                <th>JEE Marks</th>
                <th>Intrested Fields</th>
                <th>Address</th>
                <th>Counseller Name</th>
                <th>Edit</th>
                <th>Operations</th>
                <th>Confirmation</th> -->
                
            </tr>
            <?php
    // error_reporting(0);
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "student_data";  
  
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }

    $query = "SELECT * FROM info where confirmation=1";
    $data = mysqli_query($con,$query);
    $total = mysqli_num_rows($data);
    // echo "$total";
    // $result = mysqli_fetch_assoc($data);
    // echo $result['first_name', 'middle_name', 'last_name', 'gender', 'category', 'email', 'phone_number', 'ssc', 'pcm', 'hsc', 'cet', 'jee', 'address', 'intrested_field'];
    // echo $result['first_name']." ".$result['middle_name']." ".$result['last_name']." ".$result['gender']." ".$result['category']." ".$result['email']." ".$result['phone_number']." ".$result['ssc']." ".$result['pcm']." ".$result['hsc']." ".$result['cet']." ".$result['jee']." ".$result['address']." ".$result['intrested_field'];

    if($total!=0){
        while(($result=mysqli_fetch_assoc($data))){
            echo "
            <tr>
            <td>".$result['date_time']."</td>
            <td>".$result['first_name']."</td>
            <td>".$result['middle_name']."</td>
            <td>".$result['last_name']."</td>
            <td>".$result['gender']."</td>
            <td>".$result['category']."</td>
            <td>".$result['email']."</td>
            <td>".$result['phone_number']."</td>
            <td>".$result['parent_phone_number']."</td>
            <td>".$result['ssc']."</td>
            <td>".$result['board']."</td>
            <td>".$result['hsc']."</td>
            <td>".$result['pcm']."</td>
            <td>".$result['jee_yn']."</td>
            <td>".$result['cet']."</td>
            <td>".$result['jee']."</td>
            <td>".$result['intrested_field']."</td>
            <td>".$result['address']."</td>
            <td>".$result['CB']."</td>
            <td><a href = 'edit.php?id=$result[id]'>Edit</a></td>
            <td><a href = 'delete.php?id=$result[id]'>Delete</a></td>
            <td><a href = 'not_confirm.php?id=$result[id]'>Not Confirmed</a></td>
            </tr>
            ";
        }
    }
    else{
        echo "No records found";
    }
    
?>

        </table>
    </div>
    </div>
<script>
    function tab1_to_tab2(){
        console.log("Hello");
        var checkboxes = document.getElementsByName("check-tab1");


            <?php
            error_reporting(0);
            $host = "localhost";  
            $user = "root";  
            $password = '';  
            $db_name = "student_data";  
        
            $con = mysqli_connect($host, $user, $password, $db_name);  
            if(mysqli_connect_errno()) {  
                die("Failed to connect with MySQL: ". mysqli_connect_error());  
            }


            for($i=0;$i<checkboxes.length;$i++)
                    if(checkboxes[$i].checked){
                        $id = $_GET['id'];
                        console.log("Hello");
                        $query = "UPDATE info SET confirmation=1 WHERE id=$id";
                        $data = mysqli_query($con,$query);
                // $total = mysqli_num_rows($data);

                    }
            ?>
    }

    function tab2_to_tab1(){
        var checkboxes = document.getElementsByName("check-tab1");


            <?php
            error_reporting(0);
            $host = "localhost";  
            $user = "root";  
            $password = '';  
            $db_name = "student_data";  
        
            $con = mysqli_connect($host, $user, $password, $db_name);  
            if(mysqli_connect_errno()) {  
                die("Failed to connect with MySQL: ". mysqli_connect_error());  
            }
            $id = $_GET['id'];

            for($i=0;$i<checkboxes.length;$i++)
                    if(checkboxes[i].checked){
                        $query = "UPDATE info SET confirmation=0 WHERE id=$id";
                        $data = mysqli_query($con,$query);

                    }
            ?>
    }
</script>



<!-- <script>
    var checkboxes = document.getElementsByName("check-tab1");


    <?php
    // error_reporting(0);
    // $host = "localhost";  
    // $user = "root";  
    // $password = '';  
    // $db_name = "student_data";  
  
    // $con = mysqli_connect($host, $user, $password, $db_name);  
    // if(mysqli_connect_errno()) {  
    //     die("Failed to connect with MySQL: ". mysqli_connect_error());  
    // }
    // $id = $_GET['id'];

    // for($i=0;$i<checkboxes.length;$i++)
    //         if(checkboxes[i].checked){
    //             UPDATE info SET confirmation=1 WHERE id=$id;

    //         }
    ?>
</script> -->

</body>
</html>