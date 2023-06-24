<?php
session_start();
include('conn.php');
if(empty($_SESSION['admin_log']))
{
  header('location:admin_log.php');
}

if(isset($_POST["submit"])){
  $course = $_POST['course'];
  $sql = "SELECT * FROM course_taken WHERE course_id = '$course'";
  $quary = $conn->query($sql);
  if($quary-> num_rows > 0)
  {
    if(!empty($course)){
      $fatch_student_info_table = $quary-> FETCH_ASSOC();
      $_SESSION['fatch_student_info']= $fatch_student_info_table;
      header("location:attendence.php");
    }
    
  }else{
      $search_error_mgs = "No Data Found From Database !";
    }
    
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
          <h3 style="padding:10px;border-bottom:2px solid rgb(17, 143, 143);color:rgb(17, 143, 143);">Class Attendence Info</h3>
          <form action="attend_home.php" method="POST">
            <div  id="pro_border" class="attend_sec_1">
              <div class="attend_box_middle">

              <label id="search_label"  for="username">Course ID : </label>
                <select id="course_box" name="course">
                  <option value="Select"> Select Course </option>
                  
                  <?php
                      $sql_course = " SELECT * FROM course_offer ";
                      $result_course = mysqli_query($conn,$sql_course);
                      if(mysqli_num_rows($result_course) > 0){
                          while($course_fatch = mysqli_fetch_assoc($result_course) ){
                              $course_id = $course_fatch['course_id'];
                              $course_name = $course_fatch['course_name'];
                    ?>
                      <option value="<?php echo "$course_id"?>"><?php echo"$course_id ($course_name)"?></option>

                    <?php
                        }
                    }
                   ?>
                </select>
                <input style="display:block;margin:20px auto;" type="submit" id="search_sub submit_shadow" name="submit" value="Search">
              </div>
            </div>
          </form>
          <label style="color:red;display:inline;margin-left:20px"><?php if(isset($_POST['submit'])){echo $search_error_mgs;}?></label>
        </div>
          </div>
    </div>
  </div>
  
  <div id="footer">
    &copy; 2023 Student Portal. All rights reserved.
  </div>
</body>
</html>
