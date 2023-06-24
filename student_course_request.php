<?php
session_start();
$student_fatch = $_SESSION['student_log']['first_name'];
include('conn.php');
if(empty($_SESSION['student_log']))
{
  header('location:student_log.php');
} 
if(isset($_POST["submit"])){
  $batch_id = $_POST["batch_id"];
  $sql = "SELECT * FROM course_offer WHERE batch = '$batch_id'";
  $result = mysqli_query($conn,$sql);
  if(mysqli_num_rows($result) > 0)
  {
      $row = mysqli_fetch_assoc($result);
        $_SESSION['batch_fatch']=$row['batch'];
        if($batch_id == $row['batch']){
          header('location: student_fatch_course.php');
        }
    }
    else{
      $search_error_mgs = "No Data Found From Database !";
    }
  }
  

?>

<!DOCTYPE html>
<html>
<head>
  <title>Student_Course</title>
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
            <a href="student_home.php" class="list_item_home">Home</a>
            <a href="student_result.php" class="list_item_home">Result</a>
            <a href="profile.php" class="list_item_home">Profile</a>
            <a href="student_course_request.php" class="list_item_home">Course Registration</a>
            <a href="class_routine.php" class="list_item_home">Class Routine</a>
            <a href="student_reset_pass.php" class="list_item_home">Change Password</a>
        </div>
    </div>
    <div id="container" class="right_part">
        <div id="welcome-message">
        <div id="container">
          <h3 style="padding:10px;border-bottom:2px solid rgb(17, 143, 143);color:rgb(17, 143, 143);">Course Information</h3>
          <form action="student_course_request.php" method="POST">
            <div  id="pro_border" class="profile_sec_1">
              <div class="search_box_middle">
                <label id="search_label"  for="username">Batch ID :</label>
                <input type="text" id="search_box" name="batch_id" placeholder="Batch ID" required>
                <input  type="submit" id="search_sub submit_shadow" name="submit" value="Search">
              </div>
            </div>
            <label style="color:red;display:inline;margin-left:20px"><?php if(isset($_POST['submit'])){echo $search_error_mgs;}?></label>
          </form>
        </div>
          </div>
    </div>
  </div>
  
  <div id="footer">
    &copy; 2023 Student Portal. All rights reserved.
  </div>
</body>
</html>
