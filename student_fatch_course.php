<?php
session_start();

include('conn.php');
$fatch = $_SESSION['batch_fatch'];
$s_id = $_SESSION['student_log']['student_id'];

if(empty($_SESSION['student_log']))
{
  header('location:student_log.php');
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
          <h3 style="padding:10px;border-bottom:2px solid rgb(17, 143, 143);color:rgb(17, 143, 143);">Course Offer</h3>
          <form action="student_fatch_course.php" method="POST">
            <div  id="pro_border" class="profile_sec_1">
                  <div id="search_box_middle">
                    <center>
                      <form action="student_fatch_course.php" method="POST">
                      <table>
                          <tr>
                            <th style="padding:10px 15px;background-color:#ccc;"> Course Name </th>
                            <th style="padding:10px 15px;background-color:#f1f1f1;"> Course ID </th>
                            <th style="padding:10px 15px;background-color:#e4cfcf;"> Credit </th>
                            <th style="padding:10px 15px;background-color:#90d98952;"> Take Course </th>
                          </tr>
                        
                        <?php 

                            $sql = " SELECT * FROM course_offer WHERE batch = '$fatch' ";
                            $result = mysqli_query($conn,$sql);
                            if(mysqli_num_rows($result) > 0){
                                while($course_fatch = mysqli_fetch_assoc($result) ){
                                    $course_name = $course_fatch['course_name'];
                                    $course_id = $course_fatch['course_id'];
                                    $course_credit = $course_fatch['credit'];                        
                          ?>
                          
                          <tr>
                            <td style="padding:10px 15px;background-color:#ccc;"><?php echo $course_name?></td>
                            <td style="padding:10px 15px;background-color:#f1f1f1;"><?php echo $course_id?></td>
                            <td style="padding:10px 15px;background-color:#e4cfcf;"><?php echo $course_credit?></td>
                            <td style="padding:10px 15px;background-color:#90d98952;"><input type="submit" name="take" value="Take"></td>
                          </tr>
                          <?php
                          }
                        }
                        if(isset($_POST['take'])){
                            $already_sql = "SELECT student_id,course_id FROM course_taken WHERE student_id='$s_id' AND course_id='$course_id'";
                            $already_result = mysqli_query($conn,$already_sql);
                        
                            if(mysqli_num_rows($already_result)>0){
                                  echo"<p style='color:red;font-weight:bold;'>Course Already Taken!</p>";
                              }else{
                                if(isset($_POST['take'])){
                                  $sql = "INSERT INTO course_taken(course_id,course_name,credit,semester,schedule,price) SELECT course_id,course_name,credit,semester,schedule,price FROM course_offer WHERE batch = '$fatch'";
                                  $query = mysqli_query($conn,$sql);
                                  $update = "UPDATE course_taken SET student_id='$s_id' WHERE student_id = '0' ";
                                  $update_query = mysqli_query($conn,$update);
                                  echo"<p style='color:green;font-weight:bold;'>Course Taken Successfully!</p>";
                                }
                               
                              }
                            }
                          ?>
                      </table>
                      </form>
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