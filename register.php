<?php
session_start();
$con=mysqli_connect('localhost','root','','Abhyuday');

if(isset($_POST['register_student']))
{

  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $dob=  $_POST['dob'];
  $state= $_POST['state'];
  $country=$_POST['country'];
  $gender=  $_POST['gender'];
  $disability= $_POST['disability'];
  $email=$_POST['email'];
  $mobno=  $_POST['mobno'];
  $user_name= $_POST['user_name'];
  $password=$_POST['password'];
  $pass=md5($password.$user_name);
  $query=$con->prepare("SELECT * FROM `user_info` WHERE `email`=?");
  $query->bind_param("s",$email);
  $query->execute();
  $run= $query->get_result();
  $row=$run->num_rows;
  	if($row==1)
    {
  	   echo '<script>alert("email already exists")</script>';
     }
    else {
      if(isset($_FILES['profile'])){
         $errors= array();
         $file_name = $_FILES['profile']['name'];
         $file_size =$_FILES['profile']['size'];
         $file_tmp =$_FILES['profile']['tmp_name'];
         $file_type=$_FILES['profile']['type'];
         $file_Ext=explode('.',$file_name);
         $file_ActualExt=mb_strtolower(end($file_Ext));
         $allowed=array('jpg','jpeg','png','pdf','docx','pptm','pptx');

         if(in_array($file_ActualExt,$allowed)=== false){
            $errors[]="extension not allowed, please choose a JPEG or PNG file.";
         }
         if($file_size > 2097152){
            $errors[]='File size must be excately 2 MB';
         }
         if(empty($errors)==true){
            move_uploaded_file($file_tmp,"uploads/".$file_name);

            $query2=$con->prepare("INSERT INTO `documents`(`user_name`,`profile`) VALUES (?,?)");
            $query2->bind_param("ss", $user_name,$file_name);
            $query2->execute();
         }else{
            print_r($errors);
         }
      }
            $query1=$con->prepare("INSERT INTO `user_info`(`fname`,`lname`, `dob`, `state`,`country`, `gender`, `disability`, `email`, `mobno`,`user_name`,`password`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
            $query1->bind_param("sssssssssss",$fname,$lname,$dob, $state,  $country,$gender,$disability,$email,$mobno, $user_name,$pass);
            $query1->execute();
            echo '<script>alert("registered sucessfully")</script>';
          
       }
       header('location:register_student.html');

    }
    if(isset($_POST['register_instructor']))
    {
      $fname=$_POST['fname'];
      $lname=$_POST['lname'];
      $state= $_POST['state'];
      $country=$_POST['country'];
      $gender=  $_POST['gender'];
      $email=$_POST['email'];
      $mobno=  $_POST['mobno'];
      $user_name= $_POST['user_name'];
      $password=$_POST['password'];
      $name_of_organization= $_POST['name_of_organization'];
      $designation=$_POST['designation'];
      $pass=md5($password.$user_name);
      $query=$con->prepare("SELECT * FROM `instructor_info` WHERE `email`=?");
      $query->bind_param("s",$email);
      $query->execute();
      $run= $query->get_result();
      $row=$run->num_rows;
      	if($row==1)
        {
      	   echo '<script>alert("email already exists")</script>';
         }
        else {
                $query1=$con->prepare("INSERT INTO `instructor_info`(`fname`,`lname`, `state`,`country`, `gender`, `email`, `mobno`,`user_name`,`password`,`name_of_organization`,`designation`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
                $query1->bind_param("sssssssssss",$fname,$lname, $state,  $country,$gender,$email,$mobno, $user_name,$pass, $name_of_organization, $designation);
                $query1->execute();
                echo '<script>alert("registered sucessfully")</script>';
           }
        }

// for login`
if(isset($_POST['confirm_student']))
{

  $user_name= $_POST['user_name'];
	$password= $_POST['password'];
  echo $user_name;
  echo $password;
  $_SESSION['user_name']=$user_name;
  $pass=md5($password.$user_name);
  $query=$con->prepare("SELECT * FROM `user_info` WHERE `user_name` = ?");
  $query->bind_param("s",$user_name);
  $query->execute();
  $run= $query->get_result();
  $row=$run->num_rows;
	if($row==1){
    $res=$run->fetch_assoc();
    if($res['password']==$pass){
	     header('location:profile_student.php');
     }
     else{
      echo '<script>alert("you entered Wrong password")</script>';
     }
  }
  else {
    echo '<script>alert("you have not yet Registered")</script>';
  }
}


if(isset($_POST['confirm_instructor']))
{

  $user_name= $_POST['user_name'];
	$password= $_POST['password'];
  echo $user_name;
  echo $password;
  $_SESSION['user_name']=$user_name;
  $pass=md5($password.$user_name);
  $query=$con->prepare("SELECT * FROM `instructor_info` WHERE `user_name` = ?");
  $query->bind_param("s",$user_name);
  $query->execute();
  $run= $query->get_result();
  $row=$run->num_rows;
	if($row==1){
    $res=$run->fetch_assoc();
    if($res['password']==$pass && $res['role'] == 1){
	     header('location:admin_job_soc.php');
     }
     else if($res['password']==$pass && $res['role'] == 0){
 	     header('location:profile_instructor.php');
      }
     else{
      echo '<script>alert("you entered Wrong password")</script>';
     }
  }
  else {
    echo '<script>alert("you have not yet Registered")</script>';
  }
}

?>
