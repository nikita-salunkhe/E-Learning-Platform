<?php
session_start();
$con=mysqli_connect('localhost','root','','Abhyuday');
$user_name = $_SESSION['user_name'];

$query_i=$con->prepare("SELECT * FROM `documents` WHERE `user_name`= '$user_name'");
$query_i->execute();
$runn_i= $query_i->get_result();
$run_i=$runn_i->fetch_assoc();

$query_s=$con->prepare("SELECT * FROM `user_info` WHERE `user_name`= '$user_name'");
$query_s->execute();
$runn_s= $query_s->get_result();
$run_s=$runn_s->fetch_assoc();

$_SESSION['user_name']=$user_name;
$query=$con->prepare("SELECT * FROM `enrolled_courses` WHERE `user_name`= '$user_name'");
$query->execute();
$run= $query->get_result();
$row=$run->num_rows;

?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.jpg">

    <title>Profile student</title>
    <link rel="stylesheet" type="text/css" href="../assets/libs/select2/dist/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/libs/jquery-minicolors/jquery.minicolors.css">
    <link rel="stylesheet" type="text/css" href="../assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/libs/quill/dist/quill.snow.css">
    <link href="../dist/css/style.min.css" rel="stylesheet">
    <style>
    #user_image{
      float:left;
      height:120px;
      width:120px;
      border-radius:50%;
      background-image:url("<?php echo "uploads/".$run_i['profile']?>");
      background-size: 100% 100%;
      margin-left:50px;
      margin-top:10px;
      opacity:75%;
    }
    body{

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
    <div id="main-wrapper">
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
                      <h4><a class="nav-link  waves-effect waves-dark" href="home.php?logout=logout" ><i class="mdi mdi-home font-24"></i> Log out
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
                      <div id="user_image"></div>
                      <br>
                      <br>
                      <br>
                      <br>
                      <br>
                      <br>
                      <br>
                      <br>



                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="personal.php" aria-expanded="false"><i class="ti-user m-r-5 m"></i><span class="hide-menu"><?php echo $run_s['fname']." ".$run_s['lname']?></span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="Allcourses.php?courses_page=<?php echo $user_name;?>" aria-expanded="false"><i class="mdi mdi-library"></i><span class="hide-menu">Courses</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="Allscholar.php?scholar_page=<?php echo $user_name;?>" aria-expanded="false"><i class="mdi mdi-school"></i><span class="hide-menu"> Scholarships</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="Alljobs.php?job_page=<?php echo $user_name;?>" aria-expanded="false"><i class="mdi mdi-laptop"></i><span class="hide-menu"> Jobs</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="all_quiz.php" aria-expanded="false"><i class="mdi mdi-pen"></i><span class="hide-menu"> Quiz</span></a></li>

                    </ul>
                </nav>
            </div>
        </aside>
        <div class="page-wrapper">
          <div class ="row">
            <div class="col-lg-1">
              <br>
              <br>
              <br>
            </div>
            <div class="col-lg-7">
              <br>
              <br>
              <br>
              <div class="card">
                <div class="card-body">
                      <h4 class="card-title m-b-0">My Applied Courses</h4>

                </div>
              </div>
       <?php
       while($res=$run->fetch_assoc())
       { ?>
              <div class="card">
                <div class="card-body">

                      <div class="row">
                          <div class="col-sm-10 col-md-10 col-xs-10 col-lg-10"></div>
                        <div class="col-sm-10 col-md-10 col-xs-10 col-lg-10">
                       <p class="card-text">
                       <?php
                       $course_n = $res['course_n'];
                       $query_courses="SELECT * FROM `courses` WHERE `id`= '$course_n' ";
                       $run_courses=mysqli_query($con, $query_courses);
                       $res_courses=mysqli_fetch_assoc($run_courses);
                       echo "<h5> Course Name: " .$res_courses['course_name']. "</h5>";
                       echo "<h5>Description: " .$res_courses['Course_Description']. "</h5>";
                         ?>
                         <a href="my_course.php?watch=<?php echo $res_courses['id']; ?>" class="btn btn-primary ">Watch</a>
                         <?php
                       ?>
                     </p>
                   </div>
                   <div class="col-sm-1 col-md-1 col-xs-1 col-lg-1"></div>
                   <br>
             </div>
             </div>
           </div>
         <?php } ?>
              <br>
              <br>

            </div>

            <div class="col-lg-3">
            <br>
            <br>
            <br>
              <div class="card">
                  <div class="card-body">
                      <h4 class="card-title m-b-0">Progress Box</h4>
                      <div class="m-t-20">
                          <div class="d-flex no-block align-items-center">
                              <span>81% Python</span>
                              <div class="ml-auto">
                                 <span>125</span>
                              </div>
                          </div>
                          <br>
                          <div class="progress">
                              <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 81%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <br>
                      </div>
                      <div>
                          <div class="d-flex no-block align-items-center m-t-25">
                              <span>72% Braille Blaster</span>
                              <div class="ml-auto">
                                  <span>120</span>
                              </div>
                          </div>
                          <br>
                          <div class="progress">
                              <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 72%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                      </div>
                      <div>
                      <br>
                        <div class="d-flex no-block align-items-center m-t-25">
                              <span>53% Indian Sign Language</span>
                              <div class="ml-auto">
                                  <span>785</span>
                              </div>
                          </div>
                          <br>
                          <div class="progress">
                              <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 53%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                      </div>
                      <div>
                          <div class="d-flex no-block align-items-center m-t-25">
                              <span>3% Others</span>
                              <div class="ml-auto">
                                  <span>8</span>
                              </div>
                          </div>
                          <br>
                          <br>
                          <div class="progress">
                              <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 3%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
            <div class="col-lg-1"></div>

        </div>
        <br>
        <br>
        <br>
        <br>
       </div>


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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
