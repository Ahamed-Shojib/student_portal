<?php
require('conn.php');

if(isset($_POST['submit'])){
  $firstName = $_POST['firstname'];
  $lastName = $_POST['lastname'];
  $email = $_POST['email'];
  $department = $_POST['department'];
  $semester = $_POST['semester'];
  $phone = $_POST['phone'];
  $new_password = $_POST['new_password'];
  $confirm_password = $_POST['confirm_password'];
  $uniqi_id = mt_rand(100, 1000);

  
  $sql = " INSERT INTO student_info(student_id,first_name,last_name,email,depart_name,semester,pass,mobile) VALUES ('$uniqi_id','$firstName','$lastName','$email','$department','$semester','$new_password','$phone')";
  if(($new_password == $confirm_password)){
    $conn->query($sql);
    $Insert_msg = " Data Inserted Successfully!";
 }else{
    $Insert_msg_error = "Sorry! Data Not Inserted.";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Signup Form</title>
  
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/stylex.css">
</head>
<body id="body_img">
  <div id="header">
      <!--<div class="admin_class"><a href="student_log.php">User</a></div> -->
      <a style="color:white" href="index.php"><h1>Student Portal</h1></a>
    </div>
    <div class="alert">
      <center>
        <label style="color:green;display:block;margin:20px 50px;">
          <?php if(isset($_POST['submit']) && ($new_password == $confirm_password)){echo $Insert_msg;}?>
          <label style="color:red;display:inline;"> <?php if(isset($_POST['submit']) && ($new_password == $confirm_password)){
            echo "<br>Your Unique ID : ". $uniqi_id." And Password : ".$new_password." <br>Remember this Unique Id As a Student ID to Log In the First Time";}?>
        </label>
        </label>
        <label style="color:red;display:block;margin:20px 50px;"><?php if(isset($_POST['submit']) && ($new_password != $confirm_password)){echo $Insert_msg_error;}?></label>
      </center>
    </div>
  
    <div id="container" class="body_Container_size_signup" >
            <div id="student-details">
              <div class="container_form">
                <h2 style="padding:10px;border-bottom:2px solid rgb(17, 143, 143);color:rgb(17, 143, 143);">Sign Up Form</h2>
                <form action="student_signup.php" method="POST">
                <div class="body_section">
                    <div id="left_part">
                      <label for="firstname">First Name</label>
                      <input type="text" id="firstname" name="firstname" placeholder="Enter your first name" required>

                      <label for="lastname">Last Name</label>
                      <input type="text" id="lastname" name="lastname" placeholder="Enter your last name" required>

                      <label for="email">Email</label>
                      <input type="text" id="email" name="email" placeholder="Enter your email">

                      <label for="phone">Mobile Number</label>
                      <input type="text" id="phone" name="phone" placeholder="Enter your Mobile Number">
                    </div>     
                    <div id="right_part">
                      <label for="department">Department</label>
                      <select id="department" name="department" required>
                        <option value="Select">Select</option>
                        <option value="CSE">CSE</option>
                        <option value="EEE">EEE</option>
                        <option value="TEX">TEX</option>
                        <option value="BBA">BBA</option>
                        <option value="ENG">ENG</option>
                        <option value="LAW">LAW</option>
                        <option value="SOC">SOC</option>
                      </select>

                      <label for="semester">Semester</label>
                      <select id="semester" name="semester" required>
                        <option value="Select">Select</option>
                        <option value="Summer">Summer</option>
                        <option value="Spring">Spring</option>
                        <option value="Fall">Fall</option>
                      </select>

                      <label for="new-password">Enter Password</label>
                      <input type="password" id="new-password" name="new_password" placeholder="Enter Password" required>
                        
                      <label for="confirm-password">Confirm Password</label>
                      <input type="password" id="confirm-password" name="confirm_password" placeholder="Repeat Password" required>
                    </div>   
                    </div>
                      <input id="submit_shadow" class="already" type="submit"  name="submit" value="Sign Up">
                      <label class="already" for="log in">Already have an account <a href="student_log.php">Log In</a></label>
                </form>     
                </div>
              </div>
              
          </div>
    <div id="footer">
      &copy; 2023 Student Portal. All rights reserved.
    </div>
</body>
</html>
