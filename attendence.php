<?php
session_start();
$fatch_course_taken = $_SESSION['fatch_student_info'];
include("conn.php");
if(empty($_SESSION['admin_log']))
{
  header('location:admin_log.php');
}
$present_date = date("Y-m-d");

?>

<!DOCTYPE html>
<html>
<head>
  <title>Attendence</title>
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
        <div id="attendence_body">
        <h3 style="padding:10px;border-bottom:2px solid rgb(17, 143, 143);color:rgb(17, 143, 143);text-align:center;font-size:25px">Student Attendence</h3>
        <div class="student_list">
                    <center>
                    
                      <form action="attendence.php" method="POST">
                            <label style="display:block;padding:10px;text-align:center;font-size:18px;color:#b90000;text-shadow:3px 2px 8px #b90033"><?php echo $present_date?></label>
                          <table>
                              <tr>
                                <th style="padding:10px 15px;background-color:#91e989a2;"> Student ID </th>
                                <th style="padding:10px 15px;background-color:#3a558ea1;"> Student Name </th>
                                <th style="padding:10px 15px;background-color:#90d98952;"> Course Name </th>
                                <th style="padding:10px 15px;background-color:#11c989a2;"> Attendence Section </th>
                              </tr>
                            
                              <?php
                                  $sql_attend = "SELECT * FROM student_info JOIN course_taken ON student_info.student_id = course_taken.student_id WHERE course_taken.course_id = '$fatch_course_taken'";
                                  $quary_attend = mysqli_query($conn,$sql_attend);
                                  if(mysqli_num_rows($quary_attend) > 0){
                                      while($fatch_attend = mysqli_fetch_assoc($quary_attend) ){
                                          $student_id = $fatch_attend['student_id'];
                                          $name = $fatch_attend['first_name'];
                                          $course_name = $fatch_attend['course_name'];
                                          $course_id = $fatch_attend['course_id'];
                              ?>
                              
                              <tr >
                                <td style="padding:10px 45px;background-color:#ccc;"><?php echo $student_id;?></td>
                                <td style="padding:10px 45px;background-color:#ccc;"><?php echo $name;?></td>
                                <td style="padding:10px 45px;background-color:#ccc;"><?php echo $course_name;?></td>
                                <td style="padding:10px 35px;background-color:#ccc;">
                                <input style="cursor:pointer" type="checkbox" name="present" value="1">  Present
                                <input style="cursor:pointer" type="checkbox" name="absent" value="0"> Absent </td>
                              </tr>
                              <?php
                              
                              }
                            }
                              ?>
                              <input style="cursor:pointer" type="checkbox" name="present" value="" checked hidden>  
                                <input style="cursor:pointer" type="checkbox" name="absent" value="" checked hidden> </td>

                            <?php

                                  $sql_attend = "SELECT * FROM student_info JOIN course_taken ON student_info.student_id = course_taken.student_id WHERE course_taken.course_id = '$fatch_course_taken'";
                                  $quary_attend = mysqli_query($conn,$sql_attend);
                                  if(mysqli_num_rows($quary_attend) > 0){
                                      while($fatch_attend = mysqli_fetch_assoc($quary_attend) ){
                                            $student_id = $fatch_attend['student_id'];
                                      ?>

                                        <?php
                                        if(isset($_POST['submit'])){
                                      
                                          $present = $_POST['present'];
                                          $absent = $_POST['absent'];
                                          if($present == true){
                                            $sql = "INSERT INTO attendence(student_id,course_id,p_date,	attendence) VALUES ('$student_id','$course_id','$present_date','present')";
                                            $result = mysqli_query($conn,$sql);
                                            $succeess_mgs = "Data Inserted";
                                          }elseif($absent == true){
                                            $sql = "INSERT INTO attendence(student_id,course_id,p_date,	attendence) VALUES ('$student_id','$course_id','$present_date','absent')";
                                            $result = mysqli_query($conn,$sql);
                                            $succeess_mgs = "Data Inserted";
                                          }
                                
                                          }
                                        }
                                      }
                              ?>
                          </table>
                          <input style="display:block;margin:20px auto;" type="submit" id="search_sub submit_shadow" name="submit" value="Submit">
                          <label style="color:red;display:block;margin:50px 20px;"><?php if(isset($_POST['submit'])){echo $succeess_mgs;}?></label>
                      </form>
                    </center>
        </div>

        </div>
    </div>
  </div>
  
  <div id="footer">
    &copy; 2023 Student Portal. All rights reserved.
  </div>
</body>
</html>
