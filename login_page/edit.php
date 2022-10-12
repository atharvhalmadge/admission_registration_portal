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
$query = "SELECT * FROM info where id = '$id'";
$data = mysqli_query($con,$query);
$total = mysqli_num_rows($data);
$result=mysqli_fetch_assoc($data);
?>



<!DOCTYPE html>
<html>
<head>
    <title>Update Details</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
   <table>
      <tr>
         <td>
               <img src="jspm_logo.jpeg" alt="Jspm_logo" class="logo1">
         </td>
         <td>
            <div class="header">
               <h3 style="text-align:center;color: #ef0011;">  JSPM'S  Rajarshi Shahu College of Engineering</h3>
               <h6 style="text-align:center;color: #ef0011;">
                  ( An Autonomous Institute Affiliated to Savitribai Phule Pune University,
                  <br>
                 Approved by AICTE, Accredited by NBA (UG Programs), Accredited by NAAC With "A" Grade) </h6>
            </div>
         </td>
         <td>
               <img src="rscoe_logo.jpeg" alt="rscoe_logo" class="logo2">
         </td>
      </tr>
   </table>
   <button class="button-33" role="button" id="button"><a href="login_page/login.html">Admin Login</a></button>
<form name="frmContact" method="post" >
<div class="wrapper">
    <div class="title">
      Update Details
    </div>
    <div class="form">

      <!-- ---------------------Student Full Name--------------------- -->
         <div class="inputfield">
            <label for="first_name" class="required">First Name</label>
            <input type="text" value="<?php echo $result['first_name'];?>" class="input" name="first_name" required>
         </div>
         <div class="inputfield">
         <label for="middle_name" class="required">Middle Name</label>
         <input type="text" value="<?php echo $result['middle_name'];?>" class="input" name="middle_name" required>
         </div>  
         <div class="inputfield">
            <label for="last_name" class="required">Last Name</label>
            <input type="text" value="<?php echo $result['last_name'];?>" class="input" name="last_name" required>
         </div> 

       <!-- ---------------------Gender--------------------- -->
         <div class="inputfield">
            <label for="gender" class="required">Gender</label>
            <div class="custom_select">
               <select name="gender" required>
                  <option value="">Select</option>


                  <option value="Female"
                     <?php
                        if($result['gender'] == 'Female')
                        {
                           echo "selected";
                        }
                     ?>
                  >Female</option>
                  <option value="Male"
                  <?php
                        if($result['gender'] == 'Male')
                        {
                           echo "selected";
                        }
                     ?>
                  >Male</option>
                  <option value="Other"
                  <?php
                        if($result['gender'] == 'Other')
                        {
                           echo "selected";
                        }
                     ?>
                  >Other</option>
               </select>
            </div>
         </div>

     <!-- ---------------------Category --------------------- -->
         <div class="inputfield">
            <label for="category" class="required">Category</label>
            <div class="custom_select">
            <select name="category" required>
               <option value="">Select</option>

               <option name="category" value="EWS"
               <?php
                        if($result['category'] == 'EWS')
                        {
                           echo "selected";
                        }
                     ?>
               >EWS</option>
               <option name="category" value="J&K"
               <?php
                        if($result['category'] == 'J&K')
                        {
                           echo "selected";
                        }
                     ?>
               >J&K</option>
               <option name="category" value="NT"
               <?php
                        if($result['category'] == 'NT')
                        {
                           echo "selected";
                        }
                     ?>
               >NT</option>
               <option name="category" value="OBC"
               <?php
                        if($result['category'] == 'OBC')
                        {
                           echo "selected";
                        }
                     ?>
               >OBC</option>
               <option name="category" value="OPEN"
               <?php
                        if($result['category'] == 'OPEN')
                        {
                           echo "selected";
                        }
                     ?>
               >OPEN</option>
               <option name="category" value="SBC"
               <?php
                        if($result['category'] == 'SBC')
                        {
                           echo "selected";
                        }
                     ?>
               >SBC</option>
               <option name="category" value="SC"
               <?php
                        if($result['category'] == 'SC')
                        {
                           echo "selected";
                        }
                     ?>
               >SC</option>
               <option name="category" value="ST"
               <?php
                        if($result['category'] == 'ST')
                        {
                           echo "selected";
                        }
                     ?>
               >ST</option>
               <option name="category" value="Other"
               <?php
                        if($result['category'] == 'Other')
                        {
                           echo "selected";
                        }
                     ?>
               >Other</option>
            </select>
            </div>
         </div>

      <!-- ---------------------Conatct Infromation--------------------- -->
         <div class="inputfield">
         <label class="required" for="email">Email Address</label>
         <input type="email" value="<?php echo $result['email'];?>" class="input" name="email" placeholder="abc123@gmail.com" required>
         </div>
         <div class="inputfield">
         <label class="required" for="phone_number">Phone Number</label>
         <input type="text" value="<?php echo $result['phone_number'];?>" class="input"  placeholder="xxxxxxxxxx " name="phone_number" required>
         </div> 
         <div class="inputfield">
         <label class="required" for="parent_phone_number">Parent Phone Number</label>
         <input type="text" value="<?php echo $result['parent_phone_number'];?>" class="input"  placeholder="xxxxxxxxxx " name="parent_phone_number" required>
         </div>
     
      <!-- ---------------------Academic Details--------------------- -->
         <div class="inputfield">
            <label for="ssc" class="required">SSC Total</label>
            <input type="text" value="<?php echo $result['ssc'];?>" class="input" name="ssc" required>
         </div> 
         <div class="inputfield">
            <label for="board" class="required">Board</label>
            <div class="custom_select">
               <select name="board" required>
                  <option value="">Select</option>

                  <option value="CBSC"
                  <?php
                        if($result['board'] == 'CBSC')
                        {
                           echo "selected";
                        }
                     ?>
                  >CBSC</option>
                  <option value="ISCE"
                  <?php
                        if($result['board'] == 'ISCE')
                        {
                           echo "selected";
                        }
                     ?>
                  >ISCE</option>
                  <option value="Maharashtra state board"
                  <?php
                        if($result['board'] == 'Maharashtra state board')
                        {
                           echo "selected";
                        }
                     ?>
                  >Maharashtra State Board</option>
                  <option value="Other"
                  <?php
                        if($result['board'] == 'Other')
                        {
                           echo "selected";
                        }
                     ?>
                  >Other</option>
               </select>
            </div>
         </div>
         <div class="inputfield">
            <label for="hsc" class="required">HSC Total</label>
            <input type="Text" value="<?php echo $result['hsc'];?>" name="hsc" class="input" required>
         </div> 
         <div class="inputfield">
         <label for="pcm" class="required">PCM Total</label>
         <input type="Text" value="<?php echo $result['pcm'];?>" class="input" name="pcm" required>
         </div>
         <div class="inputfield">
            <label for="jee_yn" class="required">Are you appeared for Jee?</label>
            <div class="custom_select">
               <select name="jee_yn" required>
                  <option value="">Select</option>

                  <option value="Yes"
                  <?php
                        if($result['jee_yn'] == 'Yes')
                        {
                           echo "selected";
                        }
                     ?>
                  >Yes</option>
                  <option value="No"
                  <?php
                        if($result['jee_yn'] == 'No')
                        {
                           echo "selected";
                        }
                     ?>
                  >No</option>
               </select>
            </div>
         </div>
         <div class="inputfield">
         <label for="cet">CET Score</label>
         <input type="Text" value="<?php echo $result['cet'];?>" name="cet" class="input">
         </div>
         <div class="inputfield">
         <label for="jee">JEE Score</label>
         <input type="Text" value="<?php echo $result['jee'];?>" name="jee" class="input">
         </div> 
         
      <!-- ---------------------Address--------------------- -->   
         <div class="inputfield">
            <label class="required" for="address">Address</label>
            <textarea class="textarea" name="address" placeholder="Enter Permanent Address" required><?php echo $result['address'];?></textarea>
         </div>  
      <!-- ---------------------Intrested Fields--------------------- -->
         <div class="inputfield">
          <label class="required">Intrested Field</label><br>
          <input type="checkbox" name="field[]" value="Computer Science and Business System">
          <label>Computer Science and Business System</label><br>

          <input type="checkbox" name="field[]" value="Computer Engineering">
          <label>Computer Engineering</label><br>

          <input type="checkbox" name="field[]" value="Information Technology">
          <label>Information Technology</label><br>

          <input type="checkbox" name="field[]" value="Electronics and Telecommunication Engineering">
          <label>Electronics and Telecommunication Engineering</label><br>

          <input type="checkbox" name="field[]" value="Electrical Engineering">
          <label>Electrical Engineering</label><br>

          <input type="checkbox" name="field[]" value="Mechanical Engineering">
          <label>Mechanical Engineering</label><br>

          <input type="checkbox" name="field[]" value="Civil Engineering">
          <label>Civil Engineering</label><br>

          <input type="checkbox" name="field[]" value="Automation and Robotics">
          <label>Automation and Robotics</label><br>

         </div>
   <!-- ----------------------Counselling By------------------------  -->
         <div class="inputfield">
            <label class="required" for="CB">Counselling By</label>
            <textarea class="textarea" name="CB" placeholder="Counseller Name" required><?php echo $result['CB'];?></textarea>
         </div>
  <!-- ----------------------submit button------------------------  -->
         <div class="inputfield">
         <input type="submit" value="Update Details" class="btn" name="update">
         </div>
    </div>
</div>
</form>
</body>
</html>



<?php
   error_reporting(E_ERROR | E_PARSE);
   if($_POST['update'])
   {
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
      $intrested_field =implode(',', $field);
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
                  // $UPDATE = "UPDATE Into info ('first_name', 'middle_name', 'last_name', 'gender', 'category', 'email', 'phone_number', 'parent_phone_number', 'ssc', 'board', 'hsc', 'pcm', 'jee_yn', 'cet', 'jee', 'address', 'intrested_field') VALUES ('?', '?', '?', '?' ,'?' ,'?' ,'?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?')";
                  $query = "UPDATE info set first_name='$first_name',middle_name='$middle_name',last_name='$last_name',gender='$gender',category='$category',email='$email',phone_number='$phone_number',parent_phone_number='$parent_phone_number',ssc='$ssc',board='$board',hsc='$hsc',pcm='$pcm',jee_yn='$jee_yn',cet='$cet',jee='$jee',address='$address',intrested_field='$intrested_field', CB='$CB' WHERE id='$id'";
                  $data = mysqli_query($conn,$query);

                  if($data){
                     header("location: display.php");
                     //  echo "Data Updated Successfully.";
            }
            else{
                  echo "failed";
            }
            
            // $stmt->close();
            $conn->close();
         }
      }
      else{
         echo "All fields are required";
         die();

      }


         }
?>
