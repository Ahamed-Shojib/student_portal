<?php

session_start();
$data_fatch = $_SESSION['fatch_data']['student_id'];
$admin_fatch = $_SESSION['admin_log']['name'];
//$student_fatch = $_SESSION['student_log']['first_name'];
require("conn.php");
if(empty($_SESSION['admin_log']))
{
  header('location:admin_log.php');
}
              if(isset($_POST['verify'])){
                $name = $_POST['name'];
                $student_id = $_POST['student_id'];
                $batch = $_POST['batch'];
                $depart_name = $_POST['depart_name'];
                $semester = $_POST['semester'];
                $section = $_POST['section'];
                    $sql = "UPDATE student_info SET first_name = '$name', student_id = '$student_id', batch = '$batch', depart_name = '$depart_name', semester = '$semester', section = '$section'  WHERE student_id = '$data_fatch' ";
                    $query = mysqli_query($conn,$sql);
                    $confirm_msg = "Congratulation! User Varified.";
                }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Verify Student</title>
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
        <div id="container">
          <h3 style="padding:10px;border-bottom:2px solid rgb(17, 143, 143);color:rgb(17, 143, 143);">Student Information</h3>
          <p style='color:green;font-weight:bold;text-align:center;margin-top:20px;'><?php if(isset($_POST['verify'])){ echo "$confirm_msg";}?></p>
          <form action="confirm_student.php" method="POST">
            <div  id="pro_border" class="profile_sec_1">
                <div class="name_id">
                    <label for="name">Name : <input class="profile_label" type="text" name="name" value="<?php echo $_SESSION['fatch_data']['first_name'];?>" ></label>
                    <label for="id">Student ID : <input class="profile_label"  type="text" name="student_id" value="<?php echo $_SESSION['fatch_data']['student_id'];?>" ></label>
                </div>
                <div class="dept_batch">
                    <label for="dept">Department Name : <input class="profile_label"  type="text" name="depart_name" value="<?php echo $_SESSION['fatch_data']['depart_name'];?>" ></label>
                    <label for="batch">Batch : <input class="profile_label"  type="text" name="batch" value="<?php echo $_SESSION['fatch_data']['batch'];?>" ></label>
                </div>
                <div id="dept_semister">
                        <label for="dept">Semester : <input class="profile_label"  type="text" name="semester" value="<?php echo $_SESSION['fatch_data']['semester'];?>" ></label>
                        <label for="batch">Section : <input class="profile_label"  type="text" name="section" value="<?php echo $_SESSION['fatch_data']['section'];?>" ></label>
                    </div>
            </div>
            <div class="log_to_portal">
                <label style="display:inline"><input id="submit_shadow" type="submit" name="back"<?php if(isset($_POST['back'])){ header('location:admin_conform.php'); }?> value="Back"></label>
                <input id="submit_shadow" type="submit" name="verify" value="Verify">
            </div>
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
