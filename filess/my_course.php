<?php
session_start();
$con=mysqli_connect('localhost','root','','Abhyuday');
$user_name = $_SESSION['user_name'];
$_SESSION['user_name']=$user_name;
if(isset($_GET['watch']))
{
  $id = $_GET['watch'];
  $query_courses="SELECT `course_link` FROM `courses` WHERE `id`= '$id' ";
  $run_courses=mysqli_query($con, $query_courses);
  $res_courses=mysqli_fetch_assoc($run_courses);
}
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
    <title>Courses</title>
    <link href="../assets/libs/flot/css/float-chart.css" rel="stylesheet">
    <link href="../dist/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
    #user_image{
      float:left;
      height:120px;
      width:120px;
      border-radius:50%;
      background-image:url("photo.jpg");
      background-size: 100% 100%;
      margin-left:50px;
      margin-top:10px;
      opacity:75%;
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
                      <h4><a class="nav-link  waves-effect waves-dark" href="#" ><i class="mdi mdi-home font-24"></i> Log out
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
                      <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"  aria-expanded="false"><span class="hide-menu"></span></a></li>
                      
                      <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="personal.php" aria-expanded="false"><i class="ti-user m-r-5 m"></i><span class="hide-menu">Personal info</span></a></li>
                      <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="education.php" aria-expanded="false"><i class="mdi mdi-laptop"></i><span class="hide-menu">Education info</span></a></li>
                      <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="Allcourses.php?courses_page=<?php echo $user_name;?>" aria-expanded="false"><i class="mdi mdi-laptop"></i><span class="hide-menu">Courses</span></a></li>
                      <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="Allscholar.php?scholar_page=<?php echo $user_name;?>" aria-expanded="false"><i class="mdi mdi-laptop"></i><span class="hide-menu"> Scholarships</span></a></li>
                      <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="Alljobs.php?job_page=<?php echo $user_name;?>" aria-expanded="false"><i class="mdi mdi-laptop"></i><span class="hide-menu"> Jobs</span></a></li>
                      <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="all_quiz.php" aria-expanded="false"><i class="mdi mdi-laptop"></i><span class="hide-menu"> Quiz</span></a></li>

                  </ul>
              </nav>
          </div>
      </aside>
      <div class="page-wrapper">
        <br>
        <br>
        <br>
        <div class ="row">
          <div class="col-lg-1"></div>
          <div class="col-lg-7">
            <iframe width="853" height="480" src="<?php echo $res_courses['course_link'];?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>

          <div class="col-lg-3">

          </div>
          <div class="col-lg-1"></div>

      </div>
      <br>
      <br>
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
  <script src="../assets/libs/flot/excanvas.js"></script>
  <script src="../assets/libs/flot/jquery.flot.js"></script>
  <script src="../assets/libs/flot/jquery.flot.pie.js"></script>
  <script src="../assets/libs/flot/jquery.flot.time.js"></script>
  <script src="../assets/libs/flot/jquery.flot.stack.js"></script>
  <script src="../assets/libs/flot/jquery.flot.crosshair.js"></script>
  <script src="../assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
  <script src="../dist/js/pages/chart/chart-page-init.js"></script>
</body>
</html>
