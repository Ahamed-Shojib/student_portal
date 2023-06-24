<?php
session_start();
//$schedule = $_SESSION['course']['schedule'];

if(empty( $_SESSION['student_log'])){
  header('location:student_log.php');
}

if($_GET['student_id']){
    $s_id = $_GET['student_id'];
    $sql = "INSERT INTO course_taken(student_id,course_id,course_name,credit) values('$student_id,$course_id','$course_name','$credit')";
    $query = $conn->query($sql);
}

?>
