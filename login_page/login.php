<?php  
session_start();//session starts here  
  
?>
<?php
        $host = "localhost";  
        $user = "root";  
        $password = '';  
        $db_name = "admission_form";  
      
        $con = mysqli_connect($host, $user, $password, $db_name);  
        if(mysqli_connect_errno()) {  
            die("Failed to connect with MySQL: ". mysqli_connect_error());  
        }
        if(isset($_POST['login']))  
        {  
            $email=$_POST['email'];  
            $password=$_POST['password'];  
        
            $check_user="select * from admin WHERE email='$email'AND password='$password'";  
        
            $run=mysqli_query($con,$check_user);  
        
            if(mysqli_num_rows($run))  
            {  
                // echo "Login Successful";
                echo "<script>window.open('display.php','_self')</script>";  
        
                $_SESSION['email']=$email;//here session is used and value of $user_email store in $_SESSION.  
        
            }  
            else  
            {  
            echo "<script>alert('Email or password is incorrect!')</script>";  
            }  
        }  
?>