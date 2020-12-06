<?php
session_start();
$con=mysqli_connect('localhost','root','','Abhyuday');
$user_name = $_SESSION['user_name'];

if(isset($_POST['submit']))
{
  $course_name=$_POST['course_name'];
  $course_description= $_POST['course_description'];
  $course_duration=$_POST['course_duration'];
  $course_link=$_POST['course_link'];
  $course_fees=$_POST['course_fees'];
  $applicable_for=  $_POST['applicable_for'];
  $user_name = $_SESSION['user_name'];

        $query1=$con->prepare("INSERT INTO `courses`(`course_name`,`course_description`,`course_duration`, `course_link`, `course_fees`,`Applicable_for`,`user_name`) VALUES (?,?,?,?,?,?,?)");
        $query1->bind_param("sssssss",$course_name, $course_description,$course_duration,$course_link, $course_fees,  $applicable_for, $user_name);
        $query1->execute();
        echo '<script>alert("registered sucessfully")</script>';
  }

  if(isset($_POST['submit_scholarship']))
  {
    $name_of_scholarship =$_POST['name_of_scholarship'];
    $scholarship_description=  $_POST['scholarship_description'];
    $condition_for_applying=  $_POST['condition_for_applying'];
    $applicable_for= $_POST['applicable_for'];
    $scholarship_link=$_POST['scholarship_link'];
    $last_date=$_POST['last_date'];
    $user_name = $_SESSION['user_name'];


          $query1=$con->prepare("INSERT INTO `scholarship`(`name_of_scholarship`,`scholarship_description`, `condition_for_applying`, `applicable_for`,`scholarship_link`,`last_date`,`user_name`) VALUES (?,?,?,?,?,?,?)");
          $query1->bind_param("sssssss",$name_of_scholarship, $scholarship_description, $condition_for_applying, $applicable_for,  $scholarship_link, $last_date,$user_name);
          $query1->execute();
          echo '<script>alert("registered sucessfully")</script>';
         }

if(isset($_POST['submit_jobs']))
      {
    $name_of_company=$_POST['name_of_company'];
    $designation=  $_POST['designation'];
    $job_description= $_POST['job_description'];
    $skills_required=  $_POST['skills_required'];
    $applicable_for=$_POST['applicable_for'];
    $location= $_POST['location'];
    $stipend=$_POST['stipend'];
    $last_date=$_POST['last_date'];
    $link=$_POST['link'];
    $user_name = $_SESSION['user_name'];
            $query1=$con->prepare("INSERT INTO `jobs`(`name_of_company`,`designation`, `job_description`, `skills_required`,`applicable_for`, `location`, `Stipend`, `last_date`,`link`, `user_name`) VALUES (?,?,?,?,?,?,?,?,?,?)");
            $query1->bind_param("ssssssssss",$name_of_company, $designation, $job_description, $skills_required,  $applicable_for, $location, $Stipend, $last_date, $link, $user_name);
            $query1->execute();
            echo '<script>alert("registered sucessfully")</script>';
      }

  $query_c=$con->prepare("SELECT * FROM `courses` WHERE `user_name`= '$user_name'");
  $query_c->execute();
  $run_c= $query_c->get_result();

  $query_s=$con->prepare("SELECT * FROM `scholarship` WHERE `user_name`= '$user_name'");
  $query_s->execute();
  $run_s= $query_s->get_result();

  $query_j=$con->prepare("SELECT * FROM `jobs` WHERE `user_name`= '$user_name'");
  $query_j->execute();
  $run_j= $query_j->get_result();
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Profile instructor</title>
      <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.jpg">
    <link rel="stylesheet" type="text/css" href="../assets/libs/select2/dist/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/libs/jquery-minicolors/jquery.minicolors.css">
    <link rel="stylesheet" type="text/css" href="../assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/libs/quill/dist/quill.snow.css">
    <link href="../dist/css/style.min.css" rel="stylesheet">

<style type="text/css">
.whole{
  background-color: #FFFFFF;
}
.boxx{
box-shadow: 10px 10px grey;
}
.card{
    border-radius: 4px;
    background: #fff;
    box-shadow: 0 6px 10px rgba(0,0,0,.08), 0 0 6px rgba(0,0,0,.05);
      transition: .3s transform cubic-bezier(.155,1.105,.295,1.12),.3s box-shadow,.3s -webkit-transform cubic-bezier(.155,1.105,.295,1.12);
  padding: 14px 80px 18px 36px;
  cursor: pointer;
}
.card:hover{
     transform: scale(1.05);
  box-shadow: 0 10px 20px rgba(0,0,0,.12), 0 4px 8px rgba(0,0,0,.06);
}
.card h3{
  font-weight: 600;
}
.card img{
  position: absolute;
  top: 20px;
  right: 15px;
  max-height: 120px;
}
.card-1{
  background-image: url(https://cdn.dnaindia.com/sites/default/files/styles/full/public/2018/09/05/726641-online-coursethinkstockphotos.jpg);
      background-repeat: no-repeat;
    background-position: right;
    background-size: 1300px;
    backface-visibility: ;
    height: 10rem;
}
.card-2{
      background-image: url(https://th.bing.com/th/id/OIP.E4lar9PM9mMhq0bIpq9VoQHaHa?pid=Api&rs=1);
          background-repeat: no-repeat;
        background-position: right;
        background-size: 600px;
        backface-visibility: ;
        height: 30rem;
    }

.card-3{
       background-image: url(https://th.bing.com/th/id/OIP.Ok5ZF2jfiziJYqwZAyHSzQHaHa?pid=Api&rs=1);

          background-repeat: no-repeat;
        background-position: left;
        background-size: 600px;
        height: 30rem;
    }

@media(max-width: 990px){
  .card{
    margin: 20px;
  }
}
</style>
</head>
<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" class="whole">
        <header class="topbar" data-navbarbg="skin5">
          <nav class="navbar top-navbar navbar-expand-md navbar-dark">
              <div class="navbar-header" data-logobg="dark">
                  <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                  <a class="navbar-brand" href="">
                      <b class="logo-icon p-l-10">
                           <img src="../assets/images/favicon.jpg" alt="user" class="rounded-circle" width="31"></b>
                            <span class="logo-text">
                            <h2>Shiksha</h2>
                    </a>
                  <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
              </div>
              <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                  <ul class="navbar-nav float-left mr-auto">
                    <li class="nav-item dropdown">
                      <center><h4 style =" color: white">Choose the language</h4>
                      <div id="google_translate_element"></div>
                      <script type="text/javascript">
                      function googleTranslateElementInit() {
                        new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
                      }
                      </script>
                      <script type="text/javascript" src="language_translation.js"></script>
                    </center>
                    </li>
                  </ul>
                  <ul class="navbar-nav float-right">
                    <li class="nav-item dropdown">
                        <h4><a class="nav-link  waves-effect waves-dark"><i class="ti-user m-r-5 m"></i>
                         <?php echo $user_name ?></a></h4>
                    </li>
                    <li class="nav-item dropdown">
                      <h4><a class="nav-link  waves-effect waves-dark" >
                      </a></h4>
                    </li>
                      <li class="nav-item dropdown">
                        <h4><a class="nav-link  waves-effect waves-dark" href="home.php" ><i class="mdi mdi-home font-24"></i> Log out
                        </a></h4>
                      </li>
                  </ul>
              </div>
            </nav>
      </header>
      <aside class="left-sidebar" data-sidebarbg="skin5">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="personal.php" aria-expanded="false"><i class="ti-user m-r-5 m"></i><span class="hide-menu">personal info</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false"><span class="hide-menu"><h4>See your status of:</h4></span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#course_status" aria-expanded="false"><i class="mdi mdi-laptop"></i><span class="hide-menu">Submitted Courses</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#job_status" aria-expanded="false"><i class="mdi mdi-laptop"></i><span class="hide-menu">Submitted Scholarships</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#job_status" aria-expanded="false"><i class="mdi mdi-laptop"></i><span class="hide-menu">Submitted Jobs</span></a></li>
                    </ul>
                </nav>
            </div>
        </aside>
<main>
          <div class="page-wrapper" style= "background-color: white;">
             <div class="container-fluid">
                <div class="row">
                    <div class="col-12 align-items-center">
                        <div class="card card-1">
                            <center><h1>Add Courses</h1></center>
                               <div style="text-align: center;">
                                  <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#courses">Add Courses</a>
                                </div>
                            </div>
                      </div>
                  </div>


                  <br>
                  <br>
              <div class="row">
                <div class="col-1 align-items-center"></div>
                    <div class="col-4 align-items-center">
                        <div class="card card-2">
                            <center><h3>Add Jobs</h3></center>
                                <div style="text-align: right;">
                                    <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#jobs">Add Jobs</a>
                                </div>
                          </div>

                          <!--jobs-->
                          <div class="modal fade courses" id="jobs" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                           <div class="modal-dialog modal-lg">
                            <div class="boxx modal-content" style="background: AliceBlue">
                             <div class="modal-header">
                               <h3 class="text-dark" style= "padding:10px;color:black;">Jobs details</h3>
                               <button type="button" class="close" data-dismiss="modal">&times</button>
                             </div>

                                <div class="modal-body mx-3">
                                  <form action="" method="post" name="login" class="needs-validation">
                                   <div class="md-form mb-5">
                                     <i class="fas fa-user prefix grey-text"></i>
                                     <label data-error="wrong" data-success="right" for="form34">Name of Company</label>
                                     <input type="text" style="border: 0.5px solid gray;color:black;" name ="name_of_company" id="form34" class="form-control ">
                                   </div>

                                   <div class="md-form mb-5">
                                     <i class="fas fa-user prefix grey-text"></i>
                                     <label data-error="wrong" data-success="right" for="form34">Designation</label>
                                     <input type="text"style="border: 0.5px solid gray;color:black;"  name ="designation" id="form34" class="form-control ">
                                   </div>

                                   <div class="md-form mb-5">
                                    <label data-error="wrong" data-success="right" for="form32">Job Description</label>
                                    <textarea type="text" id="form8" style="border: 0.5px solid gray;color:black;" name= "job_description" class="md-textarea form-control" rows="4"></textarea>
                                   </div>

                                   <div class="md-form mb-5">
                                    <label data-error="wrong" data-success="right" for="form32">Skills Required</label>
                                    <textarea type="text" id="form8" style="border: 0.5px solid gray;color:black;" name="skills_required" class="md-textarea form-control" rows="4"></textarea>
                                   </div>

                                   <div class="md-form">
                                     <div class="form-group">
                                       <label for="inputState">Applicable for</label>
                                       <select id="inputState" style="border: 0.5px solid gray;color:black;" name ="applicable_for" class="form-control" onchange="selected()">
                                         <option selected>All</option>
                                         <option value="Blind" >Blind</option>
                                         <option value="Deaf" >Deaf</option>
                                         <option value="Dumb" >Dumb</option>
                                         <option value="Handicapped" >Handicapped</option>
                                       </select>
                                     </div>
                                   </div>
                                     <div class="md-form">
                                     <label data-error="wrong" data-success="right" for="form8">Location</label>
                                      <input type="text" id="form29"style="border: 0.5px solid gray;color:black;"  name ="location" class="form-control " >

                                    <div class="md-form">
                                     <label data-error="wrong" data-success="right" for="form8">Stipend</label>
                                      <input type="text" id="form29" style="border: 0.5px solid gray;color:black;" name="stipend" class="form-control " >

                                   </div>
                                   <div class="md-form">
                                     <label data-error="wrong" data-success="right" for="form8">Apply by Date :</label>
                                      <input type="date" id="form29"style="border: 0.5px solid gray;color:black;"  name="last_date" class="form-control " >

                                   </div>
                                   <div class="md-form mb-5">
                                    <label data-error="wrong" data-success="right" for="form32">Link for apply</label>
                                    <input type="text" id="form8" style="border: 0.5px solid gray;color:black;" name= "link" class="form-control " >
                                   </div>

                                 </div>
                                 <div class="modal-footer d-flex justify-content-center">
                                   <input type = "submit" class="btn btn-unique" name ="submit_jobs"><i class="fas fa-paper-plane-o ml-1"></i></button>
                                 </div>
                               </form>
                            </div>
                          </div>
                          </div>
                          </div>
                          <!--jobs end-->
                      </div>
                    <div class="col-2 align-items-center"></div>
                          <div class="col-4 align-items-center">
                              <div class="card card-3">
                                  <center><h3>Add Scholarship</h3></center>
                                   <br>
                                   <br>
                                   <br>
                                   <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#scholarships">Add Scholarship</a>
                                </div>
                            </div>
                            <!--scholarships-->
                            <div class="modal fade courses" id="scholarships" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                             <div class="modal-dialog modal-lg">
                              <div class="boxx modal-content" style="background: AliceBlue">
                               <div class="modal-header">
                                 <h3 class="text-dark" style= "padding:10px;color:black;">Scholarship details</h3>
                                 <button type="button" class="close" data-dismiss="modal">&times</button>
                               </div>

                                  <div class="modal-body mx-3">
                                    <form action="" method="post" name="login" class="needs-validation">
                                   <div class="modal-body mx-3">
                                     <div class="md-form mb-5">
                                       <i class="fas fa-user prefix grey-text"></i>
                                       <label data-error="wrong" data-success="right" for="form34">Name of Scholorship</label>
                                       <input type="text" id="form34" style="border: 0.5px solid gray;color:black;" name="name_of_scholarship" class="form-control ">
                                     </div>

                                     <div class="md-form mb-5">
                                       <i class="fas fa-envelope prefix grey-text"></i>
                                       <label data-error="wrong" data-success="right" for="form29">Scholarship Description</label>
                                       <textarea type="text" id="form29" style="border: 0.5px solid gray;color:black;" name ="scholarship_description" class="form-control " class="md-textarea form-control" rows="4"></textarea>
                                    </div>
                                    <div class="md-form mb-5">
                                      <i class="fas fa-envelope prefix grey-text"></i>
                                      <label data-error="wrong" data-success="right" for="form29">Conditions for applying</label>
                                      <textarea type="text" id="form29" style="border: 0.5px solid gray;color:black;" name ="condition_for_applying" class="form-control " class="md-textarea form-control" rows="4"></textarea>
                                   </div>

                                     <div class="md-form">
                                       <div class="form-group">
                                         <label for="inputState">Applicable for</label>
                                         <select id="inputState" style="border: 0.5px solid gray;color:black;" name ="applicable_for" class="form-control" onchange="selected()">
                                           <option selected>All</option>
                                           <option value="Blind" >Blind</option>
                                           <option value="Deaf" >Deaf</option>
                                           <option value="Dumb" >Dumb</option>
                                           <option value="Dumb" >Handicapped</option>
                                        </select>
                                      </div>
                                    </div>

                                      <div class="md-form">
                                       <label data-error="wrong" data-success="right" for="form8">Link for more details :</label>
                                        <input type="text" id="form29" style="border: 0.5px solid gray;color:black;" name="scholarship_link" class="form-control " >
                                     </div>

                                      <div class="md-form">
                                       <label data-error="wrong" data-success="right" for="form8">Apply by date :</label>
                                        <input type="date" id="form29" style="border: 0.5px solid gray;color:black;" name="last_date" class="form-control " >
                                     </div>

                                   </div>
                                   <div class="modal-footer d-flex justify-content-center">
                                     <input type="submit" name ="submit_scholarship" class="btn btn-success btn-lg"><i class="fas fa-paper-plane-o ml-1"></i></button>
                                   </div>
                                 </form>
                              </div>
                            </div>
                            </div>
                            </div>
                            <!--scholarship end-->
                      </div>
<br>
<br>
  <div class="row" id="course_status">
      <div class="col-1 align-items-center"></div>
      <div class="col-10 align-items-center">
        <center><h3><b> Registered  Courses</b></h3></center>
        <table class="table table-hover table table-bordered table table-striped table table-hover">
          <thead>
            <tr>
              <b><th scope="col">Sr No.</th></b>

              <th scope="col">Course Name</th>

              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
      <b><?php
      $i=0;
         while($res_c=$run_c->fetch_assoc())
        {
            $i=$i+1;?>
            <tr>

              <td><?php echo $i?></td>
              <td><?php echo $res_c['course_name']?></td>

              <td><?php
               if($res_c['Flag']==1)
                 echo "Accepted";
              else if($res_c['Flag']==-1)
                  echo "Rejected";
              else
                  echo "Pending";

                ?></td>

            </tr>
            <?php
          }
          ?></b>
          </tbody>
        </table>
      </div>
      <div class="col-1 align-items-center"></div>
        </div>
    </div>
<br>
<br>
  <div class="row" id="job_status">
      <div class="col-1 align-items-center"></div>
      <div class="col-5 align-items-center">
        <center><h3><b> Registered  Jobs</b></h3></center>
        <table class="table table-hover table table-bordered table table-striped table table-hover">
          <thead>
            <tr>
              <th scope="col">Sr No.</th>
              <th scope="col">Company Name</th>

              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
      <?php
      $i=0;
         while($res_j=$run_j->fetch_assoc())
        {
            $i=$i+1;?>
            <tr>

              <td><?php echo $i?></td>
              <td><?php echo $res_j['name_of_company']?></td>

              <td><?php
               if($res_j['flag']==1)
                 echo "Accepted";
              else if($res_j['flag']==0)
                  echo "Pending";
                  else{
                    echo "Rejected";
                  }
                ?></td>

            </tr>
            <?php
          }
          ?>
          </tbody>
        </table>
      </div>
      <div class="col-5 align-items-center">
        <center><h3><b> Registered  Scholarships</b></h3></center>
        <table class="table table-hover table table-bordered table table-striped table table-hover">

          <thead >

            <tr>
              <th scope="col">Sr No.</th>
              <th scope="col">Scholarship Name</th>

              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
      <?php
      $i=0;
         while($res_s=$run_s->fetch_assoc())
        {
            $i=$i+1;?>
            <tr>

              <td><?php echo $i?></td>
              <td><?php echo $res_s['name_of_scholarship']?></td>

              <td><?php
               if($res_s['flag']==1)
                 echo "Accepted";
              else if($res_s['flag']==0)
                  echo "Pending";
                  else{
                    echo "Rejected";
                  }
                ?></td>

            </tr>
            <?php
          }
          ?>
          </tbody>
        </table>
      </div>
      <div class="col-1 align-items-center"></div>
        </div>
    </div>

 </div>
 </div>
</div>


</main>
<!-- courses-->
<div class="modal fade courses" id="courses" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-lg">
  <div class="boxx modal-content" style="background: AliceBlue">
   <div class="modal-header">
     <h3 class="text-dark" style= "padding:10px;color:black;">Course details</h3>
     <button type="button" class="close" data-dismiss="modal">&times</button>
   </div>

      <div class="modal-body mx-3">
        <form action="#" method="post" sname="login" class="needs-validation">
          <div class="md-form mb-5">
            <i class="fas fa-user prefix grey-text"></i>
            <label data-error="wrong" data-success="right" for="form34"><h5>Course Name</h4></label>
            <input type="text" id="form34" style="border: 0.5px solid gray;color:black;" name ="course_name" style="border: 0.5px solid gray;color:black;" class="form-control ">
          </div>

          <div class="md-form mb-5">
            <i class=""></i>
           <label data-error="wrong" data-success="right" for="form32"><h5>Course Descriptionn</h5></label>
           <textarea type="text" id="form8" style="border: 0.5px solid gray;color:black;" name="course_description" style="border: 0.5px solid gray;color:black;" class="md-textarea form-control" rows="4"></textarea>
          </div>

          <div class="md-form mb-5">
            <i class=""></i>
            <label data-error="wrong" data-success="right" for="form29"><h5>Course Duration</h5></label>
            <input type="text" id="form29" style="border: 0.5px solid gray;color:black;" name="course_duration" style="border: 0.5px solid gray;color:black;" class="form-control " >
            </div>

            <div class="md-form mb-5">
              <i class=""></i>
              <label data-error="wrong" data-success="right" for="form29"><h5>Link of course</h5></label>
              <input type="text" id="form29" style="border: 0.5px solid gray;color:black;" name="course_link" style="border: 0.5px solid gray;color:black;" class="form-control " >
            </div>

            <div class="md-form mb-5">
              <i class=""></i>
              <label data-error="wrong" data-success="right" for="form29"><h5>Course Fee</h5></label>
              <input type="text" id="form29" style="border: 0.5px solid gray;color:black;" name="course_fees" style="border: 0.5px solid gray;color:black;" class="form-control " >
            </div>


            <div class="md-form">
              <div class="form-group">
                <label for="inputState">Applicable for</label>
                <select id="inputState" style="border: 0.5px solid gray;color:black;" name ="applicable_for" class="form-control" onchange="selected()">
                  <option selected>All</option>
                  <option value="Blind" >Blind</option>
                  <option value="Deaf" >Deaf</option>
                  <option value="Dumb" >Dumb</option>
                  <option value="Dumb" >Handicapped</option>
               </select>
             </div>

        <div class="modal-footer d-flex justify-content-center">
          <button type="submit"style="border: 0.5px solid gray;color:black;"  name ="submit" class="btn btn btn-success">Add</button>
        </div>
      </div>
      </div>
     </form>
  </div>
</div>
<!--jobs-->


    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../assets/extra-libs/sparkline/sparkline.js"></script>
    <script src="../dist/js/waves.js"></script>
    <script src="../dist/js/sidebarmenu.js"></script>
    <script src="../dist/js/custom.min.js"></script>
    <script src="../assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <script src="../dist/js/pages/mask/mask.init.js"></script>
    <script src="../assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="../assets/libs/select2/dist/js/select2.min.js"></script>
    <script src="../assets/libs/jquery-asColor/dist/jquery-asColor.min.js"></script>
    <script src="../assets/libs/jquery-asGradient/dist/jquery-asGradient.js"></script>
    <script src="../assets/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js"></script>
    <script src="../assets/libs/jquery-minicolors/jquery.minicolors.min.js"></script>
    <script src="../assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="../assets/libs/quill/dist/quill.min.js"></script>
</body>
</html>
