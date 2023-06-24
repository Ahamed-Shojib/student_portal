<?php
session_start();
$fatch = $_SESSION['student_log']['first_name'];

if(empty( $_SESSION['student_log'])){
  header('location:student_log.php');
}
require("conn.php");

if(isset($_POST['submit'])){
   $email        = $_POST['email'];
   $dob          = $_POST['dob'];
   $mobile       = $_POST['mobile'];
   $gender       = $_POST['gender'];
   $religion     = $_POST['religion'];
   $nation       = $_POST['nation'];
   $blood        = $_POST['blood'];
   $marit        = $_POST['marit'];
   $father_name  = $_POST['father_name'];
   $father_pro   = $_POST['father_pro'];
   $mother_name  = $_POST['mother_name'];
   $mother_pro   = $_POST['mother_pro'];
   $gurdian_name = $_POST['gurdian_name'];
   $gurdian_num  = $_POST['gurdian_num'];
   $present_add  = $_POST['present_add'];
   $parmament_address = $_POST['parmament_address'];

   /**/
            $sql = "UPDATE student_info SET  email ='$email', mobile ='$mobile',dob ='$dob', mobile ='$mobile', gender ='$gender', religion ='$religion', nation ='$nation', blood ='$blood', marit ='$marit', father_n ='$father_name', father_pro ='$father_pro', mother_n ='$mother_name', mother_pro ='$mother_pro', gurdian_n ='$gurdian_name', gurdian_phone ='$gurdian_num', present_add ='$present_add', parmanent_add ='$parmament_address' WHERE first_name='$fatch'";
            $query = mysqli_query($conn,$sql);
            $update_mgs = "Congratulation! Profile Updated.";

}
   
/*
$sql_update_profile = " SELECT * FROM student_info";  AND first_name ='$name' AND depart_name = '$depart_name' AND batch = '$batch' AND email ='$email' AND dob ='$dob' AND mobile ='$mobile' AND gender ='$gender' AND religion ='$religion' AND nation ='$nation' AND blood ='$blood' AND marit ='$marit' AND father_n ='$father_name' AND father_pro ='$father_pro' AND mother_n ='$mother_name' AND mother_pro ='$mother_pro' AND gurdian_n ='$gurdian_name' AND gurdian_phone ='$gurdian_num' AND present_add ='$present_add' AND parmanent_add ='$parmament_address' ";

   $query_update_profile = $conn->query($sql_update_profile);
   $data = mysqli_fetch_assoc($query_update_profile);
   echo $data['depart_name'];
*/




?>



<!DOCTYPE html>
<html>
<head>
  <title>Update_Profile</title>
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
            <h2 style="color:rgb(47, 218, 176);">Hello <?php echo $fatch;?></h2>
        </div>
        
        <form action="update_profile.php" method="POST">
        <!-- Name and Department-->
            <div id="container">
                <h3 style="padding:10px;border-bottom:2px solid rgb(17, 143, 143);color:rgb(17, 143, 143);">Student Information</h3>
                <div  id="pro_border" class="profile_sec_1">
                    <div class="name_id">
                        <label for="name">Name : <input class="profile_label" type="text" name="name" value="<?php echo $fatch." ".$_SESSION['student_log']['last_name'];?>" disabled></label>
                        <label for="id">Student ID : <input class="profile_label"  type="text" name="student_id" value="<?php echo $_SESSION['student_log']['student_id'];?>" disabled></label>
                    </div>
                    <div class="dept_batch">
                        <label for="dept">Department Name : <input class="profile_label"  type="text" name="depart_name" value="<?php echo $_SESSION['student_log']['depart_name'];?>" disabled></label>
                        <label for="batch">Batch : <input class="profile_label"  type="text" name="batch" value="<?php echo $_SESSION['student_log']['batch'];?>" disabled></label>
                    </div>
                    <div id="dept_semister">
                        <label for="dept">Semester : <input class="profile_label"  type="text" name="semester" value="<?php echo $_SESSION['student_log']['semester'];?>" disabled></label>
                        <label for="batch">Section : <input class="profile_label"  type="text" name="section" value="<?php echo $_SESSION['student_log']['section'];?>" disabled></label>
                    </div>
                </div>
            </div>

            <!-- Personal Address-->
            <div id="container">
                <h3 style="padding:10px;border-bottom:2px solid rgb(17, 143, 143);color:rgb(17, 143, 143);">Basic Information</h3>
                <div id="pro_border" class="profile_sec_1">
                    <div class="name_id">
                    <label for="mail">Email : <input class="profile_label" type="text" name="email" value="<?php echo $_SESSION['student_log']['email'];?>"></label>
                    <label for="dob">Date of Birth : <input class="profile_label" type="date" name="dob" value="<?php echo $_SESSION['student_log']['dob'];?>"></label>
                    <label for="mobile">Mobile Number : <input class="profile_label" type="text" name="mobile" value="<?php echo $_SESSION['student_log']['mobile'];?>"></label>
                    <label for="gender">Gender : <input class="profile_label" type="text" name="gender" value="<?php echo $_SESSION['student_log']['gender'];?>"></label>
                    <label for="religion">Religion : <input class="profile_label" type="text" name="religion" value="<?php echo $_SESSION['student_log']['religion'];?>"></label>
                    <label for="nation">Nationality : <input class="profile_label" type="text" name="nation" value="<?php echo $_SESSION['student_log']['nation'];?>"></label>
                    <label for="blood">Blood Group : <input class="profile_label" type="text" name="blood" value="<?php echo $_SESSION['student_log']['blood'];?>"></label>
                    <label for="matrial_status">Matrial Status : <input class="profile_label" type="text" name="marit" value="<?php echo $_SESSION['student_log']['marit'];?>"></label>
                    </div>
                    <div  class="dept_batch">
                    <label for="father_name">Father Name : <input class="profile_label" type="text" name="father_name" value="<?php echo $_SESSION['student_log']['father_n'];?>"></label>
                    <label for="father_profession">Father Profession : <input class="profile_label" type="text" name="father_pro" value="<?php echo $_SESSION['student_log']['father_pro'];?>"></label>
                    <label for="mother_name">Mother Name : <input class="profile_label" type="text" name="mother_name" value="<?php echo $_SESSION['student_log']['mother_n'];?>"></label>
                    <label for="mother_profession">Mother Profession : <input class="profile_label" type="text" name="mother_pro" value="<?php echo $_SESSION['student_log']['mother_pro'];?>"></label>
                    <label for="gurdian_name">Gurdian Name : <input class="profile_label" type="text" name="gurdian_name" value="<?php echo $_SESSION['student_log']['gurdian_n'];?>"></label>
                    <label for="gurdian_number">Gurdian Number : <input class="profile_label" type="text" name="gurdian_num" value="<?php echo $_SESSION['student_log']['gurdian_phone'];?>"></label>
                    <label for="present_address">Present Address : <input class="profile_label" type="text" name="present_add" value="<?php echo $_SESSION['student_log']['present_add'];?>"></label>
                    <label for="parmament_address">Parmament Address : <input class="profile_label" type="text" name="parmament_address" value="<?php echo $_SESSION['student_log']['parmanent_add'];?>"></label>
                    </div>
                </div>
            </div>
            <div class="profile_Update">
                <input type="submit" name="submit" value="Update Profile">
                <label style="color:green;display:block;margin-left:15px;margin-top:10px;"><?php if(isset($_POST['submit'])){echo $update_mgs;}?></label>
            </div>
          </form>
    </div>
  </div>
  
  <div id="footer">
    &copy; 2023 Student Portal. All rights reserved.
  </div>
</body>
</html>
