<?php
session_start();
if(empty($_SESSION['admin_log']))
{
  header('location:admin_log.php');
}
require("conn.php");

$conn = new mysqli($host,$user,$password,$db);


if(isset($_POST['submit'])){

$admin_mail = $_POST['admin_mail'];
$new_password = $_POST['new_password'];
$confirm_password = $_POST['confirm_password'];

if($new_password != $confirm_password ){
  $miss_match_pass = "Password Does Not Match !";
  }
  else{

          if(!empty($admin_mail) && !empty($new_password) && !empty($confirm_password)){
            /*$sql1= "SELECT * FROM admin_info WHERE admin_password ='$current_password'";
            $query1 = mysqli_query($conn,$sql1);
            $num = mysqli_num_rows($query1);*/
            $sql = "UPDATE admin_info SET admin_pass = '$new_password' WHERE email = '$admin_mail'";
            $query = mysqli_query($conn,$sql);
            
            $update_mgs = "Congratulation! Password Changed";
            $current_pass_miss ="Current Password Not Match";
            } 
          }
  }

?>


<!DOCTYPE html>
<html>
<head>
  <title>Reset-Password</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div id="header">
    <div class="admin_class"><a href="student_logout.php">Logout</a></div>
    <h1>Student Portal</h1>
  </div>

  <div class="body_section">
    <div id="container" class="left_part">
        <div class="list_item_home_content">
            <a href="admin_home.php" class="list_item_home">Home</a>
            <a href="insert_result_home.php" class="list_item_home">Insert Result</a>
            <a href="add_course.php" class="list_item_home">Add Course</a>
            <a href="admin_conform.php" class="list_item_home">Verify Student</a>
            <a href="attend_home.php" class="list_item_home">Attendance</a>
            <a href="admin_reset_pass.php" class="list_item_home">Change Password</a>
        </div>
    </div>
    <div id="container" class="right_part">
        <div id="container_form" class="password-change-section">
        <h2 style="padding:10px;border-bottom:2px solid rgb(17, 143, 143);color:rgb(17, 143, 143);">Password Change</h2>
          <form action="admin_reset_pass.php" method="POST">
            <label for="current-password">Admin Email </label>
            <input type="text" id="current-password" name="admin_mail" placeholder="Admin Email" required>
        
            <label for="new-password">New Password </label>
            <input type="password" id="new_password" name="new_password" placeholder="New Password" required>
        
            <label for="confirm-password">Confirm Password </label>
            <input type="password" id="new_password" name="confirm_password" placeholder="Confirm Password" required>
        
            <button id="submit_shadow" class="submit_style" type="submit" name="submit">Change Password</button>
            <label style="color:red;display:inline;margin-left:43px;margin-top:10px;"><?php if(isset($_POST['submit']) && ($new_password != $confirm_password)){echo $miss_match_pass;}?></label>
            <label style="color:green;display:inline;margin-left:15px;margin-top:10px;"><?php if(isset($_POST['submit']) && ($new_password == $confirm_password)){echo $update_mgs;}?></label>
          </form>
        </div>
    </div>
  </div>
  
  <div id="footer">
    &copy; 2023 Student Portal. All rights reserved.
  </div>
</body>
</html>
