<?php
session_start();
$admin_fatch = $_SESSION['admin_log']['name'];
include('conn.php');
if(empty($_SESSION['admin_log']))
{
  header('location:admin_log.php');
}
if(isset($_POST['submit'])){
    $batch = $_POST['batch'];
    $course_id = $_POST['course_id'];
    $course_name = $_POST['course_name'];
    $credit = $_POST['credit'];
    $semester = $_POST['semester'];
    $schedule = $_POST['schedule'];
      $sql = " INSERT INTO course_offer(batch,semester,course_id,course_name,credit,schedule) VALUES ('$batch','$semester','$course_id','$course_name','$credit','$schedule')";
      $result = mysqli_query($conn,$sql);
      if($result == true){
        $conform_mgs = "Data Inserted";
        $_SESSION['batch_fatch_course'] = $batch;
      }else{
        $error_conform_mgs = "Data Not Inserted";
      }
    }

?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Course</title>
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
    <div id="container" class="right_part ">
        <div id="welcome-message">
        <div id="container" class="course_right_part">
          <h3 style="padding:10px;margin-bottom:10px;border-bottom:2px solid rgb(17, 143, 143);color:rgb(17, 143, 143);"> Add Course</h3>
          <form action="add_course.php" method="POST">
            <div  id="pro_border" class="profile_sec_1">
              <div class="course_box_middle">
                <label id="course_label"  for="batch_id">Batch ID </label>
                <select id="course_box" name="batch">
                  <option value="Select">Select Batch </option>
                  <option value="201">201</option>
                  <option value="202">202</option>
                  <option value="203">203</option>
                  <option value="211">211</option>
                  <option value="212">212</option>
                  <option value="213">213</option>
                  <option value="221">221</option>
                  <option value="222">222</option>
                  <option value="223">223</option>
                  <option value="231">231</option>
                  <option value="232">232</option>
                  <option value="233">233</option>
                </select>
                <label id="course_label"  for="batch_id">Course ID </label>
                <input id="course_box" type="text" name="course_id" placeholder="Course ID" required>
                <label id="course_label"  for="batch_id">Course Name </label>
                <input id="course_box" type="text" name="course_name" placeholder="Course Name" required>
                <label id="course_label"  for="batch_id">Semester </label>
                <select id="course_box" name="semester">
                  <option value="select">Select Semester</option>
                  <option value="Summer_20">Summer_20</option>
                  <option value="Spring_20">Spring_20</option>
                  <option value="Fall_20">Fall_20</option>
                  <option value="Summer_21">Summer_21</option>
                  <option value="Spring_21">Spring_21</option>
                  <option value="Fall_21">Fall_21</option>
                  <option value="Summer_22">Summer_22</option>
                  <option value="Spring_22">Spring_22</option>
                  <option value="Fall_22">Fall_22</option>
                  <option value="Summer_23">Summer_23</option>
                  <option value="Spring_23">Spring_23</option>
                  <option value="Fall_23">Fall_23</option>
                </select>
                <label id="course_label"  for="batch_id">Credit </label>
                <select id="course_box" name="credit">
                  <option value="Select"> Select Credit </option>
                  <option value="1.0">1</option>
                  <option value="1.5">1.5</option>
                  <option value="2.0">2</option>
                  <option value="2.5">2.5</option>
                  <option value="3.0">3</option>
                  <option value="3.5">3.5</option>
                  <option value="4.0">4</option>
                </select>
                <label id="course_label"  for="batch_id">Class Schedule </label>
                <select id="course_box" name="schedule">
                  <option value="select">Select Schedule</option>
                  <option value="Fri(08:00 AM - 09:30 AM) Sat(12:00 PM - 01:30 PM)">Fri(08:00 AM - 09:30 AM) Sat(12:00 PM - 01:30 PM)</option>
                  <option value="Fri(09:30 AM - 11:00 AM) Sat(08:00 AM - 09:30 AM)">Fri(09:30 AM - 11:00 AM) Sat(08:00 AM - 09:30 AM)</option>
                  <option value="Fri(02:00 PM - 03:30 PM) Sat(01:30 PM - 03:30 PM)">Fri(02:00 PM - 03:30 PM) Sat(01:30 PM - 03:30 PM)</option>
                  <option value="Mon(08:00 AM - 09:30 AM) Wed(12:00 PM - 01:30 PM)">Mon(08:00 AM - 09:30 AM) Wed(12:00 PM - 01:30 PM)</option>
                  <option value="Mon(09:30 AM - 11:00 AM) Wed(08:00 AM - 09:30 AM)">Mon(09:30 AM - 11:00 AM) Wed(08:00 AM - 09:30 AM)</option>
                  <option value="Mon(02:00 PM - 03:30 PM) Wed(01:30 PM - 03:30 PM)">Mon(02:00 PM - 03:30 PM) Wed(01:30 PM - 03:30 PM)</option>
                  <option value="Tue(08:00 AM - 09:30 AM) Thu(12:00 PM - 01:30 PM)">Tue(08:00 AM - 09:30 AM) Thu(12:00 PM - 01:30 PM)</option>
                  <option value="Tue(09:30 AM - 11:00 AM) Thu(08:00 AM - 09:30 AM)">Tue(09:30 AM - 11:00 AM) Thu(08:00 AM - 09:30 AM)</option>
                  <option value="Tue(02:00 PM - 03:30 PM) Thu(01:30 PM - 03:30 PM)">Tue(02:00 PM - 03:30 PM) Thu(01:30 PM - 03:30 PM)</option>
                  <option value="Mon(03:30 PM - 05:00 PM) Wed(03:30 PM - 05:00 PM)">Mon(03:30 PM - 05:00 PM) Wed(03:30 PM - 05:00 PM)</option>
                  <option value="Sat(03:30 PM - 05:00 PM) Tue(03:30 PM - 05:00 PM)">Sat(03:30 PM - 05:00 PM) Tue(03:30 PM - 05:00 PM)</option>
                  <option value="Thu(03:30 PM - 05:00 PM) Fri(03:30 PM - 05:00 PM)">Thu(03:30 PM - 05:00 PM) Fri(03:30 PM - 05:00 PM)</option>
                </select>
                <input style=" display:block;margin: 30px auto;" type="submit" id="submit_shadow" name="submit" value="Add Course">
              </div>
            </div>
            <label style="color:green;display:inline;margin-left:20px;margin-top:20px"><?php if(isset($_POST['submit']) && ($result == TRUE)){echo $conform_mgs;}?></label>
            <label style="color:red;display:inline;margin-left:20px;margin-top:20px"><?php if(isset($_POST['submit']) && ($result != TRUE)){echo $error_conform_mgs;}?></label>
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
