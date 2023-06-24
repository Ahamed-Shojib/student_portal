<?php
session_start();
$fatch = $_SESSION['student_log']['first_name'];

if(empty( $_SESSION['student_log'])){
  header('location:student_log.php');
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Student_Profile</title>
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
            <a href="profile.php?id=student_id" class="list_item_home">Profile</a>
            <a href="student_course_request.php" class="list_item_home">Course Registration</a>
            <a href="class_routine.php" class="list_item_home">Class Routine</a>
            <a href="student_reset_pass.php" class="list_item_home">Change Password</a>
        </div>
    </div>
    <div id="container" class="right_part">
        <div id="welcome-message">
            <h2 style="color:rgb(47, 218, 176);">Hello <?php echo $fatch;?></h2>
        </div>
        <div class="profile_edit">
          <a href="update_profile.php?"><input type="submit" value="Update Profile"></a>
        </div>
        <!-- Name and Department-->
        <div id="container">
          <h3 style="padding:10px;border-bottom:2px solid rgb(17, 143, 143);color:rgb(17, 143, 143);">Student Information</h3>
          <div  id="pro_border" class="profile_sec_1">
              <div class="name_id">
                <label for="name">Name : <p><?php echo $fatch." ".$_SESSION['student_log']['last_name'];?></p></label>
                <label for="id">Student ID : <p><?php echo $_SESSION['student_log']['student_id'];?></p></label>
              </div>
              <div class="dept_batch">
                <label for="dept">Department Name : <p><?php echo $_SESSION['student_log']['depart_name'];?></p></label>
                <label for="batch">Batch : <p><?php echo $_SESSION['student_log']['batch'];?></p></label>
              </div>
              <div id="dept_semister">
                <label for="dept">Semester : <p><?php echo $_SESSION['student_log']['semester'];?></p></label>
                <label for="section">Section : <p><?php echo $_SESSION['student_log']['section'];?></p></label>
              </div>
          </div>
        </div>

         <!-- Personal Address-->
         <div id="container">
            <h3 style="padding:10px;border-bottom:2px solid rgb(17, 143, 143);color:rgb(17, 143, 143);">Basic Information</h3>
            <div id="pro_border" class="profile_sec_1">
                <div id="name_id">
                  <label for="mail">Email : <p><a href="#"><?php echo $_SESSION['student_log']['email'];?></a></p></label>
                  <label for="dob">Date of Birth : <p><?php echo $_SESSION['student_log']['dob'];?></p></label>
                  <label for="mobile">Mobile Number : <p><?php echo $_SESSION['student_log']['mobile'];?></p></label>
                  <label for="gender">Gender : <p><?php echo $_SESSION['student_log']['gender'];?></p></label>
                  <label for="religion">Religion : <p><?php echo $_SESSION['student_log']['religion'];?></p></label>
                  <label for="nation">Nationality : <p><?php echo $_SESSION['student_log']['nation'];?></p></label>
                  <label for="blood">Blood Group : <p><?php echo $_SESSION['student_log']['blood'];?></p></label>
                  <label for="matrial_status">Matrial Status : <p><?php echo $_SESSION['student_log']['marit'];?></p></label>
                </div>
                <div  id="dept_batch">
                  <label for="father_name">Father Name : <p><?php echo $_SESSION['student_log']['father_n'];?></p></label>
                  <label for="father_profession">Father Profession : <p><?php echo $_SESSION['student_log']['father_pro'];?></p></label>
                  <label for="mother_name">Mother Name : <p><?php echo $_SESSION['student_log']['mother_n'];?></p></label>
                  <label for="mother_profession">Mother Profession : <p><?php echo $_SESSION['student_log']['mother_pro'];?></p></label>
                  <label for="gurdian_name">Gurdian Name : <p><?php echo $_SESSION['student_log']['gurdian_n'];?></p></label>
                  <label for="gurdian_number">Gurdian Number : <p><?php echo $_SESSION['student_log']['gurdian_phone'];?></p></label>
                  <label for="present_address">Present Address : <p><?php echo $_SESSION['student_log']['present_add'];?></p></label>
                  <label for="parmament_address">Parmament Address : <p><?php echo $_SESSION['student_log']['parmanent_add'];?></p></label>
                </div>
              </div>
          </div>

    </div>
  </div>
  
  <div id="footer">
    &copy; 2023 Student Portal. All rights reserved.
  </div>
</body>
</html>
