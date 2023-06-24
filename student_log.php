<?php
session_start();

require('conn.php');

if(isset($_POST['submit'])){

  $s_id     = $_POST['s_id'];
  $password = $_POST['password'];

            $sql= "SELECT * FROM student_info WHERE student_id = '$s_id' AND pass= '$password'";
            $query = $conn->query($sql);
  if($query -> num_rows > 0)
  {
      $compear = $query-> FETCH_ASSOC();
    
      $_SESSION['student_log'] = $compear;
      header('location:student_home.php');
    
    
  }
  else{
    $error_mgs = "Wrong Combination !";
  }
}




?>



<!DOCTYPE html>
<html>
<head>
  <title>Student Portal</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div id="header">
    <div class="admin_class"><a href="admin_log.php">Admin</a></div>
    <a style="color:white" href="index.php"><h1>Student Portal</h1></a>
  </div>
    <div id="container" class="body_Container_size container_img" >
        <div id="welcome-message">
          <h2>Welcome to the Student Portal!</h2>
          
        </div>
      
      <div id="student-details">
        <div id="container_form">
          <h2 style="padding:10px;border-bottom:2px solid rgb(17, 143, 143);color:rgb(17, 143, 143);">Login</h2>
          <form action="student_log.php" method="POST">
            <label for="username">Student ID:</label>
            <input type="text" id="username" name="s_id" placeholder="Enter Student ID" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter Password" required>
            
            <input id="submit_shadow" type="submit" name="submit" value="Login">

            <label style="color:red;display:inline;margin-left:10px;margin-top:10px"><?php if(isset($_POST['submit'])){echo $error_mgs;}?></label>
          </form>
        </div>
      </div>
    </div>

  <div id="footer">
    &copy; 2023 Student Portal. All rights reserved.
  </div>
</body>
</html>
