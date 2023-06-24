<?php
session_start();
$admin_fatch = $_SESSION['admin_log']['name'];
if(empty($_SESSION['admin_log']))
{
  header('location:admin_log.php');
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin_Home</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div id="header">
    <div class="admin_class"><a href="admin_logout.php">Logout</a></div>
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
        <div id="welcome-message">
        <h2 style="color:rgb(47, 218, 176);">Welcome <label style="color:red;display:inline;font-weight:bolder">Mr. <?php echo $admin_fatch;?> !</label></h2>
            <div class="home_img">
                <img src="https://static.vecteezy.com/system/resources/thumbnails/001/313/793/small/teacher-with-books-and-chalkboard-video-lesson-vector.jpg" alt="">
            </div>
          </div>
    </div>
  </div>
  
  <div id="footer">
    &copy; 2023 Student Portal. All rights reserved.
  </div>
</body>
</html>
