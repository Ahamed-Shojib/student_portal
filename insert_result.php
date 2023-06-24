<?php
session_start();
$admin_fatch = $_SESSION['admin_log']['name'];
$student_fatch = $_SESSION['fatch_data']['student_id'];
include('conn.php');
if(empty($_SESSION['admin_log']))
{
  header('location:admin_log.php');
}
                
$sql = " SELECT * FROM course_taken WHERE student_id = '$student_fatch' ";
$result_check_std = mysqli_query($conn,$sql);
if(mysqli_num_rows($result_check_std) <= 0){

    $error_msg = "Sorry! This Student is Not Registared this Semister.";
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Insert Result</title>
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
        <div id="Container" class="">
          <h3 style="padding:10px;border-bottom:2px solid rgb(17, 143, 143);color:rgb(17, 143, 143);">Insert Course Marks</h3>
          <label style="color:red;display:block;margin-top:30px"><?php if(mysqli_num_rows($result_check_std) <= 0){echo $error_msg;}?></label>
          <form action="insert_result.php" method="POST">
            <div  id="pro_border" class="attend_sec_1">
              <div class="attend_box_middle">

                <!-- Fatch Student_ID,Btch,Section From "student_info" Data Table -->
                
                <?php
                if(isset($_POST['submit'])){
                    $student_id = $_POST['student_id'];
                    $batch = $_POST['batch_id'];
                    $section = $_POST['section'];
                    $course_id = $_POST['course_id'];
                    $marks = $_POST['marks'];
                    $semester = $_POST['semester'];
                
                        $already_sql = "SELECT student_id,course_id FROM result WHERE student_id='$student_fatch' AND course_id='$course_id'";
                        $already_result = mysqli_query($conn,$already_sql);
    
                    
                    if(mysqli_num_rows($already_result)>0){
                        echo"<p style='color:red;font-weight:bold;text-align:center;margin-bottom:20px;'>Markes Already Uploaded!</p>";
                    }else{
                      if($marks>100){
                        echo"<p style='color:red;font-weight:bold;text-align:center;margin-bottom:20px;''>Input Marks is grater then Limit.</p>";
                      }else{
                        
                            $sql = "INSERT INTO result(student_id,course_id,batch,section,marks,semester) VALUES ('$student_id','$course_id','$batch','$section','$marks','$semester')";
                            $result = mysqli_query($conn,$sql);
                            echo"<p style='color:green;font-weight:bold;text-align:center;margin-bottom:20px;''>Marks Inserted!</p>"; 

                                  if($marks<40){
                                      $sql_update_grade = "UPDATE result SET grade = 'F', points='0.00' WHERE course_id = '$course_id' AND student_id = '$student_id' ";
                                      $result_grade = mysqli_query($conn,$sql_update_grade);
                                  }
                                  elseif($marks>=40 && $marks<50){
                                      $sql_update_grade = "UPDATE result SET grade = 'D', points='2.00' WHERE course_id = '$course_id' AND student_id = '$student_id' ";
                                      $result_grade = mysqli_query($conn,$sql_update_grade);
                                  }
                                  elseif($marks>=50 && $marks<60){
                                      $sql_update_grade = "UPDATE result SET grade = 'C', points='2.50' WHERE course_id = '$course_id' AND student_id = '$student_id' ";
                                      $result_grade = mysqli_query($conn,$sql_update_grade);
                                  }
                                  elseif($marks>=60 && $marks<70){
                                      $sql_update_grade = "UPDATE result SET grade = 'B', points='3.00' WHERE course_id = '$course_id' AND student_id = '$student_id'";
                                      $result_grade = mysqli_query($conn,$sql_update_grade);
                                  }
                                  elseif($marks>=70 && $marks<80){
                                      $sql_update_grade = "UPDATE result SET grade = 'A', points='3.50' WHERE course_id = '$course_id' AND student_id = '$student_id'";
                                      $result_grade = mysqli_query($conn,$sql_update_grade);
                                  }
                                  elseif($marks>=80 && $marks<100){
                                      $sql_update_grade = "UPDATE result SET grade = 'A+', points='4.00' WHERE course_id = '$course_id' AND student_id = '$student_id'";
                                      $result_grade = mysqli_query($conn,$sql_update_grade);
                                  }

                      }        
                    }
                
                }
                ?>
                
                <?php

                    $sql = " SELECT * FROM student_info WHERE student_id = '$student_fatch' ";
                    $result = mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result) > 0){
                        while($course_fatch = mysqli_fetch_assoc($result) ){
                            $student_id = $course_fatch['student_id'];
                            $batch_id = $course_fatch['batch'];
                            $section = $course_fatch['section'];
                ?>
                <label id="search_label"  for="username">Student ID : </label>
                <input type="text" name="student_id" id="course_box" value="<?php echo $student_id?>" >
                <label id="search_label"  for="username">Batch ID : </label>
                <input type="text" name="batch_id" id="course_box" value="<?php echo $batch_id?>" >
                <label id="search_label"  for="username">Section : </label>
                <input type="text" name="section" id="course_box" value="<?php echo $section?>">

                <?php
                        }
                        
                    }
                ?>

                 <!-- Fatch Course_ID + Course_name From "course_taken" Data Table -->

                <label id="search_label"  for="username">Course ID : </label>
                <select id="course_box" name="course_id" required>
                <option value="Select_Course">Select_Course</option>

                <?php
                $sql = " SELECT * FROM course_taken WHERE student_id = '$student_fatch' ";
                $result = mysqli_query($conn,$sql);
                if(mysqli_num_rows($result) > 0){
                    while($course_fatch = mysqli_fetch_assoc($result) ){
                        $course_id = $course_fatch['course_id'];
                        $course_name = $course_fatch['course_name'];
                        $semester = $course_fatch['semester'];
                ?>
                  <option value="<?php echo "$course_id"?>"><?php echo"$course_id ($course_name)"?></option>

                <?php
                        }
                    }
                ?>
                </select>
                <label id="search_label"  for="username">Semester : </label>
                <input type="text" name="semester" id="course_box" value="<?php echo $semester?>" required>

                <label id="search_label"  for="username">Marks : </label>
                <input type="text" name="marks" id="course_box" placeholder="Input Marks" required>
                <input style="display:block;margin:20px auto;" type="submit" id="search_sub submit_shadow" name="submit" value="Submit">
              </div>
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
