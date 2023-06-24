<?php
session_start();
$fatch = $_SESSION['student_log']['student_id'];
include('conn.php');
if(empty($_SESSION['student_log']))
{
  header('location:student_log.php');
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Class Routin</title>
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
          <h3 style="padding:10px;border-bottom:2px solid rgb(17, 143, 143);color:rgb(17, 143, 143);">Class Routine</h3>
          <form action="class_routine.php" method="POST">
            <div  id="pro_border" class="profile_sec_1">
                  <div id="search_box_middle">
                  <center>
                      <table>
                          <tr>
                            <th style="padding:10px 15px;background-color:#a00e0ea1;"> Course Name </th>
                            <th style="padding:10px 15px;background-color:#3a558ea1;"> Course ID </th>
                            <th style="padding:10px 15px;background-color:#45a049a1;"> Schedule </th>
                          </tr>
                        
                        <?php 
                            $sql = "SELECT * FROM course_taken where student_id ='$fatch'";
                            $result = mysqli_query($conn,$sql);
                            if(mysqli_num_rows($result) > 0){
                                while($show = mysqli_fetch_assoc($result) ){
                                    $course_name = $show['course_name'];
                                    $course_id = $show['course_id'];
                                    $schedule = $show['schedule'];
                                
                          ?>
                          
                          <tr>
                            <td style="padding:10px 15px;background-color:#f1f1f1;"><?php echo $course_name?></td>
                            <td style="padding:10px 15px;background-color:#f1f1f1;"><?php echo $course_id?></td>
                            <td style="padding:10px 15px;background-color:#f1f1f1;"><?php echo $schedule?></td>
                          </tr>
                          <?php
                          }
                        }else{
                          $error_msg = "Sorry! No Course is taken.";
                        }
                          ?>
                      </table>
                      <label style="color:red;display:block;margin-top:30px"><?php if(mysqli_num_rows($result) <= 0){echo $error_msg;}?></label>
                      </center>
                </div>
            </div>
          </form>
          <div class="log_to_portal">
                <label id="submit_shadow" style="display:inline"><a href="student_course_request.php"><input type="submit" name="back" value="Back"></a></label>
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