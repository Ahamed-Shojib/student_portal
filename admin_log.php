<?php

session_start();
require("conn.php");


if(isset($_POST['submit'])){
  $email = $_POST['mail'];
  $pass = $_POST['password'];

    $sql_admin = " SELECT * FROM admin_info WHERE email = '$email' AND admin_pass = '$pass' ";
    $query_admin = $conn->query($sql_admin);
    if($query_admin -> num_rows > 0)
    {
      $admin_compear = $query_admin -> FETCH_ASSOC();
      $_SESSION['admin_log'] = $admin_compear;
      header('location:admin_home.php');
    }
    else{
      $error_mgs = "Wrong Combination !";
    }
  }

?>



<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div id="header">
    <div class="admin_class"><a href="student_log.php">User</a></div>
    <a style="color:white" href="index.php"><h1>Student Portal</h1></a>
  </div>
  
  <div id="container" class="body_Container_size container_img">
    <div id="welcome-message">
      <h2>Welcome to the Admin Pannel!</h2>
      
    </div>
    
    <div id="student-details">
      <div id="container_form">
      <h2 style="padding:10px;border-bottom:2px solid rgb(17, 143, 143);color:rgb(17, 143, 143);">Login</h2>
        <form action="admin_log.php" method="POST">
          <label for="username">Email:</label>
          <input type="text" id="username" name="mail" placeholder="Enter Admin Email" required>
          
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" placeholder="Enter Password" required>
          
          <input id="submit_shadow" type="submit" name="submit" value="Login">
          <label style="color:red;display:inline;margin-left:5px"><?php if(isset($_POST['submit'])){echo $error_mgs;}?></label>
          
        </form>
      </div>
    </div>
  </div>

  <div id="footer">
    &copy; 2023 Student Portal. All rights reserved.
  </div>
</body>
</html>
