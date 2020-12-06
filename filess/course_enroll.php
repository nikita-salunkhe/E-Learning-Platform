<?php
session_start();
$con=mysqli_connect('localhost','root','','Abhyuday');
//$user_name = $_SESSION['user_name'];

if(isset($_GET['enrolled']))
{
  if(!empty($_SESSION['user_name'])){
  $id = $_GET['enrolled'];
  $query1=$con->prepare("INSERT INTO `enrolled_courses`(`user_name`,`course_n`) VALUES (?,?)");
  $query1->bind_param("ss",$_SESSION['user_name'],$id);
  $query1->execute();
  echo '<script>alert("Course Enrolled sucessfully")</script>';
  $user_name = $_SESSION['user_name'];
  $_SESSION['user_name']= $user_name;
  header("refresh:0.1, url = Allcourses.php?course_page = $user_name");
}
else{
  header("refresh:0.1, url = Allcourses.php");
  echo '<script>alert("you are not logged in")</script>';

}
}
 ?>
